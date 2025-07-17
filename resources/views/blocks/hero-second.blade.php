@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
@endphp

<!--- hero-second -->

<section data-gsap-anim="section" class="hero-second relative bg-gradient b-corners mx-6 {{ $sectionClass }}">
	<div class="__wrapper c-main relative z-2 grid grid-cols-1 md:grid-cols-2 items-center gap-8 {{ !empty($g_herosecond['image']) ? 'py-26' : '' }}">
		<div class="text-white">
			<h2 data-gsap-element="header" class="m-title text-white">{{ $g_herosecond['title'] }}</h2>

			<div data-gsap-element="content" class="">
				{!! $g_herosecond['content'] !!}
			</div>

			<div class="grid grid-cols-1 lg:grid-cols-2 section-gap b-border-t pt-10 mt-10">
				<div data-gsap-element="point" class="">
					<h5 class="text-white">Nasz klient:</h5>
					<p class="text-xl">{!! $g_herosecond['client'] !!}</p>
				</div>
				<div data-gsap-element="point" class="">
					<h5 class="text-white">Klient docelowy:</h5>
					<p class="text-xl">{!! $g_herosecond['target'] !!}</p>
				</div>
				<div data-gsap-element="point" class="">
					<h5 class="text-white">Projekt:</h5>
					<p class="text-xl">{!! $g_herosecond['project'] !!}</p>
				</div>
				<div data-gsap-element="point" class="">
					<h5 class="text-white">Adres:</h5>
					<p class="text-xl">{!! $g_herosecond['address'] !!}</p>
				</div>
			</div>

			@if (!empty($g_herosecond['cta']))
			<a data-gsap-element="button" class="main-btn m-btn" href="{{ $g_herosecond['cta']['url'] }}" target="{{ $g_herosecond['cta']['target'] }}">{{ $g_herosecond['cta']['title'] }}</a>
			@endif
		</div>

		@if (!empty($g_herosecond['image']))
		<div data-gsap-element="img" class="__img order1">
			<img class="object-cover w-full __img img-xl" src="{{ $g_herosecond['image']['url'] }}" alt="{{ $g_herosecond['image']['alt'] ?? '' }}">
		</div>
		@endif

	</div>

</section>