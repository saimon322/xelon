"use strict";
!function (e, t) {
    const n = t.document, i = e(n.getElementsByTagName("html")[0]), s = (e(n), (/iPad|iPhone|iPod/.test(navigator.userAgent) || !!navigator.platform && /iPad|iPhone|iPod/.test(navigator.platform)) && !t.MSStream), o = "ontouchstart" in t || navigator.maxTouchPoints || t.DocumentTouch && n instanceof DocumentTouch, r = e => !isNaN(parseFloat(e)) && isFinite(e), a = e => e.stopPropagation(), l = e => t => {
        t.preventDefault(), t.stopPropagation(), "function" == typeof e && e()
    }, c = e => "string" == typeof e ? e : e.attr("id") ? "#" + e.attr("id") : e.attr("class") ? e.prop("tagName").toLowerCase() + "." + e.attr("class").replace(/\s+/g, ".") : c(e.parent()) + " " + e.prop("tagName").toLowerCase(), d = (e, t, n) => {
        const i = n.children(), s = i.length, o = t > -1 ? Math.max(0, Math.min(t - 1, s)) : Math.max(0, Math.min(s + t + 1, s));
        0 === o ? n.prepend(e) : i.eq(o - 1).after(e)
    }, u = e => -1 !== ["left", "right"].indexOf(e) ? "x" : "y", p = (() => {
        const e = (e => {
            const t = ["Webkit", "Moz", "Ms", "O"], i = (n.body || n.documentElement).style, s = e.charAt(0).toUpperCase() + e.slice(1);
            if (void 0 !== i[e]) return e;
            for (let e = 0; e < t.length; e++) if (void 0 !== i[t[e] + s]) return t[e] + s;
            return !1
        })("transform");
        return (t, n, i) => {
            if (e) if (0 === n) t.css(e, ""); else if ("x" === u(i)) {
                const s = "left" === i ? n : -n;
                t.css(e, s ? `translate3d(${s}px,0,0)` : "")
            } else {
                const s = "top" === i ? n : -n;
                t.css(e, s ? `translate3d(0,${s}px,0)` : "")
            } else t.css(i, n)
        }
    })(), h = (e, t, n) => {
        console.warn("%cHC Off-canvas Nav:%c " + n + "%c '" + e + "'%c is now deprecated and will be removed. Use%c '" + t + "'%c instead.", "color: #fa253b", "color: default", "color: #5595c6", "color: default", "color: #5595c6", "color: default")
    };
    let f = 0;
    e.fn.extend({
        hcOffcanvasNav: function (t = {}) {
            if (!this.length) return this;
            const m = this, g = e(n.body);
            t.side && (h("side", "position", "option"), t.position = t.side);
            let v = e.extend({}, {maxWidth: 1024, pushContent: !1, position: "left", levelOpen: "overlap", levelSpacing: 40, levelTitles: !1, navTitle: null, navClass: "", disableBody: !0, closeOnClick: !0, customToggle: null, insertClose: !0, insertBack: !0, labelClose: "Close", labelBack: "Back"}, t), y = [];
            const b = e => {
                if (!y.length) return !1;
                let t = !1;
                "string" == typeof e && (e = [e]);
                let n = e.length;
                for (let i = 0; i < n; i++) -1 !== y.indexOf(e[i]) && (t = !0);
                return t
            };
            return this.each((function () {
                const t = e(this);
                if (!t.find("ul").addBack("ul").length) return void console.error("%c! HC Offcanvas Nav:%c Menu must contain <ul> element.", "color: #fa253b", "color: default");
                f++;
                const h = `hc-nav-${f}`, x = (t => {
                    const n = e(`<style id="${t}">`).appendTo(e("head"));
                    let i = {}, s = {};
                    const o = e => (";" !== e.substr(-1) && (e += ";" !== e.substr(-1) ? ";" : ""), e);
                    return {
                        reset: () => {
                            i = {}, s = {}
                        }, add: (e, t, n) => {
                            e = e.trim(), t = t.trim(), n ? (n = n.trim(), s[n] = s[n] || {}, s[n][e] = o(t)) : i[e] = o(t)
                        }, remove: (e, t) => {
                            e = e.trim(), t ? (t = t.trim(), void 0 !== s[t][e] && delete s[t][e]) : void 0 !== i[e] && delete i[e]
                        }, insert: () => {
                            let e = "";
                            for (let t in s) {
                                e += `@media screen and (${t}) {\n`;
                                for (let n in s[t]) e += `${n} { ${s[t][n]} }\n`;
                                e += "}\n"
                            }
                            for (let t in i) e += `${t} { ${i[t]} }\n`;
                            n.html(e)
                        }
                    }
                })(`hc-offcanvas-${f}-style`);
                let w;
                t.addClass(`hc-nav ${h}`);
                const C = e("<nav>").on("click", a), S = e('<div class="nav-container">').appendTo(C);
                let k, j, T, $ = null, _ = {}, M = !1, E = 0, Q = 0, I = 0, O = null, P = {};
                const z = [];
                v.customToggle ? w = e(v.customToggle).addClass(`hc-nav-trigger ${h}`).on("click", U) : (w = e(`<a class="hc-nav-trigger ${h}"><span></span></a>`).on("click", U), t.after(w));
                const L = () => {
                    S.css("transition", "none"), Q = S.outerWidth(), I = S.outerHeight(), x.add(`.hc-offcanvas-nav.${h}.nav-position-left .nav-container`, `transform: translate3d(-${Q}px, 0, 0)`), x.add(`.hc-offcanvas-nav.${h}.nav-position-right .nav-container`, `transform: translate3d(${Q}px, 0, 0)`), x.add(`.hc-offcanvas-nav.${h}.nav-position-top .nav-container`, `transform: translate3d(0, -${I}px, 0)`), x.add(`.hc-offcanvas-nav.${h}.nav-position-bottom .nav-container`, `transform: translate3d(0, ${I}px, 0)`), x.insert(), S.css("transition", ""), A()
                }, A = () => {
                    var e;
                    k = S.css("transition-property").split(",")[0], e = S.css("transition-duration").split(",")[0], j = parseFloat(e) * (/\ds$/.test(e) ? 1e3 : 1), T = S.css("transition-timing-function").split(",")[0], v.pushContent && $ && k && x.add(c(v.pushContent), `transition: ${k} ${j}ms ${T}`), x.insert()
                }, B = t => {
                    const n = w.css("display"), i = !!v.maxWidth && `max-width: ${v.maxWidth - 1}px`;
                    b("maxWidth") && x.reset(), x.add(`.hc-offcanvas-nav.${h}`, "display: block", i), x.add(`.hc-nav-trigger.${h}`, `display: ${n && "none" !== n ? n : "block"}`, i), x.add(`.hc-nav.${h}`, "display: none", i), x.add(`.hc-offcanvas-nav.${h}.nav-levels-overlap.nav-position-left li.level-open > .nav-wrapper`, `transform: translate3d(-${v.levelSpacing}px,0,0)`, i), x.add(`.hc-offcanvas-nav.${h}.nav-levels-overlap.nav-position-right li.level-open > .nav-wrapper`, `transform: translate3d(${v.levelSpacing}px,0,0)`, i), x.add(`.hc-offcanvas-nav.${h}.nav-levels-overlap.nav-position-top li.level-open > .nav-wrapper`, `transform: translate3d(0,-${v.levelSpacing}px,0)`, i), x.add(`.hc-offcanvas-nav.${h}.nav-levels-overlap.nav-position-bottom li.level-open > .nav-wrapper`, `transform: translate3d(0,${v.levelSpacing}px,0)`, i), x.insert(), (!t || t && b("pushContent")) && ("string" == typeof v.pushContent ? ($ = e(v.pushContent), $.length || ($ = null)) : $ = v.pushContent instanceof jQuery ? v.pushContent : null), S.css("transition", "none");
                    const r = C.hasClass("nav-open"), a = ["hc-offcanvas-nav", v.navClass || "", h, v.navClass || "", "nav-levels-" + v.levelOpen || "none", "nav-position-" + v.position, v.disableBody ? "disable-body" : "", s ? "is-ios" : "", o ? "touch-device" : "", r ? "nav-open" : ""].join(" ");
                    C.off("click").attr("class", "").addClass(a), v.disableBody && C.on("click", W), t ? L() : setTimeout(L, 1)
                }, D = () => {
                    _ = function t(n) {
                        const i = [];
                        return n.each((function () {
                            const n = e(this), s = {classes: n.attr("class"), items: []};
                            n.children("li").each((function () {
                                const n = e(this), i = n.children().filter((function () {
                                    const t = e(this);
                                    return t.is(":not(ul)") && !t.find("ul").length
                                })).add(n.contents().filter((function () {
                                    return 3 === this.nodeType && this.nodeValue.trim()
                                }))), o = n.find("ul"), r = o.first().add(o.first().siblings("ul"));
                                r.length && !n.data("hc-uniqid") && n.data("hc-uniqid", Math.random().toString(36).substr(2) + "-" + Math.random().toString(36).substr(2)), s.items.push({uniqid: n.data("hc-uniqid"), classes: n.attr("class"), $content: i, subnav: r.length ? t(r) : []})
                            })), i.push(s)
                        })), i
                    }((() => {
                        const e = t.find("ul").addBack("ul");
                        return e.first().add(e.first().siblings("ul"))
                    })())
                }, H = t => {
                    t && (S.empty(), P = {}), function t(n, i, s, o, c) {
                        const u = e(`<div class="nav-wrapper nav-wrapper-${s}">`).appendTo(i).on("click", a), p = e('<div class="nav-content">').appendTo(u);
                        o && p.prepend(`<h2>${o}</h2>`);
                        if (e.each(n, (n, i) => {
                            const o = e("<ul>").addClass(i.classes).appendTo(p);
                            e.each(i.items, (n, i) => {
                                const r = i.$content;
                                let l = r.find("a").addBack("a");
                                const c = l.length ? l.clone(!0, !0).addClass("nav-item") : e('<span class="nav-item">').append(r.clone(!0, !0)).on("click", a);
                                l.length && c.on("click", e => {
                                    e.stopPropagation(), l[0].click()
                                }), "#" === c.attr("href") && c.on("click", e => {
                                    e.preventDefault()
                                }), v.closeOnClick && (!1 === v.levelOpen || "none" === v.levelOpen ? c.filter("a").filter('[data-nav-close!="false"]').on("click", W) : c.filter("a").filter('[data-nav-close!="false"]').filter((function () {
                                    const t = e(this);
                                    return !i.subnav.length || t.attr("href") && "#" !== t.attr("href").charAt(0)
                                })).on("click", W));
                                const d = e("<li>").addClass(i.classes).append(c);
                                if (o.append(d), v.levelSpacing && ("expand" === v.levelOpen || !1 === v.levelOpen || "none" === v.levelOpen)) {
                                    const e = v.levelSpacing * s;
                                    e && o.css("text-indent", `${e}px`)
                                }
                                if (i.subnav.length) {
                                    const n = s + 1, o = i.uniqid;
                                    let l = "";
                                    if (P[n] || (P[n] = 0), d.addClass("nav-parent"), !1 !== v.levelOpen && "none" !== v.levelOpen) {
                                        const t = P[n], i = e('<span class="nav-next">').appendTo(c), s = e(`<label for="${h}-${n}-${t}">`).on("click", a), p = e(`<input type="checkbox" id="${h}-${n}-${t}">`).attr("data-level", n).attr("data-index", t).val(o).on("click", a).on("change", F);
                                        -1 !== z.indexOf(o) && (u.addClass("sub-level-open").on("click", () => Z(n, t)), d.addClass("level-open"), p.prop("checked", !0)), d.prepend(p), l = !0 === v.levelTitles ? r.text().trim() : "", c.attr("href") && "#" !== c.attr("href").charAt(0) ? i.append(s) : c.prepend(s.on("click", (function () {
                                            e(this).parent().trigger("click")
                                        })))
                                    }
                                    P[n]++, t(i.subnav, d, n, l, P[n] - 1)
                                }
                            })
                        }), s && void 0 !== c && !1 !== v.insertBack && "overlap" === v.levelOpen) {
                            const t = p.children("ul");
                            let n = e(`<li class="nav-back"><a href="#">${v.labelBack || ""}<span></span></a></li>`);
                            n.children("a").on("click", l(() => Z(s, c))), !0 === v.insertBack ? t.first().prepend(n) : r(v.insertBack) && d(n, v.insertBack, t)
                        }
                        if (0 === s && !1 !== v.insertClose) {
                            const t = p.children("ul"), n = e(`<li class="nav-close"><a href="#">${v.labelClose || ""}<span></span></a></li>`);
                            n.children("a").on("click", l(W)), !0 === v.insertClose ? t.first().prepend(n) : r(v.insertClose) && d(n, v.insertClose, t.first().add(t.first().siblings("ul")))
                        }
                    }(_, S, 0, v.navTitle)
                };

                function F() {
                    const t = e(this), n = Number(t.attr("data-level")), i = Number(t.attr("data-index"));
                    t.prop("checked") ? function (t, n) {
                        const i = e(`#${h}-${t}-${n}`), s = i.val(), o = i.parent("li"), r = o.closest(".nav-wrapper");
                        r.addClass("sub-level-open"), o.addClass("level-open"), -1 === z.indexOf(s) && z.push(s);
                        if ("overlap" === v.levelOpen && (r.on("click", () => Z(t, n)), p(S, t * v.levelSpacing, v.position), $)) {
                            const e = "x" === u(v.position) ? Q : I;
                            p($, e + t * v.levelSpacing, v.position)
                        }
                    }(n, i) : Z(n, i)
                }

                function N() {
                    if (M = !0, C.css("visibility", "visible").addClass("nav-open"), w.addClass("toggle-open"), "expand" === v.levelOpen && O && clearTimeout(O), v.disableBody && (E = i.scrollTop() || g.scrollTop(), n.documentElement.scrollHeight > n.documentElement.clientHeight && i.addClass("hc-nav-yscroll"), g.addClass("hc-nav-open"), E && g.css("top", -E)), $) {
                        const e = "x" === u(v.position) ? Q : I;
                        p($, e, v.position)
                    }
                    setTimeout(() => {
                        m.trigger("open", e.extend({}, v))
                    }, j + 1)
                }

                function W() {
                    M = !1, $ && p($, 0), C.removeClass("nav-open"), S.removeAttr("style"), w.removeClass("toggle-open"), "expand" === v.levelOpen && -1 !== ["top", "bottom"].indexOf(v.position) ? Z(0) : !1 !== v.levelOpen && "none" !== v.levelOpen && (O = setTimeout(() => {
                        Z(0)
                    }, "expand" === v.levelOpen ? j : 0)), v.disableBody && (g.removeClass("hc-nav-open"), i.removeClass("hc-nav-yscroll"), E && (g.css("top", "").scrollTop(E), i.scrollTop(E), E = 0)), setTimeout(() => {
                        C.css("visibility", ""), m.trigger("close.$", e.extend({}, v)), m.trigger("close.once", e.extend({}, v)).off("close.once")
                    }, j + 1)
                }

                function U(e) {
                    e.preventDefault(), e.stopPropagation(), M ? W() : N()
                }

                B(), D(), H(), g.append(C);
                const q = (t, n, i) => {
                    const s = e(`#${h}-${t}-${n}`), o = s.val(), r = s.parent("li"), l = r.closest(".nav-wrapper");
                    if (s.prop("checked", !1), l.removeClass("sub-level-open"), r.removeClass("level-open"), -1 !== z.indexOf(o) && z.splice(z.indexOf(o), 1), i && "overlap" === v.levelOpen && (l.off("click").on("click", a), p(S, (t - 1) * v.levelSpacing, v.position), $)) {
                        const e = "x" === u(v.position) ? Q : I;
                        p($, e + (t - 1) * v.levelSpacing, v.position)
                    }
                };

                function Z(e, t) {
                    for (let n = e; n <= Object.keys(P).length; n++) if (n == e && void 0 !== t) q(e, t, !0); else for (let t = 0; t < P[n]; t++) q(n, t, n == e)
                }

                m.settings = e => e ? v[e] : Object.assign({}, v), m.isOpen = () => C.hasClass("nav-open"), m.open = N, m.close = W, m.update = (t, n) => {
                    if (y = [], "object" == typeof t) {
                        for (let e in t) v[e] !== t[e] && y.push(e);
                        v = e.extend({}, v, t), B(!0), H(!0)
                    }
                    (!0 === t || n) && (B(!0), D(), H(!0))
                }
            }))
        }
    })
}(jQuery, "undefined" != typeof window ? window : this), function (e) {
    var t = {
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
            return !0
        },
        onSlideBefore: function () {
            return !0
        },
        onSlideAfter: function () {
            return !0
        },
        onSlideNext: function () {
            return !0
        },
        onSlidePrev: function () {
            return !0
        },
        onSliderResize: function () {
            return !0
        }
    };
    e.fn.bxSlider = function (n) {
        if (0 === this.length) return this;
        if (this.length > 1) return this.each((function () {
            e(this).bxSlider(n)
        })), this;
        var s = {}, o = this, r = e(window).width(), a = e(window).height();
        if (!e(o).data("bxSlider")) {
            var l = function () {
                e(o).data("bxSlider") || (s.settings = e.extend({}, t, n), s.settings.slideWidth = parseInt(s.settings.slideWidth), s.children = o.children(s.settings.slideSelector), s.children.length < s.settings.minSlides && (s.settings.minSlides = s.children.length), s.children.length < s.settings.maxSlides && (s.settings.maxSlides = s.children.length), s.settings.randomStart && (s.settings.startSlide = Math.floor(Math.random() * s.children.length)), s.active = {index: s.settings.startSlide}, s.carousel = s.settings.minSlides > 1 || s.settings.maxSlides > 1, s.carousel && (s.settings.preloadImages = "all"), s.minThreshold = s.settings.minSlides * s.settings.slideWidth + (s.settings.minSlides - 1) * s.settings.slideMargin, s.maxThreshold = s.settings.maxSlides * s.settings.slideWidth + (s.settings.maxSlides - 1) * s.settings.slideMargin, s.working = !1, s.controls = {}, s.interval = null, s.animProp = "vertical" === s.settings.mode ? "top" : "left", s.usingCSS = s.settings.useCSS && "fade" !== s.settings.mode && function () {
                    for (var e = document.createElement("div"), t = ["WebkitPerspective", "MozPerspective", "OPerspective", "msPerspective"], n = 0; n < t.length; n++) if (void 0 !== e.style[t[n]]) return s.cssPrefix = t[n].replace("Perspective", "").toLowerCase(), s.animProp = "-" + s.cssPrefix + "-transform", !0;
                    return !1
                }(), "vertical" === s.settings.mode && (s.settings.maxSlides = s.settings.minSlides), o.data("origStyle", o.attr("style")), o.children(s.settings.slideSelector).each((function () {
                    e(this).data("origStyle", e(this).attr("style"))
                })), c())
            }, c = function () {
                var t = s.children.eq(s.settings.startSlide);
                o.wrap('<div class="' + s.settings.wrapperClass + '"><div class="bx-viewport"></div></div>'), s.viewport = o.parent(), s.settings.ariaLive && !s.settings.ticker && s.viewport.attr("aria-live", "polite"), s.loader = e('<div class="bx-loading" />'), s.viewport.prepend(s.loader), o.css({
                    width: "horizontal" === s.settings.mode ? 1e3 * s.children.length + 215 + "%" : "auto",
                    position: "relative"
                }), s.usingCSS && s.settings.easing ? o.css("-" + s.cssPrefix + "-transition-timing-function", s.settings.easing) : s.settings.easing || (s.settings.easing = "swing"), s.viewport.css({width: "100%", overflow: "hidden", position: "relative"}), s.viewport.parent().css({maxWidth: h()}), s.children.css({
                    float: "horizontal" === s.settings.mode ? "left" : "none",
                    listStyle: "none",
                    position: "relative"
                }), s.children.css("width", f()), "horizontal" === s.settings.mode && s.settings.slideMargin > 0 && s.children.css("marginRight", s.settings.slideMargin), "vertical" === s.settings.mode && s.settings.slideMargin > 0 && s.children.css("marginBottom", s.settings.slideMargin), "fade" === s.settings.mode && (s.children.css({position: "absolute", zIndex: 0, display: "none"}), s.children.eq(s.settings.startSlide).css({
                    zIndex: s.settings.slideZIndex,
                    display: "block"
                })), s.controls.el = e('<div class="bx-controls" />'), s.settings.captions && k(), s.active.last = s.settings.startSlide === g() - 1, s.settings.video && o.fitVids(), ("all" === s.settings.preloadImages || s.settings.ticker) && (t = s.children), s.settings.ticker ? s.settings.pager = !1 : (s.settings.controls && C(), s.settings.auto && s.settings.autoControls && S(), s.settings.pager && w(), (s.settings.controls || s.settings.autoControls || s.settings.pager) && s.viewport.after(s.controls.el)), d(t, u)
            }, d = function (t, n) {
                var i = t.find('img:not([src=""]), iframe').length, s = 0;
                return 0 === i ? void n() : void t.find('img:not([src=""]), iframe').each((function () {
                    e(this).one("load error", (function () {
                        ++s === i && n()
                    })).each((function () {
                        this.complete && e(this).trigger("load")
                    }))
                }))
            }, u = function () {
                if (s.settings.infiniteLoop && "fade" !== s.settings.mode && !s.settings.ticker) {
                    var t = "vertical" === s.settings.mode ? s.settings.minSlides : s.settings.maxSlides, n = s.children.slice(0, t).clone(!0).addClass("bx-clone"), i = s.children.slice(-t).clone(!0).addClass("bx-clone");
                    s.settings.ariaHidden && (n.attr("aria-hidden", !0), i.attr("aria-hidden", !0)), o.append(n).prepend(i)
                }
                s.loader.remove(), y(), "vertical" === s.settings.mode && (s.settings.adaptiveHeight = !0), s.viewport.height(p()), o.redrawSlider(), s.settings.onSliderLoad.call(o, s.active.index), s.initialized = !0, s.settings.responsive && e(window).bind("resize", U), s.settings.auto && s.settings.autoStart && (g() > 1 || s.settings.autoSlideForOnePage) && P(), s.settings.ticker && z(), s.settings.pager && E(s.settings.startSlide), s.settings.controls && O(), s.settings.touchEnabled && !s.settings.ticker && D(), s.settings.keyboardEnabled && !s.settings.ticker && e(document).keydown(B)
            }, p = function () {
                var t = 0, n = e();
                if ("vertical" === s.settings.mode || s.settings.adaptiveHeight) if (s.carousel) {
                    var o = 1 === s.settings.moveSlides ? s.active.index : s.active.index * v();
                    for (n = s.children.eq(o), i = 1; i <= s.settings.maxSlides - 1; i++) n = o + i >= s.children.length ? n.add(s.children.eq(i - 1)) : n.add(s.children.eq(o + i))
                } else n = s.children.eq(s.active.index); else n = s.children;
                return "vertical" === s.settings.mode ? (n.each((function (n) {
                    t += e(this).outerHeight()
                })), s.settings.slideMargin > 0 && (t += s.settings.slideMargin * (s.settings.minSlides - 1))) : t = Math.max.apply(Math, n.map((function () {
                    return e(this).outerHeight(!1)
                })).get()), "border-box" === s.viewport.css("box-sizing") ? t += parseFloat(s.viewport.css("padding-top")) + parseFloat(s.viewport.css("padding-bottom")) + parseFloat(s.viewport.css("border-top-width")) + parseFloat(s.viewport.css("border-bottom-width")) : "padding-box" === s.viewport.css("box-sizing") && (t += parseFloat(s.viewport.css("padding-top")) + parseFloat(s.viewport.css("padding-bottom"))), t
            }, h = function () {
                var e = "100%";
                return s.settings.slideWidth > 0 && (e = "horizontal" === s.settings.mode ? s.settings.maxSlides * s.settings.slideWidth + (s.settings.maxSlides - 1) * s.settings.slideMargin : s.settings.slideWidth), e
            }, f = function () {
                var e = s.settings.slideWidth, t = s.viewport.width();
                if (0 === s.settings.slideWidth || s.settings.slideWidth > t && !s.carousel || "vertical" === s.settings.mode) e = t; else if (s.settings.maxSlides > 1 && "horizontal" === s.settings.mode) {
                    if (t > s.maxThreshold) return e;
                    t < s.minThreshold ? e = (t - s.settings.slideMargin * (s.settings.minSlides - 1)) / s.settings.minSlides : s.settings.shrinkItems && (e = Math.floor((t + s.settings.slideMargin) / Math.ceil((t + s.settings.slideMargin) / (e + s.settings.slideMargin)) - s.settings.slideMargin))
                }
                return e
            }, m = function () {
                var e = 1, t = null;
                return "horizontal" === s.settings.mode && s.settings.slideWidth > 0 ? s.viewport.width() < s.minThreshold ? e = s.settings.minSlides : s.viewport.width() > s.maxThreshold ? e = s.settings.maxSlides : (t = s.children.first().width() + s.settings.slideMargin, e = Math.floor((s.viewport.width() + s.settings.slideMargin) / t)) : "vertical" === s.settings.mode && (e = s.settings.minSlides), e
            }, g = function () {
                var e = 0, t = 0, n = 0;
                if (s.settings.moveSlides > 0) if (s.settings.infiniteLoop) e = Math.ceil(s.children.length / v()); else for (; t < s.children.length;) ++e, t = n + m(), n += s.settings.moveSlides <= m() ? s.settings.moveSlides : m(); else e = Math.ceil(s.children.length / m());
                return e
            }, v = function () {
                return s.settings.moveSlides > 0 && s.settings.moveSlides <= m() ? s.settings.moveSlides : m()
            }, y = function () {
                var e, t, n;
                s.children.length > s.settings.maxSlides && s.active.last && !s.settings.infiniteLoop ? "horizontal" === s.settings.mode ? (e = (t = s.children.last()).position(), b(-(e.left - (s.viewport.width() - t.outerWidth())), "reset", 0)) : "vertical" === s.settings.mode && (n = s.children.length - s.settings.minSlides, e = s.children.eq(n).position(), b(-e.top, "reset", 0)) : (e = s.children.eq(s.active.index * v()).position(), s.active.index === g() - 1 && (s.active.last = !0), void 0 !== e && ("horizontal" === s.settings.mode ? b(-e.left, "reset", 0) : "vertical" === s.settings.mode && b(-e.top, "reset", 0)))
            }, b = function (t, n, i, r) {
                var a, l;
                s.usingCSS ? (l = "vertical" === s.settings.mode ? "translate3d(0, " + t + "px, 0)" : "translate3d(" + t + "px, 0, 0)", o.css("-" + s.cssPrefix + "-transition-duration", i / 1e3 + "s"), "slide" === n ? (o.css(s.animProp, l), 0 !== i ? o.bind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", (function (t) {
                    e(t.target).is(o) && (o.unbind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd"), Q())
                })) : Q()) : "reset" === n ? o.css(s.animProp, l) : "ticker" === n && (o.css("-" + s.cssPrefix + "-transition-timing-function", "linear"), o.css(s.animProp, l), 0 !== i ? o.bind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", (function (t) {
                    e(t.target).is(o) && (o.unbind("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd"), b(r.resetValue, "reset", 0), L())
                })) : (b(r.resetValue, "reset", 0), L()))) : ((a = {})[s.animProp] = t, "slide" === n ? o.animate(a, i, s.settings.easing, (function () {
                    Q()
                })) : "reset" === n ? o.css(s.animProp, t) : "ticker" === n && o.animate(a, i, "linear", (function () {
                    b(r.resetValue, "reset", 0), L()
                })))
            }, x = function () {
                for (var t = "", n = "", i = g(), o = 0; o < i; o++) n = "", s.settings.buildPager && e.isFunction(s.settings.buildPager) || s.settings.pagerCustom ? (n = s.settings.buildPager(o), s.pagerEl.addClass("bx-custom-pager")) : (n = o + 1, s.pagerEl.addClass("bx-default-pager")), t += '<div class="bx-pager-item"><a href="" data-slide-index="' + o + '" class="bx-pager-link">' + n + "</a></div>";
                s.pagerEl.html(t)
            }, w = function () {
                s.settings.pagerCustom ? s.pagerEl = e(s.settings.pagerCustom) : (s.pagerEl = e('<div class="bx-pager" />'), s.settings.pagerSelector ? e(s.settings.pagerSelector).html(s.pagerEl) : s.controls.el.addClass("bx-has-pager").append(s.pagerEl), x()), s.pagerEl.on("click touchend", "a", M)
            }, C = function () {
                s.controls.next = e('<a class="bx-next" href="">' + s.settings.nextText + "</a>"), s.controls.prev = e('<a class="bx-prev" href="">' + s.settings.prevText + "</a>"), s.controls.next.bind("click touchend", j), s.controls.prev.bind("click touchend", T), s.settings.nextSelector && e(s.settings.nextSelector).append(s.controls.next), s.settings.prevSelector && e(s.settings.prevSelector).append(s.controls.prev), s.settings.nextSelector || s.settings.prevSelector || (s.controls.directionEl = e('<div class="bx-controls-direction" />'), s.controls.directionEl.append(s.controls.prev).append(s.controls.next), s.controls.el.addClass("bx-has-controls-direction").append(s.controls.directionEl))
            }, S = function () {
                s.controls.start = e('<div class="bx-controls-auto-item"><a class="bx-start" href="">' + s.settings.startText + "</a></div>"), s.controls.stop = e('<div class="bx-controls-auto-item"><a class="bx-stop" href="">' + s.settings.stopText + "</a></div>"), s.controls.autoEl = e('<div class="bx-controls-auto" />'), s.controls.autoEl.on("click", ".bx-start", $), s.controls.autoEl.on("click", ".bx-stop", _), s.settings.autoControlsCombine ? s.controls.autoEl.append(s.controls.start) : s.controls.autoEl.append(s.controls.start).append(s.controls.stop), s.settings.autoControlsSelector ? e(s.settings.autoControlsSelector).html(s.controls.autoEl) : s.controls.el.addClass("bx-has-controls-auto").append(s.controls.autoEl), I(s.settings.autoStart ? "stop" : "start")
            }, k = function () {
                s.children.each((function (t) {
                    var n = e(this).find("img:first").attr("title");
                    void 0 !== n && ("" + n).length && e(this).append('<div class="bx-caption"><span>' + n + "</span></div>")
                }))
            }, j = function (e) {
                e.preventDefault(), s.controls.el.hasClass("disabled") || (s.settings.auto && s.settings.stopAutoOnClick && o.stopAuto(), o.goToNextSlide())
            }, T = function (e) {
                e.preventDefault(), s.controls.el.hasClass("disabled") || (s.settings.auto && s.settings.stopAutoOnClick && o.stopAuto(), o.goToPrevSlide())
            }, $ = function (e) {
                o.startAuto(), e.preventDefault()
            }, _ = function (e) {
                o.stopAuto(), e.preventDefault()
            }, M = function (t) {
                var n, i;
                t.preventDefault(), s.controls.el.hasClass("disabled") || (s.settings.auto && s.settings.stopAutoOnClick && o.stopAuto(), void 0 !== (n = e(t.currentTarget)).attr("data-slide-index") && ((i = parseInt(n.attr("data-slide-index"))) !== s.active.index && o.goToSlide(i)))
            }, E = function (t) {
                var n = s.children.length;
                return "short" === s.settings.pagerType ? (s.settings.maxSlides > 1 && (n = Math.ceil(s.children.length / s.settings.maxSlides)), void s.pagerEl.html(t + 1 + s.settings.pagerShortSeparator + n)) : (s.pagerEl.find("a").removeClass("active"), void s.pagerEl.each((function (n, i) {
                    e(i).find("a").eq(t).addClass("active")
                })))
            }, Q = function () {
                if (s.settings.infiniteLoop) {
                    var e = "";
                    0 === s.active.index ? e = s.children.eq(0).position() : s.active.index === g() - 1 && s.carousel ? e = s.children.eq((g() - 1) * v()).position() : s.active.index === s.children.length - 1 && (e = s.children.eq(s.children.length - 1).position()), e && ("horizontal" === s.settings.mode ? b(-e.left, "reset", 0) : "vertical" === s.settings.mode && b(-e.top, "reset", 0))
                }
                s.working = !1, s.settings.onSlideAfter.call(o, s.children.eq(s.active.index), s.oldIndex, s.active.index)
            }, I = function (e) {
                s.settings.autoControlsCombine ? s.controls.autoEl.html(s.controls[e]) : (s.controls.autoEl.find("a").removeClass("active"), s.controls.autoEl.find("a:not(.bx-" + e + ")").addClass("active"))
            }, O = function () {
                1 === g() ? (s.controls.prev.addClass("disabled"), s.controls.next.addClass("disabled")) : !s.settings.infiniteLoop && s.settings.hideControlOnEnd && (0 === s.active.index ? (s.controls.prev.addClass("disabled"), s.controls.next.removeClass("disabled")) : s.active.index === g() - 1 ? (s.controls.next.addClass("disabled"), s.controls.prev.removeClass("disabled")) : (s.controls.prev.removeClass("disabled"), s.controls.next.removeClass("disabled")))
            }, P = function () {
                s.settings.autoDelay > 0 ? setTimeout(o.startAuto, s.settings.autoDelay) : (o.startAuto(), e(window).focus((function () {
                    o.startAuto()
                })).blur((function () {
                    o.stopAuto()
                }))), s.settings.autoHover && o.hover((function () {
                    s.interval && (o.stopAuto(!0), s.autoPaused = !0)
                }), (function () {
                    s.autoPaused && (o.startAuto(!0), s.autoPaused = null)
                }))
            }, z = function () {
                var t, n, i, r, a, l, c, d, u = 0;
                "next" === s.settings.autoDirection ? o.append(s.children.clone().addClass("bx-clone")) : (o.prepend(s.children.clone().addClass("bx-clone")), t = s.children.first().position(), u = "horizontal" === s.settings.mode ? -t.left : -t.top), b(u, "reset", 0), s.settings.pager = !1, s.settings.controls = !1, s.settings.autoControls = !1, s.settings.tickerHover && (s.usingCSS ? (r = "horizontal" === s.settings.mode ? 4 : 5, s.viewport.hover((function () {
                    n = o.css("-" + s.cssPrefix + "-transform"), i = parseFloat(n.split(",")[r]), b(i, "reset", 0)
                }), (function () {
                    d = 0, s.children.each((function (t) {
                        d += "horizontal" === s.settings.mode ? e(this).outerWidth(!0) : e(this).outerHeight(!0)
                    })), a = s.settings.speed / d, l = "horizontal" === s.settings.mode ? "left" : "top", c = a * (d - Math.abs(parseInt(i))), L(c)
                }))) : s.viewport.hover((function () {
                    o.stop()
                }), (function () {
                    d = 0, s.children.each((function (t) {
                        d += "horizontal" === s.settings.mode ? e(this).outerWidth(!0) : e(this).outerHeight(!0)
                    })), a = s.settings.speed / d, l = "horizontal" === s.settings.mode ? "left" : "top", c = a * (d - Math.abs(parseInt(o.css(l)))), L(c)
                }))), L()
            }, L = function (e) {
                var t, n, i = e || s.settings.speed, r = {left: 0, top: 0}, a = {left: 0, top: 0};
                "next" === s.settings.autoDirection ? r = o.find(".bx-clone").first().position() : a = s.children.first().position(), t = "horizontal" === s.settings.mode ? -r.left : -r.top, n = "horizontal" === s.settings.mode ? -a.left : -a.top, b(t, "ticker", i, {resetValue: n})
            }, A = function (t) {
                var n = e(window), i = {top: n.scrollTop(), left: n.scrollLeft()}, s = t.offset();
                return i.right = i.left + n.width(), i.bottom = i.top + n.height(), s.right = s.left + t.outerWidth(), s.bottom = s.top + t.outerHeight(), !(i.right < s.left || i.left > s.right || i.bottom < s.top || i.top > s.bottom)
            }, B = function (e) {
                var t = document.activeElement.tagName.toLowerCase();
                if (null == new RegExp(t, ["i"]).exec("input|textarea") && A(o)) {
                    if (39 === e.keyCode) return j(e), !1;
                    if (37 === e.keyCode) return T(e), !1
                }
            }, D = function () {
                s.touch = {start: {x: 0, y: 0}, end: {x: 0, y: 0}}, s.viewport.bind("touchstart MSPointerDown pointerdown", H), s.viewport.on("click", ".bxslider a", (function (e) {
                    s.viewport.hasClass("click-disabled") && (e.preventDefault(), s.viewport.removeClass("click-disabled"))
                }))
            }, H = function (e) {
                if (s.controls.el.addClass("disabled"), s.working) e.preventDefault(), s.controls.el.removeClass("disabled"); else {
                    s.touch.originalPos = o.position();
                    var t = e.originalEvent, n = void 0 !== t.changedTouches ? t.changedTouches : [t];
                    s.touch.start.x = n[0].pageX, s.touch.start.y = n[0].pageY, s.viewport.get(0).setPointerCapture && (s.pointerId = t.pointerId, s.viewport.get(0).setPointerCapture(s.pointerId)), s.viewport.bind("touchmove MSPointerMove pointermove", N), s.viewport.bind("touchend MSPointerUp pointerup", W), s.viewport.bind("MSPointerCancel pointercancel", F)
                }
            }, F = function (e) {
                b(s.touch.originalPos.left, "reset", 0), s.controls.el.removeClass("disabled"), s.viewport.unbind("MSPointerCancel pointercancel", F), s.viewport.unbind("touchmove MSPointerMove pointermove", N), s.viewport.unbind("touchend MSPointerUp pointerup", W), s.viewport.get(0).releasePointerCapture && s.viewport.get(0).releasePointerCapture(s.pointerId)
            }, N = function (e) {
                var t = e.originalEvent, n = void 0 !== t.changedTouches ? t.changedTouches : [t], i = Math.abs(n[0].pageX - s.touch.start.x), o = Math.abs(n[0].pageY - s.touch.start.y), r = 0, a = 0;
                (3 * i > o && s.settings.preventDefaultSwipeX || 3 * o > i && s.settings.preventDefaultSwipeY) && e.preventDefault(), "fade" !== s.settings.mode && s.settings.oneToOneTouch && ("horizontal" === s.settings.mode ? (a = n[0].pageX - s.touch.start.x, r = s.touch.originalPos.left + a) : (a = n[0].pageY - s.touch.start.y, r = s.touch.originalPos.top + a), b(r, "reset", 0))
            }, W = function (e) {
                s.viewport.unbind("touchmove MSPointerMove pointermove", N), s.controls.el.removeClass("disabled");
                var t = e.originalEvent, n = void 0 !== t.changedTouches ? t.changedTouches : [t], i = 0, r = 0;
                s.touch.end.x = n[0].pageX, s.touch.end.y = n[0].pageY, "fade" === s.settings.mode ? (r = Math.abs(s.touch.start.x - s.touch.end.x)) >= s.settings.swipeThreshold && (s.touch.start.x > s.touch.end.x ? o.goToNextSlide() : o.goToPrevSlide(), o.stopAuto()) : ("horizontal" === s.settings.mode ? (r = s.touch.end.x - s.touch.start.x, i = s.touch.originalPos.left) : (r = s.touch.end.y - s.touch.start.y, i = s.touch.originalPos.top), !s.settings.infiniteLoop && (0 === s.active.index && r > 0 || s.active.last && r < 0) ? b(i, "reset", 200) : Math.abs(r) >= s.settings.swipeThreshold ? (r < 0 ? o.goToNextSlide() : o.goToPrevSlide(), o.stopAuto()) : b(i, "reset", 200)), s.viewport.unbind("touchend MSPointerUp pointerup", W), s.viewport.get(0).releasePointerCapture && s.viewport.get(0).releasePointerCapture(s.pointerId)
            }, U = function (t) {
                if (s.initialized) if (s.working) window.setTimeout(U, 10); else {
                    var n = e(window).width(), i = e(window).height();
                    r === n && a === i || (r = n, a = i, o.redrawSlider(), s.settings.onSliderResize.call(o, s.active.index))
                }
            }, q = function (e) {
                var t = m();
                s.settings.ariaHidden && !s.settings.ticker && (s.children.attr("aria-hidden", "true"), s.children.slice(e, e + t).attr("aria-hidden", "false"))
            };
            return o.goToSlide = function (t, n) {
                var i, r, a, l, c = !0, d = 0, u = {left: 0, top: 0}, h = null;
                if (s.oldIndex = s.active.index, s.active.index = function (e) {
                    return e < 0 ? s.settings.infiniteLoop ? g() - 1 : s.active.index : e >= g() ? s.settings.infiniteLoop ? 0 : s.active.index : e
                }(t), !s.working && s.active.index !== s.oldIndex) {
                    if (s.working = !0, void 0 !== (c = s.settings.onSlideBefore.call(o, s.children.eq(s.active.index), s.oldIndex, s.active.index)) && !c) return s.active.index = s.oldIndex, void (s.working = !1);
                    "next" === n ? s.settings.onSlideNext.call(o, s.children.eq(s.active.index), s.oldIndex, s.active.index) || (c = !1) : "prev" === n && (s.settings.onSlidePrev.call(o, s.children.eq(s.active.index), s.oldIndex, s.active.index) || (c = !1)), s.active.last = s.active.index >= g() - 1, (s.settings.pager || s.settings.pagerCustom) && E(s.active.index), s.settings.controls && O(), "fade" === s.settings.mode ? (s.settings.adaptiveHeight && s.viewport.height() !== p() && s.viewport.animate({height: p()}, s.settings.adaptiveHeightSpeed), s.children.filter(":visible").fadeOut(s.settings.speed).css({zIndex: 0}), s.children.eq(s.active.index).css("zIndex", s.settings.slideZIndex + 1).fadeIn(s.settings.speed, (function () {
                        e(this).css("zIndex", s.settings.slideZIndex), Q()
                    }))) : (s.settings.adaptiveHeight && s.viewport.height() !== p() && s.viewport.animate({height: p()}, s.settings.adaptiveHeightSpeed), !s.settings.infiniteLoop && s.carousel && s.active.last ? "horizontal" === s.settings.mode ? (u = (h = s.children.eq(s.children.length - 1)).position(), d = s.viewport.width() - h.outerWidth()) : (i = s.children.length - s.settings.minSlides, u = s.children.eq(i).position()) : s.carousel && s.active.last && "prev" === n ? (r = 1 === s.settings.moveSlides ? s.settings.maxSlides - v() : (g() - 1) * v() - (s.children.length - s.settings.maxSlides), u = (h = o.children(".bx-clone").eq(r)).position()) : "next" === n && 0 === s.active.index ? (u = o.find("> .bx-clone").eq(s.settings.maxSlides).position(), s.active.last = !1) : t >= 0 && (l = t * parseInt(v()), u = s.children.eq(l).position()), void 0 !== u ? (a = "horizontal" === s.settings.mode ? -(u.left - d) : -u.top, b(a, "slide", s.settings.speed)) : s.working = !1), s.settings.ariaHidden && q(s.active.index * v())
                }
            }, o.goToNextSlide = function () {
                if (s.settings.infiniteLoop || !s.active.last) {
                    var e = parseInt(s.active.index) + 1;
                    o.goToSlide(e, "next")
                }
            }, o.goToPrevSlide = function () {
                if (s.settings.infiniteLoop || 0 !== s.active.index) {
                    var e = parseInt(s.active.index) - 1;
                    o.goToSlide(e, "prev")
                }
            }, o.startAuto = function (e) {
                s.interval || (s.interval = setInterval((function () {
                    "next" === s.settings.autoDirection ? o.goToNextSlide() : o.goToPrevSlide()
                }), s.settings.pause), s.settings.autoControls && !0 !== e && I("stop"))
            }, o.stopAuto = function (e) {
                s.interval && (clearInterval(s.interval), s.interval = null, s.settings.autoControls && !0 !== e && I("start"))
            }, o.getCurrentSlide = function () {
                return s.active.index
            }, o.getCurrentSlideElement = function () {
                return s.children.eq(s.active.index)
            }, o.getSlideElement = function (e) {
                return s.children.eq(e)
            }, o.getSlideCount = function () {
                return s.children.length
            }, o.isWorking = function () {
                return s.working
            }, o.redrawSlider = function () {
                s.children.add(o.find(".bx-clone")).outerWidth(f()), s.viewport.css("height", p()), s.settings.ticker || y(), s.active.last && (s.active.index = g() - 1), s.active.index >= g() && (s.active.last = !0), s.settings.pager && !s.settings.pagerCustom && (x(), E(s.active.index)), s.settings.ariaHidden && q(s.active.index * v())
            }, o.destroySlider = function () {
                s.initialized && (s.initialized = !1, e(".bx-clone", this).remove(), s.children.each((function () {
                    void 0 !== e(this).data("origStyle") ? e(this).attr("style", e(this).data("origStyle")) : e(this).removeAttr("style")
                })), void 0 !== e(this).data("origStyle") ? this.attr("style", e(this).data("origStyle")) : e(this).removeAttr("style"), e(this).unwrap().unwrap(), s.controls.el && s.controls.el.remove(), s.controls.next && s.controls.next.remove(), s.controls.prev && s.controls.prev.remove(), s.pagerEl && s.settings.controls && !s.settings.pagerCustom && s.pagerEl.remove(), e(".bx-caption", this).remove(), s.controls.autoEl && s.controls.autoEl.remove(), clearInterval(s.interval), s.settings.responsive && e(window).unbind("resize", U), s.settings.keyboardEnabled && e(document).unbind("keydown", B), e(this).removeData("bxSlider"))
            }, o.reloadSlider = function (t) {
                void 0 !== t && (n = t), o.destroySlider(), l(), e(o).data("bxSlider", this)
            }, l(), e(o).data("bxSlider", this), this
        }
    }
}(jQuery), function (e) {
    "function" == typeof define && define.amd ? define(["jquery"], e) : e("object" == typeof exports ? require("jquery") : window.jQuery || window.Zepto)
}((function (e) {
    var t, n, i, s, o, r, a = "Close", l = "BeforeClose", c = "MarkupParse", d = "Open", u = "Change", p = "mfp", h = ".mfp", f = "mfp-ready", m = "mfp-removing", g = "mfp-prevent-close", v = function () {
    }, y = !!window.jQuery, b = e(window), x = function (e, n) {
        t.ev.on(p + e + h, n)
    }, w = function (t, n, i, s) {
        var o = document.createElement("div");
        return o.className = "mfp-" + t, i && (o.innerHTML = i), s ? n && n.appendChild(o) : (o = e(o), n && o.appendTo(n)), o
    }, C = function (n, i) {
        t.ev.triggerHandler(p + n, i), t.st.callbacks && (n = n.charAt(0).toLowerCase() + n.slice(1), t.st.callbacks[n] && t.st.callbacks[n].apply(t, e.isArray(i) ? i : [i]))
    }, S = function (n) {
        return n === r && t.currTemplate.closeBtn || (t.currTemplate.closeBtn = e(t.st.closeMarkup.replace("%title%", t.st.tClose)), r = n), t.currTemplate.closeBtn
    }, k = function () {
        e.magnificPopup.instance || ((t = new v).init(), e.magnificPopup.instance = t)
    };
    v.prototype = {
        constructor: v, init: function () {
            var n = navigator.appVersion;
            t.isLowIE = t.isIE8 = document.all && !document.addEventListener, t.isAndroid = /android/gi.test(n), t.isIOS = /iphone|ipad|ipod/gi.test(n), t.supportsTransition = function () {
                var e = document.createElement("p").style, t = ["ms", "O", "Moz", "Webkit"];
                if (void 0 !== e.transition) return !0;
                for (; t.length;) if (t.pop() + "Transition" in e) return !0;
                return !1
            }(), t.probablyMobile = t.isAndroid || t.isIOS || /(Opera Mini)|Kindle|webOS|BlackBerry|(Opera Mobi)|(Windows Phone)|IEMobile/i.test(navigator.userAgent), i = e(document), t.popupsCache = {}
        }, open: function (n) {
            var s;
            if (!1 === n.isObj) {
                t.items = n.items.toArray(), t.index = 0;
                var r, a = n.items;
                for (s = 0; s < a.length; s++) if ((r = a[s]).parsed && (r = r.el[0]), r === n.el[0]) {
                    t.index = s;
                    break
                }
            } else t.items = e.isArray(n.items) ? n.items : [n.items], t.index = n.index || 0;
            if (!t.isOpen) {
                t.types = [], o = "", n.mainEl && n.mainEl.length ? t.ev = n.mainEl.eq(0) : t.ev = i, n.key ? (t.popupsCache[n.key] || (t.popupsCache[n.key] = {}), t.currTemplate = t.popupsCache[n.key]) : t.currTemplate = {}, t.st = e.extend(!0, {}, e.magnificPopup.defaults, n), t.fixedContentPos = "auto" === t.st.fixedContentPos ? !t.probablyMobile : t.st.fixedContentPos, t.st.modal && (t.st.closeOnContentClick = !1, t.st.closeOnBgClick = !1, t.st.showCloseBtn = !1, t.st.enableEscapeKey = !1), t.bgOverlay || (t.bgOverlay = w("bg").on("click" + h, (function () {
                    t.close()
                })), t.wrap = w("wrap").attr("tabindex", -1).on("click" + h, (function (e) {
                    t._checkIfClose(e.target) && t.close()
                })), t.container = w("container", t.wrap)), t.contentContainer = w("content"), t.st.preloader && (t.preloader = w("preloader", t.container, t.st.tLoading));
                var l = e.magnificPopup.modules;
                for (s = 0; s < l.length; s++) {
                    var u = l[s];
                    u = u.charAt(0).toUpperCase() + u.slice(1), t["init" + u].call(t)
                }
                C("BeforeOpen"), t.st.showCloseBtn && (t.st.closeBtnInside ? (x(c, (function (e, t, n, i) {
                    n.close_replaceWith = S(i.type)
                })), o += " mfp-close-btn-in") : t.wrap.append(S())), t.st.alignTop && (o += " mfp-align-top"), t.fixedContentPos ? t.wrap.css({overflow: t.st.overflowY, overflowX: "hidden", overflowY: t.st.overflowY}) : t.wrap.css({top: b.scrollTop(), position: "absolute"}), (!1 === t.st.fixedBgPos || "auto" === t.st.fixedBgPos && !t.fixedContentPos) && t.bgOverlay.css({height: i.height(), position: "absolute"}), t.st.enableEscapeKey && i.on("keyup" + h, (function (e) {
                    27 === e.keyCode && t.close()
                })), b.on("resize" + h, (function () {
                    t.updateSize()
                })), t.st.closeOnContentClick || (o += " mfp-auto-cursor"), o && t.wrap.addClass(o);
                var p = t.wH = b.height(), m = {};
                if (t.fixedContentPos && t._hasScrollBar(p)) {
                    var g = t._getScrollbarSize();
                    g && (m.marginRight = g)
                }
                t.fixedContentPos && (t.isIE7 ? e("body, html").css("overflow", "hidden") : m.overflow = "hidden");
                var v = t.st.mainClass;
                return t.isIE7 && (v += " mfp-ie7"), v && t._addClassToMFP(v), t.updateItemHTML(), C("BuildControls"), e("html").css(m), t.bgOverlay.add(t.wrap).prependTo(t.st.prependTo || e(document.body)), t._lastFocusedEl = document.activeElement, setTimeout((function () {
                    t.content ? (t._addClassToMFP(f), t._setFocus()) : t.bgOverlay.addClass(f), i.on("focusin" + h, t._onFocusIn)
                }), 16), t.isOpen = !0, t.updateSize(p), C(d), n
            }
            t.updateItemHTML()
        }, close: function () {
            t.isOpen && (C(l), t.isOpen = !1, t.st.removalDelay && !t.isLowIE && t.supportsTransition ? (t._addClassToMFP(m), setTimeout((function () {
                t._close()
            }), t.st.removalDelay)) : t._close())
        }, _close: function () {
            C(a);
            var n = m + " " + f + " ";
            if (t.bgOverlay.detach(), t.wrap.detach(), t.container.empty(), t.st.mainClass && (n += t.st.mainClass + " "), t._removeClassFromMFP(n), t.fixedContentPos) {
                var s = {marginRight: ""};
                t.isIE7 ? e("body, html").css("overflow", "") : s.overflow = "", e("html").css(s)
            }
            i.off("keyup.mfp focusin" + h), t.ev.off(h), t.wrap.attr("class", "mfp-wrap").removeAttr("style"), t.bgOverlay.attr("class", "mfp-bg"), t.container.attr("class", "mfp-container"), !t.st.showCloseBtn || t.st.closeBtnInside && !0 !== t.currTemplate[t.currItem.type] || t.currTemplate.closeBtn && t.currTemplate.closeBtn.detach(), t.st.autoFocusLast && t._lastFocusedEl && e(t._lastFocusedEl).focus(), t.currItem = null, t.content = null, t.currTemplate = null, t.prevHeight = 0, C("AfterClose")
        }, updateSize: function (e) {
            if (t.isIOS) {
                var n = document.documentElement.clientWidth / window.innerWidth, i = window.innerHeight * n;
                t.wrap.css("height", i), t.wH = i
            } else t.wH = e || b.height();
            t.fixedContentPos || t.wrap.css("height", t.wH), C("Resize")
        }, updateItemHTML: function () {
            var n = t.items[t.index];
            t.contentContainer.detach(), t.content && t.content.detach(), n.parsed || (n = t.parseEl(t.index));
            var i = n.type;
            if (C("BeforeChange", [t.currItem ? t.currItem.type : "", i]), t.currItem = n, !t.currTemplate[i]) {
                var o = !!t.st[i] && t.st[i].markup;
                C("FirstMarkupParse", o), t.currTemplate[i] = !o || e(o)
            }
            s && s !== n.type && t.container.removeClass("mfp-" + s + "-holder");
            var r = t["get" + i.charAt(0).toUpperCase() + i.slice(1)](n, t.currTemplate[i]);
            t.appendContent(r, i), n.preloaded = !0, C(u, n), s = n.type, t.container.prepend(t.contentContainer), C("AfterChange")
        }, appendContent: function (e, n) {
            t.content = e, e ? t.st.showCloseBtn && t.st.closeBtnInside && !0 === t.currTemplate[n] ? t.content.find(".mfp-close").length || t.content.append(S()) : t.content = e : t.content = "", C("BeforeAppend"), t.container.addClass("mfp-" + n + "-holder"), t.contentContainer.append(t.content)
        }, parseEl: function (n) {
            var i, s = t.items[n];
            if (s.tagName ? s = {el: e(s)} : (i = s.type, s = {data: s, src: s.src}), s.el) {
                for (var o = t.types, r = 0; r < o.length; r++) if (s.el.hasClass("mfp-" + o[r])) {
                    i = o[r];
                    break
                }
                s.src = s.el.attr("data-mfp-src"), s.src || (s.src = s.el.attr("href"))
            }
            return s.type = i || t.st.type || "inline", s.index = n, s.parsed = !0, t.items[n] = s, C("ElementParse", s), t.items[n]
        }, addGroup: function (e, n) {
            var i = function (i) {
                i.mfpEl = this, t._openClick(i, e, n)
            };
            n || (n = {});
            var s = "click.magnificPopup";
            n.mainEl = e, n.items ? (n.isObj = !0, e.off(s).on(s, i)) : (n.isObj = !1, n.delegate ? e.off(s).on(s, n.delegate, i) : (n.items = e, e.off(s).on(s, i)))
        }, _openClick: function (n, i, s) {
            if ((void 0 !== s.midClick ? s.midClick : e.magnificPopup.defaults.midClick) || !(2 === n.which || n.ctrlKey || n.metaKey || n.altKey || n.shiftKey)) {
                var o = void 0 !== s.disableOn ? s.disableOn : e.magnificPopup.defaults.disableOn;
                if (o) if (e.isFunction(o)) {
                    if (!o.call(t)) return !0
                } else if (b.width() < o) return !0;
                n.type && (n.preventDefault(), t.isOpen && n.stopPropagation()), s.el = e(n.mfpEl), s.delegate && (s.items = i.find(s.delegate)), t.open(s)
            }
        }, updateStatus: function (e, i) {
            if (t.preloader) {
                n !== e && t.container.removeClass("mfp-s-" + n), i || "loading" !== e || (i = t.st.tLoading);
                var s = {status: e, text: i};
                C("UpdateStatus", s), e = s.status, i = s.text, t.preloader.html(i), t.preloader.find("a").on("click", (function (e) {
                    e.stopImmediatePropagation()
                })), t.container.addClass("mfp-s-" + e), n = e
            }
        }, _checkIfClose: function (n) {
            if (!e(n).hasClass(g)) {
                var i = t.st.closeOnContentClick, s = t.st.closeOnBgClick;
                if (i && s) return !0;
                if (!t.content || e(n).hasClass("mfp-close") || t.preloader && n === t.preloader[0]) return !0;
                if (n === t.content[0] || e.contains(t.content[0], n)) {
                    if (i) return !0
                } else if (s && e.contains(document, n)) return !0;
                return !1
            }
        }, _addClassToMFP: function (e) {
            t.bgOverlay.addClass(e), t.wrap.addClass(e)
        }, _removeClassFromMFP: function (e) {
            this.bgOverlay.removeClass(e), t.wrap.removeClass(e)
        }, _hasScrollBar: function (e) {
            return (t.isIE7 ? i.height() : document.body.scrollHeight) > (e || b.height())
        }, _setFocus: function () {
            (t.st.focus ? t.content.find(t.st.focus).eq(0) : t.wrap).focus()
        }, _onFocusIn: function (n) {
            return n.target === t.wrap[0] || e.contains(t.wrap[0], n.target) ? void 0 : (t._setFocus(), !1)
        }, _parseMarkup: function (t, n, i) {
            var s;
            i.data && (n = e.extend(i.data, n)), C(c, [t, n, i]), e.each(n, (function (n, i) {
                if (void 0 === i || !1 === i) return !0;
                if ((s = n.split("_")).length > 1) {
                    var o = t.find(h + "-" + s[0]);
                    if (o.length > 0) {
                        var r = s[1];
                        "replaceWith" === r ? o[0] !== i[0] && o.replaceWith(i) : "img" === r ? o.is("img") ? o.attr("src", i) : o.replaceWith(e("<img>").attr("src", i).attr("class", o.attr("class"))) : o.attr(s[1], i)
                    }
                } else t.find(h + "-" + n).html(i)
            }))
        }, _getScrollbarSize: function () {
            if (void 0 === t.scrollbarSize) {
                var e = document.createElement("div");
                e.style.cssText = "width: 99px; height: 99px; overflow: scroll; position: absolute; top: -9999px;", document.body.appendChild(e), t.scrollbarSize = e.offsetWidth - e.clientWidth, document.body.removeChild(e)
            }
            return t.scrollbarSize
        }
    }, e.magnificPopup = {
        instance: null, proto: v.prototype, modules: [], open: function (t, n) {
            return k(), (t = t ? e.extend(!0, {}, t) : {}).isObj = !0, t.index = n || 0, this.instance.open(t)
        }, close: function () {
            return e.magnificPopup.instance && e.magnificPopup.instance.close()
        }, registerModule: function (t, n) {
            n.options && (e.magnificPopup.defaults[t] = n.options), e.extend(this.proto, n.proto), this.modules.push(t)
        }, defaults: {disableOn: 0, key: null, midClick: !1, mainClass: "", preloader: !0, focus: "", closeOnContentClick: !1, closeOnBgClick: !0, closeBtnInside: !0, showCloseBtn: !0, enableEscapeKey: !0, modal: !1, alignTop: !1, removalDelay: 0, prependTo: null, fixedContentPos: "auto", fixedBgPos: "auto", overflowY: "auto", closeMarkup: '<button title="%title%" type="button" class="mfp-close">&#215;</button>', tClose: "Close (Esc)", tLoading: "Loading...", autoFocusLast: !0}
    }, e.fn.magnificPopup = function (n) {
        k();
        var i = e(this);
        if ("string" == typeof n) if ("open" === n) {
            var s, o = y ? i.data("magnificPopup") : i[0].magnificPopup, r = parseInt(arguments[1], 10) || 0;
            o.items ? s = o.items[r] : (s = i, o.delegate && (s = s.find(o.delegate)), s = s.eq(r)), t._openClick({mfpEl: s}, i, o)
        } else t.isOpen && t[n].apply(t, Array.prototype.slice.call(arguments, 1)); else n = e.extend(!0, {}, n), y ? i.data("magnificPopup", n) : i[0].magnificPopup = n, t.addGroup(i, n);
        return i
    };
    var j, T, $, _ = "inline", M = function () {
        $ && (T.after($.addClass(j)).detach(), $ = null)
    };
    e.magnificPopup.registerModule(_, {
        options: {hiddenClass: "hide", markup: "", tNotFound: "Content not found"}, proto: {
            initInline: function () {
                t.types.push(_), x(a + "." + _, (function () {
                    M()
                }))
            }, getInline: function (n, i) {
                if (M(), n.src) {
                    var s = t.st.inline, o = e(n.src);
                    if (o.length) {
                        var r = o[0].parentNode;
                        r && r.tagName && (T || (j = s.hiddenClass, T = w(j), j = "mfp-" + j), $ = o.after(T).detach().removeClass(j)), t.updateStatus("ready")
                    } else t.updateStatus("error", s.tNotFound), o = e("<div>");
                    return n.inlineElement = o, o
                }
                return t.updateStatus("ready"), t._parseMarkup(i, {}, n), i
            }
        }
    });
    var E, Q = "ajax", I = function () {
        E && e(document.body).removeClass(E)
    }, O = function () {
        I(), t.req && t.req.abort()
    };
    e.magnificPopup.registerModule(Q, {
        options: {settings: null, cursor: "mfp-ajax-cur", tError: '<a href="%url%">The content</a> could not be loaded.'}, proto: {
            initAjax: function () {
                t.types.push(Q), E = t.st.ajax.cursor, x(a + "." + Q, O), x("BeforeChange." + Q, O)
            }, getAjax: function (n) {
                E && e(document.body).addClass(E), t.updateStatus("loading");
                var i = e.extend({
                    url: n.src, success: function (i, s, o) {
                        var r = {data: i, xhr: o};
                        C("ParseAjax", r), t.appendContent(e(r.data), Q), n.finished = !0, I(), t._setFocus(), setTimeout((function () {
                            t.wrap.addClass(f)
                        }), 16), t.updateStatus("ready"), C("AjaxContentAdded")
                    }, error: function () {
                        I(), n.finished = n.loadError = !0, t.updateStatus("error", t.st.ajax.tError.replace("%url%", n.src))
                    }
                }, t.st.ajax.settings);
                return t.req = e.ajax(i), ""
            }
        }
    });
    var P, z = function (n) {
        if (n.data && void 0 !== n.data.title) return n.data.title;
        var i = t.st.image.titleSrc;
        if (i) {
            if (e.isFunction(i)) return i.call(t, n);
            if (n.el) return n.el.attr(i) || ""
        }
        return ""
    };
    e.magnificPopup.registerModule("image", {
        options: {markup: '<div class="mfp-figure"><div class="mfp-close"></div><figure><div class="mfp-img"></div><figcaption><div class="mfp-bottom-bar"><div class="mfp-title"></div><div class="mfp-counter"></div></div></figcaption></figure></div>', cursor: "mfp-zoom-out-cur", titleSrc: "title", verticalFit: !0, tError: '<a href="%url%">The image</a> could not be loaded.'}, proto: {
            initImage: function () {
                var n = t.st.image, i = ".image";
                t.types.push("image"), x(d + i, (function () {
                    "image" === t.currItem.type && n.cursor && e(document.body).addClass(n.cursor)
                })), x(a + i, (function () {
                    n.cursor && e(document.body).removeClass(n.cursor), b.off("resize" + h)
                })), x("Resize" + i, t.resizeImage), t.isLowIE && x("AfterChange", t.resizeImage)
            }, resizeImage: function () {
                var e = t.currItem;
                if (e && e.img && t.st.image.verticalFit) {
                    var n = 0;
                    t.isLowIE && (n = parseInt(e.img.css("padding-top"), 10) + parseInt(e.img.css("padding-bottom"), 10)), e.img.css("max-height", t.wH - n)
                }
            }, _onImageHasSize: function (e) {
                e.img && (e.hasSize = !0, P && clearInterval(P), e.isCheckingImgSize = !1, C("ImageHasSize", e), e.imgHidden && (t.content && t.content.removeClass("mfp-loading"), e.imgHidden = !1))
            }, findImageSize: function (e) {
                var n = 0, i = e.img[0], s = function (o) {
                    P && clearInterval(P), P = setInterval((function () {
                        return i.naturalWidth > 0 ? void t._onImageHasSize(e) : (n > 200 && clearInterval(P), void (3 === ++n ? s(10) : 40 === n ? s(50) : 100 === n && s(500)))
                    }), o)
                };
                s(1)
            }, getImage: function (n, i) {
                var s = 0, o = function () {
                    n && (n.img[0].complete ? (n.img.off(".mfploader"), n === t.currItem && (t._onImageHasSize(n), t.updateStatus("ready")), n.hasSize = !0, n.loaded = !0, C("ImageLoadComplete")) : 200 > ++s ? setTimeout(o, 100) : r())
                }, r = function () {
                    n && (n.img.off(".mfploader"), n === t.currItem && (t._onImageHasSize(n), t.updateStatus("error", a.tError.replace("%url%", n.src))), n.hasSize = !0, n.loaded = !0, n.loadError = !0)
                }, a = t.st.image, l = i.find(".mfp-img");
                if (l.length) {
                    var c = document.createElement("img");
                    c.className = "mfp-img", n.el && n.el.find("img").length && (c.alt = n.el.find("img").attr("alt")), n.img = e(c).on("load.mfploader", o).on("error.mfploader", r), c.src = n.src, l.is("img") && (n.img = n.img.clone()), (c = n.img[0]).naturalWidth > 0 ? n.hasSize = !0 : c.width || (n.hasSize = !1)
                }
                return t._parseMarkup(i, {title: z(n), img_replaceWith: n.img}, n), t.resizeImage(), n.hasSize ? (P && clearInterval(P), n.loadError ? (i.addClass("mfp-loading"), t.updateStatus("error", a.tError.replace("%url%", n.src))) : (i.removeClass("mfp-loading"), t.updateStatus("ready")), i) : (t.updateStatus("loading"), n.loading = !0, n.hasSize || (n.imgHidden = !0, i.addClass("mfp-loading"), t.findImageSize(n)), i)
            }
        }
    });
    var L;
    e.magnificPopup.registerModule("zoom", {
        options: {
            enabled: !1, easing: "ease-in-out", duration: 300, opener: function (e) {
                return e.is("img") ? e : e.find("img")
            }
        }, proto: {
            initZoom: function () {
                var e, n = t.st.zoom, i = ".zoom";
                if (n.enabled && t.supportsTransition) {
                    var s, o, r = n.duration, c = function (e) {
                        var t = e.clone().removeAttr("style").removeAttr("class").addClass("mfp-animated-image"), i = "all " + n.duration / 1e3 + "s " + n.easing, s = {position: "fixed", zIndex: 9999, left: 0, top: 0, "-webkit-backface-visibility": "hidden"}, o = "transition";
                        return s["-webkit-" + o] = s["-moz-" + o] = s["-o-" + o] = s[o] = i, t.css(s), t
                    }, d = function () {
                        t.content.css("visibility", "visible")
                    };
                    x("BuildControls" + i, (function () {
                        if (t._allowZoom()) {
                            if (clearTimeout(s), t.content.css("visibility", "hidden"), !(e = t._getItemToZoom())) return void d();
                            (o = c(e)).css(t._getOffset()), t.wrap.append(o), s = setTimeout((function () {
                                o.css(t._getOffset(!0)), s = setTimeout((function () {
                                    d(), setTimeout((function () {
                                        o.remove(), e = o = null, C("ZoomAnimationEnded")
                                    }), 16)
                                }), r)
                            }), 16)
                        }
                    })), x(l + i, (function () {
                        if (t._allowZoom()) {
                            if (clearTimeout(s), t.st.removalDelay = r, !e) {
                                if (!(e = t._getItemToZoom())) return;
                                o = c(e)
                            }
                            o.css(t._getOffset(!0)), t.wrap.append(o), t.content.css("visibility", "hidden"), setTimeout((function () {
                                o.css(t._getOffset())
                            }), 16)
                        }
                    })), x(a + i, (function () {
                        t._allowZoom() && (d(), o && o.remove(), e = null)
                    }))
                }
            }, _allowZoom: function () {
                return "image" === t.currItem.type
            }, _getItemToZoom: function () {
                return !!t.currItem.hasSize && t.currItem.img
            }, _getOffset: function (n) {
                var i, s = (i = n ? t.currItem.img : t.st.zoom.opener(t.currItem.el || t.currItem)).offset(), o = parseInt(i.css("padding-top"), 10), r = parseInt(i.css("padding-bottom"), 10);
                s.top -= e(window).scrollTop() - o;
                var a = {width: i.width(), height: (y ? i.innerHeight() : i[0].offsetHeight) - r - o};
                return void 0 === L && (L = void 0 !== document.createElement("p").style.MozTransform), L ? a["-moz-transform"] = a.transform = "translate(" + s.left + "px," + s.top + "px)" : (a.left = s.left, a.top = s.top), a
            }
        }
    });
    var A = "iframe", B = function (e) {
        if (t.currTemplate[A]) {
            var n = t.currTemplate[A].find("iframe");
            n.length && (e || (n[0].src = "//about:blank"), t.isIE8 && n.css("display", e ? "block" : "none"))
        }
    };
    e.magnificPopup.registerModule(A, {
        options: {markup: '<div class="mfp-iframe-scaler"><div class="mfp-close"></div><iframe class="mfp-iframe" src="//about:blank" frameborder="0" allowfullscreen></iframe></div>', srcAction: "iframe_src", patterns: {youtube: {index: "youtube.com", id: "v=", src: "//www.youtube.com/embed/%id%?autoplay=1"}, vimeo: {index: "vimeo.com/", id: "/", src: "//player.vimeo.com/video/%id%?autoplay=1"}, gmaps: {index: "//maps.google.", src: "%id%&output=embed"}}}, proto: {
            initIframe: function () {
                t.types.push(A), x("BeforeChange", (function (e, t, n) {
                    t !== n && (t === A ? B() : n === A && B(!0))
                })), x(a + "." + A, (function () {
                    B()
                }))
            }, getIframe: function (n, i) {
                var s = n.src, o = t.st.iframe;
                e.each(o.patterns, (function () {
                    return s.indexOf(this.index) > -1 ? (this.id && (s = "string" == typeof this.id ? s.substr(s.lastIndexOf(this.id) + this.id.length, s.length) : this.id.call(this, s)), s = this.src.replace("%id%", s), !1) : void 0
                }));
                var r = {};
                return o.srcAction && (r[o.srcAction] = s), t._parseMarkup(i, r, n), t.updateStatus("ready"), i
            }
        }
    });
    var D = function (e) {
        var n = t.items.length;
        return e > n - 1 ? e - n : 0 > e ? n + e : e
    }, H = function (e, t, n) {
        return e.replace(/%curr%/gi, t + 1).replace(/%total%/gi, n)
    };
    e.magnificPopup.registerModule("gallery", {
        options: {enabled: !1, arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>', preload: [0, 2], navigateByImgClick: !0, arrows: !0, tPrev: "Previous (Left arrow key)", tNext: "Next (Right arrow key)", tCounter: "%curr% of %total%"}, proto: {
            initGallery: function () {
                var n = t.st.gallery, s = ".mfp-gallery";
                return t.direction = !0, !(!n || !n.enabled) && (o += " mfp-gallery", x(d + s, (function () {
                    n.navigateByImgClick && t.wrap.on("click" + s, ".mfp-img", (function () {
                        return t.items.length > 1 ? (t.next(), !1) : void 0
                    })), i.on("keydown" + s, (function (e) {
                        37 === e.keyCode ? t.prev() : 39 === e.keyCode && t.next()
                    }))
                })), x("UpdateStatus" + s, (function (e, n) {
                    n.text && (n.text = H(n.text, t.currItem.index, t.items.length))
                })), x(c + s, (function (e, i, s, o) {
                    var r = t.items.length;
                    s.counter = r > 1 ? H(n.tCounter, o.index, r) : ""
                })), x("BuildControls" + s, (function () {
                    if (t.items.length > 1 && n.arrows && !t.arrowLeft) {
                        var i = n.arrowMarkup, s = t.arrowLeft = e(i.replace(/%title%/gi, n.tPrev).replace(/%dir%/gi, "left")).addClass(g), o = t.arrowRight = e(i.replace(/%title%/gi, n.tNext).replace(/%dir%/gi, "right")).addClass(g);
                        s.click((function () {
                            t.prev()
                        })), o.click((function () {
                            t.next()
                        })), t.container.append(s.add(o))
                    }
                })), x(u + s, (function () {
                    t._preloadTimeout && clearTimeout(t._preloadTimeout), t._preloadTimeout = setTimeout((function () {
                        t.preloadNearbyImages(), t._preloadTimeout = null
                    }), 16)
                })), void x(a + s, (function () {
                    i.off(s), t.wrap.off("click" + s), t.arrowRight = t.arrowLeft = null
                })))
            }, next: function () {
                t.direction = !0, t.index = D(t.index + 1), t.updateItemHTML()
            }, prev: function () {
                t.direction = !1, t.index = D(t.index - 1), t.updateItemHTML()
            }, goTo: function (e) {
                t.direction = e >= t.index, t.index = e, t.updateItemHTML()
            }, preloadNearbyImages: function () {
                var e, n = t.st.gallery.preload, i = Math.min(n[0], t.items.length), s = Math.min(n[1], t.items.length);
                for (e = 1; e <= (t.direction ? s : i); e++) t._preloadItem(t.index + e);
                for (e = 1; e <= (t.direction ? i : s); e++) t._preloadItem(t.index - e)
            }, _preloadItem: function (n) {
                if (n = D(n), !t.items[n].preloaded) {
                    var i = t.items[n];
                    i.parsed || (i = t.parseEl(n)), C("LazyLoad", i), "image" === i.type && (i.img = e('<img class="mfp-img" />').on("load.mfploader", (function () {
                        i.hasSize = !0
                    })).on("error.mfploader", (function () {
                        i.hasSize = !0, i.loadError = !0, C("LazyLoadError", i)
                    })).attr("src", i.src)), i.preloaded = !0
                }
            }
        }
    });
    var F = "retina";
    e.magnificPopup.registerModule(F, {
        options: {
            replaceSrc: function (e) {
                return e.src.replace(/\.\w+$/, (function (e) {
                    return "@2x" + e
                }))
            }, ratio: 1
        }, proto: {
            initRetina: function () {
                if (window.devicePixelRatio > 1) {
                    var e = t.st.retina, n = e.ratio;
                    (n = isNaN(n) ? n() : n) > 1 && (x("ImageHasSize." + F, (function (e, t) {
                        t.img.css({"max-width": t.img[0].naturalWidth / n, width: "100%"})
                    })), x("ElementParse." + F, (function (t, i) {
                        i.src = e.replaceSrc(i, n)
                    })))
                }
            }
        }
    }), k()
})), function (e, t, n) {
    function i(e, n) {
        var i = t(e);
        i.data(s, this), this._$element = i, this.shares = [], this._init(n), this._render()
    }

    var s = "JSSocials", o = function (e, n) {
        return t.isFunction(e) ? e.apply(n, t.makeArray(arguments).slice(2)) : e
    }, r = /(\.(jpeg|png|gif|bmp|svg)$|^data:image\/(jpeg|png|gif|bmp|svg\+xml);base64)/i, a = /(&?[a-zA-Z0-9]+=)?\{([a-zA-Z0-9]+)\}/g, l = {G: 1e9, M: 1e6, K: 1e3}, c = {};
    i.prototype = {
        url: "", text: "", shareIn: "blank", showLabel: function (e) {
            return !1 === this.showCount ? e > this.smallScreenWidth : e >= this.largeScreenWidth
        }, showCount: function (e) {
            return !(e <= this.smallScreenWidth) || "inside"
        }, smallScreenWidth: 640, largeScreenWidth: 1024, resizeTimeout: 200, elementClass: "jssocials", sharesClass: "jssocials-shares", shareClass: "jssocials-share", shareButtonClass: "jssocials-share-button", shareLinkClass: "jssocials-share-link", shareLogoClass: "jssocials-share-logo", shareLabelClass: "jssocials-share-label", shareLinkCountClass: "jssocials-share-link-count", shareCountBoxClass: "jssocials-share-count-box", shareCountClass: "jssocials-share-count", shareZeroCountClass: "jssocials-share-no-count", _init: function (e) {
            this._initDefaults(), t.extend(this, e), this._initShares(), this._attachWindowResizeCallback()
        }, _initDefaults: function () {
            this.url = e.location.href, this.text = t.trim(t("meta[name=description]").attr("content") || t("title").text())
        }, _initShares: function () {
            this.shares = t.map(this.shares, t.proxy((function (e) {
                "string" == typeof e && (e = {share: e});
                var n = e.share && c[e.share];
                if (!n && !e.renderer) throw Error("Share '" + e.share + "' is not found");
                return t.extend({url: this.url, text: this.text}, n, e)
            }), this))
        }, _attachWindowResizeCallback: function () {
            t(e).on("resize", t.proxy(this._windowResizeHandler, this))
        }, _detachWindowResizeCallback: function () {
            t(e).off("resize", this._windowResizeHandler)
        }, _windowResizeHandler: function () {
            (t.isFunction(this.showLabel) || t.isFunction(this.showCount)) && (e.clearTimeout(this._resizeTimer), this._resizeTimer = setTimeout(t.proxy(this.refresh, this), this.resizeTimeout))
        }, _render: function () {
            this._clear(), this._defineOptionsByScreen(), this._$element.addClass(this.elementClass), this._$shares = t("<div>").addClass(this.sharesClass).appendTo(this._$element), this._renderShares()
        }, _defineOptionsByScreen: function () {
            this._screenWidth = t(e).width(), this._showLabel = o(this.showLabel, this, this._screenWidth), this._showCount = o(this.showCount, this, this._screenWidth)
        }, _renderShares: function () {
            t.each(this.shares, t.proxy((function (e, t) {
                this._renderShare(t)
            }), this))
        }, _renderShare: function (e) {
            (t.isFunction(e.renderer) ? t(e.renderer()) : this._createShare(e)).addClass(this.shareClass).addClass(e.share ? "jssocials-share-" + e.share : "").addClass(e.css).appendTo(this._$shares)
        }, _createShare: function (e) {
            var n = t("<div>"), i = this._createShareLink(e).appendTo(n);
            if (this._showCount) {
                var s = "inside" === this._showCount, o = s ? i : t("<div>").addClass(this.shareCountBoxClass).appendTo(n);
                o.addClass(s ? this.shareLinkCountClass : this.shareCountBoxClass), this._renderShareCount(e, o)
            }
            return n
        }, _createShareLink: function (e) {
            var n = this._getShareStrategy(e).call(e, {shareUrl: this._getShareUrl(e)});
            return n.addClass(this.shareLinkClass).append(this._createShareLogo(e)), this._showLabel && n.append(this._createShareLabel(e)), t.each(this.on || {}, (function (i, s) {
                t.isFunction(s) && n.on(i, t.proxy(s, e))
            })), n
        }, _getShareStrategy: function (e) {
            var t = d[e.shareIn || this.shareIn];
            if (!t) throw Error("Share strategy '" + this.shareIn + "' not found");
            return t
        }, _getShareUrl: function (e) {
            var t = o(e.shareUrl, e);
            return this._formatShareUrl(t, e)
        }, _createShareLogo: function (e) {
            var n = e.logo, i = r.test(n) ? t("<img>").attr("src", e.logo) : t("<i>").addClass(n);
            return i.addClass(this.shareLogoClass), i
        }, _createShareLabel: function (e) {
            return t("<span>").addClass(this.shareLabelClass).text(e.label)
        }, _renderShareCount: function (e, n) {
            var i = t("<span>").addClass(this.shareCountClass);
            n.addClass(this.shareZeroCountClass).append(i), this._loadCount(e).done(t.proxy((function (e) {
                e && (n.removeClass(this.shareZeroCountClass), i.text(e))
            }), this))
        }, _loadCount: function (e) {
            var n = t.Deferred(), i = this._getCountUrl(e);
            if (!i) return n.resolve(0).promise();
            var s = t.proxy((function (t) {
                n.resolve(this._getCountValue(t, e))
            }), this);
            return t.getJSON(i).done(s).fail((function () {
                t.get(i).done(s).fail((function () {
                    n.resolve(0)
                }))
            })), n.promise()
        }, _getCountUrl: function (e) {
            var t = o(e.countUrl, e);
            return this._formatShareUrl(t, e)
        }, _getCountValue: function (e, n) {
            var i = (t.isFunction(n.getCount) ? n.getCount(e) : e) || 0;
            return "string" == typeof i ? i : this._formatNumber(i)
        }, _formatNumber: function (e) {
            return t.each(l, (function (t, n) {
                return e >= n ? (e = parseFloat((e / n).toFixed(2)) + t, !1) : void 0
            })), e
        }, _formatShareUrl: function (t, n) {
            return t.replace(a, (function (t, i, s) {
                var o = n[s] || "";
                return o ? (i || "") + e.encodeURIComponent(o) : ""
            }))
        }, _clear: function () {
            e.clearTimeout(this._resizeTimer), this._$element.empty()
        }, _passOptionToShares: function (e, n) {
            var i = this.shares;
            t.each(["url", "text"], (function (s, o) {
                o === e && t.each(i, (function (t, i) {
                    i[e] = n
                }))
            }))
        }, _normalizeShare: function (e) {
            return t.isNumeric(e) ? this.shares[e] : "string" == typeof e ? t.grep(this.shares, (function (t) {
                return t.share === e
            }))[0] : e
        }, refresh: function () {
            this._render()
        }, destroy: function () {
            this._clear(), this._detachWindowResizeCallback(), this._$element.removeClass(this.elementClass).removeData(s)
        }, option: function (e, t) {
            return 1 === arguments.length ? this[e] : (this[e] = t, this._passOptionToShares(e, t), void this.refresh())
        }, shareOption: function (e, t, n) {
            return e = this._normalizeShare(e), 2 === arguments.length ? e[t] : (e[t] = n, void this.refresh())
        }
    }, t.fn.jsSocials = function (e) {
        var o = t.makeArray(arguments), r = o.slice(1), a = this;
        return this.each((function () {
            var o, l = t(this), c = l.data(s);
            if (c) if ("string" == typeof e) {
                if ((o = c[e].apply(c, r)) !== n && o !== c) return a = o, !1
            } else c._detachWindowResizeCallback(), c._init(e), c._render(); else new i(l, e)
        })), a
    };
    var d = {
        popup: function (n) {
            return t("<a>").attr("href", "#").on("click", (function () {
                return e.open(n.shareUrl, null, "width=600, height=400, location=0, menubar=0, resizeable=0, scrollbars=0, status=0, titlebar=0, toolbar=0"), !1
            }))
        }, blank: function (e) {
            return t("<a>").attr({target: "_blank", href: e.shareUrl})
        }, self: function (e) {
            return t("<a>").attr({target: "_self", href: e.shareUrl})
        }
    };
    e.jsSocials = {
        Socials: i, shares: c, shareStrategies: d, setDefaults: function (e) {
            var n;
            t.isPlainObject(e) ? n = i.prototype : (n = c[e], e = arguments[1] || {}), t.extend(n, e)
        }
    }
}(window, jQuery), function (e, t, n) {
    t.extend(n.shares, {
        email: {label: "E-mail", logo: "fa fa-at", shareUrl: "mailto:{to}?subject={text}&body={url}", countUrl: "", shareIn: "self"},
        twitter: {label: "Tweet", logo: "fa fa-twitter", shareUrl: "https://twitter.com/share?url={url}&text={text}&via={via}&hashtags={hashtags}", countUrl: ""},
        facebook: {
            label: "Like", logo: "fa fa-facebook", shareUrl: "https://facebook.com/sharer/sharer.php?u={url}", countUrl: "https://graph.facebook.com/?id={url}", getCount: function (e) {
                return e.share && e.share.share_count || 0
            }
        },
        vkontakte: {
            label: "Like", logo: "fa fa-vk", shareUrl: "https://vk.com/share.php?url={url}&title={title}&description={text}", countUrl: "https://vk.com/share.php?act=count&index=1&url={url}", getCount: function (e) {
                return parseInt(e.slice(15, -2).split(", ")[1])
            }
        },
        googleplus: {label: "+1", logo: "fa fa-google", shareUrl: "https://plus.google.com/share?url={url}", countUrl: ""},
        linkedin: {
            label: "Share", logo: "fa fa-linkedin", shareUrl: "https://www.linkedin.com/shareArticle?mini=true&url={url}", countUrl: "https://www.linkedin.com/countserv/count/share?format=jsonp&url={url}&callback=?", getCount: function (e) {
                return e.count
            }
        },
        pinterest: {
            label: "Pin it", logo: "fa fa-pinterest", shareUrl: "https://pinterest.com/pin/create/bookmarklet/?media={media}&url={url}&description={text}", countUrl: "https://api.pinterest.com/v1/urls/count.json?&url={url}&callback=?", getCount: function (e) {
                return e.count
            }
        },
        stumbleupon: {
            label: "Share", logo: "fa fa-stumbleupon", shareUrl: "http://www.stumbleupon.com/submit?url={url}&title={title}", countUrl: "https://cors-anywhere.herokuapp.com/https://www.stumbleupon.com/services/1.01/badge.getinfo?url={url}", getCount: function (e) {
                return e.result.views
            }
        },
        telegram: {label: "Telegram", logo: "fa fa-paper-plane", shareUrl: "tg://msg?text={url} {text}", countUrl: "", shareIn: "self"},
        whatsapp: {label: "WhatsApp", logo: "fa fa-whatsapp", shareUrl: "whatsapp://send?text={url} {text}", countUrl: "", shareIn: "self"},
        line: {label: "LINE", logo: "fa fa-comment", shareUrl: "http://line.me/R/msg/text/?{text} {url}", countUrl: ""},
        viber: {label: "Viber", logo: "fa fa-volume-control-phone", shareUrl: "viber://forward?text={url} {text}", countUrl: "", shareIn: "self"},
        pocket: {label: "Pocket", logo: "fa fa-get-pocket", shareUrl: "https://getpocket.com/save?url={url}&title={title}", countUrl: ""},
        messenger: {label: "Share", logo: "fa fa-commenting", shareUrl: "fb-messenger://share?link={url}", countUrl: "", shareIn: "self"}
    })
}(window, jQuery, window.jsSocials), function () {
    var e, t, n, i, s, o, r, a, l, c, d, u, p, h, f, m, g, v, y, b = [].slice;
    e = /^\(?([^)]*)\)?(?:(.)(d+))?$/, u = document.createElement("div").style, i = null != u.transition || null != u.webkitTransition || null != u.mozTransition || null != u.oTransition, c = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame, t = window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver, o = function (e) {
        var t;
        return (t = document.createElement("div")).innerHTML = e, t.children[0]
    }, l = function (e, t) {
        return e.className = e.className.replace(new RegExp("(^| )" + t.split(" ").join("|") + "( |$)", "gi"), " ")
    }, s = function (e, t) {
        return l(e, t), e.className += " " + t
    }, p = function (e, t) {
        var n;
        if (null != document.createEvent) return (n = document.createEvent("HTMLEvents")).initEvent(t, !0, !0), e.dispatchEvent(n)
    }, a = function () {
        var e, t;
        return null != (e = null != (t = window.performance) && "function" == typeof t.now ? t.now() : void 0) ? e : +new Date
    }, d = function (e, t) {
        return null == t && (t = 0), t ? (e *= Math.pow(10, t), e += .5, (e = Math.floor(e)) / Math.pow(10, t)) : Math.round(e)
    }, h = function (e) {
        return e < 0 ? Math.ceil(e) : Math.floor(e)
    }, r = function (e) {
        return e - d(e)
    }, m = !1, (f = function () {
        var e, t, n, i, s;
        if (!m && null != window.jQuery) {
            for (m = !0, s = [], t = 0, n = (i = ["html", "text"]).length; t < n; t++) e = i[t], s.push(function (e) {
                var t;
                return t = window.jQuery.fn[e], window.jQuery.fn[e] = function (e) {
                    var n;
                    return null == e || null == (null != (n = this[0]) ? n.odometer : void 0) ? t.apply(this, arguments) : this[0].odometer.update(e)
                }
            }(e));
            return s
        }
    })(), setTimeout(f, 0), (n = function () {
        function n(e) {
            var t, i, s, o, r, a, l, c, d, u = this;
            if (this.options = e, this.el = this.options.el, null != this.el.odometer) return this.el.odometer;
            for (t in this.el.odometer = this, l = n.options) s = l[t], null == this.options[t] && (this.options[t] = s);
            null == (o = this.options).duration && (o.duration = 2e3), this.MAX_VALUES = this.options.duration / (1e3 / 30) / 2 | 0, this.resetFormat(), this.value = this.cleanValue(null != (c = this.options.value) ? c : ""), this.renderInside(), this.render();
            try {
                for (r = 0, a = (d = ["innerHTML", "innerText", "textContent"]).length; r < a; r++) i = d[r], null != this.el[i] && function (e) {
                    Object.defineProperty(u.el, e, {
                        get: function () {
                            var t;
                            return "innerHTML" === e ? u.inside.outerHTML : null != (t = u.inside.innerText) ? t : u.inside.textContent
                        }, set: function (e) {
                            return u.update(e)
                        }
                    })
                }(i)
            } catch (e) {
                e, this.watchForMutations()
            }
        }

        return n.prototype.renderInside = function () {
            return this.inside = document.createElement("div"), this.inside.className = "odometer-inside", this.el.innerHTML = "", this.el.appendChild(this.inside)
        }, n.prototype.watchForMutations = function () {
            var e = this;
            if (null != t) try {
                return null == this.observer && (this.observer = new t((function (t) {
                    var n;
                    return n = e.el.innerText, e.renderInside(), e.render(e.value), e.update(n)
                }))), this.watchMutations = !0, this.startWatchingMutations()
            } catch (e) {
                e
            }
        }, n.prototype.startWatchingMutations = function () {
            if (this.watchMutations) return this.observer.observe(this.el, {childList: !0})
        }, n.prototype.stopWatchingMutations = function () {
            var e;
            return null != (e = this.observer) ? e.disconnect() : void 0
        }, n.prototype.cleanValue = function (e) {
            var t;
            return "string" == typeof e && (e = (e = (e = e.replace(null != (t = this.format.radix) ? t : ".", "<radix>")).replace(/[.,]/g, "")).replace("<radix>", "."), e = parseFloat(e, 10) || 0), d(e, this.format.precision)
        }, n.prototype.bindTransitionEnd = function () {
            var e, t, n, i, s, o, r = this;
            if (!this.transitionEndBound) {
                for (this.transitionEndBound = !0, t = !1, o = [], n = 0, i = (s = "transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd".split(" ")).length; n < i; n++) e = s[n], o.push(this.el.addEventListener(e, (function () {
                    return t || (t = !0, setTimeout((function () {
                        return r.render(), t = !1, p(r.el, "odometerdone")
                    }), 0)), !0
                }), !1));
                return o
            }
        }, n.prototype.resetFormat = function () {
            var t, n, i, s, o, r, a, l;
            if ((t = null != (a = this.options.format) ? a : "(,ddd).dd") || (t = "d"), !(i = e.exec(t))) throw new Error("Odometer: Unparsable digit format");
            return r = (l = i.slice(1, 4))[0], o = l[1], s = (null != (n = l[2]) ? n.length : void 0) || 0, this.format = {repeating: r, radix: o, precision: s}
        }, n.prototype.render = function (e) {
            var t, n, s, o, r, a, l;
            for (null == e && (e = this.value), this.stopWatchingMutations(), this.resetFormat(), this.inside.innerHTML = "", r = this.options.theme, o = [], a = 0, l = (t = this.el.className.split(" ")).length; a < l; a++) (n = t[a]).length && ((s = /^odometer-theme-(.+)$/.exec(n)) ? r = s[1] : /^odometer(-|$)/.test(n) || o.push(n));
            return o.push("odometer"), i || o.push("odometer-no-transitions"), r ? o.push("odometer-theme-" + r) : o.push("odometer-auto-theme"), this.el.className = o.join(" "), this.ribbons = {}, this.formatDigits(e), this.startWatchingMutations()
        }, n.prototype.formatDigits = function (e) {
            var t, n, i, s, o, a, l, c, d;
            if (this.digits = [], this.options.formatFunction) for (s = 0, a = (c = this.options.formatFunction(e).split("").reverse()).length; s < a; s++) (n = c[s]).match(/0-9/) ? ((t = this.renderDigit()).querySelector(".odometer-value").innerHTML = n, this.digits.push(t), this.insertDigit(t)) : this.addSpacer(n); else for (i = !this.format.precision || !r(e) || !1, o = 0, l = (d = e.toString().split("").reverse()).length; o < l; o++) "." === (t = d[o]) && (i = !0), this.addDigit(t, i)
        }, n.prototype.update = function (e) {
            var t, n = this;
            if (t = (e = this.cleanValue(e)) - this.value) return l(this.el, "odometer-animating-up odometer-animating-down odometer-animating"), s(this.el, t > 0 ? "odometer-animating-up" : "odometer-animating-down"), this.stopWatchingMutations(), this.animate(e), this.startWatchingMutations(), setTimeout((function () {
                return n.el.offsetHeight, s(n.el, "odometer-animating")
            }), 0), this.value = e
        }, n.prototype.renderDigit = function () {
            return o('<span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner"><span class="odometer-ribbon"><span class="odometer-ribbon-inner"><span class="odometer-value"></span></span></span></span></span>')
        }, n.prototype.insertDigit = function (e, t) {
            return null != t ? this.inside.insertBefore(e, t) : this.inside.children.length ? this.inside.insertBefore(e, this.inside.children[0]) : this.inside.appendChild(e)
        }, n.prototype.addSpacer = function (e, t, n) {
            var i;
            return (i = o('<span class="odometer-formatting-mark"></span>')).innerHTML = e, n && s(i, n), this.insertDigit(i, t)
        }, n.prototype.addDigit = function (e, t) {
            var n, i, s, o;
            if (null == t && (t = !0), "-" === e) return this.addSpacer(e, null, "odometer-negation-mark");
            if ("." === e) return this.addSpacer(null != (o = this.format.radix) ? o : ".", null, "odometer-radix-mark");
            if (t) for (s = !1; ;) {
                if (!this.format.repeating.length) {
                    if (s) throw new Error("Bad odometer format without digits");
                    this.resetFormat(), s = !0
                }
                if (n = this.format.repeating[this.format.repeating.length - 1], this.format.repeating = this.format.repeating.substring(0, this.format.repeating.length - 1), "d" === n) break;
                this.addSpacer(n)
            }
            return (i = this.renderDigit()).querySelector(".odometer-value").innerHTML = e, this.digits.push(i), this.insertDigit(i)
        }, n.prototype.animate = function (e) {
            return i && "count" !== this.options.animation ? this.animateSlide(e) : this.animateCount(e)
        }, n.prototype.animateCount = function (e) {
            var t, n, i, s, o, r = this;
            if (n = +e - this.value) return s = i = a(), t = this.value, (o = function () {
                var l, d;
                return a() - s > r.options.duration ? (r.value = e, r.render(), void p(r.el, "odometerdone")) : ((l = a() - i) > 50 && (i = a(), d = l / r.options.duration, t += n * d, r.render(Math.round(t))), null != c ? c(o) : setTimeout(o, 50))
            })()
        }, n.prototype.getDigitCount = function () {
            var e, t, n, i, s, o;
            for (e = s = 0, o = (i = 1 <= arguments.length ? b.call(arguments, 0) : []).length; s < o; e = ++s) n = i[e], i[e] = Math.abs(n);
            return t = Math.max.apply(Math, i), Math.ceil(Math.log(t + 1) / Math.log(10))
        }, n.prototype.getFractionalDigitCount = function () {
            var e, t, n, i, s, o, r;
            for (t = /^\-?\d*\.(\d*?)0*$/, e = o = 0, r = (s = 1 <= arguments.length ? b.call(arguments, 0) : []).length; o < r; e = ++o) i = s[e], s[e] = i.toString(), n = t.exec(s[e]), s[e] = null == n ? 0 : n[1].length;
            return Math.max.apply(Math, s)
        }, n.prototype.resetDigits = function () {
            return this.digits = [], this.ribbons = [], this.inside.innerHTML = "", this.resetFormat()
        }, n.prototype.animateSlide = function (e) {
            var t, n, i, o, r, a, l, c, d, u, p, f, m, g, v, y, b, x, w, C, S, k, j, T, $, _, M;
            if (y = this.value, (c = this.getFractionalDigitCount(y, e)) && (e *= Math.pow(10, c), y *= Math.pow(10, c)), i = e - y) {
                for (this.bindTransitionEnd(), o = this.getDigitCount(y, e), r = [], t = 0, p = w = 0; 0 <= o ? w < o : w > o; p = 0 <= o ? ++w : --w) {
                    if (b = h(y / Math.pow(10, o - p - 1)), a = (l = h(e / Math.pow(10, o - p - 1))) - b, Math.abs(a) > this.MAX_VALUES) {
                        for (u = [], f = a / (this.MAX_VALUES + this.MAX_VALUES * t * .5), n = b; a > 0 && n < l || a < 0 && n > l;) u.push(Math.round(n)), n += f;
                        u[u.length - 1] !== l && u.push(l), t++
                    } else u = function () {
                        M = [];
                        for (var e = b; b <= l ? e <= l : e >= l; b <= l ? e++ : e--) M.push(e);
                        return M
                    }.apply(this);
                    for (p = C = 0, k = u.length; C < k; p = ++C) d = u[p], u[p] = Math.abs(d % 10);
                    r.push(u)
                }
                for (this.resetDigits(), p = S = 0, j = (_ = r.reverse()).length; S < j; p = ++S) for (u = _[p], this.digits[p] || this.addDigit(" ", p >= c), null == (x = this.ribbons)[p] && (x[p] = this.digits[p].querySelector(".odometer-ribbon-inner")), this.ribbons[p].innerHTML = "", i < 0 && (u = u.reverse()), m = $ = 0, T = u.length; $ < T; m = ++$) d = u[m], (v = document.createElement("div")).className = "odometer-value", v.innerHTML = d, this.ribbons[p].appendChild(v), m === u.length - 1 && s(v, "odometer-last-value"), 0 === m && s(v, "odometer-first-value");
                return b < 0 && this.addDigit("-"), null != (g = this.inside.querySelector(".odometer-radix-mark")) && g.parent.removeChild(g), c ? this.addSpacer(this.format.radix, this.digits[c - 1], "odometer-radix-mark") : void 0
            }
        }, n
    }()).options = null != (v = window.odometerOptions) ? v : {}, setTimeout((function () {
        var e, t, i, s, o;
        if (window.odometerOptions) {
            for (e in o = [], s = window.odometerOptions) t = s[e], o.push(null != (i = n.options)[e] ? (i = n.options)[e] : i[e] = t);
            return o
        }
    }), 0), n.init = function () {
        var e, t, i, s, o, r;
        if (null != document.querySelectorAll) {
            for (r = [], i = 0, s = (t = document.querySelectorAll(n.options.selector || ".odometer")).length; i < s; i++) e = t[i], r.push(e.odometer = new n({el: e, value: null != (o = e.innerText) ? o : e.textContent}));
            return r
        }
    }, null != (null != (y = document.documentElement) ? y.doScroll : void 0) && null != document.createEventObject ? (g = document.onreadystatechange, document.onreadystatechange = function () {
        return "complete" === document.readyState && !1 !== n.options.auto && n.init(), null != g ? g.apply(this, arguments) : void 0
    }) : document.addEventListener("DOMContentLoaded", (function () {
        if (!1 !== n.options.auto) return n.init()
    }), !1), "function" == typeof define && define.amd ? define([], (function () {
        return n
    })) : "undefined" != typeof exports && null !== exports ? module.exports = n : window.Odometer = n
}.call(this), function () {
    $(document).ready((function () {
        $(".slider").bxSlider({mode: "horizontal", infiniteLoop: !1, pager: !0, pagerType: "full", touchEnabled: !0, captions: !0, oneToOneTouch: !0}), $(".partners-slider").bxSlider({mode: "horizontal", slideWidth: 160, minSlides: 1, maxSlides: 6, slideMargin: 25, moveSlides: 1, responsive: !0, auto: !0, pager: !1, infiniteLoop: !0, pagerType: "full", touchEnabled: !1, oneToOneTouch: !0, captions: !0}), $(".browse-slider").bxSlider({
            mode: "horizontal",
            slideWidth: 300,
            minSlides: 1,
            maxSlides: 4,
            slideMargin: 10,
            moveSlides: 1,
            responsive: !0,
            infiniteLoop: !0,
            auto: !0,
            pager: !1,
            infiniteLoop: !0,
            pagerType: "full",
            touchEnabled: !1,
            oneToOneTouch: !0,
            captions: !0
        }), $(".projects, .blog-loop, .filtering").on("click", ".f-item", (function () {
            var e = $(this).find(".item-link").attr("href");
            location.href = e
        }))
    })), $(document).ready((function (e) {
        e(".open-popup-link").magnificPopup({type: "inline", midClick: !0, mainClass: "mfp-fade"})
    })), $(document).ready((function (e) {
        e(".open-popup-contact").magnificPopup({type: "inline", midClick: !0, mainClass: "mfp-fade"})
    })), $(document).ready((function (e) {
        e(".open-popup-apply").magnificPopup({type: "inline", midClick: !0, mainClass: "mfp-fade"})
    }));
    var e, t = document.getElementsByClassName("accordion");
    for (e = 0; e < t.length; e++) t[e].addEventListener("click", (function () {
        this.classList.toggle("acc-active");
        var e = this.nextElementSibling;
        "block" === e.style.display ? e.style.display = "none" : e.style.display = "block"
    }));
    $(".coutdown").each((function () {
        $(this).prop("coutdown", 0).animate({Counter: $(this).text()}, {
            duration: 5e3, easing: "swing", step: function (e) {
                $(this).text(Math.ceil(e))
            }
        })
    })), $(".number:not(#count3)").each((function () {
        $(this).prop("coutdown", 0).animate({Counter: $(this).text()}, {
            duration: 5e3, easing: "swing", step: function (e) {
                $(this).text(Math.ceil(e))
            }
        })
    })), $(document).ready((function () {
        $(".ytvideo[data-video]").one("click", (function () {
            var e = $(this);
            e.attr("width"), e.attr("height");
            e.html('<iframe src="https://www.youtube.com/embed/' + e.data("video") + '?autoplay=1"></iframe>')
        })), jQuery(".filter-post .filter-link").on("click", (function (e) {
            e.preventDefault(), jQuery(".filter-post .filter-link").removeClass("filter-active"), jQuery(this).addClass("filter-active");
            var t = jQuery(this).data("service-id"), n = jQuery("#country-select").find("option:selected").data("country-id");
            $.ajax({
                type: "POST", url: ajaxactionurl, data: {action: "get_projects", service_id: t, country_id: n}, success: function (e) {
                    jQuery("#ajax-container").html(e), $("#ajax-container .filter-link").css("opacity", 1)
                }
            })
        }))
    })), $(".page-customer-project .filter-post .filter-link").on("click", (function (e) {
        e.preventDefault(), jQuery(".page-customer-project .filter-post .filter-link").removeClass("filter-active"), jQuery(this).addClass("filter-active");
        var t = jQuery(this).data("service-id"), n = jQuery("#country-select").find("option:selected").data("country-id");
        $.ajax({
            type: "POST", url: ajaxactionurl, cache: !1, headers: {"cache-control": "no-cache"}, data: {action: "get_stories", service_id: t, country_id: n}, success: function (e) {
                $("#ajax-projects").html(e), $("#ajax-projects .filter-link").css("opacity", 1), $(".cp-slider").slick({infinite: !0, slidesToShow: 3, slidesToScroll: 1, responsive: [{breakpoint: 767, settings: {slidesToShow: 1, slidesToScroll: 1}}]})
            }
        })
    })), jQuery("body").on("click", "#load-more-events", (function (e) {
        e.preventDefault();
        var t = jQuery(this).data("service-id"), n = jQuery(this).data("country-id"), i = jQuery(this).data("page"), s = jQuery(this);
        $.ajax({
            type: "POST", url: window.wp_data.ajax_url, data: {action: "get_projects", service_id: t, country_id: n, paged: i}, success: function (e) {
                s.remove(), jQuery("#ajax-container").append(e)
            }
        })
    })), $(".bookmark").click((function (e) {
        e.preventDefault();
        var t = this.href, n = this.title;
        if (navigator.userAgent.toLowerCase().indexOf("chrome") > -1) alert("This function is not available in Google Chrome. Click the star symbol at the end of the address-bar or hit Ctrl-D (Command+D for Macs) to create a bookmark."); else if (window.sidebar) window.sidebar.addPanel(n, t, ""); else if (window.external || document.all) window.external.AddFavorite(t, n); else {
            if (!window.opera) return alert("Your browser does not support this bookmark action"), !1;
            $(".bookmark").attr("href", t), $(".bookmark").attr("title", n), $(".bookmark").attr("rel", "sidebar")
        }
    }));
    document.getElementsByName("vdc-modal-cb"), document.getElementsByClassName("vdc-cb-area"), document.getElementById("vdc-send-modal");
    $((function () {
        $(".send-subscribe").click((function (e) {
            e.preventDefault();
            var t = {url: "https://vdc.xelon.ch/api/user/trial/subscribe?email=" + $("#send_email").val() + "&cid=" + ("undefined" != typeof ga ? ga.getAll()[0].get("clientId") : null) + "&referrer=" + m("referrer"), method: "POST", timeout: 0};
            $.ajax(t).done((function (e) {
                $(".msg").html(e.message).fadeIn("slow"), $(".send-subscribe").remove(), $("#open-popup .modal-area").css("padding-bottom", "60px")
            })).fail((function (e, t, n) {
                console.log({
                    xhr: e,
                    textStatus: t,
                    errorThrown: n
                }), e && e.responseJSON && "Email has been already used" === e.responseJSON.error && ($("form.send-modal-data").append('<a class="danger-btn" href="https://vdc.xelon.ch/login">Go to Login</a>'), $(".send-subscribe").remove(), $(".msg").html(e.responseJSON.error).addClass("rose-c").fadeIn("slow")), e && e.responseJSON && e.responseJSON.error && e.responseJSON.error.email ? $(".msg").html(e.responseJSON.error.email).addClass("rose-c").fadeIn("slow") : e && e.responseJSON && e.responseJSON.error && e.responseJSON.error && $(".msg").html(e.responseJSON.error).addClass("rose-c").fadeIn("slow")
            }))
        }))
    })), function (e) {
        var t = e("#sticky-navbar"), n = t.offset().top, i = t.height();
        e(document).scroll((function () {
            var s = e(this).scrollTop();
            s > n + i ? t.addClass("navbar-fixed").animate({top: 0, height: 60, overflow: "auto"}) : s <= n && t.removeClass("navbar-fixed").clearQueue().animate({top: "-48px"}, 0)
        }))
    }(jQuery), jQuery(document).ready((function (e) {
        jQuery(".mobile-menu").hcOffcanvasNav({insertClose: !0, insertBack: !0, labelClose: "Menu", labelBack: "Back", position: "right", levelOpen: "expand", pushContent: !0, maxWidth: 990})
    })), jQuery(document).ready((function (e) {
        e("#share").jsSocials({showLabel: !0, showCount: !1, shareIn: "popup", shares: ["linkedin", "twitter", "facebook", "email"]})
    })), $(document).ready((function () {
        $(".moreBox").slice(0, 4).show(), 0 != $(".blogBox:hidden").length && $("#loadMore").show(), $("#loadMore").on("click", (function (e) {
            e.preventDefault(), $(".moreBox:hidden").slice(0, 4).slideDown(), 0 == $(".moreBox:hidden").length && $("#loadMore").fadeOut("slow")
        }))
    }));
    var n = window.location.toString();

    function i(e) {
        return "" != e && /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/gim.test(e) ? (jQuery("#email").css("border", "none"), !0) : (jQuery("#email").css("border", "1px solid red"), !1)
    }

    function s(e) {
        return "" != e && /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/gim.test(e) ? (jQuery("#hy_email").css("border", "none"), !0) : (jQuery("#hy_email").css("border", "1px solid red"), !1)
    }

    function o(e) {
        return "" != e && /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/gim.test(e) ? (jQuery("#modalEmail").css("border", "none"), !0) : (jQuery("#modalEmail").css("border", "1px solid red"), !1)
    }

    function r(e) {
        return "" != e && /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/gim.test(e) ? (jQuery("#soEmail").css("border", "none"), !0) : (jQuery("#soEmail").css("border", "1px solid red"), !1)
    }

    function a(e) {
        return "" != e && /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/gim.test(e) ? (jQuery("#pr_email").css("border", "solid 2px rgba(255, 255, 255, 0.3)"), !0) : (jQuery("#pr_email").css("border", "solid 2px red"), !1)
    }

    function l(e) {
        return "" != e && /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/gim.test(e) ? (jQuery("#spEmail").css("border", "none"), !0) : (jQuery("#spEmail").css("border", "1px solid red"), !1)
    }

    function c(e) {
        return "" != e && /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/gim.test(e) ? (jQuery("#subsEmail").css("border", "none"), !0) : (jQuery("#subsEmail").css("border", "1px solid red"), !1)
    }

    function d(e) {
        "" == e.val() ? e.css("border", "1px solid red") : e.css("border", "none")
    }

    function u(e) {
        var t = $("label[for='" + e.attr("id") + "']");
        return 0 == t.length && (t = e.closest("label")), 0 == t.length ? null : t
    }

    function p(e) {
        let t = u(e);
        t && t.addClass("up")
    }

    function h(e) {
        let t = u(e);
        t && t.removeClass("up")
    }

    if (jQuery(".submit").on("click", (function (e) {
        e.preventDefault();
        var t = $(this).closest("form").serialize();
        $("#contact-form input:checkbox:not(:checked)").each((function (e) {
            t += "&" + this.name + "=false"
        }));
        jQuery("#name").val();
        var s = jQuery("#email").val(), o = jQuery("#msg").val();
        jQuery("#subj").val();
        if (i(s), "" == o || "" == s || 0 == i(jQuery("#email").val())) return i(s), d(jQuery("#msg")), d(jQuery("#name")), !1;
        jQuery.ajax({
            type: "post", url: ajaxactionurl, data: "action=send_email&" + t + "&url=" + n, dataType: "json", success: function (e) {
                jQuery("#contact-form input").val(""), jQuery("#contact-form textarea").val(""), $(".sucmsg1").fadeIn(0).html(e.data).addClass("sucmsg-style").fadeOut(3e4)
            }, error: function (e, t, n) {
                console.log(t)
            }
        })
    })), jQuery(".hy-submit").on("click", (function (e) {
        e.preventDefault();
        var t = $(this).closest("form").serialize();
        $("#hy-form input:checkbox:not(:checked)").each((function (e) {
            t += "&" + this.name + "=false"
        }));
        jQuery("#hy_name").val();
        var i = jQuery("#hy_email").val(), o = jQuery("#hy_msg").val();
        if (s(i), "" == o || "" == i || 0 == s(jQuery("#hy_email").val())) return s(i), d(jQuery("#hy_msg")), d(jQuery("#hy_name")), !1;
        jQuery.ajax({
            type: "post", url: ajaxactionurl, data: "action=send_email&" + t + "&url=" + n, dataType: "json", success: function (e) {
                jQuery("#hy-form input").val(""), jQuery("#hy-form textarea").val(""), $(".sucmsg2").fadeIn(0).html(e.data).addClass("sucmsg-style").fadeOut(3e4)
            }, error: function (e, t, n) {
                console.log(t)
            }
        })
    })), jQuery(".modal-submit").on("click", (function (e) {
        e.preventDefault();
        var t = $(this).closest("form").serialize();
        $("#modal-form input:checkbox:not(:checked)").each((function (e) {
            t += "&" + this.name + "=false"
        }));
        jQuery("#fullname").val();
        var i = jQuery("#modalEmail").val(), s = jQuery("#modalMsg").val();
        jQuery("#company").val();
        if (o(i), "" == s || "" == i || 0 == o(jQuery("#modalEmail").val())) return o(i), d(jQuery("#modalMsg")), d(jQuery("#company")), d(jQuery("#fullname")), !1;
        jQuery.ajax({
            type: "post", url: ajaxactionurl, data: "action=send_email&" + t + "&url=" + n, dataType: "json", success: function (e) {
                jQuery("#modal-form input").val(""), jQuery("#modal-form textarea").val(""), $(".sucmsg3").fadeIn(0).html(e.data).addClass("sucmsg-style").fadeOut(3e4)
            }, error: function (e, t, n) {
                console.log(t)
            }
        })
    })), jQuery(".subs-submit").on("click", (function (e) {
        e.preventDefault();
        var t = $(this).closest("form").serialize();
        $("#subs-form input:checkbox:not(:checked)").each((function (e) {
            t += "&" + this.name + "=false"
        }));
        var i = jQuery("#subsEmail").val();
        if (c(i), "" == i || 0 == c(jQuery("#subsEmail").val())) return c(i), !1;
        jQuery.ajax({
            type: "post", url: ajaxactionurl, data: "action=send_email&" + t + "&url=" + n, dataType: "json", success: function (e) {
                jQuery("#modal-form input").val(""), $(".sucmsg4").fadeIn(0).html(e.data).addClass("sucmsg-style").fadeOut(3e4)
            }, error: function (e, t, n) {
                console.log(t)
            }
        })
    })), jQuery(".support-submit").on("click", (function (e) {
        e.preventDefault();
        var t = $(this).closest("form").serialize();
        $("#support-form input:checkbox:not(:checked)").each((function (e) {
            t += "&" + this.name + "=false"
        }));
        jQuery("#spFullname").val();
        var i = jQuery("#spEmail").val(), s = jQuery("#spMsg").val();
        jQuery("#spCompany").val();
        if (l(i), "" == s || "" == i || 0 == l(jQuery("#spEmail").val())) return o(modalEmail), d(jQuery("#spMsg")), d(jQuery("#spCompany")), d(jQuery("#spFullname")), !1;
        jQuery.ajax({
            type: "post", url: ajaxactionurl, data: "action=send_email&" + t + "&url=" + n, dataType: "json", success: function (e) {
                jQuery("#support-form input").val(""), jQuery("#support-form textarea").val(""), $(".sucmsg5").fadeIn(0).html(e.data).addClass("sucmsg-style").fadeOut(3e4)
            }, error: function (e, t, n) {
                console.log(t)
            }
        })
    })), jQuery(".subscribe-btn").on("click", (function (e) {
        e.preventDefault();
        var t = $(this).closest("form").serialize();
        $("#subscription-form input:checkbox:not(:checked)").each((function (e) {
            t += "&" + this.name + "=false"
        }));
        var i = jQuery("#soFirstName").val(), s = jQuery("#soLastName").val(), o = jQuery("#soEmail").val(), a = jQuery("#soCompany").val();
        if (r(o), "" == i || "" == s || "" == o || "" == a || 0 == r(jQuery("#soEmail").val())) return d(jQuery("#soFirstName")), d(jQuery("#soLastName")), d(jQuery("#soCompany")), !1;
        jQuery.ajax({
            type: "post", url: ajaxactionurl, data: "action=send_email&" + t + "&url=" + n, dataType: "json", success: function (e) {
                jQuery("#subscription-form input").val(""), $(".sucmsg7").fadeIn(0).html(e.data).addClass("sucmsg-style").fadeOut(3e4)
            }, error: function (e, t, n) {
                console.log(t)
            }
        })
    })), jQuery(".pdf-submit").on("click", (function (e) {
        e.preventDefault();
        var t = $(this).closest("form").serialize();
        $("#pdfRequest input:checkbox:not(:checked)").each((function (e) {
            t += "&" + this.name + "=false"
        }));
        var i = jQuery("#pr_name").val(), s = jQuery("#pr_email").val(), o = jQuery("#pr_company").val(), r = jQuery("#pr_position").val(), l = jQuery("#pdfLink").val();
        if (a(s), "" == i || "" == o || "" == s || "" == r || 0 == a(jQuery("#pr_email").val())) return d(jQuery("#pr_name")), d(jQuery("#pr_company")), d(jQuery("#pr_position")), !1;
        jQuery.ajax({
            type: "post", url: ajaxactionurl, data: "action=send_email&" + t + "&url=" + n, dataType: "json", success: function (e) {
                jQuery("#pdfRequest input").val(""), $(".sucmsg8").fadeIn(0).html(e.data).addClass("sucmsg-style").fadeOut(3e4), window.location.href = l
            }, error: function (e, t, n) {
                console.log(t)
            }
        })
    })), jQuery("#email").on("keypress", (function () {
        i(jQuery(this).val())
    })), jQuery("#name").on("keypress", (function () {
        d(jQuery(this))
    })), jQuery("#msg").on("keypress", (function () {
        d(jQuery(this))
    })), jQuery("#hy_name").on("keypress", (function () {
        d(jQuery(this))
    })), jQuery("#fullname").on("keypress", (function () {
        d(jQuery(this))
    })), jQuery("#company").on("keypress", (function () {
        d(jQuery(this))
    })), jQuery("#modalMsg").on("keypress", (function () {
        d(jQuery(this))
    })), jQuery("#hy_email").on("keypress", (function () {
        s(jQuery(this).val())
    })), jQuery("#modalEmail").on("keypress", (function () {
        o(jQuery(this).val())
    })), jQuery("#subsEmail").on("keypress", (function () {
        c(jQuery(this).val())
    })), jQuery("#spEmail").on("keypress", (function () {
        c(jQuery(this).val())
    })), jQuery("#soEmail").on("keypress", (function () {
        r(jQuery(this).val())
    })), jQuery("#soFirstName").on("keypress", (function () {
        d(jQuery(this))
    })), jQuery("#soLastName").on("keypress", (function () {
        d(jQuery(this))
    })), jQuery("#soCompany").on("keypress", (function () {
        d(jQuery(this))
    })), jQuery("#pr_name").on("keypress", (function () {
        d(jQuery(this))
    })), jQuery("#pr_company").on("keypress", (function () {
        d(jQuery(this))
    })), jQuery("#pr_position").on("keypress", (function () {
        d(jQuery(this))
    })), jQuery("#aFullname").on("keypress", (function () {
        d(jQuery(this))
    })), jQuery("#aModalMsg").on("keypress", (function () {
        d(jQuery(this))
    })), $("a[href^='#']").click((function (e) {
        e.preventDefault();
        var t = $($(this).attr("href")).offset().top;
        $("body, html").animate({scrollTop: t})
    })), $(".pi-item").click((function () {
        $(".active").removeClass("active"), 0 == $(this).children(".pi-item-text").is(":visible") && ($(this).addClass("active"), $(".pi-item .pi-item-text").slideUp(600)), $(this).children(".pi-item-text").slideToggle(600)
    })), $(document).ready((function () {
        $(".cp-slider").slick({infinite: !0, slidesToShow: 3, slidesToScroll: 1, responsive: [{breakpoint: 767, settings: {slidesToShow: 1, slidesToScroll: 1}}]}), $(".aut-slider").slick({infinite: !1, slidesToShow: 4, slidesToScroll: 1, responsive: [{breakpoint: 992, settings: {slidesToShow: 3, slidesToScroll: 3}}, {breakpoint: 768, settings: {slidesToShow: 2, slidesToScroll: 2}}, {breakpoint: 576, settings: {slidesToShow: 1, slidesToScroll: 1}}]}), $(".xh-row").slick({
            infinite: !1,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [{breakpoint: 1170, settings: {slidesToShow: 3, slidesToScroll: 1}}, {breakpoint: 992, settings: {slidesToShow: 2, slidesToScroll: 2}}, {breakpoint: 576, settings: {slidesToShow: 1, slidesToScroll: 1}}]
        })
    })), $("#fileCv").change((function () {
        $(this).closest("label").clone();
        var e = $("#fileCv")[0].files[0].name;
        e && ($('label[for*="fileCv"]').text(e), $(this).closest(".input-file-wrap").addClass("fLoaded"))
    })), $("#open-apply .reset-label").click((function () {
        $("#fileCv").val(""), $('[for*="fileCv"]').html("<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><path d='M490.667 234.667H158.17l112.915-112.915c8.331-8.331 8.331-21.839 0-30.17s-21.839-8.331-30.17 0L91.582 240.915a21.56 21.56 0 00-1.413 1.563c-.202.246-.378.506-.568.759-.228.304-.463.601-.674.917-.203.303-.379.618-.564.929-.171.286-.351.566-.509.861-.169.317-.313.643-.465.966-.145.308-.299.611-.43.926-.13.314-.235.635-.349.953-.122.338-.251.672-.356 1.018-.096.318-.167.642-.248.963-.089.353-.188.702-.259 1.061-.074.372-.117.747-.171 1.122-.045.314-.105.623-.136.941a21.331 21.331 0 00-.105 2.083l-.001.022.001.022c.001.695.037 1.39.105 2.083.031.318.091.627.136.941.054.375.097.75.171 1.122.071.36.17.708.259 1.061.081.322.151.645.248.963.105.346.234.68.356 1.018.114.318.219.639.349.953.131.316.284.618.43.926.152.323.296.649.465.966.158.295.338.575.509.861.186.311.361.626.564.929.211.316.447.613.674.917.19.253.365.513.568.759.446.544.916 1.067 1.413 1.563l149.333 149.333c8.331 8.331 21.839 8.331 30.17 0s8.331-21.839 0-30.17L158.17 277.333h332.497c11.782 0 21.333-9.551 21.333-21.333s-9.551-21.333-21.333-21.333zM21.333 85.333C9.551 85.333 0 94.885 0 106.667v298.667c0 11.782 9.551 21.333 21.333 21.333 11.782 0 21.333-9.551 21.333-21.333V106.667c.001-11.782-9.551-21.334-21.333-21.334z'/></svg>Upload CV"), $(".input-file-wrap").removeClass("fLoaded")
    })), $('[href*="open-contact"]').addClass("open-popup-contact"), $('[href*="open-popup"]').addClass("open-popup-link"), $('[href*="open-apply"]').addClass("open-popup-apply"), $((function () {
        $(".home .recent-news").addClass("hide-news"), $(".home .recent-news #load-more-events").click((function () {
            $(".home .recent-news").removeClass("hide-news")
        }))
    })), $("input, textarea").change((function () {
        let e = $(this);
        e.val().length > 0 ? (e.addClass("not-empty"), p(e)) : (e.removeClass("not-empty"), h(e))
    })), $("input, textarea").focus((function () {
        p($(this))
    })), $("input, textarea").focusout((function () {
        let e = $(this);
        "" === $(this).val() ? (e.removeClass("not-empty"), h(e)) : (e.addClass("not-empty"), p(e))
    })).focusout(), $(document).ready((function () {
        document.location.href.indexOf("/en/") > -1 ? $(".menu-item-weglot.weglot-en").addClass("wpml-ls-current-language") : $(".menu-item-weglot.weglot-de").addClass("wpml-ls-current-language")
    })), document.querySelector(".ytvideo") && ($(document).ready((function () {
        if ($(".ytvideo").css("background-image").indexOf("/project") >= 0) return $(".ytvideo").trigger("click"), $(".ytvideo iframe").find("video").attr("src", $(".ytvideo iframe").attr("src")), !1
    })), $(document).ready((function () {
        if ($(".ytvideo").css("background-image").indexOf("default.png") >= 0) return $(".ytvideo").trigger("click"), $(".ytvideo iframe").find("video").attr("src", $(".ytvideo iframe").attr("src")), !1
    }))), !m("referrer")) {
        let e = new Date, t = e.getFullYear() + "-" + (e.getMonth() + 1) + "-" + e.getDate() + " " + e.getHours() + ":" + e.getMinutes() + ":" + e.getSeconds();
        var f = {http_referrer: document.referrer, page_url: window.location.href, date_of_first_visit: t};
        !function (e, t, n) {
            var i = "";
            if (n) {
                var s = new Date;
                s.setTime(s.getTime() + 24 * n * 60 * 60 * 1e3), i = "; expires=" + s.toUTCString()
            }
            document.cookie = e + "=" + (t || "") + i + "; path=/"
        }("referrer", JSON.stringify(f), 30)
    }

    function m(e) {
        for (var t = e + "=", n = document.cookie.split(";"), i = 0; i < n.length; i++) {
            for (var s = n[i]; " " == s.charAt(0);) s = s.substring(1, s.length);
            if (0 == s.indexOf(t)) return s.substring(t.length, s.length)
        }
        return null
    }
}();