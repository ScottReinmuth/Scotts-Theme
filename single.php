<?php get_header(); ?>

<?php
if ($sts_redux['blog_layout'] == '1'){
   get_template_part('/templates/blog/default');
}if ($sts_redux['blog_layout'] == '2'){
   get_template_part('/templates/blog/no-sidebar');
} ?>

<?php get_footer(); ?>
