=== Sony Payment Services light for WooCommerce ===
Contributors: uscnanbu, sonypaymentservices
Tags: credit card, payment, woocommerce, sonypayment
Requires at least: 5.6
Tested up to: 6.6
Requires PHP: 7.0 - 8.1
Stable tag: 2.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Sony Payment Services light for WooCommerce plugin allows you to accept Credit Cards, Convenience Stores, Pay-easy, E-money Payments via e-SCOTT Smart system Powered by Sony Payment Services.
This plugin acts as an addon to add a payment method on WooCommerce checkout page.
On the checkout page, our plugin connects to e-SCOTT Smart system.

Sony Payment Services light for WooCommerce is currently only available for customers having their registered office in Japan.
And available currency is only JPY.

= The diffrence between "Sony Payment Services light for WooCommerce" and "Sony Payment Services Pro for WooCommerce" =

1. Sony Payment Services light doesn't support a recurring payment.
2. In Sony Payment Services light, you can't update the status and the amounts in the WooCommerce admin page. You must update them in each system.

= About e-SCOTT Smart system =

e-SCOTT Smart system is an online payment gateway Powered by Sony Payment Services that allows both individuals and businesses to accept payments over the Internet.
The highest level of security of payments processed by e-SCOTT Smart system is verified by PCI DSS.
System guarantees convenience and instant order execution. 

Service: https://www.sonypaymentservices.jp/
Privacy Policy: https://www.sonypaymentservices.jp/policy/

In order to use this plugin you will need a merchant services account.
Sony Payment Services offers merchant accounts. 
Please go to the signup page by clicking the link below to create a new account.

Signup page: https://form.sonypaymentservices.jp/input_woocommerce_light.html

= Credit Card Payment =

Either token payment(non-passage) type or external link type can be chosen for credit card payment.

= Online Payment Collection Agency Service(Convenience Stores, Pay-easy, E-money Payments) =

Online Payment Collection Agency Service is only available for legal entity.
Your customers will choose the settlement type on the checkout page provided from Sony Payment Services.(Extrnal link type.) 
Payment status automatically changed to "Paid" when the customers payments has been confirmed.

= User Manual =

https://www.collne.com/dl/woo/sony-payment-services-light-for-woocommerce.pdf

== Installation ==

= Minimum Requirements =

* WooCommerce 3.0 or greater
* PHP 7.0 or greater

= Automatic installation =

Automatic installation is the easiest option as WordPress handles the file transfers itself and you don't need to leave your web browser. To do an automatic install of Sony Payment Services light for WooCommerce, log in to your WordPress dashboard, navigate to the Plugins menu and click Add New.

In the search field type Sony Payment Services light for WooCommerce and click Search Plugins. Once you've found our plugin you can view details about it such as the the rating and description. Most importantly, of course, you can install it by simply clicking Install Now.

= Manual installation =

Download page
https://ja.wordpress.org/plugins/sonypayment-light-for-woocommerce/

1.Go to WordPress Plugins > Add New
2.Click Upload Plugin Zip File
3.Upload the zipped Sony Payment Services light for WooCommerce file and click "Upload Now"
4.Go to Installed Plugins
5.Activate the "Sony Payment Services light for WooCommerce"

== Frequently Asked Questions ==

= In case of convinience store payment, payment status doesn't change to "Paid" althogh the customers payments has been confirmed. =

Please apply for "Payment result notification URL" to Sony Payment Services.
If you already applied for it, please confirm that there are no mistakes.

== Changelog ==

= 2.0.0 - 2024-09-30 =
* Added support for blocking certain payment methods.
* Added support for high-performance order storage.

= 1.1.7 - 2024-07-25 =
* Update - WordPress tested up to 6.6

= 1.1.6 - 2024-06-25 =
* Fix - Fixed the bug where the form becomes unresponsive when a credit card payment fails.
* Update - Added support for EMV-3DS.
* Update - WordPress tested up to 6.5

= 1.1.5 - 2024-03-19 =
* Update - Updated readme.

= 1.1.4 - 2024-03-19 =
* Fix - Fixed error messages.
* Update - Updated readme.

= 1.1.3 - 2023-05-31 =
* Fix - Fixed the bug that the payment fee for Online Payment Collection Agency is not calculated correctly.

= 1.1.2 - 2023-05-29 =
* Update - WordPress tested up to 6.2
* Update - WC tested up to 7.7
* Update - Added switch to set order status to "Completed" when purchasing virtual items only.
* Update - Added input value check.

= 1.1.1 - 2023-01-05 =
* Update - WordPress tested up to 6.1
* Update - WC tested up to 7.2
* Fix - Fixed the bug that Kanji and Kana characters are not aligned in the first name and last name entry fields on the Payment page > Billing Information details.

= 1.1.0 - 2022-08-31 =
* Update - WC tested up to 6.8
* Update - 3D Secure 2.0 has been handled.
* Fix - Fixed the bug that caused a transition to the BadRequest screen in case of a payment error.

= 1.0.10 - 2022-04-11 =
* Update - Disabled the display of the deposit procedure in the processing and completion e-mails when depositing funds through the Online Payment Collection Agency.
* Fix - Deprecation warning for "capture_session_meta".

= 1.0.9 - 2022-04-04 =
* Update - WC tested up to 6.3
* Update - Changed status transition for Online Payment Collection Agency.
* Update - Disabled sending an email during processing when making a payment to Online Payment Collection Agency.
* Update - Changed the notation in the e-mail when there is a payment fee for Online Payment Collection Agency.

= 1.0.8 - 2022-01-31 =
* Update - WordPress tested up to 5.9
* Update - WC tested up to 6.1
* Fix - The layout of the payment information in Online Payment Collection Agency Service text message is broken.

= 1.0.7 - 2021-07-26 =
* Update - WordPress tested up to 5.8
* Update - WC tested up to 5.5
* Update - Set "(Kanji) Name" as the default setting when "Kana Name" is not set in Online Payment Collection Agency.

= 1.0.6 - 2021-06-17 =
* Fix - Fixed the bug that card information is not registered from My Account page.

= 1.0.5 - 2021-06-17 =
* Update - WordPress tested up to 5.7
* Update - WC tested up to 5.4
* Fix - Fixed the bug that card information is not registered when "Always registering as a card member" is selected.

= 1.0.4 - 2021-01-14 =
* Update - WC tested up to 4.9
* Fix - Fixed the bug that you can only select a lump-sum payment although you enable a installment and bonus payments.

= 1.0.3 - 2020-11-24 =
* Update - WordPress tested up to 5.6
* Update - WC tested up to 4.7
* Fix - Added the AES key input field.
* Fix - Fixed the bug that caused an error message to appear on the My Account page.

= 1.0.2 - 2020-10-09 =
* Fix - Fixed the sanitization.

= 1.0.1 - 2020-09-23 =
* Update - WordPress tested up to 5.5
* Update - WC tested up to 4.5
* Fix - Fixed the bug that the input field does not appear when the "Set Payment Charges" is checked.
* Fix - Fixed the bug that a payment error is caused when failing to recover from the 3D secure authentication screen.
* Fix - Changed the text domain to "sonypayment-light-for-woocommerce".
* Fix - Fixed the sanitization.

= 1.0.0 - 2020-06-01 =
* Feature - SonyPayment Credit Card Payment
* Feature - SonyPayment Online Payment Collection Agency Service
