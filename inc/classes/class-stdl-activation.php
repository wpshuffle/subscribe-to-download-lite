<?php

defined('ABSPATH') or die('No script kiddies please!!');
if (!class_exists('STDL_Activation')) {

    class STDL_Activation {

        function __construct() {
            register_activation_hook(STDL_PATH . 'subscribe-to-download-lite.php', array($this, 'activation_tasks'));
        }

        function activation_tasks() {
            $this->set_default_settings();
            $this->create_tables();
            $this->update_install_date();
        }

        function set_default_settings() {
            $form_details = get_option('stdl_settings');
            if (empty($form_details)) {
                global $stdl_library;
                $default_settings = $stdl_library->get_default_settings();
                update_option('stdl_settings', $default_settings);
            }
        }

        function create_tables() {
            global $wpdb;
            $charset_collate = $wpdb->get_charset_collate();

            $subscribers_table_name = STDL_SUBSCRIBERS_TABLE;

            $subscribers_table_sql = "CREATE TABLE $subscribers_table_name (
                    subscriber_id mediumint(9) NOT NULL AUTO_INCREMENT,
                    subscriber_name varchar(255) NOT NULL,
                    subscriber_email varchar(255) NOT NULL,
                    subscriber_form_alias varchar(255) NOT NULL,
                    subscriber_encryption_key varchar(255) NOT NULL,
                    subscriber_download_status mediumint(9) DEFAULT 0 NOT NULL,
                    PRIMARY KEY  (subscriber_id)
                  ) $charset_collate;";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

            dbDelta($subscribers_table_sql);
        }



        function update_install_date() {
            if (empty(get_option('stdl_plugin_install_date'))) {
                update_option('stdl_plugin_install_date', date('Y-m-d'));
            }
        }
    }

    new STDL_Activation();
}
