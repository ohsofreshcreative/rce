@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $side ? ' !mx-6' : '';
$sectionClass .= $cut ? ' b-corners' : '';
$sectionClass .= $gap ? ' wider-gap' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
$sectionClass .= $graybg ? ' section-gray' : '';
$sectionClass .= $whitebg ? ' section-white' : '';
$sectionClass .= $brandbg ? ' section-brand' : '';

$sectionId = $block->data['id'] ?? null;
$customClass = $block->data['className'] ?? '';
@endphp

<!--- quote -->

<section data-gsap-anim="section" @if($sectionId) id="{{ $sectionId }}" @endif class="quote relative bg-gradient -smt {{ $block->classes }} {{ $customClass }} {{ $sectionClass }}">

	<div class="__wrapper c-main relative">
		<div class="__col grid grid-cols-1 lg:grid-cols-2 items-center gap-10">

			<div class="__content">
				<h3 data-gsap-element="header" class="text-light">{{ $g_quote['title'] }}</h3>

				@if (!empty($g_quote['button']))
				<a data-gsap-element="btn" class="white-btn m-btn" href="{{ $g_quote['button']['url'] }}">{{ $g_quote['button']['title'] }}</a>
				@endif

			</div>

			@if (!empty($g_quote['image']))
			<div data-gsap-element="img" class="__img hidden lg:block">
				<img class="m-auto" src="{{ $g_quote['image']['url'] }}" alt="{{ $g_quote['image']['alt'] ?? '' }}">
			</div>
			@endif

		</div>

</section>