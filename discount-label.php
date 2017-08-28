<?php

/**
* Plugin Name: JWS Discount Label for WooCommerce
* Description: Displays each discounted product's dollar or percent discount
* Version: 1.0.0
* Author: Jason William Saunders 
* License: GPL2
* Requires at least: 4.4
* Tested up to: 4.8
* 
* Text Domain: jwsdiscountlabel
*/


if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

    // Frontend 
    require dirname( __FILE__ ) . '/frontend/setup.php';

    // Backend
    require dirname( __FILE__ ) . '/backend/admin.php';
}

add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'jws_discount_label_action_links');
function jws_discount_label_action_links($links) {
    global $woocommerce;
    if (version_compare($woocommerce->version, "2.1", ">=")) {
        $setting_url = 'admin.php?page=discount-label';
        // original from woocommerce-enhanced-ecommerce-google-analytics-integration plugin
    }
    $links[] = '<a href="' . get_admin_url(null, $setting_url) . '">Settings</a>';
    return $links;
}
