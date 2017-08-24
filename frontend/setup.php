<?php
add_action( 'wp_enqueue_scripts', 'discountlabel_frontend_all_scriptsandstyles' );
function discountlabel_frontend_all_scriptsandstyles() {
    wp_register_style( 'discountlabel', plugins_url( '../css/style.css', __FILE__ ), array(), '', 'all' );
    wp_enqueue_style( 'discountlabel');
}

add_action( 'wp_footer', 'add_footer_script' );
function add_footer_script() { ?>
    <script type="text/javascript">
        
        <?php
        $config_array = get_option( 'discountlabeloptions' ); 
        foreach ($config_array as $key => $value){
            $config_array[$key] = esc_attr($value);
        }
        ?>
            
        var jwsDLConfigArray = <?php echo json_encode($config_array) ?>;
        jwsDLConfigArray.currencySymbol = '<?php echo  html_entity_decode(get_woocommerce_currency_symbol()); ?>';
        jwsDLConfigArray.offString = '<?php echo esc_html__('Off','jwsdiscountlabel') ?>';
        
    </script>
    
    <script type="text/javascript" src = "<?php echo plugins_url( 'js/discount-label-setup.js', __FILE__ ); ?>?ver=4.8.1"></script>
    
<?php }