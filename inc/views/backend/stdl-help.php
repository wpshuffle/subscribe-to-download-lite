<div class="wrap stdl-wrap">
    <div class="stdl-header stdl-clearfix">
        <h1 class="stdl-floatLeft">
            <img src="<?php echo STDL_URL . 'images/logo.png' ?>" class="stdl-plugin-logo" />
            <span class="stdl-sub-header"><?php esc_html_e('Help', 'subscribe-to-download-lite'); ?></span>
        </h1>
        <div class="stdl-add-wrap">
            <div class="stdl-social">
                <a href="https://www.facebook.com/wpshuffle/" target="_blank"><i class="dashicons dashicons-facebook-alt"></i></a>
                <a href="https://twitter.com/wpshuffle/" target="_blank"><i class="dashicons dashicons-twitter"></i></a>
            </div>
            <a href="<?php echo STDL_UPGRADE_LINK; ?>" target="_blank"><input type="button" class="stdl-button-white" value="<?php esc_html_e('Upgrade to PRO', 'subscribe-to-download-lite'); ?>"></a>
        </div>
    </div>
    <?php include(STDL_PATH.'/inc/views/backend/upgrade-banner.php');?>
    <div class="stdl-form-wrap stdl-form-add-block stdl-clearfix">
        <div class="stdl-block-wrap">
            <div class="stdl-content-block">
                <h2><?php esc_html_e('Documentation', 'subscribe-to-download-lite'); ?></h2>
                <p><?php esc_html_e('You can check our detailed documentation in the below link.', 'subscribe-to-download-lite'); ?></p>
                <p><a href="https://wpshuffle.com/wordpress-documentations/subscribe-to-download-lite/" target="_blank">https://wpshuffle.com/wordpress-documentations/subscribe-to-download-lite/</a></p>
            </div>
            <div class="stdl-content-block">
                <h2><?php esc_html_e('For Support', 'subscribe-to-download-lite'); ?></h2>
                <p><a href="https://wpshuffle.com/contact-us" target="_blank">https://wpshuffle.com/contact-us</a></p>
            </div>
            <div class="stdl-content-block">
                <h2><?php esc_html_e('Developer Documentation', 'subscribe-to-download-lite'); ?></h2>
                <p><?php esc_html_e('If you are developer and trying to add any functionality or customize our plugin through hooks then below are the list of actions and filters available in the plugin.', 'subscribe-to-download-lite'); ?></p>




                <h3><?php esc_html_e('Available Actions', 'subscribe-to-download-lite'); ?></h3>
                <div class="stdl-hooks-wrap">
                    <pre>
/**
 * <?php esc_html_e('Fires when Init hook is fired through plugin', 'subscribe-to-download-lite'); ?>
                    *
 * @since 1.0.0
 */
do_action('stdl_init');
                    </pre>
                    <pre>
/**
 * <?php esc_html_e('Triggers just before processing the subscription form', 'subscribe-to-download-lite'); ?>
                        *
 * @since 1.0.0
 */
do_action('stdl_before_form_process');
                    </pre>
                    <pre>
/**
 * <?php esc_html_e('Triggers at the end of processing the subscription form successfully', 'subscribe-to-download-lite'); ?>
                        *
 * @param array $form_data
 *
 * @since 1.0.0
 */
 do_action('stdl_end_form_process', $form_data, $form_details);
                    </pre>
                    <pre>
/**
 * <?php esc_html_e('Triggers just before displaying the subscription form', 'subscribe-to-download-lite'); ?>
                        *
 * @param object $form_details
 *
 * @since 1.0.0
 */
 do_action('stdl_before_form', $form_details);
                    </pre>
                    <pre>
/**
 * <?php esc_html_e('Triggers just after displaying the subscription form', 'subscribe-to-download-lite'); ?>
                        *
 * @param object $form_details
 *
 * @since 1.0.0
 */
do_action('stdl_after_form', $form_details);
                    </pre>
                    <pre>
/**
 * <?php esc_html_e('Triggers just before displaying the download button', 'subscribe-to-download-lite'); ?>
                        *
 * @param object $form_details
 *
 * @since 1.0.0
 */
do_action('stdl_before_download', $form_details);
                    </pre>
                    <pre>
/**
 * <?php esc_html_e('Triggers just after displaying the download button', 'subscribe-to-download-lite'); ?>
                        *
 * @param object $form_details
 *
 * @since 1.0.0
 */
do_action('stdl_after_download', $form_details);
                    </pre>
                </div>

                <h3><?php esc_html_e('Available Filters', 'subscribe-to-download-lite'); ?></h3>
                <div class="stdl-hooks-wrap">
                    <pre>
/**
 * <?php esc_html_e('Filters csv rows', 'subscribe-to-download-lite'); ?>
                    *
 * @param array $csv_rows
 *
 * @since 1.0.0
 */
$csv_rows = apply_filters('stdl_csv_rows', $csv_rows);
                    </pre>
                    <pre>
/**
 * <?php esc_html_e('Filters download path before starting the download', 'subscribe-to-download-lite'); ?>
                        *
 * @param string $download_path
 * @param string $encryption_key
 *
 * @since 1.0.0
 */
 $download_path = apply_filters('stdl_download_path', $download_path, $encryption_key);
                    </pre>
                    <pre>
/**
 * <?php esc_html_e('Filters email message', 'subscribe-to-download-lite'); ?>
                        *
 * @param string $email_message
 * @param array $form_data
 *
 * @since 1.0.0
 */
$email_message = apply_filters('stdl_email_message', $email_message, $form_data);
                    </pre>
                </div>

            </div>
        </div>
    </div>
</div>