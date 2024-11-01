jQuery( function($) {

	var spfwc_admin = {

		init: function() {

			if ( $( '#woocommerce_sonypayment-light_cardmember' ).prop( 'checked' ) ) {
				$( '#woocommerce_sonypayment-light_always_save' ).closest( 'tr' ).show();
			} else {
				$( '#woocommerce_sonypayment-light_always_save' ).closest( 'tr' ).hide();
			}

			if ( $( '#woocommerce_sonypayment-light_three_d_secure' ).prop( 'checked' ) ) {
				$( '#woocommerce_sonypayment-light_key_aes' ).closest( 'tr' ).show();
				$( '#woocommerce_sonypayment-light_key_iv' ).closest( 'tr' ).show();
			} else {
				$( '#woocommerce_sonypayment-light_key_aes' ).closest( 'tr' ).hide();
				$( '#woocommerce_sonypayment-light_key_iv' ).closest( 'tr' ).hide();
			}

			$( document ).on( 'change', '#woocommerce_sonypayment-light_cardmember', function() {
				if ( $( this ).prop( 'checked' ) ) {
					$( '#woocommerce_sonypayment-light_always_save' ).closest( 'tr' ).show();
				} else {
					$( '#woocommerce_sonypayment-light_always_save' ).closest( 'tr' ).hide();
				}
			});

			$( document ).on( 'change', '#woocommerce_sonypayment-light_three_d_secure', function() {
				if ( $( this ).prop( 'checked' ) ) {
					$( '#woocommerce_sonypayment-light_key_aes' ).closest( 'tr' ).show();
					$( '#woocommerce_sonypayment-light_key_iv' ).closest( 'tr' ).show();
				} else {
					$( '#woocommerce_sonypayment-light_key_aes' ).closest( 'tr' ).hide();
					$( '#woocommerce_sonypayment-light_key_iv' ).closest( 'tr' ).hide();
				}
			});
		}
	};

	spfwc_admin.init();
});
