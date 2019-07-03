<?php

defined('ABSPATH') or die('No script kiddies please!!');
if (!class_exists('STDL_Activation')) {

    class STDL_Activation {

        function __construct() {
            register_activation_hook(STDL_PATH . 'subscribe-to-download-lite.php', array($this, 'activation_tasks'));
        }

        function activation_tasks() {
            $this->create_tables();
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

            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

            dbDelta($subscribers_table_sql);
        }

    }

    new STDL_Activation();
}
