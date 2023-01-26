class FilterByStudent {
    constructor(checkbox, input) {
        this.checkbox = document.querySelector(checkbox);
        this.input = document.querySelector(input);
    }
    
    toggleInput(event) {
        if (this.input.getAttribute('disabled') != null) {
            this.input.removeAttribute('disabled');
        } else {
            this.input.setAttribute('disabled', '');
        }
    }
    
    addEvent() {
        this.checkbox.addEventListener('click', this.toggleInput);
    }
    
    bindEvent() {
        this.toggleInput = this.toggleInput.bind(this);
    }
    
    init() {
        this.bindEvent();
        this.addEvent();
    }
}

const filter = new FilterByStudent('[data-filter="checkbox"]', '[data-filter="input"]');
filter.init();