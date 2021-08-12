<li class="main-menu__item">
    <a href="<?php echo esc_url($layout_link['url']); ?>"
       target="<?php echo esc_attr($layout_link['target'] ?: '_self'); ?>"
       class="main-menu__link
       <?php echo $empty_mobile ? 'main-menu__link--empty' : '' ?>">
        <?php if ($layout_link['title']):
            echo esc_html($layout_link['title']);
        else:
            the_title();
        endif; ?>
        <div class="main-menu__arrow">
            <svg width="10" height="10">
                <use xlink:href="#arrow-down"></use>
            </svg>
        </div>
    </a>
    <div class="xln-menu">
        <div class="xln-menu__wrapper">
            <div class="xln-menu-main">
                <div class="xln-menu-main__wrapper">
                    <ul class="xln-menu__list">
                        <?php 
                        $active_link = true; 
                        $data_num = 0;
                        foreach ($variables['content_items'] as $item): ?>
                            <?php if ($item['acf_fc_layout'] == 'headline'): ?>
                                <li class="xln-menu__item">
                                    <h3 class="xln-menu__title">
                                        <?php echo $item['text']; ?>
                                    </h3>
                                </li>
                            <?php endif;
                            if ($item['acf_fc_layout'] == 'content'): ?>
                                <li class="xln-menu__item">
                                    <?php if ($item['title']): ?>
                                        <a href="<?php echo $item['item_link']['url'] ? $item['item_link']['url'] : '#'; ?>"
                                           class="xln-menu__link <?php echo $active_link ? 'xln-active' : '' ?>"
                                           data-menu="<?php echo $data_num; ?>">
                                                <?php echo $item['title']; ?>
                                        </a>
                                        <?php $active_link = false;
                                    endif; ?>
                                    <div class="xln-menu__inner">
                                        <ul class="xln-menu-inside__list"
                                           data-menu="<?php echo $data_num; ?>">
                                            <li class="xln-menu-inside__item">
                                                <?php if ($item['headline']): ?>
                                                    <h3 class="xln-menu-inside__main-title">
                                                        <?php echo $item['headline']; ?>
                                                    </h3>
                                                <?php endif;
                                                if ($item['text_after_headline']): ?>
                                                    <div class="xln-menu-inside__text">
                                                        <?php echo $item['text_after_headline']; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </li>
                                            <?php foreach ($item['content'] as $content): ?>
                                                <li class="xln-menu-inside__item">
                                                    <?php echo $content['link'] ?
                                                        '<a href="' . $content['link'] . '" class="xln-menu-inside__sublink">' :
                                                        '<div class="xln-menu-inside__subitem">'; ?>
                                                        <?php if ($content['title']): ?>
                                                            <h4 class="xln-menu-inside__title">
                                                                <?php echo $content['title']; ?>
                                                            </h4>
                                                        <?php endif;
                                                        if ($content['text']): ?>
                                                            <div class="xln-menu-inside__text">
                                                                <?php echo $content['text']; ?>
                                                            </div>
                                                        <?php endif;
                                                        if ($content['content_link']['link']): ?>
                                                            <a href="<?php echo $content['content_link']['link']['url']; ?>"
                                                            target="<?php echo esc_attr($content['content_link']['link']['target'] ?: '_self'); ?>"
                                                            class="xln-menu-inside__button xln-button">
                                                                <?php echo $content['content_link']['link']['title']; ?>
                                                            </a>
                                                        <?php endif; ?>
                                                    <?php echo $content['link'] ? '</a>' : '</div>'; ?>
                                                </li>
                                            <?php endforeach; ?>
                                            <?php if ($item['link_bottom']['link']): ?>
                                                <a href="<?php echo esc_url($item['link_bottom']['link']['url']); ?>"
                                                   target="<?php echo esc_attr($item['link_bottom']['link']['target'] ?: '_self'); ?>"
                                                   class="xln-menu-inside__button <?php echo esc_attr($item['link_bottom']['color']); ?>">
                                                    <?php echo esc_html($item['link_bottom']['link']['title']); ?>
                                                    <?php if ($item['link_bottom']['color'] == 'xln-button xln-button--green'): ?>
                                                        <svg width="9"
                                                             height="14">
                                                            <use xlink:href='#arrow-right'></use>
                                                        </svg>
                                                    <?php endif; ?>
                                                </a>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </li>
                                <?php $data_num++;
                            endif; ?>
                        <?php endforeach; ?>
                        <?php if ($variables['add_downloads']): ?>
                            <li class="xln-menu__item">
                                <h3 class="xln-menu__title">
                                    Downloads
                                </h3>
                            </li>
                            <?php foreach ($variables['downloads'] as $download):
                                switch ($download['acf_fc_layout']):
                                    case 'file': ?>
                                        <li class="xln-menu__item">
                                            <a href="<?php echo $download['file']; ?>"
                                               class="xln-menu__link xln-menu__download"
                                               data-menu="<?php echo $data_num; ?>"
                                               download>
                                                <svg width="20"
                                                     height="20">
                                                    <use xlink:href="#download"></use>
                                                </svg>
                                                <?php echo $download['name']; ?>
                                            </a>
                                        </li>
                                        <?php break;
                                    case 'link': ?>
                                        <li class="xln-menu__item">
                                            <a href="<?php echo $download['Link']['url']; ?>"
                                               class="xln-menu__link xln-menu__download"
                                               data-menu="<?php echo $data_num; ?>"
                                               target="<?php echo esc_attr($download['Link']['target'] ?: '_self'); ?>">
                                                <svg width="20"
                                                     height="20">
                                                    <use xlink:href="#download"></use>
                                                </svg>
                                                <?php echo $download['Link']['title']; ?>
                                            </a>
                                        </li>
                                        <?php break;
                                    case 'html': ?>
                                        <li class="xln-menu__item">
                                            <span class="xln-menu__link xln-menu__download"
                                                data-menu="<?php echo $data_num; ?>">
                                                <svg width="20" height="20">
                                                    <use xlink:href="#download"></use>
                                                </svg>
                                                <?php echo $download['item_title']; ?>
                                            </span>
                                            <div class="xln-menu__inner">
                                                <ul class="xln-menu-inside__list"
                                                    data-menu="<?php echo $data_num; ?>">
                                                    <li class="xln-menu-inside__item">
                                                        <?php if ($download['headline']): ?>
                                                            <h3 class="xln-menu-inside__main-title">
                                                                <?php echo $download['headline']; ?>
                                                            </h3>
                                                        <?php endif;
                                                        if ($item['text_after_headline']): ?>
                                                            <div class="xln-menu-inside__text">
                                                                <?php echo $download['text']; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <br>
                                                        <?php echo $download['custom_html']; ?>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <?php break;
                                endswitch;
                                $data_num++;
                            endforeach;
                        endif; ?>
                    </ul>
                    <?php if ($variables['show_social_buttons']):
                        $socials = get_field('socials', 'options');
                        if ($socials): ?>
                            <div class="xln-menu__socials socials">
                                <?php foreach ($socials as $social): ?>
                                    <a href="<?php echo $social['link']; ?>"
                                       class="socials__link"
                                       target="_blank">
                                        <svg width="24"
                                             height="24">
                                            <use xlink:href="#social-<?php echo $social['type']; ?>"></use>
                                        </svg>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif;
                    endif; ?>
                </div>
            </div>
            <div class="xln-menu-inside" style="min-height: 580px">
                <div class="xln-menu-inside__wrapper">
                    <div class="xln-menu-inside__container">
                    </div>
                </div>
            </div>
            <div class="xln-menu-more">
                <div class="xln-menu-more__wrapper">
                    <div class="xln-menu-news">
                        <h3 class="xln-menu-news__title">
                            Empfohlene Beiträge
                        </h3>
                        <ul class="xln-menu-news__list">
                            <?php foreach ($variables['articles'] as $article): ?>
                                <li class="xln-menu-news__item xln-menu-new">
                                    <a href="<?php the_permalink($article->ID); ?>"
                                       class="xln-menu-new__link">
                                        <div class="xln-menu-new__img">
                                            <?php echo get_the_post_thumbnail($article->ID, 'thumbnail'); ?>
                                        </div>
                                        <div class="xln-menu-new__text">
                                            <?php the_excerpt_max_charlength(80, $article->ID); ?>
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php if ($variables['blog_link']): ?>
                            <a href="<?php echo esc_url($variables['blog_link']['url']); ?>"
                               target="<?php echo esc_attr($variables['blog_link']['target'] ?: '_self'); ?>"
                               class="xln-menu-news__link">
                                <?php echo esc_html($variables['blog_link']['title']); ?>
                                <svg width="9"
                                     height="14">
                                    <use xlink:href='#arrow-right'></use>
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="xln-menu-mobile">
                <?php if ($variables['mobile_buttons']['first']): ?>
                    <a href="<?php echo $variables['mobile_buttons']['first']['url']; ?>"
                       target="<?php echo esc_attr($variables['mobile_buttons']['first']['target'] ?: '_self'); ?>"
                       class="xln-button">
                        <?php echo $variables['mobile_buttons']['first']['title']; ?>
                    </a>
                <?php endif;
                if ($variables['mobile_buttons']['second']): ?>
                    <a href="<?php echo $variables['mobile_buttons']['second']['url']; ?>"
                       target="<?php echo esc_attr($variables['mobile_buttons']['second']['target'] ?: '_self'); ?>"
                       class="xln-button xln-button--white">
                        <?php echo $variables['mobile_buttons']['second']['title']; ?>
                    </a>
                <?php endif;
                if ($variables['show_social_buttons']):
                    $socials = get_field('socials', 'options');
                    if ($socials): ?>
                        <div class="socials">
                            <?php foreach ($socials as $social): ?>
                                <a href="<?php echo $social['link']; ?>"
                                   class="socials__link"
                                   target="_blank">
                                    <svg width="24"
                                         height="24">
                                        <use xlink:href="#social-<?php echo $social['type']; ?>"></use>
                                    </svg>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif;
                endif; ?>
            </div>
        </div>
    </div><!-- /.xln-menu -->
</li>