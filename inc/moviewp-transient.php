<?php
/*
* ----------------------------------------------------
* @author: fr0zen
* @author URI: https://fr0zen.store
* @copyright: (c) 2022 Vincenzo Piromalli. All rights reserved
* ----------------------------------------------------
* @since 3.8.7
* 20 May 2022
*/

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class Moviewp_Transient_Cleaner {
	public static function load() {
		add_action( 'init', array( __CLASS__, 'schedule_events' ) );
	}

	/**
	 * Schedule cron events, runs during init.
	 */
	public static function schedule_events() {
		if ( ! wp_next_scheduled( 'moviewp_transient_cleaner' ) )
			wp_schedule_event( time(), 'daily', 'moviewp_transient_cleaner' );

		add_action( 'moviewp_transient_cleaner', array( __CLASS__, 'cleaner' ) );
	}

	/**
	 * Runs in a wp-cron intsance.
	 */
	public static function cleaner() {
		global $wpdb;

		$timestamp = time() - 24 * HOUR_IN_SECONDS; // expired x hours ago.
		$time_start = time();
		$time_limit = 30;
		$batch = 100;

		// @todo Look at site transients too.
		// Don't take longer than $time_limit seconds.
		while ( time() < $time_start + $time_limit ) {
			$option_names = $wpdb->get_col( "SELECT `option_name` FROM {$wpdb->options} WHERE `option_name` LIKE '\_transient\_timeout\_%'
				AND CAST(`option_value` AS UNSIGNED) < {$timestamp} LIMIT {$batch};" );

			if ( empty( $option_names ) )
				break;

			// Add transient keys to transient timeout keys.
			foreach ( $option_names as $key => $option_name )
				$option_names[] = '_transient_' . substr( $option_name, 19 );

			// Create a list to use with MySQL IN().
			$options_in = implode( ', ', array_map( function( $item ) use ( $wpdb ) {
				return $wpdb->prepare( '%s', $item );
			}, $option_names ) );

			// Delete transient and transient timeout fields.
			$wpdb->query( "DELETE FROM {$wpdb->options} WHERE `option_name` IN ({$options_in});" );

			// Break if no more deletable options available.
			if ( count( $option_names ) < $batch * 2 )
				break;
		}
	}
}

Moviewp_Transient_Cleaner::load();
