<?php
/**
 * Template Name: Dogs Homepage
 */
get_header();
?>

<?php
/**
 * Template Name: Dogs Homepage
 */
get_header();
?>

<div class="dog-banner-wrapper " style="background: linear-gradient(135deg, #ffcef3 0%, #ffdbfd 50%, #ffe8f6 100%); position: relative; overflow: hidden; padding: 80px 0 100px; font-family: 'Poppins', sans-serif;">
    <!-- Simple birthday decorations -->
    <div style="position: absolute; top: 10%; left: 5%; font-size: 38px; transform: rotate(15deg); z-index: 1;">🎂</div>
    <div style="position: absolute; top: 20%; right: 10%; font-size: 42px; transform: rotate(-10deg); z-index: 1;">🎈</div>
    <div style="position: absolute; bottom: 35%; left: 15%; font-size: 34px; transform: rotate(25deg); z-index: 1;">🎉</div>
    <div style="position: absolute; top: 60%; right: 8%; font-size: 32px; transform: rotate(-20deg); z-index: 1;">🎁</div>
    <div style="position: absolute; bottom: 40%; right: 15%; font-size: 36px; transform: rotate(15deg); z-index: 1;">🎊</div>
    
    <!-- Simple colored dots for decoration -->
    <div style="position: absolute; top: 15%; left: 20%; width: 15px; height: 15px; background-color: #ff85d5; border-radius: 50%;"></div>
    <div style="position: absolute; top: 25%; right: 25%; width: 20px; height: 20px; background-color: #a368fc; border-radius: 50%;"></div>
    <div style="position: absolute; bottom: 30%; left: 30%; width: 12px; height: 12px; background-color: #4fc3f7; border-radius: 50%;"></div>
    <div style="position: absolute; top: 70%; right: 15%; width: 18px; height: 18px; background-color: #ffb74d; border-radius: 50%;"></div>
    
    <!-- Decorative background elements -->
    <div style="position: absolute; top: -50px; left: -38px; width: 300px; height: 250px; background: rgba(255, 105, 180, 0.15); border-radius: 50%;"></div>
    <div style="position: absolute; bottom: -100px; right: -50px; width: 300px; height: 300px; background: rgba(255, 105, 180, 0.12); border-radius: 50%;"></div>
    
    <div class="container px-4 mx-auto max-w-6xl relative z-10">
        <!-- Main Banner Content -->
        <div class="flex flex-col md:flex-row items-center justify-between gap-14">
            <!-- Left Text Content -->
            <div class="mb-8 md:mb-0 md:w-1/2">
                <!-- Ribbon style badge -->
                <div style="position: relative; display: inline-block; margin-bottom: 20px;">
                    <div style="background-color: #ff65b8; color: white; padding: 8px 20px; border-radius: 4px; font-weight: 600; font-size: 15px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                        🎂 Birthday Celebration
                    </div>
                    <div style="position: absolute; right: -10px; bottom: -10px; width: 20px; height: 20px; background-color: #ff65b8; transform: rotate(45deg); z-index: -1;"></div>
                </div>
                
                <h1 style="font-size: 46px; font-weight: 800; line-height: 1.2; margin-bottom: 20px; color: #333; text-shadow: 0 1px 2px rgba(0,0,0,0.05);">
                    Pawty <span style="color: #FF69B4; position: relative; display: inline-block;">Time
                        <span style="position: absolute; bottom: 2px; left: 0; width: 100%; height: 6px; background-color: rgba(255, 105, 180, 0.3); border-radius: 10px; z-index: -1;"></span>
                    </span> <br> With Our Dogs!
                </h1>
                
                
                <p style="font-size: 18px; color: #555; margin-bottom: 30px; max-width: 90%; line-height: 1.6;">
                    Join our adorable furry friends for a day full of treats, toys, and tail-wagging fun as we celebrate their special day!
                </p>

                <!-- Improved CTA Button -->
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('all-dogs'))); ?>" style="display: inline-flex; align-items: center; background: linear-gradient(135deg, #ff65b8, #a64aed); color: white; font-weight: 600; padding: 15px 30px; border-radius: 50px; text-decoration: none; transition: all 0.3s ease; box-shadow: 0 10px 20px rgba(255, 105, 180, 0.3); font-size: 16px;">
                    Join the Pawty!
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 8px;">
                        <path d="M5 12h14"></path>
                        <path d="M12 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>

            <!-- Right Image Area -->
            <div class="md:w-1/2 flex justify-center items-center">
                <!-- Polaroid-style frame -->
                <div style="background: white; padding: 15px 15px 40px 15px; box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15); transform: rotate(3deg); position: relative;">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/2.jpg" alt="Birthday Dog" style="width: 380px; height: 300px; object-fit: cover; display: block;">
                    
                    <!-- Birthday hat and decorations -->
                    <div style="position: absolute; top: -25px; right: -15px; font-size: 40px;">🎩</div>
                    <div style="position: absolute; top: -10px; left: -20px; font-size: 35px;">🎈</div>
                    
                    <!-- Badge -->
                    <div style="position: absolute; top: 20px; right: -10px; background-color: #ff65b8; color: white; padding: 5px 15px; transform: rotate(5deg); font-weight: 700; font-size: 14px; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
                        Birthday Star
                    </div>
                    
                    <!-- Caption -->
                    <div style="text-align: center; margin-top: 15px; font-style: italic; color: #555; font-size: 16px;">
                        Celebrating our furry friends! 🎉
                    </div>
                    
                    <!-- Decorative elements -->
                    <div style="position: absolute; bottom: 15px; left: 15px; font-size: 18px;">🐾</div>
                    <div style="position: absolute; bottom: 15px; right: 15px; font-size: 18px;">🐾</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Simple wave border instead of SVG -->
    <div class="absolute bottom-0 left-0 w-full" style="height: 50px; background: white; border-radius: 100% 100% 0 0;"></div>
</div>

<!-- Birthday Celebrations Section -->
<div class="container mx-auto px-4 py-8">
    <section class="mb-16 bg-gradient-to-br from-pink-50 to-purple-50 rounded-2xl shadow-lg p-8 border border-pink-100 relative overflow-hidden">
        <!-- Decorative elements -->
        <div class="absolute -top-10 -left-10 w-40 h-40 bg-pink-200 rounded-full opacity-20"></div>
        <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-purple-200 rounded-full opacity-20"></div>
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-pink-400 to-purple-400"></div>
        
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4 relative z-10">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-pink-500 mr-3 drop-shadow-sm animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z" />
                </svg>
                <h2 class="text-2xl font-bold bg-gradient-to-r from-pink-500 to-purple-500 bg-clip-text text-transparent drop-shadow-sm">
                    Birthday Celebrations This Month
                </h2>
            </div>
            
            <div class="bg-gradient-to-r from-pink-500 to-purple-500 text-white px-6 py-3 rounded-full font-semibold shadow-md flex items-center transform hover:scale-105 transition-transform duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <?php echo date('F Y'); ?>
            </div>
        </div>
        
        <?php
        $birthday_dogs = get_birthday_dogs();
        
        if (!empty($birthday_dogs)) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 relative z-10">
                <?php foreach ($birthday_dogs as $post) :
                    setup_postdata($post);
                    get_template_part('template-parts/content-dog-birthday');
                endforeach;
                wp_reset_postdata();
                ?>
            </div>
        <?php else : ?>
            <div class="bg-white/70 backdrop-blur-sm p-10 rounded-xl text-center border border-pink-200 shadow-inner relative z-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-pink-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">No Birthdays This Month</h3>
                <p class="text-gray-600">None of our office dogs have birthdays in <?php echo date('F'); ?>.</p>
            </div>
        <?php endif; ?>

        <!-- Decorative confetti elements -->
        <div class="absolute top-10 right-10 w-3 h-8 bg-yellow-400 rounded-full transform rotate-12"></div>
        <div class="absolute top-20 right-20 w-4 h-4 bg-pink-400 rounded-sm transform rotate-45"></div>
        <div class="absolute bottom-10 left-10 w-6 h-2 bg-purple-400 rounded-full transform -rotate-12"></div>
        <div class="absolute bottom-20 left-40 w-3 h-3 bg-blue-400 rounded-full"></div>
    </section>
</div>

<?php get_footer(); ?>

