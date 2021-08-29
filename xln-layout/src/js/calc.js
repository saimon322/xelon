const calcInit = () => {
    const calcEl = document.querySelector('.calc');
    const activeClass = 'xln-active';

    if (calcEl) {
        class Servers {
            constructor(calcEl) {
                this.el = calcEl.querySelector('.calc-servers');
                this.perHour = 0;
                this.perMonth = 0;
                this.counter = 0;
            }
            total() {
                this.perHour = this.servers.perHour + 
                               this.services.perHour + 
                               this.wans.perHour;
                this.perMonth = this.servers.perMonth + 
                                this.services.perMonth + 
                                this.wans.perMonth;
            }
        }

        class Server {
            constructor(el) {
                this.el = el;
                this.perHour = 0;
                this.perMonth = 0;
            }
        }

        class Param {
            constructor(el) {
                this.el = el;
                this.perHour = 0;
                this.perMonth = 0;
            }
        }
        
        class Calc {
            constructor(calcEl, servers) {
                this.el = calcEl;
                this.servers = servers;
                this.perHour = 0;
                this.perMonth = 0;
                this.listeners();
            }
            listeners() {
                console.log('listeners');
                const inputEls = this.el.querySelectorAll('input, select');
                const calcThis = this;
                inputEls.forEach(function(inputEl){
                    inputEl.addEventListener('change', calcThis.update());
                })
            }
            update() {
                console.log('update');
            }
            total() {
                this.perHour = this.servers.perHour + 
                               this.services.perHour + 
                               this.wans.perHour;
                this.perMonth = this.servers.perMonth + 
                                this.services.perMonth + 
                                this.wans.perMonth;
            }
        }

        const servers  = new Servers(calcEl);
        const calc     = new Calc(calcEl, servers);

        // Section toggler
        const sectionTogglers = document.querySelectorAll('.calc-section__toggler');
        sectionTogglers && sectionTogglers.forEach(function(toggler) {
            toggler.addEventListener('click', () => {
                toggler.classList.toggle(activeClass);
                const parent = toggler.closest('.calc-section');
                const content = parent.querySelector('.calc-section__content');
                jQuery(content).stop().slideToggle();
            })
        })
        
        // Item toggler
        const itemTogglers = document.querySelectorAll('.calc-item__toggler');
        itemTogglers && itemTogglers.forEach(function(toggler) {
            toggler.addEventListener('click', () => {
                const parent = toggler.closest('.calc-item');
                parent.classList.toggle('calc-item--disabled');
            })
        })

        // Select
        const selects = document.querySelectorAll('.calc-select');
        selects && selects.forEach(function(select) {
            const items = select.querySelectorAll('.calc-select__item');
            const current = select.querySelector('.calc-select__current');
            current.innerHTML = items[0].innerHTML;
            setDataAttributes(items[0], current);

            select.addEventListener('mouseover', () => {
                select.classList.add(activeClass);
            })
            select.addEventListener('mouseout', () => {
                select.classList.remove(activeClass);
            })
            
            items && items.forEach(function(item) {
                item.addEventListener('click', () => {
                    current.innerHTML = item.innerHTML;
                    setDataAttributes(item, current);
                    select.classList.remove(activeClass);
                })
            })
        })
    }
}

function setDataAttributes(elFrom, elTo) {
    const re_dataAttr = /^data\-(.+)$/;

    elFrom.attributes.forEach(function(attr) {
        if (re_dataAttr.test(attr.nodeName)) {
            const key = attr.nodeName.match(re_dataAttr)[1];
            elTo.setAttribute(key, attr.nodeValue)
        }
    });
}

window.addEventListener('DOMContentLoaded', calcInit);