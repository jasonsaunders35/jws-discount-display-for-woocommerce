<?php


add_action('admin_head', 'discountlabel_backend_all_scriptsandstyles');
//https://css-tricks.com/snippets/wordpress/apply-custom-css-to-admin-area/

function discountlabel_backend_all_scriptsandstyles(){
//Load JS and CSS files in here
  //wp_register_script ('placeholder', get_stylesheet_directory_uri() . '/js/placeholder.js', array( 'jquery' ),'1',true);
    wp_register_style( 'discountlabel', plugins_url( '../css/style.css', __FILE__ ), array(), '', 'all' );

  //wp_enqueue_script('placeholder');
  wp_enqueue_style( 'discountlabel');
}

add_action('admin_menu', 'register_my_custom_submenu_page');

function register_my_custom_submenu_page() {
    add_submenu_page( 'woocommerce', 'My Custom Submenu Page', 'My Custom Submenu Page', 'manage_options', 'my-custom-submenu-page', 'my_custom_submenu_page_callback' ); 
}

function my_custom_submenu_page_callback() {?>
<h1>Visual Discount</h1>
<form action="<?php echo str_replace('%7E', '~', $_SERVER['REQUEST_URI']); ?>" method="post">
<?php require dirname( __FILE__ ) . '/components/fieldset.php'; ?>
</form>



<?php } ?>