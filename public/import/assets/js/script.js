var swiper = new Swiper(".slide-container", {
    slidesPerView: 3,
    spaceBetween: 30,
    slidesPerGroup: 3,
    loop: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    grabCursor: true,
    fade: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        dynamicBullets: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    breakpoints: {
        0: {
            slidesPerView: 1,
            slidesPerGroup: 1,
            loop: true,
        },
        520: {
            slidesPerView: 2,
            slidesPerGroup: 2,
            loop: true,
        },
        768: {
            slidesPerView: 3,
            slidesPerGroup: 3,
            loop: true,
        },
        1000: {
            slidesPerView: 4,
            slidesPerGroup: 4,
            loop: true,
        },
    },
});
