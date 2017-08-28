// Manually define as 'bubble', 'corner', or 'box'
var jwsVisualDiscountStyle = ''; 

// Manually define as 'percent' or 'nominal'
var jwsVisualDiscountMode = ''; 

// jwsDLConfigArray defined in setup.php 
var jwsDLConfigArray = jwsDLConfigArray;

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
        if ( "undefined" === ! typeof(jwsVisualDiscountMode)){
            if ("percent" === jwsVisualDiscountMode || "nominal" === jwsVisualDiscountMode){
                var mode =  jwsVisualDiscountMode;
            }
        }

        // if specified in the url (parameter name: DiscountLabelStyle)
        if ("undefined" !== location.search ){
            urlparams = location.search;
            if (-1 !== urlparams.search("DiscountLabelMode=percent")){
                var mode =  "percent";
            }
            if (-1 !== urlparams.search("DiscountLabelMode=nominal")){
                var mode =  "nominal";
            }
        }
        return mode;
     },
    style: function(){
        var style =  jwsDLConfigArray.display_style;

        // if defined manually above
        if ("bubble" === jwsVisualDiscountStyle|| "corner" ===jwsVisualDiscountStyle || "box"  ===jwsVisualDiscountStyle){
            var style =  jwsVisualDiscountStyle;
        }

        // if specified in the url (parameter name: DiscountLabelStyle)
        if ( "undefined" !==  location.search){
            urlparams = location.search;
            if (-1 !== urlparams.search("DiscountLabelStyle=bubble") ){
                var style =  "bubble";
            }
            if (-1 !==  urlparams.search("DiscountLabelStyle=corner")){
                var style =  "corner";
            }
            if (-1 !== urlparams.search("DiscountLabelStyle=box")){
                var style =  "box";
            }
        }
        return style;
    },
    nominalDiscount: function(jthis){
           return Math.floor(jwsVisualDiscount.normalPrice(jthis) - jwsVisualDiscount.specialPrice(jthis));
    },
    percentDiscount: function(jthis){
           return Math.floor(jwsVisualDiscount.nominalDiscount(jthis)/jwsVisualDiscount.normalPrice(jthis)*100);
    },
    discountBubble: function(jthis){
        var myElementString = "<span class='jws-discount-label'><span class='discount'></span><span class='off'>"+jwsDLConfigArray.offString+"</span></span>";
        var ele = jQuery(myElementString); 
            switch(jwsVisualDiscount.style()) {
                case 'corner':
                    ele.addClass('corner');
                    break;
                case 'box':
                    ele.addClass('box');
            }

            /* Discount or Percent*/
            switch(jwsVisualDiscount.mode()) {
                case 'nominal':
                    ele.find('span.discount').text(jwsDLConfigArray.currencySymbol+jwsVisualDiscount.nominalDiscount(jthis));  
                    break;
                case 'percent':
                    ele.find('span.discount').text(jwsVisualDiscount.percentDiscount(jthis)+"%");
            }

            /* AddBoxShadow */
            if ('1' === jwsDLConfigArray.boxShadow  ){
                ele.addClass('boxshadow');
            }

            for (var k in jwsDLConfigArray){
                if (( -1 !== k.search('css')) || ("" === jwsDLConfigArray[k] )){
                    var prop = k.replace('css','');
                    ele.css(prop,jwsDLConfigArray[k]);
                }
            }
        return ele;
    }, 
    adjustCornerPosition: function(){

        // handle position of corner style at different border widths
        var discountCornerElement = jQuery('.jws-discount-label.corner');
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
    }, 
    render: function(){
        var saleProductSelector = 'ul.products li.product, .summary';
        jQuery(saleProductSelector).each(function(){
            var jthis = jQuery(this);

            // if there is a <del> (containing 'normal price') && a special price can be calculated 
            if (( 1 === jthis.find('.price del').length) && (jwsVisualDiscount.specialPrice(jthis)) ){
                    
                // if element is the (product detail) summary
                if (jthis.hasClass('summary')){
					
					// if discount label is enabled for (product detail) summary
					if ('1' === jwsDLConfigArray.useInProductDetail){
                        // attach the discount label element to the main element
                        var ele = jQuery("main");
                        if ('corner' === jwsVisualDiscount.style() ){
                            ele.css('overflow', 'hidden');
                        }
                        ele.prepend(jwsVisualDiscount.discountBubble(jthis));
					}
					
                // product thumbnails
                } else { 
                    jthis.prepend(jwsVisualDiscount.discountBubble(jthis));
                }
            }
        });
        jwsVisualDiscount.adjustCornerPosition();
    }
};
jwsVisualDiscount.render();
