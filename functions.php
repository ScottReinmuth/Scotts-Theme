<?php
function scotts_theme_styles(){
    wp_enqueue_style('main_css', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('google_jquery_ui_css', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css');
    wp_enqueue_style('bootstrap4_css', 'https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css');
}
add_action('wp_enqueue_scripts', 'scotts_theme_styles');

function scotts_theme_js(){
    wp_enqueue_script('bootstrap4_js', 'https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js', '', '', true);
    wp_enqueue_script('mobile_nav_js', get_template_directory_uri() . '/js/mobile-nav.js', '', '', true);
    wp_enqueue_script('theme_js', get_template_directory_uri() . '/js/theme-js.js', '', '', true);
    wp_enqueue_script('google_jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js','','');
    wp_enqueue_script('google_jquery_ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js', '', '', true);
    wp_enqueue_script('wow_js', get_template_directory_uri() . '/js/wow.min.js', '', '', true);
}
add_action('wp_enqueue_scripts', 'scotts_theme_js');


function scotts_admin_scripts(){
    wp_enqueue_script('scotts-theme-settings-js', get_template_directory_uri() . '/theme-settings/theme-settings-page-js.js' );
    wp_enqueue_script('wp-color-picker');
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_style('theme-settings-styles', get_template_directory_uri() . '/theme-settings/theme-settings-styling.css');

}
add_action('admin_enqueue_scripts', 'scotts_admin_scripts');



// Add theme support
function scotts_theme_add_theme_support(){
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('custom-header');
add_theme_support('custom-background', array('default-color'=>'f9f9f9', 'default-repeat'=>'no'));
add_theme_support('automatic-feed-links');
add_theme_support('title-tag');
}
add_action('after_setup_theme', 'scotts_theme_add_theme_support');

// Register Nav Menus
register_nav_menu('primary', 'Primary Menu For Theme');

// Register custom sidbars
function scotts_theme_register_sidebars(){
register_sidebar( array('name'=>'Main Sidebar', 'id'=>'main-sidebar', 'before_widget'=>'<div class="widget">', 'after_widget'=>'</div>', 'before_title'=>'<h3 class="widget-title">', 'after_title'=>'</h3>') );
register_sidebars(4, array( 'name'=>'Footer Widget %d', 'id'=>'footer-widget-%d', 'before_widget'=>'<div id="footer-%1$s" class="footer-%2$s footer-sidebar">', 'after_widget'=>'</div>', 'before_title'=>'<h3 class="footer-widget-title">', 'after_title'=>'</h3>' ));
}
add_action('widgets_init', 'scotts_theme_register_sidebars');

// Custom Pagenation For Blog Page
function wp_bootstrap_pagination( $args = array() ) {

    $defaults = array(
        'range'           => 4,
        'custom_query'    => FALSE,
        'previous_string' => __( 'Previous', 'text-domain' ),
        'next_string'     => __( 'Next', 'text-domain' ),
        'before_output'   => '<ul class="pagination">',
        'after_output'    => '</ul>'
    );

    $args = wp_parse_args(
        $args,
        apply_filters( 'wp_bootstrap_pagination_defaults', $defaults )
    );

    $args['range'] = (int) $args['range'] - 1;
    if ( !$args['custom_query'] )
        $args['custom_query'] = @$GLOBALS['wp_query'];
    $count = (int) $args['custom_query']->max_num_pages;
    $page  = intval( get_query_var( 'paged' ) );
    $ceil  = ceil( $args['range'] / 2 );

    if ( $count <= 1 )
        return FALSE;

    if ( !$page )
        $page = 1;

    if ( $count > $args['range'] ) {
        if ( $page <= $args['range'] ) {
            $min = 1;
            $max = $args['range'] + 1;
        } elseif ( $page >= ($count - $ceil) ) {
            $min = $count - $args['range'];
            $max = $count;
        } elseif ( $page >= $args['range'] && $page < ($count - $ceil) ) {
            $min = $page - $ceil;
            $max = $page + $ceil;
        }
    } else {
        $min = 1;
        $max = $count;
    }

    $echo = '';
    $previous = intval($page) - 1;
    $previous = esc_attr( get_pagenum_link($previous) );

    $firstpage = esc_attr( get_pagenum_link(1) );
    if ( $firstpage && (1 != $page) )
        $echo .= '<li class="previous"><a href="' . $firstpage . '">' . __( 'First', 'text-domain' ) . '</a></li>';

    if ( $previous && (1 != $page) )
        $echo .= '<li><a href="' . $previous . '" title="' . __( 'previous', 'text-domain') . '">' . $args['previous_string'] . '</a></li>';

    if ( !empty($min) && !empty($max) ) {
        for( $i = $min; $i <= $max; $i++ ) {
            if ($page == $i) {
                $echo .= '<li class="active"><span class="active">' . str_pad( (int)$i, 2, '0', STR_PAD_LEFT ) . '</span></li>';
            } else {
                $echo .= sprintf( '<li><a href="%s">%002d</a></li>', esc_attr( get_pagenum_link($i) ), $i );
            }
        }
    }

    $next = intval($page) + 1;
    $next = esc_attr( get_pagenum_link($next) );
    if ($next && ($count != $page) )
        $echo .= '<li><a href="' . $next . '" title="' . __( 'next', 'text-domain') . '">' . $args['next_string'] . '</a></li>';

    $lastpage = esc_attr( get_pagenum_link($count) );
    if ( $lastpage ) {
        $echo .= '<li class="next"><a href="' . $lastpage . '">' . __( 'Last', 'text-domain' ) . '</a></li>';
    }

    if ( isset($echo) )
        echo $args['before_output'] . $echo . $args['after_output'];
}


// End Custom Pagination

// Add Disqus Comments Count Functionality
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
function meta_comments(){
    if ( is_plugin_active('disqus-comment-system/disqus.php') ){
        // If Disqus plugin is active
        echo '<span class="disqus-comment-count" data-disqus-url="';
        echo the_permalink() . '#disqus_thread';
        echo '"></span>';
    }else{
        // If Disqus plugin is inactive
        echo comments_number('0 Comments','1 Comment','% Comments');
    }
}
// End Disqus Comments Count Functionality

// Custom Exerpt Length
function custom_excerpt_length() {
    return 250;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
// End Custom Exerpt Length

// Include Theme Options
require_once(get_template_directory() . '/theme-settings/theme-settings.php');
add_action('wp_head', 'my_custom_css');
    function my_custom_css(){
    require_once( get_template_directory() . '/css/theme-styles.php' );
}
// End Include Theme Options
?>
