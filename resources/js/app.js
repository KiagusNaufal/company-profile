import './bootstrap';

// resources/js/app.js

import Alpine from 'alpinejs';

// Alpine Magic Helper untuk smooth scroll
document.addEventListener('alpine:init', () => {
    Alpine.magic('scroll', (el) => (selector) => {
        const target = document.querySelector(selector);
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

window.Alpine = Alpine;
Alpine.start();
