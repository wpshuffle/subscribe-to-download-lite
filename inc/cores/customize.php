<?php

global $stdl_mobile_detector;
if (!empty($form_details['layout']['form_width']) && !$stdl_mobile_detector->isMobile() && !$stdl_mobile_detector->isTablet()) {
    $form_width = esc_attr($form_details['layout']['form_width']);
    $form_width_css = ".stdl-form-wrap{max-width:$form_width !important;}";
    wp_add_inline_style('stdl-frontend-custom', $form_width_css);
}