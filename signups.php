<div class="modal-signups__list">
<?php foreach ($signups as $signup): 
    $href = 'https://vdc.xelon.ch/login?';
    if ($promo['status'] == 'true') {
        $href .= 'promo=' . $promo['promo'] .= '&';
    }
    $href .= 'provider_name=' . $signup['type'];
?>
    <a href="<?php echo $href; ?>"
        class="modal-signup"
        target="_blank">
        <img src="<?php echo $signup['icon']; ?>" alt="">
        <?php echo $signup['name']; ?>
    </a>
<?php endforeach; ?>
</div>