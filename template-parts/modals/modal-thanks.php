<div id="modal-thanks" class="white-popup mfp-hide">
    <div class="modal-area">
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