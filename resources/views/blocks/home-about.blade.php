@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
@endphp

<section data-gsap-anim="section" @if(!empty($id)) id="{{ $id }}" @endif class="home-about {{ $sectionClass }}">
	<div class="">
		@if (!empty($about1['image']))
		<img class="c-main-wide object-cover w-full __img img-xl" src="{{ $about1['image']['url'] }}" alt="{{ $about1['image']['alt'] ?? '' }}">
		@endif

		<div class="c-main">
		<div class="grid grid-cols-1 md:grid-cols-2 justify-center items-center -mt-[180px]">
			<div></div>
			<div class="bg-primary px-14 py-14">
				@if (!empty($about1['title']))
				<p class="font-bold uppercase font-header">{{ strip_tags($about1['title']) }}</p>
				@endif

				@if (!empty($about1['content']))
				<h5 class="mt-5 font-medium __txt">{{ strip_tags($about1['content']) }}</h5>
				@endif

				<a href="#more" class="block mt-10">
					<img src="/wp-content/uploads/2025/05/arrow-down.svg" />
				</a>
			</div>
		</div>
		</div>
	</div>

</section>