<?php

add_action('admin_menu', 'register_my_custom_submenu_page');
function register_my_custom_submenu_page() {
    
    add_submenu_page( 'woocommerce', 'Discount Label', 'Discount Label', 'manage_options', 'discount-label', 'my_custom_submenu_page_callback' ); 
}

require dirname( __FILE__ ) . '/options.php';
require dirname( __FILE__ ) . '/form.php';
require dirname( __FILE__ ) . '/validation.php';



