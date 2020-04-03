<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!!' );
if ( !class_exists( 'STDL_Ajax' ) ) {

    class STDL_Ajax extends STDL_Library {

        function __construct() {
            /**
             * Form process ajax
             */
            add_action( 'wp_ajax_stdl_form_process_action', array( $this, 'form_process_action' ) );
            add_action( 'wp_ajax_nopriv_stdl_form_process_action', array( $this, 'form_process_action' ) );
        }

        /**
         * Process subscription form
         *
         * @since 1.0.0
         */
        function form_process_action() {
            include(STDL_PATH . 'inc/cores/subscription-process.php');
        }

    }

    new STDL_Ajax();
}
