<?php

declare(strict_types=1);

namespace ComposePress\Starter\Tests\Unit;

use ComposePress\Starter\Uninstall;
use PHPUnit\Framework\TestCase;

final class UninstallTest extends TestCase
{
    protected function setUp(): void
    {
        $GLOBALS['composepress_starter_options'] = [];
    }

    public function testUninstallRemovesPersistedOption(): void
    {
        $GLOBALS['composepress_starter_options']['composepress_starter_version'] = '0.2.0';

        Uninstall::uninstall();

        self::assertSame([], $GLOBALS['composepress_starter_options']);
    }
}
