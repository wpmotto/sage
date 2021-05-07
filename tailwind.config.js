const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    '../../uploads/blaze.csv',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    fontSize: {
      'xxl': '4rem',
      'xl': '4rem',
      'h1': '3.375rem',
      'h2': '3rem',
      'h3': '1.875rem',
      'h4': '1.5rem',
      'lead': '1.31rem',
      'lg': '1.125rem',
      'base': '1rem',
      'sm': '.875rem',
      'tiny': '.875rem',
      'xs': '.75rem',
    },      
    extend: {
      fontFamily: {
        'heading': ['Poppins', ...defaultTheme.fontFamily.sans],
      },
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
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
  ],
}
