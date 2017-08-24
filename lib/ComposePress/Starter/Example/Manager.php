<?php


namespace ComposePress\Starter\Example;


use pcfreak30\ComposePress\ManagerAbstract;

/**
 * Class Manager
 *
 * @package ComposePress\Starter\Example
 * @property \ComposePress\Starter\Plugin $plugin
 */
class Manager extends ManagerAbstract {
	/**
	 * @var array
	 */
	protected $modules = [ 'ExampleModule' ];
}