/** @type {import('tailwindcss').Config} */
export default {
    presets: [
        require('./vendor/wireui/wireui/tailwind.config.js')
    ],
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      'node_modules/preline/dist/*.js',
      './vendor/wireui/wireui/resources/**/*.blade.php',
      './vendor/wireui/wireui/ts/**/*.ts',
      './vendor/wireui/wireui/src/View/**/*.php'
    ],
    theme: {
      extend: {
        colors: {
         primary : '#3b6bd3',
         secondary:'#ff6384'
        },
      },
    },
    plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/forms'),
        require('preline/plugin'),
    ],
  }
