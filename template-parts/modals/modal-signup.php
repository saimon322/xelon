<div id="modal-signup" class="white-popup mfp-hide">
    <?php $popup_signup = get_field('popup_signup', 'options'); ?> 
    <div class="modal-wrapper">
        <?php if ($popup_signup['img']): ?>
            <div class="modal-img">
                <img src="<?= $popup_signup['img'] ?>" alt="">
            </div>
        <?php endif; ?>
        <div class="modal-area">
            <?php if ($popup_signup['content']['headline']): ?>
                <div class="modal-header">
                    <?= $popup_signup['content']['headline']; ?>
                </div>  
            <?php endif; ?>
            <?php if ($popup_signup['content']['text']): ?>
                <div class="modal-text">
                    <?= $popup_signup['content']['text']; ?>
                </div>
            <?php endif; ?>
            <form class="modal-form" method="POST" id="form-popup">
                <input type="hidden" name="userCID" value="<?php echo $_COOKIE['_ga'] ?>">
                <input type="hidden" name="pageUrl" value="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
                <div class="form-block">
                    <input type="email" name="signup-email" class="form-input" placeholder="Email*" required="required">
                    <label class="form-label">Email*</label>
                    <div class="msg"></div>
                </div>
                <button type="submit" class="xln-button xln-button--green send-subscribe">
                    Jetzt starten!
                    <svg width="14" height="14">
                        <use xlink:href='#arrow-full'></use>
                    </svg>
                </button>
            </form>
            <?php if ($popup_signup['content']['footer_text']): ?>
                <div class="modal-footer-text">
                    <?= $popup_signup['content']['footer_text']; ?>
                </div>
            <?php endif; ?>
            
                
            <?php /* $signups = get_field('signups', 'options');
            if ($signups):  ?>
                <div class="modal-signups">
                    <div class="signups-title">
                        <span>oder registrieren Sie sich mit</span>
                    </div>
                    <?php echo do_shortcode('[signups]'); ?>
                </div>
            <?php endif; */ ?>
        </div>
    </div>
</div>