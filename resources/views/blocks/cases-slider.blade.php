@php
// --- Zmienne dla sekcji ---
$sectionClass = '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';

$sectionId = $block->data['id'] ?? null;
$customClass = $block->data['className'] ?? '';

// --- Pobieranie postów ---
$args = [
'post_type' => 'cases',
'posts_per_page' => -1,
'no_found_rows' => false,
];
$cases = new WP_Query($args);
$total_slides = $cases->found_posts;
@endphp

<!-- cases-slider -->
<section data-gsap-anim="section" @if($sectionId) id="{{ $sectionId }}" @endif class="cases-slider c-main relative -smt {{ $block->classes }} {{ $customClass }} {{ $sectionClass }}">

	<div class="cases-slider-wrapper grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-20 items-center" data-total-slides="{{ $total_slides }}">

		@if ($cases->have_posts())

		<div class="cases-text-col order-2 lg:order-1">
			<div class="swiper swiper-text">
				<div class="swiper-wrapper">
					@while ($cases->have_posts()) @php $cases->the_post(); @endphp
					<div class="swiper-slide">
						<div class="case-content">
							@if ($title)
							<h2 data-gsap-element="header" class="mb-6">{{ $title }}</h2>
							@endif
							<h4 data-gsap-element="subheader" class="m-title">{{ get_the_title() }}</h4>
							<div data-gsap-element="txt" class="text-content my-4">
								{{ get_the_excerpt() }}
							</div>
							<a data-gsap-element="btn" class="stroke-btn m-btn mt-4" href="{{ get_permalink() }}">Dowiedz się więcej</a>
						</div>
					</div>
					@endwhile
				</div>
			</div>

			@if ($total_slides > 1)
			<div data-gsap-element="control" class="flex items-center gap-6 mt-8">
				{{-- [FIX] Dodany element licznika --}}
				<div class="slide-counter text-sm font-semibold text-gray-600 w-12 text-center"></div>

				<div class="progress-container flex-grow h-px bg-gray-300 relative">
					<div class="progress-bar bg-primary h-[3px] w-0 absolute top-1/2 -translate-y-1/2 left-0 transition-all duration-300 ease-out"></div>
				</div>
				<div class="cases-slider-nav flex gap-8 z-10">
					<div class="swiper-button-prev b-corners-xs">
						<svg xmlns="http://www.w3.org/2000/svg" width="12" height="10" viewBox="0 0 12 10" fill="none">
							<path d="M11.7589 4.48624C11.7587 4.48602 11.7585 4.48577 11.7582 4.48555L7.4635 0.711353C7.14176 0.428615 6.62136 0.429667 6.3011 0.71382C5.98089 0.997937 5.98212 1.45748 6.30386 1.74026L9.18731 4.27419H0.821917C0.367972 4.27419 0 4.59914 0 5C0 5.40086 0.367972 5.72581 0.821917 5.72581H9.18727L6.3039 8.25974C5.98216 8.54252 5.98093 9.00206 6.30114 9.28618C6.6214 9.57037 7.14184 9.57135 7.46354 9.28865L11.7582 5.51445C11.7585 5.51423 11.7587 5.51398 11.759 5.51376C12.0809 5.23005 12.0798 4.76901 11.7589 4.48624Z" fill="white" />
						</svg>
					</div>
					<div class="swiper-button-next b-corners-xs">
						<svg xmlns="http://www.w3.org/2000/svg" width="12" height="10" viewBox="0 0 12 10" fill="none">
							<path d="M11.7589 4.48624C11.7587 4.48602 11.7585 4.48577 11.7582 4.48555L7.4635 0.711353C7.14176 0.428615 6.62136 0.429667 6.3011 0.71382C5.98089 0.997937 5.98212 1.45748 6.30386 1.74026L9.18731 4.27419H0.821917C0.367972 4.27419 0 4.59914 0 5C0 5.40086 0.367972 5.72581 0.821917 5.72581H9.18727L6.3039 8.25974C5.98216 8.54252 5.98093 9.00206 6.30114 9.28618C6.6214 9.57037 7.14184 9.57135 7.46354 9.28865L11.7582 5.51445C11.7585 5.51423 11.7587 5.51398 11.759 5.51376C12.0809 5.23005 12.0798 4.76901 11.7589 4.48624Z" fill="white" />
						</svg>
					</div>
				</div>
			</div>
			@endif
		</div>

		<div class="cases-image-col order-1 lg:order-2">
			<div class="swiper swiper-images b-corners-s">
				<div class="swiper-wrapper">
					@php $cases->rewind_posts(); @endphp
					@while ($cases->have_posts()) @php $cases->the_post(); @endphp
					<div class="swiper-slide">
						<img class="img-xl w-full h-full object-cover" src="{{ get_the_post_thumbnail_url(get_the_ID(), 'large') }}" alt="{{ get_the_title() }}">
					</div>
					@endwhile
				</div>
			</div>
		</div>

		@php wp_reset_postdata(); @endphp
		@else
		<p>Brak realizacji do wyświetlenia.</p>
		@endif
	</div>
</section>