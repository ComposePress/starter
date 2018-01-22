<?php

namespace ComposePress\Starter;

use ComposePress\Core\Abstracts\Plugin as PluginBase;
use ComposePress\Settings;
use ComposePress\Settings\Abstracts\UI;
use ComposePress\Starter\Managers\Example;

/**
 * Class Plugin
 *
 * @package ComposePress\Starter
 */
class Plugin extends PluginBase {
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
	 * @var Example
	 */
	private $example_manager;
	/**
	 * @var \ComposePress\Settings
	 */
	private $settings;
	/**
	 * @var \ComposePress\Settings\Abstracts\UI
	 */
	private $admin_ui;

	/**
	 * Plugin constructor.
	 *
	 * @param ExampleComponent                    $example_component
	 * @param Example                             $example_manager
	 * @param \ComposePress\Settings              $settings
	 * @param \ComposePress\Settings\Abstracts\UI $admin_ui
	 */
	public function __construct( ExampleComponent $example_component, Example $example_manager, Settings $settings, UI $admin_ui ) {
		$this->example_component = $example_component;
		$this->example_manager   = $example_manager;
		$this->settings          = $settings;
		$this->admin_ui          = $admin_ui;
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

	/**
	 * @return \ComposePress\Settings
	 */
	public function get_settings() {
		return $this->settings;
	}

	/**
	 * @return \ComposePress\Settings\Abstracts\UI
	 */
	public function get_admin_ui() {
		return $this->admin_ui;
	}

	/**
	 * @return \ComposePress\Starter\Managers\Example
	 */
	public function get_example_manager() {
		return $this->example_manager;
	}
}