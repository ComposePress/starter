<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

if (!defined('WP_PLUGIN_DIR')) {
    define('WP_PLUGIN_DIR', '/tmp/wordpress/wp-content/plugins');
}

$GLOBALS['composepress_starter_hooks'] = [];
$GLOBALS['composepress_starter_lifecycle'] = [];
$GLOBALS['composepress_starter_options'] = [];

function add_action(string $hook, callable $callback, int $priority = 10, int $arguments = 1): bool
{
    $GLOBALS['composepress_starter_hooks'][] = ['action', $hook, $priority, $arguments];
    return true;
}

function add_filter(string $hook, callable $callback, int $priority = 10, int $arguments = 1): bool
{
    $GLOBALS['composepress_starter_hooks'][] = ['filter', $hook, $priority, $arguments];
    return true;
}

function register_activation_hook(string $file, callable $callback): void
{
    $GLOBALS['composepress_starter_lifecycle'][] = ['activate', $file, $callback];
}

function register_deactivation_hook(string $file, callable $callback): void
{
    $GLOBALS['composepress_starter_lifecycle'][] = ['deactivate', $file, $callback];
}

function register_uninstall_hook(string $file, callable $callback): void
{
    $GLOBALS['composepress_starter_lifecycle'][] = ['uninstall', $file, $callback];
}

function get_option(string $option, mixed $default = false): mixed
{
    return $GLOBALS['composepress_starter_options'][$option] ?? $default;
}

function update_option(string $option, mixed $value, bool $autoload = true): bool
{
    $GLOBALS['composepress_starter_options'][$option] = $value;
    return true;
}

function delete_option(string $option): bool
{
    unset($GLOBALS['composepress_starter_options'][$option]);
    return true;
}

function esc_html(string $text): string
{
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}
