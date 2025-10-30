import 'preline'

/**
 * Dark/Light Mode Theme Switcher
 *
 * This module handles theme switching between light and dark modes.
 * Features:
 * - Persists user preference in localStorage
 * - Supports system preference detection
 * - Updates HTML class for Tailwind dark mode
 * - Shows/hides appropriate toggle buttons
 */

window.HSThemeAppearance = {
    init() {
        const defaultTheme = 'light';
        let currentTheme = defaultTheme;

        /**
         * Set theme and update UI
         * @param {string} theme - 'light' or 'dark'
         */
        const setTheme = (theme) => {
            const html = document.documentElement;
            currentTheme = theme;

            if (theme === 'dark') {
                html.classList.add('dark');
                html.classList.remove('light');
                localStorage.setItem('hs_theme', 'dark');
            } else {
                html.classList.add('light');
                html.classList.remove('dark');
                localStorage.setItem('hs_theme', 'light');
            }

            updateToggleButtons(theme);
        };

        /**
         * Update toggle button visibility based on current theme
         * @param {string} theme - Current active theme
         */
        const updateToggleButtons = (theme) => {
            // Select all theme toggle buttons
            const lightButtons = document.querySelectorAll('[data-hs-theme-click-value="light"]');
            const darkButtons = document.querySelectorAll('[data-hs-theme-click-value="dark"]');

            if (theme === 'dark') {
                // Show light mode button (to switch back to light)
                lightButtons.forEach(btn => {
                    btn.classList.remove('hidden');
                    btn.style.display = 'flex';
                });
                // Hide dark mode button
                darkButtons.forEach(btn => {
                    btn.classList.add('hidden');
                    btn.style.display = 'none';
                });
            } else {
                // Show dark mode button (to switch to dark)
                darkButtons.forEach(btn => {
                    btn.classList.remove('hidden');
                    btn.style.display = 'flex';
                });
                // Hide light mode button
                lightButtons.forEach(btn => {
                    btn.classList.add('hidden');
                    btn.style.display = 'none';
                });
            }
        };

        /**
         * Get system preferred color scheme
         * @returns {string} 'dark' or 'light'
         */
        const getSystemTheme = () => {
            if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                return 'dark';
            }
            return 'light';
        };

        // Initialize theme on page load
        const savedTheme = localStorage.getItem('hs_theme');
        const initialTheme = savedTheme || getSystemTheme() || defaultTheme;
        setTheme(initialTheme);

        // Listen for system theme changes
        if (window.matchMedia) {
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
                // Only auto-switch if user hasn't manually set a preference
                if (!localStorage.getItem('hs_theme')) {
                    setTheme(e.matches ? 'dark' : 'light');
                }
            });
        }

        // Add event listeners for theme toggle buttons
        document.addEventListener('click', (e) => {
            const button = e.target.closest('[data-hs-theme-click-value]');
            if (button) {
                const themeValue = button.getAttribute('data-hs-theme-click-value');
                if (themeValue && themeValue !== currentTheme) {
                    setTheme(themeValue);
                }
            }
        });

        // Expose methods for external use
        this.setTheme = setTheme;
        this.getTheme = () => currentTheme;
        this.updateToggleButtons = updateToggleButtons;
    }
};

// Initialize when DOM is ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function() {
        window.HSThemeAppearance.init();
    });
} else {
    // DOM is already ready
    window.HSThemeAppearance.init();
}
