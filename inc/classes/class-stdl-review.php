<?php
defined('ABSPATH') or die('No script kiddies please!!');
if (!class_exists('STDL_Review')) {
    class STDL_Review {
        function __construct() {
            add_action('admin_init', [$this, 'ask_for_review']);
            add_action('admin_post_stdl_hide_review_notice', [$this, 'save_review_notice_preference']);
            add_action('admin_post_stdl_remind_later_review_notice', [$this, 'save_remind_later_notice_preference']);
        }

        function save_review_notice_preference() {
            if (isset($_POST['stdl_hide_review_notice'], $_POST['stdl_hide_review_notice_field']) && $_POST['stdl_hide_review_notice'] == 1 && wp_verify_nonce($_POST['stdl_hide_review_notice_field'], 'stdl_hide_review_notice')) {
                update_user_meta(get_current_user_id(), 'stdl_hide_review_notice', true);
                wp_redirect(add_query_arg(array('stdl_review_notice_saved' => '1'), wp_get_referer()));
            }
        }
        function save_remind_later_notice_preference() {
            if (!empty($_POST['stdl_remind_later_review_nonce']) && wp_verify_nonce($_POST['stdl_remind_later_review_nonce'], 'stdl_remind_later_review_nonce')) {
                update_user_meta(get_current_user_id(), 'stdl_remind_later_date', date('y-m-d'));
                wp_redirect(add_query_arg(array('stdl_remind_later_saved' => '1'), wp_get_referer()));
            }
        }

        function ask_for_review() {
            $plugin_install_date = get_option('stdl_plugin_install_date');
            $days_since_install = absint((time() - strtotime($plugin_install_date)) / DAY_IN_SECONDS);

            if ($days_since_install >= 7 && !get_user_meta(get_current_user_id(), 'stdl_hide_review_notice', true)) {

                $remind_later_date = get_user_meta(get_current_user_id(), 'stdl_remind_later_date', true);
                $days_since_remind_later = absint((time() - strtotime($remind_later_date)) / DAY_IN_SECONDS);

                if (empty($remind_later_date) || $days_since_remind_later >= 7) {
                    add_action('admin_notices', [$this, 'review_notice']);
                }
            }
        }

        function review_notice() {
?>
            <div class="notice notice-success is-dismissible" id="stdl-review-notice">
                <p><?php _e('🚀 Loving <strong>Subscribe to Download Lite</strong>? Your feedback matters! Help us grow by sharing your experience. 💖 Please take a moment to leave a review.', 'subscribe-to-download-lite'); ?></p>
                <p>
                    <a href="https://wordpress.org/support/plugin/subscribe-to-download-lite/reviews/#new-post" target="_blank" class="button-secondary"><?php _e('Click here to leave a review', 'subscribe-to-download-lite'); ?></a>
                    <input type="button" class="button-secondary" id="stdl_remind_later_review_notice" value="<?php _e('Remind me later', 'subscribe-to-download-lite') ?>" />
                    <input type="button" class="button-secondary" id="stdl_hide_review_notice" name="stdl_hide_review_notice" value="<?php _e('Already reviewed :)', 'subscribe-to-download-lite') ?>" />

                </p>

                <form id="stdl-hide-review-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                    <input type="hidden" name="action" value="stdl_hide_review_notice" />
                    <input type="hidden" name="stdl_hide_review_notice" value="1" />
                    <?php wp_nonce_field('stdl_hide_review_notice', 'stdl_hide_review_notice_field'); ?>
                </form>
                <form id="stdl-remind-later-review-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                    <input type="hidden" name="action" value="stdl_remind_later_review_notice" />
                    <input type="hidden" name="stdl_remind_later_review_notice" value="1" />
                    <?php wp_nonce_field('stdl_remind_later_review_nonce', 'stdl_remind_later_review_nonce'); ?>
                </form>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('stdl_hide_review_notice').addEventListener('click', function() {

                        document.getElementById('stdl-hide-review-form').submit();

                    });
                });
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('stdl_remind_later_review_notice').addEventListener('click', function() {

                        document.getElementById('stdl-remind-later-review-form').submit();

                    });
                });
            </script>
<?php
        }
    }

    new STDL_Review();
}
