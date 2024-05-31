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
        erentYellow: "#F8B32A",
        erentGreen: "#146C43",
        erentBlack: "#13100D",
        erentRed: "#d90429",
      },
    },
  },
  plugins: [],
};
