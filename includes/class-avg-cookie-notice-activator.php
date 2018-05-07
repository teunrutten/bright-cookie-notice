<?php

/**
 * Fired during plugin activation
 *
 * @link       https://github.com/teunrutten/bright-cookie-notice
 * @since      1.0.0
 *
 * @package    Avg_Cookie_Notice
 * @subpackage Avg_Cookie_Notice/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Avg_Cookie_Notice
 * @subpackage Avg_Cookie_Notice/includes
 * @author     Teun Rutten <teun@bureaubright.nl>
 */
class Avg_Cookie_Notice_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		register_setting( 'Bright - cookie instellingen', 'bright_cookie_notice' );
	}

}
