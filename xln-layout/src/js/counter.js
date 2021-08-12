const initCounters = () => {
    const countersItems = document.querySelectorAll('.xln-offer-stat__number');
    const activeClass = 'xln-active';

    if (countersItems.length) {
        const startCounters = () => {
            countersItems.forEach((item) => {
                item.classList.add(activeClass);
                let span = item.querySelector('span');
                let value = parseInt(span.textContent);
                animateValue(span, 0, value, 3500);
            });
        };

        let countersStarted = false;
        const scrollCounters = () => {
            if (!countersStarted) {
                let countersTop = countersItems[0].offsetTop;
                let scrollTop = window.pageYOffset;
                let winHeight = window.innerHeight;
                if (scrollTop + winHeight > countersTop) {
                    startCounters();
                    countersStarted = true;
                }
            }
        };

        scrollCounters();
        window.addEventListener('scroll', scrollCounters);
    }

    function animateValue(obj, start, end, duration) {
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            obj.innerHTML = Math.floor(progress * (end - start) + start);
            progress < 1 && window.requestAnimationFrame(step);
        };
        window.requestAnimationFrame(step);
    }
};

window.addEventListener('DOMContentLoaded', initCounters);
