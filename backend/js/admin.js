/* get sample product image src;
/* license free image from https://pixabay.com/en/bulldog-puppy-dog-pet-sweet-1047518/ */
var protocol = location.protocol;
var host = window.location.hostname;
var pathFromRoot ="/media/jason/visualdiscount/sampleproduct.png";
var sampleProductImgSrc = protocol+"//"+host+pathFromRoot;

/*============================================================
 *  Declare Functions
==============================================================*/


// Discount Mode
jQuery("select[id*='discountmode']").change(function(){
    jthis = jQuery(this);
    var mode = jthis.val();
    if (mode === "percent"){
        jQuery('.bubble .discount').text('20%');
    }
    if (mode === "nominal"){
        jQuery('.bubble .discount').text('$20');
    }
});

// Style
jQuery("select[id*='style']").change(function(){
    jthis = jQuery(this);
    var style = jthis.val();
    if (style != ""){
        if (style === "beforeproductname"){
            // hide the first bubble and show the one by the name
           jQuery('.bubble').eq(0).css({display:'none'});
           jQuery('.bubble').eq(1).css({display:'block'});
        }
        else{
            // show the first bubble and hide the one by the name
           jQuery('.bubble').eq(0).css({display:'block'});
           jQuery('.bubble').eq(1).css({display:'none'});
        }
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


/*============================================================
   Hanble Enable / Disable 
==============================================================*/

function showHideSubBlocks(){
    // figure out if I want to keep this
};
// on enable or disable module
jQuery("select[id$='general_group_enabled']").change(function(){
        //showHideSubBlocks();
}); 
// on page load
showHideSubBlocks();

function hidePreviewOnDisable(){
    jQuery("select[id$='_enabled']").each(function(ele){
        if(ele.value == 0){
            ele.up('fieldset').addClass('hide-visualdiscount-on-disable');
        }
        else{
            ele.up('fieldset').removeClass('hide-visualdiscount-on-disable');
        }
    });
};
function showPreviewOnNotUseDefaults(){
    jQuery("select[id$='usedefaults']").each(function(ele){
        if(ele.value == 0){
            ele.up('fieldset').addClass('show-visualdiscount-on-not-use-defaults');
        }
        else{
            ele.up('fieldset').removeClass('show-visualdiscount-on-not-use-defaults');
        }
    });
};
jQuery("select[id$='enabled']").each(function(){
    jQuery(this).change(function(){
        hidePreviewOnDisable();
    });
});
jQuery("select[id$='usedefaults']").each(function(){
    jQuery(this).change(function(){
        showPreviewOnNotUseDefaults();
    });
});
//hidePreviewOnDisable();
//showPreviewOnNotUseDefaults();

/*============================================================
 *  Run On Page Load
==============================================================*/
jQuery(".discount-label-form option").each(function(){
    jQuery(this).css('color', jQuery(this).val());
});    

/* set up preview product attibutes 
jQuery("a.product-image img").each(function(ele){
     ele.src=sampleProductImgSrc;
})
*/



/*============================================================
    Call Funtions
==============================================================*/

jQuery("div.entry-edit fieldset select").each(function(){
    jQuery(this).change(function(){   
        /* remove styles from bubble just in case the unset value is toggled and that style attribute needs to be reset*/
        jQuery("span.bubble").each(function(){
            jQuery(this).removeAttr('style');
        });
        //setupGroups();
    });
});

/*============================================================
   Handle Border Selection 
==============================================================*/

function setStyleToNormalIfNone(ele){
    var bubble = ele.up('fieldset').down('.bubble')
    var borderStyle = bubble.getStyle('border-style');
    if (borderStyle == "none" || borderStyle == "solid"){
        var borderWidthSelect = bubble.up('fieldset').down("select[id*='borderStyle']");
        borderWidthSelect.setValue('solid');
        setupGroups();
    }
};

function setWidthToOneIfNone(ele){
    var bubble = ele.up('fieldset').down('.bubble')
    var borderWidth = bubble.getStyle('border-width');
    console.log(borderWidth);
    if (borderWidth == "1px"){
        var borderWidthSelect = bubble.up('fieldset').down("select[id*='borderWidth']");
        borderWidthSelect.setValue('1px');
        setupGroups();
    }
};
/* unset style and color */
function unsetBorderColorAndWidth(ele){
    var bubble = ele.up('fieldset').down('.bubble')
    var borderStyleSelect = bubble.up('fieldset').down("select[id*='borderStyle']");
    var borderColorSelect = bubble.up('fieldset').down("select[id*='borderColor']");
    borderStyleSelect.setValue("");
    borderColorSelect.setValue("");
    jQuery("span.bubble").each(function(ele){
        ele.removeAttribute('style');
    });
    setupGroups();
};

/* on width selection
jQuery("select[id*='borderWidth']").each(function(ele){
    ele.observe("change", function(ele){
        setStyleToNormalIfNone(this);
        var changeToValue = this.value;
        if (changeToValue == "" || changeToValue == "invalidValue" || changeToValue == "0"){unsetBorderColorAndWidth(this)}
    });
});
*/
/* on color selection*/
jQuery("select[id*='borderColor']").each(function(){
    console.log('jasdfsdf');
    jthis = jQuery(this);
    //setStyleToNormalIfNone(jthis);
    //setWidthToOneIfNone(jthis);
});
