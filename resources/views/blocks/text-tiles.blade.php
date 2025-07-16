@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
$sectionClass .= $greybg ? ' section-grey' : '';
$sectionClass .= $whitebg ? ' section-white' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
@endphp

<section data-gsap-anim="section" class="cards text-tiles -smt {{ $sectionClass }}">
	<div class="__wrapper c-main-wide">
		<div class="c-main">

			<div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
				<div class="flex flex-col justify-between w-full md:w-5/6">
					<div>
						@if (!empty($g_texttiles['title']))
						<h1 class="m-title">{{ strip_tags($g_texttiles['title']) }}</h1>
						@endif
						@if (!empty($g_texttiles['text']))
						<p class="__txt text-xl pb-2">{{ strip_tags($g_texttiles['text']) }}</p>
						@endif

						@if (!empty($g_texttiles['image']))
						<div data-gsap-element="img" class="__img mt-10">
							<img class="b-corners-s object-cover w-full __img img-xl" src="{{ $g_texttiles['image']['url'] }}" alt="{{ $g_texttiles['image']['alt'] ?? '' }}">
						</div>
						@endif
					</div>
				</div>

				<div class="grid gap-8 content-between">

					@foreach ($r_texttiles as $item)
					<div class="__card flex flex-col md:flex-row items-start md:items-center gap-6">
						<div class="bg-p-lighter b-corners-sm p-8">
							<img class="" src="{{ $item['card_image']['url'] }}" alt="{{ $item['card_image']['alt'] ?? '' }}" />
						</div>
						<div class="">
							<h6 class="">{{ $item['card_title'] }}</h6>
							<p class="">{{ $item['card_txt'] }}</p>
						</div>
					</div>
					@endforeach
				</div>
			</div>

		</div>
	</div>

</section>