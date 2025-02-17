/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './app/Views/**/*.php',
    './public/**/*.js',     
  ],
  theme: {
    extend: {},
    screens: {
      'xs': '320px',
      'ms': '425px',
      'sm': '640px',
      'md': '768px',
      'lg': '1024px',
      'xlg': '1440px',
    }
  },
  plugins: [require('tailwind-hamburgers')],
}