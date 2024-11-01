<?php
/**
 * SPFWC_Admin_Order class.
 *
 * @package Sony Payment Services light for WooCommerce
 * @since 1.0.0
 */

use Automattic\WooCommerce\Internal\DataStores\Orders\CustomOrdersTableController;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * SPFWC_Admin_Order class.
 *
 * @since 1.0.0
 */
class SPFWC_Admin_Order {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_filter( 'manage_shop_order_posts_columns', array( $this, 'define_columns' ), 20 );
		add_filter( 'manage_woocommerce_page_wc-orders_columns', array( $this, 'define_columns' ), 20 ); // HPOS
		add_filter( 'manage_shop_order_posts_custom_column', array( $this, 'render_columns' ), 20, 2 );
		add_action( 'manage_woocommerce_page_wc-orders_custom_column', array( $this, 'render_columns' ), 20, 2 ); // HPOS

		add_action( 'add_meta_boxes', array( $this, 'meta_box' ) );
	}

	/**
	 * Render columm: spfwc_status.
	 *
	 * @param  array $columns Existing columns.
	 * @return array
	 */
	public function define_columns( $columns ) {
		$columns['spfwc_status'] = __( 'Receipt Status', 'sonypayment-light-for-woocommerce' );
		return $columns;
	}

	/**
	 * Render columm: spfwc_status.
	 *
	 * @param string       $column Column ID to render.
	 * @param int|WC_Order $post_or_order_object Post ID or WC_Order being shown.
	 */
	public function render_columns( $column, $post_or_order_object ) {

		if ( 'spfwc_status' !== $column ) {
			return;
		}

		if ( $post_or_order_object instanceof WC_order ) {
			$order    = $post_or_order_object;
			$order_id = $order->get_id();
		} else {
			$order_id = absint( $post_or_order_object );
			$order    = wc_get_order( $order_id );
		}
		if ( ! is_object( $order ) ) {
			return;
		}

		$trans_code = $order->get_meta( '_spfwc_trans_code', true );
		if ( ! $trans_code ) {
			return;
		}
		$latest_log = SPFWC_Payment_Logger::get_latest_log( $order_id, $trans_code );
		if ( ! $latest_log ) {
			return;
		}

		$response = json_decode( $latest_log['response'], true );
		if ( 'cvs' === $latest_log['payment_type'] ) {
			$expired = $this->check_paylimit( $order_id, $trans_code );
			if ( $expired ) {
				$operation_name = __( 'Expired', 'sonypayment-light-for-woocommerce' );
				$class          = 'cvs-expired';
			} else {
				if ( isset( $latest_log['operate_id'] ) && '2Del' === $latest_log['operate_id'] ) {
					$operation_name = __( 'Canceled', 'sonypayment-light-for-woocommerce' );
					$class          = 'cvs-del';
				} else {
					if ( isset( $response['NyukinDate'] ) ) {
						$operation_name = __( 'Paid', 'sonypayment-light-for-woocommerce' );
						$class          = 'cvs-paid';
					} else {
						$operation_name = __( 'Unpaid', 'sonypayment-light-for-woocommerce' );
						$class          = 'cvs-unpaid';
					}
				}
			}
			printf( '<mark class="order-spfwc-status %s"><span>%s</span></mark>', esc_attr( sanitize_html_class( $class ) ), esc_html( $operation_name ) );
		}
	}

	/**
	 * Settlement actions metabox.
	 */
	public function meta_box() {

		$order_id = wc_get_order( absint( isset( $_GET['id'] ) ? $_GET['id'] : 0 ) );
		$order    = wc_get_order( $order_id );
		if ( ! $order ) {
			return;
		}

		$payment_method = $order->get_payment_method();
		if ( 'sonypayment-light' === $payment_method || 'sonypayment-light_cvs' === $payment_method ) {
			$screen = class_exists( '\Automattic\WooCommerce\Internal\DataStores\Orders\CustomOrdersTableController' ) && wc_get_container()->get( CustomOrdersTableController::class )->custom_orders_table_usage_is_enabled()
				? wc_get_page_screen_id( 'shop-order' )
				: 'shop_order';

			add_meta_box( 'spfwc-settlement-actions', __( 'SonyPayment', 'sonypayment-light-for-woocommerce' ), array( $this, 'settlement_actions_box' ), $screen, 'side' );
		}
	}

	/**
	 * Settlement actions metabox content.
	 *
	 * @param int|WC_Order  $post_or_order_object  Post ID or WC_Order being shown.
	 */
	public function settlement_actions_box( $post_or_order_object ) {
		$order = ( $post_or_order_object instanceof WP_Post ) ? wc_get_order( $post_or_order_object->ID ) : $post_or_order_object;
		if ( empty( $order ) ) {
			return;
		}
		$order_id = $order->get_id();
		$payment_method = $order->get_payment_method();
		$trans_code     = $order->get_meta( '_spfwc_trans_code', true );
		if ( empty( $trans_code ) ) {
			$trans_code = spfwc_init_transaction_code();
		}
		$latest_info = $this->settlement_latest_info( $order_id, $trans_code, $payment_method );
		?>
		<div id="spfwc-settlement-latest">
		<?php echo wp_kses_post( $latest_info ); ?>
		</div>
		<?php
	}

	/**
	 * Settlement actions latest.
	 *
	 * @param  int    $order_id Order ID.
	 * @param  string $trans_code Transaction code.
	 * @param  string $payment_method Payment method.
	 * @return string
	 */
	private function settlement_latest_info( $order_id, $trans_code, $payment_method ) {

		$latest     = '';
		$latest_log = SPFWC_Payment_Logger::get_latest_log( $order_id, $trans_code );
		if ( $latest_log ) {
			$response         = json_decode( $latest_log['response'], true );
			$latest_operation = '';
			if ( 'sonypayment-light_cvs' === $payment_method ) {
				$expired = $this->check_paylimit( $order_id, $trans_code );
				if ( $expired ) {
					$latest_operation = '<span class="spfwc-settlement-admin cvs-expired">' . esc_html__( 'Expired', 'sonypayment-light-for-woocommerce' ) . '</span>';
				} else {
					if ( isset( $latest_log['operate_id'] ) && '2Del' === $latest_log['operate_id'] ) {
						$latest_operation = '<span class="spfwc-settlement-admin cvs-del">' . esc_html__( 'Canceled', 'sonypayment-light-for-woocommerce' ) . '</span>';
					} else {
						if ( isset( $response['NyukinDate'] ) ) {
							$latest_operation = '<span class="spfwc-settlement-admin cvs-paid">' . esc_html__( 'Paid', 'sonypayment-light-for-woocommerce' ) . '</span>';
						} else {
							$latest_operation = '<span class="spfwc-settlement-admin cvs-unpaid">' . esc_html__( 'Unpaid', 'sonypayment-light-for-woocommerce' ) . '</span>';
						}
					}
				}
			}
			$latest .= '<table>';
			if ( '' !== $latest_operation ) {
				$latest .= '<tr><td colspan="2">' . $latest_operation . '</td></tr>';
			}
			$latest .= '<tr><th>' . esc_html__( 'Transaction date', 'sonypayment-light-for-woocommerce' ) . ':</th><td>' . esc_html( $latest_log['timestamp'] ) . '</td></tr>
				<tr><th>' . esc_html__( 'Transaction code', 'sonypayment-light-for-woocommerce' ) . ':</th><td>' . esc_html( $latest_log['trans_code'] ) . '</td></tr>';
			if ( 'sonypayment-light' === $payment_method && isset( $response['SecureResultCode'] ) ) {
				$latest .= '<tr><th>' . esc_html__( '3D Secure result code', 'sonypayment-light-for-woocommerce' ) . ':</th><td>' . esc_html( $response['SecureResultCode'] ) . '</td></tr>';
			}
			if ( 'sonypayment-light' === $payment_method && isset( $response['Agreement'] ) ) {
				$latest .= '<tr><th>' . esc_html__( 'Handling of personal information', 'sonypayment-light-for-woocommerce' ) . ':</th><td>' . esc_html__( 'Agreed', 'sonypayment-light-for-woocommerce' ) . '</td></tr>';
			}
			if ( 'sonypayment-light' === $payment_method && isset( $response['PayType'] ) && '01' !== $response['PayType'] ) {
				$latest .= '<tr><th>' . esc_html__( 'The number of installments', 'sonypayment-light-for-woocommerce' ) . ':</th><td>' . esc_html( spfwc_get_paytype( $response['PayType'] ) ) . '</td></tr>';
			} elseif ( 'sonypayment-light_cvs' === $payment_method && ! isset( $response['NyukinDate'] ) && isset( $response['PayLimit'] ) ) {
				$latest .= '<tr><th>' . esc_html__( 'Payment deadline', 'sonypayment-light-for-woocommerce' ) . ':</th><td>' . esc_html( spfwc_get_formatted_date( substr( $response['PayLimit'], 0, 8 ), false ) ) . '</td></tr>';
			}
			$latest .= '</table>';
		}
		return $latest;
	}

	/**
	 * Check already deposited.
	 *
	 * @param  int    $order_id Order ID.
	 * @param  string $trans_code Transaction code.
	 * @return bool
	 */
	private function check_paid( $order_id, $trans_code ) {

		$paid     = false;
		$log_data = SPFWC_Payment_Logger::get_log( $order_id, $trans_code );
		if ( $log_data ) {
			foreach ( (array) $log_data as $data ) {
				$response = json_decode( $data['response'], true );
				if ( isset( $response['OperateId'] ) && 'paid' === $response['OperateId'] ) {
					$paid = true;
					break;
				}
			}
		}
		return $paid;
	}

	/**
	 * Validity check of payment deadline.
	 *
	 * @param  int    $order_id Order ID.
	 * @param  string $trans_code Transaction code.
	 * @return bool
	 */
	private function check_paylimit( $order_id, $trans_code ) {

		$paid = $this->check_paid( $order_id, $trans_code );
		if ( $paid ) {
			return false;
		}
		$expired  = false;
		$today    = date_i18n( 'YmdHi', current_time( 'timestamp' ) );
		$order    = wc_get_order( $order_id );
		$paylimit = $order->get_meta( '_spfwc_cvs_paylimit', true );
		if ( $today > $paylimit ) {
			$expired = true;
		}
		return $expired;
	}
}

new SPFWC_Admin_Order();
