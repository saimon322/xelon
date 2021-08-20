const calcInit = () => {
    const calc = $('.calc');
    const activeClass = 'xln-active';

    if (calc.length) {
        // Section toggler
        $('.calc-section__toggler').click(function() {
            $(this).toggleClass(activeClass);
            $(this).parents('.calc-section').find('.calc-section__content').stop().slideToggle();
        })
    }
}

window.addEventListener('DOMContentLoaded', calcInit);