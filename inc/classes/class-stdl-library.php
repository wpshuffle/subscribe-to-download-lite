<?php

defined('ABSPATH') or die('No script kiddies please!!');
if (!class_exists('STDL_Library')) {

    class STDL_Library {

        /**
         * Exit for unauthorized access
         *
         * @since 1.0.0
         */
        function permission_denied() {
            die('No script kiddies please!!');
        }

        /**
         * Prints array in the pre format
         *
         * @param array $array
         * @since 1.0.0
         */
        function print_array($array) {
            echo "<pre>";
            print_r($array);
            echo "</pre>";
        }

        /**
         * Sanitizes Multi Dimensional Array
         * @param array $array
         * @param array $sanitize_rule
         * @return array
         *
         * @since 1.0.0
         */
        function sanitize_array($array = array(), $sanitize_rule = array()) {
            if (!is_array($array) || count($array) == 0) {
                return array();
            }

            foreach ($array as $k => $v) {
                if (!is_array($v)) {

                    $default_sanitize_rule = (is_numeric($k)) ? 'html' : 'text';
                    $sanitize_type = isset($sanitize_rule[$k]) ? $sanitize_rule[$k] : $default_sanitize_rule;
                    $array[$k] = $this->sanitize_value($v, $sanitize_type);
                }
                if (is_array($v)) {
                    $array[$k] = $this->sanitize_array($v, $sanitize_rule);
                }
            }

            return $array;
        }

        /**
         * Sanitizes Value
         *
         * @param type $value
         * @param type $sanitize_type
         * @return string
         *
         * @since 1.0.0
         */
        function sanitize_value($value = '', $sanitize_type = 'text') {
            switch ($sanitize_type) {
                case 'html':
                    $allowed_html = wp_kses_allowed_html('post');
                    return $this->sanitize_html($value);
                    break;
                case 'to_br':
                    return $this->sanitize_escaping_linebreaks($value);
                    break;
                case 'none':
                    return $value;
                    break;
                default:
                    return sanitize_text_field($value);
                    break;
            }
        }

        /**
         * Ajax nonce verification for ajax in admin
         *
         * @return bolean
         * @since 1.0.0
         */
        function admin_ajax_nonce_verify() {
            if (!empty($_POST['_wpnonce']) && wp_verify_nonce($_POST['_wpnonce'], 'stdl_ajax_nonce')) {
                return true;
            } else {
                return false;
            }
        }

        /**
         * Ajax nonce verification for ajax in frontend
         *
         * @return bolean
         * @since 1.0.0
         */
        function ajax_nonce_verify() {
            if (!empty($_POST['_wpnonce']) && wp_verify_nonce($_POST['_wpnonce'], 'stdl_frontend_ajax_nonce')) {
                return true;
            } else {
                return false;
            }
        }

        /**
         * Returns the default email message
         *
         * @return string
         *
         * @since 1.0.0
         */
        function get_default_email_message() {
            $default_email_message = esc_html__(sprintf('Hello There,

Thank you for subscribing in our %s website. Please download the file from below link:

#download_link

Thank you', esc_attr(get_bloginfo('name'))), 'subscribe-to-download-lite');
            return $default_email_message;
        }

        /**
         * Sanitizes the content by bypassing allowed html
         *
         * @param string $text
         * @return string
         *
         * @since 1.0.0
         */
        function sanitize_html($text) {
            $allowed_html = wp_kses_allowed_html('post');
            return wp_kses($text, $allowed_html);
        }

        /**
         * Sanitizes field by converting line breaks to <br /> tags
         *
         * @since 1.0.0
         *
         * @return string $text
         */
        function sanitize_escaping_linebreaks($text) {
            $text = implode("<br \>", array_map('sanitize_text_field', explode("\n", $text)));
            return $text;
        }

        /**
         * Outputs by converting <Br/> tags into line breaks
         *
         * @since 1.0.0
         *
         * @return string $text
         */
        function output_converting_br($text) {
            $text = implode("\n", array_map('sanitize_text_field', explode("<br \>", $text)));
            return $text;
        }

        /**
         * Gets the subscriber row from email
         *
         * @param string $email
         *
         * @return object/boolean
         *
         * @since 1.0.0
         */
        function get_subscriber_row_by_email($email) {
            global $wpdb;
            $subscriber_table = STDL_SUBSCRIBERS_TABLE;
            $subscriber_row = $wpdb->get_row($wpdb->prepare("select * from $subscriber_table where subscriber_email = %s", $email));
            return $subscriber_row;
        }

        /**
         * Returns the default From Email
         *
         * @return string
         *
         * @since 1.0.0
         */
        function get_default_from_email() {
            $site_url = site_url();
            $find_h = '#^http(s)?://#';
            $find_w = '/^www\./';
            $replace = '';
            $output = preg_replace($find_h, $replace, $site_url);
            $output = preg_replace($find_w, $replace, $output);
            return 'noreply@' . $output;
        }

        /**
         * Generates a unique encryption key
         *
         * @return string
         *
         * @since 1.0.0
         */
        function generate_encryption_key() {
            $current_date_time = date('Y-m-d H:i:s');
            $encryption_key = md5($current_date_time);
            return $encryption_key;
        }

        /**
         * Returns download Path
         *
         * @global object $wpdb
         * @param string $encryption_key
         * @return string/boolean
         *
         * @since 1.0.0
         */
        function get_download_path($encryption_key) {
            $form_details = get_option('stdl_settings');
            if (empty($form_details['general']['download_file_id'])) {
                // If download file is not available in the settings
                return false;
            }
            $attachment_path = get_attached_file(intval($form_details['general']['download_file_id']));
            return $attachment_path;
        }

        /**
         * Returns the file name from download URL
         *
         * @param string $url
         * @return string
         *
         * @since 1.0.0
         */
        function get_file_name_from_url($url) {
            $url = untrailingslashit($url);
            $url_array = explode('/', $url);
            $file_name = end($url_array);
            return $file_name;
        }

        function check_if_already_subscribed($encryption_key) {
            $encryption_key = sanitize_text_field($encryption_key);
            global $wpdb;
            $subscriber_table = STDL_SUBSCRIBERS_TABLE;
            $subscriber_count = $wpdb->get_var("SELECT COUNT(*) FROM $subscriber_table WHERE subscriber_encryption_key like '$encryption_key'");
            if ($subscriber_count == 0) {
                return false;
            } else {
                return true;
            }
        }

        /**
         * Prints Display None
         *
         * @param string $parameter1
         * @param string $parameter2
         *
         * @since 1.0.0
         */
        function display_none($parameter1, $parameter2) {
            if ($parameter1 != $parameter2) {
                echo 'style="display:none"';
            }
        }

        /**
         * Default Settings
         */

        function get_default_settings() {
            $url = site_url();

            // Parse the URL
            $parsed_url = parse_url($url);

            // Get the domain
            $domain = $parsed_url['host'];
            $form_details = array(
                'general' => array(
                    'download_file' => '',
                    'download_file_id' => '',
                    'success_message' => esc_html__('Subscription successful. Please download the file sent in your email.', 'subscribe-to-download-lite'),
                    'required_error_message' => esc_html__('Please fill all the required fields', 'subscribe-to-download-lite'),
                    'error_message' => esc_html__('There occurred some error while sending the email.', 'subscribe-to-download-lite'),
                    'download_button_text' => esc_html__('Download', 'subscribe-to-download-lite')
                ),
                'form' => array(
                    'heading' => array(
                        'text' => ''
                    ),
                    'sub_heading' => array(
                        'text' => ''
                    ),
                    'name' => array(
                        'show' => 1,
                        'label' => 'Your Name'
                    ),
                    'email' => array(
                        'label' => 'Your Email'
                    ),
                    'terms_agreement' => array(
                        'agreement_text' => ''
                    ),
                    'subscribe_button' => array(
                        'button_text' => 'Subscribe & Download'
                    ),
                    'footer' => array(
                        'footer_text' => ''
                    )
                ),
                'layout' => array(
                    'template' => 'template-1',
                    'form_width' => '',
                    'template_5' => array(
                        'icon_image' => ''
                    ),
                    'display_type' => 'direct',
                    'popup_trigger_text' => ''
                ),
                'email' => array(
                    'subject' => esc_html__('Download your file', 'subscribe-to-download-lite'),
                    'from_email' => 'noreply@' . $domain,
                    'from_name' => 'No Reply',
                    'email_message' => ''
                )
            );
            return $form_details;
        }
    }

    $GLOBALS['stdl_library'] = new STDL_Library();
}
