<?php
/*
Plugin Name: Content plugin for ILAB Stem App Framework
Plugin URI: https://github.com/jawngee/stem-content
Description: Plugin for Stem that extends with a basic framework for content blocks in WordPress.
Author: Jon Gilkison
Version: 0.1
Author URI: http://interfacelab.io
*/

require_once('vendor/autoload.php');

define('ILAB_STEM_CONTENT_DIR',dirname(__FILE__));
define('ILAB_STEM_CONTENT_URI', plugin_dir_url(__FILE__));

register_activation_hook( __FILE__, function(){
	if (!class_exists('\ILab\Stem\Core\Context')) {
		deactivate_plugins( plugin_basename( __FILE__ ) );
		wp_die( __( 'Please install ILAB Stem App Framework for WordPress before activating this plugin.', 'stem-content' ) );
	}
});

add_action('acf/include_field_types', function( $version ) {
	new \ILab\StemContent\ACF\FontAwesomeField();
	new \ILab\StemContent\ACF\CSSClassesField();
});