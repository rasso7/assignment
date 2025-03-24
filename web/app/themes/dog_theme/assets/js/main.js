/**
 * Main JavaScript file
 */
(function($) {
    'use strict';
    
    // Document ready
    $(document).ready(function() {
        // Add animation to cards on hover
        $('.dog-card, .birthday-dog-card').hover(
            function() {
                $(this).addClass('shadow-lg');
            },
            function() {
                $(this).removeClass('shadow-lg');
            }
        );
        
        // Smooth scroll to elements
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            
            $('html, body').animate({
                scrollTop: $($(this).attr('href')).offset().top - 100
            }, 500);
        });
    });
    
})(jQuery);
