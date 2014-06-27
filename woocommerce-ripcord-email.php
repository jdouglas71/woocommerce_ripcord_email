<?php
/**
 * Plugin Name: WooCommerce Ripcord Email
 * Description: Plugin for adding a custom WooCommerce email for Ripcord.
 * Author: jdouglas71
 * Version: 0.1
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 *  Add a custom email to the list of emails WooCommerce should load
 *
 * @since 0.1
 * @param array $email_classes available email classes
 * @return array filtered available email classes
 */
function add_ripcord_woocommerce_email( $email_classes ) 
{
	error_log( "Loading my mail classes.", 3, get_template_directory()."/mail.log" );
	// include our custom email class
	require_once( 'includes/class-test-order-email.php' );
	require_once( 'includes/class-wc-ripcord-welcome-email.php' );

	// add the email class to the list of email classes that WooCommerce loads
	$email_classes['WC_Test_Order_Email'] = new WC_Test_Order_Email();
	$email_classes['WC_Ripcord_Welcome_Email'] = new WC_Ripcord_Welcome_Email();

	return $email_classes;

}
add_filter( 'woocommerce_email_classes', 'add_ripcord_woocommerce_email' );


