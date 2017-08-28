<?php

// Action hook to register the plugin option settings
add_action( 'admin_init', 'store_register_settings' );
function store_register_settings() {

    //register the array of settings
    register_setting( 'settings-group', 'discountdisplayoptions', 'sanitize_options' );
}

function sanitize_options($discountdisplayoptions) {
    
    // create the full list of all valid pre-defined option value
    $jsw_select_array =  getConfigurationOptions();
    $allOptionValuesList = array("");
    foreach($jsw_select_array as $jsw_select):        
        foreach($jsw_select['options'] as $value): 
            $allOptionValuesList[] = $value[0];
        endforeach;
    endforeach;

    // compare each submitted option value against the full list of valid values
    foreach($discountdisplayoptions as $option): 
        
        // tests
        $isValid = 0;
        if ( preg_match( '/^#[a-f0-9]{6}$/i', $option ) === 0 ) { // if user insert a HEX color with #     
            $isValid++;
        }
        if (!in_array($option, $allOptionValuesList)){
            $isValid++;
        }
        
        // return with error message if both tests fail
        if($isValid == 2){
            add_settings_error(
                'discountDisplayErrorMessage',
                esc_attr( 'settings_updated' ),
                'An error occurred. Please try again.',
                'error'
            );
            return;
        }
    endforeach;
    
    // use rather poorly named WP function to add success message 
    add_settings_error(
        'discountDisplaySuccessMessage',
        esc_attr( 'settings_updated' ),
        'Settings Saved Successfully',
        'updated'
    );
    return $discountdisplayoptions;
}