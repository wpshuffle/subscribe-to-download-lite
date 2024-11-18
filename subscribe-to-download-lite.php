<?php

defined('ABSPATH') or die('No script kiddies please!');
/*
  Plugin Name: Subscribe To Download Lite
  Plugin URI:  https://wpshuffle.com/subscribe-to-download-lite
  Description: A plugin to collect email using an email subscribing form by providing the free downloadable items
  Version:     1.2.8
  Author:      WP Shuffle
  Author URI:  http://wpshuffle.com
  Domain Path: /languages
  Text Domain: subscribe-to-download-lite
 */



/**
 * Plugin's main class
 */
if (!class_exists('STDL_Class')) {

    class STDL_Class {

        function __construct() {
            $this->define_constants();
            $this->includes();
        }

        /**
         * Necessary constants
         */
        function define_constants() {

            global $wpdb;
            defined('STDL_VERSION') or define('STDL_VERSION', '1.2.8'); // Plugin's active version
            defined('STDL_PATH') or define('STDL_PATH', plugin_dir_path(__FILE__)); // plugin's absolute path
            defined('STDL_URL') or define('STDL_URL', plugin_dir_url(__FILE__)); // plugin's absolute URL
            defined('STDL_IMG_DIR') or define('STDL_IMG_DIR', plugin_dir_url(__FILE__) . '/images'); // plugin's image directory URL
            defined('STDL_CSS_DIR') or define('STDL_CSS_DIR', plugin_dir_url(__FILE__) . '/css'); // plugin's image directory URL
            defined('STDL_JS_DIR') or define('STDL_JS_DIR', plugin_dir_url(__FILE__) . '/js'); // plugin's image directory URL
            defined('STDL_TD') or define('STDL_TD', 'subscribe-to-download-lite'); //plugin's translation text domain
            defined('STDL_SUBSCRIBERS_TABLE') or define('STDL_SUBSCRIBERS_TABLE', $wpdb->prefix . 'std_subscribers'); //plugin's subscriber table
            defined('STDL_TOTAL_TEMPLATES') or define('STDL_TOTAL_TEMPLATES', 5); //Total number of templates available
            defined('STDL_UPGRADE_LINK') or define('STDL_UPGRADE_LINK', 'https://1.envato.market/Q3KGo');
        }

        /**
         * Includes necessary classes & files
         */
        function includes() {
            include(STDL_PATH . 'inc/classes/class-stdl-library.php');
            include(STDL_PATH . 'inc/classes/class-stdl-init.php');
            if (is_admin()) {
                include(STDL_PATH . 'inc/classes/class-stdl-activation.php');
                include(STDL_PATH . 'inc/classes/class-stdl-admin.php');
                include(STDL_PATH . 'inc/classes/class-stdl-ajax-admin.php');
                include(STDL_PATH . 'inc/classes/class-stdl-review.php');
            }
            include(STDL_PATH . 'inc/classes/class-stdl-enqueue.php');
            include(STDL_PATH . 'inc/classes/class-stdl-ajax.php');
            include(STDL_PATH . 'inc/classes/class-stdl-shortcode.php');
            include(STDL_PATH . 'inc/classes/class-stdl-downloader.php');
            include(STDL_PATH . 'inc/classes/class-stdl-hooks.php');
            include(STDL_PATH . 'inc/classes/class-stdl-mobile-detect.php');
        }
    }

    $stdl_obj = new STDL_Class(); //initialization of plugin
}
