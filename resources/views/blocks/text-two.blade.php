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

<!--- text-two -->

<section data-gsap-anim="section" @if($sectionId) id="{{ $sectionId }}" @endif class="text-two relative -smt {{ $block->classes }} {{ $customClass }} {{ $sectionClass }}">

	<div class="__wrapper c-main relative">
		<div class="__col grid grid-cols-1 lg:grid-cols-2 items-center gap-10">
			<div class="__imgs order1 grid grid-cols-1 lg:grid-cols-2">
				@if (!empty($g_texttwo['image']))
				<div data-gsap-element="img" class="__img">
					<img class="object-cover w-full __img img-xl" src="{{ $g_texttwo['image']['url'] }}" alt="{{ $g_texttwo['image']['alt'] ?? '' }}">
				</div>
				@endif
				@if (!empty($g_texttwo['image2']))
				<div data-gsap-element="img" class="__img">
					<img class="object-cover w-full __img img-xl" src="{{ $g_texttwo['image2']['url'] }}" alt="{{ $g_texttwo['image2']['alt'] ?? '' }}">
				</div>
				@endif
			</div>

			<div class="__content order2">
				<h2 data-gsap-element="header" class="">{{ $g_texttwo['title'] }}</h2>

				<div data-gsap-element="txt" class="mt-2">
					{!! $g_texttwo['content'] !!}
				</div>

				@if (!empty($g_texttwo['button']))
				<a data-gsap-element="btn" class="main-btn m-btn" href="{{ $g_texttwo['button']['url'] }}">{{ $g_texttwo['button']['title'] }}</a>
				@endif

			</div>

		</div>

</section>