class Toggle {
    constructor(toggleButton, container) {
        this.toggleButton = document.querySelectorAll(toggleButton);
        this.container = document.querySelector(container);
    }
    
    toggleTable({ currentTarget }) {
        const id = currentTarget.getAttribute('data-toggle-idbutton');
        const table = document.querySelector('[data-toggle-id="'+id+'"]');
        currentTarget.classList.toggle('ativo');
        table.classList.toggle('ativo');
        
    }
    
    addEvent() {
        this.toggleButton.forEach(button => {
            button.addEventListener('click', this.toggleTable);
        });
    }
    
    bindEvent() {
        this.toggleTable = this.toggleTable.bind(this);
    }
    
    init() {
        this.bindEvent();
        this.addEvent();
    }
}

if (document.querySelector('[data-toggle="button"]')) {
    const toggle = new Toggle('[data-toggle="button"]', '[data-toggle="table-container"]');
    toggle.init();
}