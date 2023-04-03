jQuery(document).ready(function ($) {
    "use strict";
    /**
     *
     * @type object
     */
    var notice_timeout;

    /**
     * @type object
     */
    var translation_strings = stdl_backend_obj.translation_strings;

    /**
     * Generates required notice
     *
     * @param {string} info_text
     * @param {string} info_type
     *
     */
    function stdl_generate_info(info_text, info_type) {
        clearTimeout(notice_timeout);
        switch (info_type) {
            case 'error':
                var info_html = '<p class="stdl-error">' + info_text + '</p>';
                break;
            case 'info':
                var info_html = '<p class="stdl-info">' + info_text + '</p>';
                break;
            case 'ajax':
                var info_html = '<p class="stdl-ajax"><img src="' + stdl_backend_obj.plugin_url + 'images/ajax-loader.gif" class="stdl-ajax-loader"/>' + info_text + '</p>';
            default:
                break;

        }
        $('.stdl-form-message').html(info_html).show();
        if (info_type != 'ajax') {
            notice_timeout = setTimeout(function () {
                $('.stdl-form-message').slideUp(1000);
            }, 5000);
        }

    }

    /**
     * Performs clipboard copy action
     * 
     * @param {object} element
     * @returns null
     */
    function stdl_copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
    }

    

    /**
     * Settings section show hide
     */
    $('body').on('click', '.stdl-nav-item', function () {
        var tab = $(this).data('tab');
        $('.stdl-nav-item').removeClass('stdl-active-nav');
        $(this).addClass('stdl-active-nav');
        $('.stdl-settings-each-section').hide();
        $('.stdl-settings-each-section[data-tab="' + tab + '"]').show();

    });

    /**
     * Form components slide toggle
     */

    $('body').on('click', '.stdl-component-head h4', function () {
        $(this).closest('.stdl-form-each-component').find('.stdl-component-body').slideToggle();
        if ($(this).next('.dashicons').hasClass('dashicons-arrow-down')) {
            $(this).next('.dashicons').removeClass('dashicons-arrow-down').addClass('dashicons-arrow-up');
        } else {
            $(this).next('.dashicons').removeClass('dashicons-arrow-up').addClass('dashicons-arrow-down');
        }
    });

    /**
     * Open Media Uploader
     */
    $('body').on('click', '.stdl-file-uploader', function () {
        var selector = $(this);

        var image = wp.media({
            title: translation_strings.upload_button_text,
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
                .on('select', function (e) {
                    // This will return the selected image from the Media Uploader, the result is an object
                    var uploaded_image = image.state().get('selection').first();
                    console.log(uploaded_image.toJSON());
                    // We convert uploaded_image to a JSON object to make accessing it easier
                    // Output to the console uploaded_image
                    var image_url = uploaded_image.toJSON().url;
                    var image_id = uploaded_image.toJSON().id;
                    // Let's assign the url value to the input field
                    selector.parent().find('input[type="text"]').val(image_url);
                    selector.parent().find('input[type="hidden"]').val(image_id);
                    if (selector.parent().find('.stdl-image-preview').length > 0) {
                        selector.parent().find('.stdl-image-preview').html('<img src="' + uploaded_image.toJSON().sizes.thumbnail.url + '"/>');
                    }
                });
    });

    



    /**
     * Subscription Form Settings submission
     * 
     */
    $('body').on('submit', '.stdl-subscription-form', function (e) {
        e.preventDefault();
        var selector = $(this);
        var form_data = $(this).serialize();
        var form_action = ($(this).data('form-action')) ? $(this).data('form-action') : 'stdl_form_save_action';
        $.ajax({
            type: 'post',
            url: stdl_backend_obj.ajax_url,
            data: {
                action: form_action,
                _wpnonce: stdl_backend_obj.ajax_nonce,
                form_data: form_data
            },
            beforeSend: function (xhr) {
                stdl_generate_info(translation_strings.ajax_message, 'ajax');
            },
            success: function (res) {
                res = $.parseJSON(res);
                if (res.status == 200) {
                    stdl_generate_info(res.message, 'info');
                    if (res.redirect_url) {
                        window.location = res.redirect_url;
                        exit;
                    }
                } else {
                    stdl_generate_info(res.message, 'error');
                }
            }
        });
    });

    
    

    

    /**
     * Shortcode clipboard copy
     * 
     * @since 1.0.0
     */
    $('body').on('click', '.stdl-clipboard-copy', function () {
        var copy_element = $(this).parent().find('.stdl-shortcode-preview').select();
        stdl_copyToClipboard(copy_element);
        stdl_generate_info(translation_strings.clipboad_copy_message, 'info');
    });

    /**
     * Show hide toggle
     * 
     * @since 1.0.0
     */
    $('body').on('change', '.stdl-toggle-trigger', function () {

        var toggle_ref = $(this).val();
        var toggle_class = $(this).data('toggle-class');
        $('.' + toggle_class).hide();
        $('.' + toggle_class + '[data-toggle-ref="' + toggle_ref + '"]').show();

    });

    

    $('.stdl-field input[type="checkbox"]').each(function () {
        if (!$(this).parent().hasClass('stdl-checkbox-toggle') && !$(this).hasClass('stdl-disable-checkbox-toggle')) {
            var input_name = $(this).attr('name');
            $(this).parent().addClass('stdl-checkbox-toggle');
            $('<label></label>').insertAfter($(this));
        }
    });


    /**
     * Form save trigger 
     * 
     * @since 1.0.0
     */
    $('body').on('click', '.stdl-form-save-trigger', function () {
        $('.stdl-subscription-form').submit();
    });

    

    

    $('body').on('click', '.stdl-checkbox-toggle-trigger', function () {
        var toggle_class = $(this).data('toggle-class');
        var toggle_type = ($(this).data('toggle-type')) ? $(this).data('toggle-type') : 'on';
        switch (toggle_type) {
            case 'on':
                if ($(this).is(':checked')) {
                    $('.' + toggle_class).show();
                } else {
                    $('.' + toggle_class).hide();
                }
                break;
            case 'off':
                if ($(this).is(':checked')) {
                    $('.' + toggle_class).hide();
                } else {
                    $('.' + toggle_class).show();

                }
                break;
        }

    });

    /**
     * Deletes subscriber
     * 
     * @since 1.0.0
     */
    /**
     * Subscription Form Delete
     * 
     * @since 1.0.0
     */
    $('body').on('click', '.stdl-subscriber-delete', function () {
        if (confirm(translation_strings.delete_subscriber_confirm)) {
            var selector = $(this);
            var subscriber_id = $(this).data('subscriber-id');
            $.ajax({
                type: 'post',
                url: stdl_backend_obj.ajax_url,
                data: {
                    action: 'stdl_subscriber_delete_action',
                    subscriber_id: subscriber_id,
                    _wpnonce: stdl_backend_obj.ajax_nonce,
                },
                beforeSend: function (xhr) {
                    stdl_generate_info(translation_strings.ajax_message, 'ajax');
                },
                success: function (res) {
                    res = $.parseJSON(res);
                    if (res.status == 200) {
                        stdl_generate_info(res.message, 'info');
                        selector.closest('tr').fadeOut(500, function () {
                            $(this).remove();
                        });
                    } else {
                        stdl_generate_info(res.message, 'error');
                    }
                }
            });
        }
    });

    
    

    

    

    

    

    


});


