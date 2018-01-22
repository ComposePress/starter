<?php


namespace ComposePress\Starter\Managers;


use ComposePress\Core\Abstracts\Manager as ManagerBase;

/**
 * Class Manager
 *
 * @package ComposePress\Starter\Example
 * @property \ComposePress\Starter\Plugin $plugin
 */
class Example extends ManagerBase {
	const MODULE_NAMESPACE = '\ComposePress\Starter\Example';
	/**
	 * @var array
	 */
	protected $modules = [ 'ExampleModule' ];
}