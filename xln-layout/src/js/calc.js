const { isArray } = require("jquery");

const calcInit = () => {
    const calcEl = document.querySelector('.calc');
    const activeClass = 'xln-active';

    if (calcEl) {
        class Param {
            constructor(el) {
                this.el = el;
                this.perHour = 0;
                this.perMonth = 0;
            }
        }

        class Server {
            constructor(el) {
                this.el = el;
                this.perHour = 0;
                this.perMonth = 0;
            }
        }

        class Servers {
            constructor(calcEl) {
                this.el = calcEl.querySelector('.calc-servers');
                this.container = this.el.querySelector('.calc-section__content');
                this.items = [];
                this.perHour = 0;
                this.perMonth = 0;
                this.counter = 0;
                this.init();
            }
            init() {
                const self = this;
                this.itemEl = this.el.querySelector('.calc-server').cloneNode(true);
                self.items.push(new Server(this.itemEl));
                this.buttons();
            }
            buttons() {
                const self = this;
                this.el.addEventListener('click', function(e){
                    if(e.target && e.target.classList.contains('calc-block__button--add')){
                        self.addItem();
                    } else if(e.target && e.target.classList.contains('calc-block__button--remove')){
                        self.removeItem(e.target);
                    }
                });
            }
            addItem() {
                const clone = this.itemEl.cloneNode(true);
                this.container.appendChild(clone);
                this.items.push(new Server(clone));
                const selects = clone.querySelectorAll('.calc-select');
                selectsInit(selects);
            }
            removeItem(item) {
                const server = item.closest('.calc-server');
                const index = [...server.parentNode.children].indexOf(server);
                this.items.splice(index, 1);
                server.remove();
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
        
        class Calc {
            constructor(calcEl, servers) {
                this.el = calcEl;
                this.servers = servers;
                this.perHour = 0;
                this.perMonth = 0;
                this.init();
            }
            init() {
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
        calcEl.addEventListener('click', function(e){
            if(e.target && e.target.classList.contains('calc-section__toggler')){
                const toggler = e.target;
                toggler.classList.toggle(activeClass);
                const parent = toggler.closest('.calc-section');
                const content = parent.querySelector('.calc-section__content');
                jQuery(content).stop().slideToggle();
            }
        })
        
        // Item toggler
        calcEl.addEventListener('click', function(e){
            if(e.target && e.target.classList.contains('calc-item__toggler')){
                const toggler = e.target;
                const parent = toggler.closest('.calc-item');
                parent.classList.toggle('calc-item--disabled');
            }
        })

        // Counter     
        calcEl.addEventListener('input', function(e){
            if(e.target && e.target.classList.contains('calc-input')){
                calc.update();
            }
        });
        calcEl.addEventListener('click', function(e){
            if(e.target && e.target.classList.contains('calc-counter__button')){
                const button = e.target;
                const input = button.parentElement.querySelector('.calc-counter__input');
                if (button.classList.contains('calc-minus')) {
                    input.stepDown();
                } else if (button.classList.contains('calc-plus')) {
                    input.stepUp();
                }
            }
        })

        // Select
        const selects = calcEl.querySelectorAll('.calc-select');
        selectsInit(selects);

        function selectsInit(selects) {
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
                        calc.update();
                    })
                })
            })
        }
    }
}

function setDataAttributes(elFrom, elTo) {
    const re_dataAttr = /^data\-(.+)$/;
    
    [...elFrom.attributes].forEach(function(attr) {
        if (re_dataAttr.test(attr.nodeName)) {
            const key = attr.nodeName.match(re_dataAttr)[1];
            elTo.setAttribute(key, attr.nodeValue)
        }
    });
}

window.addEventListener('DOMContentLoaded', calcInit);