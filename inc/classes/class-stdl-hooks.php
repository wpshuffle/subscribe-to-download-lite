<?php

defined('ABSPATH') or die('No script kiddies please!!');
if (!class_exists('STDL_Hooks')) {

    class STDL_Hooks extends STDL_Library {

        function __construct() {
            add_action('template_redirect', array($this, 'form_preview'));
        }

        function form_preview() {
            if (isset($_GET['stdl_preview'], $_GET['_wpnonce']) && $_GET['stdl_preview'] && wp_verify_nonce($_GET['_wpnonce'], 'stdl_form_preview_nonce') && is_user_logged_in()) {
                wp_enqueue_style('stdl-preview', STDL_URL . 'css/stdl-preview.css', array(), STDL_VERSION);
                include(STDL_PATH . 'inc/views/frontend/form-preview.php');
                die();
            }
        }

    }

    new STDL_Hooks();
}
