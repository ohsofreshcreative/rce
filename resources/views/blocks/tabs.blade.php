@php
// --- Zmienne dla sekcji ---
$sectionClass = '';
$sectionClass .= $flip ? ' order-flip' : '';
$sectionClass .= $lightbg ? ' section-light' : '';
$sectionClass .= $greybg ? ' section-grey' : '';
$sectionClass .= $whitebg ? ' section-white' : '';
$sectionClass .= $brandbg ? ' section-brand' : '';
$sectionClass .= $nomt ? ' !mt-0' : '';
@endphp

{{-- Używamy Twoich oryginalnych nazw pól: $title i $r_tabs --}}
<section data-gsap-anim="section" class="tabs -smt {{ $sectionClass }}">
  <div class="__wrapper c-main">
    
    @if ($title)
      <div class="text-center mb-12">
        <h2 data-gsap-element="header">{{ $title }}</h2>
      </div>
    @endif

    @if (!empty($r_tabs))
      <div class="tabs-container">
        
   
        <div class="tab-navigation w-full flex flex-wrap justify-between gap-4 mb-10">
          @foreach ($r_tabs as $index => $item)
            <button data-gsap-element="tab" 
              class="tab-button flex-1 bg-white text-center txt-xl px-6 py-10 transition-colors duration-300 {{ $loop->first ? 'is-active' : '' }}"
              data-tab="{{ $index }}">
             
              @if ($item['icon'])
                <img class="text-center m-auto mb-4" src="{{ $item['icon']['url'] }}" alt="{{ $item['icon']['alt'] ?? '' }}" />
              @endif
          
              <span class="">{{ $item['title'] }}</span>
            </button>
          @endforeach
        </div>

        <div data-gsap-element="content" class="tab-content relative">
          @foreach ($r_tabs as $index => $item)
            <div 
              class="tab-panel absolute w-full transition-opacity duration-500 {{ $loop->first ? 'is-visible' : 'opacity-0 pointer-events-none' }}"
              data-panel="{{ $index }}">
              
              <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-20 items-center bg-white b-border-light p-16">
                
                <div class="__content">
                  <h3 class="m-title">{{ $item['title'] }}</h3>
                  @if ($item['txt'])
                    <p class="">{{ $item['txt'] }}</p>
                  @endif
                  @if ($item['btn'] && $item['btn']['url'])
                    <a href="{{ $item['btn']['url'] }}" target="{{ $item['btn']['target'] ?: '_self' }}" class="main-btn m-btn">
                      {{ $item['btn']['title'] }}
                    </a>
                  @endif
                </div>

                @if ($item['image'])
                  <div class="__img">
                    <img class="img-xl" src="{{ $item['image']['url'] }}" alt="{{ $item['image']['alt'] ?? '' }}" />
                  </div>
                @endif
              </div>
            </div>
          @endforeach
        </div>
      </div>
    @endif
  </div>
</section>
