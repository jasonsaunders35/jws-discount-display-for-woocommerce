/* get sample product image src;
/* license free image from https://pixabay.com/en/bulldog-puppy-dog-pet-sweet-1047518/ */
var protocol = location.protocol;
var host = window.location.hostname;
var pathFromRoot ="/media/jason/visualdiscount/sampleproduct.png";
var sampleProductImgSrc = protocol+"//"+host+pathFromRoot;

//ensure this only runs on this modulles admin page
var str = window.location.href;
if (str.search("jason_visualdiscount_section")!= -1){
    
    /*============================================================
     *  Declare Functions
    ==============================================================*/

    document.observe('dom:loaded', function(){

        function getAndUpdateDiscountMode(applygroupid,selectgroupid){
            var mode = $$(selectgroupid+"  select[id*='discountmode']")[0].value;
            if (mode === "percent"){
                $$(applygroupid+' .bubble .discount').each(function(d){d.update('20%')});
            }
            if (mode === "nominal"){
                $$(applygroupid+' .bubble .discount').each(function(d){d.update('$20')});
            }
        }

        function getAndUpdateDisplayStyle(applygroupid,selectgroupid){
            var style = $$(selectgroupid+"  select[id*='style']")[0].value;

            if (style != ""){
                if (style === "beforeproductname"){
                    // hide the first bubble and show the one by the name
                   $$(applygroupid+' .bubble')[0].setStyle({display:'none'});
                   $$(applygroupid+' .bubble')[1].setStyle({display:'block'});
                }
                else{
                    // show the first bubble and hide the one by the name
                    $$(applygroupid+' .bubble')[0].setStyle({display:'block'});
                    $$(applygroupid+' .bubble')[1].setStyle({display:'none'});
                }
                if (style === "bubble"){ // the default
                    $$(applygroupid+' .bubble')[0].removeClassName('corner').removeClassName('box'); // just make sure it does not have the 'corner' class
                }
                if (style === "corner"){
                    $$(applygroupid+' .bubble')[0].removeClassName('box').addClassName('corner');
                }
                if (style === "box"){
                    $$(applygroupid+' .bubble')[0].removeClassName('corner').addClassName('box');
                }
            }
        }


        function getSelectedCss(groupid){
            var cssAttributeValueArray = {};
            $$(groupid+"  select[id*='css']").each(function(ele){
                var value = ele.value;
                var attribute = ele.id.split('css')[1];
                if (value != "") {
                    cssAttributeValueArray[attribute]=value;
                }
            });
            return cssAttributeValueArray;
        }

        function updateBubbleCss(groupid, cssAttributeValueArray){  
            for (var key in cssAttributeValueArray) {
              $$(groupid+' .bubble').each(function(d){d.setStyle({[key]:cssAttributeValueArray[key]})});
            }
        }

        function updateGroup(applygroupid, selectgroupid){
            updateBubbleCss(applygroupid, getSelectedCss(selectgroupid));
            getAndUpdateDiscountMode(applygroupid,selectgroupid);
            getAndUpdateDisplayStyle(applygroupid,selectgroupid); 
        }
        
        /*============================================================
           Hanble Enable / Disable 
        ==============================================================*/
        
        function showHideSubBlocks(){
            if ($$("select[id$='general_group_enabled']")[0].value == 0){
                $$("fieldset[id$='searchresult_group']")[0].up().setStyle({display:'none'});
                $$("fieldset[id$='category_group']")[0].up().setStyle({display:'none'});
                $$("fieldset[id$='product_group']")[0].up().setStyle({display:'none'});
            }
            else {
                $$("fieldset[id$='searchresult_group']")[0].up().setStyle({display:'block'});
                $$("fieldset[id$='category_group']")[0].up().setStyle({display:'block'});
                $$("fieldset[id$='product_group']")[0].up().setStyle({display:'block'});
            }
        };
        // on enable or disable module
        $$("select[id$='general_group_enabled']")[0].observe("change", function(ele){
                showHideSubBlocks();
        }); 
        // on page load
        showHideSubBlocks();
        
        function hidePreviewOnDisable(){
            $$("select[id$='_enabled']").each(function(ele){
                if(ele.value == 0){
                    ele.up('fieldset').addClassName('hide-visualdiscount-on-disable');
                }
                else{
                    ele.up('fieldset').removeClassName('hide-visualdiscount-on-disable');
                }
            });
        };
        function showPreviewOnNotUseDefaults(){
            $$("select[id$='usedefaults']").each(function(ele){
                if(ele.value == 0){
                    ele.up('fieldset').addClassName('show-visualdiscount-on-not-use-defaults');
                }
                else{
                    ele.up('fieldset').removeClassName('show-visualdiscount-on-not-use-defaults');
                }
            });
        };
        $$("select[id$='enabled']").each(function(ele){
            ele.observe("change", function(){
                hidePreviewOnDisable();
            });
        });
        $$("select[id$='usedefaults']").each(function(ele){
            ele.observe("change", function(){
                showPreviewOnNotUseDefaults();
            });
        });
        hidePreviewOnDisable();
        showPreviewOnNotUseDefaults();

        /*============================================================
         *  Run On Page Load
        ==============================================================*/
        options =  $$(".entry-edit option");    
        var len = options.length;
        for (var i = 0; i < len; i++) {
            options[i].setStyle({
                   color: options[i].value  
            });
        }

        /* remove 'empty' option from general group's enabled, style, and discountmode dropdown selections*/
        $$("#jason_visualdiscount_section_general_group_enabled option, #jason_visualdiscount_section_general_group_style option, #jason_visualdiscount_section_general_group_discountmode option").each(function(ele){    
            if (ele.value === ""){
                ele.remove();
            }
        });

        $$("a.product-image img").each(function(ele){
             ele.src=sampleProductImgSrc;
        })



        /*============================================================
            Call Funtions
        ==============================================================*/

        function setupGroups(){
            //apply default fieldset values to all fieldset previews
            $$("div.entry-edit fieldset").each(function(ele){
                    selectgroupid = "#"+($$("div.entry-edit fieldset")[0].id); // default fieldset
                    applygroupid = "#"+(ele.id);  
                    updateGroup(applygroupid, selectgroupid);
            });

            //apply exceptions to each group
            $$("div.entry-edit fieldset").each(function(ele){
                selectgroupid = "#"+(ele.id);
                applygroupid = "#"+(ele.id);  
                var usedefaults = ele.down("select[id$='usedefaults']");
                if (typeof(usedefaults) !== 'undefined'){
                    if (usedefaults.value == '0'){
                        updateGroup(applygroupid, selectgroupid);
                    }
                }
            });
        }
        setupGroups();

        $$("div.entry-edit fieldset select").each(function(ele){
            ele.observe("change", function(ele){     
                /* remove styles from bubble just in case the unset value is toggled and that style attribute needs to be reset*/
                $$("span.bubble").each(function(ele){
                    ele.removeAttribute('style');
                });
                setupGroups();
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
            $$("span.bubble").each(function(ele){
                ele.removeAttribute('style');
            });
            setupGroups();
        };
        
        /* on width selection*/
        $$("select[id*='borderWidth']").each(function(ele){
            ele.observe("change", function(ele){
                setStyleToNormalIfNone(this);
                var changeToValue = this.value;
                if (changeToValue == "" || changeToValue == "invalidValue" || changeToValue == "0"){unsetBorderColorAndWidth(this)}
            });
        });
        /* on color selection*/
        $$("select[id*='borderColor']").each(function(ele){
            ele.observe("change", function(ele){
                setStyleToNormalIfNone(this);
                setWidthToOneIfNone(this)
            });
        });

    }); // end document load event

} // end if 