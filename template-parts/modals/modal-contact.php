<div id="modal-contact" class="white-popup mfp-hide">
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