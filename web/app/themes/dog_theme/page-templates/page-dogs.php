<?php
/**
 * Template Name: All Dogs Page
 */

get_header();

// Get the oldest dog
$oldest_dog = get_oldest_dog();
$oldest_dog_id = $oldest_dog ? $oldest_dog->ID : 0;
$allbreeds = retrieve_all_dog_breeds_for_filter();
// Get all other dogs
$args = array(
    'post_type' => 'dog',
    'posts_per_page' => -1,
    'meta_key' => 'birth_date',
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
    'post__not_in' => array($oldest_dog_id),
);
$other_dogs = get_posts($args);

// Get all breeds
$breeds = get_all_dog_breeds();
?>
<div class="dog-banner-wrapper mb-2" style="background-color: #f9e4c0; background-image: linear-gradient(135deg, #f9e4c0 0%, #ffe8b3 100%); position: relative; overflow: hidden; padding: 80px 0 100px; font-family: 'Poppins', sans-serif;">
    <!-- Decorative elements -->
    <div style="position: absolute; top: 10%; left: 5%; width: 30px; height: 30px; opacity: 0.15; font-size: 38px; transform: rotate(15deg); z-index: 1;">🐾</div>
    <div style="position: absolute; top: 20%; right: 10%; width: 40px; height: 40px; opacity: 0.12; font-size: 42px; transform: rotate(-10deg); z-index: 1;">🐾</div>
    <div style="position: absolute; bottom: 35%; left: 15%; width: 25px; height: 25px; opacity: 0.1; font-size: 34px; transform: rotate(25deg); z-index: 1;">🐾</div>
    <div style="position: absolute; top: 60%; right: 8%; width: 20px; height: 20px; opacity: 0.08; font-size: 32px; transform: rotate(-20deg); z-index: 1;">🐾</div>
    
    <!-- Decorative circles -->
    <div style="position: absolute; top: -50px; left: -38px; width: 300px; height: 250px; background: rgba(255, 69, 0, 0.1); border-radius: 50%;"></div>
    <div style="position: absolute; bottom: -100px; right: -50px; width: 300px; height: 300px; background: rgba(255, 69, 0, 0.08); border-radius: 50%;"></div>
    
    <div class="container px-4 mx-auto max-w-6xl relative z-10">
        <!-- Main Banner Content -->
        <div class="flex flex-col md:flex-row items-center justify-between gap-14">
            <!-- Left Text Content -->
            <div class="mb-8 md:mb-0 md:w-1/2">
                <span style="display: inline-block; background-color: rgba(255, 69, 0, 0.15); color: #FF4500; padding: 6px 14px; border-radius: 50px; font-weight: 600; font-size: 14px; margin-bottom: 16px;">
                    🐶 Find Your Match
                </span>
                
                <h1 style="font-size: 44px; font-weight: 800; line-height: 1.2; margin-bottom: 20px; color: #333; text-shadow: 0 1px 2px rgba(0,0,0,0.05);">
                    Find The best <span style="color: #FF4500; position: relative; display: inline-block;">Office
                        <span style="position: absolute; bottom: 2px; left: 0; width: 100%; height: 6px; background-color: rgba(255, 69, 0, 0.2); border-radius: 10px; z-index: -1;"></span>
                    </span> <br> Dog For You
                </h1>
                
                <p style="font-size: 18px; color: #555; margin-bottom: 24px; max-width: 90%;">Find and filter our furry office companions for the perfect workplace buddy.</p>

                <div style="width: 100%; background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px); border-radius: 16px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08), 0 1px 3px rgba(0, 0, 0, 0.05); padding: 24px; border: 1px solid rgba(255, 255, 255, 0.7); margin-top: 20px; transition: transform 0.3s ease;">
                    <!-- Modified this section to be horizontal -->
                    <div class="flex flex-row items-end gap-6 w-full">
                        <!-- Breed Filter -->
                        <div style="flex: 1;">
       <label for="breed-filter" class="block text-sm font-semibold text-gray-700 mb-2" style="margin-left: 4px;">Breed</label>
      <div style="position: relative;">
        <select id="breed-filter" class="w-full rounded-lg border border-gray-200 shadow p-3 pl-4 pr-7 text-gray-700 bg-white focus:border-orange-400 focus:ring focus:ring-orange-200 focus:ring-opacity-50 transition duration-200 appearance-none" style="height: 54px;">
            <option value="" >All Breeds</option>
            <?php 
            if (!empty($allbreeds)) {
                foreach ($allbreeds as $breed_id => $breed_name) {
                    echo '<option value="' . esc_attr($breed_id) . '">' . esc_html($breed_name) . '</option>';
                }
            } else {
                echo '<option value="" disabled>No breeds found</option>';
            }
            ?>
        </select>
          <div style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); pointer-events: none; color: #FF4500; font-size: 18px;">▼</div>
    </div>
</div>


                        <!-- Allergies Filter -->
                        <div style="flex: 1;">
                            <label for="allergies-filter" class="block text-sm font-semibold text-gray-700 mb-2" style="margin-left: 4px;">Allergies</label>
                            <div style="position: relative;">
                                <select id="allergies-filter" class="w-full rounded-lg border border-gray-200 shadow p-3 pl-4 pr-7 text-gray-700 bg-white focus:border-orange-400 focus:ring focus:ring-orange-200 focus:ring-opacity-50 transition duration-200 appearance-none" style="height: 54px;">
                                    <option value="">All Dogs</option>
                                    <option value="yes">With Allergies</option>
                                    <option value="no">No Allergies</option>
                                </select>
                                <div style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); pointer-events: none; color: #FF4500; font-size: 18px;">▼</div>
                            </div>
                        </div>

                        <!-- Reset Button -->
                        <button id="reset-filters" style="background: linear-gradient(135deg, #FF4500, #FF6347); color: white; font-weight: 600; padding: 14px 24px; border-radius: 50px; display: flex; align-items: center; justify-content: center; border: none; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 6px 15px rgba(255, 69, 0, 0.25), 0 2px 4px rgba(255, 69, 0, 0.15); height: 54px;">
                            Reset Filters
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Right Image Area -->
            <div class="md:w-1/2 flex justify-center items-center relative">
                <div style="position: absolute; width: 350px; height: 350px; background: rgba(255, 69, 0, 0.08); border-radius: 50%; transform: translate(-10%, -10%);"></div>
                <div style="position: relative; transform: rotate(3deg); transition: all 0.5s ease;">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/1.jpeg" alt="Featured Dog" class="rounded-xl object-cover z-10 relative" style="width: 420px; height: 320px; border: 10px solid white; box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12), 0 5px 15px rgba(0, 0, 0, 0.07);">
                    <div style="position: absolute; top: -15px; right: -15px; background-color: #FF4500; color: white; padding: 10px 16px; border-radius: 50px; font-weight: 700; font-size: 14px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">Featured</div>
                    <div style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%); background-color: white; padding: 10px 20px; border-radius: 50px; font-weight: 600; font-size: 15px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); color: #333; width: 80%; text-align: center;">Find your perfect companion</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Wavy Bottom Border -->
    <div class="absolute bottom-0 left-0 w-full">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" fill="#ffffff">
            <path d="M0,64L60,69.3C120,75,240,85,360,80C480,75,600,53,720,48C840,43,960,53,1080,58.7L1200,64L1320,69.3L1440,64L1440,120L1320,120C1200,120,1080,120,960,120C840,120,720,120,600,120C480,120,360,120,240,120L120,120L0,120Z"></path>
        </svg>
    </div>
</div>

<div class="container mx-auto px-4 py-1">

    
    <!-- Featured Oldest Dog -->
    <?php if ($oldest_dog) : ?>
        <?php 
        $post = $oldest_dog;
        setup_postdata($post);
        get_template_part('template-parts/content-dog-featured');
        wp_reset_postdata();
        ?>
    <?php endif; ?>
    <h2 class="text-2xl font-bold mb-6 mt-4 text-gray-800">
    Our <span class="text-red-500">Furry</span> Friends
</h2>

    <!-- All Other Dogs -->
    <div id="dogs-container" class="mb-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        
        <?php foreach ($other_dogs as $post) : 
            setup_postdata($post);
            get_template_part('template-parts/content-dog-card');
        endforeach;
        wp_reset_postdata();
        ?>
    </div>
    
    <!-- No Results Message (hidden by default) -->
    <div id="no-results" class="hidden bg-gray-100 p-8 rounded-lg text-center mt-8">
        <h3 class="text-xl font-semibold text-gray-700 mb-2">No Dogs Found</h3>
        <p class="text-gray-600">No dogs match the selected filters. Try different filter options or reset filters.</p>
    </div>
</div>

<?php get_footer(); ?>
