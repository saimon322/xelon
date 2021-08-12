import { tns } from 'tiny-slider/src/tiny-slider';

const customersSliderEl = document.querySelector('.xln-customers__slider');
if (customersSliderEl) {
    const customersSlider = tns({
        container: '.xln-customers__slider',
        items: 3,
        mouseDrag: true,
        prevButton: '.xln-customers__slider--prev',
        nextButton: '.xln-customers__slider--next',
        nav: true,
        navContainer: '.xln-customers__slider-nav',
        preventScrollOnTouch: 'auto',
        responsive: {
            768: {
                items: 2,
            },
        },
    });
}

const servieSliderEl = document.querySelector('.xln-service__selectors');
if (servieSliderEl) {
    if (document.documentElement.clientWidth < 992) {
        const serviceSlider = tns({
            container: '.xln-service__selectors',
            items: 2,
            loop: false,
            mouseDrag: true,
            controls: false,
            nav: true,
            navContainer: '.xln-service__slider-nav',
            preventScrollOnTouch: 'auto',
            responsive: {
                768: {
                    items: 3,
                },
            },
        });
    }
}

const offerSliderEl = document.querySelector('.xln-offer__slider');
if (offerSliderEl) {
    let offerSlider;
    let slidesCount;

    const offerSliderInit = () => {
        if (document.documentElement.clientWidth < 992) {
            offerSlider = tns({
                container: '.xln-offer__slider',
                items: 1,
                loop: false,
                mouseDrag: true,
                controls: false,
                nav: true,
                navContainer: '.xln-offer__slider-nav',
                preventScrollOnTouch: 'auto',
            });
        } else {
            offerSlider = tns({
                container: '.xln-offer__slider',
                items: 1,
                loop: false,
                mouseDrag: true,
                controls: false,
                nav: true,
                navContainer: '.xln-offer__slider-nav',
                preventScrollOnTouch: 'auto',
                axis: 'vertical',
            });
        }
        slidesCount = offerSlider.getInfo().slideCount;
    }

    // Inner slider scroll
    const offerSliderWrapper = document.querySelector('.xln-offer__wrapper');
    let animation = false;
    function offerSliderScroll(ev) {
        let currentIndex;
        let scrollDown = ev.wheelDelta < 0;
    
        var prevent = () => {
            ev.stopPropagation();
            ev.preventDefault();
            ev.returnValue = false;
            return false;
        }
    
        if (scrollDown) {
            // Next slide event
            currentIndex = offerSlider.getInfo().index;
            if (currentIndex != slidesCount - 1) {
                if (!animation) {
                    offerSlider.goTo('next');
                    animation = true;
                    setTimeout(() => {
                        animation = false;
                    }, 500)
                }
                return prevent();
            }
        } else {
            // Prev slide event
            currentIndex = offerSlider.getInfo().index;
            if (currentIndex != 0) {
                if (!animation) {
                    offerSlider.goTo('prev');
                    animation = true;
                    setTimeout(() => {
                        animation = false;
                    }, 500)
                }
                return prevent();
            }
        }

        if (animation) {
            return prevent();
        }
    };

    offerSliderInit();
    offerSliderWrapper.addEventListener('mousewheel', offerSliderScroll);
}
