<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Faq extends Block
{
	public $name = 'Najczęściej zadawane pytania';
	public $description = 'Faq';
	public $slug = 'faq';
	public $category = 'formatting';
	public $icon = 'feedback';
	public $keywords = ['faq'];
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
		$faq = new FieldsBuilder('faq');

		$faq
			->setLocation('block', '==', 'acf/faq') // ważne!
			->addText('block-title', [
				'label' => 'Tytuł',
				'required' => 0,
			])
			->addAccordion('accordion1', [
				'label' => 'Najczęściej zadawane pytania',
				'open' => false,
				'multi_expand' => true,
			])
			/*--- TAB #1 ---*/
			->addTab('Elementy', ['placement' => 'top'])
			->addGroup('faq', ['label' => ''])
			->addText('title', ['label' => 'Tytuł'])
			->addImage('image', [
				'label' => 'Obraz',
				'return_format' => 'array',
				'preview_size' => 'medium',
			])
			->addWysiwyg('content', [
				'label' => 'Cytat',
				'tabs' => 'all', // 'visual', 'text', 'all'
				'toolbar' => 'full', // 'basic', 'full'
				'media_upload' => true,
			])
			->addLink('button', [
				'label' => 'Przycisk',
				'return_format' => 'array',
			])
			->endGroup()

			/*--- TAB #2 ---*/
			->addTab('FAQ', ['placement' => 'top'])
			->addText('title', ['label' => 'Tytuł'])
			->addRepeater('repeater', [
				'label' => 'FAQ',
				'layout' => 'table', // 'row', 'block', albo 'table'
				'min' => 1,
				'button_label' => 'Dodaj pytanie'
			])
			->addText('title', [
				'label' => 'Pytanie',
			])
			->addTextarea('txt', [
				'label' => 'Odpowiedź',
			])
			->endRepeater()

			/*--- USTAWIENIA BLOKU ---*/
			->addTab('Ustawienia bloku', ['placement' => 'top'])
			->addTrueFalse('flip', [
				'label' => 'Odwrotna kolejność',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			]);

		return $faq;
	}

	public function with()
	{
		return [
			'faq' => get_field('faq'),
			'title' => get_field('title'),
			'repeater' => get_field('repeater'),
			'flip' => get_field('flip'),
		];
	}
}
