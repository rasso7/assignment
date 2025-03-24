<?php
/**
 * Register custom post types
 */

function dogs_register_post_types() {
    // Register Dog Custom Post Type
    $labels = array(
        'name'               => 'Dogs',
        'singular_name'      => 'Dog',
        'menu_name'          => 'Dogs',
        'add_new'            => 'Add New Dog',
        'add_new_item'       => 'Add New Dog',
        'edit_item'          => 'Edit Dog',
        'new_item'           => 'New Dog',
        'view_item'          => 'View Dog',
        'search_items'       => 'Search Dogs',
        'not_found'          => 'No dogs found',
        'not_found_in_trash' => 'No dogs found in Trash',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'dogs'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'thumbnail'),
        'menu_icon'          => 'dashicons-pets',
    );

    register_post_type('dog', $args);

    // Register Dog Breed Taxonomy
    $breed_labels = array(
        'name'              => 'Breeds',
        'singular_name'     => 'Breed',
        'search_items'      => 'Search Breeds',
        'all_items'         => 'All Breeds',
        'parent_item'       => 'Parent Breed',
        'parent_item_colon' => 'Parent Breed:',
        'edit_item'         => 'Edit Breed',
        'update_item'       => 'Update Breed',
        'add_new_item'      => 'Add New Breed',
        'new_item_name'     => 'New Breed Name',
        'menu_name'         => 'Breeds',
    );

    $breed_args = array(
        'hierarchical'      => true,
        'labels'            => $breed_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'breed'),
    );

    register_taxonomy('dog_breed', array('dog'), $breed_args);
}
add_action('init', 'dogs_register_post_types');
