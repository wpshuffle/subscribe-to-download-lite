<a href="<?php echo site_url() . '/?stdl_encryption_key=' . sanitize_text_field( $_COOKIE['stdl_encryption_key'] ); ?>" class="stdl-download-button stdl-button-<?php echo esc_attr( $form_template ); ?>"><i class="fa fa-download" aria-hidden="true"></i>
    <?php echo esc_attr( $form_details['general']['download_button_text'] ); ?></a>

