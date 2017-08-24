// Manually define as 'bubble', 'corner', or 'box'
var jwsVisualDiscountStyle = ''; 


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
        var mode =  jwsDLConfigArray.discountmode;

        // if defined manually above
        if (typeof(jwsVisualDiscountMode) !== "undefined"){
            if (jwsVisualDiscountMode==="percent" || jwsVisualDiscountMode==="nominal"){
                var mode =  jwsVisualDiscountMode;
            }
        }

        // if specified in the url (parameter name: DiscountLabelStyle)
        if (location.search !== "undefined"){
            urlparams = location.search;
            if (urlparams.search("DiscountLabelMode=percent") !== -1){
                var mode =  "percent";
            }
            if (urlparams.search("DiscountLabelMode=nominal") !== -1){
                var mode =  "nominal";
            }
        }

        return mode;
     },
    style: function(){
        var style =  jwsDLConfigArray.display_style;

        // if defined manually above
        if (jwsVisualDiscountStyle==="bubble" || jwsVisualDiscountStyle==="corner" || jwsVisualDiscountStyle==="box"){
            var style =  jwsVisualDiscountStyle;
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
    currencySymbol: jwsDLConfigArray.currencySymbol
    ,
    offString: jwsDLConfigArray.offString
    ,   
    boxShadow: jwsDLConfigArray.boxShadow
    ,
    nominalDiscount: function(jthis){
           return Math.floor(jwsVisualDiscount.normalPrice(jthis) - jwsVisualDiscount.specialPrice(jthis));
    },
    percentDiscount: function(jthis){
           return Math.floor(jwsVisualDiscount.nominalDiscount(jthis)/jwsVisualDiscount.normalPrice(jthis)*100);
    },
    discountBubble: function(jthis){
        var myElementString = "<span class='jws-discount-label'><span class='discount'></span><span class='off'>"+jwsVisualDiscount.offString+"</span></span>";
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

            for (var k in jwsDLConfigArray){
                if ((k.search('css') !== -1) || (jwsDLConfigArray[k] === "")){
                    var prop = k.replace('css','');
                    ele.css(prop,jwsDLConfigArray[k]);
                }
            }
        return ele;
    }, adjustCornerPosition(){

        // handle position of corner style at different border widths
        var discountCornerElement = jQuery('.product .jws-discount-label.corner');
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
                    
                    // product detail 
                    if (jthis.hasClass('summary')){ 
                        if (jwsDLConfigArray.useInProductDetail === '1'){ 
                            ele = jQuery("#main");
                            ele.css('position', 'relative');
                            ele.prepend(jwsVisualDiscount.discountBubble(jthis));
                        }
                        
                    // product thumbnails
                    } else { 
                        var selector = ".woocommerce-LoopProduct-link:eq(0)";
                        var ele = jthis.find(selector);  
                        ele.before(jwsVisualDiscount.discountBubble(jthis));
                    }                  
                }
            }
        });
        jwsVisualDiscount.adjustCornerPosition();
    }
};
jwsVisualDiscount.collectSpecialItems();