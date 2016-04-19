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
                                    <div <?php post_class( array( 'class'=>'post-content wow animated fadeInUp'));?> data-wow-duration="1.5s">
                                        <?php if( has_post_thumbnail() ){ ?>
                                          <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('', array('class'=>'img-rounded post-meta-image'));?></a>
                                          <?php } ?>
                                        <div class="post-meta-title"><a href="<?php the_permalink(); ?>"><?php the_title('<h2 class="post-title">', '</h2>'); ?></a></div>
                                        <?php the_excerpt(); ?>
                                            <div class="post-meta-container clearfix">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                        <div class="post-meta">
                                                            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>"><?php echo get_avatar(get_the_author_meta('ID'), 50, '', '', array('class'=>'author-img-meta img-rounded'));?>
                                                            <div class="author-name-meta">
                                                                <?php the_author(); ?>
                                                            </div>
                                                        </a>
                                                        </div>
                                                        <div class="post-meta">
                                                            <p>
                                                                <span class="fa fa-calendar"></span>
                                                                <?php echo get_the_date(); ?>
                                                            </p>
                                                        </div>
                                                        <div class="post-meta">
                                                            <p>
                                                                <span class="fa fa-comments"></span>
                                                                <?php meta_comments(); // Located In Functions.php ?>
                                                            </p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <?php if( has_tag() ){ ?>
                                              <div class="post-tags-container">
                                                  <?php the_tags('<span class="fa fa-tag post-tags"></span>','<span class="fa fa-tag post-tags"></span>',''); ?>
                                              </div>
                                            <?php } ?>
                                    </div>
                                    <?php endwhile; ?>
                                        <?php endif; ?>
                                            <div id="pagination-container">
                                                <?php echo wp_bootstrap_pagination(); ?>
                                            </div>
                        </div>
                        <div class="widget-wrapper col-xs-12 col-sm-12 col-md-12 col-lg-3">
                            <?php get_sidebar('main-sidebar'); ?>
                        </div>
                    </div>
                </div>
    </div>
    <?php get_footer(); ?>
