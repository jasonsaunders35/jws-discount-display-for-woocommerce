/*============================================================
 *  Handle Preview 
==============================================================*/

// Box Shadow
jQuery('select[id*="enabled"]').change(function(){
    jthis = jQuery(this);
    var value = jthis.val();
    if ( '1' === value ){
        jQuery('.jws-discount-label').css('display','block');
    } else {
        jQuery('.jws-discount-label').css('display','none');
    }
});

// Discount Mode
jQuery('select[id*="discountmode"]').change(function(){
    jthis = jQuery(this);
    var mode = jthis.val();
    if ( 'percent' === mode ){
        jQuery('.jws-discount-label .discount').text(percent_discount+'%');
    }
    if ( 'nominal' === mode ){
        jQuery('.jws-discount-label .discount').text(currencySymbol+dollar_discount);
    }
});

// Handle Preview Prices Currency Symbol
jQuery('.woocommerce-Price-currencySymbol').text(currencySymbol);

// Style
jQuery('select[id*="style"]').change(function(){
    jthis = jQuery(this);
    var style = jthis.val();
    if ( '' !== style ){
        if ( 'bubble' === style ){ // the default
            jQuery('.jws-discount-label').removeClass('corner').removeClass('box');
        }
        if ('corner' === style ){
            jQuery('.jws-discount-label').removeClass('box').addClass('corner');
        }
        if ('box' === style ){
            jQuery('.jws-discount-label').removeClass('corner').addClass('box');
        }
    }
});

// Box Shadow
jQuery('select[id*="boxShadow"]').change(function(){
    jthis = jQuery(this);
    var value = jthis.val();
    if ('1' === value){
        jQuery('.jws-discount-label').addClass('boxshadow');
    } else {
        jQuery('.jws-discount-label').removeClass('boxshadow');
    }
});


// Options that direcly control CSS
jQuery('select[id*="css"]').change(function(){
    var jthis = jQuery(this);
    var value = jthis.val();
    var idString = jthis.attr('id');
    var attribute = idString.substr(idString.indexOf('css') + 3)
    if ('' !== value ) {
        jQuery('.jws-discount-label').css(attribute, value);
    }
});

// on page load
jQuery('.entry-edit select').change(); 

/*============================================================
 *  Hiding / Showing Relevant Table Rows
==============================================================*/

// Border Options
var borderOptionRows = jQuery('#tr-cssborderColor,#tr-cssborderStyle');
if ( '0' !== jQuery('#enabled').val() ){
    if ('0' !== jQuery('#cssborderWidth').val()){
        borderOptionRows.show();
    }
}
jQuery('#cssborderWidth').change(function(){
   if ('0' !== jQuery(this).val()){
        borderOptionRows.show();
   } else{
        borderOptionRows.hide();       
   }
});

// All Form Content but 'Enabled' select
var optionRows = jQuery('.entry-edit tr:not("#tr-enabled"), .entry-edit h2.advanced,.entry-edit div.instruction');
if ('0' !== jQuery('#enabled').val() ){
    optionRows.show();
    jQuery('#cssborderWidth').change();
}
jQuery('#enabled').change(function(){
   if ('0'  !== jQuery(this).val() ){
        optionRows.show();
        jQuery('#cssborderWidth').change();
   } else{
        optionRows.hide();
   }
});

/*============================================================
 *  Handle Positioning of Bubble depending of Style / Border Width
==============================================================*/

// handle position of corner style at different border widths
var borderWidthSelect = jQuery('#cssborderWidth');
var displayStyleSelect = jQuery('#display_style');

// continuity problems get in the way of programtically measuring the original top & right positions, so hardcoding them
var originalTop = '-11';
var originalRight = '-41';

// reset inline top and right position
function adjustCornerPostion(){
    jQuery('.product .jws-discount-label').css('right','');
    jQuery('.product .jws-discount-label').css('top','');
    var discountBubbleElement = jQuery('.product .jws-discount-label.corner');
    var borderWidthSelectVal = borderWidthSelect.val().replace('px','');
    if (discountBubbleElement){
        discountBubbleElement.css({
            'top':originalTop-borderWidthSelectVal+'px',
            'right':originalRight-borderWidthSelectVal+'px'
        });
    }
}
borderWidthSelect.change(function(){
    adjustCornerPostion();
});
displayStyleSelect.change(function(){
    adjustCornerPostion();
});
adjustCornerPostion();
