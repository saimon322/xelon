const initPlatforms = () => {
    const platformsEl = document.querySelector('.products-platforms');
    const bp992 = window.matchMedia('(min-width: 992px)').matches;

    if (platformsEl) {
        const wrapper = platformsEl.querySelector('.products-platforms__wrapper');
        const nav = platformsEl.querySelector('.products-platforms-nav');
        const navBtn = nav.querySelector('.products-platforms-nav__btn');
        const navTitle = nav.querySelector('.products-platforms-nav__title');
        const navList = nav.querySelector('.products-platforms-nav__list');
        const navItems = navList.querySelectorAll('.products-platforms-nav__item');

        const platformsArr = [];
        let currentItem = null;
        const startTop = bp992 ? 200 : 0;
        const wrapperTop = wrapper.offsetTop - startTop;
        const navListH = navList.scrollHeight;
        const navTitleText = navTitle.textContent;
        
        const activeClass = 'active';
        const fixedClass = 'fixed';

        setTimeout(() => {            
            [...navItems].forEach(item => {
                let id = item.getAttribute('href');
                let el = document.querySelector(id);
                let top = el.offsetTop - startTop - 30;
                let title = el.querySelector('.products-platform__title').textContent;
                platformsArr.push({'link': item, 'top': top, 'title': title});
            });
        }, 300)

        setTimeout(platformsNav, 300);
        window.addEventListener('scroll', platformsNav);

        function platformsNav() {
            let scrollPos = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollPos > wrapperTop) {
                nav.classList.add(fixedClass);
                let newItem = null;
                [...platformsArr].forEach(platform => {
                    if (scrollPos > platform.top) {
                        newItem = platform;
                    }
                })
                if (newItem) {
                    currentItem && currentItem.link.classList.remove(activeClass);
                    navTitle.textContent = newItem.title;
                    newItem.link.classList.add(activeClass);
                    currentItem = newItem;
                }
            } else {
                nav.classList.remove(fixedClass);
                navTitle.textContent = navTitleText;
                if (currentItem) {
                    currentItem.link.classList.remove(activeClass);
                    currentItem = null;
                }
            }
        }

        navBtn.addEventListener('click', () => {
            navBtn.classList.toggle(activeClass);
            if (navList.style.maxHeight) {
                navList.style.maxHeight = null;
            } else {
                navList.style.maxHeight = navListH + "px";
            }
        });

        [...navItems].forEach(item => {
            item.addEventListener('click', () => {
                navBtn.click();
            })
        });
    }
};

window.addEventListener('DOMContentLoaded', initPlatforms);