/** @type {import('tailwindcss').Config} */

const colors = require('tailwindcss/colors')

export default {
  content: [
    './resources/views/**/*.blade.php',
    './vendor/filament/**/*.blade.php'
  ],
  theme: {
    extend: {
      colors: {
        danger: colors.rose,
        primary: colors.emerald,
        success: colors.violet,
        warning: colors.amber,
      },
      backgroundImage: { 
        'overlapping-pattern': "url(/public/images/overlapping-diamonds.svg)"
      },
    },
  },
}

