const mix = require('laravel-mix');
require('@tinypixelco/laravel-mix-wp-blocks');
require('laravel-mix-svg-vue');

mix
  .setPublicPath('./dist')
  .browserSync('https://motto.test');

mix
  .options({processCssUrls: false})
  .postCss('resources/styles/app.css', 'styles', [
    require('postcss-import'),
    require('tailwindcss'),
    require('postcss-nested'),
  ])
  .postCss('resources/styles/editor.css', 'styles', [
    require('postcss-import'),
    require('tailwindcss'),
    require('postcss-nested'),
  ]);

mix
  .js('resources/scripts/app.js', 'scripts')
  .js('resources/scripts/customizer.js', 'scripts')
  .blocks('resources/scripts/editor.js', 'scripts')
  .vue({ version: 3 })
  .svgVue({
    svgPath: 'resources/images/icons',
    extract: false,
    svgoSettings: [
        { addClassesToSVGElement: 'w-6 h-6' },
        { removeUselessStrokeAndFill: false },
        { removeUnknownsAndDefaults: false },
        { removeTitle: true },
        { removeViewBox: false },
        { removeDimensions: true },
    ]
  })
  .extract(['vue']);

mix
  .copyDirectory('resources/images', 'dist/images')
  .copyDirectory('resources/fonts', 'dist/fonts');

mix
  .sourceMaps()
  .version();