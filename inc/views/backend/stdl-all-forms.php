<?php
defined('ABSPATH') or die('No script kiddies please!!');
?>
<div class="wrap stdl-wrap">
    <div class="stdl-header stdl-clearfix">
        <h1 class="stdl-floatLeft">
            <img src="<?php echo STDL_URL . 'images/logo.png' ?>" class="stdl-plugin-logo" />
            <span class="stdl-sub-header"><?php esc_html_e('Subscription Forms', 'subscribe-to-download-lite'); ?></span>
        </h1>
        <div class="stdl-add-wrap">
            <a href="<?php echo STDL_UPGRADE_LINK; ?>" target="_blank" class="stdl-pro-feature-btns"><input type="button" class="stdl-button-white" value="<?php esc_html_e('Add New Form', 'subscribe-to-download-lite'); ?>"></a>
        </div>
    </div>
    <?php include(STDL_PATH.'/inc/views/backend/upgrade-banner.php');?>
    <div class="stdl-form-wrap">

        <table class="wp-list-table widefat fixed stdl-form-lists-table">
            <thead>
                <tr>
                    <th><?php esc_html_e('Form Title', 'subscribe-to-download-lite'); ?></th>
                    <th><?php esc_html_e('Shortcode', 'subscribe-to-download-lite'); ?></th>
                    <th><?php esc_html_e('Action', 'subscribe-to-download-lite'); ?></th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>
                        <a href="<?php echo admin_url('admin.php?page=stdl-settings&action=settings_form'); ?>" title="<?php esc_html_e('Edit Form', 'subscribe-to-download-lite'); ?>">Subscribe to Download</a>
                    </td>
                    <td>
                        <span class="stdl-shortcode-preview">[subscribe_to_download_form]</span>
                        <span class="stdl-clipboard-copy"><i class="fas fa-clipboard-list"></i></span>
                    </td>
                    <td>
                        <a class="stdl-edit" href="<?php echo admin_url('admin.php?page=stdl-settings&action=settings_form'); ?>" title="<?php esc_html_e('Edit Form', 'subscribe-to-download-lite'); ?>"><?php esc_html_e('Edit', 'subscribe-to-download-lite'); ?></a>
                        <a class="stdl-preview" href="<?php echo site_url() . '?stdl_preview=true&_wpnonce=' . wp_create_nonce('stdl_form_preview_nonce'); ?>" target="_blank" title="<?php esc_html_e('Preview', 'subscribe-to-download-lite'); ?>"><?php esc_html_e('Preview', 'subscribe-to-download-lite'); ?></a>

                    </td>
                </tr>

            </tbody>
            <tfoot>
                <tr>
                    <th><?php esc_html_e('Form Title', 'subscribe-to-download-lite'); ?></th>
                    <th><?php esc_html_e('Shortcode', 'subscribe-to-download-lite'); ?></th>
                    <th><?php esc_html_e('Action', 'subscribe-to-download-lite'); ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="stdl-form-message"></div>