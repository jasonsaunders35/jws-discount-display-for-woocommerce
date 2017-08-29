<?php
add_action( 'wp_enqueue_scripts', 'discountdisplay_frontend_all_scriptsandstyles' );
function discountdisplay_frontend_all_scriptsandstyles() {
    wp_register_style( 'discountdisplay', plugins_url( '../css/style.css', __FILE__ ), array(), '', 'all' );
    wp_enqueue_style( 'discountdisplay');
}

add_action( 'wp_footer', 'add_footer_script' );
function add_footer_script() { ?>
    <?php if ($config_array = get_option( 'discountdisplayoptions' )):?>
        <?php if ('1' === $config_array['enabled']):?>
            <script type="text/javascript">
                <?php foreach ($config_array as $key => $value){
                    $config_array[$key] = esc_attr($value);
                }?>
                var jwsDDConfigArray = <?php echo json_encode($config_array) ?>;
                jwsDDConfigArray.currencySymbol = '<?php echo  html_entity_decode(get_woocommerce_currency_symbol()); ?>';
                jwsDDConfigArray.offString = '<?php echo esc_html__('Off','jwsdiscountdisplay') ?>';
            </script>

            <script type="text/javascript" src = "<?php echo plugins_url( 'js/discount-display-setup.js', __FILE__ ); ?>?ver=4.8.1"></script>
        <?php endif; ?>
    <?php endif; ?>
<?php }
