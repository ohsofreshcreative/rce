<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Team extends Block
{
	public $name = 'Nasz zespół';
	public $description = 'team';
	public $slug = 'team';
	public $category = 'formatting';
	public $icon = 'admin-users';
	public $keywords = ['team', 'zespol'];
	public $mode = 'edit';
	public $supports = [
		'align' => false,
		'mode' => false,
		'jsx' => true,
		'anchor' => true,
		'customClassName' => true,
	];

	public function fields()
	{
		$team = new FieldsBuilder('team');

		$team
			->setLocation('block', '==', 'acf/team') // ważne!
			->addText('block-title', [
				'label' => 'Tytuł',
				'required' => 0,
			])
			->addAccordion('accordion1', [
				'label' => 'Nasz zespół',
				'open' => false,
				'multi_expand' => true,
			])
			/*--- GROUP ---*/
			->addTab('Elementy', ['placement' => 'top'])
			->addGroup('g_team', ['label' => ''])
			->addText('title', ['label' => 'Tytuł'])
			->addTextarea('txt', [
				'label' => 'Opis',
				'rows' => 4,
				'new_lines' => 'br',
			])
			->addImage('image', [
				'label' => 'Obraz',
				'return_format' => 'array', // lub 'url', lub 'id'
				'preview_size' => 'medium',
			])
			->addText('subtitle', ['label' => 'Śródtytuł'])
			->addWysiwyg('content', [
				'label' => 'Treść',
				'tabs' => 'all', // 'visual', 'text', 'all'
				'toolbar' => 'full', // 'basic', 'full'
				'media_upload' => true,
			])
			->addLink('button', [
				'label' => 'Przycisk',
				'return_format' => 'array',
			])
			->endGroup()

			/*--- ZESPÓŁ ---*/
			->addTab('Zespół', ['placement' => 'top'])

			->addRepeater('r_team', [
				'label' => 'Kafelki',
				'layout' => 'table', // 'row', 'block', albo 'table'
				'min' => 1,
				'max' => 4,
				'button_label' => 'Dodaj kafelek'
			])
			->addImage('image', [
				'label' => 'Zdjęcie',
				'return_format' => 'array', // lub 'url', lub 'id'
				'preview_size' => 'thumbnail',
			])
			->addText('title', [
				'label' => 'Imię i nazwisko',
			])
			->addWysiwyg('text', [
				'label' => 'Treść',
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => true,
			])
			->endRepeater()

			/*--- USTAWIENIA BLOKU ---*/

			->addTab('Ustawienia bloku', ['placement' => 'top'])
			->addTrueFalse('flip', [
				'label' => 'Odwrotna kolejność',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('wide', [
				'label' => 'Szeroka kolumna',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('nomt', [
				'label' => 'Usunięcie marginesu górnego',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('side', [
				'label' => 'Marginesy boczne',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('cut', [
				'label' => 'Przycięte rogi',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('gap', [
				'label' => 'Większy odstęp',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('lightbg', [
				'label' => 'Jasne tło',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('graybg', [
				'label' => 'Szare tło',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('whitebg', [
				'label' => 'Białe tło',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('brandbg', [
				'label' => 'Tło marki',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('gradient', [
				'label' => 'Tło gradient',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			]);

		return $team;
	}

	public function with()
	{
		return [
			'g_team' => get_field('g_team'),
			'r_team' => get_field('r_team'),
			'flip' => get_field('flip'),
			'wide' => get_field('wide'),
			'nomt' => get_field('nomt'),
			'side' => get_field('side'),
			'cut' => get_field('cut'),
			'gap' => get_field('gap'),
			'lightbg' => get_field('lightbg'),
			'graybg' => get_field('graybg'),
			'whitebg' => get_field('whitebg'),
			'brandbg' => get_field('brandbg'),
			'gradient' => get_field('gradient'),
		];
	}
}
