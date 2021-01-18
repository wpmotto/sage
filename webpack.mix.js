const mix = require('laravel-mix');
require('@tinypixelco/laravel-mix-wp-blocks');
require('laravel-mix-purgecss');
require('laravel-mix-copy-watched');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Sage application. By default, we are compiling the Sass file
 | for your application, as well as bundling up your JS files.
 |
 */

mix
  .setPublicPath('./dist')
  .browserSync('mottowp.test');

mix
  .options({processCssUrls: false,})
  .postCss('resources/assets/styles/app.css', 'styles', [
    require('postcss-import'),
    require('tailwindcss'),
    require('postcss-nested'),
    // require('postcss-custom-properties'),
    // require('autoprefixer'),
  ]);
  // .postCss('resources/assets/styles/editor.css', 'styles', [
  //   require('postcss-import'),
  //   require('tailwindcss'),
  //   require('postcss-nested'),
  // ]);

  // .purgeCss({
  //   extend: { content: [path.join(__dirname, 'index.php')] },
  //   whitelist: require('purgecss-with-wordpress').whitelist,
  //   whitelistPatterns: require('purgecss-with-wordpress').whitelistPatterns,
  // });

mix
  .js('resources/assets/scripts/app.js', 'scripts')
  .js('resources/assets/scripts/customizer.js', 'scripts')
  .blocks('resources/assets/scripts/editor.js', 'scripts')
  .extract();

mix
  .copyWatched('resources/assets/images/**', 'dist/images')
  .copyWatched('resources/assets/fonts/**', 'dist/fonts');

mix
  .options({ processCssUrls: false })
  .sourceMaps(false, 'source-map')
  .version();
