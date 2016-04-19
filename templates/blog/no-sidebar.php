<div id="main-body">
    <div class="container main-wrapper">
        <div class="row">
            <div class="content-wrapper col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <div class="post-meta-container clearfix" style="<?php if(has_post_thumbnail()){
                          echo 'background: linear-gradient( rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url(';
                          the_post_thumbnail_url();
                          echo ') no-repeat; background-size: cover;';
                        }else{
                          echo '';
                        }?>">
                                    <div class="post-meta-title">
                                        <h1><?php wp_title(''); ?></h1>
                                    </div>
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
                                    <?php if( has_tag() ){ ?>
                                      <div class="post-tags-container">
                                          <?php the_tags('<span class="fa fa-tag post-tags"></span>','<span class="fa fa-tag post-tags"></span>',''); ?>
                                      </div>
                                    <?php }else{ ?>
                                      <div class="post-tags-container">
                                        <p>This Post Has No Tags</p>
                                      </div>
                                      <?php } ?>
                        </div>
                        <div <?php post_class( array( 'class'=>'post-content'));?>>
                            <?php the_content(); ?>
                                <?php wp_link_pages(); ?>
                                    <?php comments_template(); ?>
                        </div>
                        <?php endwhile; ?>
                            <?php endif; ?>
            </div>
        </div>
    </div>
</div>
