jQuery.noConflict();
jQuery(document).ready(function($) {

    if ($(".dt-portfolio-single-slider").find("li").length > 1) {
        $(".dt-portfolio-single-slider").bxSlider({
            auto: false,
            video: true,
            useCSS: false,
            pagerCustom: '#bx-pager',
            autoHover: true,
            adaptiveHeight: true,
            controls: false,
            infiniteLoop: false
        });
    }

    var $pphoto = $('a[data-gal^="prettyPhoto[gallery]"]');
    if ($pphoto.length) {
        $pphoto.prettyPhoto({
            hook: 'data-gal',
            show_title: false,
            deeplinking: false,
            social_tools: false,
            default_width: 500,
            default_height: 344
        });
    }


    $(window).bind("resize", function() {

        if ($('.dt-sc-portfolio-container').length) {
            $('.dt-sc-portfolio-container').css({
                overflow: 'hidden'
            }).isotope({
                itemSelector: '.column',
                masonry: {
                    columnWidth: '.grid-sizer'
                }
            });
        }

    });

    $(window).load(function() {

        var portfolioHeight = $('.dt-sc-portfolio-wrapper .portfolio:first').height();
        $('.icon-link-title').css('height', portfolioHeight + 'px');

        //Portfolio Template : Sorting
        var $container = $('.dt-sc-portfolio-container');
        if ($container.length) {

            $container.isotope({
                filter: '*',
                masonry: {
                    columnWidth: '.grid-sizer'
                },
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });
        } //Isotope End

        if ($("div.dt-sc-portfolio-sorting").length) {

            $("div.dt-sc-portfolio-sorting a").on('click', function() {
                $("div.dt-sc-portfolio-sorting a").removeClass("active-sort");

                var selector = $(this).attr('data-filter');
                $(this).addClass("active-sort");

                $('.dt-sc-portfolio-container').isotope({
                    filter: selector,
                    masonry: {
                        columnWidth: '.grid-sizer'
                    },
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    }
                });

                return false;
            });
        } //Portfolio Template : Sorting End

    });


    /* Load More Button */
    $('.dt-sc-infinite-portfolio-load-more').each(function() {

        var $this = $(this),
            $x = $(this).prev('.dt-sc-infinite-portfolio-container').data('paged'),
            $xstyle = $(this).data('style');

        if ($xstyle == 'lazy') {
            $(window).scroll(function() {
                if ($(window).scrollTop() == $(document).height() - $(window).height()) {

                    var $per_page = $this.data('per-page'),
                        $term = $this.data('term'),
                        $style = $this.data('style'),
                        $paged = $x,
                        $prev = $this.prev();

                    $x++;

                    $.ajax({
                        type: "post",
                        dataType: "html",
                        url: dttheme_urls.ajaxurl,
                        data: {
                            action: "dt_ajax_infinite_portfolios",
                            per_page: $per_page,
                            term: $term,
                            style: $style,
                            paged: $paged
                        },
                        success: function(data) {
                            if (data.length > 0) {
                                $prev.append(data);
                            } else {
                                $prev.find(".message").removeClass("hidden");
                                //$this.addClass('hidden');

                                setTimeout(function() {
                                    $prev.find(".message").addClass('hidden');
                                    $this.addClass('disable');
                                }, 5000);
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {}
                    });
                }
            });
        } else if ($xstyle == 'load-more') {

            $this.click(function(e) {

                e.preventDefault();

                var $per_page = $(this).data('per-page'),
                    $term = $(this).data('term'),
                    $style = $(this).data('style'),
                    $paged = $x,
                    $prev = $(this).prev();

                $x++;

                $.ajax({
                    type: "post",
                    dataType: "html",
                    url: dttheme_urls.ajaxurl,
                    data: {
                        action: "dt_ajax_infinite_portfolios",
                        per_page: $per_page,
                        term: $term,
                        style: $style,
                        paged: $paged
                    },
                    success: function(data) {

                        if (data.length > 0) {
                            $prev.append(data);
                        } else {
                            $prev.find(".message").removeClass("hidden");
                            //$this.addClass('hidden');

                            setTimeout(function() {
                                $prev.find(".message").addClass('hidden');
                                $this.addClass('disable');
                            }, 5000);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {}
                });
            });
        }
    });


});