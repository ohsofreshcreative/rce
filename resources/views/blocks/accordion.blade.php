@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $darkbg ? ' section-dark' : '';

$sectionId = $block->data['id'] ?? null;
$customClass = $block->data['className'] ?? '';
@endphp

<!-- accordion -->

<section data-gsap-anim="section" @if($sectionId) id="{{ $sectionId }}" @endif class="accordion faq relative overflow-hidden -smt {{ $block->classes }} {{ $customClass }} {{ $sectionClass }}">
	<div class="__wrapper c-main relative z-2">

		<div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-20 items-center">

			@if (!empty($g_accordion['image']))
			<img data-gsap-element="image" class="object-cover __img order1 img-xxl" src="{{ $g_accordion['image']['url'] }}" alt="{{ $g_accordion['image']['alt'] ?? '' }}">
			@endif

			<div class="__content order2">
				<h2 data-gsap-element="header" class="m-title">{{ $g_accordion['title'] }}</h2>
				<div data-gsap-element="txt" class="mb-10">{!! $g_accordion['content'] !!}</div>
				<div data-gsap-element="accordion" class="accordion-wrapper grid">
					@foreach ($repeater as $item)
					<div class="accordion px-8">
						<input class="acc-check" type="radio" name="radio-a" id="check{{ $loop->index }}" {{ $loop->first ? 'checked' : '' }}>
						<label class="accordion-label text-h5" for="check{{ $loop->index }}">
							{{ $item['title'] }}
						</label>

						<div class="accordion-content">
							<p>{!! $item['txt'] !!}</p>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>