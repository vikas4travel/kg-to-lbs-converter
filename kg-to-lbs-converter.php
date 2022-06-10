<?php
/**
 * Plugin Name:       KG to LBS Converter.
 * Plugin URI:        https://websolutionideas.com/
 * Description:       Allows website users to convert kilograms to pounds and vice versa.
 * Version:           1.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Vikas Sharma
 * Author URI:        https://websolutionideas.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       kg-to-lbs-converter
 *
 * KG to LBS Converter
 * Copyright (C) 2021, Vikas Sharma <vikas@websolutionideas.com>
 *
 * 'KG to LBS Converter' is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * 'KG to LBS Converter' is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with 'KG to LBS Converter'. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
 *
 */

// Prohibit direct script loading.
defined( 'ABSPATH' ) || die( 'No direct script access allowed!' );

class KG_To_LBS_converter {

	static $plugin_name     = 'KG to LBS Converter';
	static $plugin_slug     = 'kg-to-lbs-converter';
	public $error_message   = '';
	public $success_message = '';

	public function __construct() {

		if ( is_admin() ) {
			// Activation and Deactivation hooks
			register_activation_hook( __FILE__, [ $this, 'plugin_activation' ] );
			register_deactivation_hook( __FILE__, [ $this, 'plugin_deactivation' ] );
			add_action( 'admin_init', [ $this, 'do_activation_redirect' ] );
			add_action( 'admin_menu', [ $this, 'create_admin_menu' ] );
			add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_admin_scripts_and_styles' ] );
			add_action( 'admin_notices', [ $this, 'notice_welcome' ] );


			$plugin = plugin_basename(__FILE__);
			add_filter( "plugin_action_links_$plugin", [ $this, 'plugin_settings_link' ] );
		}

		// Add shortcode
		add_shortcode( 'kg-to-lbs-converter', [ $this, 'kg_to_lbs_converter_shortcode' ] );
	}

	/**
	 * Activate the plugin
	 */
	public function plugin_activation() : void {
		set_transient( 'klc_activation_redirect_transient', true, 30 );
	}

	/**
	 * Deactivate the plugin
	 */
	public function plugin_deactivation() : void {
		// To Do:
	}

	public function do_activation_redirect() {
		// Bail if no activation redirect
		if ( ! get_transient( 'klc_activation_redirect_transient' ) ) {
			return;
		}

		// Delete the redirect transient
		delete_transient( 'klc_activation_redirect_transient' );

		// Bail if activating from network, or bulk
		if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
			return;
		}

		// Redirect to plugin page
		wp_safe_redirect( add_query_arg( array( 'page' => self::$plugin_slug ), admin_url( 'options-general.php' ) ) );
	}

	/**
	 * Add menu item in the admin area.
	 */
	public function create_admin_menu() {
		add_submenu_page( 'options-general.php', self::$plugin_name, self::$plugin_name, 'manage_options', self::$plugin_slug, [ $this, 'admin_panel' ] );
	}

	/**
	 * Plugin settings link.
	 * @param $links
	 * @return mixed
	 */
	public function plugin_settings_link( $links ) {
		$settings_link = sprintf( '<a href="options-general.php?page=%s">Settings</a>', self::$plugin_slug );

		array_unshift($links, $settings_link);
		return $links;
	}

	/**
	 * Enqueue CSS for ou plugin in admin area.
	 */
	public function enqueue_admin_scripts_and_styles(){

		// Enqueue these scripts only if we are on the plugin settings page.
		if ( self::is_plugin_page() ) {

			wp_enqueue_style('klc_style', plugin_dir_url(__FILE__) . '/assets/css/styles.css');
			wp_enqueue_style('klc_admin_style', plugin_dir_url(__FILE__) . '/assets/css/admin-styles.css');
			wp_enqueue_script( 'klc_admin_script', plugin_dir_url(__FILE__) . '/assets/js/admin-scripts.js', array(), '1.0.0', true );
		}
	}

	/**
	 * Display welcome messages
	 */
	public function notice_welcome() {
		global $pagenow;

		if ( self::is_plugin_page() ) {
			if ( ! get_option( 'klc_welcome' ) ) {
				?>
				<div class="notice notice-success is-dismissible">
					<p><?php echo __( 'Thank you for installing KG to LBS Converter.', 'kg-to-lbs-converter' ) ?></p>
				</div>
				<?php
				update_option( 'klc_welcome', 1 );
			}
		}
	}

	/**
	 * Plugin page in the admin area.
	 */
	public function admin_panel(){
		if ( ! current_user_can( 'administrator' ) ) {
			echo '<p>' . __( 'Sorry, you are not allowed to access this page.', 'kg-to-lbs-converter' ) . '</p>';
			return;
		}

		$active_tab = 1;

		// if the form was submitted
		if ( isset( $_POST[ self::$plugin_slug . '-nonce' ] ) ) { // Input var okay.

			// Verify the nonce before proceeding.
			if ( wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST[ self::$plugin_slug . '-nonce' ] ) ), self::$plugin_slug ) ) { // Input var okay.

				// To Do: Update data here

				echo '<div class="notice notice-success is-dismissible"><p>' . __( 'Success! data saved successfully.', 'kg-to-lbs-converter' ) . '</p></div>';

			} else {
				echo '<div class="notice notice-error is-dismissible"><p>' . __( 'Error: Invalid nonce, data not saved, please try again!', 'kg-to-lbs-converter' ) . '</p></div>';
			}
		}

		// Display the plugin page
		include_once( __DIR__ . '/templates/admin-panel.php' );
	}

	public function kg_to_lbs_converter_shortcode( $atts ) {
		if ( empty( $atts['template'] ) ) {
			return '';
		}

		wp_enqueue_style( 'klc-styles', plugin_dir_url( __FILE__ ) . "/assets/css/styles.css" );
		wp_enqueue_script( 'klc-scripts', plugin_dir_url( __FILE__ ) . "/assets/js/scripts.js", ['jquery'], '', true );

		ob_start();

		if ( 1 === intval( $atts['template'] ) ){
			require __DIR__ . '/templates/kg-to-lbs-converter-template1.php';
		} else {
			require __DIR__ . '/templates/kg-to-lbs-converter-template2.php';
		}

		return ob_get_clean();
	}

	/**
	 * Are we on our plugin page?
	 * @return bool
	 */
	public static function is_plugin_page() {
		global $pagenow;

		if ( 'options-general.php' === $pagenow && isset( $_GET['page'] ) && self::$plugin_slug === $_GET['page'] ) {
			return true;
		}
		return false;
	}
}

new KG_To_LBS_converter();
