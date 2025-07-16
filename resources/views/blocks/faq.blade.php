@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';

$sectionId = $block->data['id'] ?? null;
$customClass = $block->data['className'] ?? '';
@endphp

<section data-gsap-anim="section" @if($sectionId) id="{{ $sectionId }}" @endif class="faq -smt {{ $block->classes }} {{ $customClass }} {{ $sectionClass }}">

	<div class="__wrapper c-main">

		<div class="grid grid-cols-1 md:grid-cols-[1fr_2fr] gap-10">
			<h4 data-gsap-element="subheader" class="">{{ $faq['title'] }}</h4>
			<h1 data-gsap-element="header" class="">{{ $title }}</h1>
		</div>

		<div class="grid grid-cols-1 md:grid-cols-[1fr_2fr] gap-10 mt-8 md:mt-28">
			<div>
				@if (!empty($faq['image']))
				<div data-gsap-element="img" class="__img order1 m-img">
					<img class="object-cover w-full __img" src="{{ $faq['image']['url'] }}" alt="{{ $faq['image']['alt'] ?? '' }}">
				</div>
				@endif
				<div data-gsap-element="txt" class="quote">
					{!! $faq['content'] !!}
				</div>
				@if (!empty($faq['button']))
				<a class="main-btn m-btn" href="{{ $faq['button']['url'] }}">{{ $faq['button']['title'] }}</a>
				@endif
			</div>
			<div>
				@foreach ($repeater as $item)
				<div data-gsap-element="tab" class="faq px-8 overflow-hidden">
					<input class="acc-check" type="radio" name="radio-a" id="check{{ $loop->index }}" {{ $loop->first ? 'checked' : '' }}>
					<label class="faq-label text-h6 font-semibold" for="check{{ $loop->index }}">
						{{ $item['title'] }}
					</label>
					<div class="faq-content">
						<p>{!! $item['txt'] !!}</p>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>


</section>