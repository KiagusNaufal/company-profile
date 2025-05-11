document.addEventListener("DOMContentLoaded", function() {
    // Initialize ScrollReveal with better defaults
    const sr = ScrollReveal({
        reset: false,
        viewportOffset: {
            top: 50,
            right: 0,
            bottom: 100,  // Trigger animations earlier
            left: 0
        },
        opacity: 0,      // Explicit initial state
        viewFactor: 0.2, // Percentage of element visible before triggering
        mobile: true     // Ensure works on mobile
    });

    // Function to handle revealed elements
    function handleReveal(el) {
        // Force show the element
        el.style.opacity = 1;
        el.style.visibility = 'visible';
        
        // Special handling for images
        const images = el.querySelectorAll('img');
        images.forEach(img => {
            img.style.opacity = 1;
            img.style.visibility = 'visible';
            img.style.transform = 'translateZ(0)'; // Enable GPU acceleration
        });
        
        // Add revealed class
        el.classList.add('revealed');
        
        // Force reflow to ensure animations trigger
        void el.offsetHeight;
    }

    // Configuration for all reveal types
    const revealConfigs = [
        {
            selector: '.scroll-reveal-item',
            config: {
                delay: 200,
                distance: '20px',
                origin: 'bottom',
                duration: 800,
                easing: 'cubic-bezier(0.25, 0.1, 0.25, 1)',
                beforeReveal: handleReveal
            }
        },
        {
            selector: '.scroll-reveal-hero',
            config: {
                delay: 300,
                distance: '40px',
                origin: 'bottom',
                duration: 1000,
                easing: 'cubic-bezier(0.25, 0.1, 0.25, 1)',
                beforeReveal: handleReveal
            }
        },
        {
            selector: '.scroll-reveal-tab',
            config: {
                delay: 200,
                distance: '20px',
                origin: 'bottom',
                duration: 800,
                easing: 'cubic-bezier(0.25, 0.1, 0.25, 1)',
                interval: 100,
                beforeReveal: handleReveal
            }
        },
        {
            selector: '.scroll-reveal-card',
            config: {
                delay: 200,
                distance: '30px',
                origin: 'bottom',
                duration: 800,
                easing: 'cubic-bezier(0.25, 0.1, 0.25, 1)',
                interval: 150,
                beforeReveal: handleReveal
            }
        },
        {
            selector: '.scroll-reveal-tech',
            config: {
                delay: 100,
                distance: '10px',
                origin: 'bottom',
                duration: 600,
                easing: 'cubic-bezier(0.25, 0.1, 0.25, 1)',
                interval: 50,
                beforeReveal: function(el) {
                    handleReveal(el);
                    // Additional tech-item specific handling
                    const icons = el.querySelectorAll('img, svg');
                    icons.forEach(icon => {
                        icon.style.opacity = 1;
                        icon.style.visibility = 'visible';
                    });
                },
                afterReveal: function(el) {
                    el.style.opacity = 1;
                    el.style.visibility = 'visible';
                }
            }
        },
        {
            selector: '.scroll-reveal-section',
            config: {
                delay: 200,
                distance: '40px',
                origin: 'bottom',
                duration: 800,
                easing: 'cubic-bezier(0.25, 0.1, 0.25, 1)',
                beforeReveal: handleReveal
            }
        },
        {
            selector: '.scroll-reveal-row',
            config: {
                delay: 200,
                distance: '20px',
                origin: 'bottom',
                duration: 800,
                easing: 'cubic-bezier(0.25, 0.1, 0.25, 1)',
                interval: 100,
                beforeReveal: handleReveal
            }
        },
        {
            selector: '.scroll-reveal-content',
            config: {
                delay: 300,
                distance: '30px',
                origin: 'bottom',
                duration: 800,
                easing: 'cubic-bezier(0.25, 0.1, 0.25, 1)',
                beforeReveal: handleReveal
            }
        }
    ];

    // Apply configurations with small timeout to ensure DOM readiness
    setTimeout(() => {
        revealConfigs.forEach(item => {
            sr.reveal(item.selector, item.config);
        });
    }, 50);

    // SPA Navigation Handling
    if (typeof history !== 'undefined') {
        const handleNavigation = () => {
            // Clean up and reinitialize for SPA
            sr.destroy();
            setTimeout(() => {
                revealConfigs.forEach(item => {
                    sr.reveal(item.selector, item.config);
                });
            }, 100);
        };

        window.addEventListener('popstate', handleNavigation);
        
        if (typeof router !== 'undefined') {
            router.afterEach(handleNavigation);
        }
    }

    // Fallback for images that might load after reveal
    document.querySelectorAll('[class*="scroll-reveal-"] img').forEach(img => {
        img.onload = function() {
            this.style.opacity = 1;
            this.style.visibility = 'visible';
        };
        img.onerror = function() {
            this.style.display = 'none';
            const fallback = document.createElement('div');
            fallback.className = 'image-fallback';
            this.parentNode.insertBefore(fallback, this);
        };
    });
});