<?php
/**
 * Template part for displaying a dog card
 */
$birth_date = get_field('birth_date', $post->ID);
$age = calculate_dog_age($birth_date);
$has_allergies = get_field('has_allergies', $post->ID);
$food_allergies = get_field('food_allergies', $post->ID);


// Option 1: Get breed via taxonomy terms directly
$breed_terms = get_the_terms($post->ID, 'dog_breed');
$breed = !empty($breed_terms) ? $breed_terms[0]->name : '';

// Option 2: If no breed found, useing the ACF breed field's term
if (empty($breed)) {
    $breed_id = get_field('breed', $post->ID); 
    if ($breed_id) {
        $term = get_term($breed_id, 'dog_breed');
        if (!is_wp_error($term) && $term) {
            $breed = $term->name;
        }
    }
}
?>

<div class="dog-card relative bg-[#f9e4c0] rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-103 border border-gray-100 dog-item"
     data-has-allergies="<?php echo $has_allergies ? 'yes' : 'no'; ?>"
     data-breed="<?php echo esc_attr($breed); ?>"
     data-breed-id="<?php echo esc_attr($breed_id); ?>">
     
    <div class="absolute top-2 right-2 z-10">
        <div class="bg-gradient-to-r from-indigo-500 to-purple-500 text-white py-1 px-4 rounded-full font-bold text-sm shadow-sm transform rotate-3 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <?php echo $age; ?> yrs
        </div>
    </div>
    
    <div class="relative aspect-square overflow-hidden">
        <?php if (has_post_thumbnail()) : ?>
            <div class="h-full w-full transition-transform duration-500 hover:scale-110">
                <?php the_post_thumbnail('medium', ['class' => 'w-full h-full object-cover']); ?>
            </div>
        <?php else : ?>
            <div class="h-full w-full transition-transform duration-500 hover:scale-110">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/old.jpg" alt="<?php the_title(); ?>" class="w-full h-full object-cover" />
            </div>
        <?php endif; ?>
        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300"></div>
    </div>
    
    <div class="p-5">
        <h3 class="text-2xl font-bold mb-3 text-gray-800"><?php the_title(); ?></h3>
        
        <div class="space-y-2">
    <!-- Updated Birthday section with better layout for longer dates -->
    <div class="flex items-start text-gray-700">
        <span class="w-8 h-8 flex-shrink-0 flex items-center justify-center bg-amber-100 rounded-full mr-3 mt-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
        </span>
        <div class="flex-grow">
            <span class="font-medium">Birthday:</span> 
            <span class="ml-1"><?php echo get_formatted_birth_date($birth_date); ?></span>
        </div>
    </div>

    <div class="flex items-start text-gray-700">
        <span class="w-8 h-8 flex-shrink-0 flex items-center justify-center bg-amber-100 rounded-full mr-3 mt-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
        </span>
        <div class="flex-grow">
            <span class="font-medium">Owner:</span>
            <span class="ml-1"><?php echo esc_html(get_field('owners_name')); ?></span>
        </div>
    </div>

    <div class="flex items-start text-gray-700">
        <span class="w-8 h-8 flex-shrink-0 flex items-center justify-center bg-amber-100 rounded-full mr-3 mt-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
        </span>
        <div class="flex-grow">
            <span class="font-medium">Breed:</span>
            <span class="ml-1"><?php echo esc_html($breed); ?></span>
        </div>
    </div>

    <div class="flex items-start text-gray-700">
        <span class="w-8 h-8 flex-shrink-0 flex items-center justify-center bg-amber-100 rounded-full mr-3 mt-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
            </svg>
        </span>
        <div class="flex-grow">
            <span class="font-medium">Favorite Food:</span>
            <span class="ml-1"><?php echo esc_html(get_field('favorite_food')); ?></span>
        </div>
    </div>

    <div class="flex items-start text-gray-700">
        <span class="w-8 h-8 flex-shrink-0 flex items-center justify-center bg-amber-100 rounded-full mr-3 mt-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </span>
        <div class="flex-grow">
            <span class="font-medium">Favorite Toy:</span>
            <span class="ml-1"><?php echo esc_html(get_field('favorite_toy')); ?></span>
        </div>
    </div>
</div>

        
<?php if ($has_allergies && !empty($food_allergies)) : ?>
    <div class="mt-4 p-3 bg-red-50 border border-red-200 rounded-lg">
        <p class="flex items-center text-red-600 font-semibold mb-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            Allergies:
        </p>
        <p class="text-red-700 pl-6"><?php echo nl2br(esc_html($food_allergies)); ?></p>
    </div>
<?php else : ?>
    <div class="flex items-center mt-4">
        <span class="w-8 h-8 flex items-center justify-center bg-green-100 rounded-full mr-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <circle cx="12" cy="12" r="10" stroke-width="2"></circle>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"></path>
            </svg>
        </span>
        <p class="text-gray-700">
            <span class="font-semibold">Allergies:</span> None
        </p>
    </div>
<?php endif; ?>


    </div>
</div>