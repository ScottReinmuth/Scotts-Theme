// Responsive YouTube Embeds
jQuery("iframe[src^='https://www.youtube.com/embed']").wrapAll('<div class="embed-responsive embed-responsive-16by9">');
jQuery("iframe[src^='https://www.youtube.com/embed']").addClass('embed-responsive-item');
// End Responsive YouTube Embeds

// Responsive Images
jQuery('img').addClass('img-fluid');
// End Responsive Images

// Corrective Action On <input typ="submit" /> Buttons
jQuery(':submit').addClass('btn');

// Bootstrap Navigation
if (jQuery('.header-nav-container nav .menu-main-menu-container ul li').hasClass('menu-item-has-children')) {
    jQuery('.header-nav-container .menu-item-has-children').addClass('dropdown');
    jQuery('.header-nav-container .menu-item-has-children > .sub-menu').addClass('dropdown-menu');
    jQuery('.header-nav-container .menu-item-has-children > a').on('click', function() {
        'use strict';
        jQuery('.header-nav-container .menu-item-has-children > .sub-menu').slideToggle();
    });
}

// Call WOW.js http://mynameismatthieu.com/WOW/docs.html
jQuery(function() {

    'use strict';
    new WOW().init();

});