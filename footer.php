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
                    <div class="footer__socials socials">
                        <?php foreach ($socials as $social): ?>
                            <a href="<?php echo $social['link']; ?>"
                               class="socials__link"
                               target="_blank">
                                <svg width="24" height="24">
                                    <use xlink:href="#social-<?php echo $social['type']; ?>"></use>
                                </svg>
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
                <?php $footer_form = get_field('footer_form', 'options'); ?>
                <?php $footer_headline = $footer_form['headline'];
                if ($footer_headline):?>
                    <div class="footer__header">
                        <?php echo $footer_headline; ?>
                    </div>
                <?php endif; ?>
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
                        <form id="contact-form" method="POST" class="d-flex form footer-form">
                            <input type="hidden" name="userCID" value="<?php echo $_COOKIE['_ga'] ?>">
                            <input type="hidden" name="pageUrl" value="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
                            <input type="text" class="simple-input" id="name" name="name" placeholder="<?php the_field('ph_full_name', 'option'); ?>">
                            <input type="text" class="simple-input" id="email" name="email" placeholder="<?php the_field('ph_email', 'option'); ?>">
                            <textarea class="quession-input" id="msg" name="msg" placeholder="Ihre Frage"></textarea>
                            <div class="checkboks custom-sq">
                                <input type="checkbox" class="checked-checkbox" name="myCheckboxes" id="box1" checked="checked" value="true">
                                <label for="box1" class="checkboks-text">
                                    <?php echo replace_p(get_field('footer_checkbox_text', 'option')); ?>
                                </label>
                            </div>
                            <div class="send-success-zone d-flex align-center">
                                <?php $footer_button = $footer_form['button'] ? $footer_form['button'] : 'Senden'; ?>
                                <button type="submit" class="xln-button submit">
                                    <?php echo $footer_button; ?>
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

<?php include 'template-parts/modals/modal-signup.php' ?>
<?php include 'template-parts/modals/modal-contact.php' ?>
<?php include 'template-parts/modals/modal-apply.php' ?>
<?php include 'template-parts/modals/modal-thanks.php' ?>

<script>
    var ajaxactionurl = '<?php echo admin_url('admin-ajax.php'); ?>';
</script>
<?php wp_footer(); ?>
</body>
</html>
