(function ($) {

    $('.xln-news__tag').click(function (e) {

        $('.xln-news__tag.xln-active').removeClass('xln-active');
        $(this).addClass('xln-active');

        let cat = $(this).data('cat');

        load_posts(cat, 1);

    });

    function pagination_init() {
        $('button.xln-pagination__page, .xln-pagination__arrow').click(function () {
            let cat = $('.xln-news__tag.xln-active').data('cat');
            let paged = $(this).data('paged');

            load_posts(cat, paged);
        });
    }

    function load_posts(cat, paged) {
        if (!$('body').hasClass('loading')) {
            $.ajax({
                url: filter.ajax_url,
                data: {
                    action: filter.action,
                    nonce: filter.nonce,
                    category: cat,
                    paged: paged,
                },
                dataType: 'json',
                type: 'POST',
                beforeSend: function (xhr) {
                    $('body').addClass('loading');
                },
                success: function (data) {
                    $('body').removeClass('loading');
                    $('.xln-news__content').html(data.posts);
                    $('.xln-news__pagination.xln-pagination').html(data.pagination);
                    pagination_init();
                }
            });
        }
    }

    pagination_init();

})(jQuery)