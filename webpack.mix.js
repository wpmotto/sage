const mix = require('laravel-mix');
require('@tinypixelco/laravel-mix-wp-blocks');

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
  .blocks('resources/scripts/editor.js', 'scripts');

mix
  .copyDirectory('resources/images', 'dist/images')
  .copyDirectory('resources/fonts', 'dist/fonts');

mix
  .sourceMaps()
  .version();