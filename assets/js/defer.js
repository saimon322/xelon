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
