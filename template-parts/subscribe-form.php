<?php $subscribe_form = get_field('subscribe_form', 'option'); ?>
<section class="xln-subscribe">
    <div class="xln-container">
        <div class="xln-info-block__wrapper">
            <div class="xln-info-block__main">
                <h3 class="xln-info-block__title">
                    <?= $subscribe_form['title']; ?>
                </h3>
                <div class="xln-info-block__text">
                    <?= $subscribe_form['text']; ?>
                </div>
            </div>
            <div class="xln-info-block__form">
                <form method="POST"
                    id="subs-form" 
                    class="email-form email-form--white"
                    data-portal-id="3366455"
                    data-form-id="5ecdadd2-a9b7-4f95-b3a4-3225fb1658f9">
                    <div class="email-form__box">
                        <input type="hidden" name="userCID" value="<?php echo $_COOKIE['_ga']?>">
                        <input type="hidden" name="pageUrl" value="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>">
                        <div class="form-block form-block--big  ">
                            <input type="email" name="subsEmail" id="subsEmail" placeholder="<?= $subscribe_form['email_placeholder']; ?>" class="form-input">
                            <label class="form-label"><?= $subscribe_form['email_placeholder']; ?></label>
                        </div>
                        <input type="submit" class="xln-button xln-button--green subs-submit" value="<?= $subscribe_form['button']; ?>">
                        <div class="sucmsg4"></div>	
                    </div>
                    <div class="checkboks custom-sq">
                        <input type="checkbox" class="checked-checkbox" name="myCheckboxes" id="box10"
                            checked="checked" value="true">
                        <label for="box10" class="checkboks-text">
                            <?php echo replace_p($subscribe_form['checkbox_text']); ?>
                        </label>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>