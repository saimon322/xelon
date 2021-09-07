const { isArray } = require("jquery");

const calcInit = () => {
    const calcEl = document.querySelector('.calc');
    const activeClass = 'xln-active';

    if (calcEl) {
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
                calc.update();
            }
        })

        // Counter
        const inputs = calcEl.querySelectorAll('.calc-counter__input');
        inputsInit(inputs);
        function inputsInit(inputs) {
            inputs.forEach(function(input) {
                input.addEventListener('change', function(){
                    const val = input.value;
                    const min = input.getAttribute('min');
                    const max = input.getAttribute('max');
                    input.value = Math.max(Math.min(val, max), min);
                    calc.update();
                })
            })
        }
        calcEl.addEventListener('click', function(e){
            if(e.target && e.target.classList.contains('calc-counter__button')){
                const button = e.target;
                const input = button.parentElement.querySelector('.calc-counter__input');
                if (button.classList.contains('calc-minus')) {
                    input.stepDown();
                } else if (button.classList.contains('calc-plus')) {
                    input.stepUp();
                }
                calc.update();
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

        function setDataAttributes(elFrom, elTo) {
            const re_dataAttr = /^data\-(.+)$/;
            
            [...elFrom.attributes].forEach(function(attr) {
                if (re_dataAttr.test(attr.nodeName)) {
                    const key = attr.nodeName.match(re_dataAttr)[0];
                    elTo.setAttribute(key, attr.nodeValue)
                }
            });
        }

        
        class Param {
            constructor(el) {
                this.el = el;
                this.type = el.getAttribute('data-type');
                this.perHourVal = parseFloat(el.getAttribute('data-hour'));
                this.perMonthVal = parseFloat(el.getAttribute('data-month'));
                this.input = el.querySelector('.calc-counter__input');
            }
            total(type) {
                this.hidden = this.type != type && this.type != 'both';
                this.inactive = this.el.classList.contains('calc-item--disabled');
                if (this.hidden) {
                    this.el.classList.add('calc-item--hidden');
                } else {
                    this.el.classList.remove('calc-item--hidden');
                }
                if (!this.inactive && !this.hidden) {
                    this.count = parseInt(this.input.value);
                    this.perHour = this.perHourVal * this.count;
                    this.perMonth = this.perMonthVal * this.count;
                }
            }
        }

        class Server {
            constructor(el, index) {
                this.el = el;
                this.items = [];
                this.perHourEl = this.el.querySelector('.calc-block__total .calc-total-hour');
                this.perMonthEl = this.el.querySelector('.calc-block__total .calc-total-month');
                this.typeEl = this.el.querySelector('.calc-select__current');
                this.indexEl = this.el.querySelector('.calc-block__title span');
                this.indexEl.textContent = index;
                this.init();
            }
            init() {
                const self = this;
                const itemEls = this.el.querySelectorAll('.calc-item');
                itemEls.forEach(function(item){
                    if (item.querySelector('.calc-counter')) {
                        self.items.push(new Param(item));
                    }
                })
            }
            updateIndex(index) {
                this.indexEl.textContent = index;
            }
            total() {
                const self = this;
                this.type = this.typeEl.getAttribute('data-type');
                this.extraPerHour = parseFloat(this.typeEl.getAttribute('data-hour'));
                this.extraPerMonth = parseFloat(this.typeEl.getAttribute('data-month'));
                this.perHour = 0;
                this.perMonth = 0;
                this.items.forEach(function(item){
                    item.total(self.type);
                    if (!item.inactive && !item.hidden) {
                        self.perHour += item.perHour;
                        self.perMonth += item.perMonth;
                    }
                })
                this.perHour += this.extraPerHour;
                this.perMonth += this.extraPerMonth;
                this.perHour = parseFloat(this.perHour.toFixed(2));
                this.perMonth = parseFloat(this.perMonth.toFixed(2));
                this.perHourEl.innerHTML = this.perHour;
                this.perMonthEl.innerHTML = this.perMonth;
            }
        }

        class Servers {
            constructor(calcEl) {
                this.el = calcEl.querySelector('.calc-servers');
                this.containerEl = this.el.querySelector('.calc-section__content');
                this.totalEls = this.el.querySelectorAll('.calc-section__total');
                this.counterEl = this.el.querySelector('.calc-servers-counter');
                this.items = [];
                this.init();
            }
            init() {
                const self = this;
                this.itemEl = this.el.querySelector('.calc-server');
                this.items.push(new Server(this.itemEl, 1));
                this.itemEl = this.itemEl.cloneNode(true);
                this.el.addEventListener('click', function(e){
                    if(e.target && e.target.classList.contains('calc-block__button--add')){
                        self.addItem();
                    } else if(e.target && e.target.classList.contains('calc-block__button--remove')){
                        self.removeItem(e.target);
                    }
                });
                this.counter();
            }
            addItem() {
                const clone = this.itemEl.cloneNode(true);
                this.containerEl.appendChild(clone);
                const itemsLength = this.items.length + 1;
                this.items.push(new Server(clone, itemsLength));
                const selects = clone.querySelectorAll('.calc-select');
                selectsInit(selects);
                const inputs = clone.querySelectorAll('.calc-counter__input');
                inputsInit(inputs);
                this.counter();
                calc.update();
            }
            removeItem(item) {
                const server = item.closest('.calc-server');
                const index = [...server.parentNode.children].indexOf(server);
                this.items.splice(index, 1);
                server.remove();
                this.items.forEach(function(item, index) {
                    item.updateIndex(index + 1);
                });
                this.counter();
                calc.update();
            }
            counter() {               
                this.counterEl.textContent = this.items.length;
            }
            total() {
                const self = this;
                this.perHour = 0;
                this.perMonth = 0;
                this.items.forEach(function(item){
                    item.total();
                    self.perHour += item.perHour;
                    self.perMonth += item.perMonth;
                })
                this.totalEls.forEach(function(totalEl){
                    const perHourEl = totalEl.querySelector('.calc-total-hour');
                    const perMonthEl = totalEl.querySelector('.calc-total-month');
                    perHourEl.innerHTML = self.perHour.toFixed(2);
                    perMonthEl.innerHTML = self.perMonth.toFixed(2);
                })
            }
        }
        
        class Service {
            constructor(el) {
                this.el = el;
                this.item = this.el.querySelector('.calc-item');
                this.perHourEl = this.el.querySelector('.calc-block__total .calc-total-hour');
                this.perMonthEl = this.el.querySelector('.calc-block__total .calc-total-month');
                this.perHourVal = parseFloat(this.item.getAttribute('data-hour'));
                this.perMonthVal = parseFloat(this.item.getAttribute('data-month'));
                this.input = this.item.querySelector('.calc-counter__input');
            }
            total() {
                this.count = parseInt(this.input.value);
                this.perHour = this.perHourVal * this.count;
                this.perMonth = this.perMonthVal * this.count;
                this.perHour = parseFloat(this.perHour.toFixed(2));
                this.perMonth = parseFloat(this.perMonth.toFixed(2));
                this.perHourEl.innerHTML = this.perHour;
                this.perMonthEl.innerHTML = this.perMonth;
            }
        }

        class Services {
            constructor(el) {
                this.el = el;
                this.items = [];
                this.init();
            }
            init() {
                const self = this;
                const itemEls = this.el.querySelectorAll('.calc-service');
                itemEls.forEach(function(itemEl){
                    self.items.push(new Service(itemEl));
                })
            }
            total() {
                const self = this;
                this.perHour = 0;
                this.perMonth = 0;
                this.items.forEach(function(item){
                    item.total();
                    self.perHour += item.perHour;
                    self.perMonth += item.perMonth;
                })
            }
        }
        
        class Wan {
            constructor(el, index) {
                this.el = el;
                this.item = this.el.querySelector('.calc-select__current');
                this.perHourEl = this.el.querySelector('.calc-block__total .calc-total-hour');
                this.perMonthEl = this.el.querySelector('.calc-block__total .calc-total-month');
                this.indexEl = this.el.querySelector('.calc-block__title span');
                this.indexEl.textContent = index;
                this.input = this.item.querySelector('.calc-counter__input');
            }
            updateIndex(index) {
                this.indexEl.textContent = index;
            }
            total() {
                this.perHour = parseFloat(this.item.getAttribute('data-hour'));
                this.perMonth = parseFloat(this.item.getAttribute('data-month'));
                this.perHour = parseFloat(this.perHour.toFixed(2));
                this.perMonth = parseFloat(this.perMonth.toFixed(2));
                this.perHourEl.innerHTML = this.perHour;
                this.perMonthEl.innerHTML = this.perMonth;
            }
        }

        class Wans {
            constructor(el) {
                this.el = el;
                this.containerEl = this.el.querySelector('.calc-section__content');
                this.items = [];
                this.init();
            }
            init() {
                const self = this;
                this.itemEl = this.el.querySelector('.calc-wan');
                this.indexStart = [...this.itemEl.parentNode.children].indexOf(this.itemEl);
                this.items.push(new Wan(this.itemEl, 1));
                this.itemEl = this.itemEl.cloneNode(true);
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
                this.containerEl.appendChild(clone);
                const itemsLength = this.items.length + 1;
                this.items.push(new Wan(clone, itemsLength));
                const selects = clone.querySelectorAll('.calc-select');
                selectsInit(selects);
                calc.update();
            }
            removeItem(item) {
                const wan = item.closest('.calc-wan');
                const index = [...wan.parentNode.children].indexOf(wan) - this.indexStart;
                this.items.splice(index, 1);
                wan.remove();
                this.items.forEach(function(item, index) {
                    item.updateIndex(index + 1);
                });
                calc.update();
            }
            total() {
                const self = this;
                this.perHour = 0;
                this.perMonth = 0;
                this.items.forEach(function(item){
                    item.total();
                    self.perHour += item.perHour;
                    self.perMonth += item.perMonth;
                })
            }
        }

        class Networks {
            constructor(calcEl) {
                this.el = calcEl.querySelector('.calc-network');
                this.containerEl = this.el.querySelector('.calc-section__content');
                this.totalEls = this.el.querySelectorAll('.calc-section__total');
                this.services = new Services(this.el);
                this.wans = new Wans(this.el);
                this.perHour = 0;
                this.perMonth = 0;
            }
            total() {
                const self = this;
                this.services.total();
                this.wans.total();
                this.perHour = this.services.perHour
                             + this.wans.perHour;
                this.perMonth = this.services.perMonth
                              + this.wans.perMonth;
                this.totalEls.forEach(function(totalEl){
                    const perHourEl = totalEl.querySelector('.calc-total-hour');
                    const perMonthEl = totalEl.querySelector('.calc-total-month');
                    perHourEl.innerHTML = self.perHour.toFixed(2);
                    perMonthEl.innerHTML = self.perMonth.toFixed(2);
                })
            }
        }
        
        class Calc {
            constructor(calcEl, servers) {
                this.el = calcEl;
                this.perHourEl = this.el.querySelector('.calc-footer__total .calc-total-hour');
                this.perMonthEl = this.el.querySelector('.calc-footer__total .calc-total-month');
                this.init();
            }
            init() {
                this.servers = new Servers(this.el);
                this.networks = new Networks(this.el);
                this.update();
            }
            update() {
                this.total();
            }
            total() {
                this.servers.total();
                this.networks.total();
                this.perHour = this.servers.perHour +
                               this.networks.perHour;
                this.perMonth = this.servers.perMonth + 
                                this.networks.perMonth;
                this.perHourEl.innerHTML = this.perHour.toFixed(2);
                this.perMonthEl.innerHTML = this.perMonth.toFixed(2);
            }
        }

        const calc = new Calc(calcEl);
    }
}

window.addEventListener('DOMContentLoaded', calcInit);