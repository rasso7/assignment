<?php
/**
 * Theme functions and definitions
 */

// Include required files
require_once get_template_directory() . '/includes/custom-post-types.php';
require_once get_template_directory() . '/includes/acf-fields.php';
require_once get_template_directory() . '/includes/helper-functions.php';
require_once get_template_directory() . '/includes/enqueue-scripts.php';

// Theme setup
function dogs_theme_setup() {
    // Add theme support for post thumbnails
    add_theme_support('post-thumbnails');
    
    // Add theme support for title tag
    add_theme_support('title-tag');
    
    // Register menus
    register_nav_menus(array(
        'primary' => 'Primary Menu',
        'footer' => 'Footer Menu',
    ));
}
add_action('after_setup_theme', 'dogs_theme_setup');

// Register page templates
function dogs_register_page_templates($templates) {
    $templates[get_template_directory() . '/page-templates/page-home.php'] = 'Dogs Homepage';
    $templates[get_template_directory() . '/page-templates/page-dogs.php'] = 'All Dogs Page';
    return $templates;
}
add_filter('theme_page_templates', 'dogs_register_page_templates');

// Add a body class for our custom pages
function dogs_body_classes($classes) {
    if (is_page_template('page-templates/page-home.php')) {
        $classes[] = 'dogs-home-page';
    }
    
    if (is_page_template('page-templates/page-dogs.php')) {
        $classes[] = 'dogs-listing-page';
    }
    
    return $classes;
}
add_filter('body_class', 'dogs_body_classes');

// Add image sizes
add_image_size('dog-thumbnail', 300, 300, true);
add_image_size('dog-medium', 600, 600, true);
add_image_size('dog-large', 900, 900, true);

// Load Tailwind CSS
function dogs_load_tailwind() {
 
    wp_enqueue_style('my-style', get_stylesheet_uri());

    wp_enqueue_style('tailwind-output', get_template_directory_uri() . '/src/output.css');
}
add_action('wp_enqueue_scripts', 'dogs_load_tailwind');