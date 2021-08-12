setTimeout(function () {
    (function (w, d, u) {
        var s = d.createElement('script');
        s.async = true;
        s.id = 'theme-scripts';
        s.src = u + '?' + ((Date.now() / 60000) | 0);
        var h = d.getElementsByTagName('script')[0];
        h.parentNode.insertBefore(s, h);
    })(
        window,
        document,
        '/wp-content/themes/xelon-wp-theme/assets/js/scripts.min.js',
    );
}, 50);


setTimeout(function () {
    
    (function (w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start':
                new Date().getTime(), event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-KBHCZ3N');

    jQuery('body').prepend('<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KBHCZ3N" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>');

    (function (w, d, u) {
        var s = d.createElement('script');
        s.async = true;
        s.id = 'webforms-pipedrive-loader';
        s.src = u + '?' + ((Date.now() / 60000) | 0);
        var h = d.getElementsByTagName('script')[0];
        h.parentNode.insertBefore(s, h);
    })(
        window,
        document,
        'https://webforms.pipedrive.com/f/loader',
    );

}, 3000);


setTimeout(function () {
    setFormCid();
}, 4000);

function setFormCid() {
    var ga = getCookie('_ga');
    if (ga) {
        jQuery("form input[name=userCID]").each(function () {
            jQuery(this).val(ga);
        });
    } else {
        setFormCid(getCookie('_ga'))
    }
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}


