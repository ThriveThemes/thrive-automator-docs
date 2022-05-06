<?php

namespace AutomatorExamples\Triggers\Woocommerce;
/**
 * Thrive Themes - https://thrivethemes.com
 *
 * @package thrive-automator-docs
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Silence is golden!
}

use AutomatorExamples\Apps\Example_App;
use Thrive\Automator\Items\Trigger;

class Stock extends Trigger {

	public static function get_id() {
		return 'woocommerce/stock-trigger';
	}

	public static function get_wp_hook() {
		return 'woocommerce_updated_product_stock';
	}

	public static function get_provided_data_objects() {
		return [ 'woo_product_data' ];
	}

	public static function get_hook_params_number() {
		return 1;
	}

	public static function get_app_id() {
		return Example_App::get_id();
	}

	public static function get_name() {
		return 'WooCommerce product stock updates';
	}

	public static function get_description() {
		return 'When a product stock is updated';
	}

	public static function get_image() {
		return 'https://thrivethemes.com/wp-content/uploads/2021/08/logo-icon.png';
	}
}

