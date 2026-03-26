<div class="stdl-settings-each-section stdl-form-flx" data-tab="email" style="display:none;">
<div class="stdl-form-left">
    <div class="stdl-field-wrap">
        <label><?php esc_html_e( 'Email Subject', 'subscribe-to-download-lite' ); ?></label>
        <div class="stdl-field">
            <input type="text" name="form_details[email][subject]" value="<?php echo (!empty( $form_details['email']['subject'] )) ? esc_attr( $form_details['email']['subject'] ) : ''; ?>"/>
            <p class="description"><?php esc_html_e( 'Please enter the from email which will be used to send the email to subscribers. Please enter any email which won\'t resembele the real person\'s email such as noreply@yoursiteurl.com ', 'subscribe-to-download-lite' ); ?></p>
        </div>
    </div>
    <div class="stdl-field-wrap">
        <label><?php esc_html_e( 'From Email', 'subscribe-to-download-lite' ); ?></label>
        <div class="stdl-field">
            <input type="text" name="form_details[email][from_email]" value="<?php echo (!empty( $form_details['email']['from_email'] )) ? esc_attr( $form_details['email']['from_email'] ) : ''; ?>"/>
            <p class="description"><?php esc_html_e( 'Please enter the from email which will be used to send the email to subscribers. Please enter any email which won\'t resembele the real person\'s email such as noreply@yoursiteurl.com ', 'subscribe-to-download-lite' ); ?></p>
        </div>
    </div>
    <div class="stdl-field-wrap">
        <label><?php esc_html_e( 'From Name', 'subscribe-to-download-lite' ); ?></label>
        <div class="stdl-field">
            <input type="text" name="form_details[email][from_name]" value="<?php echo (!empty( $form_details['email']['from_name'] )) ? esc_attr( $form_details['email']['from_name'] ) : ''; ?>"/>
            <p class="description"><?php esc_html_e( 'Please enter the from name which will be used to send the email to subscribers. Please enter any email which won\'t resembele the real person\'s email such as No Reply ', 'subscribe-to-download-lite' ); ?></p>
        </div>
    </div>
    <div class="stdl-field-wrap">
        <label><?php esc_html_e( 'Email Message', 'subscribe-to-download-lite' ); ?></label>
        <div class="stdl-field">
            <textarea name="form_details[email][email_message]"><?php echo (!empty( $form_details['email']['email_message'] )) ? $this->output_converting_br( $form_details['email']['email_message'] ) : $this->get_default_email_message(); ?></textarea>
            <p class="description"><?php esc_html_e( 'Please use #download_link which will be replaced with the download link in the email.', 'subscribe-to-download-lite' ); ?></p>
        </div>
    </div>
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