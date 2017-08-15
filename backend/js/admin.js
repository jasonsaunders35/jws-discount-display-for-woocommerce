/* get sample product image src;
/* license free image from https://pixabay.com/en/bulldog-puppy-dog-pet-sweet-1047518/ */
var protocol = location.protocol;
var host = window.location.hostname;
var pathFromRoot ="/media/jason/visualdiscount/sampleproduct.png";
var sampleProductImgSrc = protocol+"//"+host+pathFromRoot;

/*============================================================
 *  Declare Functions
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
            jQuery('.bubble').removeClass('corner').removeClass('box'); // just make sure it does not have the 'corner' class
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

jQuery(".entry-edit select").change();