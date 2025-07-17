<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class HeroOffer extends Block
{
	public $name = 'Hero - Zdjęcie w tle';
	public $description = 'hero-offer';
	public $slug = 'hero-offer';
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
		$hero_offer = new FieldsBuilder('hero-offer');

		$hero_offer
			->setLocation('block', '==', 'acf/hero-offer') // ważne!
			->addText('block-title', [
				'label' => 'Tytuł',
				'required' => 0,
			])
			->addAccordion('accordion1', [
				'label' => 'Hero - Zdjęcie w tle',
				'open' => false,
				'multi_expand' => true,
			])
			->addTab('Treść', ['placement' => 'top']) 
			->addGroup('g_herooffer', ['label' => 'Hero - Zdjęcie w tle'])
			->addImage('image', [
				'label' => 'Obraz',
				'return_format' => 'array', // lub 'url', lub 'id'
				'preview_size' => 'medium',
			])
			->addText('title', ['label' => 'Tytuł'])
			->addWysiwyg('content', [
				'label' => 'Treść',
				'tabs' => 'all', // 'visual', 'text', 'all'
				'toolbar' => 'full', // 'basic', 'full'
				'media_upload' => true,
			])
			->addLink('cta', [
				'label' => 'Przycisk #1',
				'return_format' => 'array',
			])
			->addLink('cta2', [
				'label' => 'Przycisk #2',
				'return_format' => 'array',
			])

			->endGroup()

			->addTab('Ustawienia bloku', ['placement' => 'top']) 

			->addTrueFalse('flip', [
				'label' => 'Odwrotna kolejność',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('centered', [
				'label' => 'Wyśrodkowanie elementów',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('gfx_top', [
				'label' => 'Grafika górna',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('gfx_bottom', [
				'label' => 'Grafika dolna',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			]);

		return $hero_offer;
	}

	public function with()
	{
		return [
			'g_herooffer' => get_field('g_herooffer'),
			'flip' => get_field('flip'),
			'centered' => get_field('centered'),
			'gfx_top' => get_field('gfx_top'),
			'gfx_bottom' => get_field('gfx_bottom'),
		];
	}
}
