(function ($) {
    // Modal submit form    
    function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {c = c.substring(1);}
        if (c.indexOf(name) == 0) {return c.substring(name.length, c.length);}}
        return "";
    }

    function hshq(email, portalId, formId){
        let hshqr = new XMLHttpRequest();
        hshqr.open("POST", `https://api.hsforms.com/submissions/v3/integration/submit/${portalId}/${formId}`, true);
        hshqr.setRequestHeader("Content-Type", "application/json");
        let fp = JSON.parse('{ "fields": [ { "name": "email", "value": "" } ], "context": { "hutk": "", "pageUri": "", "pageName": "" },"skipValidation": "true", "legalConsentOptions": { "consent": { "consentToProcess": true, "text": "I agree to allow Example Company to store and process my personal data.", "communications": [ { "value": true, "subscriptionTypeId": 999, "text": "I agree to receive marketing communications from Example Company." } ] } } } ');
        fp.fields[0].value = email;
        fp.context.hutk = getCookie("hubspotutk");
        fp.context.pageUri = document.location.href;
        fp.context.pageName = document.title;
        hshqr.send(JSON.stringify(fp));
    }

    function cookieRef(t) {
        for (var e = t + "=", i = document.cookie.split(";"), o = 0; o < i.length; o++) {
            for (var s = i[o]; " " == s.charAt(0); ) s = s.substring(1, s.length);
            if (0 == s.indexOf(e)) return s.substring(e.length, s.length);
        }
        return null;
    }

    // Sugn up forms
    $(".send-subscribe").on('click', function (e) {
        e.preventDefault();

        const submitBtn = $(this);
        const submitForm = submitBtn.closest("form");
        const submitMsg = submitForm.find(".msg");
        const submitEmail = submitForm.find("input[type='email']").val();
        const submitId = submitForm.attr("id");
        const submitPortalId = submitForm.attr("data-portal-id");
        const submitFormId = submitForm.attr("data-form-id");
        const submitCID = "function" == typeof ga && Object.hasOwnProperty.bind(ga)("getAll") ? ga.getAll()[0].get("clientId") : null;
        submitEmail == "" && (submitEmail = submitForm.find(".simple-input").val());
        if (isEmail(submitEmail)) {
            if(getCookie("hubspotutk")!=null && submitEmail && submitPortalId && submitFormId){
                hshq(submitEmail, submitPortalId, submitFormId);
                console.log('Sign up form sent\nemail: ' + submitEmail + '\nportalID: ' + submitPortalId + '\nformID: ' + submitFormId);
            }
            
            $.ajax({ 
                url: "https://vdc.xelon.ch/api/user/trial/subscribe?email=" + submitEmail + "&cid=" + submitCID + "&referrer=" + cookieRef("referrer"), 
                method: "POST", 
                timeout: 0
            })
            .done(function (e) {
                submitMsg.html(e.message).fadeIn("slow"),
                    (window.dataLayer = window.dataLayer || []),
                    window.dataLayer.push({ event: "formSubmitted", "gtm.elementId": submitId }),
                    "object" == typeof window.analytics && "function" == typeof window.analytics.identify && window.analytics.identify({ email: submitEmail }),
                    submitBtn.remove();
            })
            .fail(function (t, e, o) {
                // console.log({ xhr: t, textStatus: e, errorThrown: o });
                t &&
                    t.responseJSON &&
                    "Email has been already used" === t.responseJSON.error &&
                    (submitForm.append('<a class="xln-button" href="https://vdc.xelon.ch/login">Go to Login</a>'),
                    submitForm.find(".simple-input").remove(),
                    submitForm.find(".modal-input").remove(),
                    submitMsg.html("An account with this email already exists").fadeIn("slow"),
                    submitBtn.remove()),
                t && t.responseJSON && t.responseJSON.error && t.responseJSON.error.email
                    ? submitMsg.html(t.responseJSON.error.email).fadeIn("slow")
                    : t && t.responseJSON && t.responseJSON.error && t.responseJSON.error && submitMsg.html(t.responseJSON.error).fadeIn("slow");
            });
        }
    });
    
    // Thrive leads forms
    function thriveHubspot() {
        $('.tve-leads-lightbox').length && console.log('Thrive leads form found');
        
        $('.tve-form-button-submit').on('click', function(){
            const thriveBtn = $(this);
            const thriveForm = thriveBtn.closest("form");
            const thriveEmail = thriveForm.find("input[type='email']").val();
            const thrivePortalId = 3366455;
            const thriveFormId = thriveForm.find("[data-name=FormID]").val();
            if(getCookie("hubspotutk") != null && thriveEmail && isEmail(thriveEmail) && thrivePortalId && thriveFormId){
                hshq(thriveEmail, thrivePortalId, thriveFormId);
                console.log('Thrive leads hubspot form sent\nemail: ' + thriveEmail + '\nportalID: ' + thrivePortalId + '\nformID: ' + thriveFormId);
            }
        })
    }

    thriveHubspot();
    setTimeout(thriveHubspot, 5000);
    $(".fl-button[href='#']").on('click', function(){
        $('.tve-leads-lightbox').length && thriveHubspot();
    });
    
    // Support form
    $(".support-submit").on("click", function (e) {
        e.preventDefault();
        const supportBtn = $(this);
        const supportForm = supportBtn.closest("form");
        const supportEmail = supportForm.find("input[type='email']").val();
        const supportPortalId = supportForm.attr("data-portal-id");
        const supportFormId = supportForm.attr("data-form-id");
        let i = $(this).closest("form").serialize();
        $("#support-form input:checkbox:not(:checked)").each(function ($) {
            i += "&" + this.name + "=false";
        });
        $("#spFullname").val();
        let s = $("#spEmail").val(),
            n = $("#spMsg").val();
        $("#spCompany").val();
        if ((d(s), "" == n || "" == s || 0 == d($("#spEmail").val()))) return r(modalEmail), u($("#spMsg")), u($("#spCompany")), u($("#spFullname")), !1;
        $.ajax({
            type: "post",
            url: ajaxactionurl,
            data: "action=send_email&" + i + "&url=" + o,
            dataType: "json",
            success: function (e) {
                if(getCookie("hubspotutk")!=null && supportEmail && supportEmail != "" && supportPortalId && supportFormId){
                    hshq(supportEmail, supportPortalId, supportFormId);
                    console.log('Support form sent\nemail: ' + supportEmail + '\nportalID: ' + supportPortalId + '\nformID: ' + supportFormId);
                }
                $("#support-form input").val(""), 
                $("#support-form textarea").val(""), 
                $(".sucmsg5").show(0).html(e.data).addClass("sucmsg-style");
                setTimeout(() => {
                    $(".sucmsg5").fadeOut(1000);
                }, 2000);
            },
            error: function (t, e, i) {
                console.log(e);
            },
        });
    });

    // Supscription form
    $(".subs-submit").on("click", function (e) {
        e.preventDefault();
        const subsBtn = $(this);
        const subsForm = subsBtn.closest("form");
        const subsEmail = subsForm.find("input[type='email']").val();
        const subsPortalId = subsForm.attr("data-portal-id");
        const subsFormId = subsForm.attr("data-form-id");
        var i = $(this).closest("form").serialize();
        $("#subs-form input:checkbox:not(:checked)").each(function (t) {
            i += "&" + this.name + "=false";
        });
        var s = $("#subsEmail").val();
        if ((c(s), "" == s || 0 == c($("#subsEmail").val()))) return c(s), !1;
        $.ajax({
            type: "post",
            url: ajaxactionurl,
            data: "action=send_email&" + i + "&url=" + o,
            dataType: "json",
            success: function (e) {
                if(getCookie("hubspotutk")!=null && subsEmail && subsEmail != "" && subsPortalId && subsFormId){
                    hshq(subsEmail, subsPortalId, subsFormId);
                    console.log('Support form sent\nemail: ' + subsEmail + '\nportalID: ' + subsPortalId + '\nformID: ' + subsFormId);
                }
                $("#subs-form")[0].reset(), $(".sucmsg4").fadeIn(0).html(e.data).addClass("sucmsg-style");
                setTimeout(() => {
                    $(".sucmsg4").fadeOut(1000);
                }, 2000);
            },
            error: function (t, e, i) {
                console.log(e);
            },
        });
    }),

    // Modal contact form
    $(".contact-submit").on("click", function (e) {
        e.preventDefault();

        const contactBtn = $(this);
        const contactForm = contactBtn.closest("form");
        const contactEmail = contactForm.find("input[type='email']");
        const contactName = contactForm.find("input[name='name'");
        const contactPortalId = contactForm.attr("data-portal-id");
        const contactFormId = contactForm.attr("data-form-id");

        const contactNameValid = validName(contactName);
        const contactEmailValid = validEmail(contactEmail);
        if (!contactNameValid || !contactEmailValid) {
            return;
        }

        var data = new FormData(contactForm[0]);

        data.append('action', 'send_email');
        data.append('url', window.location.href);
        
        if(getCookie("hubspotutk")!=null && contactPortalId && contactFormId){
            hshq(contactEmail.val(), contactPortalId, contactFormId);
            console.log('Sign up form sent\nemail: ' + contactEmail.val() + '\nportalID: ' + contactPortalId + '\nformID: ' + contactFormId);
        }
        contactForm[0].reset();
        contactForm.find('input').each(function(){
            $(this).removeClass('valid');
        })

        $.ajax({
            type: "post",
            url: ajaxactionurl,
            data: data,
            processData: false,
            contentType: false,
            success: function (e) {
                $('#modal-contact .mfp-close').click();
                $.magnificPopup.open({
                    items: {
                        src: '#modal-thanks'
                    },
                    type: 'inline',
                    midClick: !0,
                    mainClass: "mfp-fade",
                });
            },
            error: function (t, e, i) {
                console.log(e);
            },
        });

        return false;
    })

    function validEmail(email) {
        if (isEmail(email.val()) && !email.val() == "") {
            email.removeClass('not-valid');
            email.addClass('valid');
            email.removeAttr('style');
            email.parent().children('.msg').removeClass('msg-show');
            return true;
        } else {
            email.addClass('not-valid');
            email.removeClass('valid');
            email.parent().children('.msg').addClass('msg-show');
            return false;
        }
    }

    function validName(name) {
        if (name.val().length >= 3) {
            name.removeClass('not-valid');
            name.addClass('valid');
            name.parent().children('.msg').removeClass('msg-show');
            return true;
        } else {
            name.addClass('not-valid');
            name.removeClass('valid');
            name.parent().children('.msg').addClass('msg-show');
            return false;
        }
    }

    $("input[type='email']").on('change', function () {
        validEmail($(this));
    });

    $("input[name='name']").on('change', function () {
        validName($(this));
    });

    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }
    
    var o = window.location.toString();
    function s(t) {
        return "" != t && /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/gim.test(t) ? ($("#email").css("border", "none"), !0) : ($("#email").css("border", "1px solid #EF5261"), !1);
    }
    function n(t) {
        return "" != t && /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/gim.test(t) ? ($("#hy_email").css("border", "none"), !0) : ($("#hy_email").css("border", "1px solid #EF5261"), !1);
    }
    function d(t) {
        return "" != t && /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/gim.test(t) ? ($("#spEmail").css("border", "none"), !0) : ($("#spEmail").css("border", "1px solid #EF5261"), !1);
    }
    function u(t) {
        "" == t.val() ? t.css("border", "1px solid #EF5261") : t.css("border", "none");
    }
    function a(t) {
        return "" != t && /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/gim.test(t) ? ($("#soEmail").css("border", "none"), !0) : ($("#soEmail").css("border", "1px solid #EF5261"), !1);
    }
    function l(t) {
        return "" != t && /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/gim.test(t) ? ($("#pr_email").css("border", "solid 2px rgba(255, 255, 255, 0.3)"), !0) : ($("#pr_email").css("border", "solid 2px red"), !1);
    }
    function c(t) {
        return "" != t && /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/gim.test(t) ? ($("#subsEmail").css("border", "none"), !0) : ($("#subsEmail").css("border", "1px solid #EF5261"), !1);
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
})(jQuery)