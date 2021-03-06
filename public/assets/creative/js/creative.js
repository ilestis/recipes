(function($) {
    "use strict"; // Start of use strict

    // jQuery for page scrolling feature - requires jQuery Easing plugin
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
        }, 1250, 'easeInOutExpo');
        event.preventDefault();
    });

    // Highlight the top nav as scrolling occurs
    $('body').scrollspy({
        target: '.navbar-fixed-top',
        offset: 51
    });

    // Closes the Responsive Menu on Menu Item Click
    $('.navbar-collapse ul li a:not(.dropdown-toggle)').click(function() {
        $('.navbar-toggle:visible').click();
    });

    // Offset for Main Navigation
    $('#mainNav').affix({
        offset: {
            top: 100
        }
    });

    // Initialize and Configure Scroll Reveal Animation
    window.sr = ScrollReveal();

    if ($('.sr-icons').length) {
        sr.reveal('.sr-icons', {
            duration: 600,
            scale: 0.3,
            distance: '0px'
        }, 200);
    }

    if ($('.sr-button').length) {
        sr.reveal('.sr-button', {
            duration: 1000,
            delay: 200
        });
    }

    if ($('.sr-contact').length) {
        sr.reveal('.sr-contact', {
            duration: 600,
            scale: 0.3,
            distance: '0px'
        }, 300);
    }

})(jQuery); // End of use strict
