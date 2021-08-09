<?php
/**
 * Thrive Themes - https://thrivethemes.com
 *
 * @package thrive-automator-docs
 */

namespace AutomatorExamples\Actions\Ultimatum;

use function Thrive\Automator\tap_logger;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Silence is golden!
}

class StartCampaign extends \Thrive\Automator\Items\Action {

	public static function get_id() {
		return 'thrive-ultimatum/start-campaign';
	}

	public static function get_name() {
		return 'Start Thrive Ultimatum campaign.';
	}

	public static function get_description() {
		return 'Change status to running for a thrive ultimatum campaign.';
	}

	public static function get_image() {
		return 'https://source.unsplash.com/user/cool/32x32';
	}

	public static function get_app_name() {
		return 'Thrive Ultimatum';
	}

	/**
	 * This action requires only one action field for setup
	 *
	 * @return array
	 */
	public static function required_action_fields() {
		return [ 'ultimatum/campaign_id' ];
	}

	/**
	 * Get an array of keys with the required data-objects
	 *
	 * @return array
	 */
	public static function get_required_data_keys() {
		return [];
	}

	/**
	 * To implement actual action operation
	 */
	public function do_action( $data ) {
		$campaign_id = $this->get_automation_data_value( 'ultimatum/campaign_id' );

		if ( function_exists( 'tve_ult_save_campaign_status' ) ) {
			tve_ult_save_campaign_status( $campaign_id, \TVE_Ult_Const::CAMPAIGN_STATUS_RUNNING );
		}
	}
}
