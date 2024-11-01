jQuery( document ).ready( function($) {

	var spfwc_request = {

		$checkout_form: $( 'form.checkout' ),

		init: function() {

			this.$checkout_form.on( 'click', 'input[name="payment_method"]', this.paymentMethodSelected );

			$( document ).on( 'change', '#sonypayment-light-card-number', function() {
				spfwc_request.changePayType( $( this ).val() );
			});
		},

		getAjaxURL: function( endpoint ) {
			return sonypayment_request_params.ajax_url
				.toString()
				.replace( '%%endpoint%%', 'spfwc_' + endpoint );
		},

		getCardMember: function() {
			$.ajax({
				url: spfwc_request.getAjaxURL( 'get_card_member' ),
				type: 'POST',
				cache: false,
				data: {
					security: sonypayment_request_params.nonce.card_member,
					customer_id: sonypayment_request_params.customer_id
				}
			}).done( function( retVal ) {
				if ( 'success' == retVal.status ) {
					$( '#sonypayment-light-card-member-option-saved' ).prop( 'checked', true );
					$( '#sonypayment-light-card-member-cardlast4' ).text( retVal.cardlast4 );
					spfwc_request.changePayType( retVal.cardfirst4 );
				}
			}).fail( function( retVal ) {
				window.console.log( retVal );
			});
			return false;
		},

		paymentMethodSelected: function() {
			if ( $( '#payment_method_sonypayment-light' ).prop( 'checked' ) && sonypayment_request_params.customer_id.length > 0 ) {
				spfwc_request.getCardMember();
			}
		},

		changePayType: function( cnum ) {
			var first_c = cnum.substr( 0, 1 );
			var second_c = cnum.substr( 1, 1 );
			if ( '4' == first_c || '5' == first_c || ( '3' == first_c && '5' == second_c ) ) {
				$( '#sonypayment-light-card-paytype-default' ).prop( 'disabled', true ).css( 'display', 'none' );
				$( '#sonypayment-light-card-paytype-4535' ).prop( 'disabled', false ).css( 'display', 'inline' );
				$( '#sonypayment-light-card-paytype-37' ).prop( 'disabled', true ).css( 'display', 'none' );
				$( '#sonypayment-light-card-paytype-36' ).prop( 'disabled', true ).css( 'display', 'none' );
			} else if ( '3' == first_c && '6' == second_c ) {
				$( '#sonypayment-light-card-paytype-default' ).prop( 'disabled', true ).css( 'display', 'none' );
				$( '#sonypayment-light-card-paytype-4535' ).prop( 'disabled', true ).css( 'display', 'none' );
				$( '#sonypayment-light-card-paytype-37' ).prop( 'disabled', true ).css( 'display', 'none' );
				$( '#sonypayment-light-card-paytype-36' ).prop( 'disabled', false ).css( 'display', 'inline' );
			} else if ( '3' == first_c && '7' == second_c ) {
				$( '#sonypayment-light-card-paytype-default' ).prop( 'disabled', true ).css( 'display', 'none' );
				$( '#sonypayment-light-card-paytype-4535' ).prop( 'disabled', true ).css( 'display', 'none' );
				$( '#sonypayment-light-card-paytype-37' ).prop( 'disabled', false ).css( 'display', 'inline' );
				$( '#sonypayment-light-card-paytype-36' ).prop( 'disabled', true ).css( 'display', 'none' );
			} else {
				$( '#sonypayment-light-card-paytype-default' ).prop( 'disabled', false ).css( 'display', 'inline' );
				$( '#sonypayment-light-card-paytype-4535' ).prop( 'disabled', true ).css( 'display', 'none' );
				$( '#sonypayment-light-card-paytype-37' ).prop( 'disabled', true ).css( 'display', 'none' );
				$( '#sonypayment-light-card-paytype-36' ).prop( 'disabled', true ).css( 'display', 'none' );
			}
		}
	};

	spfwc_request.init();
});
