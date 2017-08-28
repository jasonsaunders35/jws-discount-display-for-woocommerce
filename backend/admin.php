<?php

add_action('admin_menu', 'register_my_custom_submenu_page');
function register_my_custom_submenu_page() {
    
    add_submenu_page( 'woocommerce', 'Discount Display', 'Discount Display', 'manage_options', 'discount-display', 'my_custom_submenu_page_callback' ); 
}

require dirname( __FILE__ ) . '/options.php';
require dirname( __FILE__ ) . '/form.php';
require dirname( __FILE__ ) . '/validation.php';



