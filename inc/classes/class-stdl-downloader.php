<?php

defined('ABSPATH') or die('No script kiddies please!!');
if (!class_exists('STDL_Downloader')) {

    class STDL_Downloader extends STDL_Library {

        function __construct() {
            add_action('template_redirect', array($this, 'initialize_downloader'));
        }

        function initialize_downloader() {
            if (!empty($_REQUEST['stdl_encryption_key'])) {
                $encryption_key = sanitize_text_field($_REQUEST['stdl_encryption_key']);
                if (isset($_COOKIE['stdl_encryption_key']) && $encryption_key == $_COOKIE['stdl_encryption_key']) {
                    $encryption_key = sanitize_text_field($_COOKIE['stdl_encryption_key']);
                    $download_path = $this->get_download_path($encryption_key);

                    /**
                     * Filters download path
                     *
                     * @param string $download_path
                     * @param string $encryption_key
                     *
                     * @since 1.0.0
                     */
                    $download_path = apply_filters('stdl_download_path', $download_path, $encryption_key);
                    if (file_exists($download_path)) {
                        header('Content-Description: File Transfer');
                        header('Content-Type: application/octet-stream');
                        header('Content-Disposition: attachment; filename="' . basename($download_path) . '"');
                        header('Expires: 0');
                        header('Cache-Control: must-revalidate');
                        header('Pragma: public');
                        header('Content-Length: ' . filesize($download_path));
                        readfile($download_path);
                        $this->update_download_status($encryption_key);
                        exit;
                    }
                }
            }
        }

        function update_download_status($encryption_key) {
            global $wpdb;
            $wpdb->update(STDL_SUBSCRIBERS_TABLE, array('subscriber_download_status' => 1), array('subscriber_encryption_key' => $encryption_key), array('%d'), array('%s'));
        }

    }

    new STDL_Downloader();
}
