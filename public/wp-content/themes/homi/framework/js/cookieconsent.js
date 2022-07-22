(function($) {

    "use strict";

    $(document).ready(function() {


        if (!dtGetCookie('dtCookieConsent')) {
            $('.dt-cookie-consent').removeClass('cookiebar-hidden');
        }

        //close btn
        $('.dt-cookie-close-bar').on('click', function(e) {

            var cookieContents = $(this).attr('data-contents');
            dtSetCookie('dtCookieConsent', cookieContents, 60);

            $('.dt-cookie-consent').addClass('cookiebar-hidden');

            e.preventDefault();
        });

        $('.dt-cookie-info-btn').each(function(index, element) {
            $(this).magnificPopup({
                type: 'inline',

                fixedContentPos: false,
                fixedBgPos: true,

                overflowY: 'auto',

                closeBtnInside: true,
                preloader: false,

                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in'
            });
        });

        function dtSetCookie(CookieName, CookieValue, CookieDays) {
            if (CookieDays) {
                var date = new Date();
                date.setTime(date.getTime() + (CookieDays * 24 * 60 * 60 * 1000));
                var expires = "; expires=" + date.toGMTString();
            } else var expires = "";
            document.cookie = CookieName + "=" + CookieValue + expires + "; path=/";
        }


        function dtGetCookie(CookieName) {
            var docCookiesStr = CookieName + "=";
            var docCookiesArr = document.cookie.split(';');

            for (var i = 0; i < docCookiesArr.length; i++) {
                var thisCookie = docCookiesArr[i];

                while (thisCookie.charAt(0) == ' ') {
                    thisCookie = thisCookie.substring(1, thisCookie.length);
                }
                if (thisCookie.indexOf(docCookiesStr) == 0) {
                    var cookieContents = $('.dt-cookie-close-bar').attr('data-contents');
                    var savedContents = thisCookie.substring(docCookiesStr.length, thisCookie.length);
                    if (savedContents == cookieContents) {
                        return savedContents;
                    }
                }
            }
            return null;
        }

    });

})(jQuery);