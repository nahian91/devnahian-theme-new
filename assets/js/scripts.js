(function($) {
    'use strict';

    // Preloader
    $(window).on('load', function() {
        $('.preloader').fadeOut();
        $('.preloader').delay(350).fadeOut('slow');
    });

    $(document).ready(function() {
        // Counter
        $('.counter-item .cnumb').counterUp({
            delay: 10,
            time: 1000
        });

        // Mobile Menu
        if ($.fn.simpleMobileMenu) {
            $('.mobile_menu').simpleMobileMenu({
                menuStyle: 'slide'
            });
        }

        // Search Box
        $('.search-btn').on('click', function() {
            $('.search_box').addClass('active');
            $(this).hide();
            $('.search-data, .close-btn').fadeIn(500);
            $('.search-data .line').addClass('active');

            setTimeout(function() {
                $('input').focus();
                $('.search-data label, .search-data span').fadeIn(500);
            }, 800);
        });

        $('.close-btn').on('click', function() {
            $('.search_box').removeClass('active');
            $('.search-btn').fadeIn(800);
            $('.search-data, .close-btn').fadeOut(500);
            $('.search-data .line').removeClass('active');
            $('input').val('');
            $('.search-data label, .search-data span').fadeOut(500);
        });

        // Mini Cart
        $('.mcart_open').on('click', function() {
            var menu = $(this).data('menu');
            $(menu).toggleClass('min_cart_active');
        });

        $('.min_cart_wrapper').on('click', function(e) {
            if ($(e.target).hasClass('min_cart_wrapper')) {
                $('.min_cart_active').removeClass('min_cart_active');
            }
        });

        $('.cart_close').on('click', function() {
            $('.min_cart_active').removeClass('min_cart_active');
        });

        // Image Popup
        if ($.fn.magnificPopup) {
            $('.popbtn').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        }

        // Courses Carousel
        if ($.fn.owlCarousel) {
            $('.courses-slider').owlCarousel({
                items: 3,
                autoplay: true,
                center: true,
                loop: true,
                nav: true,
                dots: false,
                margin: 30,
                navText: ["<i class='bx bx-chevrons-left'></i>", "<i class='bx bx-chevrons-right'></i>"],
                responsive: {
                    0: { items: 1 },
                    575: { items: 1 },
                    768: { items: 2 },
                    1000: { items: 3 },
                    1200: { items: 3 }
                }
            });

            // Partner Logo Carousel
            $('.partners').owlCarousel({
                margin: 60,
                autoplay: true,
                items: 6,
                nav: false,
                dots: false,
                loop: true,
                responsive: {
                    0: { items: 2 },
                    575: { items: 3 },
                    768: { items: 4 },
                    1000: { items: 5 },
                    1200: { items: 6 }
                }
            });

            // Testimonials
            $('.review-slider').owlCarousel({
                items: 3,
                autoplay: true,
                center: true,
                loop: true,
                nav: true,
                dots: true,
                margin: 35,
                navText: ["<i class='bx bx-chevrons-left'></i>", "<i class='bx bx-chevrons-right'></i>"],
                responsive: {
                    0: { items: 1 },
                    575: { items: 1 },
                    768: { items: 2 },
                    1000: { items: 3 },
                    1200: { items: 3 }
                }
            });
        }

        // Parallax Mousemove
        document.addEventListener('mousemove', function(event) {
            document.querySelectorAll('.eitem').forEach(function(shift) {
                var position = shift.getAttribute('value');
                var x = (window.innerWidth - event.pageX * position) / 90;
                var y = (window.innerHeight - event.pageY * position) / 90;
                shift.style.transform = 'translateX(' + x + 'px) translateY(' + y + 'px)';
            });
        });

        // Nice Select
        if ($.fn.niceSelect) {
            $('select').niceSelect();
        }

        // WOW Init
        if (typeof WOW === 'function') {
            new WOW().init();
        }
    });

})(jQuery);
