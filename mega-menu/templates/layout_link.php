<li class="main-menu__item">
    <a href="<?php echo esc_url($layout_link['url']); ?>"
       target="<?php echo esc_attr($layout_link['target'] ?: '_self'); ?>"
       class="main-menu__link">
        <?php if ($layout_link['title']):
            echo esc_html($layout_link['title']);
        else:
            the_title();
        endif; ?>
    </a>
</li>