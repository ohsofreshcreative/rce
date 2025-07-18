<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Bottom extends Field
{
	public $name = 'Wezwanie do działania';
	public $description = 'Bottom';
	public $slug = 'bottom';
	public $category = 'formatting';
	public $icon = 'email';
	public $keywords = ['formularz', 'zdjecie'];
	public $mode = 'edit';
	public $supports = [
		'align' => false,
		'mode' => false,
		'jsx' => true,
	];

	public function fields(): array
	{
		$bottom = new FieldsBuilder('bottom');

		$bottom
			->setLocation('options_page', '==', 'bottom') // ważne!
			/*--- FIELDS ---*/
			->addTab('Treść', ['placement' => 'top'])
			->addGroup('bottom', ['label' => ''])
			->addImage('image', [
				'label' => 'Obraz',
				'return_format' => 'array', // lub 'url', lub 'id'
				'preview_size' => 'medium',
			])
			
			->addImage('logo', [
				'label' => 'Obraz',
				'return_format' => 'array', // lub 'url', lub 'id'
				'preview_size' => 'medium',
			])
			->addText('title', ['label' => 'Tytuł'])
			->addText('phone', ['label' => 'Telefon'])
			->addText('mail', ['label' => 'Adres e-mail'])
			->addText('shortcode', [
				'label' => 'Kod formularza',
				'instructions' => 'Wklej shortcode formularza, np. [contact-form-7 id="84690e3" title="Contact form 1"]',
			])
			->endGroup()

			/*--- USTAWIENIA BLOKU ---*/

			->addTab('Ustawienia bloku', ['placement' => 'top'])
			->addTrueFalse('flip', [
				'label' => 'Odwrotna kolejność',
				'ui' => 1,
				'ui_on_text' => 'Tak',
				'ui_off_text' => 'Nie',
			]);


		return [$bottom];
	}
}
