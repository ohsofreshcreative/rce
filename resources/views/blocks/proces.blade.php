@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
@endphp

<!--- proces --->

<section data-gsap-anim="section" @if($id) id="{{ $id }}" @endif class="g_proces -smt {{ $sectionClass }} {{ $class }}">
	<div class="__wrapper c-main">
		<div class="relative">
			<div class="w-full md:w-1/2">
				@if (!empty($g_proces['image']))
				<div data-gsap-element="img" class="__img mb-6">
					<img class="" src="{{ $g_proces['image']['url'] }}" alt="{{ $g_proces['image']['alt'] ?? '' }}">
				</div>
				@endif
				<h2 data-gsap-element="header" class="__txt m-title">{{ $g_proces['title'] }}</h2>
				<div data-gsap-element="txt" class="">{!! $g_proces['txt'] !!}</div>
			</div>

			@if (!empty($r_proces))
			<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 section-gap mt-14">
				@foreach ($r_proces as $index => $item)
				@php
				$number = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
				@endphp
				<div data-gsap-element="card" class="__card bg-white p-8">
					<div class="__img relative overflow-hidden">
						<div class="text-[240px] absolute font-bold text-white leading-none tracking-tighter -left-12 -bottom-2">{{ $number }}</div>
						<img class="m-img img-s object-cover w-full" src="{{ $item['r_image']['url'] }}" alt="{{ $item['r_image']['alt'] ?? '' }}" />
					</div>
					<h4>{{ $item['r_title'] }}</h4>
					<p>{{ $item['r_txt'] }}</p>
				</div>
				@endforeach
				</ul>
				@endif

			</div>
		</div>

</section>