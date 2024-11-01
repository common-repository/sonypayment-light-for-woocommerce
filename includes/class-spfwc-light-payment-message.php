<?php
/**
 * SPFWC_Payment_Message class.
 *
 * @package Sony Payment Services light for WooCommerce
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * SPFWC_Payment_Message class.
 *
 * @since 1.0.0
 */
class SPFWC_Payment_Message {

	/**
	 * Response code message.
	 *
	 * @param  string $ResponseCd Response code.
	 * @return string
	 */
	public static function response_message( $ResponseCd ) {

		switch ( $ResponseCd ) {
			case 'K01':
				$message = __( 'Online trading message scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K02':
				$message = __( '\'MerchantId\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K03':
				$message = __( '\'MerchantPass\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K04':
				$message = __( '\'TenantId\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K05':
				$message = __( '\'TransactionDate\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K06':
				$message = __( '\'OperateId\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K07':
				$message = __( '\'MerchantFree1\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K08':
				$message = __( '\'MerchantFree2\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K09':
				$message = __( '\'MerchantFree3\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K10':
				$message = __( '\'ProcessId\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K11':
				$message = __( '\'ProcessPass\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K12':
				$message = __( '\'ProcessId\' or \'ProcessPass\' inconsistency error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K14':
				$message = __( 'Transition inconsistency of OperateId status', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K15':
				$message = __( 'Error of the numbers of members subject to return on membership reference (same card number return)', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K20':
				$message = __( '\'CardNo\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K21':
				$message = __( '\'CardExp\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K22':
				$message = __( '\'PayType\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K23':
				$message = __( '\'Amount\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K24':
				$message = __( '\'SecCd\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K28':
				$message = __( '\'TelNo\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K30':
				$message = __( '\'MessageVersionNo3D\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K31':
				$message = __( '\'TransactionId3D\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K32':
				$message = __( '\'EncordXId3D\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K33':
				$message = __( '\'TransactionStatus3D\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K34':
				$message = __( '\'CAVVAlgorithm3D\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K35':
				$message = __( '\'CAVV3D\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K36':
				$message = __( '\'ECI3D\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K37':
				$message = __( '\'PANCard3D\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K39':
				$message = __( '\'SalesDate\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K40':
				$message = __( 'Security code error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K45':
				$message = __( '\'KaiinId\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K46':
				$message = __( '\'KaiinPass\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K47':
				$message = __( '\'NewKaiinPass\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K48':
				$message = __( '\'EnableCheckUseKbn\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K50':
				$message = __( '\'PayLimit\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K51':
				$message = __( '\'NameKanji\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K52':
				$message = __( '\'NameKana\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K53':
				$message = __( '\'ShouhinName\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K54':
				$message = __( '\'Free1 to 7\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K55':
				$message = __( '\'Comment\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K60':
				$message = __( '\'Return URL: ReturnURL\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K68':
				$message = __( 'Member registration function is unavailabe.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K69':
				$message = __( 'Duplicate error of member ID', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K70':
				$message = __( 'Member is not in invalid state.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K71':
				$message = __( 'Member ID authentication error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K73':
				$message = __( 'The member is already active.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K74':
				$message = __( 'Member authentication failed consecutively and was locked out.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K75':
				$message = __( 'The member is not valid.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K79':
				$message = __( 'Member determination error (Login invalid or Member invalid)', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K80':
				$message = __( 'Mismatch of Member ID setting (required the setting)', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K81':
				$message = __( 'Mismatch of Member ID setting (required the setting)', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K82':
				$message = __( 'Invalid input contents of card number', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K83':
				$message = __( 'Invalid input contents of card expiration', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K84':
				$message = __( 'Invalid input contents of member ID', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K85':
				$message = __( 'Invalid input contents of member password', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K86':
				$message = __( '\'Processing number: ProcNo\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K87':
				$message = __( '\'POST URL: PostUrl\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K88':
				$message = __( 'Original deal duplication error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K89':
				$message = __( 'Duplicate error of processing number', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K96':
				$message = __( 'Communication failure occurred in the system (timeout)', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K98':
				$message = __( 'Minor failure occurred in the system inside', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K99':
				$message = __( 'Other exception error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'KA1':
				$message = __( '\'Currency code: CurrencyId\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'KBX':
				$message = __( 'Double transaction error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'KBY':
				$message = __( 'Processing incomplete error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'KBZ':
				$message = __( 'No original transaction error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'KG8':
				$message = __( 'Failed operator authentication consecutively and was locked out.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'KGH':
				$message = __( 'Member reference message usage setting error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'KH0':
				$message = __( 'Unknown response', 'sonypayment-light-for-woocommerce' );
				break;
			case 'KH4':
				$message = __( '\'PageLanguage\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'KHS':
				$message = __( '\'SuccessURL\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'KHT':
				$message = __( '\'ErrorURL\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'KHU':
				$message = __( '\'StatusNoticeURL\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'KHV':
				$message = __( 'Auto-cancel has been executed, please try again.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'KHX':
				$message = __( '\'Token\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'KHZ':
				$message = __( 'No token available error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'KI0':
				$message = __( 'Credit sales canceled (details unknown)', 'sonypayment-light-for-woocommerce' );
				break;
			case 'KI1':
				$message = __( '\'k_TokenNinsyoCode\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'KI2':
				$message = __( 'Used token error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'KI3':
				$message = __( 'Token expiration error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'KI4':
				$message = __( '\'Terminal information\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'KI5':
				$message = __( 'It is locked by continuous input of the same card number.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'KI6':
				$message = __( 'The terminal is locked by continuous input from the same terminal.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'KI8':
				$message = __( 'There are two or more transaction targets.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'KIE':
				$message = __( '\'signature\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'KIF':
				$message = __( 'signature Error, object identifier isn\'t included.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'KIH':
				$message = __( 'signature Error, signature time exceeds the allowable time.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'KIJ':
				$message = __( 'Token payment, ApplePay transaction authorization error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'KIK':
				$message = __( 'Apple Pay membership transaction mismatch error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'KIL':
				$message = __( 'Normal member transaction mismatch error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'KIW':
				$message = __( '\'KaiinIdAutoRiyoFlg\' scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'C01':
				$message = __( 'Error related to e-SCOTT setting', 'sonypayment-light-for-woocommerce' );
				break;
			case 'C02':
				$message = __( 'e-SCOTT system error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'C03':
				$message = __( 'e-SCOTT communication error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'C10':
				$message = __( 'Payment indicator error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'C11':
				$message = __( 'Bonus overtime period error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'C12':
				$message = __( 'Number of installments error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'C13':
				$message = __( 'Expired error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'C14':
				$message = __( 'Canceled error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'C15':
				$message = __( 'Bonus amount lower limit error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'C16':
				$message = __( 'Card number error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'C17':
				$message = __( 'Card number system error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'C18':
				$message = __( 'Card number system error subject to authorization exclusion', 'sonypayment-light-for-woocommerce' );
				break;
			case 'C70':
				$message = __( 'Our company setting information error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'C71':
				$message = __( 'Our company setting information error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'C80':
				$message = __( 'Credit card company center closed', 'sonypayment-light-for-woocommerce' );
				break;
			case 'C98':
				$message = __( 'Other exception error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'C99':
				$message = __( 'Other exception error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'G12':
				$message = __( 'Card unavailable', 'sonypayment-light-for-woocommerce' );
				break;
			case 'G22':
				$message = __( 'Prohibit payment permanently', 'sonypayment-light-for-woocommerce' );
				break;
			case 'G30':
				$message = __( 'Transaction decision pending', 'sonypayment-light-for-woocommerce' );
				break;
			case 'G42':
				$message = __( 'PIN error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'G44':
				$message = __( 'Security code error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'G45':
				$message = __( 'Security code input is none', 'sonypayment-light-for-woocommerce' );
				break;
			case 'G54':
				$message = __( 'Error of the number of available use', 'sonypayment-light-for-woocommerce' );
				break;
			case 'G55':
				$message = __( 'Over limit amount', 'sonypayment-light-for-woocommerce' );
				break;
			case 'G56':
				$message = __( 'Invalid card', 'sonypayment-light-for-woocommerce' );
				break;
			case 'G60':
				$message = __( 'Accident card', 'sonypayment-light-for-woocommerce' );
				break;
			case 'G61':
				$message = __( 'Invalid card', 'sonypayment-light-for-woocommerce' );
				break;
			case 'G65':
				$message = __( 'Card number error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'G68':
				$message = __( 'Amount error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'G72':
				$message = __( 'Bonus amount error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'G74':
				$message = __( 'Number of installments error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'G75':
				$message = __( 'Amount of installments error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'G78':
				$message = __( 'Payment indicator error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'G83':
				$message = __( 'Expiration date error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'G84':
				$message = __( 'Authorization number error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'G85':
				$message = __( 'CAFIS substitution error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'G92':
				$message = __( 'Card company arbitrary error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'G94':
				$message = __( 'Cycle sequence number error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'G95':
				$message = __( 'The business online termination', 'sonypayment-light-for-woocommerce' );
				break;
			case 'G96':
				$message = __( 'Accident card data error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'G97':
				$message = __( 'The request rejection', 'sonypayment-light-for-woocommerce' );
				break;
			case 'G98':
				$message = __( 'The company-specific task error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'G99':
				$message = __( 'Connection request refused acceptance of company', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R01':
				$message = __( 'The system is not booting or is temporarily down. Please try again later.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R02':
				$message = __( 'Message format error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R03':
				$message = __( 'Check for signature error.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R04':
				$message = __( 'Missing message transaction key element.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R05':
				$message = __( 'Transaction unsuccessful. Please use another UnionPay card.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R06':
				$message = __( 'Incorrect merchant status.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R07':
				$message = __( 'You are not entitled to this transaction.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R08':
				$message = __( 'Transaction amount exceeds the limit.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R09':
				$message = __( 'Original transaction does not exist or is in an incorrect state.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R10':
				$message = __( 'Not match with original transaction information.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R11':
				$message = __( 'The number of queries exceeds the limit or the frequency of operations is excessive.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R12':
				$message = __( 'UnionPay risk limit', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R13':
				$message = __( 'Out of transaction available hours.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R14':
				$message = __( 'You can deduct from your balance, but the payment available time has passed.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R15':
				$message = __( 'The card number is invalid. Please check and input again.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R16':
				$message = __( 'Transaction unsuccessful. The issuing company does not support this merchant. Please change to a different bank card.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R17':
				$message = __( 'Incorrect card status', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R18':
				$message = __( 'Insufficient card balance', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R19':
				$message = __( 'Eroor of PIN or expiration date or CVN2, transaction failed.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R20':
				$message = __( 'The entered cardholder ID information or mobile phone number is incorrect, verification failed.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R21':
				$message = __( 'The number of input limit of PIN exceeded.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R22':
				$message = __( 'Your bank card is currently unavailable this transaction.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R23':
				$message = __( 'Trial time limit exceeded, transaction failed.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R24':
				$message = __( 'The transaction has been redirected. Please wait until the cardholder entry screen appears.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R25':
				$message = __( 'The dynamic password or SMS authentication code cannot be verified.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R26':
				$message = __( 'You have not signed up for UnionPay payment service at a bank counter or online bank.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R27':
				$message = __( 'Payment card has expired.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R28':
				$message = __( 'Validation require an encryption verification.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R29':
				$message = __( 'This bank card is not activated for verified payments.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R30':
				$message = __( 'An issuing company\'s trading rights are restricted. Please contact the issuing company.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R31':
				$message = __( 'The bank card is valid, but the issuing company does not support SMS authentication.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R32':
				$message = __( 'File doesn\'t exist.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R33':
				$message = __( 'General error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R34':
				$message = __( 'Please contact SLN.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R35':
				$message = __( 'Please contact SLN.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R36':
				$message = __( 'This transaction doesn\'t exist.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'R37':
				$message = __( 'Transaction failed. Please contact the issuing company for details.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'U01':
				$message = __( 'The end user\'s 3D Secure password is not set.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'U02':
				$message = __( 'This card company doesn\'t conpliant with 3D Secure.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'U03':
				$message = __( 'The brand server or issuer server failed and could not be authenticated.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'U04':
				$message = __( '3D Secure authentication couldn\'t be executed. Depending on the standards of card companies, it may be NG without displaying the 3D Secure authentication screen.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'U05':
				$message = __( 'The authentication system checked for tampering and 3D Secure authentication failed.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'U06':
				$message = __( 'A timeout (over 40 minutes) occurred by end-user operation.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'U07':
				$message = __( 'The same message was received during message processing in the authentication system.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'U08':
				$message = __( 'A duplicate message was received after the session information was deleted.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'U09':
				$message = __( 'This brand doesn\'t conpliant with 3D Secure.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'U10':
				$message = __( 'The 3D Secure authentication couldn\'t be executed because the branded server stopped or failed connection.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'U11':
				$message = __( 'Authentication system scrutiny error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'U12':
				$message = __( 'Merchant authentication error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'U13':
				$message = __( 'Authentication system item error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'U14':
				$message = __( 'If a planned stoppage guidance has been notified, wait for the planned stoppage to end and reprocess.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'U95':
				$message = __( 'Failed the process temporarily. Please retry.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'U96':
				$message = __( 'If a failure report has been notified, wait for the recovery report and reprocess.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'U99':
				$message = __( 'Unexpected error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'W01':
				$message = __( 'Online Payment Collection Agency Service setting error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'W02':
				$message = __( 'Setting value error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'W03':
				$message = __( 'Online Payment Collection Agency Service internal error (Web type)', 'sonypayment-light-for-woocommerce' );
				break;
			case 'W04':
				$message = __( 'System setting error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'W05':
				$message = __( 'Item setting error', 'sonypayment-light-for-woocommerce' );
				break;
			case 'W06':
				$message = __( 'Online Payment Collection Agency Service internal error (DB type)', 'sonypayment-light-for-woocommerce' );
				break;
			case 'W99':
				$message = __( 'Other exception error', 'sonypayment-light-for-woocommerce' );
				break;
			default:
				$message = $ResponseCd;
		}
		return $message;
	}

	/**
	 * Error code message.
	 *
	 * @param  string $ResponseCd Response code.
	 * @return string
	 */
	public static function error_message( $ResponseCd ) {

		switch ( $ResponseCd ) {
			case 'K01':
			case 'K02':
			case 'K03':
			case 'K04':
			case 'K05':
			case 'K06':
			case 'K07':
			case 'K08':
			case 'K09':
			case 'K10':
			case 'K11':
			case 'K12':
			case 'K14':
			case 'K15':
			case 'K22':
			case 'K23':
			case 'K39':
			case 'K50':
			case 'K53':
			case 'K54':
			case 'K55':
			case 'K60':
			case 'K68':
			case 'K69':
			case 'K70':
			case 'K71':
			case 'K73':
			case 'K74':
			case 'K75':
			case 'K79':
			case 'K80':
			case 'K81':
			case 'K84':
			case 'K85':
			case 'K86':
			case 'K87':
			case 'K88':
			case 'K89':
			case 'K96':
			case 'K98':
			case 'K99':
			case 'KA1':
			case 'KBX':
			case 'KBY':
			case 'KBZ':
			case 'KG8':
			case 'KGH':
			case 'KH0':
			case 'KH4':
			case 'KHS':
			case 'KHT':
			case 'KHU':
			case 'KHV':
			case 'KHX':
			case 'KHZ':
			case 'KI0':
			case 'KI1':
			case 'KI2':
			case 'KI3':
			case 'KI4':
			case 'KI5':
			case 'KI6':
			case 'KI8':
			case 'KIE':
			case 'KIF':
			case 'KIH':
			case 'KIJ':
			case 'KIK':
			case 'KIL':
			case 'KIW':
			case 'C01':
			case 'C02':
			case 'C03':
			case 'C10':
			case 'C11':
			case 'C12':
			case 'C14':
			case 'C18':
			case 'C70':
			case 'C71':
			case 'C80':
			case 'C98':
			case 'C99':
			case 'G74':
			case 'G78':
			case 'G85':
			case 'G92':
			case 'G94':
			case 'G95':
			case 'G98':
			case 'G99':
			case 'R01':
			case 'R02':
			case 'R03':
			case 'R04':
			case 'R05':
			case 'R06':
			case 'R07':
			case 'R08':
			case 'R09':
			case 'R10':
			case 'R11':
			case 'R12':
			case 'R13':
			case 'R14':
			case 'R15':
			case 'R16':
			case 'R17':
			case 'R18':
			case 'R19':
			case 'R20':
			case 'R21':
			case 'R22':
			case 'R23':
			case 'R24':
			case 'R25':
			case 'R26':
			case 'R27':
			case 'R28':
			case 'R29':
			case 'R30':
			case 'R31':
			case 'R32':
			case 'R33':
			case 'R34':
			case 'R35':
			case 'R36':
			case 'R37':
			case 'W01':
			case 'W02':
			case 'W03':
			case 'W04':
			case 'W05':
			case 'W06':
			case 'W99':
				$message = __( 'Sorry, please contact the administrator via the inquiry form.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K20':
			case 'K82':
			case 'C16':
			case 'C17':
			case 'G65':
				$message = __( 'Credit card number is not appropriate.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K21':
			case 'K83':
			case 'C13':
			case 'G83':
				$message = __( 'Card expiration date is not appropriate.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K24':
			case 'G44':
			case 'G45':
				$message = __( 'Security code is not appropriate.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K40':
			case 'K45':
			case 'K46':
			case 'K47':
			case 'K48':
			case 'KHX':
			case 'G42':
			case 'G84':
				$message = __( 'Credit card information is not appropriate.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'C15':
				$message = __( 'Please change the payment method and error due to less than the minimum amount of bonus payment.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'G12':
			case 'G22':
			case 'G30':
			case 'G56':
			case 'G60':
			case 'G61':
			case 'G96':
			case 'G97':
				$message = __( 'Credit card is unusable.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'G54':
				$message = __( 'It is over 1 day usage or over amount.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'G55':
				$message = __( 'It is over limit for 1 day use.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'G68':
			case 'G72':
				$message = __( 'Amount is not appropriate.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'G75':
				$message = __( 'It is lower than the lower limit of installment payment.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K28':
				$message = __( 'Customer telephone number is not appropriate.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K51':
				$message = __( 'Customer name is not entered properly.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K52':
				$message = __( 'Customer kana name is not entered properly.', 'sonypayment-light-for-woocommerce' );
				break;
			case 'K30':
			case 'K31':
			case 'K32':
			case 'K33':
			case 'K34':
			case 'K35':
			case 'K36':
			case 'K37':
			case 'U01':
			case 'U02':
			case 'U03':
			case 'U04':
			case 'U05':
			case 'U06':
			case 'U07':
			case 'U08':
			case 'U09':
			case 'U10':
			case 'U11':
			case 'U12':
			case 'U13':
			case 'U14':
			case 'U95':
			case 'U96':
			case 'U99':
				$message = __( '3D Secure authentication failed.', 'sonypayment-light-for-woocommerce' );
				break;
			default:
				// $message = __( 'Sorry, please contact the administrator via the inquiry form.', 'sonypayment-light-for-woocommerce' );
				$message = '';
		}
		return $message;
	}
}
