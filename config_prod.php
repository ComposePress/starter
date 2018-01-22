<?php

/* @var $container \Dice\Dice */

$container->addRule( '\ComposePress\Starter\Plugin', [
	'shared' => true,
] );
$container->addRule( '\ComposePress\Settings\Managers\Page', [
	'instanceOf' => '\ComposePress\Starter\Managers\Page',
] );