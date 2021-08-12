const initTabs = () => {
    const tabParents = document.querySelectorAll('[data-tab-parent]');
    const activeClass = 'xln-active';

    if (tabParents.length) {
        tabParents.forEach((parent) => {
            const childTabs = parent.querySelectorAll('[data-tab-content]');
            const childSelectors = parent.querySelectorAll('[data-tab-selector]');

            if (childTabs && childSelectors) {
                const showTabs = (content, selectors) => {
                    content && content.classList.add(activeClass);
                    selectors && selectors.forEach((item) => {
                        item.classList.add(activeClass);
                    });
                };

                const hideTabs = () => {
                    childTabs.forEach((item) => {
                        item.classList.remove(activeClass);
                    });

                    childSelectors.forEach((item) => {
                        item.classList.remove(activeClass);
                    });
                };

                const selector = (event) => {
                    const target = event.target;

                    if (target.closest('[data-tab-selector]')) {
                        const targetButton = target.closest(
                            '[data-tab-selector]'
                        );
                        const targetButtonIndex =
                            targetButton.dataset.tabSelector;
                        const targetContent = parent.querySelector(
                            `[data-tab-content="${targetButtonIndex}"]`
                        );
                        const targetSelectors = parent.querySelectorAll(
                            `[data-tab-selector="${targetButtonIndex}"]`
                        );

                        hideTabs();
                        showTabs(targetContent, targetSelectors);
                    }
                };

                childTabs && childTabs[0].classList.add(activeClass);
                childSelectors && childSelectors[0].classList.add(activeClass);

                parent.addEventListener('click', selector);
            }
        });
    }
};

window.addEventListener('DOMContentLoaded', initTabs);
