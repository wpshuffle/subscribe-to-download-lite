<?php

defined('ABSPATH') or die('No script kiddies please!!');
if (!class_exists('STDL_Enqueue')) {

    class STDL_Enqueue {

        function __construct() {
            add_action('wp_enqueue_scripts', array($this, 'register_frontend_assets'));
            add_action('admin_enqueue_scripts', array($this, 'register_admin_assets'));
        }

        function register_frontend_assets() {
            $stdl_frontend_obj = array('ajax_url' => admin_url('admin-ajax.php'), 'ajax_nonce' => wp_create_nonce('stdl_frontend_ajax_nonce'));
            wp_enqueue_style('fontawesome', STDL_URL . 'fontawesome/css/all.min.css', array(), STDL_VERSION);
            wp_enqueue_script('stdl-frontend-script', STDL_JS_DIR . '/stdl-frontend.js', array('jquery'), STDL_VERSION);
            wp_enqueue_style('stdl-frontend-style', STDL_CSS_DIR . '/stdl-frontend.css', array(), STDL_VERSION);
            wp_localize_script('stdl-frontend-script', 'stdl_frontend_obj', $stdl_frontend_obj);
        }

        function register_admin_assets() {
            $translation_strings = array(
                'ajax_message' => esc_html__('Please wait', 'subscribe-to-download-lite'),
                'upload_button_text' => esc_html__('Upload File', 'subscribe-to-download-lite'),
                'clipboad_copy_message' => esc_html__('Shortcode copied to clipboard.', 'subscribe-to-download-lite'),
                'delete_subscriber_confirm' => esc_html__('Are you sure you want to delete this subscriber?', 'subscribe-to-download-lite'),
            );
            $stdl_backend_obj = array('ajax_url' => admin_url('admin-ajax.php'), 'plugin_url' => STDL_URL, 'translation_strings' => $translation_strings, 'ajax_nonce' => wp_create_nonce('stdl_ajax_nonce'));
            wp_enqueue_media();
            wp_enqueue_style('fontawesome', STDL_URL . 'fontawesome/css/all.min.css', array(), STDL_VERSION);
            wp_enqueue_style('stdl-backend-style', STDL_CSS_DIR . '/stdl-backend.css', array(), STDL_VERSION);
            wp_enqueue_script('stdl-backend-script', STDL_JS_DIR . '/stdl-backend.js', array('jquery', 'wp-color-picker', 'wp-util'), STDL_VERSION);
            wp_localize_script('stdl-backend-script', 'stdl_backend_obj', $stdl_backend_obj);
        }

    }

    new STDL_Enqueue();
}