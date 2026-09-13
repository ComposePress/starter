<?php

declare(strict_types=1);

namespace ComposePress\Starter\Tests\Unit;

use ComposePress\Starter\StarterPlugin;
use ComposePress\Starter\Uninstall;
use PHPUnit\Framework\TestCase;

final class StarterPluginTest extends TestCase
{
    protected function setUp(): void
    {
        $GLOBALS['composepress_starter_hooks'] = [];
        $GLOBALS['composepress_starter_lifecycle'] = [];
    }

    public function testBootRegistersSubscriberHookAndLifecycle(): void
    {
        StarterPlugin::boot('/plugins/composepress-starter/composepress-starter.php');

        self::assertContains('the_content', array_column($GLOBALS['composepress_starter_hooks'], 1));
        self::assertSame(
            ['activate', 'deactivate', 'uninstall'],
            array_column($GLOBALS['composepress_starter_lifecycle'], 0),
        );
        self::assertSame(
            [Uninstall::class, 'uninstall'],
            $GLOBALS['composepress_starter_lifecycle'][2][2],
        );
    }
}
