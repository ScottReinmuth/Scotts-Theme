<footer>
  <div class="footer-widgets-container">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                <?php dynamic_sidebar('footer-widget-1'); ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                <?php dynamic_sidebar('footer-widget-2'); ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                <?php dynamic_sidebar('footer-widget-3'); ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                <?php dynamic_sidebar('footer-widget-4'); ?>
            </div>
        </div>
    </div>
    <div class="footer-copywrite">
        <?php date('y'); ?> &copy; Copywrite
            <a href="<?php echo home_url('/'); ?>">Scott Reinmuth</a>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
    </body>
    </html>
