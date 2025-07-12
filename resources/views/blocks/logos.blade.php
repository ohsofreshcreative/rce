@php
$sectionClass = '';
$sectionClass .= $nomt ? ' !mt-0' : '';
@endphp

<!--- logos --->

<section data-gsap-anim="section" class="cards -smt bg-white py-14 {{ $sectionClass }}">
	<div class="__wrappe c-main">

		<div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

			@if ($title)
			<h3 class="">{{ $title }}</h3>
			@endif

			@if (!empty($logos['image']))
			<div data-gsap-element="img" class="__img  order-1 lg:order-2">
				<img class="b-corners-s object-cover w-full __img img-m" src="{{ $logos['image']['url'] }}" alt="{{ $logos['image']['alt'] ?? '' }}">
			</div>
			@endif
		</div>

		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-2 mt-10">

			@foreach ($r_logos as $item)
			<div class="__card ">
				<a href="{{ $item['link'] }}" target="_blank">
					<img class="m-img" src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] ?? '' }}" />
				</a>
			</div>
			@endforeach
		</div>
	</div>

</section>