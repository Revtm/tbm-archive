/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
  "./resources/**/*.blade.php",
  "./resources/**/*.js",
  "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      animation: {
        'ping-slow': 'ping 5s linear infinite',
      }
    },
  },
  plugins: [],
}
