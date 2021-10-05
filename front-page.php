<?php
/**
 * Template Name: Front page
 */

get_header(); ?>

<?php $login_link = get_field('login_link', 'options'); 
      $signup_modal = get_field('signup_modal', 'options'); 
      $contacts_modal = get_field('contacts_modal', 'options'); 
      $consult_link = get_field('consult_link', 'options'); ?>

<div class="xln-page">
    <section class="xln-banner">
        <div class="xln-container">
            <div class="xln-banner__wrapper">
                <div class="xln-banner__content">
                    <h1 class="xln-banner__title">
                        <?php the_field('s1_h1'); ?>
                    </h1>
                    <div class="xln-banner__text">
                        <?php the_field('s1_text'); ?>
                    </div>
                    <?php if ($contacts_modal): ?>
                        <a href="<?php echo $contacts_modal['url']; ?>"
                            class="xln-banner__button xln-button xln-button--green ">
                            <?php echo $contacts_modal['title']; ?>
                            <img src="<?=get_template_directory_uri();?>/xln-layout/dist/img/icon/button-arrow.svg" alt="">
                        </a>
                    <?php endif; ?>
                </div>
                <div class="xln-banner__media">
                    <?php
                    $s1_anim_mobile = get_field('s1_anim_mobile');
                    $s1_anim_desktop = get_field('s1_anim_desktop');
                    if ($s1_anim_mobile): ?>
                        <img src="<?php echo $s1_anim_mobile; ?>" 
                            class="xln-banner__anim xln-banner__anim--mobile">
                    <?php endif;
                    if ($s1_anim_desktop): ?>
                        <img src="<?php echo $s1_anim_desktop; ?>" 
                            class="xln-banner__anim xln-banner__anim--desktop">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="xln-get-started">
        <div class="xln-get-started__wrapper">
                <div class="xln-get-started__container xln-container">
                <div class="xln-get-started__img">
                    <img src="<?=get_template_directory_uri();?>/xln-layout/dist/img/base/browser.jpg" alt="">
                </div>
                <div class="xln-get-started__content">
                    <h2 class="xln-get-started__title">Get started!</h2>
                    <div class="xln-get-started__text">
                        <p>Schneller und einfacher Zugang zum Xelon HQ. Jetzt kostenlos testen!</p>
                    </div>
                    <form action="#" class="xln-get-started__form">
                        <input type="hidden" name="userCID" value="<?php echo $_COOKIE['_ga'] ?>">
                        <input type="hidden" name="pageUrl" value="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
                        <div class="form-block">
                            <input type="email" id="send_email" name="email" placeholder="Email*" class="form-input">
                            <label class="form-label">Email*</label>
                            <div class="msg"></div>
                        </div>
                        <input type="submit" class="xln-button xln-button--green send-subscribe" value="Jetzt anmelden">
                    </form>
                    <div class="xln-get-started__signups">
                        <p>oder registriert euch mit</p>
                        <?php echo do_shortcode('[signups]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="xln-customers">
        <div class="xln-container">
            <h2 class="xln-customers__title">
                Die IT-Teams dieser Unternehmen vertrauen uns
            </h2>
            <div class="xln-customers__content">
                <div class="xln-customers__list">
                    <div class="xln-customers__item">
                        <img src="<?=get_template_directory_uri();?>/xln-layout/dist/img/logos/infoguard.svg" alt="">
                    </div>
                    <div class="xln-customers__item">
                        <img src="<?=get_template_directory_uri();?>/xln-layout/dist/img/logos/nrj.svg" alt="">
                    </div>
                    <div class="xln-customers__item">
                        <img src="<?=get_template_directory_uri();?>/xln-layout/dist/img/logos/dq-solutions.svg" alt="">
                    </div>
                    <div class="xln-customers__item">
                        <img src="<?=get_template_directory_uri();?>/xln-layout/dist/img/logos/nationalleague.svg" alt="">
                    </div>
                    <div class="xln-customers__item">
                        <img src="<?=get_template_directory_uri();?>/xln-layout/dist/img/logos/green.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="xln-cases">
        <div class="xln-case">
            <div class="xln-case__container xln-container">
                <div class="xln-case__img">
                    <img src="<?=get_template_directory_uri();?>/xln-layout/dist/img/base/case-4.png" alt="">
                </div>
                <div class="xln-case__content">
                    <div class="xln-case__subtitle">Einfach, SChnell und sicher </div>
                    <h3 class="xln-case__title">Wir vereinfachen das Management der IT-Infrastruktur von IT-Dienstleistern</h3>
                    <div class="xln-case__text">
                        Erstellt und betreibt eure eigenen Cloud-Infrastrukturen auf einer Schweizer Cloud-Management-Plattform. Dank dem einfachen, schnellen und sicheren Xelon HQ können IT-Dienstleister Kosten optimieren und Gewinne steigern.
                    </div>
                    <div class="xln-case__review xln-case-review">
                        <div class="xln-case-review__photo">
                            <img src="<?=get_template_directory_uri();?>/xln-layout/dist/img/base/review-1-author.jpg" alt="">
                        </div>
                        <div class="xln-case-review__header">
                            <div class="xln-case-review__author">
                                <div class="xln-case-review__name">Andreas Schweizer</div>
                                <div class="xln-case-review__post">CEO, Diverto gmbh</div>
                            </div>
                            <div class="xln-case-review__company">
                                <img src="<?=get_template_directory_uri();?>/xln-layout/dist/img/logos/diverto.svg" alt="">
                            </div>
                        </div>
                        <div class="xln-case-review__text">
                            "Unsere Kunden und das ganze Operations Team waren begeistert, wie einfach und schnell  das Projekt umgesetzt war. Wir würden jederzeit wieder mit Xelon starten, um Cloud Services in der Schweiz anzubieten."
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="xln-case">
            <div class="xln-case__container xln-container">
                <div class="xln-case__img">
                    <img src="<?=get_template_directory_uri();?>/xln-layout/dist/img/base/case-5.png" alt="">
                </div>
                <div class="xln-case__content">
                    <div class="xln-case__subtitle">EffizienzsteigerunG FÜR it OPERATIONS </div>
                    <h3 class="xln-case__title">Maximale Stabilität und garantierte Verfügbarkeit im täglichen IT Betrieb für euch und eure Kunden</h3>
                    <div class="xln-case__text">
                        Vergesst die ressourcenintensive Verwaltung von redundanten Datacentern, Multi-Homing Netzwerken, Hardware Cluster und Virtualisierunglayern. Verwaltet Server und Backups über mehrere Datacenters hinweg verteilt per Mausklick. 
                    </div>
                    <div class="xln-case__review xln-case-review">
                        <div class="xln-case-review__photo">
                            <img src="<?=get_template_directory_uri();?>/xln-layout/dist/img/base/review-2-author.jpg" alt="">
                        </div>
                        <div class="xln-case-review__header">
                            <div class="xln-case-review__author">
                                <div class="xln-case-review__name">Luca Franek</div>
                                <div class="xln-case-review__post">Bereichsleiter IT-Services, PMI.AG</div>
                            </div>
                            <div class="xln-case-review__company">
                                <img src="<?=get_template_directory_uri();?>/xln-layout/dist/img/logos/pmi-ag.svg" alt="">
                            </div>
                        </div>
                        <div class="xln-case-review__text">
                            “Die Plattform von Xelon konnte neben dem hohen Funktionsumfang auch durch seine Kostentransparenz überzeugen. Die Planbarkeit der Ressourcen sowie der Kosten waren massgebend für die Umsetzung dieses Projektes.”
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="xln-case">
            <div class="xln-case__container xln-container">
                <div class="xln-case__img">
                    <img src="<?=get_template_directory_uri();?>/xln-layout/dist/img/base/case-6.png" alt="">
                </div>
                <div class="xln-case__content">
                    <div class="xln-case__subtitle">MEHR ZEIT für Eure Techniker</div>
                    <h3 class="xln-case__title">Baut innovative IT Services zielgerichtet für eure Kunden</h3>
                    <div class="xln-case__text">
                        Ist eure IT-Infrastruktur in guten Händen, könnt ihr euch auf euer Kerngeschäft konzentrieren. Mit dem Xelon HQ behält ihr die volle Kontrolle über eure Serverinfrastruktur und Serverkosten, ohne euch mit Wartungsarbeiten herumschlagen zu müssen.
                    </div>
                    <div class="xln-case__review xln-case-review">
                        <div class="xln-case-review__photo">
                            <img src="<?=get_template_directory_uri();?>/xln-layout/dist/img/base/review-3-author.jpg" alt="">
                        </div>
                        <div class="xln-case-review__header">
                            <div class="xln-case-review__author">
                                <div class="xln-case-review__name">Stephan Wyss</div>
                                <div class="xln-case-review__post">Head of Service Desk & Operations bei DQ Solutions</div>
                            </div>
                            <div class="xln-case-review__company">
                                <img src="<?=get_template_directory_uri();?>/xln-layout/dist/img/logos/dq-solutions.svg" alt="">
                            </div>
                        </div>
                        <div class="xln-case-review__text">
                            “Die Migration der Maschinen war ein Kinderspiel! Wir müssen seither keine Hardware mehr betreuen und konnten unteranderem den Pikettdienst der Techniker reduzieren.”
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="xln-info-block">
        <div class="xln-container">
            <div class="xln-info-block__wrapper">
                <div class="xln-info-block__main">
                    <h2 class="xln-info-block__title">
                        Bereit für die Cloud-Revolution?
                    </h2>
                    <div class="xln-info-block__text">
                        Provisioniert jetzt unsere produktionsbereiten, in der Cloud gehosteten Datenbanken - innert Minuten und mit wenigen Klicks!
                    </div>
                </div>
                <div class="xln-info-block__buttons">
                    <a href="#modal-signup" class="xln-button xln-button--green open-popup-link">
                        Account erstellen
                    </a>
                    <a href="#modal-contact" class="xln-button xln-button--opacity open-popup-link">
                        Let’s talk
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="xln-about">
        <div class="xln-container">
            <div class="xln-about__main">
                <h2 class="xln-about__title">Das ist Xelon</h2>
                <div class="xln-about__text">
                    Unsere Mission ist es, eine Cloud-Infrastruktur-Management-Plattform bereitzustellen, die Tech-Teams lieben. Wir möchten zu einer Welt beitragen, in der IT-Teams ihr volles Potenzial entfalten können und Geschäftsideen sowie strategische Expansionen schneller als je zuvor umsetzen.
                </div>
            </div>
            <div class="xln-about__slider swiper">
                <div class="swiper-wrapper">
                    <div class="xln-about__slider-item swiper-slide">
                        <div class="xln-about__slider-item-wrap">
                            <img src="<?=get_template_directory_uri();?>/xln-layout/dist/img/base/gallery-1.jpg" alt="">
                        </div>
                    </div>
                    <div class="xln-about__slider-item swiper-slide">
                        <div class="xln-about__slider-item-wrap">
                            <img src="<?=get_template_directory_uri();?>/xln-layout/dist/img/base/gallery-2.jpg" alt="">
                        </div>
                    </div>
                    <div class="xln-about__slider-item swiper-slide">
                        <div class="xln-about__slider-item-wrap">
                            <img src="<?=get_template_directory_uri();?>/xln-layout/dist/img/base/gallery-3.jpg" alt="">
                        </div>
                    </div>
                    <div class="xln-about__slider-item swiper-slide">
                        <div class="xln-about__slider-item-wrap">
                            <img src="<?=get_template_directory_uri();?>/xln-layout/dist/img/base/gallery-4.jpg" alt="">
                        </div>
                    </div>
                </div>

                <div class="swiper-nav">
                    <button class="swiper-arrow swiper-arrow--prev">
                        <svg width='13px' height='22px'>
                            <use xlink:href='#arrow-left'></use>
                        </svg>
                    </button>
                    <div class="swiper-pagination"></div>
                    <button class="swiper-arrow swiper-arrow--next">
                        <svg width='13px' height='22px'>
                            <use xlink:href='#arrow-right'></use>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="xln-certificates">
        <div class="xln-container">
            <h2 class="xln-certificates__title">
                Unsere Zertifizierungen
            </h2>
            <ul class="xln-certificates__list">
                <li class="xln-certificates__item">
                    <img src="<?=get_template_directory_uri();?>/xln-layout/dist/img/base/certificate-1.png" alt="">
                </li>
                <li class="xln-certificates__item">
                    <img src="<?=get_template_directory_uri();?>/xln-layout/dist/img/base/certificate-2.png" alt="">
                </li>
                <li class="xln-certificates__item">
                    <img src="<?=get_template_directory_uri();?>/xln-layout/dist/img/base/certificate-3.png" alt="">
                </li>
            </ul>
        </div>
    </section>
    
    <section class="xln-news">
        <div class="xln-container">
            <h2 class="xln-news__title">
                News
            </h2>
            <div class="xln-news__tags">
                <?php $news_tags = get_field('news_tags'); ?>
                <?php foreach ($news_tags as $news_tag):
                    $tag = get_tag($news_tag); ?>
                    <button class="xln-news__tag <?php echo $news_tags[0] == $news_tag ? 'xln-active' : '' ?>"
                            data-cat="<?php echo $news_tag; ?>">
                        <?php echo $tag->name; ?>
                    </button>
                <?php endforeach; ?>
            </div>
            <div class="xln-news__content">
                <?php $args = array(
                    'posts_per_page' => 3,
                    'post_type'      => 'post',
                    'tag__in'        => $news_tags[0],
                );
                
                $query = new WP_Query($args);
                
                if ($query->have_posts()):
                    while ($query->have_posts()) :
                        $query->the_post(); ?>
                        <div class="xln-news-item">
                            <div class="xln-news-item__wrapper">
                                <div class="xln-news-item__main">
                                    <a href="<?php the_permalink(); ?>" class="xln-news-item__img-wrapper">
                                        <?php the_post_thumbnail('large', array('class' => 'xln-news-item__img')); ?>
                                    </a>
                                    <a href="<?php the_permalink(); ?>" class="xln-news-item__title">
                                        <?php the_title(); ?>
                                    </a>
                                    <div class="xln-news-item__text">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                                <div class="xln-news-item__info">
                                    <div class="xln-news-item__info-item">
                                        <?php the_author(); ?>
                                    </div>
                                    <div class="xln-news-item__info-item">
                                        <?php the_date('D, d M'); ?>
                                    </div>
                                    <div class="xln-news-item__info-item">
                                        <?php echo estimated_reading_time(get_the_content()); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                endif; ?>
            </div>
            <div class="xln-news__pagination xln-pagination">
                <?php custom_pagination_for_ajax($query->max_num_pages, 1); ?>
            </div>
            <?php wp_reset_postdata();
            $news_link = get_field('news_link');
            if ($news_link):
                $link_url = $news_link['url'];
                $link_title  = $news_link['title'];
                $link_target = $news_link['target'] ? $link['target'] : '_self';
                ?>
                <div class="xln-news__footer">
                    <a href="<?php echo esc_url($link_url); ?>"
                    target="<?php echo esc_attr($link_target); ?>"
                    class="xln-news__button xln-button xln-button--big">
                        <?php echo esc_html($link_title); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="xln-ebook">
        <div class="container">
            <div class="xln-ebook__wrapper">
                <?php $ebook_img = get_field('ebook_img');
                if ($ebook_img): ?>
                    <div class="xln-ebook__img">
                        <img src="<?=$ebook_img;?>" alt="">
                    </div>
                <?php endif; 

                $ebook_data = get_field('ebook_data');
                if ($ebook_data): ?>
                <div class="xln-ebook__content">
                    <h3 class="xln-ebook__title"><?=$ebook_data['title'];?></h3>
                    <div class="xln-ebook__text">
                        <?=$ebook_data['text'];?>
                    </div>
                    <a href="<?=$ebook_data['link']['url'];?>" 
                        class="xln-ebook__button xln-button xln-button--green">
                        <?=$ebook_data['link']['title'];?>
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
