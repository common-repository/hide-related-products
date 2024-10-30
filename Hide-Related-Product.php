<?php
/**
 * Plugin Name:       Hide Related Products
 * Description:       Install plugin to remove related products from your product page.
 * Version:           1.0
 * Author:            Shama
 * Author URI:        https://profiles.wordpress.org/shama14/
 * License: GPL v3
 */
register_activation_hook( __FILE__, 'hrp_remove_related_products' );

    function hrp_remove_related_products() 
{

  remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
}
 
add_action( 'init', 'hrp_remove_related_products', 10 );

function hrp_romeve_product_deactivating() {
return
is_admin() &&
isset( $_GET[‘action’] ) &&
isset( $_GET[‘plugin’] ) &&
‘deactivate’ === $_GET[‘action’] &&
‘myplugin/myplugin.php’ === $_GET[‘plugin’];

}
register_deactivation_hook( __FILE__, 'hrp_romeve_product_deactivating' );