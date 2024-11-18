<?php
defined('ABSPATH') or die('No script kiddies please!!');
$form_details = get_option('stdl_settings');
$preview_url = site_url() . '?stdl_preview=true&_wpnonce=' . wp_create_nonce('stdl_form_preview_nonce');
?>
<div class="wrap stdl-wrap">
    <div class="stdl-header stdl-clearfix">
        <h1 class="stdl-floatLeft">
            <img src="<?php echo STDL_URL . 'images/logo.png' ?>" class="stdl-plugin-logo" />
            <span class="stdl-sub-header"><?php esc_html_e('Subscription Form Settings', 'subscribe-to-download-lite'); ?></span>
        </h1>
        <div class="stdl-social">
            <a href="https://www.facebook.com/wpshuffle/" target="_blank"><i class="dashicons dashicons-facebook-alt"></i></a>
            <a href="https://twitter.com/wpshuffle/" target="_blank"><i class="dashicons dashicons-twitter"></i></a>
        </div>
        <div class="stdl-add-wrap">

            <a href="javascript:void(0);" class="stdl-form-save-trigger"><input type="button" class="stdl-button-white" value="<?php esc_html_e('Save', 'subscribe-to-download-lite'); ?>"></a>
            <a href="<?php echo esc_url($preview_url); ?>" target="_blank"><input type="button" class="stdl-button-orange" value="<?php esc_html_e('Preview', 'subscribe-to-download-lite'); ?>"></a>
            <a href="https://wordpress.org/support/plugin/subscribe-to-download-lite/" target="_blank" class="stdl-support"><img src="<?php echo STDL_URL . 'images/support.svg' ?>" class="stdl-support-svg" /><input type="button" class="stdl-button-orange" value="<?php esc_html_e('Support', 'subscribe-to-download-lite'); ?>"></a>
            <a href="https://wpshuffle.com/wordpress-documentations/subscribe-to-download-lite/" target="_blank" class="stdl-documentation"><i class="dashicons dashicons-media-document"></i><input type="button" class="stdl-button-orange" value="<?php esc_html_e('Documentation', 'subscribe-to-download-lite'); ?>"></a>
        </div>
    </div>
    <?php include(STDL_PATH.'/inc/views/backend/upgrade-banner.php');?>
    <div class="stdl-form-wrap stdl-form-add-block stdl-clearfix">
        <form method="post" action="" class="stdl-subscription-form" data-form-action="stdl_settings_save_action">
            <?php
            /**
             * Navigation Menu
             */
            include(STDL_PATH . 'inc/views/backend/form-sections/navigation.php');
            ?>
            <div class="stdl-settings-section-wrap">
                <div class="stdl-field-wrap">
                    <label><?php esc_html_e('Shortcode', 'subscribe-to-download-lite') ?></label>
                    <div class="stdl-field">
                        <span class="stdl-shortcode-preview">[subscribe_to_download_form]</span>
                        <span class="stdl-clipboard-copy"><i class="fas fa-clipboard-list"></i></span>
                    </div>
                </div>
                <?php
                /**
                 * General Settings
                 */
                include(STDL_PATH . 'inc/views/backend/form-sections/general-settings.php');
                ?>
                <?php
                /**
                 * Form Settings
                 */
                include(STDL_PATH . 'inc/views/backend/form-sections/form-settings.php');
                ?>
                <?php
                /**
                 * Layout Settings
                 */
                include(STDL_PATH . 'inc/views/backend/form-sections/layout-settings.php');
                ?>
                <?php
                /**
                 * Email Settings
                 */
                include(STDL_PATH . 'inc/views/backend/form-sections/email-settings.php');
                ?>

            </div>

        </form>
    </div>
</div>
<div class="stdl-form-message"></div>