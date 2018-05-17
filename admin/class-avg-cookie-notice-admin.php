<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/teunrutten/bright-cookie-notice
 * @since      1.0.0
 *
 * @package    Avg_Cookie_Notice
 * @subpackage Avg_Cookie_Notice/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Avg_Cookie_Notice
 * @subpackage Avg_Cookie_Notice/admin
 * @author     Teun Rutten <teun@bureaubright.nl>
 */
class Avg_Cookie_Notice_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Avg_Cookie_Notice_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Avg_Cookie_Notice_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/avg-cookie-notice-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'wp-color-picker' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Avg_Cookie_Notice_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Avg_Cookie_Notice_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( 'wp-color-picker');
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/avg-cookie-notice-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register the options page for the admin area.
	 *
	 * @since    1.0.0
	 */
	public static function bright_options_page() {
		add_options_page( 'Bright - Cookie instellingen', 'Bright - AVG Wordpress Cookie Notice', 'manage_options', 'avg-cookie-notice', function() {
			include(plugin_dir_path( __FILE__ ) . 'partials/avg-cookie-notice-admin-display.php');
		} );
	}

	/**
	 * Register the settings.
	 *
	 * @since    1.0.0
	 */
	public static function bright_register_settings() {
		// Text placed in the cookie notice
		register_setting( 'bright-cookie-notice-settings', 'cookie_content_content' );

		// Link and text for the cookie content page
		register_setting( 'bright-cookie-notice-settings', 'cookie_content_link_url' );
		register_setting( 'bright-cookie-notice-settings', 'cookie_content_link_text' );

		// Small line of text above the checkboxes
		register_setting( 'bright-cookie-notice-settings', 'cookie_content_checkbox_intro' );

		// Text of the confirmation button
		register_setting( 'bright-cookie-notice-settings', 'cookie_content_confirmation' );

		// Check if all checkboxes should be shown
		register_setting( 'bright-cookie-notice-settings', 'cookie_content_necessary' );
		register_setting( 'bright-cookie-notice-settings', 'cookie_content_analytics' );
		register_setting( 'bright-cookie-notice-settings', 'cookie_content_tracking' );

		register_setting( 'bright-cookie-notice-settings', 'cookie_content_necessary_name' );
		register_setting( 'bright-cookie-notice-settings', 'cookie_content_analytics_name' );
		register_setting( 'bright-cookie-notice-settings', 'cookie_content_tracking_name' );

		// Uitlijning
		register_setting( 'bright-cookie-notice-settings', 'cookie_content_align' );
		register_setting( 'bright-cookie-notice-settings', 'cookie_content_position' );

		// Stijl
		register_setting( 'bright-cookie-notice-settings', 'cookie_content_font_size' );
		register_setting( 'bright-cookie-notice-settings', 'cookie_content_background_color' );
		register_setting( 'bright-cookie-notice-settings', 'cookie_content_content_color' );
		register_setting( 'bright-cookie-notice-settings', 'cookie_content_check_color' );
		register_setting( 'bright-cookie-notice-settings', 'cookie_content_check_background_color' );
		register_setting( 'bright-cookie-notice-settings', 'cookie_content_button_color' );
		register_setting( 'bright-cookie-notice-settings', 'cookie_content_button_text_color' );
	}


}
