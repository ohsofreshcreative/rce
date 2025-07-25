@php
$sectionClass = '';
$sectionClass .= $nomt ? ' !mt-0' : '';
$sectionClass .= $whitebg ? ' section-white' : '';

$sectionId = $block->data['id'] ?? null;
$customClass = $block->data['className'] ?? '';
@endphp

<!--- category-posts --->

<div data-gsap-anim="section" class="-smt layout-{{ $layout }} {{ $block->classes }} {{ $customClass }} {{ $sectionClass }}"  @if($sectionId) id="{{ $sectionId }}" @endif>
	<div class="c-main">
		<div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-10">
			<h2 data-gsap-element="header" class="block-title">{{ $posts_settings['title'] }}</h2>

			@if($category_id)
			<div data-gsap-element="btn" class="view-all-container text-center">
				<a class="main-btn" href="{{ get_category_link($category_id) }}" class="btn btn-primary view-all-posts">
					Wszystkie artykuły
				</a>
			</div>
			@endif
		</div>

		@if(!empty($posts))
		<div class="posts-container grid grid-cols-1 md:grid-cols-3 gap-8">
			@foreach($posts as $post)
			<div data-gsap-element="card" class="post-item">
				@if($show_image && has_post_thumbnail($post->ID))
				<div class="post-image img-xs m-img">
					<a href="{{ get_permalink($post->ID) }}">
						{!! get_the_post_thumbnail($post->ID, 'large') !!}
					</a>
				</div>
				@endif

				<div class="post-content">
					<h5 class="post-title">
						<a href="{{ get_permalink($post->ID) }}">
							{{ get_the_title($post->ID) }}
						</a>
					</h5>

					@if($show_excerpt)
					<div class="post-excerpt mt-4">
						{{ get_the_excerpt($post->ID) }}
					</div>
					@endif

					<a href="{{ get_permalink($post->ID) }}" class="underline-btn block primary m-btn">Przeczytaj</a>
				</div>
			</div>
			@endforeach
		</div>
		@else
		<div class="no-posts">
			Brak postów w wybranej kategorii.
		</div>
		@endif
	</div>
</div>