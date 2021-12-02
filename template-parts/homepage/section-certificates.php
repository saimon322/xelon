<section class="xln-certificates">
    <div class="xln-container">
        <h2 class="xln-certificates__title">
            <?=get_field('certificates_title')?>
        </h2>

        <?php $certificates = get_field('certificates');
        if($certificates): ?>
            <ul class="xln-certificates__list">
                <?php foreach($certificates as $certificate): ?>
                    <div class="xln-certificates__item">
                        <img src="<?=esc_url($certificate['url'])?>" 
                            title="<?=esc_attr($certificate['title'])?>" 
                            alt="<?=esc_attr($certificate['alt'])?>">
                    </div>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</section> 