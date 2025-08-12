@php
$sectionClass = '';
$sectionClass .= !empty($nomt) ? ' !mt-0' : '';
$sectionClass .= !empty($lightbg) ? ' section-light' : '';
$sectionClass .= !empty($graybg) ? ' section-gray' : '';
$sectionClass .= !empty($whitebg) ? ' section-white' : '';
$sectionClass .= !empty($brandbg) ? ' section-brand' : '';
$cols = (int)($columns ?? 3);
$cols = max(1, min($cols, 6)); // 1–6 kolumn na desktopie
@endphp

<!-- offer-cards-block -->
<section data-gsap-anim="section" @if(!empty($id)) id="{{ $id }}" @endif class="offer-cards -smt {{ $block->classes }} {{ $sectionClass }} {{ $class }}">
  <div class="{{ $block->classes }}">
    <div class="__wrapper c-main">
      @if(!empty($title))
        <h2 data-gsap-element="header" class="m-title __before">{{ $title }}</h2>
      @endif

      @if(!empty($content))
        <div data-gsap-element="txt" class="mb-14">{!! $content !!}</div>
      @endif

      @if (!empty($offer_cards))
        @if ($display_type === 'grid')
          <div class="__grid mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-{{ $cols }} gap-6">
            @foreach ($offer_cards as $card)
              @php
                $ctaUrl   = $card['cta']['url']    ?? '#';
                $ctaTitle = $card['cta']['title']  ?? null;
                $ctaTarget= $card['cta']['target'] ?? null;
              @endphp

              <div data-gsap-element="card" class="__cards h-full">
                <a href="{{ $ctaUrl }}" @if($ctaTarget) target="{{ $ctaTarget }}" @endif>
                  <div class="__card bg-white b-border-light px-10 py-20 h-full">
                    @if (!empty($card['offer_image']['ID']))
                      <div class="__img mb-4">
                        {!! wp_get_attachment_image($card['offer_image']['ID'], 'small', false, ['class' => 'img-fluid']) !!}
                      </div>
                    @endif

                    <div class="__content">
                      @if (!empty($card['offer_title']))
                        <h5 class="block m-title">{{ $card['offer_title'] }}</h5>
                      @endif

                      @if (!empty($card['offer_description']))
                        <div class="__txt">{{ $card['offer_description'] }}</div>
                      @endif

                      @if ($ctaTitle)
                        <p class="stroke-btn m-btn">{{ $ctaTitle }}</p>
                      @endif
                    </div>
                  </div>
                </a>
              </div>
            @endforeach

            {{-- karta "Nadal szukasz?" na pełną szerokość siatki --}}
            <div data-gsap-element="card" class="__card col-span-full grid items-center bg-white b-border-light p-10"
                 style="background-image: linear-gradient(180deg, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.95) 100%), url('/wp-content/uploads/2025/07/wspolpraca-scaled.jpg'); background-size: cover; background-position: center;">
              <div class="__content">
                <h5 class="block m-title text-white">Nadal szukasz?</h5>
                <div class="__txt text-white">Widocznie masz niestandardowy problem do rozwiązania. Lepiej nie można było trafić bo uwielbiamy wyzwania. Idziemy dalej tam, gdzie wszyscy odpuszczają. Skontaktuj się z&nbsp;nami abyśmy mogli poznać twoje potrzeby i zaproponowali rozwiązanie dla Ciebie.</div>
                <a class="main-btn m-btn" href="/kontakt">Skontaktuj się z nami</a>
              </div>
            </div>
          </div>
        @else
          {{-- Wersja sliderowa --}}
          <div class="swiper offer-swiper !overflow-visible">
            <div data-gsap-element="arrows" class="__arrows absolute flex gap-4 z-10">
              <div class="swiper-button-prev">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24" fill="none">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 0L11.5 12.0235L0.5 24L6.26389 12.0706L0.5 0Z" fill="white" />
                </svg>
              </div>
              <div class="swiper-button-next">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 12 24" fill="none">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 0L11.5 12.0235L0.5 24L6.26389 12.0706L0.5 0Z" fill="white" />
                </svg>
              </div>
            </div>

            <div class="swiper-wrapper items-stretch">
              @foreach ($offer_cards as $card)
                @php
                  $ctaUrl   = $card['cta']['url']    ?? '#';
                  $ctaTitle = $card['cta']['title']  ?? null;
                  $ctaTarget= $card['cta']['target'] ?? null;
                @endphp

                <div class="swiper-slide !h-auto">
                  <a href="{{ $ctaUrl }}" @if($ctaTarget) target="{{ $ctaTarget }}" @endif>
                    <div data-gsap-element="card" class="__card bg-white b-border-light">
                      <div class="__content p-10">
                        @if (!empty($card['offer_title']))
                          <h5 class="block m-title">{{ $card['offer_title'] }}</h5>
                        @endif
                        @if (!empty($card['offer_description']))
                          <div class="__txt">{{ $card['offer_description'] }}</div>
                        @endif
                        @if ($ctaTitle)
                          <div class="__anchor m-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" viewBox="0 0 22 20" fill="none">
                              <path d="M11.5645 0L22 10L11.5645 20L8.83878 17.388L14.6211 11.847H0V8.15301H14.6211L8.83878 2.61205L11.5645 0Z" fill="#E30613" />
                            </svg>
                          </div>
                        @endif
                      </div>

                      @if (!empty($card['offer_image']['ID']))
                        <div class="__img">
                          {!! wp_get_attachment_image($card['offer_image']['ID'], 'medium', false, ['class' => 'img-fluid']) !!}
                        </div>
                      @endif
                    </div>
                  </a>
                </div>
              @endforeach
            </div>
          </div>
        @endif
      @else
        <div class="no-data">Brak danych oferty. Dodaj je w ustawieniach.</div>
      @endif
    </div>
  </div>
</section>
