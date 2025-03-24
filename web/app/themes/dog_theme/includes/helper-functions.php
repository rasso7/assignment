<?php
/**
 * Helper functions for dog data
 */

/**
 * Get dogs with birthdays in the current month
 */
function get_birthday_dogs() {
    $current_month = date('m');
    
    $args = array(
        'post_type' => 'dog',
        'posts_per_page' => -1,
        'meta_query' => array(
            array(
                'key' => 'birth_date',
                'value' => $current_month,
                'compare' => 'LIKE'
            )
        )
    );
    
    $dogs = get_posts($args);
    
    return $dogs;
}

/**
 * Calculate dog's age in years and months
 */
function calculate_dog_age($birth_date) {
    if (empty($birth_date)) {
        return 'Unknown';
    }
    
    $birth_date = DateTime::createFromFormat('Ymd', $birth_date);
    if (!$birth_date) {
        return 'Unknown';
    }
    
    $now = new DateTime();
    $interval = $birth_date->diff($now);
    
    if ($interval->y > 0) {
        $age = $interval->y . ' ' . ($interval->y == 1 ? 'year' : 'years');
        if ($interval->m > 0) {
            $age .= ', ' . $interval->m . ' ' . ($interval->m == 1 ? 'month' : 'months');
        }
    } else {
        $age = $interval->m . ' ' . ($interval->m == 1 ? 'month' : 'months');
    }
    
    return $age;
}

/**
 * Get all dogs sorted by age (oldest first)
 */
function get_all_dogs_by_age() {
    $args = array(
        'post_type' => 'dog',
        'posts_per_page' => -1,
        'meta_key' => 'birth_date',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
    );
    
    return get_posts($args);
}

/**
 * Get the oldest dog
 */
function get_oldest_dog() {
    $args = array(
        'post_type' => 'dog',
        'posts_per_page' => 1,
        'meta_key' => 'birth_date',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
    );
    
    $dogs = get_posts($args);
    
    return !empty($dogs) ? $dogs[0] : null;
}

/**
 * Get all available dog breeds
 */
function get_all_dog_breeds() {
    $breed_terms = get_terms(array(
        'taxonomy' => 'dog_breed',
        'hide_empty' => true,
    ));
    
    $breeds = array();
    foreach ($breed_terms as $term) {
        $breeds[$term->term_id] = $term->name;
    }
    
    return $breeds;
}



function retrieve_all_dog_breeds_for_filter() {
    // Get all breeds from taxonomy with enhanced parameters
    $breed_terms = get_terms(array(
        'taxonomy' => 'dog_breed',
        'hide_empty' => false,
        'orderby' => 'name',
        'order' => 'ASC',
        'number' => 0 // Get all terms without limit
    ));
    
    // Error handling and empty check
    if (is_wp_error($breed_terms) || !is_array($breed_terms) || count($breed_terms) === 0) {
        return array();
    }
    
    // Create associative array with term_id => name format
    $available_breeds = array();
    foreach ($breed_terms as $breed) {
        if ($breed instanceof WP_Term) {
            $available_breeds[$breed->term_id] = $breed->name;
        }
    }
    
    return $available_breeds;
}

/**
 * Check if a dog has birthday in the current month
 */
function has_birthday_this_month($birth_date) {
    if (empty($birth_date)) {
        return false;
    }
    
    $birth_date = DateTime::createFromFormat('Ymd', $birth_date);
    if (!$birth_date) {
        return false;
    }
    
    $current_month = date('m');
    return $birth_date->format('m') === $current_month;
}

/**
 * Get dog birth date in readable format
 */
function get_formatted_birth_date($birth_date) {
    if (empty($birth_date)) {
        return 'Unknown';
    }
    
    $date = DateTime::createFromFormat('Ymd', $birth_date);
    if (!$date) {
        return 'Unknown';
    }
    
    return $date->format('F j, Y');
}
