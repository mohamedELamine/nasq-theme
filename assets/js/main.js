/**
 * Main JavaScript
 *
 * @package Nasq
 */

(function() {
    'use strict';

    const Nasq = {
        /**
         * Initialize all functionality
         */
        init: function() {
            this.mobileMenu();
            this.smoothScroll();
            this.lazyLoadImages();
            this.themeCardHover();
        },

        /**
         * Mobile menu functionality
         */
        mobileMenu: function() {
            const toggle = document.querySelector('.mobile-menu-toggle');
            const menu = document.querySelector('.mobile-navigation');

            if (!toggle || !menu) return;

            toggle.addEventListener('click', function() {
                menu.classList.toggle('active');
                toggle.classList.toggle('active');

                // ARIA attributes
                const expanded = menu.classList.contains('active');
                toggle.setAttribute('aria-expanded', expanded);
                menu.setAttribute('aria-hidden', !expanded);
            });

            // Close menu when clicking outside
            document.addEventListener('click', function(e) {
                if (!menu.contains(e.target) && !toggle.contains(e.target)) {
                    menu.classList.remove('active');
                    toggle.classList.remove('active');
                    toggle.setAttribute('aria-expanded', 'false');
                    menu.setAttribute('aria-hidden', 'true');
                }
            });

            // Close menu on resize
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768) {
                    menu.classList.remove('active');
                    toggle.classList.remove('active');
                }
            });
        },

        /**
         * Smooth scroll for anchor links
         */
        smoothScroll: function() {
            const links = document.querySelectorAll('a[href^="#"]');

            links.forEach(link => {
                link.addEventListener('click', function(e) {
                    const href = this.getAttribute('href');
                    if (href === '#') return;

                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        },

        /**
         * Lazy load images
         */
        lazyLoadImages: function() {
            if ('loading' in HTMLImageElement.prototype) {
                const images = document.querySelectorAll('img[loading="lazy"]');
                images.forEach(img => {
                    img.src = img.dataset.src;
                });
            }
        },

        /**
         * Theme card hover effects
         */
        themeCardHover: function() {
            const cards = document.querySelectorAll('.theme-card');

            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-4px)';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        }
    };

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            Nasq.init();
        });
    } else {
        Nasq.init();
    }

    // Export to window for external access
    window.Nasq = Nasq;

})();
