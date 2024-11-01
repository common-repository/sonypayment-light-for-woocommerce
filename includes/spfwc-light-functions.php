<?php
/**
 * Functions
 *
 * @package Sony Payment Services light for WooCommerce
 * @since 1.0.0
 */

/**
 * Transaction code.
 *
 * @param  int $digits Generated digits.
 * @return string
 */
function spfwc_get_transaction_code( $digits = 12 ) {
	$num              = str_repeat( '9', $digits );
	$transaction_code = apply_filters( 'spfwc_transaction_code', sprintf( '%0' . $digits . 'd', wp_rand( 1, (int) $num ) ), $num );
	return $transaction_code;
}

/**
 * Inittial transaction code.
 *
 * @param  int $digits Generated digits.
 * @return string
 */
function spfwc_init_transaction_code( $digits = 12 ) {
	$transaction_code = apply_filters( 'spfwc_init_transaction_code', str_repeat( '9', $digits ) );
	return $transaction_code;
}

/**
 * Transaction date.
 *
 * @return string 'yyyymmdd'
 */
function spfwc_get_transaction_date() {
	$transaction_date = date_i18n( 'Ymd', current_time( 'timestamp' ) );
	return $transaction_date;
}

/**
 * Date format.
 *
 * @param  string $date Date.
 * @param  bool   $localize Translate|Original.
 * @return string
 */
function spfwc_get_formatted_date( $date, $localize = true ) {
	if ( 14 === strlen( $date ) ) {
		$formatted_date = substr( $date, 0, 4 ) . '-' . substr( $date, 4, 2 ) . '-' . substr( $date, 6, 2 ) . ' ' . substr( $date, 8, 2 ) . ':' . substr( $date, 10, 2 ) . ':' . substr( $date, 12, 2 );
		if ( $localize ) {
			$formatted_date = date_i18n( __( 'M j, Y @ G:i:s', 'sonypayment-light-for-woocommerce' ), strtotime( $formatted_date ) );
		}
	} elseif ( 12 === strlen( $date ) ) {
		$formatted_date = substr( $date, 0, 4 ) . '-' . substr( $date, 4, 2 ) . '-' . substr( $date, 6, 2 ) . ' ' . substr( $date, 8, 2 ) . ':' . substr( $date, 10, 2 );
		if ( $localize ) {
			$formatted_date = date_i18n( __( 'M j, Y @ G:i', 'sonypayment-light-for-woocommerce' ), strtotime( $formatted_date ) );
		}
	} elseif ( 8 === strlen( $date ) ) {
		$formatted_date = substr( $date, 0, 4 ) . '-' . substr( $date, 4, 2 ) . '-' . substr( $date, 6, 2 );
		if ( $localize ) {
			$formatted_date = date_i18n( __( 'M j, Y', 'sonypayment-light-for-woocommerce' ), strtotime( $formatted_date ) );
		}
	} else {
		$formatted_date = $date;
	}
	return $formatted_date;
}

/**
 * Get order property with compatibility for WC lt 3.0.
 *
 * @param  WC_Order $order Order object.
 * @param  string   $key   Order property.
 * @return mixed Value of order property.
 */
function spfwc_get_order_prop( $order, $key ) {
	$getter = array( $order, 'get_' . $key );
	return is_callable( $getter ) ? call_user_func( $getter ) : $order->{ $key };
}

if ( ! function_exists( 'is_edit_cardmember_page' ) ) {

	/**
	 * Checks if is an edit card member page.
	 *
	 * @return bool
	 */
	function is_edit_cardmember_page() {
		global $wp;

		return ( is_page( wc_get_page_id( 'myaccount' ) ) && isset( $wp->query_vars['edit-cardmember'] ) );
	}
}

/**
 * Operation name.
 *
 * @param  string $OperateId Operation ID.
 * @return string
 */
function spfwc_get_operation_name( $OperateId ) {
	$operation_name = '';
	switch ( $OperateId ) {
		case '1Check':
			$operation_name = __( 'Card check', 'sonypayment-light-for-woocommerce' );
			break;
		case '1Auth':
			$operation_name = __( 'Credit', 'sonypayment-light-for-woocommerce' );
			break;
		case '1Capture':
			$operation_name = __( 'Sales recorded', 'sonypayment-light-for-woocommerce' );
			break;
		case '1Gathering':
			$operation_name = __( 'Credit sales recorded', 'sonypayment-light-for-woocommerce' );
			break;
		case '1Change':
			$operation_name = __( 'Amount change', 'sonypayment-light-for-woocommerce' );
			break;
		case '1Delete':
			$operation_name = __( 'Cancel', 'sonypayment-light-for-woocommerce' );
			break;
		case '1Search':
			$operation_name = __( 'Transaction reference', 'sonypayment-light-for-woocommerce' );
			break;
		case '1ReAuth':
			$operation_name = __( 'Re-authorization', 'sonypayment-light-for-woocommerce' );
			break;
		case '2Add':
			$operation_name = __( 'Register', 'sonypayment-light-for-woocommerce' );
			break;
		case '2Chg':
			$operation_name = __( 'Change', 'sonypayment-light-for-woocommerce' );
			break;
		case '2Del':
			$operation_name = __( 'Delete', 'sonypayment-light-for-woocommerce' );
			break;
		case '4MemRef':
		case '4MemRefM':
		case '4MemRefMulti':
		case '4MemRefToken':
			$operation_name = __( 'Member reference', 'sonypayment-light-for-woocommerce' );
			break;
		case '4MemUnInval':
			$operation_name = __( 'Cancellation of member', 'sonypayment-light-for-woocommerce' );
			break;
		case '4MemDel':
			$operation_name = __( 'Delete member', 'sonypayment-light-for-woocommerce' );
			break;
		case '5Auth':
			$operation_name = __( 'Foreign currency credit', 'sonypayment-light-for-woocommerce' );
			break;
		case '5Gathering':
			$operation_name = __( 'Foreign currency credit sales settled', 'sonypayment-light-for-woocommerce' );
			break;
		case '5Capture':
			$operation_name = __( 'Foreign currency sales settled', 'sonypayment-light-for-woocommerce' );
			break;
		case '5Delete':
			$operation_name = __( 'Foreign currency cancellation', 'sonypayment-light-for-woocommerce' );
			break;
		case '5OpeUnInval':
			$operation_name = __( 'Resume of foreign currency transactions', 'sonypayment-light-for-woocommerce' );
			break;
		case 'paid':
			$operation_name = __( 'Payment', 'sonypayment-light-for-woocommerce' );
			break;
		case 'expired':
			$operation_name = __( 'Expired', 'sonypayment-light-for-woocommerce' );
			break;
	}
	return $operation_name;
}

/**
 * Storage agency name.
 *
 * @param  string $CvsCd Convenience store code.
 * @return string
 */
function spfwc_get_cvs_name( $CvsCd ) {
	switch ( trim( $CvsCd ) ) {
		case 'LSN':
			$cvs_name = __( 'Lawson', 'sonypayment-light-for-woocommerce' );
			break;
		case 'FAM':
			$cvs_name = __( 'Family Mart', 'sonypayment-light-for-woocommerce' );
			break;
		case 'SAK':
			$cvs_name = __( 'Thanks', 'sonypayment-light-for-woocommerce' );
			break;
		case 'CCK':
			$cvs_name = __( 'Circle K', 'sonypayment-light-for-woocommerce' );
			break;
		case 'ATM':
			$cvs_name = __( 'Pay-easy (ATM)', 'sonypayment-light-for-woocommerce' );
			break;
		case 'ONL':
			$cvs_name = __( 'Pay-easy (online)', 'sonypayment-light-for-woocommerce' );
			break;
		case 'LNK':
			$cvs_name = __( 'Pay-easy (information link)', 'sonypayment-light-for-woocommerce' );
			break;
		case 'SEV':
			$cvs_name = __( 'Seven-Eleven', 'sonypayment-light-for-woocommerce' );
			break;
		case 'MNS':
			$cvs_name = __( 'Ministop', 'sonypayment-light-for-woocommerce' );
			break;
		case 'DAY':
			$cvs_name = __( 'Daily Yamazaki', 'sonypayment-light-for-woocommerce' );
			break;
		case 'EBK':
			$cvs_name = __( 'Rakuten Bank', 'sonypayment-light-for-woocommerce' );
			break;
		case 'JNB':
			$cvs_name = __( 'Japan Net Bank', 'sonypayment-light-for-woocommerce' );
			break;
		case 'EDY':
			$cvs_name = __( 'Edy', 'sonypayment-light-for-woocommerce' );
			break;
		case 'SUI':
			$cvs_name = __( 'Suica', 'sonypayment-light-for-woocommerce' );
			break;
		case 'FFF':
			$cvs_name = __( 'Three F', 'sonypayment-light-for-woocommerce' );
			break;
		case 'JIB':
			$cvs_name = __( 'Jibun Bank', 'sonypayment-light-for-woocommerce' );
			break;
		case 'SNB':
			$cvs_name = __( 'Shumishin SBI Net Bank', 'sonypayment-light-for-woocommerce' );
			break;
		case 'SCM':
			$cvs_name = __( 'Seico Mart', 'sonypayment-light-for-woocommerce' );
			break;
		case 'JPM':
			$cvs_name = __( 'JCB Premo', 'sonypayment-light-for-woocommerce' );
			break;
		default:
			$cvs_name = $CvsCd;
	}
	return $cvs_name;
}

/**
 * The number of installments.
 *
 * @param  string $PayType Number of payments.
 * @return string
 */
function spfwc_get_paytype( $PayType ) {
	switch ( $PayType ) {
		case '01':
			$paytype_name = __( 'Lump-sum payment', 'sonypayment-light-for-woocommerce' );
			break;
		case '02':
		case '03':
		case '05':
		case '06':
		case '10':
		case '12':
		case '15':
		case '18':
		case '20':
		case '24':
			$times        = (int) $PayType;
			$paytype_name = $times . __( '-installments', 'sonypayment-light-for-woocommerce' );
			break;
		case '80':
			$paytype_name = __( 'Pay for it out of a bonus', 'sonypayment-light-for-woocommerce' );
			break;
		case '88':
			$paytype_name = __( 'Revolving payment', 'sonypayment-light-for-woocommerce' );
			break;
	}
	return $paytype_name;
}

/**
 * Card members have active orders.
 *
 * @param  int $customer_id The WP user ID.
 * @return bool
 */
function spfwc_get_customer_active_card_orders( $customer_id ) {

	$active                = false;
	$active_order_statuses = apply_filters(
		'spfwc_active_order_statuses',
		array(
			'wc-pending',
			'wc-processing',
			'wc-on-hold',
			'wc-refunded',
		)
	);

	$customer        = get_user_by( 'id', absint( $customer_id ) );
	$customer_orders = wc_get_orders(
		array(
			'limit'    => -1,
			'customer' => array( array( 0, $customer->user_email ) ),
			'return'   => 'ids',
		)
	);

	if ( ! empty( $customer_orders ) ) {
		foreach ( $customer_orders as $order_id ) {
			$order = wc_get_order( $order_id );
			if ( ! $order ) {
				continue;
			}
			$payment_method = $order->get_payment_method();
			$order_status   = get_post_status( $order_id );
			if ( 'sonypayment-light' === $payment_method && in_array( $order_status, $active_order_statuses, true ) ) {
				$active = true;
				break;
			}
		}
	}

	return $active;
}

/**
 * Consent to Obtain Personal Information Messsage.
 *
 * @return string
 */
function spfwc_consent_message() {
	$message = __( '* Cautions on Use of Credit Cards', 'sonypayment-light-for-woocommerce' ) . "\n" .
		__( 'In order to prevent unauthorized use of your credit card through theft of information such as your credit card number, we use "EMV 3D Secure," an identity authentication service recommended by international brands.', 'sonypayment-light-for-woocommerce' ) . "\n" .
		__( 'In order to use EMV 3D Secure, it is necessary to send information about you to the card issuer.', 'sonypayment-light-for-woocommerce' ) . "\n" .
		__( 'Please read "* Provision of Personal Information to Third Parties" below and enter your card information only if you agree to the terms of the agreement.', 'sonypayment-light-for-woocommerce' ) . "\n" .
		__( '* Provision of Personal Information to Third Parties', 'sonypayment-light-for-woocommerce' ) . "\n" .
		__( 'The following personal information, etc. collected from customers will be provided to the issuer of the card being used by the customer for the purpose of detecting and preventing fraudulent use by the card issuer.', 'sonypayment-light-for-woocommerce' ) . "\n" .
		__( '"Full name", "e-mail address", "Membership information held by the business", "IP address", "device information", "Information on the Internet usage environment", and "Billing address".', 'sonypayment-light-for-woocommerce' ) . "\n" .
		__( 'If the issuer of the card you are using is located in a foreign country, these information may be transferred to the country to which such issuer belongs.', 'sonypayment-light-for-woocommerce' ) . "\n" .
		__( 'If you are a minor, you are required to obtain the consent of a person with parental authority or a guardian before using the Service.', 'sonypayment-light-for-woocommerce' ) . "\n" .
		__( '* Agreement to provide personal information to a third party', 'sonypayment-light-for-woocommerce' ) . "\n" .
		__( 'If you agree to the above "* Provision of Personal Information to Third Parties", please check the "I agree to the handling of personal information" checkbox and press "Place order".', 'sonypayment-light-for-woocommerce' ) . "\n" .
		__( '* Safety Control Measures', 'sonypayment-light-for-woocommerce' ) . "\n" .
		__( 'We may provide all or part of the information obtained from our customers to subcontractors in the United States.', 'sonypayment-light-for-woocommerce' ) . "\n" .
		__( 'We will confirm that the subcontractor takes necessary and appropriate measures for the safe management of the information before storing it.', 'sonypayment-light-for-woocommerce' ) . "\n" .
		__( 'For an overview of the legal system regarding the protection of personal information in the relevant country, please check here.', 'sonypayment-light-for-woocommerce' ) . "\n" .
		'https://www.ppc.go.jp/personalinfo/legal/kaiseihogohou/#gaikoku';
	return $message;
}
