<?php $selected_layout = (!empty( $form_details['layout']['template'] )) ? esc_attr( $form_details['layout']['template'] ) : 'template-1'; ?>
<div class="stdl-settings-each-section" data-tab="layout" style="display:none;">

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
    <div class="stdl-field-wrap stdl-form-layout" data-toggle-ref="template-6" <?php $this->display_none( $selected_layout, 'template-6' ); ?>>
        <label><?php esc_html_e( 'Icon Image', 'subscribe-to-download-lite' ); ?></label>
        <div class="stdl-field">
            <input type="text" name="form_details[layout][template_6][icon_image]" value="<?php echo (!empty( $form_details['layout']['template_6']['icon_image'] )) ? esc_url( $form_details['layout']['template_6']['icon_image'] ) : ''; ?>"/>
            <input type="button" class="button-secondary stdl-file-uploader" value="<?php esc_html_e( 'Upload Icon', 'subscribe-to-download-lite' ); ?>"/>
            <?php if ( !empty( $form_details['layout']['template_6']['icon_image'] ) ) { ?>
                <div class="stdl-image-preview">
                    <img src="<?php echo esc_url( $form_details['layout']['template_6']['icon_image'] ); ?>"/>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="stdl-field-wrap stdl-form-layout" data-toggle-ref="template-7" <?php $this->display_none( $selected_layout, 'template-7' ); ?>>
        <label><?php esc_html_e( 'Icon Image', 'subscribe-to-download-lite' ); ?></label>
        <div class="stdl-field">
            <input type="text" name="form_details[layout][template_7][icon_image]" value="<?php echo (!empty( $form_details['layout']['template_7']['icon_image'] )) ? esc_url( $form_details['layout']['template_7']['icon_image'] ) : ''; ?>"/>
            <input type="button" class="button-secondary stdl-file-uploader" value="<?php esc_html_e( 'Upload Icon', 'subscribe-to-download-lite' ); ?>"/>
            <?php if ( !empty( $form_details['layout']['template_7']['icon_image'] ) ) { ?>
                <div class="stdl-image-preview">
                    <img src="<?php echo esc_url( $form_details['layout']['template_7']['icon_image'] ); ?>"/>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="stdl-field-wrap stdl-form-layout" data-toggle-ref="template-8" <?php $this->display_none( $selected_layout, 'template-8' ); ?>>
        <label><?php esc_html_e( 'Icon Image', 'subscribe-to-download-lite' ); ?></label>
        <div class="stdl-field">
            <input type="text" name="form_details[layout][template_8][icon_image]" value="<?php echo (!empty( $form_details['layout']['template_8']['icon_image'] )) ? esc_url( $form_details['layout']['template_8']['icon_image'] ) : ''; ?>"/>
            <input type="button" class="button-secondary stdl-file-uploader" value="<?php esc_html_e( 'Upload Icon', 'subscribe-to-download-lite' ); ?>"/>
            <?php if ( !empty( $form_details['layout']['template_8']['icon_image'] ) ) { ?>
                <div class="stdl-image-preview">
                    <img src="<?php echo esc_url( $form_details['layout']['template_8']['icon_image'] ); ?>"/>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="stdl-field-wrap stdl-form-layout" data-toggle-ref="template-9" <?php $this->display_none( $selected_layout, 'template-9' ); ?>>
        <label><?php esc_html_e( 'Icon Image', 'subscribe-to-download-lite' ); ?></label>
        <div class="stdl-field">
            <input type="text" name="form_details[layout][template_9][icon_image]" value="<?php echo (!empty( $form_details['layout']['template_9']['icon_image'] )) ? esc_url( $form_details['layout']['template_9']['icon_image'] ) : ''; ?>"/>
            <input type="button" class="button-secondary stdl-file-uploader" value="<?php esc_html_e( 'Upload Icon', 'subscribe-to-download-lite' ); ?>"/>
            <?php if ( !empty( $form_details['layout']['template_9']['icon_image'] ) ) { ?>
                <div class="stdl-image-preview">
                    <img src="<?php echo esc_url( $form_details['layout']['template_9']['icon_image'] ); ?>"/>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="stdl-field-wrap stdl-form-layout" data-toggle-ref="template-10" <?php $this->display_none( $selected_layout, 'template-10' ); ?>>
        <label><?php esc_html_e( 'Icon Image', 'subscribe-to-download-lite' ); ?></label>
        <div class="stdl-field">
            <input type="text" name="form_details[layout][template_10][icon_image]" value="<?php echo (!empty( $form_details['layout']['template_10']['icon_image'] )) ? esc_url( $form_details['layout']['template_10']['icon_image'] ) : ''; ?>"/>
            <input type="button" class="button-secondary stdl-file-uploader" value="<?php esc_html_e( 'Upload Icon', 'subscribe-to-download-lite' ); ?>"/>
            <?php if ( !empty( $form_details['layout']['template_10']['icon_image'] ) ) { ?>
                <div class="stdl-image-preview">
                    <img src="<?php echo esc_url( $form_details['layout']['template_10']['icon_image'] ); ?>"/>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="stdl-field-wrap stdl-form-layout" data-toggle-ref="template-11" <?php $this->display_none( $selected_layout, 'template-11' ); ?>>
        <label><?php esc_html_e( 'Display Image', 'subscribe-to-download-lite' ); ?></label>
        <div class="stdl-field">
            <input type="text" name="form_details[layout][template_11][display_image]" value="<?php echo (!empty( $form_details['layout']['template_11']['display_image'] )) ? esc_url( $form_details['layout']['template_11']['display_image'] ) : ''; ?>"/>
            <input type="button" class="button-secondary stdl-file-uploader" value="<?php esc_html_e( 'Upload Image', 'subscribe-to-download-lite' ); ?>"/>
            <?php if ( !empty( $form_details['layout']['template_11']['display_image'] ) ) { ?>
                <div class="stdl-image-preview">
                    <img src="<?php echo esc_url( $form_details['layout']['template_11']['display_image'] ); ?>"/>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="stdl-field-wrap stdl-form-layout" data-toggle-ref="template-12" <?php $this->display_none( $selected_layout, 'template-12' ); ?>>
        <label><?php esc_html_e( 'Display Image', 'subscribe-to-download-lite' ); ?></label>
        <div class="stdl-field">
            <input type="text" name="form_details[layout][template_12][display_image]" value="<?php echo (!empty( $form_details['layout']['template_12']['display_image'] )) ? esc_url( $form_details['layout']['template_12']['display_image'] ) : ''; ?>"/>
            <input type="button" class="button-secondary stdl-file-uploader" value="<?php esc_html_e( 'Upload Image', 'subscribe-to-download-lite' ); ?>"/>
            <?php if ( !empty( $form_details['layout']['template_12']['display_image'] ) ) { ?>
                <div class="stdl-image-preview">
                    <img src="<?php echo esc_url( $form_details['layout']['template_12']['display_image'] ); ?>"/>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="stdl-field-wrap stdl-form-layout" data-toggle-ref="template-13" <?php $this->display_none( $selected_layout, 'template-13' ); ?>>
        <label><?php esc_html_e( 'Display Image', 'subscribe-to-download-lite' ); ?></label>
        <div class="stdl-field">
            <input type="text" name="form_details[layout][template_13][display_image]" value="<?php echo (!empty( $form_details['layout']['template_13']['display_image'] )) ? esc_url( $form_details['layout']['template_13']['display_image'] ) : ''; ?>"/>
            <input type="button" class="button-secondary stdl-file-uploader" value="<?php esc_html_e( 'Upload Image', 'subscribe-to-download-lite' ); ?>"/>
            <?php if ( !empty( $form_details['layout']['template_13']['display_image'] ) ) { ?>
                <div class="stdl-image-preview">
                    <img src="<?php echo esc_url( $form_details['layout']['template_13']['display_image'] ); ?>"/>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="stdl-field-wrap stdl-form-layout" data-toggle-ref="template-14" <?php $this->display_none( $selected_layout, 'template-14' ); ?>>
        <label><?php esc_html_e( 'Header Background Image', 'subscribe-to-download-lite' ); ?></label>
        <div class="stdl-field">
            <input type="text" name="form_details[layout][template_14][header_bg_image]" value="<?php echo (!empty( $form_details['layout']['template_14']['header_bg_image'] )) ? esc_url( $form_details['layout']['template_14']['header_bg_image'] ) : ''; ?>"/>
            <input type="button" class="button-secondary stdl-file-uploader" value="<?php esc_html_e( 'Upload Image', 'subscribe-to-download-lite' ); ?>"/>
            <?php if ( !empty( $form_details['layout']['template_14']['header_bg_image'] ) ) { ?>
                <div class="stdl-image-preview">
                    <img src="<?php echo esc_url( $form_details['layout']['template_14']['header_bg_image'] ); ?>"/>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="stdl-field-wrap stdl-form-layout" data-toggle-ref="template-16" <?php $this->display_none( $selected_layout, 'template-16' ); ?>>
        <label><?php esc_html_e( 'Header Background Image', 'subscribe-to-download-lite' ); ?></label>
        <div class="stdl-field">
            <input type="text" name="form_details[layout][template_16][header_bg_image]" value="<?php echo (!empty( $form_details['layout']['template_16']['header_bg_image'] )) ? esc_url( $form_details['layout']['template_16']['header_bg_image'] ) : ''; ?>"/>
            <input type="button" class="button-secondary stdl-file-uploader" value="<?php esc_html_e( 'Upload Image', 'subscribe-to-download-lite' ); ?>"/>
            <?php if ( !empty( $form_details['layout']['template_16']['header_bg_image'] ) ) { ?>
                <div class="stdl-image-preview">
                    <img src="<?php echo esc_url( $form_details['layout']['template_16']['header_bg_image'] ); ?>"/>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="stdl-field-wrap stdl-form-layout" data-toggle-ref="template-19" <?php $this->display_none( $selected_layout, 'template-19' ); ?>>
        <label><?php esc_html_e( 'Display Image', 'subscribe-to-download-lite' ); ?></label>
        <div class="stdl-field">
            <input type="text" name="form_details[layout][template_19][display_image]" value="<?php echo (!empty( $form_details['layout']['template_19']['display_image'] )) ? esc_url( $form_details['layout']['template_19']['display_image'] ) : ''; ?>"/>
            <input type="button" class="button-secondary stdl-file-uploader" value="<?php esc_html_e( 'Upload Image', 'subscribe-to-download-lite' ); ?>"/>
            <?php if ( !empty( $form_details['layout']['template_19']['display_image'] ) ) { ?>
                <div class="stdl-image-preview">
                    <img src="<?php echo esc_url( $form_details['layout']['template_19']['display_image'] ); ?>"/>
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