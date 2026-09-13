<?php

declare(strict_types=1);

namespace ComposePress\Starter\Tests\Unit;

use ComposePress\Starter\StarterActivator;
use ComposePress\Starter\StarterDeactivator;
use PHPUnit\Framework\TestCase;

final class LifecycleTest extends TestCase
{
    protected function setUp(): void
    {
        $GLOBALS['composepress_starter_options'] = [];
        $GLOBALS['composepress_starter_network_options'] = [];
    }

    public function testActivateStoresVersionOption(): void
    {
        (new StarterActivator('0.2.0'))->activate(false);

        self::assertSame('0.2.0', get_option('composepress_starter_version'));
    }

    public function testNetworkActivateStoresNetworkOption(): void
    {
        (new StarterActivator('0.2.0'))->activate(true);

        self::assertSame('0.2.0', get_network_option(null, 'composepress_starter_version'));
        self::assertFalse(get_option('composepress_starter_version'));
    }

    public function testDeactivateRemovesVersionOption(): void
    {
        $GLOBALS['composepress_starter_options']['composepress_starter_version'] = '0.2.0';

        (new StarterDeactivator())->deactivate(false);

        self::assertFalse(get_option('composepress_starter_version'));
    }

    public function testNetworkDeactivateRemovesNetworkOption(): void
    {
        $GLOBALS['composepress_starter_network_options']['composepress_starter_version'] =
            '0.2.0';

        (new StarterDeactivator())->deactivate(true);

        self::assertFalse(get_network_option(null, 'composepress_starter_version'));
    }
}
