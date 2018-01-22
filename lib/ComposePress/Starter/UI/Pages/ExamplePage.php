<?php

namespace ComposePress\Starter\UI\Pages;

use ComposePress\Settings\UI\Factory;
use ComposePress\Settings\UI\Fields\Image;
use ComposePress\Settings\UI\Fields\Select;
use ComposePress\Settings\UI\Fields\Wysiwyg;

class ExamplePage extends \ComposePress\Settings\Abstracts\Page {

	const NAME = 'example';
	const TITLE = 'ComposePress Starter Example';
	const CAPABILITY = 'manage_options';
	const NETWORK_CAPABILITY = 'manage_options';

	public function register_settings() {
		$tab1     = Factory::tab( 'tab1', 'Tab 1', $this );
		$tab2     = Factory::tab( 'tab2', 'Tab 2', $this );
		$section  = Factory::section( 'section1', 'Section 1', $tab1, 'blah' );
		$section1 = Factory::section( 'section2', 'Section 2', $tab2 );
		$section3 = Factory::section( 'section3', 'Section 3', $this );
		Factory::field( 'select_field_multiple', 'Select Field Multiple', Select::NAME, $section, [
			'multiple' => true,
			'options'  => [
				'a' => 'b',
				'c' => 'd',
			],
		] );
		Factory::field( 'select_field', 'Select Field', Select::NAME, $section1, [
			'options' => [
				'a' => 'b',
				'c' => 'd',
			],
		] );
		$testb_field = Factory::field( 'image_field', 'Image Field', Image::NAME, $section1 );
		$testc_field = Factory::field( 'wysiwyg_field', 'Wysiwyg Field', Wysiwyg::NAME, $section3 );
	}
}