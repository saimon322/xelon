// Magnific Popup
(function (t) {
    "function" == typeof define && define.amd ? define(["jquery"], t) : t("object" == typeof exports ? require("jquery") : window.jQuery || window.Zepto);
})(function (t) {
    var e,
        i,
        o,
        s,
        n,
        r,
        a = "Close",
        l = "BeforeClose",
        d = "MarkupParse",
        c = "Open",
        u = "Change",
        p = "mfp",
        h = ".mfp",
        f = "mfp-ready",
        m = "mfp-removing",
        g = "mfp-prevent-close",
        v = function () {},
        y = !!window.jQuery,
        w = t(window),
        b = function (t, i) {
            e.ev.on(p + t + h, i);
        },
        k = function (e, i, o, s) {
            var n = document.createElement("div");
            return (n.className = "mfp-" + e), o && (n.innerHTML = o), s ? i && i.appendChild(n) : ((n = t(n)), i && n.appendTo(i)), n;
        },
        S = function (i, o) {
            e.ev.triggerHandler(p + i, o), e.st.callbacks && ((i = i.charAt(0).toLowerCase() + i.slice(1)), e.st.callbacks[i] && e.st.callbacks[i].apply(e, t.isArray(o) ? o : [o]));
        },
        x = function (i) {
            return (i === r && e.currTemplate.closeBtn) || ((e.currTemplate.closeBtn = t(e.st.closeMarkup.replace("%title%", e.st.tClose))), (r = i)), e.currTemplate.closeBtn;
        },
        C = function () {
            t.magnificPopup.instance || ((e = new v()).init(), (t.magnificPopup.instance = e));
        };
    (v.prototype = {
        constructor: v,
        init: function () {
            var i = navigator.appVersion;
            (e.isLowIE = e.isIE8 = document.all && !document.addEventListener),
                (e.isAndroid = /android/gi.test(i)),
                (e.isIOS = /iphone|ipad|ipod/gi.test(i)),
                (e.supportsTransition = (function () {
                    var t = document.createElement("p").style,
                        e = ["ms", "O", "Moz", "Webkit"];
                    if (void 0 !== t.transition) return !0;
                    for (; e.length; ) if (e.pop() + "Transition" in t) return !0;
                    return !1;
                })()),
                (e.probablyMobile = e.isAndroid || e.isIOS || /(Opera Mini)|Kindle|webOS|BlackBerry|(Opera Mobi)|(Windows Phone)|IEMobile/i.test(navigator.userAgent)),
                (o = t(document)),
                (e.popupsCache = {});
        },
        open: function (i) {
            var s;
            if (!1 === i.isObj) {
                (e.items = i.items.toArray()), (e.index = 0);
                var r,
                    a = i.items;
                for (s = 0; s < a.length; s++)
                    if (((r = a[s]).parsed && (r = r.el[0]), r === i.el[0])) {
                        e.index = s;
                        break;
                    }
            } else (e.items = t.isArray(i.items) ? i.items : [i.items]), (e.index = i.index || 0);
            if (!e.isOpen) {
                (e.types = []),
                    (n = ""),
                    i.mainEl && i.mainEl.length ? (e.ev = i.mainEl.eq(0)) : (e.ev = o),
                    i.key ? (e.popupsCache[i.key] || (e.popupsCache[i.key] = {}), (e.currTemplate = e.popupsCache[i.key])) : (e.currTemplate = {}),
                    (e.st = t.extend(!0, {}, t.magnificPopup.defaults, i)),
                    (e.fixedContentPos = "auto" === e.st.fixedContentPos ? !e.probablyMobile : e.st.fixedContentPos),
                    e.st.modal && ((e.st.closeOnContentClick = !1), (e.st.closeOnBgClick = !1), (e.st.showCloseBtn = !1), (e.st.enableEscapeKey = !1)),
                    e.bgOverlay ||
                        ((e.bgOverlay = k("bg").on("click" + h, function () {
                            e.close();
                        })),
                        (e.wrap = k("wrap")
                            .attr("tabindex", -1)
                            .on("click" + h, function (t) {
                                e._checkIfClose(t.target) && e.close();
                            })),
                        (e.container = k("container", e.wrap))),
                    (e.contentContainer = k("content")),
                    e.st.preloader && (e.preloader = k("preloader", e.container, e.st.tLoading));
                var l = t.magnificPopup.modules;
                for (s = 0; s < l.length; s++) {
                    var u = l[s];
                    (u = u.charAt(0).toUpperCase() + u.slice(1)), e["init" + u].call(e);
                }
                S("BeforeOpen"),
                    e.st.showCloseBtn &&
                        (e.st.closeBtnInside
                            ? (b(d, function (t, e, i, o) {
                                    i.close_replaceWith = x(o.type);
                                }),
                                (n += " mfp-close-btn-in"))
                            : e.wrap.append(x())),
                    e.st.alignTop && (n += " mfp-align-top"),
                    e.fixedContentPos ? e.wrap.css({ overflow: e.st.overflowY, overflowX: "hidden", overflowY: e.st.overflowY }) : e.wrap.css({ top: w.scrollTop(), position: "absolute" }),
                    (!1 === e.st.fixedBgPos || ("auto" === e.st.fixedBgPos && !e.fixedContentPos)) && e.bgOverlay.css({ height: o.height(), position: "absolute" }),
                    e.st.enableEscapeKey &&
                        o.on("keyup" + h, function (t) {
                            27 === t.keyCode && e.close();
                        }),
                    w.on("resize" + h, function () {
                        e.updateSize();
                    }),
                    e.st.closeOnContentClick || (n += " mfp-auto-cursor"),
                    n && e.wrap.addClass(n);
                var p = (e.wH = w.height()),
                    m = {};
                if (e.fixedContentPos && e._hasScrollBar(p)) {
                    var g = e._getScrollbarSize();
                    g && (m.marginRight = g);
                }
                e.fixedContentPos && (e.isIE7 ? t("body, html").css("overflow", "hidden") : (m.overflow = "hidden"));
                var v = e.st.mainClass;
                return (
                    e.isIE7 && (v += " mfp-ie7"),
                    v && e._addClassToMFP(v),
                    e.updateItemHTML(),
                    S("BuildControls"),
                    t("html").css(m),
                    e.bgOverlay.add(e.wrap).prependTo(e.st.prependTo || t(document.body)),
                    (e._lastFocusedEl = document.activeElement),
                    setTimeout(function () {
                        e.content ? (e._addClassToMFP(f), e._setFocus()) : e.bgOverlay.addClass(f), o.on("focusin" + h, e._onFocusIn);
                    }, 16),
                    (e.isOpen = !0),
                    e.updateSize(p),
                    S(c),
                    i
                );
            }
            e.updateItemHTML();
        },
        close: function () {
            e.isOpen &&
                (S(l),
                (e.isOpen = !1),
                e.st.removalDelay && !e.isLowIE && e.supportsTransition
                    ? (e._addClassToMFP(m),
                        setTimeout(function () {
                            e._close();
                        }, e.st.removalDelay))
                    : e._close());
        },
        _close: function () {
            S(a);
            var i = m + " " + f + " ";
            if ((e.bgOverlay.detach(), e.wrap.detach(), e.container.empty(), e.st.mainClass && (i += e.st.mainClass + " "), e._removeClassFromMFP(i), e.fixedContentPos)) {
                var s = { marginRight: "" };
                e.isIE7 ? t("body, html").css("overflow", "") : (s.overflow = ""), t("html").css(s);
            }
            o.off("keyup.mfp focusin" + h),
                e.ev.off(h),
                e.wrap.attr("class", "mfp-wrap").removeAttr("style"),
                e.bgOverlay.attr("class", "mfp-bg"),
                e.container.attr("class", "mfp-container"),
                !e.st.showCloseBtn || (e.st.closeBtnInside && !0 !== e.currTemplate[e.currItem.type]) || (e.currTemplate.closeBtn && e.currTemplate.closeBtn.detach()),
                e.st.autoFocusLast && e._lastFocusedEl && t(e._lastFocusedEl).focus(),
                (e.currItem = null),
                (e.content = null),
                (e.currTemplate = null),
                (e.prevHeight = 0),
                S("AfterClose");
        },
        updateSize: function (t) {
            if (e.isIOS) {
                var i = document.documentElement.clientWidth / window.innerWidth,
                    o = window.innerHeight * i;
                e.wrap.css("height", o), (e.wH = o);
            } else e.wH = t || w.height();
            e.fixedContentPos || e.wrap.css("height", e.wH), S("Resize");
        },
        updateItemHTML: function () {
            var i = e.items[e.index];
            e.contentContainer.detach(), e.content && e.content.detach(), i.parsed || (i = e.parseEl(e.index));
            var o = i.type;
            if ((S("BeforeChange", [e.currItem ? e.currItem.type : "", o]), (e.currItem = i), !e.currTemplate[o])) {
                var n = !!e.st[o] && e.st[o].markup;
                S("FirstMarkupParse", n), (e.currTemplate[o] = !n || t(n));
            }
            s && s !== i.type && e.container.removeClass("mfp-" + s + "-holder");
            var r = e["get" + o.charAt(0).toUpperCase() + o.slice(1)](i, e.currTemplate[o]);
            e.appendContent(r, o), (i.preloaded = !0), S(u, i), (s = i.type), e.container.prepend(e.contentContainer), S("AfterChange");
        },
        appendContent: function (t, i) {
            (e.content = t),
                t ? (e.st.showCloseBtn && e.st.closeBtnInside && !0 === e.currTemplate[i] ? e.content.find(".mfp-close").length || e.content.append(x()) : (e.content = t)) : (e.content = ""),
                S("BeforeAppend"),
                e.container.addClass("mfp-" + i + "-holder"),
                e.contentContainer.append(e.content);
        },
        parseEl: function (i) {
            var o,
                s = e.items[i];
            if ((s.tagName ? (s = { el: t(s) }) : ((o = s.type), (s = { data: s, src: s.src })), s.el)) {
                for (var n = e.types, r = 0; r < n.length; r++)
                    if (s.el.hasClass("mfp-" + n[r])) {
                        o = n[r];
                        break;
                    }
                (s.src = s.el.attr("data-mfp-src")), s.src || (s.src = s.el.attr("href"));
            }
            return (s.type = o || e.st.type || "inline"), (s.index = i), (s.parsed = !0), (e.items[i] = s), S("ElementParse", s), e.items[i];
        },
        addGroup: function (t, i) {
            var o = function (o) {
                (o.mfpEl = this), e._openClick(o, t, i);
            };
            i || (i = {});
            var s = "click.magnificPopup";
            (i.mainEl = t), i.items ? ((i.isObj = !0), t.off(s).on(s, o)) : ((i.isObj = !1), i.delegate ? t.off(s).on(s, i.delegate, o) : ((i.items = t), t.off(s).on(s, o)));
        },
        _openClick: function (i, o, s) {
            if ((void 0 !== s.midClick ? s.midClick : t.magnificPopup.defaults.midClick) || !(2 === i.which || i.ctrlKey || i.metaKey || i.altKey || i.shiftKey)) {
                var n = void 0 !== s.disableOn ? s.disableOn : t.magnificPopup.defaults.disableOn;
                if (n)
                    if (t.isFunction(n)) {
                        if (!n.call(e)) return !0;
                    } else if (w.width() < n) return !0;
                i.type && (i.preventDefault(), e.isOpen && i.stopPropagation()), (s.el = t(i.mfpEl)), s.delegate && (s.items = o.find(s.delegate)), e.open(s);
            }
        },
        updateStatus: function (t, o) {
            if (e.preloader) {
                i !== t && e.container.removeClass("mfp-s-" + i), o || "loading" !== t || (o = e.st.tLoading);
                var s = { status: t, text: o };
                S("UpdateStatus", s),
                    (t = s.status),
                    (o = s.text),
                    e.preloader.html(o),
                    e.preloader.find("a").on("click", function (t) {
                        t.stopImmediatePropagation();
                    }),
                    e.container.addClass("mfp-s-" + t),
                    (i = t);
            }
        },
        _checkIfClose: function (i) {
            if (!t(i).hasClass(g)) {
                var o = e.st.closeOnContentClick,
                    s = e.st.closeOnBgClick;
                if (o && s) return !0;
                if (!e.content || t(i).hasClass("mfp-close") || (e.preloader && i === e.preloader[0])) return !0;
                if (i === e.content[0] || t.contains(e.content[0], i)) {
                    if (o) return !0;
                } else if (s && t.contains(document, i)) return !0;
                return !1;
            }
        },
        _addClassToMFP: function (t) {
            e.bgOverlay.addClass(t), e.wrap.addClass(t);
        },
        _removeClassFromMFP: function (t) {
            this.bgOverlay.removeClass(t), e.wrap.removeClass(t);
        },
        _hasScrollBar: function (t) {
            return (e.isIE7 ? o.height() : document.body.scrollHeight) > (t || w.height());
        },
        _setFocus: function () {
            (e.st.focus ? e.content.find(e.st.focus).eq(0) : e.wrap).focus();
        },
        _onFocusIn: function (i) {
            return i.target === e.wrap[0] || t.contains(e.wrap[0], i.target) ? void 0 : (e._setFocus(), !1);
        },
        _parseMarkup: function (e, i, o) {
            var s;
            o.data && (i = t.extend(o.data, i)),
                S(d, [e, i, o]),
                t.each(i, function (i, o) {
                    if (void 0 === o || !1 === o) return !0;
                    if ((s = i.split("_")).length > 1) {
                        var n = e.find(h + "-" + s[0]);
                        if (n.length > 0) {
                            var r = s[1];
                            "replaceWith" === r ? n[0] !== o[0] && n.replaceWith(o) : "img" === r ? (n.is("img") ? n.attr("src", o) : n.replaceWith(t("<img>").attr("src", o).attr("class", n.attr("class")))) : n.attr(s[1], o);
                        }
                    } else e.find(h + "-" + i).html(o);
                });
        },
        _getScrollbarSize: function () {
            if (void 0 === e.scrollbarSize) {
                var t = document.createElement("div");
                (t.style.cssText = "width: 99px; height: 99px; overflow: scroll; position: absolute; top: -9999px;"), document.body.appendChild(t), (e.scrollbarSize = t.offsetWidth - t.clientWidth), document.body.removeChild(t);
            }
            return e.scrollbarSize;
        },
    }),
        (t.magnificPopup = {
            instance: null,
            proto: v.prototype,
            modules: [],
            open: function (e, i) {
                return C(), ((e = e ? t.extend(!0, {}, e) : {}).isObj = !0), (e.index = i || 0), this.instance.open(e);
            },
            close: function () {
                return t.magnificPopup.instance && t.magnificPopup.instance.close();
            },
            registerModule: function (e, i) {
                i.options && (t.magnificPopup.defaults[e] = i.options), t.extend(this.proto, i.proto), this.modules.push(e);
            },
            defaults: {
                disableOn: 0,
                key: null,
                midClick: !1,
                mainClass: "",
                preloader: !0,
                focus: "",
                closeOnContentClick: !1,
                closeOnBgClick: !0,
                closeBtnInside: !0,
                showCloseBtn: !0,
                enableEscapeKey: !0,
                modal: !1,
                alignTop: !1,
                removalDelay: 0,
                prependTo: null,
                fixedContentPos: "auto",
                fixedBgPos: "auto",
                overflowY: "auto",
                closeMarkup: '<button title="%title%" type="button" class="mfp-close">&#215;</button>',
                tClose: "Close (Esc)",
                tLoading: "Loading...",
                autoFocusLast: !0,
            },
        }),
        (t.fn.magnificPopup = function (i) {
            C();
            var o = t(this);
            if ("string" == typeof i)
                if ("open" === i) {
                    var s,
                        n = y ? o.data("magnificPopup") : o[0].magnificPopup,
                        r = parseInt(arguments[1], 10) || 0;
                    n.items ? (s = n.items[r]) : ((s = o), n.delegate && (s = s.find(n.delegate)), (s = s.eq(r))), e._openClick({ mfpEl: s }, o, n);
                } else e.isOpen && e[i].apply(e, Array.prototype.slice.call(arguments, 1));
            else (i = t.extend(!0, {}, i)), y ? o.data("magnificPopup", i) : (o[0].magnificPopup = i), e.addGroup(o, i);
            return o;
        });
    var T,
        _,
        $,
        O = "inline",
        M = function () {
            $ && (_.after($.addClass(T)).detach(), ($ = null));
        };
    t.magnificPopup.registerModule(O, {
        options: { hiddenClass: "hide", markup: "", tNotFound: "Content not found" },
        proto: {
            initInline: function () {
                e.types.push(O),
                    b(a + "." + O, function () {
                        M();
                    });
            },
            getInline: function (i, o) {
                if ((M(), i.src)) {
                    var s = e.st.inline,
                        n = t(i.src);
                    if (n.length) {
                        var r = n[0].parentNode;
                        r && r.tagName && (_ || ((T = s.hiddenClass), (_ = k(T)), (T = "mfp-" + T)), ($ = n.after(_).detach().removeClass(T))), e.updateStatus("ready");
                    } else e.updateStatus("error", s.tNotFound), (n = t("<div>"));
                    return (i.inlineElement = n), n;
                }
                return e.updateStatus("ready"), e._parseMarkup(o, {}, i), o;
            },
        },
    });
    var E,
        z = "ajax",
        j = function () {
            E && t(document.body).removeClass(E);
        },
        I = function () {
            j(), e.req && e.req.abort();
        };
    t.magnificPopup.registerModule(z, {
        options: { settings: null, cursor: "mfp-ajax-cur", tError: '<a href="%url%">The content</a> could not be loaded.' },
        proto: {
            initAjax: function () {
                e.types.push(z), (E = e.st.ajax.cursor), b(a + "." + z, I), b("BeforeChange." + z, I);
            },
            getAjax: function (i) {
                E && t(document.body).addClass(E), e.updateStatus("loading");
                var o = t.extend(
                    {
                        url: i.src,
                        success: function (o, s, n) {
                            var r = { data: o, xhr: n };
                            S("ParseAjax", r),
                                e.appendContent(t(r.data), z),
                                (i.finished = !0),
                                j(),
                                e._setFocus(),
                                setTimeout(function () {
                                    e.wrap.addClass(f);
                                }, 16),
                                e.updateStatus("ready"),
                                S("AjaxContentAdded");
                        },
                        error: function () {
                            j(), (i.finished = i.loadError = !0), e.updateStatus("error", e.st.ajax.tError.replace("%url%", i.src));
                        },
                    },
                    e.st.ajax.settings
                );
                return (e.req = t.ajax(o)), "";
            },
        },
    });
    var A,
        P = function (i) {
            if (i.data && void 0 !== i.data.title) return i.data.title;
            var o = e.st.image.titleSrc;
            if (o) {
                if (t.isFunction(o)) return o.call(e, i);
                if (i.el) return i.el.attr(o) || "";
            }
            return "";
        };
    t.magnificPopup.registerModule("image", {
        options: {
            markup:
                '<div class="mfp-figure"><div class="mfp-close"></div><figure><div class="mfp-img"></div><figcaption><div class="mfp-bottom-bar"><div class="mfp-title"></div><div class="mfp-counter"></div></div></figcaption></figure></div>',
            cursor: "mfp-zoom-out-cur",
            titleSrc: "title",
            verticalFit: !0,
            tError: '<a href="%url%">The image</a> could not be loaded.',
        },
        proto: {
            initImage: function () {
                var i = e.st.image,
                    o = ".image";
                e.types.push("image"),
                    b(c + o, function () {
                        "image" === e.currItem.type && i.cursor && t(document.body).addClass(i.cursor);
                    }),
                    b(a + o, function () {
                        i.cursor && t(document.body).removeClass(i.cursor), w.off("resize" + h);
                    }),
                    b("Resize" + o, e.resizeImage),
                    e.isLowIE && b("AfterChange", e.resizeImage);
            },
            resizeImage: function () {
                var t = e.currItem;
                if (t && t.img && e.st.image.verticalFit) {
                    var i = 0;
                    e.isLowIE && (i = parseInt(t.img.css("padding-top"), 10) + parseInt(t.img.css("padding-bottom"), 10)), t.img.css("max-height", e.wH - i);
                }
            },
            _onImageHasSize: function (t) {
                t.img && ((t.hasSize = !0), A && clearInterval(A), (t.isCheckingImgSize = !1), S("ImageHasSize", t), t.imgHidden && (e.content && e.content.removeClass("mfp-loading"), (t.imgHidden = !1)));
            },
            findImageSize: function (t) {
                var i = 0,
                    o = t.img[0],
                    s = function (n) {
                        A && clearInterval(A),
                            (A = setInterval(function () {
                                return o.naturalWidth > 0 ? void e._onImageHasSize(t) : (i > 200 && clearInterval(A), void (3 === ++i ? s(10) : 40 === i ? s(50) : 100 === i && s(500)));
                            }, n));
                    };
                s(1);
            },
            getImage: function (i, o) {
                var s = 0,
                    n = function () {
                        i &&
                            (i.img[0].complete
                                ? (i.img.off(".mfploader"), i === e.currItem && (e._onImageHasSize(i), e.updateStatus("ready")), (i.hasSize = !0), (i.loaded = !0), S("ImageLoadComplete"))
                                : 200 > ++s
                                ? setTimeout(n, 100)
                                : r());
                    },
                    r = function () {
                        i && (i.img.off(".mfploader"), i === e.currItem && (e._onImageHasSize(i), e.updateStatus("error", a.tError.replace("%url%", i.src))), (i.hasSize = !0), (i.loaded = !0), (i.loadError = !0));
                    },
                    a = e.st.image,
                    l = o.find(".mfp-img");
                if (l.length) {
                    var d = document.createElement("img");
                    (d.className = "mfp-img"),
                        i.el && i.el.find("img").length && (d.alt = i.el.find("img").attr("alt")),
                        (i.img = t(d).on("load.mfploader", n).on("error.mfploader", r)),
                        (d.src = i.src),
                        l.is("img") && (i.img = i.img.clone()),
                        (d = i.img[0]).naturalWidth > 0 ? (i.hasSize = !0) : d.width || (i.hasSize = !1);
                }
                return (
                    e._parseMarkup(o, { title: P(i), img_replaceWith: i.img }, i),
                    e.resizeImage(),
                    i.hasSize
                        ? (A && clearInterval(A), i.loadError ? (o.addClass("mfp-loading"), e.updateStatus("error", a.tError.replace("%url%", i.src))) : (o.removeClass("mfp-loading"), e.updateStatus("ready")), o)
                        : (e.updateStatus("loading"), (i.loading = !0), i.hasSize || ((i.imgHidden = !0), o.addClass("mfp-loading"), e.findImageSize(i)), o)
                );
            },
        },
    });
    var L;
    t.magnificPopup.registerModule("zoom", {
        options: {
            enabled: !1,
            easing: "ease-in-out",
            duration: 300,
            opener: function (t) {
                return t.is("img") ? t : t.find("img");
            },
        },
        proto: {
            initZoom: function () {
                var t,
                    i = e.st.zoom,
                    o = ".zoom";
                if (i.enabled && e.supportsTransition) {
                    var s,
                        n,
                        r = i.duration,
                        d = function (t) {
                            var e = t.clone().removeAttr("style").removeAttr("class").addClass("mfp-animated-image"),
                                o = "all " + i.duration / 1e3 + "s " + i.easing,
                                s = { position: "fixed", zIndex: 9999, left: 0, top: 0, "-webkit-backface-visibility": "hidden" },
                                n = "transition";
                            return (s["-webkit-" + n] = s["-moz-" + n] = s["-o-" + n] = s[n] = o), e.css(s), e;
                        },
                        c = function () {
                            e.content.css("visibility", "visible");
                        };
                    b("BuildControls" + o, function () {
                        if (e._allowZoom()) {
                            if ((clearTimeout(s), e.content.css("visibility", "hidden"), !(t = e._getItemToZoom()))) return void c();
                            (n = d(t)).css(e._getOffset()),
                                e.wrap.append(n),
                                (s = setTimeout(function () {
                                    n.css(e._getOffset(!0)),
                                        (s = setTimeout(function () {
                                            c(),
                                                setTimeout(function () {
                                                    n.remove(), (t = n = null), S("ZoomAnimationEnded");
                                                }, 16);
                                        }, r));
                                }, 16));
                        }
                    }),
                        b(l + o, function () {
                            if (e._allowZoom()) {
                                if ((clearTimeout(s), (e.st.removalDelay = r), !t)) {
                                    if (!(t = e._getItemToZoom())) return;
                                    n = d(t);
                                }
                                n.css(e._getOffset(!0)),
                                    e.wrap.append(n),
                                    e.content.css("visibility", "hidden"),
                                    setTimeout(function () {
                                        n.css(e._getOffset());
                                    }, 16);
                            }
                        }),
                        b(a + o, function () {
                            e._allowZoom() && (c(), n && n.remove(), (t = null));
                        });
                }
            },
            _allowZoom: function () {
                return "image" === e.currItem.type;
            },
            _getItemToZoom: function () {
                return !!e.currItem.hasSize && e.currItem.img;
            },
            _getOffset: function (i) {
                var o,
                    s = (o = i ? e.currItem.img : e.st.zoom.opener(e.currItem.el || e.currItem)).offset(),
                    n = parseInt(o.css("padding-top"), 10),
                    r = parseInt(o.css("padding-bottom"), 10);
                s.top -= t(window).scrollTop() - n;
                var a = { width: o.width(), height: (y ? o.innerHeight() : o[0].offsetHeight) - r - n };
                return void 0 === L && (L = void 0 !== document.createElement("p").style.MozTransform), L ? (a["-moz-transform"] = a.transform = "translate(" + s.left + "px," + s.top + "px)") : ((a.left = s.left), (a.top = s.top)), a;
            },
        },
    });
    var H = "iframe",
        D = function (t) {
            if (e.currTemplate[H]) {
                var i = e.currTemplate[H].find("iframe");
                i.length && (t || (i[0].src = "//about:blank"), e.isIE8 && i.css("display", t ? "block" : "none"));
            }
        };
    t.magnificPopup.registerModule(H, {
        options: {
            markup: '<div class="mfp-iframe-scaler"><div class="mfp-close"></div><iframe class="mfp-iframe" src="//about:blank" frameborder="0" allowfullscreen></iframe></div>',
            srcAction: "iframe_src",
            patterns: {
                youtube: { index: "youtube.com", id: "v=", src: "//www.youtube.com/embed/%id%?autoplay=1" },
                vimeo: { index: "vimeo.com/", id: "/", src: "//player.vimeo.com/video/%id%?autoplay=1" },
                gmaps: { index: "//maps.google.", src: "%id%&output=embed" },
            },
        },
        proto: {
            initIframe: function () {
                e.types.push(H),
                    b("BeforeChange", function (t, e, i) {
                        e !== i && (e === H ? D() : i === H && D(!0));
                    }),
                    b(a + "." + H, function () {
                        D();
                    });
            },
            getIframe: function (i, o) {
                var s = i.src,
                    n = e.st.iframe;
                t.each(n.patterns, function () {
                    return s.indexOf(this.index) > -1 ? (this.id && (s = "string" == typeof this.id ? s.substr(s.lastIndexOf(this.id) + this.id.length, s.length) : this.id.call(this, s)), (s = this.src.replace("%id%", s)), !1) : void 0;
                });
                var r = {};
                return n.srcAction && (r[n.srcAction] = s), e._parseMarkup(o, r, i), e.updateStatus("ready"), o;
            },
        },
    });
    var W = function (t) {
            var i = e.items.length;
            return t > i - 1 ? t - i : 0 > t ? i + t : t;
        },
        N = function (t, e, i) {
            return t.replace(/%curr%/gi, e + 1).replace(/%total%/gi, i);
        };
    t.magnificPopup.registerModule("gallery", {
        options: {
            enabled: !1,
            arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',
            preload: [0, 2],
            navigateByImgClick: !0,
            arrows: !0,
            tPrev: "Previous (Left arrow key)",
            tNext: "Next (Right arrow key)",
            tCounter: "%curr% of %total%",
        },
        proto: {
            initGallery: function () {
                var i = e.st.gallery,
                    s = ".mfp-gallery";
                return (
                    (e.direction = !0),
                    !(!i || !i.enabled) &&
                        ((n += " mfp-gallery"),
                        b(c + s, function () {
                            i.navigateByImgClick &&
                                e.wrap.on("click" + s, ".mfp-img", function () {
                                    return e.items.length > 1 ? (e.next(), !1) : void 0;
                                }),
                                o.on("keydown" + s, function (t) {
                                    37 === t.keyCode ? e.prev() : 39 === t.keyCode && e.next();
                                });
                        }),
                        b("UpdateStatus" + s, function (t, i) {
                            i.text && (i.text = N(i.text, e.currItem.index, e.items.length));
                        }),
                        b(d + s, function (t, o, s, n) {
                            var r = e.items.length;
                            s.counter = r > 1 ? N(i.tCounter, n.index, r) : "";
                        }),
                        b("BuildControls" + s, function () {
                            if (e.items.length > 1 && i.arrows && !e.arrowLeft) {
                                var o = i.arrowMarkup,
                                    s = (e.arrowLeft = t(o.replace(/%title%/gi, i.tPrev).replace(/%dir%/gi, "left")).addClass(g)),
                                    n = (e.arrowRight = t(o.replace(/%title%/gi, i.tNext).replace(/%dir%/gi, "right")).addClass(g));
                                s.click(function () {
                                    e.prev();
                                }),
                                    n.click(function () {
                                        e.next();
                                    }),
                                    e.container.append(s.add(n));
                            }
                        }),
                        b(u + s, function () {
                            e._preloadTimeout && clearTimeout(e._preloadTimeout),
                                (e._preloadTimeout = setTimeout(function () {
                                    e.preloadNearbyImages(), (e._preloadTimeout = null);
                                }, 16));
                        }),
                        void b(a + s, function () {
                            o.off(s), e.wrap.off("click" + s), (e.arrowRight = e.arrowLeft = null);
                        }))
                );
            },
            next: function () {
                (e.direction = !0), (e.index = W(e.index + 1)), e.updateItemHTML();
            },
            prev: function () {
                (e.direction = !1), (e.index = W(e.index - 1)), e.updateItemHTML();
            },
            goTo: function (t) {
                (e.direction = t >= e.index), (e.index = t), e.updateItemHTML();
            },
            preloadNearbyImages: function () {
                var t,
                    i = e.st.gallery.preload,
                    o = Math.min(i[0], e.items.length),
                    s = Math.min(i[1], e.items.length);
                for (t = 1; t <= (e.direction ? s : o); t++) e._preloadItem(e.index + t);
                for (t = 1; t <= (e.direction ? o : s); t++) e._preloadItem(e.index - t);
            },
            _preloadItem: function (i) {
                if (((i = W(i)), !e.items[i].preloaded)) {
                    var o = e.items[i];
                    o.parsed || (o = e.parseEl(i)),
                        S("LazyLoad", o),
                        "image" === o.type &&
                            (o.img = t('<img class="mfp-img" />')
                                .on("load.mfploader", function () {
                                    o.hasSize = !0;
                                })
                                .on("error.mfploader", function () {
                                    (o.hasSize = !0), (o.loadError = !0), S("LazyLoadError", o);
                                })
                                .attr("src", o.src)),
                        (o.preloaded = !0);
                }
            },
        },
    });
    var q = "retina";
    t.magnificPopup.registerModule(q, {
        options: {
            replaceSrc: function (t) {
                return t.src.replace(/\.\w+$/, function (t) {
                    return "@2x" + t;
                });
            },
            ratio: 1,
        },
        proto: {
            initRetina: function () {
                if (window.devicePixelRatio > 1) {
                    var t = e.st.retina,
                        i = t.ratio;
                    (i = isNaN(i) ? i() : i) > 1 &&
                        (b("ImageHasSize." + q, function (t, e) {
                            e.img.css({ "max-width": e.img[0].naturalWidth / i, width: "100%" });
                        }),
                        b("ElementParse." + q, function (e, o) {
                            o.src = t.replaceSrc(o, i);
                        }));
                }
            },
        },
    }),
        C();
});

// ----------------------------------------------------------- //
// ---------------------- Main scripts ---------------------- //
(function (t, e, i) {
    t(function () {
        "use strict";
        t(".open-popup-link").magnificPopup({ type: "inline", midClick: !0, mainClass: "mfp-fade" });
        t(".send-subscribe").click(function (e) {
            e.preventDefault();
            var i = t(this),
                o = i.closest("form").find("input[type='email']").val(),
                s = i.closest("form").attr("id");
            "" == o && (o = i.closest("form").find(".simple-input").val());
            var n = "function" == typeof ga && Object.hasOwnProperty.bind(ga)("getAll") ? ga.getAll()[0].get("clientId") : null,
                r = g("referrer"),
                a = { url: "https://vdc.xelon.ch/api/user/trial/subscribe?email=" + o + "&cid=" + n + "&referrer=" + r, method: "POST", timeout: 0 };
            t.ajax(a)
                .done(function (e) {
                    i.closest("form").find(".msg").html(e.message).fadeIn("slow"),
                        (window.dataLayer = window.dataLayer || []),
                        window.dataLayer.push({ event: "formSubmitted", "gtm.elementId": s }),
                        "object" == typeof window.analytics && "function" == typeof window.analytics.identify && window.analytics.identify({ email: o }),
                        t("#open-popup .modal-area").css("padding-bottom", "60px"),
                        (document.location.href = "https://vdc.xelon.ch/demo?email=" + o),
                        i.remove();
                })
                .fail(function (t, e, o) {
                    console.log({ xhr: t, textStatus: e, errorThrown: o }),
                        t &&
                            t.responseJSON &&
                            "Email has been already used" === t.responseJSON.error &&
                            (i.closest("form").append('<a class="xln-button" href="https://vdc.xelon.ch/login">Go to Login</a>'),
                            i.closest("form").find(".simple-input").remove(),
                            i.closest("form").find(".modal-input").remove(),
                            i.closest("form").find(".msg").html("An account with this email already exists").addClass("rose-c").fadeIn("slow"),
                            i.remove()),
                        t && t.responseJSON && t.responseJSON.error && t.responseJSON.error.email
                            ? i.closest("form").find(".msg").html(t.responseJSON.error.email).addClass("rose-c").fadeIn("slow")
                            : t && t.responseJSON && t.responseJSON.error && t.responseJSON.error && i.closest("form").find(".msg").html(t.responseJSON.error).addClass("rose-c").fadeIn("slow");
                });
        });
        var o = window.location.toString();
        function s(t) {
            return "" != t && /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/gim.test(t) ? (jQuery("#email").css("border", "none"), !0) : (jQuery("#email").css("border", "1px solid #EF5261"), !1);
        }
        function n(t) {
            return "" != t && /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/gim.test(t) ? (jQuery("#hy_email").css("border", "none"), !0) : (jQuery("#hy_email").css("border", "1px solid #EF5261"), !1);
        }
        function r(t) {
            return "" != t && /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/gim.test(t) ? (jQuery("#modalEmail").css("border", "none"), !0) : (jQuery("#modalEmail").css("border", "1px solid #EF5261"), !1);
        }
        function a(t) {
            return "" != t && /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/gim.test(t) ? (jQuery("#soEmail").css("border", "none"), !0) : (jQuery("#soEmail").css("border", "1px solid #EF5261"), !1);
        }
        function l(t) {
            return "" != t && /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/gim.test(t) ? (jQuery("#pr_email").css("border", "solid 2px rgba(255, 255, 255, 0.3)"), !0) : (jQuery("#pr_email").css("border", "solid 2px red"), !1);
        }
        function d(t) {
            return "" != t && /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/gim.test(t) ? (jQuery("#spEmail").css("border", "none"), !0) : (jQuery("#spEmail").css("border", "1px solid #EF5261"), !1);
        }
        function c(t) {
            return "" != t && /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/gim.test(t) ? (jQuery("#subsEmail").css("border", "none"), !0) : (jQuery("#subsEmail").css("border", "1px solid #EF5261"), !1);
        }
        function u(t) {
            "" == t.val() ? t.css("border", "1px solid #EF5261") : t.css("border", "none");
        }
        function p(e) {
            var i = t("label[for='" + e.attr("id") + "']");
            return 0 == i.length && (i = e.closest("label")), 0 == i.length ? null : i;
        }
        function h(t) {
            let e = p(t);
            e && e.addClass("up");
        }
        function f(t) {
            let e = p(t);
            e && e.removeClass("up");
        }
        if (
            (jQuery(".submit").on("click", function (e) {
                e.preventDefault();
                var i = t(this).closest("form").serialize();
                t("#contact-form input:checkbox:not(:checked)").each(function (t) {
                    i += "&" + this.name + "=false";
                });
                jQuery("#name").val();
                var n = jQuery("#email").val(),
                    r = jQuery("#msg").val();
                jQuery("#subj").val();
                if ((s(n), "" == r || "" == n || 0 == s(jQuery("#email").val()))) return s(n), u(jQuery("#msg")), u(jQuery("#name")), !1;
                jQuery.ajax({
                    type: "post",
                    url: ajaxactionurl,
                    data: "action=send_email&" + i + "&url=" + o,
                    dataType: "json",
                    success: function (e) {
                        jQuery("#contact-form input").val(""), jQuery("#contact-form textarea").val(""), t(".sucmsg1").fadeIn(0).html(e.data).addClass("sucmsg-style").fadeOut(3e4);
                    },
                    error: function (t, e, i) {
                        console.log(e);
                    },
                });
            }),
            jQuery(".hy-submit").on("click", function (e) {
                e.preventDefault();
                var i = t(this).closest("form").serialize();
                t("#hy-form input:checkbox:not(:checked)").each(function (t) {
                    i += "&" + this.name + "=false";
                });
                jQuery("#hy_name").val();
                var s = jQuery("#hy_email").val(),
                    r = jQuery("#hy_msg").val();
                if ((n(s), "" == r || "" == s || 0 == n(jQuery("#hy_email").val()))) return n(s), u(jQuery("#hy_msg")), u(jQuery("#hy_name")), !1;
                jQuery.ajax({
                    type: "post",
                    url: ajaxactionurl,
                    data: "action=send_email&" + i + "&url=" + o,
                    dataType: "json",
                    success: function (e) {
                        jQuery("#hy-form input").val(""), jQuery("#hy-form textarea").val(""), t(".sucmsg2").fadeIn(0).html(e.data).addClass("sucmsg-style").fadeOut(3e4);
                    },
                    error: function (t, e, i) {
                        console.log(e);
                    },
                });
            }),
            jQuery(".subs-submit").on("click", function (e) {
                e.preventDefault();
                var i = t(this).closest("form").serialize();
                t("#subs-form input:checkbox:not(:checked)").each(function (t) {
                    i += "&" + this.name + "=false";
                });
                var s = jQuery("#subsEmail").val();
                if ((c(s), "" == s || 0 == c(jQuery("#subsEmail").val()))) return c(s), !1;
                jQuery.ajax({
                    type: "post",
                    url: ajaxactionurl,
                    data: "action=send_email&" + i + "&url=" + o,
                    dataType: "json",
                    success: function (e) {
                        jQuery("#subs-form")[0].reset(), t(".sucmsg4").fadeIn(0).html(e.data).addClass("sucmsg-style");
                        setTimeout(() => {
                            jQuery(".sucmsg4").fadeOut(1000);
                        }, 2000);
                    },
                    error: function (t, e, i) {
                        console.log(e);
                    },
                });
            }),
            jQuery(".support-submit").on("click", function (e) {
                e.preventDefault();
                var i = t(this).closest("form").serialize();
                t("#support-form input:checkbox:not(:checked)").each(function (t) {
                    i += "&" + this.name + "=false";
                });
                jQuery("#spFullname").val();
                var s = jQuery("#spEmail").val(),
                    n = jQuery("#spMsg").val();
                jQuery("#spCompany").val();
                if ((d(s), "" == n || "" == s || 0 == d(jQuery("#spEmail").val()))) return r(modalEmail), u(jQuery("#spMsg")), u(jQuery("#spCompany")), u(jQuery("#spFullname")), !1;
                jQuery.ajax({
                    type: "post",
                    url: ajaxactionurl,
                    data: "action=send_email&" + i + "&url=" + o,
                    dataType: "json",
                    success: function (e) {
                        jQuery("#support-form input").val(""), jQuery("#support-form textarea").val(""), t(".sucmsg5").fadeIn(0).html(e.data).addClass("sucmsg-style").fadeOut(3e4);
                    },
                    error: function (t, e, i) {
                        console.log(e);
                    },
                });
            }),
            jQuery(".subscribe-btn").on("click", function (e) {
                e.preventDefault();
                var i = t(this).closest("form").serialize();
                t("#subscription-form input:checkbox:not(:checked)").each(function (t) {
                    i += "&" + this.name + "=false";
                });
                var s = jQuery("#soFirstName").val(),
                    n = jQuery("#soLastName").val(),
                    r = jQuery("#soEmail").val(),
                    l = jQuery("#soCompany").val();
                if ((a(r), "" == s || "" == n || "" == r || "" == l || 0 == a(jQuery("#soEmail").val()))) return u(jQuery("#soFirstName")), u(jQuery("#soLastName")), u(jQuery("#soCompany")), !1;
                jQuery.ajax({
                    type: "post",
                    url: ajaxactionurl,
                    data: "action=send_email&" + i + "&url=" + o,
                    dataType: "json",
                    success: function (e) {
                        jQuery("#subscription-form input").val(""), t(".sucmsg7").fadeIn(0).html(e.data).addClass("sucmsg-style").fadeOut(3e4);
                    },
                    error: function (t, e, i) {
                        console.log(e);
                    },
                });
            }),
            jQuery(".pdf-submit").on("click", function (e) {
                e.preventDefault();
                var i = t(this).closest("form").serialize();
                t("#pdfRequest input:checkbox:not(:checked)").each(function (t) {
                    i += "&" + this.name + "=false";
                });
                var s = jQuery("#pr_name").val(),
                    n = jQuery("#pr_email").val(),
                    r = jQuery("#pr_company").val(),
                    a = jQuery("#pr_position").val(),
                    d = jQuery("#pdfLink").val();
                if ((l(n), "" == s || "" == r || "" == n || "" == a || 0 == l(jQuery("#pr_email").val()))) return u(jQuery("#pr_name")), u(jQuery("#pr_company")), u(jQuery("#pr_position")), !1;
                jQuery.ajax({
                    type: "post",
                    url: ajaxactionurl,
                    data: "action=send_email&" + i + "&url=" + o,
                    dataType: "json",
                    success: function (e) {
                        jQuery("#pdfRequest input").val(""), t(".sucmsg8").fadeIn(0).html(e.data).addClass("sucmsg-style").fadeOut(3e4), (window.location.href = d);
                    },
                    error: function (t, e, i) {
                        console.log(e);
                    },
                });
            }),
            jQuery("#email").on("keypress", function () {
                s(jQuery(this).val());
            }),
            jQuery("#name").on("keypress", function () {
                u(jQuery(this));
            }),
            jQuery("#msg").on("keypress", function () {
                u(jQuery(this));
            }),
            jQuery("#hy_name").on("keypress", function () {
                u(jQuery(this));
            }),
            jQuery("#fullname").on("keypress", function () {
                u(jQuery(this));
            }),
            jQuery("#company").on("keypress", function () {
                u(jQuery(this));
            }),
            jQuery("#modalMsg").on("keypress", function () {
                u(jQuery(this));
            }),
            jQuery("#hy_email").on("keypress", function () {
                n(jQuery(this).val());
            }),
            jQuery("#modalEmail").on("keypress", function () {
                r(jQuery(this).val());
            }),
            jQuery("#subsEmail").on("keypress", function () {
                c(jQuery(this).val());
            }),
            jQuery("#spEmail").on("keypress", function () {
                c(jQuery(this).val());
            }),
            jQuery("#soEmail").on("keypress", function () {
                a(jQuery(this).val());
            }),
            jQuery("#soFirstName").on("keypress", function () {
                u(jQuery(this));
            }),
            jQuery("#soLastName").on("keypress", function () {
                u(jQuery(this));
            }),
            jQuery("#soCompany").on("keypress", function () {
                u(jQuery(this));
            }),
            jQuery("#pr_name").on("keypress", function () {
                u(jQuery(this));
            }),
            jQuery("#pr_company").on("keypress", function () {
                u(jQuery(this));
            }),
            jQuery("#pr_position").on("keypress", function () {
                u(jQuery(this));
            }),
            jQuery("#aFullname").on("keypress", function () {
                u(jQuery(this));
            }),
            jQuery("#aModalMsg").on("keypress", function () {
                u(jQuery(this));
            }),
            t("a[href^='#']").not('.open-popup-link').click(function (e) {
                if ((e.preventDefault(), !t(this).hasClass("link-soon") && !t(this).parent().hasClass("link-soon-li"))) {
                    const bp992 = window.matchMedia('(min-width: 992px)').matches;
                    const mediaOffset = bp992 ? 100 : 20;
                    var i = t(t(this).attr("href")).offset().top - mediaOffset;
                    console.log(i);
                    t("body, html").animate({ scrollTop: i });
                }
            }),
            t("#fileCv").change(function () {
                t(this).closest("label").clone();
                var e = t("#fileCv")[0].files[0].name;
                e && (t('label[for*="fileCv"]').text(e), t(this).closest(".input-file-wrap").addClass("fLoaded"));
            }),
            t("#open-apply .reset-label").click(function () {
                t("#fileCv").val(""),
                    t('[for*="fileCv"]').html(
                        "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><path d='M490.667 234.667H158.17l112.915-112.915c8.331-8.331 8.331-21.839 0-30.17s-21.839-8.331-30.17 0L91.582 240.915a21.56 21.56 0 00-1.413 1.563c-.202.246-.378.506-.568.759-.228.304-.463.601-.674.917-.203.303-.379.618-.564.929-.171.286-.351.566-.509.861-.169.317-.313.643-.465.966-.145.308-.299.611-.43.926-.13.314-.235.635-.349.953-.122.338-.251.672-.356 1.018-.096.318-.167.642-.248.963-.089.353-.188.702-.259 1.061-.074.372-.117.747-.171 1.122-.045.314-.105.623-.136.941a21.331 21.331 0 00-.105 2.083l-.001.022.001.022c.001.695.037 1.39.105 2.083.031.318.091.627.136.941.054.375.097.75.171 1.122.071.36.17.708.259 1.061.081.322.151.645.248.963.105.346.234.68.356 1.018.114.318.219.639.349.953.131.316.284.618.43.926.152.323.296.649.465.966.158.295.338.575.509.861.186.311.361.626.564.929.211.316.447.613.674.917.19.253.365.513.568.759.446.544.916 1.067 1.413 1.563l149.333 149.333c8.331 8.331 21.839 8.331 30.17 0s8.331-21.839 0-30.17L158.17 277.333h332.497c11.782 0 21.333-9.551 21.333-21.333s-9.551-21.333-21.333-21.333zM21.333 85.333C9.551 85.333 0 94.885 0 106.667v298.667c0 11.782 9.551 21.333 21.333 21.333 11.782 0 21.333-9.551 21.333-21.333V106.667c.001-11.782-9.551-21.334-21.333-21.334z'/></svg>Upload CV"
                    ),
                    t(".input-file-wrap").removeClass("fLoaded");
            }),
            t("input, textarea").change(function () {
                let e = t(this);
                e.val().length > 0 ? (e.addClass("not-empty"), h(e)) : (e.removeClass("not-empty"), f(e));
            }),
            t("input, textarea").focus(function () {
                h(t(this));
            }),
            t("input, textarea")
                .focusout(function () {
                    let e = t(this);
                    "" === t(this).val() ? (e.removeClass("not-empty"), f(e)) : (e.addClass("not-empty"), h(e));
                })
                .focusout(),
            t(document).ready(function () {
                document.location.href.indexOf("/en/") > -1 ? t(".menu-item-weglot.weglot-en").addClass("wpml-ls-current-language") : t(".menu-item-weglot.weglot-de").addClass("wpml-ls-current-language");
            }),
            !g("referrer"))
        ) {
            let t = new Date(),
                e = t.getFullYear() + "-" + (t.getMonth() + 1) + "-" + t.getDate() + " " + t.getHours() + ":" + t.getMinutes() + ":" + t.getSeconds();
            var m = { http_referrer: document.referrer, page_url: window.location.href, date_of_first_visit: e };
            !(function (t, e, i) {
                var o = "";
                if (i) {
                    var s = new Date();
                    s.setTime(s.getTime() + 24 * i * 60 * 60 * 1e3), (o = "; expires=" + s.toUTCString());
                }
                document.cookie = t + "=" + (e || "") + o + "; path=/";
            })("referrer", JSON.stringify(m), 30);
        }
        function g(t) {
            for (var e = t + "=", i = document.cookie.split(";"), o = 0; o < i.length; o++) {
                for (var s = i[o]; " " == s.charAt(0); ) s = s.substring(1, s.length);
                if (0 == s.indexOf(e)) return s.substring(e.length, s.length);
            }
            return null;
        }
    });
})(jQuery);