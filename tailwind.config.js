/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
    "./node_modules/daisyui/dist/**/*.js",
  ],
  theme: {
    extend: {
        fontFamily: {
          raleway: ['"Raleway"', 'sans-serif'],
          josefinSans: ['"Josefin Sans"', 'sans-serif'],
      },
    },
  },
  plugins: [
    require('flowbite/plugin'),
    require('daisyui'),
  ],
}
