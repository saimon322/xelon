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
                                    <a href="<?php echo $item['item_link']['url'] ? $item['item_link']['url'] : '#'; ?>"
                                        class="xln-menu__link <?php echo $active_link ? 'xln-active' : '' ?>"
                                        data-menu="<?php echo $data_num; ?>">
                                            <?php echo $item['title']; ?>
                                    </a>
                                    <?php $active_link = false; ?>
                                    <div class="xln-menu__inner">
                                        <ul class="xln-menu-inside__list"
                                           data-menu="<?php echo $data_num; ?>">
                                            <li class="xln-menu-inside__item">
                                                <h3 class="xln-menu-inside__main-title">
                                                    <?php echo $item['headline']; ?>
                                                </h3>
                                                <div class="xln-menu-inside__text">
                                                    <?php echo $item['content']; ?>
                                                </div>
                                                <?php if ($item['button']['link']): ?>
                                                    <a href="<?php echo esc_url($item['button']['link']['url']); ?>"
                                                    target="<?php echo esc_attr($item['button']['link']['target'] ?: '_self'); ?>"
                                                    class="xln-menu-inside__button <?php echo esc_attr($item['button']['color']); ?>">
                                                        <?php echo esc_html($item['button']['link']['title']); ?>
                                                        <?php if ($item['button']['color'] == 'xln-button xln-button--green'): ?>
                                                            <svg width="9"
                                                                height="14">
                                                                <use xlink:href='#arrow-right'></use>
                                                            </svg>
                                                        <?php endif; ?>
                                                    </a>
                                                <?php endif; ?>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <?php $data_num++;
                            endif; ?>
                        <?php endforeach; ?>
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
            <div class="xln-menu-inside">
                <div class="xln-menu-inside__wrapper">
                    <div class="xln-menu-inside__container">
                    </div>
                </div>
            </div>
            <div class="xln-menu-more">
                <div class="xln-menu-more__wrapper">
                    <?php $login_link = get_field('login_link', 'options'); 
                        if ($login_link): ?>
                        <a href="<?php echo $login_link['url']; ?>"
                           target="<?php echo $login_link['target']; ?>"
                           class="xln-menu-login xln-button">
                            <?php echo $login_link['title']; ?>
                        </a>
                    <?php endif; ?>
                    <?php if ($variables['banner']['link']): ?>
                        <div class="xln-menu-signup">
                            <div class="xln-menu-signup__text">
                                <?php echo $variables['banner']['text']; ?>
                            </div>
                            <a href="<?php echo $variables['banner']['link']['url']; ?>"
                               class="xln-button xln-button--white open-popup-link">
                                <?php echo $variables['banner']['link']['title']; ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div><!-- /.xln-menu -->
</li>