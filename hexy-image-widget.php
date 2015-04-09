<?php
/**
 * Hexy Image Widget
 *
 * @package   HexyImageWidget
 * @author    Rimaz Rauf
 * @copyright Copyright (c) 2015, RimazRauf.com
 * @license   GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Hexy Image Widget
 * Plugin URI: https://wordpress.org/extend/plugins/hexy-image-widget/
 * Description: A simple image widget utilizing the new WordPress media manager and you can set the image link to be followed or nonfollowed.
 * Version: 1.2
 * Author: Rimaz Rauf
 * Author URI: http://www.rimazrauf.com/
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: simple-image-widget
 * Domain Path: /languages
 */

/**
 * Main plugin instance.
 *
 * @since 1.0
 * @type Hexy_Image_Widget $hexy_image_widget
 */
global $hexy_image_widget;

if ( ! defined( 'SIW_DIR' ) ) {
	/**
	 * Plugin directory path.
	 *
	 * @since 4.0.0
	 * @type string SIW_DIR
	 */
	define( 'SIW_DIR', plugin_dir_path( __FILE__ ) );
}

/**
 * Check if the installed version of WordPress supports the new media manager.
 *
 * @since 3.0.0
 */
function is_hexy_image_widget_legacy() {
	/**
	 * Whether the installed version of WordPress supports the new media manager.
	 *
	 * @since 4.0.0
	 *
	 * @param bool $is_legacy
	 */
	return apply_filters( 'is_hexy_image_widget_legacy', version_compare( get_bloginfo( 'version' ), '3.4.2', '<=' ) );
}

/**
 * Include functions and libraries.
 */
require_once( SIW_DIR . 'includes/class-hexy-image-widget.php' );
require_once( SIW_DIR . 'includes/class-hexy-image-widget-legacy.php' );
require_once( SIW_DIR . 'includes/class-hexy-image-widget-plugin.php' );
require_once( SIW_DIR . 'includes/class-hexy-image-widget-template-loader.php' );

/**
 * Deprecated main plugin class.
 *
 * @since      3.0.0
 * @deprecated 4.0.0
 */
class Hexy_Image_Widget_Loader extends Hexy_Image_Widget_Plugin {}

// Initialize and load the plugin.
$hexy_image_widget = new Hexy_Image_Widget_Plugin();
add_action( 'plugins_loaded', array( $hexy_image_widget, 'load' ) );
