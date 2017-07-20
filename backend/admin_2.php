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

//build the plugin settings page
function my_custom_submenu_page_callback() {

    //load the plugin options array
    $options = get_option( 'halloween_options' );
    
    ?>
    <div class="wrap">
    <h2><?php _e( 'Halloween Store Options', 'halloween-plugin' ) ?></h2>
    <?php var_dump($display_style);?>

    <form method="post" action="options.php">
        <?php settings_fields( 'halloween-settings-group' ); ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row"><?php _e( 'Display Style', 'halloween-plugin' ) ?></th>
                <td>
                    <select id="jason_visualdiscount_section_general_group_style" name="halloween_options[display_style]" class=" select">
                        <option <?php selected( $options['display_style'], 'bubble' ); ?> value="bubble">Bubble</option>
                        <option <?php selected( $options['display_style'], 'corner' ); ?> value="corner">Corner</option>
                        <option <?php selected( $options['display_style'], 'box' ); ?> value="box">Box</option>
                        <option <?php selected( $options['display_style'], 'beforeproductname' ); ?> value="beforeproductname">Before Product Name</option>
                    </select>
                </td>
            </tr>
        </table>

        <p class="submit">
        <input type="submit" class="button-primary" value="<?php _e( 'Save Changes', 'halloween-plugin' ); ?>" />
        </p>

    </form>
    </div>
<?php
}

// Action hook to register the plugin option settings
add_action( 'admin_init', 'halloween_store_register_settings' );

function halloween_store_register_settings() {

    //register the array of settings
    register_setting( 'halloween-settings-group', 'halloween_options', 'halloween_sanitize_options' );

}

function halloween_sanitize_options( $options ) {

	$options['display_style'] = ( ! empty( $options['display_style'] ) ) ? sanitize_text_field( $options['display_style'] ) : '';
	return $options;

}
