/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.{php,js,html}",
    "./index.php",
    "!./node_modules/**/*"
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

