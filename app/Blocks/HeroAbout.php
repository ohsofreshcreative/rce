<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class HeroAbout extends Block
{
	public $name = 'Sekcja Hero - O nas';
	public $description = 'hero-about';
	public $slug = 'hero-about';
	public $category = 'formatting';
	public $icon = 'align-full-width';
	public $keywords = ['tresc', 'zdjecie'];
	public $mode = 'edit';
	public $supports = [
		'align' => false,
		'mode' => false,
		'jsx' => true,
	];

	public function fields()
	{
		$hero_about = new FieldsBuilder('hero-about');

		$hero_about
			->setLocation('block', '==', 'acf/hero-about') // ważne!
			->addText('block-title', [
				'label' => 'Tytuł',
				'required' => 0,
			])
			->addAccordion('accordion1', [
				'label' => 'Hero - Realizacje',
				'open' => false,
				'multi_expand' => true,
			])
			->addTab('Treść', ['placement' => 'top']) 
			->addGroup('g_heroabout', ['label' => 'Hero - Pojedyncza oferta'])
			->addImage('image', [
				'label' => 'Obraz',
				'return_format' => 'array', // lub 'url', lub 'id'
				'preview_size' => 'medium',
			])
			->addText('subtitle', ['label' => 'Śródtytuł'])
			->addText('title', ['label' => 'Tytuł'])
			->addWysiwyg('txt', [
				'label' => 'Treść',
				'tabs' => 'all', // 'visual', 'text', 'all'
				'toolbar' => 'full', // 'basic', 'full'
				'media_upload' => true,
			])

			->endGroup()

			->addTab('Ustawienia bloku', ['placement' => 'top']) 

			->addTrueFalse('flip', [
				'label' => 'Odwrotna kolejność',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])

			->addText('blockclass', ['label' => 'Klasa bloku']);

		return $hero_about;
	}

	public function with()
	{
		return [
			'g_heroabout' => get_field('g_heroabout'),
			'flip' => get_field('flip'),
			'blockclass' => get_field('blockclass'),
		];
	}
}
