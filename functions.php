<?php

/**
 * beam-child functions and definitions
 *
 * @package beam-child
 */

/* https://wordpress.stackexchange.com/questions/163301/versioning-import-of-parent-themes-style-css/182023#182023 */

function parent_theme_stylesheet() {
    // Use the parent theme's stylesheet
    return get_template_directory_uri() . '/style.css';
}

function child_styles() {
    $themeVersion = wp_get_theme()->get('Version');

    // Enqueue our style.css with our own version
    wp_enqueue_style('child-theme-style', get_stylesheet_directory_uri() . '/style.css', array(), $themeVersion);
}

// Filter get_stylesheet_uri() to return the parent theme's stylesheet 
add_filter('stylesheet_uri', 'parent_theme_stylesheet');

// Enqueue this theme's scripts and styles (after parent theme)
add_action('wp_enqueue_scripts', 'child_styles', 20);
