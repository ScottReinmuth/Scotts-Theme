<?php get_header(); ?>

<?php
$layout_options = get_option('sts_layout_options');
if ($layout_options['sts_select_blog_template'] == '1'){
   get_template_part('/templates/blog/default');
}if ($layout_options['sts_select_blog_template'] == '2'){
   get_template_part('/templates/blog/no-sidebar');
} ?>

<?php get_footer(); ?>
