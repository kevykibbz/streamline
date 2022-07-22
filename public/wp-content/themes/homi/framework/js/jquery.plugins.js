/**
 *	jQuery carouFredSel 6.2.1
 *	Demo's and documentation:
 *	caroufredsel.dev7studios.com
 *
 *	Copyright (c) 2013 Fred Heusschen
 *	www.frebsite.nl
 *
 *	Dual licensed under the MIT and GPL licenses.
 *	http://en.wikipedia.org/wiki/MIT_License
 *	http://en.wikipedia.org/wiki/GNU_General_Public_License
 */
(function($) {
    function sc_setScroll(a, b, c) {
        return "transition" == c.transition && "swing" == b && (b = "ease"), {
            anims: [],
            duration: a,
            orgDuration: a,
            easing: b,
            startTime: getTime()
        }
    }

    function sc_startScroll(a, b) {
        for (var c = 0, d = a.anims.length; d > c; c++) {
            var e = a.anims[c];
            e && e[0][b.transition](e[1], a.duration, a.easing, e[2])
        }
    }

    function sc_stopScroll(a, b) {
        is_boolean(b) || (b = !0), is_object(a.pre) && sc_stopScroll(a.pre, b);
        for (var c = 0, d = a.anims.length; d > c; c++) {
            var e = a.anims[c];
            e[0].stop(!0), b && (e[0].css(e[1]), is_function(e[2]) && e[2]())
        }
        is_object(a.post) && sc_stopScroll(a.post, b)
    }

    function sc_afterScroll(a, b, c) {
        switch (b && b.remove(), c.fx) {
            case "fade":
            case "crossfade":
            case "cover-fade":
            case "uncover-fade":
                a.css("opacity", 1), a.css("filter", "")
        }
    }

    function sc_fireCallbacks(a, b, c, d, e) {
        if (b[c] && b[c].call(a, d), e[c].length)
            for (var f = 0, g = e[c].length; g > f; f++) e[c][f].call(a, d);
        return []
    }

    function sc_fireQueue(a, b, c) {
        return b.length && (a.trigger(cf_e(b[0][0], c), b[0][1]), b.shift()), b
    }

    function sc_hideHiddenItems(a) {
        a.each(function() {
            var a = $(this);
            a.data("_cfs_isHidden", a.is(":hidden")).hide()
        })
    }

    function sc_showHiddenItems(a) {
        a && a.each(function() {
            var a = $(this);
            a.data("_cfs_isHidden") || a.show()
        })
    }

    function sc_clearTimers(a) {
        return a.auto && clearTimeout(a.auto), a.progress && clearInterval(a.progress), a
    }

    function sc_mapCallbackArguments(a, b, c, d, e, f, g) {
        return {
            width: g.width,
            height: g.height,
            items: {
                old: a,
                skipped: b,
                visible: c
            },
            scroll: {
                items: d,
                direction: e,
                duration: f
            }
        }
    }

    function sc_getDuration(a, b, c, d) {
        var e = a.duration;
        return "none" == a.fx ? 0 : ("auto" == e ? e = b.scroll.duration / b.scroll.items * c : 10 > e && (e = d / e), 1 > e ? 0 : ("fade" == a.fx && (e /= 2), Math.round(e)))
    }

    function nv_showNavi(a, b, c) {
        var d = is_number(a.items.minimum) ? a.items.minimum : a.items.visible + 1;
        if ("show" == b || "hide" == b) var e = b;
        else if (d > b) {
            debug(c, "Not enough items (" + b + " total, " + d + " needed): Hiding navigation.");
            var e = "hide"
        } else var e = "show";
        var f = "show" == e ? "removeClass" : "addClass",
            g = cf_c("hidden", c);
        a.auto.button && a.auto.button[e]()[f](g), a.prev.button && a.prev.button[e]()[f](g), a.next.button && a.next.button[e]()[f](g), a.pagination.container && a.pagination.container[e]()[f](g)
    }

    function nv_enableNavi(a, b, c) {
        if (!a.circular && !a.infinite) {
            var d = "removeClass" == b || "addClass" == b ? b : !1,
                e = cf_c("disabled", c);
            if (a.auto.button && d && a.auto.button[d](e), a.prev.button) {
                var f = d || 0 == b ? "addClass" : "removeClass";
                a.prev.button[f](e)
            }
            if (a.next.button) {
                var f = d || b == a.items.visible ? "addClass" : "removeClass";
                a.next.button[f](e)
            }
        }
    }

    function go_getObject(a, b) {
        return is_function(b) ? b = b.call(a) : is_undefined(b) && (b = {}), b
    }

    function go_getItemsObject(a, b) {
        return b = go_getObject(a, b), is_number(b) ? b = {
            visible: b
        } : "variable" == b ? b = {
            visible: b,
            width: b,
            height: b
        } : is_object(b) || (b = {}), b
    }

    function go_getScrollObject(a, b) {
        return b = go_getObject(a, b), is_number(b) ? b = 50 >= b ? {
            items: b
        } : {
            duration: b
        } : is_string(b) ? b = {
            easing: b
        } : is_object(b) || (b = {}), b
    }

    function go_getNaviObject(a, b) {
        if (b = go_getObject(a, b), is_string(b)) {
            var c = cf_getKeyCode(b);
            b = -1 == c ? $(b) : c
        }
        return b
    }

    function go_getAutoObject(a, b) {
        return b = go_getNaviObject(a, b), is_jquery(b) ? b = {
            button: b
        } : is_boolean(b) ? b = {
            play: b
        } : is_number(b) && (b = {
            timeoutDuration: b
        }), b.progress && (is_string(b.progress) || is_jquery(b.progress)) && (b.progress = {
            bar: b.progress
        }), b
    }

    function go_complementAutoObject(a, b) {
        return is_function(b.button) && (b.button = b.button.call(a)), is_string(b.button) && (b.button = $(b.button)), is_boolean(b.play) || (b.play = !0), is_number(b.delay) || (b.delay = 0), is_undefined(b.pauseOnEvent) && (b.pauseOnEvent = !0), is_boolean(b.pauseOnResize) || (b.pauseOnResize = !0), is_number(b.timeoutDuration) || (b.timeoutDuration = 10 > b.duration ? 2500 : 5 * b.duration), b.progress && (is_function(b.progress.bar) && (b.progress.bar = b.progress.bar.call(a)), is_string(b.progress.bar) && (b.progress.bar = $(b.progress.bar)), b.progress.bar ? (is_function(b.progress.updater) || (b.progress.updater = $.fn.carouFredSel.progressbarUpdater), is_number(b.progress.interval) || (b.progress.interval = 50)) : b.progress = !1), b
    }

    function go_getPrevNextObject(a, b) {
        return b = go_getNaviObject(a, b), is_jquery(b) ? b = {
            button: b
        } : is_number(b) && (b = {
            key: b
        }), b
    }

    function go_complementPrevNextObject(a, b) {
        return is_function(b.button) && (b.button = b.button.call(a)), is_string(b.button) && (b.button = $(b.button)), is_string(b.key) && (b.key = cf_getKeyCode(b.key)), b
    }

    function go_getPaginationObject(a, b) {
        return b = go_getNaviObject(a, b), is_jquery(b) ? b = {
            container: b
        } : is_boolean(b) && (b = {
            keys: b
        }), b
    }

    function go_complementPaginationObject(a, b) {
        return is_function(b.container) && (b.container = b.container.call(a)), is_string(b.container) && (b.container = $(b.container)), is_number(b.items) || (b.items = !1), is_boolean(b.keys) || (b.keys = !1), is_function(b.anchorBuilder) || is_false(b.anchorBuilder) || (b.anchorBuilder = $.fn.carouFredSel.pageAnchorBuilder), is_number(b.deviation) || (b.deviation = 0), b
    }

    function go_getSwipeObject(a, b) {
        return is_function(b) && (b = b.call(a)), is_undefined(b) && (b = {
            onTouch: !1
        }), is_true(b) ? b = {
            onTouch: b
        } : is_number(b) && (b = {
            items: b
        }), b
    }

    function go_complementSwipeObject(a, b) {
        return is_boolean(b.onTouch) || (b.onTouch = !0), is_boolean(b.onMouse) || (b.onMouse = !1), is_object(b.options) || (b.options = {}), is_boolean(b.options.triggerOnTouchEnd) || (b.options.triggerOnTouchEnd = !1), b
    }

    function go_getMousewheelObject(a, b) {
        return is_function(b) && (b = b.call(a)), is_true(b) ? b = {} : is_number(b) ? b = {
            items: b
        } : is_undefined(b) && (b = !1), b
    }

    function go_complementMousewheelObject(a, b) {
        return b
    }

    function gn_getItemIndex(a, b, c, d, e) {
        if (is_string(a) && (a = $(a, e)), is_object(a) && (a = $(a, e)), is_jquery(a) ? (a = e.children().index(a), is_boolean(c) || (c = !1)) : is_boolean(c) || (c = !0), is_number(a) || (a = 0), is_number(b) || (b = 0), c && (a += d.first), a += b, d.total > 0) {
            for (; a >= d.total;) a -= d.total;
            for (; 0 > a;) a += d.total
        }
        return a
    }

    function gn_getVisibleItemsPrev(a, b, c) {
        for (var d = 0, e = 0, f = c; f >= 0; f--) {
            var g = a.eq(f);
            if (d += g.is(":visible") ? g[b.d.outerWidth](!0) : 0, d > b.maxDimension) return e;
            0 == f && (f = a.length), e++
        }
    }

    function gn_getVisibleItemsPrevFilter(a, b, c) {
        return gn_getItemsPrevFilter(a, b.items.filter, b.items.visibleConf.org, c)
    }

    function gn_getScrollItemsPrevFilter(a, b, c, d) {
        return gn_getItemsPrevFilter(a, b.items.filter, d, c)
    }

    function gn_getItemsPrevFilter(a, b, c, d) {
        for (var e = 0, f = 0, g = d, h = a.length; g >= 0; g--) {
            if (f++, f == h) return f;
            var i = a.eq(g);
            if (i.is(b) && (e++, e == c)) return f;
            0 == g && (g = h)
        }
    }

    function gn_getVisibleOrg(a, b) {
        return b.items.visibleConf.org || a.children().slice(0, b.items.visible).filter(b.items.filter).length
    }

    function gn_getVisibleItemsNext(a, b, c) {
        for (var d = 0, e = 0, f = c, g = a.length - 1; g >= f; f++) {
            var h = a.eq(f);
            if (d += h.is(":visible") ? h[b.d.outerWidth](!0) : 0, d > b.maxDimension) return e;
            if (e++, e == g + 1) return e;
            f == g && (f = -1)
        }
    }

    function gn_getVisibleItemsNextTestCircular(a, b, c, d) {
        var e = gn_getVisibleItemsNext(a, b, c);
        return b.circular || c + e > d && (e = d - c), e
    }

    function gn_getVisibleItemsNextFilter(a, b, c) {
        return gn_getItemsNextFilter(a, b.items.filter, b.items.visibleConf.org, c, b.circular)
    }

    function gn_getScrollItemsNextFilter(a, b, c, d) {
        return gn_getItemsNextFilter(a, b.items.filter, d + 1, c, b.circular) - 1
    }

    function gn_getItemsNextFilter(a, b, c, d) {
        for (var f = 0, g = 0, h = d, i = a.length - 1; i >= h; h++) {
            if (g++, g >= i) return g;
            var j = a.eq(h);
            if (j.is(b) && (f++, f == c)) return g;
            h == i && (h = -1)
        }
    }

    function gi_getCurrentItems(a, b) {
        return a.slice(0, b.items.visible)
    }

    function gi_getOldItemsPrev(a, b, c) {
        return a.slice(c, b.items.visibleConf.old + c)
    }

    function gi_getNewItemsPrev(a, b) {
        return a.slice(0, b.items.visible)
    }

    function gi_getOldItemsNext(a, b) {
        return a.slice(0, b.items.visibleConf.old)
    }

    function gi_getNewItemsNext(a, b, c) {
        return a.slice(c, b.items.visible + c)
    }

    function sz_storeMargin(a, b, c) {
        b.usePadding && (is_string(c) || (c = "_cfs_origCssMargin"), a.each(function() {
            var a = $(this),
                d = parseInt(a.css(b.d.marginRight), 10);
            is_number(d) || (d = 0), a.data(c, d)
        }))
    }

    function sz_resetMargin(a, b, c) {
        if (b.usePadding) {
            var d = is_boolean(c) ? c : !1;
            is_number(c) || (c = 0), sz_storeMargin(a, b, "_cfs_tempCssMargin"), a.each(function() {
                var a = $(this);
                a.css(b.d.marginRight, d ? a.data("_cfs_tempCssMargin") : c + a.data("_cfs_origCssMargin"))
            })
        }
    }

    function sz_storeOrigCss(a) {
        a.each(function() {
            var a = $(this);
            a.data("_cfs_origCss", a.attr("style") || "")
        })
    }

    function sz_restoreOrigCss(a) {
        a.each(function() {
            var a = $(this);
            a.attr("style", a.data("_cfs_origCss") || "")
        })
    }

    function sz_setResponsiveSizes(a, b) {
        var d = (a.items.visible, a.items[a.d.width]),
            e = a[a.d.height],
            f = is_percentage(e);
        b.each(function() {
            var b = $(this),
                c = d - ms_getPaddingBorderMargin(b, a, "Width");
            b[a.d.width](c), f && b[a.d.height](ms_getPercentage(c, e))
        })
    }

    function sz_setSizes(a, b) {
        var c = a.parent(),
            d = a.children(),
            e = gi_getCurrentItems(d, b),
            f = cf_mapWrapperSizes(ms_getSizes(e, b, !0), b, !1);
        if (c.css(f), b.usePadding) {
            var g = b.padding,
                h = g[b.d[1]];
            b.align && 0 > h && (h = 0);
            var i = e.last();
            i.css(b.d.marginRight, i.data("_cfs_origCssMargin") + h), a.css(b.d.top, g[b.d[0]]), a.css(b.d.left, g[b.d[3]])
        }
        return a.css(b.d.width, f[b.d.width] + 2 * ms_getTotalSize(d, b, "width")), a.css(b.d.height, ms_getLargestSize(d, b, "height")), f
    }

    function ms_getSizes(a, b, c) {
        return [ms_getTotalSize(a, b, "width", c), ms_getLargestSize(a, b, "height", c)]
    }

    function ms_getLargestSize(a, b, c, d) {
        return is_boolean(d) || (d = !1), is_number(b[b.d[c]]) && d ? b[b.d[c]] : is_number(b.items[b.d[c]]) ? b.items[b.d[c]] : (c = c.toLowerCase().indexOf("width") > -1 ? "outerWidth" : "outerHeight", ms_getTrueLargestSize(a, b, c))
    }

    function ms_getTrueLargestSize(a, b, c) {
        for (var d = 0, e = 0, f = a.length; f > e; e++) {
            var g = a.eq(e),
                h = g.is(":visible") ? g[b.d[c]](!0) : 0;
            h > d && (d = h)
        }
        return d
    }

    function ms_getTotalSize(a, b, c, d) {
        if (is_boolean(d) || (d = !1), is_number(b[b.d[c]]) && d) return b[b.d[c]];
        if (is_number(b.items[b.d[c]])) return b.items[b.d[c]] * a.length;
        for (var e = c.toLowerCase().indexOf("width") > -1 ? "outerWidth" : "outerHeight", f = 0, g = 0, h = a.length; h > g; g++) {
            var i = a.eq(g);
            f += i.is(":visible") ? i[b.d[e]](!0) : 0
        }
        return f
    }

    function ms_getParentSize(a, b, c) {
        var d = a.is(":visible");
        d && a.hide();
        var e = a.parent()[b.d[c]]();
        return d && a.show(), e
    }

    function ms_getMaxDimension(a, b) {
        return is_number(a[a.d.width]) ? a[a.d.width] : b
    }

    function ms_hasVariableSizes(a, b, c) {
        for (var d = !1, e = !1, f = 0, g = a.length; g > f; f++) {
            var h = a.eq(f),
                i = h.is(":visible") ? h[b.d[c]](!0) : 0;
            d === !1 ? d = i : d != i && (e = !0), 0 == d && (e = !0)
        }
        return e
    }

    function ms_getPaddingBorderMargin(a, b, c) {
        return a[b.d["outer" + c]](!0) - a[b.d[c.toLowerCase()]]()
    }

    function ms_getPercentage(a, b) {
        if (is_percentage(b)) {
            if (b = parseInt(b.slice(0, -1), 10), !is_number(b)) return a;
            a *= b / 100
        }
        return a
    }

    function cf_e(a, b, c, d, e) {
        return is_boolean(c) || (c = !0), is_boolean(d) || (d = !0), is_boolean(e) || (e = !1), c && (a = b.events.prefix + a), d && (a = a + "." + b.events.namespace), d && e && (a += b.serialNumber), a
    }

    function cf_c(a, b) {
        return is_string(b.classnames[a]) ? b.classnames[a] : a
    }

    function cf_mapWrapperSizes(a, b, c) {
        is_boolean(c) || (c = !0);
        var d = b.usePadding && c ? b.padding : [0, 0, 0, 0],
            e = {};
        return e[b.d.width] = a[0] + d[1] + d[3], e[b.d.height] = a[1] + d[0] + d[2], e
    }

    function cf_sortParams(a, b) {
        for (var c = [], d = 0, e = a.length; e > d; d++)
            for (var f = 0, g = b.length; g > f; f++)
                if (b[f].indexOf(typeof a[d]) > -1 && is_undefined(c[f])) {
                    c[f] = a[d];
                    break
                }
        return c
    }

    function cf_getPadding(a) {
        if (is_undefined(a)) return [0, 0, 0, 0];
        if (is_number(a)) return [a, a, a, a];
        if (is_string(a) && (a = a.split("px").join("").split("em").join("").split(" ")), !is_array(a)) return [0, 0, 0, 0];
        for (var b = 0; 4 > b; b++) a[b] = parseInt(a[b], 10);
        switch (a.length) {
            case 0:
                return [0, 0, 0, 0];
            case 1:
                return [a[0], a[0], a[0], a[0]];
            case 2:
                return [a[0], a[1], a[0], a[1]];
            case 3:
                return [a[0], a[1], a[2], a[1]];
            default:
                return [a[0], a[1], a[2], a[3]]
        }
    }

    function cf_getAlignPadding(a, b) {
        var c = is_number(b[b.d.width]) ? Math.ceil(b[b.d.width] - ms_getTotalSize(a, b, "width")) : 0;
        switch (b.align) {
            case "left":
                return [0, c];
            case "right":
                return [c, 0];
            case "center":
            default:
                return [Math.ceil(c / 2), Math.floor(c / 2)]
        }
    }

    function cf_getDimensions(a) {
        for (var b = [
                ["width", "innerWidth", "outerWidth", "height", "innerHeight", "outerHeight", "left", "top", "marginRight", 0, 1, 2, 3],
                ["height", "innerHeight", "outerHeight", "width", "innerWidth", "outerWidth", "top", "left", "marginBottom", 3, 2, 1, 0]
            ], c = b[0].length, d = "right" == a.direction || "left" == a.direction ? 0 : 1, e = {}, f = 0; c > f; f++) e[b[0][f]] = b[d][f];
        return e
    }

    function cf_getAdjust(a, b, c, d) {
        var e = a;
        if (is_function(c)) e = c.call(d, e);
        else if (is_string(c)) {
            var f = c.split("+"),
                g = c.split("-");
            if (g.length > f.length) var h = !0,
                i = g[0],
                j = g[1];
            else var h = !1,
                i = f[0],
                j = f[1];
            switch (i) {
                case "even":
                    e = 1 == a % 2 ? a - 1 : a;
                    break;
                case "odd":
                    e = 0 == a % 2 ? a - 1 : a;
                    break;
                default:
                    e = a
            }
            j = parseInt(j, 10), is_number(j) && (h && (j = -j), e += j)
        }
        return (!is_number(e) || 1 > e) && (e = 1), e
    }

    function cf_getItemsAdjust(a, b, c, d) {
        return cf_getItemAdjustMinMax(cf_getAdjust(a, b, c, d), b.items.visibleConf)
    }

    function cf_getItemAdjustMinMax(a, b) {
        return is_number(b.min) && b.min > a && (a = b.min), is_number(b.max) && a > b.max && (a = b.max), 1 > a && (a = 1), a
    }

    function cf_getSynchArr(a) {
        is_array(a) || (a = [
            [a]
        ]), is_array(a[0]) || (a = [a]);
        for (var b = 0, c = a.length; c > b; b++) is_string(a[b][0]) && (a[b][0] = $(a[b][0])), is_boolean(a[b][1]) || (a[b][1] = !0), is_boolean(a[b][2]) || (a[b][2] = !0), is_number(a[b][3]) || (a[b][3] = 0);
        return a
    }

    function cf_getKeyCode(a) {
        return "right" == a ? 39 : "left" == a ? 37 : "up" == a ? 38 : "down" == a ? 40 : -1
    }

    function cf_setCookie(a, b, c) {
        if (a) {
            var d = b.triggerHandler(cf_e("currentPosition", c));
            $.fn.carouFredSel.cookie.set(a, d)
        }
    }

    function cf_getCookie(a) {
        var b = $.fn.carouFredSel.cookie.get(a);
        return "" == b ? 0 : b
    }

    function in_mapCss(a, b) {
        for (var c = {}, d = 0, e = b.length; e > d; d++) c[b[d]] = a.css(b[d]);
        return c
    }

    function in_complementItems(a, b, c, d) {
        return is_object(a.visibleConf) || (a.visibleConf = {}), is_object(a.sizesConf) || (a.sizesConf = {}), 0 == a.start && is_number(d) && (a.start = d), is_object(a.visible) ? (a.visibleConf.min = a.visible.min, a.visibleConf.max = a.visible.max, a.visible = !1) : is_string(a.visible) ? ("variable" == a.visible ? a.visibleConf.variable = !0 : a.visibleConf.adjust = a.visible, a.visible = !1) : is_function(a.visible) && (a.visibleConf.adjust = a.visible, a.visible = !1), is_string(a.filter) || (a.filter = c.filter(":hidden").length > 0 ? ":visible" : "*"), a[b.d.width] || (b.responsive ? (debug(!0, "Set a " + b.d.width + " for the items!"), a[b.d.width] = ms_getTrueLargestSize(c, b, "outerWidth")) : a[b.d.width] = ms_hasVariableSizes(c, b, "outerWidth") ? "variable" : c[b.d.outerWidth](!0)), a[b.d.height] || (a[b.d.height] = ms_hasVariableSizes(c, b, "outerHeight") ? "variable" : c[b.d.outerHeight](!0)), a.sizesConf.width = a.width, a.sizesConf.height = a.height, a
    }

    function in_complementVisibleItems(a, b) {
        return "variable" == a.items[a.d.width] && (a.items.visibleConf.variable = !0), a.items.visibleConf.variable || (is_number(a[a.d.width]) ? a.items.visible = Math.floor(a[a.d.width] / a.items[a.d.width]) : (a.items.visible = Math.floor(b / a.items[a.d.width]), a[a.d.width] = a.items.visible * a.items[a.d.width], a.items.visibleConf.adjust || (a.align = !1)), ("Infinity" == a.items.visible || 1 > a.items.visible) && (debug(!0, 'Not a valid number of visible items: Set to "variable".'), a.items.visibleConf.variable = !0)), a
    }

    function in_complementPrimarySize(a, b, c) {
        return "auto" == a && (a = ms_getTrueLargestSize(c, b, "outerWidth")), a
    }

    function in_complementSecondarySize(a, b, c) {
        return "auto" == a && (a = ms_getTrueLargestSize(c, b, "outerHeight")), a || (a = b.items[b.d.height]), a
    }

    function in_getAlignPadding(a, b) {
        var c = cf_getAlignPadding(gi_getCurrentItems(b, a), a);
        return a.padding[a.d[1]] = c[1], a.padding[a.d[3]] = c[0], a
    }

    function in_getResponsiveValues(a, b) {
        var d = cf_getItemAdjustMinMax(Math.ceil(a[a.d.width] / a.items[a.d.width]), a.items.visibleConf);
        d > b.length && (d = b.length);
        var e = Math.floor(a[a.d.width] / d);
        return a.items.visible = d, a.items[a.d.width] = e, a[a.d.width] = d * e, a
    }

    function bt_pauseOnHoverConfig(a) {
        if (is_string(a)) var b = a.indexOf("immediate") > -1 ? !0 : !1,
            c = a.indexOf("resume") > -1 ? !0 : !1;
        else var b = c = !1;
        return [b, c]
    }

    function bt_mousesheelNumber(a) {
        return is_number(a) ? a : null
    }

    function is_null(a) {
        return null === a
    }

    function is_undefined(a) {
        return is_null(a) || a === void 0 || "" === a || "undefined" === a
    }

    function is_array(a) {
        return a instanceof Array
    }

    function is_jquery(a) {
        return a instanceof jQuery
    }

    function is_object(a) {
        return (a instanceof Object || "object" == typeof a) && !is_null(a) && !is_jquery(a) && !is_array(a) && !is_function(a)
    }

    function is_number(a) {
        return (a instanceof Number || "number" == typeof a) && !isNaN(a)
    }

    function is_string(a) {
        return (a instanceof String || "string" == typeof a) && !is_undefined(a) && !is_true(a) && !is_false(a)
    }

    function is_function(a) {
        return a instanceof Function || "function" == typeof a
    }

    function is_boolean(a) {
        return a instanceof Boolean || "boolean" == typeof a || is_true(a) || is_false(a)
    }

    function is_true(a) {
        return a === !0 || "true" === a
    }

    function is_false(a) {
        return a === !1 || "false" === a
    }

    function is_percentage(a) {
        return is_string(a) && "%" == a.slice(-1)
    }

    function getTime() {
        return (new Date).getTime()
    }

    function deprecated(a, b) {
        debug(!0, a + " is DEPRECATED, support for it will be removed. Use " + b + " instead.")
    }

    function debug(a, b) {
        if (!is_undefined(window.console) && !is_undefined(window.console.log)) {
            if (is_object(a)) {
                var c = " (" + a.selector + ")";
                a = a.debug
            } else var c = "";
            if (!a) return !1;
            b = is_string(b) ? "carouFredSel" + c + ": " + b : ["carouFredSel" + c + ":", b], window.console.log(b)
        }
        return !1
    }
    $.fn.carouFredSel || ($.fn.caroufredsel = $.fn.carouFredSel = function(options, configs) {
        if (0 == this.length) return debug(!0, 'No element found for "' + this.selector + '".'), this;
        if (this.length > 1) return this.each(function() {
            $(this).carouFredSel(options, configs)
        });
        var $cfs = this,
            $tt0 = this[0],
            starting_position = !1;
        $cfs.data("_cfs_isCarousel") && (starting_position = $cfs.triggerHandler("_cfs_triggerEvent", "currentPosition"), $cfs.trigger("_cfs_triggerEvent", ["destroy", !0]));
        var FN = {};
        FN._init = function(a, b, c) {
            a = go_getObject($tt0, a), a.items = go_getItemsObject($tt0, a.items), a.scroll = go_getScrollObject($tt0, a.scroll), a.auto = go_getAutoObject($tt0, a.auto), a.prev = go_getPrevNextObject($tt0, a.prev), a.next = go_getPrevNextObject($tt0, a.next), a.pagination = go_getPaginationObject($tt0, a.pagination), a.swipe = go_getSwipeObject($tt0, a.swipe), a.mousewheel = go_getMousewheelObject($tt0, a.mousewheel), b && (opts_orig = $.extend(!0, {}, $.fn.carouFredSel.defaults, a)), opts = $.extend(!0, {}, $.fn.carouFredSel.defaults, a), opts.d = cf_getDimensions(opts), crsl.direction = "up" == opts.direction || "left" == opts.direction ? "next" : "prev";
            var d = $cfs.children(),
                e = ms_getParentSize($wrp, opts, "width");
            if (is_true(opts.cookie) && (opts.cookie = "caroufredsel_cookie_" + conf.serialNumber), opts.maxDimension = ms_getMaxDimension(opts, e), opts.items = in_complementItems(opts.items, opts, d, c), opts[opts.d.width] = in_complementPrimarySize(opts[opts.d.width], opts, d), opts[opts.d.height] = in_complementSecondarySize(opts[opts.d.height], opts, d), opts.responsive && (is_percentage(opts[opts.d.width]) || (opts[opts.d.width] = "100%")), is_percentage(opts[opts.d.width]) && (crsl.upDateOnWindowResize = !0, crsl.primarySizePercentage = opts[opts.d.width], opts[opts.d.width] = ms_getPercentage(e, crsl.primarySizePercentage), opts.items.visible || (opts.items.visibleConf.variable = !0)), opts.responsive ? (opts.usePadding = !1, opts.padding = [0, 0, 0, 0], opts.align = !1, opts.items.visibleConf.variable = !1) : (opts.items.visible || (opts = in_complementVisibleItems(opts, e)), opts[opts.d.width] || (!opts.items.visibleConf.variable && is_number(opts.items[opts.d.width]) && "*" == opts.items.filter ? (opts[opts.d.width] = opts.items.visible * opts.items[opts.d.width], opts.align = !1) : opts[opts.d.width] = "variable"), is_undefined(opts.align) && (opts.align = is_number(opts[opts.d.width]) ? "center" : !1), opts.items.visibleConf.variable && (opts.items.visible = gn_getVisibleItemsNext(d, opts, 0))), "*" == opts.items.filter || opts.items.visibleConf.variable || (opts.items.visibleConf.org = opts.items.visible, opts.items.visible = gn_getVisibleItemsNextFilter(d, opts, 0)), opts.items.visible = cf_getItemsAdjust(opts.items.visible, opts, opts.items.visibleConf.adjust, $tt0), opts.items.visibleConf.old = opts.items.visible, opts.responsive) opts.items.visibleConf.min || (opts.items.visibleConf.min = opts.items.visible), opts.items.visibleConf.max || (opts.items.visibleConf.max = opts.items.visible), opts = in_getResponsiveValues(opts, d, e);
            else switch (opts.padding = cf_getPadding(opts.padding), "top" == opts.align ? opts.align = "left" : "bottom" == opts.align && (opts.align = "right"), opts.align) {
                case "center":
                case "left":
                case "right":
                    "variable" != opts[opts.d.width] && (opts = in_getAlignPadding(opts, d), opts.usePadding = !0);
                    break;
                default:
                    opts.align = !1, opts.usePadding = 0 == opts.padding[0] && 0 == opts.padding[1] && 0 == opts.padding[2] && 0 == opts.padding[3] ? !1 : !0
            }
            is_number(opts.scroll.duration) || (opts.scroll.duration = 500), is_undefined(opts.scroll.items) && (opts.scroll.items = opts.responsive || opts.items.visibleConf.variable || "*" != opts.items.filter ? "visible" : opts.items.visible), opts.auto = $.extend(!0, {}, opts.scroll, opts.auto), opts.prev = $.extend(!0, {}, opts.scroll, opts.prev), opts.next = $.extend(!0, {}, opts.scroll, opts.next), opts.pagination = $.extend(!0, {}, opts.scroll, opts.pagination), opts.auto = go_complementAutoObject($tt0, opts.auto), opts.prev = go_complementPrevNextObject($tt0, opts.prev), opts.next = go_complementPrevNextObject($tt0, opts.next), opts.pagination = go_complementPaginationObject($tt0, opts.pagination), opts.swipe = go_complementSwipeObject($tt0, opts.swipe), opts.mousewheel = go_complementMousewheelObject($tt0, opts.mousewheel), opts.synchronise && (opts.synchronise = cf_getSynchArr(opts.synchronise)), opts.auto.onPauseStart && (opts.auto.onTimeoutStart = opts.auto.onPauseStart, deprecated("auto.onPauseStart", "auto.onTimeoutStart")), opts.auto.onPausePause && (opts.auto.onTimeoutPause = opts.auto.onPausePause, deprecated("auto.onPausePause", "auto.onTimeoutPause")), opts.auto.onPauseEnd && (opts.auto.onTimeoutEnd = opts.auto.onPauseEnd, deprecated("auto.onPauseEnd", "auto.onTimeoutEnd")), opts.auto.pauseDuration && (opts.auto.timeoutDuration = opts.auto.pauseDuration, deprecated("auto.pauseDuration", "auto.timeoutDuration"))
        }, FN._build = function() {
            $cfs.data("_cfs_isCarousel", !0);
            var a = $cfs.children(),
                b = in_mapCss($cfs, ["textAlign", "float", "position", "top", "right", "bottom", "left", "zIndex", "width", "height", "marginTop", "marginRight", "marginBottom", "marginLeft"]),
                c = "relative";
            switch (b.position) {
                case "absolute":
                case "fixed":
                    c = b.position
            }
            "parent" == conf.wrapper ? sz_storeOrigCss($wrp) : $wrp.css(b), $wrp.css({
                overflow: "hidden",
                position: c
            }), sz_storeOrigCss($cfs), $cfs.data("_cfs_origCssZindex", b.zIndex), $cfs.css({
                textAlign: "left",
                "float": "none",
                position: "absolute",
                top: 0,
                right: "auto",
                bottom: "auto",
                left: 0,
                marginTop: 0,
                marginRight: 0,
                marginBottom: 0,
                marginLeft: 0
            }), sz_storeMargin(a, opts), sz_storeOrigCss(a), opts.responsive && sz_setResponsiveSizes(opts, a)
        }, FN._bind_events = function() {
            FN._unbind_events(), $cfs.bind(cf_e("stop", conf), function(a, b) {
                return a.stopPropagation(), crsl.isStopped || opts.auto.button && opts.auto.button.addClass(cf_c("stopped", conf)), crsl.isStopped = !0, opts.auto.play && (opts.auto.play = !1, $cfs.trigger(cf_e("pause", conf), b)), !0
            }), $cfs.bind(cf_e("finish", conf), function(a) {
                return a.stopPropagation(), crsl.isScrolling && sc_stopScroll(scrl), !0
            }), $cfs.bind(cf_e("pause", conf), function(a, b, c) {
                if (a.stopPropagation(), tmrs = sc_clearTimers(tmrs), b && crsl.isScrolling) {
                    scrl.isStopped = !0;
                    var d = getTime() - scrl.startTime;
                    scrl.duration -= d, scrl.pre && (scrl.pre.duration -= d), scrl.post && (scrl.post.duration -= d), sc_stopScroll(scrl, !1)
                }
                if (crsl.isPaused || crsl.isScrolling || c && (tmrs.timePassed += getTime() - tmrs.startTime), crsl.isPaused || opts.auto.button && opts.auto.button.addClass(cf_c("paused", conf)), crsl.isPaused = !0, opts.auto.onTimeoutPause) {
                    var e = opts.auto.timeoutDuration - tmrs.timePassed,
                        f = 100 - Math.ceil(100 * e / opts.auto.timeoutDuration);
                    opts.auto.onTimeoutPause.call($tt0, f, e)
                }
                return !0
            }), $cfs.bind(cf_e("play", conf), function(a, b, c, d) {
                a.stopPropagation(), tmrs = sc_clearTimers(tmrs);
                var e = [b, c, d],
                    f = ["string", "number", "boolean"],
                    g = cf_sortParams(e, f);
                if (b = g[0], c = g[1], d = g[2], "prev" != b && "next" != b && (b = crsl.direction), is_number(c) || (c = 0), is_boolean(d) || (d = !1), d && (crsl.isStopped = !1, opts.auto.play = !0), !opts.auto.play) return a.stopImmediatePropagation(), debug(conf, "Carousel stopped: Not scrolling.");
                crsl.isPaused && opts.auto.button && (opts.auto.button.removeClass(cf_c("stopped", conf)), opts.auto.button.removeClass(cf_c("paused", conf))), crsl.isPaused = !1, tmrs.startTime = getTime();
                var h = opts.auto.timeoutDuration + c;
                return dur2 = h - tmrs.timePassed, perc = 100 - Math.ceil(100 * dur2 / h), opts.auto.progress && (tmrs.progress = setInterval(function() {
                    var a = getTime() - tmrs.startTime + tmrs.timePassed,
                        b = Math.ceil(100 * a / h);
                    opts.auto.progress.updater.call(opts.auto.progress.bar[0], b)
                }, opts.auto.progress.interval)), tmrs.auto = setTimeout(function() {
                    opts.auto.progress && opts.auto.progress.updater.call(opts.auto.progress.bar[0], 100), opts.auto.onTimeoutEnd && opts.auto.onTimeoutEnd.call($tt0, perc, dur2), crsl.isScrolling ? $cfs.trigger(cf_e("play", conf), b) : $cfs.trigger(cf_e(b, conf), opts.auto)
                }, dur2), opts.auto.onTimeoutStart && opts.auto.onTimeoutStart.call($tt0, perc, dur2), !0
            }), $cfs.bind(cf_e("resume", conf), function(a) {
                return a.stopPropagation(), scrl.isStopped ? (scrl.isStopped = !1, crsl.isPaused = !1, crsl.isScrolling = !0, scrl.startTime = getTime(), sc_startScroll(scrl, conf)) : $cfs.trigger(cf_e("play", conf)), !0
            }), $cfs.bind(cf_e("prev", conf) + " " + cf_e("next", conf), function(a, b, c, d, e) {
                if (a.stopPropagation(), crsl.isStopped || $cfs.is(":hidden")) return a.stopImmediatePropagation(), debug(conf, "Carousel stopped or hidden: Not scrolling.");
                var f = is_number(opts.items.minimum) ? opts.items.minimum : opts.items.visible + 1;
                if (f > itms.total) return a.stopImmediatePropagation(), debug(conf, "Not enough items (" + itms.total + " total, " + f + " needed): Not scrolling.");
                var g = [b, c, d, e],
                    h = ["object", "number/string", "function", "boolean"],
                    i = cf_sortParams(g, h);
                b = i[0], c = i[1], d = i[2], e = i[3];
                var j = a.type.slice(conf.events.prefix.length);
                if (is_object(b) || (b = {}), is_function(d) && (b.onAfter = d), is_boolean(e) && (b.queue = e), b = $.extend(!0, {}, opts[j], b), b.conditions && !b.conditions.call($tt0, j)) return a.stopImmediatePropagation(), debug(conf, 'Callback "conditions" returned false.');
                if (!is_number(c)) {
                    if ("*" != opts.items.filter) c = "visible";
                    else
                        for (var k = [c, b.items, opts[j].items], i = 0, l = k.length; l > i; i++)
                            if (is_number(k[i]) || "page" == k[i] || "visible" == k[i]) {
                                c = k[i];
                                break
                            } switch (c) {
                        case "page":
                            return a.stopImmediatePropagation(), $cfs.triggerHandler(cf_e(j + "Page", conf), [b, d]);
                        case "visible":
                            opts.items.visibleConf.variable || "*" != opts.items.filter || (c = opts.items.visible)
                    }
                }
                if (scrl.isStopped) return $cfs.trigger(cf_e("resume", conf)), $cfs.trigger(cf_e("queue", conf), [j, [b, c, d]]), a.stopImmediatePropagation(), debug(conf, "Carousel resumed scrolling.");
                if (b.duration > 0 && crsl.isScrolling) return b.queue && ("last" == b.queue && (queu = []), ("first" != b.queue || 0 == queu.length) && $cfs.trigger(cf_e("queue", conf), [j, [b, c, d]])), a.stopImmediatePropagation(), debug(conf, "Carousel currently scrolling.");
                if (tmrs.timePassed = 0, $cfs.trigger(cf_e("slide_" + j, conf), [b, c]), opts.synchronise)
                    for (var m = opts.synchronise, n = [b, c], o = 0, l = m.length; l > o; o++) {
                        var p = j;
                        m[o][2] || (p = "prev" == p ? "next" : "prev"), m[o][1] || (n[0] = m[o][0].triggerHandler("_cfs_triggerEvent", ["configuration", p])), n[1] = c + m[o][3], m[o][0].trigger("_cfs_triggerEvent", ["slide_" + p, n])
                    }
                return !0
            }), $cfs.bind(cf_e("slide_prev", conf), function(a, b, c) {
                a.stopPropagation();
                var d = $cfs.children();
                if (!opts.circular && 0 == itms.first) return opts.infinite && $cfs.trigger(cf_e("next", conf), itms.total - 1), a.stopImmediatePropagation();
                if (sz_resetMargin(d, opts), !is_number(c)) {
                    if (opts.items.visibleConf.variable) c = gn_getVisibleItemsPrev(d, opts, itms.total - 1);
                    else if ("*" != opts.items.filter) {
                        var e = is_number(b.items) ? b.items : gn_getVisibleOrg($cfs, opts);
                        c = gn_getScrollItemsPrevFilter(d, opts, itms.total - 1, e)
                    } else c = opts.items.visible;
                    c = cf_getAdjust(c, opts, b.items, $tt0)
                }
                if (opts.circular || itms.total - c < itms.first && (c = itms.total - itms.first), opts.items.visibleConf.old = opts.items.visible, opts.items.visibleConf.variable) {
                    var f = cf_getItemsAdjust(gn_getVisibleItemsNext(d, opts, itms.total - c), opts, opts.items.visibleConf.adjust, $tt0);
                    f >= opts.items.visible + c && itms.total > c && (c++, f = cf_getItemsAdjust(gn_getVisibleItemsNext(d, opts, itms.total - c), opts, opts.items.visibleConf.adjust, $tt0)), opts.items.visible = f
                } else if ("*" != opts.items.filter) {
                    var f = gn_getVisibleItemsNextFilter(d, opts, itms.total - c);
                    opts.items.visible = cf_getItemsAdjust(f, opts, opts.items.visibleConf.adjust, $tt0)
                }
                if (sz_resetMargin(d, opts, !0), 0 == c) return a.stopImmediatePropagation(), debug(conf, "0 items to scroll: Not scrolling.");
                for (debug(conf, "Scrolling " + c + " items backward."), itms.first += c; itms.first >= itms.total;) itms.first -= itms.total;
                opts.circular || (0 == itms.first && b.onEnd && b.onEnd.call($tt0, "prev"), opts.infinite || nv_enableNavi(opts, itms.first, conf)), $cfs.children().slice(itms.total - c, itms.total).prependTo($cfs), itms.total < opts.items.visible + c && $cfs.children().slice(0, opts.items.visible + c - itms.total).clone(!0).appendTo($cfs);
                var d = $cfs.children(),
                    g = gi_getOldItemsPrev(d, opts, c),
                    h = gi_getNewItemsPrev(d, opts),
                    i = d.eq(c - 1),
                    j = g.last(),
                    k = h.last();
                sz_resetMargin(d, opts);
                var l = 0,
                    m = 0;
                if (opts.align) {
                    var n = cf_getAlignPadding(h, opts);
                    l = n[0], m = n[1]
                }
                var o = 0 > l ? opts.padding[opts.d[3]] : 0,
                    p = !1,
                    q = $();
                if (c > opts.items.visible && (q = d.slice(opts.items.visibleConf.old, c), "directscroll" == b.fx)) {
                    var r = opts.items[opts.d.width];
                    p = q, i = k, sc_hideHiddenItems(p), opts.items[opts.d.width] = "variable"
                }
                var s = !1,
                    t = ms_getTotalSize(d.slice(0, c), opts, "width"),
                    u = cf_mapWrapperSizes(ms_getSizes(h, opts, !0), opts, !opts.usePadding),
                    v = 0,
                    w = {},
                    x = {},
                    y = {},
                    z = {},
                    A = {},
                    B = {},
                    C = {},
                    D = sc_getDuration(b, opts, c, t);
                switch (b.fx) {
                    case "cover":
                    case "cover-fade":
                        v = ms_getTotalSize(d.slice(0, opts.items.visible), opts, "width")
                }
                p && (opts.items[opts.d.width] = r), sz_resetMargin(d, opts, !0), m >= 0 && sz_resetMargin(j, opts, opts.padding[opts.d[1]]), l >= 0 && sz_resetMargin(i, opts, opts.padding[opts.d[3]]), opts.align && (opts.padding[opts.d[1]] = m, opts.padding[opts.d[3]] = l), B[opts.d.left] = -(t - o), C[opts.d.left] = -(v - o), x[opts.d.left] = u[opts.d.width];
                var E = function() {},
                    F = function() {},
                    G = function() {},
                    H = function() {},
                    I = function() {},
                    J = function() {},
                    K = function() {},
                    L = function() {},
                    M = function() {},
                    N = function() {},
                    O = function() {};
                switch (b.fx) {
                    case "crossfade":
                    case "cover":
                    case "cover-fade":
                    case "uncover":
                    case "uncover-fade":
                        s = $cfs.clone(!0).appendTo($wrp)
                }
                switch (b.fx) {
                    case "crossfade":
                    case "uncover":
                    case "uncover-fade":
                        s.children().slice(0, c).remove(), s.children().slice(opts.items.visibleConf.old).remove();
                        break;
                    case "cover":
                    case "cover-fade":
                        s.children().slice(opts.items.visible).remove(), s.css(C)
                }
                if ($cfs.css(B), scrl = sc_setScroll(D, b.easing, conf), w[opts.d.left] = opts.usePadding ? opts.padding[opts.d[3]] : 0, ("variable" == opts[opts.d.width] || "variable" == opts[opts.d.height]) && (E = function() {
                        $wrp.css(u)
                    }, F = function() {
                        scrl.anims.push([$wrp, u])
                    }), opts.usePadding) {
                    switch (k.not(i).length && (y[opts.d.marginRight] = i.data("_cfs_origCssMargin"), 0 > l ? i.css(y) : (K = function() {
                        i.css(y)
                    }, L = function() {
                        scrl.anims.push([i, y])
                    })), b.fx) {
                        case "cover":
                        case "cover-fade":
                            s.children().eq(c - 1).css(y)
                    }
                    k.not(j).length && (z[opts.d.marginRight] = j.data("_cfs_origCssMargin"), G = function() {
                        j.css(z)
                    }, H = function() {
                        scrl.anims.push([j, z])
                    }), m >= 0 && (A[opts.d.marginRight] = k.data("_cfs_origCssMargin") + opts.padding[opts.d[1]], I = function() {
                        k.css(A)
                    }, J = function() {
                        scrl.anims.push([k, A])
                    })
                }
                O = function() {
                    $cfs.css(w)
                };
                var P = opts.items.visible + c - itms.total;
                N = function() {
                    if (P > 0 && ($cfs.children().slice(itms.total).remove(), g = $($cfs.children().slice(itms.total - (opts.items.visible - P)).get().concat($cfs.children().slice(0, P).get()))), sc_showHiddenItems(p), opts.usePadding) {
                        var a = $cfs.children().eq(opts.items.visible + c - 1);
                        a.css(opts.d.marginRight, a.data("_cfs_origCssMargin"))
                    }
                };
                var Q = sc_mapCallbackArguments(g, q, h, c, "prev", D, u);
                switch (M = function() {
                    sc_afterScroll($cfs, s, b), crsl.isScrolling = !1, clbk.onAfter = sc_fireCallbacks($tt0, b, "onAfter", Q, clbk), queu = sc_fireQueue($cfs, queu, conf), crsl.isPaused || $cfs.trigger(cf_e("play", conf))
                }, crsl.isScrolling = !0, tmrs = sc_clearTimers(tmrs), clbk.onBefore = sc_fireCallbacks($tt0, b, "onBefore", Q, clbk), b.fx) {
                    case "none":
                        $cfs.css(w), E(), G(), I(), K(), O(), N(), M();
                        break;
                    case "fade":
                        scrl.anims.push([$cfs, {
                            opacity: 0
                        }, function() {
                            E(), G(), I(), K(), O(), N(), scrl = sc_setScroll(D, b.easing, conf), scrl.anims.push([$cfs, {
                                opacity: 1
                            }, M]), sc_startScroll(scrl, conf)
                        }]);
                        break;
                    case "crossfade":
                        $cfs.css({
                            opacity: 0
                        }), scrl.anims.push([s, {
                            opacity: 0
                        }]), scrl.anims.push([$cfs, {
                            opacity: 1
                        }, M]), F(), G(), I(), K(), O(), N();
                        break;
                    case "cover":
                        scrl.anims.push([s, w, function() {
                            G(), I(), K(), O(), N(), M()
                        }]), F();
                        break;
                    case "cover-fade":
                        scrl.anims.push([$cfs, {
                            opacity: 0
                        }]), scrl.anims.push([s, w, function() {
                            G(), I(), K(), O(), N(), M()
                        }]), F();
                        break;
                    case "uncover":
                        scrl.anims.push([s, x, M]), F(), G(), I(), K(), O(), N();
                        break;
                    case "uncover-fade":
                        $cfs.css({
                            opacity: 0
                        }), scrl.anims.push([$cfs, {
                            opacity: 1
                        }]), scrl.anims.push([s, x, M]), F(), G(), I(), K(), O(), N();
                        break;
                    default:
                        scrl.anims.push([$cfs, w, function() {
                            N(), M()
                        }]), F(), H(), J(), L()
                }
                return sc_startScroll(scrl, conf), cf_setCookie(opts.cookie, $cfs, conf), $cfs.trigger(cf_e("updatePageStatus", conf), [!1, u]), !0
            }), $cfs.bind(cf_e("slide_next", conf), function(a, b, c) {
                a.stopPropagation();
                var d = $cfs.children();
                if (!opts.circular && itms.first == opts.items.visible) return opts.infinite && $cfs.trigger(cf_e("prev", conf), itms.total - 1), a.stopImmediatePropagation();
                if (sz_resetMargin(d, opts), !is_number(c)) {
                    if ("*" != opts.items.filter) {
                        var e = is_number(b.items) ? b.items : gn_getVisibleOrg($cfs, opts);
                        c = gn_getScrollItemsNextFilter(d, opts, 0, e)
                    } else c = opts.items.visible;
                    c = cf_getAdjust(c, opts, b.items, $tt0)
                }
                var f = 0 == itms.first ? itms.total : itms.first;
                if (!opts.circular) {
                    if (opts.items.visibleConf.variable) var g = gn_getVisibleItemsNext(d, opts, c),
                        e = gn_getVisibleItemsPrev(d, opts, f - 1);
                    else var g = opts.items.visible,
                        e = opts.items.visible;
                    c + g > f && (c = f - e)
                }
                if (opts.items.visibleConf.old = opts.items.visible, opts.items.visibleConf.variable) {
                    for (var g = cf_getItemsAdjust(gn_getVisibleItemsNextTestCircular(d, opts, c, f), opts, opts.items.visibleConf.adjust, $tt0); opts.items.visible - c >= g && itms.total > c;) c++, g = cf_getItemsAdjust(gn_getVisibleItemsNextTestCircular(d, opts, c, f), opts, opts.items.visibleConf.adjust, $tt0);
                    opts.items.visible = g
                } else if ("*" != opts.items.filter) {
                    var g = gn_getVisibleItemsNextFilter(d, opts, c);
                    opts.items.visible = cf_getItemsAdjust(g, opts, opts.items.visibleConf.adjust, $tt0)
                }
                if (sz_resetMargin(d, opts, !0), 0 == c) return a.stopImmediatePropagation(), debug(conf, "0 items to scroll: Not scrolling.");
                for (debug(conf, "Scrolling " + c + " items forward."), itms.first -= c; 0 > itms.first;) itms.first += itms.total;
                opts.circular || (itms.first == opts.items.visible && b.onEnd && b.onEnd.call($tt0, "next"), opts.infinite || nv_enableNavi(opts, itms.first, conf)), itms.total < opts.items.visible + c && $cfs.children().slice(0, opts.items.visible + c - itms.total).clone(!0).appendTo($cfs);
                var d = $cfs.children(),
                    h = gi_getOldItemsNext(d, opts),
                    i = gi_getNewItemsNext(d, opts, c),
                    j = d.eq(c - 1),
                    k = h.last(),
                    l = i.last();
                sz_resetMargin(d, opts);
                var m = 0,
                    n = 0;
                if (opts.align) {
                    var o = cf_getAlignPadding(i, opts);
                    m = o[0], n = o[1]
                }
                var p = !1,
                    q = $();
                if (c > opts.items.visibleConf.old && (q = d.slice(opts.items.visibleConf.old, c), "directscroll" == b.fx)) {
                    var r = opts.items[opts.d.width];
                    p = q, j = k, sc_hideHiddenItems(p), opts.items[opts.d.width] = "variable"
                }
                var s = !1,
                    t = ms_getTotalSize(d.slice(0, c), opts, "width"),
                    u = cf_mapWrapperSizes(ms_getSizes(i, opts, !0), opts, !opts.usePadding),
                    v = 0,
                    w = {},
                    x = {},
                    y = {},
                    z = {},
                    A = {},
                    B = sc_getDuration(b, opts, c, t);
                switch (b.fx) {
                    case "uncover":
                    case "uncover-fade":
                        v = ms_getTotalSize(d.slice(0, opts.items.visibleConf.old), opts, "width")
                }
                p && (opts.items[opts.d.width] = r), opts.align && 0 > opts.padding[opts.d[1]] && (opts.padding[opts.d[1]] = 0), sz_resetMargin(d, opts, !0), sz_resetMargin(k, opts, opts.padding[opts.d[1]]), opts.align && (opts.padding[opts.d[1]] = n, opts.padding[opts.d[3]] = m), A[opts.d.left] = opts.usePadding ? opts.padding[opts.d[3]] : 0;
                var C = function() {},
                    D = function() {},
                    E = function() {},
                    F = function() {},
                    G = function() {},
                    H = function() {},
                    I = function() {},
                    J = function() {},
                    K = function() {};
                switch (b.fx) {
                    case "crossfade":
                    case "cover":
                    case "cover-fade":
                    case "uncover":
                    case "uncover-fade":
                        s = $cfs.clone(!0).appendTo($wrp), s.children().slice(opts.items.visibleConf.old).remove()
                }
                switch (b.fx) {
                    case "crossfade":
                    case "cover":
                    case "cover-fade":
                        $cfs.css("zIndex", 1), s.css("zIndex", 0)
                }
                if (scrl = sc_setScroll(B, b.easing, conf), w[opts.d.left] = -t, x[opts.d.left] = -v, 0 > m && (w[opts.d.left] += m), ("variable" == opts[opts.d.width] || "variable" == opts[opts.d.height]) && (C = function() {
                        $wrp.css(u)
                    }, D = function() {
                        scrl.anims.push([$wrp, u])
                    }), opts.usePadding) {
                    var L = l.data("_cfs_origCssMargin");
                    n >= 0 && (L += opts.padding[opts.d[1]]), l.css(opts.d.marginRight, L), j.not(k).length && (z[opts.d.marginRight] = k.data("_cfs_origCssMargin")), E = function() {
                        k.css(z)
                    }, F = function() {
                        scrl.anims.push([k, z])
                    };
                    var M = j.data("_cfs_origCssMargin");
                    m > 0 && (M += opts.padding[opts.d[3]]), y[opts.d.marginRight] = M, G = function() {
                        j.css(y)
                    }, H = function() {
                        scrl.anims.push([j, y])
                    }
                }
                K = function() {
                    $cfs.css(A)
                };
                var N = opts.items.visible + c - itms.total;
                J = function() {
                    N > 0 && $cfs.children().slice(itms.total).remove();
                    var a = $cfs.children().slice(0, c).appendTo($cfs).last();
                    if (N > 0 && (i = gi_getCurrentItems(d, opts)), sc_showHiddenItems(p), opts.usePadding) {
                        if (itms.total < opts.items.visible + c) {
                            var b = $cfs.children().eq(opts.items.visible - 1);
                            b.css(opts.d.marginRight, b.data("_cfs_origCssMargin") + opts.padding[opts.d[1]])
                        }
                        a.css(opts.d.marginRight, a.data("_cfs_origCssMargin"))
                    }
                };
                var O = sc_mapCallbackArguments(h, q, i, c, "next", B, u);
                switch (I = function() {
                    $cfs.css("zIndex", $cfs.data("_cfs_origCssZindex")), sc_afterScroll($cfs, s, b), crsl.isScrolling = !1, clbk.onAfter = sc_fireCallbacks($tt0, b, "onAfter", O, clbk), queu = sc_fireQueue($cfs, queu, conf), crsl.isPaused || $cfs.trigger(cf_e("play", conf))
                }, crsl.isScrolling = !0, tmrs = sc_clearTimers(tmrs), clbk.onBefore = sc_fireCallbacks($tt0, b, "onBefore", O, clbk), b.fx) {
                    case "none":
                        $cfs.css(w), C(), E(), G(), K(), J(), I();
                        break;
                    case "fade":
                        scrl.anims.push([$cfs, {
                            opacity: 0
                        }, function() {
                            C(), E(), G(), K(), J(), scrl = sc_setScroll(B, b.easing, conf), scrl.anims.push([$cfs, {
                                opacity: 1
                            }, I]), sc_startScroll(scrl, conf)
                        }]);
                        break;
                    case "crossfade":
                        $cfs.css({
                            opacity: 0
                        }), scrl.anims.push([s, {
                            opacity: 0
                        }]), scrl.anims.push([$cfs, {
                            opacity: 1
                        }, I]), D(), E(), G(), K(), J();
                        break;
                    case "cover":
                        $cfs.css(opts.d.left, $wrp[opts.d.width]()), scrl.anims.push([$cfs, A, I]), D(), E(), G(), J();
                        break;
                    case "cover-fade":
                        $cfs.css(opts.d.left, $wrp[opts.d.width]()), scrl.anims.push([s, {
                            opacity: 0
                        }]), scrl.anims.push([$cfs, A, I]), D(), E(), G(), J();
                        break;
                    case "uncover":
                        scrl.anims.push([s, x, I]), D(), E(), G(), K(), J();
                        break;
                    case "uncover-fade":
                        $cfs.css({
                            opacity: 0
                        }), scrl.anims.push([$cfs, {
                            opacity: 1
                        }]), scrl.anims.push([s, x, I]), D(), E(), G(), K(), J();
                        break;
                    default:
                        scrl.anims.push([$cfs, w, function() {
                            K(), J(), I()
                        }]), D(), F(), H()
                }
                return sc_startScroll(scrl, conf), cf_setCookie(opts.cookie, $cfs, conf), $cfs.trigger(cf_e("updatePageStatus", conf), [!1, u]), !0
            }), $cfs.bind(cf_e("slideTo", conf), function(a, b, c, d, e, f, g) {
                a.stopPropagation();
                var h = [b, c, d, e, f, g],
                    i = ["string/number/object", "number", "boolean", "object", "string", "function"],
                    j = cf_sortParams(h, i);
                return e = j[3], f = j[4], g = j[5], b = gn_getItemIndex(j[0], j[1], j[2], itms, $cfs), 0 == b ? !1 : (is_object(e) || (e = !1), "prev" != f && "next" != f && (f = opts.circular ? itms.total / 2 >= b ? "next" : "prev" : 0 == itms.first || itms.first > b ? "next" : "prev"), "prev" == f && (b = itms.total - b), $cfs.trigger(cf_e(f, conf), [e, b, g]), !0)
            }), $cfs.bind(cf_e("prevPage", conf), function(a, b, c) {
                a.stopPropagation();
                var d = $cfs.triggerHandler(cf_e("currentPage", conf));
                return $cfs.triggerHandler(cf_e("slideToPage", conf), [d - 1, b, "prev", c])
            }), $cfs.bind(cf_e("nextPage", conf), function(a, b, c) {
                a.stopPropagation();
                var d = $cfs.triggerHandler(cf_e("currentPage", conf));
                return $cfs.triggerHandler(cf_e("slideToPage", conf), [d + 1, b, "next", c])
            }), $cfs.bind(cf_e("slideToPage", conf), function(a, b, c, d, e) {
                a.stopPropagation(), is_number(b) || (b = $cfs.triggerHandler(cf_e("currentPage", conf)));
                var f = opts.pagination.items || opts.items.visible,
                    g = Math.ceil(itms.total / f) - 1;
                return 0 > b && (b = g), b > g && (b = 0), $cfs.triggerHandler(cf_e("slideTo", conf), [b * f, 0, !0, c, d, e])
            }), $cfs.bind(cf_e("jumpToStart", conf), function(a, b) {
                if (a.stopPropagation(), b = b ? gn_getItemIndex(b, 0, !0, itms, $cfs) : 0, b += itms.first, 0 != b) {
                    if (itms.total > 0)
                        for (; b > itms.total;) b -= itms.total;
                    $cfs.prepend($cfs.children().slice(b, itms.total))
                }
                return !0
            }), $cfs.bind(cf_e("synchronise", conf), function(a, b) {
                if (a.stopPropagation(), b) b = cf_getSynchArr(b);
                else {
                    if (!opts.synchronise) return debug(conf, "No carousel to synchronise.");
                    b = opts.synchronise
                }
                for (var c = $cfs.triggerHandler(cf_e("currentPosition", conf)), d = !0, e = 0, f = b.length; f > e; e++) b[e][0].triggerHandler(cf_e("slideTo", conf), [c, b[e][3], !0]) || (d = !1);
                return d
            }), $cfs.bind(cf_e("queue", conf), function(a, b, c) {
                return a.stopPropagation(), is_function(b) ? b.call($tt0, queu) : is_array(b) ? queu = b : is_undefined(b) || queu.push([b, c]), queu
            }), $cfs.bind(cf_e("insertItem", conf), function(a, b, c, d, e) {
                a.stopPropagation();
                var f = [b, c, d, e],
                    g = ["string/object", "string/number/object", "boolean", "number"],
                    h = cf_sortParams(f, g);
                if (b = h[0], c = h[1], d = h[2], e = h[3], is_object(b) && !is_jquery(b) ? b = $(b) : is_string(b) && (b = $(b)), !is_jquery(b) || 0 == b.length) return debug(conf, "Not a valid object.");
                is_undefined(c) && (c = "end"), sz_storeMargin(b, opts), sz_storeOrigCss(b);
                var i = c,
                    j = "before";
                "end" == c ? d ? (0 == itms.first ? (c = itms.total - 1, j = "after") : (c = itms.first, itms.first += b.length), 0 > c && (c = 0)) : (c = itms.total - 1, j = "after") : c = gn_getItemIndex(c, e, d, itms, $cfs);
                var k = $cfs.children().eq(c);
                return k.length ? k[j](b) : (debug(conf, "Correct insert-position not found! Appending item to the end."), $cfs.append(b)), "end" == i || d || itms.first > c && (itms.first += b.length), itms.total = $cfs.children().length, itms.first >= itms.total && (itms.first -= itms.total), $cfs.trigger(cf_e("updateSizes", conf)), $cfs.trigger(cf_e("linkAnchors", conf)), !0
            }), $cfs.bind(cf_e("removeItem", conf), function(a, b, c, d) {
                a.stopPropagation();
                var e = [b, c, d],
                    f = ["string/number/object", "boolean", "number"],
                    g = cf_sortParams(e, f);
                if (b = g[0], c = g[1], d = g[2], b instanceof $ && b.length > 1) return i = $(), b.each(function() {
                    var e = $cfs.trigger(cf_e("removeItem", conf), [$(this), c, d]);
                    e && (i = i.add(e))
                }), i;
                if (is_undefined(b) || "end" == b) i = $cfs.children().last();
                else {
                    b = gn_getItemIndex(b, d, c, itms, $cfs);
                    var i = $cfs.children().eq(b);
                    i.length && itms.first > b && (itms.first -= i.length)
                }
                return i && i.length && (i.detach(), itms.total = $cfs.children().length, $cfs.trigger(cf_e("updateSizes", conf))), i
            }), $cfs.bind(cf_e("onBefore", conf) + " " + cf_e("onAfter", conf), function(a, b) {
                a.stopPropagation();
                var c = a.type.slice(conf.events.prefix.length);
                return is_array(b) && (clbk[c] = b), is_function(b) && clbk[c].push(b), clbk[c]
            }), $cfs.bind(cf_e("currentPosition", conf), function(a, b) {
                if (a.stopPropagation(), 0 == itms.first) var c = 0;
                else var c = itms.total - itms.first;
                return is_function(b) && b.call($tt0, c), c
            }), $cfs.bind(cf_e("currentPage", conf), function(a, b) {
                a.stopPropagation();
                var e, c = opts.pagination.items || opts.items.visible,
                    d = Math.ceil(itms.total / c - 1);
                return e = 0 == itms.first ? 0 : itms.first < itms.total % c ? 0 : itms.first != c || opts.circular ? Math.round((itms.total - itms.first) / c) : d, 0 > e && (e = 0), e > d && (e = d), is_function(b) && b.call($tt0, e), e
            }), $cfs.bind(cf_e("currentVisible", conf), function(a, b) {
                a.stopPropagation();
                var c = gi_getCurrentItems($cfs.children(), opts);
                return is_function(b) && b.call($tt0, c), c
            }), $cfs.bind(cf_e("slice", conf), function(a, b, c, d) {
                if (a.stopPropagation(), 0 == itms.total) return !1;
                var e = [b, c, d],
                    f = ["number", "number", "function"],
                    g = cf_sortParams(e, f);
                if (b = is_number(g[0]) ? g[0] : 0, c = is_number(g[1]) ? g[1] : itms.total, d = g[2], b += itms.first, c += itms.first, items.total > 0) {
                    for (; b > itms.total;) b -= itms.total;
                    for (; c > itms.total;) c -= itms.total;
                    for (; 0 > b;) b += itms.total;
                    for (; 0 > c;) c += itms.total
                }
                var i, h = $cfs.children();
                return i = c > b ? h.slice(b, c) : $(h.slice(b, itms.total).get().concat(h.slice(0, c).get())), is_function(d) && d.call($tt0, i), i
            }), $cfs.bind(cf_e("isPaused", conf) + " " + cf_e("isStopped", conf) + " " + cf_e("isScrolling", conf), function(a, b) {
                a.stopPropagation();
                var c = a.type.slice(conf.events.prefix.length),
                    d = crsl[c];
                return is_function(b) && b.call($tt0, d), d
            }), $cfs.bind(cf_e("configuration", conf), function(e, a, b, c) {
                e.stopPropagation();
                var reInit = !1;
                if (is_function(a)) a.call($tt0, opts);
                else if (is_object(a)) opts_orig = $.extend(!0, {}, opts_orig, a), b !== !1 ? reInit = !0 : opts = $.extend(!0, {}, opts, a);
                else if (!is_undefined(a))
                    if (is_function(b)) {
                        var val = eval("opts." + a);
                        is_undefined(val) && (val = ""), b.call($tt0, val)
                    } else {
                        if (is_undefined(b)) return eval("opts." + a);
                        "boolean" != typeof c && (c = !0), eval("opts_orig." + a + " = b"), c !== !1 ? reInit = !0 : eval("opts." + a + " = b")
                    }
                if (reInit) {
                    sz_resetMargin($cfs.children(), opts), FN._init(opts_orig), FN._bind_buttons();
                    var sz = sz_setSizes($cfs, opts);
                    $cfs.trigger(cf_e("updatePageStatus", conf), [!0, sz])
                }
                return opts
            }), $cfs.bind(cf_e("linkAnchors", conf), function(a, b, c) {
                return a.stopPropagation(), is_undefined(b) ? b = $("body") : is_string(b) && (b = $(b)), is_jquery(b) && 0 != b.length ? (is_string(c) || (c = "a.caroufredsel"), b.find(c).each(function() {
                    var a = this.hash || "";
                    a.length > 0 && -1 != $cfs.children().index($(a)) && $(this).unbind("click").click(function(b) {
                        b.preventDefault(), $cfs.trigger(cf_e("slideTo", conf), a)
                    })
                }), !0) : debug(conf, "Not a valid object.")
            }), $cfs.bind(cf_e("updatePageStatus", conf), function(a, b) {
                if (a.stopPropagation(), opts.pagination.container) {
                    var d = opts.pagination.items || opts.items.visible,
                        e = Math.ceil(itms.total / d);
                    b && (opts.pagination.anchorBuilder && (opts.pagination.container.children().remove(), opts.pagination.container.each(function() {
                        for (var a = 0; e > a; a++) {
                            var b = $cfs.children().eq(gn_getItemIndex(a * d, 0, !0, itms, $cfs));
                            $(this).append(opts.pagination.anchorBuilder.call(b[0], a + 1))
                        }
                    })), opts.pagination.container.each(function() {
                        $(this).children().unbind(opts.pagination.event).each(function(a) {
                            $(this).bind(opts.pagination.event, function(b) {
                                b.preventDefault(), $cfs.trigger(cf_e("slideTo", conf), [a * d, -opts.pagination.deviation, !0, opts.pagination])
                            })
                        })
                    }));
                    var f = $cfs.triggerHandler(cf_e("currentPage", conf)) + opts.pagination.deviation;
                    return f >= e && (f = 0), 0 > f && (f = e - 1), opts.pagination.container.each(function() {
                        $(this).children().removeClass(cf_c("selected", conf)).eq(f).addClass(cf_c("selected", conf))
                    }), !0
                }
            }), $cfs.bind(cf_e("updateSizes", conf), function() {
                var b = opts.items.visible,
                    c = $cfs.children(),
                    d = ms_getParentSize($wrp, opts, "width");
                if (itms.total = c.length, crsl.primarySizePercentage ? (opts.maxDimension = d, opts[opts.d.width] = ms_getPercentage(d, crsl.primarySizePercentage)) : opts.maxDimension = ms_getMaxDimension(opts, d), opts.responsive ? (opts.items.width = opts.items.sizesConf.width, opts.items.height = opts.items.sizesConf.height, opts = in_getResponsiveValues(opts, c, d), b = opts.items.visible, sz_setResponsiveSizes(opts, c)) : opts.items.visibleConf.variable ? b = gn_getVisibleItemsNext(c, opts, 0) : "*" != opts.items.filter && (b = gn_getVisibleItemsNextFilter(c, opts, 0)), !opts.circular && 0 != itms.first && b > itms.first) {
                    if (opts.items.visibleConf.variable) var e = gn_getVisibleItemsPrev(c, opts, itms.first) - itms.first;
                    else if ("*" != opts.items.filter) var e = gn_getVisibleItemsPrevFilter(c, opts, itms.first) - itms.first;
                    else var e = opts.items.visible - itms.first;
                    debug(conf, "Preventing non-circular: sliding " + e + " items backward."), $cfs.trigger(cf_e("prev", conf), e)
                }
                opts.items.visible = cf_getItemsAdjust(b, opts, opts.items.visibleConf.adjust, $tt0), opts.items.visibleConf.old = opts.items.visible, opts = in_getAlignPadding(opts, c);
                var f = sz_setSizes($cfs, opts);
                return $cfs.trigger(cf_e("updatePageStatus", conf), [!0, f]), nv_showNavi(opts, itms.total, conf), nv_enableNavi(opts, itms.first, conf), f
            }), $cfs.bind(cf_e("destroy", conf), function(a, b) {
                return a.stopPropagation(), tmrs = sc_clearTimers(tmrs), $cfs.data("_cfs_isCarousel", !1), $cfs.trigger(cf_e("finish", conf)), b && $cfs.trigger(cf_e("jumpToStart", conf)), sz_restoreOrigCss($cfs.children()), sz_restoreOrigCss($cfs), FN._unbind_events(), FN._unbind_buttons(), "parent" == conf.wrapper ? sz_restoreOrigCss($wrp) : $wrp.replaceWith($cfs), !0
            }), $cfs.bind(cf_e("debug", conf), function() {
                return debug(conf, "Carousel width: " + opts.width), debug(conf, "Carousel height: " + opts.height), debug(conf, "Item widths: " + opts.items.width), debug(conf, "Item heights: " + opts.items.height), debug(conf, "Number of items visible: " + opts.items.visible), opts.auto.play && debug(conf, "Number of items scrolled automatically: " + opts.auto.items), opts.prev.button && debug(conf, "Number of items scrolled backward: " + opts.prev.items), opts.next.button && debug(conf, "Number of items scrolled forward: " + opts.next.items), conf.debug
            }), $cfs.bind("_cfs_triggerEvent", function(a, b, c) {
                return a.stopPropagation(), $cfs.triggerHandler(cf_e(b, conf), c)
            })
        }, FN._unbind_events = function() {
            $cfs.unbind(cf_e("", conf)), $cfs.unbind(cf_e("", conf, !1)), $cfs.unbind("_cfs_triggerEvent")
        }, FN._bind_buttons = function() {
            if (FN._unbind_buttons(), nv_showNavi(opts, itms.total, conf), nv_enableNavi(opts, itms.first, conf), opts.auto.pauseOnHover) {
                var a = bt_pauseOnHoverConfig(opts.auto.pauseOnHover);
                $wrp.bind(cf_e("mouseenter", conf, !1), function() {
                    $cfs.trigger(cf_e("pause", conf), a)
                }).bind(cf_e("mouseleave", conf, !1), function() {
                    $cfs.trigger(cf_e("resume", conf))
                })
            }
            if (opts.auto.button && opts.auto.button.bind(cf_e(opts.auto.event, conf, !1), function(a) {
                    a.preventDefault();
                    var b = !1,
                        c = null;
                    crsl.isPaused ? b = "play" : opts.auto.pauseOnEvent && (b = "pause", c = bt_pauseOnHoverConfig(opts.auto.pauseOnEvent)), b && $cfs.trigger(cf_e(b, conf), c)
                }), opts.prev.button && (opts.prev.button.bind(cf_e(opts.prev.event, conf, !1), function(a) {
                    a.preventDefault(), $cfs.trigger(cf_e("prev", conf))
                }), opts.prev.pauseOnHover)) {
                var a = bt_pauseOnHoverConfig(opts.prev.pauseOnHover);
                opts.prev.button.bind(cf_e("mouseenter", conf, !1), function() {
                    $cfs.trigger(cf_e("pause", conf), a)
                }).bind(cf_e("mouseleave", conf, !1), function() {
                    $cfs.trigger(cf_e("resume", conf))
                })
            }
            if (opts.next.button && (opts.next.button.bind(cf_e(opts.next.event, conf, !1), function(a) {
                    a.preventDefault(), $cfs.trigger(cf_e("next", conf))
                }), opts.next.pauseOnHover)) {
                var a = bt_pauseOnHoverConfig(opts.next.pauseOnHover);
                opts.next.button.bind(cf_e("mouseenter", conf, !1), function() {
                    $cfs.trigger(cf_e("pause", conf), a)
                }).bind(cf_e("mouseleave", conf, !1), function() {
                    $cfs.trigger(cf_e("resume", conf))
                })
            }
            if (opts.pagination.container && opts.pagination.pauseOnHover) {
                var a = bt_pauseOnHoverConfig(opts.pagination.pauseOnHover);
                opts.pagination.container.bind(cf_e("mouseenter", conf, !1), function() {
                    $cfs.trigger(cf_e("pause", conf), a)
                }).bind(cf_e("mouseleave", conf, !1), function() {
                    $cfs.trigger(cf_e("resume", conf))
                })
            }
            if ((opts.prev.key || opts.next.key) && $(document).bind(cf_e("keyup", conf, !1, !0, !0), function(a) {
                    var b = a.keyCode;
                    b == opts.next.key && (a.preventDefault(), $cfs.trigger(cf_e("next", conf))), b == opts.prev.key && (a.preventDefault(), $cfs.trigger(cf_e("prev", conf)))
                }), opts.pagination.keys && $(document).bind(cf_e("keyup", conf, !1, !0, !0), function(a) {
                    var b = a.keyCode;
                    b >= 49 && 58 > b && (b = (b - 49) * opts.items.visible, itms.total >= b && (a.preventDefault(), $cfs.trigger(cf_e("slideTo", conf), [b, 0, !0, opts.pagination])))
                }), $.fn.swipe) {
                var b = "ontouchstart" in window;
                if (b && opts.swipe.onTouch || !b && opts.swipe.onMouse) {
                    var c = $.extend(!0, {}, opts.prev, opts.swipe),
                        d = $.extend(!0, {}, opts.next, opts.swipe),
                        e = function() {
                            $cfs.trigger(cf_e("prev", conf), [c])
                        },
                        f = function() {
                            $cfs.trigger(cf_e("next", conf), [d])
                        };
                    switch (opts.direction) {
                        case "up":
                        case "down":
                            opts.swipe.options.swipeUp = f, opts.swipe.options.swipeDown = e;
                            break;
                        default:
                            opts.swipe.options.swipeLeft = f, opts.swipe.options.swipeRight = e
                    }
                    crsl.swipe && $cfs.swipe("destroy"), $wrp.swipe(opts.swipe.options), $wrp.css("cursor", "move"), crsl.swipe = !0
                }
            }
            if ($.fn.mousewheel && opts.mousewheel) {
                var g = $.extend(!0, {}, opts.prev, opts.mousewheel),
                    h = $.extend(!0, {}, opts.next, opts.mousewheel);
                crsl.mousewheel && $wrp.unbind(cf_e("mousewheel", conf, !1)), $wrp.bind(cf_e("mousewheel", conf, !1), function(a, b) {
                    a.preventDefault(), b > 0 ? $cfs.trigger(cf_e("prev", conf), [g]) : $cfs.trigger(cf_e("next", conf), [h])
                }), crsl.mousewheel = !0
            }
            if (opts.auto.play && $cfs.trigger(cf_e("play", conf), opts.auto.delay), crsl.upDateOnWindowResize) {
                var i = function() {
                        $cfs.trigger(cf_e("finish", conf)), opts.auto.pauseOnResize && !crsl.isPaused && $cfs.trigger(cf_e("play", conf)), sz_resetMargin($cfs.children(), opts), $cfs.trigger(cf_e("updateSizes", conf))
                    },
                    j = $(window),
                    k = null;
                if ($.debounce && "debounce" == conf.onWindowResize) k = $.debounce(200, i);
                else if ($.throttle && "throttle" == conf.onWindowResize) k = $.throttle(300, i);
                else {
                    var l = 0,
                        m = 0;
                    k = function() {
                        var a = j.width(),
                            b = j.height();
                        (a != l || b != m) && (i(), l = a, m = b)
                    }
                }
                j.bind(cf_e("resize", conf, !1, !0, !0), k)
            }
        }, FN._unbind_buttons = function() {
            var b = (cf_e("", conf), cf_e("", conf, !1));
            ns3 = cf_e("", conf, !1, !0, !0), $(document).unbind(ns3), $(window).unbind(ns3), $wrp.unbind(b), opts.auto.button && opts.auto.button.unbind(b), opts.prev.button && opts.prev.button.unbind(b), opts.next.button && opts.next.button.unbind(b), opts.pagination.container && (opts.pagination.container.unbind(b), opts.pagination.anchorBuilder && opts.pagination.container.children().remove()), crsl.swipe && ($cfs.swipe("destroy"), $wrp.css("cursor", "default"), crsl.swipe = !1), crsl.mousewheel && (crsl.mousewheel = !1), nv_showNavi(opts, "hide", conf), nv_enableNavi(opts, "removeClass", conf)
        }, is_boolean(configs) && (configs = {
            debug: configs
        });
        var crsl = {
                direction: "next",
                isPaused: !0,
                isScrolling: !1,
                isStopped: !1,
                mousewheel: !1,
                swipe: !1
            },
            itms = {
                total: $cfs.children().length,
                first: 0
            },
            tmrs = {
                auto: null,
                progress: null,
                startTime: getTime(),
                timePassed: 0
            },
            scrl = {
                isStopped: !1,
                duration: 0,
                startTime: 0,
                easing: "",
                anims: []
            },
            clbk = {
                onBefore: [],
                onAfter: []
            },
            queu = [],
            conf = $.extend(!0, {}, $.fn.carouFredSel.configs, configs),
            opts = {},
            opts_orig = $.extend(!0, {}, options),
            $wrp = "parent" == conf.wrapper ? $cfs.parent() : $cfs.wrap("<" + conf.wrapper.element + ' class="' + conf.wrapper.classname + '" />').parent();
        if (conf.selector = $cfs.selector, conf.serialNumber = $.fn.carouFredSel.serialNumber++, conf.transition = conf.transition && $.fn.transition ? "transition" : "animate", FN._init(opts_orig, !0, starting_position), FN._build(), FN._bind_events(), FN._bind_buttons(), is_array(opts.items.start)) var start_arr = opts.items.start;
        else {
            var start_arr = [];
            0 != opts.items.start && start_arr.push(opts.items.start)
        }
        if (opts.cookie && start_arr.unshift(parseInt(cf_getCookie(opts.cookie), 10)), start_arr.length > 0)
            for (var a = 0, l = start_arr.length; l > a; a++) {
                var s = start_arr[a];
                if (0 != s) {
                    if (s === !0) {
                        if (s = window.location.hash, 1 > s.length) continue
                    } else "random" === s && (s = Math.floor(Math.random() * itms.total));
                    if ($cfs.triggerHandler(cf_e("slideTo", conf), [s, 0, !0, {
                            fx: "none"
                        }])) break
                }
            }
        var siz = sz_setSizes($cfs, opts),
            itm = gi_getCurrentItems($cfs.children(), opts);
        return opts.onCreate && opts.onCreate.call($tt0, {
            width: siz.width,
            height: siz.height,
            items: itm
        }), $cfs.trigger(cf_e("updatePageStatus", conf), [!0, siz]), $cfs.trigger(cf_e("linkAnchors", conf)), conf.debug && $cfs.trigger(cf_e("debug", conf)), $cfs
    }, $.fn.carouFredSel.serialNumber = 1, $.fn.carouFredSel.defaults = {
        synchronise: !1,
        infinite: !0,
        circular: !0,
        responsive: !1,
        direction: "left",
        items: {
            start: 0
        },
        scroll: {
            easing: "swing",
            duration: 500,
            pauseOnHover: !1,
            event: "click",
            queue: !1
        }
    }, $.fn.carouFredSel.configs = {
        debug: !1,
        transition: !1,
        onWindowResize: "throttle",
        events: {
            prefix: "",
            namespace: "cfs"
        },
        wrapper: {
            element: "div",
            classname: "caroufredsel_wrapper"
        },
        classnames: {}
    }, $.fn.carouFredSel.pageAnchorBuilder = function(a) {
        return '<a href="#"><span>' + a + "</span></a>"
    }, $.fn.carouFredSel.progressbarUpdater = function(a) {
        $(this).css("width", a + "%")
    }, $.fn.carouFredSel.cookie = {
        get: function(a) {
            a += "=";
            for (var b = document.cookie.split(";"), c = 0, d = b.length; d > c; c++) {
                for (var e = b[c];
                    " " == e.charAt(0);) e = e.slice(1);
                if (0 == e.indexOf(a)) return e.slice(a.length)
            }
            return 0
        },
        set: function(a, b, c) {
            var d = "";
            if (c) {
                var e = new Date;
                e.setTime(e.getTime() + 1e3 * 60 * 60 * 24 * c), d = "; expires=" + e.toGMTString()
            }
            document.cookie = a + "=" + b + d + "; path=/"
        },
        remove: function(a) {
            $.fn.carouFredSel.cookie.set(a, "", -1)
        }
    }, $.extend($.easing, {
        quadratic: function(a) {
            var b = a * a;
            return a * (-b * a + 4 * b - 6 * a + 4)
        },
        cubic: function(a) {
            return a * (4 * a * a - 9 * a + 6)
        },
        elastic: function(a) {
            var b = a * a;
            return a * (33 * b * b - 106 * b * a + 126 * b - 67 * a + 15)
        }
    }))
})(jQuery);


/**
 * debouncedresize: special jQuery event that happens once after a window resize
 *
 * latest version and complete README available on Github:
 * https://github.com/louisremi/jquery-smartresize
 *
 * Copyright 2012 @louis_remi
 * Licensed under the MIT license.
 *
 * This saved you an hour of work? 
 * Send me music http://www.amazon.co.uk/wishlist/HNTU0468LQON
 */
! function(a) {
    var c, d, b = a.event;
    c = b.special.debouncedresize = {
        setup: function() {
            a(this).on("resize", c.handler)
        },
        teardown: function() {
            a(this).off("resize", c.handler)
        },
        handler: function(a, e) {
            var f = this,
                g = arguments,
                h = function() {
                    a.type = "debouncedresize", b.dispatch.apply(f, g)
                };
            d && clearTimeout(d), e ? h() : d = setTimeout(h, c.threshold)
        },
        threshold: 150
    }
}(jQuery);

! function(a) {
    var c, f, g, b = a.event,
        d = {
            _: 0
        },
        e = 0;
    c = b.special.throttledresize = {
        setup: function() {
            a(this).on("resize", c.handler)
        },
        teardown: function() {
            a(this).off("resize", c.handler)
        },
        handler: function(h, i) {
            var j = this,
                k = arguments;
            f = !0, g || (setInterval(function() {
                e++, (e > c.threshold && f || i) && (h.type = "throttledresize", b.dispatch.apply(j, k), f = !1, e = 0), e > 9 && (a(d).stop(), g = !1, e = 0)
            }, 30), g = !0)
        },
        threshold: 0
    }
}(jQuery);


/* 
 * Class: prettyPhoto
 * Use: Lightbox clone for jQuery
 * Author: Stephane Caron (http://www.no-margin-for-errors.com)
 * Version: 3.1.6
 */
! function(e) {
    function t() {
        var e = location.href;
        return hashtag = -1 !== e.indexOf("#prettyPhoto") ? decodeURI(e.substring(e.indexOf("#prettyPhoto") + 1, e.length)) : !1, hashtag && (hashtag = hashtag.replace(/<|>/g, "")), hashtag
    }

    function i() {
        "undefined" != typeof theRel && (location.hash = theRel + "/" + rel_index + "/")
    }

    function p() {
        -1 !== location.href.indexOf("#prettyPhoto") && (location.hash = "prettyPhoto")
    }

    function o(e, t) {
        e = e.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var i = "[\\?&]" + e + "=([^&#]*)",
            p = new RegExp(i),
            o = p.exec(t);
        return null == o ? "" : o[1]
    }
    e.prettyPhoto = {
        version: "3.1.6"
    }, e.fn.prettyPhoto = function(a) {
        function s() {
            e(".pp_loaderIcon").hide(), projectedTop = scroll_pos.scrollTop + (I / 2 - f.containerHeight / 2), projectedTop < 0 && (projectedTop = 0), $ppt.fadeTo(settings.animation_speed, 1), $pp_pic_holder.find(".pp_content").animate({
                height: f.contentHeight,
                width: f.contentWidth
            }, settings.animation_speed), $pp_pic_holder.animate({
                top: projectedTop,
                left: j / 2 - f.containerWidth / 2 < 0 ? 0 : j / 2 - f.containerWidth / 2,
                width: f.containerWidth
            }, settings.animation_speed, function() {
                $pp_pic_holder.find(".pp_hoverContainer,#fullResImage").height(f.height).width(f.width), $pp_pic_holder.find(".pp_fade").fadeIn(settings.animation_speed), isSet && "image" == h(pp_images[set_position]) ? $pp_pic_holder.find(".pp_hoverContainer").show() : $pp_pic_holder.find(".pp_hoverContainer").hide(), settings.allow_expand && (f.resized ? e("a.pp_expand,a.pp_contract").show() : e("a.pp_expand").hide()), !settings.autoplay_slideshow || P || v || e.prettyPhoto.startSlideshow(), settings.changepicturecallback(), v = !0
            }), m(), a.ajaxcallback()
        }

        function n(t) {
            $pp_pic_holder.find("#pp_full_res object,#pp_full_res embed").css("visibility", "hidden"), $pp_pic_holder.find(".pp_fade").fadeOut(settings.animation_speed, function() {
                e(".pp_loaderIcon").show(), t()
            })
        }

        function r(t) {
            t > 1 ? e(".pp_nav").show() : e(".pp_nav").hide()
        }

        function l(e, t) {
            if (resized = !1, d(e, t), imageWidth = e, imageHeight = t, (k > j || b > I) && doresize && settings.allow_resize && !$) {
                for (resized = !0, fitting = !1; !fitting;) k > j ? (imageWidth = j - 200, imageHeight = t / e * imageWidth) : b > I ? (imageHeight = I - 200, imageWidth = e / t * imageHeight) : fitting = !0, b = imageHeight, k = imageWidth;
                (k > j || b > I) && l(k, b), d(imageWidth, imageHeight)
            }
            return {
                width: Math.floor(imageWidth),
                height: Math.floor(imageHeight),
                containerHeight: Math.floor(b),
                containerWidth: Math.floor(k) + 2 * settings.horizontal_padding,
                contentHeight: Math.floor(y),
                contentWidth: Math.floor(w),
                resized: resized
            }
        }

        function d(t, i) {
            t = parseFloat(t), i = parseFloat(i), $pp_details = $pp_pic_holder.find(".pp_details"), $pp_details.width(t), detailsHeight = parseFloat($pp_details.css("marginTop")) + parseFloat($pp_details.css("marginBottom")), $pp_details = $pp_details.clone().addClass(settings.theme).width(t).appendTo(e("body")).css({
                position: "absolute",
                top: -1e4
            }), detailsHeight += $pp_details.height(), detailsHeight = detailsHeight <= 34 ? 36 : detailsHeight, $pp_details.remove(), $pp_title = $pp_pic_holder.find(".ppt"), $pp_title.width(t), titleHeight = parseFloat($pp_title.css("marginTop")) + parseFloat($pp_title.css("marginBottom")), $pp_title = $pp_title.clone().appendTo(e("body")).css({
                position: "absolute",
                top: -1e4
            }), titleHeight += $pp_title.height(), $pp_title.remove(), y = i + detailsHeight, w = t, b = y + titleHeight + $pp_pic_holder.find(".pp_top").height() + $pp_pic_holder.find(".pp_bottom").height(), k = t
        }

        function h(e) {
            return e.match(/youtube\.com\/watch/i) || e.match(/youtu\.be/i) ? "youtube" : e.match(/vimeo\.com/i) ? "vimeo" : e.match(/\b.mov\b/i) ? "quicktime" : e.match(/\b.swf\b/i) ? "flash" : e.match(/\biframe=true\b/i) ? "iframe" : e.match(/\bajax=true\b/i) ? "ajax" : e.match(/\bcustom=true\b/i) ? "custom" : "#" == e.substr(0, 1) ? "inline" : "image"
        }

        function c() {
            if (doresize && "undefined" != typeof $pp_pic_holder) {
                if (scroll_pos = _(), contentHeight = $pp_pic_holder.height(), contentwidth = $pp_pic_holder.width(), projectedTop = I / 2 + scroll_pos.scrollTop - contentHeight / 2, projectedTop < 0 && (projectedTop = 0), contentHeight > I) return;
                $pp_pic_holder.css({
                    top: projectedTop,
                    left: j / 2 + scroll_pos.scrollLeft - contentwidth / 2
                })
            }
        }

        function _() {
            return self.pageYOffset ? {
                scrollTop: self.pageYOffset,
                scrollLeft: self.pageXOffset
            } : document.documentElement && document.documentElement.scrollTop ? {
                scrollTop: document.documentElement.scrollTop,
                scrollLeft: document.documentElement.scrollLeft
            } : document.body ? {
                scrollTop: document.body.scrollTop,
                scrollLeft: document.body.scrollLeft
            } : void 0
        }

        function g() {
            I = e(window).height(), j = e(window).width(), "undefined" != typeof $pp_overlay && $pp_overlay.height(e(document).height()).width(j)
        }

        function m() {
            isSet && settings.overlay_gallery && "image" == h(pp_images[set_position]) ? (itemWidth = 57, navWidth = "facebook" == settings.theme || "pp_default" == settings.theme ? 50 : 30, itemsPerPage = Math.floor((f.containerWidth - 100 - navWidth) / itemWidth), itemsPerPage = itemsPerPage < pp_images.length ? itemsPerPage : pp_images.length, totalPage = Math.ceil(pp_images.length / itemsPerPage) - 1, 0 == totalPage ? (navWidth = 0, $pp_gallery.find(".pp_arrow_next,.pp_arrow_previous").hide()) : $pp_gallery.find(".pp_arrow_next,.pp_arrow_previous").show(), galleryWidth = itemsPerPage * itemWidth, fullGalleryWidth = pp_images.length * itemWidth, $pp_gallery.css("margin-left", -(galleryWidth / 2 + navWidth / 2)).find("div:first").width(galleryWidth + 5).find("ul").width(fullGalleryWidth).find("li.selected").removeClass("selected"), goToPage = Math.floor(set_position / itemsPerPage) < totalPage ? Math.floor(set_position / itemsPerPage) : totalPage, e.prettyPhoto.changeGalleryPage(goToPage), $pp_gallery_li.filter(":eq(" + set_position + ")").addClass("selected")) : $pp_pic_holder.find(".pp_content").unbind("mouseenter mouseleave")
        }

        function u() {
            if (settings.social_tools && (facebook_like_link = settings.social_tools.replace("{location_href}", encodeURIComponent(location.href))), settings.markup = settings.markup.replace("{pp_social}", ""), e("body").append(settings.markup), $pp_pic_holder = e(".pp_pic_holder"), $ppt = e(".ppt"), $pp_overlay = e("div.pp_overlay"), isSet && settings.overlay_gallery) {
                currentGalleryPage = 0, toInject = "";
                for (var t = 0; t < pp_images.length; t++) pp_images[t].match(/\b(jpg|jpeg|png|gif)\b/gi) ? (classname = "", img_src = pp_images[t]) : (classname = "default", img_src = ""), toInject += "<li class='" + classname + "'><a href='#'><img src='" + img_src + "' width='50' alt='' /></a></li>";
                toInject = settings.gallery_markup.replace(/{gallery}/g, toInject), $pp_pic_holder.find("#pp_full_res").after(toInject), $pp_gallery = e(".pp_pic_holder .pp_gallery"), $pp_gallery_li = $pp_gallery.find("li"), $pp_gallery.find(".pp_arrow_next").click(function() {
                    return e.prettyPhoto.changeGalleryPage("next"), e.prettyPhoto.stopSlideshow(), !1
                }), $pp_gallery.find(".pp_arrow_previous").click(function() {
                    return e.prettyPhoto.changeGalleryPage("previous"), e.prettyPhoto.stopSlideshow(), !1
                }), $pp_pic_holder.find(".pp_content").hover(function() {
                    $pp_pic_holder.find(".pp_gallery:not(.disabled)").fadeIn()
                }, function() {
                    $pp_pic_holder.find(".pp_gallery:not(.disabled)").fadeOut()
                }), itemWidth = 57, $pp_gallery_li.each(function(t) {
                    e(this).find("a").click(function() {
                        return e.prettyPhoto.changePage(t), e.prettyPhoto.stopSlideshow(), !1
                    })
                })
            }
            settings.slideshow && ($pp_pic_holder.find(".pp_nav").prepend('<a href="#" class="pp_play">Play</a>'), $pp_pic_holder.find(".pp_nav .pp_play").click(function() {
                return e.prettyPhoto.startSlideshow(), !1
            })), $pp_pic_holder.attr("class", "pp_pic_holder " + settings.theme), $pp_overlay.css({
                opacity: 0,
                height: e(document).height(),
                width: e(window).width()
            }).bind("click", function() {
                settings.modal || e.prettyPhoto.close()
            }), e("a.pp_close").bind("click", function() {
                return e.prettyPhoto.close(), !1
            }), settings.allow_expand && e("a.pp_expand").bind("click", function() {
                return e(this).hasClass("pp_expand") ? (e(this).removeClass("pp_expand").addClass("pp_contract"), doresize = !1) : (e(this).removeClass("pp_contract").addClass("pp_expand"), doresize = !0), n(function() {
                    e.prettyPhoto.open()
                }), !1
            }), $pp_pic_holder.find(".pp_previous, .pp_nav .pp_arrow_previous").bind("click", function() {
                return e.prettyPhoto.changePage("previous"), e.prettyPhoto.stopSlideshow(), !1
            }), $pp_pic_holder.find(".pp_next, .pp_nav .pp_arrow_next").bind("click", function() {
                return e.prettyPhoto.changePage("next"), e.prettyPhoto.stopSlideshow(), !1
            }), c()
        }
        a = jQuery.extend({
            hook: "rel",
            animation_speed: "fast",
            ajaxcallback: function() {},
            slideshow: 5e3,
            autoplay_slideshow: !1,
            opacity: .8,
            show_title: !0,
            allow_resize: !0,
            allow_expand: !0,
            default_width: 500,
            default_height: 344,
            counter_separator_label: "/",
            theme: "pp_default",
            horizontal_padding: 20,
            hideflash: !1,
            wmode: "opaque",
            autoplay: !0,
            modal: !1,
            deeplinking: !0,
            overlay_gallery: !0,
            overlay_gallery_max: 30,
            keyboard_shortcuts: !0,
            changepicturecallback: function() {},
            callback: function() {},
            ie6_fallback: !0,
            markup: '<div class="pp_pic_holder"> 						<div class="ppt">&nbsp;</div> 						<div class="pp_top"> 							<div class="pp_left"></div> 							<div class="pp_middle"></div> 							<div class="pp_right"></div> 						</div> 						<div class="pp_content_container"> 							<div class="pp_left"> 							<div class="pp_right"> 								<div class="pp_content"> 									<div class="pp_loaderIcon"></div> 									<div class="pp_fade"> 										<a href="#" class="pp_expand" title="Expand the image">Expand</a> 										<div class="pp_hoverContainer"> 											<a class="pp_next" href="#">next</a> 											<a class="pp_previous" href="#">previous</a> 										</div> 										<div id="pp_full_res"></div> 										<div class="pp_details"> 											<div class="pp_nav"> 												<a href="#" class="pp_arrow_previous">Previous</a> 												<p class="currentTextHolder">0/0</p> 												<a href="#" class="pp_arrow_next">Next</a> 											</div> 											<p class="pp_description"></p> 											<div class="pp_social">{pp_social}</div> 											<a class="pp_close" href="#">Close</a> 										</div> 									</div> 								</div> 							</div> 							</div> 						</div> 						<div class="pp_bottom"> 							<div class="pp_left"></div> 							<div class="pp_middle"></div> 							<div class="pp_right"></div> 						</div> 					</div> 					<div class="pp_overlay"></div>',
            gallery_markup: '<div class="pp_gallery"> 								<a href="#" class="pp_arrow_previous">Previous</a> 								<div> 									<ul> 										{gallery} 									</ul> 								</div> 								<a href="#" class="pp_arrow_next">Next</a> 							</div>',
            image_markup: '<img id="fullResImage" src="{path}" />',
            flash_markup: '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="{width}" height="{height}"><param name="wmode" value="{wmode}" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="{path}" /><embed src="{path}" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="{width}" height="{height}" wmode="{wmode}"></embed></object>',
            quicktime_markup: '<object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab" height="{height}" width="{width}"><param name="src" value="{path}"><param name="autoplay" value="{autoplay}"><param name="type" value="video/quicktime"><embed src="{path}" height="{height}" width="{width}" autoplay="{autoplay}" type="video/quicktime" pluginspage="http://www.apple.com/quicktime/download/"></embed></object>',
            iframe_markup: '<iframe src ="{path}" width="{width}" height="{height}" frameborder="no"></iframe>',
            inline_markup: '<div class="pp_inline">{content}</div>',
            custom_markup: "",
            social_tools: '<div class="twitter"><a href="http://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div><div class="facebook"><iframe src="//www.facebook.com/plugins/like.php?locale=en_US&href={location_href}&layout=button_count&show_faces=true&width=500&action=like&font&colorscheme=light&height=23" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:500px; height:23px;" allowTransparency="true"></iframe></div>'
        }, a);
        var f, v, y, w, b, k, P, x = this,
            $ = !1,
            I = e(window).height(),
            j = e(window).width();
        return doresize = !0, scroll_pos = _(), e(window).unbind("resize.prettyphoto").bind("resize.prettyphoto", function() {
            c(), g()
        }), a.keyboard_shortcuts && e(document).unbind("keydown.prettyphoto").bind("keydown.prettyphoto", function(t) {
            if ("undefined" != typeof $pp_pic_holder && $pp_pic_holder.is(":visible")) switch (t.keyCode) {
                case 37:
                    e.prettyPhoto.changePage("previous"), t.preventDefault();
                    break;
                case 39:
                    e.prettyPhoto.changePage("next"), t.preventDefault();
                    break;
                case 27:
                    settings.modal || e.prettyPhoto.close(), t.preventDefault()
            }
        }), e.prettyPhoto.initialize = function() {
            return settings = a, "pp_default" == settings.theme && (settings.horizontal_padding = 16), theRel = e(this).attr(settings.hook), galleryRegExp = /\[(?:.*)\]/, isSet = galleryRegExp.exec(theRel) ? !0 : !1, pp_images = isSet ? jQuery.map(x, function(t) {
                return -1 != e(t).attr(settings.hook).indexOf(theRel) ? e(t).attr("href") : void 0
            }) : e.makeArray(e(this).attr("href")), pp_titles = isSet ? jQuery.map(x, function(t) {
                return -1 != e(t).attr(settings.hook).indexOf(theRel) ? e(t).find("img").attr("alt") ? e(t).find("img").attr("alt") : "" : void 0
            }) : e.makeArray(e(this).find("img").attr("alt")), pp_descriptions = isSet ? jQuery.map(x, function(t) {
                return -1 != e(t).attr(settings.hook).indexOf(theRel) ? e(t).attr("title") ? e(t).attr("title") : "" : void 0
            }) : e.makeArray(e(this).attr("title")), pp_images.length > settings.overlay_gallery_max && (settings.overlay_gallery = !1), set_position = jQuery.inArray(e(this).attr("href"), pp_images), rel_index = isSet ? set_position : e("a[" + settings.hook + "^='" + theRel + "']").index(e(this)), u(this), settings.allow_resize && e(window).bind("scroll.prettyphoto", function() {
                c()
            }), e.prettyPhoto.open(), !1
        }, e.prettyPhoto.open = function(t) {
            return "undefined" == typeof settings && (settings = a, pp_images = e.makeArray(arguments[0]), pp_titles = e.makeArray(arguments[1] ? arguments[1] : ""), pp_descriptions = e.makeArray(arguments[2] ? arguments[2] : ""), isSet = pp_images.length > 1 ? !0 : !1, set_position = arguments[3] ? arguments[3] : 0, u(t.target)), settings.hideflash && e("object,embed,iframe[src*=youtube],iframe[src*=vimeo]").css("visibility", "hidden"), r(e(pp_images).size()), e(".pp_loaderIcon").show(), settings.deeplinking && i(), settings.social_tools && (facebook_like_link = settings.social_tools.replace("{location_href}", encodeURIComponent(location.href)), $pp_pic_holder.find(".pp_social").html(facebook_like_link)), $ppt.is(":hidden") && $ppt.css("opacity", 0).show(), $pp_overlay.show().fadeTo(settings.animation_speed, settings.opacity), $pp_pic_holder.find(".currentTextHolder").text(set_position + 1 + settings.counter_separator_label + e(pp_images).size()), "undefined" != typeof pp_descriptions[set_position] && "" != pp_descriptions[set_position] ? $pp_pic_holder.find(".pp_description").show().html(unescape(pp_descriptions[set_position])) : $pp_pic_holder.find(".pp_description").hide(), movie_width = parseFloat(o("width", pp_images[set_position])) ? o("width", pp_images[set_position]) : settings.default_width.toString(), movie_height = parseFloat(o("height", pp_images[set_position])) ? o("height", pp_images[set_position]) : settings.default_height.toString(), $ = !1, -1 != movie_height.indexOf("%") && (movie_height = parseFloat(e(window).height() * parseFloat(movie_height) / 100 - 150), $ = !0), -1 != movie_width.indexOf("%") && (movie_width = parseFloat(e(window).width() * parseFloat(movie_width) / 100 - 150), $ = !0), $pp_pic_holder.fadeIn(function() {
                switch ($ppt.html(settings.show_title && "" != pp_titles[set_position] && "undefined" != typeof pp_titles[set_position] ? unescape(pp_titles[set_position]) : "&nbsp;"), imgPreloader = "", skipInjection = !1, h(pp_images[set_position])) {
                    case "image":
                        imgPreloader = new Image, nextImage = new Image, isSet && set_position < e(pp_images).size() - 1 && (nextImage.src = pp_images[set_position + 1]), prevImage = new Image, isSet && pp_images[set_position - 1] && (prevImage.src = pp_images[set_position - 1]), $pp_pic_holder.find("#pp_full_res")[0].innerHTML = settings.image_markup.replace(/{path}/g, pp_images[set_position]), imgPreloader.onload = function() {
                            f = l(imgPreloader.width, imgPreloader.height), s()
                        }, imgPreloader.onerror = function() {
                            alert("Image cannot be loaded. Make sure the path is correct and image exist."), e.prettyPhoto.close()
                        }, imgPreloader.src = pp_images[set_position];
                        break;
                    case "youtube":
                        f = l(movie_width, movie_height), movie_id = o("v", pp_images[set_position]), "" == movie_id && (movie_id = pp_images[set_position].split("youtu.be/"), movie_id = movie_id[1], movie_id.indexOf("?") > 0 && (movie_id = movie_id.substr(0, movie_id.indexOf("?"))), movie_id.indexOf("&") > 0 && (movie_id = movie_id.substr(0, movie_id.indexOf("&")))), movie = "http://www.youtube.com/embed/" + movie_id, movie += o("rel", pp_images[set_position]) ? "?rel=" + o("rel", pp_images[set_position]) : "?rel=1", settings.autoplay && (movie += "&autoplay=1"), toInject = settings.iframe_markup.replace(/{width}/g, f.width).replace(/{height}/g, f.height).replace(/{wmode}/g, settings.wmode).replace(/{path}/g, movie);
                        break;
                    case "vimeo":
                        f = l(movie_width, movie_height), movie_id = pp_images[set_position];
                        var t = /http(s?):\/\/(www\.)?vimeo.com\/(\d+)/,
                            i = movie_id.match(t);
                        movie = "http://player.vimeo.com/video/" + i[3] + "?title=0&byline=0&portrait=0", settings.autoplay && (movie += "&autoplay=1;"), vimeo_width = f.width + "/embed/?moog_width=" + f.width, toInject = settings.iframe_markup.replace(/{width}/g, vimeo_width).replace(/{height}/g, f.height).replace(/{path}/g, movie);
                        break;
                    case "quicktime":
                        f = l(movie_width, movie_height), f.height += 15, f.contentHeight += 15, f.containerHeight += 15, toInject = settings.quicktime_markup.replace(/{width}/g, f.width).replace(/{height}/g, f.height).replace(/{wmode}/g, settings.wmode).replace(/{path}/g, pp_images[set_position]).replace(/{autoplay}/g, settings.autoplay);
                        break;
                    case "flash":
                        f = l(movie_width, movie_height), flash_vars = pp_images[set_position], flash_vars = flash_vars.substring(pp_images[set_position].indexOf("flashvars") + 10, pp_images[set_position].length), filename = pp_images[set_position], filename = filename.substring(0, filename.indexOf("?")), toInject = settings.flash_markup.replace(/{width}/g, f.width).replace(/{height}/g, f.height).replace(/{wmode}/g, settings.wmode).replace(/{path}/g, filename + "?" + flash_vars);
                        break;
                    case "iframe":
                        f = l(movie_width, movie_height), frame_url = pp_images[set_position], frame_url = frame_url.substr(0, frame_url.indexOf("iframe") - 1), toInject = settings.iframe_markup.replace(/{width}/g, f.width).replace(/{height}/g, f.height).replace(/{path}/g, frame_url);
                        break;
                    case "ajax":
                        doresize = !1, f = l(movie_width, movie_height), doresize = !0, skipInjection = !0, e.get(pp_images[set_position], function(e) {
                            toInject = settings.inline_markup.replace(/{content}/g, e), $pp_pic_holder.find("#pp_full_res")[0].innerHTML = toInject, s()
                        });
                        break;
                    case "custom":
                        f = l(movie_width, movie_height), toInject = settings.custom_markup;
                        break;
                    case "inline":
                        myClone = e(pp_images[set_position]).clone().append('<br clear="all" />').css({
                            width: settings.default_width
                        }).wrapInner('<div id="pp_full_res"><div class="pp_inline"></div></div>').appendTo(e("body")).show(), doresize = !1, f = l(e(myClone).width(), e(myClone).height()), doresize = !0, e(myClone).remove(), toInject = settings.inline_markup.replace(/{content}/g, e(pp_images[set_position]).html())
                }
                imgPreloader || skipInjection || ($pp_pic_holder.find("#pp_full_res")[0].innerHTML = toInject, s())
            }), !1
        }, e.prettyPhoto.changePage = function(t) {
            currentGalleryPage = 0, "previous" == t ? (set_position--, set_position < 0 && (set_position = e(pp_images).size() - 1)) : "next" == t ? (set_position++, set_position > e(pp_images).size() - 1 && (set_position = 0)) : set_position = t, rel_index = set_position, doresize || (doresize = !0), settings.allow_expand && e(".pp_contract").removeClass("pp_contract").addClass("pp_expand"), n(function() {
                e.prettyPhoto.open()
            })
        }, e.prettyPhoto.changeGalleryPage = function(e) {
            "next" == e ? (currentGalleryPage++, currentGalleryPage > totalPage && (currentGalleryPage = 0)) : "previous" == e ? (currentGalleryPage--, currentGalleryPage < 0 && (currentGalleryPage = totalPage)) : currentGalleryPage = e, slide_speed = "next" == e || "previous" == e ? settings.animation_speed : 0, slide_to = currentGalleryPage * itemsPerPage * itemWidth, $pp_gallery.find("ul").animate({
                left: -slide_to
            }, slide_speed)
        }, e.prettyPhoto.startSlideshow = function() {
            "undefined" == typeof P ? ($pp_pic_holder.find(".pp_play").unbind("click").removeClass("pp_play").addClass("pp_pause").click(function() {
                return e.prettyPhoto.stopSlideshow(), !1
            }), P = setInterval(e.prettyPhoto.startSlideshow, settings.slideshow)) : e.prettyPhoto.changePage("next")
        }, e.prettyPhoto.stopSlideshow = function() {
            $pp_pic_holder.find(".pp_pause").unbind("click").removeClass("pp_pause").addClass("pp_play").click(function() {
                return e.prettyPhoto.startSlideshow(), !1
            }), clearInterval(P), P = void 0
        }, e.prettyPhoto.close = function() {
            $pp_overlay.is(":animated") || (e.prettyPhoto.stopSlideshow(), $pp_pic_holder.stop().find("object,embed").css("visibility", "hidden"), e("div.pp_pic_holder,div.ppt,.pp_fade").fadeOut(settings.animation_speed, function() {
                e(this).remove()
            }), $pp_overlay.fadeOut(settings.animation_speed, function() {
                settings.hideflash && e("object,embed,iframe[src*=youtube],iframe[src*=vimeo]").css("visibility", "visible"), e(this).remove(), e(window).unbind("scroll.prettyphoto"), p(), settings.callback(), doresize = !0, v = !1, delete settings
            }))
        }, !pp_alreadyInitialized && t() && (pp_alreadyInitialized = !0, hashIndex = t(), hashRel = hashIndex, hashIndex = hashIndex.substring(hashIndex.indexOf("/") + 1, hashIndex.length - 1), hashRel = hashRel.substring(0, hashRel.indexOf("/")), setTimeout(function() {
            e("a[" + a.hook + "^='" + hashRel + "']:eq(" + hashIndex + ")").trigger("click")
        }, 50)), this.unbind("click.prettyphoto").bind("click.prettyphoto", e.prettyPhoto.initialize)
    }
}(jQuery);
var pp_alreadyInitialized = !1;


/**
 * touchSwipe - jQuery Plugin
 * https://github.com/mattbryson/TouchSwipe-Jquery-Plugin
 * http://labs.skinkers.com/touchSwipe/
 * http://plugins.jquery.com/project/touchSwipe
 *
 * Copyright (c) 2010 Matt Bryson (www.skinkers.com)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 *
 * $version: 1.3.3
 */
(function(g) {
    function P(c) {
        if (c && void 0 === c.allowPageScroll && (void 0 !== c.swipe || void 0 !== c.swipeStatus)) c.allowPageScroll = G;
        c || (c = {});
        c = g.extend({}, g.fn.swipe.defaults, c);
        return this.each(function() {
            var b = g(this),
                f = b.data(w);
            f || (f = new W(this, c), b.data(w, f))
        })
    }

    function W(c, b) {
        var f, p, r, s;

        function H(a) {
            var a = a.originalEvent,
                c, Q = n ? a.touches[0] : a;
            d = R;
            n ? h = a.touches.length : a.preventDefault();
            i = 0;
            j = null;
            k = 0;
            !n || h === b.fingers || b.fingers === x ? (r = f = Q.pageX, s = p = Q.pageY, y = (new Date).getTime(), b.swipeStatus && (c = l(a, d))) : t(a);
            if (!1 === c) return d = m, l(a, d), c;
            e.bind(I, J);
            e.bind(K, L)
        }

        function J(a) {
            a = a.originalEvent;
            if (!(d === q || d === m)) {
                var c, e = n ? a.touches[0] : a;
                f = e.pageX;
                p = e.pageY;
                u = (new Date).getTime();
                j = S();
                n && (h = a.touches.length);
                d = z;
                var e = a,
                    g = j;
                if (b.allowPageScroll === G) e.preventDefault();
                else {
                    var o = b.allowPageScroll === T;
                    switch (g) {
                        case v:
                            (b.swipeLeft && o || !o && b.allowPageScroll != M) && e.preventDefault();
                            break;
                        case A:
                            (b.swipeRight && o || !o && b.allowPageScroll != M) && e.preventDefault();
                            break;
                        case B:
                            (b.swipeUp && o || !o && b.allowPageScroll != N) && e.preventDefault();
                            break;
                        case C:
                            (b.swipeDown && o || !o && b.allowPageScroll != N) && e.preventDefault()
                    }
                }
                h === b.fingers || b.fingers === x || !n ? (i = U(), k = u - y, b.swipeStatus && (c = l(a, d, j, i, k)), b.triggerOnTouchEnd || (e = !(b.maxTimeThreshold ? !(k >= b.maxTimeThreshold) : 1), !0 === D() ? (d = q, c = l(a, d)) : e && (d = m, l(a, d)))) : (d = m, l(a, d));
                !1 === c && (d = m, l(a, d))
            }
        }

        function L(a) {
            a = a.originalEvent;
            a.preventDefault();
            u = (new Date).getTime();
            i = U();
            j = S();
            k = u - y;
            if (b.triggerOnTouchEnd || !1 === b.triggerOnTouchEnd && d === z)
                if (d = q, (h === b.fingers || b.fingers === x || !n) && 0 !== f) {
                    var c = !(b.maxTimeThreshold ? !(k >= b.maxTimeThreshold) : 1);
                    if ((!0 === D() || null === D()) && !c) l(a, d);
                    else if (c || !1 === D()) d = m, l(a, d)
                } else d = m, l(a, d);
            else d === z && (d = m, l(a, d));
            e.unbind(I, J, !1);
            e.unbind(K, L, !1)
        }

        function t() {
            y = u = p = f = s = r = h = 0
        }

        function l(a, c) {
            var d = void 0;
            b.swipeStatus && (d = b.swipeStatus.call(e, a, c, j || null, i || 0, k || 0, h));
            if (c === m && b.click && (1 === h || !n) && (isNaN(i) || 0 === i)) d = b.click.call(e, a, a.target);
            if (c == q) switch (b.swipe && (d = b.swipe.call(e, a, j, i, k, h)), j) {
                case v:
                    b.swipeLeft && (d = b.swipeLeft.call(e, a, j, i, k, h));
                    break;
                case A:
                    b.swipeRight && (d = b.swipeRight.call(e, a, j, i, k, h));
                    break;
                case B:
                    b.swipeUp && (d = b.swipeUp.call(e, a, j, i, k, h));
                    break;
                case C:
                    b.swipeDown && (d = b.swipeDown.call(e, a, j, i, k, h))
            }(c === m || c === q) && t(a);
            return d
        }

        function D() {
            return null !== b.threshold ? i >= b.threshold : null
        }

        function U() {
            return Math.round(Math.sqrt(Math.pow(f - r, 2) + Math.pow(p - s, 2)))
        }

        function S() {
            var a;
            a = Math.atan2(p - s, r - f);
            a = Math.round(180 * a / Math.PI);
            0 > a && (a = 360 - Math.abs(a));
            return 45 >= a && 0 <= a ? v : 360 >= a && 315 <= a ? v : 135 <= a && 225 >= a ? A : 45 < a && 135 > a ? C : B
        }

        function V() {
            e.unbind(E, H);
            e.unbind(F, t);
            e.unbind(I, J);
            e.unbind(K, L)
        }
        var O = n || !b.fallbackToMouseEvents,
            E = O ? "touchstart" : "mousedown",
            I = O ? "touchmove" : "mousemove",
            K = O ? "touchend" : "mouseup",
            F = "touchcancel",
            i = 0,
            j = null,
            k = 0,
            e = g(c),
            d = "start",
            h = 0,
            y = p = f = s = r = 0,
            u = 0;
        try {
            e.bind(E, H), e.bind(F, t)
        } catch (P) {
            g.error("events not supported " + E + "," + F + " on jQuery.swipe")
        }
        this.enable = function() {
            e.bind(E, H);
            e.bind(F, t);
            return e
        };
        this.disable = function() {
            V();
            return e
        };
        this.destroy = function() {
            V();
            e.data(w, null);
            return e
        }
    }
    var v = "left",
        A = "right",
        B = "up",
        C = "down",
        G = "none",
        T = "auto",
        M = "horizontal",
        N = "vertical",
        x = "all",
        R = "start",
        z = "move",
        q = "end",
        m = "cancel",
        n = "ontouchstart" in window,
        w = "TouchSwipe";
    g.fn.swipe = function(c) {
        var b = g(this),
            f = b.data(w);
        if (f && "string" === typeof c) {
            if (f[c]) return f[c].apply(this, Array.prototype.slice.call(arguments, 1));
            g.error("Method " + c + " does not exist on jQuery.swipe")
        } else if (!f && ("object" === typeof c || !c)) return P.apply(this, arguments);
        return b
    };
    g.fn.swipe.defaults = {
        fingers: 1,
        threshold: 75,
        maxTimeThreshold: null,
        swipe: null,
        swipeLeft: null,
        swipeRight: null,
        swipeUp: null,
        swipeDown: null,
        swipeStatus: null,
        click: null,
        triggerOnTouchEnd: !0,
        allowPageScroll: "auto",
        fallbackToMouseEvents: !0
    };
    g.fn.swipe.phases = {
        PHASE_START: R,
        PHASE_MOVE: z,
        PHASE_END: q,
        PHASE_CANCEL: m
    };
    g.fn.swipe.directions = {
        LEFT: v,
        RIGHT: A,
        UP: B,
        DOWN: C
    };
    g.fn.swipe.pageScroll = {
        NONE: G,
        HORIZONTAL: M,
        VERTICAL: N,
        AUTO: T
    };
    g.fn.swipe.fingers = {
        ONE: 1,
        TWO: 2,
        THREE: 3,
        ALL: x
    }
})(jQuery);


/**
 * Plugin: jQuery Parallax
 * Version 1.1.3
 * Author: Ian Lunn
 * Twitter: @IanLunn
 * Author URL: http://www.ianlunn.co.uk/
 * Plugin URL: http://www.ianlunn.co.uk/plugins/jquery-parallax/
   Dual licensed under the MIT and GPL licenses:
   http://www.opensource.org/licenses/mit-license.php
   http://www.gnu.org/licenses/gpl.html
 */
(function(e) {
    var t = e(window);
    var n = t.height();
    t.resize(function() {
        n = t.height()
    });
    e.fn.parallax = function(r, i, s) {
        function l() {
            var s = t.scrollTop();
            o.each(function() {
                var t = e(this);
                var f = t.offset().top;
                var l = u(t);
                if (f + l < s || f > s + n) {
                    return
                }
                o.css("backgroundPosition", r + " " + Math.round((a - s) * i) + "px")
            })
        }
        var o = e(this);
        var u;
        var a;
        var f = 0;
        o.each(function() {
            a = o.offset().top
        });
        if (s) {
            u = function(e) {
                return e.outerHeight(true)
            }
        } else {
            u = function(e) {
                return e.height()
            }
        }
        if (arguments.length < 1 || r === null) r = "50%";
        if (arguments.length < 2 || i === null) i = .1;
        if (arguments.length < 3 || s === null) s = true;
        t.bind("scroll", l).resize(l);
        l()
    }
})(jQuery);


/**
 * downCount: Simple Countdown clock with offset
 * Author: Sonny T. <hi@sonnyt.com>, sonnyt.com
 */
(function(e) {
    e.fn.downCount = function(t, n) {
        function o() {
            var e = new Date(r.date),
                t = s();
            var o = e - t;
            if (o < 0) {
                clearInterval(u);
                if (n && typeof n === "function") n();
                return
            }
            var a = 1e3,
                f = a * 60,
                l = f * 60,
                c = l * 24;
            var h = Math.floor(o / c),
                p = Math.floor(o % c / l),
                d = Math.floor(o % l / f),
                v = Math.floor(o % f / a);
            h = String(h).length >= 2 ? h : "0" + h;
            p = String(p).length >= 2 ? p : "0" + p;
            d = String(d).length >= 2 ? d : "0" + d;
            v = String(v).length >= 2 ? v : "0" + v;
            var m = h === 1 ? "day" : "days",
                g = p === 1 ? "hour" : "hours",
                y = d === 1 ? "minute" : "minutes",
                b = v === 1 ? "second" : "seconds";
            i.find(".days").text(h);
            i.find(".hours").text(p);
            i.find(".minutes").text(d);
            i.find(".seconds").text(v);
            i.find(".days_ref").text(m);
            i.find(".hours_ref").text(g);
            i.find(".minutes_ref").text(y);
            i.find(".seconds_ref").text(b)
        }
        var r = e.extend({
            date: null,
            offset: null
        }, t);
        if (!r.date) {
            e.error("Date is not defined.")
        }
        if (!Date.parse(r.date)) {
            e.error("Incorrect date format, it should look like this, 12/24/2012 12:00:00.")
        }
        var i = this;
        var s = function() {
            var e = new Date;
            var t = e.getTime() + e.getTimezoneOffset() * 6e4;
            var n = new Date(t + 36e5 * r.offset);
            return n
        };
        var u = setInterval(o, 1e3)
    }
})(jQuery);


/**
 * jquery.nicescroll 3.5.4
 * InuYaksa 2013 MIT http://areaaperta.com/nicescroll
 * */
if (dttheme_urls.nicescroll == "enable") {
    (function(e) {
        "function" === typeof define && define.amd ? define(["jquery"], e) : e(jQuery)
    })(function(e) {
        var t = !1,
            n = !1,
            r = 5e3,
            i = 2e3,
            s = 0,
            o = ["ms", "moz", "webkit", "o"],
            u = window.requestAnimationFrame || !1,
            a = window.cancelAnimationFrame || !1;
        if (!u)
            for (var f in o) {
                var l = o[f];
                u || (u = window[l + "RequestAnimationFrame"]);
                a || (a = window[l + "CancelAnimationFrame"] || window[l + "CancelRequestAnimationFrame"])
            }
        var c = window.MutationObserver || window.WebKitMutationObserver || !1,
            h = {
                zindex: "auto",
                cursoropacitymin: 0,
                cursoropacitymax: 1,
                cursorcolor: "#424242",
                cursorwidth: "5px",
                cursorborder: "1px solid #fff",
                cursorborderradius: "5px",
                scrollspeed: 60,
                mousescrollstep: 24,
                touchbehavior: !1,
                hwacceleration: !0,
                usetransition: !0,
                boxzoom: !1,
                dblclickzoom: !0,
                gesturezoom: !0,
                grabcursorenabled: !0,
                autohidemode: !0,
                background: "",
                iframeautoresize: !0,
                cursorminheight: 32,
                preservenativescrolling: !0,
                railoffset: !1,
                bouncescroll: !0,
                spacebarenabled: !0,
                railpadding: {
                    top: 0,
                    right: 0,
                    left: 0,
                    bottom: 0
                },
                disableoutline: !0,
                horizrailenabled: !0,
                railalign: "right",
                railvalign: "bottom",
                enabletranslate3d: !0,
                enablemousewheel: !0,
                enablekeyboard: !0,
                smoothscroll: !0,
                sensitiverail: !0,
                enablemouselockapi: !0,
                cursorfixedheight: !1,
                directionlockdeadzone: 6,
                hidecursordelay: 400,
                nativeparentscrolling: !0,
                enablescrollonselection: !0,
                overflowx: !0,
                overflowy: !0,
                cursordragspeed: .3,
                rtlmode: "auto",
                cursordragontouch: !1,
                oneaxismousemode: "auto",
                scriptpath: function() {
                    var e = document.getElementsByTagName("script"),
                        e = e[e.length - 1].src.split("?")[0];
                    return 0 < e.split("/").length ? e.split("/").slice(0, -1).join("/") + "/" : ""
                }()
            },
            p = !1,
            d = function() {
                if (p) return p;
                var e = document.createElement("DIV"),
                    t = {
                        haspointerlock: "pointerLockElement" in document || "mozPointerLockElement" in document || "webkitPointerLockElement" in document
                    };
                t.isopera = "opera" in window;
                t.isopera12 = t.isopera && "getUserMedia" in navigator;
                t.isoperamini = "[object OperaMini]" === Object.prototype.toString.call(window.operamini);
                t.isie = "all" in document && "attachEvent" in e && !t.isopera;
                t.isieold = t.isie && !("msInterpolationMode" in e.style);
                t.isie7 = t.isie && !t.isieold && (!("documentMode" in document) || 7 == document.documentMode);
                t.isie8 = t.isie && "documentMode" in document && 8 == document.documentMode;
                t.isie9 = t.isie && "performance" in window && 9 <= document.documentMode;
                t.isie10 = t.isie && "performance" in window && 10 <= document.documentMode;
                t.isie9mobile = /iemobile.9/i.test(navigator.userAgent);
                t.isie9mobile && (t.isie9 = !1);
                t.isie7mobile = !t.isie9mobile && t.isie7 && /iemobile/i.test(navigator.userAgent);
                t.ismozilla = "MozAppearance" in e.style;
                t.iswebkit = "WebkitAppearance" in e.style;
                t.ischrome = "chrome" in window;
                t.ischrome22 = t.ischrome && t.haspointerlock;
                t.ischrome26 = t.ischrome && "transition" in e.style;
                t.cantouch = "ontouchstart" in document.documentElement || "ontouchstart" in window;
                t.hasmstouch = window.navigator.msPointerEnabled || !1;
                t.ismac = /^mac$/i.test(navigator.platform);
                t.isios = t.cantouch && /iphone|ipad|ipod/i.test(navigator.platform);
                t.isios4 = t.isios && !("seal" in Object);
                t.isandroid = /android/i.test(navigator.userAgent);
                t.trstyle = !1;
                t.hastransform = !1;
                t.hastranslate3d = !1;
                t.transitionstyle = !1;
                t.hastransition = !1;
                t.transitionend = !1;
                for (var n = ["transform", "msTransform", "webkitTransform", "MozTransform", "OTransform"], r = 0; r < n.length; r++)
                    if ("undefined" != typeof e.style[n[r]]) {
                        t.trstyle = n[r];
                        break
                    }
                t.hastransform = !1 != t.trstyle;
                t.hastransform && (e.style[t.trstyle] = "translate3d(1px,2px,3px)", t.hastranslate3d = /translate3d/.test(e.style[t.trstyle]));
                t.transitionstyle = !1;
                t.prefixstyle = "";
                t.transitionend = !1;
                for (var n = "transition webkitTransition MozTransition OTransition OTransition msTransition KhtmlTransition".split(" "), i = " -webkit- -moz- -o- -o -ms- -khtml-".split(" "), s = "transitionend webkitTransitionEnd transitionend otransitionend oTransitionEnd msTransitionEnd KhtmlTransitionEnd".split(" "), r = 0; r < n.length; r++)
                    if (n[r] in e.style) {
                        t.transitionstyle = n[r];
                        t.prefixstyle = i[r];
                        t.transitionend = s[r];
                        break
                    }
                t.ischrome26 && (t.prefixstyle = i[1]);
                t.hastransition = t.transitionstyle;
                e: {
                    n = ["-moz-grab", "-webkit-grab", "grab"];
                    if (t.ischrome && !t.ischrome22 || t.isie) n = [];
                    for (r = 0; r < n.length; r++)
                        if (i = n[r], e.style.cursor = i, e.style.cursor == i) {
                            n = i;
                            break e
                        }
                    n = "url(http://www.google.com/intl/en_ALL/mapfiles/openhand.cur),n-resize"
                }
                t.cursorgrabvalue = n;
                t.hasmousecapture = "setCapture" in e;
                t.hasMutationObserver = !1 !== c;
                return p = t
            },
            v = function(o, f) {
                function l() {
                    var e = y.win;
                    if ("zIndex" in e) return e.zIndex();
                    for (; 0 < e.length && 9 != e[0].nodeType;) {
                        var t = e.css("zIndex");
                        if (!isNaN(t) && 0 != t) return parseInt(t);
                        e = e.parent()
                    }
                    return !1
                }

                function p(e, t, n) {
                    t = e.css(t);
                    e = parseFloat(t);
                    return isNaN(e) ? (e = T[t] || 0, n = 3 == e ? n ? y.win.outerHeight() - y.win.innerHeight() : y.win.outerWidth() - y.win.innerWidth() : 1, y.isie8 && e && (e += 1), n ? e : 0) : e
                }

                function v(e, t, n, r) {
                    y._bind(e, t, function(r) {
                        r = r ? r : window.event;
                        var i = {
                            original: r,
                            target: r.target || r.srcElement,
                            type: "wheel",
                            deltaMode: "MozMousePixelScroll" == r.type ? 0 : 1,
                            deltaX: 0,
                            deltaZ: 0,
                            preventDefault: function() {
                                r.preventDefault ? r.preventDefault() : r.returnValue = !1;
                                return !1
                            },
                            stopImmediatePropagation: function() {
                                r.stopImmediatePropagation ? r.stopImmediatePropagation() : r.cancelBubble = !0
                            }
                        };
                        "mousewheel" == t ? (i.deltaY = -.025 * r.wheelDelta, r.wheelDeltaX && (i.deltaX = -.025 * r.wheelDeltaX)) : i.deltaY = r.detail;
                        return n.call(e, i)
                    }, r)
                }

                function g(e, t, n) {
                    var r, i;
                    0 == e.deltaMode ? (r = -Math.floor(e.deltaX * (y.opt.mousescrollstep / 54)), i = -Math.floor(e.deltaY * (y.opt.mousescrollstep / 54))) : 1 == e.deltaMode && (r = -Math.floor(e.deltaX * y.opt.mousescrollstep), i = -Math.floor(e.deltaY * y.opt.mousescrollstep));
                    t && y.opt.oneaxismousemode && 0 == r && i && (r = i, i = 0);
                    r && (y.scrollmom && y.scrollmom.stop(), y.lastdeltax += r, y.debounced("mousewheelx", function() {
                        var e = y.lastdeltax;
                        y.lastdeltax = 0;
                        y.rail.drag || y.doScrollLeftBy(e)
                    }, 15));
                    if (i) {
                        if (y.opt.nativeparentscrolling && n && !y.ispage && !y.zoomactive)
                            if (0 > i) {
                                if (y.getScrollTop() >= y.page.maxh) return !0
                            } else if (0 >= y.getScrollTop()) return !0;
                        y.scrollmom && y.scrollmom.stop();
                        y.lastdeltay += i;
                        y.debounced("mousewheely", function() {
                            var e = y.lastdeltay;
                            y.lastdeltay = 0;
                            y.rail.drag || y.doScrollBy(e)
                        }, 15)
                    }
                    e.stopImmediatePropagation();
                    return e.preventDefault()
                }
                var y = this;
                this.version = "3.5.4";
                this.name = "nicescroll";
                this.me = f;
                this.opt = {
                    doc: e("body"),
                    win: !1
                };
                e.extend(this.opt, h);
                this.opt.snapbackspeed = 80;
                if (o)
                    for (var b in y.opt) "undefined" != typeof o[b] && (y.opt[b] = o[b]);
                this.iddoc = (this.doc = y.opt.doc) && this.doc[0] ? this.doc[0].id || "" : "";
                this.ispage = /^BODY|HTML/.test(y.opt.win ? y.opt.win[0].nodeName : this.doc[0].nodeName);
                this.haswrapper = !1 !== y.opt.win;
                this.win = y.opt.win || (this.ispage ? e(window) : this.doc);
                this.docscroll = this.ispage && !this.haswrapper ? e(window) : this.win;
                this.body = e("body");
                this.iframe = this.isfixed = this.viewport = !1;
                this.isiframe = "IFRAME" == this.doc[0].nodeName && "IFRAME" == this.win[0].nodeName;
                this.istextarea = "TEXTAREA" == this.win[0].nodeName;
                this.forcescreen = !1;
                this.canshowonmouseevent = "scroll" != y.opt.autohidemode;
                this.page = this.view = this.onzoomout = this.onzoomin = this.onscrollcancel = this.onscrollend = this.onscrollstart = this.onclick = this.ongesturezoom = this.onkeypress = this.onmousewheel = this.onmousemove = this.onmouseup = this.onmousedown = !1;
                this.scroll = {
                    x: 0,
                    y: 0
                };
                this.scrollratio = {
                    x: 0,
                    y: 0
                };
                this.cursorheight = 20;
                this.scrollvaluemax = 0;
                this.observerremover = this.observer = this.scrollmom = this.scrollrunning = this.isrtlmode = !1;
                do this.id = "ascrail" + i++; while (document.getElementById(this.id));
                this.hasmousefocus = this.hasfocus = this.zoomactive = this.zoom = this.selectiondrag = this.cursorfreezed = this.cursor = this.rail = !1;
                this.visibility = !0;
                this.hidden = this.locked = !1;
                this.cursoractive = !0;
                this.wheelprevented = !1;
                this.overflowx = y.opt.overflowx;
                this.overflowy = y.opt.overflowy;
                this.nativescrollingarea = !1;
                this.checkarea = 0;
                this.events = [];
                this.saved = {};
                this.delaylist = {};
                this.synclist = {};
                this.lastdeltay = this.lastdeltax = 0;
                this.detected = d();
                var w = e.extend({}, this.detected);
                this.ishwscroll = (this.canhwscroll = w.hastransform && y.opt.hwacceleration) && y.haswrapper;
                this.istouchcapable = !1;
                w.cantouch && w.ischrome && !w.isios && !w.isandroid && (this.istouchcapable = !0, w.cantouch = !1);
                w.cantouch && w.ismozilla && !w.isios && !w.isandroid && (this.istouchcapable = !0, w.cantouch = !1);
                y.opt.enablemouselockapi || (w.hasmousecapture = !1, w.haspointerlock = !1);
                this.delayed = function(e, t, n, r) {
                    var i = y.delaylist[e],
                        s = (new Date).getTime();
                    if (!r && i && i.tt) return !1;
                    i && i.tt && clearTimeout(i.tt);
                    if (i && i.last + n > s && !i.tt) y.delaylist[e] = {
                        last: s + n,
                        tt: setTimeout(function() {
                            y && (y.delaylist[e].tt = 0, t.call())
                        }, n)
                    };
                    else if (!i || !i.tt) y.delaylist[e] = {
                        last: s,
                        tt: 0
                    }, setTimeout(function() {
                        t.call()
                    }, 0)
                };
                this.debounced = function(e, t, n) {
                    var r = y.delaylist[e];
                    (new Date).getTime();
                    y.delaylist[e] = t;
                    r || setTimeout(function() {
                        var t = y.delaylist[e];
                        y.delaylist[e] = !1;
                        t.call()
                    }, n)
                };
                var E = !1;
                this.synched = function(e, t) {
                    y.synclist[e] = t;
                    (function() {
                        E || (u(function() {
                            E = !1;
                            for (e in y.synclist) {
                                var t = y.synclist[e];
                                t && t.call(y);
                                y.synclist[e] = !1
                            }
                        }), E = !0)
                    })();
                    return e
                };
                this.unsynched = function(e) {
                    y.synclist[e] && (y.synclist[e] = !1)
                };
                this.css = function(e, t) {
                    for (var n in t) y.saved.css.push([e, n, e.css(n)]), e.css(n, t[n])
                };
                this.scrollTop = function(e) {
                    return "undefined" == typeof e ? y.getScrollTop() : y.setScrollTop(e)
                };
                this.scrollLeft = function(e) {
                    return "undefined" == typeof e ? y.getScrollLeft() : y.setScrollLeft(e)
                };
                BezierClass = function(e, t, n, r, i, s, o) {
                    this.st = e;
                    this.ed = t;
                    this.spd = n;
                    this.p1 = r || 0;
                    this.p2 = i || 1;
                    this.p3 = s || 0;
                    this.p4 = o || 1;
                    this.ts = (new Date).getTime();
                    this.df = this.ed - this.st
                };
                BezierClass.prototype = {
                    B2: function(e) {
                        return 3 * e * e * (1 - e)
                    },
                    B3: function(e) {
                        return 3 * e * (1 - e) * (1 - e)
                    },
                    B4: function(e) {
                        return (1 - e) * (1 - e) * (1 - e)
                    },
                    getNow: function() {
                        var e = 1 - ((new Date).getTime() - this.ts) / this.spd,
                            t = this.B2(e) + this.B3(e) + this.B4(e);
                        return 0 > e ? this.ed : this.st + Math.round(this.df * t)
                    },
                    update: function(e, t) {
                        this.st = this.getNow();
                        this.ed = e;
                        this.spd = t;
                        this.ts = (new Date).getTime();
                        this.df = this.ed - this.st;
                        return this
                    }
                };
                if (this.ishwscroll) {
                    this.doc.translate = {
                        x: 0,
                        y: 0,
                        tx: "0px",
                        ty: "0px"
                    };
                    w.hastranslate3d && w.isios && this.doc.css("-webkit-backface-visibility", "hidden");
                    var S = function() {
                        var e = y.doc.css(w.trstyle);
                        return e && "matrix" == e.substr(0, 6) ? e.replace(/^.*\((.*)\)$/g, "$1").replace(/px/g, "").split(/, +/) : !1
                    };
                    this.getScrollTop = function(e) {
                        if (!e) {
                            if (e = S()) return 16 == e.length ? -e[13] : -e[5];
                            if (y.timerscroll && y.timerscroll.bz) return y.timerscroll.bz.getNow()
                        }
                        return y.doc.translate.y
                    };
                    this.getScrollLeft = function(e) {
                        if (!e) {
                            if (e = S()) return 16 == e.length ? -e[12] : -e[4];
                            if (y.timerscroll && y.timerscroll.bh) return y.timerscroll.bh.getNow()
                        }
                        return y.doc.translate.x
                    };
                    this.notifyScrollEvent = document.createEvent ? function(e) {
                        var t = document.createEvent("UIEvents");
                        t.initUIEvent("scroll", !1, !0, window, 1);
                        e.dispatchEvent(t)
                    } : document.fireEvent ? function(e) {
                        var t = document.createEventObject();
                        e.fireEvent("onscroll");
                        t.cancelBubble = !0
                    } : function(e, t) {};
                    w.hastranslate3d && y.opt.enabletranslate3d ? (this.setScrollTop = function(e, t) {
                        y.doc.translate.y = e;
                        y.doc.translate.ty = -1 * e + "px";
                        y.doc.css(w.trstyle, "translate3d(" + y.doc.translate.tx + "," + y.doc.translate.ty + ",0px)");
                        t || y.notifyScrollEvent(y.win[0])
                    }, this.setScrollLeft = function(e, t) {
                        y.doc.translate.x = e;
                        y.doc.translate.tx = -1 * e + "px";
                        y.doc.css(w.trstyle, "translate3d(" + y.doc.translate.tx + "," + y.doc.translate.ty + ",0px)");
                        t || y.notifyScrollEvent(y.win[0])
                    }) : (this.setScrollTop = function(e, t) {
                        y.doc.translate.y = e;
                        y.doc.translate.ty = -1 * e + "px";
                        y.doc.css(w.trstyle, "translate(" + y.doc.translate.tx + "," + y.doc.translate.ty + ")");
                        t || y.notifyScrollEvent(y.win[0])
                    }, this.setScrollLeft = function(e, t) {
                        y.doc.translate.x = e;
                        y.doc.translate.tx = -1 * e + "px";
                        y.doc.css(w.trstyle, "translate(" + y.doc.translate.tx + "," + y.doc.translate.ty + ")");
                        t || y.notifyScrollEvent(y.win[0])
                    })
                } else this.getScrollTop = function() {
                    return y.docscroll.scrollTop()
                }, this.setScrollTop = function(e) {
                    return y.docscroll.scrollTop(e)
                }, this.getScrollLeft = function() {
                    return y.docscroll.scrollLeft()
                }, this.setScrollLeft = function(e) {
                    return y.docscroll.scrollLeft(e)
                };
                this.getTarget = function(e) {
                    return !e ? !1 : e.target ? e.target : e.srcElement ? e.srcElement : !1
                };
                this.hasParent = function(e, t) {
                    if (!e) return !1;
                    for (var n = e.target || e.srcElement || e || !1; n && n.id != t;) n = n.parentNode || !1;
                    return !1 !== n
                };
                var T = {
                    thin: 1,
                    medium: 3,
                    thick: 5
                };
                this.getOffset = function() {
                    if (y.isfixed) return {
                        top: parseFloat(y.win.css("top")),
                        left: parseFloat(y.win.css("left"))
                    };
                    if (!y.viewport) return y.win.offset();
                    var e = y.win.offset(),
                        t = y.viewport.offset();
                    return {
                        top: e.top - t.top + y.viewport.scrollTop(),
                        left: e.left - t.left + y.viewport.scrollLeft()
                    }
                };
                this.updateScrollBar = function(e) {
                    if (y.ishwscroll) y.rail.css({
                        height: y.win.innerHeight()
                    }), y.railh && y.railh.css({
                        width: y.win.innerWidth()
                    });
                    else {
                        var t = y.getOffset(),
                            n = t.top,
                            r = t.left,
                            n = n + p(y.win, "border-top-width", !0);
                        y.win.outerWidth();
                        y.win.innerWidth();
                        var r = r + (y.rail.align ? y.win.outerWidth() - p(y.win, "border-right-width") - y.rail.width : p(y.win, "border-left-width")),
                            i = y.opt.railoffset;
                        i && (i.top && (n += i.top), y.rail.align && i.left && (r += i.left));
                        y.locked || y.rail.css({
                            top: n,
                            left: r,
                            height: e ? e.h : y.win.innerHeight()
                        });
                        y.zoom && y.zoom.css({
                            top: n + 1,
                            left: 1 == y.rail.align ? r - 20 : r + y.rail.width + 4
                        });
                        y.railh && !y.locked && (n = t.top, r = t.left, e = y.railh.align ? n + p(y.win, "border-top-width", !0) + y.win.innerHeight() - y.railh.height : n + p(y.win, "border-top-width", !0), r += p(y.win, "border-left-width"), y.railh.css({
                            top: e,
                            left: r,
                            width: y.railh.width
                        }))
                    }
                };
                this.doRailClick = function(e, t, n) {
                    var r;
                    y.locked || (y.cancelEvent(e), t ? (t = n ? y.doScrollLeft : y.doScrollTop, r = n ? (e.pageX - y.railh.offset().left - y.cursorwidth / 2) * y.scrollratio.x : (e.pageY - y.rail.offset().top - y.cursorheight / 2) * y.scrollratio.y, t(r)) : (t = n ? y.doScrollLeftBy : y.doScrollBy, r = n ? y.scroll.x : y.scroll.y, e = n ? e.pageX - y.railh.offset().left : e.pageY - y.rail.offset().top, n = n ? y.view.w : y.view.h, r >= e ? t(n) : t(-n)))
                };
                y.hasanimationframe = u;
                y.hascancelanimationframe = a;
                y.hasanimationframe ? y.hascancelanimationframe || (a = function() {
                    y.cancelAnimationFrame = !0
                }) : (u = function(e) {
                    return setTimeout(e, 15 - Math.floor(+(new Date) / 1e3) % 16)
                }, a = clearInterval);
                this.init = function() {
                    y.saved.css = [];
                    if (w.isie7mobile || w.isoperamini) return !0;
                    w.hasmstouch && y.css(y.ispage ? e("html") : y.win, {
                        "-ms-touch-action": "none"
                    });
                    y.zindex = "auto";
                    y.zindex = !y.ispage && "auto" == y.opt.zindex ? l() || "auto" : y.opt.zindex;
                    !y.ispage && "auto" != y.zindex && y.zindex > s && (s = y.zindex);
                    y.isie && 0 == y.zindex && "auto" == y.opt.zindex && (y.zindex = "auto");
                    if (!y.ispage || !w.cantouch && !w.isieold && !w.isie9mobile) {
                        var i = y.docscroll;
                        y.ispage && (i = y.haswrapper ? y.win : y.doc);
                        w.isie9mobile || y.css(i, {
                            "overflow-y": "hidden"
                        });
                        y.ispage && w.isie7 && ("BODY" == y.doc[0].nodeName ? y.css(e("html"), {
                            "overflow-y": "hidden"
                        }) : "HTML" == y.doc[0].nodeName && y.css(e("body"), {
                            "overflow-y": "hidden"
                        }));
                        w.isios && !y.ispage && !y.haswrapper && y.css(e("body"), {
                            "-webkit-overflow-scrolling": "touch"
                        });
                        var o = e(document.createElement("div"));
                        o.css({
                            position: "relative",
                            top: 0,
                            "float": "right",
                            width: y.opt.cursorwidth,
                            height: "0px",
                            "background-color": y.opt.cursorcolor,
                            border: y.opt.cursorborder,
                            "background-clip": "padding-box",
                            "-webkit-border-radius": y.opt.cursorborderradius,
                            "-moz-border-radius": y.opt.cursorborderradius,
                            "border-radius": y.opt.cursorborderradius
                        });
                        o.hborder = parseFloat(o.outerHeight() - o.innerHeight());
                        y.cursor = o;
                        var u = e(document.createElement("div"));
                        u.attr("id", y.id);
                        u.addClass("nicescroll-rails");
                        var a, f, h = ["left", "right"],
                            p;
                        for (p in h) f = h[p], (a = y.opt.railpadding[f]) ? u.css("padding-" + f, a + "px") : y.opt.railpadding[f] = 0;
                        u.append(o);
                        u.width = Math.max(parseFloat(y.opt.cursorwidth), o.outerWidth()) + y.opt.railpadding.left + y.opt.railpadding.right;
                        u.css({
                            width: u.width + "px",
                            zIndex: y.zindex,
                            background: y.opt.background,
                            cursor: "default"
                        });
                        u.visibility = !0;
                        u.scrollable = !0;
                        u.align = "left" == y.opt.railalign ? 0 : 1;
                        y.rail = u;
                        o = y.rail.drag = !1;
                        y.opt.boxzoom && !y.ispage && !w.isieold && (o = document.createElement("div"), y.bind(o, "click", y.doZoom), y.zoom = e(o), y.zoom.css({
                            cursor: "pointer",
                            "z-index": y.zindex,
                            backgroundImage: "url(" + y.opt.scriptpath + "zoomico.png)",
                            height: 18,
                            width: 18,
                            backgroundPosition: "0px 0px"
                        }), y.opt.dblclickzoom && y.bind(y.win, "dblclick", y.doZoom), w.cantouch && y.opt.gesturezoom && (y.ongesturezoom = function(e) {
                            1.5 < e.scale && y.doZoomIn(e);
                            .8 > e.scale && y.doZoomOut(e);
                            return y.cancelEvent(e)
                        }, y.bind(y.win, "gestureend", y.ongesturezoom)));
                        y.railh = !1;
                        if (y.opt.horizrailenabled) {
                            y.css(i, {
                                "overflow-x": "hidden"
                            });
                            o = e(document.createElement("div"));
                            o.css({
                                position: "relative",
                                top: 0,
                                height: y.opt.cursorwidth,
                                width: "0px",
                                "background-color": y.opt.cursorcolor,
                                border: y.opt.cursorborder,
                                "background-clip": "padding-box",
                                "-webkit-border-radius": y.opt.cursorborderradius,
                                "-moz-border-radius": y.opt.cursorborderradius,
                                "border-radius": y.opt.cursorborderradius
                            });
                            o.wborder = parseFloat(o.outerWidth() - o.innerWidth());
                            y.cursorh = o;
                            var d = e(document.createElement("div"));
                            d.attr("id", y.id + "-hr");
                            d.addClass("nicescroll-rails");
                            d.height = Math.max(parseFloat(y.opt.cursorwidth), o.outerHeight());
                            d.css({
                                height: d.height + "px",
                                zIndex: y.zindex,
                                background: y.opt.background
                            });
                            d.append(o);
                            d.visibility = !0;
                            d.scrollable = !0;
                            d.align = "top" == y.opt.railvalign ? 0 : 1;
                            y.railh = d;
                            y.railh.drag = !1
                        }
                        y.ispage ? (u.css({
                            position: "fixed",
                            top: "0px",
                            height: "100%"
                        }), u.align ? u.css({
                            right: "0px"
                        }) : u.css({
                            left: "0px"
                        }), y.body.append(u), y.railh && (d.css({
                            position: "fixed",
                            left: "0px",
                            width: "100%"
                        }), d.align ? d.css({
                            bottom: "0px"
                        }) : d.css({
                            top: "0px"
                        }), y.body.append(d))) : (y.ishwscroll ? ("static" == y.win.css("position") && y.css(y.win, {
                            position: "relative"
                        }), i = "HTML" == y.win[0].nodeName ? y.body : y.win, y.zoom && (y.zoom.css({
                            position: "absolute",
                            top: 1,
                            right: 0,
                            "margin-right": u.width + 4
                        }), i.append(y.zoom)), u.css({
                            position: "absolute",
                            top: 0
                        }), u.align ? u.css({
                            right: 0
                        }) : u.css({
                            left: 0
                        }), i.append(u), d && (d.css({
                            position: "absolute",
                            left: 0,
                            bottom: 0
                        }), d.align ? d.css({
                            bottom: 0
                        }) : d.css({
                            top: 0
                        }), i.append(d))) : (y.isfixed = "fixed" == y.win.css("position"), i = y.isfixed ? "fixed" : "absolute", y.isfixed || (y.viewport = y.getViewport(y.win[0])), y.viewport && (y.body = y.viewport, !1 == /fixed|relative|absolute/.test(y.viewport.css("position")) && y.css(y.viewport, {
                            position: "relative"
                        })), u.css({
                            position: i
                        }), y.zoom && y.zoom.css({
                            position: i
                        }), y.updateScrollBar(), y.body.append(u), y.zoom && y.body.append(y.zoom), y.railh && (d.css({
                            position: i
                        }), y.body.append(d))), w.isios && y.css(y.win, {
                            "-webkit-tap-highlight-color": "rgba(0,0,0,0)",
                            "-webkit-touch-callout": "none"
                        }), w.isie && y.opt.disableoutline && y.win.attr("hideFocus", "true"), w.iswebkit && y.opt.disableoutline && y.win.css({
                            outline: "none"
                        }));
                        !1 === y.opt.autohidemode ? (y.autohidedom = !1, y.rail.css({
                            opacity: y.opt.cursoropacitymax
                        }), y.railh && y.railh.css({
                            opacity: y.opt.cursoropacitymax
                        })) : !0 === y.opt.autohidemode || "leave" === y.opt.autohidemode ? (y.autohidedom = e().add(y.rail), w.isie8 && (y.autohidedom = y.autohidedom.add(y.cursor)), y.railh && (y.autohidedom = y.autohidedom.add(y.railh)), y.railh && w.isie8 && (y.autohidedom = y.autohidedom.add(y.cursorh))) : "scroll" == y.opt.autohidemode ? (y.autohidedom = e().add(y.rail), y.railh && (y.autohidedom = y.autohidedom.add(y.railh))) : "cursor" == y.opt.autohidemode ? (y.autohidedom = e().add(y.cursor), y.railh && (y.autohidedom = y.autohidedom.add(y.cursorh))) : "hidden" == y.opt.autohidemode && (y.autohidedom = !1, y.hide(), y.locked = !1);
                        if (w.isie9mobile) y.scrollmom = new m(y), y.onmangotouch = function(e) {
                            e = y.getScrollTop();
                            var t = y.getScrollLeft();
                            if (e == y.scrollmom.lastscrolly && t == y.scrollmom.lastscrollx) return !0;
                            var n = e - y.mangotouch.sy,
                                r = t - y.mangotouch.sx;
                            if (0 != Math.round(Math.sqrt(Math.pow(r, 2) + Math.pow(n, 2)))) {
                                var i = 0 > n ? -1 : 1,
                                    s = 0 > r ? -1 : 1,
                                    o = +(new Date);
                                y.mangotouch.lazy && clearTimeout(y.mangotouch.lazy);
                                80 < o - y.mangotouch.tm || y.mangotouch.dry != i || y.mangotouch.drx != s ? (y.scrollmom.stop(), y.scrollmom.reset(t, e), y.mangotouch.sy = e, y.mangotouch.ly = e, y.mangotouch.sx = t, y.mangotouch.lx = t, y.mangotouch.dry = i, y.mangotouch.drx = s, y.mangotouch.tm = o) : (y.scrollmom.stop(), y.scrollmom.update(y.mangotouch.sx - r, y.mangotouch.sy - n), y.mangotouch.tm = o, n = Math.max(Math.abs(y.mangotouch.ly - e), Math.abs(y.mangotouch.lx - t)), y.mangotouch.ly = e, y.mangotouch.lx = t, 2 < n && (y.mangotouch.lazy = setTimeout(function() {
                                    y.mangotouch.lazy = !1;
                                    y.mangotouch.dry = 0;
                                    y.mangotouch.drx = 0;
                                    y.mangotouch.tm = 0;
                                    y.scrollmom.doMomentum(30)
                                }, 100)))
                            }
                        }, u = y.getScrollTop(), d = y.getScrollLeft(), y.mangotouch = {
                            sy: u,
                            ly: u,
                            dry: 0,
                            sx: d,
                            lx: d,
                            drx: 0,
                            lazy: !1,
                            tm: 0
                        }, y.bind(y.docscroll, "scroll", y.onmangotouch);
                        else {
                            if (w.cantouch || y.istouchcapable || y.opt.touchbehavior || w.hasmstouch) {
                                y.scrollmom = new m(y);
                                y.ontouchstart = function(t) {
                                    if (t.pointerType && 2 != t.pointerType) return !1;
                                    y.hasmoving = !1;
                                    if (!y.locked) {
                                        if (w.hasmstouch)
                                            for (var n = t.target ? t.target : !1; n;) {
                                                var r = e(n).getNiceScroll();
                                                if (0 < r.length && r[0].me == y.me) break;
                                                if (0 < r.length) return !1;
                                                if ("DIV" == n.nodeName && n.id == y.id) break;
                                                n = n.parentNode ? n.parentNode : !1
                                            }
                                        y.cancelScroll();
                                        if ((n = y.getTarget(t)) && /INPUT/i.test(n.nodeName) && /range/i.test(n.type)) return y.stopPropagation(t);
                                        !("clientX" in t) && "changedTouches" in t && (t.clientX = t.changedTouches[0].clientX, t.clientY = t.changedTouches[0].clientY);
                                        y.forcescreen && (r = t, t = {
                                            original: t.original ? t.original : t
                                        }, t.clientX = r.screenX, t.clientY = r.screenY);
                                        y.rail.drag = {
                                            x: t.clientX,
                                            y: t.clientY,
                                            sx: y.scroll.x,
                                            sy: y.scroll.y,
                                            st: y.getScrollTop(),
                                            sl: y.getScrollLeft(),
                                            pt: 2,
                                            dl: !1
                                        };
                                        if (y.ispage || !y.opt.directionlockdeadzone) y.rail.drag.dl = "f";
                                        else {
                                            var r = e(window).width(),
                                                i = e(window).height(),
                                                s = Math.max(document.body.scrollWidth, document.documentElement.scrollWidth),
                                                o = Math.max(document.body.scrollHeight, document.documentElement.scrollHeight),
                                                i = Math.max(0, o - i),
                                                r = Math.max(0, s - r);
                                            y.rail.drag.ck = !y.rail.scrollable && y.railh.scrollable ? 0 < i ? "v" : !1 : y.rail.scrollable && !y.railh.scrollable ? 0 < r ? "h" : !1 : !1;
                                            y.rail.drag.ck || (y.rail.drag.dl = "f")
                                        }
                                        y.opt.touchbehavior && y.isiframe && w.isie && (r = y.win.position(), y.rail.drag.x += r.left, y.rail.drag.y += r.top);
                                        y.hasmoving = !1;
                                        y.lastmouseup = !1;
                                        y.scrollmom.reset(t.clientX, t.clientY);
                                        if (!w.cantouch && !this.istouchcapable && !w.hasmstouch) {
                                            if (!n || !/INPUT|SELECT|TEXTAREA/i.test(n.nodeName)) return !y.ispage && w.hasmousecapture && n.setCapture(), y.opt.touchbehavior ? (n.onclick && !n._onclick && (n._onclick = n.onclick, n.onclick = function(e) {
                                                if (y.hasmoving) return !1;
                                                n._onclick.call(this, e)
                                            }), y.cancelEvent(t)) : y.stopPropagation(t);
                                            /SUBMIT|CANCEL|BUTTON/i.test(e(n).attr("type")) && (pc = {
                                                tg: n,
                                                click: !1
                                            }, y.preventclick = pc)
                                        }
                                    }
                                };
                                y.ontouchend = function(e) {
                                    if (e.pointerType && 2 != e.pointerType) return !1;
                                    if (y.rail.drag && 2 == y.rail.drag.pt && (y.scrollmom.doMomentum(), y.rail.drag = !1, y.hasmoving && (y.lastmouseup = !0, y.hideCursor(), w.hasmousecapture && document.releaseCapture(), !w.cantouch))) return y.cancelEvent(e)
                                };
                                var v = y.opt.touchbehavior && y.isiframe && !w.hasmousecapture;
                                y.ontouchmove = function(t, n) {
                                    if (t.pointerType && 2 != t.pointerType) return !1;
                                    if (y.rail.drag && 2 == y.rail.drag.pt) {
                                        if (w.cantouch && "undefined" == typeof t.original) return !0;
                                        y.hasmoving = !0;
                                        y.preventclick && !y.preventclick.click && (y.preventclick.click = y.preventclick.tg.onclick || !1, y.preventclick.tg.onclick = y.onpreventclick);
                                        t = e.extend({
                                            original: t
                                        }, t);
                                        "changedTouches" in t && (t.clientX = t.changedTouches[0].clientX, t.clientY = t.changedTouches[0].clientY);
                                        if (y.forcescreen) {
                                            var r = t;
                                            t = {
                                                original: t.original ? t.original : t
                                            };
                                            t.clientX = r.screenX;
                                            t.clientY = r.screenY
                                        }
                                        r = ofy = 0;
                                        if (v && !n) {
                                            var i = y.win.position(),
                                                r = -i.left;
                                            ofy = -i.top
                                        }
                                        var s = t.clientY + ofy,
                                            i = s - y.rail.drag.y,
                                            o = t.clientX + r,
                                            u = o - y.rail.drag.x,
                                            a = y.rail.drag.st - i;
                                        y.ishwscroll && y.opt.bouncescroll ? 0 > a ? a = Math.round(a / 2) : a > y.page.maxh && (a = y.page.maxh + Math.round((a - y.page.maxh) / 2)) : (0 > a && (s = a = 0), a > y.page.maxh && (a = y.page.maxh, s = 0));
                                        if (y.railh && y.railh.scrollable) {
                                            var f = y.rail.drag.sl - u;
                                            y.ishwscroll && y.opt.bouncescroll ? 0 > f ? f = Math.round(f / 2) : f > y.page.maxw && (f = y.page.maxw + Math.round((f - y.page.maxw) / 2)) : (0 > f && (o = f = 0), f > y.page.maxw && (f = y.page.maxw, o = 0))
                                        }
                                        r = !1;
                                        if (y.rail.drag.dl) r = !0, "v" == y.rail.drag.dl ? f = y.rail.drag.sl : "h" == y.rail.drag.dl && (a = y.rail.drag.st);
                                        else {
                                            var i = Math.abs(i),
                                                u = Math.abs(u),
                                                l = y.opt.directionlockdeadzone;
                                            if ("v" == y.rail.drag.ck) {
                                                if (i > l && u <= .3 * i) return y.rail.drag = !1, !0;
                                                u > l && (y.rail.drag.dl = "f", e("body").scrollTop(e("body").scrollTop()))
                                            } else if ("h" == y.rail.drag.ck) {
                                                if (u > l && i <= .3 * u) return y.rail.drag = !1, !0;
                                                i > l && (y.rail.drag.dl = "f", e("body").scrollLeft(e("body").scrollLeft()))
                                            }
                                        }
                                        y.synched("touchmove", function() {
                                            y.rail.drag && 2 == y.rail.drag.pt && (y.prepareTransition && y.prepareTransition(0), y.rail.scrollable && y.setScrollTop(a), y.scrollmom.update(o, s), y.railh && y.railh.scrollable ? (y.setScrollLeft(f), y.showCursor(a, f)) : y.showCursor(a), w.isie10 && document.selection.clear())
                                        });
                                        w.ischrome && y.istouchcapable && (r = !1);
                                        if (r) return y.cancelEvent(t)
                                    }
                                }
                            }
                            y.onmousedown = function(e, t) {
                                if (!(y.rail.drag && 1 != y.rail.drag.pt)) {
                                    if (y.locked) return y.cancelEvent(e);
                                    y.cancelScroll();
                                    y.rail.drag = {
                                        x: e.clientX,
                                        y: e.clientY,
                                        sx: y.scroll.x,
                                        sy: y.scroll.y,
                                        pt: 1,
                                        hr: !!t
                                    };
                                    var n = y.getTarget(e);
                                    !y.ispage && w.hasmousecapture && n.setCapture();
                                    y.isiframe && !w.hasmousecapture && (y.saved.csspointerevents = y.doc.css("pointer-events"), y.css(y.doc, {
                                        "pointer-events": "none"
                                    }));
                                    y.hasmoving = !1;
                                    return y.cancelEvent(e)
                                }
                            };
                            y.onmouseup = function(e) {
                                if (y.rail.drag && (w.hasmousecapture && document.releaseCapture(), y.isiframe && !w.hasmousecapture && y.doc.css("pointer-events", y.saved.csspointerevents), 1 == y.rail.drag.pt)) return y.rail.drag = !1, y.hasmoving && y.triggerScrollEnd(), y.cancelEvent(e)
                            };
                            y.onmousemove = function(e) {
                                if (y.rail.drag && 1 == y.rail.drag.pt) {
                                    if (w.ischrome && 0 == e.which) return y.onmouseup(e);
                                    y.cursorfreezed = !0;
                                    y.hasmoving = !0;
                                    if (y.rail.drag.hr) {
                                        y.scroll.x = y.rail.drag.sx + (e.clientX - y.rail.drag.x);
                                        0 > y.scroll.x && (y.scroll.x = 0);
                                        var t = y.scrollvaluemaxw;
                                        y.scroll.x > t && (y.scroll.x = t)
                                    } else y.scroll.y = y.rail.drag.sy + (e.clientY - y.rail.drag.y), 0 > y.scroll.y && (y.scroll.y = 0), t = y.scrollvaluemax, y.scroll.y > t && (y.scroll.y = t);
                                    y.synched("mousemove", function() {
                                        y.rail.drag && 1 == y.rail.drag.pt && (y.showCursor(), y.rail.drag.hr ? y.doScrollLeft(Math.round(y.scroll.x * y.scrollratio.x), y.opt.cursordragspeed) : y.doScrollTop(Math.round(y.scroll.y * y.scrollratio.y), y.opt.cursordragspeed))
                                    });
                                    return y.cancelEvent(e)
                                }
                            };
                            if (w.cantouch || y.opt.touchbehavior) y.onpreventclick = function(e) {
                                if (y.preventclick) return y.preventclick.tg.onclick = y.preventclick.click, y.preventclick = !1, y.cancelEvent(e)
                            }, y.bind(y.win, "mousedown", y.ontouchstart), y.onclick = w.isios ? !1 : function(e) {
                                return y.lastmouseup ? (y.lastmouseup = !1, y.cancelEvent(e)) : !0
                            }, y.opt.grabcursorenabled && w.cursorgrabvalue && (y.css(y.ispage ? y.doc : y.win, {
                                cursor: w.cursorgrabvalue
                            }), y.css(y.rail, {
                                cursor: w.cursorgrabvalue
                            }));
                            else {
                                var g = function(e) {
                                    if (y.selectiondrag) {
                                        if (e) {
                                            var t = y.win.outerHeight();
                                            e = e.pageY - y.selectiondrag.top;
                                            0 < e && e < t && (e = 0);
                                            e >= t && (e -= t);
                                            y.selectiondrag.df = e
                                        }
                                        0 != y.selectiondrag.df && (y.doScrollBy(2 * -Math.floor(y.selectiondrag.df / 6)), y.debounced("doselectionscroll", function() {
                                            g()
                                        }, 50))
                                    }
                                };
                                y.hasTextSelected = "getSelection" in document ? function() {
                                    return 0 < document.getSelection().rangeCount
                                } : "selection" in document ? function() {
                                    return "None" != document.selection.type
                                } : function() {
                                    return !1
                                };
                                y.onselectionstart = function(e) {
                                    y.ispage || (y.selectiondrag = y.win.offset())
                                };
                                y.onselectionend = function(e) {
                                    y.selectiondrag = !1
                                };
                                y.onselectiondrag = function(e) {
                                    y.selectiondrag && y.hasTextSelected() && y.debounced("selectionscroll", function() {
                                        g(e)
                                    }, 250)
                                }
                            }
                            w.hasmstouch && (y.css(y.rail, {
                                "-ms-touch-action": "none"
                            }), y.css(y.cursor, {
                                "-ms-touch-action": "none"
                            }), y.bind(y.win, "MSPointerDown", y.ontouchstart), y.bind(document, "MSPointerUp", y.ontouchend), y.bind(document, "MSPointerMove", y.ontouchmove), y.bind(y.cursor, "MSGestureHold", function(e) {
                                e.preventDefault()
                            }), y.bind(y.cursor, "contextmenu", function(e) {
                                e.preventDefault()
                            }));
                            this.istouchcapable && (y.bind(y.win, "touchstart", y.ontouchstart), y.bind(document, "touchend", y.ontouchend), y.bind(document, "touchcancel", y.ontouchend), y.bind(document, "touchmove", y.ontouchmove));
                            y.bind(y.cursor, "mousedown", y.onmousedown);
                            y.bind(y.cursor, "mouseup", y.onmouseup);
                            y.railh && (y.bind(y.cursorh, "mousedown", function(e) {
                                y.onmousedown(e, !0)
                            }), y.bind(y.cursorh, "mouseup", y.onmouseup));
                            if (y.opt.cursordragontouch || !w.cantouch && !y.opt.touchbehavior) y.rail.css({
                                cursor: "default"
                            }), y.railh && y.railh.css({
                                cursor: "default"
                            }), y.jqbind(y.rail, "mouseenter", function() {
                                if (!y.win.is(":visible")) return !1;
                                y.canshowonmouseevent && y.showCursor();
                                y.rail.active = !0
                            }), y.jqbind(y.rail, "mouseleave", function() {
                                y.rail.active = !1;
                                y.rail.drag || y.hideCursor()
                            }), y.opt.sensitiverail && (y.bind(y.rail, "click", function(e) {
                                y.doRailClick(e, !1, !1)
                            }), y.bind(y.rail, "dblclick", function(e) {
                                y.doRailClick(e, !0, !1)
                            }), y.bind(y.cursor, "click", function(e) {
                                y.cancelEvent(e)
                            }), y.bind(y.cursor, "dblclick", function(e) {
                                y.cancelEvent(e)
                            })), y.railh && (y.jqbind(y.railh, "mouseenter", function() {
                                if (!y.win.is(":visible")) return !1;
                                y.canshowonmouseevent && y.showCursor();
                                y.rail.active = !0
                            }), y.jqbind(y.railh, "mouseleave", function() {
                                y.rail.active = !1;
                                y.rail.drag || y.hideCursor()
                            }), y.opt.sensitiverail && (y.bind(y.railh, "click", function(e) {
                                y.doRailClick(e, !1, !0)
                            }), y.bind(y.railh, "dblclick", function(e) {
                                y.doRailClick(e, !0, !0)
                            }), y.bind(y.cursorh, "click", function(e) {
                                y.cancelEvent(e)
                            }), y.bind(y.cursorh, "dblclick", function(e) {
                                y.cancelEvent(e)
                            })));
                            !w.cantouch && !y.opt.touchbehavior ? (y.bind(w.hasmousecapture ? y.win : document, "mouseup", y.onmouseup), y.bind(document, "mousemove", y.onmousemove), y.onclick && y.bind(document, "click", y.onclick), !y.ispage && y.opt.enablescrollonselection && (y.bind(y.win[0], "mousedown", y.onselectionstart), y.bind(document, "mouseup", y.onselectionend), y.bind(y.cursor, "mouseup", y.onselectionend), y.cursorh && y.bind(y.cursorh, "mouseup", y.onselectionend), y.bind(document, "mousemove", y.onselectiondrag)), y.zoom && (y.jqbind(y.zoom, "mouseenter", function() {
                                y.canshowonmouseevent && y.showCursor();
                                y.rail.active = !0
                            }), y.jqbind(y.zoom, "mouseleave", function() {
                                y.rail.active = !1;
                                y.rail.drag || y.hideCursor()
                            }))) : (y.bind(w.hasmousecapture ? y.win : document, "mouseup", y.ontouchend), y.bind(document, "mousemove", y.ontouchmove), y.onclick && y.bind(document, "click", y.onclick), y.opt.cursordragontouch && (y.bind(y.cursor, "mousedown", y.onmousedown), y.bind(y.cursor, "mousemove", y.onmousemove), y.cursorh && y.bind(y.cursorh, "mousedown", function(e) {
                                y.onmousedown(e, !0)
                            }), y.cursorh && y.bind(y.cursorh, "mousemove", y.onmousemove)));
                            y.opt.enablemousewheel && (y.isiframe || y.bind(w.isie && y.ispage ? document : y.win, "mousewheel", y.onmousewheel), y.bind(y.rail, "mousewheel", y.onmousewheel), y.railh && y.bind(y.railh, "mousewheel", y.onmousewheelhr));
                            !y.ispage && !w.cantouch && !/HTML|^BODY/.test(y.win[0].nodeName) && (y.win.attr("tabindex") || y.win.attr({
                                tabindex: r++
                            }), y.jqbind(y.win, "focus", function(e) {
                                t = y.getTarget(e).id || !0;
                                y.hasfocus = !0;
                                y.canshowonmouseevent && y.noticeCursor()
                            }), y.jqbind(y.win, "blur", function(e) {
                                t = !1;
                                y.hasfocus = !1
                            }), y.jqbind(y.win, "mouseenter", function(e) {
                                n = y.getTarget(e).id || !0;
                                y.hasmousefocus = !0;
                                y.canshowonmouseevent && y.noticeCursor()
                            }), y.jqbind(y.win, "mouseleave", function() {
                                n = !1;
                                y.hasmousefocus = !1;
                                y.rail.drag || y.hideCursor()
                            }))
                        }
                        y.onkeypress = function(r) {
                            if (y.locked && 0 == y.page.maxh) return !0;
                            r = r ? r : window.e;
                            var i = y.getTarget(r);
                            if (i && /INPUT|TEXTAREA|SELECT|OPTION/.test(i.nodeName) && (!i.getAttribute("type") && !i.type || !/submit|button|cancel/i.tp) || e(i).attr("contenteditable")) return !0;
                            if (y.hasfocus || y.hasmousefocus && !t || y.ispage && !t && !n) {
                                i = r.keyCode;
                                if (y.locked && 27 != i) return y.cancelEvent(r);
                                var s = r.ctrlKey || !1,
                                    o = r.shiftKey || !1,
                                    u = !1;
                                switch (i) {
                                    case 38:
                                    case 63233:
                                        y.doScrollBy(72);
                                        u = !0;
                                        break;
                                    case 40:
                                    case 63235:
                                        y.doScrollBy(-72);
                                        u = !0;
                                        break;
                                    case 37:
                                    case 63232:
                                        y.railh && (s ? y.doScrollLeft(0) : y.doScrollLeftBy(72), u = !0);
                                        break;
                                    case 39:
                                    case 63234:
                                        y.railh && (s ? y.doScrollLeft(y.page.maxw) : y.doScrollLeftBy(-72), u = !0);
                                        break;
                                    case 33:
                                    case 63276:
                                        y.doScrollBy(y.view.h);
                                        u = !0;
                                        break;
                                    case 34:
                                    case 63277:
                                        y.doScrollBy(-y.view.h);
                                        u = !0;
                                        break;
                                    case 36:
                                    case 63273:
                                        y.railh && s ? y.doScrollPos(0, 0) : y.doScrollTo(0);
                                        u = !0;
                                        break;
                                    case 35:
                                    case 63275:
                                        y.railh && s ? y.doScrollPos(y.page.maxw, y.page.maxh) : y.doScrollTo(y.page.maxh);
                                        u = !0;
                                        break;
                                    case 32:
                                        y.opt.spacebarenabled && (o ? y.doScrollBy(y.view.h) : y.doScrollBy(-y.view.h), u = !0);
                                        break;
                                    case 27:
                                        y.zoomactive && (y.doZoom(), u = !0)
                                }
                                if (u) return y.cancelEvent(r)
                            }
                        };
                        y.opt.enablekeyboard && y.bind(document, w.isopera && !w.isopera12 ? "keypress" : "keydown", y.onkeypress);
                        y.bind(document, "keydown", function(e) {
                            e.ctrlKey && (y.wheelprevented = !0)
                        });
                        y.bind(document, "keyup", function(e) {
                            e.ctrlKey || (y.wheelprevented = !1)
                        });
                        y.bind(window, "resize", y.lazyResize);
                        y.bind(window, "orientationchange", y.lazyResize);
                        y.bind(window, "load", y.lazyResize);
                        if (w.ischrome && !y.ispage && !y.haswrapper) {
                            var b = y.win.attr("style"),
                                u = parseFloat(y.win.css("width")) + 1;
                            y.win.css("width", u);
                            y.synched("chromefix", function() {
                                y.win.attr("style", b)
                            })
                        }
                        y.onAttributeChange = function(e) {
                            y.lazyResize(250)
                        };
                        !y.ispage && !y.haswrapper && (!1 !== c ? (y.observer = new c(function(e) {
                            e.forEach(y.onAttributeChange)
                        }), y.observer.observe(y.win[0], {
                            childList: !0,
                            characterData: !1,
                            attributes: !0,
                            subtree: !1
                        }), y.observerremover = new c(function(e) {
                            e.forEach(function(e) {
                                if (0 < e.removedNodes.length)
                                    for (var t in e.removedNodes)
                                        if (e.removedNodes[t] == y.win[0]) return y.remove()
                            })
                        }), y.observerremover.observe(y.win[0].parentNode, {
                            childList: !0,
                            characterData: !1,
                            attributes: !1,
                            subtree: !1
                        })) : (y.bind(y.win, w.isie && !w.isie9 ? "propertychange" : "DOMAttrModified", y.onAttributeChange), w.isie9 && y.win[0].attachEvent("onpropertychange", y.onAttributeChange), y.bind(y.win, "DOMNodeRemoved", function(e) {
                            e.target == y.win[0] && y.remove()
                        })));
                        !y.ispage && y.opt.boxzoom && y.bind(window, "resize", y.resizeZoom);
                        y.istextarea && y.bind(y.win, "mouseup", y.lazyResize);
                        y.lazyResize(30)
                    }
                    if ("IFRAME" == this.doc[0].nodeName) {
                        var E = function(t) {
                            y.iframexd = !1;
                            try {
                                var n = "contentDocument" in this ? this.contentDocument : this.contentWindow.document
                            } catch (r) {
                                y.iframexd = !0, n = !1
                            }
                            if (y.iframexd) return "console" in window && console.log("NiceScroll error: policy restriced iframe"), !0;
                            y.forcescreen = !0;
                            y.isiframe && (y.iframe = {
                                doc: e(n),
                                html: y.doc.contents().find("html")[0],
                                body: y.doc.contents().find("body")[0]
                            }, y.getContentSize = function() {
                                return {
                                    w: Math.max(y.iframe.html.scrollWidth, y.iframe.body.scrollWidth),
                                    h: Math.max(y.iframe.html.scrollHeight, y.iframe.body.scrollHeight)
                                }
                            }, y.docscroll = e(y.iframe.body));
                            !w.isios && y.opt.iframeautoresize && !y.isiframe && (y.win.scrollTop(0), y.doc.height(""), t = Math.max(n.getElementsByTagName("html")[0].scrollHeight, n.body.scrollHeight), y.doc.height(t));
                            y.lazyResize(30);
                            w.isie7 && y.css(e(y.iframe.html), {
                                "overflow-y": "hidden"
                            });
                            y.css(e(y.iframe.body), {
                                "overflow-y": "hidden"
                            });
                            w.isios && y.haswrapper && y.css(e(n.body), {
                                "-webkit-transform": "translate3d(0,0,0)"
                            });
                            "contentWindow" in this ? y.bind(this.contentWindow, "scroll", y.onscroll) : y.bind(n, "scroll", y.onscroll);
                            y.opt.enablemousewheel && y.bind(n, "mousewheel", y.onmousewheel);
                            y.opt.enablekeyboard && y.bind(n, w.isopera ? "keypress" : "keydown", y.onkeypress);
                            if (w.cantouch || y.opt.touchbehavior) y.bind(n, "mousedown", y.ontouchstart), y.bind(n, "mousemove", function(e) {
                                y.ontouchmove(e, !0)
                            }), y.opt.grabcursorenabled && w.cursorgrabvalue && y.css(e(n.body), {
                                cursor: w.cursorgrabvalue
                            });
                            y.bind(n, "mouseup", y.ontouchend);
                            y.zoom && (y.opt.dblclickzoom && y.bind(n, "dblclick", y.doZoom), y.ongesturezoom && y.bind(n, "gestureend", y.ongesturezoom))
                        };
                        this.doc[0].readyState && "complete" == this.doc[0].readyState && setTimeout(function() {
                            E.call(y.doc[0], !1)
                        }, 500);
                        y.bind(this.doc, "load", E)
                    }
                };
                this.showCursor = function(e, t) {
                    y.cursortimeout && (clearTimeout(y.cursortimeout), y.cursortimeout = 0);
                    if (y.rail) {
                        y.autohidedom && (y.autohidedom.stop().css({
                            opacity: y.opt.cursoropacitymax
                        }), y.cursoractive = !0);
                        if (!y.rail.drag || 1 != y.rail.drag.pt) "undefined" != typeof e && !1 !== e && (y.scroll.y = Math.round(1 * e / y.scrollratio.y)), "undefined" != typeof t && (y.scroll.x = Math.round(1 * t / y.scrollratio.x));
                        y.cursor.css({
                            height: y.cursorheight,
                            top: y.scroll.y
                        });
                        y.cursorh && (!y.rail.align && y.rail.visibility ? y.cursorh.css({
                            width: y.cursorwidth,
                            left: y.scroll.x + y.rail.width
                        }) : y.cursorh.css({
                            width: y.cursorwidth,
                            left: y.scroll.x
                        }), y.cursoractive = !0);
                        y.zoom && y.zoom.stop().css({
                            opacity: y.opt.cursoropacitymax
                        })
                    }
                };
                this.hideCursor = function(e) {
                    !y.cursortimeout && y.rail && y.autohidedom && !(y.hasmousefocus && "leave" == y.opt.autohidemode) && (y.cursortimeout = setTimeout(function() {
                        if (!y.rail.active || !y.showonmouseevent) y.autohidedom.stop().animate({
                            opacity: y.opt.cursoropacitymin
                        }), y.zoom && y.zoom.stop().animate({
                            opacity: y.opt.cursoropacitymin
                        }), y.cursoractive = !1;
                        y.cursortimeout = 0
                    }, e || y.opt.hidecursordelay))
                };
                this.noticeCursor = function(e, t, n) {
                    y.showCursor(t, n);
                    y.rail.active || y.hideCursor(e)
                };
                this.getContentSize = y.ispage ? function() {
                    return {
                        w: Math.max(document.body.scrollWidth, document.documentElement.scrollWidth),
                        h: Math.max(document.body.scrollHeight, document.documentElement.scrollHeight)
                    }
                } : y.haswrapper ? function() {
                    return {
                        w: y.doc.outerWidth() + parseInt(y.win.css("paddingLeft")) + parseInt(y.win.css("paddingRight")),
                        h: y.doc.outerHeight() + parseInt(y.win.css("paddingTop")) + parseInt(y.win.css("paddingBottom"))
                    }
                } : function() {
                    return {
                        w: y.docscroll[0].scrollWidth,
                        h: y.docscroll[0].scrollHeight
                    }
                };
                this.onResize = function(e, t) {
                    if (!y || !y.win) return !1;
                    if (!y.haswrapper && !y.ispage) {
                        if ("none" == y.win.css("display")) return y.visibility && y.hideRail().hideRailHr(), !1;
                        !y.hidden && !y.visibility && y.showRail().showRailHr()
                    }
                    var n = y.page.maxh,
                        r = y.page.maxw,
                        i = y.view.w;
                    y.view = {
                        w: y.ispage ? y.win.width() : parseInt(y.win[0].clientWidth),
                        h: y.ispage ? y.win.height() : parseInt(y.win[0].clientHeight)
                    };
                    y.page = t ? t : y.getContentSize();
                    y.page.maxh = Math.max(0, y.page.h - y.view.h);
                    y.page.maxw = Math.max(0, y.page.w - y.view.w);
                    if (y.page.maxh == n && y.page.maxw == r && y.view.w == i) {
                        if (y.ispage) return y;
                        n = y.win.offset();
                        if (y.lastposition && (r = y.lastposition, r.top == n.top && r.left == n.left)) return y;
                        y.lastposition = n
                    }
                    0 == y.page.maxh ? (y.hideRail(), y.scrollvaluemax = 0, y.scroll.y = 0, y.scrollratio.y = 0, y.cursorheight = 0, y.setScrollTop(0), y.rail.scrollable = !1) : y.rail.scrollable = !0;
                    0 == y.page.maxw ? (y.hideRailHr(), y.scrollvaluemaxw = 0, y.scroll.x = 0, y.scrollratio.x = 0, y.cursorwidth = 0, y.setScrollLeft(0), y.railh.scrollable = !1) : y.railh.scrollable = !0;
                    y.locked = 0 == y.page.maxh && 0 == y.page.maxw;
                    if (y.locked) return y.ispage || y.updateScrollBar(y.view), !1;
                    !y.hidden && !y.visibility ? y.showRail().showRailHr() : !y.hidden && !y.railh.visibility && y.showRailHr();
                    y.istextarea && y.win.css("resize") && "none" != y.win.css("resize") && (y.view.h -= 20);
                    y.cursorheight = Math.min(y.view.h, Math.round(y.view.h * (y.view.h / y.page.h)));
                    y.cursorheight = y.opt.cursorfixedheight ? y.opt.cursorfixedheight : Math.max(y.opt.cursorminheight, y.cursorheight);
                    y.cursorwidth = Math.min(y.view.w, Math.round(y.view.w * (y.view.w / y.page.w)));
                    y.cursorwidth = y.opt.cursorfixedheight ? y.opt.cursorfixedheight : Math.max(y.opt.cursorminheight, y.cursorwidth);
                    y.scrollvaluemax = y.view.h - y.cursorheight - y.cursor.hborder;
                    y.railh && (y.railh.width = 0 < y.page.maxh ? y.view.w - y.rail.width : y.view.w, y.scrollvaluemaxw = y.railh.width - y.cursorwidth - y.cursorh.wborder);
                    y.ispage || y.updateScrollBar(y.view);
                    y.scrollratio = {
                        x: y.page.maxw / y.scrollvaluemaxw,
                        y: y.page.maxh / y.scrollvaluemax
                    };
                    y.getScrollTop() > y.page.maxh ? y.doScrollTop(y.page.maxh) : (y.scroll.y = Math.round(y.getScrollTop() * (1 / y.scrollratio.y)), y.scroll.x = Math.round(y.getScrollLeft() * (1 / y.scrollratio.x)), y.cursoractive && y.noticeCursor());
                    y.scroll.y && 0 == y.getScrollTop() && y.doScrollTo(Math.floor(y.scroll.y * y.scrollratio.y));
                    return y
                };
                this.resize = y.onResize;
                this.lazyResize = function(e) {
                    e = isNaN(e) ? 30 : e;
                    y.delayed("resize", y.resize, e);
                    return y
                };
                this._bind = function(e, t, n, r) {
                    y.events.push({
                        e: e,
                        n: t,
                        f: n,
                        b: r,
                        q: !1
                    });
                    e.addEventListener ? e.addEventListener(t, n, r || !1) : e.attachEvent ? e.attachEvent("on" + t, n) : e["on" + t] = n
                };
                this.jqbind = function(t, n, r) {
                    y.events.push({
                        e: t,
                        n: n,
                        f: r,
                        q: !0
                    });
                    e(t).bind(n, r)
                };
                this.bind = function(e, t, n, r) {
                    var i = "jquery" in e ? e[0] : e;
                    "mousewheel" == t ? "onwheel" in y.win ? y._bind(i, "wheel", n, r || !1) : (e = "undefined" != typeof document.onmousewheel ? "mousewheel" : "DOMMouseScroll", v(i, e, n, r || !1), "DOMMouseScroll" == e && v(i, "MozMousePixelScroll", n, r || !1)) : i.addEventListener ? (w.cantouch && /mouseup|mousedown|mousemove/.test(t) && y._bind(i, "mousedown" == t ? "touchstart" : "mouseup" == t ? "touchend" : "touchmove", function(e) {
                        if (e.touches) {
                            if (2 > e.touches.length) {
                                var t = e.touches.length ? e.touches[0] : e;
                                t.original = e;
                                n.call(this, t)
                            }
                        } else e.changedTouches && (t = e.changedTouches[0], t.original = e, n.call(this, t))
                    }, r || !1), y._bind(i, t, n, r || !1), w.cantouch && "mouseup" == t && y._bind(i, "touchcancel", n, r || !1)) : y._bind(i, t, function(e) {
                        if ((e = e || window.event || !1) && e.srcElement) e.target = e.srcElement;
                        "pageY" in e || (e.pageX = e.clientX + document.documentElement.scrollLeft, e.pageY = e.clientY + document.documentElement.scrollTop);
                        return !1 === n.call(i, e) || !1 === r ? y.cancelEvent(e) : !0
                    })
                };
                this._unbind = function(e, t, n, r) {
                    e.removeEventListener ? e.removeEventListener(t, n, r) : e.detachEvent ? e.detachEvent("on" + t, n) : e["on" + t] = !1
                };
                this.unbindAll = function() {
                    for (var e = 0; e < y.events.length; e++) {
                        var t = y.events[e];
                        t.q ? t.e.unbind(t.n, t.f) : y._unbind(t.e, t.n, t.f, t.b)
                    }
                };
                this.cancelEvent = function(e) {
                    e = e.original ? e.original : e ? e : window.event || !1;
                    if (!e) return !1;
                    e.preventDefault && e.preventDefault();
                    e.stopPropagation && e.stopPropagation();
                    e.preventManipulation && e.preventManipulation();
                    e.cancelBubble = !0;
                    e.cancel = !0;
                    return e.returnValue = !1
                };
                this.stopPropagation = function(e) {
                    e = e.original ? e.original : e ? e : window.event || !1;
                    if (!e) return !1;
                    if (e.stopPropagation) return e.stopPropagation();
                    e.cancelBubble && (e.cancelBubble = !0);
                    return !1
                };
                this.showRail = function() {
                    if (0 != y.page.maxh && (y.ispage || "none" != y.win.css("display"))) y.visibility = !0, y.rail.visibility = !0, y.rail.css("display", "block");
                    return y
                };
                this.showRailHr = function() {
                    if (!y.railh) return y;
                    if (0 != y.page.maxw && (y.ispage || "none" != y.win.css("display"))) y.railh.visibility = !0, y.railh.css("display", "block");
                    return y
                };
                this.hideRail = function() {
                    y.visibility = !1;
                    y.rail.visibility = !1;
                    y.rail.css("display", "none");
                    return y
                };
                this.hideRailHr = function() {
                    if (!y.railh) return y;
                    y.railh.visibility = !1;
                    y.railh.css("display", "none");
                    return y
                };
                this.show = function() {
                    y.hidden = !1;
                    y.locked = !1;
                    return y.showRail().showRailHr()
                };
                this.hide = function() {
                    y.hidden = !0;
                    y.locked = !0;
                    return y.hideRail().hideRailHr()
                };
                this.toggle = function() {
                    return y.hidden ? y.show() : y.hide()
                };
                this.remove = function() {
                    y.stop();
                    y.cursortimeout && clearTimeout(y.cursortimeout);
                    y.doZoomOut();
                    y.unbindAll();
                    w.isie9 && y.win[0].detachEvent("onpropertychange", y.onAttributeChange);
                    !1 !== y.observer && y.observer.disconnect();
                    !1 !== y.observerremover && y.observerremover.disconnect();
                    y.events = null;
                    y.cursor && y.cursor.remove();
                    y.cursorh && y.cursorh.remove();
                    y.rail && y.rail.remove();
                    y.railh && y.railh.remove();
                    y.zoom && y.zoom.remove();
                    for (var t = 0; t < y.saved.css.length; t++) {
                        var n = y.saved.css[t];
                        n[0].css(n[1], "undefined" == typeof n[2] ? "" : n[2])
                    }
                    y.saved = !1;
                    y.me.data("__nicescroll", "");
                    var r = e.nicescroll;
                    r.each(function(e) {
                        if (this && this.id === y.id) {
                            delete r[e];
                            for (var t = ++e; t < r.length; t++, e++) r[e] = r[t];
                            r.length--;
                            r.length && delete r[r.length]
                        }
                    });
                    for (var i in y) y[i] = null, delete y[i];
                    y = null
                };
                this.scrollstart = function(e) {
                    this.onscrollstart = e;
                    return y
                };
                this.scrollend = function(e) {
                    this.onscrollend = e;
                    return y
                };
                this.scrollcancel = function(e) {
                    this.onscrollcancel = e;
                    return y
                };
                this.zoomin = function(e) {
                    this.onzoomin = e;
                    return y
                };
                this.zoomout = function(e) {
                    this.onzoomout = e;
                    return y
                };
                this.isScrollable = function(t) {
                    t = t.target ? t.target : t;
                    if ("OPTION" == t.nodeName) return !0;
                    for (; t && 1 == t.nodeType && !/^BODY|HTML/.test(t.nodeName);) {
                        var n = e(t),
                            n = n.css("overflowY") || n.css("overflowX") || n.css("overflow") || "";
                        if (/scroll|auto/.test(n)) return t.clientHeight != t.scrollHeight;
                        t = t.parentNode ? t.parentNode : !1
                    }
                    return !1
                };
                this.getViewport = function(t) {
                    for (t = t && t.parentNode ? t.parentNode : !1; t && 1 == t.nodeType && !/^BODY|HTML/.test(t.nodeName);) {
                        var n = e(t);
                        if (/fixed|absolute/.test(n.css("position"))) return n;
                        var r = n.css("overflowY") || n.css("overflowX") || n.css("overflow") || "";
                        if (/scroll|auto/.test(r) && t.clientHeight != t.scrollHeight || 0 < n.getNiceScroll().length) return n;
                        t = t.parentNode ? t.parentNode : !1
                    }
                    return t ? e(t) : !1
                };
                this.triggerScrollEnd = function() {
                    if (y.onscrollend) {
                        var e = y.getScrollLeft(),
                            t = y.getScrollTop();
                        y.onscrollend.call(y, {
                            type: "scrollend",
                            current: {
                                x: e,
                                y: t
                            },
                            end: {
                                x: e,
                                y: t
                            }
                        })
                    }
                };
                this.onmousewheel = function(e) {
                    if (!y.wheelprevented) {
                        if (y.locked) return y.debounced("checkunlock", y.resize, 250), !0;
                        if (y.rail.drag) return y.cancelEvent(e);
                        "auto" == y.opt.oneaxismousemode && 0 != e.deltaX && (y.opt.oneaxismousemode = !1);
                        if (y.opt.oneaxismousemode && 0 == e.deltaX && !y.rail.scrollable) return y.railh && y.railh.scrollable ? y.onmousewheelhr(e) : !0;
                        var t = +(new Date),
                            n = !1;
                        y.opt.preservenativescrolling && y.checkarea + 600 < t && (y.nativescrollingarea = y.isScrollable(e), n = !0);
                        y.checkarea = t;
                        if (y.nativescrollingarea) return !0;
                        if (e = g(e, !1, n)) y.checkarea = 0;
                        return e
                    }
                };
                this.onmousewheelhr = function(e) {
                    if (!y.wheelprevented) {
                        if (y.locked || !y.railh.scrollable) return !0;
                        if (y.rail.drag) return y.cancelEvent(e);
                        var t = +(new Date),
                            n = !1;
                        y.opt.preservenativescrolling && y.checkarea + 600 < t && (y.nativescrollingarea = y.isScrollable(e), n = !0);
                        y.checkarea = t;
                        return y.nativescrollingarea ? !0 : y.locked ? y.cancelEvent(e) : g(e, !0, n)
                    }
                };
                this.stop = function() {
                    y.cancelScroll();
                    y.scrollmon && y.scrollmon.stop();
                    y.cursorfreezed = !1;
                    y.scroll.y = Math.round(y.getScrollTop() * (1 / y.scrollratio.y));
                    y.noticeCursor();
                    return y
                };
                this.getTransitionSpeed = function(e) {
                    var t = Math.round(10 * y.opt.scrollspeed);
                    e = Math.min(t, Math.round(e / 20 * y.opt.scrollspeed));
                    return 20 < e ? e : 0
                };
                y.opt.smoothscroll ? y.ishwscroll && w.hastransition && y.opt.usetransition ? (this.prepareTransition = function(e, t) {
                    var n = t ? 20 < e ? e : 0 : y.getTransitionSpeed(e),
                        r = n ? w.prefixstyle + "transform " + n + "ms ease-out" : "";
                    if (!y.lasttransitionstyle || y.lasttransitionstyle != r) y.lasttransitionstyle = r, y.doc.css(w.transitionstyle, r);
                    return n
                }, this.doScrollLeft = function(e, t) {
                    var n = y.scrollrunning ? y.newscrolly : y.getScrollTop();
                    y.doScrollPos(e, n, t)
                }, this.doScrollTop = function(e, t) {
                    var n = y.scrollrunning ? y.newscrollx : y.getScrollLeft();
                    y.doScrollPos(n, e, t)
                }, this.doScrollPos = function(e, t, n) {
                    var r = y.getScrollTop(),
                        i = y.getScrollLeft();
                    (0 > (y.newscrolly - r) * (t - r) || 0 > (y.newscrollx - i) * (e - i)) && y.cancelScroll();
                    !1 == y.opt.bouncescroll && (0 > t ? t = 0 : t > y.page.maxh && (t = y.page.maxh), 0 > e ? e = 0 : e > y.page.maxw && (e = y.page.maxw));
                    if (y.scrollrunning && e == y.newscrollx && t == y.newscrolly) return !1;
                    y.newscrolly = t;
                    y.newscrollx = e;
                    y.newscrollspeed = n || !1;
                    if (y.timer) return !1;
                    y.timer = setTimeout(function() {
                        var n = y.getScrollTop(),
                            r = y.getScrollLeft(),
                            i, s;
                        i = e - r;
                        s = t - n;
                        i = Math.round(Math.sqrt(Math.pow(i, 2) + Math.pow(s, 2)));
                        i = y.newscrollspeed && 1 < y.newscrollspeed ? y.newscrollspeed : y.getTransitionSpeed(i);
                        y.newscrollspeed && 1 >= y.newscrollspeed && (i *= y.newscrollspeed);
                        y.prepareTransition(i, !0);
                        y.timerscroll && y.timerscroll.tm && clearInterval(y.timerscroll.tm);
                        0 < i && (!y.scrollrunning && y.onscrollstart && y.onscrollstart.call(y, {
                            type: "scrollstart",
                            current: {
                                x: r,
                                y: n
                            },
                            request: {
                                x: e,
                                y: t
                            },
                            end: {
                                x: y.newscrollx,
                                y: y.newscrolly
                            },
                            speed: i
                        }), w.transitionend ? y.scrollendtrapped || (y.scrollendtrapped = !0, y.bind(y.doc, w.transitionend, y.onScrollTransitionEnd, !1)) : (y.scrollendtrapped && clearTimeout(y.scrollendtrapped), y.scrollendtrapped = setTimeout(y.onScrollTransitionEnd, i)), y.timerscroll = {
                            bz: new BezierClass(n, y.newscrolly, i, 0, 0, .58, 1),
                            bh: new BezierClass(r, y.newscrollx, i, 0, 0, .58, 1)
                        }, y.cursorfreezed || (y.timerscroll.tm = setInterval(function() {
                            y.showCursor(y.getScrollTop(), y.getScrollLeft())
                        }, 60)));
                        y.synched("doScroll-set", function() {
                            y.timer = 0;
                            y.scrollendtrapped && (y.scrollrunning = !0);
                            y.setScrollTop(y.newscrolly);
                            y.setScrollLeft(y.newscrollx);
                            if (!y.scrollendtrapped) y.onScrollTransitionEnd()
                        })
                    }, 50)
                }, this.cancelScroll = function() {
                    if (!y.scrollendtrapped) return !0;
                    var e = y.getScrollTop(),
                        t = y.getScrollLeft();
                    y.scrollrunning = !1;
                    w.transitionend || clearTimeout(w.transitionend);
                    y.scrollendtrapped = !1;
                    y._unbind(y.doc, w.transitionend, y.onScrollTransitionEnd);
                    y.prepareTransition(0);
                    y.setScrollTop(e);
                    y.railh && y.setScrollLeft(t);
                    y.timerscroll && y.timerscroll.tm && clearInterval(y.timerscroll.tm);
                    y.timerscroll = !1;
                    y.cursorfreezed = !1;
                    y.showCursor(e, t);
                    return y
                }, this.onScrollTransitionEnd = function() {
                    y.scrollendtrapped && y._unbind(y.doc, w.transitionend, y.onScrollTransitionEnd);
                    y.scrollendtrapped = !1;
                    y.prepareTransition(0);
                    y.timerscroll && y.timerscroll.tm && clearInterval(y.timerscroll.tm);
                    y.timerscroll = !1;
                    var e = y.getScrollTop(),
                        t = y.getScrollLeft();
                    y.setScrollTop(e);
                    y.railh && y.setScrollLeft(t);
                    y.noticeCursor(!1, e, t);
                    y.cursorfreezed = !1;
                    0 > e ? e = 0 : e > y.page.maxh && (e = y.page.maxh);
                    0 > t ? t = 0 : t > y.page.maxw && (t = y.page.maxw);
                    if (e != y.newscrolly || t != y.newscrollx) return y.doScrollPos(t, e, y.opt.snapbackspeed);
                    y.onscrollend && y.scrollrunning && y.triggerScrollEnd();
                    y.scrollrunning = !1
                }) : (this.doScrollLeft = function(e, t) {
                    var n = y.scrollrunning ? y.newscrolly : y.getScrollTop();
                    y.doScrollPos(e, n, t)
                }, this.doScrollTop = function(e, t) {
                    var n = y.scrollrunning ? y.newscrollx : y.getScrollLeft();
                    y.doScrollPos(n, e, t)
                }, this.doScrollPos = function(e, t, n) {
                    function r() {
                        if (y.cancelAnimationFrame) return !0;
                        y.scrollrunning = !0;
                        if (c = 1 - c) return y.timer = u(r) || 1;
                        var e = 0,
                            t = sy = y.getScrollTop();
                        if (y.dst.ay) {
                            var t = y.bzscroll ? y.dst.py + y.bzscroll.getNow() * y.dst.ay : y.newscrolly,
                                n = t - sy;
                            if (0 > n && t < y.newscrolly || 0 < n && t > y.newscrolly) t = y.newscrolly;
                            y.setScrollTop(t);
                            t == y.newscrolly && (e = 1)
                        } else e = 1;
                        var i = sx = y.getScrollLeft();
                        if (y.dst.ax) {
                            i = y.bzscroll ? y.dst.px + y.bzscroll.getNow() * y.dst.ax : y.newscrollx;
                            n = i - sx;
                            if (0 > n && i < y.newscrollx || 0 < n && i > y.newscrollx) i = y.newscrollx;
                            y.setScrollLeft(i);
                            i == y.newscrollx && (e += 1)
                        } else e += 1;
                        2 == e ? (y.timer = 0, y.cursorfreezed = !1, y.bzscroll = !1, y.scrollrunning = !1, 0 > t ? t = 0 : t > y.page.maxh && (t = y.page.maxh), 0 > i ? i = 0 : i > y.page.maxw && (i = y.page.maxw), i != y.newscrollx || t != y.newscrolly ? y.doScrollPos(i, t) : y.onscrollend && y.triggerScrollEnd()) : y.timer = u(r) || 1
                    }
                    t = "undefined" == typeof t || !1 === t ? y.getScrollTop(!0) : t;
                    if (y.timer && y.newscrolly == t && y.newscrollx == e) return !0;
                    y.timer && a(y.timer);
                    y.timer = 0;
                    var i = y.getScrollTop(),
                        s = y.getScrollLeft();
                    (0 > (y.newscrolly - i) * (t - i) || 0 > (y.newscrollx - s) * (e - s)) && y.cancelScroll();
                    y.newscrolly = t;
                    y.newscrollx = e;
                    if (!y.bouncescroll || !y.rail.visibility) 0 > y.newscrolly ? y.newscrolly = 0 : y.newscrolly > y.page.maxh && (y.newscrolly = y.page.maxh);
                    if (!y.bouncescroll || !y.railh.visibility) 0 > y.newscrollx ? y.newscrollx = 0 : y.newscrollx > y.page.maxw && (y.newscrollx = y.page.maxw);
                    y.dst = {};
                    y.dst.x = e - s;
                    y.dst.y = t - i;
                    y.dst.px = s;
                    y.dst.py = i;
                    var o = Math.round(Math.sqrt(Math.pow(y.dst.x, 2) + Math.pow(y.dst.y, 2)));
                    y.dst.ax = y.dst.x / o;
                    y.dst.ay = y.dst.y / o;
                    var f = 0,
                        l = o;
                    0 == y.dst.x ? (f = i, l = t, y.dst.ay = 1, y.dst.py = 0) : 0 == y.dst.y && (f = s, l = e, y.dst.ax = 1, y.dst.px = 0);
                    o = y.getTransitionSpeed(o);
                    n && 1 >= n && (o *= n);
                    y.bzscroll = 0 < o ? y.bzscroll ? y.bzscroll.update(l, o) : new BezierClass(f, l, o, 0, 1, 0, 1) : !1;
                    if (!y.timer) {
                        (i == y.page.maxh && t >= y.page.maxh || s == y.page.maxw && e >= y.page.maxw) && y.checkContentSize();
                        var c = 1;
                        y.cancelAnimationFrame = !1;
                        y.timer = 1;
                        y.onscrollstart && !y.scrollrunning && y.onscrollstart.call(y, {
                            type: "scrollstart",
                            current: {
                                x: s,
                                y: i
                            },
                            request: {
                                x: e,
                                y: t
                            },
                            end: {
                                x: y.newscrollx,
                                y: y.newscrolly
                            },
                            speed: o
                        });
                        r();
                        (i == y.page.maxh && t >= i || s == y.page.maxw && e >= s) && y.checkContentSize();
                        y.noticeCursor()
                    }
                }, this.cancelScroll = function() {
                    y.timer && a(y.timer);
                    y.timer = 0;
                    y.bzscroll = !1;
                    y.scrollrunning = !1;
                    return y
                }) : (this.doScrollLeft = function(e, t) {
                    var n = y.getScrollTop();
                    y.doScrollPos(e, n, t)
                }, this.doScrollTop = function(e, t) {
                    var n = y.getScrollLeft();
                    y.doScrollPos(n, e, t)
                }, this.doScrollPos = function(e, t, n) {
                    var r = e > y.page.maxw ? y.page.maxw : e;
                    0 > r && (r = 0);
                    var i = t > y.page.maxh ? y.page.maxh : t;
                    0 > i && (i = 0);
                    y.synched("scroll", function() {
                        y.setScrollTop(i);
                        y.setScrollLeft(r)
                    })
                }, this.cancelScroll = function() {});
                this.doScrollBy = function(e, t) {
                    var n = 0,
                        n = t ? Math.floor((y.scroll.y - e) * y.scrollratio.y) : (y.timer ? y.newscrolly : y.getScrollTop(!0)) - e;
                    if (y.bouncescroll) {
                        var r = Math.round(y.view.h / 2);
                        n < -r ? n = -r : n > y.page.maxh + r && (n = y.page.maxh + r)
                    }
                    y.cursorfreezed = !1;
                    py = y.getScrollTop(!0);
                    if (0 > n && 0 >= py) return y.noticeCursor();
                    if (n > y.page.maxh && py >= y.page.maxh) return y.checkContentSize(), y.noticeCursor();
                    y.doScrollTop(n)
                };
                this.doScrollLeftBy = function(e, t) {
                    var n = 0,
                        n = t ? Math.floor((y.scroll.x - e) * y.scrollratio.x) : (y.timer ? y.newscrollx : y.getScrollLeft(!0)) - e;
                    if (y.bouncescroll) {
                        var r = Math.round(y.view.w / 2);
                        n < -r ? n = -r : n > y.page.maxw + r && (n = y.page.maxw + r)
                    }
                    y.cursorfreezed = !1;
                    px = y.getScrollLeft(!0);
                    if (0 > n && 0 >= px || n > y.page.maxw && px >= y.page.maxw) return y.noticeCursor();
                    y.doScrollLeft(n)
                };
                this.doScrollTo = function(e, t) {
                    t && Math.round(e * y.scrollratio.y);
                    y.cursorfreezed = !1;
                    y.doScrollTop(e)
                };
                this.checkContentSize = function() {
                    var e = y.getContentSize();
                    (e.h != y.page.h || e.w != y.page.w) && y.resize(!1, e)
                };
                y.onscroll = function(e) {
                    y.rail.drag || y.cursorfreezed || y.synched("scroll", function() {
                        y.scroll.y = Math.round(y.getScrollTop() * (1 / y.scrollratio.y));
                        y.railh && (y.scroll.x = Math.round(y.getScrollLeft() * (1 / y.scrollratio.x)));
                        y.noticeCursor()
                    })
                };
                y.bind(y.docscroll, "scroll", y.onscroll);
                this.doZoomIn = function(t) {
                    if (!y.zoomactive) {
                        y.zoomactive = !0;
                        y.zoomrestore = {
                            style: {}
                        };
                        var n = "position top left zIndex backgroundColor marginTop marginBottom marginLeft marginRight".split(" "),
                            r = y.win[0].style,
                            i;
                        for (i in n) {
                            var o = n[i];
                            y.zoomrestore.style[o] = "undefined" != typeof r[o] ? r[o] : ""
                        }
                        y.zoomrestore.style.width = y.win.css("width");
                        y.zoomrestore.style.height = y.win.css("height");
                        y.zoomrestore.padding = {
                            w: y.win.outerWidth() - y.win.width(),
                            h: y.win.outerHeight() - y.win.height()
                        };
                        w.isios4 && (y.zoomrestore.scrollTop = e(window).scrollTop(), e(window).scrollTop(0));
                        y.win.css({
                            position: w.isios4 ? "absolute" : "fixed",
                            top: 0,
                            left: 0,
                            "z-index": s + 100,
                            margin: "0px"
                        });
                        n = y.win.css("backgroundColor");
                        ("" == n || /transparent|rgba\(0, 0, 0, 0\)|rgba\(0,0,0,0\)/.test(n)) && y.win.css("backgroundColor", "#fff");
                        y.rail.css({
                            "z-index": s + 101
                        });
                        y.zoom.css({
                            "z-index": s + 102
                        });
                        y.zoom.css("backgroundPosition", "0px -18px");
                        y.resizeZoom();
                        y.onzoomin && y.onzoomin.call(y);
                        return y.cancelEvent(t)
                    }
                };
                this.doZoomOut = function(t) {
                    if (y.zoomactive) return y.zoomactive = !1, y.win.css("margin", ""), y.win.css(y.zoomrestore.style), w.isios4 && e(window).scrollTop(y.zoomrestore.scrollTop), y.rail.css({
                        "z-index": y.zindex
                    }), y.zoom.css({
                        "z-index": y.zindex
                    }), y.zoomrestore = !1, y.zoom.css("backgroundPosition", "0px 0px"), y.onResize(), y.onzoomout && y.onzoomout.call(y), y.cancelEvent(t)
                };
                this.doZoom = function(e) {
                    return y.zoomactive ? y.doZoomOut(e) : y.doZoomIn(e)
                };
                this.resizeZoom = function() {
                    if (y.zoomactive) {
                        var t = y.getScrollTop();
                        y.win.css({
                            width: e(window).width() - y.zoomrestore.padding.w + "px",
                            height: e(window).height() - y.zoomrestore.padding.h + "px"
                        });
                        y.onResize();
                        y.setScrollTop(Math.min(y.page.maxh, t))
                    }
                };
                this.init();
                e.nicescroll.push(this)
            },
            m = function(e) {
                var t = this;
                this.nc = e;
                this.steptime = this.lasttime = this.speedy = this.speedx = this.lasty = this.lastx = 0;
                this.snapy = this.snapx = !1;
                this.demuly = this.demulx = 0;
                this.lastscrolly = this.lastscrollx = -1;
                this.timer = this.chky = this.chkx = 0;
                this.time = function() {
                    return +(new Date)
                };
                this.reset = function(e, n) {
                    t.stop();
                    var r = t.time();
                    t.steptime = 0;
                    t.lasttime = r;
                    t.speedx = 0;
                    t.speedy = 0;
                    t.lastx = e;
                    t.lasty = n;
                    t.lastscrollx = -1;
                    t.lastscrolly = -1
                };
                this.update = function(e, n) {
                    var r = t.time();
                    t.steptime = r - t.lasttime;
                    t.lasttime = r;
                    var r = n - t.lasty,
                        i = e - t.lastx,
                        s = t.nc.getScrollTop(),
                        o = t.nc.getScrollLeft(),
                        s = s + r,
                        o = o + i;
                    t.snapx = 0 > o || o > t.nc.page.maxw;
                    t.snapy = 0 > s || s > t.nc.page.maxh;
                    t.speedx = i;
                    t.speedy = r;
                    t.lastx = e;
                    t.lasty = n
                };
                this.stop = function() {
                    t.nc.unsynched("domomentum2d");
                    t.timer && clearTimeout(t.timer);
                    t.timer = 0;
                    t.lastscrollx = -1;
                    t.lastscrolly = -1
                };
                this.doSnapy = function(e, n) {
                    var r = !1;
                    0 > n ? (n = 0, r = !0) : n > t.nc.page.maxh && (n = t.nc.page.maxh, r = !0);
                    0 > e ? (e = 0, r = !0) : e > t.nc.page.maxw && (e = t.nc.page.maxw, r = !0);
                    r ? t.nc.doScrollPos(e, n, t.nc.opt.snapbackspeed) : t.nc.triggerScrollEnd()
                };
                this.doMomentum = function(e) {
                    var n = t.time(),
                        r = e ? n + e : t.lasttime;
                    e = t.nc.getScrollLeft();
                    var i = t.nc.getScrollTop(),
                        s = t.nc.page.maxh,
                        o = t.nc.page.maxw;
                    t.speedx = 0 < o ? Math.min(60, t.speedx) : 0;
                    t.speedy = 0 < s ? Math.min(60, t.speedy) : 0;
                    r = r && 60 >= n - r;
                    if (0 > i || i > s || 0 > e || e > o) r = !1;
                    e = t.speedx && r ? t.speedx : !1;
                    if (t.speedy && r && t.speedy || e) {
                        var u = Math.max(16, t.steptime);
                        50 < u && (e = u / 50, t.speedx *= e, t.speedy *= e, u = 50);
                        t.demulxy = 0;
                        t.lastscrollx = t.nc.getScrollLeft();
                        t.chkx = t.lastscrollx;
                        t.lastscrolly = t.nc.getScrollTop();
                        t.chky = t.lastscrolly;
                        var a = t.lastscrollx,
                            f = t.lastscrolly,
                            l = function() {
                                var e = 600 < t.time() - n ? .04 : .02;
                                if (t.speedx && (a = Math.floor(t.lastscrollx - t.speedx * (1 - t.demulxy)), t.lastscrollx = a, 0 > a || a > o)) e = .1;
                                if (t.speedy && (f = Math.floor(t.lastscrolly - t.speedy * (1 - t.demulxy)), t.lastscrolly = f, 0 > f || f > s)) e = .1;
                                t.demulxy = Math.min(1, t.demulxy + e);
                                t.nc.synched("domomentum2d", function() {
                                    t.speedx && (t.nc.getScrollLeft() != t.chkx && t.stop(), t.chkx = a, t.nc.setScrollLeft(a));
                                    t.speedy && (t.nc.getScrollTop() != t.chky && t.stop(), t.chky = f, t.nc.setScrollTop(f));
                                    t.timer || (t.nc.hideCursor(), t.doSnapy(a, f))
                                });
                                1 > t.demulxy ? t.timer = setTimeout(l, u) : (t.stop(), t.nc.hideCursor(), t.doSnapy(a, f))
                            };
                        l()
                    } else t.doSnapy(t.nc.getScrollLeft(), t.nc.getScrollTop())
                }
            },
            g = e.fn.scrollTop;
        e.cssHooks.pageYOffset = {
            get: function(t, n, r) {
                return (n = e.data(t, "__nicescroll") || !1) && n.ishwscroll ? n.getScrollTop() : g.call(t)
            },
            set: function(t, n) {
                var r = e.data(t, "__nicescroll") || !1;
                r && r.ishwscroll ? r.setScrollTop(parseInt(n)) : g.call(t, n);
                return this
            }
        };
        e.fn.scrollTop = function(t) {
            if ("undefined" == typeof t) {
                var n = this[0] ? e.data(this[0], "__nicescroll") || !1 : !1;
                return n && n.ishwscroll ? n.getScrollTop() : g.call(this)
            }
            return this.each(function() {
                var n = e.data(this, "__nicescroll") || !1;
                n && n.ishwscroll ? n.setScrollTop(parseInt(t)) : g.call(e(this), t)
            })
        };
        var y = e.fn.scrollLeft;
        e.cssHooks.pageXOffset = {
            get: function(t, n, r) {
                return (n = e.data(t, "__nicescroll") || !1) && n.ishwscroll ? n.getScrollLeft() : y.call(t)
            },
            set: function(t, n) {
                var r = e.data(t, "__nicescroll") || !1;
                r && r.ishwscroll ? r.setScrollLeft(parseInt(n)) : y.call(t, n);
                return this
            }
        };
        e.fn.scrollLeft = function(t) {
            if ("undefined" == typeof t) {
                var n = this[0] ? e.data(this[0], "__nicescroll") || !1 : !1;
                return n && n.ishwscroll ? n.getScrollLeft() : y.call(this)
            }
            return this.each(function() {
                var n = e.data(this, "__nicescroll") || !1;
                n && n.ishwscroll ? n.setScrollLeft(parseInt(t)) : y.call(e(this), t)
            })
        };
        var b = function(t) {
            var n = this;
            this.length = 0;
            this.name = "nicescrollarray";
            this.each = function(e) {
                for (var t = 0, r = 0; t < n.length; t++) e.call(n[t], r++);
                return n
            };
            this.push = function(e) {
                n[n.length] = e;
                n.length++
            };
            this.eq = function(e) {
                return n[e]
            };
            if (t)
                for (var r = 0; r < t.length; r++) {
                    var i = e.data(t[r], "__nicescroll") || !1;
                    i && (this[this.length] = i, this.length++)
                }
            return this
        };
        (function(e, t, n) {
            for (var r = 0; r < t.length; r++) n(e, t[r])
        })(b.prototype, "show hide toggle onResize resize remove stop doScrollPos".split(" "), function(e, t) {
            e[t] = function() {
                var e = arguments;
                return this.each(function() {
                    this[t].apply(this, e)
                })
            }
        });
        e.fn.getNiceScroll = function(t) {
            return "undefined" == typeof t ? new b(this) : this[t] && e.data(this[t], "__nicescroll") || !1
        };
        e.extend(e.expr[":"], {
            nicescroll: function(t) {
                return e.data(t, "__nicescroll") ? !0 : !1
            }
        });
        e.fn.niceScroll = function(t, n) {
            "undefined" == typeof n && "object" == typeof t && !("jquery" in t) && (n = t, t = !1);
            var r = new b;
            "undefined" == typeof n && (n = {});
            t && (n.doc = e(t), n.win = e(this));
            var i = !("doc" in n);
            !i && !("win" in n) && (n.win = e(this));
            this.each(function() {
                var t = e(this).data("__nicescroll") || !1;
                t || (n.doc = i ? e(this) : n.doc, t = new v(n, e(this)), e(this).data("__nicescroll", t));
                r.push(t)
            });
            return 1 == r.length ? r[0] : r
        };
        window.NiceScroll = {
            getjQuery: function() {
                return e
            }
        };
        e.nicescroll || (e.nicescroll = new b, e.nicescroll.options = h)
    });
}


/**
 * BxSlider v4.1.2 - Fully loaded, responsive content slider
 * http://bxslider.com
 *
 * Copyright 2014, Steven Wanderski - http://stevenwanderski.com - http://bxcreative.com
 * Written while drinking Belgian ales and listening to jazz
 *
 * Released under the MIT license - http://opensource.org/licenses/MIT
 */
! function(t) {
    var e = {},
        s = {
            mode: "horizontal",
            slideSelector: "",
            infiniteLoop: !0,
            hideControlOnEnd: !1,
            speed: 500,
            easing: null,
            slideMargin: 0,
            startSlide: 0,
            randomStart: !1,
            captions: !1,
            ticker: !1,
            tickerHover: !1,
            adaptiveHeight: !1,
            adaptiveHeightSpeed: 500,
            video: !1,
            useCSS: !0,
            preloadImages: "visible",
            responsive: !0,
            slideZIndex: 50,
            touchEnabled: !0,
            swipeThreshold: 50,
            oneToOneTouch: !0,
            preventDefaultSwipeX: !0,
            preventDefaultSwipeY: !1,
            pager: !0,
            pagerType: "full",
            pagerShortSeparator: " / ",
            pagerSelector: null,
            buildPager: null,
            pagerCustom: null,
            controls: !0,
            nextText: "Next",
            prevText: "Prev",
            nextSelector: null,
            prevSelector: null,
            autoControls: !1,
            startText: "Start",
            stopText: "Stop",
            autoControlsCombine: !1,
            autoControlsSelector: null,
            auto: !1,
            pause: 4e3,
            autoStart: !0,
            autoDirection: "next",
            autoHover: !1,
            autoDelay: 0,
            minSlides: 1,
            maxSlides: 1,
            moveSlides: 0,
            slideWidth: 0,
            onSliderLoad: function() {},
            onSlideBefore: function() {},
            onSlideAfter: function() {},
            onSlideNext: function() {},
            onSlidePrev: function() {},
            onSliderResize: function() {}
        };
    t.fn.bxSlider = function(n) {
        if (0 == this.length) return this;
        if (this.length > 1) return this.each(function() {
            t(this).bxSlider(n)
        }), this;
        var o = {},
            r = this;
        e.el = this;
        var a = t(window).width(),
            l = t(window).height(),
            d = function() {
                o.settings = t.extend({}, s, n), o.settings.slideWidth = parseInt(o.settings.slideWidth), o.children = r.children(o.settings.slideSelector), o.children.length < o.settings.minSlides && (o.settings.minSlides = o.children.length), o.children.length < o.settings.maxSlides && (o.settings.maxSlides = o.children.length), o.settings.randomStart && (o.settings.startSlide = Math.floor(Math.random() * o.children.length)), o.active = {
                    index: o.settings.startSlide
                }, o.carousel = o.settings.minSlides > 1 || o.settings.maxSlides > 1, o.carousel && (o.settings.preloadImages = "all"), o.minThreshold = o.settings.minSlides * o.settings.slideWidth + (o.settings.minSlides - 1) * o.settings.slideMargin, o.maxThreshold = o.settings.maxSlides * o.settings.slideWidth + (o.settings.maxSlides - 1) * o.settings.slideMargin, o.working = !1, o.controls = {}, o.interval = null, o.animProp = "vertical" == o.settings.mode ? "top" : "left", o.usingCSS = o.settings.useCSS && "fade" != o.settings.mode && function() {
                    var t = document.createElement("div"),
                        e = ["WebkitPerspective", "MozPerspective", "OPerspective", "msPerspective"];
                    for (var i in e)
                        if (void 0 !== t.style[e[i]]) return o.cssPrefix = e[i].replace("Perspective", "").toLowerCase(), o.animProp = "-" + o.cssPrefix + "-transform", !0;
                    return !1
                }(), "vertical" == o.settings.mode && (o.settings.maxSlides = o.settings.minSlides), r.data("origStyle", r.attr("style")), r.children(o.settings.slideSelector).each(function() {
                    t(this).data("origStyle", t(this).attr("style"))
                }), c()
            },
            c = function() {
                r.wrap('<div class="bx-wrapper"><div class="bx-viewport"></div></div>'), o.viewport = r.parent(), o.loader = t('<div class="bx-loading" />'), o.viewport.prepend(o.loader), r.css({
                    width: "horizontal" == o.settings.mode ? 100 * o.children.length + 215 + "%" : "auto",
                    position: "relative"
                }), o.usingCSS && o.settings.easing ? r.css("-" + o.cssPrefix + "-transition-timing-function", o.settings.easing) : o.settings.easing || (o.settings.easing = "swing"), f(), o.viewport.css({
                    width: "100%",
                    overflow: "hidden",
                    position: "relative"
                }), o.viewport.parent().css({
                    maxWidth: p()
                }), o.settings.pager || o.viewport.parent().css({
                    margin: "0 auto 0px"
                }), o.children.css({
                    "float": "horizontal" == o.settings.mode ? "left" : "none",
                    listStyle: "none",
                    position: "relative"
                }), o.children.css("width", u()), "horizontal" == o.settings.mode && o.settings.slideMargin > 0 && o.children.css("marginRight", o.settings.slideMargin), "vertical" == o.settings.mode && o.settings.slideMargin > 0 && o.children.css("marginBottom", o.settings.slideMargin), "fade" == o.settings.mode && (o.children.css({
                    position: "absolute",
                    zIndex: 0,
                    display: "none"
                }), o.children.eq(o.settings.startSlide).css({
                    zIndex: o.settings.slideZIndex,
                    display: "block"
                })), o.controls.el = t('<div class="bx-controls" />'), o.settings.captions && P(), o.active.last = o.settings.startSlide == x() - 1, o.settings.video && r.fitVids();
                var e = o.children.eq(o.settings.startSlide);
                "all" == o.settings.preloadImages && (e = o.children), o.settings.ticker ? o.settings.pager = !1 : (o.settings.pager && T(), o.settings.controls && C(), o.settings.auto && o.settings.autoControls && E(), (o.settings.controls || o.settings.autoControls || o.settings.pager) && o.viewport.after(o.controls.el)), g(e, h)
            },
            g = function(e, i) {
                var s = e.find("img, iframe").length;
                if (0 == s) return i(), void 0;
                var n = 0;
                e.find("img, iframe").each(function() {
                    t(this).one("load", function() {
                        ++n == s && i()
                    }).each(function() {
                        this.complete && t(this).load()
                    })
                })
            },
            h = function() {
                if (o.settings.infiniteLoop && "fade" != o.settings.mode && !o.settings.ticker) {
                    var e = "vertical" == o.settings.mode ? o.settings.minSlides : o.settings.maxSlides,
                        i = o.children.slice(0, e).clone().addClass("bx-clone"),
                        s = o.children.slice(-e).clone().addClass("bx-clone");
                    r.append(i).prepend(s)
                }
                o.loader.remove(), S(), "vertical" == o.settings.mode && (o.settings.adaptiveHeight = !0), o.viewport.height(v()), r.redrawSlider(), o.settings.onSliderLoad(o.active.index), o.initialized = !0, o.settings.responsive && t(window).bind("resize", Z), o.settings.auto && o.settings.autoStart && H(), o.settings.ticker && L(), o.settings.pager && q(o.settings.startSlide), o.settings.controls && W(), o.settings.touchEnabled && !o.settings.ticker && O()
            },
            v = function() {
                var e = 0,
                    s = t();
                if ("vertical" == o.settings.mode || o.settings.adaptiveHeight)
                    if (o.carousel) {
                        var n = 1 == o.settings.moveSlides ? o.active.index : o.active.index * m();
                        for (s = o.children.eq(n), i = 1; i <= o.settings.maxSlides - 1; i++) s = n + i >= o.children.length ? s.add(o.children.eq(i - 1)) : s.add(o.children.eq(n + i))
                    } else s = o.children.eq(o.active.index);
                else s = o.children;
                return "vertical" == o.settings.mode ? (s.each(function() {
                    e += t(this).outerHeight()
                }), o.settings.slideMargin > 0 && (e += o.settings.slideMargin * (o.settings.minSlides - 1))) : e = Math.max.apply(Math, s.map(function() {
                    return t(this).outerHeight(!1)
                }).get()), e
            },
            p = function() {
                var t = "100%";
                return o.settings.slideWidth > 0 && (t = "horizontal" == o.settings.mode ? o.settings.maxSlides * o.settings.slideWidth + (o.settings.maxSlides - 1) * o.settings.slideMargin : o.settings.slideWidth), t
            },
            u = function() {
                var t = o.settings.slideWidth,
                    e = o.viewport.width();
                return 0 == o.settings.slideWidth || o.settings.slideWidth > e && !o.carousel || "vertical" == o.settings.mode ? t = e : o.settings.maxSlides > 1 && "horizontal" == o.settings.mode && (e > o.maxThreshold || e < o.minThreshold && (t = (e - o.settings.slideMargin * (o.settings.minSlides - 1)) / o.settings.minSlides)), t
            },
            f = function() {
                var t = 1;
                if ("horizontal" == o.settings.mode && o.settings.slideWidth > 0)
                    if (o.viewport.width() < o.minThreshold) t = o.settings.minSlides;
                    else if (o.viewport.width() > o.maxThreshold) t = o.settings.maxSlides;
                else {
                    var e = o.children.first().width();
                    t = Math.floor(o.viewport.width() / e)
                } else "vertical" == o.settings.mode && (t = o.settings.minSlides);
                return t
            },
            x = function() {
                var t = 0;
                if (o.settings.moveSlides > 0)
                    if (o.settings.infiniteLoop) t = o.children.length / m();
                    else
                        for (var e = 0, i = 0; e < o.children.length;) ++t, e = i + f(), i += o.settings.moveSlides <= f() ? o.settings.moveSlides : f();
                else t = Math.ceil(o.children.length / f());
                return t
            },
            m = function() {
                return o.settings.moveSlides > 0 && o.settings.moveSlides <= f() ? o.settings.moveSlides : f()
            },
            S = function() {
                if (o.children.length > o.settings.maxSlides && o.active.last && !o.settings.infiniteLoop) {
                    if ("horizontal" == o.settings.mode) {
                        var t = o.children.last(),
                            e = t.position();
                        b(-(e.left - (o.viewport.width() - t.width())), "reset", 0)
                    } else if ("vertical" == o.settings.mode) {
                        var i = o.children.length - o.settings.minSlides,
                            e = o.children.eq(i).position();
                        b(-e.top, "reset", 0)
                    }
                } else {
                    var e = o.children.eq(o.active.index * m()).position();
                    o.active.index == x() - 1 && (o.active.last = !0), void 0 != e && ("horizontal" == o.settings.mode ? b(-e.left, "reset", 0) : "vertical" == o.settings.mode && b(-e.top, "reset", 0))
                }
            },
            b = function(t, e, i, s) {
                if (o.usingCSS) {
                    var n = "vertical" == o.settings.mode ? "translate3d(0, " + t + "px, 0)" : "translate3d(" + t + "px, 0, 0)";
                    r.css("-" + o.cssPrefix + "-transition-duration", i / 1e3 + "s"), "slide" == e ? (r.css(o.animProp, n), r.bind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", function() {
                        r.unbind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd"), D()
                    })) : "reset" == e ? r.css(o.animProp, n) : "ticker" == e && (r.css("-" + o.cssPrefix + "-transition-timing-function", "linear"), r.css(o.animProp, n), r.bind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", function() {
                        r.unbind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd"), b(s.resetValue, "reset", 0), N()
                    }))
                } else {
                    var a = {};
                    a[o.animProp] = t, "slide" == e ? r.animate(a, i, o.settings.easing, function() {
                        D()
                    }) : "reset" == e ? r.css(o.animProp, t) : "ticker" == e && r.animate(a, speed, "linear", function() {
                        b(s.resetValue, "reset", 0), N()
                    })
                }
            },
            w = function() {
                for (var e = "", i = x(), s = 0; i > s; s++) {
                    var n = "";
                    o.settings.buildPager && t.isFunction(o.settings.buildPager) ? (n = o.settings.buildPager(s), o.pagerEl.addClass("bx-custom-pager")) : (n = s + 1, o.pagerEl.addClass("bx-default-pager")), e += '<div class="bx-pager-item"><a href="" data-slide-index="' + s + '" class="bx-pager-link">' + n + "</a></div>"
                }
                o.pagerEl.html(e)
            },
            T = function() {
                o.settings.pagerCustom ? o.pagerEl = t(o.settings.pagerCustom) : (o.pagerEl = t('<div class="bx-pager" />'), o.settings.pagerSelector ? t(o.settings.pagerSelector).html(o.pagerEl) : o.controls.el.addClass("bx-has-pager").append(o.pagerEl), w()), o.pagerEl.on("click", "a", I)
            },
            C = function() {
                o.controls.next = t('<a class="bx-next" href="">' + o.settings.nextText + "</a>"), o.controls.prev = t('<a class="bx-prev" href="">' + o.settings.prevText + "</a>"), o.controls.next.bind("click", y), o.controls.prev.bind("click", z), o.settings.nextSelector && t(o.settings.nextSelector).append(o.controls.next), o.settings.prevSelector && t(o.settings.prevSelector).append(o.controls.prev), o.settings.nextSelector || o.settings.prevSelector || (o.controls.directionEl = t('<div class="bx-controls-direction" />'), o.controls.directionEl.append(o.controls.prev).append(o.controls.next), o.controls.el.addClass("bx-has-controls-direction").append(o.controls.directionEl))
            },
            E = function() {
                o.controls.start = t('<div class="bx-controls-auto-item"><a class="bx-start" href="">' + o.settings.startText + "</a></div>"), o.controls.stop = t('<div class="bx-controls-auto-item"><a class="bx-stop" href="">' + o.settings.stopText + "</a></div>"), o.controls.autoEl = t('<div class="bx-controls-auto" />'), o.controls.autoEl.on("click", ".bx-start", k), o.controls.autoEl.on("click", ".bx-stop", M), o.settings.autoControlsCombine ? o.controls.autoEl.append(o.controls.start) : o.controls.autoEl.append(o.controls.start).append(o.controls.stop), o.settings.autoControlsSelector ? t(o.settings.autoControlsSelector).html(o.controls.autoEl) : o.controls.el.addClass("bx-has-controls-auto").append(o.controls.autoEl), A(o.settings.autoStart ? "stop" : "start")
            },
            P = function() {
                o.children.each(function() {
                    var e = t(this).find("img:first").attr("title");
                    void 0 != e && ("" + e).length && t(this).append('<div class="bx-caption"><span>' + e + "</span></div>")
                })
            },
            y = function(t) {
                o.settings.auto && r.stopAuto(), r.goToNextSlide(), t.preventDefault()
            },
            z = function(t) {
                o.settings.auto && r.stopAuto(), r.goToPrevSlide(), t.preventDefault()
            },
            k = function(t) {
                r.startAuto(), t.preventDefault()
            },
            M = function(t) {
                r.stopAuto(), t.preventDefault()
            },
            I = function(e) {
                o.settings.auto && r.stopAuto();
                var i = t(e.currentTarget),
                    s = parseInt(i.attr("data-slide-index"));
                s != o.active.index && r.goToSlide(s), e.preventDefault()
            },
            q = function(e) {
                var i = o.children.length;
                return "short" == o.settings.pagerType ? (o.settings.maxSlides > 1 && (i = Math.ceil(o.children.length / o.settings.maxSlides)), o.pagerEl.html(e + 1 + o.settings.pagerShortSeparator + i), void 0) : (o.pagerEl.find("a").removeClass("active"), o.pagerEl.each(function(i, s) {
                    t(s).find("a").eq(e).addClass("active")
                }), void 0)
            },
            D = function() {
                if (o.settings.infiniteLoop) {
                    var t = "";
                    0 == o.active.index ? t = o.children.eq(0).position() : o.active.index == x() - 1 && o.carousel ? t = o.children.eq((x() - 1) * m()).position() : o.active.index == o.children.length - 1 && (t = o.children.eq(o.children.length - 1).position()), t && ("horizontal" == o.settings.mode ? b(-t.left, "reset", 0) : "vertical" == o.settings.mode && b(-t.top, "reset", 0))
                }
                o.working = !1, o.settings.onSlideAfter(o.children.eq(o.active.index), o.oldIndex, o.active.index)
            },
            A = function(t) {
                o.settings.autoControlsCombine ? o.controls.autoEl.html(o.controls[t]) : (o.controls.autoEl.find("a").removeClass("active"), o.controls.autoEl.find("a:not(.bx-" + t + ")").addClass("active"))
            },
            W = function() {
                1 == x() ? (o.controls.prev.addClass("disabled"), o.controls.next.addClass("disabled")) : !o.settings.infiniteLoop && o.settings.hideControlOnEnd && (0 == o.active.index ? (o.controls.prev.addClass("disabled"), o.controls.next.removeClass("disabled")) : o.active.index == x() - 1 ? (o.controls.next.addClass("disabled"), o.controls.prev.removeClass("disabled")) : (o.controls.prev.removeClass("disabled"), o.controls.next.removeClass("disabled")))
            },
            H = function() {
                o.settings.autoDelay > 0 ? setTimeout(r.startAuto, o.settings.autoDelay) : r.startAuto(), o.settings.autoHover && r.hover(function() {
                    o.interval && (r.stopAuto(!0), o.autoPaused = !0)
                }, function() {
                    o.autoPaused && (r.startAuto(!0), o.autoPaused = null)
                })
            },
            L = function() {
                var e = 0;
                if ("next" == o.settings.autoDirection) r.append(o.children.clone().addClass("bx-clone"));
                else {
                    r.prepend(o.children.clone().addClass("bx-clone"));
                    var i = o.children.first().position();
                    e = "horizontal" == o.settings.mode ? -i.left : -i.top
                }
                b(e, "reset", 0), o.settings.pager = !1, o.settings.controls = !1, o.settings.autoControls = !1, o.settings.tickerHover && !o.usingCSS && o.viewport.hover(function() {
                    r.stop()
                }, function() {
                    var e = 0;
                    o.children.each(function() {
                        e += "horizontal" == o.settings.mode ? t(this).outerWidth(!0) : t(this).outerHeight(!0)
                    });
                    var i = o.settings.speed / e,
                        s = "horizontal" == o.settings.mode ? "left" : "top",
                        n = i * (e - Math.abs(parseInt(r.css(s))));
                    N(n)
                }), N()
            },
            N = function(t) {
                speed = t ? t : o.settings.speed;
                var e = {
                        left: 0,
                        top: 0
                    },
                    i = {
                        left: 0,
                        top: 0
                    };
                "next" == o.settings.autoDirection ? e = r.find(".bx-clone").first().position() : i = o.children.first().position();
                var s = "horizontal" == o.settings.mode ? -e.left : -e.top,
                    n = "horizontal" == o.settings.mode ? -i.left : -i.top,
                    a = {
                        resetValue: n
                    };
                b(s, "ticker", speed, a)
            },
            O = function() {
                o.touch = {
                    start: {
                        x: 0,
                        y: 0
                    },
                    end: {
                        x: 0,
                        y: 0
                    }
                }, o.viewport.bind("touchstart", X)
            },
            X = function(t) {
                if (o.working) t.preventDefault();
                else {
                    o.touch.originalPos = r.position();
                    var e = t.originalEvent;
                    o.touch.start.x = e.changedTouches[0].pageX, o.touch.start.y = e.changedTouches[0].pageY, o.viewport.bind("touchmove", Y), o.viewport.bind("touchend", V)
                }
            },
            Y = function(t) {
                var e = t.originalEvent,
                    i = Math.abs(e.changedTouches[0].pageX - o.touch.start.x),
                    s = Math.abs(e.changedTouches[0].pageY - o.touch.start.y);
                if (3 * i > s && o.settings.preventDefaultSwipeX ? t.preventDefault() : 3 * s > i && o.settings.preventDefaultSwipeY && t.preventDefault(), "fade" != o.settings.mode && o.settings.oneToOneTouch) {
                    var n = 0;
                    if ("horizontal" == o.settings.mode) {
                        var r = e.changedTouches[0].pageX - o.touch.start.x;
                        n = o.touch.originalPos.left + r
                    } else {
                        var r = e.changedTouches[0].pageY - o.touch.start.y;
                        n = o.touch.originalPos.top + r
                    }
                    b(n, "reset", 0)
                }
            },
            V = function(t) {
                o.viewport.unbind("touchmove", Y);
                var e = t.originalEvent,
                    i = 0;
                if (o.touch.end.x = e.changedTouches[0].pageX, o.touch.end.y = e.changedTouches[0].pageY, "fade" == o.settings.mode) {
                    var s = Math.abs(o.touch.start.x - o.touch.end.x);
                    s >= o.settings.swipeThreshold && (o.touch.start.x > o.touch.end.x ? r.goToNextSlide() : r.goToPrevSlide(), r.stopAuto())
                } else {
                    var s = 0;
                    "horizontal" == o.settings.mode ? (s = o.touch.end.x - o.touch.start.x, i = o.touch.originalPos.left) : (s = o.touch.end.y - o.touch.start.y, i = o.touch.originalPos.top), !o.settings.infiniteLoop && (0 == o.active.index && s > 0 || o.active.last && 0 > s) ? b(i, "reset", 200) : Math.abs(s) >= o.settings.swipeThreshold ? (0 > s ? r.goToNextSlide() : r.goToPrevSlide(), r.stopAuto()) : b(i, "reset", 200)
                }
                o.viewport.unbind("touchend", V)
            },
            Z = function() {
                var e = t(window).width(),
                    i = t(window).height();
                (a != e || l != i) && (a = e, l = i, r.redrawSlider(), o.settings.onSliderResize.call(r, o.active.index))
            };
        return r.goToSlide = function(e, i) {
            if (!o.working && o.active.index != e)
                if (o.working = !0, o.oldIndex = o.active.index, o.active.index = 0 > e ? x() - 1 : e >= x() ? 0 : e, o.settings.onSlideBefore(o.children.eq(o.active.index), o.oldIndex, o.active.index), "next" == i ? o.settings.onSlideNext(o.children.eq(o.active.index), o.oldIndex, o.active.index) : "prev" == i && o.settings.onSlidePrev(o.children.eq(o.active.index), o.oldIndex, o.active.index), o.active.last = o.active.index >= x() - 1, o.settings.pager && q(o.active.index), o.settings.controls && W(), "fade" == o.settings.mode) o.settings.adaptiveHeight && o.viewport.height() != v() && o.viewport.animate({
                    height: v()
                }, o.settings.adaptiveHeightSpeed), o.children.filter(":visible").fadeOut(o.settings.speed).css({
                    zIndex: 0
                }), o.children.eq(o.active.index).css("zIndex", o.settings.slideZIndex + 1).fadeIn(o.settings.speed, function() {
                    t(this).css("zIndex", o.settings.slideZIndex), D()
                });
                else {
                    o.settings.adaptiveHeight && o.viewport.height() != v() && o.viewport.animate({
                        height: v()
                    }, o.settings.adaptiveHeightSpeed);
                    var s = 0,
                        n = {
                            left: 0,
                            top: 0
                        };
                    if (!o.settings.infiniteLoop && o.carousel && o.active.last)
                        if ("horizontal" == o.settings.mode) {
                            var a = o.children.eq(o.children.length - 1);
                            n = a.position(), s = o.viewport.width() - a.outerWidth()
                        } else {
                            var l = o.children.length - o.settings.minSlides;
                            n = o.children.eq(l).position()
                        }
                    else if (o.carousel && o.active.last && "prev" == i) {
                        var d = 1 == o.settings.moveSlides ? o.settings.maxSlides - m() : (x() - 1) * m() - (o.children.length - o.settings.maxSlides),
                            a = r.children(".bx-clone").eq(d);
                        n = a.position()
                    } else if ("next" == i && 0 == o.active.index) n = r.find("> .bx-clone").eq(o.settings.maxSlides).position(), o.active.last = !1;
                    else if (e >= 0) {
                        var c = e * m();
                        n = o.children.eq(c).position()
                    }
                    if ("undefined" != typeof n) {
                        var g = "horizontal" == o.settings.mode ? -(n.left - s) : -n.top;
                        b(g, "slide", o.settings.speed)
                    }
                }
        }, r.goToNextSlide = function() {
            if (o.settings.infiniteLoop || !o.active.last) {
                var t = parseInt(o.active.index) + 1;
                r.goToSlide(t, "next")
            }
        }, r.goToPrevSlide = function() {
            if (o.settings.infiniteLoop || 0 != o.active.index) {
                var t = parseInt(o.active.index) - 1;
                r.goToSlide(t, "prev")
            }
        }, r.startAuto = function(t) {
            o.interval || (o.interval = setInterval(function() {
                "next" == o.settings.autoDirection ? r.goToNextSlide() : r.goToPrevSlide()
            }, o.settings.pause), o.settings.autoControls && 1 != t && A("stop"))
        }, r.stopAuto = function(t) {
            o.interval && (clearInterval(o.interval), o.interval = null, o.settings.autoControls && 1 != t && A("start"))
        }, r.getCurrentSlide = function() {
            return o.active.index
        }, r.getCurrentSlideElement = function() {
            return o.children.eq(o.active.index)
        }, r.getSlideCount = function() {
            return o.children.length
        }, r.redrawSlider = function() {
            o.children.add(r.find(".bx-clone")).outerWidth(u()), o.viewport.css("height", v()), o.settings.ticker || S(), o.active.last && (o.active.index = x() - 1), o.active.index >= x() && (o.active.last = !0), o.settings.pager && !o.settings.pagerCustom && (w(), q(o.active.index))
        }, r.destroySlider = function() {
            o.initialized && (o.initialized = !1, t(".bx-clone", this).remove(), o.children.each(function() {
                void 0 != t(this).data("origStyle") ? t(this).attr("style", t(this).data("origStyle")) : t(this).removeAttr("style")
            }), void 0 != t(this).data("origStyle") ? this.attr("style", t(this).data("origStyle")) : t(this).removeAttr("style"), t(this).unwrap().unwrap(), o.controls.el && o.controls.el.remove(), o.controls.next && o.controls.next.remove(), o.controls.prev && o.controls.prev.remove(), o.pagerEl && o.settings.controls && o.pagerEl.remove(), t(".bx-caption", this).remove(), o.controls.autoEl && o.controls.autoEl.remove(), clearInterval(o.interval), o.settings.responsive && t(window).unbind("resize", Z))
        }, r.reloadSlider = function(t) {
            void 0 != t && (n = t), r.destroySlider(), d()
        }, d(), this
    }
}(jQuery);

/*global jQuery */
/*jshint browser:true */
/*!
 * FitVids 1.1
 *
 * Copyright 2013, Chris Coyier - http://css-tricks.com + Dave Rupert - http://daverupert.com
 * Credit to Thierry Koblentz - http://www.alistapart.com/articles/creating-intrinsic-ratios-for-video/
 * Released under the WTFPL license - http://sam.zoy.org/wtfpl/
 *
 */
! function($) {
    "use strict";
    $.fn.fitVids = function(options) {
        var settings = {
            customSelector: null
        };
        if (!document.getElementById("fit-vids-style")) {
            var head = document.head || document.getElementsByTagName("head")[0],
                css = ".fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}",
                div = document.createElement("div");
            div.innerHTML = '<p>x</p><style id="fit-vids-style">' + css + "</style>", head.appendChild(div.childNodes[1])
        }
        return options && $.extend(settings, options), this.each(function() {
            var selectors = ["iframe[src*='player.vimeo.com']", "iframe[src*='youtube.com']", "iframe[src*='youtube-nocookie.com']", "iframe[src*='kickstarter.com'][src*='video.html']", "object", "embed"];
            settings.customSelector && selectors.push(settings.customSelector);
            var $allVideos = $(this).find(selectors.join(","));
            $allVideos = $allVideos.not("object object"), $allVideos.each(function() {
                var $this = $(this);
                if (!("embed" === this.tagName.toLowerCase() && $this.parent("object").length || $this.parent(".fluid-width-video-wrapper").length)) {
                    $this.css("height") || $this.css("width") || !isNaN($this.attr("height")) && !isNaN($this.attr("width")) || ($this.attr("height", 9), $this.attr("width", 16));
                    var height = "object" === this.tagName.toLowerCase() || $this.attr("height") && !isNaN(parseInt($this.attr("height"), 10)) ? parseInt($this.attr("height"), 10) : $this.height(),
                        width = isNaN(parseInt($this.attr("width"), 10)) ? $this.width() : parseInt($this.attr("width"), 10),
                        aspectRatio = height / width;
                    if (!$this.attr("id")) {
                        var videoID = "fitvid" + Math.floor(999999 * Math.random());
                        $this.attr("id", videoID)
                    }
                    $this.wrap('<div class="fluid-width-video-wrapper"></div>').parent(".fluid-width-video-wrapper").css("padding-top", 100 * aspectRatio + "%"), $this.removeAttr("height").removeAttr("width")
                }
            })
        })
    }
}(window.jQuery || window.Zepto);


// Sticky Plugin v1.0.4 for jQuery
! function(a) {
    "function" == typeof define && define.amd ? define(["jquery"], a) : "object" == typeof module && module.exports ? module.exports = a(require("jquery")) : a(jQuery)
}(function(a) {
    var b = Array.prototype.slice,
        c = Array.prototype.splice,
        d = {
            topSpacing: 0,
            bottomSpacing: 0,
            className: "is-sticky",
            wrapperClassName: "sticky-wrapper",
            center: !1,
            getWidthFrom: "",
            widthFromWrapper: !0,
            responsiveWidth: !1,
            zIndex: "inherit"
        },
        e = a(window),
        f = a(document),
        g = [],
        h = e.height(),
        i = function() {
            for (var b = e.scrollTop(), c = f.height(), d = c - h, i = b > d ? d - b : 0, j = 0, k = g.length; j < k; j++) {
                var l = g[j],
                    m = l.stickyWrapper.offset().top,
                    n = m - l.topSpacing - i;
                if (b <= n) null !== l.currentTop && (l.stickyElement.css({
                    width: "",
                    position: "",
                    top: "",
                    "z-index": ""
                }), l.stickyElement.parent().removeClass(l.className), l.stickyElement.trigger("sticky-end", [l]), l.currentTop = null);
                else {
                    var o = c - l.stickyElement.outerHeight() - l.topSpacing - l.bottomSpacing - b - i;
                    if (o < 0 ? o += l.topSpacing : o = l.topSpacing, l.currentTop !== o) {
                        var p;
                        l.getWidthFrom ? (padding = l.stickyElement.innerWidth() - l.stickyElement.width(), p = a(l.getWidthFrom).width() - padding || null) : l.widthFromWrapper && (p = l.stickyWrapper.width()), null == p && (p = l.stickyElement.width()), l.stickyElement.css("position", "fixed").css("top", o).css("z-index", l.zIndex), l.stickyElement.parent().addClass(l.className), null === l.currentTop ? l.stickyElement.trigger("sticky-start", [l]) : l.stickyElement.trigger("sticky-update", [l]), l.currentTop === l.topSpacing && l.currentTop > o || null === l.currentTop && o < l.topSpacing ? l.stickyElement.trigger("sticky-bottom-reached", [l]) : null !== l.currentTop && o === l.topSpacing && l.currentTop < o && l.stickyElement.trigger("sticky-bottom-unreached", [l]), l.currentTop = o
                    }
                    var q = l.stickyWrapper.parent();
                    l.stickyElement.offset().top + l.stickyElement.outerHeight() >= q.offset().top + q.outerHeight() && l.stickyElement.offset().top <= l.topSpacing ? l.stickyElement.css("position", "absolute").css("top", "").css("bottom", 0).css("z-index", "") : l.stickyElement.css("position", "fixed").css("top", o).css("bottom", "").css("z-index", l.zIndex)
                }
            }
        },
        j = function() {
            h = e.height();
            for (var b = 0, c = g.length; b < c; b++) {
                var d = g[b],
                    f = null;
                d.getWidthFrom ? d.responsiveWidth && (f = a(d.getWidthFrom).width()) : d.widthFromWrapper && (f = d.stickyWrapper.width()), null != f && d.stickyElement.css("width", f)
            }
        },
        k = {
            init: function(b) {
                return this.each(function() {
                    var c = a.extend({}, d, b),
                        e = a(this),
                        f = e.attr("id"),
                        h = f ? f + "-" + d.wrapperClassName : d.wrapperClassName,
                        i = a("<div></div>").attr("id", h).addClass(c.wrapperClassName);
                    e.wrapAll(function() {
                        if (0 == a(this).parent("#" + h).length) return i
                    });
                    var j = e.parent();
                    c.center && j.css({
                        width: e.outerWidth(),
                        marginLeft: "auto",
                        marginRight: "auto"
                    }), "right" === e.css("float") && e.css({
                        float: "none"
                    }).parent().css({
                        float: "right"
                    }), c.stickyElement = e, c.stickyWrapper = j, c.currentTop = null, g.push(c), k.setWrapperHeight(this), k.setupChangeListeners(this)
                })
            },
            setWrapperHeight: function(b) {
                var c = a(b),
                    d = c.parent();
                d && d.css("height", c.outerHeight())
            },
            setupChangeListeners: function(a) {
                if (window.MutationObserver) {
                    new window.MutationObserver(function(b) {
                        (b[0].addedNodes.length || b[0].removedNodes.length) && k.setWrapperHeight(a)
                    }).observe(a, {
                        subtree: !0,
                        childList: !0
                    })
                } else window.addEventListener ? (a.addEventListener("DOMNodeInserted", function() {
                    k.setWrapperHeight(a)
                }, !1), a.addEventListener("DOMNodeRemoved", function() {
                    k.setWrapperHeight(a)
                }, !1)) : window.attachEvent && (a.attachEvent("onDOMNodeInserted", function() {
                    k.setWrapperHeight(a)
                }), a.attachEvent("onDOMNodeRemoved", function() {
                    k.setWrapperHeight(a)
                }))
            },
            update: i,
            unstick: function(b) {
                return this.each(function() {
                    for (var b = this, d = a(b), e = -1, f = g.length; f-- > 0;) g[f].stickyElement.get(0) === b && (c.call(g, f, 1), e = f); - 1 !== e && (d.unwrap(), d.css({
                        width: "",
                        position: "",
                        top: "",
                        float: "",
                        "z-index": ""
                    }))
                })
            }
        };
    window.addEventListener ? (window.addEventListener("scroll", i, !1), window.addEventListener("resize", j, !1)) : window.attachEvent && (window.attachEvent("onscroll", i), window.attachEvent("onresize", j)), a.fn.sticky = function(c) {
        return k[c] ? k[c].apply(this, b.call(arguments, 1)) : "object" != typeof c && c ? void a.error("Method " + c + " does not exist on jQuery.sticky") : k.init.apply(this, arguments)
    }, a.fn.unstick = function(c) {
        return k[c] ? k[c].apply(this, b.call(arguments, 1)) : "object" != typeof c && c ? void a.error("Method " + c + " does not exist on jQuery.sticky") : k.unstick.apply(this, arguments)
    }, a(function() {
        setTimeout(i, 0)
    })
});


/*! simple-sidebar v2.2.0 (https://dcdeiv.github.io/simple-sidebar)
 ** Davide Di Criscito <davide.dicriscito@gmail.com> (http://github.com/dcdeiv)
 ** (c) 2014-2015 Licensed under GPLv2
 */
! function(a) {
    a.fn.simpleSidebar = function(b) {
        var c = a.extend(!0, a.fn.simpleSidebar.settings, b);
        return this.each(function() {
            var b, d, e, f, g, h, i, j = c.attr,
                k = a(this),
                l = a(c.opener),
                m = a(c.wrapper),
                n = a(c.ignore),
                o = a(c.add),
                p = c.sidebar.closingLinks,
                q = c.sidebar.width,
                r = c.sidebar.gap,
                s = q + r,
                t = a(window).width(),
                u = c.animation.duration,
                v = {},
                w = {},
                x = {},
                y = {},
                z = function() { /*a("body, html").css("overflow","hidden")*/ },
                A = function() {
                    a("body, html").css("overflow", "auto")
                },
                B = {
                    duration: u,
                    easing: c.animation.easing,
                    complete: z
                },
                C = {
                    duration: u,
                    easing: c.animation.easing,
                    complete: A
                },
                D = function() {
                    J.animate(v, B), k.animate(x, B).attr("data-" + j, "active"), H.fadeIn(u)
                },
                E = function() {
                    J.animate(w, C), k.animate(y, C).attr("data-" + j, "disabled"), H.fadeOut(u)
                },
                F = function() {
                    var a = k.attr("data-" + j),
                        c = k.width();
                    w[b] = "-=" + c, w[d] = "+=" + c, y[b] = -c, "active" === a && (J.not(k).animate(w, C), k.animate(y, C).attr("data-" + j, "disabled"), H.fadeOut(u))
                },
                G = a("<div>").attr("data-" + j, "sbwrapper").css(c.sbWrapper.css),
                H = a("<div>").attr("data-" + j, "mask"),
                I = m.siblings().not("script noscript"),
                J = m.add(I).not(n).not(k).not(H).not("script").not("noscript").add(o);
            void 0 === c.sidebar.align || "right" === c.sidebar.align ? (b = "right", d = "left") : "left" === c.sidebar.align && (b = "left", d = "right"), g = {
                position: "fixed",
                top: 0,
                right: 0,
                bottom: 0,
                left: 0,
                zIndex: c.sidebar.css.zIndex - 1,
                display: "none"
            }, h = a.extend(!0, g, c.mask.css), !0 === c.mask.display && H.appendTo("body").css(h), i = s > t ? t - r : q, e = {
                position: "fixed",
                top: 0,
                bottom: 0,
                width: i
            }, x[b] = 0, e[b] = -i, f = a.extend(!0, e, c.sidebar.css), k.css(f).attr("data-" + j, "disabled"), !0 === c.sbWrapper.display && k.wrapInner(G), l.click(function() {
                var a = k.attr("data-" + j),
                    c = k.width();
                v[b] = "+=" + c, v[d] = "-=" + c, w[b] = "-=" + c, w[d] = "+=" + c, y[b] = -c, "disabled" === a ? D() : "active" === a && E()
            }), H.click(F), k.on("click", p, F), a(window).resize(function() {
                var c, e = k.attr("data-" + j),
                    f = a(window).width(),
                    g = {};
                c = s > f ? f - r : q, w[b] = "-=" + c, w[d] = "+=" + c, g[b] = -c, g[d] = "", g.width = c, k.css(g).attr("data-" + j, "disabled"), "active" === e && (J.not(k).animate(w, C), H.fadeOut(u))
            })
        })
    }, a.fn.simpleSidebar.settings = {
        attr: "simplesidebar",
        animation: {
            duration: 500,
            easing: "swing"
        },
        sidebar: {
            width: 300,
            gap: 64,
            closingLinks: "a",
            css: {
                zIndex: 3e3
            }
        },
        sbWrapper: {
            display: !0,
            css: {
                position: "relative",
                height: "100%" /*,overflowY:"auto",overflowX:"hidden"*/
            }
        },
        mask: {
            display: !0,
            css: {
                backgroundColor: "black",
                opacity: .5,
                filter: "Alpha(opacity=50)"
            }
        }
    }
}(jQuery);

/*!
 * classie - class helper functions
 * from bonzo https://github.com/ded/bonzo
 * 
 * classie.has( elem, 'my-class' ) -> true/false
 * classie.add( elem, 'my-new-class' )
 * classie.remove( elem, 'my-unwanted-class' )
 * classie.toggle( elem, 'my-class' )
 */

/*jshint browser: true, strict: true, undef: true */
/*global define: false */

! function(s) {
    "use strict";

    function e(s) {
        return new RegExp("(^|\\s+)" + s + "(\\s+|$)")
    }

    function n(s, e) {
        var n = t(s, e) ? c : a;
        n(s, e)
    }
    var t, a, c;
    "classList" in document.documentElement ? (t = function(s, e) {
        return s.classList.contains(e)
    }, a = function(s, e) {
        s.classList.add(e)
    }, c = function(s, e) {
        s.classList.remove(e)
    }) : (t = function(s, n) {
        return e(n).test(s.className)
    }, a = function(s, e) {
        t(s, e) || (s.className = s.className + " " + e)
    }, c = function(s, n) {
        s.className = s.className.replace(e(n), " ")
    });
    var o = {
        hasClass: t,
        addClass: a,
        removeClass: c,
        toggleClass: n,
        has: t,
        add: a,
        remove: c,
        toggle: n
    };
    "function" == typeof define && define.amd ? define(o) : "object" == typeof exports ? module.exports = o : s.classie = o
}(window);

/* HTML5 Placeholder jQuery Plugin - v2.3.1
 * Copyright (c)2015 Mathias Bynens
 * 2015-12-16
 */
! function(a) {
    "function" == typeof define && define.amd ? define(["jquery"], a) : a("object" == typeof module && module.exports ? require("jquery") : jQuery)
}(function(a) {
    function b(b) {
        var c = {},
            d = /^jQuery\d+$/;
        return a.each(b.attributes, function(a, b) {
            b.specified && !d.test(b.name) && (c[b.name] = b.value)
        }), c
    }

    function c(b, c) {
        var d = this,
            f = a(this);
        if (d.value === f.attr(h ? "placeholder-x" : "placeholder") && f.hasClass(n.customClass))
            if (d.value = "", f.removeClass(n.customClass), f.data("placeholder-password")) {
                if (f = f.hide().nextAll('input[type="password"]:first').show().attr("id", f.removeAttr("id").data("placeholder-id")), b === !0) return f[0].value = c, c;
                f.focus()
            } else d == e() && d.select()
    }

    function d(d) {
        var e, f = this,
            g = a(this),
            i = f.id;
        if (!d || "blur" !== d.type || !g.hasClass(n.customClass))
            if ("" === f.value) {
                if ("password" === f.type) {
                    if (!g.data("placeholder-textinput")) {
                        try {
                            e = g.clone().prop({
                                type: "text"
                            })
                        } catch (j) {
                            e = a("<input>").attr(a.extend(b(this), {
                                type: "text"
                            }))
                        }
                        e.removeAttr("name").data({
                            "placeholder-enabled": !0,
                            "placeholder-password": g,
                            "placeholder-id": i
                        }).bind("focus.placeholder", c), g.data({
                            "placeholder-textinput": e,
                            "placeholder-id": i
                        }).before(e)
                    }
                    f.value = "", g = g.removeAttr("id").hide().prevAll('input[type="text"]:first').attr("id", g.data("placeholder-id")).show()
                } else {
                    var k = g.data("placeholder-password");
                    k && (k[0].value = "", g.attr("id", g.data("placeholder-id")).show().nextAll('input[type="password"]:last').hide().removeAttr("id"))
                }
                g.addClass(n.customClass), g[0].value = g.attr(h ? "placeholder-x" : "placeholder")
            } else g.removeClass(n.customClass)
    }

    function e() {
        try {
            return document.activeElement
        } catch (a) {}
    }
    var f, g, h = !1,
        i = "[object OperaMini]" === Object.prototype.toString.call(window.operamini),
        j = "placeholder" in document.createElement("input") && !i && !h,
        k = "placeholder" in document.createElement("textarea") && !i && !h,
        l = a.valHooks,
        m = a.propHooks,
        n = {};
    j && k ? (g = a.fn.placeholder = function() {
        return this
    }, g.input = !0, g.textarea = !0) : (g = a.fn.placeholder = function(b) {
        var e = {
            customClass: "placeholder"
        };
        return n = a.extend({}, e, b), this.filter((j ? "textarea" : ":input") + "[" + (h ? "placeholder-x" : "placeholder") + "]").not("." + n.customClass).not(":radio, :checkbox, [type=hidden]").bind({
            "focus.placeholder": c,
            "blur.placeholder": d
        }).data("placeholder-enabled", !0).trigger("blur.placeholder")
    }, g.input = j, g.textarea = k, f = {
        get: function(b) {
            var c = a(b),
                d = c.data("placeholder-password");
            return d ? d[0].value : c.data("placeholder-enabled") && c.hasClass(n.customClass) ? "" : b.value
        },
        set: function(b, f) {
            var g, h, i = a(b);
            return "" !== f && (g = i.data("placeholder-textinput"), h = i.data("placeholder-password"), g ? (c.call(g[0], !0, f) || (b.value = f), g[0].value = f) : h && (c.call(b, !0, f) || (h[0].value = f), b.value = f)), i.data("placeholder-enabled") ? ("" === f ? (b.value = f, b != e() && d.call(b)) : (i.hasClass(n.customClass) && c.call(b), b.value = f), i) : (b.value = f, i)
        }
    }, j || (l.input = f, m.value = f), k || (l.textarea = f, m.value = f), a(function() {
        a(document).delegate("form", "submit.placeholder", function() {
            var b = a("." + n.customClass, this).each(function() {
                c.call(this, !0, "")
            });
            setTimeout(function() {
                b.each(d)
            }, 10)
        })
    }), a(window).bind("beforeunload.placeholder", function() {
        var b = !0;
        try {
            "javascript:void(0)" === document.activeElement.toString() && (b = !1)
        } catch (c) {}
        b && a("." + n.customClass).each(function() {
            this.value = ""
        })
    }))
});