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
$sectionClass .= $gradient ? ' section-gradient' : '';

$sectionId = $block->data['id'] ?? null;
$customClass = $block->data['className'] ?? '';
@endphp

<!--- team -->

<section data-gsap-anim="section" @if($sectionId) id="{{ $sectionId }}" @endif class="text-image relative -smt {{ $block->classes }} {{ $customClass }} {{ $sectionClass }}">

	<div class="__wrapper c-main relative">
		<div class="w-full md:w-1/2 m-auto text-center text-white">
			<h1 data-gsap-element="header" class="m-title">{{ $g_team['title'] }}</h1>
			<div data-gsap-element="txt" class="mt-2">
				{!! $g_team['txt'] !!}
			</div>
		</div>
		<div class="__col grid grid-cols-1 lg:grid-cols-2 items-center gap-10 mt-10">
			@if (!empty($g_team['image']))
			<div data-gsap-element="img" class="__img order1">
				<img class="object-cover w-full __img img-m" src="{{ $g_team['image']['url'] }}" alt="{{ $g_team['image']['alt'] ?? '' }}">
			</div>
			@endif

			<div class="__content order2">
				<h4 data-gsap-element="header" class="">{{ $g_team['subtitle'] }}</h4>
				<div data-gsap-element="txt" class="mt-2">
					{!! $g_team['content'] !!}
				</div>
				@if (!empty($g_team['button']))
				<a data-gsap-element="btn" class="main-btn m-btn" href="{{ $g_team['button']['url'] }}">{{ $g_team['button']['title'] }}</a>
				@endif
			</div>

		</div>

</section>