<?php
/**
 * CAH Aria Description Image Transmogrifier
 * 
 * Adds the aria-label attribute to appropriate images and populates it with the
 * contents of the Description field in the WordPress Media gallery.
 * 
 * @author Mike W. Leavitt
 * @version 0.0.1
 */
defined( 'ABSPATH' ) or exit( "No direct access plzthx." );

if( !class_exists( 'AriaDescImgTransmogrifier' ) ) {
    class AriaDescImgTransmogrifier
    {
        private function __construct() {}

        public static function add_aria_label( $attr, $attachment ) {
            if( is_admin() ) return $attr;
            if( isset( $attr['aria-label'] ) && !empty( $attr['aria-label'] ) ) return $attr;

            $desc = $attachment->post_content;

            if( empty( $desc ) ) $desc = $attr['alt'];

            $attr['aria-label'] = $desc;

            return $attr;
        }
    }
}
?>