<?php

defined('ABSPATH') or die('No script kiddies please!!');
if (!class_exists('STDL_Admin')) {

    class STDL_Admin extends STDL_Library {

        function __construct() {
            add_action('admin_menu', array($this, 'add_stdl_menu'));
            /**
             * Subscribers export to csv
             */
            add_action('admin_post_stdl_export_csv', array($this, 'export_to_csv'));
        }

        function add_stdl_menu() {
            add_menu_page(esc_html__('Subscribe to Download Lite', 'subscribe-to-download-lite'), esc_html__('Subscribe to Download Lite', 'subscribe-to-download-lite'), 'manage_options', 'stdl-settings', array($this, 'settings_page'), 'dashicons-download');
            add_submenu_page('stdl-settings', esc_html__('All Forms', 'subscribe-to-download-lite'), esc_html__('All Forms', 'subscribe-to-download-lite'), 'manage_options', 'stdl-settings', array($this, 'settings_page'));
            add_submenu_page('stdl-settings', esc_html__('Subscribers', 'subscribe-to-download-lite'), esc_html__('Subscribers', 'subscribe-to-download-lite'), 'manage_options', 'stdl-subscribers', array($this, 'generate_subscribers_list'));
            add_submenu_page('stdl-settings', esc_html__('Help', 'subscribe-to-download-lite'), esc_html__('Help', 'subscribe-to-download-lite'), 'manage_options', 'stdl-help', array($this, 'render_help_page'));
            add_submenu_page('stdl-settings', esc_html__('About', 'subscribe-to-download-lite'), esc_html__('About', 'subscribe-to-download-lite'), 'manage_options', 'stdl-about', array($this, 'render_about_page'));
            add_submenu_page('stdl-settings', esc_html__('Upgrade to PRO', 'subscribe-to-download-lite'), esc_html__('Upgrade to PRO', 'subscribe-to-download-lite'), 'manage_options', 'stdl-upgrade-to-pro', array($this, 'render_upgrade_page'));
        }

        function generate_subscribers_list() {
            include(STDL_PATH . 'inc/views/backend/subscribers/list-subscribers.php');
        }

        function export_to_csv() {
            if (!empty($_GET['_wpnonce']) && wp_verify_nonce($_GET['_wpnonce'], 'stdl_export_csv_nonce')) {
                $filename = "subscribers-list.csv";
                header('Content-type: application/csv');
                header('Content-Disposition: attachment; filename=' . $filename);
                $csv_rows = $this->get_subscriber_csv_rows();

                /**
                 * Filters csv rows
                 *
                 * @param array $csv_rows
                 *
                 * @since 1.0.0
                 */
                $csv_rows = apply_filters('stdl_csv_rows', $csv_rows);

                $csv_output = fopen('php://output', 'w');
                foreach ($csv_rows as $csv_row) {
                    fputcsv($csv_output, $csv_row);
                }

                exit;
            } else {
                $this->permission_denied();
            }
        }

        function get_subscriber_csv_rows() {
            global $wpdb;
            $subscriber_table = STDL_SUBSCRIBERS_TABLE;

            $subscriber_query = "select * from $subscriber_table";

            $subscriber_rows = $wpdb->get_results($subscriber_query);
            $csv_rows = array();
            $csv_rows[] = array('Subscriber Name', 'Subscriber Email', 'Download Status');
            if (!empty($subscriber_rows)) {
                foreach ($subscriber_rows as $subscriber_row) {
                    $download_status = (!empty($subscriber_row->subscriber_download_status)) ? esc_html__('Yes', 'subscribe-to-download-lite') : esc_html__('No', 'subscribe-to-download-lite');
                    $csv_row = array($subscriber_row->subscriber_name, $subscriber_row->subscriber_email, $download_status);
                    $csv_rows[] = $csv_row;
                }
            }
            return $csv_rows;
        }

        function settings_page() {
            if (isset($_GET['action']) && $_GET['action'] == 'settings_form') {
                include(STDL_PATH . 'inc/views/backend/stdl-settings.php');
            } else {
                include(STDL_PATH . 'inc/views/backend/stdl-all-forms.php');
            }
        }

        function render_help_page() {
            include(STDL_PATH . 'inc/views/backend/stdl-help.php');
        }

        function render_about_page() {
            include(STDL_PATH . 'inc/views/backend/stdl-about.php');
        }
        function render_upgrade_page() {
            include(STDL_PATH . 'inc/views/backend/stdl-upgrade.php');
        }
    }

    new STDL_Admin();
}
