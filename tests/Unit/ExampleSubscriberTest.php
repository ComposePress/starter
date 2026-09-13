<?php

declare(strict_types=1);

namespace ComposePress\Starter\Tests\Unit;

use ComposePress\Core\Testing\RecordingHooks;
use ComposePress\Starter\ExampleSubscriber;
use PHPUnit\Framework\TestCase;

final class ExampleSubscriberTest extends TestCase
{
    public function testSubscribeRegistersContentFilter(): void
    {
        $hooks = new RecordingHooks();

        (new ExampleSubscriber('Hello'))->subscribe($hooks);

        self::assertSame(['the_content'], $hooks->filterNames());
    }

    public function testAppendBannerAppendsEscapedMessage(): void
    {
        $subscriber = new ExampleSubscriber('<script>alert(1)</script>');

        $result = $subscriber->appendBanner('Original');

        self::assertStringStartsWith('Original', $result);
        self::assertStringContainsString('composepress-starter-banner', $result);
        self::assertStringContainsString('&lt;script&gt;', $result);
        self::assertStringNotContainsString('<script>', $result);
    }
}
