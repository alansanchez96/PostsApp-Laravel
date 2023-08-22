/** @type {import('tailwindcss').Config} */
module.exports = {
  mode: 'jit',
  purge: [
    "./src/Presentation/Laravel/**/*.blade.php",
    "./src/Presentation/Laravel/**/*.js",
    "./src/Presentation/Laravel/**/*.vue",
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
  ],
  theme: {
  },
  plugins: [],
}