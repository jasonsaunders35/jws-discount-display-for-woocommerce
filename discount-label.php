<?php

/**
* Plugin Name: JWS Discount Label
* Description: Creates labels for discounted products that display each product's dollar or percent discount
* Version: 1.0.0
* Author: Jason William Saunders 
* License: GPL2
*/
//define('WP_DEBUG', true);


if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    define( 'JWS__PLUGIN_DIR', plugin_dir_path( __FILE__ ));

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
        // originall from woocommerce-enhanced-ecommerce-google-analytics-integration plugin
    }
    $links[] = '<a href="' . get_admin_url(null, $setting_url) . '">Settings</a>';
    return $links;
}



/* todo add star rating to preview*/

?>

