# Laravel Preline UI Error Pages

This directory contains custom error pages designed with Preline UI components and Tailwind CSS 4.

## Available Error Pages

### HTTP Error Codes

- **401 - Unauthorized**: Lock icon with red gradient, includes sign-in button
- **402 - Payment Required**: Credit card icon with green gradient, includes payment update button
- **403 - Forbidden**: Prohibition icon with red-pink gradient
- **404 - Page Not Found**: Warning triangle icon with blue-purple gradient
- **419 - Page Expired**: Clock icon with amber gradient, includes refresh button
- **429 - Too Many Requests**: Crossed swords icon with purple-pink gradient, includes wait timer
- **500 - Internal Server Error**: Robot/bug icon with gray gradient, includes try again button
- **503 - Service Unavailable**: Loading/sun icon with yellow-orange gradient

## Layout Structure

### Main Layout (`layout.blade.php`)
- Uses Preline UI and Tailwind CSS 4
- Responsive design with mobile-first approach
- Dark mode support
- Includes Vite assets for proper styling

### Minimal Layout (`minimal.blade.php`)
- Clean, simple design
- Interactive buttons with hover effects
- Proper accessibility attributes
- Semantic HTML structure

## Features

### Design Elements
- **Gradient Icons**: Each error has a unique color gradient and relevant icon
- **Responsive Typography**: Scales properly on all device sizes
- **Interactive Buttons**: Hover effects and focus states
- **Dark Mode Support**: Automatic theme adaptation

### User Experience
- **Go Back Button**: Browser history navigation
- **Homepage Link**: Return to main site
- **Specific Actions**: Context-aware buttons (Sign In, Refresh, etc.)
- **Clear Messaging**: User-friendly error descriptions

### Technical Features
- **Preline UI Integration**: Uses official Preline components
- **Tailwind CSS 4**: Modern utility classes
- **Laravel Integration**: Proper asset management with Vite
- **SEO Friendly**: Proper page titles and meta tags

## Testing Error Pages

In local/testing environments, you can test error pages using:

```
/test-error/404
/test-error/500
/test-error/401
etc.
```

## Customization

### Adding New Error Pages
1. Create new blade file in `resources/views/errors/`
2. Extend `errors::layout`
3. Follow the established icon and color pattern
4. Include appropriate action buttons

### Modifying Existing Pages
- Update icon SVGs for different visuals
- Change gradient colors in the icon container
- Modify action buttons based on your application's routes
- Customize error messages and descriptions

### Color Scheme
- **401 (Unauthorized)**: Red to Orange (`from-red-600 to-orange-600`)
- **402 (Payment)**: Green to Emerald (`from-green-600 to-emerald-600`)
- **403 (Forbidden)**: Red to Pink (`from-red-600 to-pink-600`)
- **404 (Not Found)**: Blue to Purple (`from-blue-600 to-purple-600`)
- **419 (Expired)**: Amber to Yellow (`from-amber-500 to-yellow-600`)
- **429 (Rate Limited)**: Purple to Pink (`from-purple-600 to-pink-600`)
- **500 (Server Error)**: Gray to Dark Gray (`from-gray-600 to-gray-800`)
- **503 (Unavailable)**: Yellow to Orange (`from-yellow-500 to-orange-600`)

## Best Practices

1. **Always test error pages** after making changes
2. **Keep messages user-friendly** and non-technical
3. **Provide clear next steps** with action buttons
4. **Maintain consistent design** across all error pages
5. **Consider accessibility** in all design decisions

## Dependencies

- Laravel 12
- Preline UI 3.2.3+
- Tailwind CSS 4
- Vite (for asset compilation)
