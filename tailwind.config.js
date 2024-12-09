/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.{php,js,html}",
    "./index.php",
    "./views/addModals.html",
    "!./node_modules/**/*"
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

