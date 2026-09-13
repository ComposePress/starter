<?php

declare(strict_types=1);

namespace ComposePress\Starter;

use ComposePress\Core\PluginDeactivator;

final class StarterDeactivator implements PluginDeactivator
{
    public function deactivate(bool $networkWide): void
    {
        delete_option('composepress_starter_version');
    }
}
