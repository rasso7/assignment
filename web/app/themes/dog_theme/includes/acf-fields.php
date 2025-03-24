<?php
/**
 * Register ACF fields for Dogs
 */

function dogs_register_acf_fields() {
    if(function_exists('acf_add_local_field_group')):

        acf_add_local_field_group(array(
            'key' => 'group_dog_details',
            'title' => 'Dog Details',
            'fields' => array(
                array(
                    'key' => 'field_birth_date',
                    'label' => 'Birth Date',
                    'name' => 'birth_date',
                    'type' => 'date_picker',
                    'required' => 1,
                    'display_format' => 'd/m/Y',
                    'return_format' => 'Ymd',
                    'instructions' => 'Select the dog\'s birth date',
                ),
                array(
                    'key' => 'field_owners_name',
                    'label' => 'Owner\'s Name',
                    'name' => 'owners_name',
                    'type' => 'text',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_favorite_food',
                    'label' => 'Favorite Food',
                    'name' => 'favorite_food',
                    'type' => 'text',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_favorite_toy',
                    'label' => 'Favorite Toy',
                    'name' => 'favorite_toy',
                    'type' => 'text',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_food_allergies',
                    'label' => 'Food Allergies',
                    'name' => 'food_allergies',
                    'type' => 'textarea',
                    'required' => 0,
                    'placeholder' => 'Leave empty if no allergies',
                ),
                array(
                    'key' => 'field_has_allergies',
                    'label' => 'Has Allergies',
                    'name' => 'has_allergies',
                    'type' => 'true_false',
                    'default_value' => 0,
                    'ui' => 1,
                    'ui_on_text' => 'Yes',
                    'ui_off_text' => 'No',
                ),
                array(
                  'key' => 'field_breed',
    'label' => 'Breed',
    'name' => 'breed',
    'type' => 'taxonomy',
    'required' => 1,
    'taxonomy' => 'dog_breed',
    'field_type' => 'select',
    'allow_null' => 0,
    'return_format' => 'id',
    'multiple' => 0,
    'instructions' => 'Select the dog\'s breed',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'dog',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
        ));

    endif;
}
add_action('acf/init', 'dogs_register_acf_fields');
