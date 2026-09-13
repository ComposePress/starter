<?php

declare(strict_types=1);

namespace ComposePress\Starter;

use ComposePress\Core\PluginUninstall;

final class Uninstall implements PluginUninstall
{
    public static function uninstall(): void
    {
        delete_option('composepress_starter_version');
    }
}
