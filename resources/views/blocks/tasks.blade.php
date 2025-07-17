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

<!--- tasks -->

<section data-gsap-anim="section" @if($sectionId) id="{{ $sectionId }}" @endif class="tasks relative -smt {{ $block->classes }} {{ $customClass }} {{ $sectionClass }}">

	<div class="__wrapper c-main relative">
		<h2 class="text-center mb-4">{{ $title }}</h2>
		@foreach ($r_tasks as $item)
		<div class="__card grid grid-cols-1 lg:grid-cols-2 items-center b-border bg-light gap-10 p-8 mt-10">
			<div data-gsap-element="img" class="__img order-2">
				<img class="object-cover w-full __img img-m" src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] ?? '' }}">
			</div>

			<div class="__content order-1">
				<img data-gsap-element="icon" class="" src="{{ $item['icon']['url'] }}" alt="{{ $item['icon']['alt'] ?? '' }}">
				<h2 data-gsap-element="header" class="">{{ $item['title'] }}</h2>

				<div data-gsap-element="txt" class="mt-2">
					{!! $item['txt'] !!}
				</div>

				@if (!empty($item['button']))
				<a data-gsap-element="btn" class="main-btn m-btn" href="{{ $item['button']['url'] }}">{{ $item['button']['title'] }}</a>
				@endif

			</div>

		</div>
		@endforeach

</section>