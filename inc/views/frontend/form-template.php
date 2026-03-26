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

        $base_dir = realpath(STDL_PATH . 'inc/views/frontend/form-templates') . DIRECTORY_SEPARATOR;
        $sanitized_template = basename($form_template) . '.php';
        $file_path = realpath($base_dir . $sanitized_template);

        if ($file_path && strpos($file_path, $base_dir) === 0 && file_exists($file_path)) {
            include($file_path);
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