<?php
/**
 * Thrive Themes - https://thrivethemes.com
 *
 * @package thrive-automator-docs
 */

namespace AutomatorExamples\Actions\Ultimatum;

use AutomatorExamples\Apps\Example_App;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Silence is golden!
}

class StartCampaign extends \Thrive\Automator\Items\Action {

	public static function get_id() {
		return 'thrive-ultimatum/start-campaign';
	}

	public static function get_name() {
		return 'Change campaign status into running';
	}

	public static function get_description() {
		return 'Change status to running for a thrive ultimatum campaign.';
	}

	public static function get_image() {
		return 'https://thrivethemes.com/wp-content/uploads/2021/08/logo-icon.png';
	}

	public static function get_app_id() {
		return Example_App::get_id();
	}

	/**
	 * This action requires only one action field for setup
	 *
	 * @return array
	 */
	public static function get_required_action_fields() {
		return [ 'ultimatum/campaign_id' ];
	}

	/**
	 * Get an array of keys with the required data-objects
	 *
	 * @return array
	 */
	public static function get_required_data_objects() {
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
