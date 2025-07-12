@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
$sectionClass .= $greybg ? ' section-grey' : '';
$sectionClass .= $whitebg ? ' section-white' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
@endphp

<section data-gsap-anim="section" class="cards -smt {{ $sectionClass }}">
	<div class="__wrapper c-main-wide bg-white py-20">
		<div class="c-main">

			<div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
				<div class="flex flex-col justify-between order-2 lg:order-1">
					<div>
						@if (!empty($tiles['title']))
						<h3 class="m-title">{{ strip_tags($tiles['title']) }}</h3>
						@endif
						@if (!empty($tiles['text']))
						<p class="__txt text-xl pb-2">{{ strip_tags($tiles['text']) }}</p>
						@endif
					</div>

					@if (!empty($tiles['subtitle']))
					<h4 class="font-medium">{{ strip_tags($tiles['subtitle']) }}</h4>
					@endif
				</div>

				@if (!empty($tiles['image']))
				<div data-gsap-element="img" class="__img  order-1 lg:order-2">
					<img class="b-corners-s object-cover w-full __img img-m" src="{{ $tiles['image']['url'] }}" alt="{{ $tiles['image']['alt'] ?? '' }}">
				</div>
				@endif
			</div>

			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mt-10">

				@foreach ($repeater as $item)
				<div class="__card b-border-light p-10">
					<img class="m-img" src="{{ $item['card_image']['url'] }}" alt="{{ $item['card_image']['alt'] ?? '' }}" />
					<h6 class="">{{ $item['card_title'] }}</h6>
					<p class="">{{ $item['card_txt'] }}</p>
				</div>
				@endforeach
			</div>

		</div>
	</div>

</section>