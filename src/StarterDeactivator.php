<?php

declare(strict_types=1);

namespace ComposePress\Starter;

use ComposePress\Core\PluginDeactivator;

final class StarterDeactivator implements PluginDeactivator
{
    private const VERSION_OPTION = 'composepress_starter_version';

    public function deactivate(bool $networkWide): void
    {
        if ($networkWide) {
            delete_network_option(null, self::VERSION_OPTION);

            return;
        }

        delete_option(self::VERSION_OPTION);
    }
}
