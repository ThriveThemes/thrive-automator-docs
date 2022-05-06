<?php
/**
 * Thrive Themes - https://thrivethemes.com
 *
 * @package thrive-automator-docs
 */

namespace AutomatorExamples\Apps;

use Thrive\Automator\Items\App;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Silence is golden!
}

class Example_App extends App {
	public static function get_id() {
		return 'example_app';
	}

	public static function get_name() {
		return 'Example App';
	}

	public static function get_description() {
		return 'This is an example app';
	}

	public static function get_logo() {
		return 'https://thrivethemes.com/wp-content/uploads/2021/08/logo-icon.png';
	}

	/**
	 * Whether the current App is available for the current user
	 * e.g prevent premium items from being shown to free users
	 *
	 * @return bool
	 */
	public static function has_access() {
		return true;
	}
}
