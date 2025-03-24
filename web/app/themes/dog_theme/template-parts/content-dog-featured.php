<?php
/**
 * Template part for displaying the featured (oldest) dog
 */
$birth_date = get_field('birth_date', $post->ID);
$age = calculate_dog_age($birth_date);
$has_allergies = get_field('has_allergies', $post->ID);
$food_allergies = get_field('food_allergies', $post->ID);
$breed_terms = get_the_terms($post->ID, 'dog_breed');
$breed = !empty($breed_terms) ? $breed_terms[0]->name : get_field('breed_manual', $post->ID);
if (empty($breed)) {
    $breed_id = get_field('breed', $post->ID); // This gets the term ID as your return_format is 'id'
    if ($breed_id) {
        $term = get_term($breed_id, 'dog_breed');
        if (!is_wp_error($term) && $term) {
            $breed = $term->name;
        }
    }
}
?>

<div class="featured-dog relative rounded-xl shadow-2xl overflow-hidden mb-6 dog-item"
     data-has-allergies="<?php echo $has_allergies ? 'yes' : 'no'; ?>"
     data-breed="<?php echo esc_attr($breed); ?>">
    
    <!-- Background gradient with subtle pattern -->
    <div class="absolute inset-0 bg-gradient-to-br from-amber-50 to-amber-200 opacity-80"></div>
    <div class="absolute inset-0 opacity-10 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjIiIGZpbGw9IiMwMDAiLz48L3N2Zz4=')]"></div>
    
    <!-- Content container -->
    <div class="relative p-8">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Image section with enhanced styling -->
            <div class="md:w-2/5 relative">
            <div class="relative rounded-xl overflow-hidden shadow-lg transform transition-transform duration-300 hover:scale-102 h-[380px]">
        <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('large', ['class' => 'absolute inset-0 w-full h-full object-cover']); ?>
        <?php else : ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/old.jpg" alt="<?php the_title(); ?>" class="absolute inset-0 w-full h-full object-cover" />
        <?php endif; ?>
    </div>

                
                <!-- "Oldest Dog" badge with improved styling -->
                <div class="absolute -top-3 -right-3">
                    <div class="bg-gradient-to-r from-amber-500 to-amber-600 text-white py-2 px-5 rounded-full font-bold shadow-md transform rotate-2">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Oldest Dog
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Information section with enhanced styling -->
            <div class="md:w-3/5">
                <h2 class="text-4xl font-bold mb-6 text-amber-800 drop-shadow-sm"><?php the_title(); ?></h2>
                
                <div class="bg-white bg-opacity-60 rounded-xl p-6 shadow-md backdrop-blur-sm">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Left column of information -->
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <span class="w-8 h-8 flex items-center justify-center bg-amber-100 rounded-full mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <p class="text-gray-800"><span class="font-semibold">Age:</span> <?php echo $age; ?></p>
                            </div>
                            
                            <div class="flex items-center">
                                <span class="w-8 h-8 flex items-center justify-center bg-amber-100 rounded-full mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <p class="text-gray-800"><span class="font-semibold">Birthday:</span> <?php echo get_formatted_birth_date($birth_date); ?></p>
                            </div>
                            
                            <div class="flex items-center">
                                <span class="w-8 h-8 flex items-center justify-center bg-amber-100 rounded-full mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <p class="text-gray-800"><span class="font-semibold">Owner:</span> <?php echo esc_html(get_field('owners_name')); ?></p>
                            </div>
                            
                            <div class="flex items-center">
                                <span class="w-8 h-8 flex items-center justify-center bg-amber-100 rounded-full mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9.243 3.03a1 1 0 01.727 1.213L9.53 6h2.94l.56-2.243a1 1 0 111.94.486L14.53 6H17a1 1 0 110 2h-2.97l-1 4H15a1 1 0 110 2h-2.47l-.56 2.242a1 1 0 11-1.94-.485L10.47 14H7.53l-.56 2.242a1 1 0 11-1.94-.485L5.47 14H3a1 1 0 110-2h2.97l1-4H5a1 1 0 110-2h2.47l.56-2.243a1 1 0 011.213-.727zM9.03 8l-1 4h2.938l1-4H9.031z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <p class="text-gray-800"><span class="font-semibold">Breed:</span> <?php echo esc_html($breed); ?></p>
                            </div>
                        </div>
                        
                        <!-- Right column of information -->
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <span class="w-8 h-8 flex items-center justify-center bg-amber-100 rounded-full mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <p class="text-gray-800"><span class="font-semibold">Favorite Food:</span> <?php echo esc_html(get_field('favorite_food')); ?></p>
                            </div>
                            
                            <div class="flex items-center">
                                <span class="w-8 h-8 flex items-center justify-center bg-amber-100 rounded-full mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5 5a3 3 0 015-2.236A3 3 0 0114.83 6H16a2 2 0 110 4h-5V9a1 1 0 10-2 0v1H4a2 2 0 110-4h1.17C5.06 5.687 5 5.35 5 5zm4 1V5a1 1 0 10-1 1h1zm3 0a1 1 0 10-1-1v1h1z" clip-rule="evenodd" />
                                        <path d="M9 11H3v5a2 2 0 002 2h4v-7zM11 18h4a2 2 0 002-2v-5h-6v7z" />
                                    </svg>
                                </span>
                                <p class="text-gray-800"><span class="font-semibold">Favorite Toy:</span> <?php echo esc_html(get_field('favorite_toy')); ?></p>
                            </div>
                            
                            <!-- Allergies section with conditional styling -->
                            <?php if ($has_allergies && !empty($food_allergies)) : ?>
                                <div class="mt-2 p-4 bg-red-50 border border-red-200 rounded-lg">
                                    <div class="flex items-center mb-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        <p class="text-red-600 font-bold">Allergies:</p>
                                    </div>
                                    <p class="text-red-700 pl-7"><?php echo nl2br(esc_html($food_allergies)); ?></p>
                                </div>
                            <?php else : ?>
                                <div class="flex items-center">
                                    <span class="w-8 h-8 flex items-center justify-center bg-green-100 rounded-full mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                    <p class="text-gray-800"><span class="font-semibold">Allergies:</span> None</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <!-- "Wise dog" callout with enhanced styling -->
                <div class="mt-6 relative">
                    <div class="bg-amber-700 bg-opacity-20 border-l-4 border-amber-600 rounded-r-lg p-4">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-amber-800 font-bold text-lg">The wisest and most experienced dog in our office!</p>
                        </div>
                    </div>
                    
                    <!-- Decorative paw prints -->
                    <div class="absolute -bottom-4 -right-4 opacity-20">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="currentColor" class="text-amber-900">
                            <path d="M12 2c-5.33 4.55-8 8.48-8 11.8 0 4.98 3.8 8.2 8 8.2s8-3.22 8-8.2c0-3.32-2.67-7.25-8-11.8zm0 18c-3.35 0-6-2.57-6-6.2 0-2.34 1.95-5.44 6-9.14 4.05 3.7 6 6.79 6 9.14 0 3.63-2.65 6.2-6 6.2zm-4.17-6c.37 0 .67.26.74.62.41 2.22 2.28 2.98 3.64 2.87.43-.02.79.32.79.75 0 .4-.32.73-.72.75-2.13.13-4.62-1.09-5.19-4.12-.08-.45.28-.87.74-.87z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>