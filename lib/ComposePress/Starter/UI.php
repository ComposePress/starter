<?php


namespace ComposePress\Starter;


class UI extends \ComposePress\Settings\Abstracts\UI {
	protected $parent_menu = 'options-general.php';

	public function __construct( \ComposePress\Settings\Managers\Page $pages_manager, \ComposePress\Settings\Managers\Field $fields_manager ) {
		parent::__construct( $pages_manager, $fields_manager );
	}
}