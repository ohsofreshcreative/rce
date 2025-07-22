@php
$categories = get_the_category();
@endphp

<section data-gsap-anim="section" class="blog__top {{ $sectionClass }}">
	<div class="__wrapper c-main pt-40">
		<div class="__content text-center w-full md:w-2/3 m-auto">

			@if (!empty($categories))
			<a data-gsap-element="btn" href="{{ get_category_link($categories[0]->term_id) }}" class="__category px-3 py-2">
				{{ $categories[0]->name }}
			</a>
			@endif
			<h1 data-gsap-element="header" class="m-title mt-8">{{ get_the_title() }}</h1>
			@if(has_excerpt())
			<div data-gsap-element="content" class="">
				{!! get_the_excerpt() !!}
			</div>
			@endif
			<div data-gsap-element="arrow" class="__arrow w-max m-btn b-corners-xs m-auto text-center">
				<a href="#more" class="">
					<svg class="" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M12.758 15.458L19.5982 8.61782L21.7363 10.7559L11.2461 21.2461L0.755941 10.7559L2.89407 8.61782L9.73422 15.458L9.73424 0.265759L12.758 0.265774L12.758 15.458Z" fill="white" />
					</svg>
				</a>
			</div>
		</div>
		@if (has_post_thumbnail())
		<img data-gsap-element="img" class="b-corners -smt" src="{{ get_the_post_thumbnail_url(null, 'full') }}" alt="{{ get_the_title() }}">
		@endif
	</div>
</section>

@php
$content = apply_filters('the_content', get_the_content());

preg_match_all('/<h([1-4])[^>]*>(.*?)<\/h[1-4]>/', $content, $matches, PREG_SET_ORDER);

		$toc = '<nav class="toc">
			<ul>';
				$used_ids = [];
				foreach ($matches as $match) {
				$level = $match[1];
				$title = strip_tags($match[2]);
				$id = sanitize_title($title);
				$base_id = $id;
				$i = 2;
				while (in_array($id, $used_ids)) {
				$id = $base_id . '-' . $i;
				$i++;
				}
				$used_ids[] = $id;
				$content = preg_replace(
				'/<h' . $level . '[^>]*>' . preg_quote($match[2], '/' ) . '<\/h' . $level . '>/' , '<h' . $level . ' id="' . $id . '">' . $match[2] . '</h' . $level . '>' ,
					$content,
					1
					);
					$toc .='<li class="toc-h' . $level . '"><a href="#' . $id . '">' . $title . '</a></li>' ;
					}
					$toc .='</ul></nav>' ;
					@endphp

					<div id="more" class="__content c-main -smt grid grid-cols-1 md:grid-cols-[1fr_2fr] gap-10">

					<div data-gsap-element="toc" class="relative md:sticky top-0 md:top-30 h-max">
						<h5 class="m-title">Spis treści</h5>
						@if(count($matches))
						{!! $toc !!}
						@endif
					</div>

					<div id="tresc" class="__entry">
						{!! $content !!}
					</div>

					</div>


					@php
					$current_id = get_the_ID();
					$categories = wp_get_post_categories($current_id);
					$related_args = [
					'category__in' => $categories,
					'post__not_in' => [$current_id],
					'posts_per_page' => 3,
					'ignore_sticky_posts' => 1,
					];
					$related_query = new WP_Query($related_args);
					@endphp

					@if($related_query->have_posts())
					<section data-gsap-anim="section" class="related-posts bg-light -smt pt-20 pb-26">
						<div class="c-main">
							<div class="flex justify-between">
								<h3 data-gsap-element="header" class="text-2xl font-bold">Podobne wpisy</h3>
								<a data-gsap-element="btn" class="white-btn" href="/category/baza-wiedzy/">Wszystkie podobne</a>
							</div>
							<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-10">
								@while($related_query->have_posts())
								@php($related_query->the_post())
								<article data-gsap-element="card" @php(post_class())>
									<header>
										@if(has_post_thumbnail())
										<a href="{{ get_permalink() }}">
											{!! get_the_post_thumbnail(null, 'large', ['class' => 'featured-image img-xs m-img']) !!}
										</a>
										@endif

										<h2 class="entry-title text-h5">
											<a href="{{ get_permalink() }}">
												{{ get_the_title() }}
											</a>
										</h2>

									</header>

									<a class="underline-btn m-btn" href="{{ get_permalink() }}">
										Przeczytaj
									</a>

								</article>
								@endwhile
								@php(wp_reset_postdata())
							</div>
						</div>
					</section>
					@endif


					<script>
						document.addEventListener('DOMContentLoaded', function() {
							const headings = document.querySelectorAll('h1[id], h2[id], h3[id], h4[id]'); // Select all headings with IDs
							const tocLinks = document.querySelectorAll('.toc ul li a'); // Select all links in the TOC

							function updateActiveLink() {
								headings.forEach((heading) => {
									const headingTop = heading.getBoundingClientRect().top;
									const windowHeight = window.innerHeight;

									if (headingTop < windowHeight - 300) {
										// Remove the 'active' class from all TOC links
										tocLinks.forEach((link) => {
											link.parentNode.classList.remove('active');
										});

										// Add the 'active' class to the corresponding TOC link
										const id = heading.id;
										const activeLink = document.querySelector(`.toc ul li a[href="#${id}"]`);
										if (activeLink) {
											activeLink.parentNode.classList.add('active');
										}
									}
								});
							}
							updateActiveLink();

							window.addEventListener('scroll', updateActiveLink);
						});
					</script>