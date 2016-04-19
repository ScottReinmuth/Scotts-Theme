<?php get_header(); ?>
    <div id="main-body">
        <?php if( is_front_page() ){
    echo('');
} else{ ?>
            <div class="title-wrapper">
                <div class="container">
                    <div class="page-title-container">
                        <h1><?php wp_title(''); ?></h1>
                    </div>
                </div>
            </div>
            <?php } ?>
                <div class="container main-wrapper">
                    <div class="row">
                        <div class="content-wrapper col-xs-12 col-sm-12 col-md-12 col-lg-9">
                            <?php if ( have_posts() ) : ?>
                                <?php while ( have_posts() ) : the_post(); ?>
                                    <div <?php post_class( array( 'class'=>'page-content'));?>>
                                        <?php the_content(); ?>
                                    </div>
                                    <?php endwhile; ?>
                                        <?php endif; ?>
                        </div>
                        <div class="widget-wrapper col-xs-12 col-sm-12 col-md-12 col-lg-3">
                            <?php get_sidebar('main-sidebar'); ?>
                        </div>
                    </div>
                </div>
    </div>
    <?php get_footer(); ?>
