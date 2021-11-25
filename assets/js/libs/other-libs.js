// HC Off-canvas Nav
(function (t, e) {
    const i = e.document,
        o = t(i.getElementsByTagName("html")[0]),
        s = (t(i), (/iPad|iPhone|iPod/.test(navigator.userAgent) || (!!navigator.platform && /iPad|iPhone|iPod/.test(navigator.platform))) && !e.MSStream),
        n = "ontouchstart" in e || navigator.maxTouchPoints || (e.DocumentTouch && i instanceof DocumentTouch),
        r = (t) => !isNaN(parseFloat(t)) && isFinite(t),
        a = (t) => t.stopPropagation(),
        l = (t) => (e) => {
            e.preventDefault(), e.stopPropagation(), "function" == typeof t && t();
        },
        d = (t) => ("string" == typeof t ? t : t.attr("id") ? "#" + t.attr("id") : t.attr("class") ? t.prop("tagName").toLowerCase() + "." + t.attr("class").replace(/\s+/g, ".") : d(t.parent()) + " " + t.prop("tagName").toLowerCase()),
        c = (t, e, i) => {
            const o = i.children(),
                s = o.length,
                n = e > -1 ? Math.max(0, Math.min(e - 1, s)) : Math.max(0, Math.min(s + e + 1, s));
            0 === n ? i.prepend(t) : o.eq(n - 1).after(t);
        },
        u = (t) => (-1 !== ["left", "right"].indexOf(t) ? "x" : "y"),
        p = (() => {
            const t = ((t) => {
                const e = ["Webkit", "Moz", "Ms", "O"],
                    o = (i.body || i.documentElement).style,
                    s = t.charAt(0).toUpperCase() + t.slice(1);
                if (void 0 !== o[t]) return t;
                for (let t = 0; t < e.length; t++)
                    if (void 0 !== o[e[t] + s]) return e[t] + s;
                return !1;
            })("transform");
            return (e, i, o) => {
                if (t)
                    if (0 === i) e.css(t, "");
                    else if ("x" === u(o)) {
                    const s = "left" === o ? i : -i;
                    e.css(t, s ? `translate3d(${s}px,0,0)` : "");
                } else {
                    const s = "top" === o ? i : -i;
                    e.css(t, s ? `translate3d(0,${s}px,0)` : "");
                } else e.css(o, i);
            };
        })(),
        h = (t, e, i) => {
            console.warn(
                "%cHC Off-canvas Nav:%c " + i + "%c '" + t + "'%c is now deprecated and will be removed. Use%c '" + e + "'%c instead.",
                "color: #fa253b",
                "color: default",
                "color: #5595c6",
                "color: default",
                "color: #5595c6",
                "color: default"
            );
        };
    let f = 0;
    t.fn.extend({
        hcOffcanvasNav: function (e = {}) {
            if (!this.length) return this;
            const m = this,
                g = t(i.body);
            e.side && (h("side", "position", "option"), (e.position = e.side));
            let v = t.extend({}, {
                        maxWidth: 1024,
                        pushContent: !1,
                        position: "left",
                        levelOpen: "overlap",
                        levelSpacing: 40,
                        levelTitles: !1,
                        navTitle: null,
                        navClass: "",
                        disableBody: !0,
                        closeOnClick: !0,
                        customToggle: null,
                        insertClose: !0,
                        insertBack: !0,
                        labelClose: "Close",
                        labelBack: "Back",
                    },
                    e
                ),
                y = [];
            const w = (t) => {
                if (!y.length) return !1;
                let e = !1;
                "string" == typeof t && (t = [t]);
                let i = t.length;
                for (let o = 0; o < i; o++) - 1 !== y.indexOf(t[o]) && (e = !0);
                return e;
            };
            return this.each(function () {
                const e = t(this);
                if (!e.find("ul").addBack("ul").length) return void console.error("%c! HC Offcanvas Nav:%c Menu must contain <ul> element.", "color: #fa253b", "color: default");
                f++;
                const h = "hc-nav-" + f,
                    b = ((e) => {
                        const i = t(`<style id="${e}">`).appendTo(t("head"));
                        let o = {},
                            s = {};
                        const n = (t) => (";" !== t.substr(-1) && (t += ";" !== t.substr(-1) ? ";" : ""), t);
                        return {
                            reset: () => {
                                (o = {}), (s = {});
                            },
                            add: (t, e, i) => {
                                (t = t.trim()), (e = e.trim()), i ? ((i = i.trim()), (s[i] = s[i] || {}), (s[i][t] = n(e))) : (o[t] = n(e));
                            },
                            remove: (t, e) => {
                                (t = t.trim()), e ? ((e = e.trim()), void 0 !== s[e][t] && delete s[e][t]) : void 0 !== o[t] && delete o[t];
                            },
                            insert: () => {
                                let t = "";
                                for (let e in s) {
                                    t += `@media screen and (${e}) {\n`;
                                    for (let i in s[e]) t += `${i} { ${s[e][i]} }\n`;
                                    t += "}\n";
                                }
                                for (let e in o) t += `${e} { ${o[e]} }\n`;
                                i.html(t);
                            },
                        };
                    })(`hc-offcanvas-${f}-style`);
                let k;
                e.addClass("hc-nav " + h);
                const S = t("<nav>").on("click", a),
                    x = t('<div class="nav-container">').appendTo(S);
                let C,
                    T,
                    _,
                    $ = null,
                    O = {},
                    M = !1,
                    E = 0,
                    z = 0,
                    j = 0,
                    I = null,
                    A = {};
                const P = [];
                v.customToggle ?
                    (k = t(v.customToggle)
                        .addClass("hc-nav-trigger " + h)
                        .on("click", B)) :
                    ((k = t(`<a class="hc-nav-trigger ${h}"><span></span></a>`).on("click", B)), e.after(k));
                const L = () => {
                        x.css("transition", "none"),
                            (z = x.outerWidth()),
                            (j = x.outerHeight()),
                            b.add(`.hc-offcanvas-nav.${h}.nav-position-left .nav-container`, `transform: translate3d(-${z}px, 0, 0)`),
                            b.add(`.hc-offcanvas-nav.${h}.nav-position-right .nav-container`, `transform: translate3d(${z}px, 0, 0)`),
                            b.add(`.hc-offcanvas-nav.${h}.nav-position-top .nav-container`, `transform: translate3d(0, -${j}px, 0)`),
                            b.add(`.hc-offcanvas-nav.${h}.nav-position-bottom .nav-container`, `transform: translate3d(0, ${j}px, 0)`),
                            b.insert(),
                            x.css("transition", ""),
                            H();
                    },
                    H = () => {
                        var t;
                        (C = x.css("transition-property").split(",")[0]),
                        (t = x.css("transition-duration").split(",")[0]),
                        (T = parseFloat(t) * (/\ds$/.test(t) ? 1e3 : 1)),
                        (_ = x.css("transition-timing-function").split(",")[0]),
                        v.pushContent && $ && C && b.add(d(v.pushContent), `transition: ${C} ${T}ms ${_}`),
                            b.insert();
                    },
                    D = (e) => {
                        const i = k.css("display"),
                            o = !!v.maxWidth && `max-width: ${v.maxWidth - 1}px`;
                        w("maxWidth") && b.reset(),
                            b.add(".hc-offcanvas-nav." + h, "display: block", o),
                            b.add(".hc-nav-trigger." + h, "display: " + (i && "none" !== i ? i : "block"), o),
                            b.add(".hc-nav." + h, "display: none", o),
                            b.add(`.hc-offcanvas-nav.${h}.nav-levels-overlap.nav-position-left li.level-open > .nav-wrapper`, `transform: translate3d(-${v.levelSpacing}px,0,0)`, o),
                            b.add(`.hc-offcanvas-nav.${h}.nav-levels-overlap.nav-position-right li.level-open > .nav-wrapper`, `transform: translate3d(${v.levelSpacing}px,0,0)`, o),
                            b.add(`.hc-offcanvas-nav.${h}.nav-levels-overlap.nav-position-top li.level-open > .nav-wrapper`, `transform: translate3d(0,-${v.levelSpacing}px,0)`, o),
                            b.add(`.hc-offcanvas-nav.${h}.nav-levels-overlap.nav-position-bottom li.level-open > .nav-wrapper`, `transform: translate3d(0,${v.levelSpacing}px,0)`, o),
                            b.insert(),
                            (!e || (e && w("pushContent"))) && ("string" == typeof v.pushContent ? (($ = t(v.pushContent)), $.length || ($ = null)) : ($ = v.pushContent instanceof jQuery ? v.pushContent : null)),
                            x.css("transition", "none");
                        const r = S.hasClass("nav-open"),
                            a = [
                                "hc-offcanvas-nav",
                                v.navClass || "",
                                h,
                                v.navClass || "",
                                "nav-levels-" + v.levelOpen || "none",
                                "nav-position-" + v.position,
                                v.disableBody ? "disable-body" : "",
                                s ? "is-ios" : "",
                                n ? "touch-device" : "",
                                r ? "nav-open" : "",
                            ].join(" ");
                        S.off("click").attr("class", "").addClass(a), v.disableBody && S.on("click", F), e ? L() : setTimeout(L, 1);
                    },
                    W = () => {
                        O = (function e(i) {
                            const o = [];
                            return (
                                i.each(function () {
                                    const i = t(this),
                                        s = {
                                            classes: i.attr("class"),
                                            items: []
                                        };
                                    i.children("li").each(function () {
                                            const i = t(this),
                                                o = i
                                                .children()
                                                .filter(function () {
                                                    const e = t(this);
                                                    return e.is(":not(ul)") && !e.find("ul").length;
                                                })
                                                .add(
                                                    i.contents().filter(function () {
                                                        return 3 === this.nodeType && this.nodeValue.trim();
                                                    })
                                                ),
                                                n = i.find("ul"),
                                                r = n.first().add(n.first().siblings("ul"));
                                            r.length && !i.data("hc-uniqid") && i.data("hc-uniqid", Math.random().toString(36).substr(2) + "-" + Math.random().toString(36).substr(2)),
                                                s.items.push({
                                                    uniqid: i.data("hc-uniqid"),
                                                    classes: i.attr("class"),
                                                    $content: o,
                                                    subnav: r.length ? e(r) : []
                                                });
                                        }),
                                        o.push(s);
                                }),
                                o
                            );
                        })(
                            (() => {
                                const t = e.find("ul").addBack("ul");
                                return t.first().add(t.first().siblings("ul"));
                            })()
                        );
                    },
                    N = (e) => {
                        e && (x.empty(), (A = {})),
                            (function e(i, o, s, n, d) {
                                const u = t(`<div class="nav-wrapper nav-wrapper-${s}">`).appendTo(o).on("click", a),
                                    p = t('<div class="nav-content">').appendTo(u);
                                n && p.prepend(`<h2>${n}</h2>`);
                                if (
                                    (t.each(i, (i, o) => {
                                            const n = t("<ul>").addClass(o.classes).appendTo(p);
                                            t.each(o.items, (i, o) => {
                                                const r = o.$content;
                                                let l = r.find("a").addBack("a");
                                                const d = l.length ? l.clone(!0, !0).addClass("nav-item") : t('<span class="nav-item">').append(r.clone(!0, !0)).on("click", a);
                                                l.length &&
                                                    d.on("click", (t) => {
                                                        t.stopPropagation(), l[0].click();
                                                    }),
                                                    "#" === d.attr("href") &&
                                                    d.on("click", (t) => {
                                                        t.preventDefault();
                                                    }),
                                                    v.closeOnClick &&
                                                    (!1 === v.levelOpen || "none" === v.levelOpen ?
                                                        d.filter("a").filter('[data-nav-close!="false"]').on("click", F) :
                                                        d
                                                        .filter("a")
                                                        .filter('[data-nav-close!="false"]')
                                                        .filter(function () {
                                                            const e = t(this);
                                                            return !o.subnav.length || (e.attr("href") && "#" !== e.attr("href").charAt(0));
                                                        })
                                                        .on("click", F));
                                                const c = t("<li>").addClass(o.classes).append(d);
                                                if ((n.append(c), v.levelSpacing && ("expand" === v.levelOpen || !1 === v.levelOpen || "none" === v.levelOpen))) {
                                                    const t = v.levelSpacing * s;
                                                    t && n.css("text-indent", t + "px");
                                                }
                                                if (o.subnav.length) {
                                                    const i = s + 1,
                                                        n = o.uniqid;
                                                    let l = "";
                                                    if ((A[i] || (A[i] = 0), c.addClass("nav-parent"), !1 !== v.levelOpen && "none" !== v.levelOpen)) {
                                                        const e = A[i],
                                                            o = t('<span class="nav-next">').appendTo(d),
                                                            s = t(`<label for="${h}-${i}-${e}">`).on("click", a),
                                                            p = t(`<input type="checkbox" id="${h}-${i}-${e}">`).attr("data-level", i).attr("data-index", e).val(n).on("click", a).on("change", q); -
                                                        1 !== P.indexOf(n) && (u.addClass("sub-level-open").on("click", () => R(i, e)), c.addClass("level-open"), p.prop("checked", !0)),
                                                            c.prepend(p),
                                                            (l = !0 === v.levelTitles ? r.text().trim() : ""),
                                                            d.attr("href") && "#" !== d.attr("href").charAt(0) ?
                                                            o.append(s) :
                                                            d.prepend(
                                                                s.on("click", function () {
                                                                    t(this).parent().trigger("click");
                                                                })
                                                            );
                                                    }
                                                    A[i]++, e(o.subnav, c, i, l, A[i] - 1);
                                                }
                                            });
                                        }),
                                        s && void 0 !== d && !1 !== v.insertBack && "overlap" === v.levelOpen)
                                ) {
                                    const e = p.children("ul");
                                    let i = t(`<li class="nav-back"><a href="#">${v.labelBack || ""}<span></span></a></li>`);
                                    i.children("a").on(
                                            "click",
                                            l(() => R(s, d))
                                        ),
                                        !0 === v.insertBack ? e.first().prepend(i) : r(v.insertBack) && c(i, v.insertBack, e);
                                }
                                if (0 === s && !1 !== v.insertClose) {
                                    const e = p.children("ul"),
                                        i = t(`<li class="nav-close"><a href="#">${v.labelClose || ""}<span></span></a></li>`);
                                    i.children("a").on("click", l(F)), !0 === v.insertClose ? e.first().prepend(i) : r(v.insertClose) && c(i, v.insertClose, e.first().add(e.first().siblings("ul")));
                                }
                            })(O, x, 0, v.navTitle);
                    };

                function q() {
                    const e = t(this),
                        i = Number(e.attr("data-level")),
                        o = Number(e.attr("data-index"));
                    e.prop("checked") ?
                        (function (e, i) {
                            const o = t(`#${h}-${e}-${i}`),
                                s = o.val(),
                                n = o.parent("li"),
                                r = n.closest(".nav-wrapper");
                            r.addClass("sub-level-open"), n.addClass("level-open"), -1 === P.indexOf(s) && P.push(s);
                            if ("overlap" === v.levelOpen && (r.on("click", () => R(e, i)), p(x, e * v.levelSpacing, v.position), $)) {
                                const t = "x" === u(v.position) ? z : j;
                                p($, t + e * v.levelSpacing, v.position);
                            }
                        })(i, o) :
                        R(i, o);
                }

                function Q() {
                    if (
                        ((M = !0),
                            S.css("visibility", "visible").addClass("nav-open"),
                            k.addClass("toggle-open"),
                            "expand" === v.levelOpen && I && clearTimeout(I),
                            v.disableBody && ((E = o.scrollTop() || g.scrollTop()), i.documentElement.scrollHeight > i.documentElement.clientHeight && o.addClass("hc-nav-yscroll"), g.addClass("hc-nav-open"), E && g.css("top", -E)),
                            $)
                    ) {
                        const t = "x" === u(v.position) ? z : j;
                        p($, t, v.position);
                    }
                    setTimeout(() => {
                        m.trigger("open", t.extend({}, v));
                    }, T + 1);
                }

                function F() {
                    (M = !1),
                    $ && p($, 0),
                        S.removeClass("nav-open"),
                        x.removeAttr("style"),
                        k.removeClass("toggle-open"),
                        "expand" === v.levelOpen && -1 !== ["top", "bottom"].indexOf(v.position) ?
                        R(0) :
                        !1 !== v.levelOpen &&
                        "none" !== v.levelOpen &&
                        (I = setTimeout(
                            () => {
                                R(0);
                            },
                            "expand" === v.levelOpen ? T : 0
                        )),
                        v.disableBody && (g.removeClass("hc-nav-open"), o.removeClass("hc-nav-yscroll"), E && (g.css("top", "").scrollTop(E), o.scrollTop(E), (E = 0))),
                        setTimeout(() => {
                            S.css("visibility", ""), m.trigger("close.$", t.extend({}, v)), m.trigger("close.once", t.extend({}, v)).off("close.once");
                        }, T + 1);
                }

                function B(t) {
                    t.preventDefault(), t.stopPropagation(), M ? F() : Q();
                }
                D(), W(), N(), g.append(S);
                const U = (e, i, o) => {
                    const s = t(`#${h}-${e}-${i}`),
                        n = s.val(),
                        r = s.parent("li"),
                        l = r.closest(".nav-wrapper");
                    if (
                        (s.prop("checked", !1),
                            l.removeClass("sub-level-open"),
                            r.removeClass("level-open"),
                            -1 !== P.indexOf(n) && P.splice(P.indexOf(n), 1),
                            o && "overlap" === v.levelOpen && (l.off("click").on("click", a), p(x, (e - 1) * v.levelSpacing, v.position), $))
                    ) {
                        const t = "x" === u(v.position) ? z : j;
                        p($, t + (e - 1) * v.levelSpacing, v.position);
                    }
                };

                function R(t, e) {
                    for (let i = t; i <= Object.keys(A).length; i++)
                        if (i == t && void 0 !== e) U(t, e, !0);
                        else
                            for (let e = 0; e < A[i]; e++) U(i, e, i == t);
                }
                (m.settings = (t) => (t ? v[t] : Object.assign({}, v))),
                (m.isOpen = () => S.hasClass("nav-open")),
                (m.open = Q),
                (m.close = F),
                (m.update = (e, i) => {
                    if (((y = []), "object" == typeof e)) {
                        for (let t in e) v[t] !== e[t] && y.push(t);
                        (v = t.extend({}, v, e)), D(!0), N(!0);
                    }
                    (!0 === e || i) && (D(!0), W(), N(!0));
                });
            });
        },
    });
})(jQuery, "undefined" != typeof window ? window : this),

// bxSlider
(function (t) {
    var e = {
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
        wrapperClass: "bx-wrapper",
        touchEnabled: !0,
        swipeThreshold: 50,
        oneToOneTouch: !0,
        preventDefaultSwipeX: !0,
        preventDefaultSwipeY: !1,
        ariaLive: !0,
        ariaHidden: !0,
        keyboardEnabled: !1,
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
        stopAutoOnClick: !1,
        autoHover: !1,
        autoDelay: 0,
        autoSlideForOnePage: !1,
        minSlides: 1,
        maxSlides: 1,
        moveSlides: 0,
        slideWidth: 0,
        shrinkItems: !1,
        onSliderLoad: function () {
            return !0;
        },
        onSlideBefore: function () {
            return !0;
        },
        onSlideAfter: function () {
            return !0;
        },
        onSlideNext: function () {
            return !0;
        },
        onSlidePrev: function () {
            return !0;
        },
        onSliderResize: function () {
            return !0;
        },
    };
    t.fn.bxSlider = function (o) {
        if (0 === this.length) return this;
        if (this.length > 1)
            return (
                this.each(function () {
                    t(this).bxSlider(o);
                }),
                this
            );
        var s = {},
            n = this,
            r = t(window).width(),
            a = t(window).height();
        if (!t(n).data("bxSlider")) {
            var l = function () {
                    t(n).data("bxSlider") ||
                        ((s.settings = t.extend({}, e, o)),
                            (s.settings.slideWidth = parseInt(s.settings.slideWidth)),
                            (s.children = n.children(s.settings.slideSelector)),
                            s.children.length < s.settings.minSlides && (s.settings.minSlides = s.children.length),
                            s.children.length < s.settings.maxSlides && (s.settings.maxSlides = s.children.length),
                            s.settings.randomStart && (s.settings.startSlide = Math.floor(Math.random() * s.children.length)),
                            (s.active = {
                                index: s.settings.startSlide
                            }),
                            (s.carousel = s.settings.minSlides > 1 || s.settings.maxSlides > 1),
                            s.carousel && (s.settings.preloadImages = "all"),
                            (s.minThreshold = s.settings.minSlides * s.settings.slideWidth + (s.settings.minSlides - 1) * s.settings.slideMargin),
                            (s.maxThreshold = s.settings.maxSlides * s.settings.slideWidth + (s.settings.maxSlides - 1) * s.settings.slideMargin),
                            (s.working = !1),
                            (s.controls = {}),
                            (s.interval = null),
                            (s.animProp = "vertical" === s.settings.mode ? "top" : "left"),
                            (s.usingCSS =
                                s.settings.useCSS &&
                                "fade" !== s.settings.mode &&
                                (function () {
                                    for (var t = document.createElement("div"), e = ["WebkitPerspective", "MozPerspective", "OPerspective", "msPerspective"], i = 0; i < e.length; i++)
                                        if (void 0 !== t.style[e[i]]) return (s.cssPrefix = e[i].replace("Perspective", "").toLowerCase()), (s.animProp = "-" + s.cssPrefix + "-transform"), !0;
                                    return !1;
                                })()),
                            "vertical" === s.settings.mode && (s.settings.maxSlides = s.settings.minSlides),
                            n.data("origStyle", n.attr("style")),
                            n.children(s.settings.slideSelector).each(function () {
                                t(this).data("origStyle", t(this).attr("style"));
                            }),
                            d());
                },
                d = function () {
                    var e = s.children.eq(s.settings.startSlide);
                    n.wrap('<div class="' + s.settings.wrapperClass + '"><div class="bx-viewport"></div></div>'),
                        (s.viewport = n.parent()),
                        s.settings.ariaLive && !s.settings.ticker && s.viewport.attr("aria-live", "polite"),
                        (s.loader = t('<div class="bx-loading" />')),
                        s.viewport.prepend(s.loader),
                        n.css({
                            width: "horizontal" === s.settings.mode ? 1e3 * s.children.length + 215 + "%" : "auto",
                            position: "relative"
                        }),
                        s.usingCSS && s.settings.easing ? n.css("-" + s.cssPrefix + "-transition-timing-function", s.settings.easing) : s.settings.easing || (s.settings.easing = "swing"),
                        s.viewport.css({
                            width: "100%",
                            overflow: "hidden",
                            position: "relative"
                        }),
                        s.viewport.parent().css({
                            maxWidth: h()
                        }),
                        s.children.css({
                            float: "horizontal" === s.settings.mode ? "left" : "none",
                            listStyle: "none",
                            position: "relative"
                        }),
                        s.children.css("width", f()),
                        "horizontal" === s.settings.mode && s.settings.slideMargin > 0 && s.children.css("marginRight", s.settings.slideMargin),
                        "vertical" === s.settings.mode && s.settings.slideMargin > 0 && s.children.css("marginBottom", s.settings.slideMargin),
                        "fade" === s.settings.mode && (s.children.css({
                            position: "absolute",
                            zIndex: 0,
                            display: "none"
                        }), s.children.eq(s.settings.startSlide).css({
                            zIndex: s.settings.slideZIndex,
                            display: "block"
                        })),
                        (s.controls.el = t('<div class="bx-controls" />')),
                        s.settings.captions && C(),
                        (s.active.last = s.settings.startSlide === g() - 1),
                        s.settings.video && n.fitVids(),
                        ("all" === s.settings.preloadImages || s.settings.ticker) && (e = s.children),
                        s.settings.ticker ?
                        (s.settings.pager = !1) :
                        (s.settings.controls && S(),
                            s.settings.auto && s.settings.autoControls && x(),
                            s.settings.pager && k(),
                            (s.settings.controls || s.settings.autoControls || s.settings.pager) && s.viewport.after(s.controls.el)),
                        c(e, u);
                },
                c = function (e, i) {
                    var o = e.find('img:not([src=""]), iframe').length,
                        s = 0;
                    return 0 === o ?
                        void i() :
                        void e.find('img:not([src=""]), iframe').each(function () {
                            t(this)
                                .one("load error", function () {
                                    ++s === o && i();
                                })
                                .each(function () {
                                    this.complete && t(this).trigger("load");
                                });
                        });
                },
                u = function () {
                    if (s.settings.infiniteLoop && "fade" !== s.settings.mode && !s.settings.ticker) {
                        var e = "vertical" === s.settings.mode ? s.settings.minSlides : s.settings.maxSlides,
                            i = s.children.slice(0, e).clone(!0).addClass("bx-clone"),
                            o = s.children.slice(-e).clone(!0).addClass("bx-clone");
                        s.settings.ariaHidden && (i.attr("aria-hidden", !0), o.attr("aria-hidden", !0)), n.append(i).prepend(o);
                    }
                    s.loader.remove(),
                        y(),
                        "vertical" === s.settings.mode && (s.settings.adaptiveHeight = !0),
                        s.viewport.height(p()),
                        n.redrawSlider(),
                        s.settings.onSliderLoad.call(n, s.active.index),
                        (s.initialized = !0),
                        s.settings.responsive && t(window).bind("resize", B),
                        s.settings.auto && s.settings.autoStart && (g() > 1 || s.settings.autoSlideForOnePage) && A(),
                        s.settings.ticker && P(),
                        s.settings.pager && E(s.settings.startSlide),
                        s.settings.controls && I(),
                        s.settings.touchEnabled && !s.settings.ticker && W(),
                        s.settings.keyboardEnabled && !s.settings.ticker && t(document).keydown(D);
                },
                p = function () {
                    var e = 0,
                        o = t();
                    if ("vertical" === s.settings.mode || s.settings.adaptiveHeight)
                        if (s.carousel) {
                            var n = 1 === s.settings.moveSlides ? s.active.index : s.active.index * v();
                            for (o = s.children.eq(n), i = 1; i <= s.settings.maxSlides - 1; i++) o = n + i >= s.children.length ? o.add(s.children.eq(i - 1)) : o.add(s.children.eq(n + i));
                        } else o = s.children.eq(s.active.index);
                    else o = s.children;
                    return (
                        "vertical" === s.settings.mode ?
                        (o.each(function (i) {
                                e += t(this).outerHeight();
                            }),
                            s.settings.slideMargin > 0 && (e += s.settings.slideMargin * (s.settings.minSlides - 1))) :
                        (e = Math.max.apply(
                            Math,
                            o
                            .map(function () {
                                return t(this).outerHeight(!1);
                            })
                            .get()
                        )),
                        "border-box" === s.viewport.css("box-sizing") ?
                        (e += parseFloat(s.viewport.css("padding-top")) + parseFloat(s.viewport.css("padding-bottom")) + parseFloat(s.viewport.css("border-top-width")) + parseFloat(s.viewport.css("border-bottom-width"))) :
                        "padding-box" === s.viewport.css("box-sizing") && (e += parseFloat(s.viewport.css("padding-top")) + parseFloat(s.viewport.css("padding-bottom"))),
                        e
                    );
                },
                h = function () {
                    var t = "100%";
                    return s.settings.slideWidth > 0 && (t = "horizontal" === s.settings.mode ? s.settings.maxSlides * s.settings.slideWidth + (s.settings.maxSlides - 1) * s.settings.slideMargin : s.settings.slideWidth), t;
                },
                f = function () {
                    var t = s.settings.slideWidth,
                        e = s.viewport.width();
                    if (0 === s.settings.slideWidth || (s.settings.slideWidth > e && !s.carousel) || "vertical" === s.settings.mode) t = e;
                    else if (s.settings.maxSlides > 1 && "horizontal" === s.settings.mode) {
                        if (e > s.maxThreshold) return t;
                        e < s.minThreshold ?
                            (t = (e - s.settings.slideMargin * (s.settings.minSlides - 1)) / s.settings.minSlides) :
                            s.settings.shrinkItems && (t = Math.floor((e + s.settings.slideMargin) / Math.ceil((e + s.settings.slideMargin) / (t + s.settings.slideMargin)) - s.settings.slideMargin));
                    }
                    return t;
                },
                m = function () {
                    var t = 1,
                        e = null;
                    return (
                        "horizontal" === s.settings.mode && s.settings.slideWidth > 0 ?
                        s.viewport.width() < s.minThreshold ?
                        (t = s.settings.minSlides) :
                        s.viewport.width() > s.maxThreshold ?
                        (t = s.settings.maxSlides) :
                        ((e = s.children.first().width() + s.settings.slideMargin), (t = Math.floor((s.viewport.width() + s.settings.slideMargin) / e))) :
                        "vertical" === s.settings.mode && (t = s.settings.minSlides),
                        t
                    );
                },
                g = function () {
                    var t = 0,
                        e = 0,
                        i = 0;
                    if (s.settings.moveSlides > 0)
                        if (s.settings.infiniteLoop) t = Math.ceil(s.children.length / v());
                        else
                            for (; e < s.children.length;) ++t, (e = i + m()), (i += s.settings.moveSlides <= m() ? s.settings.moveSlides : m());
                    else t = Math.ceil(s.children.length / m());
                    return t;
                },
                v = function () {
                    return s.settings.moveSlides > 0 && s.settings.moveSlides <= m() ? s.settings.moveSlides : m();
                },
                y = function () {
                    var t, e, i;
                    s.children.length > s.settings.maxSlides && s.active.last && !s.settings.infiniteLoop ?
                        "horizontal" === s.settings.mode ?
                        ((t = (e = s.children.last()).position()), w(-(t.left - (s.viewport.width() - e.outerWidth())), "reset", 0)) :
                        "vertical" === s.settings.mode && ((i = s.children.length - s.settings.minSlides), (t = s.children.eq(i).position()), w(-t.top, "reset", 0)) :
                        ((t = s.children.eq(s.active.index * v()).position()),
                            s.active.index === g() - 1 && (s.active.last = !0),
                            void 0 !== t && ("horizontal" === s.settings.mode ? w(-t.left, "reset", 0) : "vertical" === s.settings.mode && w(-t.top, "reset", 0)));
                },
                w = function (e, i, o, r) {
                    var a, l;
                    s.usingCSS ?
                        ((l = "vertical" === s.settings.mode ? "translate3d(0, " + e + "px, 0)" : "translate3d(" + e + "px, 0, 0)"),
                            n.css("-" + s.cssPrefix + "-transition-duration", o / 1e3 + "s"),
                            "slide" === i ?
                            (n.css(s.animProp, l),
                                0 !== o ?
                                n.bind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", function (e) {
                                    t(e.target).is(n) && (n.unbind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd"), z());
                                }) :
                                z()) :
                            "reset" === i ?
                            n.css(s.animProp, l) :
                            "ticker" === i &&
                            (n.css("-" + s.cssPrefix + "-transition-timing-function", "linear"),
                                n.css(s.animProp, l),
                                0 !== o ?
                                n.bind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", function (e) {
                                    t(e.target).is(n) && (n.unbind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd"), w(r.resetValue, "reset", 0), L());
                                }) :
                                (w(r.resetValue, "reset", 0), L()))) :
                        (((a = {})[s.animProp] = e),
                            "slide" === i ?
                            n.animate(a, o, s.settings.easing, function () {
                                z();
                            }) :
                            "reset" === i ?
                            n.css(s.animProp, e) :
                            "ticker" === i &&
                            n.animate(a, o, "linear", function () {
                                w(r.resetValue, "reset", 0), L();
                            }));
                },
                b = function () {
                    for (var e = "", i = "", o = g(), n = 0; n < o; n++)
                        (i = ""),
                        (s.settings.buildPager && t.isFunction(s.settings.buildPager)) || s.settings.pagerCustom ?
                        ((i = s.settings.buildPager(n)), s.pagerEl.addClass("bx-custom-pager")) :
                        ((i = n + 1), s.pagerEl.addClass("bx-default-pager")),
                        (e += '<div class="bx-pager-item"><a href="" data-slide-index="' + n + '" class="bx-pager-link">' + i + "</a></div>");
                    s.pagerEl.html(e);
                },
                k = function () {
                    s.settings.pagerCustom ?
                        (s.pagerEl = t(s.settings.pagerCustom)) :
                        ((s.pagerEl = t('<div class="bx-pager" />')), s.settings.pagerSelector ? t(s.settings.pagerSelector).html(s.pagerEl) : s.controls.el.addClass("bx-has-pager").append(s.pagerEl), b()),
                        s.pagerEl.on("click touchend", "a", M);
                },
                S = function () {
                    (s.controls.next = t('<a class="bx-next" href="">' + s.settings.nextText + "</a>")),
                    (s.controls.prev = t('<a class="bx-prev" href="">' + s.settings.prevText + "</a>")),
                    s.controls.next.bind("click touchend", T),
                        s.controls.prev.bind("click touchend", _),
                        s.settings.nextSelector && t(s.settings.nextSelector).append(s.controls.next),
                        s.settings.prevSelector && t(s.settings.prevSelector).append(s.controls.prev),
                        s.settings.nextSelector ||
                        s.settings.prevSelector ||
                        ((s.controls.directionEl = t('<div class="bx-controls-direction" />')),
                            s.controls.directionEl.append(s.controls.prev).append(s.controls.next),
                            s.controls.el.addClass("bx-has-controls-direction").append(s.controls.directionEl));
                },
                x = function () {
                    (s.controls.start = t('<div class="bx-controls-auto-item"><a class="bx-start" href="">' + s.settings.startText + "</a></div>")),
                    (s.controls.stop = t('<div class="bx-controls-auto-item"><a class="bx-stop" href="">' + s.settings.stopText + "</a></div>")),
                    (s.controls.autoEl = t('<div class="bx-controls-auto" />')),
                    s.controls.autoEl.on("click", ".bx-start", $),
                        s.controls.autoEl.on("click", ".bx-stop", O),
                        s.settings.autoControlsCombine ? s.controls.autoEl.append(s.controls.start) : s.controls.autoEl.append(s.controls.start).append(s.controls.stop),
                        s.settings.autoControlsSelector ? t(s.settings.autoControlsSelector).html(s.controls.autoEl) : s.controls.el.addClass("bx-has-controls-auto").append(s.controls.autoEl),
                        j(s.settings.autoStart ? "stop" : "start");
                },
                C = function () {
                    s.children.each(function (e) {
                        var i = t(this).find("img:first").attr("title");
                        void 0 !== i && ("" + i).length && t(this).append('<div class="bx-caption"><span>' + i + "</span></div>");
                    });
                },
                T = function (t) {
                    t.preventDefault(), s.controls.el.hasClass("disabled") || (s.settings.auto && s.settings.stopAutoOnClick && n.stopAuto(), n.goToNextSlide());
                },
                _ = function (t) {
                    t.preventDefault(), s.controls.el.hasClass("disabled") || (s.settings.auto && s.settings.stopAutoOnClick && n.stopAuto(), n.goToPrevSlide());
                },
                $ = function (t) {
                    n.startAuto(), t.preventDefault();
                },
                O = function (t) {
                    n.stopAuto(), t.preventDefault();
                },
                M = function (e) {
                    var i, o;
                    e.preventDefault(),
                        s.controls.el.hasClass("disabled") ||
                        (s.settings.auto && s.settings.stopAutoOnClick && n.stopAuto(),
                            void 0 !== (i = t(e.currentTarget)).attr("data-slide-index") && (o = parseInt(i.attr("data-slide-index"))) !== s.active.index && n.goToSlide(o));
                },
                E = function (e) {
                    var i = s.children.length;
                    return "short" === s.settings.pagerType ?
                        (s.settings.maxSlides > 1 && (i = Math.ceil(s.children.length / s.settings.maxSlides)), void s.pagerEl.html(e + 1 + s.settings.pagerShortSeparator + i)) :
                        (s.pagerEl.find("a").removeClass("active"),
                            void s.pagerEl.each(function (i, o) {
                                t(o).find("a").eq(e).addClass("active");
                            }));
                },
                z = function () {
                    if (s.settings.infiniteLoop) {
                        var t = "";
                        0 === s.active.index ?
                            (t = s.children.eq(0).position()) :
                            s.active.index === g() - 1 && s.carousel ?
                            (t = s.children.eq((g() - 1) * v()).position()) :
                            s.active.index === s.children.length - 1 && (t = s.children.eq(s.children.length - 1).position()),
                            t && ("horizontal" === s.settings.mode ? w(-t.left, "reset", 0) : "vertical" === s.settings.mode && w(-t.top, "reset", 0));
                    }
                    (s.working = !1), s.settings.onSlideAfter.call(n, s.children.eq(s.active.index), s.oldIndex, s.active.index);
                },
                j = function (t) {
                    s.settings.autoControlsCombine ? s.controls.autoEl.html(s.controls[t]) : (s.controls.autoEl.find("a").removeClass("active"), s.controls.autoEl.find("a:not(.bx-" + t + ")").addClass("active"));
                },
                I = function () {
                    1 === g() ?
                        (s.controls.prev.addClass("disabled"), s.controls.next.addClass("disabled")) :
                        !s.settings.infiniteLoop &&
                        s.settings.hideControlOnEnd &&
                        (0 === s.active.index ?
                            (s.controls.prev.addClass("disabled"), s.controls.next.removeClass("disabled")) :
                            s.active.index === g() - 1 ?
                            (s.controls.next.addClass("disabled"), s.controls.prev.removeClass("disabled")) :
                            (s.controls.prev.removeClass("disabled"), s.controls.next.removeClass("disabled")));
                },
                A = function () {
                    s.settings.autoDelay > 0 ?
                        setTimeout(n.startAuto, s.settings.autoDelay) :
                        (n.startAuto(),
                            t(window)
                            .focus(function () {
                                n.startAuto();
                            })
                            .blur(function () {
                                n.stopAuto();
                            })),
                        s.settings.autoHover &&
                        n.hover(
                            function () {
                                s.interval && (n.stopAuto(!0), (s.autoPaused = !0));
                            },
                            function () {
                                s.autoPaused && (n.startAuto(!0), (s.autoPaused = null));
                            }
                        );
                },
                P = function () {
                    var e,
                        i,
                        o,
                        r,
                        a,
                        l,
                        d,
                        c,
                        u = 0;
                    "next" === s.settings.autoDirection ?
                        n.append(s.children.clone().addClass("bx-clone")) :
                        (n.prepend(s.children.clone().addClass("bx-clone")), (e = s.children.first().position()), (u = "horizontal" === s.settings.mode ? -e.left : -e.top)),
                        w(u, "reset", 0),
                        (s.settings.pager = !1),
                        (s.settings.controls = !1),
                        (s.settings.autoControls = !1),
                        s.settings.tickerHover &&
                        (s.usingCSS ?
                            ((r = "horizontal" === s.settings.mode ? 4 : 5),
                                s.viewport.hover(
                                    function () {
                                        (i = n.css("-" + s.cssPrefix + "-transform")), (o = parseFloat(i.split(",")[r])), w(o, "reset", 0);
                                    },
                                    function () {
                                        (c = 0),
                                        s.children.each(function (e) {
                                                c += "horizontal" === s.settings.mode ? t(this).outerWidth(!0) : t(this).outerHeight(!0);
                                            }),
                                            (a = s.settings.speed / c),
                                            (l = "horizontal" === s.settings.mode ? "left" : "top"),
                                            (d = a * (c - Math.abs(parseInt(o)))),
                                            L(d);
                                    }
                                )) :
                            s.viewport.hover(
                                function () {
                                    n.stop();
                                },
                                function () {
                                    (c = 0),
                                    s.children.each(function (e) {
                                            c += "horizontal" === s.settings.mode ? t(this).outerWidth(!0) : t(this).outerHeight(!0);
                                        }),
                                        (a = s.settings.speed / c),
                                        (l = "horizontal" === s.settings.mode ? "left" : "top"),
                                        (d = a * (c - Math.abs(parseInt(n.css(l))))),
                                        L(d);
                                }
                            )),
                        L();
                },
                L = function (t) {
                    var e,
                        i,
                        o = t || s.settings.speed,
                        r = {
                            left: 0,
                            top: 0
                        },
                        a = {
                            left: 0,
                            top: 0
                        };
                    "next" === s.settings.autoDirection ? (r = n.find(".bx-clone").first().position()) : (a = s.children.first().position()),
                        (e = "horizontal" === s.settings.mode ? -r.left : -r.top),
                        (i = "horizontal" === s.settings.mode ? -a.left : -a.top),
                        w(e, "ticker", o, {
                            resetValue: i
                        });
                },
                H = function (e) {
                    var i = t(window),
                        o = {
                            top: i.scrollTop(),
                            left: i.scrollLeft()
                        },
                        s = e.offset();
                    return (
                        (o.right = o.left + i.width()),
                        (o.bottom = o.top + i.height()),
                        (s.right = s.left + e.outerWidth()),
                        (s.bottom = s.top + e.outerHeight()),
                        !(o.right < s.left || o.left > s.right || o.bottom < s.top || o.top > s.bottom)
                    );
                },
                D = function (t) {
                    var e = document.activeElement.tagName.toLowerCase();
                    if (null == new RegExp(e, ["i"]).exec("input|textarea") && H(n)) {
                        if (39 === t.keyCode) return T(t), !1;
                        if (37 === t.keyCode) return _(t), !1;
                    }
                },
                W = function () {
                    (s.touch = {
                        start: {
                            x: 0,
                            y: 0
                        },
                        end: {
                            x: 0,
                            y: 0
                        }
                    }),
                    s.viewport.bind("touchstart MSPointerDown pointerdown", N),
                        s.viewport.on("click", ".bxslider a", function (t) {
                            s.viewport.hasClass("click-disabled") && (t.preventDefault(), s.viewport.removeClass("click-disabled"));
                        });
                },
                N = function (t) {
                    if ((s.controls.el.addClass("disabled"), s.working)) t.preventDefault(), s.controls.el.removeClass("disabled");
                    else {
                        s.touch.originalPos = n.position();
                        var e = t.originalEvent,
                            i = void 0 !== e.changedTouches ? e.changedTouches : [e];
                        (s.touch.start.x = i[0].pageX),
                        (s.touch.start.y = i[0].pageY),
                        s.viewport.get(0).setPointerCapture && ((s.pointerId = e.pointerId), s.viewport.get(0).setPointerCapture(s.pointerId)),
                            s.viewport.bind("touchmove MSPointerMove pointermove", Q),
                            s.viewport.bind("touchend MSPointerUp pointerup", F),
                            s.viewport.bind("MSPointerCancel pointercancel", q);
                    }
                },
                q = function (t) {
                    w(s.touch.originalPos.left, "reset", 0),
                        s.controls.el.removeClass("disabled"),
                        s.viewport.unbind("MSPointerCancel pointercancel", q),
                        s.viewport.unbind("touchmove MSPointerMove pointermove", Q),
                        s.viewport.unbind("touchend MSPointerUp pointerup", F),
                        s.viewport.get(0).releasePointerCapture && s.viewport.get(0).releasePointerCapture(s.pointerId);
                },
                Q = function (t) {
                    var e = t.originalEvent,
                        i = void 0 !== e.changedTouches ? e.changedTouches : [e],
                        o = Math.abs(i[0].pageX - s.touch.start.x),
                        n = Math.abs(i[0].pageY - s.touch.start.y),
                        r = 0,
                        a = 0;
                    ((3 * o > n && s.settings.preventDefaultSwipeX) || (3 * n > o && s.settings.preventDefaultSwipeY)) && t.preventDefault(),
                        "fade" !== s.settings.mode &&
                        s.settings.oneToOneTouch &&
                        ("horizontal" === s.settings.mode ? ((a = i[0].pageX - s.touch.start.x), (r = s.touch.originalPos.left + a)) : ((a = i[0].pageY - s.touch.start.y), (r = s.touch.originalPos.top + a)), w(r, "reset", 0));
                },
                F = function (t) {
                    s.viewport.unbind("touchmove MSPointerMove pointermove", Q), s.controls.el.removeClass("disabled");
                    var e = t.originalEvent,
                        i = void 0 !== e.changedTouches ? e.changedTouches : [e],
                        o = 0,
                        r = 0;
                    (s.touch.end.x = i[0].pageX),
                    (s.touch.end.y = i[0].pageY),
                    "fade" === s.settings.mode ?
                        (r = Math.abs(s.touch.start.x - s.touch.end.x)) >= s.settings.swipeThreshold && (s.touch.start.x > s.touch.end.x ? n.goToNextSlide() : n.goToPrevSlide(), n.stopAuto()) :
                        ("horizontal" === s.settings.mode ? ((r = s.touch.end.x - s.touch.start.x), (o = s.touch.originalPos.left)) : ((r = s.touch.end.y - s.touch.start.y), (o = s.touch.originalPos.top)),
                            !s.settings.infiniteLoop && ((0 === s.active.index && r > 0) || (s.active.last && r < 0)) ?
                            w(o, "reset", 200) :
                            Math.abs(r) >= s.settings.swipeThreshold ?
                            (r < 0 ? n.goToNextSlide() : n.goToPrevSlide(), n.stopAuto()) :
                            w(o, "reset", 200)),
                        s.viewport.unbind("touchend MSPointerUp pointerup", F),
                        s.viewport.get(0).releasePointerCapture && s.viewport.get(0).releasePointerCapture(s.pointerId);
                },
                B = function (e) {
                    if (s.initialized)
                        if (s.working) window.setTimeout(B, 10);
                        else {
                            var i = t(window).width(),
                                o = t(window).height();
                            (r === i && a === o) || ((r = i), (a = o), n.redrawSlider(), s.settings.onSliderResize.call(n, s.active.index));
                        }
                },
                U = function (t) {
                    var e = m();
                    s.settings.ariaHidden && !s.settings.ticker && (s.children.attr("aria-hidden", "true"), s.children.slice(t, t + e).attr("aria-hidden", "false"));
                };
            return (
                (n.goToSlide = function (e, i) {
                    var o,
                        r,
                        a,
                        l,
                        d = !0,
                        c = 0,
                        u = {
                            left: 0,
                            top: 0
                        },
                        h = null;
                    if (
                        ((s.oldIndex = s.active.index),
                            (s.active.index = (function (t) {
                                return t < 0 ? (s.settings.infiniteLoop ? g() - 1 : s.active.index) : t >= g() ? (s.settings.infiniteLoop ? 0 : s.active.index) : t;
                            })(e)),
                            !s.working && s.active.index !== s.oldIndex)
                    ) {
                        if (((s.working = !0), void 0 !== (d = s.settings.onSlideBefore.call(n, s.children.eq(s.active.index), s.oldIndex, s.active.index)) && !d)) return (s.active.index = s.oldIndex), void(s.working = !1);
                        "next" === i
                            ?
                            s.settings.onSlideNext.call(n, s.children.eq(s.active.index), s.oldIndex, s.active.index) || (d = !1) :
                            "prev" === i && (s.settings.onSlidePrev.call(n, s.children.eq(s.active.index), s.oldIndex, s.active.index) || (d = !1)),
                            (s.active.last = s.active.index >= g() - 1),
                            (s.settings.pager || s.settings.pagerCustom) && E(s.active.index),
                            s.settings.controls && I(),
                            "fade" === s.settings.mode ?
                            (s.settings.adaptiveHeight && s.viewport.height() !== p() && s.viewport.animate({
                                    height: p()
                                }, s.settings.adaptiveHeightSpeed),
                                s.children.filter(":visible").fadeOut(s.settings.speed).css({
                                    zIndex: 0
                                }),
                                s.children
                                .eq(s.active.index)
                                .css("zIndex", s.settings.slideZIndex + 1)
                                .fadeIn(s.settings.speed, function () {
                                    t(this).css("zIndex", s.settings.slideZIndex), z();
                                })) :
                            (s.settings.adaptiveHeight && s.viewport.height() !== p() && s.viewport.animate({
                                    height: p()
                                }, s.settings.adaptiveHeightSpeed),
                                !s.settings.infiniteLoop && s.carousel && s.active.last ?
                                "horizontal" === s.settings.mode ?
                                ((u = (h = s.children.eq(s.children.length - 1)).position()), (c = s.viewport.width() - h.outerWidth())) :
                                ((o = s.children.length - s.settings.minSlides), (u = s.children.eq(o).position())) :
                                s.carousel && s.active.last && "prev" === i ?
                                ((r = 1 === s.settings.moveSlides ? s.settings.maxSlides - v() : (g() - 1) * v() - (s.children.length - s.settings.maxSlides)), (u = (h = n.children(".bx-clone").eq(r)).position())) :
                                "next" === i && 0 === s.active.index ?
                                ((u = n.find("> .bx-clone").eq(s.settings.maxSlides).position()), (s.active.last = !1)) :
                                e >= 0 && ((l = e * parseInt(v())), (u = s.children.eq(l).position())),
                                void 0 !== u ? ((a = "horizontal" === s.settings.mode ? -(u.left - c) : -u.top), w(a, "slide", s.settings.speed)) : (s.working = !1)),
                            s.settings.ariaHidden && U(s.active.index * v());
                    }
                }),
                (n.goToNextSlide = function () {
                    if (s.settings.infiniteLoop || !s.active.last) {
                        var t = parseInt(s.active.index) + 1;
                        n.goToSlide(t, "next");
                    }
                }),
                (n.goToPrevSlide = function () {
                    if (s.settings.infiniteLoop || 0 !== s.active.index) {
                        var t = parseInt(s.active.index) - 1;
                        n.goToSlide(t, "prev");
                    }
                }),
                (n.startAuto = function (t) {
                    s.interval ||
                        ((s.interval = setInterval(function () {
                                "next" === s.settings.autoDirection ? n.goToNextSlide() : n.goToPrevSlide();
                            }, s.settings.pause)),
                            s.settings.autoControls && !0 !== t && j("stop"));
                }),
                (n.stopAuto = function (t) {
                    s.interval && (clearInterval(s.interval), (s.interval = null), s.settings.autoControls && !0 !== t && j("start"));
                }),
                (n.getCurrentSlide = function () {
                    return s.active.index;
                }),
                (n.getCurrentSlideElement = function () {
                    return s.children.eq(s.active.index);
                }),
                (n.getSlideElement = function (t) {
                    return s.children.eq(t);
                }),
                (n.getSlideCount = function () {
                    return s.children.length;
                }),
                (n.isWorking = function () {
                    return s.working;
                }),
                (n.redrawSlider = function () {
                    s.children.add(n.find(".bx-clone")).outerWidth(f()),
                        s.viewport.css("height", p()),
                        s.settings.ticker || y(),
                        s.active.last && (s.active.index = g() - 1),
                        s.active.index >= g() && (s.active.last = !0),
                        s.settings.pager && !s.settings.pagerCustom && (b(), E(s.active.index)),
                        s.settings.ariaHidden && U(s.active.index * v());
                }),
                (n.destroySlider = function () {
                    s.initialized &&
                        ((s.initialized = !1),
                            t(".bx-clone", this).remove(),
                            s.children.each(function () {
                                void 0 !== t(this).data("origStyle") ? t(this).attr("style", t(this).data("origStyle")) : t(this).removeAttr("style");
                            }),
                            void 0 !== t(this).data("origStyle") ? this.attr("style", t(this).data("origStyle")) : t(this).removeAttr("style"),
                            t(this).unwrap().unwrap(),
                            s.controls.el && s.controls.el.remove(),
                            s.controls.next && s.controls.next.remove(),
                            s.controls.prev && s.controls.prev.remove(),
                            s.pagerEl && s.settings.controls && !s.settings.pagerCustom && s.pagerEl.remove(),
                            t(".bx-caption", this).remove(),
                            s.controls.autoEl && s.controls.autoEl.remove(),
                            clearInterval(s.interval),
                            s.settings.responsive && t(window).unbind("resize", B),
                            s.settings.keyboardEnabled && t(document).unbind("keydown", D),
                            t(this).removeData("bxSlider"));
                }),
                (n.reloadSlider = function (e) {
                    void 0 !== e && (o = e), n.destroySlider(), l(), t(n).data("bxSlider", this);
                }),
                l(),
                t(n).data("bxSlider", this),
                this
            );
        }
    };
})(jQuery),

// Slick slider
!(function (i) {
    "use strict";
    "function" == typeof define && define.amd ? define(["jquery"], i) : "undefined" != typeof exports ? (module.exports = i(require("jquery"))) : i(jQuery);
})(function (i) {
    "use strict";
    var e = window.Slick || {};
    ((e = (function () {
        var e = 0;
        return function (t, o) {
            var s,
                n = this;
            (n.defaults = {
                accessibility: !0,
                adaptiveHeight: !1,
                appendArrows: i(t),
                appendDots: i(t),
                arrows: !0,
                asNavFor: null,
                prevArrow: '<button class="slick-prev" aria-label="Previous" type="button">Previous</button>',
                nextArrow: '<button class="slick-next" aria-label="Next" type="button">Next</button>',
                autoplay: !1,
                autoplaySpeed: 3e3,
                centerMode: !1,
                centerPadding: "50px",
                cssEase: "ease",
                customPaging: function (e, t) {
                    return i('<button type="button" />').text(t + 1);
                },
                dots: !1,
                dotsClass: "slick-dots",
                draggable: !0,
                easing: "linear",
                edgeFriction: 0.35,
                fade: !1,
                focusOnSelect: !1,
                focusOnChange: !1,
                infinite: !0,
                initialSlide: 0,
                lazyLoad: "ondemand",
                mobileFirst: !1,
                pauseOnHover: !0,
                pauseOnFocus: !0,
                pauseOnDotsHover: !1,
                respondTo: "window",
                responsive: null,
                rows: 1,
                rtl: !1,
                slide: "",
                slidesPerRow: 1,
                slidesToShow: 1,
                slidesToScroll: 1,
                speed: 500,
                swipe: !0,
                swipeToSlide: !1,
                touchMove: !0,
                touchThreshold: 5,
                useCSS: !0,
                useTransform: !0,
                variableWidth: !1,
                vertical: !1,
                verticalSwiping: !1,
                waitForAnimate: !0,
                zIndex: 1e3,
            }),
            (n.initials = {
                animating: !1,
                dragging: !1,
                autoPlayTimer: null,
                currentDirection: 0,
                currentLeft: null,
                currentSlide: 0,
                direction: 1,
                $dots: null,
                listWidth: null,
                listHeight: null,
                loadIndex: 0,
                $nextArrow: null,
                $prevArrow: null,
                scrolling: !1,
                slideCount: null,
                slideWidth: null,
                $slideTrack: null,
                $slides: null,
                sliding: !1,
                slideOffset: 0,
                swipeLeft: null,
                swiping: !1,
                $list: null,
                touchObject: {},
                transformsEnabled: !1,
                unslicked: !1,
            }),
            i.extend(n, n.initials),
                (n.activeBreakpoint = null),
                (n.animType = null),
                (n.animProp = null),
                (n.breakpoints = []),
                (n.breakpointSettings = []),
                (n.cssTransitions = !1),
                (n.focussed = !1),
                (n.interrupted = !1),
                (n.hidden = "hidden"),
                (n.paused = !0),
                (n.positionProp = null),
                (n.respondTo = null),
                (n.rowCount = 1),
                (n.shouldClick = !0),
                (n.$slider = i(t)),
                (n.$slidesCache = null),
                (n.transformType = null),
                (n.transitionType = null),
                (n.visibilityChange = "visibilitychange"),
                (n.windowWidth = 0),
                (n.windowTimer = null),
                (s = i(t).data("slick") || {}),
                (n.options = i.extend({}, n.defaults, o, s)),
                (n.currentSlide = n.options.initialSlide),
                (n.originalSettings = n.options),
                void 0 !== document.mozHidden ? ((n.hidden = "mozHidden"), (n.visibilityChange = "mozvisibilitychange")) : void 0 !== document.webkitHidden && ((n.hidden = "webkitHidden"), (n.visibilityChange = "webkitvisibilitychange")),
                (n.autoPlay = i.proxy(n.autoPlay, n)),
                (n.autoPlayClear = i.proxy(n.autoPlayClear, n)),
                (n.autoPlayIterator = i.proxy(n.autoPlayIterator, n)),
                (n.changeSlide = i.proxy(n.changeSlide, n)),
                (n.clickHandler = i.proxy(n.clickHandler, n)),
                (n.selectHandler = i.proxy(n.selectHandler, n)),
                (n.setPosition = i.proxy(n.setPosition, n)),
                (n.swipeHandler = i.proxy(n.swipeHandler, n)),
                (n.dragHandler = i.proxy(n.dragHandler, n)),
                (n.keyHandler = i.proxy(n.keyHandler, n)),
                (n.instanceUid = e++),
                (n.htmlExpr = /^(?:\s*(<[\w\W]+>)[^>]*)$/),
                n.registerBreakpoints(),
                n.init(!0);
        };
    })()).prototype.activateADA = function () {
        this.$slideTrack.find(".slick-active").attr({
            "aria-hidden": "false"
        }).find("a, input, button, select").attr({
            tabindex: "0"
        });
    }),
    (e.prototype.addSlide = e.prototype.slickAdd = function (e, t, o) {
        var s = this;
        if ("boolean" == typeof t)(o = t), (t = null);
        else if (t < 0 || t >= s.slideCount) return !1;
        s.unload(),
            "number" == typeof t ?
            0 === t && 0 === s.$slides.length ?
            i(e).appendTo(s.$slideTrack) :
            o ?
            i(e).insertBefore(s.$slides.eq(t)) :
            i(e).insertAfter(s.$slides.eq(t)) :
            !0 === o ?
            i(e).prependTo(s.$slideTrack) :
            i(e).appendTo(s.$slideTrack),
            (s.$slides = s.$slideTrack.children(this.options.slide)),
            s.$slideTrack.children(this.options.slide).detach(),
            s.$slideTrack.append(s.$slides),
            s.$slides.each(function (e, t) {
                i(t).attr("data-slick-index", e);
            }),
            (s.$slidesCache = s.$slides),
            s.reinit();
    }),
    (e.prototype.animateHeight = function () {
        var i = this;
        if (1 === i.options.slidesToShow && !0 === i.options.adaptiveHeight && !1 === i.options.vertical) {
            var e = i.$slides.eq(i.currentSlide).outerHeight(!0);
            i.$list.animate({
                height: e
            }, i.options.speed);
        }
    }),
    (e.prototype.animateSlide = function (e, t) {
        var o = {},
            s = this;
        s.animateHeight(),
            !0 === s.options.rtl && !1 === s.options.vertical && (e = -e),
            !1 === s.transformsEnabled ?
            !1 === s.options.vertical ?
            s.$slideTrack.animate({
                left: e
            }, s.options.speed, s.options.easing, t) :
            s.$slideTrack.animate({
                top: e
            }, s.options.speed, s.options.easing, t) :
            !1 === s.cssTransitions ?
            (!0 === s.options.rtl && (s.currentLeft = -s.currentLeft),
                i({
                    animStart: s.currentLeft
                }).animate({
                    animStart: e
                }, {
                    duration: s.options.speed,
                    easing: s.options.easing,
                    step: function (i) {
                        (i = Math.ceil(i)), !1 === s.options.vertical ? ((o[s.animType] = "translate(" + i + "px, 0px)"), s.$slideTrack.css(o)) : ((o[s.animType] = "translate(0px," + i + "px)"), s.$slideTrack.css(o));
                    },
                    complete: function () {
                        t && t.call();
                    },
                })) :
            (s.applyTransition(),
                (e = Math.ceil(e)),
                !1 === s.options.vertical ? (o[s.animType] = "translate3d(" + e + "px, 0px, 0px)") : (o[s.animType] = "translate3d(0px," + e + "px, 0px)"),
                s.$slideTrack.css(o),
                t &&
                setTimeout(function () {
                    s.disableTransition(), t.call();
                }, s.options.speed));
    }),
    (e.prototype.getNavTarget = function () {
        var e = this.options.asNavFor;
        return e && null !== e && (e = i(e).not(this.$slider)), e;
    }),
    (e.prototype.asNavFor = function (e) {
        var t = this.getNavTarget();
        null !== t &&
            "object" == typeof t &&
            t.each(function () {
                var t = i(this).slick("getSlick");
                t.unslicked || t.slideHandler(e, !0);
            });
    }),
    (e.prototype.applyTransition = function (i) {
        var e = this,
            t = {};
        !1 === e.options.fade ? (t[e.transitionType] = e.transformType + " " + e.options.speed + "ms " + e.options.cssEase) : (t[e.transitionType] = "opacity " + e.options.speed + "ms " + e.options.cssEase),
            !1 === e.options.fade ? e.$slideTrack.css(t) : e.$slides.eq(i).css(t);
    }),
    (e.prototype.autoPlay = function () {
        var i = this;
        i.autoPlayClear(), i.slideCount > i.options.slidesToShow && (i.autoPlayTimer = setInterval(i.autoPlayIterator, i.options.autoplaySpeed));
    }),
    (e.prototype.autoPlayClear = function () {
        this.autoPlayTimer && clearInterval(this.autoPlayTimer);
    }),
    (e.prototype.autoPlayIterator = function () {
        var i = this,
            e = i.currentSlide + i.options.slidesToScroll;
        i.paused ||
            i.interrupted ||
            i.focussed ||
            (!1 === i.options.infinite &&
                (1 === i.direction && i.currentSlide + 1 === i.slideCount - 1 ? (i.direction = 0) : 0 === i.direction && ((e = i.currentSlide - i.options.slidesToScroll), i.currentSlide - 1 == 0 && (i.direction = 1))),
                i.slideHandler(e));
    }),
    (e.prototype.buildArrows = function () {
        var e = this;
        !0 === e.options.arrows &&
            ((e.$prevArrow = i(e.options.prevArrow).addClass("slick-arrow")),
                (e.$nextArrow = i(e.options.nextArrow).addClass("slick-arrow")),
                e.slideCount > e.options.slidesToShow ?
                (e.$prevArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"),
                    e.$nextArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"),
                    e.htmlExpr.test(e.options.prevArrow) && e.$prevArrow.prependTo(e.options.appendArrows),
                    e.htmlExpr.test(e.options.nextArrow) && e.$nextArrow.appendTo(e.options.appendArrows),
                    !0 !== e.options.infinite && e.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true")) :
                e.$prevArrow.add(e.$nextArrow).addClass("slick-hidden").attr({
                    "aria-disabled": "true",
                    tabindex: "-1"
                }));
    }),
    (e.prototype.buildDots = function () {
        var e,
            t,
            o = this;
        if (!0 === o.options.dots) {
            for (o.$slider.addClass("slick-dotted"), t = i("<ul />").addClass(o.options.dotsClass), e = 0; e <= o.getDotCount(); e += 1) t.append(i("<li />").append(o.options.customPaging.call(this, o, e)));
            (o.$dots = t.appendTo(o.options.appendDots)), o.$dots.find("li").first().addClass("slick-active");
        }
    }),
    (e.prototype.buildOut = function () {
        var e = this;
        (e.$slides = e.$slider.children(e.options.slide + ":not(.slick-cloned)").addClass("slick-slide")),
        (e.slideCount = e.$slides.length),
        e.$slides.each(function (e, t) {
                i(t)
                    .attr("data-slick-index", e)
                    .data("originalStyling", i(t).attr("style") || "");
            }),
            e.$slider.addClass("slick-slider"),
            (e.$slideTrack = 0 === e.slideCount ? i('<div class="slick-track"/>').appendTo(e.$slider) : e.$slides.wrapAll('<div class="slick-track"/>').parent()),
            (e.$list = e.$slideTrack.wrap('<div class="slick-list"/>').parent()),
            e.$slideTrack.css("opacity", 0),
            (!0 !== e.options.centerMode && !0 !== e.options.swipeToSlide) || (e.options.slidesToScroll = 1),
            i("img[data-lazy]", e.$slider).not("[src]").addClass("slick-loading"),
            e.setupInfinite(),
            e.buildArrows(),
            e.buildDots(),
            e.updateDots(),
            e.setSlideClasses("number" == typeof e.currentSlide ? e.currentSlide : 0),
            !0 === e.options.draggable && e.$list.addClass("draggable");
    }),
    (e.prototype.buildRows = function () {
        var i,
            e,
            t,
            o,
            s,
            n,
            r,
            l = this;
        if (((o = document.createDocumentFragment()), (n = l.$slider.children()), l.options.rows > 1)) {
            for (r = l.options.slidesPerRow * l.options.rows, s = Math.ceil(n.length / r), i = 0; i < s; i++) {
                var d = document.createElement("div");
                for (e = 0; e < l.options.rows; e++) {
                    var a = document.createElement("div");
                    for (t = 0; t < l.options.slidesPerRow; t++) {
                        var c = i * r + (e * l.options.slidesPerRow + t);
                        n.get(c) && a.appendChild(n.get(c));
                    }
                    d.appendChild(a);
                }
                o.appendChild(d);
            }
            l.$slider.empty().append(o),
                l.$slider
                .children()
                .children()
                .children()
                .css({
                    width: 100 / l.options.slidesPerRow + "%",
                    display: "inline-block"
                });
        }
    }),
    (e.prototype.checkResponsive = function (e, t) {
        var o,
            s,
            n,
            r = this,
            l = !1,
            d = r.$slider.width(),
            a = window.innerWidth || i(window).width();
        if (("window" === r.respondTo ? (n = a) : "slider" === r.respondTo ? (n = d) : "min" === r.respondTo && (n = Math.min(a, d)), r.options.responsive && r.options.responsive.length && null !== r.options.responsive)) {
            for (o in ((s = null), r.breakpoints)) r.breakpoints.hasOwnProperty(o) && (!1 === r.originalSettings.mobileFirst ? n < r.breakpoints[o] && (s = r.breakpoints[o]) : n > r.breakpoints[o] && (s = r.breakpoints[o]));
            null !== s ?
                null !== r.activeBreakpoint ?
                (s !== r.activeBreakpoint || t) &&
                ((r.activeBreakpoint = s),
                    "unslick" === r.breakpointSettings[s] ? r.unslick(s) : ((r.options = i.extend({}, r.originalSettings, r.breakpointSettings[s])), !0 === e && (r.currentSlide = r.options.initialSlide), r.refresh(e)),
                    (l = s)) :
                ((r.activeBreakpoint = s),
                    "unslick" === r.breakpointSettings[s] ? r.unslick(s) : ((r.options = i.extend({}, r.originalSettings, r.breakpointSettings[s])), !0 === e && (r.currentSlide = r.options.initialSlide), r.refresh(e)),
                    (l = s)) :
                null !== r.activeBreakpoint && ((r.activeBreakpoint = null), (r.options = r.originalSettings), !0 === e && (r.currentSlide = r.options.initialSlide), r.refresh(e), (l = s)),
                e || !1 === l || r.$slider.trigger("breakpoint", [r, l]);
        }
    }),
    (e.prototype.changeSlide = function (e, t) {
        var o,
            s,
            n = this,
            r = i(e.currentTarget);
        switch ((r.is("a") && e.preventDefault(), r.is("li") || (r = r.closest("li")), (o = n.slideCount % n.options.slidesToScroll != 0 ? 0 : (n.slideCount - n.currentSlide) % n.options.slidesToScroll), e.data.message)) {
            case "previous":
                (s = 0 === o ? n.options.slidesToScroll : n.options.slidesToShow - o), n.slideCount > n.options.slidesToShow && n.slideHandler(n.currentSlide - s, !1, t);
                break;
            case "next":
                (s = 0 === o ? n.options.slidesToScroll : o), n.slideCount > n.options.slidesToShow && n.slideHandler(n.currentSlide + s, !1, t);
                break;
            case "index":
                var l = 0 === e.data.index ? 0 : e.data.index || r.index() * n.options.slidesToScroll;
                n.slideHandler(n.checkNavigable(l), !1, t), r.children().trigger("focus");
                break;
            default:
                return;
        }
    }),
    (e.prototype.checkNavigable = function (i) {
        var e, t;
        if (((t = 0), i > (e = this.getNavigableIndexes())[e.length - 1])) i = e[e.length - 1];
        else
            for (var o in e) {
                if (i < e[o]) {
                    i = t;
                    break;
                }
                t = e[o];
            }
        return i;
    }),
    (e.prototype.cleanUpEvents = function () {
        var e = this;
        e.options.dots &&
            null !== e.$dots &&
            (i("li", e.$dots).off("click.slick", e.changeSlide).off("mouseenter.slick", i.proxy(e.interrupt, e, !0)).off("mouseleave.slick", i.proxy(e.interrupt, e, !1)),
                !0 === e.options.accessibility && e.$dots.off("keydown.slick", e.keyHandler)),
            e.$slider.off("focus.slick blur.slick"),
            !0 === e.options.arrows &&
            e.slideCount > e.options.slidesToShow &&
            (e.$prevArrow && e.$prevArrow.off("click.slick", e.changeSlide),
                e.$nextArrow && e.$nextArrow.off("click.slick", e.changeSlide),
                !0 === e.options.accessibility && (e.$prevArrow && e.$prevArrow.off("keydown.slick", e.keyHandler), e.$nextArrow && e.$nextArrow.off("keydown.slick", e.keyHandler))),
            e.$list.off("touchstart.slick mousedown.slick", e.swipeHandler),
            e.$list.off("touchmove.slick mousemove.slick", e.swipeHandler),
            e.$list.off("touchend.slick mouseup.slick", e.swipeHandler),
            e.$list.off("touchcancel.slick mouseleave.slick", e.swipeHandler),
            e.$list.off("click.slick", e.clickHandler),
            i(document).off(e.visibilityChange, e.visibility),
            e.cleanUpSlideEvents(),
            !0 === e.options.accessibility && e.$list.off("keydown.slick", e.keyHandler),
            !0 === e.options.focusOnSelect && i(e.$slideTrack).children().off("click.slick", e.selectHandler),
            i(window).off("orientationchange.slick.slick-" + e.instanceUid, e.orientationChange),
            i(window).off("resize.slick.slick-" + e.instanceUid, e.resize),
            i("[draggable!=true]", e.$slideTrack).off("dragstart", e.preventDefault),
            i(window).off("load.slick.slick-" + e.instanceUid, e.setPosition);
    }),
    (e.prototype.cleanUpSlideEvents = function () {
        var e = this;
        e.$list.off("mouseenter.slick", i.proxy(e.interrupt, e, !0)), e.$list.off("mouseleave.slick", i.proxy(e.interrupt, e, !1));
    }),
    (e.prototype.cleanUpRows = function () {
        var i,
            e = this;
        e.options.rows > 1 && ((i = e.$slides.children().children()).removeAttr("style"), e.$slider.empty().append(i));
    }),
    (e.prototype.clickHandler = function (i) {
        !1 === this.shouldClick && (i.stopImmediatePropagation(), i.stopPropagation(), i.preventDefault());
    }),
    (e.prototype.destroy = function (e) {
        var t = this;
        t.autoPlayClear(),
            (t.touchObject = {}),
            t.cleanUpEvents(),
            i(".slick-cloned", t.$slider).detach(),
            t.$dots && t.$dots.remove(),
            t.$prevArrow &&
            t.$prevArrow.length &&
            (t.$prevArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""), t.htmlExpr.test(t.options.prevArrow) && t.$prevArrow.remove()),
            t.$nextArrow &&
            t.$nextArrow.length &&
            (t.$nextArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""), t.htmlExpr.test(t.options.nextArrow) && t.$nextArrow.remove()),
            t.$slides &&
            (t.$slides
                .removeClass("slick-slide slick-active slick-center slick-visible slick-current")
                .removeAttr("aria-hidden")
                .removeAttr("data-slick-index")
                .each(function () {
                    i(this).attr("style", i(this).data("originalStyling"));
                }),
                t.$slideTrack.children(this.options.slide).detach(),
                t.$slideTrack.detach(),
                t.$list.detach(),
                t.$slider.append(t.$slides)),
            t.cleanUpRows(),
            t.$slider.removeClass("slick-slider"),
            t.$slider.removeClass("slick-initialized"),
            t.$slider.removeClass("slick-dotted"),
            (t.unslicked = !0),
            e || t.$slider.trigger("destroy", [t]);
    }),
    (e.prototype.disableTransition = function (i) {
        var e = this,
            t = {};
        (t[e.transitionType] = ""), !1 === e.options.fade ? e.$slideTrack.css(t) : e.$slides.eq(i).css(t);
    }),
    (e.prototype.fadeSlide = function (i, e) {
        var t = this;
        !1 === t.cssTransitions ?
            (t.$slides.eq(i).css({
                zIndex: t.options.zIndex
            }), t.$slides.eq(i).animate({
                opacity: 1
            }, t.options.speed, t.options.easing, e)) :
            (t.applyTransition(i),
                t.$slides.eq(i).css({
                    opacity: 1,
                    zIndex: t.options.zIndex
                }),
                e &&
                setTimeout(function () {
                    t.disableTransition(i), e.call();
                }, t.options.speed));
    }),
    (e.prototype.fadeSlideOut = function (i) {
        var e = this;
        !1 === e.cssTransitions ? e.$slides.eq(i).animate({
            opacity: 0,
            zIndex: e.options.zIndex - 2
        }, e.options.speed, e.options.easing) : (e.applyTransition(i), e.$slides.eq(i).css({
            opacity: 0,
            zIndex: e.options.zIndex - 2
        }));
    }),
    (e.prototype.filterSlides = e.prototype.slickFilter = function (i) {
        var e = this;
        null !== i && ((e.$slidesCache = e.$slides), e.unload(), e.$slideTrack.children(this.options.slide).detach(), e.$slidesCache.filter(i).appendTo(e.$slideTrack), e.reinit());
    }),
    (e.prototype.focusHandler = function () {
        var e = this;
        e.$slider.off("focus.slick blur.slick").on("focus.slick blur.slick", "*", function (t) {
            t.stopImmediatePropagation();
            var o = i(this);
            setTimeout(function () {
                e.options.pauseOnFocus && ((e.focussed = o.is(":focus")), e.autoPlay());
            }, 0);
        });
    }),
    (e.prototype.getCurrent = e.prototype.slickCurrentSlide = function () {
        return this.currentSlide;
    }),
    (e.prototype.getDotCount = function () {
        var i = this,
            e = 0,
            t = 0,
            o = 0;
        if (!0 === i.options.infinite)
            if (i.slideCount <= i.options.slidesToShow) ++o;
            else
                for (; e < i.slideCount;) ++o, (e = t + i.options.slidesToScroll), (t += i.options.slidesToScroll <= i.options.slidesToShow ? i.options.slidesToScroll : i.options.slidesToShow);
        else if (!0 === i.options.centerMode) o = i.slideCount;
        else if (i.options.asNavFor)
            for (; e < i.slideCount;) ++o, (e = t + i.options.slidesToScroll), (t += i.options.slidesToScroll <= i.options.slidesToShow ? i.options.slidesToScroll : i.options.slidesToShow);
        else o = 1 + Math.ceil((i.slideCount - i.options.slidesToShow) / i.options.slidesToScroll);
        return o - 1;
    }),
    (e.prototype.getLeft = function (i) {
        var e,
            t,
            o,
            s,
            n = this,
            r = 0;
        return (
            (n.slideOffset = 0),
            (t = n.$slides.first().outerHeight(!0)),
            !0 === n.options.infinite ?
            (n.slideCount > n.options.slidesToShow &&
                ((n.slideOffset = n.slideWidth * n.options.slidesToShow * -1),
                    (s = -1),
                    !0 === n.options.vertical && !0 === n.options.centerMode && (2 === n.options.slidesToShow ? (s = -1.5) : 1 === n.options.slidesToShow && (s = -2)),
                    (r = t * n.options.slidesToShow * s)),
                n.slideCount % n.options.slidesToScroll != 0 &&
                i + n.options.slidesToScroll > n.slideCount &&
                n.slideCount > n.options.slidesToShow &&
                (i > n.slideCount ?
                    ((n.slideOffset = (n.options.slidesToShow - (i - n.slideCount)) * n.slideWidth * -1), (r = (n.options.slidesToShow - (i - n.slideCount)) * t * -1)) :
                    ((n.slideOffset = (n.slideCount % n.options.slidesToScroll) * n.slideWidth * -1), (r = (n.slideCount % n.options.slidesToScroll) * t * -1)))) :
            i + n.options.slidesToShow > n.slideCount && ((n.slideOffset = (i + n.options.slidesToShow - n.slideCount) * n.slideWidth), (r = (i + n.options.slidesToShow - n.slideCount) * t)),
            n.slideCount <= n.options.slidesToShow && ((n.slideOffset = 0), (r = 0)),
            !0 === n.options.centerMode && n.slideCount <= n.options.slidesToShow ?
            (n.slideOffset = (n.slideWidth * Math.floor(n.options.slidesToShow)) / 2 - (n.slideWidth * n.slideCount) / 2) :
            !0 === n.options.centerMode && !0 === n.options.infinite ?
            (n.slideOffset += n.slideWidth * Math.floor(n.options.slidesToShow / 2) - n.slideWidth) :
            !0 === n.options.centerMode && ((n.slideOffset = 0), (n.slideOffset += n.slideWidth * Math.floor(n.options.slidesToShow / 2))),
            (e = !1 === n.options.vertical ? i * n.slideWidth * -1 + n.slideOffset : i * t * -1 + r),
            !0 === n.options.variableWidth &&
            ((o = n.slideCount <= n.options.slidesToShow || !1 === n.options.infinite ? n.$slideTrack.children(".slick-slide").eq(i) : n.$slideTrack.children(".slick-slide").eq(i + n.options.slidesToShow)),
                (e = !0 === n.options.rtl ? (o[0] ? -1 * (n.$slideTrack.width() - o[0].offsetLeft - o.width()) : 0) : o[0] ? -1 * o[0].offsetLeft : 0),
                !0 === n.options.centerMode &&
                ((o = n.slideCount <= n.options.slidesToShow || !1 === n.options.infinite ? n.$slideTrack.children(".slick-slide").eq(i) : n.$slideTrack.children(".slick-slide").eq(i + n.options.slidesToShow + 1)),
                    (e = !0 === n.options.rtl ? (o[0] ? -1 * (n.$slideTrack.width() - o[0].offsetLeft - o.width()) : 0) : o[0] ? -1 * o[0].offsetLeft : 0),
                    (e += (n.$list.width() - o.outerWidth()) / 2))),
            e
        );
    }),
    (e.prototype.getOption = e.prototype.slickGetOption = function (i) {
        return this.options[i];
    }),
    (e.prototype.getNavigableIndexes = function () {
        var i,
            e = this,
            t = 0,
            o = 0,
            s = [];
        for (!1 === e.options.infinite ? (i = e.slideCount) : ((t = -1 * e.options.slidesToScroll), (o = -1 * e.options.slidesToScroll), (i = 2 * e.slideCount)); t < i;)
            s.push(t), (t = o + e.options.slidesToScroll), (o += e.options.slidesToScroll <= e.options.slidesToShow ? e.options.slidesToScroll : e.options.slidesToShow);
        return s;
    }),
    (e.prototype.getSlick = function () {
        return this;
    }),
    (e.prototype.getSlideCount = function () {
        var e,
            t,
            o = this;
        return (
            (t = !0 === o.options.centerMode ? o.slideWidth * Math.floor(o.options.slidesToShow / 2) : 0),
            !0 === o.options.swipeToSlide ?
            (o.$slideTrack.find(".slick-slide").each(function (s, n) {
                    if (n.offsetLeft - t + i(n).outerWidth() / 2 > -1 * o.swipeLeft) return (e = n), !1;
                }),
                Math.abs(i(e).attr("data-slick-index") - o.currentSlide) || 1) :
            o.options.slidesToScroll
        );
    }),
    (e.prototype.goTo = e.prototype.slickGoTo = function (i, e) {
        this.changeSlide({
            data: {
                message: "index",
                index: parseInt(i)
            }
        }, e);
    }),
    (e.prototype.init = function (e) {
        var t = this;
        i(t.$slider).hasClass("slick-initialized") ||
            (i(t.$slider).addClass("slick-initialized"), t.buildRows(), t.buildOut(), t.setProps(), t.startLoad(), t.loadSlider(), t.initializeEvents(), t.updateArrows(), t.updateDots(), t.checkResponsive(!0), t.focusHandler()),
            e && t.$slider.trigger("init", [t]),
            !0 === t.options.accessibility && t.initADA(),
            t.options.autoplay && ((t.paused = !1), t.autoPlay());
    }),
    (e.prototype.initADA = function () {
        var e = this,
            t = Math.ceil(e.slideCount / e.options.slidesToShow),
            o = e.getNavigableIndexes().filter(function (i) {
                return i >= 0 && i < e.slideCount;
            });
        e.$slides.add(e.$slideTrack.find(".slick-cloned")).attr({
                "aria-hidden": "true",
                tabindex: "-1"
            }).find("a, input, button, select").attr({
                tabindex: "-1"
            }),
            null !== e.$dots &&
            (e.$slides.not(e.$slideTrack.find(".slick-cloned")).each(function (t) {
                    var s = o.indexOf(t);
                    i(this).attr({
                        role: "tabpanel",
                        id: "slick-slide" + e.instanceUid + t,
                        tabindex: -1
                    }), -1 !== s && i(this).attr({
                        "aria-describedby": "slick-slide-control" + e.instanceUid + s
                    });
                }),
                e.$dots
                .attr("role", "tablist")
                .find("li")
                .each(function (s) {
                    var n = o[s];
                    i(this).attr({
                            role: "presentation"
                        }),
                        i(this)
                        .find("button")
                        .first()
                        .attr({
                            role: "tab",
                            id: "slick-slide-control" + e.instanceUid + s,
                            "aria-controls": "slick-slide" + e.instanceUid + n,
                            "aria-label": s + 1 + " of " + t,
                            "aria-selected": null,
                            tabindex: "-1"
                        });
                })
                .eq(e.currentSlide)
                .find("button")
                .attr({
                    "aria-selected": "true",
                    tabindex: "0"
                })
                .end());
        for (var s = e.currentSlide, n = s + e.options.slidesToShow; s < n; s++) e.$slides.eq(s).attr("tabindex", 0);
        e.activateADA();
    }),
    (e.prototype.initArrowEvents = function () {
        var i = this;
        !0 === i.options.arrows &&
            i.slideCount > i.options.slidesToShow &&
            (i.$prevArrow.off("click.slick").on("click.slick", {
                    message: "previous"
                }, i.changeSlide),
                i.$nextArrow.off("click.slick").on("click.slick", {
                    message: "next"
                }, i.changeSlide),
                !0 === i.options.accessibility && (i.$prevArrow.on("keydown.slick", i.keyHandler), i.$nextArrow.on("keydown.slick", i.keyHandler)));
    }),
    (e.prototype.initDotEvents = function () {
        var e = this;
        !0 === e.options.dots && (i("li", e.$dots).on("click.slick", {
                message: "index"
            }, e.changeSlide), !0 === e.options.accessibility && e.$dots.on("keydown.slick", e.keyHandler)),
            !0 === e.options.dots && !0 === e.options.pauseOnDotsHover && i("li", e.$dots).on("mouseenter.slick", i.proxy(e.interrupt, e, !0)).on("mouseleave.slick", i.proxy(e.interrupt, e, !1));
    }),
    (e.prototype.initSlideEvents = function () {
        var e = this;
        e.options.pauseOnHover && (e.$list.on("mouseenter.slick", i.proxy(e.interrupt, e, !0)), e.$list.on("mouseleave.slick", i.proxy(e.interrupt, e, !1)));
    }),
    (e.prototype.initializeEvents = function () {
        var e = this;
        e.initArrowEvents(),
            e.initDotEvents(),
            e.initSlideEvents(),
            e.$list.on("touchstart.slick mousedown.slick", {
                action: "start"
            }, e.swipeHandler),
            e.$list.on("touchmove.slick mousemove.slick", {
                action: "move"
            }, e.swipeHandler),
            e.$list.on("touchend.slick mouseup.slick", {
                action: "end"
            }, e.swipeHandler),
            e.$list.on("touchcancel.slick mouseleave.slick", {
                action: "end"
            }, e.swipeHandler),
            e.$list.on("click.slick", e.clickHandler),
            i(document).on(e.visibilityChange, i.proxy(e.visibility, e)),
            !0 === e.options.accessibility && e.$list.on("keydown.slick", e.keyHandler),
            !0 === e.options.focusOnSelect && i(e.$slideTrack).children().on("click.slick", e.selectHandler),
            i(window).on("orientationchange.slick.slick-" + e.instanceUid, i.proxy(e.orientationChange, e)),
            i(window).on("resize.slick.slick-" + e.instanceUid, i.proxy(e.resize, e)),
            i("[draggable!=true]", e.$slideTrack).on("dragstart", e.preventDefault),
            i(window).on("load.slick.slick-" + e.instanceUid, e.setPosition),
            i(e.setPosition);
    }),
    (e.prototype.initUI = function () {
        var i = this;
        !0 === i.options.arrows && i.slideCount > i.options.slidesToShow && (i.$prevArrow.show(), i.$nextArrow.show()), !0 === i.options.dots && i.slideCount > i.options.slidesToShow && i.$dots.show();
    }),
    (e.prototype.keyHandler = function (i) {
        var e = this;
        i.target.tagName.match("TEXTAREA|INPUT|SELECT") ||
            (37 === i.keyCode && !0 === e.options.accessibility ?
                e.changeSlide({
                    data: {
                        message: !0 === e.options.rtl ? "next" : "previous"
                    }
                }) :
                39 === i.keyCode && !0 === e.options.accessibility && e.changeSlide({
                    data: {
                        message: !0 === e.options.rtl ? "previous" : "next"
                    }
                }));
    }),
    (e.prototype.lazyLoad = function () {
        function e(e) {
            i("img[data-lazy]", e).each(function () {
                var e = i(this),
                    t = i(this).attr("data-lazy"),
                    o = i(this).attr("data-srcset"),
                    s = i(this).attr("data-sizes") || n.$slider.attr("data-sizes"),
                    r = document.createElement("img");
                (r.onload = function () {
                    e.animate({
                        opacity: 0
                    }, 100, function () {
                        o && (e.attr("srcset", o), s && e.attr("sizes", s)),
                            e.attr("src", t).animate({
                                opacity: 1
                            }, 200, function () {
                                e.removeAttr("data-lazy data-srcset data-sizes").removeClass("slick-loading");
                            }),
                            n.$slider.trigger("lazyLoaded", [n, e, t]);
                    });
                }),
                (r.onerror = function () {
                    e.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"), n.$slider.trigger("lazyLoadError", [n, e, t]);
                }),
                (r.src = t);
            });
        }
        var t,
            o,
            s,
            n = this;
        if (
            (!0 === n.options.centerMode ?
                !0 === n.options.infinite ?
                (s = (o = n.currentSlide + (n.options.slidesToShow / 2 + 1)) + n.options.slidesToShow + 2) :
                ((o = Math.max(0, n.currentSlide - (n.options.slidesToShow / 2 + 1))), (s = n.options.slidesToShow / 2 + 1 + 2 + n.currentSlide)) :
                ((o = n.options.infinite ? n.options.slidesToShow + n.currentSlide : n.currentSlide), (s = Math.ceil(o + n.options.slidesToShow)), !0 === n.options.fade && (o > 0 && o--, s <= n.slideCount && s++)),
                (t = n.$slider.find(".slick-slide").slice(o, s)),
                "anticipated" === n.options.lazyLoad)
        )
            for (var r = o - 1, l = s, d = n.$slider.find(".slick-slide"), a = 0; a < n.options.slidesToScroll; a++) r < 0 && (r = n.slideCount - 1), (t = (t = t.add(d.eq(r))).add(d.eq(l))), r--, l++;
        e(t),
            n.slideCount <= n.options.slidesToShow ?
            e(n.$slider.find(".slick-slide")) :
            n.currentSlide >= n.slideCount - n.options.slidesToShow ?
            e(n.$slider.find(".slick-cloned").slice(0, n.options.slidesToShow)) :
            0 === n.currentSlide && e(n.$slider.find(".slick-cloned").slice(-1 * n.options.slidesToShow));
    }),
    (e.prototype.loadSlider = function () {
        var i = this;
        i.setPosition(), i.$slideTrack.css({
            opacity: 1
        }), i.$slider.removeClass("slick-loading"), i.initUI(), "progressive" === i.options.lazyLoad && i.progressiveLazyLoad();
    }),
    (e.prototype.next = e.prototype.slickNext = function () {
        this.changeSlide({
            data: {
                message: "next"
            }
        });
    }),
    (e.prototype.orientationChange = function () {
        this.checkResponsive(), this.setPosition();
    }),
    (e.prototype.pause = e.prototype.slickPause = function () {
        this.autoPlayClear(), (this.paused = !0);
    }),
    (e.prototype.play = e.prototype.slickPlay = function () {
        var i = this;
        i.autoPlay(), (i.options.autoplay = !0), (i.paused = !1), (i.focussed = !1), (i.interrupted = !1);
    }),
    (e.prototype.postSlide = function (e) {
        var t = this;
        t.unslicked ||
            (t.$slider.trigger("afterChange", [t, e]),
                (t.animating = !1),
                t.slideCount > t.options.slidesToShow && t.setPosition(),
                (t.swipeLeft = null),
                t.options.autoplay && t.autoPlay(),
                !0 === t.options.accessibility && (t.initADA(), t.options.focusOnChange && i(t.$slides.get(t.currentSlide)).attr("tabindex", 0).focus()));
    }),
    (e.prototype.prev = e.prototype.slickPrev = function () {
        this.changeSlide({
            data: {
                message: "previous"
            }
        });
    }),
    (e.prototype.preventDefault = function (i) {
        i.preventDefault();
    }),
    (e.prototype.progressiveLazyLoad = function (e) {
        e = e || 1;
        var t,
            o,
            s,
            n,
            r,
            l = this,
            d = i("img[data-lazy]", l.$slider);
        d.length ?
            ((t = d.first()),
                (o = t.attr("data-lazy")),
                (s = t.attr("data-srcset")),
                (n = t.attr("data-sizes") || l.$slider.attr("data-sizes")),
                ((r = document.createElement("img")).onload = function () {
                    s && (t.attr("srcset", s), n && t.attr("sizes", n)),
                        t.attr("src", o).removeAttr("data-lazy data-srcset data-sizes").removeClass("slick-loading"),
                        !0 === l.options.adaptiveHeight && l.setPosition(),
                        l.$slider.trigger("lazyLoaded", [l, t, o]),
                        l.progressiveLazyLoad();
                }),
                (r.onerror = function () {
                    e < 3 ?
                        setTimeout(function () {
                            l.progressiveLazyLoad(e + 1);
                        }, 500) :
                        (t.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"), l.$slider.trigger("lazyLoadError", [l, t, o]), l.progressiveLazyLoad());
                }),
                (r.src = o)) :
            l.$slider.trigger("allImagesLoaded", [l]);
    }),
    (e.prototype.refresh = function (e) {
        var t,
            o,
            s = this;
        (o = s.slideCount - s.options.slidesToShow),
        !s.options.infinite && s.currentSlide > o && (s.currentSlide = o),
            s.slideCount <= s.options.slidesToShow && (s.currentSlide = 0),
            (t = s.currentSlide),
            s.destroy(!0),
            i.extend(s, s.initials, {
                currentSlide: t
            }),
            s.init(),
            e || s.changeSlide({
                data: {
                    message: "index",
                    index: t
                }
            }, !1);
    }),
    (e.prototype.registerBreakpoints = function () {
        var e,
            t,
            o,
            s = this,
            n = s.options.responsive || null;
        if ("array" === i.type(n) && n.length) {
            for (e in ((s.respondTo = s.options.respondTo || "window"), n))
                if (((o = s.breakpoints.length - 1), n.hasOwnProperty(e))) {
                    for (t = n[e].breakpoint; o >= 0;) s.breakpoints[o] && s.breakpoints[o] === t && s.breakpoints.splice(o, 1), o--;
                    s.breakpoints.push(t), (s.breakpointSettings[t] = n[e].settings);
                }
            s.breakpoints.sort(function (i, e) {
                return s.options.mobileFirst ? i - e : e - i;
            });
        }
    }),
    (e.prototype.reinit = function () {
        var e = this;
        (e.$slides = e.$slideTrack.children(e.options.slide).addClass("slick-slide")),
        (e.slideCount = e.$slides.length),
        e.currentSlide >= e.slideCount && 0 !== e.currentSlide && (e.currentSlide = e.currentSlide - e.options.slidesToScroll),
            e.slideCount <= e.options.slidesToShow && (e.currentSlide = 0),
            e.registerBreakpoints(),
            e.setProps(),
            e.setupInfinite(),
            e.buildArrows(),
            e.updateArrows(),
            e.initArrowEvents(),
            e.buildDots(),
            e.updateDots(),
            e.initDotEvents(),
            e.cleanUpSlideEvents(),
            e.initSlideEvents(),
            e.checkResponsive(!1, !0),
            !0 === e.options.focusOnSelect && i(e.$slideTrack).children().on("click.slick", e.selectHandler),
            e.setSlideClasses("number" == typeof e.currentSlide ? e.currentSlide : 0),
            e.setPosition(),
            e.focusHandler(),
            (e.paused = !e.options.autoplay),
            e.autoPlay(),
            e.$slider.trigger("reInit", [e]);
    }),
    (e.prototype.resize = function () {
        var e = this;
        i(window).width() !== e.windowWidth &&
            (clearTimeout(e.windowDelay),
                (e.windowDelay = window.setTimeout(function () {
                    (e.windowWidth = i(window).width()), e.checkResponsive(), e.unslicked || e.setPosition();
                }, 50)));
    }),
    (e.prototype.removeSlide = e.prototype.slickRemove = function (i, e, t) {
        var o = this;
        if (((i = "boolean" == typeof i ? (!0 === (e = i) ? 0 : o.slideCount - 1) : !0 === e ? --i : i), o.slideCount < 1 || i < 0 || i > o.slideCount - 1)) return !1;
        o.unload(),
            !0 === t ? o.$slideTrack.children().remove() : o.$slideTrack.children(this.options.slide).eq(i).remove(),
            (o.$slides = o.$slideTrack.children(this.options.slide)),
            o.$slideTrack.children(this.options.slide).detach(),
            o.$slideTrack.append(o.$slides),
            (o.$slidesCache = o.$slides),
            o.reinit();
    }),
    (e.prototype.setCSS = function (i) {
        var e,
            t,
            o = this,
            s = {};
        !0 === o.options.rtl && (i = -i),
            (e = "left" == o.positionProp ? Math.ceil(i) + "px" : "0px"),
            (t = "top" == o.positionProp ? Math.ceil(i) + "px" : "0px"),
            (s[o.positionProp] = i),
            !1 === o.transformsEnabled ?
            o.$slideTrack.css(s) :
            ((s = {}), !1 === o.cssTransitions ? ((s[o.animType] = "translate(" + e + ", " + t + ")"), o.$slideTrack.css(s)) : ((s[o.animType] = "translate3d(" + e + ", " + t + ", 0px)"), o.$slideTrack.css(s)));
    }),
    (e.prototype.setDimensions = function () {
        var i = this;
        !1 === i.options.vertical ?
            !0 === i.options.centerMode && i.$list.css({
                padding: "0px " + i.options.centerPadding
            }) :
            (i.$list.height(i.$slides.first().outerHeight(!0) * i.options.slidesToShow), !0 === i.options.centerMode && i.$list.css({
                padding: i.options.centerPadding + " 0px"
            })),
            (i.listWidth = i.$list.width()),
            (i.listHeight = i.$list.height()),
            !1 === i.options.vertical && !1 === i.options.variableWidth ?
            ((i.slideWidth = Math.ceil(i.listWidth / i.options.slidesToShow)), i.$slideTrack.width(Math.ceil(i.slideWidth * i.$slideTrack.children(".slick-slide").length))) :
            !0 === i.options.variableWidth ?
            i.$slideTrack.width(5e3 * i.slideCount) :
            ((i.slideWidth = Math.ceil(i.listWidth)), i.$slideTrack.height(Math.ceil(i.$slides.first().outerHeight(!0) * i.$slideTrack.children(".slick-slide").length)));
        var e = i.$slides.first().outerWidth(!0) - i.$slides.first().width();
        !1 === i.options.variableWidth && i.$slideTrack.children(".slick-slide").width(i.slideWidth - e);
    }),
    (e.prototype.setFade = function () {
        var e,
            t = this;
        t.$slides.each(function (o, s) {
                (e = t.slideWidth * o * -1),
                !0 === t.options.rtl ? i(s).css({
                    position: "relative",
                    right: e,
                    top: 0,
                    zIndex: t.options.zIndex - 2,
                    opacity: 0
                }) : i(s).css({
                    position: "relative",
                    left: e,
                    top: 0,
                    zIndex: t.options.zIndex - 2,
                    opacity: 0
                });
            }),
            t.$slides.eq(t.currentSlide).css({
                zIndex: t.options.zIndex - 1,
                opacity: 1
            });
    }),
    (e.prototype.setHeight = function () {
        var i = this;
        if (1 === i.options.slidesToShow && !0 === i.options.adaptiveHeight && !1 === i.options.vertical) {
            var e = i.$slides.eq(i.currentSlide).outerHeight(!0);
            i.$list.css("height", e);
        }
    }),
    (e.prototype.setOption = e.prototype.slickSetOption = function () {
        var e,
            t,
            o,
            s,
            n,
            r = this,
            l = !1;
        if (
            ("object" === i.type(arguments[0]) ?
                ((o = arguments[0]), (l = arguments[1]), (n = "multiple")) :
                "string" === i.type(arguments[0]) &&
                ((o = arguments[0]), (s = arguments[1]), (l = arguments[2]), "responsive" === arguments[0] && "array" === i.type(arguments[1]) ? (n = "responsive") : void 0 !== arguments[1] && (n = "single")),
                "single" === n)
        )
            r.options[o] = s;
        else if ("multiple" === n)
            i.each(o, function (i, e) {
                r.options[i] = e;
            });
        else if ("responsive" === n)
            for (t in s)
                if ("array" !== i.type(r.options.responsive)) r.options.responsive = [s[t]];
                else {
                    for (e = r.options.responsive.length - 1; e >= 0;) r.options.responsive[e].breakpoint === s[t].breakpoint && r.options.responsive.splice(e, 1), e--;
                    r.options.responsive.push(s[t]);
                }
        l && (r.unload(), r.reinit());
    }),
    (e.prototype.setPosition = function () {
        var i = this;
        i.setDimensions(), i.setHeight(), !1 === i.options.fade ? i.setCSS(i.getLeft(i.currentSlide)) : i.setFade(), i.$slider.trigger("setPosition", [i]);
    }),
    (e.prototype.setProps = function () {
        var i = this,
            e = document.body.style;
        (i.positionProp = !0 === i.options.vertical ? "top" : "left"),
        "top" === i.positionProp ? i.$slider.addClass("slick-vertical") : i.$slider.removeClass("slick-vertical"),
            (void 0 === e.WebkitTransition && void 0 === e.MozTransition && void 0 === e.msTransition) || (!0 === i.options.useCSS && (i.cssTransitions = !0)),
            i.options.fade && ("number" == typeof i.options.zIndex ? i.options.zIndex < 3 && (i.options.zIndex = 3) : (i.options.zIndex = i.defaults.zIndex)),
            void 0 !== e.OTransform && ((i.animType = "OTransform"), (i.transformType = "-o-transform"), (i.transitionType = "OTransition"), void 0 === e.perspectiveProperty && void 0 === e.webkitPerspective && (i.animType = !1)),
            void 0 !== e.MozTransform && ((i.animType = "MozTransform"), (i.transformType = "-moz-transform"), (i.transitionType = "MozTransition"), void 0 === e.perspectiveProperty && void 0 === e.MozPerspective && (i.animType = !1)),
            void 0 !== e.webkitTransform &&
            ((i.animType = "webkitTransform"), (i.transformType = "-webkit-transform"), (i.transitionType = "webkitTransition"), void 0 === e.perspectiveProperty && void 0 === e.webkitPerspective && (i.animType = !1)),
            void 0 !== e.msTransform && ((i.animType = "msTransform"), (i.transformType = "-ms-transform"), (i.transitionType = "msTransition"), void 0 === e.msTransform && (i.animType = !1)),
            void 0 !== e.transform && !1 !== i.animType && ((i.animType = "transform"), (i.transformType = "transform"), (i.transitionType = "transition")),
            (i.transformsEnabled = i.options.useTransform && null !== i.animType && !1 !== i.animType);
    }),
    (e.prototype.setSlideClasses = function (i) {
        var e,
            t,
            o,
            s,
            n = this;
        if (((t = n.$slider.find(".slick-slide").removeClass("slick-active slick-center slick-current").attr("aria-hidden", "true")), n.$slides.eq(i).addClass("slick-current"), !0 === n.options.centerMode)) {
            var r = n.options.slidesToShow % 2 == 0 ? 1 : 0;
            (e = Math.floor(n.options.slidesToShow / 2)),
            !0 === n.options.infinite &&
                (i >= e && i <= n.slideCount - 1 - e ?
                    n.$slides
                    .slice(i - e + r, i + e + 1)
                    .addClass("slick-active")
                    .attr("aria-hidden", "false") :
                    ((o = n.options.slidesToShow + i),
                        t
                        .slice(o - e + 1 + r, o + e + 2)
                        .addClass("slick-active")
                        .attr("aria-hidden", "false")),
                    0 === i ? t.eq(t.length - 1 - n.options.slidesToShow).addClass("slick-center") : i === n.slideCount - 1 && t.eq(n.options.slidesToShow).addClass("slick-center")),
                n.$slides.eq(i).addClass("slick-center");
        } else
            i >= 0 && i <= n.slideCount - n.options.slidesToShow ?
            n.$slides
            .slice(i, i + n.options.slidesToShow)
            .addClass("slick-active")
            .attr("aria-hidden", "false") :
            t.length <= n.options.slidesToShow ?
            t.addClass("slick-active").attr("aria-hidden", "false") :
            ((s = n.slideCount % n.options.slidesToShow),
                (o = !0 === n.options.infinite ? n.options.slidesToShow + i : i),
                n.options.slidesToShow == n.options.slidesToScroll && n.slideCount - i < n.options.slidesToShow ?
                t
                .slice(o - (n.options.slidesToShow - s), o + s)
                .addClass("slick-active")
                .attr("aria-hidden", "false") :
                t
                .slice(o, o + n.options.slidesToShow)
                .addClass("slick-active")
                .attr("aria-hidden", "false"));
        ("ondemand" !== n.options.lazyLoad && "anticipated" !== n.options.lazyLoad) || n.lazyLoad();
    }),
    (e.prototype.setupInfinite = function () {
        var e,
            t,
            o,
            s = this;
        if ((!0 === s.options.fade && (s.options.centerMode = !1), !0 === s.options.infinite && !1 === s.options.fade && ((t = null), s.slideCount > s.options.slidesToShow))) {
            for (o = !0 === s.options.centerMode ? s.options.slidesToShow + 1 : s.options.slidesToShow, e = s.slideCount; e > s.slideCount - o; e -= 1)
                (t = e - 1),
                i(s.$slides[t])
                .clone(!0)
                .attr("id", "")
                .attr("data-slick-index", t - s.slideCount)
                .prependTo(s.$slideTrack)
                .addClass("slick-cloned");
            for (e = 0; e < o + s.slideCount; e += 1)
                (t = e),
                i(s.$slides[t])
                .clone(!0)
                .attr("id", "")
                .attr("data-slick-index", t + s.slideCount)
                .appendTo(s.$slideTrack)
                .addClass("slick-cloned");
            s.$slideTrack
                .find(".slick-cloned")
                .find("[id]")
                .each(function () {
                    i(this).attr("id", "");
                });
        }
    }),
    (e.prototype.interrupt = function (i) {
        i || this.autoPlay(), (this.interrupted = i);
    }),
    (e.prototype.selectHandler = function (e) {
        var t = this,
            o = i(e.target).is(".slick-slide") ? i(e.target) : i(e.target).parents(".slick-slide"),
            s = parseInt(o.attr("data-slick-index"));
        s || (s = 0), t.slideCount <= t.options.slidesToShow ? t.slideHandler(s, !1, !0) : t.slideHandler(s);
    }),
    (e.prototype.slideHandler = function (i, e, t) {
        var o,
            s,
            n,
            r,
            l,
            d = null,
            a = this;
        if (((e = e || !1), !((!0 === a.animating && !0 === a.options.waitForAnimate) || (!0 === a.options.fade && a.currentSlide === i))))
            if (
                (!1 === e && a.asNavFor(i),
                    (o = i),
                    (d = a.getLeft(o)),
                    (r = a.getLeft(a.currentSlide)),
                    (a.currentLeft = null === a.swipeLeft ? r : a.swipeLeft),
                    !1 === a.options.infinite && !1 === a.options.centerMode && (i < 0 || i > a.getDotCount() * a.options.slidesToScroll))
            )
                !1 === a.options.fade &&
                ((o = a.currentSlide),
                    !0 !== t ?
                    a.animateSlide(r, function () {
                        a.postSlide(o);
                    }) :
                    a.postSlide(o));
            else if (!1 === a.options.infinite && !0 === a.options.centerMode && (i < 0 || i > a.slideCount - a.options.slidesToScroll))
            !1 === a.options.fade &&
            ((o = a.currentSlide),
                !0 !== t ?
                a.animateSlide(r, function () {
                    a.postSlide(o);
                }) :
                a.postSlide(o));
        else {
            if (
                (a.options.autoplay && clearInterval(a.autoPlayTimer),
                    (s =
                        o < 0 ?
                        a.slideCount % a.options.slidesToScroll != 0 ?
                        a.slideCount - (a.slideCount % a.options.slidesToScroll) :
                        a.slideCount + o :
                        o >= a.slideCount ?
                        a.slideCount % a.options.slidesToScroll != 0 ?
                        0 :
                        o - a.slideCount :
                        o),
                    (a.animating = !0),
                    a.$slider.trigger("beforeChange", [a, a.currentSlide, s]),
                    (n = a.currentSlide),
                    (a.currentSlide = s),
                    a.setSlideClasses(a.currentSlide),
                    a.options.asNavFor && (l = (l = a.getNavTarget()).slick("getSlick")).slideCount <= l.options.slidesToShow && l.setSlideClasses(a.currentSlide),
                    a.updateDots(),
                    a.updateArrows(),
                    !0 === a.options.fade)
            )
                return (
                    !0 !== t ?
                    (a.fadeSlideOut(n),
                        a.fadeSlide(s, function () {
                            a.postSlide(s);
                        })) :
                    a.postSlide(s),
                    void a.animateHeight()
                );
            !0 !== t ?
                a.animateSlide(d, function () {
                    a.postSlide(s);
                }) :
                a.postSlide(s);
        }
    }),
    (e.prototype.startLoad = function () {
        var i = this;
        !0 === i.options.arrows && i.slideCount > i.options.slidesToShow && (i.$prevArrow.hide(), i.$nextArrow.hide()),
            !0 === i.options.dots && i.slideCount > i.options.slidesToShow && i.$dots.hide(),
            i.$slider.addClass("slick-loading");
    }),
    (e.prototype.swipeDirection = function () {
        var i,
            e,
            t,
            o,
            s = this;
        return (
            (i = s.touchObject.startX - s.touchObject.curX),
            (e = s.touchObject.startY - s.touchObject.curY),
            (t = Math.atan2(e, i)),
            (o = Math.round((180 * t) / Math.PI)) < 0 && (o = 360 - Math.abs(o)),
            (o <= 45 && o >= 0) || (o <= 360 && o >= 315) ?
            !1 === s.options.rtl ?
            "left" :
            "right" :
            o >= 135 && o <= 225 ?
            !1 === s.options.rtl ?
            "right" :
            "left" :
            !0 === s.options.verticalSwiping ?
            o >= 35 && o <= 135 ?
            "down" :
            "up" :
            "vertical"
        );
    }),
    (e.prototype.swipeEnd = function (i) {
        var e,
            t,
            o = this;
        if (((o.dragging = !1), (o.swiping = !1), o.scrolling)) return (o.scrolling = !1), !1;
        if (((o.interrupted = !1), (o.shouldClick = !(o.touchObject.swipeLength > 10)), void 0 === o.touchObject.curX)) return !1;
        if ((!0 === o.touchObject.edgeHit && o.$slider.trigger("edge", [o, o.swipeDirection()]), o.touchObject.swipeLength >= o.touchObject.minSwipe)) {
            switch ((t = o.swipeDirection())) {
                case "left":
                case "down":
                    (e = o.options.swipeToSlide ? o.checkNavigable(o.currentSlide + o.getSlideCount()) : o.currentSlide + o.getSlideCount()), (o.currentDirection = 0);
                    break;
                case "right":
                case "up":
                    (e = o.options.swipeToSlide ? o.checkNavigable(o.currentSlide - o.getSlideCount()) : o.currentSlide - o.getSlideCount()), (o.currentDirection = 1);
            }
            "vertical" != t && (o.slideHandler(e), (o.touchObject = {}), o.$slider.trigger("swipe", [o, t]));
        } else o.touchObject.startX !== o.touchObject.curX && (o.slideHandler(o.currentSlide), (o.touchObject = {}));
    }),
    (e.prototype.swipeHandler = function (i) {
        var e = this;
        if (!(!1 === e.options.swipe || ("ontouchend" in document && !1 === e.options.swipe) || (!1 === e.options.draggable && -1 !== i.type.indexOf("mouse"))))
            switch (
                ((e.touchObject.fingerCount = i.originalEvent && void 0 !== i.originalEvent.touches ? i.originalEvent.touches.length : 1),
                    (e.touchObject.minSwipe = e.listWidth / e.options.touchThreshold),
                    !0 === e.options.verticalSwiping && (e.touchObject.minSwipe = e.listHeight / e.options.touchThreshold),
                    i.data.action)
            ) {
                case "start":
                    e.swipeStart(i);
                    break;
                case "move":
                    e.swipeMove(i);
                    break;
                case "end":
                    e.swipeEnd(i);
            }
    }),
    (e.prototype.swipeMove = function (i) {
        var e,
            t,
            o,
            s,
            n,
            r,
            l = this;
        return (
            (n = void 0 !== i.originalEvent ? i.originalEvent.touches : null),
            !(!l.dragging || l.scrolling || (n && 1 !== n.length)) &&
            ((e = l.getLeft(l.currentSlide)),
                (l.touchObject.curX = void 0 !== n ? n[0].pageX : i.clientX),
                (l.touchObject.curY = void 0 !== n ? n[0].pageY : i.clientY),
                (l.touchObject.swipeLength = Math.round(Math.sqrt(Math.pow(l.touchObject.curX - l.touchObject.startX, 2)))),
                (r = Math.round(Math.sqrt(Math.pow(l.touchObject.curY - l.touchObject.startY, 2)))),
                !l.options.verticalSwiping && !l.swiping && r > 4 ?
                ((l.scrolling = !0), !1) :
                (!0 === l.options.verticalSwiping && (l.touchObject.swipeLength = r),
                    (t = l.swipeDirection()),
                    void 0 !== i.originalEvent && l.touchObject.swipeLength > 4 && ((l.swiping = !0), i.preventDefault()),
                    (s = (!1 === l.options.rtl ? 1 : -1) * (l.touchObject.curX > l.touchObject.startX ? 1 : -1)),
                    !0 === l.options.verticalSwiping && (s = l.touchObject.curY > l.touchObject.startY ? 1 : -1),
                    (o = l.touchObject.swipeLength),
                    (l.touchObject.edgeHit = !1),
                    !1 === l.options.infinite &&
                    ((0 === l.currentSlide && "right" === t) || (l.currentSlide >= l.getDotCount() && "left" === t)) &&
                    ((o = l.touchObject.swipeLength * l.options.edgeFriction), (l.touchObject.edgeHit = !0)),
                    !1 === l.options.vertical ? (l.swipeLeft = e + o * s) : (l.swipeLeft = e + o * (l.$list.height() / l.listWidth) * s),
                    !0 === l.options.verticalSwiping && (l.swipeLeft = e + o * s),
                    !0 !== l.options.fade && !1 !== l.options.touchMove && (!0 === l.animating ? ((l.swipeLeft = null), !1) : void l.setCSS(l.swipeLeft))))
        );
    }),
    (e.prototype.swipeStart = function (i) {
        var e,
            t = this;
        if (((t.interrupted = !0), 1 !== t.touchObject.fingerCount || t.slideCount <= t.options.slidesToShow)) return (t.touchObject = {}), !1;
        void 0 !== i.originalEvent && void 0 !== i.originalEvent.touches && (e = i.originalEvent.touches[0]),
            (t.touchObject.startX = t.touchObject.curX = void 0 !== e ? e.pageX : i.clientX),
            (t.touchObject.startY = t.touchObject.curY = void 0 !== e ? e.pageY : i.clientY),
            (t.dragging = !0);
    }),
    (e.prototype.unfilterSlides = e.prototype.slickUnfilter = function () {
        var i = this;
        null !== i.$slidesCache && (i.unload(), i.$slideTrack.children(this.options.slide).detach(), i.$slidesCache.appendTo(i.$slideTrack), i.reinit());
    }),
    (e.prototype.unload = function () {
        var e = this;
        i(".slick-cloned", e.$slider).remove(),
            e.$dots && e.$dots.remove(),
            e.$prevArrow && e.htmlExpr.test(e.options.prevArrow) && e.$prevArrow.remove(),
            e.$nextArrow && e.htmlExpr.test(e.options.nextArrow) && e.$nextArrow.remove(),
            e.$slides.removeClass("slick-slide slick-active slick-visible slick-current").attr("aria-hidden", "true").css("width", "");
    }),
    (e.prototype.unslick = function (i) {
        var e = this;
        e.$slider.trigger("unslick", [e, i]), e.destroy();
    }),
    (e.prototype.updateArrows = function () {
        var i = this;
        Math.floor(i.options.slidesToShow / 2),
            !0 === i.options.arrows &&
            i.slideCount > i.options.slidesToShow &&
            !i.options.infinite &&
            (i.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false"),
                i.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false"),
                0 === i.currentSlide ?
                (i.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true"), i.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false")) :
                ((i.currentSlide >= i.slideCount - i.options.slidesToShow && !1 === i.options.centerMode) || (i.currentSlide >= i.slideCount - 1 && !0 === i.options.centerMode)) &&
                (i.$nextArrow.addClass("slick-disabled").attr("aria-disabled", "true"), i.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false")));
    }),
    (e.prototype.updateDots = function () {
        var i = this;
        null !== i.$dots &&
            (i.$dots.find("li").removeClass("slick-active").end(),
                i.$dots
                .find("li")
                .eq(Math.floor(i.currentSlide / i.options.slidesToScroll))
                .addClass("slick-active"));
    }),
    (e.prototype.visibility = function () {
        var i = this;
        i.options.autoplay && (document[i.hidden] ? (i.interrupted = !0) : (i.interrupted = !1));
    }),
    (i.fn.slick = function () {
        var i,
            t,
            o = this,
            s = arguments[0],
            n = Array.prototype.slice.call(arguments, 1),
            r = o.length;
        for (i = 0; i < r; i++)
            if (("object" == typeof s || void 0 === s ? (o[i].slick = new e(o[i], s)) : (t = o[i].slick[s].apply(o[i].slick, n)), void 0 !== t)) return t;
        return o;
    });
});

// 
(function (t) {
    "use strict";
    "function" == typeof define && define.amd ? define(["jquery"], t) : "undefined" != typeof module && module.exports ? (module.exports = t(require("jquery"))) : t(jQuery);
})(function (t) {
    var e = -1,
        i = -1,
        o = function (t) {
            return parseFloat(t) || 0;
        },
        s = function (e) {
            var i = t(e),
                s = null,
                n = [];
            return (
                i.each(function () {
                    var e = t(this),
                        i = e.offset().top - o(e.css("margin-top")),
                        r = n.length > 0 ? n[n.length - 1] : null;
                    null === r ? n.push(e) : Math.floor(Math.abs(s - i)) <= 1 ? (n[n.length - 1] = r.add(e)) : n.push(e), (s = i);
                }),
                n
            );
        },
        n = function (e) {
            var i = {
                byRow: !0,
                property: "height",
                target: null,
                remove: !1
            };
            return "object" == typeof e ? t.extend(i, e) : ("boolean" == typeof e ? (i.byRow = e) : "remove" === e && (i.remove = !0), i);
        },
        r = (t.fn.matchHeight = function (e) {
            var i = n(e);
            if (i.remove) {
                var o = this;
                return (
                    this.css(i.property, ""),
                    t.each(r._groups, function (t, e) {
                        e.elements = e.elements.not(o);
                    }),
                    this
                );
            }
            return (this.length <= 1 && !i.target) || (r._groups.push({
                elements: this,
                options: i
            }), r._apply(this, i)), this;
        });
    (r.version = "master"),
    (r._groups = []),
    (r._throttle = 80),
    (r._maintainScroll = !1),
    (r._beforeUpdate = null),
    (r._afterUpdate = null),
    (r._rows = s),
    (r._parse = o),
    (r._parseOptions = n),
    (r._apply = function (e, i) {
        var a = n(i),
            l = t(e),
            d = [l],
            c = t(window).scrollTop(),
            u = t("html").outerHeight(!0),
            p = l.parents().filter(":hidden");
        return (
            p.each(function () {
                var e = t(this);
                e.data("style-cache", e.attr("style"));
            }),
            p.css("display", "block"),
            a.byRow &&
            !a.target &&
            (l.each(function () {
                    var e = t(this),
                        i = e.css("display");
                    "inline-block" !== i && "flex" !== i && "inline-flex" !== i && (i = "block"),
                        e.data("style-cache", e.attr("style")),
                        e.css({
                            display: i,
                            "padding-top": "0",
                            "padding-bottom": "0",
                            "margin-top": "0",
                            "margin-bottom": "0",
                            "border-top-width": "0",
                            "border-bottom-width": "0",
                            height: "100px",
                            overflow: "hidden"
                        });
                }),
                (d = s(l)),
                l.each(function () {
                    var e = t(this);
                    e.attr("style", e.data("style-cache") || "");
                })),
            t.each(d, function (e, i) {
                var s = t(i),
                    n = 0;
                if (a.target) n = a.target.outerHeight(!1);
                else {
                    if (a.byRow && s.length <= 1) return void s.css(a.property, "");
                    s.each(function () {
                        var e = t(this),
                            i = e.attr("style"),
                            o = e.css("display");
                        "inline-block" !== o && "flex" !== o && "inline-flex" !== o && (o = "block");
                        var s = {
                            display: o
                        };
                        (s[a.property] = ""), e.css(s), e.outerHeight(!1) > n && (n = e.outerHeight(!1)), i ? e.attr("style", i) : e.css("display", "");
                    });
                }
                s.each(function () {
                    var e = t(this),
                        i = 0;
                    (a.target && e.is(a.target)) ||
                    ("border-box" !== e.css("box-sizing") && ((i += o(e.css("border-top-width")) + o(e.css("border-bottom-width"))), (i += o(e.css("padding-top")) + o(e.css("padding-bottom")))), e.css(a.property, n - i + "px"));
                });
            }),
            p.each(function () {
                var e = t(this);
                e.attr("style", e.data("style-cache") || null);
            }),
            r._maintainScroll && t(window).scrollTop((c / u) * t("html").outerHeight(!0)),
            this
        );
    }),
    (r._applyDataApi = function () {
        var e = {};
        t("[data-match-height], [data-mh]").each(function () {
                var i = t(this),
                    o = i.attr("data-mh") || i.attr("data-match-height");
                e[o] = o in e ? e[o].add(i) : i;
            }),
            t.each(e, function () {
                this.matchHeight(!0);
            });
    });
    var a = function (e) {
        r._beforeUpdate && r._beforeUpdate(e, r._groups),
            t.each(r._groups, function () {
                r._apply(this.elements, this.options);
            }),
            r._afterUpdate && r._afterUpdate(e, r._groups);
    };
    (r._update = function (o, s) {
        if (s && "resize" === s.type) {
            var n = t(window).width();
            if (n === e) return;
            e = n;
        }
        o
            ?
            -1 === i &&
            (i = setTimeout(function () {
                a(s), (i = -1);
            }, r._throttle)) :
            a(s);
    }),
    t(r._applyDataApi);
    var l = t.fn.on ? "on" : "bind";
    t(window)[l]("load", function (t) {
            r._update(!1, t);
        }),
        t(window)[l]("resize orientationchange", function (t) {
            r._update(!0, t);
        });
}),

// jQuery-MultiSelect
(function (t) {
    var e = {
            columns: 1,
            search: !1,
            searchOptions: {
                delay: 250,
                showOptGroups: !1,
                searchText: !0,
                searchValue: !1,
                onSearch: function (t) {}
            },
            texts: {
                placeholder: "Select options",
                search: "Search",
                selectedOptions: " selected",
                selectAll: "Select all",
                unselectAll: "Unselect all",
                noneSelected: "None Selected"
            },
            selectAll: !1,
            selectGroup: !1,
            minHeight: 200,
            maxHeight: null,
            maxWidth: null,
            maxPlaceholderWidth: null,
            maxPlaceholderOpts: 10,
            showCheckbox: !0,
            checkboxAutoFit: !1,
            optionAttributes: [],
            onLoad: function (t) {},
            onOptionClick: function (t, e) {},
            onControlClose: function (t) {},
            onSelectAll: function (t, e) {},
            onPlaceholder: function (t, e, i) {},
        },
        i = 1,
        o = 1;

    function s(o, s) {
        if (((this.element = o), (this.options = t.extend(!0, {}, e, s)), (this.updateSelectAll = !0), (this.updatePlaceholder = !0), (this.listNumber = i), (i += 1), !t(this.element).attr("multiple")))
            throw new Error("[jQuery-MultiSelect] Select list must be a multiselect list in order to use this plugin");
        if (this.options.search && !this.options.searchOptions.searchText && !this.options.searchOptions.searchValue) throw new Error("[jQuery-MultiSelect] Either searchText or searchValue should be true.");
        "placeholder" in this.options && ((this.options.texts.placeholder = this.options.placeholder), delete this.options.placeholder),
            "default" in this.options.searchOptions && ((this.options.texts.search = this.options.searchOptions.default), delete this.options.searchOptions.default),
            this.load();
    }
    "function" != typeof Array.prototype.map &&
        (Array.prototype.map = function (e, i) {
            return void 0 === i && (i = this), t.isArray(i) ? t.map(i, e) : [];
        }),
        "function" != typeof String.prototype.trim &&
        (String.prototype.trim = function () {
            return this.replace(/^\s+|\s+$/g, "");
        }),
        (s.prototype = {
            load: function () {
                var e = this;
                if ("SELECT" != e.element.nodeName || t(e.element).hasClass("jqmsLoaded")) return !0;
                t(e.element)
                    .addClass("jqmsLoaded ms-list-" + e.listNumber)
                    .data("plugin_multiselect-instance", e),
                    t(e.element).after('<div id="ms-list-' + e.listNumber + '" class="ms-options-wrap"><button type="button"><span>None Selected</span></button><div class="ms-options"><ul></ul></div></div>');
                var i = t(e.element)
                    .siblings("#ms-list-" + e.listNumber + ".ms-options-wrap")
                    .find("> button:first-child"),
                    o = t(e.element)
                    .siblings("#ms-list-" + e.listNumber + ".ms-options-wrap")
                    .find("> .ms-options"),
                    s = o.find("> ul");
                if (
                    (e.options.showCheckbox ? e.options.checkboxAutoFit && o.addClass("checkbox-autofit") : o.addClass("hide-checkbox"),
                        t(e.element).prop("disabled") && i.prop("disabled", !0),
                        e.options.maxPlaceholderWidth && i.css("maxWidth", e.options.maxPlaceholderWidth),
                        e.options.maxHeight)
                )
                    var n = e.options.maxHeight;
                else n = t(window).height() - o.offset().top + t(window).scrollTop() - 20;
                if (
                    ((n = n < e.options.minHeight ? e.options.minHeight : n),
                        o.css({
                            maxWidth: e.options.maxWidth,
                            minHeight: e.options.minHeight,
                            maxHeight: n
                        }),
                        o.on("touchmove mousewheel DOMMouseScroll", function (e) {
                            if (t(this).outerHeight() < t(this)[0].scrollHeight) {
                                var i = e.originalEvent,
                                    o = i.wheelDelta || -i.detail;
                                t(this).outerHeight() + t(this)[0].scrollTop > t(this)[0].scrollHeight && (e.preventDefault(), (this.scrollTop += o < 0 ? 1 : -1));
                            }
                        }),
                        t(document)
                        .off("click.ms-hideopts")
                        .on("click.ms-hideopts", function (e) {
                            t(e.target).closest(".ms-options-wrap").length ||
                                t(".ms-options-wrap.ms-active > .ms-options").each(function () {
                                    t(this).closest(".ms-options-wrap").removeClass("ms-active");
                                    var e = t(this).closest(".ms-options-wrap").attr("id"),
                                        i = t(this)
                                        .parent()
                                        .siblings("." + e + ".jqmsLoaded")
                                        .data("plugin_multiselect-instance");
                                    "function" == typeof i.options.onControlClose && i.options.onControlClose(i.element);
                                });
                        })
                        .on("keydown", function (e) {
                            27 == (e.keyCode || e.which) && t(this).trigger("click.ms-hideopts");
                        }),
                        i.on("keydown", function (t) {
                            var e = t.keyCode || t.which;
                            (13 != e && 32 != e) || i.trigger("mousedown");
                        }),
                        i
                        .on("mousedown", function (i) {
                            if (i.which && 1 != i.which) return !0;
                            if (
                                (t(".ms-options-wrap.ms-active").each(function () {
                                        if (t(this).siblings("." + t(this).attr("id") + ".jqmsLoaded")[0] != o.parent().siblings(".ms-list-" + e.listNumber + ".jqmsLoaded")[0]) {
                                            t(this).removeClass("ms-active");
                                            var i = t(this)
                                                .siblings("." + t(this).attr("id") + ".jqmsLoaded")
                                                .data("plugin_multiselect-instance");
                                            "function" == typeof i.options.onControlClose && i.options.onControlClose(i.element);
                                        }
                                    }),
                                    o.closest(".ms-options-wrap").toggleClass("ms-active"),
                                    o.closest(".ms-options-wrap").hasClass("ms-active"))
                            ) {
                                if ((o.css("maxHeight", ""), e.options.maxHeight)) var s = e.options.maxHeight;
                                else s = t(window).height() - o.offset().top + t(window).scrollTop() - 20;
                                s && ((s = s < e.options.minHeight ? e.options.minHeight : s), o.css("maxHeight", s));
                            } else "function" == typeof e.options.onControlClose && e.options.onControlClose(e.element);
                        })
                        .click(function (t) {
                            t.preventDefault();
                        }),
                        e.options.texts.placeholder && i.find("span").text(e.options.texts.placeholder),
                        e.options.search)
                ) {
                    s.before('<div class="ms-search"><input type="text" value="" placeholder="' + e.options.texts.search + '" /></div>');
                    var r = o.find(".ms-search input");
                    r.on("keyup", function () {
                        if (t(this).data("lastsearch") == t(this).val()) return !0;
                        t(this).data("searchTimeout") && clearTimeout(t(this).data("searchTimeout"));
                        var i = t(this);
                        t(this).data(
                            "searchTimeout",
                            setTimeout(function () {
                                i.data("lastsearch", i.val()), "function" == typeof e.options.searchOptions.onSearch && e.options.searchOptions.onSearch(e.element);
                                var o = t.trim(r.val().toLowerCase());
                                o
                                    ?
                                    (s.find('li[data-search-term*="' + o + '"]:not(.optgroup)').removeClass("ms-hidden"), s.find('li:not([data-search-term*="' + o + '"], .optgroup)').addClass("ms-hidden")) :
                                    s.find(".ms-hidden").removeClass("ms-hidden"),
                                    e.options.searchOptions.showOptGroups ||
                                    s.find(".optgroup").each(function () {
                                        t(this).find("li:not(.ms-hidden)").length ? t(this).show() : t(this).hide();
                                    }),
                                    e._updateSelectAllText();
                            }, e.options.searchOptions.delay)
                        );
                    });
                }
                e.options.selectAll && s.before('<a href="#" class="ms-selectall global">' + e.options.texts.selectAll + "</a>"),
                    o.on("click", ".ms-selectall", function (i) {
                        i.preventDefault(), (e.updateSelectAll = !1), (e.updatePlaceholder = !1);
                        var n = o.parent().siblings(".ms-list-" + e.listNumber + ".jqmsLoaded");
                        if (t(this).hasClass("global"))
                            s.find('li:not(.optgroup, .selected, .ms-hidden) input[type="checkbox"]:not(:disabled)').length ?
                            (s.find('li:not(.optgroup, .selected, .ms-hidden) input[type="checkbox"]:not(:disabled)').closest("li").addClass("selected"),
                                s.find('li.selected input[type="checkbox"]:not(:disabled)').prop("checked", !0)) :
                            (s.find('li:not(.optgroup, .ms-hidden).selected input[type="checkbox"]:not(:disabled)').closest("li").removeClass("selected"),
                                s.find('li:not(.optgroup, .ms-hidden, .selected) input[type="checkbox"]:not(:disabled)').prop("checked", !1));
                        else if (t(this).closest("li").hasClass("optgroup")) {
                            var r = t(this).closest("li.optgroup");
                            r.find('li:not(.selected, .ms-hidden) input[type="checkbox"]:not(:disabled)').length ?
                                (r.find('li:not(.selected, .ms-hidden) input[type="checkbox"]:not(:disabled)').closest("li").addClass("selected"), r.find('li.selected input[type="checkbox"]:not(:disabled)').prop("checked", !0)) :
                                (r.find('li:not(.ms-hidden).selected input[type="checkbox"]:not(:disabled)').closest("li").removeClass("selected"),
                                    r.find('li:not(.ms-hidden, .selected) input[type="checkbox"]:not(:disabled)').prop("checked", !1));
                        }
                        var a = [];
                        s.find('li.selected input[type="checkbox"]').each(function () {
                                a.push(t(this).val());
                            }),
                            n.val(a).trigger("change"),
                            (e.updateSelectAll = !0),
                            (e.updatePlaceholder = !0),
                            "function" == typeof e.options.onSelectAll && e.options.onSelectAll(e.element, a.length),
                            e._updateSelectAllText(),
                            e._updatePlaceholderText();
                    });
                var a = [];
                t(e.element)
                    .children()
                    .each(function () {
                        if ("OPTGROUP" == this.nodeName) {
                            var i = [];
                            t(this)
                                .children("option")
                                .each(function () {
                                    for (var o = {}, s = 0; s < e.options.optionAttributes.length; s++) {
                                        var n = e.options.optionAttributes[s];
                                        void 0 !== t(this).attr(n) && (o[n] = t(this).attr(n));
                                    }
                                    i.push({
                                        name: t(this).text(),
                                        value: t(this).val(),
                                        checked: t(this).prop("selected"),
                                        attributes: o
                                    });
                                }),
                                a.push({
                                    label: t(this).attr("label"),
                                    options: i
                                });
                        } else {
                            if ("OPTION" != this.nodeName) return !0;
                            for (var o = {}, s = 0; s < e.options.optionAttributes.length; s++) {
                                var n = e.options.optionAttributes[s];
                                void 0 !== t(this).attr(n) && (o[n] = t(this).attr(n));
                            }
                            a.push({
                                name: t(this).text(),
                                value: t(this).val(),
                                checked: t(this).prop("selected"),
                                attributes: o
                            });
                        }
                    }),
                    e.loadOptions(a, !0, !1),
                    o.on("click", 'input[type="checkbox"]', function () {
                        t(this).closest("li").toggleClass("selected"),
                            o
                            .parent()
                            .siblings(".ms-list-" + e.listNumber + ".jqmsLoaded")
                            .find('option[value="' + e._escapeSelector(t(this).val()) + '"]')
                            .prop("selected", t(this).is(":checked"))
                            .closest("select")
                            .trigger("change"),
                            "function" == typeof e.options.onOptionClick && e.options.onOptionClick(e.element, this),
                            e._updateSelectAllText(),
                            e._updatePlaceholderText();
                    }),
                    o
                    .on("focusin", 'input[type="checkbox"]', function () {
                        t(this).closest("label").addClass("focused");
                    })
                    .on("focusout", 'input[type="checkbox"]', function () {
                        t(this).closest("label").removeClass("focused");
                    }),
                    "function" == typeof e.options.onLoad && e.options.onLoad(e.element),
                    t(e.element).hide();
            },
            loadOptions: function (e, i, o) {
                (i = "boolean" != typeof i || i), (o = "boolean" != typeof o || o);
                var s = t(this.element),
                    n = s.siblings("#ms-list-" + this.listNumber + ".ms-options-wrap").find("> .ms-options > ul"),
                    r = s.siblings("#ms-list-" + this.listNumber + ".ms-options-wrap").find("> .ms-options");
                i && (n.find("> li").remove(), o && s.find("> *").remove());
                var a = [];
                for (var l in e)
                    if (e.hasOwnProperty(l)) {
                        var d = e[l],
                            c = t("<li/>"),
                            u = !0;
                        if (d.hasOwnProperty("value")) {
                            if ((this.options.showCheckbox && this.options.checkboxAutoFit && c.addClass("ms-reflow"), this._addOption(c, d), o)) {
                                var p = t("<option/>", {
                                    value: d.value,
                                    text: d.name
                                });
                                d.hasOwnProperty("attributes") && Object.keys(d.attributes).length && p.attr(d.attributes), d.checked && p.prop("selected", !0), s.append(p);
                            }
                        } else {
                            if (!d.hasOwnProperty("options")) continue;
                            var h = t("<optgroup/>", {
                                label: d.label
                            });
                            for (var f in (n.find("> li.optgroup > span.label").each(function () {
                                        t(this).text() == d.label && ((c = t(this).closest(".optgroup")), (u = !1));
                                    }),
                                    o && (s.find('optgroup[label="' + d.label + '"]').length ? (h = s.find('optgroup[label="' + d.label + '"]')) : s.append(h)),
                                    u &&
                                    (c.addClass("optgroup"),
                                        c.append('<span class="label">' + d.label + "</span>"),
                                        c.find("> .label").css({
                                            clear: "both"
                                        }),
                                        this.options.selectGroup && c.append('<a href="#" class="ms-selectall">' + this.options.texts.selectAll + "</a>"),
                                        c.append("<ul/>")),
                                    d.options))
                                if (d.options.hasOwnProperty(f)) {
                                    var m = d.options[f],
                                        g = t("<li/>");
                                    if ((this.options.showCheckbox && this.options.checkboxAutoFit && g.addClass("ms-reflow"), m.hasOwnProperty("value") && (this._addOption(g, m), c.find("> ul").append(g), o))) {
                                        p = t("<option/>", {
                                            value: m.value,
                                            text: m.name
                                        });
                                        m.hasOwnProperty("attributes") && Object.keys(m.attributes).length && p.attr(m.attributes), m.checked && p.prop("selected", !0), h.append(p);
                                    }
                                }
                        }
                        u && a.push(c);
                    }
                if ((n.append(a), this.options.checkboxAutoFit && this.options.showCheckbox && !r.hasClass("hide-checkbox"))) {
                    var v = n.find('.ms-reflow:eq(0) input[type="checkbox"]');
                    if (v.length) {
                        var y = v.outerWidth();
                        (y = y || 15), n.find(".ms-reflow label").css("padding-left", 2 * parseInt(v.closest("label").css("padding-left")) + y), n.find(".ms-reflow").removeClass("ms-reflow");
                    }
                }
                this._updatePlaceholderText(),
                    r.find("ul").css({
                        "column-count": "",
                        "column-gap": "",
                        "-webkit-column-count": "",
                        "-webkit-column-gap": "",
                        "-moz-column-count": "",
                        "-moz-column-gap": ""
                    }),
                    s.find("optgroup").length ?
                    (n.find("> li:not(.optgroup)").css({
                            float: "left",
                            width: 100 / this.options.columns + "%"
                        }),
                        n
                        .find("li.optgroup")
                        .css({
                            clear: "both"
                        })
                        .find("> ul")
                        .css({
                            "column-count": this.options.columns,
                            "column-gap": 0,
                            "-webkit-column-count": this.options.columns,
                            "-webkit-column-gap": 0,
                            "-moz-column-count": this.options.columns,
                            "-moz-column-gap": 0
                        }),
                        this._ieVersion() && this._ieVersion() < 10 && n.find("li.optgroup > ul > li").css({
                            float: "left",
                            width: 100 / this.options.columns + "%"
                        })) :
                    (n.css({
                            "column-count": this.options.columns,
                            "column-gap": 0,
                            "-webkit-column-count": this.options.columns,
                            "-webkit-column-gap": 0,
                            "-moz-column-count": this.options.columns,
                            "-moz-column-gap": 0
                        }),
                        this._ieVersion() && this._ieVersion() < 10 && n.find("> li").css({
                            float: "left",
                            width: 100 / this.options.columns + "%"
                        })),
                    this._updateSelectAllText();
            },
            settings: function (e) {
                (this.options = t.extend(!0, {}, this.options, e)), this.reload();
            },
            unload: function () {
                t(this.element)
                    .siblings("#ms-list-" + this.listNumber + ".ms-options-wrap")
                    .remove(),
                    t(this.element).show(function () {
                        t(this).css("display", "").removeClass("jqmsLoaded");
                    });
            },
            reload: function () {
                t(this.element)
                    .siblings("#ms-list-" + this.listNumber + ".ms-options-wrap")
                    .remove(),
                    t(this.element).removeClass("jqmsLoaded"),
                    this.load();
            },
            reset: function () {
                var e = [];
                t(this.element)
                    .find("option")
                    .each(function () {
                        t(this).prop("defaultSelected") && e.push(t(this).val());
                    }),
                    t(this.element).val(e),
                    this.reload();
            },
            disable: function (e) {
                (e = "boolean" != typeof e || e),
                t(this.element).prop("disabled", e),
                    t(this.element)
                    .siblings("#ms-list-" + this.listNumber + ".ms-options-wrap")
                    .find("button:first-child")
                    .prop("disabled", e);
            },
            _updateSelectAllText: function () {
                if (this.updateSelectAll) {
                    var e = this;
                    if (e.options.selectAll || e.options.selectGroup)
                        t(e.element)
                        .siblings("#ms-list-" + e.listNumber + ".ms-options-wrap")
                        .find("> .ms-options")
                        .find(".ms-selectall")
                        .each(function () {
                            var i = t(this).parent().find("li:not(.optgroup,.selected,.ms-hidden)");
                            t(this).text(i.length ? e.options.texts.selectAll : e.options.texts.unselectAll);
                        });
                }
            },
            _updatePlaceholderText: function () {
                if (this.updatePlaceholder) {
                    var e = t(this.element),
                        i = e.val() ? e.val() : [],
                        o = e.siblings("#ms-list-" + this.listNumber + ".ms-options-wrap").find("> button:first-child"),
                        s = o.find("span"),
                        n = e.siblings("#ms-list-" + this.listNumber + ".ms-options-wrap").find("> .ms-options");
                    e.find("option:selected:disabled").length &&
                        ((i = []),
                            e.find("option:selected").each(function () {
                                i.push(t(this).val());
                            }));
                    var r = [];
                    for (var a in i)
                        if (i.hasOwnProperty(a) && (r.push(t.trim(e.find('option[value="' + this._escapeSelector(i[a]) + '"]').text())), r.length >= this.options.maxPlaceholderOpts)) break;
                    s.text(r.join(", ")),
                        r.length ?
                        (n.closest(".ms-options-wrap").addClass("ms-has-selections"), "function" == typeof this.options.onPlaceholder && this.options.onPlaceholder(this.element, s, r)) :
                        n.closest(".ms-options-wrap").removeClass("ms-has-selections"),
                        r.length ? (s.width() > o.width() || r.length != i.length) && s.text(i.length + this.options.texts.selectedOptions) : s.text(this.options.texts.placeholder);
                }
            },
            _addOption: function (e, i) {
                var s = t("<div/>").html(i.name).text(),
                    n = t("<label/>", {
                        for: "ms-opt-" + o
                    }).html(i.name),
                    r = t("<input>", {
                        type: "checkbox",
                        title: s,
                        id: "ms-opt-" + o,
                        value: i.value
                    });
                i.hasOwnProperty("attributes") && Object.keys(i.attributes).length && r.attr(i.attributes), i.checked && (e.addClass("default selected"), r.prop("checked", !0)), n.prepend(r);
                var a = "";
                this.options.searchOptions.searchText && (a += " " + s.toLowerCase()), this.options.searchOptions.searchValue && (a += " " + i.value.toLowerCase()), e.attr("data-search-term", t.trim(a)).prepend(n), (o += 1);
            },
            _ieVersion: function () {
                var t = navigator.userAgent.toLowerCase();
                return -1 != t.indexOf("msie") && parseInt(t.split("msie")[1]);
            },
            _escapeSelector: function (e) {
                return "function" == typeof t.escapeSelector ? t.escapeSelector(e) : e.replace(/[!"#$%&'()*+,.\/:;<=>?@[\\\]^`{|}~]/g, "\\$&");
            },
        }),
        (t.fn.multiselect = function (e) {
            if (this.length) {
                var i,
                    o = arguments;
                return void 0 === e || "object" == typeof e ?
                    this.each(function () {
                        t.data(this, "plugin_multiselect") || t.data(this, "plugin_multiselect", new s(this, e));
                    }) :
                    "string" == typeof e && "_" !== e[0] && "init" !== e ?
                    (this.each(function () {
                            var n = t.data(this, "plugin_multiselect");
                            n instanceof s && "function" == typeof n[e] && (i = n[e].apply(n, Array.prototype.slice.call(o, 1))), "unload" === e && t.data(this, "plugin_multiselect", null);
                        }),
                        i) :
                    void 0;
            }
        });
})(jQuery),

// Touch lib
(function (t) {
    function e(t, e) {
        if (!(t.originalEvent.touches.length > 1)) {
            t.preventDefault();
            var i = t.originalEvent.changedTouches[0],
                o = document.createEvent("MouseEvents");
            o.initMouseEvent(e, !0, !0, window, 1, i.screenX, i.screenY, i.clientX, i.clientY, !1, !1, !1, !1, 0, null), t.target.dispatchEvent(o);
        }
    }
    if (t.ui && ((t.support.touch = "ontouchend" in document), t.support.touch)) {
        var i,
            o = t.ui.mouse.prototype,
            s = o._mouseInit,
            n = o._mouseDestroy;
        (o._touchStart = function (t) {
            !i && this._mouseCapture(t.originalEvent.changedTouches[0]) && ((i = !0), (this._touchMoved = !1), e(t, "mouseover"), e(t, "mousemove"), e(t, "mousedown"));
        }),
        (o._touchMove = function (t) {
            i && ((this._touchMoved = !0), e(t, "mousemove"));
        }),
        (o._touchEnd = function (t) {
            i && (e(t, "mouseup"), e(t, "mouseout"), this._touchMoved || e(t, "click"), (i = !1));
        }),
        (o._mouseInit = function () {
            var e = this;
            e.element.bind({
                touchstart: t.proxy(e, "_touchStart"),
                touchmove: t.proxy(e, "_touchMove"),
                touchend: t.proxy(e, "_touchEnd")
            }), s.call(e);
        }),
        (o._mouseDestroy = function () {
            var e = this;
            e.element.unbind({
                touchstart: t.proxy(e, "_touchStart"),
                touchmove: t.proxy(e, "_touchMove"),
                touchend: t.proxy(e, "_touchEnd")
            }), n.call(e);
        });
    }
})(jQuery),

// JSSocials
(function (t, e, i) {
    function o(t, i) {
        var o = e(t);
        o.data(s, this), (this._$element = o), (this.shares = []), this._init(i), this._render();
    }
    var s = "JSSocials",
        n = function (t, i) {
            return e.isFunction(t) ? t.apply(i, e.makeArray(arguments).slice(2)) : t;
        },
        r = /(\.(jpeg|png|gif|bmp|svg)$|^data:image\/(jpeg|png|gif|bmp|svg\+xml);base64)/i,
        a = /(&?[a-zA-Z0-9]+=)?\{([a-zA-Z0-9]+)\}/g,
        l = {
            G: 1e9,
            M: 1e6,
            K: 1e3
        },
        d = {};
    (o.prototype = {
        url: "",
        text: "",
        shareIn: "blank",
        showLabel: function (t) {
            return !1 === this.showCount ? t > this.smallScreenWidth : t >= this.largeScreenWidth;
        },
        showCount: function (t) {
            return !(t <= this.smallScreenWidth) || "inside";
        },
        smallScreenWidth: 640,
        largeScreenWidth: 1024,
        resizeTimeout: 200,
        elementClass: "jssocials",
        sharesClass: "jssocials-shares",
        shareClass: "jssocials-share",
        shareButtonClass: "jssocials-share-button",
        shareLinkClass: "jssocials-share-link",
        shareLogoClass: "jssocials-share-logo",
        shareLabelClass: "jssocials-share-label",
        shareLinkCountClass: "jssocials-share-link-count",
        shareCountBoxClass: "jssocials-share-count-box",
        shareCountClass: "jssocials-share-count",
        shareZeroCountClass: "jssocials-share-no-count",
        _init: function (t) {
            this._initDefaults(), e.extend(this, t), this._initShares(), this._attachWindowResizeCallback();
        },
        _initDefaults: function () {
            (this.url = t.location.href), (this.text = e.trim(e("meta[name=description]").attr("content") || e("title").text()));
        },
        _initShares: function () {
            this.shares = e.map(
                this.shares,
                e.proxy(function (t) {
                    "string" == typeof t && (t = {
                        share: t
                    });
                    var i = t.share && d[t.share];
                    if (!i && !t.renderer) throw Error("Share '" + t.share + "' is not found");
                    return e.extend({
                        url: this.url,
                        text: this.text
                    }, i, t);
                }, this)
            );
        },
        _attachWindowResizeCallback: function () {
            e(t).on("resize", e.proxy(this._windowResizeHandler, this));
        },
        _detachWindowResizeCallback: function () {
            e(t).off("resize", this._windowResizeHandler);
        },
        _windowResizeHandler: function () {
            (e.isFunction(this.showLabel) || e.isFunction(this.showCount)) && (t.clearTimeout(this._resizeTimer), (this._resizeTimer = setTimeout(e.proxy(this.refresh, this), this.resizeTimeout)));
        },
        _render: function () {
            this._clear(), this._defineOptionsByScreen(), this._$element.addClass(this.elementClass), (this._$shares = e("<div>").addClass(this.sharesClass).appendTo(this._$element)), this._renderShares();
        },
        _defineOptionsByScreen: function () {
            (this._screenWidth = e(t).width()), (this._showLabel = n(this.showLabel, this, this._screenWidth)), (this._showCount = n(this.showCount, this, this._screenWidth));
        },
        _renderShares: function () {
            e.each(
                this.shares,
                e.proxy(function (t, e) {
                    this._renderShare(e);
                }, this)
            );
        },
        _renderShare: function (t) {
            (e.isFunction(t.renderer) ? e(t.renderer()) : this._createShare(t))
            .addClass(this.shareClass)
                .addClass(t.share ? "jssocials-share-" + t.share : "")
                .addClass(t.css)
                .appendTo(this._$shares);
        },
        _createShare: function (t) {
            var i = e("<div>"),
                o = this._createShareLink(t).appendTo(i);
            if (this._showCount) {
                var s = "inside" === this._showCount,
                    n = s ? o : e("<div>").addClass(this.shareCountBoxClass).appendTo(i);
                n.addClass(s ? this.shareLinkCountClass : this.shareCountBoxClass), this._renderShareCount(t, n);
            }
            return i;
        },
        _createShareLink: function (t) {
            var i = this._getShareStrategy(t).call(t, {
                shareUrl: this._getShareUrl(t)
            });
            return (
                i.addClass(this.shareLinkClass).append(this._createShareLogo(t)),
                this._showLabel && i.append(this._createShareLabel(t)),
                e.each(this.on || {}, function (o, s) {
                    e.isFunction(s) && i.on(o, e.proxy(s, t));
                }),
                i
            );
        },
        _getShareStrategy: function (t) {
            var e = c[t.shareIn || this.shareIn];
            if (!e) throw Error("Share strategy '" + this.shareIn + "' not found");
            return e;
        },
        _getShareUrl: function (t) {
            var e = n(t.shareUrl, t);
            return this._formatShareUrl(e, t);
        },
        _createShareLogo: function (t) {
            var i = t.logo,
                o = e('<svg><use xlink:href="#' + i + '"></use></svg>');
            return o;
        },
        _createShareLabel: function (t) {
            return e("<span>").addClass(this.shareLabelClass).text(t.label);
        },
        _renderShareCount: function (t, i) {
            var o = e("<span>").addClass(this.shareCountClass);
            i.addClass(this.shareZeroCountClass).append(o),
                this._loadCount(t).done(
                    e.proxy(function (t) {
                        t && (i.removeClass(this.shareZeroCountClass), o.text(t));
                    }, this)
                );
        },
        _loadCount: function (t) {
            var i = e.Deferred(),
                o = this._getCountUrl(t);
            if (!o) return i.resolve(0).promise();
            var s = e.proxy(function (e) {
                i.resolve(this._getCountValue(e, t));
            }, this);
            return (
                e
                .getJSON(o)
                .done(s)
                .fail(function () {
                    e.get(o)
                        .done(s)
                        .fail(function () {
                            i.resolve(0);
                        });
                }),
                i.promise()
            );
        },
        _getCountUrl: function (t) {
            var e = n(t.countUrl, t);
            return this._formatShareUrl(e, t);
        },
        _getCountValue: function (t, i) {
            var o = (e.isFunction(i.getCount) ? i.getCount(t) : t) || 0;
            return "string" == typeof o ? o : this._formatNumber(o);
        },
        _formatNumber: function (t) {
            return (
                e.each(l, function (e, i) {
                    return t >= i ? ((t = parseFloat((t / i).toFixed(2)) + e), !1) : void 0;
                }),
                t
            );
        },
        _formatShareUrl: function (e, i) {
            return e.replace(a, function (e, o, s) {
                var n = i[s] || "";
                return n ? (o || "") + t.encodeURIComponent(n) : "";
            });
        },
        _clear: function () {
            t.clearTimeout(this._resizeTimer), this._$element.empty();
        },
        _passOptionToShares: function (t, i) {
            var o = this.shares;
            e.each(["url", "text"], function (s, n) {
                n === t &&
                    e.each(o, function (e, o) {
                        o[t] = i;
                    });
            });
        },
        _normalizeShare: function (t) {
            return e.isNumeric(t) ?
                this.shares[t] :
                "string" == typeof t ?
                e.grep(this.shares, function (e) {
                    return e.share === t;
                })[0] :
                t;
        },
        refresh: function () {
            this._render();
        },
        destroy: function () {
            this._clear(), this._detachWindowResizeCallback(), this._$element.removeClass(this.elementClass).removeData(s);
        },
        option: function (t, e) {
            return 1 === arguments.length ? this[t] : ((this[t] = e), this._passOptionToShares(t, e), void this.refresh());
        },
        shareOption: function (t, e, i) {
            return (t = this._normalizeShare(t)), 2 === arguments.length ? t[e] : ((t[e] = i), void this.refresh());
        },
    }),
    (e.fn.jsSocials = function (t) {
        var n = e.makeArray(arguments),
            r = n.slice(1),
            a = this;
        return (
            this.each(function () {
                var n,
                    l = e(this),
                    d = l.data(s);
                if (d)
                    if ("string" == typeof t) {
                        if ((n = d[t].apply(d, r)) !== i && n !== d) return (a = n), !1;
                    } else d._detachWindowResizeCallback(), d._init(t), d._render();
                else new o(l, t);
            }),
            a
        );
    });
    var c = {
        popup: function (i) {
            return e("<a>")
                .attr("href", "#")
                .on("click", function () {
                    return t.open(i.shareUrl, null, "width=600, height=400, location=0, menubar=0, resizeable=0, scrollbars=0, status=0, titlebar=0, toolbar=0"), !1;
                });
        },
        blank: function (t) {
            return e("<a>").attr({
                target: "_blank",
                href: t.shareUrl
            });
        },
        self: function (t) {
            return e("<a>").attr({
                target: "_self",
                href: t.shareUrl
            });
        },
    };
    t.jsSocials = {
        Socials: o,
        shares: d,
        shareStrategies: c,
        setDefaults: function (t) {
            var i;
            e.isPlainObject(t) ? (i = o.prototype) : ((i = d[t]), (t = arguments[1] || {})), e.extend(i, t);
        },
    };
})(window, jQuery),
(function (t, e, i) {
    e.extend(i.shares, {
        email: {
            label: "E-mail",
            logo: "social-email",
            shareUrl: "mailto:{to}?subject={text}&body={url}",
            countUrl: "",
            shareIn: "self"
        },
        twitter: {
            label: "Tweet",
            logo: "social-twitter",
            shareUrl: "https://twitter.com/share?url={url}&text={text}&via={via}&hashtags={hashtags}",
            countUrl: ""
        },
        facebook: {
            label: "Like",
            logo: "social-facebook",
            shareUrl: "https://facebook.com/sharer/sharer.php?u={url}",
            countUrl: "https://graph.facebook.com/?id={url}",
            getCount: function (t) {
                return (t.share && t.share.share_count) || 0;
            },
        },
        vkontakte: {
            label: "Like",
            logo: "social-vk",
            shareUrl: "https://vk.com/share.php?url={url}&title={title}&description={text}",
            countUrl: "https://vk.com/share.php?act=count&index=1&url={url}",
            getCount: function (t) {
                return parseInt(t.slice(15, -2).split(", ")[1]);
            },
        },
        googleplus: {
            label: "+1",
            logo: "social-google",
            shareUrl: "https://plus.google.com/share?url={url}",
            countUrl: ""
        },
        linkedin: {
            label: "Share",
            logo: "social-linkedin",
            shareUrl: "https://www.linkedin.com/shareArticle?mini=true&url={url}",
            countUrl: "https://www.linkedin.com/countserv/count/share?format=jsonp&url={url}&callback=?",
            getCount: function (t) {
                return t.count;
            },
        },
        pinterest: {
            label: "Pin it",
            logo: "social-pinterest",
            shareUrl: "https://pinterest.com/pin/create/bookmarklet/?media={media}&url={url}&description={text}",
            countUrl: "https://api.pinterest.com/v1/urls/count.json?&url={url}&callback=?",
            getCount: function (t) {
                return t.count;
            },
        },
        stumbleupon: {
            label: "Share",
            logo: "social-stumbleupon",
            shareUrl: "http://www.stumbleupon.com/submit?url={url}&title={title}",
            countUrl: "https://cors-anywhere.herokuapp.com/https://www.stumbleupon.com/services/1.01/badge.getinfo?url={url}",
            getCount: function (t) {
                return t.result.views;
            },
        },
        telegram: {
            label: "Telegram",
            logo: "social-telegram",
            shareUrl: "tg://msg?text={url} {text}",
            countUrl: "",
            shareIn: "self"
        },
        whatsapp: {
            label: "WhatsApp",
            logo: "social-whatsapp",
            shareUrl: "whatsapp://send?text={url} {text}",
            countUrl: "",
            shareIn: "self"
        },
        line: {
            label: "LINE",
            logo: "social-comment",
            shareUrl: "http://line.me/R/msg/text/?{text} {url}",
            countUrl: ""
        },
        viber: {
            label: "Viber",
            logo: "social-viber",
            shareUrl: "viber://forward?text={url} {text}",
            countUrl: "",
            shareIn: "self"
        },
        pocket: {
            label: "Pocket",
            logo: "social-pocket",
            shareUrl: "https://getpocket.com/save?url={url}&title={title}",
            countUrl: ""
        },
        messenger: {
            label: "Share",
            logo: "social-share",
            shareUrl: "fb-messenger://share?link={url}",
            countUrl: "",
            shareIn: "self"
        },
    });
})(window, jQuery, window.jsSocials),

// Odometer
function () {
    var t,
        e,
        i,
        o,
        s,
        n,
        r,
        a,
        l,
        d,
        c,
        u,
        p,
        h,
        f,
        m,
        g,
        v,
        y,
        w = [].slice;
    (t = /^\(?([^)]*)\)?(?:(.)(d+))?$/),
    (u = document.createElement("div").style),
    (o = null != u.transition || null != u.webkitTransition || null != u.mozTransition || null != u.oTransition),
    (d = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame),
    (e = window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver),
    (n = function (t) {
        var e;
        return ((e = document.createElement("div")).innerHTML = t), e.children[0];
    }),
    (l = function (t, e) {
        return (t.className = t.className.replace(new RegExp("(^| )" + e.split(" ").join("|") + "( |$)", "gi"), " "));
    }),
    (s = function (t, e) {
        return l(t, e), (t.className += " " + e);
    }),
    (p = function (t, e) {
        var i;
        if (null != document.createEvent) return (i = document.createEvent("HTMLEvents")).initEvent(e, !0, !0), t.dispatchEvent(i);
    }),
    (a = function () {
        var t, e;
        return null != (t = null != (e = window.performance) && "function" == typeof e.now ? e.now() : void 0) ? t : +new Date();
    }),
    (c = function (t, e) {
        return null == e && (e = 0), e ? ((t *= Math.pow(10, e)), (t += 0.5), (t = Math.floor(t)) / Math.pow(10, e)) : Math.round(t);
    }),
    (h = function (t) {
        return t < 0 ? Math.ceil(t) : Math.floor(t);
    }),
    (r = function (t) {
        return t - c(t);
    }),
    (m = !1),
    (f = function () {
        var t, e, i, o, s;
        if (!m && null != window.jQuery) {
            for (m = !0, s = [], e = 0, i = (o = ["html", "text"]).length; e < i; e++)
                (t = o[e]),
                s.push(
                    (function (t) {
                        var e;
                        return (
                            (e = window.jQuery.fn[t]),
                            (window.jQuery.fn[t] = function (t) {
                                var i;
                                return null == t || null == (null != (i = this[0]) ? i.odometer : void 0) ? e.apply(this, arguments) : this[0].odometer.update(t);
                            })
                        );
                    })(t)
                );
            return s;
        }
    })(),
    setTimeout(f, 0),
        ((i = (function () {
            function i(t) {
                var e,
                    o,
                    s,
                    n,
                    r,
                    a,
                    l,
                    d,
                    c,
                    u = this;
                if (((this.options = t), (this.el = this.options.el), null != this.el.odometer)) return this.el.odometer;
                for (e in ((this.el.odometer = this), (l = i.options)))(s = l[e]), null == this.options[e] && (this.options[e] = s);
                null == (n = this.options).duration && (n.duration = 2e3),
                    (this.MAX_VALUES = (this.options.duration / (1e3 / 30) / 2) | 0),
                    this.resetFormat(),
                    (this.value = this.cleanValue(null != (d = this.options.value) ? d : "")),
                    this.renderInside(),
                    this.render();
                try {
                    for (r = 0, a = (c = ["innerHTML", "innerText", "textContent"]).length; r < a; r++)
                        (o = c[r]),
                        null != this.el[o] &&
                        (function (t) {
                            Object.defineProperty(u.el, t, {
                                get: function () {
                                    var e;
                                    return "innerHTML" === t ? u.inside.outerHTML : null != (e = u.inside.innerText) ? e : u.inside.textContent;
                                },
                                set: function (t) {
                                    return u.update(t);
                                },
                            });
                        })(o);
                } catch (t) {
                    t,
                    this.watchForMutations();
                }
            }
            return (
                (i.prototype.renderInside = function () {
                    return (this.inside = document.createElement("div")), (this.inside.className = "odometer-inside"), (this.el.innerHTML = ""), this.el.appendChild(this.inside);
                }),
                (i.prototype.watchForMutations = function () {
                    var t = this;
                    if (null != e)
                        try {
                            return (
                                null == this.observer &&
                                (this.observer = new e(function (e) {
                                    var i;
                                    return (i = t.el.innerText), t.renderInside(), t.render(t.value), t.update(i);
                                })),
                                (this.watchMutations = !0),
                                this.startWatchingMutations()
                            );
                        } catch (t) {
                            t;
                        }
                }),
                (i.prototype.startWatchingMutations = function () {
                    if (this.watchMutations) return this.observer.observe(this.el, {
                        childList: !0
                    });
                }),
                (i.prototype.stopWatchingMutations = function () {
                    var t;
                    return null != (t = this.observer) ? t.disconnect() : void 0;
                }),
                (i.prototype.cleanValue = function (t) {
                    var e;
                    return (
                        "string" == typeof t && ((t = (t = (t = t.replace(null != (e = this.format.radix) ? e : ".", "<radix>")).replace(/[.,]/g, "")).replace("<radix>", ".")), (t = parseFloat(t, 10) || 0)), c(t, this.format.precision)
                    );
                }),
                (i.prototype.bindTransitionEnd = function () {
                    var t,
                        e,
                        i,
                        o,
                        s,
                        n,
                        r = this;
                    if (!this.transitionEndBound) {
                        for (this.transitionEndBound = !0, e = !1, n = [], i = 0, o = (s = "transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd".split(" ")).length; i < o; i++)
                            (t = s[i]),
                            n.push(
                                this.el.addEventListener(
                                    t,
                                    function () {
                                        return (
                                            e ||
                                            ((e = !0),
                                                setTimeout(function () {
                                                    return r.render(), (e = !1), p(r.el, "odometerdone");
                                                }, 0)),
                                            !0
                                        );
                                    },
                                    !1
                                )
                            );
                        return n;
                    }
                }),
                (i.prototype.resetFormat = function () {
                    var e, i, o, s, n, r, a, l;
                    if (((e = null != (a = this.options.format) ? a : "(,ddd).dd") || (e = "d"), !(o = t.exec(e)))) throw new Error("Odometer: Unparsable digit format");
                    return (r = (l = o.slice(1, 4))[0]), (n = l[1]), (s = (null != (i = l[2]) ? i.length : void 0) || 0), (this.format = {
                        repeating: r,
                        radix: n,
                        precision: s
                    });
                }),
                (i.prototype.render = function (t) {
                    var e, i, s, n, r, a, l;
                    for (null == t && (t = this.value), this.stopWatchingMutations(), this.resetFormat(), this.inside.innerHTML = "", r = this.options.theme, n = [], a = 0, l = (e = this.el.className.split(" ")).length; a < l; a++)
                        (i = e[a]).length && ((s = /^odometer-theme-(.+)$/.exec(i)) ? (r = s[1]) : /^odometer(-|$)/.test(i) || n.push(i));
                    return (
                        n.push("odometer"),
                        o || n.push("odometer-no-transitions"),
                        r ? n.push("odometer-theme-" + r) : n.push("odometer-auto-theme"),
                        (this.el.className = n.join(" ")),
                        (this.ribbons = {}),
                        this.formatDigits(t),
                        this.startWatchingMutations()
                    );
                }),
                (i.prototype.formatDigits = function (t) {
                    var e, i, o, s, n, a, l, d, c;
                    if (((this.digits = []), this.options.formatFunction))
                        for (s = 0, a = (d = this.options.formatFunction(t).split("").reverse()).length; s < a; s++)
                            (i = d[s]).match(/0-9/) ? (((e = this.renderDigit()).querySelector(".odometer-value").innerHTML = i), this.digits.push(e), this.insertDigit(e)) : this.addSpacer(i);
                    else
                        for (o = !this.format.precision || !r(t) || !1, n = 0, l = (c = t.toString().split("").reverse()).length; n < l; n++) "." === (e = c[n]) && (o = !0), this.addDigit(e, o);
                }),
                (i.prototype.update = function (t) {
                    var e,
                        i = this;
                    if ((e = (t = this.cleanValue(t)) - this.value))
                        return (
                            l(this.el, "odometer-animating-up odometer-animating-down odometer-animating"),
                            s(this.el, e > 0 ? "odometer-animating-up" : "odometer-animating-down"),
                            this.stopWatchingMutations(),
                            this.animate(t),
                            this.startWatchingMutations(),
                            setTimeout(function () {
                                return i.el.offsetHeight, s(i.el, "odometer-animating");
                            }, 0),
                            (this.value = t)
                        );
                }),
                (i.prototype.renderDigit = function () {
                    return n(
                        '<span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value"></span></span></span></span></span>'
                    );
                }),
                (i.prototype.insertDigit = function (t, e) {
                    return null != e ? this.inside.insertBefore(t, e) : this.inside.children.length ? this.inside.insertBefore(t, this.inside.children[0]) : this.inside.appendChild(t);
                }),
                (i.prototype.addSpacer = function (t, e, i) {
                    var o;
                    return ((o = n('<span class="odometer-formatting-mark"></span>')).innerHTML = t), i && s(o, i), this.insertDigit(o, e);
                }),
                (i.prototype.addDigit = function (t, e) {
                    var i, o, s, n;
                    if ((null == e && (e = !0), "-" === t)) return this.addSpacer(t, null, "odometer-negation-mark");
                    if ("." === t) return this.addSpacer(null != (n = this.format.radix) ? n : ".", null, "odometer-radix-mark");
                    if (e)
                        for (s = !1;;) {
                            if (!this.format.repeating.length) {
                                if (s) throw new Error("Bad odometer format without digits");
                                this.resetFormat(), (s = !0);
                            }
                            if (((i = this.format.repeating[this.format.repeating.length - 1]), (this.format.repeating = this.format.repeating.substring(0, this.format.repeating.length - 1)), "d" === i)) break;
                            this.addSpacer(i);
                        }
                    return ((o = this.renderDigit()).querySelector(".odometer-value").innerHTML = t), this.digits.push(o), this.insertDigit(o);
                }),
                (i.prototype.animate = function (t) {
                    return o && "count" !== this.options.animation ? this.animateSlide(t) : this.animateCount(t);
                }),
                (i.prototype.animateCount = function (t) {
                    var e,
                        i,
                        o,
                        s,
                        n,
                        r = this;
                    if ((i = +t - this.value))
                        return (
                            (s = o = a()),
                            (e = this.value),
                            (n = function () {
                                var l, c;
                                return a() - s > r.options.duration ?
                                    ((r.value = t), r.render(), void p(r.el, "odometerdone")) :
                                    ((l = a() - o) > 50 && ((o = a()), (c = l / r.options.duration), (e += i * c), r.render(Math.round(e))), null != d ? d(n) : setTimeout(n, 50));
                            })()
                        );
                }),
                (i.prototype.getDigitCount = function () {
                    var t, e, i, o, s, n;
                    for (t = s = 0, n = (o = 1 <= arguments.length ? w.call(arguments, 0) : []).length; s < n; t = ++s)(i = o[t]), (o[t] = Math.abs(i));
                    return (e = Math.max.apply(Math, o)), Math.ceil(Math.log(e + 1) / Math.log(10));
                }),
                (i.prototype.getFractionalDigitCount = function () {
                    var t, e, i, o, s, n, r;
                    for (e = /^\-?\d*\.(\d*?)0*$/, t = n = 0, r = (s = 1 <= arguments.length ? w.call(arguments, 0) : []).length; n < r; t = ++n)
                        (o = s[t]), (s[t] = o.toString()), (i = e.exec(s[t])), (s[t] = null == i ? 0 : i[1].length);
                    return Math.max.apply(Math, s);
                }),
                (i.prototype.resetDigits = function () {
                    return (this.digits = []), (this.ribbons = []), (this.inside.innerHTML = ""), this.resetFormat();
                }),
                (i.prototype.animateSlide = function (t) {
                    var e, i, o, n, r, a, l, d, c, u, p, f, m, g, v, y, w, b, k, S, x, C, T, _, $, O, M;
                    if (((y = this.value), (d = this.getFractionalDigitCount(y, t)) && ((t *= Math.pow(10, d)), (y *= Math.pow(10, d))), (o = t - y))) {
                        for (this.bindTransitionEnd(), n = this.getDigitCount(y, t), r = [], e = 0, p = k = 0; 0 <= n ? k < n : k > n; p = 0 <= n ? ++k : --k) {
                            if (((w = h(y / Math.pow(10, n - p - 1))), (a = (l = h(t / Math.pow(10, n - p - 1))) - w), Math.abs(a) > this.MAX_VALUES)) {
                                for (u = [], f = a / (this.MAX_VALUES + this.MAX_VALUES * e * 0.5), i = w;
                                    (a > 0 && i < l) || (a < 0 && i > l);) u.push(Math.round(i)), (i += f);
                                u[u.length - 1] !== l && u.push(l), e++;
                            } else
                                u = function () {
                                    M = [];
                                    for (var t = w; w <= l ? t <= l : t >= l; w <= l ? t++ : t--) M.push(t);
                                    return M;
                                }.apply(this);
                            for (p = S = 0, C = u.length; S < C; p = ++S)(c = u[p]), (u[p] = Math.abs(c % 10));
                            r.push(u);
                        }
                        for (this.resetDigits(), p = x = 0, T = (O = r.reverse()).length; x < T; p = ++x)
                            for (
                                u = O[p],
                                this.digits[p] || this.addDigit(" ", p >= d),
                                null == (b = this.ribbons)[p] && (b[p] = this.digits[p].querySelector(".odometer-ribbon-inner")),
                                this.ribbons[p].innerHTML = "",
                                o < 0 && (u = u.reverse()),
                                m = $ = 0,
                                _ = u.length; $ < _; m = ++$
                            )
                                (c = u[m]),
                                ((v = document.createElement("div")).className = "odometer-value"),
                                (v.innerHTML = c),
                                this.ribbons[p].appendChild(v),
                                m === u.length - 1 && s(v, "odometer-last-value"),
                                0 === m && s(v, "odometer-first-value");
                        return (
                            w < 0 && this.addDigit("-"),
                            null != (g = this.inside.querySelector(".odometer-radix-mark")) && g.parent.removeChild(g),
                            d ? this.addSpacer(this.format.radix, this.digits[d - 1], "odometer-radix-mark") : void 0
                        );
                    }
                }),
                i
            );
        })()).options = null != (v = window.odometerOptions) ? v : {}),
        setTimeout(function () {
            var t, e, o, s, n;
            if (window.odometerOptions) {
                for (t in ((n = []), (s = window.odometerOptions)))(e = s[t]), n.push(null != (o = i.options)[t] ? (o = i.options)[t] : (o[t] = e));
                return n;
            }
        }, 0),
        (i.init = function () {
            var t, e, o, s, n, r;
            if (null != document.querySelectorAll) {
                for (r = [], o = 0, s = (e = document.querySelectorAll(i.options.selector || ".odometer")).length; o < s; o++)(t = e[o]), r.push((t.odometer = new i({
                    el: t,
                    value: null != (n = t.innerText) ? n : t.textContent
                })));
                return r;
            }
        }),
        null != (null != (y = document.documentElement) ? y.doScroll : void 0) && null != document.createEventObject ?
        ((g = document.onreadystatechange),
            (document.onreadystatechange = function () {
                return "complete" === document.readyState && !1 !== i.options.auto && i.init(), null != g ? g.apply(this, arguments) : void 0;
            })) :
        document.addEventListener(
            "DOMContentLoaded",
            function () {
                if (!1 !== i.options.auto) return i.init();
            },
            !1
        ),
        "function" == typeof define && define.amd ?
        define([], function () {
            return i;
        }) :
        "undefined" != typeof exports && null !== exports ?
        (module.exports = i) :
        (window.Odometer = i);
}.call(this);