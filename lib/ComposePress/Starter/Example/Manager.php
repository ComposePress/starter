<?php


namespace ComposePress\Starter\Example;


use ComposePress\Core\Abstracts\Manager as ManagerBase;

/**
 * Class Manager
 *
 * @package ComposePress\Starter\Example
 * @property \ComposePress\Starter\Plugin $plugin
 */
class Manager extends ManagerBase {
	/**
	 * @var array
	 */
	protected $modules = [ 'ExampleModule' ];
}