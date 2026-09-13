<?php

declare(strict_types=1);

namespace ComposePress\Starter;

use ComposePress\Core\Plugin;
use ComposePress\Core\PluginContext;
use ComposePress\Core\WordPressHooks;

final class StarterPlugin
{
    private const SLUG = 'composepress-starter';
    private const VERSION = '0.2.0';

    public static function boot(string $pluginFile): void
    {
        $plugin = new Plugin(
            context: new PluginContext($pluginFile, self::SLUG, self::VERSION),
            subscribers: [
                new ExampleSubscriber('Hello from the ComposePress Starter plugin.'),
            ],
            activator: new StarterActivator(self::VERSION),
            deactivator: new StarterDeactivator(),
            hooks: new WordPressHooks(),
            uninstaller: Uninstall::class,
        );

        $plugin->boot();
    }
}
