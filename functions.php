<?php
/**
 * keach functions and definitions
 *
 * @package keach
 * @version 1.0
 */

declare(strict_types=1);

namespace keach;

const VERSION = '1.0.0';

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function setup(): void
{
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('editor-styles');
    add_editor_style('editor-style.css');
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(150, 150, true);
    add_image_size('featured', 2400, 9999);

    register_nav_menus([
        'primary-menu' => esc_html__('Primary Menu', 'keach'),
    ]);

    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ]);

    add_theme_support('custom-background', apply_filters('keach_custom_background_args', [
        'default-color' => 'ffffff',
        'default-image' => '',
    ]));
}
add_action('after_setup_theme', __NAMESPACE__ . '\setup');

/**
 * Enqueue scripts and styles for the keach theme.
 */
function enqueue_assets(): void
{
    if (!defined('VERSION')) {
        define('VERSION', '1.0.0');
    }

    $theme_uri = get_template_directory_uri();

    // Enqueue styles
    wp_enqueue_style('keach-main-styles', get_stylesheet_uri(), [], VERSION);
    wp_enqueue_style('keach-adobe-fonts', 'https://use.typekit.net/quc7wdh.css', [], null);

    // Enqueue scripts
    wp_enqueue_script('gsap-core', 'https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js', [], null, true);
    wp_enqueue_script('gsap-scrolltrigger', 'https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/ScrollTrigger.min.js', ['gsap-core'], null, true);
    wp_enqueue_script('gsap-scrolltoplugin', 'https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/ScrollToPlugin.min.js', ['gsap-core'], null, true);

    wp_enqueue_script(
        'keach-main-script',
        $theme_uri . '/js/app.js',
        [
            'gsap-core',
            'gsap-scrolltrigger',
            'gsap-scrolltoplugin',
        ],
        VERSION,
        true
    );
}

add_action('wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets');

function enqueue_splide_assets()
{
    wp_enqueue_style('splide-css', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/css/splide.min.css');
    wp_enqueue_script('splide-js', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/js/splide.min.js', [], null, true);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_splide_assets');



/**
 * Modify allowed mime types.
 *
 * @param array $mime_types Allowed mime types.
 * @return array Modified mime types.
 */
function modify_mime_types(array $mime_types): array
{
    unset($mime_types['zip']);
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
}
add_filter('upload_mimes', __NAMESPACE__ . '\modify_mime_types');

/**
 * Add SVG uploads support.
 *
 * @param array  $data    File data.
 * @param string $file    File path.
 * @param string $filename File name.
 * @param array  $mimes   Allowed mime types.
 * @return array Modified file data.
 */
function svg_upload_support($data, $file, $filename, $mimes): array
{
    global $wp_version;
    if ($wp_version === '4.7.1') {
        $filetype = wp_check_filetype($filename, $mimes);
        return [
            'ext' => $filetype['ext'],
            'type' => $filetype['type'],
            'proper_filename' => $data['proper_filename'],
        ];
    }
    return $data;
}
add_filter('wp_check_filetype_and_ext', __NAMESPACE__ . '\svg_upload_support', 10, 4);

/**
 * Enqueue custom admin styles for SVG handling.
 */
function enqueue_admin_svg_styles(): void
{
    $style = '
        .attachment-266x266, .thumbnail img {
            width: 100%;
            height: auto;
        }
    ';
    wp_add_inline_style('admin-bar', $style);
}
add_action('admin_enqueue_scripts', __NAMESPACE__ . '\enqueue_admin_svg_styles');


//Inserts gravity form title above inputs
add_filter('gform_get_form_filter', function ($form_string, $form) {
    // Get form title and add it inside the form tag
    $form_title = '<h2 class="gf-form-title">' . esc_html($form['title']) . '</h2>';

    // Insert title right after the <form> tag
    $form_string = preg_replace('/<form(.*?)>/i', '<form$1>' . $form_title, $form_string, 1);

    return $form_string;
}, 10, 2);


