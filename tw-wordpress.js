// tailwind.config.js
const plugin = require('tailwindcss/plugin')

module.exports = {
    plugins: [
        plugin(function ({ addUtilities, config }) {

            const newUtilities = Object.keys(config('colors')).map((k) => {
                return {
                    [`.has-${k}-color`]: {
                        color: config('colors')[k],
                    },
                    [`.has-${k}-background-color`]: {
                        backgroundColor: config('colors')[k],
                    },
                }
            })
            console.log(newUtilities)

            addUtilities(newUtilities)
        })
    ]
}