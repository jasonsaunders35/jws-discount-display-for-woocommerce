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
    
    
            
    $jsw_select_array = array(
            array(
                "id"=>"jason_visualdiscount_section_general_group_style", 
                "slug"=>"display_style",
                "name"=>"Display Style",
                "options"=>
                    array(
                        array('bubble','Bubble', 0),
                        array('corner','Corner', 0),
                        array('box','Box', 1),
                        array('beforeproductname','Before Product Name', 0),
                    )
                )
      );
            
    $options = get_option( 'options' );

    // Assign Defaults
        //delete_option('options'); 
    if ($options['display_style'] == ""){
        $options['display_style'] = "box";
    }
    ?>
    <div class="wrap">
    <h2><?php _e( 'Store Options', 'plugin' ) ?></h2>
    <?php //var_dump($options);?>
    <?php //var_dump(count($jsw_select_array));?>

    <form method="post" action="options.php">
        <?php settings_fields( 'settings-group' ); ?>
        <table class="form-table">
            <!--
            <tr valign="top">
                <th scope="row"><?php _e( 'Display Style', 'plugin' ) ?></th>
                <td>
                    <select id="jason_visualdiscount_section_general_group_style" name="options[display_style]" class=" select">
                        <option <?php selected( $options['display_style'], 'bubble' ); ?> value="bubble">Bubble</option>
                        <option <?php selected( $options['display_style'], 'corner' ); ?> value="corner">Corner</option>
                        <option <?php selected( $options['display_style'], 'box' ); ?> value="box">Box</option>
                        <option <?php selected( $options['display_style'], 'beforeproductname' ); ?> value="beforeproductname">Before Product Name</option>
                    </select>
                </td>
            </tr>
            -->
            
            <?php for ($x = 0; $x < count($jsw_select_array); $x++): ?>
                <tr valign="top">
                    <th scope="row"><?php _e( $jsw_select_array[$x]['name'], 'plugin' ) ?></th>
                    <td>
                        <select id="<?php echo ($jsw_select_array[$x]['id']);?>" name="options[<?php echo $jsw_select_array[$x]['slug'] ?>]" class=" select">
                            <?php foreach($jsw_select_array[$x]['options'] as $option): ?>
                                <option <?php selected( $options['display_style'], $option[0] ); ?> value="<?php echo $option[0];?>"><?php echo $option[1];?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
            <?php endfor; ?>
        </table>

        <p class="submit">
        <input type="submit" class="button-primary" value="<?php _e( 'Save Changes', 'plugin' ); ?>" />
        </p>

    </form>
    </div>
<?php
}

// Action hook to register the plugin option settings
add_action( 'admin_init', 'store_register_settings' );

function store_register_settings() {

    //register the array of settings
    register_setting( 'settings-group', 'options', 'sanitize_options' );

}

function sanitize_options( $options ) {

	$options['display_style'] = ( ! empty( $options['display_style'] ) ) ? sanitize_text_field( $options['display_style'] ) : '';
	return $options;

}
