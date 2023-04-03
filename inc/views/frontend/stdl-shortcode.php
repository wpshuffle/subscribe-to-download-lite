<?php
$form_details = get_option('stdl_settings');
$form_template = (!empty($atts['template'])) ? $atts['template'] : $form_details['layout']['template'];
if (isset($_COOKIE['stdl_encryption_key']) && $this->check_if_already_subscribed($_COOKIE['stdl_encryption_key']) && empty($form_details['general']['always_show'])) {
    /**
     * Triggers just before displaying the download button
     *
     * @param object $form_details
     *
     * @since 1.0.0
     */
    do_action('stdl_before_download', $form_details);
    include(STDL_PATH . 'inc/views/frontend/download-button.php');

    /**
     * Triggers just after displaying the download button
     *
     * @param object $form_details
     *
     * @since 1.0.0
     */
    do_action('stdl_after_download', $form_details);
} else {
    ?>
    <?php
    $alias_class = 'stdl-alias';
    $popup_alias_class = 'stdl-popup-alias';

    $heading_show = (!empty($form_details['form']['heading']['show'])) ? true : false;
    $heading_text = $form_details['form']['heading']['text'];
    $sub_heading_show = (!empty($form_details['form']['sub_heading']['show'])) ? true : false;
    $sub_heading_text = $form_details['form']['sub_heading']['text'];
    $name_show = (!empty($form_details['form']['name']['show'])) ? true : false;
    $name_label = $form_details['form']['name']['label'];
    $email_label = $form_details['form']['email']['label'];
    $terms_agreement_show = (!empty($form_details['form']['terms_agreement']['show'])) ? true : false;
    $terms_agreement_text = $form_details['form']['terms_agreement']['agreement_text'];
    $subscribe_button_text = $form_details['form']['subscribe_button']['button_text'];
    $footer_show = (!empty($form_details['form']['footer']['show'])) ? true : false;
    $footer_text = $form_details['form']['footer']['footer_text'];
    $display_type = $form_details['layout']['display_type'];
    $popup_trigger_text = $form_details['layout']['popup_trigger_text'];
    if ($display_type == 'direct') {
        include(STDL_PATH . 'inc/views/frontend/form-template.php');
    } else {
        ?>
        <div class="stdl-popup-outerwrap <?php echo esc_attr($popup_alias_class); ?>">
            <input type="button" class="stdl-popup-trigger stdl-popup-<?php echo esc_attr($form_template); ?>" value="<?php echo esc_attr($popup_trigger_text); ?>">
            <div class="stdl-popup-innerwrap" style="display:none;">
                <div class="stdl-overlay stdl-popup-wrapper">

                    <div class="stdl-popup-contetn-wrap">
                        <a href="javascript:void(0)" class="stdl-popup-close"><i class="fas fa-times"></i></a>
                            <?php include(STDL_PATH . 'inc/views/frontend/form-template.php');
                            ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    include(STDL_PATH . 'inc/cores/customize.php');
}
