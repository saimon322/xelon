const mainNavInit = () => {
    const nav = document.querySelector('.main-nav');
    const navButton = document.querySelector('.main-nav__hamburger');
    const backButton = document.querySelector('.main-nav__title--back');
    const activeClass = 'xln-active';
    const menuClass = 'show-menu';
    const submenuClass = 'show-submenu';

    // Menu buttons
    navButton.addEventListener('click', () => {
        nav.classList.toggle(menuClass);
        if (nav.classList.contains(menuClass)) {
            bodyFixPosition();
        } else {
            bodyUnfixPosition();
        }
    });
    backButton.addEventListener('click', () => {
        const menuInner = document.querySelector('.xln-menu__inner.xln-active');
        if (menuInner) {
            menuInner.classList.remove(activeClass);
        } else {
            nav.classList.remove(submenuClass);
        }
    });

    if (window.matchMedia('(max-width: 991px)').matches) {
        // Mobile scripts
        menuMobile();
        topHeaderMove();
    } else {
        // Desktop scripts
        menuSetInner();
        menuLinksHover();
    }

    // Move top header content to menu
    function topHeaderMove() {
        const topHeader = document.querySelector('.top-header__wrapper');
        const menuFooter = document.querySelector('.main-menu__footer');
        menuFooter.innerHTML = menuFooter.innerHTML + topHeader.innerHTML;
    }

    // Menu mobile links click open submenu
    function menuMobile() {
        const menuLinks = document.querySelectorAll('.main-menu__link');
        menuLinks.forEach((menuLink) => {
            menuLink.addEventListener('click', function(e) {
                const nextMenu = menuLink.nextElementSibling;
                const isEmpty = menuLink.classList.contains('main-menu__link--empty');
                if (nextMenu && !isEmpty) {
                    e.preventDefault();
                    nav.classList.add(submenuClass);
                    let activeMenu = document.querySelector('.xln-menu.xln-active');
                    activeMenu && activeMenu.classList.remove(activeClass);
                    nextMenu.classList.add(activeClass);
                }
            })
        })

        const downloadLinks = document.querySelectorAll('.xln-menu__download');
        downloadLinks.forEach((downloadLink) => {
            downloadLink.addEventListener('click', function(e) {
                const downloadInner = downloadLink.nextElementSibling;
                if (downloadInner) {
                    e.preventDefault();
                    downloadInner.classList.add(activeClass);
                }
            })
        })
    }

    // Menu inside links hover
    function menuLinksHover() {
        const menuLinks = document.querySelectorAll('.xln-menu__link');
        menuLinks.forEach((menuLink) => {
            if (menuLink.classList.contains(activeClass)) {
                menuUpdate(menuLink);
            }
            menuLink.addEventListener('mouseenter', function() {
                menuUpdate(menuLink);
            })
        })
    }

    // Set middle menu contents
    function menuSetInner() {
        const menus = document.querySelectorAll('.xln-menu');
        menus.forEach((menu) => {
            const menuContainer = menu.querySelector('.xln-menu-inside__container');
            const menuContents = menu.querySelectorAll('.xln-menu__inner');
            let maxHeight = 0;
            let maxHeightList;
            menuContents.forEach((menuContent) => {
                const contentList = menuContent.children.item(0);
                let height = contentList.offsetHeight;
                menuContainer.append(contentList);
                height = contentList.offsetHeight;
                if (height > maxHeight) {
                    maxHeight = height;
                    maxHeightList = contentList;
                }
            })
            maxHeightList.style.position = 'relative';
        })
    }

    // Update middle menu content
    function menuUpdate(menuLink) {
        const menuContent = menuLink.nextElementSibling;
        if (menuContent) {
            const menuParent = menuLink.closest('.xln-menu');
            const menuContainer = menuParent.querySelector('.xln-menu-inside__container');
            menuLinkActive = menuParent.querySelector('.xln-menu__link.xln-active');
            menuLinkActive.classList.remove(activeClass);
            menuLink.classList.add(activeClass);
            const index = menuLink.dataset.menu;
            const contentEl = '.xln-menu-inside__list';
            const oldContent = menuContainer.querySelector(`${contentEl}.xln-active`);
            const newContent = menuContainer.querySelector(`${contentEl}[data-menu='${index}']`);
            if (newContent) {
                oldContent && oldContent.classList.remove(activeClass);
                newContent.classList.add(activeClass);
            }
        }
    }

    // Fix body IOS
    function bodyFixPosition() {
        setTimeout( function() {
            if ( !document.body.hasAttribute('data-body-scroll-fix') ) {
                let scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
                document.body.setAttribute('data-body-scroll-fix', scrollPosition);
                document.body.style.overflow = 'hidden';
                document.body.style.position = 'fixed';
                document.body.style.left = '0';
                document.body.style.width = '100%';
            }
        }, 500 );
    }

    // Unfix body IOS
    function bodyUnfixPosition() {
        if ( document.body.hasAttribute('data-body-scroll-fix') ) {
            let scrollPosition = document.body.getAttribute('data-body-scroll-fix');
            document.body.style.overflow = '';
            document.body.style.position = '';
            document.body.style.top = '';
            document.body.style.left = '';
            document.body.style.width = '';
            window.scroll(0, scrollPosition);

            setTimeout(() => {
                document.body.removeAttribute('data-body-scroll-fix');
            }, 500)
        }
    }
};

window.addEventListener('DOMContentLoaded', mainNavInit);
