(function (t, e, i) {
    t(function () {
        "use strict";
        t(document).ready(function (t) {
            t(".team-rows .aut-item").slice(0, 8).show(),
                0 != t(".team-rows .aut-item:hidden").length && t("#loadMembers").show(),
                t("#loadMembers").on("click", function (e) {
                    e.preventDefault(), t(".team-rows .aut-item:hidden").slice(0, 8).slideDown(), 0 == t(".team-rows .aut-item:hidden").length && (t("#loadMembers").fadeOut("slow"), console.log("atata"));
                }),
                t(".team-rows .aut-item").length < 9 && t("#loadMembers").hide(),
                t(".group-services").multiselect({ texts: { placeholder: "Nach Service filtern" } });
            var e,
                i,
                o = {};
            if (t("body").hasClass("page-template-partner-locator")) {
                var s = t(".s-partner-locator .tabs").isotope({
                    itemSelector: ".partner-locate-one",
                    filter: function () {
                        var o = t(this),
                            s = !i || o.find(".filter-search").text().match(i),
                            n = !e || o.is(e);
                        return s && n;
                    },
                });
                s.data("isotope").filteredItems.length ? t(".noresult-pl").fadeOut() : t(".noresult-pl").show();
            }
            var n = t(".ms-options input[type='checkbox']");
            document.querySelector(".ytvideo") &&
                (t(document).ready(function () {
                    if (t(".ytvideo").css("background-image").indexOf("/project") >= 0) return t(".ytvideo").trigger("click"), t(".ytvideo iframe").find("video").attr("src", t(".ytvideo iframe").attr("src")), !1;
                }),
                t(document).ready(function () {
                    if (t(".ytvideo").css("background-image").indexOf("default.png") >= 0) return t(".ytvideo").trigger("click"), t(".ytvideo iframe").find("video").attr("src", t(".ytvideo iframe").attr("src")), !1;
                })),
            t(".group-services").on("change", function (i) {
                var r = t(i.target).attr("value-group"),
                    a = [];
                n.filter(":checked").each(function () {
                    a.push(this.value);
                }),
                    (a = a.join(", ")),
                    (o[r] = a),
                    (e = (function (t) {
                        var e = "";
                        for (var i in t) e += t[i];
                        return console.log(e), e;
                    })(o)),
                    console.log(e),
                    s.isotope(),
                    s.data("isotope").filteredItems.length ? t(".noresult-pl").fadeOut() : t(".noresult-pl").show();
            });
            var r,
                a,
                l,
                d = t(".quicksearch").keyup(
                    ((r = function () {
                        (i = new RegExp(d.val(), "gi")), console.log(i), s.isotope(), s.data("isotope").filteredItems.length ? t(".noresult-pl").fadeOut() : t(".noresult-pl").show();
                    }),
                    (a = a || 100),
                    function () {
                        clearTimeout(l);
                        var t = arguments,
                            e = this;
                        function i() {
                            r.apply(e, t);
                        }
                        l = setTimeout(i, a);
                    })
                );
            if (
                (t(".parter-area").click(function () {
                    t(".content-pl").hide();
                }),
                t(document).mouseup(function (e) {
                    var i = t(".parter-area");
                    i.is(e.target) || 0 !== i.has(e.target).length || t(".content-pl").fadeIn();
                }),
                t(window).scroll(function () {
                    t(this).scrollTop();
                }),
                t(".popup-open-pl").magnificPopup({
                    type: "inline",
                    midClick: !0,
                    mainClass: "mfp-fade",
                    callbacks: {
                        open: function () {
                            var e = [];
                            t(".ms-options li.selected").each(function (i) {
                                var o = t(this).find("label").text();
                                e.push(o);
                            }),
                                t("#aServices").val(e);
                        },
                    },
                }),
                t(".slider-tm") && t(".slider-tm").slick({ dots: !0, infinite: !0, speed: 300, slidesToShow: 1, adaptiveHeight: !0, speed: 500 }),
                t(".bg-slider-company .bg-one").length > 1)
            )
                var c = !0;
            else c = !1;
            t(".bg-slider-company") && t(".bg-slider-company").slick({ dots: c, arrows: !1, infinite: !0, speed: 300, slidesToShow: 1, adaptiveHeight: !0, speed: 500 }),
            t(".aub-td").append(t(".bg-slider-company .slick-dots")),
            t(".tab")
                .click(function () {
                    t(".tab").removeClass("active").eq(t(this).index()).addClass("active"), t(".tab_item").hide().eq(t(this).index()).fadeIn();
                })
                .eq(0)
                .addClass("active"),
            t(".tab_item").css("display", "none"),
            t(".tab_item:first-child").css("display", "block"),
            t(".gallery-slider") && t(".gallery-slider").slick({ infinite: !0, slidesToShow: 1, slidesToScroll: 1, dots: !0, nextArrow: '<i class="las la-angle-right"></i>', prevArrow: '<i class="las la-angle-left"></i>', adaptiveHeight: !0 }),
            t(".ms-blocks2-one").matchHeight(),
            t(".ms-blocks1-one h3").matchHeight(),
            t(".price-blocks-eh").matchHeight(),
            t(".kubernetes-btn p").matchHeight(),
            t(".usercases-one-eh").matchHeight(),
            t(".posts-3col .f-item-bottom").matchHeight(),
            t(".link-soon").click(function (e) {
                e.preventDefault(), t(".link-soon").removeClass("show-tag"), t(this).addClass("show-tag");
            }),
            t("body").on("click", ".link-soon-li > a", function (e) {
                e.preventDefault(), t(".link-soon-li > a").removeClass("show-tag"), t(this).addClass("show-tag");
            });
            var u = t(".price-calc").data("dprice");
            var p = 1;
            t(".price-calc .price-val").each(function () {
                var e = t(this).find(".polzunok"),
                    i = e.data("value"),
                    o = e.data("price");
                e.slider({
                    animate: "slow",
                    range: "min",
                    max: i.length - 1,
                    value: 0,
                    slide: function (s, n) {
                        e.closest(".price-val").find(".price-calc-input").text(i[n.value]),
                            e.attr("data-sprice", o[n.value]),
                            (function () {
                                var e = 1;
                                t(".price-calc .price-val").each(function (i) {
                                    var o = t(this).find(".polzunok");
                                    1 == e && (res_1 = o.attr("data-sprice")), 2 == e && (res_2 = o.attr("data-sprice")), 3 == e && (res_3 = o.attr("data-sprice")), e++;
                                });
                                var i = parseInt(res_1) + parseInt(res_2) + parseInt(res_3) + parseInt(u);
                                t(".price-calc-res var").html(i);
                            })();
                    },
                });
                var s = e.slider("value");
                e.parent().find(".price-calc-input").html(i[s]),
                    e.prepend('<div class="tags-val"></div>'),
                    t.each(i, function (t, i) {
                        e.find(".tags-val").append("<div><span>" + i + "</span></div>");
                    }),
                    e.attr("data-sprice", o[s]),
                    1 == p && (res1 = e.data("sprice")),
                    2 == p && (res2 = e.data("sprice")),
                    3 == p && (res3 = e.data("sprice")),
                    p++;
            }),
            t("body").hasClass("page-template-pricing-dedicated-machines") &&
                (function (e, i, o) {
                    var s = e + i + o + u;
                    t(".price-calc-res var").html(s);
                })(res1, res2, res3),
            t(".single-post .content a").on("click", function (e) {
                var i = t(this),
                    o = t(this).find("img").width(),
                    s = t(this).attr("href"),
                    n = s.split("v=");
                (n = (n = (n = n[1]).split("&t"))[0]),
                    s.indexOf("youtube") >= 0 &&
                        (e.preventDefault(),
                        i.after(
                            '<div style="max-width:' +
                                o +
                                'px;margin:0 auto;"><div style="position:relative;height:0;padding-bottom:56.21%"><iframe src="https://www.youtube.com/embed/' +
                                n +
                                '?autoplay=1" style="position:absolute;width:100%;height:100%;left:0" width="641" height="360" frameborder="0" allowfullscreen></iframe></div></div>'
                        ),
                        i.remove());
            }),
            t(".slider").bxSlider({ mode: "horizontal", infiniteLoop: !0, pager: !0, pagerType: "full", touchEnabled: !0, captions: !0, oneToOneTouch: !0 }),
            t(".partners-slider") && t(".partners-slider").slick({
                infinite: !0,
                slidesToShow: 5,
                slidesToScroll: 1,
                nextArrow: '<i class="las la-angle-right"></i>',
                prevArrow: '<i class="las la-angle-left"></i>',
                adaptiveHeight: !0,
                autoplay: !0,
                autoplaySpeed: 4e3,
                responsive: [
                    { breakpoint: 1024, settings: { slidesToShow: 3, slidesToScroll: 1 } },
                    { breakpoint: 768, settings: { slidesToShow: 2, slidesToScroll: 1 } },
                    { breakpoint: 576, settings: { slidesToShow: 2, slidesToScroll: 1, arrows: !1 } },
                ],
            }),
            t(".browse-slider").bxSlider({
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
                captions: !0,
            }),
            t(".projects, .blog-loop, .filtering").on("click", ".f-item", function () {
                var e = t(this).find(".item-link").attr("href");
                location.href = e;
            });
            
            t(".ytvideo[data-video]").one("click", function () {
                var e = t(this);
                e.attr("width"), e.attr("height");
                e.html('<iframe src="https://www.youtube.com/embed/' + e.data("video") + '?autoplay=1"></iframe>');
            });
            jQuery(".filter-post .filter-link").on("click", function (e) {
                e.preventDefault(), jQuery(".filter-post .filter-link").removeClass("filter-active"), jQuery(this).addClass("filter-active");
                var i = jQuery(this).data("service-id"),
                    o = jQuery("#country-select").find("option:selected").data("country-id");
                t.ajax({
                    type: "POST",
                    url: ajaxactionurl,
                    data: { action: "get_projects", service_id: i, country_id: o },
                    success: function (e) {
                        jQuery("#ajax-container").html(e), t("#ajax-container .filter-link").css("opacity", 1);
                    },
                });
            });
            
            t("#share").jsSocials({ showLabel: !0, showCount: !1, shareIn: "popup", shares: ["linkedin", "twitter", "facebook", "email"] });
            t(".moreBox").slice(0, 4).show();
            0 != t(".blogBox:hidden").length && t("#loadMore").show();
            t("#loadMore").on("click", function (e) {
                e.preventDefault(), t(".moreBox:hidden").slice(0, 4).slideDown(), 0 == t(".moreBox:hidden").length && t("#loadMore").fadeOut("slow");
            }),            
            t(".pi-item").click(function () {
                t(".active").removeClass("active"), 0 == t(this).children(".pi-item-text").is(":visible") && (t(this).addClass("active"), t(".pi-item .pi-item-text").slideUp(600)), t(this).children(".pi-item-text").slideToggle(600);
            }),
            t(".cp-slider") && t(".cp-slider").slick({ infinite: !0, slidesToShow: 3, slidesToScroll: 1, responsive: [{ breakpoint: 767, settings: { slidesToShow: 1, slidesToScroll: 1 } }] }),
            t(".aut-slider") && t(".aut-slider").slick({
                infinite: !1,
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [
                    { breakpoint: 992, settings: { slidesToShow: 3, slidesToScroll: 3 } },
                    { breakpoint: 768, settings: { slidesToShow: 2, slidesToScroll: 2 } },
                    { breakpoint: 576, settings: { slidesToShow: 1, slidesToScroll: 1 } },
                ],
            }),
            t(".xh-row") && t(".xh-row").slick({
                infinite: !1,
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [
                    { breakpoint: 1170, settings: { slidesToShow: 3, slidesToScroll: 1 } },
                    { breakpoint: 992, settings: { slidesToShow: 2, slidesToScroll: 2 } },
                    { breakpoint: 576, settings: { slidesToShow: 1, slidesToScroll: 1 } },
                ],
            }),
            t(".page-customer-project .filter-post .filter-link").on("click", function (e) {
                e.preventDefault(), jQuery(".page-customer-project .filter-post .filter-link").removeClass("filter-active"), jQuery(this).addClass("filter-active");
                var i = jQuery(this).data("service-id"),
                    o = jQuery("#country-select").find("option:selected").data("country-id");
                t.ajax({
                    type: "POST",
                    url: ajaxactionurl,
                    cache: !1,
                    headers: { "cache-control": "no-cache" },
                    data: { action: "get_stories", service_id: i, country_id: o },
                    success: function (e) {
                        t("#ajax-projects").html(e),
                            t("#ajax-projects .filter-link").css("opacity", 1),
                            t(".cp-slider") && t(".cp-slider").slick({ infinite: !0, slidesToShow: 3, slidesToScroll: 1, responsive: [{ breakpoint: 767, settings: { slidesToShow: 1, slidesToScroll: 1 } }] });
                    },
                });
            }),
            jQuery("body").on("click", "#load-more-events", function (e) {
                e.preventDefault();
                var i = jQuery(this).data("service-id"),
                    o = jQuery(this).data("country-id"),
                    s = jQuery(this).data("page"),
                    n = jQuery(this);
                t.ajax({
                    type: "POST",
                    url: window.wp_data.ajax_url,
                    data: { action: "get_projects", service_id: i, country_id: o, paged: s },
                    success: function (e) {
                        n.remove(), jQuery("#ajax-container").append(e), t(".posts-3col .f-item-bottom").matchHeight();
                    },
                });
            }),
            t(".bookmark").click(function (e) {
                e.preventDefault();
                var i = this.href,
                    o = this.title;
                if (navigator.userAgent.toLowerCase().indexOf("chrome") > -1)
                    alert("This function is not available in Google Chrome. Click the star symbol at the end of the address-bar or hit Ctrl-D (Command+D for Macs) to create a bookmark.");
                else if (window.sidebar) window.sidebar.addPanel(o, i, "");
                else if (window.external || document.all) window.external.AddFavorite(i, o);
                else {
                    if (!window.opera) return alert("Your browser does not support this bookmark action"), !1;
                    t(".bookmark").attr("href", i), t(".bookmark").attr("title", o), t(".bookmark").attr("rel", "sidebar");
                }
            });            
            
            var e, i = document.getElementsByClassName("accordion");
            for (e = 0; e < i.length; e++) {
                i[e].addEventListener("click", function () {
                    this.classList.toggle("acc-active");
                    var t = this.nextElementSibling;
                    "block" === t.style.display ? (t.style.display = "none") : (t.style.display = "block");
                });
            }
        });
    });
})(jQuery);