<?php
/**
 * CAH Aria Description Setup
 * 
 * A class designed to handle the static setup functions for the plugin.
 * 
 * @author Mike W. Leavitt
 * @version 0.0.1
 */
defined( 'ABSPATH' ) or exit( "No direct access plzthx." );

require_once 'cah-aria-desc-img-transmog.php';

if( !class_exists( 'AriaDescSetup' ) ) {
    class AriaDescSetup
    {
        private function __construct() {}

        public static function setup() {
            return;
        }

        public static function teardown() {
            return;
        }

        public static function action_hooks() {
            add_filter( 'wp_get_attachment_image_attributes', array( 'AriaDescImgTransmogrifier', 'add_aria_label' ), 10, 2 );
        }
    }
}
?>