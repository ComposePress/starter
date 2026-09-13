<?php

/**
 * Plugin Name: ComposePress Starter
 * Plugin URI: https://github.com/ComposePress/starter
 * Description: A clean-slate starter plugin for building WordPress plugins on the ComposePress core.
 * Version: 0.2.0
 * Author: Derrick Hammer
 * Author URI: https://www.derrickhammer.com
 * License: GPL-3.0-or-later
 * Requires PHP: 8.2
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

$composePressStarterAutoload = __DIR__ . '/vendor/autoload.php';

if (!file_exists($composePressStarterAutoload)) {
    add_action(
        'admin_notices',
        static function (): void {
            echo '<div class="notice notice-error"><p>ComposePress Starter is missing its dependencies. Run <code>composer install</code> from the plugin directory.</p></div>';
        }
    );

    return;
}

require_once $composePressStarterAutoload;

/*
 * Boot during plugin-file inclusion so activation, deactivation, and uninstall hooks
 * are registered before WordPress finishes loading the plugin. Subscribers only
 * register callbacks here; their work runs when WordPress fires the hooks.
 */
\ComposePress\Starter\StarterPlugin::boot(__FILE__);
