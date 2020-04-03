<?php

defined('ABSPATH') or die('No script kiddies please!!');
if (!class_exists('STDL_Metabox')) {

    class STDL_Metabox extends STDL_Library {

        function __construct() {
            add_action('add_meta_boxes', array($this, 'add_stdl_metabox'));
            add_action('save_post', array($this, 'save_stdl_metabox'), 10, 2);
        }

        function add_stdl_metabox() {
            add_meta_box('stdl-metabox', esc_html__('Subscribe to Download', 'subscribe-to-download-lite'), array($this, 'render_stdl_metabox'), array(), 'side', 'default');
        }

        function render_stdl_metabox($post) {
            include(STDL_PATH . 'inc/views/backend/stdl-metabox.php');
        }

        /**
         * Handles saving the meta box.
         *
         * @param int     $post_id Post ID.
         * @param WP_Post $post    Post object.
         * @return null
         *
         * @since 1.0.0
         */
        public function save_stdl_metabox($post_id, $post) {

            // Check if nonce is valid.
            if (empty($_POST['stdl_metabox_nonce_field'])) {
                return;
            }
            if (!wp_verify_nonce($_POST['stdl_metabox_nonce_field'], 'stdl_metabox_nonce')) {
                return;
            }

            // Check if user has permissions to save data.
            if (!current_user_can('edit_post', $post_id)) {
                return;
            }

            // Check if not an autosave.
            if (wp_is_post_autosave($post_id)) {
                return;
            }

            // Check if not a revision.
            if (wp_is_post_revision($post_id)) {
                return;
            }

            if (empty($_POST['stdl_metabox_details'])) {
                return;
            }

            $stdl_metabox_details = $this->sanitize_array($_POST['stdl_metabox_details']);
            update_post_meta($post_id, '_stdl_metabox_details', $stdl_metabox_details);
        }

    }

    new STDL_Metabox();
}
