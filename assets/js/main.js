/* assets/js/main.js */

document.addEventListener('DOMContentLoaded', function() {
    const searchTrigger = document.getElementById('search-trigger');
    const searchOverlay = document.getElementById('search-overlay');
    const searchClose = document.getElementById('search-close');
    const searchInput = document.querySelector('.search-overlay__input');

    if (searchTrigger && searchOverlay) {
        // Open search overlay
        searchTrigger.addEventListener('click', function(e) {
            e.preventDefault();
            searchOverlay.classList.add('active');
            document.body.style.overflow = 'hidden'; // Prevent scrolling
            
            // Focus input after animation
            setTimeout(() => {
                searchInput.focus();
            }, 400);
        });

        // Close search overlay
        const closeSearch = function() {
            searchOverlay.classList.remove('active');
            document.body.style.overflow = ''; // Restore scrolling
            searchInput.value = ''; // Clear input
        };

        if (searchClose) {
            searchClose.addEventListener('click', closeSearch);
        }

        // Close on escape key
        document.addEventListener('keyup', function(e) {
            if (e.key === 'Escape' && searchOverlay.classList.contains('active')) {
                closeSearch();
            }
        });

        // Close on clicking outside the content
        searchOverlay.addEventListener('click', function(e) {
            // If the search-overlay wrapper is clicked (not the form or input)
            if (e.target === searchOverlay || e.target.classList.contains('search-overlay__content')) {
                closeSearch();
            }
        });
    }

    // Mobile Menu Toggle
    const menuTrigger = document.getElementById('menu-trigger');
    const menuContainer = document.querySelector('.header-wrapper__menu');

    if (menuTrigger && menuContainer) {
        menuTrigger.addEventListener('click', function(e) {
            e.preventDefault();
            menuContainer.classList.toggle('active');
            
            // Toggle icon active state if needed
            this.classList.toggle('active');
        });

        // Close menu on click outside
        document.addEventListener('click', function(e) {
            if (!menuContainer.contains(e.target) && !menuTrigger.contains(e.target)) {
                menuContainer.classList.remove('active');
            }
        });

        // Close menu on resize to desktop
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 992) {
                menuContainer.classList.remove('active');
            }
        });
    }
});
