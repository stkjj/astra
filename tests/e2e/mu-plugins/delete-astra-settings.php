<?php
/**
 * Plugin Name: REST Delete Astra Settings
 * Plugin URI:  https://github.com/brainstormforce/astra
 * Description: Plugin to add REST Endpoint to delete Astra Settings.
 * Author:      Brainstorm Force
 * Author URI:  https://brainstormforce.com
 */

namespace Astra\REST\Settings;

use WP_Rest_Server;

const REST_NAMESPACE = 'astra/v1';
const REST_BASE = 'e2e-utils';

function bootstrap() : void {
	add_action( 'rest_api_init', __NAMESPACE__ . '\\rest_route' );
}

bootstrap();

function rest_route() : void {
	register_rest_route(
		REST_NAMESPACE, REST_BASE . '/reset-theme', array(
			array(
				'methods' => WP_Rest_Server::DELETABLE,
				'callback' => function () {
					delete_option( 'astra-settings' );
					remove_theme_mod( 'custom_logo' );
					delete_option( 'site_title' );
					delete_option( 'site_icon' );
					update_option( 'blogdescription', 'Astra Test Enviornment' );

					return rest_ensure_response([
						'success' => true
					]);
				},
				'permission_callback' => '__return_true',
			),
		)
	);
}
