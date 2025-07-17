<footer data-gsap-anim="section" class="footer -smt">
	<div class="bg-gradient relative overflow-hidden">
		<div class="__wrapper c-main relative z-20">
			<div data-gsap-element="widget" class="__widgets footer-py grid gap-1 md:gap-6">
				@for ($i = 1; $i <= 4; $i++)
					@if (is_active_sidebar('sidebar-footer-' . $i))
					<div>@php(dynamic_sidebar('sidebar-footer-' . $i))</div>
			@endif
			@endfor
		</div>

		<div data-gsap-element="bottom" class="flex justify-between b-border-t pt-15 mb-20">
			<div class="text-white">Masz pytania?<br />
				+48 886 857 496
			</div>
			<img src="http://rce.local/wp-content/uploads/2025/07/in.svg">
		</div>
	</div>
	<img class="__bg--img absolute top-0 z-10" src="http://rce.local/wp-content/uploads/2025/07/footer-shape.svg" />
	</div>

	<div data-gsap-element="copy" class="c-main flex flex-col md:flex-row justify-between gap-6 py-10 footer-bottom">
		<p class="">Copyright ©2025 <?php echo get_bloginfo('name'); ?>. All Rights Reserved</p>
		<p class="flex gap-2">Designed &amp; Developed by
			<a target="_blank" href="https://www.ohsofresh.pl" title="OhSoFresh"><img class="oh" src="/wp-content/themes/rce/resources/images/ohsofresh.svg"></a>
		</p>
	</div>
	</div>
</footer>