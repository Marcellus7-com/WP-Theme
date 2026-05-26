(function ($) {
    "use strict";

    /*----- ELEMENTOR LOAD FUNCTION CALL ---*/

    $(window).on("elementor/frontend/init", function () {

        var lvgshopDataBackground = function () {
            $('[data-background]').each(function () {
                $(this).css('background-image', 'url(' + $(this).attr('data-background') + ')');
            });
        };


        // hero slider
        var lvgshopHeroSlider = function () {
            // el hero section slider
            $(".el-hero-section-slider").slick({
                slidesToShow: 1,
                autoplay: false,
                speed: 2000,
                arrows: false,
                pauseOnHover: false,
                fade: true,
                dots: true,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            dots: false,
                        },
                    }
                ],
            });
        }

        var lvgshopCatSlidethree = function () {
            // home 3 category box
            $(".el-home-3-fea-slider").slick({
                slidesToShow: 3,
                autoplay: false,
                arrows: true,
                centerPadding: '50px',
                prevArrow: '<button class="prev-btn slider-btn"><i class="fa-solid fa-arrow-left" ></i ></button>',
                nextArrow: '<button class="next-btn slider-btn"><i class="fa-solid fa-arrow-right" ></i ></button>',
                responsive: [
                    {
                        breakpoint: 1400,
                        settings: {
                            slidesToShow: 2,
                        },
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                        },
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                        },
                    }
                ],
            });

        }

        // Brand Slider
        var lvgshopBrandSlider = function () {
            $(".hm2-brand-slider").slick({
                slidesToShow: 5,
                autoplay: true,
                arrows: false,
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 400,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });

            $(".hm3-brand-slider").slick({
                slidesToShow: 6,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 0,
                speed: 5000,
                cssEase: 'linear',
                responsive: [
                    {
                        breakpoint: 1400,
                        setttings: {
                            slidesToShow: 5,
                        }
                    },
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 500,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });
        }

        //gallery slider
        var lvgshopGallerySlider = function () {
            $(".hm2-gallery-slide-1").slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 0,
                speed: 6000,
                pauseOnHover: true,
                cssEase: 'linear',
                loop: true,
                responsive: [
                    {
                        breakpoint: 1400,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 500,
                        settings: {
                            slidesToShow: 1,
                        }
                    },
                ]
            });

            $(".hm2-gallery-slide-2").slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 0,
                speed: 6000,
                pauseOnHover: true,
                cssEase: 'linear',
                loop: true,
                rtl: true,
                responsive: [
                    {
                        breakpoint: 1400,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 500,
                        settings: {
                            slidesToShow: 1,
                        }
                    },
                ]
            });
        }

        var lvgshopBlogSlider = function() {
            $(".hm3-blog-slider").slick({
                slidesToShow: 3,
                autoplay: true,
                speed: 600,
                prevArrow: '<button class="prev-arrow"><i class="me-3 fas fa-arrow-left"></i>Prev</button>',
                nextArrow: '<button class="next-arrow">Next<i class="ms-3 fas fa-arrow-right"></i></button>',
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 670,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });
        }

        var lvgshopProductSlider = function () {
            $(".vr5-collection-slider").slick({
                slidesToShow: 4,
                arrows: false,
                dots: true,
                responsive: [
                    {
                        breakpoint: 1400,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                        }
                    },
                ]
            });

            $(".cmd-slider").slick({
                slidesToShow: 1,
                arrows: false,
                dots: true,
            });

            //arival slider
            $(".arrival-slider").slick({
                slidesToShow: 4,
                autoplay: true,
                loop: true,
                prevArrow: '<button class="prev-arrow"><i class="fas fa-arrow-left"></i>Prev</button>',
                nextArrow: '<button class="next-arrow">Next<i class="fas fa-arrow-right"></i></button>',
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 575,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });
        }

        // Lvgshop Marquee
        var lvgshopMarque = function () {
            $('.lvgshop-marquee-wrapper').marquee({
                speed: 50,
                gap: 0,
                delayBeforeStart: 0,
                direction: 'left',
                duplicated: true,
                pauseOnHover: false,
                startVisible:true,
            });
        }

        var lvgshopProductslide = function () {
            $(".vr5-filter-slider").slick({
                slidesToShow: 3,
                arrows: false,
                dots: true,
                responsive: [
                    {
                        breakpoint: 1100,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });
        }
        var lvgshopProductfeedback = function () {
            //sidebar-customer-feedback-slider
            $(".sidebar-customer-feedback-slider").slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                speed: 1000,
                arrows: false,
                dots: true,
            });
        }



        //Team Carousel
        elementorFrontend.hooks.addAction("frontend/element_ready/global", function ($scope, $) { lvgshopDataBackground() });
        elementorFrontend.hooks.addAction("frontend/element_ready/lvgshop-hero-section.default", function ($scope, $) { lvgshopHeroSlider() });
        elementorFrontend.hooks.addAction("frontend/element_ready/lvgshop_marquee.default", function ($scope, $) { lvgshopMarque() });
        elementorFrontend.hooks.addAction("frontend/element_ready/lvgshop_brand_logo.default", function ($scope, $) { lvgshopBrandSlider() });
        elementorFrontend.hooks.addAction("frontend/element_ready/lvgshop_gallery.default", function ($scope, $) { lvgshopGallerySlider() });
        elementorFrontend.hooks.addAction("frontend/element_ready/lvgshop_blog.default", function ($scope, $) { lvgshopBlogSlider() });
        elementorFrontend.hooks.addAction("frontend/element_ready/lvgshop_product_slider.default", function ($scope, $) { lvgshopProductSlider() });
        elementorFrontend.hooks.addAction("frontend/element_ready/lvgshop_collection_grid.default", function ($scope, $) { lvgshopCollectionGrid() });
        elementorFrontend.hooks.addAction("frontend/element_ready/Lvgshop_product_tabs.default", function ($scope, $) { lvgshopProductslide() });
        elementorFrontend.hooks.addAction("frontend/element_ready/lvgshop-category-section.default", function ($scope, $) { lvgshopCatSlidethree() });
        elementorFrontend.hooks.addAction("frontend/element_ready/lvgshop-feedback-section.default", function ($scope, $) { lvgshopProductfeedback() });
    });


})(jQuery);