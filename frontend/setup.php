<?php
// Word Press Method for adding in scripts and stylesheets
//https://wpbeaches.com/add-javascript-css-files-head-wordpress/
//https://code.tutsplus.com/articles/how-to-include-javascript-and-css-in-your-wordpress-themes-and-plugins--wp-24321

add_action( 'wp_enqueue_scripts', 'discountlabel_frontend_all_scriptsandstyles' );
function discountlabel_frontend_all_scriptsandstyles() {
//Load JS and CSS files in here
  //wp_register_script ('placeholder', get_stylesheet_directory_uri() . '/js/placeholder.js', array( 'jquery' ),'1',true);
    wp_register_style( 'discountlabel', plugins_url( '../css/style.css', __FILE__ ), array(), '', 'all' );

  //wp_enqueue_script('placeholder');
  wp_enqueue_style( 'discountlabel');

}

$configArray = get_option('options');


add_action( 'wp_footer', 'add_footer_script' );
function add_footer_script() {
$configArray = get_option('options');
?>
<script>
/* Manually Change Style or Mode by updating the following values */
var JWS_DiscountStyle = ''; // beforeproductname,bubble,corner,box
var JWS_VisualDiscountMode = ''; // percent,nominal
/******************************************************************/

jasonvisualdiscount = {
    normalPrice: function(jthis){
        var selector = 'del span.amount'; 
        return Math.abs(Number((jthis.find(selector).text()).replace(/[^0-9\.]+/g,'')));
        
    },
    specialPrice: function(jthis){
        var selector = 'ins span.amount'; 
        return Math.abs(Number((jthis.find(selector).text()).replace(/[^0-9\.]+/g,'')));
    }, 
    mode: function(){
        var mode =  '<?php echo $configArray['discountmode']; ?>';

       // if defined manually above
        if (typeof(JWS_VisualDiscountMode) != "undefined"){
            if (JWS_VisualDiscountMode==="percent" || JWS_VisualDiscountMode==="nominal"){
                var mode =  JWS_VisualDiscountMode;
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
        var style =  '<?php echo $configArray['display_style']?>';
        
        // if defined manually above
        if (typeof(JWS_DiscountStyle) != "undefined"){
            if (JWS_DiscountStyle==="bubble" || JWS_DiscountStyle==="corner" || JWS_DiscountStyle==="box"){
                var style =  jasonVisualDiscountStyle;
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
    currenySymbol: "<?php echo  html_entity_decode(get_woocommerce_currency_symbol()); ?>"
    ,
    nominalDiscount: function(jthis){
           return Math.floor(jasonvisualdiscount.normalPrice(jthis) - jasonvisualdiscount.specialPrice(jthis));
    },
    percentDiscount: function(jthis){
           return Math.floor(jasonvisualdiscount.nominalDiscount(jthis)/jasonvisualdiscount.normalPrice(jthis)*100);
    },
    discountBubble: function(jthis){
        var myElementString = "<span class='bubble'><span class='discount'></span><span class='off'>Off</span></span>";
        var ele = jQuery(myElementString); 
            /* Default, Corner, or in Title Style*/
            switch(jasonvisualdiscount.style()) {
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
            switch(jasonvisualdiscount.mode()) {
                case 'nominal':
                    ele.addClass('nominal');
                    ele.find('span.discount').text(jasonvisualdiscount.currenySymbol+jasonvisualdiscount.nominalDiscount(jthis));  
                    break;
                case 'percent':
                    ele.addClass('nominal');
                    ele.find('span.discount').text(jasonvisualdiscount.percentDiscount(jthis)+"%");  
                    break;
                default:
                    //code block
            }
            
            <?php
            
            foreach ($configArray as $key => $value) {
                if ((strpos($key, 'css') !== FALSE) || ($value =="")){ // key does not contain 'css' or value is empty
                    $key  = str_replace("css", "", $key); // remove 'css' from key before applying it as css attribute
                    echo "ele.css('".$key."',"."'$value'".");";
                }
            }
            
            ?>
        //var eleWithGroupChanges = groupspecificjasonvisualdiscount.addStyle(ele);
        return ele;
    }, adjustCornerPosition(){
        // handle position of corner style at different border widths
        var discountBubbleElement = jQuery('.product .bubble.corner');
        var originalTop = discountBubbleElement.css('top').replace('px','');
        var originalRight = discountBubbleElement.css('right').replace('px','');
        var borderWidthVal = discountBubbleElement.first().css('border-bottom-width').replace('px','');
        jQuery(discountBubbleElement).each(function(){
            jQuery(this).css({
                'top':originalTop-borderWidthVal+'px',
                'right':originalRight-borderWidthVal+'px'
            });
        });         
    } ,collectSpecialItems: function(){
        var saleProductSelector = 'ul.products li.product, .summary';
        jQuery(saleProductSelector).each(function(){

            var jthis = jQuery(this);

            // wc has no unique class for discounted products, so have to look for 2 prices for each item
            if (jthis.find('span.amount').length == 2){
                if(jasonvisualdiscount.specialPrice(jthis)){
                    if (jthis.hasClass('summary')){ // pdp 
                       if ('<?php echo $configArray['useInProductDetail']?>' == '1'){ // if pdp section enabled
                            ele = jQuery(".woocommerce-product-gallery");
                       }
                    } else { // any other type
                        var selector = ".woocommerce-LoopProduct-link:eq(0)";
                        var ele = jthis.find(selector);          
                    }
                    if(typeof ele !== "undefined"){
                        ele.before(jasonvisualdiscount.discountBubble(jthis));
                    }
                }
            }
        });
        jasonvisualdiscount.adjustCornerPosition();
    }
}
jasonvisualdiscount.collectSpecialItems();
</script>
<?php
}
