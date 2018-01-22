<?php

namespace ComposePress\Starter\Managers;

class Page extends \ComposePress\Settings\Managers\Page {
	const MODULE_NAMESPACE = '\ComposePress\Starter\UI\Pages';
	protected $modules = [ 'ExamplePage' ];
}