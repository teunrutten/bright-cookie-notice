<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/teunrutten/bright-cookie-notice
 * @since      1.0.0
 *
 * @package    Avg_Cookie_Notice
 * @subpackage Avg_Cookie_Notice/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Avg_Cookie_Notice
 * @subpackage Avg_Cookie_Notice/public
 * @author     Teun Rutten <teun@bureaubright.nl>
 */
class Avg_Cookie_Notice_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/avg-cookie-notice-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/avg-cookie-notice-public.js', array(), $this->version, false );
		wp_enqueue_script( 'js-cookie', 'https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js', array(), $this->version, false );
	}

	public static function bright_display_cookie() {
		include(plugin_dir_path( __FILE__ ) . 'partials/avg-cookie-notice-public-display.php');
	}

}
