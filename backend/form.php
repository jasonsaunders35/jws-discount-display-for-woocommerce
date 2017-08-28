<?php

add_action('admin_head', 'discountlabel_backend_all_scriptsandstyles');
function discountlabel_backend_all_scriptsandstyles(){
    wp_register_style( 'jws_discountlabel_backend_preview', plugins_url( 'css/style.css', __FILE__ ), array(), '', 'all' );
    wp_register_style( 'jws_discountlabel_shared', plugins_url( '../css/style.css', __FILE__ ), array(), '', 'all' );
    wp_enqueue_style( 'jws_discountlabel_backend_preview');
    wp_enqueue_style( 'jws_discountlabel_shared');
  
    wp_register_script('jws_discountlabel_backend_script', plugins_url('js/admin.js', __FILE__), array('jquery'),'1.1', true);
    wp_enqueue_script('jws_discountlabel_backend_script');
}

add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker' );
function mw_enqueue_color_picker( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker', plugins_url('load-scipts.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}

function my_custom_submenu_page_callback() {

    /***************    Assign Defaults    ************************************************/
    $options = get_option( 'discountlabeloptions' );
	if (! is_array($options)){ 
		$options = []; 
	} 
    
    $options['display_style'] = isset($options['display_style']) ? $options['display_style'] : "bubble" ;
    $options['enabled'] = isset($options['enabled']) ? $options['enabled'] : "0" ;
    $options['discountmode'] = isset($options['discountmode']) ? $options['discountmode'] : "percent" ;
    $options['csscolor'] = isset($options['csscolor']) ? $options['csscolor'] : "#c90d00" ;
    $options['cssbackgroundColor'] = isset($options['cssbackgroundColor']) ? $options['cssbackgroundColor'] : "#27f4e0" ;
    $options['boxShadow'] = isset($options['boxShadow']) ? $options['boxShadow'] : "0" ;
    $options['cssborderWidth'] = isset($options['cssborderWidth']) ? $options['cssborderWidth'] : "2px" ;
    $options['cssborderColor'] = isset($options['cssborderColor']) ? $options['cssborderColor'] : "#108c00" ;
    $options['cssborderStyle'] = isset($options['cssborderStyle']) ? $options['cssborderStyle'] : "dashed" ;
    $options['useInProductDetail'] = isset($options['useInProductDetail']) ? $options['useInProductDetail'] : "1" ;
    $options['previewProduct'] = isset($options['previewProduct']) ? $options['previewProduct'] : wc_get_product_ids_on_sale()[0] ;

    /**************    Set Product for Preview ********************************************/
    
    $product_id = $options['previewProduct'];
    $product = wc_get_product($product_id);
    $title =  esc_html($product->get_title());
    $regular_price_int = esc_html($product->get_regular_price());
    $sale_price_int = esc_html($product->get_sale_price());
    
    $dollar_discount = esc_html(floor($regular_price_int - $sale_price_int));
    $percent_discount = esc_html(floor((($regular_price_int - $sale_price_int) / $regular_price_int)*100));
    
            
    $regular_price = esc_html(number_format((float)$product->get_regular_price(),2, '.', ''));
    $sale_price = esc_html(number_format((float)$product->get_sale_price(),2, '.', ''));
    $img_src = esc_attr(wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'single-post-thumbnail' )[0]);
    

    /***************    sort configuration options by 'order' key     **********************/
	$jws_select_array =  getConfigurationOptions();
    
	//define a comparison function
    function cmp($a, $b) {
        if ($a['order'] == $b['order']) {
            return 0;
        }
        return ($a['order'] < $b['order']) ? -1 : 1;
    }
    usort($jws_select_array, "cmp");
    ?>

    <script>
        var dollar_discount = '<?php echo $dollar_discount; ?>';
        var percent_discount = '<?php echo $percent_discount; ?>';
        var currencySymbol = "<?php echo  html_entity_decode(get_woocommerce_currency_symbol());?>"
        
        <?php for ($x = 0; $x < count($jws_select_array); $x++): 
            if( stripos($jws_select_array[$x]['slug'], 'color') !== false):
                $colorProperties[] = $jws_select_array[$x]['slug'];
            endif;
        endfor;
        for ($x = 0; $x < count($colorProperties); $x++):?>

            var <?php echo $colorProperties[$x];?>Options = {
                change: function(event, ui){
                    jQueryCssProp = '<?php echo str_replace("css","",$colorProperties[$x]);?>';
                    jQuery(".jws-discount-label").css( jQueryCssProp, ui.color.toString());
                },
            };
        <?php endfor; ?>
    
        jQuery(document).ready(function($){
        <?php for ($x = 0; $x < count($colorProperties); $x++):?>
            // setup color pickers
            jQuery('.<?php echo $colorProperties[$x]; ?>').wpColorPicker(<?php echo $colorProperties[$x];?>Options);
            
            //onPageLoad
            jQueryCssProp = '<?php echo str_replace("css","",$colorProperties[$x]);?>';
            jQuery(".jws-discount-label").css( jQueryCssProp, jQuery('.<?php echo $colorProperties[$x]; ?>').val());
        <?php endfor; ?>
        });
    </script>

    <div class="wrap entry-edit">
        <div class ="discount-label-form">
            <?php settings_errors() ?>

            <form method="post" action="options.php">
                <?php settings_fields( 'settings-group' ); ?>
                <h2><?php echo esc_html__( 'General Settings', 'jwsdiscountlabel' ) ?></h2>
                <table class="form-table">
                    <?php 
                    // For the top 'General' Settings
                    for ($x = 0; $x < count($jws_select_array)-2; $x++): 
                        // If Color Property
                        if( stripos($jws_select_array[$x]['slug'], 'color') === false):?> 
                            <tr valign="top" id="tr-<?php echo $jws_select_array[$x]['slug'];?>">
                                <th scope="row"><?php echo esc_html__( $jws_select_array[$x]['name'], 'jwsdiscountlabel' ) ?></th>
                                <td>
                                    <select id="<?php echo ($jws_select_array[$x]['slug']);?>" name="discountlabeloptions[<?php echo $jws_select_array[$x]['slug'] ?>]" class="select">
                                        <?php foreach($jws_select_array[$x]['options'] as $option): ?>
                                            <option <?php selected( $options[$jws_select_array[$x]['slug']], $option[0] ); ?> value="<?php echo $option[0];?>"><?php echo esc_html__($option[1]);?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                        <?php 
                        // Else (Non-Color Property)
                        else: ?> 
                            <tr valign="top" id="tr-<?php echo $jws_select_array[$x]['slug'];?>">
                                <th scope="row"><?php echo esc_html__($jws_select_array[$x]['name'], 'jwsdiscountlabel' ) ?></th>
                                <td>
                                    <input type="text" id="<?php echo ($jws_select_array[$x]['slug']);?>" name="discountlabeloptions[<?php echo $jws_select_array[$x]['slug'] ?>]"  value="<?php echo $options[$jws_select_array[$x]['slug']];?>" class="<?php echo $jws_select_array[$x]['slug'];?>" />
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endfor; ?>
                </table>
                <h2 class='advanced'><?php echo esc_html__( 'Advanced Settings', 'jwsdiscountlabel' ) ?></h2>
                <table class="form-table">
                    <?php 
                    // FOR last 2 'Advanced' Settings
                    for ($x =  count($jws_select_array)-2; $x < count($jws_select_array); $x++): ?>
                        <tr valign="top" id="tr-<?php echo $jws_select_array[$x]['slug'];?>">
                            <th scope="row"><?php echo esc_html__( $jws_select_array[$x]['name'], 'jwsdiscountlabel' ) ?></th>
                            <td>
                                <select id="<?php echo ($jws_select_array[$x]['slug']);?>" name="discountlabeloptions[<?php echo $jws_select_array[$x]['slug'] ?>]" class=" select">
                                    <?php foreach($jws_select_array[$x]['options'] as $option): ?>
                                        <option <?php selected( $options[$jws_select_array[$x]['slug']], $option[0] ); ?> value="<?php echo $option[0];?>"><?php echo esc_html($option[1], 'jwsdiscountlabel' );?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                    <?php endfor; ?>
                </table>
                <div class = 'instruction'>*Save Changes to update the preview product.</div>
                <p class="submit">
                    <input type="submit" class="button-primary" value="<?php _e( 'Save Changes', 'jwsdiscountlabel' ); ?>" />
                </p>

            </form>
        </div>
        <div class = "discount-label-preview">
            <h2><?php echo esc_html__( 'Preview', 'jwsdiscountlabel' ) ?></h2>
            <ul class = "products">
                <li class="product type-product has-post-thumbnail product_cat-posters instock sale  purchasable ">
                    <span class="jws-discount-label" style="display:none;"><span class="discount"></span><span class="off"><?php echo esc_html__('Off', 'jwsdiscountlabel'); ?></span></span>
                    <a href="javascript:void(0)" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                        <img width="300" height="300" src="<?php echo $img_src; ?>" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="">
                        <h2 class="woocommerce-loop-product__title"><?php echo $title; ?></h2>
                        <span class="onsale">Sale!</span>
                        <span class="price">
                            <del>
                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span><?php echo $regular_price;?></span>
                            </del> 
                            <ins>
                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span><?php echo $sale_price; ?></span>
                            </ins>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
<?php
}
