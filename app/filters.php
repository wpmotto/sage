<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});

/**
 * Resets the base styles in the 
 * block editor so as not to interfere
 * with ours.
 */
add_filter('block_editor_settings', function ($editor_settings) {
    unset($editor_settings['styles'][0]);
    return $editor_settings;
});

/**
 * Use shortcodes in Custom HTML Widgets
 * @link https://wordpress.stackexchange.com/questions/336530/how-can-i-make-my-custom-shortcode-work-in-a-custom-html-widget
 */
add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');