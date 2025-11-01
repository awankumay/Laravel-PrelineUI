import 'preline'

// Import debug responsive tool (temporary for testing)
import './debug-responsive.js'

// Navbar scroll effect and mobile menu functionality
document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.getElementById('navbar');

    if (!navbar) return;

    const navbarBrand = navbar.querySelector('.navbar-brand');
    const navbarLinks = navbar.querySelectorAll('.navbar-link');
    const mobileMenuButton = navbar.querySelector('.navbar-burger');
    const mobileMenu = navbar.querySelector('.navbar-menu');

    function handleScroll() {
        const scrolled = window.scrollY > 50;

        if (scrolled) {
            navbar.classList.add('bg-blue-600', 'dark:bg-blue-900', 'shadow-lg');

            if (navbarBrand) navbarBrand.classList.add('text-white');

            navbarLinks.forEach(link => {
                link.classList.add('text-white/90', 'hover:text-white');
            });
        } else {
            navbar.classList.add('bg-blue-600', 'dark:bg-blue-900');
            navbar.classList.remove('bg-blue-600', 'dark:bg-blue-900', 'shadow-lg');

            if (navbarBrand) navbarBrand.classList.add('text-white');

            navbarLinks.forEach(link => {
                link.classList.add('text-white/90', 'hover:text-white');
            });
        }
    }

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    }

    navbar.addEventListener('click', function(e) {
        if (e.target.matches('a[href^="#"]')) {
            e.preventDefault();
            const targetId = e.target.getAttribute('href').slice(1);
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                const offsetTop = targetElement.offsetTop - navbar.offsetHeight;
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });

                // Close mobile menu if open
                if (mobileMenu) {
                    mobileMenu.classList.add('hidden');
                }
            }
        }
    });

    // Initial check
    handleScroll();

    // Listen for scroll events
    window.addEventListener('scroll', handleScroll);
});
