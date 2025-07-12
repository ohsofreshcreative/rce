<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Reviews extends Block
{
	public $name = 'Slider - Opinie';
	public $description = 'reviews';
	public $slug = 'reviews';
	public $category = 'formatting';
	public $icon = 'format-quote';
	public $keywords = ['reviews', 'kafelki'];
	public $mode = 'edit';
	public $supports = [
		'align' => false,
		'mode' => false,
		'jsx' => true,
	];

	public function fields()
	{
		$reviews = new FieldsBuilder('reviews');

		$reviews
			->setLocation('block', '==', 'acf/reviews') // ważne!
			->addText('block-title', [
				'label' => 'Tytuł',
				'required' => 0,
			])
			->addAccordion('accordion1', [
				'label' => 'Slider - Opinie',
				'open' => false,
				'multi_expand' => true,
			])
			/*--- FIELDS ---*/
			->addTab('Treści', ['placement' => 'top'])
			->addGroup('g_reviews', ['label' => ''])
			->addText('title', ['label' => 'Tytuł'])
			->addWysiwyg('content', [
				'label' => 'Treść',
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => true,
			])
			->addLink('button', [
				'label' => 'Przycisk',
				'return_format' => 'array',
			])
			->endGroup()

			/*--- REVIEWS ---*/
			->addTab('Opinie', ['placement' => 'top'])
			->addRepeater('r_reviews', [
				'label' => 'Slider - Opinie',
				'layout' => 'table',
				'min' => 1,
				'max' => 15,
				'button_label' => 'Dodaj kafelek'
			])
			->addImage('image', [
				'label' => 'Obraz',
				'return_format' => 'array',
				'preview_size' => 'medium',
			])
			->addTextarea('txt', [
				'label' => 'Opis',
				'rows' => 6,
				'new_lines' => 'br',
			])
			->addTextArea('name', [
				'label' => 'Klient',
				'rows' => 3,
				'new_lines' => 'br',
			])
			->addTextArea('job', [
				'label' => 'Stanowisko',
				'rows' => 3,
				'new_lines' => 'br',
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
			->addTrueFalse('lightbg', [
				'label' => 'Jasne tło',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			])
			->addTrueFalse('nomt', [
				'label' => 'Usunięcie marginesu górnego',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			]);

		return $reviews;
	}

	public function with()
	{
		return [
			'g_reviews' => get_field('g_reviews'),
			'r_reviews' => get_field('r_reviews'),
			'nomt' => get_field('nomt'),
		];
	}
}
