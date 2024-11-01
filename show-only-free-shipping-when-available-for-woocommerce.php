<?php

/*
 * Plugin Name: Show only free shipping when available for Woocommerce
 * Plugin URI: https://profiles.wordpress.org/ayoubbenarbia/
 * Description: The plugin automatically hides other shipping methods when free shipping is available during shipping costs calcul and checkout.
 * Version: 1.0
 * Author: Ayoub Benarbia
 * Author URI: https://www.ayoubbenarbia.com
 * License: GPLv3 or later License
 * URI: http://www.gnu.org/licenses/gpl-3.0.html
 */


function sofswafw_hide_shipping_when_free_is_available( $rates ) {
	$free = array();

	foreach ( $rates as $rate_id => $rate ) {
		if ( 'free_shipping' === $rate->method_id ) {
			$free[ $rate_id ] = $rate;
			break;
		}
	}

	return ! empty( $free ) ? $free : $rates;
}

add_filter( 'woocommerce_package_rates', 'sofswafw_hide_shipping_when_free_is_available', 100 );
