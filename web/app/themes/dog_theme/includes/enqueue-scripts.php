<?php
/**
 * Enqueue scripts and styles
 */

function dogs_enqueue_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('dogs-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Enqueue jQuery (WordPress comes with jQuery)
    wp_enqueue_script('jquery');
    
    // Enqueue main JavaScript
    wp_enqueue_script('dogs-main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);
    
    // Enqueue dogs filter script only on the all dogs page
    if (is_page_template('page-templates/page-dogs.php')) {
        wp_enqueue_script('dogs-filter-js', get_template_directory_uri() . '/assets/js/dogs-filter.js', array('jquery'), '1.0.0', true);
    }
}
add_action('wp_enqueue_scripts', 'dogs_enqueue_scripts');

/**
 * Add settings to allow ACF fields to be accessed by REST API
 */
function dogs_acf_rest_api_init() {
    // Add REST API support to the dog custom post type
    add_post_type_support('dog', 'custom-fields');
    
    // Register fields to be included in REST response
    if (function_exists('register_rest_field')) {
        register_rest_field('dog', 'acf', array(
            'get_callback'    => 'dogs_get_acf_fields',
            'schema'          => null,
        ));
    }
}
add_action('rest_api_init', 'dogs_acf_rest_api_init');

/**
 * Get ACF fields for a post
 */
function dogs_get_acf_fields($object) {
    if (!function_exists('get_fields')) {
        return;
    }
    
    return get_fields($object['id']);
}
