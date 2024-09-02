/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      'node_modules/preline/dist/*.js',
    ],
    theme: {
      extend: {
        colors: {
         primary : '#047857',
         secondary:'#fff700'
        },
      },
    },
    plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/forms'),
        require('preline/plugin'),
    ],
  }
