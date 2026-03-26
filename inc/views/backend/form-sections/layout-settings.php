<?php $selected_layout = (!empty( $form_details['layout']['template'] )) ? esc_attr( $form_details['layout']['template'] ) : 'template-1'; ?>
<div class="stdl-settings-each-section stdl-form-flx" data-tab="layout" style="display:none;">
    <div class="stdl-form-left">
    <div class="stdl-field-wrap">
        <label><?php esc_html_e( 'Form Layout', 'subscribe-to-download-lite' ); ?></label>
        <div class="stdl-field">
            <select name="form_details[layout][template]" class="stdl-toggle-trigger" data-toggle-class="stdl-form-layout">
                <?php
                for ( $i = 1; $i <= STDL_TOTAL_TEMPLATES; $i++ ) {
                    ?>
                    <option value="template-<?php echo intval( $i ); ?>" <?php echo selected( $selected_layout, 'template-' . $i ); ?>>Template <?php echo intval( $i ); ?></option>
                    <?php
                }
                ?>
            </select>
            <div class="stdl-preview-img-wrapper">
                <?php
                for ( $i = 1; $i <= STDL_TOTAL_TEMPLATES; $i++ ) {
                    ?>
                    <div class="stdl-form-layout" <?php $this->display_none( $selected_layout, 'template-' . $i ); ?> data-toggle-ref="template-<?php echo intval( $i ); ?>">
                        <img src="<?php echo esc_url( STDL_IMG_DIR . '/template-previews/template-' . $i . '.jpg' ); ?>"/>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="stdl-field-wrap">
        <label><?php esc_html_e( 'Form Width', 'subscribe-to-download-lite' ); ?></label>
        <div class="stdl-field">
            <input type="text" name="form_details[layout][form_width]" value="<?php echo (!empty( $form_details['layout']['form_width'] )) ? esc_attr( $form_details['layout']['form_width'] ) : ''; ?>" placeholder="<?php esc_html_e( '500px or 100%', 'subscribe-to-download-lite' ); ?>"/>
            <p class="description"><?php esc_html_e( 'Please enter the width of the form either in px or %', 'subscribe-to-download-lite' ); ?></p>
        </div>
    </div>

    <div class="stdl-field-wrap stdl-form-layout" data-toggle-ref="template-5" <?php $this->display_none( $selected_layout, 'template-5' ); ?>>
        <label><?php esc_html_e( 'Icon Image', 'subscribe-to-download-lite' ); ?></label>
        <div class="stdl-field">
            <input type="text" name="form_details[layout][template_5][icon_image]" value="<?php echo (!empty( $form_details['layout']['template_5']['icon_image'] )) ? esc_url( $form_details['layout']['template_5']['icon_image'] ) : ''; ?>"/>
            <input type="button" class="button-secondary stdl-file-uploader" value="<?php esc_html_e( 'Upload Icon', 'subscribe-to-download-lite' ); ?>"/>
            <?php if ( !empty( $form_details['layout']['template_5']['icon_image'] ) ) { ?>
                <div class="stdl-image-preview">
                    <img src="<?php echo esc_url( $form_details['layout']['template_5']['icon_image'] ); ?>"/>
                </div>
            <?php } ?>
        </div>
    </div>
    
    <div class="stdl-field-wrap">
        <label><?php esc_html_e( 'Display Type', 'subscribe-to-download-lite' ); ?></label>
        <div class="stdl-field">
            <select name="form_details[layout][display_type]" class="stdl-toggle-trigger" data-toggle-class='stdl-display-type'>
                <?php $selected_display_type = (!empty( $form_details['layout']['display_type'] )) ? $form_details['layout']['display_type'] : 'direct'; ?>
                <option value="direct" <?php selected( $selected_display_type, 'direct' ); ?>><?php esc_html_e( 'Direct Display', 'subscribe-to-download-lite' ); ?></option>
                <option value="popup" <?php selected( $selected_display_type, 'popup' ); ?>><?php esc_html_e( 'Popup Display', 'subscribe-to-download-lite' ); ?></option>
            </select>
        </div>
    </div>
    <div class="stdl-field-wrap stdl-display-type" data-toggle-ref='popup' <?php $this->display_none( $selected_display_type, 'popup' ) ?>>
        <label><?php esc_html_e( 'Popup Trigger Text', 'subscribe-to-download-lite' ); ?></label>
        <div class="stdl-field">
            <input type="text" name="form_details[layout][popup_trigger_text]" value="<?php echo (!empty( $form_details['layout']['popup_trigger_text'] )) ? esc_attr( $form_details['layout']['popup_trigger_text'] ) : ''; ?>"/>
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