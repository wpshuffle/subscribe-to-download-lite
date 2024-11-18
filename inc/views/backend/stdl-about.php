<div class="wrap stdl-wrap">
    <div class="stdl-header stdl-clearfix">
        <h1 class="stdl-floatLeft">
            <img src="<?php echo STDL_URL . 'images/logo.png' ?>" class="stdl-plugin-logo" />
            <span class="stdl-sub-header"><?php esc_html_e('About', 'subscribe-to-download-lite'); ?></span>
        </h1>
        <div class="stdl-add-wrap">
            <div class="stdl-social">
                <a href="https://www.facebook.com/wpshuffle/" target="_blank"><i class="dashicons dashicons-facebook-alt"></i></a>
                <a href="https://twitter.com/wpshuffle/" target="_blank"><i class="dashicons dashicons-twitter"></i></a>
            </div>
            <a href="<?php echo STDL_UPGRADE_LINK;?>" target="_blank"><input type="button" class="stdl-button-white" value="<?php esc_html_e('Upgrade to PRO', 'subscribe-to-download-lite'); ?>"></a>
        </div>
    </div>
    <?php include(STDL_PATH.'/inc/views/backend/upgrade-banner.php');?>

    <div class="stdl-form-wrap stdl-form-add-block stdl-clearfix">

        <div class="stdl-block-wrap">

            <div class="stdl-content-block">
                <h2><?php esc_html_e('About Plugin', 'subscribe-to-download-lite'); ?></h2>
                <p><?php esc_html_e("As the name explains, this plugin makes it fast and easy to capture subscribers right from your WordPress site by simply providing them a freebies to download through email after successful subscription. If you don't have any freebies to offer then you can even use our plugin just as a subscription plugin too.", 'subscribe-to-download-lite'); ?></p>
                <p><?php esc_html_e("You can enable or disable each form component, choose a stunning layout from our 5 beautifully pre designed templates, encrypt download link and track download status, export subscribers and what not. With this plugin you are just few seconds away from collecting the subscribers from your WordPress site because configuring and integrating a subscription form in any site is that easy with our plugin.", 'subscribe-to-download-lite'); ?></p>
            </div>

            <div class="stdl-content-block">
                <h2><?php esc_html_e('Features', 'subscribe-to-download-lite'); ?></h2>
                <ul class="stdl-bullets">
                    <li><?php esc_html_e('5 Pre Designed Subscription Form Templates', 'subscribe-to-download-lite'); ?></li>
                    <li><?php esc_html_e('Encrypted download link', 'subscribe-to-download-lite'); ?></li>
                    <li><?php esc_html_e('Popup Subscription Form', 'subscribe-to-download-lite'); ?></li>
                    <li><?php esc_html_e('Enable disable each form components', 'subscribe-to-download-lite'); ?></li>
                    <li><?php esc_html_e('Ajax Form Submission', 'subscribe-to-download-lite'); ?></li>
                    <li><?php esc_html_e('Subscribers CSV Export', 'subscribe-to-download-lite'); ?></li>
                    <li><?php esc_html_e('Backend Form Preview', 'subscribe-to-download-lite'); ?></li>

                </ul>
            </div>

            <div class="stdl-content-block">
                <h2><?php esc_html_e('About WP Shuffle', 'subscribe-to-download-lite'); ?></h2>
                <p><?php esc_html_e('We are a bunch of WordPress Enthusiasts with an aim to develop the WordPress Themes and Plugins that adds a value to any WordPress site. Our mission is to create a WordPress product that is easy to use, highly customizable and offers innovative features that are useful for every another WordPress site.', 'subscribe-to-download-lite'); ?></p>
                <p><?php esc_html_e('If talking about support, we value our customers more that we value our products so our qualified support team is always there to provide any assistance with our products.', 'subscribe-to-download-lite'); ?></p>
            </div>

            <div class="stdl-content-block">
                <h2><?php esc_html_e('Our Themes', 'subscribe-to-download-lite'); ?></h2>
                <a href="https://wpshuffle.com/wordpress-themes">https://wpshuffle.com/wordpress-themes/</a>
            </div>

            <div class="stdl-content-block">
                <h2><?php esc_html_e('Our Plugins', 'subscribe-to-download-lite'); ?></h2>
                <a href="https://wpshuffle.com/wordpress-plugins">https://wpshuffle.com/wordpress-plugins/</a>
            </div>
        </div>

        <?php include(STDL_PATH . 'inc/views/backend/upgrade.php'); ?>

    </div>
</div>
