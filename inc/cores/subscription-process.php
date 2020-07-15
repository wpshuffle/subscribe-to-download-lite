<?php

defined('ABSPATH') or die('No script kiddies please!!');

if ($this->ajax_nonce_verify()) {
    /**
     * Triggers just before processing the subscription form
     *
     * @since 1.0.0
     */
    do_action('stdl_before_form_process');
    $form_data = $_POST['form_data'];
    $form_data = stripslashes_deep($form_data);
    parse_str($form_data, $form_data);
    $form_data = $this->sanitize_array($form_data);
    $form_alias = sanitize_text_field($_POST['form_alias']);
    $form_details = get_option('stdl_settings');
    $subscriber_email = sanitize_email($form_data['stdl_email']);
    $subscriber_name = (!empty($form_data['stdl_name'])) ? sanitize_text_field($form_data['stdl_name']) : '';
    if (empty($form_data['stdl_email']) || (!empty($form_details['form']['terms_agreement']['show']) && empty($form_data['stdl_terms_agreement'])) || (!empty($form_details['form']['name']['show']) && !empty($form_details['form']['name']['required']) && empty($form_data['stdl_name']))) {
        $response['status'] = 403;
        $response['message'] = esc_attr($form_details['general']['required_error_message']);
    } else {
        //It is okay to process the form now
        $subscriber_row = $this->get_subscriber_row_by_email($form_data['stdl_email']);
        $from_email = (!empty($form_details['email']['from_email'])) ? $form_details['email']['from_email'] : $this->get_default_from_email();
        $from_name = (!empty($form_details['email']['from_name'])) ? $form_details['email']['from_name'] : esc_html__('No Reply', 'subscribe-to-download-lite');
        $subject = (!empty($form_details['email']['subject'])) ? $form_details['email']['subject'] : esc_html__('Subscription Successful', 'subscribe-to-download-lite');
        $email_message = (!empty($form_details['email']['email_message'])) ? $form_details['email']['email_message'] : $this->get_default_email_message();

        $charset = get_option('blog_charset');
        $headers[] = 'Content-Type: text/html; charset=' . $charset;
        $headers[] = "From: $from_name < $from_email >";

        if (empty($subscriber_row)) {
            //if subscriber isn't already subscribed
            $encryption_key = $this->generate_encryption_key();
            if (!empty($form_details['general']['encrypt_link'])) {

                $download_url = site_url() . '?stdl_encryption_key=' . $encryption_key;
            } else {
                $download_url = esc_url($form_details['general']['download_file']);
            }
            if (!empty($download_url)) {
                $email_message = str_replace('#download_link', '<a href="' . $download_url . '">' . $download_url . '</a>', $email_message);

                $email_check = wp_mail($form_data['stdl_email'], $subject, $email_message, $headers);
                if ($email_check) {
                    setcookie("stdl_encryption_key", $encryption_key, time() + 3600 * 24 * 365, '/');
                    global $wpdb;
                    $wpdb->insert(STDL_SUBSCRIBERS_TABLE, array('subscriber_name' => $subscriber_name,
                        'subscriber_email' => $subscriber_email,
                        'subscriber_form_alias' => $form_alias,
                        'subscriber_encryption_key' => $encryption_key), array('%s', '%s', '%s', '%s'));
                    $response['status'] = 200;
                    $response['message'] = esc_attr($form_details['general']['success_message']);
                } else {
                    $response['status'] = 403;
                    $response['message'] = esc_attr($form_details['general']['error_message']);
                }
            } else {
                $response['status'] = 200;
                $response['type'] = esc_html__('Default subscription', 'subscribe-to-download-lite');
                $response['message'] = esc_attr($form_details['general']['success_message']);
            }
        } else {
            //if subscriber is already subscribed
            $encryption_key = $subscriber_row->subscriber_encryption_key;
            if (!empty($form_details['general']['encrypt_link'])) {

                $download_url = site_url() . '?stdl_encryption_key=' . $encryption_key;
            } else {
                $download_url = esc_url($form_details['general']['download_file']);
            }
            if (!empty($download_url)) {

                $email_message = str_replace('#download_link', '<a href="' . $download_url . '">' . $download_url . '</a>', $email_message);
                /**
                 * Filters email message
                 *
                 * @param string $email_message
                 * @param array $form_data
                 *
                 * @since 1.0.0
                 */
                $email_message = apply_filters('stdl_email_message', $email_message, $form_data);
                $email_check = wp_mail($form_data['stdl_email'], $subject, $email_message, $headers);
                if ($email_check) {
                    setcookie("stdl_encryption_key", $encryption_key, time() + 3600 * 24 * 365, '/');
                    global $wpdb;
                    $wpdb->update(STDL_SUBSCRIBERS_TABLE, array('subscriber_form_alias' => $form_alias), array('subscriber_email' => $form_data['stdl_email']), array('%s'), array('%s'));
                    $response['status'] = 200;
                    $response['message'] = esc_attr($form_details['general']['success_message']);
                } else {
                    $response['status'] = 403;
                    $response['message'] = esc_attr($form_details['general']['error_message']);
                }
            } else {
                $response['status'] = 200;
                $response['type'] = esc_html__('Default subscription', 'subscribe-to-download-lite');
                $response['message'] = esc_attr($form_details['general']['success_message']);
            }
        }
        /**
         * Triggers at the end of processing the subscription form successfully
         *
         * @param array $form_data
         *
         * @since 1.0.0
         */
        do_action('stdl_end_form_process', $form_data, $form_details);
    }

    die(json_encode($response));
} else {
    $this->permission_denied();
}
