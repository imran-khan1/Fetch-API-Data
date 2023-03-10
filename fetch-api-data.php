<?php

/**
 * Plugin name: Fetch API Data
 * Plugin URI: https://codeinform.pk
 * Description: Get information from external APIs in WordPress
 * Author: Imran Khan
 * Author URI: https://codeinform.pk
 * version: 0.1.0
 * License: GPL2 or later.
 * text-domain: fetch-apis
 */

// If this file is access directly, abort!!!
defined('ABSPATH') or die('Unauthorized Access');


/**
 * Register a custom admin menu page to view API response data.
 */
function codeinform_register_fetch_api_menu_page()
{
	add_menu_page(
		__('Fetch API Data Settings', 'fetch-apis'),
		'Fetch API',
		'manage_options',
		'api-fetch.php',
		'codeinform_get_send_data',
		'dashicons-text',
		16
	);
}

add_action('admin_menu', 'codeinform_register_fetch_api_menu_page');


/**
 * codeinform_get_send_data() function to Query API
 */
function codeinform_get_send_data()
{

	//$url = 'https://jsonplaceholder.typicode.com/users';
	$url = '';
	$arguments = array(
		'method' => 'GET'
	);

	$response = wp_remote_get($url, $arguments);

	if (is_wp_error($response)) {
		$error_message = $response->get_error_message();
		echo "Something went wrong: $error_message";
	} else {

		echo '<pre>';
		var_dump(wp_remote_retrieve_body($response));
		echo '</pre>';
	}
}
