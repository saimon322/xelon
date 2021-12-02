<section class="xln-info-block">
    <div class="xln-container">
        <div class="xln-info-block__wrapper">
            <div class="xln-info-block__main">
                <h2 class="xln-info-block__title">
                    <?=get_field('action_title')?>
                </h2>
                <div class="xln-info-block__text">
                    <?=get_field('action_text')?>
                </div>
            </div>
            <div class="xln-info-block__buttons">
                <?php if ($signup_modal): ?>
                    <a href="<?=get_field('action_sign_up_button')['url']?>"
                        class="xln-button xln-button--green">
                            <?=get_field('action_sign_up_button')['title']?>
                    </a>
                <?php endif; ?>
                <?php if ($contacts_modal): ?>
                    <a href="<?=get_field('action_contact_button')['url']?>"
                        class="xln-button xln-button--opacity">
                            <?=get_field('action_contact_button')['title']?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>