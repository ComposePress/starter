<?php

declare(strict_types=1);

namespace ComposePress\Starter;

use ComposePress\Core\HookSubscriber;
use ComposePress\Core\Hooks;

final class ExampleSubscriber implements HookSubscriber
{
    public function __construct(
        private readonly string $message,
    ) {
    }

    public function subscribe(Hooks $hooks): void
    {
        $hooks->filter('the_content', [$this, 'appendBanner']);
    }

    public function appendBanner(string $content): string
    {
        return $content . "\n" . sprintf(
            '<aside class="composepress-starter-banner">%s</aside>',
            esc_html($this->message),
        );
    }
}
