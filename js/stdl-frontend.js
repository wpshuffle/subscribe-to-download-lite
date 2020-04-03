jQuery(document).ready(function ($) {
    "use strict";
    /**
     * Form Submission
     * 
     * @since 1.0.0
     */
    $('body').on('submit', '.stdl-subscription-form', function (e) {
        e.preventDefault();
        var selector = $(this);
        var form_alias = $(this).data('form-alias');
        var form_data = $(this).serialize();
        $.ajax({
            type: 'post',
            url: stdl_frontend_obj.ajax_url,
            data: {
                form_data: form_data,
                _wpnonce: stdl_frontend_obj.ajax_nonce,
                action: 'stdl_form_process_action',
                form_alias: form_alias
            },
            beforeSend: function (xhr) {
                selector.find('.stdl-form-message').slideUp(500);
                selector.find('.stdl-form-loader-wraper').show();
            },
            success: function (res) {
                selector.find('.stdl-form-loader-wraper').hide();
                res = $.parseJSON(res);
                if (res.status == 200) {
                    selector[0].reset();
                    selector.find('.stdl-form-message').removeClass('stdl-error').addClass('stdl-success').html(res.message).slideDown(500);
                } else {
                    selector.find('.stdl-form-message').removeClass('stdl-success').addClass('stdl-error').html(res.message).slideDown(500);
                }
            }
        });
    });

    /**
     * Popup Trigger
     * 
     * @since 1.0.0
     */
    $('body').on('click', '.stdl-popup-trigger', function () {
        $(this).next('.stdl-popup-innerwrap').fadeIn(500);
    });
    /**
     * Popup Trigger
     * 
     * @since 1.0.0
     */
    $('body').on('click', '.stdl-popup-close, .stdl-overlay', function () {
        $(this).closest('.stdl-popup-innerwrap').fadeOut(500);
    });

    /**
     * Delay popup display trigger
     * 
     * @since 1.0.0
     */
    if ($('.stdl-delay-popup').length > 0) {
        var delay = $('.stdl-delay-popup').data('delay');
        if (delay == 0 || delay == '') {
            $('.stdl-delay-popup').fadeIn(500);
        } else {
            setTimeout(function () {
                $('.stdl-delay-popup').fadeIn(500);
            }, delay * 1000);
        }
    }
    /**
     * Prevents popup from being closed
     * 
     * @since 1.0.0
     */
    $('body').on('click', '.stdl-form-wrap', function (e) {
        e.stopPropagation();
    });

});