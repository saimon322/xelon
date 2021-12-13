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
        console.log(submitId + ' ' + submitPortalId + ' ' + submitFormId);
        submitEmail == "" && (submitEmail = submitForm.find(".simple-input").val());
        if(getCookie("hubspotutk")!=null){
            hshq(submitEmail, submitPortalId, submitFormId);
        }
        
        $.ajax({ 
            url: "https://vdc.xelon.ch/api/user/trial/subscribe?email=" + submitEmail + "&cid=" + submitCID + "&referrer=" + cookieRef("referrer"), 
            method: "POST", 
            timeout: 0
        }).done(function (e) {
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
    });

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

        if (modalEmail.val() === '' || !isEmail(modalEmail.val())) {
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

        if (fullname.val() === '') {
            fullname.addClass('not-valid');
            fullname.removeClass('valid');
            fullname.parent().children('.msg').addClass('msg-show');
        } else {
            fullname.removeClass('not-valid');
            fullname.addClass('valid');
            fullname.parent().children('.msg').removeClass('msg-show');
        }
    });

    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }
})(jQuery)