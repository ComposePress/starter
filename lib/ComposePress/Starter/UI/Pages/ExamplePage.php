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
		$tab      = Factory::tab( 'tab1', 'Tab 1', $this );
		$tabb     = Factory::tab( 'tab1', 'Tab 2', $this );
		$section  = Factory::section( 'section1', 'Section 1', $tab, 'blah' );
		$sectionb = Factory::section( 'section1', 'Section 2', $tabb );
		$sectionc = Factory::section( 'section3', 'Section 3', $this );
		Factory::field( 'select_field', 'Select Field Multiple', Select::NAME, $section, [
			'multiple' => true,
			'options'  => [
				'a' => 'b',
				'c' => 'd',
			],
		] );
		Factory::field( 'select_field', 'Select Field', Select::NAME, $section, [
			'options' => [
				'a' => 'b',
				'c' => 'd',
			],
		] );
		$testb_field = Factory::field( 'image_field', 'Image Field', Image::NAME, $sectionb );
		$testc_field = Factory::field( 'wysiwyg_field', 'Wysiwyg Field', Wysiwyg::NAME, $sectionc );
	}
}