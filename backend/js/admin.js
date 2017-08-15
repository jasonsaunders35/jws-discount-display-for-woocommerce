/*============================================================
 *  Handle Preview 
==============================================================*/
// Box Shadow
jQuery("select[id*='enabled']").change(function(){
    jthis = jQuery(this);
    var value = jthis.val();
    if (value === "1"){
        jQuery('.bubble').css('display','block');
    } else {
        jQuery('.bubble').css('display','none');
    }
});

// Discount Mode
jQuery("select[id*='discountmode']").change(function(){
    jthis = jQuery(this);
    var mode = jthis.val();
    if (mode === "percent"){
        jQuery('.bubble .discount').text(percent_discount+'%');
    }
    if (mode === "nominal"){
        jQuery('.bubble .discount').text('$'+dollar_discount);
    }
});

// Style
jQuery("select[id*='style']").change(function(){
    jthis = jQuery(this);
    var style = jthis.val();
    if (style != ""){
        if (style === "bubble"){ // the default
            jQuery('.bubble').removeClass('corner').removeClass('box');
        }
        if (style === "corner"){
            jQuery('.bubble').removeClass('box').addClass('corner');
        }
        if (style === "box"){
            jQuery('.bubble').removeClass('corner').addClass('box');
        }
    }
});

// Box Shadow
jQuery("select[id*='boxShadow']").change(function(){
    jthis = jQuery(this);
    var value = jthis.val();
    if (value === "1"){
        jQuery('.bubble').addClass('boxshadow');
    } else {
        jQuery('.bubble').removeClass('boxshadow');
    }
});


// Options that direcly control CSS
jQuery("select[id*='css']").change(function(){
    var jthis = jQuery(this);
    var value = jthis.val();
    var idString = jthis.attr('id');
    var attribute = idString.substr(idString.indexOf("css") + 3)
    if (value != "") {
        jQuery('.bubble').css(attribute, value);
    }
});
// on page load
jQuery(".entry-edit select").change(); 

/*============================================================
 *  Hiding / Showing Relevant Table Rows
==============================================================*/

// Border Options
var borderOptionRows = jQuery('#tr-cssborderColor,#tr-cssborderStyle');
if (jQuery('#enabled').val() != '0'){
    if (jQuery('#cssborderWidth').val() != '0'){
        borderOptionRows.show();
    }
}
jQuery('#cssborderWidth').change(function(){
   if (jQuery(this).val() != '0'){
        borderOptionRows.show();
   } else{
        borderOptionRows.hide();       
   }
});

// All Form Content but 'Enabled' select
var optionRows = jQuery(".entry-edit tr:not('#tr-enabled'), .entry-edit h2.advanced,.entry-edit div.instruction");
if (jQuery('#enabled').val() != '0'){
    optionRows.show();
    jQuery('#cssborderWidth').change();
}
jQuery('#enabled').change(function(){
   if (jQuery(this).val() != '0'){
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
function adjustCornerPostion(){
    // reset inline top and right position
    jQuery('.product .bubble').css('right','');
    jQuery('.product .bubble').css('top','');
    var discountBubbleElement = jQuery('.product .bubble.corner');
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


