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
$sectionClass .= $gradient ? ' section-gradient' : '';
@endphp

<section data-gsap-anim="section" class="contact -spt {{ $sectionClass }}">

	<div class="__wrapper c-main-wide relative z-2">
		<div class="grid grid-cols-1 lg:grid-cols-2 gap-10 mt-14">
			<div class="__content w-full lg:w-11/12 flex flex-col justify-between">
				<div>
					@if (!empty($g_contact_1['logo']))
					<div data-gsap-element="logo" class="__img order1 m-img">
						<img class="" src="{{ $g_contact_1['logo']['url'] }}" alt="{{ $g_contact_1['logo']['alt'] ?? '' }}">
					</div>
					<div data-gsap-element="txt" class="text-white">{{ $g_contact_1['txt'] }}</div>
					@endif
					<div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-10">
						<div data-gsap-element="data" class="__data">
							<a class="__phone flex items-center w-max mt-4 text-white" href="tel:{{ $g_contact_1['phone'] }}">{{ $g_contact_1['phone'] }}</a>
							<a class="__mail flex items-center w-max text-white" href="mailto:{{ $g_contact_1['phone'] }}">{{ $g_contact_1['mail'] }}</a>
						</div>
						<div data-gsap-element="address" class="__address mt-4 text-white">{!! $g_contact_1['adres'] !!}</div>
					</div>
				</div>

				@if (!empty($g_contact_1['image']))
				<div data-gsap-element="img" class="__img order1 mt-10">
					<img class="object-cover w-full __img img-l" src="{{ $g_contact_1['image']['url'] }}" alt="{{ $g_contact_1['image']['alt'] ?? '' }}">
				</div>
				@endif
			</div>
			<div data-gsap-element="form" class="__form b-border bg-white p-10 ">
				<h3>{{ $g_contact_2['title'] }}</h3>
				<div class="contact-form-container mt-6">
					{!! do_shortcode($g_contact_2['shortcode']) !!}
				</div>
			</div>
		</div>
	</div>
</section>