<?php

defined('ABSPATH') or die('No script kiddies please!!');
if (!class_exists('STDL_Init')) {

    class STDL_Init {

        function __construct() {
            add_action('init', array($this, 'init_tasks')); // executed on init hook
        }

        function init_tasks() {
            load_plugin_textdomain(STDL_TD, false, plugin_basename(dirname(__FILE__)) . '/languages');  //loading of plugin's translation text domain

            /**
             * Fires when Init hook is fired through plugin
             *
             * @since 1.0.0
             */
            do_action('stdl_init');
        }

    }

    new STDL_Init();
}