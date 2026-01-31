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

            // Close menu on resize with debouncing
            let resizeTimer;
            window.addEventListener('resize', function() {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(function() {
                    if (window.innerWidth > 768) {
                        menu.classList.remove('active');
                        toggle.classList.remove('active');
                    }
                }, 250);
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
         * Theme card hover effects
         */
        themeCardHover: function() {
            const cards = document.querySelectorAll('.theme-card');

            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.classList.add('hover-active');
                });

                card.addEventListener('mouseleave', function() {
                    this.classList.remove('hover-active');
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
