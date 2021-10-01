import Swiper from 'swiper/swiper-bundle.min.js';

const aboutSliderEl = document.querySelector('.xln-about__slider');
if (aboutSliderEl) {
    const aboutSlider = new Swiper('.xln-about__slider', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 20,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-arrow--next',
            prevEl: '.swiper-arrow--prev',
        },
        breakpoints: {
            576: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            992: {
                slidesPerView: 4,
                spaceBetween: 40,
            },
        },
    });
}