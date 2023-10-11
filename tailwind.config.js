/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        secondary: '#4318FF',
        third: '#141522',
        biru: "#546FFF"
      },
    },
  },
  plugins: [],
}
