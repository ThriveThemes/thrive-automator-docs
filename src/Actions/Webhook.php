<?php

namespace AutomatorExamples\Actions;

use Thrive\Automator\Items\Action_Abstract;
use Thrive\Automator\Items\User_Data;

/**
 * Thrive Themes - https://thrivethemes.com
 *
 * @package thrive-automator-docs
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Silence is golden!
}

/**
 * Class Webhook
 *
 * @package AutomatorExamples\Actions
 */
class Webhook extends Action_Abstract {


	/**
	 * Unique app identifier
	 *
	 * @return string
	 */
	public static function get_id() {
		return 'thrive-automator-docs/webhook';
	}

	/**
	 * Array of action-field keys, required for the action to be setup:
	 *  - URL where to send the request
	 *
	 * @var string[]
	 */
	public static function get_fields() {
		return [ 'webhook_url' ];
	}

	/**
	 * Thumbnail for action
	 *
	 * @var string
	 */
	public static function get_image() {
		return 'https://picsum.photos/96';
	}

	/**
	 * Action name
	 *
	 * @var string
	 */
	public static function get_name() {
		return 'Webhook request';
	}

	/**
	 * Name of the action provider
	 *
	 * @var string
	 */
	public static function get_app_name() {
		return 'Thrive automator docs';
	}

	/**
	 * Action description
	 *
	 * @return string
	 */
	public static function get_description() {
		return __( 'Issue a POST request to a user-supplied endpoint URL' );
	}

	/**
	 * Array of data-object keys required in order to run the action
	 *
	 * User data is required - this will POSTed via the webhook request
	 */
	public static function get_required_data_keys() {
		return [ 'user_data' ];
	}

	/**
	 * Actual action handler
	 *
	 * @param array $data
	 */
	public function do_action( $data ) {
		/** @var User_Data $user_data */
		$user_data   = $data['user_data'] ?? null;
		$webhook_url = $this->get_data( 'webhook_url' )['value'] ?? null;
		if ( $user_data && $webhook_url ) {
			$args = [
				'headers' => [
					'User-Agent' => 'Thrive-Automator-Webhook',
				],
				'body'    => [
					'user_email' => $user_data->get_value( 'user_email' ),
				],
			];

			wp_remote_post( $webhook_url, $args );
		}
	}
}
