<?php

namespace AutomatorExamples\ActionFields\General;

use Thrive\Automator\Items\Action_Field;

/**
 * Thrive Themes - https://thrivethemes.com
 *
 * @package thrive-automator-docs
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Silence is golden!
}

/**
 * Class Url - representation of the URL field needed for the `Webhook` action
 *
 * @package AutomatorExamples\Fields
 */
class Url extends Action_Field {

	/**
	 * Field name/label
	 */
	public static function get_name() {
		return 'URL';
	}

	/**
	 * Field description
	 */
	public static function get_description() {
		return 'The webhook URL where we should send the request';
	}

	/**
	 * Field tooltip
	 */
	public static function get_tooltip() {
		return 'Webhook URL';
	}

	/**
	 * Field input placeholder
	 */
	public static function get_placeholder() {
		return 'Enter the webhook URL';
	}

	public static function get_id() {
		return 'webhook_url';
	}

	public static function get_type() {
		return static::FIELD_TYPE_TEXT;
	}
}
