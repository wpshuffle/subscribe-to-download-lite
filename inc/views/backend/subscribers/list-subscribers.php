<?php
defined('ABSPATH') or die('No script kiddies please!!');
?>
<div class="wrap stdl-wrap">
    <div class="stdl-header stdl-clearfix">
        <h1 class="stdl-floatLeft">
            <img src="<?php echo STDL_URL . 'images/logo.png' ?>" class="stdl-plugin-logo" />
            <span class="stdl-sub-header"><?php esc_html_e('Subscribers', 'subscribe-to-download-lite'); ?></span>
        </h1>

        <div class="stdl-add-wrap">
            <div class="stdl-social">
                <a href="https://www.facebook.com/wpshuffle/" target="_blank"><i class="dashicons dashicons-facebook-alt"></i></a>
                <a href="https://twitter.com/wpshuffle/" target="_blank"><i class="dashicons dashicons-twitter"></i></a>
            </div>
            <?php
            $export_url = admin_url('admin-post.php?action=stdl_export_csv&_wpnonce=' . wp_create_nonce('stdl_export_csv_nonce'));
            ?>
            <a href="<?php echo esc_url($export_url); ?>"><input type="button" class="stdl-button-orange" value="<?php esc_html_e('Export to CSV', 'subscribe-to-download-lite'); ?>"></a>
            <a href="<?php echo STDL_UPGRADE_LINK; ?>" target="_blank"><input type="button" class="stdl-button-white" value="<?php esc_html_e('Upgrade to PRO', 'subscribe-to-download-lite'); ?>"></a>
        </div>
    </div>
    <?php include(STDL_PATH.'/inc/views/backend/upgrade-banner.php');?>
    <div class="stdl-form-wrap">

        <table class="wp-list-table widefat fixed stdl-form-lists-table">
            <thead>
                <tr>
                    <th><?php esc_html_e('Subscriber Name', 'subscribe-to-download-lite'); ?></th>
                    <th><?php esc_html_e('Subscriber Email', 'subscribe-to-download-lite'); ?></th>
                    <th><?php esc_html_e('Download Status', 'subscribe-to-download-lite'); ?></th>
                    <th><?php esc_html_e('Action', 'subscribe-to-download-lite'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                global $wpdb;
                $subscriber_table = STDL_SUBSCRIBERS_TABLE;

                $subscriber_query = "select * from $subscriber_table";

                $subscriber_rows = $wpdb->get_results($subscriber_query);
                if (!empty($subscriber_rows)) {
                    foreach ($subscriber_rows as $subscriber_row) {
                ?>
                        <tr>
                            <td><?php echo esc_attr($subscriber_row->subscriber_name); ?></td>
                            <td><?php echo esc_attr($subscriber_row->subscriber_email); ?></td>
                            <td><?php echo (!empty($subscriber_row->subscriber_download_status)) ? esc_html__('Yes', 'subscribe-to-download-lite') : esc_html__('No', 'subscribe-to-download-lite'); ?></td>
                            <td>
                                <a class="stdl-delete stdl-subscriber-delete" href="javascript:void(0)" data-subscriber-id="<?php echo intval($subscriber_row->subscriber_id); ?>" title="<?php esc_html_e('Delete Subscriber', 'subscribe-to-download-lite'); ?>"><?php esc_html_e('Delete', 'subscribe-to-download-lite'); ?></a>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="5"><?php esc_html_e('No subscribers found.', 'subscribe-to-download-lite'); ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th><?php esc_html_e('Subscriber Name', 'subscribe-to-download-lite'); ?></th>
                    <th><?php esc_html_e('Subscriber Email', 'subscribe-to-download-lite'); ?></th>
                    <th><?php esc_html_e('Download Status', 'subscribe-to-download-lite'); ?></th>
                    <th><?php esc_html_e('Action', 'subscribe-to-download-lite'); ?></th>
                </tr>
            </tfoot>
        </table>
    </div>

</div>
<div class="stdl-form-message"></div>