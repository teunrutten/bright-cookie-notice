<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/teunrutten/bright-cookie-notice
 * @since             1.0.0
 * @package           Avg_Cookie_Notice
 *
 * @wordpress-plugin
 * Plugin Name:       AVG - Wordpress Cookie Notice
 * Plugin URI:        https://github.com/teunrutten/bright-cookie-notice
 * Description:       This plugin creates a cookie notice with multiple checkboxes, it sets a cookie which can be used in tagmanager or php to include or disallow certain scripts.
 * Version:           1.0.0
 * Author:            Teun Rutten
 * Author URI:        https://github.com/teunrutten/bright-cookie-notice
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       avg-cookie-notice
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'AVG_COOKIE_NOTICE_PLUGIN', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-avg-cookie-notice-activator.php
 */
function activate_avg_cookie_notice() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-avg-cookie-notice-activator.php';
	Avg_Cookie_Notice_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-avg-cookie-notice-deactivator.php
 */
function deactivate_avg_cookie_notice() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-avg-cookie-notice-deactivator.php';
	Avg_Cookie_Notice_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_avg_cookie_notice' );
register_deactivation_hook( __FILE__, 'deactivate_avg_cookie_notice' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-avg-cookie-notice.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_avg_cookie_notice() {

	$plugin = new Avg_Cookie_Notice();
	$plugin->run();

}
run_avg_cookie_notice();
