@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $gap ? ' wider-gap' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
$sectionClass .= $graybg ? ' section-gray' : '';
$sectionClass .= $whitebg ? ' section-white' : '';
$sectionClass .= $brandbg ? ' section-brand' : '';
@endphp

@php
$backgroundImage = !empty($bottom['image']['url']) ? "url({$bottom['image']['url']})" : '';
@endphp

<!-- bottom-block -->

<section data-gsap-anim="section" class="cta-bottom relative overflow-hidden grid grid-cols-1 lg:grid-cols-2 gap-10 -smt c-main bg-dark b-corners-s py-6 {{ $sectionClass }}" style="background-image: {{ $backgroundImage }}; background-size: cover; background-position: right;">
	<div class="mx-12 !mb-20 mt-auto">

		<div data-gsap-element="img" class="__img order1">
			<img class="" src="{{ $bottom['logo']['url'] }}" alt="{{ $bottom['logo']['alt'] ?? '' }}">
		</div>
		<h1 data-gsap-element="header" class="text-white mt-4">{{ $bottom['title'] }}</h1>

		<!-- <div class="flex flex-col mt-10 gap-4">
			<a data-gsap-element="phone" class="__phone flex items-center text-2xl text-white" href="tel:{{ $bottom['phone'] }}">{{ $bottom['phone'] }}</a>
			<a data-gsap-element="mail" class="__mail flex items-center text-2xl text-white" href="mailto:{{ $bottom['mail'] }}">{{ $bottom['mail'] }}</a>
		</div> -->

	</div>
	<div class="contact-form-container bg-white p-10 b-corners-s">
		{!! do_shortcode($bottom['shortcode']) !!}
	</div>

</section>