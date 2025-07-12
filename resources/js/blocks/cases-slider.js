import Swiper from 'swiper';
import 'swiper/css';
import { Navigation, Controller } from 'swiper/modules';

Swiper.use([Navigation, Controller]);

// [FIX] Zmieniamy nazwę funkcji, aby lepiej opisywała jej zadanie
function updateNavigationUI(swiperInstance, progressBarEl, counterEl, totalSlides) {
  if (!totalSlides || totalSlides <= 1) {
    if (progressBarEl) progressBarEl.style.width = '100%';
    if (counterEl) counterEl.textContent = `1/${totalSlides || 1}`;
    return;
  }

  const currentSlideIndex = swiperInstance.realIndex;
  
  // Aktualizacja paska postępu
  if (progressBarEl) {
    const percentage = ((currentSlideIndex + 1) / totalSlides) * 100;
    progressBarEl.style.width = percentage + '%';
  }

  // Aktualizacja licznika
  if (counterEl) {
    counterEl.textContent = `${currentSlideIndex + 1}/${totalSlides}`;
  }
}

document.addEventListener('DOMContentLoaded', () => {
  const sliderWrappers = document.querySelectorAll('.cases-slider-wrapper');

  sliderWrappers.forEach((wrapper) => {
    const textSwiperContainer = wrapper.querySelector('.swiper-text');
    const imageSwiperContainer = wrapper.querySelector('.swiper-images');
    
    const progressBar = wrapper.querySelector('.progress-bar');
    const nextButton = wrapper.querySelector('.swiper-button-next');
    const prevButton = wrapper.querySelector('.swiper-button-prev');
    // [FIX] Znajdujemy nowy element licznika
    const slideCounter = wrapper.querySelector('.slide-counter');

    const totalSlides = parseInt(wrapper.dataset.totalSlides, 10);

    if (!textSwiperContainer || !imageSwiperContainer || isNaN(totalSlides)) {
      return;
    }
    
    const isLoopEnabled = totalSlides > 1;

    const swiperImages = new Swiper(imageSwiperContainer, {
      loop: isLoopEnabled,
      slidesPerView: 1,
      spaceBetween: 30,
      allowTouchMove: false,
    });

    const swiperText = new Swiper(textSwiperContainer, {
      loop: isLoopEnabled,
      slidesPerView: 1,
      spaceBetween: 30,
      
      navigation: {
        nextEl: nextButton,
        prevEl: prevButton,
      },

      controller: {
        control: swiperImages,
      },
      
      on: {
        init: function () {
          // [FIX] Przekazujemy licznik do funkcji aktualizującej
          updateNavigationUI(this, progressBar, slideCounter, totalSlides);
        },
        slideChange: function () {
          // [FIX] Przekazujemy licznik do funkcji aktualizującej
          updateNavigationUI(this, progressBar, slideCounter, totalSlides);
        },
      },
    });
  });
});