<div class="stdl-form-wrap stdl-<?php echo esc_attr($form_template); ?> stdl-alias>">
    <form method="post" action="" class="stdl-subscription-form" data-form-alias="stdl">

        <?php
        /**
         * Triggers just before displaying the subscription form
         *
         * @param object $form_details
         *
         * @since 1.0.0
         */
        do_action('stdl_before_form', $form_details);

        if (file_exists(STDL_PATH . 'inc/views/frontend/form-templates/' . $form_template . '.php')) {
            include(STDL_PATH . 'inc/views/frontend/form-templates/' . $form_template . '.php');
        }

        /**
         * Triggers just after displaying the subscription form
         *
         * @param object $form_details
         *
         * @since 1.0.0
         */
        do_action('stdl_after_form', $form_details);
        ?>
    </form>
</div>