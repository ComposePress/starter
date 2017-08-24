<?php

/*
Plugin Name: ComposePress Starter
Plugin URI: https://github.com/pcfreak30/composepress-starter
Description: Starter template for composepress based plugin
Version: 0.1.0
Author: Derrick Hammer
Author URI: https://www.derrickhammer.com
License: GPL3
*/

use Dice\Dice;


/**
 * Singleton instance function. We will not use a global at all as that defeats the purpose of a singleton and is a bad design overall
 *
 * @SuppressWarnings(PHPMD.StaticAccess)
 * @return \ComposePress\Starter\Plugin
 * @alias WPCCSS()
 */
function composepress_starter() {
	return composepress_starter_container()->create( '\ComposePress\Starter\Plugin' );
}

/**
 * This container singleton enables you to setup unit testing by passing an environment filw to map classes in Dice
 *
 * @param string $env
 *
 * @return \Dice\Dice
 */
function composepress_starter_container( $env = 'prod' ) {
	static $container;
	if ( empty( $container ) ) {
		$container = new Dice();
		include __DIR__ . "/config_{$env}.php";
	}

	return $container;
}

/**
 * Init function shortcut
 */
function composepress_starter_init() {
	composepress_starter()->init();
}

/**
 * Activate function shortcut
 */
function composepress_starter_activate() {
	composepress_starter()->init();
	composepress_starter()->activate();
}

/**
 * Deactivate function shortcut
 */
function composepress_starter_deactivate() {
	composepress_starter()->deactivate();
}

/**
 * Error for older php
 */
function composepress_starter_php_upgrade_notice() {
	$info = get_plugin_data( __FILE__ );
	_e(
		sprintf(
			'
	<div class="error notice">
		<p>Opps! %s requires a minimum PHP version of 5.4.0. Your current version is: %s. Please contact your host to upgrade.</p>
	</div>', $info['Name'], PHP_VERSION
		)
	);
}

/**
 * Error if vendors autoload is missing
 */
function composepress_starter_php_vendor_missing() {
	$info = get_plugin_data( __FILE__ );
	_e(
		sprintf(
			'
	<div class="error notice">
		<p>Opps! %s is corrupted it seems, please re-install the plugin.</p>
	</div>', $info['Name']
		)
	);
}

/*
 * We want to use a fairly modern php version, feel free to increase the minimum requirement
 */
if ( version_compare( PHP_VERSION, '5.4.0' ) < 0 ) {
	add_action( 'admin_notices', 'composepress_starter_php_upgrade_notice' );
} else {
	if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
		include_once __DIR__ . '/vendor/autoload.php';
		add_action( 'plugins_loaded', 'composepress_starter_init', 11 );
		register_activation_hook( __FILE__, 'composepress_starter_activate' );
		register_deactivation_hook( __FILE__, 'composepress_starter_deactivate' );
	} else {
		add_action( 'admin_notices', 'composepress_starter_php_vendor_missing' );
	}
}
