<?php
/**
 * Template part for displaying a birthday dog
 */
$birth_date = get_field('birth_date', $post->ID);
$formatted_birth_date = get_formatted_birth_date($birth_date);
$favorite_food = get_field('favorite_food', $post->ID);
$favorite_toy = get_field('favorite_toy', $post->ID);
$has_allergies = get_field('has_allergies', $post->ID);
$food_allergies = get_field('food_allergies', $post->ID);
?>

<div class="birthday-dog-card relative rounded-xl shadow-2xl overflow-hidden mb-12">

    <!-- Background gradient with subtle pattern -->
    <div class="absolute inset-0 bg-gradient-to-br from-amber-50 to-amber-200 opacity-80"></div>
    <div class="absolute inset-0 opacity-10 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjIiIGZpbGw9IiMwMDAiLz48L3N2Zz4=')]"></div>

    <!-- Content container -->
    <div class="relative p-4">
        <div class="flex flex-col md:flex-row gap-6">

            <div class="md:w-2/5 relative">
                <div class="relative rounded-xl overflow-hidden shadow-lg transform transition-transform duration-300 hover:scale-102 h-[380px]">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large', ['class' => 'absolute inset-0 w-full h-full object-cover']); ?>
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/old.jpg" alt="<?php the_title(); ?>" class="absolute inset-0 w-full h-full object-cover" />
                    <?php endif; ?>
                </div>

                <!-- "Birthday Month" badge -->
                <div class="absolute -top-3 -right-3">
                    <div class="bg-gradient-to-r from-pink-500 to-purple-500 text-white py-2 px-5 rounded-full font-bold shadow-md transform rotate-2">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Birthday Month!
                        </div>
                    </div>
                </div>
            </div>

            <!-- Information section -->
            <div class="md:w-3/5">
                <h2 class="text-4xl font-bold mb-8 text-pink-800 drop-shadow-sm "><?php the_title(); ?></h2>

                <div class="bg-white bg-opacity-60 rounded-xl p-5 shadow-md backdrop-blur-sm mb-6 mt-3">
                    <div class="grid grid-cols-1 gap-4">
                        <div class="space-y-4">
                            <div class="flex items-center ">
                                <span class="w-10 h-10 flex items-center justify-center bg-pink-100 rounded-full mr-5 flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-600" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <p class="text-gray-800 text-lg ml-2 "><span class="font-semibold">Birthday :</span> <?php echo $formatted_birth_date; ?></p>
                            </div>

                            <div class="flex items-center">
                                <span class="w-10 h-10 flex items-center justify-center bg-pink-100 rounded-full mr-4 flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-600" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5 5a3 3 0 015-2.236A3 3 0 0114.83 6H16a2 2 0 110 4h-5V9a1 1 0 10-2 0v1H4a2 2 0 110-4h1.17C5.06 5.687 5 5.35 5 5zm4 1V5a1 1 0 10-1 1h1zm3 0a1 1 0 10-1-1v1h1z" clip-rule="evenodd" />
                                        <path d="M9 11H3v5a2 2 0 002 2h4v-7zM11 18h4a2 2 0 002-2v-5h-6v7z" />
                                    </svg>
                                </span>
                                <p class="text-gray-800 text-lg ml-2 "><span class="font-semibold">Favorite Toy:</span> <?php echo esc_html($favorite_toy); ?></p>
                            </div>

                            <div class="flex items-center">
                                <span class="w-10 h-10 flex items-center justify-center bg-pink-100 rounded-full mr-4 flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-600" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <p class="text-gray-800 text-lg ml-2 "><span class="font-semibold">Favorite Food:</span> <?php echo esc_html($favorite_food); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Allergies section with conditional styling -->
                <div class="mt-5 relative">
                    <?php if ($has_allergies && !empty($food_allergies)) : ?>
                        <div class="bg-red-50 border-l-4 border-red-500 rounded-r-lg p-4 shadow-md">
                            <div class="flex items-center mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                <p class="text-red-700 font-bold text-lg">Allergies:</p>
                            </div>
                            <p class="text-red-700 pl-9"><?php echo nl2br(esc_html($food_allergies)); ?></p>
                        </div>
                    <?php else : ?>
                        <div class="bg-green-50 border-l-4 border-green-500 rounded-r-lg p-4 shadow-md" style="background-color: #f0fdf4; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" viewBox="0 0 20 20" fill="currentColor" style="color: #047857;">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <p class="font-bold text-lg" style="color: #047857;">No Known Allergies</p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Decorative paw prints -->
                    <div class="absolute -bottom-4 -right-4 opacity-20">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="currentColor" class="text-pink-900">
                            <path d="M12 2c-5.33 4.55-8 8.48-8 11.8 0 4.98 3.8 8.2 8 8.2s8-3.22 8-8.2c0-3.32-2.67-7.25-8-11.8zm0 18c-3.35 0-6-2.57-6-6.2 0-2.34 1.95-5.44 6-9.14 4.05 3.7 6 6.79 6 9.14 0 3.63-2.65 6.2-6 6.2zm-4.17-6c.37 0 .67.26.74.62.41 2.22 2.28 2.98 3.64 2.87.43-.02.79.32.79.75 0 .4-.32.73-.72.75-2.13.13-4.62-1.09-5.19-4.12-.08-.45.28-.87.74-.87z" />
                        </svg>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
