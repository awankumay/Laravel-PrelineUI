// Debug Responsive Design - JavaScript logging for testing
// This file will help us validate responsive behavior in the browser console

// Function to log current viewport size and breakpoint
function logViewportInfo() {
    const width = window.innerWidth;
    const height = window.innerHeight;
    let breakpoint = '';

    if (width <= 639) {
        breakpoint = 'Mobile (max-width: 639px)';
    } else if (width >= 640 && width <= 767) {
        breakpoint = 'Small Tablet (640px - 767px)';
    } else if (width >= 768 && width <= 1023) {
        breakpoint = 'Tablet (768px - 1023px)';
    } else if (width >= 1024 && width <= 1279) {
        breakpoint = 'Small Desktop (1024px - 1279px)';
    } else {
        breakpoint = 'Desktop (min-width: 1280px)';
    }

    console.log(`%c📱 Viewport Info:`, 'color: #2196F3; font-weight: bold;');
    console.log(`%cWidth: ${width}px`, 'color: #4CAF50;');
    console.log(`%cHeight: ${height}px`, 'color: #4CAF50;');
    console.log(`%cBreakpoint: ${breakpoint}`, 'color: #FF9800; font-weight: bold;');
    console.log('----------------------------------------');
}

// Log viewport info on page load
document.addEventListener('DOMContentLoaded', function() {
    console.log('%c🔍 Responsive Debug Tool Active', 'color: #F44336; font-size: 16px; font-weight: bold;');
    console.log('Resize your browser window to see breakpoint changes');
    logViewportInfo();
});

// Log viewport info on window resize
let resizeTimer;
window.addEventListener('resize', function() {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function() {
        logViewportInfo();
    }, 250);
});

// Function to test specific device sizes
function testDeviceSize(deviceName, width, height) {
    console.log(`%c🧪 Testing ${deviceName} (${width}x${height})`, 'color: #9C27B0; font-weight: bold;');

    // Create a temporary div to test styles
    const testDiv = document.createElement('div');
    testDiv.style.width = width + 'px';
    testDiv.style.height = height + 'px';
    testDiv.style.position = 'absolute';
    testDiv.style.top = '-9999px';
    testDiv.style.left = '-9999px';
    testDiv.style.visibility = 'hidden';

    document.body.appendChild(testDiv);

    // Test responsive classes
    const responsiveClasses = [
        'hidden sm:block md:block lg:block xl:block',
        'block sm:hidden md:hidden lg:hidden xl:hidden',
        'grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4',
        'text-sm sm:text-base md:text-lg lg:text-xl'
    ];

    console.log(`%cTesting responsive classes for ${deviceName}:`, 'color: #607D8B;');

    responsiveClasses.forEach(className => {
        testDiv.className = className;
        const computedStyle = window.getComputedStyle(testDiv);
        console.log(`%cClass: ${className}`, 'color: #795548;');
        console.log(`Display: ${computedStyle.display}`);
        console.log(`Grid Template Columns: ${computedStyle.gridTemplateColumns}`);
        console.log(`Font Size: ${computedStyle.fontSize}`);
    });

    document.body.removeChild(testDiv);
}

// Make test function available globally
window.testDeviceSize = testDeviceSize;

// Predefined device tests
window.testCommonDevices = function() {
    console.log('%c📱 Testing Common Device Sizes', 'color: #E91E63; font-size: 16px; font-weight: bold;');

    testDeviceSize('iPhone SE', 375, 667);
    testDeviceSize('iPhone 12', 390, 844);
    testDeviceSize('Samsung Galaxy S21', 384, 854);
    testDeviceSize('iPad', 768, 1024);
    testDeviceSize('iPad Pro', 1024, 1366);
    testDeviceSize('Small Laptop', 1280, 800);
    testDeviceSize('Desktop', 1920, 1080);
};

// Log Tailwind's default breakpoints
console.log('%c📋 Tailwind CSS Default Breakpoints:', 'color: #3F51B5; font-weight: bold;');
console.log('sm: 640px');
console.log('md: 768px');
console.log('lg: 1024px');
console.log('xl: 1280px');
console.log('2xl: 1536px');
