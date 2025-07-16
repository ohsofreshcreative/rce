@php
$sectionClass = '';
$sectionClass .= $nomt ? ' !mt-0' : '';
@endphp

<!--- logos --->

<section data-gsap-anim="section" class="cards -smt bg-white py-14 {{ $sectionClass }}">
	<div class="__wrappe c-main">

		<div class="__content w-full md:w-1/2">
			@if ($title)
			<h3 data-gsap-element="header" class="m-title">{{ $title }}</h3>
			@endif

			@if ($txt)
			<div data-gsap-element="txt" class="__txt">{!! $txt !!}</div>
			@endif
		</div>

		<div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-2 mt-14">

			@foreach ($r_logos as $item)
			<div data-gsap-element="card" class="__card ">
				<a href="{{ $item['link'] }}" target="_blank">
					<img class="m-img" src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] ?? '' }}" />
				</a>
			</div>
			@endforeach
		</div>
	</div>

</section>