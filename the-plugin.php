<?php
/**
 * The Plugin
 *
 * @package   ThePlugin
 * @copyright Copyright(c) YYYY, Plugin Author
 * @license http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2 (GPL-2.0)
 *
 * Plugin Name: The Plugin
 * Plugin URI: https://pluginsite.com
 * Description: Give a description for The Plugin.
 * Version: 0.0.0
 * Author: Plugin Author
 * Author URI: https://authorsite.com
 * License: GPL2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: the-plugin
 * Domain Path: /languages
 * Network: false
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Setup the plugin auto loader.
require_once( 'php/autoloader.php' );

/**
 * Admin notice for incompatible versions of PHP.
 */
function _the_plugin_php_version_error() {
	printf( '<div class="error"><p>%s</p></div>', esc_html( _the_plugin_php_version_text() ) );
}

/**
 * String describing the minimum PHP version.
 *
 * "Namespace" is a PHP 5.3 introduced feature. This is a hard requirement
 * for the plugin structure.
 *
 * "Traits" is a PHP 5.4 introduced feature. Remove "Traits" support from
 * php/autoloader if you want to support a lower PHP version.
 * Remember to update the checked version below if you do.
 *
 * @return string
 */
function _the_plugin_php_version_text() {
	return __( 'The Plugin plugin error: Your version of PHP is too old to run this plugin. You must be running PHP 5.4 or higher.', 'the-plugin' );
}

// If the PHP version is too low, show warning and return.
if ( version_compare( phpversion(), '5.4', '<' ) ) {
	if ( defined( 'WP_CLI' ) ) {
		WP_CLI::warning( _the_plugin_php_version_text() );
	} else {
		add_action( 'admin_notices', '_the_plugin_php_version_error' );
	}

	return;
}

/**
 * Get the plugin object.
 *
 * @return \ThePlugin\PluginInterface
 */
function the_plugin() {
	static $instance;

	if ( null === $instance ) {
		$instance = new \ThePlugin\Plugin();
	}

	return $instance;
}

/**
 * Setup the plugin instance.
 */
the_plugin()
	->set_basename( plugin_basename( __FILE__ ) )
	->set_directory( plugin_dir_path( __FILE__ ) )
	->set_file( __FILE__ )
	->set_slug( 'the-plugin' )
	->set_url( plugin_dir_url( __FILE__ ) );

/**
 * Register plugin components.
 */
the_plugin()
	->register_component( new \ThePlugin\View\AdminMenu() );

/**
 * Sometimes we need to do some things after the plugin is loaded, so call the PluginInterface::plugin_loaded().
 */
add_action( 'plugins_loaded', array( the_plugin(), 'plugin_loaded' ) );
