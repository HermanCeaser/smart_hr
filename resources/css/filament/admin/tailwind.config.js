import preset from '../../../../vendor/filament/filament/tailwind.config.preset'
const colors = require('tailwindcss/colors')

export default {
    presets: [preset],
    darkMode: "class",
    content: [
        './app/Filament/Admin/**/*.php',
        './resources/views/filament/admin/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    theme: {
        extend: {
           
            backgroundImage: {
                'overlapping-pattern': "url(/public/images/diagonal-lines.svg)"
            },
        },
    },
}
