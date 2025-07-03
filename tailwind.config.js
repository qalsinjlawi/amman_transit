import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

     theme: {
    extend: {
      colors: {
        'transit-green': '#1F594A',
        'aqua-line': '#3BB4B4',
        'sandstone-white': '#F3EEE7',
      },
      fontFamily: {
        // Example: Add a custom Arabic-friendly font
        sans: ['"Tajawal"', 'ui-sans-serif', 'system-ui'],
      },
    },
  },
  plugins: [],
};


