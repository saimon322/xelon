(function ($) {

    $('.xln-news__tag').click(function (e) {
        const newsBlock = $(this).parents('.xln-news');
        newsBlock.find('.xln-news__tag.xln-active').removeClass('xln-active');
        $(this).addClass('xln-active');

        let cat = $(this).data('cat');

        load_posts(cat, 1);

    });

    function pagination_init() {
        $('button.xln-pagination__page, .xln-pagination__arrow').click(function () {
            const newsBlock = $(this).parents('.xln-news');
            const cat = newsBlock.find('.xln-news__tag.xln-active').data('cat');
            const paged = $(this).data('paged');

            load_posts(cat, paged, newsBlock);
        });
    }

    function load_posts(cat, paged, newsBlock) {
        if (!$('body').hasClass('loading')) {
            
            let posts_per_page = 3;
            
            if ($('body').hasClass('category')){
                posts_per_page = 9;
            }
            
            $.ajax({
                url: filter.ajax_url,
                data: {
                    action: filter.action,
                    nonce: filter.nonce,
                    category: cat,
                    paged: paged,
                    posts_per_page: posts_per_page,
                },
                dataType: 'json',
                type: 'POST',
                beforeSend: function (xhr) {
                    $('body').addClass('loading');
                },
                success: function (data) {
                    $('body').removeClass('loading');
                    newsBlock.find('.xln-news__content').html(data.posts);
                    newsBlock.find('.xln-news__pagination.xln-pagination').html(data.pagination);
                    pagination_init();
                }
            });
        }
    }

    pagination_init();

})(jQuery)