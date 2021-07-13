<?php

namespace AutomatorExamples\Actions\Fields;

use Thrive\Automator\Items\Action_Field_Abstract;
use Thrive\Automator\Items\Field_Abstract;

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
class Url extends Action_Field_Abstract {

	/**
	 * Field name/label
	 */
	static protected $name = 'URL';

	/**
	 * Field description
	 */
	static protected $description = 'The webhook URL where we should send the request';

	/**
	 * Field tooltip
	 */
	static protected $tooltip = 'Webhook URL';

	/**
	 * Field input placeholder
	 */
	static protected $placeholder = 'Enter the webhook URL';

	public static function get_id() {
		return 'webhook_url';
	}

	public static function get_type() {
		return 'text';
	}
}
