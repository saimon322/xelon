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
        sectionTogglers.forEach(function(toggler) {
            toggler.addEventListener('click', () => {
                toggler.classList.toggle(activeClass);
                const parent = toggler.closest('.calc-section');
                const content = parent.querySelector('.calc-section__content');
                jQuery(content).stop().slideToggle();
            })
        })
        
        // Item toggler
        const itemTogglers = document.querySelectorAll('.calc-item__toggler');
        itemTogglers.forEach(function(toggler) {
            toggler.addEventListener('click', () => {
                const parent = toggler.closest('.calc-item');
                parent.classList.toggle('.calc-item--disabled');
            })
        })
    }
}

window.addEventListener('DOMContentLoaded', calcInit);