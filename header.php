<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <title>
        <?php if ( is_front_page() ){
    echo ( get_bloginfo( 'title ') );
} else{
    wp_title('');
}?>
    </title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
    <div class="sticky-header-container"></div>
    <header>
        <div id="main-header-container" class="container">
            <div class="row">
                <div class="site-title-container col-xs-9 col-sm-9 col-md-9 col-lg-4 col-xl-4">
                    <?php if ( has_header_image() ) { ?>
                        <img src="<?php echo( get_header_image() ); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" class="img-responsive" />
                        <?php } else{?>
                            <h1 class="site-title"><a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></h1>
                            <?php } ?>
                </div>
                <div class="header-nav-container col-xs-3 col-sm-3 col-md-3 col-lg-8 col-xl-8">
                    <span id="menu-main-menu-button-mobile" class="fa fa-bars fa-3x" role="button" aria-hidden="true"></span>
                    <nav>
                        <?php wp_nav_menu( array('menu'=>'primary', 'container_class'=>'menu-main-menu-container', 'menu_id'=>'menu-main-menu', 'menu_class'=>'clearfix')); ?>
                    </nav>
                    <!-- nav -->
                </div>
            </div>
        </div>
        <!-- container div -->

        <!-- Start Mobile Nav -->
        <nav id="mobile-nav">
            <p class="mobile-menu-title">Menu</p>
            <?php wp_nav_menu( array('menu'=>'primary', 'container_class'=>'menu-main-menu-container-mobile', 'menu_id'=>'menu-main-menu-mobile', 'menu_class'=>'clearfix')); ?>
        </nav>
        <!-- End Mobile Nav -->
    </header>
    <!-- End Header-->
