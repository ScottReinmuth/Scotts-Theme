<?php get_header(); ?>

<?php $options = get_option('sts_settings');
if ($options['sts_select_blog_template'] == '1'){
   get_template_part('/templates/blog/default');
}if ($options['sts_select_blog_template'] == '2'){
   get_template_part('/templates/blog/no-sidebar');
} ?>

<?php get_footer(); ?>
