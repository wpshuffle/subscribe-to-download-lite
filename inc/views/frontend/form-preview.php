<?php
defined('ABSPATH') or die('No script kiddies please!!');
?>
<html>
    <head>
        <title><?php esc_html_e('Preview - Subscribe to Download', 'subscribe-to-download-lite'); ?></title>
        <?php wp_head(); ?>
    </head>
    <body>
        <div class="stdl-preview-head-wrap">
            <div class="stdl-preview-title-wrap">
                <div class="stdl-preview-title"><?php esc_html_e('Preview Mode', 'subscribe-to-download-lite'); ?></div>
            </div>
            <div class="stdl-preview-note"><?php esc_html_e('This is just the basic preview and it may look different when used in frontend as per your theme\'s styles.', 'subscribe-to-download-lite'); ?></div>
        </div>
        <div class="stdl-form-preview-wrap">

            <?php
            echo do_shortcode('[subscribe_to_download_form]');
            ?>
        </div>

        <span class="stdl-preview-subtitle"><a href="<?php echo admin_url('admin.php?page=stdl-settings'); ?>"><?php esc_html_e('Subscription Form Settings', 'subscribe-to-download-lite'); ?></a></span>

        <?php wp_footer(); ?>
    </body>
</html>
