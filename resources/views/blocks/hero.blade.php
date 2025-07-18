@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
@endphp

@php
$backgroundImage = !empty($hero['image']['url']) ? "url({$hero['image']['url']})" : '';
@endphp

<!-- hero --->

<section data-gsap-anim="section" class="hero relative mx-0 md:mx-6 cut-corners {{ $sectionClass }}" style="background-image: {{ $backgroundImage }}; background-size: cover; background-position: center;">

	<div class="__wrapper c-main text-center relative z-1 {{ !empty($hero['image']) ? 'py-80 pb-20 md:py-90 md:pb-40' : '' }}">

		<h2 data-gsap-element="header" class="text-white m-auto w-full md:w-2/3">{{ $hero['title'] }}</h2>

		<div data-gsap-element="content" class="text-white mt-2 __content">
			{!! $hero['content'] !!}
		</div>

		@if (!empty($hero['cta']))
		<a data-gsap-element="button" class="white-btn m-btn" href="{{ $hero['cta']['url'] }}" target="{{ $hero['cta']['target'] }}">{{ $hero['cta']['title'] }}</a>
		@endif

	</div>

</section> 