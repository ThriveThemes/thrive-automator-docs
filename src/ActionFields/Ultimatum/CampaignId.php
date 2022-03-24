<?php

namespace AutomatorExamples\ActionFields\Ultimatum;

use Thrive\Automator\Items\Action_Field;
use Thrive\Automator\Utils;

/**
 * Thrive Themes - https://thrivethemes.com
 *
 * @package thrive-automator-docs
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Silence is golden!
}

class CampaignId extends Action_Field {

	public static function get_id() {
		return 'ultimatum/campaign_id';
	}

	public static function get_name() {
		return 'Campaign name';
	}

	public static function get_description() {
		return 'The campaign we want to start.';
	}

	public static function get_placeholder() {
		return 'Select campaign';
	}

	/**
	 * Campaigns will be displayed in a dropdown select
	 */
	public static function get_type() {
		return Utils::FIELD_TYPE_SELECT;
	}

	/**
	 * It's mandatory for the user to select this field
	 *
	 * @return array
	 */
	public static function get_validators() {
		return [ static::REQUIRED_VALIDATION ];
	}

	/**
	 * Values for this field are retrieved with ajax
	 *
	 * @return bool
	 */
	public static function is_ajax_field() {
		return true;
	}

	/**
	 * Function that returns an array with campaigns (id/name) that will be used in the select
	 *
	 * @return array|array[]
	 */
	public static function get_options_callback( $action_id, $action_data ) {
		$campaigns = \tve_ult_get_campaigns( [
			'meta_query'   => [
				'key'   => \TVE_Ult_Const::META_NAME_FOR_STATUS,
				'value' => \TVE_Ult_Const::CAMPAIGN_STATUS_PAUSED,
			],
			'get_designs'  => false,
			'get_events'   => false,
			'get_settings' => false,
		] );

		return array_map( static function ( \WP_Post $campaign ) {
			return [
				'id'    => $campaign->ID,
				'label' => $campaign->post_title,
			];
		}, $campaigns );
	}
}
