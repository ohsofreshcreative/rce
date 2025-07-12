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
@endphp

<!--- numbers --->

<section data-gsap-anim="section" class="numbers c-main relative z-9 {{ $sectionClass }}"">

	<div class="__wrapper px-0">
		<div class="grid grid-cols-1 lg:grid-cols-4 items-center gap-8">

                @foreach ($g_numbers['r_numbers'] as $item)
                <div class="__card relative">
                    <div class="big number-container" data-number="{{ $item['card_title'] }}">
                    </div>
                    <p class="text-lg">{{ $item['card_txt'] }}</p>
                </div>
                @endforeach

		</div>
	</div>

</section>