<?php

namespace ComposePress\Starter;

use ComposePress\Starter\Example\Manager;
use pcfreak30\ComposePress\PluginAbstract;

/**
 * Class Plugin
 *
 * @package ComposePress\Starter
 */
class Plugin extends PluginAbstract {
	/**
	 *
	 */
	const VERSION = '0.1.0';

	/**
	 *
	 */
	const PLUGIN_SLUG = 'composepress-starter';
	/**
	 * @var ExampleComponent
	 */
	private $example_component;
	/**
	 * @var Manager
	 */
	private $example_manager;

	/**
	 * Plugin constructor.
	 *
	 * @param ExampleComponent $example_component
	 * @param Manager          $example_manager
	 */
	public function __construct( ExampleComponent $example_component, Manager $example_manager ) {
		$this->example_component = $example_component;
		$this->example_manager   = $example_manager;
		parent::__construct();
	}

	/**
	 * @return void
	 */
	public function activate() {
		// TODO: Implement activate() method.
	}

	/**
	 * @return void
	 */
	public function deactivate() {
		// TODO: Implement deactivate() method.
	}

	/**
	 * @return void
	 */
	public function uninstall() {
		// TODO: Implement uninstall() method.
	}

	/**
	 * @return ExampleComponent
	 */
	public function get_example_component() {
		return $this->example_component;
	}
}