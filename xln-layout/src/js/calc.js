const calcInit = () => {
    const calc = $('.calc');
    const activeClass = 'xln-active';

    if (calc.length) {
        // Section toggler
        $('.calc-section__toggler').click(function() {
            $(this).parents('.calc-section').find('.calc-section__content').slideToggle();
            $(this).toggleClass(activeClass);
        })
    }
}

window.addEventListener('DOMContentLoaded', calcInit);