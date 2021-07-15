<?php

/**
 * Theme setup.
 */

namespace App;

use Illuminate\Support\Arr;
use function Roots\asset;

/*
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('sage/vendor.js', asset('scripts/vendor.js')->uri(), ['jquery'], null, true);
    wp_enqueue_script('sage/app.js', asset('scripts/app.js')->uri(), ['sage/vendor.js', 'jquery'], null, true);
    wp_enqueue_script('unbounce.js', 'https://984cde0f7b934a59a3183b301761debb.js.ubembed.com', ['jquery'], null, true);

    wp_add_inline_script('sage/vendor.js', asset('scripts/manifest.js')->contents(), 'before');

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    wp_dequeue_script('easyazonpro-bootstrap-popovers');
    wp_dequeue_script('easyazonpro-popovers');
    wp_dequeue_style('easyazonpro-bootstrap-popovers');
    wp_dequeue_style('easyazonpro-popovers');
    wp_enqueue_style('sage/app.css', asset('styles/app.css')->uri(), false, null);
}, 100);

/*
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

/*
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    add_theme_support('custom-logo', [
        'height'      => 100,
        'width'       => 355,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => ['site-title', 'site-description'],
    ]);
    /*
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');

    /*
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /*
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
    ]);

    /*
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /*
     * Add theme support for Wide Alignment
     * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#wide-alignment
     */
    add_theme_support('align-wide');

    /*
     * Enable responsive embeds
     * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /*
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /*
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /*
     * Enable theme color palette support
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-color-palettes
     */
    if (file_exists($tailwindLocation = get_theme_file_path() . '/tailwind.json')) {
        $colors = [];

        $config = json_decode(file_get_contents($tailwindLocation), true);

        foreach (Arr::dot($config['colors']) as $slug => $color) {
            $title = str_replace(['-', '_', '.'], ' ', mb_convert_case($slug, MB_CASE_TITLE, 'UTF-8'));
            $slug = str_replace('.', '-', $slug);

            $colors[] = [
                'name'  => __($title, 'sage'),
                'slug'  => $slug,
                'color' => $color,
            ];
        }

        add_theme_support('editor-color-palette', $colors);

        $fontSizes = [];

        foreach (Arr::dot($config['fontSize']) as $slug => $size) {
            $title = str_replace(['-', '_', '.'], ' ', mb_convert_case($slug, MB_CASE_TITLE, 'UTF-8'));
            $slug = str_replace('.', '-', $slug);
            $size = str_replace('rem', '', $size);

            $fontSizes[] = [
                'name' => __($title, 'sage'),
                'slug' => $slug,
                'size' => $size * 16,
            ];
        }

        add_theme_support('editor-font-sizes', $fontSizes);
    }
}, 20);

/*
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $footer_config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<div class="sidebar-title text-2xl text-white">',
        'after_title'   => '</div>',
    ];
    $sidebar_config = [
        'before_widget' => '<section class="widget %1$s %2$s bg-trim-400 mb-8 text-white">',
        'after_widget'  => '</section>',
        'before_title'  => '<div class="sidebar-title text-2xl text-white bg-radial-brandbrand border-b-4 uppercase">',
        'after_title'   => '</div>',
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id'   => 'sidebar-primary',
    ] + $sidebar_config);
    register_sidebar([
        'name' => __('Footer 1', 'sage'),
        'id'   => 'footer-1',
    ] + $footer_config);
    register_sidebar([
        'name' => __('Footer 2', 'sage'),
        'id'   => 'footer-2',
    ] + $footer_config);
    register_sidebar([
        'name' => __('Footer 3', 'sage'),
        'id'   => 'footer-3',
    ] + $footer_config);
    register_sidebar([
        'name' => __('Footer 4', 'sage'),
        'id'   => 'footer-4',
    ] + $footer_config);
});

if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title'    => get_bloginfo('name') . ' Theme Options',
        'menu_title'    => 'Theme Options',
        'menu_slug'     => 'options',
        'update_button' => 'Update Options',
        'autoload'      => true,
    ]);
}
