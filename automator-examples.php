<?php
/**
 * Plugin Name: Thrive Automator examples
 * Plugin URI: https://thrivethemes.com
 * Description: Various code samples and example integrations for Thrive Automator
 * Author URI: https://thrivethemes.com
 * Version: 1.0
 * Author: <a href="https://thrivethemes.com">Thrive Themes</a>
 */

/**
 * Thrive Themes - https://thrivethemes.com
 *
 * @package thrive-automator-docs
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Silence is golden!
}

require plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

add_action( 'thrive_automator_init', static function () {

	/* "Webhook" action registration */
	thrive_automator_register_action_field( new \AutomatorExamples\ActionFields\General\Url() );
	thrive_automator_register_action( new \AutomatorExamples\Actions\General\Webhook() );
	/* end "Webhook" action registration */

	thrive_automator_register_trigger( new AutomatorExamples\Triggers\Woocommerce\Stock() );

	thrive_automator_register_action_field( new \AutomatorExamples\ActionFields\Ultimatum\CampaignId() );
	thrive_automator_register_action( new \AutomatorExamples\Actions\Ultimatum\StartCampaign() );

	thrive_automator_register_data_field( new \AutomatorExamples\DataFields\Woocommerce\WooProductStock() );
} );
