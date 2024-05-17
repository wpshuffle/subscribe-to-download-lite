<div class="stdl-settings-each-section stdl-form-flx" data-tab="general">
    <div class="stdl-form-left">
        <div class="stdl-field-wrap">

            <label><?php esc_html_e('Download File', 'subscribe-to-download-lite'); ?></label>
            <div class="stdl-field">
                <input type="text" name="form_details[general][download_file]" value="<?php echo (!empty($form_details['general']['download_file'])) ? esc_url($form_details['general']['download_file']) : ''; ?>" />
                <input type="hidden" name="form_details[general][download_file_id]" value="<?php echo (!empty($form_details['general']['download_file_id'])) ? intval($form_details['general']['download_file_id']) : ''; ?>" />
                <input type="button" class="button-secondary stdl-file-uploader" value="<?php esc_html_e('Upload File', 'subscribe-to-download-lite'); ?>" />
                <p class="description"><?php esc_html_e('Please upload the file directly here or choose from the media library else download may not work.', 'subscribe-to-download-lite'); ?></p>
                <p class="description"><?php esc_html_e("Please leave blank if you don't want to enable the download mechanism for subscribers.", 'subscribe-to-download-lite'); ?></p>
            </div>
        </div>
        <div class="stdl-field-wrap">
            <label><?php esc_html_e('Encrypt Download Link', 'subscribe-to-download-lite'); ?></label>
            <div class="stdl-field">
                <input type="checkbox" name="form_details[general][encrypt_link]" value="1" <?php echo (!empty($form_details['general']['encrypt_link'])) ? 'checked="checked"' : ''; ?> />
                <p class="description"><?php esc_html_e('Please check this if you want to send the encrypted link to the subscriber which will then prevent the direct link sharing of file.', 'subscribe-to-download-lite'); ?></p>
                <p class="description-note"><?php esc_html_e('If you turn on this feature, the download link shall be clicked from the same browser from which the subscription has been made because our plugin uses the browser cookies to verify if the link has been clicked from the same browser or not. If not clicked from the same browser, it will do nothing and just open the home page of your site which will prevent the link from direct sharing.', 'subscribe-to-download-lite'); ?></p>

            </div>
        </div>
        <div class="stdl-field-wrap">
            <label><?php esc_html_e('Form Success Message', 'subscribe-to-download-lite'); ?></label>
            <div class="stdl-field">
                <textarea name="form_details[general][success_message]"><?php echo (!empty($form_details['general']['success_message'])) ? esc_attr($form_details['general']['success_message']) : ''; ?></textarea>
            </div>
        </div>
        <div class="stdl-field-wrap">
            <label><?php esc_html_e('Form Required Error Message', 'subscribe-to-download-lite'); ?></label>
            <div class="stdl-field">
                <textarea name="form_details[general][required_error_message]"><?php echo (!empty($form_details['general']['required_error_message'])) ? esc_attr($form_details['general']['required_error_message']) : ''; ?></textarea>
                <p class="description"><?php esc_html_e('Please enter the message that needs to be shown when any validation error occurs in form submission.', 'subscribe-to-download-lite'); ?></p>
            </div>
        </div>
        <div class="stdl-field-wrap">
            <label><?php esc_html_e('Form Error Message', 'subscribe-to-download-lite'); ?></label>
            <div class="stdl-field">
                <textarea name="form_details[general][error_message]"><?php echo (!empty($form_details['general']['error_message'])) ? esc_attr($form_details['general']['error_message']) : ''; ?></textarea>
                <p class="description"><?php esc_html_e("Please enter the message that needs to be shown when email couldn't be sent.", 'subscribe-to-download-lite'); ?></p>
            </div>
        </div>

        <div class="stdl-field-wrap">
            <label><?php esc_html_e('Always Show', 'subscribe-to-download-lite'); ?></label>
            <div class="stdl-field">
                <input type="checkbox" name="form_details[general][always_show]" value="1" <?php echo (!empty($form_details['general']['always_show'])) ? 'checked="checked"' : ''; ?> class="stdl-checkbox-toggle-trigger" data-toggle-class="stdl-download-button" data-toggle-type="off" />
                <p class="description"><?php esc_html_e('Please check if you want to always show the form for subscribed users too.', 'subscribe-to-download-lite'); ?></p>
            </div>
        </div>
        <?php
        $always_show = (!empty($form_details['general']['always_show'])) ? 1 : 0;
        ?>
        <div class="stdl-field-wrap stdl-download-button" <?php $this->display_none($always_show, 0); ?>>
            <label><?php esc_html_e('Download Button Text', 'subscribe-to-download-lite'); ?></label>
            <div class="stdl-field">
                <input type="text" name="form_details[general][download_button_text]" value="<?php echo (!empty($form_details['general']['download_button_text'])) ? esc_attr($form_details['general']['download_button_text']) : ''; ?>" />
                <p class="description"><?php esc_html_e('This is the button which will show when already subscribed user visit the site again.', 'subscribe-to-download-lite'); ?></p>
            </div>
        </div>
        <?php
        $stdl_settings = get_option('stdl_settings');
        if (!empty($stdl_settings['mailchimp']['enable']) && !empty($stdl_settings['mailchimp']['status']) && !empty($stdl_settings['mailchimp']['mailchimp_lists'])) {
        ?>
            <div class="stdl-field-wrap">
                <label><?php esc_html_e('Mailchimp Lists', 'subscribe-to-download-lite'); ?></label>
                <div class="stdl-field">
                    <?php
                    $mailchimp_lists = json_decode($stdl_settings['mailchimp']['mailchimp_lists']);
                    $selected_mailchimp_lists = (!empty($form_details['general']['mailchimp_id'])) ? $form_details['general']['mailchimp_id'] : array();
                    if (!empty($mailchimp_lists->lists)) {
                        $mailchimp_lists = $mailchimp_lists->lists;
                        foreach ($mailchimp_lists as $mailchimp_list) {
                    ?>
                            <label><input type="checkbox" name="form_details[general][mailchimp_id][]" value="<?php echo esc_attr($mailchimp_list->id); ?>" class="stdl-disable-checkbox-toggle" <?php echo (in_array($mailchimp_list->id, $selected_mailchimp_lists)) ? 'checked="checked"' : ''; ?> /><span><?php echo esc_attr($mailchimp_list->name); ?></span></label>
                    <?php
                        }
                    } else {
                        esc_html_e('No list found for the mailchimp. Please check the mailchimp settings inside our settings section to fetch the mailchimp lists.', 'subscribe-to-download-lite');
                    }
                    ?>
                    <p class="description"><?php esc_html_e('Please check desired mailchimp list to send the subscribers directly to the mailchimp.', 'subscribe-to-download-lite'); ?></p>
                </div>
            </div>
        <?php
        }
        if (!empty($stdl_settings['constant_contact']['enable']) && !empty($stdl_settings['constant_contact']['status']) && !empty($stdl_settings['constant_contact']['constant_contact_lists'])) {
        ?>
            <div class="stdl-field-wrap">
                <label><?php esc_html_e('Constant Contact Lists', 'subscribe-to-download-lite'); ?></label>
                <div class="stdl-field">
                    <?php
                    $constant_contact_lists = json_decode($stdl_settings['constant_contact']['constant_contact_lists']);
                    $selected_constant_contact_lists = (!empty($form_details['general']['constant_contact_id'])) ? $form_details['general']['constant_contact_id'] : array();
                    if (!empty($constant_contact_lists)) {
                        foreach ($constant_contact_lists as $constant_contact_list) {
                    ?>
                            <label class="stdl-block"><input type="checkbox" name="form_details[general][constant_contact_id][]" value="<?php echo esc_attr($constant_contact_list->id); ?>" class="stdl-disable-checkbox-toggle" <?php echo (in_array($constant_contact_list->id, $selected_constant_contact_lists)) ? 'checked="checked"' : ''; ?> /><span><?php echo esc_attr($constant_contact_list->name); ?></span></label>
                    <?php
                        }
                    } else {
                        esc_html_e('No list found for the constant contact. Please check the constant contact settings inside our settings section to fetch the constant_contact lists.', 'subscribe-to-download-lite');
                    }
                    ?>
                    <p class="description"><?php esc_html_e('Please check desired constant contact list to send the subscribers directly to the constant contact.', 'subscribe-to-download-lite'); ?></p>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

    <div class="stdl-form-right">
        <?php
        /**
         * Upgrade Field
         */
        include(STDL_PATH . 'inc/views/backend/upgrade.php');
        ?>

    </div>
</div>