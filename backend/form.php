<?php

add_action('admin_head', 'discountlabel_backend_all_scriptsandstyles');
function discountlabel_backend_all_scriptsandstyles(){
    wp_register_style( 'jsw_discountlabel_backend_preview', plugins_url( 'css/style.css', __FILE__ ), array(), '', 'all' );
    wp_register_style( 'jsw_discountlabel_shared', plugins_url( '../css/style.css', __FILE__ ), array(), '', 'all' );
    wp_enqueue_style( 'jsw_discountlabel_backend_preview');
    wp_enqueue_style( 'jsw_discountlabel_shared');
  
    wp_register_script('jsw_discountlabel_backend_script', plugins_url('js/admin.js', __FILE__), array('jquery'),'1.1', true);
    wp_enqueue_script('jsw_discountlabel_backend_script');
}

// color picker
add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker' );
function mw_enqueue_color_picker( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'my-script-handle', plugins_url('my-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}

function my_custom_submenu_page_callback() {
    
    $jsw_select_array =  getConfigurationOptions();
    
    

    /***************    Assign Defaults    ************************************************/
    $options = get_option( 'discountlabeloptions' );
    
    $options['display_style'] = isset($options['display_style']) ? $options['display_style'] : "bubble" ;
    $options['enabled'] = isset($options['enabled']) ? $options['enabled'] : "0" ;
    $options['discountmode'] = isset($options['discountmode']) ? $options['discountmode'] : "percent" ;
    $options['csscolor'] = isset($options['csscolor']) ? $options['csscolor'] : "#c90d00" ;
    $options['cssbackgroundColor'] = isset($options['cssbackgroundColor']) ? $options['cssbackgroundColor'] : "#27f4e0" ;
    $options['cssboxShadow'] = isset($options['cssboxShadow']) ? $options['cssboxShadow'] : "0" ;
    $options['cssborderWidth'] = isset($options['cssborderWidth']) ? $options['cssborderWidth'] : "2px" ;
    $options['cssborderColor'] = isset($options['cssborderColor']) ? $options['cssborderColor'] : "#108c00" ;
    $options['cssborderStyle'] = isset($options['cssborderStyle']) ? $options['cssborderStyle'] : "dashed" ;
    $options['useInProductDetail'] = isset($options['useInProductDetail']) ? $options['useInProductDetail'] : "1" ;
    $options['previewProduct'] = isset($options['previewProduct']) ? $options['previewProduct'] : wc_get_product_ids_on_sale()[0] ;
    
    /**************    Set Product for Preview ********************************************/
    
    $product_id = $options['previewProduct'];
    $product = wc_get_product($product_id);
    $title =  $product->get_title();
    $regular_price_int = $product->get_regular_price();
    $sale_price_int = $product->get_sale_price();
    
    $dollar_discount = floor($regular_price_int - $sale_price_int);
    $percent_discount = floor((($regular_price_int - $sale_price_int) / $regular_price_int)*100);
    
            
    $regular_price = number_format((float)$product->get_regular_price(),2, '.', '');
    $sale_price = number_format((float)$product->get_sale_price(),2, '.', '');
    $img_src = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'single-post-thumbnail' )[0];
    

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

    <script>
        var dollar_discount = '<?php echo $dollar_discount; ?>';
        var percent_discount = '<?php echo $percent_discount; ?>';
        
        <?php for ($x = 0; $x < count($jsw_select_array); $x++): 
            if( stripos($jsw_select_array[$x]['slug'], 'color') !== false):
                $colorProperties[] = $jsw_select_array[$x]['slug'];
            endif;
        endfor;
        for ($x = 0; $x < count($colorProperties); $x++):?>

            var <?php echo $colorProperties[$x];?>Options = {
                change: function(event, ui){
                    jQueryCssProp = '<?php echo str_replace("css","",$colorProperties[$x]);?>';
                    jQuery(".bubble").css( jQueryCssProp, ui.color.toString());
                },
            };
        // on page load
        //jQuery(".bubble").css( jQueryCssProp, jQuery('.<?php echo $colorProperties[$x]; ?>').val());
        <?php endfor; ?>
    
        jQuery(document).ready(function($){
        <?php for ($x = 0; $x < count($colorProperties); $x++):?>
            // setup color pickers
            jQuery('.<?php echo $colorProperties[$x]; ?>').wpColorPicker(<?php echo $colorProperties[$x];?>Options);
            
            //onPageLoad
            jQueryCssProp = '<?php echo str_replace("css","",$colorProperties[$x]);?>';
            jQuery(".bubble").css( jQueryCssProp, jQuery('.<?php echo $colorProperties[$x]; ?>').val());
        <?php endfor; ?>
        });
    </script>

    <div class="wrap entry-edit">
        <div class ="discount-label-form">
            <?php settings_errors() ?>

            <form method="post" action="options.php">
                <?php settings_fields( 'settings-group' ); ?>
                <h2><?php _e( 'General Settings', 'plugin' ) ?></h2>
                <table class="form-table">
                    <?php for ($x = 0; $x < count($jsw_select_array)-2; $x++): 
                        if( stripos($jsw_select_array[$x]['slug'], 'color') === false):?>
                            <tr valign="top" id="tr-<?php echo $jsw_select_array[$x]['slug'];?>">
                                <th scope="row"><?php _e( $jsw_select_array[$x]['name'], 'plugin' ) ?></th>
                                <td>
                                    <select id="<?php echo ($jsw_select_array[$x]['slug']);?>" name="discountlabeloptions[<?php echo $jsw_select_array[$x]['slug'] ?>]" class=" select">
                                        <?php foreach($jsw_select_array[$x]['options'] as $option): ?>
                                            <option <?php selected( $options[$jsw_select_array[$x]['slug']], $option[0] ); ?> value="<?php echo $option[0];?>"><?php echo $option[1];?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                        <?php else: ?>
                            <tr valign="top" id="tr-<?php echo $jsw_select_array[$x]['slug'];?>">
                                <th scope="row"><?php _e( $jsw_select_array[$x]['name'], 'plugin' ) ?></th>
                                <td>
                                    <input type="text" id="<?php echo ($jsw_select_array[$x]['slug']);?>" name="discountlabeloptions[<?php echo $jsw_select_array[$x]['slug'] ?>]"  value="<?php echo $options[$jsw_select_array[$x]['slug']];?>" class="<?php echo $jsw_select_array[$x]['slug'];?>" />
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endfor; ?>
                </table>
                <h2 class='advanced'><?php _e( 'Advanced Settings', 'plugin' ) ?></h2>
                <table class="form-table">
                    <?php for ($x =  count($jsw_select_array)-2; $x < count($jsw_select_array); $x++): ?>
                        <tr valign="top" id="tr-<?php echo $jsw_select_array[$x]['slug'];?>">
                            <th scope="row"><?php _e( $jsw_select_array[$x]['name'], 'plugin' ) ?></th>
                            <td>
                                <select id="<?php echo ($jsw_select_array[$x]['slug']);?>" name="discountlabeloptions[<?php echo $jsw_select_array[$x]['slug'] ?>]" class=" select">
                                    <?php foreach($jsw_select_array[$x]['options'] as $option): ?>
                                        <option <?php selected( $options[$jsw_select_array[$x]['slug']], $option[0] ); ?> value="<?php echo $option[0];?>"><?php echo $option[1];?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                    <?php endfor; ?>
                </table>
                <div class = 'instruction'>*Save Changes to update the preview product.</div>
                <p class="submit">
                    <input type="submit" class="button-primary" value="<?php _e( 'Save Changes', 'plugin' ); ?>" />
                </p>

            </form>
        </div>
        <div class = "discount-label-preview">
            <h2><?php _e( 'Preview', 'plugin' ) ?></h2>
            <ul class = "products">
                <li class="product type-product has-post-thumbnail product_cat-posters instock sale  purchasable ">
                        <span class="bubble" style="display:none;"><span class="discount">20%</span><span class="off">Off</span></span>
                        <a href="javascript:void(0)" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img width="300" height="300" src="<?php echo $img_src; ?>" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt=""><h2 class="woocommerce-loop-product__title"><?php echo $title; ?></h2><div class="star-rating"><span style="width:80%">Rated <strong class="rating">4.00</strong> out of 5</span></div>
                        <span class="onsale">Sale!</span>
                        <span class="price"><del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span><?php echo $regular_price;?></span></del> <ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span><?php echo $sale_price; ?></span></ins></span>
                </li>
            </ul>
        </div>
    </div>
<?php
}