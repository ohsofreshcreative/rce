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

<!--- review -->

<section data-gsap-anim="section" @if($sectionId) id="{{ $sectionId }}" @endif class="review relative  -smt {{ $block->classes }} {{ $customClass }} {{ $sectionClass }}">

	<div class="__wrapper c-main relative">
		<svg data-gsap-element="svg"  xmlns="http://www.w3.org/2000/svg" width="40" height="32" viewBox="0 0 40 32" fill="none">
			<path d="M26.383 32L24.6809 29.4737C25.8723 28.2947 26.8936 27.1158 27.7447 25.9368C29.2766 23.7474 30.9787 20.7158 31.4894 16.8421C26.2128 16.8421 22.9787 13.6421 22.9787 8.42105C22.9787 3.2 26.2128 0 31.4894 0C36.766 0 40 3.2 40 8.42105C40 16.3368 36.5957 22.4 33.1915 26.2737C31.1489 28.4632 28.9362 30.4842 26.383 32ZM3.40425 32L1.70213 29.4737C2.89361 28.2947 3.91489 27.1158 4.76596 25.9368C6.29787 23.7474 8 20.7158 8.51064 16.8421C3.23404 16.8421 0 13.6421 0 8.42105C0 3.2 3.23404 0 8.51064 0C13.7872 0 17.0213 3.2 17.0213 8.42105C17.0213 16.3368 13.617 22.4 10.2128 26.2737C8.17021 28.4632 5.95744 30.4842 3.40425 32Z" fill="#CCDAF3" />
		</svg>
		<h2 data-gsap-element="header" class="primary mt-8">{{ $g_review['title'] }}</h2>

		<div class="__col flex flex-col md:flex-row items-center gap-10 mt-14">

			@if (!empty($g_review['image']))
			<div data-gsap-element="img" class="__img b-corners-s">
				<img class="m-auto" src="{{ $g_review['image']['url'] }}" alt="{{ $g_review['image']['alt'] ?? '' }}">
			</div>
			@endif

			<div class="__content">
				<div data-gsap-element="header" class="__review font-medium text-xl">{!! $g_review['content'] !!}</div>
				<p data-gsap-element="txt" class="mt-6">{{ $g_review['person'] }}</p>
			</div>

		</div>

</section>