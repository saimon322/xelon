<section class="xln-customers">
    <div class="xln-container">
        <h2 class="xln-customers__title">
            <?=get_field('customers_title')?>
        </h2>
        <div class="xln-customers__content">
            <?php $customers = get_field('customers');
            if($customers): ?>
                <div class="xln-customers__list">
                    <?php foreach($customers as $customer): ?>
                        <div class="xln-customers__item">
                            <img src="<?=esc_url($customer['url'])?>" 
                                    title="<?=esc_attr($customer['title'])?>" 
                                    alt="<?=esc_attr($customer['alt'])?>">
                        </div>                            
                    <?php endforeach; ?>
                </div>
            <?php endif; ?> 
        </div>
    </div>
</section>