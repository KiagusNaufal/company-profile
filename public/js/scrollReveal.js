document.addEventListener('DOMContentLoaded', function() {
    ScrollReveal().reveal('.scroll-reveal-item', {
        delay: 200,
        distance: '20px',
        origin: 'bottom',
        duration: 800,
        easing: 'ease-out',
        reset: false // Ubah ini menjadi false
    });

    // Hero section specific
    ScrollReveal().reveal('.scroll-reveal-hero', {
        delay: 300,
        distance: '40px',
        origin: 'bottom',
        duration: 1000,
        easing: 'ease-out',
        reset: false // Ubah ini menjadi false
    });

    // Process tabs
    ScrollReveal().reveal('.scroll-reveal-tab', {
        delay: 200,
        distance: '20px',
        origin: 'bottom',
        duration: 800,
        easing: 'ease-out',
        interval: 100,
        reset: false // Ubah ini menjadi false
    });

    // Service cards
    ScrollReveal().reveal('.scroll-reveal-card', {
        delay: 200,
        distance: '30px',
        origin: 'bottom',
        duration: 800,
        easing: 'ease-out',
        interval: 150,
        reset: false // Ubah ini menjadi false
    });

    // Technology items
    ScrollReveal().reveal('.scroll-reveal-tech', {
        delay: 100,
        distance: '20px',
        origin: 'bottom',
        duration: 600,
        easing: 'ease-out',
        interval: 50,
        reset: false // Ubah ini menjadi false
    });

    // Sections
    ScrollReveal().reveal('.scroll-reveal-section', {
        delay: 200,
        distance: '40px',
        origin: 'bottom',
        duration: 800,
        easing: 'ease-out',
        reset: false // Ubah ini menjadi false
    });

    // Rows in tech section
    ScrollReveal().reveal('.scroll-reveal-row', {
        delay: 200,
        distance: '20px',
        origin: 'bottom',
        duration: 800,
        easing: 'ease-out',
        interval: 100,
        reset: false // Ubah ini menjadi false
    });

    // Content in process tabs
    ScrollReveal().reveal('.scroll-reveal-content', {
        delay: 300,
        distance: '30px',
        origin: 'bottom',
        duration: 800,
        easing: 'ease-out',
        reset: false // Ubah ini menjadi false
    });
});