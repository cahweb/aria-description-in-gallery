<?php
/**
 * Plugin Name: Aria Description in Gallery
 * Description: A plguin that adds the Description field from an image in the Media Library to the <code>aria-label</code> attribute of an image displayed with WordPress's native [gallery] shortcode. Applies to every image by default, but can be keyed to Post Type in the options.
 * Author: Mike W. Leavitt
 * Version: 0.0.1
 * Text-Domain: cah-aria-desc
 * 
 * @author Mike W. Leavitt
 * @version 0.0.1
 */
defined( 'ABSPATH' ) or exit( "No direct access plzthx." );

define( 'CAH_ARIA_DESC__PLUGIN_FILE', __FILE__ );
define( 'CAH_ARIA_DESC__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once CAH_ARIA_DESC__PLUGIN_DIR . 'includes/cah-aria-desc-setup.php';
require_once CAH_ARIA_DESC__PLUGIN_DIR . 'includes/cah-aria-desc-img-transmog.php';

if( !function_exists( 'cah_aria_desc_plugin_activate' ) ) {
    function cah_aria_desc_plugin_activate() {
        AriaDescSetup::setup();
        flush_rewrite_rules();
    }
}
register_activation_hook( CAH_ARIA_DESC__PLUGIN_FILE, 'cah_aria_desc_plugin_activate' );

if( !function_exists( 'cah_aria_desc_plugin_deactivate' ) ) {
    function cah_aria_desc_plugin_deactivate() {
        AriaDescSetup::teardown();
        flush_rewrite_rules();
    }
}
register_deactivation_hook( CAH_ARIA_DESC__PLUGIN_FILE, 'cah_aria_desc_plugin_deactivate' );

add_action( 'plugins_loaded', array( 'AriaDescSetup', 'action_hooks' ), 10, 0 );
?>