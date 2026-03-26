<div class="stdl-settings-each-section" data-tab="form" style="display:none;">
    <div class="stdl-field stdl-form-flx">
        <div class="stdl-form-left">
            <div class="stdl-form-each-component">
                <div class="stdl-component-head stdl-clearfix">
                    <h4><?php esc_html_e('Heading', 'subscribe-to-download-lite'); ?></h4>
                    <span class="dashicons dashicons-arrow-down"></span>
                </div>
                <div class="stdl-component-body">
                    <div class="stdl-field-wrap">
                        <label><?php esc_html_e('Show', 'subscribe-to-download-lite'); ?></label>
                        <div class="stdl-field">
                            <input type="checkbox" name="form_details[form][heading][show]" value="1" <?php echo (!empty($form_details['form']['heading']['show'])) ? 'checked="checked"' : ''; ?> />
                        </div>
                    </div>
                    <div class="stdl-field-wrap">
                        <label><?php esc_html_e('Heading Text', 'subscribe-to-download-lite'); ?></label>
                        <div class="stdl-field">
                            <textarea name="form_details[form][heading][text]"><?php echo (!empty($form_details['form']['heading']['text'])) ? $this->sanitize_html($form_details['form']['heading']['text']) : ''; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="stdl-form-each-component">
                <div class="stdl-component-head stdl-clearfix">
                    <h4><?php esc_html_e('Sub Heading', 'subscribe-to-download-lite'); ?></h4>
                    <span class="dashicons dashicons-arrow-down"></span>
                </div>
                <div class="stdl-component-body">
                    <div class="stdl-field-wrap">
                        <label><?php esc_html_e('Show', 'subscribe-to-download-lite'); ?></label>
                        <div class="stdl-field">
                            <input type="checkbox" name="form_details[form][sub_heading][show]" value="1" <?php echo (!empty($form_details['form']['sub_heading']['show'])) ? 'checked="checked"' : ''; ?> />
                        </div>
                    </div>
                    <div class="stdl-field-wrap">
                        <label><?php esc_html_e('Sub Heading Text', 'subscribe-to-download-lite'); ?></label>
                        <div class="stdl-field">
                            <textarea name="form_details[form][sub_heading][text]"><?php echo (!empty($form_details['form']['sub_heading']['text'])) ? $this->sanitize_html($form_details['form']['sub_heading']['text']) : ''; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="stdl-form-each-component">
                <div class="stdl-component-head stdl-clearfix">
                    <h4><?php esc_html_e('Name', 'subscribe-to-download-lite'); ?></h4>
                    <span class="dashicons dashicons-arrow-down"></span>
                </div>
                <div class="stdl-component-body">
                    <div class="stdl-field-wrap">
                        <label><?php esc_html_e('Show', 'subscribe-to-download-lite'); ?></label>
                        <div class="stdl-field">
                            <input type="checkbox" name="form_details[form][name][show]" value="1" <?php echo (!empty($form_details['form']['name']['show'])) ? 'checked="checked"' : ''; ?> />
                        </div>
                    </div>
                    <div class="stdl-field-wrap">
                        <label><?php esc_html_e('Required', 'subscribe-to-download-lite'); ?></label>
                        <div class="stdl-field">
                            <input type="checkbox" name="form_details[form][name][required]" value="1" <?php echo (!empty($form_details['form']['name']['required'])) ? 'checked="checked"' : ''; ?> />
                        </div>
                    </div>

                    <div class="stdl-field-wrap">
                        <label><?php esc_html_e('Label', 'subscribe-to-download-lite'); ?></label>
                        <div class="stdl-field">
                            <input type="text" name="form_details[form][name][label]" value="<?php echo (!empty($form_details['form']['name']['label'])) ? esc_attr($form_details['form']['name']['label']) : ''; ?>" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="stdl-form-each-component">
                <div class="stdl-component-head stdl-clearfix">
                    <h4><?php esc_html_e('Email', 'subscribe-to-download-lite'); ?></h4>
                    <span class="dashicons dashicons-arrow-down"></span>
                </div>
                <div class="stdl-component-body">
                    <div class="stdl-field-wrap">
                        <label><?php esc_html_e('Label', 'subscribe-to-download-lite'); ?></label>
                        <div class="stdl-field">
                            <input type="text" name="form_details[form][email][label]" value="<?php echo (!empty($form_details['form']['email']['label'])) ? esc_attr($form_details['form']['email']['label']) : ''; ?>" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="stdl-form-each-component">
                <div class="stdl-component-head stdl-clearfix">
                    <h4><?php esc_html_e('Terms and Agreement', 'subscribe-to-download-lite'); ?></h4>
                    <span class="dashicons dashicons-arrow-down"></span>
                </div>
                <div class="stdl-component-body">
                    <div class="stdl-field-wrap">
                        <label><?php esc_html_e('Show', 'subscribe-to-download-lite'); ?></label>
                        <div class="stdl-field">
                            <input type="checkbox" name="form_details[form][terms_agreement][show]" <?php echo (!empty($form_details['form']['terms_agreement']['show'])) ? 'checked="checked"' : ''; ?> />
                        </div>
                    </div>
                    <div class="stdl-field-wrap">
                        <label><?php esc_html_e('Text', 'subscribe-to-download-lite'); ?></label>
                        <div class="stdl-field">
                            <textarea name="form_details[form][terms_agreement][agreement_text]"><?php echo (!empty($form_details['form']['terms_agreement']['agreement_text'])) ? $this->sanitize_html($form_details['form']['terms_agreement']['agreement_text']) : ''; ?></textarea>
                            <p class="description">
                                <?php esc_html_e('You can enter basic html tags such as strong, a, ul, li etc.', 'subscribe-to-download-lite'); ?>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="stdl-form-each-component">
                <div class="stdl-component-head stdl-clearfix">
                    <h4><?php esc_html_e('Subscribe Button', 'subscribe-to-download-lite'); ?></h4>
                    <span class="dashicons dashicons-arrow-down"></span>
                </div>
                <div class="stdl-component-body">
                    <div class="stdl-field-wrap">
                        <label><?php esc_html_e('Button Text', 'subscribe-to-download-lite'); ?></label>
                        <div class="stdl-field">
                            <input type="text" name="form_details[form][subscribe_button][button_text]" value="<?php echo (!empty($form_details['form']['subscribe_button']['button_text'])) ? esc_attr($form_details['form']['subscribe_button']['button_text']) : ''; ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="stdl-form-each-component">
                <div class="stdl-component-head stdl-clearfix">
                    <h4><?php esc_html_e('Footer', 'subscribe-to-download-lite'); ?></h4>
                    <span class="dashicons dashicons-arrow-down"></span>
                </div>
                <div class="stdl-component-body">
                    <div class="stdl-field-wrap">
                        <label><?php esc_html_e('Show', 'subscribe-to-download-lite'); ?></label>
                        <div class="stdl-field">
                            <input type="checkbox" name="form_details[form][footer][show]" <?php echo (!empty($form_details['form']['footer']['show'])) ? 'checked="checked"' : ''; ?> />
                        </div>
                    </div>
                    <div class="stdl-field-wrap">
                        <label><?php esc_html_e('Footer Text', 'subscribe-to-download-lite'); ?></label>
                        <div class="stdl-field">
                            <textarea name="form_details[form][footer][footer_text]"><?php echo (!empty($form_details['form']['footer']['footer_text'])) ? $this->sanitize_html($form_details['form']['footer']['footer_text']) : ''; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="stdl-form-right stdl-box">
            <?php
            /**
             * Custom Field
             */
            include(STDL_PATH . 'inc/views/backend/form-sections/custom-field-add-form.php');
            ?>

        </div>
    </div>
</div>