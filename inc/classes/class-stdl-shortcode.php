<?php

defined('ABSPATH') or die('No script kiddies please!!');
if (!class_exists('STDL_Shortcode')) {

    class STDL_Shortcode extends STDL_Library {

        function __construct() {
            add_shortcode('subscribe_to_download_form', array($this, 'generate_shortcode_output'));
        }

        function generate_shortcode_output($atts) {
            wp_enqueue_style('stdl-frontend-custom', STDL_CSS_DIR . '/stdl-custom.css', array(), STDL_VERSION);
            ob_start();
            include(STDL_PATH . 'inc/views/frontend/stdl-shortcode.php');
            $form_html = ob_get_contents();
            ob_clean();
            return $form_html;
        }

    }

    new STDL_Shortcode();
}
