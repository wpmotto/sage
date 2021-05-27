const styles = require('./styles.json')
const defaultTheme = require('tailwindcss/defaultTheme')
const plugin = require('tailwindcss/plugin')

const colors = {}
styles.colors.forEach(i =>
  colors[i.name == "primary" ? 'DEFAULT' : i.name] = i.hex
)

module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.{js,vue}',
    '../../uploads/blaze.csv',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    /**
     * Major Third Type Scale
     * @link https://type-scale.com/
     */
    fontSize: {
      '4xl': (styles.fontSizes.filter(i => i.name == "h1")[0].px / 16).toFixed(3) + 'rem',
      '3xl': (styles.fontSizes.filter(i => i.name == "h2")[0].px / 16).toFixed(3) + 'rem',
      '2xl': (styles.fontSizes.filter(i => i.name == "h3")[0].px / 16).toFixed(3) + 'rem',
      'xl': (styles.fontSizes.filter(i => i.name == "h4")[0].px / 16).toFixed(3) + 'rem',
      'lg': (styles.fontSizes.filter(i => i.name == "h5")[0].px / 16).toFixed(3) + 'rem',
      'base': '1rem', // 16px
      'sm': '.8rem', // 12.8px
      'tiny': '.64rem', // 10.24px
      'xs': '.512rem', // 8.19px
    },      
    extend: {
      fontFamily: {
        'heading': ['Poppins', ...defaultTheme.fontFamily.sans],
      },
      colors: {
        brand: colors
      },
      zIndex: {
        '-1': '-1',
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
    plugin(function({ theme, addUtilities, addComponents, e, prefix, config }) {
      const newUtilities = Object.keys(theme('colors.brand')).map((k) => {
          return {
              [`.has-${k == "DEFAULT" ? 'primary' : k }-color`]: {
                  color: theme('colors.brand')[k],
              },
              [`.has-${k == "DEFAULT" ? 'primary' : k }-background-color`]: {
                  backgroundColor: theme('colors.brand')[k],
              },
          }
      })

      addUtilities(newUtilities)
    }),    
  ],
}
