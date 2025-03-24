<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="bg-gray-800 text-white">
    <div class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('all-dogs'))); ?>" class="text-[15px] font-bold flex items-center">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Logo" class="h-8 mr-1">
                    <?php bloginfo('name'); ?>
                </a>
            </div>
            
            <nav class="hidden md:block">
                <ul class="flex space-x-6 uppercase font-medium text-sm">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>" class="hover:underline text-sm">HOME</a></li>
                    <li><a href="<?php echo esc_url(home_url('/about-us')); ?>" class="hover:underline">ABOUT US</a></li>
                    <li class="relative group">
                        <a href="#" class="hover:underline flex items-center">
                            SERVICES
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </a>
                        <div class="absolute left-0 mt-2 w-48 bg-white text-gray-800 rounded shadow-lg hidden group-hover:block z-10">
                            <?php
                            // If you're using a submenu for services, you would use wp_nav_menu here
                            // For now, I'll include a simple placeholder list
                            ?>
                            <ul class="py-2">
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Service 1</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Service 2</a></li>
                                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Service 3</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="<?php echo esc_url(home_url('/resources')); ?>" class="hover:underline">RESOURCES</a></li>
                    <li><a href="<?php echo esc_url(home_url('/contact-us')); ?>" class="hover:underline">CONTACT US</a></li>
                </ul>
            </nav>
            
            <div class="md:hidden">
                <button id="mobile-menu-toggle" class="text-white focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
        
        <!-- Mobile menu (hidden by default) -->
        <div id="mobile-menu" class="hidden mt-4 pb-4 md:hidden">
            <ul class="flex flex-col space-y-2">
                <li><a href="<?php echo esc_url(home_url('/')); ?>" class="block px-2 py-1 hover:bg-gray-700 rounded">HOME</a></li>
                <li><a href="<?php echo esc_url(home_url('/about-us')); ?>" class="block px-2 py-1 hover:bg-gray-700 rounded">ABOUT US</a></li>
                <li>
                    <button class="flex justify-between items-center w-full px-2 py-1 hover:bg-gray-700 rounded" onclick="toggleServiceMenu()">
                        SERVICES
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul id="mobile-services-submenu" class="hidden pl-4 mt-1 space-y-1">
                        <li><a href="#" class="block px-2 py-1 hover:bg-gray-700 rounded">Service 1</a></li>
                        <li><a href="#" class="block px-2 py-1 hover:bg-gray-700 rounded">Service 2</a></li>
                        <li><a href="#" class="block px-2 py-1 hover:bg-gray-700 rounded">Service 3</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo esc_url(home_url('/resources')); ?>" class="block px-2 py-1 hover:bg-gray-700 rounded">RESOURCES</a></li>
                <li><a href="<?php echo esc_url(home_url('/contact-us')); ?>" class="block px-2 py-1 hover:bg-gray-700 rounded">CONTACT US</a></li>
            </ul>
        </div>
    </div>
</header>

<script>
    document.getElementById('mobile-menu-toggle').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });
    
    function toggleServiceMenu() {
        const submenu = document.getElementById('mobile-services-submenu');
        submenu.classList.toggle('hidden');
    }
</script>

<main class="site-main">