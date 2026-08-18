document.addEventListener('DOMContentLoaded', function () {

    const productSlider = document.querySelector('.products-swiper');

    if (!productSlider) {
        return;
    }

    if (typeof Swiper === 'undefined') {
        console.error('Swiper is not loaded.');
        return;
    }

    new Swiper(productSlider, {

        slidesPerView: 2,
        spaceBetween: 16,

        grabCursor: true,

        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },

        navigation: {
            nextEl: '.swiper-button-next-products',
            prevEl: '.swiper-button-prev-products',
        },

        pagination: {
            el: '.swiper-pagination-products',
            clickable: true,
        },

        breakpoints: {
            640: {
                slidesPerView: 2.2,
                spaceBetween: 20,
            },

            1024: {
                slidesPerView: 4,
                spaceBetween: 24,
            }
        }

    });

});