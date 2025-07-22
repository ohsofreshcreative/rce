@php
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $wide ? ' wide' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $gap ? ' wider-gap' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
$sectionClass .= $graybg ? ' section-gray' : '';
$sectionClass .= $whitebg ? ' section-white' : '';
$sectionClass .= $brandbg ? ' section-brand' : '';

$args = [
'post_type' => 'cases',
'posts_per_page' => -1, // Wyświetl wszystkie posty
];

$cases = new WP_Query($args);
@endphp

<!--- cases-loop --->

<section data-gsap-anim="section" @if($id) id="{{ $id }}" @endif class="cases-loop c-main relative -smt {{ $block->classes }} {{ $sectionClass }} {{ $class }}">

	@if ($cases->have_posts())
	<div class="__cards grid grid-cols-1 lg:grid-cols-2 gap-10">
		@while ($cases->have_posts())
		@php $cases->the_post(); @endphp
		<div data-gsap-element="card" class="__card items-center gap-10 bg-white">
			<div class="__img order1">
				@if (has_post_thumbnail())
				<img class="object-cover w-full __img img-m" src="{{ get_the_post_thumbnail_url() }}" alt="{{ get_the_title() }}">
				@endif
			</div>

			<div class="__content order2 p-8">

				<h3 class="">{{ get_the_title() }}</h3>

				<div class="mt-2">
					{{ get_the_excerpt() }}
				</div>

				<a class="main-btn m-btn" href="{{ get_permalink() }}">Dowiedz się więcej</a>
			</div>
		</div>
		@endwhile
		@php wp_reset_postdata(); @endphp

	</div>
	@else
	<p>Brak realizacji do wyświetlenia.</p>
	@endif

</section>