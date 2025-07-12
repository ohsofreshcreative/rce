@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
@endphp

<!--- hero-second -->

<section data-gsap-anim="section" class="hero-cases relative pt-25 {{ $sectionClass }} {{ $blockclass }}">

	<div class="__wrapper c-main">

		<div class="__top grid grid-cols-1 md:grid-cols-[2fr_1fr] gap-20 items-end">
			<div class="__content">
				<h4 data-gsap-element="subheader" class="m-title">{{ $g_heroabout['subtitle'] }}</h4>
				<h1 data-gsap-element="header" class="m-title">{{ $g_heroabout['title'] }}</h1>
				<div data-gsap-element="txt" class="">
					{!! $g_heroabout['txt'] !!}
				</div>
			</div>
			<svg data-gsap-element="arrow" class="justify-self-end" xmlns="http://www.w3.org/2000/svg" width="43" height="43" viewBox="0 0 43 43" fill="none">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M13.6569 35H39.25V43H0V3.75H8V29.3431L36.4216 0.92157L42.0784 6.57843L13.6569 35Z" fill="#041739" />
			</svg>
		</div>

		<img data-gsap-element="image" class="__img img-l b-corners-s mt-20" src="{{ $g_heroabout['image']['url'] }}" alt="{{ $g_heroabout['image']['alt'] ?? '' }}">

	</div>
</section>