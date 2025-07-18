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

<section data-gsap-anim="section" class="numbers c-main relative z-9 !mt-20 {{ $sectionClass }}"">

	<div class="__wrapper px-0">
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 items-center gap-8">

                @foreach ($g_numbers['r_numbers'] as $item)
                <div data-gsap-element="card" class="__card relative bg-white b-border b-corners-sm px-8 py-4">
                    <div class="big number-container" data-number="{{ $item['card_title'] }}">
                    </div>
                    <p class="text-lg">{{ $item['card_txt'] }}</p>
                </div>
                @endforeach

		</div>
	</div>

</section>