document.addEventListener('DOMContentLoaded', function() {
    // Inisialisasi ScrollReveal dengan konfigurasi global
    const sr = ScrollReveal({
        reset: false,
        viewportOffset: {
            top: 50,
            right: 0,
            bottom: 50,
            left: 0
        }
    });

    // Fungsi untuk menandai elemen yang sudah di-reveal
    function markAsRevealed(el) {
        el.classList.add('revealed');
    }

    // Konfigurasi untuk berbagai jenis elemen
    const revealConfigs = [
        {
            selector: '.scroll-reveal-item',
            config: {
                delay: 200,
                distance: '20px',
                origin: 'bottom',
                duration: 800,
                easing: 'ease-out',
                beforeReveal: markAsRevealed
            }
        },
        {
            selector: '.scroll-reveal-hero',
            config: {
                delay: 300,
                distance: '40px',
                origin: 'bottom',
                duration: 1000,
                easing: 'ease-out',
                beforeReveal: markAsRevealed
            }
        },
        {
            selector: '.scroll-reveal-tab',
            config: {
                delay: 200,
                distance: '20px',
                origin: 'bottom',
                duration: 800,
                easing: 'ease-out',
                interval: 100,
                beforeReveal: markAsRevealed
            }
        },
        {
            selector: '.scroll-reveal-card',
            config: {
                delay: 200,
                distance: '30px',
                origin: 'bottom',
                duration: 800,
                easing: 'ease-out',
                interval: 150,
                beforeReveal: markAsRevealed
            }
        },
        {
            selector: '.scroll-reveal-tech',
            config: {
                delay: 100,
                distance: '20px',
                origin: 'bottom',
                duration: 600,
                easing: 'ease-out',
                interval: 50,
                beforeReveal: markAsRevealed
            }
        },
        {
            selector: '.scroll-reveal-section',
            config: {
                delay: 200,
                distance: '40px',
                origin: 'bottom',
                duration: 800,
                easing: 'ease-out',
                beforeReveal: markAsRevealed
            }
        },
        {
            selector: '.scroll-reveal-row',
            config: {
                delay: 200,
                distance: '20px',
                origin: 'bottom',
                duration: 800,
                easing: 'ease-out',
                interval: 100,
                beforeReveal: markAsRevealed
            }
        },
        {
            selector: '.scroll-reveal-content',
            config: {
                delay: 300,
                distance: '30px',
                origin: 'bottom',
                duration: 800,
                easing: 'ease-out',
                beforeReveal: markAsRevealed
            }
        }
    ];

    // Terapkan konfigurasi untuk semua selector
    revealConfigs.forEach(item => {
        sr.reveal(item.selector, item.config);
    });

    // Untuk SPA (Single Page Apps)
    if (typeof history !== 'undefined') {
        const handleNavigation = () => {
            // Hancurkan instance lama dan buat yang baru
            sr.destroy();
            revealConfigs.forEach(item => {
                sr.reveal(item.selector, item.config);
            });
        };

        // Listen untuk event navigasi (SPA)
        window.addEventListener('popstate', handleNavigation);
        
        // Jika menggunakan router JavaScript
        if (typeof router !== 'undefined') {
            router.afterEach(handleNavigation);
        }
    }
});