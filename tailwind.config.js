module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        brand: {
          DEFAULT: '#14cdab',
          dark: '#1F1646',
          light: '#ffffff',
          action: '#F15159',
        }
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
