<?php

// Action hook to register the plugin option settings
add_action( 'admin_init', 'store_register_settings' );
function store_register_settings() {

    //register the array of settings
    register_setting( 'settings-group', 'discountlabeloptions', 'sanitize_options' );

}
function sanitize_options($discountlabeloptions) {
    
    $jsw_select_array =  getConfigurationOptions();
    
    // create the full list of all valid option values
    $allOptionValuesList = array("");
    foreach($jsw_select_array as $jsw_select):        
        foreach($jsw_select['options'] as $value): 
            $allOptionValuesList[] = $value[0];
        endforeach;
    endforeach;

    // compare each submited option value against the full list of valid value
    foreach($discountlabeloptions as $option): 
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
                'discountLabelErrorMessage',
                esc_attr( 'settings_updated' ),
                'An error occured. Please try again.',
                'error'
            );
            return;
        }
    endforeach;
    
    add_settings_error(
        'discountLabelSuccessMessage',
        esc_attr( 'settings_updated' ),
        'Settings Saved Succusfully',
        'updated'
    );
    return $discountlabeloptions;
}