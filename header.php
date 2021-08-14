<!DOCTYPE html>
<?php //language_attributes(); not working well with Weglot ?>
<?php if (function_exists('weglot_get_current_language')): ?>
<html lang="<?php echo weglot_get_current_language() ?>">
<?php else: ?>
<html <?php language_attributes(); ?>>
<?php endif; ?>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo TEMPLATE_URL; ?>/xln-layout/dist/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo TEMPLATE_URL; ?>/xln-layout/dist/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo TEMPLATE_URL; ?>/xln-layout/dist/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo TEMPLATE_URL; ?>/xln-layout/dist/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo TEMPLATE_URL; ?>/xln-layout/dist/img/favicon/safari-pinned-tab.svg" color="#178cf9">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="theme-color" content="#ffffff">

    <title><?php wp_title('|', true, 'right'); ?></title>

    <link rel="preconnect" href="https://www.googletagmanager.com">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://app.continual.ly">
    <link rel="preconnect" href="https://www.gstatic.com">
    <link rel="preload" href="https://fonts.gstatic.com/s/manrope/v4/xn7gYHE41ni1AdIRggOxSuXd.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="https://fonts.gstatic.com/s/manrope/v4/xn7gYHE41ni1AdIRggSxSuXd.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="https://fonts.gstatic.com/s/manrope/v4/xn7gYHE41ni1AdIRggmxSuXd.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="https://fonts.gstatic.com/s/manrope/v4/xn7gYHE41ni1AdIRggexSg.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php //if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); } ?>

<?php 
$login_link = get_field('login_link', 'options'); 
$signup_link = get_field('signup_link', 'options'); 
$consult_link = get_field('consult_link', 'options'); 
?>

<header class="xln-header">
    <div class="top-header">
        <div class="top-header__container xln-container">
            <div class="top-header__wrapper">
                <?php if ($signup_link): ?>
                    <a href="<?php echo $signup_link['url']; ?>"
                       class="top-header__btn xln-button xln-button--white open-popup-link">
                        <?php echo $signup_link['title']; ?>
                    </a>
                <?php endif; ?>

                <?php desktop_lang_switcher(); ?>

                <nav class="top-header__nav top-nav">
                    <?php wp_nav_menu([
                        'theme_location' => 'top_header_menu',
                        'container'      => false,
                        'items_wrap'     => '<ul class="top-nav__list">%3$s</ul>',
                        'echo'           => true,
                        'walker'         => new WP_Top_Header_Walker(),
                    ]); ?>
                </nav>

                <?php $telephone = get_field('telephone', 'options');
                if ($telephone):?>
                    <a href="tel:<?php echo $telephone; ?>"
                       class="top-header__phone top-header__link">
                        <svg width="14"
                             height="14">
                            <use xlink:href="#phone"></use>
                        </svg>
                        <?php echo $telephone; ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <nav class="main-nav">
        <div class="main-nav__wr">
            <div class="main-nav__container xln-container">
                <div class="main-nav__titles">
                    <?php $header_logo = get_field('header_logo', 'options');
                    if ($header_logo): ?>
                        <a href="/"
                           class="main-nav__logo"
                           alt="Back to home">
                            <img src="<?php echo $header_logo['url']; ?>"
                                 alt="<?php echo $header_logo['alt']; ?>">
                        </a>
                    <?php endif; ?>
                    <div class="main-nav__title main-nav__title--menu">
                        Menü
                    </div>
                    <div class="main-nav__title main-nav__title--back">
                        <svg width="24"
                             height="24">
                            <use xlink:href='#arrow-back'></use>
                        </svg>
                        Zurück
                    </div>
                </div>

                <div class="main-nav__menu main-menu">
                    <div class="main-menu__wrapper">
                        <?php the_mega_menu(); ?>
                        <div class="main-menu__footer">
                        <?php if ($login_link): ?>
                            <a href="<?php echo $login_link['url']; ?>"
                               target="<?php echo $login_link['target']; ?>"
                               class="main-menu__login xln-button">
                                <?php echo $login_link['title']; ?>
                            </a>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="main-nav__account">
                    <?php if ($consult_link): ?>
                        <a href="<?php echo $consult_link['url']; ?>"
                           target="<?php echo $consult_link['target']; ?>"
                           class="main-nav__consult xln-button xln-button--opacity">
                            <?php echo $consult_link['title']; ?>
                        </a>
                    <?php endif; ?>
                    <?php if ($login_link): ?>
                        <a href="<?php echo $login_link['url']; ?>"
                           target="<?php echo $login_link['target']; ?>"
                           class="main-nav__login xln-button">
                            <?php echo $login_link['title']; ?>
                        </a>
                    <?php endif; ?>
                </div>

                <?php mobile_lang_switcher() ?>

                <div class="main-nav__hamburger"
                     title="Main menu">
                    <b></b>
                    <b></b>
                    <b></b>
                </div>
            </div>
        </div>
    </nav>
</header>
<main>
