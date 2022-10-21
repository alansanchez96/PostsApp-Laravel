/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    fontFamily: {
      'sans': ['"Corbel"', 'JetBrains Mono', 'sans-serif']
    }
  },
  plugins: [],
}