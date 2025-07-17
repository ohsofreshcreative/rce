@extends('layouts.app')

@section('content')
@php
$term = get_queried_object();
$title = $term ? get_field('title', 'category_' . $term->term_id) : null;
$txt = $term ? get_field('txt', 'category_' . $term->term_id) : null;
$image = $term ? get_field('image', 'category_' . $term->term_id) : null;
$hero = [
'title' => $title ?: ($term->name ?? ''),
'txt' => $txt ?: ($term->name ?? ''),
'image' => $image['url'] ?? '',
];

$categories = get_categories();
$current_category_url = $term ? get_category_link($term->term_id) : home_url();

// Get the latest sticky post
$sticky_posts = get_option('sticky_posts');
$pinned_post_query = null;
if (!empty($sticky_posts)) {
$pinned_post_query = new WP_Query([
'posts_per_page' => 1,
'post__in' => $sticky_posts,
'ignore_sticky_posts' => 1,
]);
}
@endphp

<section data-gsap-anim="section" class="{{ $sectionClass }}">
	<div class="__wrapper c-main pt-30">
		<div class="grid grid-cols-1 md:grid-cols-2 gap-10">
			<h2 data-gsap-element="header" class="__before">{{ $hero['title'] }}</h2>
		</div>
	</div>
</section>

@if ($pinned_post_query && $pinned_post_query->have_posts())
@while ($pinned_post_query->have_posts()) @php($pinned_post_query->the_post())
<div data-gsap-anim="section" class="c-main pt-10">

	<a href="{{ get_permalink() }}" class="">
		<div class="grid grid-cols-1 md:grid-cols-2 items-center gap-10">
			@if (has_post_thumbnail())
			<div data-gsap-element="img" class="__img b-corners-s">
				{!! get_the_post_thumbnail(null, 'large', ['class' => 'w-full h-auto object-cover group-hover:scale-105 transition-transform duration-300']) !!}
			</div>
			@endif
			<div class="">
				<h3 data-gsap-element="header" class="">{{ get_the_title() }}</h3>
				<div data-gsap-element="txt" class="">
					{!! get_the_excerpt() !!}
				</div>
				<p data-gsap-element="btn" class="underline-btn m-btn" href="{{ get_permalink() }}">
					Zobacz wpis
				</p>
			</div>
		</div>
	</a>
</div>
@endwhile
@php(wp_reset_postdata())
@endif


<div data-gsap-anim="section" class="c-main flex flex-wrap gap-4 -smt">
	<a data-gsap-element="btn" class="stroke-btn" href="/category/baza-wiedzy/">Wszystkie wpisy</a>
	@foreach($categories as $category)
	@if($category->name !== 'Wszystkie wpisy')
	<a data-gsap-element="btn" class="stroke-btn {{ $term && $term->term_id === $category->term_id ? 'active' : '' }}" href="{{ get_category_link($category->term_id) }}">{{ $category->name }}</a>
	@endif
	@endforeach
</div>

@if (have_posts())
<div class="c-main pb-25 !mt-10 posts grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
	@while (have_posts()) @php(the_post())
	@includeFirst(['partials.content', 'partials.content'])
	@endwhile
</div>
{!! get_the_posts_navigation() !!}
@else
<p>Brak wpisów w tej kategorii.</p>
@endif
@endsection