<?php

declare(strict_types=1);

namespace ComposePress\Starter;

use ComposePress\Core\PluginActivator;

final class StarterActivator implements PluginActivator
{
    public function __construct(
        private readonly string $version,
    ) {
    }

    public function activate(bool $networkWide): void
    {
        update_option('composepress_starter_version', $this->version);
    }
}
