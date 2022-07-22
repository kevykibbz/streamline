window.RS_MODULES = window.RS_MODULES || {};
window.RS_MODULES.modules = window.RS_MODULES.modules || {};
window.RS_MODULES.waiting = window.RS_MODULES.waiting || [];
window.RS_MODULES.defered = false;
window.RS_MODULES.moduleWaiting = window.RS_MODULES.moduleWaiting || {};
window.RS_MODULES.type = 'compiled';

function dt_privacy_cookie_setter(cookie_name)
{

    var toggle = jQuery('.' + cookie_name);
    toggle.each(function()
    {
        if (document.cookie.match(cookie_name)) this.checked = false;
    });

    jQuery('.' + 'dt-switch-' + cookie_name).each(function()
    {
        this.className += ' active ';
    });

    toggle.on('click', function()
    {
        if (this.checked)
        {
            document.cookie = cookie_name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        } 
        else
        {
            var theDate = new Date();
            var oneYearLater = new Date(theDate.getTime() + 31536000000);
            document.cookie = cookie_name + '=true; Path=/; Expires=' + oneYearLater.toGMTString() + ';';
        }
    });
};
dt_privacy_cookie_setter('dtPrivacyGoogleTrackingDisabled');
dt_privacy_cookie_setter('dtPrivacyGoogleWebfontsDisabled');
dt_privacy_cookie_setter('dtPrivacyGoogleMapsDisabled');
dt_privacy_cookie_setter('dtPrivacyVideoEmbedsDisabled');
var tpj = jQuery,revapi1;

if (window.RS_MODULES === undefined) window.RS_MODULES = {};
if (RS_MODULES.modules === undefined) RS_MODULES.modules = {};
RS_MODULES.modules["revslider11"] =
{
    init: function() {
        revapi1 = jQuery("#rev_slider_1_1");
        if (revapi1 == undefined || revapi1.revolution == undefined) 
        {
            revslider_showDoubleJqueryError("rev_slider_1_1");
            return;
        }
        revapi1.revolutionInit(
        {
            visibilityLevels: "1240,1024,778,480",
            gridwidth: 1170,
            gridheight: 950,
            lazyType: "smart",
            spinner: "spinner0",
            perspectiveType: "local",
            responsiveLevels: "1240,1024,778,480",
            progressBar:
            {
                disableProgressBar: true
            },
            navigation:
            {
                mouseScrollNavigation: false,
                onHoverStop: false,
                bullets:
                {
                    enable: true,
                    style: "ares",
                    v_offset: 40,
                    space: 10
                }
            },
            viewPort:
            {
                global: true,
                globalDist: "-200px",
                enable: false,
                visible_area: "20%"
            },
            fallbacks:
            {
                allowHTML5AutoPlayOnAndroid: true
            },
        });

    }
} // End of RevInitScript

if (window.RS_MODULES.checkMinimal !== undefined)
{
    window.RS_MODULES.checkMinimal();
};

/* <![CDATA[ */
var dttheme_urls = {
    "theme_base_url": "http:\/\/homi.themesrain.kinsta.cloud\/wp-content\/themes\/homi",
    "framework_base_url": "http:\/\/homi.themesrain.kinsta.cloud\/wp-content\/themes\/homi\/framework\/",
    "ajaxurl": "http:\/\/homi.themesrain.kinsta.cloud\/wp-admin\/admin-ajax.php",
    "url": "http:\/\/homi.themesrain.kinsta.cloud",
    "isRTL": "",
    "loadingbar": "disable",
    "advOptions": "Show Advanced Options",
    "wpnonce": "cd3b6f4d95"
};
/* ]]> */

/* <![CDATA[ */
var wc_cart_fragments_params = {
    "ajax_url": "\/wp-admin\/admin-ajax.php",
    "wc_ajax_url": "\/?wc-ajax=%%endpoint%%",
    "cart_hash_key": "wc_cart_hash_9268b1da85975e7e3e50831dd70cd3e7",
    "fragment_name": "wc_fragments_9268b1da85975e7e3e50831dd70cd3e7",
    "request_timeout": "5000"
};
/* ]]> */

/* <![CDATA[ */
var woocommerce_params = {
    "ajax_url": "\/wp-admin\/admin-ajax.php",
    "wc_ajax_url": "\/?wc-ajax=%%endpoint%%"
};
/* ]]> */

/* <![CDATA[ */
var wpcf7 = {
    "api": {
        "root": "http:\/\/homi.themesrain.kinsta.cloud\/wp-json\/",
        "namespace": "contact-form-7\/v1"
    }
};
/* ]]> */

if (typeof revslider_showDoubleJqueryError === "undefined") 
 {
    function revslider_showDoubleJqueryError(sliderID) 
    {
        console.log("You have some jquery.js library include that comes after the Slider Revolution files js inclusion.");
        console.log("To fix this, you can:");
        console.log("1. Set 'Module General Options' -> 'Advanced' -> 'jQuery & OutPut Filters' -> 'Put JS to Body' to on");
        console.log("2. Find the double jQuery.js inclusion and remove it");
        return "Double Included jQuery Library";
    }
}

(function()
{
    var c = document.body.className;
    c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
    document.body.className = c;
})();

  function setREVStartSize(e) {
            //window.requestAnimationFrame(function() {              
            window.RSIW = window.RSIW === undefined ? window.innerWidth : window.RSIW;
            window.RSIH = window.RSIH === undefined ? window.innerHeight : window.RSIH;
            try {
                var pw = document.getElementById(e.c).parentNode.offsetWidth,
                    newh;
                pw = pw === 0 || isNaN(pw) ? window.RSIW : pw;
                e.tabw = e.tabw === undefined ? 0 : parseInt(e.tabw);
                e.thumbw = e.thumbw === undefined ? 0 : parseInt(e.thumbw);
                e.tabh = e.tabh === undefined ? 0 : parseInt(e.tabh);
                e.thumbh = e.thumbh === undefined ? 0 : parseInt(e.thumbh);
                e.tabhide = e.tabhide === undefined ? 0 : parseInt(e.tabhide);
                e.thumbhide = e.thumbhide === undefined ? 0 : parseInt(e.thumbhide);
                e.mh = e.mh === undefined || e.mh == "" || e.mh === "auto" ? 0 : parseInt(e.mh, 0);
                if (e.layout === "fullscreen" || e.l === "fullscreen")
                    newh = Math.max(e.mh, window.RSIH);
                else {
                    e.gw = Array.isArray(e.gw) ? e.gw : [e.gw];
                    for (var i in e.rl)
                        if (e.gw[i] === undefined || e.gw[i] === 0) e.gw[i] = e.gw[i - 1];
                    e.gh = e.el === undefined || e.el === "" || (Array.isArray(e.el) && e.el.length == 0) ? e.gh : e.el;
                    e.gh = Array.isArray(e.gh) ? e.gh : [e.gh];
                    for (var i in e.rl)
                        if (e.gh[i] === undefined || e.gh[i] === 0) e.gh[i] = e.gh[i - 1];

                    var nl = new Array(e.rl.length),
                        ix = 0,
                        sl;
                    e.tabw = e.tabhide >= pw ? 0 : e.tabw;
                    e.thumbw = e.thumbhide >= pw ? 0 : e.thumbw;
                    e.tabh = e.tabhide >= pw ? 0 : e.tabh;
                    e.thumbh = e.thumbhide >= pw ? 0 : e.thumbh;
                    for (var i in e.rl) nl[i] = e.rl[i] < window.RSIW ? 0 : e.rl[i];
                    sl = nl[0];
                    for (var i in nl)
                        if (sl > nl[i] && nl[i] > 0) {
                            sl = nl[i];
                            ix = i;
                        }
                    var m = pw > (e.gw[ix] + e.tabw + e.thumbw) ? 1 : (pw - (e.tabw + e.thumbw)) / (e.gw[ix]);
                    newh = (e.gh[ix] * m) + (e.tabh + e.thumbh);
                }
                var el = document.getElementById(e.c);
                if (el !== null && el) el.style.height = newh + "px";
                el = document.getElementById(e.c + "_wrapper");
                if (el !== null && el) el.style.height = newh + "px";
            } catch (e) {
                console.log("Failure at Presize of Slider:" + e)
            }
            //});
        };

 window._wpemojiSettings = {
            "baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/13.1.0\/72x72\/",
            "ext": ".png",
            "svgUrl": "https:\/\/s.w.org\/images\/core\/emoji\/13.1.0\/svg\/",
            "svgExt": ".svg",
            "source": {
                "concatemoji": "http:\/\/homi.themesrain.kinsta.cloud\/wp-includes\/js\/wp-emoji-release.min.js?ver=5.8.4"
            }
        };
        ! function(e, a, t) {
            var n, r, o, i = a.createElement("canvas"),
                p = i.getContext && i.getContext("2d");

            function s(e, t) {
                var a = String.fromCharCode;
                p.clearRect(0, 0, i.width, i.height), p.fillText(a.apply(this, e), 0, 0);
                e = i.toDataURL();
                return p.clearRect(0, 0, i.width, i.height), p.fillText(a.apply(this, t), 0, 0), e === i.toDataURL()
            }

            function c(e) {
                var t = a.createElement("script");
                t.src = e, t.defer = t.type = "text/javascript", a.getElementsByTagName("head")[0].appendChild(t)
            }
            for (o = Array("flag", "emoji"), t.supports = {
                    everything: !0,
                    everythingExceptFlag: !0
                }, r = 0; r < o.length; r++) t.supports[o[r]] = function(e) {
                if (!p || !p.fillText) return !1;
                switch (p.textBaseline = "top", p.font = "600 32px Arial", e) {
                    case "flag":
                        return s([127987, 65039, 8205, 9895, 65039], [127987, 65039, 8203, 9895, 65039]) ? !1 : !s([55356, 56826, 55356, 56819], [55356, 56826, 8203, 55356, 56819]) && !s([55356, 57332, 56128, 56423, 56128, 56418, 56128, 56421, 56128, 56430, 56128, 56423, 56128, 56447], [55356, 57332, 8203, 56128, 56423, 8203, 56128, 56418, 8203, 56128, 56421, 8203, 56128, 56430, 8203, 56128, 56423, 8203, 56128, 56447]);
                    case "emoji":
                        return !s([10084, 65039, 8205, 55357, 56613], [10084, 65039, 8203, 55357, 56613])
                }
                return !1
            }(o[r]), t.supports.everything = t.supports.everything && t.supports[o[r]], "flag" !== o[r] && (t.supports.everythingExceptFlag = t.supports.everythingExceptFlag && t.supports[o[r]]);
            t.supports.everythingExceptFlag = t.supports.everythingExceptFlag && !t.supports.flag, t.DOMReady = !1, t.readyCallback = function() {
                t.DOMReady = !0
            }, t.supports.everything || (n = function() {
                t.readyCallback()
            }, a.addEventListener ? (a.addEventListener("DOMContentLoaded", n, !1), e.addEventListener("load", n, !1)) : (e.attachEvent("onload", n), a.attachEvent("onreadystatechange", function() {
                "complete" === a.readyState && t.readyCallback()
            })), (n = t.source || {}).concatemoji ? c(n.concatemoji) : n.wpemoji && n.twemoji && (c(n.twemoji), c(n.wpemoji)))
        }(window, document, window._wpemojiSettings);

window.dataLayer = window.dataLayer || [];

function gtag() {
    dataLayer.push(arguments);
}
gtag('js', new Date());
gtag('config', 'UA-XXXXX-X', {
    'anonymize_ip': true
});

 jQuery(document).ready(function($) {
    if (typeof jQuery('.ult-carousel-29161344662d6943e0cd34').slick == "function") {
    $('.ult-carousel-29161344662d6943e0cd34').slick({
        dots: false,
        autoplay: true,
        autoplaySpeed: 5000,
        speed: 300,
        infinite: true,
        arrows: false,
        slidesToScroll: 3,
        slidesToShow: 3,
        swipe: true,
        draggable: true,
        touchMove: true,
        pauseOnHover: true,
        pauseOnFocus: false,
        responsive: [{
                breakpoint: 1026,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            },
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 760,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ],
        pauseOnDotsHover: true,
        customPaging: function(slider, i) {
            return '<i type="button" style= "color:#333333;" class="ultsl-record" data-role="none"></i>';
        },
    });
    }
    });

     jQuery(document).ready(function($) {
    if (typeof jQuery('.ult-carousel-64958531662d6943e0c17a').slick == "function") {
        $('.ult-carousel-64958531662d6943e0c17a').slick({
            dots: true,
            autoplay: true,
            autoplaySpeed: 5000,
            speed: 300,
            infinite: true,
            arrows: false,
            slidesToScroll: 2,
            slidesToShow: 2,
            swipe: true,
            draggable: true,
            touchMove: true,
            pauseOnHover: true,
            pauseOnFocus: false,
            responsive: [{
                    breakpoint: 1026,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    }
                },
                {
                    breakpoint: 1025,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 760,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ],
            pauseOnDotsHover: true,
            customPaging: function(slider, i) {
                return '<i type="button" style= "color:#e5e5e5;" class="ultsl-record" data-role="none"></i>';
            },
        });
    }
});