const modalInit = () => {
    const modalLinks = document.querySelectorAll("a[href^='#modal-']");
    const modalClass = 'open-popup-link';

    modalLinks && modalLinks.forEach((modalLink) => {
        modalLink.classList.add(modalClass);
    })

    const modalCloseBtns = document.querySelectorAll('.modal-close');
    modalCloseBtns.forEach((item) => {
        item.addEventListener('click', function() {
            document.querySelector('.mfp-close').click();
        })
    });
}

window.addEventListener('DOMContentLoaded', modalInit);