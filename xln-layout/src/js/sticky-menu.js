window.waypoint = require('waypoints/lib/noframework.waypoints');

const stickyMenuInit = () => {
    const mainHeader = document.querySelector('.xln-header');
    const mainNav = document.querySelector('.main-nav');
    const mainNavWr = document.querySelector('.main-nav__wr');
    const waypointOffset = 0;

    if (mainNavWr) {

        // start sticky
        const waypoint = new Waypoint({
            element: mainHeader,
            handler: function (direction) {
                if (direction === 'down') {
                    mainNav.style.height = `${mainNavWr.offsetHeight}px`;
                    mainNavWr.classList.add('main-nav__wr--start-sticky');
                    mainNavWr.classList.remove('main-nav__wr--end-sticky');
                }
            },
            offset: function() {
                return -(this.element.clientHeight + waypointOffset);
            }
        });

        // end sticky
        const waypointMainNav = new Waypoint({
            element: mainNav,
            handler: function (direction) {
                if (direction === 'up') {
                    mainNav.style.height = 'auto';
                    mainNavWr.classList.remove('main-nav__wr--start-sticky');
                }
            },
            offset: -1,
        });

        let scrollPos = 0;
        window.addEventListener('scroll', () => {
            if ((document.body.getBoundingClientRect()).top > scrollPos) {
                // SCROLL UP
                if (mainNavWr.classList.contains('main-nav__wr--start-sticky')) {
                    mainNavWr.classList.add('main-nav__wr--show');
                }
                mainNavWr.classList.remove('main-nav__wr--hide');
            } else {
                // SCROLL DOWN
                if ( !document.body.hasAttribute('data-body-scroll-fix') ) {
                    mainNavWr.classList.remove('main-nav__wr--show');

                    if (mainNavWr.classList.contains('main-nav__wr--start-sticky')) {
                        mainNavWr.classList.add('main-nav__wr--hide');
                    }
                }
            }

            scrollPos = (document.body.getBoundingClientRect()).top;
        });
    }
};

window.addEventListener('DOMContentLoaded', stickyMenuInit);
