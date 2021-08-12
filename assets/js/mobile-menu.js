
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
                for (let t = 0; t < e.length; t++) if (void 0 !== o[e[t] + s]) return e[t] + s;
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
                    }
                else e.css(o, i);
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
            let v = t.extend(
                {},
                {
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
                for (let o = 0; o < i; o++) -1 !== y.indexOf(t[o]) && (e = !0);
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
                v.customToggle
                    ? (k = t(v.customToggle)
                        .addClass("hc-nav-trigger " + h)
                        .on("click", B))
                    : ((k = t(`<a class="hc-nav-trigger ${h}"><span></span></a>`).on("click", B)), e.after(k));
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
                                        s = { classes: i.attr("class"), items: [] };
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
                                            s.items.push({ uniqid: i.data("hc-uniqid"), classes: i.attr("class"), $content: o, subnav: r.length ? e(r) : [] });
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
                                                (!1 === v.levelOpen || "none" === v.levelOpen
                                                    ? d.filter("a").filter('[data-nav-close!="false"]').on("click", F)
                                                    : d
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
                                                        p = t(`<input type="checkbox" id="${h}-${i}-${e}">`).attr("data-level", i).attr("data-index", e).val(n).on("click", a).on("change", q);
                                                    -1 !== P.indexOf(n) && (u.addClass("sub-level-open").on("click", () => R(i, e)), c.addClass("level-open"), p.prop("checked", !0)),
                                                        c.prepend(p),
                                                        (l = !0 === v.levelTitles ? r.text().trim() : ""),
                                                        d.attr("href") && "#" !== d.attr("href").charAt(0)
                                                            ? o.append(s)
                                                            : d.prepend(
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
                    e.prop("checked")
                        ? (function (e, i) {
                            const o = t(`#${h}-${e}-${i}`),
                                s = o.val(),
                                n = o.parent("li"),
                                r = n.closest(".nav-wrapper");
                            r.addClass("sub-level-open"), n.addClass("level-open"), -1 === P.indexOf(s) && P.push(s);
                            if ("overlap" === v.levelOpen && (r.on("click", () => R(e, i)), p(x, e * v.levelSpacing, v.position), $)) {
                                const t = "x" === u(v.position) ? z : j;
                                p($, t + e * v.levelSpacing, v.position);
                            }
                        })(i, o)
                        : R(i, o);
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
                        "expand" === v.levelOpen && -1 !== ["top", "bottom"].indexOf(v.position)
                            ? R(0)
                            : !1 !== v.levelOpen &&
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
                        else for (let e = 0; e < A[i]; e++) U(i, e, i == t);
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
})(jQuery, "undefined" != typeof window ? window : this);

(function (t) {
    var e = t("#sticky-navbar"),
        i = e.offset().top,
        o = e.height();
    t(document).scroll(function () {
        var s = t(this).scrollTop();
        s > i + o ? e.addClass("navbar-fixed").animate({ top: 0, height: 60, overflow: "auto" }) : s <= i && e.removeClass("navbar-fixed").clearQueue().animate({ top: "-48px" }, 0);
    });
})(jQuery),
jQuery(document).ready(function (t) {
    jQuery(".mobile-menu").hcOffcanvasNav({ insertClose: !0, insertBack: !0, labelClose: "Menu", labelBack: "Back", position: "right", levelOpen: "expand", pushContent: !0, maxWidth: 991 });
});