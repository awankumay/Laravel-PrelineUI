import 'preline'

// Theme switching functionality
window.HSThemeAppearance = {
    init() {
        const defaultTheme = 'light'; // Set default to light

        const setTheme = (theme) => {
            const html = document.documentElement;

            if (theme === 'dark') {
                html.classList.add('dark');
                html.classList.remove('light');
                localStorage.setItem('hs_theme', 'dark');
            } else {
                html.classList.add('light');
                html.classList.remove('dark');
                localStorage.setItem('hs_theme', 'light');
            }

            this.updateToggleButtons(theme);
        };

        const updateToggleButtons = (theme) => {
            const lightButton = document.querySelector('.hs-theme-switch-light');
            const darkButton = document.querySelector('.hs-theme-switch-dark');

            if (lightButton && darkButton) {
                if (theme === 'dark') {
                    lightButton.style.display = 'flex';
                    darkButton.style.display = 'none';
                } else {
                    lightButton.style.display = 'none';
                    darkButton.style.display = 'flex';
                }
            }
        };

        // Initialize theme on page load
        const savedTheme = localStorage.getItem('hs_theme') || defaultTheme;
        setTheme(savedTheme);

        // Add event listeners for theme toggle buttons
        document.addEventListener('click', (e) => {
            const themeValue = e.target.closest('[data-hs-theme-click-value]')?.getAttribute('data-hs-theme-click-value');
            if (themeValue) {
                setTheme(themeValue);
            }
        });

        // Expose methods
        this.setTheme = setTheme;
        this.updateToggleButtons = updateToggleButtons;
    }
};

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    window.HSThemeAppearance.init();
});
