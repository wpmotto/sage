<?php

/**
 * Theme setup.
 */

namespace App;

use function Roots\asset;

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('sage/app.js', asset('scripts/app.js')->uri(), [], null, true);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
        
    wp_enqueue_style('sage/app.css', asset('styles/app.css')->uri(), false, null);
}, 100);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
    if ($manifest = asset('scripts/manifest.asset.php')->get()) {
        wp_enqueue_script('sage/vendor.js', asset('scripts/vendor.js')->uri(), $manifest['dependencies'], null, true);
        wp_enqueue_script('sage/editor.js', asset('scripts/editor.js')->uri(), ['sage/vendor.js'], null, true);

        wp_add_inline_script('sage/vendor.js', asset('scripts/manifest.js')->contents(), 'before');
    }

    wp_enqueue_style('sage/editor.css', asset('styles/editor.css')->uri(), false, null);
}, 100);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil', [
        /**
         * Clean up WordPress
         */
        'clean-up' => [
            /**
             * Obscure and suppress WordPress information.
             */
            'wp_obscurity',

            /**
             * Disable WordPress emojis.
             */
            'disable_emojis',

            /**
             * Disable extra RSS feeds.
             */
            'disable_extra_rss',

            /**
             * Disable recent comments CSS.
             */
            'disable_recent_comments_css',

            /**
             * Disable gallery CSS.
             */
            'disable_gallery_css',

            /**
             * Clean HTML5 markup.
             */
            'clean_html5_markup',
        ],

        /**
         * Remove version query string from all styles and scripts
         */
        'disable-asset-versioning',

        /**
         * Disables trackbacks/pingbacks
         */
        'disable-trackbacks',

        /**
         * Moves all scripts to wp_footer action
         */
        'js-to-footer',

        /**
         * Cleaner walker for wp_nav_menu()
         */
        'nav-walker',

        /**
         * Redirects search results from /?s=query to /search/query/, converts %20 to +
         *
         * @link http://txfx.net/wordpress-plugins/nice-search/
         */
        'nice-search',

        /**
         * Convert absolute URLs to relative URLs
         *
         * Inspired by {@link http://www.456bereastreet.com/archive/201010/how_to_make_wordpress_urls_root_relative/}
         */
        'relative-urls',
    ]);

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Block Editor
     */
    add_theme_support('wp-block-styles');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Add theme support for Wide Alignment
     * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#wide-alignment
     */
    add_theme_support('align-wide');

    /**
     * Enable responsive embeds
     * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style'
    ]);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Enable theme color palette support
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-color-palettes
     */
    add_theme_support('editor-color-palette', [
        [
            'name' => __('Primary', 'sage'),
            'slug' => 'primary',
            'color' => '#525ddc',
        ]
    ]);

    add_theme_support(
		'editor-font-sizes',
		[
            [
                'name' => esc_attr__('H1', 'motto'),
                'slug' => 'h1',
                'size' => 54
            ],
            [
                'name' => esc_attr__('H2', 'motto'),
                'slug' => 'h2',
                'size' => 48
            ],
            [
                'name' => esc_attr__('H3', 'motto'),
                'slug' => 'h3',
                'size' => 30
            ],
            [
                'name' => esc_attr__('H4', 'motto'),
                'slug' => 'h4',
                'size' => 24
            ],
            [
                'name' => esc_attr__('Lead', 'motto'),
                'slug' => 'lead',
                'size' => 21
            ],
		]
	);

    /**
     * Add Google Fonts Preconnect
     */
    add_action('wp_head', function(){
        $fontUrl = "https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap";
        echo <<<EOT
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preload" as="style" href="$fontUrl">    
        <link rel="stylesheet" media="print" onload="this.onload=null;this.removeAttribute('media');" href="$fontUrl">
        <noscript>
            <link rel="stylesheet" href="$fontUrl">
        </noscript>    
        EOT;
    }, 1);

}, 20);

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary'
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer'
    ] + $config);
});
