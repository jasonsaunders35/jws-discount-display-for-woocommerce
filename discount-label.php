<?php

/**
* Plugin Name: JWS Discount Label
* Description: Creates labels for discounted products that display each product's dollar or percent discount
* Version: 1.0.0
* Author: Jason William Saunders 
* License: GPL2
*/
//define('WP_DEBUG', true);

define( 'JWS__PLUGIN_DIR', plugin_dir_path( __FILE__ ));

// Frontend 
require dirname( __FILE__ ) . '/frontend/setup.php';

// Backend
require dirname( __FILE__ ) . '/backend/admin.php';