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

<!--- scope -->

<section data-gsap-anim="section" @if($sectionId) id="{{ $sectionId }}" @endif class="scope relative -smt {{ $block->classes }} {{ $customClass }} {{ $sectionClass }}">

	<div class="__wrapper c-main relative">
		<div class="__col grid grid-cols-1 lg:grid-cols-2 gap-10">
			@if (!empty($g_scope['gallery']))
			<div class="flex flex-col gap-10">
				@foreach ($g_scope['gallery'] as $image)
				<img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}">
				@endforeach
			</div>
			@endif

			<div class="__content sticky top-26 h-max order2">
				<h2 data-gsap-element="header" class="">{{ $g_scope['title'] }}</h2>

				<div data-gsap-element="txt" class="mt-2">
					{!! $g_scope['content'] !!}
				</div>

				<div class="b-border-t pt-8 mt-8">
					<h6 data-gsap-element="txt" class="mt-2 mb-0">
						{!! $g_contact['title'] !!}
					</h6>
					@if (!empty($g_contact['button']))
					<a data-gsap-element="btn" class="main-btn m-btn" href="{{ $g_contact['button']['url'] }}">{{ $g_contact['button']['title'] }}</a>
					@endif
				</div>

			</div>

		</div>

</section>