<?php
$options = get_option('sts_settings');
?>

<style type="text/css">
    /* Header Styles */

    header,
    #mobile-nav {
        background-color: <?php echo get_option('header_background_color') ?>;
    }

    header .site-title > a,
    header a,
    header a:hover,
    #menu-main-menu-button-mobile,
    .mobile-menu-title,
    .menu-main-menu-container-mobile ul li a,
    .menu-main-menu-container-mobile ul .menu-item-has-children > a:after,
    nav .menu-main-menu-container #menu-main-menu > li.open > a,
    nav .menu-main-menu-container #menu-main-menu > li > a {
        color: <?php echo get_option('header_font_color') ?>;
    }
    /* Main Navigation Styles */

    nav .menu-main-menu-container #menu-main-menu .menu-item-has-children .sub-menu,
    .title-wrapper,
    .post-meta-container,
    .btn,
    input[type="submit"],
    .mobile-menu-title,
    .menu-main-menu-container-mobile ul li .sub-menu {
        background-color: <?php echo get_option('theme_primary_color') ?>;
    }

    nav #menu-main-menu > li.current-menu-item > a,
    nav .menu-main-menu-container #menu-main-menu > li > a:hover,
    nav .menu-main-menu-container #menu-main-menu > li.open > a {
        border-bottom: 2px solid <?php echo get_option('theme_primary_color') ?>;
    }
    /* Button Styling */

    .btn {
        color: <?php echo get_option('button_text_color') ?> !important;
        background-color: <?php echo get_option('button_color') ?>;
    }

    .btn:hover {
        background-color: <?php echo get_option('button_hover_color') ?>;
    }

    .content-wrapper a {
        color: <?php echo get_option('theme_primary_color') ?>;
    }

    a {
        color: <?php echo get_option('link_color') ?>;
    }

    a:hover {
        color: <?php echo get_option('link_hover_color') ?>;
    }

    header{
      background: <?php echo $options['theme_primary_color']; ?> !important;
    }
</style>
