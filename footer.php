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

<!-- Contact Modal -->
<div id="modal-contact"
     class="white-popup mfp-hide">
    <div class="modal-area">
        <?php $popup_contact = get_field('popup_contact', 'options');
         $headline = $popup_contact['headline'];
         $text = $popup_contact['text'];
         $button = $popup_contact['button'] ? $popup_contact['button'] : 'Senden';
        if ($headline):?>
            <div class="modal-header">
                <?php echo $headline; ?>
            </div>
        <?php endif;
        if ($text):?>
            <div class="modal-text">
                <?php echo $text; ?>
            </div>
        <?php endif; ?>
        
        <form class="modal-form" id="modal-form" method="POST">
            <input type="hidden" name="userCID" value="<?php echo $_COOKIE['_ga'] ?>">
            <input type="hidden" name="pageUrl" value="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
            <div class="form-block">
                <input type="text" name="fullname" id="fullname" class="form-input" placeholder="<?php the_field('ph_full_name', 'option'); ?>*">
                <label class="form-label" for="fullname"><?php echo the_field('full_name', 'option'); ?>*</label>
                <div class="msg">Not valid</div>
            </div>
            <div class="form-block">
                <input type="text" class="form-input" name="modalEmail" id="modalEmail" placeholder="<?php the_field('ph_email', 'option'); ?>*">
                <label class="form-label" for="modalEmail"><?php echo the_field('mh_email', 'option'); ?>*</label>
                <div class="msg">The email must be a valid email address.</div>
            </div>
            <div class="form-block">
                <input type="text" class="form-input" name="company" id="company" placeholder="">
                <label class="form-label" for="company"><?php the_field('ph_company', 'option'); ?></label>
            </div>
            <div class="form-block">
                <textarea class="form-input" cols="40" rows="10" name="modalMsg" id="modalMsg" placeholder="Ihre Nachricht"></textarea>
                <label class="form-label" for="modalMsg"><?php replace_p(get_field('ph_message', 'option')) ?>Ihre Nachricht</label>
            </div>
            <div class="checkboks custom-sq">
                <input type="checkbox" id="box6" name="modalCheckboks2" class="checked-checkbox" checked="checked" value="true"/>
                <label for="box6" class="checkboks-text d-flex align-center"><?php echo replace_p(get_field('header_checkbox_text', 'option')) ?></label>
            </div>
            <div class="modal-footer">
                <button type="submit" class="xln-button modal-submit"><?php echo $button; ?></button>
            </div>
        </form>
    </div>
</div>

<!-- Sign Up Modal -->
<div id="modal-signup"
     class="white-popup mfp-hide">
    <div class="modal-area d-flex">
        <?php $popup_signup = get_field('popup_signup', 'options');
         $headline = $popup_signup['headline'];
         $text = $popup_signup['text'];
         $button = $popup_signup['button'] ? $popup_signup['button'] : 'Senden';
        if ($headline):?>
            <div class="modal-header">
                <?php echo $headline; ?>
            </div>
        <?php endif;
        if ($text):?>
            <div class="modal-text">
                <?php echo $text; ?>
            </div>
        <?php endif; ?>

        <form class="modal-form" method="POST" id="form-popup">
            <input type="hidden" name="userCID" value="<?php echo $_COOKIE['_ga'] ?>">
            <input type="hidden" name="pageUrl" value="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
            <div class="form-block">
                <input type="text" id="send_email" name="signup-email" class="form-input" placeholder="Email*" required="required">
                <label for="send_email" class="form-label">Email*</label>
                <div class="msg"></div>
            </div>
            <input type="submit" name="subscribe-form" id="vdc-send-modal" class="xln-button send-subscribe" value="<?php echo $button; ?>">
        </form>
        
            
        <?php $signups = get_field('signups', 'options');
        if ($signups):  ?>
            <div class="modal-signups">
                <div class="signups-title">
                    <span>oder registrieren Sie sich mit</span>
                </div>
                <?php echo do_shortcode('[signups]'); ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Thanks Modal -->
<div id="modal-thanks"
     class="white-popup mfp-hide">
    <div class="modal-area d-flex">
        <?php $popup_thanks = get_field('popup_thanks', 'options');
         $headline = $popup_thanks['headline'];
         $text = $popup_thanks['text'];
         $button = $popup_thanks['button'] ? $popup_thanks['button'] : 'Senden';
        if ($headline):?>
            <div class="modal-header">
                <?php echo $headline; ?>
            </div>
        <?php endif;
        if ($text):?>
            <div class="modal-text">
                <?php echo $text; ?>
            </div>
        <?php endif; ?>
        <div class="xln-button send-subscribe modal-close">
            <?php echo $button; ?>
        </div>
    </div>
</div>

<!-- Open Apply to position Modal -->
<div id="open-apply"
     class="white-popup mfp-hide">
    <div class="modal-area d-flex">
    <div class="modal-header"><?php echo the_field('ap_title', 'option'); ?></div>
      <?php echo do_shortcode( '[contact-form-7 id="10660" html_class="modal-form" html_id="modal-form-apply" title="Apply for position"]' ); ?>
  </div>
</div>



<script>
    var ajaxactionurl = '<?php echo admin_url('admin-ajax.php'); ?>';
</script>
<?php wp_footer(); ?>
<!--<script src="--><?php //echo TEMPLATE_URL; ?><!--/js/custom.js"></script>-->
</body>
</html>
