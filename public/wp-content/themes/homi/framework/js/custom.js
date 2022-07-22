jQuery.noConflict();
jQuery(document).ready(function($) {
    "use strict";

    var currentWidth = window.innerWidth || document.documentElement.clientWidth;

    // Loader
    if (dttheme_urls.loadingbar === "enable") {
        Pace.on("done", function() {
            $(".loader").fadeOut(500);
            $(".pace").remove();
        });
    }

    // Mega Menu
    if ($('li.has-mega-menu').length > 0 && $('.dt-no-header-builder-content').length == 0) {

        jQuery.fn.liCenter = function() {

            var w = $('#header .container').width(),
                a = $(window).width(),
                c = $('.dt-header-menu').parents('.wpb_column'),
                ol = c.offset().left;

            $('.mega-menu-page-equal li.has-mega-menu:not(.mega-menu-custom-width) > ul > li.menu-item-object-dt_mega_menus').css("width", w + "px");

            this.css("width", a + "px");
            this.css("left", ol * -1 + "px");

            return this;
        };

        $('.mega-menu-page-equal li.has-mega-menu:not(.mega-menu-custom-width) > ul').liCenter();

        $(window).resize(function() {
            $('.mega-menu-page-equal li.has-mega-menu:not(.mega-menu-custom-width) > ul').liCenter();
        });
    }

    // Mobile Menu    

    // Move Nav as Mobile Nav
    $("div.dt-header-menu").each(function() {
        var d = $(this).data('menu'),
            c = $(this).find('ul[data-menu="' + d + '"]').clone(),
            m = $('body').find('.mobile-menu[data-menu="' + d + '"]');

        c.prependTo(m);
    });

    // Opening Mobile Nav
    $('.menu-trigger').on('click', function(event) {
        $(this).next('.mobile-menu').toggleClass('nav-is-visible');
        $(this).parent('.mobile-nav-container').find('.overlay').toggleClass('is-visible');
        $('body').toggleClass('nav-is-visible');
    });

    // Closing Mobile Nav
    function closeMobNav() {
        $('body').removeClass('nav-is-visible');
        $('.overlay').removeClass('is-visible');
        $('.mobile-menu').removeClass('nav-is-visible');
        $('.menu-item-has-children a').removeClass('selected');
        $('.menu-item-has-children ul.sub-menu').addClass('is-hidden');
    }

    $('li.close-nav').on('click', function(event) {
        closeMobNav();
    });

    $('.mobile-nav-container > .overlay').on('click', function(event) {
        closeMobNav();
    });

    // Sub Menu in Mobile Menu
    $('.menu-item-has-children > a, .page_item_has_children > a').on('click', function(event) {

        if ($('body').hasClass('nav-is-visible')) {
            event.preventDefault();
            var a = $(this).clone();
            $(this).next('.sub-menu').find('.see-all').html(a);
        }

        var selected = $(this);
        if (selected.next('ul').hasClass('is-hidden')) {
            selected.addClass('selected').next('ul.sub-menu').removeClass('is-hidden');
        } else {
            selected.removeClass('selected').next('ul.sub-menu').addClass('is-hidden');
        }
    });

    // Go Back in Mobile Menu
    $('.go-back').on('click', function() {
        $(this).parent('ul:not(.menu)').addClass('is-hidden');
    });

    // Visual Nav Menu
    if ($('ul.visual-nav').length > 0) {

        $('ul.visual-nav').visualNav({
            selectedClass: 'current_page_item',
            externalLinks: 'external',
            useHash: false,
            // offsetTop : 100
        });
    }

    $("div.dt-video-wrap").fitVids();
    $('a.video-image').prettyPhoto({
        animation_speed: 'normal',
        theme: 'facebook',
        slideshow: 3000,
        autoplay_slideshow: false,
        social_tools: false,
        deeplinking: false
    });

    // Container
    if (currentWidth > 767) {
        if ($('#primary').hasClass('with-both-sidebar')) {
            if (($('#secondary-left').is(':empty') && $('#secondary-right').is(':empty'))) {
                $('#primary').css({
                    'width': '100%',
                    'margin': 0
                });
            }
        } else if ($('#primary').hasClass('with-left-sidebar')) {
            if ($('#secondary-left').is(':empty')) {
                $('#primary').css({
                    'width': '100%',
                    'margin': 0
                });
            }
        } else if ($('#primary').hasClass('with-right-sidebar')) {
            if ($('#secondary-right').is(':empty')) {
                $('#primary').css({
                    'width': '100%',
                    'margin': 0
                });
            }
        }
    }

    $('#main .sidebar-as-sticky').theiaStickySidebar({
        additionalMarginTop: 70,
        containerSelector: $('#primary').parent('.container')
    });

    if ($('.sidenav-sticky').length) {
        $('.sidenav-sticky .side-navigation').theiaStickySidebar({
            additionalMarginTop: 90,
            containerSelector: $('#primary')
        });
    }

    // <select> 
    $("select").each(function() {
        if ($(this).css('display') != 'none') {
            $(this).wrap('<div class="selection-box"></div>');
        }
    });

    $('.activity-type-tabs > ul >li:first').addClass('selected');
    $('.dir-form > .item-list-tabs > ul > li:first').addClass('selected');

    $('.downcount').each(function() {
        var el = $(this);
        el.downCount({
            date: el.attr('data-date'),
            offset: el.attr('data-offset')
        });
    });

    $('p:empty').each(function() {
        $(this).next('br').remove();
        $(this).remove();
    });

    // Map Overlay
    $('.dt-sc-contact-details-on-map a.map-switch-icon').on("click", function() {
        $(this).parents('.dt-sc-contact-details-on-map').toggleClass('hide-overlay');
        $('.dt-sc-map-overlay').toggle();
        return false;
    });

    $('.dt-sc-contact-details-on-map a.switch-icon').on("click", function() {
        $(this).parents('.dt-sc-contact-details-on-map').addClass('hide-overlay');
        $('.dt-sc-map-overlay').toggle();
        $('.back-to-contact').toggle();
        return false;
    });

    $('.dt-sc-contact-details-on-map a.back-to-contact').on("click", function() {
        $(this).parents('.dt-sc-contact-details-on-map').removeClass('hide-overlay');
        $('.dt-sc-map-overlay').toggle();
        $(this).toggle();
        return false;
    });

    //Smart Resize
    $(window).bind("resize", function() {

        //Blog Template
        if ($(".apply-isotope").length) {
            $(".apply-isotope").isotope({
                itemSelector: '.column',
                transformsEnabled: false,
                masonry: {
                    columnWidth: '.grid-sizer'
                }
            });
        }
    });

    // Window Load Start
    $(window).load(function() {

        //Blog Template
        if ($(".apply-isotope").length) {
            $(".apply-isotope").isotope({
                itemSelector: '.column',
                transformsEnabled: false,
                masonry: {
                    columnWidth: '.grid-sizer'
                }
            });
        }

        //Gallery Post Slider
        if (($("ul.entry-gallery-post-slider").length) && ($("ul.entry-gallery-post-slider li").length > 1)) {
            $("ul.entry-gallery-post-slider").bxSlider({
                auto: false,
                video: true,
                useCSS: false,
                pager: '',
                autoHover: true,
                adaptiveHeight: true
            });
        }
    });

    $(".dt-like-this").on('click', function() {

        var el = jQuery(this);

        if (el.hasClass('liked')) {
            return false;
        }

        var post = {
            action: 'homi_likes_ajax',
            post_id: el.attr('data-id')
        };

        $.post(dttheme_urls.ajaxurl, post, function(data) {
            el.find('span').html(data);
            el.addClass('liked');
        });
        return false;
    });

    $('input, textarea').placeholder();

    // Toggle store locator advacned options
    $("a.dt-sc-toggle-advanced-options").on('click', function(event) {
        event.preventDefault();
        var $this = $(this);
        $this.parents('.wpsl-search').find("div.dt-sc-advanced-options").slideToggle("slow", function() {
            $this.toggleClass('expanded');
            if ($this.hasClass('expanded')) {
                $this.html(dttheme_urls.advOptions + ' <span class="fa fa-angle-up"></span>');
            } else {
                $this.html(dttheme_urls.advOptions + ' <span class="fa fa-angle-down"></span>');
            }
        });
    });

    //Sinle post like btn
    if ($(".single-post").length) {
        $(".dt_like_btn a").on("click", function() {
            var btn = $(this);
            var post_id = btn.data("postid");
            var act = btn.data("action");

            $.ajax({
                type: "post",
                url: dttheme_urls.ajaxurl,
                data: {
                    action: 'homi_post_rating_like',
                    nonce: dttheme_urls.wpnonce,
                    post_id: post_id,
                    doaction: act
                },
                success: function(data, textStatus, XMLHttpRequest) {
                    btn.find('i').text(data);
                },
                error: function(MLHttpRequest, textStatus, errorThrown) {
                    //alert(textStatus);
                }
            });
            return false;
        });
    }

    //Scroll down animate
    $(".dt_scroll_down a").on('click', function(a) {
        a.preventDefault();

        var st = 0;
        if (dttheme_urls.stickynav === 'enable') {
            st = 90;
        }

        $("html, body").stop();
        $("html, body").animate({
            scrollTop: $('.entry-details.within-image').offset().top - st
        }, {
            duration: 1000,
            easing: "easeInOutQuart"
        });
    });


    // Go To Top
    $().UItoTop({
        easingType: 'easeOutQuart'
    });

    if ($('.dt-sc-icon-box-type9').length) {
        setTimeout(function() {
            $('.dt-sc-icon-box-type9').each(function() {
                $(this).find('.icon-wrapper').css('height', $(this).find('.icon-content').outerHeight(true));
            });
        }, 1000);
    }

    if ($('ul.dt-sc-tabs-vertical-frame').length) {
        $('ul.dt-sc-tabs-vertical-frame').each(function() {
            $(this).css('min-height', $(this).height());
        });
    }

    if ($('ul.dt-sc-tabs-vertical').length) {
        $('ul.dt-sc-tabs-vertical').each(function() {
            $(this).css('min-height', $(this).height());
        });
    }
});