@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
@endphp

<section data-gsap-anim="section" class="cta -smt {{ $sectionClass }}">

	<div class="__wrapper c-main bg-primary grid grid-cols-1 md:grid-cols-2 section-gap items-center p-8">
			@if (!empty($cta['image']))
			<div data-gsap-element="img" class="__img order1">
				<img class="object-cover w-full __img img-sm" src="{{ $cta['image']['url'] }}" alt="{{ $cta['image']['alt'] ?? '' }}">
			</div>
			@endif

			<div class="__content">
				<p class="text-h4 text-white mb-2">{{ $cta['title'] }}</p>
				<p class="text-white">{{ $cta['txt'] }}</p>
				@if (!empty($cta['button']))
				<a class="white-btn m-btn" href="{{ $cta['button']['url'] }}">{{ $cta['button']['title'] }}</a>
				@endif
			</div>
	</div>

</section>