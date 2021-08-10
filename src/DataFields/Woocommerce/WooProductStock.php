<?php

/**
 * Thrive Themes - https://thrivethemes.com
 *
 * @package thrive-automator-docs
 */

namespace AutomatorExamples\DataFields\Woocommerce;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Silence is golden!
}

use Thrive\Automator\Items\Data_Field;

class WooProductStock extends Data_Field {

	public static function get_id() {
		return 'woo_product_stock';
	}

	/**
	 * Array of filters that are supported by the field
	 * @return array
	 */
	public static function get_supported_filters() {
		return [ 'number_comparison' ];
	}

	public static function get_name() {
		return 'Product stock number';
	}

	public static function get_description() {
		return 'Product stock number';
	}

	public static function get_placeholder() {
		return '24';
	}

	/**
	 * We plan attach this data field to the woo_product_data object
	 * @return string[]
	 */
	public static function get_compatible_data_objects() {
		return [ 'woo_product_data' ];
	}

	/**
	 * We set the stock value for the current product so it can be used by filters
	 *
	 * @param $data_object
	 * @param $raw_data
	 * @param $data_object_id
	 *
	 * @return mixed
	 */
	public static function process_data_value( $data_object, $raw_data, $data_object_id ) {

		if ( $data_object_id === 'woo_product_data' ) {
			$product = null;
			if ( is_a( $raw_data, 'WC_Order_Item_Product' ) ) {
				$product = $raw_data->get_product();
			} elseif ( is_a( $raw_data, 'WC_Product' ) ) {
				$product = $raw_data;
			} elseif ( is_numeric( $raw_data ) ) {
				$product = \wc_get_product( $raw_data );
			}

			$data_object[ static::get_id() ] = $product->get_stock_quantity();
		}

		return $data_object;
	}
}
