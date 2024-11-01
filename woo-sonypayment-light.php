<?php
/**
 * Plugin Name: Sony Payment Services light for WooCommerce
 * Plugin URI: https://ja.wordpress.org/plugins/sonypayment-light-for-woocommerce/
 * Description: When using Sony Payment Services, the payment of credit card, convenience store, bank ATM, online banking will be available.
 * Author: Welcart Inc.
 * Author URI: https://www.welcart.com/
 * Version: 2.0.0
 * WC requires at least: 3.0
 * WC tested up to: 9.3
 * License: GNU General Public License v2.0
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: sonypayment-light-for-woocommerce
 * Domain Path: /languages
 *
 * @package Sony Payment Services light for WooCommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SPFWC_LIGHT_VERSION', '2.0.0.2409301' );
define( 'SPFWC_LIGHT_PLUGIN_FILE', __FILE__ );
define( 'SPFWC_LIGHT_PLUGIN_DIR', untrailingslashit( dirname( __FILE__ ) ) );
define( 'SPFWC_LIGHT_PLUGIN_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );
define( 'SPFWC_LIGHT_PLUGIN_BASENAME', untrailingslashit( plugin_basename( __FILE__ ) ) );

if ( ! class_exists( 'Woo_SonyPayment_light' ) ) {
	include_once SPFWC_LIGHT_PLUGIN_DIR . '/includes/class-spfwc-light.php';
}

global $spfwc_light;
$spfwc_light = Woo_SonyPayment_light::get_instance();

add_action( 'woocommerce_blocks_loaded', 'woocommerce_gateway_spfwc_light_woocommerce_block_support' );
function woocommerce_gateway_spfwc_light_woocommerce_block_support() {
	if ( class_exists( 'Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType' ) ) {
		require_once dirname( __FILE__ ) . '/includes/class-spfwc-light-blocks-support.php';
		add_action(
			'woocommerce_blocks_payment_method_type_registration',
			function( Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry $payment_method_registry ) {
				$payment_method_registry->register( new SPFWC_Blocks_Support() );
			}
		);
		require_once dirname( __FILE__ ) . '/includes/class-spfwc-light-blocks-support-cvs.php';
		add_action(
			'woocommerce_blocks_payment_method_type_registration',
			function( Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry $payment_method_registry ) {
				$payment_method_registry->register( new SPFWC_Blocks_Support_Cvs() );
			}
		);
	}
}

add_action( 'before_woocommerce_init', function() {
	if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
		\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
	}
} );
