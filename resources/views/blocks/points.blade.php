@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $cut ? ' b-corners' : '';
$sectionClass .= $gap ? ' wider-gap' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
$sectionClass .= $greybg ? ' section-grey' : '';
$sectionClass .= $whitebg ? ' section-white' : '';
$sectionClass .= $brandbg ? ' section-brand' : '';
$sectionClass .= $gradient ? ' section-gradient' : '';
@endphp

<!--- points --->

<section data-gsap-anim="section" class="points -smt mx-0 md:mx-6 {{ $sectionClass }}">
	<div class="__wrapper c-main">

		<div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
			<div class="flex flex-col justify-between order-2 lg:order-1">
				<div>
					@if (!empty($g_points['title']))
					<h3 class="m-title">{{ strip_tags($g_points['title']) }}</h3>
					@endif
					@if (!empty($g_points['text']))
					<p class="__txt text-xl pb-2">{{ strip_tags($g_points['text']) }}</p>
					@endif
				</div>

				@if (!empty($g_points['subtitle']))
				<h4 class="font-medium">{{ strip_tags($g_points['subtitle']) }}</h4>
				@endif
			</div>

			@if (!empty($g_points['image']))
			<div data-gsap-element="img" class="__img  order-1 lg:order-2">
				<img class="b-corners-s object-cover w-full __img img-m" src="{{ $g_points['image']['url'] }}" alt="{{ $g_points['image']['alt'] ?? '' }}">
			</div>
			@endif
		</div>

		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8 mt-10">

			@foreach ($r_points as $item)
			<div class="__point flex gap-4">
				<img class="__icon" src="{{ $icon['url'] }}" alt="{{ $icon['alt'] ?? '' }}">
				<p class="text-base md:text-xl">{{ $item['card_txt'] }}</p>
			</div>
			@endforeach
		</div>
	</div>

</section>