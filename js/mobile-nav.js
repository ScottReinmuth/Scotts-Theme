jQuery(document).ready(function () {
    jQuery("#menu-main-menu-button-mobile").click(function () {
        jQuery("#mobile-nav").slideToggle("slow");
    });
});

jQuery(document).ready(function () {
    jQuery("#mobile-nav .menu-main-menu-container-mobile #menu-main-menu-mobile .menu-item-has-children").click(function () {
        jQuery(this).children(".sub-menu").slideToggle("slow");
    });
});