<?php

add_action( 'wp_enqueue_scripts', 'discountlabel_frontend_all_scriptsandstyles' );
function discountlabel_frontend_all_scriptsandstyles() {
    wp_register_style( 'discountlabel', plugins_url( '../css/style.css', __FILE__ ), array(), '', 'all' );
    wp_enqueue_style( 'discountlabel');
}

add_action( 'wp_footer', 'add_footer_script' );
function add_footer_script() {
    $config_array = get_option( 'discountlabeloptions' );
    ?>
    <script>
    // Manually Change Style or Mode by updating the following values
    var jwsDiscountStyle = ''; 
    var jwsVisualDiscountMode = ''; 

    var jwsVisualDiscount = {
        normalPrice: function(jthis){
            var selector = 'del span.amount'; 
            return Math.abs(Number((jthis.find(selector).text()).replace(/[^0-9\.]+/g,'')));

        },
        specialPrice: function(jthis){
            var selector = 'ins span.amount'; 
            return Math.abs(Number((jthis.find(selector).text()).replace(/[^0-9\.]+/g,'')));
        }, 
        mode: function(){
            var mode =  '<?php echo $config_array['discountmode']; ?>';

            // if defined manually above
            if (typeof(jwsVisualDiscountMode) != "undefined"){
                if (jwsVisualDiscountMode==="percent" || jwsVisualDiscountMode==="nominal"){
                    var mode =  jwsVisualDiscountMode;
                }
            }

            // if specified in the url (parameter name: DiscountLabelStyle)
            if (location.search != "undefined"){
                urlparams = location.search;
                if (urlparams.search("DiscountLabelMode=percent")!=-1){
                    var mode =  "percent";
                }
                if (urlparams.search("DiscountLabelMode=nominal")!=-1){
                    var mode =  "nominal";
                }
            }
            
            return mode;
         },
        style: function(){
            var style =  '<?php echo $config_array['display_style']?>';

            // if defined manually above
            if (typeof(jwsDiscountStyle) != "undefined"){
                if (jwsDiscountStyle==="bubble" || jwsDiscountStyle==="corner" || jwsDiscountStyle==="box"){
                    var style =  jws_VisualDiscountStyle;
                }
            }

            // if specified in the url (parameter name: DiscountLabelStyle)
            if (location.search != "undefined"){
                urlparams = location.search;
                if (urlparams.search("DiscountLabelStyle=bubble")!=-1){
                    var style =  "bubble";
                }
                if (urlparams.search("DiscountLabelStyle=corner")!=-1){
                    var style =  "corner";
                }
                if (urlparams.search("DiscountLabelStyle=box")!=-1){
                    var style =  "box";
                }
            }
            return style;
        },
        currencySymbol: "<?php echo  html_entity_decode(get_woocommerce_currency_symbol()); ?>"
        ,
        offString: "<?php echo esc_html__('Off','jwsdiscountlabel') ?>"
        ,   
        boxShadow: '<?php echo esc_attr($config_array['boxShadow'])?>'
        ,
        nominalDiscount: function(jthis){
               return Math.floor(jwsVisualDiscount.normalPrice(jthis) - jwsVisualDiscount.specialPrice(jthis));
        },
        percentDiscount: function(jthis){
               return Math.floor(jwsVisualDiscount.nominalDiscount(jthis)/jwsVisualDiscount.normalPrice(jthis)*100);
        },
        discountBubble: function(jthis){
            var myElementString = "<span class='bubble'><span class='discount'></span><span class='off'>"+jwsVisualDiscount.offString+"</span></span>";
            var ele = jQuery(myElementString); 
                switch(jwsVisualDiscount.style()) {
                    case 'corner':
                        ele.addClass('corner');
                        break;
                    case 'box':
                        ele.addClass('box');
                        break;
                    default:
                        //code block
                }

                /* Discount or Percent*/
                switch(jwsVisualDiscount.mode()) {
                    case 'nominal':
                        ele.find('span.discount').text(jwsVisualDiscount.currencySymbol+jwsVisualDiscount.nominalDiscount(jthis));  
                        break;
                    case 'percent':
                        ele.find('span.discount').text(jwsVisualDiscount.percentDiscount(jthis)+"%");  
                        break;
                    default:
                        //code block
                }
                
                /* AddBoxShadow */
                if ('1' === jwsVisualDiscount.boxShadow){
                    ele.addClass('boxshadow');
                }
            <?php         
                foreach ($config_array as $key => $value) {
                    
                    // key does (not not) contain 'css' or value is empty
                    if ((strpos($key, 'css') !== FALSE) || ($value ==="")){ 
                        
                        // remove 'css' from key before applying it as css attribute
                        $key  = str_replace("css", "", $key); 
                        echo "ele.css('".$key."',"."'$value'".");";
                    }
                }
            ?>
            return ele;
        }, adjustCornerPosition(){
            
            // handle position of corner style at different border widths
            var discountCornerElement = jQuery('.product .bubble.corner');
            if (discountCornerElement.length > 0){
                var originalTop = discountCornerElement.css('top').replace('px','');
                var originalRight = discountCornerElement.css('right').replace('px','');
                var borderWidthVal = discountCornerElement.first().css('border-bottom-width').replace('px','');
                jQuery(discountCornerElement).each(function(){
                    jQuery(this).css({
                        'top':originalTop-borderWidthVal+'px',
                        'right':originalRight-borderWidthVal+'px'
                    });
                }); 
            }
        } ,collectSpecialItems: function(){
            var saleProductSelector = 'ul.products li.product, .summary';
            jQuery(saleProductSelector).each(function(){

                var jthis = jQuery(this);

                // wc has no unique class for discounted products, so have to look for 2 prices for each item
                if (jthis.find('span.amount').length === 2){
                    if(jwsVisualDiscount.specialPrice(jthis)){
                        if (jthis.hasClass('summary')){ // pdp 
                           if ('<?php echo $config_array['useInProductDetail']?>' === '1'){ // if pdp section enabled
                                ele = jQuery(".woocommerce-product-gallery");
                           }
                        } else { // any other type
                            var selector = ".woocommerce-LoopProduct-link:eq(0)";
                            var ele = jthis.find(selector);          
                        }
                        if(typeof ele !== "undefined"){
                            ele.before(jwsVisualDiscount.discountBubble(jthis));
                        }
                    }
                }
            });
            jwsVisualDiscount.adjustCornerPosition();
        }
    }
    jwsVisualDiscount.collectSpecialItems();
    </script>
    <?php
}