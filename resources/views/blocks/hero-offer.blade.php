@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
@endphp

@php
$alignClass = '';
$alignClass .= $centered ? ' text-center m-auto' : '';
@endphp

@php
$backgroundImage = !empty($g_herooffer['image']['url']) ? "linear-gradient(270deg, rgba(0,18,76,0.1) 0%, rgba(0,18,76,0.7) 100%), url({$g_herooffer['image']['url']})" : '';
@endphp

<!-- hero-offer -->
<section data-gsap-anim="section" class="hero-offer relative overflow-hidden b-corners {{ $sectionClass }}" style="background-image: {{ $backgroundImage }}; background-size: cover; background-position: center;">

	<div class="__wrapper c-main {{ !empty($g_herooffer['image']) ? 'py-50' : '' }}">

		<div class="w-full sm:w-2/3 {{ $alignClass }}">
			<h1 data-gsap-element="header" class="text-white">{{ $g_herooffer['title'] }}</h1>
			<div data-gsap-element="content" class="text-white mt-2 __content">
				{!! $g_herooffer['content'] !!}
			</div>

			<a href="#more">
				<div data-gsap-element="arrow" class="__arrow w-max m-btn b-corners-xs {{ $alignClass }}">
					<svg class="" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M12.758 15.458L19.5982 8.61782L21.7363 10.7559L11.2461 21.2461L0.755941 10.7559L2.89407 8.61782L9.73422 15.458L9.73424 0.265759L12.758 0.265774L12.758 15.458Z" fill="white" />
					</svg>
				</div>
			</a>

			@if (!empty($g_herooffer['cta']))
			<div class="inline-buttons m-btn">
				<a data-gsap-element="button" class="main-btn left-btn" href="{{ $g_herooffer['cta']['url'] }}" target="{{ $g_herooffer['cta']['target'] }}">{{ $g_herooffer['cta']['title'] }}</a>

				@if (!empty($g_herooffer['cta2']))
				<a data-gsap-element="button" class="stroke-btn" href="{{ $g_herooffer['cta2']['url'] }}" target="{{ $g_herooffer['cta2']['target'] }}">{{ $g_herooffer['cta2']['title'] }}</a>
				@endif
			</div>
			@endif
		</div>
</section>