<?php

add_action('admin_head', 'discountlabel_backend_all_scriptsandstyles');
//https://css-tricks.com/snippets/wordpress/apply-custom-css-to-admin-area/
function discountlabel_backend_all_scriptsandstyles(){
    // truncated style for preview in backend
    wp_register_style( 'jsw_discountlabel_backend_preview', plugins_url( 'css/style.css', __FILE__ ), array(), '', 'all' );
    // shared between frontend and backend
    wp_register_style( 'jsw_discountlabel_shared', plugins_url( '../css/style.css', __FILE__ ), array(), '', 'all' );

  wp_enqueue_style( 'jsw_discountlabel_backend_preview');
  wp_enqueue_style( 'jsw_discountlabel_shared');
  
  /****** script(s) *********/
    wp_register_script('jsw_discountlabel_backend_script', plugins_url('js/admin.js', __FILE__), array('jquery'),'1.1', true);
    wp_enqueue_script('jsw_discountlabel_backend_script');

}

add_action('admin_menu', 'register_my_custom_submenu_page');
function register_my_custom_submenu_page() {
    
    add_submenu_page( 'woocommerce', 'My Custom Submenu Page', 'My Custom Submenu Page', 'manage_options', 'my-custom-submenu-page', 'my_custom_submenu_page_callback' ); 
}

function returnTest(){
    return 'test';
}

function getConfigurationOptions(){
    
    /***************    Assign Option Sets            ************************************************/
    $yesNoOptionList = array(
        array('1','Yes'),
        array('0','No'),
    );
    
    $displayStyleOptionList = array(
        array('bubble','Bubble'),
        array('corner','Corner'),
        array('box','Box'),
        array('beforeproductname','Before Product Name'),
    );
    
    $discountModeOptionList = array(
                        array('percent','Percent Off'),
                        array('nominal','Dollar Off'),
    );
    
    $borderWidthOptionList = array(
            array('', ''),
            array('0', '0 (no border)'),
            array('1px', '1 pixel '),
            array('2px', '2 pixels '),
            array('3px', '3 pixels '),
            array('4px', '4 pixels '),
            array('5px', '5 pixels ')
        );
    
    $borderStyleOptionList = array(
            array('', ''),
            array('solid',  'Solid'),
            array('double',  'Double'),
            array('dotted',  'Dotted'),
            array('dashed',  'Dashed'),
            array('groove',  'Groove'),
            array('ridge',  'Ridge'),
            array('inset',  'Inset'),
            array('outset',  'Outset'),
        );
    
    // $colorOptionList
    $colorList = array(
        "AliceBlue",
        "AntiqueWhite",
        "Aqua",
        "Aquamarine",
        "Azure",
        "Beige",
        "Bisque",
        "Black",
        "BlanchedAlmond",
        "Blue",
        "BlueViolet",
        "Brown",
        "BurlyWood",
        "CadetBlue",
        "Chartreuse",
        "Chocolate",
        "Coral",
        "CornflowerBlue",
        "Cornsilk",
        "Crimson",
        "Cyan",
        "DarkBlue",
        "DarkCyan",
        "DarkGoldenRod",
        "DarkGray",
        "DarkGrey",
        "DarkGreen",
        "DarkKhaki",
        "DarkMagenta",
        "DarkOliveGreen",
        "DarkOrange",
        "DarkOrchid",
        "DarkRed",
        "DarkSalmon",
        "DarkSeaGreen",
        "DarkSlateBlue",
        "DarkSlateGray",
        "DarkSlateGrey",
        "DarkTurquoise",
        "DarkViolet",
        "DeepPink",
        "DeepSkyBlue",
        "DimGray",
        "DimGrey",
        "DodgerBlue",
        "FireBrick",
        "FloralWhite",
        "ForestGreen",
        "Fuchsia",
        "Gainsboro",
        "GhostWhite",
        "Gold",
        "GoldenRod",
        "Gray",
        "Grey",
        "Green",
        "GreenYellow",
        "HoneyDew",
        "HotPink",
        "IndianRed",
        "Indigo",
        "Ivory",
        "Khaki",
        "Lavender",
        "LavenderBlush",
        "LawnGreen",
        "LemonChiffon",
        "LightBlue",
        "LightCoral",
        "LightCyan",
        "LightGoldenRodYellow",
        "LightGray",
        "LightGrey",
        "LightGreen",
        "LightPink",
        "LightSalmon",
        "LightSeaGreen",
        "LightSkyBlue",
        "LightSlateGray",
        "LightSlateGrey",
        "LightSteelBlue",
        "LightYellow",
        "Lime",
        "LimeGreen",
        "Linen",
        "Magenta",
        "Maroon",
        "MediumAquaMarine",
        "MediumBlue",
        "MediumOrchid",
        "MediumPurple",
        "MediumSeaGreen",
        "MediumSlateBlue",
        "MediumSpringGreen",
        "MediumTurquoise",
        "MediumVioletRed",
        "MidnightBlue",
        "MintCream",
        "MistyRose",
        "Moccasin",
        "NavajoWhite",
        "Navy",
        "OldLace",
        "Olive",
        "OliveDrab",
        "Orange",
        "OrangeRed",
        "Orchid",
        "PaleGoldenRod",
        "PaleGreen",
        "PaleTurquoise",
        "PaleVioletRed",
        "PapayaWhip",
        "PeachPuff",
        "Peru",
        "Pink",
        "Plum",
        "PowderBlue",
        "Purple",
        "RebeccaPurple",
        "Red",
        "RosyBrown",
        "RoyalBlue",
        "SaddleBrown",
        "Salmon",
        "SandyBrown",
        "SeaGreen",
        "SeaShell",
        "Sienna",
        "Silver",
        "SkyBlue",
        "SlateBlue",
        "SlateGray",
        "SlateGrey",
        "Snow",
        "SpringGreen",
        "SteelBlue",
        "Tan",
        "Teal",
        "Thistle",
        "Tomato",
        "Turquoise",
        "Violet",
        "Wheat",
        "White",
        "WhiteSmoke",
        "Yellow",
        "YellowGreen"
    );
    $colorListCount = count($colorList);
    $colorOptionList = array(
        array('','')
    );
    for ($x = 0; $x < $colorListCount; $x++) {
        $colorOptionList[] = array( $colorList[$x], $colorList[$x]);
    }
    
    global $allOptionValuesList;
    $allOptionValuesList = array("");
    $typeOfOptionsList = array( 'yesNo', 'displayStyle', 'discountMode', 'borderWidth', 'borderStyle', 'color');
    
    for ($i = 0; $i < count($typeOfOptionsList); $i++){
        $optionList = ${$typeOfOptionsList[$i] . 'OptionList'};
        for ($x = 0; $x < count($optionList); $x++){
            $allOptionValuesList[] = $optionList[$x][0];
        }
    }
    
    /***************    Create Configuration Array    ************************************************/
    $jsw_select_array = array();
    
    array_push($jsw_select_array, array(
                "order"=>1,
                "id"=>"jason_visualdiscount_section_general_group_enabled", 
                "slug"=>"enabled",
                "name"=>"Enabled",
                "options"=> $yesNoOptionList
                )
    );
    
    array_push($jsw_select_array, array(
                "order"=>2,
                "id"=>"jason_visualdiscount_section_general_group_style", 
                "slug"=>"display_style",
                "name"=>"Display Style",
                "options"=> $displayStyleOptionList
                )
    );
    
    array_push($jsw_select_array, array(
                "order"=>3,
                "id"=>"jason_visualdiscount_section_general_group_discountmode", 
                "slug"=>"discountmode",
                "name"=>"Discount Mode",
                "options"=> $discountModeOptionList
                )
    );

    array_push($jsw_select_array, array(
                "order"=>4,
                "id"=>"jason_visualdiscount_section_general_group_csscolor", 
                "slug"=>"csscolor",
                "name"=>"Font Color",
                "options"=> $colorOptionList
                )
    );
    
    array_push($jsw_select_array, array(
                "order"=>5,
                "id"=>"jason_visualdiscount_section_general_group_cssbackgroundColor", 
                "slug"=>"cssbackgroundColor",
                "name"=>"Background Color",
                "options"=> $colorOptionList
                )
    );
    
    array_push($jsw_select_array, array(
                "order"=>6,
                "id"=>"jason_visualdiscount_section_general_group_cssboxShadow", 
                "slug"=>"cssboxShadow",
                "name"=>"Box Shadow",
                "options"=> $yesNoOptionList
                )
    );
    
    array_push($jsw_select_array, array(
                "order"=>7,
                "id"=>"jason_visualdiscount_section_general_group_cssborderWidth", 
                "slug"=>"cssborderWidth",
                "name"=>"Border Width",
                "options"=> $borderWidthOptionList
                )
    );
    
    array_push($jsw_select_array, array(
                "order"=>8,
                "id"=>"jason_visualdiscount_section_general_group_cssborderColor", 
                "slug"=>"cssborderColor",
                "name"=>"Border Color",
                "options"=> $colorOptionList
                )
    );
    
    
    array_push($jsw_select_array, array(
                "order"=>9,
                "id"=>"jason_visualdiscount_section_general_group_cssborderStyle", 
                "slug"=>"cssborderStyle",
                "name"=>"Border Style",
                "options"=> $borderStyleOptionList
                )
    );
    
    return $jsw_select_array;
}

//build the plugin settings page
function my_custom_submenu_page_callback() {
    
    $jsw_select_array =  getConfigurationOptions();
    
    

    /***************    Assign Defaults    ************************************************/
    $options = get_option( 'options' );
    
    $options['display_style'] = isset($options['display_style']) ? $options['display_style'] : "bubble" ;
    $options['enabled'] = isset($options['enabled']) ? $options['enabled'] : "0" ;
    $options['discountmode'] = isset($options['discountmode']) ? $options['discountmode'] : "percent" ;
    $options['csscolor'] = isset($options['csscolor']) ? $options['csscolor'] : "White" ;
    $options['cssbackgroundColor'] = isset($options['cssbackgroundColor']) ? $options['cssbackgroundColor'] : "Black" ;
    $options['cssboxShadow'] = isset($options['cssboxShadow']) ? $options['cssboxShadow'] : "0" ;
    $options['cssborderWidth'] = isset($options['cssborderWidth']) ? $options['cssborderWidth'] : "" ;
    $options['cssborderColor'] = isset($options['cssborderColor']) ? $options['cssborderColor'] : "Black" ;
    $options['cssborderStyle'] = isset($options['cssborderStyle']) ? $options['cssborderStyle'] : "" ;

    /***************    sort configuration options by 'order' key     **********************/
    //define a comparison function
    function cmp($a, $b) {
        if ($a['order'] == $b['order']) {
            return 0;
        }
        return ($a['order'] < $b['order']) ? -1 : 1;
    }
    usort($jsw_select_array, "cmp");
    ?>

    <div class="wrap entry-edit">
        <div class ="discount-label-form">
            <h2><?php _e( 'Store Options', 'plugin' ) ?></h2>

            <form method="post" action="options.php">
                <?php settings_fields( 'settings-group' ); ?>
                <table class="form-table">
                    <?php for ($x = 0; $x < count($jsw_select_array); $x++): ?>
                        <tr valign="top">
                            <th scope="row"><?php _e( $jsw_select_array[$x]['name'], 'plugin' ) ?></th>
                            <td>
                                <select id="<?php echo ($jsw_select_array[$x]['id']);?>" name="options[<?php echo $jsw_select_array[$x]['slug'] ?>]" class=" select">
                                    <?php foreach($jsw_select_array[$x]['options'] as $option): ?>
                                        <option <?php selected( $options[$jsw_select_array[$x]['slug']], $option[0] ); ?> value="<?php echo $option[0];?>"><?php echo $option[1];?></option>
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
        <div class = "discount-label-preview">
            <ul class = "products">
                <li class="product type-product has-post-thumbnail product_cat-posters instock sale  purchasable ">
                        <span class="bubble corner nominal" style="color: seashell; background-color: forestgreen; border-width: 5px; border-color: darkgoldenrod; border-style: dotted;"><span class="discount">20%</span><span class="off">Off</span></span>
                        <a href="http://wp.net/index.php/product/flying-ninja/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img width="300" height="300" src="//wp.net/wp-content/uploads/2013/06/poster_2_up-300x300.jpg" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="//wp.net/wp-content/uploads/2013/06/poster_2_up-300x300.jpg 300w, //wp.net/wp-content/uploads/2013/06/poster_2_up-150x150.jpg 150w, //wp.net/wp-content/uploads/2013/06/poster_2_up-768x768.jpg 768w, //wp.net/wp-content/uploads/2013/06/poster_2_up-180x180.jpg 180w, //wp.net/wp-content/uploads/2013/06/poster_2_up-600x600.jpg 600w, //wp.net/wp-content/uploads/2013/06/poster_2_up.jpg 1000w" sizes="(max-width: 300px) 100vw, 300px"><h2 class="woocommerce-loop-product__title">Flying Ninja</h2><div class="star-rating"><span style="width:80%">Rated <strong class="rating">4.00</strong> out of 5</span></div>
                        <span class="onsale">Sale!</span>

                        <span class="price"><del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>15.00</span></del> <ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>12.00</span></ins></span>
                </li>
            </ul>
        </div>
    </div>
<?php
}



// Action hook to register the plugin option settings
add_action( 'admin_init', 'store_register_settings' );

function store_register_settings() {

    //register the array of settings
    register_setting( 'settings-group', 'options', 'sanitize_options' );

}

function sanitize_options($options) {
    
    $jsw_select_array =  getConfigurationOptions();
    
    // create the full list of all valid option values
    $allOptionValuesList = array("");
    foreach($jsw_select_array as $jsw_select):        
        foreach($jsw_select['options'] as $value): 
            $allOptionValuesList[] = $value[0];
        endforeach;
    endforeach;

    // compare each submited option value against the full list of valid value
    foreach($options as $option): 
        if (!in_array($option, $allOptionValuesList))
            // a submitted value does not match any valid value
              {
                    // add_settings_error( $setting, $code, $message, $type )
                    $message = __('Oh noes! There was a problem.');
                    $type = 'error';
                    add_settings_error('my_option_notice', 'my_option_notice', $message, $type);
                    return;
              }
    endforeach;
    
    return $options;

}
