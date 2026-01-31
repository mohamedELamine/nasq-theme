/**
 * Navigation JavaScript
 *
 * @package Nasq
 */

(function() {
    'use strict';

    const NasqNavigation = {
        /**
         * Initialize navigation
         */
        init: function() {
            this.dropdownMenus();
            this.stickyHeader();
        },

        /**
         * Dropdown menu functionality
         */
        dropdownMenus: function() {
            const dropdownItems = document.querySelectorAll('.menu-item-has-children');

            dropdownItems.forEach(item => {
                const link = item.querySelector('a');
                const dropdown = item.querySelector('.sub-menu');

                if (!link || !dropdown) return;

                // Desktop: hover
                item.addEventListener('mouseenter', function() {
                    if (window.innerWidth > 768) {
                        dropdown.classList.add('show');
                    }
                });

                item.addEventListener('mouseleave', function() {
                    dropdown.classList.remove('show');
                });

                // Mobile: click
                link.addEventListener('click', function(e) {
                    if (window.innerWidth <= 768) {
                        e.preventDefault();
                        dropdown.classList.toggle('show');
                        this.setAttribute('aria-expanded', dropdown.classList.contains('show'));
                    }
                });
            });
        },

        /**
         * Sticky header
         */
        stickyHeader: function() {
            const header = document.querySelector('.site-header');
            const headerHeight = header ? header.offsetHeight : 0;
            let lastScroll = 0;
            let ticking = false;

            window.addEventListener('scroll', function() {
                if (!ticking) {
                    window.requestAnimationFrame(function() {
                        handleScroll();
                        ticking = false;
                    });
                    ticking = true;
                }
            });

            function handleScroll() {
                const currentScroll = window.pageYOffset;

                if (currentScroll > headerHeight) {
                    header.classList.add('sticky');

                    // Hide header on scroll down, show on scroll up
                    if (currentScroll > lastScroll && currentScroll > headerHeight * 2) {
                        header.classList.add('hide');
                    } else {
                        header.classList.remove('hide');
                    }
                } else {
                    header.classList.remove('sticky', 'hide');
                }

                lastScroll = currentScroll;
            }
        }
    };

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            NasqNavigation.init();
        });
    } else {
        NasqNavigation.init();
    }

    window.NasqNavigation = NasqNavigation;

})();
