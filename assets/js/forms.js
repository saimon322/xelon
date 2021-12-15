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

    function cookieRef($) {
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
            if(getCookie("hubspotutk")!=null && submitEmail && submitEmail != "" && submitPortalId && submitFormId){
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
        $('.tve-form-button-submit').on('click', function(){
            const thriveBtn = $(this);
            const thriveForm = thriveBtn.closest("form");
            const thriveEmail = thriveForm.find("input[type='email']").val();
            const thrivePortalId = 3366455;
            const thriveFormId = thriveForm.find("[data-name=FormID]").val();
            if(getCookie("hubspotutk") != null && thriveEmail && thriveEmail != "" && thrivePortalId && thriveFormId){
                hshq(thriveEmail, thrivePortalId, thriveFormId);
                console.log('Thrive leads hubspot form sent\nemail: ' + thriveEmail + '\nportalID: ' + thrivePortalId + '\nformID: ' + thriveFormId);
            }
        })
    }

    thriveHubspot();
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
        jQuery.ajax({
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
    jQuery(".subs-submit").on("click", function (e) {
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
        var s = jQuery("#subsEmail").val();
        if ((c(s), "" == s || 0 == c(jQuery("#subsEmail").val()))) return c(s), !1;
        jQuery.ajax({
            type: "post",
            url: ajaxactionurl,
            data: "action=send_email&" + i + "&url=" + o,
            dataType: "json",
            success: function (e) {
                if(getCookie("hubspotutk")!=null && subsEmail && subsEmail != "" && subsPortalId && subsFormId){
                    hshq(subsEmail, subsPortalId, subsFormId);
                    console.log('Support form sent\nemail: ' + subsEmail + '\nportalID: ' + subsPortalId + '\nformID: ' + subsFormId);
                }
                jQuery("#subs-form")[0].reset(), $(".sucmsg4").fadeIn(0).html(e.data).addClass("sucmsg-style");
                setTimeout(() => {
                    jQuery(".sucmsg4").fadeOut(1000);
                }, 2000);
            },
            error: function (t, e, i) {
                console.log(e);
            },
        });
    }),

    // Modal contact form
    $("#modal-form").submit(function (e) {
        e.preventDefault();

        let fullname = $(this).find('#fullname');
        let modalEmail = $(this).find('#modalEmail');
        let valid = true;

        if (fullname.val() === '') {
            fullname.addClass('not-valid');
            fullname.removeClass('valid');
            fullname.parent().children('.msg').addClass('msg-show');
            valid = false;
        } else {
            fullname.removeClass('not-valid');
            fullname.addClass('valid');
            fullname.parent().children('.msg').removeClass('msg-show');
        }

        if (modalEmail.val() === '' || !isEmail(modalEmail.val())) {
            modalEmail.addClass('not-valid');
            modalEmail.removeClass('valid');
            modalEmail.parent().children('.msg').addClass('msg-show');
            valid = false;
        } else {
            modalEmail.removeClass('not-valid');
            modalEmail.addClass('valid');
            modalEmail.removeAttr('style');
            modalEmail.parent().children('.msg').removeClass('msg-show');
        }

        if (valid === false) {
            return;
        }

        var data = new FormData(this);

        data.append('action', 'send_email');
        data.append('url', window.location.href);

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

    $("#modal-form #modalEmail").change(function () {
        var modalEmail = $(this);

        if (!isEmail(modalEmail.val())) {
            modalEmail.addClass('not-valid');
            modalEmail.removeClass('valid');
            modalEmail.parent().children('.msg').addClass('msg-show');
        } else {
            modalEmail.removeClass('not-valid');
            modalEmail.addClass('valid');
            modalEmail.removeAttr('style');
            modalEmail.parent().children('.msg').removeClass('msg-show');
        }
    });

    $("#modal-form #fullname").change(function () {
        var fullname = $(this);

        if (isName(fullname)) {
            fullname.addClass('not-valid');
            fullname.removeClass('valid');
            fullname.parent().children('.msg').addClass('msg-show');
        } else {
            fullname.removeClass('not-valid');
            fullname.addClass('valid');
            fullname.parent().children('.msg').removeClass('msg-show');
        }
    });

    function isName(name) {
        return name.val() != '';
    }

    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email) && email.val() != '';
    }
    
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
    function d(t) {
        return "" != t && /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/gim.test(t) ? (jQuery("#spEmail").css("border", "none"), !0) : (jQuery("#spEmail").css("border", "1px solid #EF5261"), !1);
    }
    function u(t) {
        "" == t.val() ? t.css("border", "1px solid #EF5261") : t.css("border", "none");
    }
    function a(t) {
        return "" != t && /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/gim.test(t) ? (jQuery("#soEmail").css("border", "none"), !0) : (jQuery("#soEmail").css("border", "1px solid #EF5261"), !1);
    }
    function l(t) {
        return "" != t && /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/gim.test(t) ? (jQuery("#pr_email").css("border", "solid 2px rgba(255, 255, 255, 0.3)"), !0) : (jQuery("#pr_email").css("border", "solid 2px red"), !1);
    }
    function c(t) {
        return "" != t && /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/gim.test(t) ? (jQuery("#subsEmail").css("border", "none"), !0) : (jQuery("#subsEmail").css("border", "1px solid #EF5261"), !1);
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