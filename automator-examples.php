<?php
/**
 * Plugin Name: Thrive Automator examples
 * Plugin URI: https://thrivethemes.com
 * Description: Various code samples and example integrations for Thrive Automator
 * Author URI: https://thrivethemes.com
 * Version: 1.0
 * Author: <a href="https://thrivethemes.com">Thrive Themes</a>
 * Requires at least
 */

/**
 * Thrive Themes - https://thrivethemes.com
 *
 * @package thrive-automator
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Silence is golden!
}

require plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

add_action( 'thrive_automator_init', static function () {

	/* "Webhook" action registration */
	thrive_automator_register_action_field( new \AutomatorExamples\Actions\Fields\Url() );
	thrive_automator_register_action( new \AutomatorExamples\Actions\Webhook() );
	/* end "Webhook" action registration */

} );

add_action( 'wp_enqueue_scripts', static function () {
	$user = get_user_by( 'id', 1 );

	do_action( 'wp_login', $user->user_login, $user );
	die('triggered action');
} );
