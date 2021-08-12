<?php
/**
 * Template Name: Menu test
 */
?>
<!DOCTYPE html>
<?php //language_attributes(); not working well with Weglot ?>
<?php if (function_exists('weglot_get_current_language')): ?>
<html lang="<?php echo weglot_get_current_language() ?>">
<?php else: ?>
<html <?php language_attributes(); ?>>
<?php endif; ?>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon"
          sizes="180x180"
          href="<?php echo TEMPLATE_URL; ?>/xln-layout/dist/img/favicon/apple-touch-icon.png">
    <link rel="icon"
          type="image/png"
          sizes="32x32"
          href="<?php echo TEMPLATE_URL; ?>/xln-layout/dist/img/favicon/favicon-32x32.png">
    <link rel="icon"
          type="image/png"
          sizes="16x16"
          href="<?php echo TEMPLATE_URL; ?>/xln-layout/dist/img/favicon/favicon-16x16.png">
    <link rel="manifest"
          href="<?php echo TEMPLATE_URL; ?>/xln-layout/dist/img/favicon/site.webmanifest">
    <link rel="mask-icon"
          href="<?php echo TEMPLATE_URL; ?>/xln-layout/dist/img/favicon/safari-pinned-tab.svg"
          color="#5bbad5">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="preconnect"
          href="https://www.googletagmanager.com">
    <link rel="preconnect"
          href="https://www.google-analytics.com">
    <link rel="preconnect"
          href="https://fonts.gstatic.com">
    <link rel="preconnect"
          href="https://app.continual.ly">
    <link rel="preconnect"
          href="https://www.gstatic.com">
    <!--<link rel="preconnect" href="https://fonts.googleapis.com">-->
    <link rel="preload"
          href="https://fonts.gstatic.com/s/manrope/v4/xn7gYHE41ni1AdIRggOxSuXd.woff2"
          as="font"
          type="font/woff2"
          crossorigin="anonymous">
    <link rel="preload"
          href="https://fonts.gstatic.com/s/manrope/v4/xn7gYHE41ni1AdIRggSxSuXd.woff2"
          as="font"
          type="font/woff2"
          crossorigin="anonymous">
    <link rel="preload"
          href="https://fonts.gstatic.com/s/manrope/v4/xn7gYHE41ni1AdIRggmxSuXd.woff2"
          as="font"
          type="font/woff2"
          crossorigin="anonymous">
    <link rel="preload"
          href="https://fonts.gstatic.com/s/manrope/v4/xn7gYHE41ni1AdIRggexSg.woff2"
          as="font"
          type="font/woff2"
          crossorigin="anonymous">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php //if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); } ?>
<div class="header">
    <div class="top-header">
        <div class="xln-container">
            <div class="top-header__wrapper">
                <a href="#modal-signup"
                   class="open-popup-link top-header__btn xln-button xln-button--white">
                    Jetzt anmelden und 50 CHF Guthaben für 60 Tage erhalten
                </a>
                <nav class="top-header__nav">
                    <?php wp_nav_menu([
                        'theme_location' => 'top_header_menu',
                        'container'      => false,
                        'items_wrap'     => '<ul class="top-header__nav-list">%3$s</ul>',
                        'echo'           => true,
                        'walker'         => new WP_Top_Header_Walker(),
                    ]); ?>
                </nav>
            </div>
        </div>
    </div>
    <div id="sticky-navbar"
         class="header-area"
         style="display: none;">
        <div class="xln-container">
            <div class="main-header-bar d-flex">
                <?php $header_logo = get_field('header_logo', 'options');
                if ($header_logo): ?>
                    <div class="logo">
                        <a href="/"
                           class="go-to-home">
                            <img src="<?php echo $header_logo['url']; ?>"
                                 alt="<?php echo $header_logo['alt']; ?>">
                        </a>
                    </div>
                <?php endif; ?>
                <div class="main-header-right-side d-flex">
                    <div class="lang-mobile-bar">
                        <?php wp_nav_menu(array('theme_location' => 'lang_switch', 'container' => '', 'menu_class' => 'lang-h-menu',)); ?>
                    </div>
                    <div class="menu mobile-menu">
                        <div class="main-menu-mob">
                            <?php //if( wp_is_mobile() ) {
                            wp_nav_menu(array('theme_location' => 'max_mega_menu_1', 'container' => '', 'menu_class' => 'top-menu'));
                            //} ?>
                        </div>
                        <div class="main-menu-desc">
                            <?php //if( !wp_is_mobile() ) {
                            wp_nav_menu(array('theme_location' => 'header_menu', 'container' => '', 'menu_class' => 'top-menu'));
                            //} ?>
                        </div>
                        <ul class="mobile-nav-footer">
                            <li class="tp-c-email">
                                <a href="mailto:<?php echo the_field('header_email', 'option'); ?>"><?php echo the_field('header_email', 'option'); ?></a>
                            </li>
                            <li class="tp-c-number">
                                <a href="tel:<?php echo the_field('telephone', 'option'); ?>"><?php echo the_field('telephone', 'option'); ?></a>
                            </li>
                            <li class="tp-c-day"><?php echo the_field('working_day', 'option'); ?></li>
                            <li>
                                <a href="#open-contact"
                                   class="default-btn open-popup-contact"><?php echo the_field('contact_us_btn', 'option'); ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="main-nav">
        <div class="main-nav__wr">
            <div class="main-nav__container xln-container">
                <!-- Выводим href на всех страницах кроме главной -->
                <?php $header_logo = get_field('header_logo', 'options');
                if ($header_logo): ?>
                    <a href="/"
                       class="main-nav__logo"
                       alt="Back to home">
                        <img src="<?php echo $header_logo['url']; ?>"
                             alt="<?php echo $header_logo['alt']; ?>">
                    </a>
                <?php endif; ?>
                
                <?php the_mega_menu(); ?>
                
                <div class="main-nav__account">
                    <a href="#modal-signup"
                       class="main-nav__signup open-popup-link xln-button xln-button--opacity">
                        Beratungsgespräch buchen
                    </a>
                    <a target="_blank"
                       class="main-nav__login xln-button"
                       href="https://vdc.xelon.ch/login">
                        Login
                    </a>
                </div>
                <ul class="main-nav__langs">
                    <li class="main-nav__lang">
                        <a title="Deutsch"
                           href="https://xelon.one-pix.com/"
                           data-wg-notranslate="true">DE
                        </a>
                    </li>
                    <li class="main-nav__lang">
                        <a title="English"
                           href="https://xelon.one-pix.com/en/"
                           data-wg-notranslate="true">EN
                        </a>
                    </li>
                </ul>
                <div class="main-nav__hamburger"
                     title="Main menu">
                    <b></b>
                    <b></b>
                    <b></b>
                </div>
            </div>
        </div>
    </nav>
</div>
<main>
</main>
<footer class="footer">
    <div class="footer__container container">
        <div class="footer__wrapper">
            <div class="footer__left">
                <div class="footer__main">
                    <?php $footer_logo = get_field('footer_logo', 'options');
                    if ($footer_logo): ?>
                        <div class="footer__logo">
                            <a href="/"
                               class="go-to-home">
                                <img src="<?php echo $footer_logo['url']; ?>"
                                     alt="<?php echo $footer_logo['alt']; ?>">
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="footer__menu">
                        <?php wp_nav_menu([
                            'theme_location' => 'footer_menu',
                            'container'      => false,
                            'items_wrap'     => '%3$s',
                            'echo'           => true,
                            'walker'         => new WP_Footer_Walker(),
                        ]); ?>
                    </div>
                </div>
                <?php $socials = get_field('socials', 'options');
                if ($socials): ?>
                    <div class="footer__socials">
                        <?php foreach ($socials as $social): ?>
                            <a href="<?php echo $social['link']; ?>"
                               class="footer__social"
                               target="_blank">
                                <img src="<?php echo $social['image']['url']; ?>"
                                     alt="<?php echo $social['image']['alt']; ?>">
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <?php $copyright = get_field('copyright', 'options');
                if ($copyright):?>
                    <div class="footer__copyright">
                        <?php echo $copyright; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="footer__right">
                <div class="footer__header">
                    Wir freuen uns auf Ihre Kontaktaufnahme
                </div>
                <div class="footer__contacts">
                    <?php $footer_address = get_field('footer_address', 'options');
                    if ($footer_address):?>
                        <div class="footer__contacts-item">
                            <svg width="20"
                                 height="20">
                                <use xlink:href="#footer-map"></use>
                            </svg>
                            <?php echo $footer_address; ?>
                        </div>
                    <?php endif; ?>
                    <?php $telephone = get_field('telephone', 'options');
                    if ($telephone):?>
                        <div class="footer__contacts-item">
                            <svg width="20"
                                 height="20">
                                <use xlink:href="#footer-phone"></use>
                            </svg>
                            <a href="tel:<?php echo $telephone; ?>"><?php echo $telephone; ?></a>
                        </div>
                    <?php endif; ?>
                    <?php $header_email = get_field('header_email', 'options');
                    if ($header_email):?>
                        <div class="footer__contacts-item">
                            <svg width="20"
                                 height="20">
                                <use xlink:href="#footer-mail"></use>
                            </svg>
                            <a href="mailto:<?php echo $header_email; ?>"><?php echo $header_email; ?></a>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="get-touch-area d-flex">
                    <div class="send-form d-flex">
                        <form id="contact-form"
                              method="POST"
                              class="d-flex form footer-form">
                            <input type="hidden"
                                   name="userCID"
                                   value="<?php echo $_COOKIE['_ga'] ?>">
                            <input type="hidden"
                                   name="pageUrl"
                                   value="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
                            <input type="text"
                                   class="simple-input"
                                   id="name"
                                   name="name"
                                   placeholder="<?php the_field('ph_full_name', 'option'); ?>">
                            <input type="text"
                                   class="simple-input"
                                   id="email"
                                   name="email"
                                   placeholder="<?php the_field('ph_email', 'option'); ?>">
                            <textarea class="quession-input"
                                      id="msg"
                                      name="msg"
                                      placeholder="Ihre Frage"></textarea>
                            <div class="checkboks custom-sq">
                                <input type="checkbox"
                                       class="checked-checkbox"
                                       name="myCheckboxes"
                                       id="box1"
                                       checked="checked"
                                       value="true">
                                <label for="box1"
                                       class="checkboks-text">
                                    <?php echo replace_p(get_field('footer_checkbox_text', 'option')); ?>
                                </label>
                            </div>
                            <div class="send-success-zone d-flex align-center">
                                <button type="submit"
                                        class="xln-button submit"><?php echo the_field('btn_send', 'option'); ?>
                                </button>
                                <div class="sucmsg1"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Contact Modal -->
<div id="modal-contact"
     class="white-popup mfp-hide">
    <div class="modal-area">
        <div class="modal-header">Kontaktformular</div>
        <form id="modal-form"
              class="tp-m-form"
              method="POST">
            <input type="hidden"
                   name="userCID"
                   value="<?php echo $_COOKIE['_ga'] ?>">
            <input type="hidden"
                   name="pageUrl"
                   value="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
            <div class="get-inputs">
                <input type="text"
                       name="fullname"
                       id="fullname"
                       class="modal-input"
                       placeholder="<?php the_field('ph_full_name', 'option'); ?>*">
                <label class="blue-label"
                       for="fullname"><?php echo the_field('full_name', 'option'); ?>*</label>
            </div>
            <div class="get-inputs">
                <input type="text"
                       class="modal-input"
                       name="modalEmail"
                       id="modalEmail"
                       placeholder="<?php the_field('ph_email', 'option'); ?>*">
                <label class="blue-label"
                       for="modalEmail"><?php echo the_field('mh_email', 'option'); ?>*</label>
            </div>
            <div class="get-inputs">
                <input type="text"
                       class="modal-input"
                       name="company"
                       id="company"
                       placeholder="">
                <label class="blue-label"
                       for="company"><?php the_field('ph_company', 'option'); ?></label>
            </div>
            <div class="get-inputs">
                <textarea class="modal-input"
                          cols="40"
                          rows="10"
                          name="modalMsg"
                          id="modalMsg"
                          placeholder="Ihre Nachricht"></textarea>
                <label class="blue-label"
                       for="modalMsg"><?php replace_p(get_field('ph_message', 'option')) ?>Ihre Nachricht</label>
            </div>
            <div class="checkboks custom-sq">
                <input type="checkbox"
                       id="box6"
                       name="modalCheckboks2"
                       class="checked-checkbox"
                       checked="checked"
                       value="true"/>
                <label for="box6"
                       class="checkboks-text d-flex align-center"><?php echo replace_p(get_field('header_checkbox_text', 'option')) ?></label>
            </div>
            <div class="send-success-zone d-flex align-center">
                <button type="submit"
                        class="xln-button modal-submit"><?php echo the_field('send_message_btn', 'option'); ?></button>
                <div class="sucmsg3"></div>
            </div>
        </form>
    </div>
</div>
<!-- Sign Up Modal -->
<div id="modal-signup"
     class="white-popup mfp-hide">
    <div class="modal-area d-flex">
        <div class="modal-header">
            Konto erstellen
        </div>
        <div class="modal-text">
            und kostenlose Guthaben erhalten!
        </div>
        <form method="POST"
              class="send-modal-data"
              id="form-popup">
            <input type="hidden"
                   name="userCID"
                   value="<?php echo $_COOKIE['_ga'] ?>">
            <input type="hidden"
                   name="pageUrl"
                   value="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
            <input type="text"
                   id="send_email"
                   name="subscribe-email"
                   class="modal-input"
                   placeholder="Email *"
                   required="required">
            <div class="success-msg">
                <div class="msg"></div>
            </div>
            <input type="submit"
                   name="subscribe-form"
                   id="vdc-send-modal"
                   class="xln-button send-subscribe"
                   value="<?php echo the_field('lets_get_started', 'option'); ?>">
        </form>
    </div>
</div>
<!-- Thanks Modal -->
<div id="modal-thanks"
     class="white-popup mfp-hide">
    <div class="modal-area d-flex">
        <div class="modal-header">
            Vielen Dank!
        </div>
        <div class="modal-text">
            Ihre Nachricht wurde gesendet!<br>
            Wir melden uns bald
        </div>
        <form method="POST"
              class="send-modal-data"
              id="form-popup">
            <input type="submit"
                   class="xln-button send-subscribe"
                   value="<?php echo the_field('lets_get_started', 'option'); ?>">
        </form>
    </div>
</div>
<script>
    var ajaxactionurl = '<?php echo admin_url('admin-ajax.php'); ?>';
</script>
<?php wp_footer(); ?>
<!--<script src="--><?php //echo TEMPLATE_URL; ?><!--/js/custom.js"></script>-->
</body>
</html>



