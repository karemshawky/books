$(window).load(function () {
    "use strict";

    /* Loading Script */
    $('#loader').fadeOut("slow");

});

$(document).ready(function () {
    "use strict";

    //SLIDER REVOLUTION
    jQuery('.tp-banner').show().revolution({
        dottedOverlay: "none",
        delay: 6000,
        startwidth: 1170,
        startheight: 700,
        hideThumbs: 200,
        thumbWidth: 100,
        thumbHeight: 50,
        thumbAmount: 5,
        navigationType: "bullet",
        navigationArrows: "solo",
        navigationStyle: "square",
        touchenabled: "on",
        onHoverStop: "off",
        swipe_velocity: 0.7,
        swipe_min_touches: 1,
        swipe_max_touches: 1,
        drag_block_vertical: false,
        parallax: "mouse",
        parallaxBgFreeze: "on",
        parallaxLevels: [7, 4, 3, 2, 5, 4, 3, 2, 1, 0],
        keyboardNavigation: "off",
        navigationHAlign: "center",
        navigationVAlign: "bottom",
        navigationHOffset: 0,
        navigationVOffset: 20,
        soloArrowLeftHalign: "left",
        soloArrowLeftValign: "center",
        soloArrowLeftHOffset: 20,
        soloArrowLeftVOffset: 0,
        soloArrowRightHalign: "right",
        soloArrowRightValign: "center",
        soloArrowRightHOffset: 20,
        soloArrowRightVOffset: 0,
        shadow: 0,
        fullWidth: "on",
        fullScreen: "off",
        spinner: "spinner4",
        stopLoop: "off",
        stopAfterLoops: -1,
        stopAtSlide: -1,
        shuffle: "off",
        autoHeight: "off",
        forceFullWidth: "off",
        hideThumbsOnMobile: "off",
        hideNavDelayOnMobile: 1500,
        hideBulletsOnMobile: "off",
        hideArrowsOnMobile: "off",
        hideThumbsUnderResolution: 0,
        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLilmit: 0,
        startWithSlide: 0,
        videoJsPath: "rs-plugin/videojs/",
        fullScreenOffsetContainer: ""
    });

    jQuery('.tp-banner2').show().revolution({
        dottedOverlay: "none",
        delay: 6000,
        startwidth: 1170,
        startheight: 700,
        hideThumbs: 200,
        thumbWidth: 100,
        thumbHeight: 50,
        thumbAmount: 5,
        navigationType: "bullet",
        navigationArrows: "solo",
        navigationStyle: "square",
        touchenabled: "on",
        onHoverStop: "off",
        swipe_velocity: 0.7,
        swipe_min_touches: 1,
        swipe_max_touches: 1,
        drag_block_vertical: false,
        parallax: "mouse",
        parallaxBgFreeze: "on",
        parallaxLevels: [7, 4, 3, 2, 5, 4, 3, 2, 1, 0],
        keyboardNavigation: "off",
        navigationHAlign: "center",
        navigationVAlign: "bottom",
        navigationHOffset: 0,
        navigationVOffset: 20,
        soloArrowLeftHalign: "left",
        soloArrowLeftValign: "center",
        soloArrowLeftHOffset: 20,
        soloArrowLeftVOffset: 0,
        soloArrowRightHalign: "right",
        soloArrowRightValign: "center",
        soloArrowRightHOffset: 20,
        soloArrowRightVOffset: 0,
        shadow: 0,
        fullWidth: "off",
        fullScreen: "on",
        spinner: "spinner4",
        stopLoop: "off",
        stopAfterLoops: -1,
        stopAtSlide: -1,
        shuffle: "off",
        autoHeight: "off",
        forceFullWidth: "off",
        hideThumbsOnMobile: "off",
        hideNavDelayOnMobile: 1500,
        hideBulletsOnMobile: "off",
        hideArrowsOnMobile: "off",
        hideThumbsUnderResolution: 0,
        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLilmit: 0,
        startWithSlide: 0,
        fullScreenOffsetContainer: ".header"
    });

    // SUBSCRIBE NEWSLETTER

//    $(".subscribe-me").subscribeBetter({
//        trigger: "onload",
//        delay: 300
//    });

    // PRODUCTS CAROUSEL
    $('.product-carousel').slick({
        dots: false,
        rtl: true,
        infinite: true,
        speed: 300,
        slidesToShow: 2,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
    });

    // PRODUCTS CAROUSEL
    $('.product-carousel2').slick({
        dots: false,
        rtl: true,
        infinite: true,
        speed: 300,
        slidesToShow: 2,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
    });

    // PRODUCTS CAROUSEL
    $('.product-carousel3').slick({
        dots: false,
        rtl: true,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
    });

    // QUOTE CAROUSEL
    $('.quote-carousel').slick({
        dots: true,
        rtl: true,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 3000
    });

    // BLOG CAROUSEL
    $('.blog-slider').slick({
        dots: true,
        rtl: true,
        arrows: false,
        autoplay: false,
    });


    // CLIENTS CAROUSEL
    $('.clients-carousel').slick({
        dots: false,
        rtl: true,
        infinite: true,
        speed: 600,
        autoplay: true,
        autoplaySpeed: 3000,
        slidesToShow: 6,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }]
    });

    // PRODUCT HOME CAROUSEL
    $('.top-product-carousel').slick({
        dots: false,
        rtl: true,
        arrows: true,
        infinite: true,
        speed: 600,
        autoplay: true,
        autoplaySpeed: 3000,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
    });

    // CLIENT CAROUSEL 2
    $('.clients-carousel2').slick({
        dots: true,
        rtl: true,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 3000
    });

    // HOME2 HEADER SLIDER
    $('.home-carousel').slick({
        dots: true,
        rtl: true,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 3000
    });

    //TWITTERFEED
    $('#twitterfeed').tweecool({
        //change "envato" to your username
        username: 'wptoblogger',
        profile_image: false,
        limit: 2
    });

    // ACCORDION
    $('#accordion').find('.accordion-toggle').on("click", function () {
        //Expand or collapse this panel
        $(this).next().slideToggle('fast');

        //Hide the other panels
        $(".accordion-content").not($(this).next()).slideUp('fast');

    });

    // CHECKOUT MESSAGE

    $('#create-act').on("click", function () {
        $('.create-account').toggle("slow");
    });
    $('#diff-address').on("click", function () {
        $('.shipping-address').toggle("slow");
    });

    $('#direct-transfer').on("click", function () {
        $('#direct-transfer-msg').show("slow");
        $('#cheque-transfer-msg').hide();
        $('#paypal-transfer-msg').hide();
    });

    $('#cheque-transfer').on("click", function () {
        $('#cheque-transfer-msg').show("slow");
        $('#direct-transfer-msg').hide();
        $('#paypal-transfer-msg').hide();
    });

    $('#paypal-transfer').on("click", function () {
        $('#paypal-transfer-msg').show("slow");
        $('#cheque-transfer-msg').hide();
        $('#direct-transfer-msg').hide();
    });

    // CUSTOMS SELECT
    $("select").selectBoxIt();

    // STICKY HEADER
    $("header").sticky({topSpacing: 0});


    // BACKTOTOP
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $("#backtotop").addClass("active");
        } else {
            $("#backtotop").removeClass("active");
        }
    });

    $('#backtotop').on("click", function () {
        $('body,html').animate({
            scrollTop: 0
        }, 2000);
        return false;
    });

    // SETTINGS PANEL

    $('.btn-settings').on('click', function () {
        $(this).parent().toggleClass('active');
    });

    $('.switch-handle').on('click', function () {
        $(this).toggleClass('active');
        $('.body').toggleClass('boxed');

    });

    $('.color-list div').on('click', function () {
        if ($(this).hasClass('active'))
            return false;

        $('link.color-scheme-link').remove();

        $(this).addClass('active').siblings().removeClass('active');
        var src = $(this).attr('data-src'),
                colorScheme = $('<link class="color-scheme-link" rel="stylesheet" />');

        colorScheme
                .attr('href', src)
                .appendTo('head');
    });

    $('.reset').on('click', function () {
        $(".bg-list div").removeClass('active');
        $(".switch-handle").removeClass('active');
        $(".color-list div").removeClass('active');
        $(".body").removeClass('boxed');

        if ($(this).hasClass('active'))
            return false;

        $('link.color-scheme-link').remove();

        var src = $(this).attr('data-src'),
                colorScheme = $('<link class="color-scheme-link" rel="stylesheet" />');

        colorScheme
                .attr('href', src)
                .appendTo('head');

    });

    $('.reset span').on('click', function () {
        $("body").removeClass("bg-shattered bg-vichy bg-random-grey-variations bg-irongrip bg-gplaypattern bg-diamond_upholstery bg-denim bg-crissXcross bg-climpek");
        $("body").addClass("bg-wood_pattern");
    });

    $('.bg-wood_pattern').on('click', function () {
        $("body").removeClass("bg-shattered bg-vichy bg-random-grey-variations bg-irongrip bg-gplaypattern bg-diamond_upholstery bg-denim bg-crissXcross bg-climpek");
        $("body").addClass("bg-wood_pattern");
    });

    $('.bg-shattered').on('click', function () {
        $("body").removeClass("bg-wood_pattern bg-vichy bg-random-grey-variations bg-irongrip bg-gplaypattern bg-diamond_upholstery bg-denim bg-crissXcross bg-climpek");
        $("body").addClass("bg-shattered");
    });

    $('.bg-vichy').on('click', function () {
        $("body").removeClass("bg-wood_pattern bg-shattered bg-random-grey-variations bg-irongrip bg-gplaypattern bg-diamond_upholstery bg-denim bg-crissXcross bg-climpek");
        $("body").addClass("bg-vichy");
    });

    $('.bg-random-grey-variations').on('click', function () {
        $("body").removeClass("bg-wood_pattern bg-shattered bg-vichy bg-irongrip bg-gplaypattern bg-diamond_upholstery bg-denim bg-crissXcross bg-climpek");
        $("body").addClass("bg-random-grey-variations");
    });

    $('.bg-irongrip').on('click', function () {
        $("body").removeClass("bg-wood_pattern bg-shattered bg-vichy bg-random-grey-variations bg-gplaypattern bg-diamond_upholstery bg-denim bg-crissXcross bg-climpek");
        $("body").addClass("bg-irongrip");
    });

    $('.bg-gplaypattern').on('click', function () {
        $("body").removeClass("bg-wood_pattern bg-shattered bg-random-grey-variations bg-irongrip bg-vichy bg-diamond_upholstery bg-denim bg-crissXcross bg-climpek");
        $("body").addClass("bg-gplaypattern");
    });

    $('.bg-diamond_upholstery').on('click', function () {
        $("body").removeClass("bg-wood_pattern bg-shattered bg-random-grey-variations bg-irongrip bg-gplaypattern bg-vichy bg-denim bg-crissXcross bg-climpek");
        $("body").addClass("bg-diamond_upholstery");
    });

    $('.bg-denim').on('click', function () {
        $("body").removeClass("bg-wood_pattern bg-shattered bg-random-grey-variations bg-irongrip bg-gplaypattern bg-diamond_upholstery bg-vichy bg-crissXcross bg-climpek");
        $("body").addClass("bg-denim");
    });

    $('.bg-crissXcross').on('click', function () {
        $("body").removeClass("bg-wood_pattern bg-shattered bg-random-grey-variations bg-irongrip bg-gplaypattern bg-diamond_upholstery bg-denim bg-vichy bg-climpek");
        $("body").addClass("bg-crissXcross");
    });

    $('.bg-climpek').on('click', function () {
        $("body").removeClass("bg-wood_pattern bg-shattered bg-vichy bg-random-grey-variations bg-irongrip bg-gplaypattern bg-diamond_upholstery bg-denim bg-crissXcross ");
        $("body").addClass("bg-climpek");
    });


});
//Slider Product
$(document).ready(function () {

    //Resize carousels in modal
    $(document).on('shown.bs.modal', function() {
        $(this).find('.sync1, .sync2').each(function() {
            $(this).data('owlCarousel') ? $(this).data('owlCarousel').onResize() : null;
        });
    });

    var sync1 = $(".sync1");
    var sync2 = $(".sync2");
    var navSpeedThumbs = 500;

    sync2.owlCarousel({
        rtl: true,
        items: 4,
        navSpeed: navSpeedThumbs,
        responsive: {
            768: { items: 4 },
            480: { items: 3 },
            0: { items: 2 }
        },
        responsiveRefreshRate: 200
    });

    sync1.owlCarousel({
        rtl: true,
        items: 1,
        navSpeed: 1000,
        nav: true,
        onChanged: syncPosition,
        responsiveRefreshRate: 200,
        navText: [
            "<i class='fa fa-chevron-left'></i>",
            "<i class='fa fa-chevron-right'></i>"
        ]
    });

    function syncPosition(el) {
        var current = this._current;
        $(".sync2")
                .find(".owl-item")
                .removeClass("synced")
                .eq(current)
                .addClass("synced");
        center(current);
    }

    $(".sync2").on("click", ".owl-item", function (e) {
        e.preventDefault();
        var number = $(this).index();
        sync1.trigger("to.owl.carousel", [number, 1000]);
    });

    function center(num) {

        var sync2visible = sync2.find('.owl-item.active').map(function () { return $(this).index(); });

        if ($.inArray(num, sync2visible) === -1) {
            if (num > sync2visible[sync2visible.length - 1]) {
                sync2.trigger("to.owl.carousel", [num - sync2visible.length + 2, navSpeedThumbs, true])
            } else {
                sync2.trigger("to.owl.carousel", Math.max(0, num - 1));
            }
        } else if (num === sync2visible[sync2visible.length - 1]) {
            sync2.trigger("to.owl.carousel", [sync2visible[1], navSpeedThumbs, true])
        } else if (num === sync2visible[0]) {
            sync2.trigger("to.owl.carousel", [Math.max(0, num - 1), navSpeedThumbs, true])
        }
    }

    // prettyPhoto
    // ---------------------------------------------------------------------------------------
    if ($.fn.prettyPhoto)
        $("a[rel^='prettyPhoto']").prettyPhoto({
            theme: 'facebook',
            slideshow: 5000,
            autoplay_slideshow: true
        });
});


$(function () {
    $('#slider-container').slider({
        range: true,
        min: 69,
        max: 199,
        values: [69, 199],
        create: function () {
            $("#amount").val("$69 - $199");
        },
        slide: function (event, ui) {
            $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            var mi = ui.values[0];
            var mx = ui.values[1];
        }
    });
});


// SIDEMENU
$(".nav-trigger").on("click", function () {
    $(".side-menu").toggleClass("sm-show");
    $("body").toggleClass("sm-hide-body");
});

// FEATURED PRODUCTS
$(window).load(function () {
    "use strict";
    // Isotope
    var $container = $('#isotope');
    $container.isotope({
        itemSelector: '.isotope-item'
    });
    var $optionSets = $('.filter'),
            $optionLinks = $optionSets.find('a');
    $optionLinks.click(function () {
        var $this = $(this);
        if ($this.hasClass('selected')) {
            return false;
        }
        var $optionSet = $this.parents('.filter');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
        var options = {},
                key = $optionSet.attr('data-option-key'),
                value = $this.attr('data-option-value');
        value = value === 'false' ? false : value;
        options[key] = value;
        if (key === 'layoutMode' && typeof changeLayoutMode === 'function') {
            changeLayoutMode($this, options);
        } else {
            $container.isotope(options);
        }
        return false;
    });
});