(function ($) {

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