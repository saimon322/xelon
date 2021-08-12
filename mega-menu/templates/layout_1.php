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
                            if ($item['acf_fc_layout'] == 'content'):?>
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
                                                <?php endif; ?>
                                                <div class="xln-menu-inside__text">
                                                    <?php if ($item['text_after_headline']): ?>
                                                        <?php echo $item['text_after_headline']; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </li>
                                            <?php if ($item['content']):
                                                foreach ($item['content'] as $content): ?>
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
                                                            <?php endif; ?>
                                                        <?php echo $content['link'] ? '</a>' : '</div>'; ?>
                                                    </li>
                                                <?php endforeach;
                                            endif; ?>
                                        </ul>
                                    </div>
                                </li>
                                <?php $data_num++;
                             endif; ?>
                        <?php endforeach; ?>
                    </ul>
                    <?php if ($variables['add_left_button'] && $variables['left_button']): ?>
                        <a href="<?php echo esc_url($variables['left_button']['link']['url']); ?>"
                        target="<?php echo esc_attr($variables['left_button']['link']['target'] ?: '_self'); ?>"
                        class="xln-menu-main__button xln-button xln-button--green">
                            <?php echo esc_html($variables['left_button']['link']['title']); ?>
                            <svg width="9"
                                height="14">
                                <use xlink:href='#arrow-right'></use>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="xln-menu-inside">
                <div class="xln-menu-inside__wrapper">
                    <div class="xln-menu-inside__container">
                    </div>
                    <?php if ($variables['add_center_buttons'] && $variables['center_buttons']): ?>
                        <div class="xln-menu-inside__buttons">
                            <?php foreach ($variables['center_buttons'] as $button): ?>
                                <a href="<?php echo esc_url($button['link']['url']); ?>"
                                target="<?php echo esc_attr($button['link']['target'] ?: '_self'); ?>"
                                class="xln-menu-inside__button <?php echo esc_attr($button['color']); ?>">
                                    <?php echo esc_html($button['link']['title']); ?>
                                    <?php if ($button['color'] == 'xln-button xln-button--green'): ?>
                                        <svg width="9"
                                            height="14">
                                            <use xlink:href='#arrow-right'></use>
                                        </svg>
                                    <?php endif; ?>
                                </a>
                            <?php endforeach; ?>
                        </div>    
                    <?php endif; ?>
                </div>
            </div>
            <div class="xln-menu-more">
                <div class="xln-menu-more__wrapper">
                    <?php if ($variables['links_on_the_right']): ?>
                        <ul class="xln-menu-more__list">
                            <?php foreach ($variables['links_on_the_right'] as $link): ?>
                                <li class="xln-menu-more__item">
                                    <a href="<?php echo esc_url($link['link']['url']); ?>"
                                    target="<?php echo esc_attr($link['link']['target'] ?: '_self'); ?>"
                                    class="xln-menu-more__link">
                                        <?php echo esc_html($link['link']['title']); ?>
                                        <svg width="16"
                                            height="16">
                                            <use xlink:href='#arrow-link'></use>
                                        </svg>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <div class="xln-menu-more__certificates">
                        <img src="<?php echo TEMPLATE_URL; ?>/xln-layout/dist/img/base/iso-1.png"
                            alt=""
                            class="xln-menu-more__certificate">
                        <img src="<?php echo TEMPLATE_URL; ?>/xln-layout/dist/img/base/iso-2.png"
                            alt=""
                            class="xln-menu-more__certificate">
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.xln-menu -->
</li>