@php
$sectionClass = '';
$sectionId = $block->data['id'] ?? null;
$sectionClass .= $nomt ? ' !mt-0' : '';
$customClass = $block->data['className'] ?? '';
@endphp

<!--- reviews --->

<section data-gsap-anim="section" @if($sectionId) id="{{ $sectionId }}" @endif class="reviews bg-gradient -smt {{ $block->classes }} {{ $customClass }} {{ $sectionClass }}">

	<div class="__wrapper c-main grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-20 items-center py-26">
		<div class="__content">
			<h2 data-gsap-element="header" class="text-white m-title">{{ $g_reviews['title']}}</h2>
			<div data-gsap-element="txt" class="__txt text-white text-xl">{!! $g_reviews['content'] !!}</div>

			@if (!empty($g_reviews['button']))
			<a data-gsap-element="btn" class="white-btn m-btn" href="{{ $g_reviews['button']['url'] }}">{{ $g_reviews['button']['title'] }}</a>
			@endif
		</div>

		<div data-gsap-element="slider" class="swiper reviews-swiper w-full relative is-inset">

			<div class="swiper-wrapper">
				@foreach($r_reviews as $card)
				<div class="swiper-slide text-white">
					<div class="__card bg-primary b-border b-corners-s px-6 py-6 md:px-16 md:py-16">

						@if(!empty($card['txt']))
						<div class="__txt">{{ $card['txt'] }}</div>
						@endif

						<div class="flex flex-col md:flex-row gap-6 items-start md:items-center b-border-t pt-10 mt-10">
							<div class="__img flex bg-white rounded-full">
								<img src="{{ $card['image']['url'] }}" alt="{{ $card['image']['alt'] ?? '' }}" />
							</div>
							<div>
								<b class="block">{{ $card['name'] }}</b>
								<p class="block">{{ $card['job'] }}</p>
							</div>
						</div>

					</div>
				</div>
				@endforeach
			</div>

			<div class="swiper-button-prev b-corners-xs b-border">
				<svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
					<path d="M13.2296 5.31498C13.2293 5.31469 13.2291 5.31435 13.2287 5.31406L8.41118 0.281803C8.05027 -0.0951806 7.46652 -0.0937777 7.10727 0.285093C6.74806 0.663916 6.74944 1.27664 7.11036 1.65367L10.3449 5.03226H1.42198C0.912773 5.03226 0.5 5.46552 0.5 6C0.5 6.53448 0.912773 6.96774 1.42198 6.96774H10.3448L7.1104 10.3463C6.74949 10.7234 6.74811 11.3361 7.10731 11.7149C7.46656 12.0938 8.05037 12.0951 8.41123 11.7182L13.2288 6.68594C13.2291 6.68565 13.2293 6.68531 13.2296 6.68502C13.5907 6.30673 13.5896 5.69202 13.2296 5.31498Z" fill="#FFF" />
				</svg>
			</div>
			<div class="swiper-button-next b-corners-xs b-border">
				<svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
					<path d="M13.2296 5.31498C13.2293 5.31469 13.2291 5.31435 13.2287 5.31406L8.41118 0.281803C8.05027 -0.0951806 7.46652 -0.0937777 7.10727 0.285093C6.74806 0.663916 6.74944 1.27664 7.11036 1.65367L10.3449 5.03226H1.42198C0.912773 5.03226 0.5 5.46552 0.5 6C0.5 6.53448 0.912773 6.96774 1.42198 6.96774H10.3448L7.1104 10.3463C6.74949 10.7234 6.74811 11.3361 7.10731 11.7149C7.46656 12.0938 8.05037 12.0951 8.41123 11.7182L13.2288 6.68594C13.2291 6.68565 13.2293 6.68531 13.2296 6.68502C13.5907 6.30673 13.5896 5.69202 13.2296 5.31498Z" fill="#FFF" />
				</svg>
			</div>

		</div>
	</div>

</section>