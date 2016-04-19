<?php
// create custom plugin settings menu
add_action('admin_menu', 'scotts_theme_options_create_menu');

function scotts_theme_options_create_menu() {

    //create new top-level menu
    add_menu_page('Scotts Theme Settings', 'Theme Settings', 'administrator', __FILE__, 'scotts_theme_options' );

    //call register settings function
    add_action( 'admin_init', 'register_scotts_theme_options_settings' );
}


function register_scotts_theme_options_settings() {
    //register our settings
    register_setting('scotts-theme-options-group', 'theme_primary_color');
    register_setting( 'scotts-theme-options-group', 'header_background_color' );
    register_setting( 'scotts-theme-options-group', 'header_font_color' );
    register_setting( 'scotts-theme-options-group', 'link_color' );
    register_setting( 'scotts-theme-options-group', 'link_hover_color' );
    register_setting( 'scotts-theme-options-group', 'button_color' );
    register_setting( 'scotts-theme-options-group', 'button_hover_color' );
    register_setting( 'scotts-theme-options-group', 'button_text_color' );
    register_setting( 'scotts-theme-options-group', 'blog_layout[layout]' );
}

function scotts_theme_options() {
?>
    <div class="wrap">
        <h2>Scott's Theme Settings</h2>

        <form method="post" action="options.php">
            <?php settings_fields( 'scotts-theme-options-group' ); ?>
                <?php do_settings_sections( 'scotts-theme-options-group' ); ?>
                    <table class="form-table">
                        <tr>
                            <th>Primary Theme Color</th>
                            <td>
                                <input type="text" name="theme_primary_color" class="color-picker" value="<?php echo esc_attr__( get_option('theme_primary_color') ); ?>" />
                            </td>
                        </tr>
                    </table>
                    <h2>Header Settings</h2>
                    <table class="form-table">
                        <tr valign="top">
                            <th scope="row">Header Background</th>
                            <td>
                                <input type="text" name="header_background_color" class="color-picker" data-default-color="#202121" value="<?php echo esc_attr( get_option('header_background_color') ); ?>" />
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">Header Font Color</th>
                            <td>
                                <input type="text" name="header_font_color" class="color-picker" data-default-color="#ffffff" value="<?php echo esc_attr( get_option('header_font_color') ); ?>" />
                            </td>
                        </tr>

                    </table>
                    <h2>Link Settings</h2>
                    <table class="form-table">
                        <tr valign="top">
                            <th scope="row">Link Color</th>
                            <td>
                                <input type="text" name="link_color" class="color-picker" value="<?php echo esc_attr( get_option('link_color') ); ?>" />
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row">Link Hover Color</th>
                            <td>
                                <input type="text" name="link_hover_color" class="color-picker" value="<?php echo esc_attr( get_option('link_hover_color') ); ?>" />
                            </td>
                        </tr>
                    </table>
                    <h2>Button Settings</h2>
                    <table class="form-table">
                        <tr valign="top">
                            <th scope="row">Button Color</th>
                            <td>
                                <input type="text" name="button_color" class="color-picker" value="<?php echo esc_attr( get_option('button_color') ); ?>" />
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row">Button Hover Color</th>
                            <td>
                                <input type="text" name="button_hover_color" class="color-picker" value="<?php echo esc_attr( get_option('button_hover_color') ); ?>" />
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row">Button Text Color</th>
                            <td>
                                <input type="text" name="button_text_color" class="color-picker" value="<?php echo esc_attr( get_option('button_text_color') ); ?>" />
                            </td>
                        </tr>
                    </table>

                    <?php submit_button(); ?>

        </form>
    </div>
    <?php } ?>

<!-- New Options Page Template -->
<?php
add_action( 'admin_menu', 'sts_add_admin_menu' );
add_action( 'admin_init', 'sts_settings_init' );


function sts_add_admin_menu(  ) {

add_menu_page( 'Theme Settings', 'Theme Settings', 'manage_options', 'theme_settings', 'theme_settings_options_page' );

}


function sts_settings_init(  ) {

register_setting( 'theme-settings-page', 'sts_settings' );

// Page Layout Options
add_settings_section(
	'sts_theme_settings_page_section',
	'Layout Options',
	'',
	'theme-settings-page'
);

add_settings_field(
	'sts_select_blog_template',
	'Blog Layout',
	'sts_select_blog_template_render',
	'theme-settings-page',
	'sts_theme_settings_page_section'
);
// End Page Layout Options

// Theme Color Options
add_settings_section(
  'sts_color_styles_section',
  'Color Styling Options',
  '',
  'theme-settings-page'
);
add_settings_field(
  'sts_primary_color',
  'Primary Theme Color',
  'sts_primary_color_render',
  'theme-settings-page',
  'sts_color_styles_section'
);

add_settings_field(
  'sts_secondary_color',
  'Secondary Theme Color',
  'sts_secondary_color_render',
  'theme-settings-page',
  'sts_color_styles_section'
);
add_settings_field(
  'sts_header_background_color',
  'Header Background Color',
  'sts_header_background_color_render',
  'theme-settings-page',
  'sts_color_styles_section'
);
add_settings_field(
  'sts_header_font_color',
  'Header Font Color',
  'sts_header_font_color_render',
  'theme-settings-page',
  'sts_color_styles_section'
);
add_settings_field(
  'sts_link_color',
  'Link Color',
  'sts_link_color_render',
  'theme-settings-page',
  'sts_color_styles_section'
);
add_settings_field(
  'sts_link_hover_color',
  'Link Hover Color',
  'sts_link_hover_color_render',
  'theme-settings-page',
  'sts_color_styles_section'
);
add_settings_field(
  'sts_button_color',
  'Button Color',
  'sts_button_color_render',
  'theme-settings-page',
  'sts_color_styles_section'
);
add_settings_field(
  'sts_button_hover_color',
  'Button Hover Color',
  'sts_button_hover_color_render',
  'theme-settings-page',
  'sts_color_styles_section'
);
add_settings_field(
  'sts_button_font_color',
  'Button Font Color',
  'sts_button_font_color_render',
  'theme-settings-page',
  'sts_color_styles_section'
);
// End Theme Color Options


}


function sts_select_blog_template_render(  ) {

	$options = get_option( 'sts_settings' );
	?>
	<select name='sts_settings[sts_select_blog_template]'>
		<option value='1' <?php selected( $options['sts_select_blog_template'], 1 ); ?>>Default</option>
		<option value='2' <?php selected( $options['sts_select_blog_template'], 2 ); ?>>No Sidebar</option>
	</select>
<?php } ?>

<?php function sts_primary_color_render(){
$options = get_option('sts_settings'); ?>
  <input type="text" class="color-picker" name="sts_settings[theme_primary_color]" value="<?php echo esc_attr( $options['theme_primary_color'] ); ?>" data-default-color="#1e73be" />
<?php } ?>
<?php function sts_secondary_color_render(){
$options = get_option('sts_settings'); ?>
  <input type="text" class="color-picker" name="sts_settings[theme_secondary_color]" value="<?php echo esc_attr( $options['theme_secondary_color'] ); ?>" data-default-color="#1e73be" />
<?php } ?>
<?php function sts_header_background_color_render(){
$options = get_option('sts_settings'); ?>
  <input type="text" class="color-picker" name="sts_settings[theme_header_background_color]" value="<?php echo esc_attr( $options['theme_header_background_color'] ); ?>" data-default-color="#1e73be" />
<?php } ?>
<?php function sts_header_font_color_render(){
$options = get_option('sts_settings'); ?>
  <input type="text" class="color-picker" name="sts_settings[theme_header_font_color]" value="<?php echo esc_attr( $options['theme_header_font_color'] ); ?>" data-default-color="#1e73be" />
<?php } ?>
<?php function sts_link_color_render(){
$options = get_option('sts_settings'); ?>
  <input type="text" class="color-picker" name="sts_settings[theme_link_color]" value="<?php echo esc_attr( $options['theme_link_color'] ); ?>" data-default-color="#1e73be" />
<?php } ?>
<?php function sts_link_hover_color_render(){
$options = get_option('sts_settings'); ?>
  <input type="text" class="color-picker" name="sts_settings[theme_link_hover_color]" value="<?php echo esc_attr( $options['theme_link_hover_color'] ); ?>" data-default-color="#1e73be" />
<?php } ?>
<?php function sts_button_color_render(){
$options = get_option('sts_settings'); ?>
  <input type="text" class="color-picker" name="sts_settings[theme_button_color]" value="<?php echo esc_attr( $options['theme_button_color'] ); ?>" data-default-color="#1e73be" />
<?php } ?>
<?php function sts_button_hover_color_render(){
$options = get_option('sts_settings'); ?>
  <input type="text" class="color-picker" name="sts_settings[theme_button_hover_color]" value="<?php echo esc_attr( $options['theme_button_hover_color'] ); ?>" data-default-color="#1e73be" />
<?php } ?>
<?php function sts_button_font_color_render(){
$options = get_option('sts_settings'); ?>
  <input type="text" class="color-picker" name="sts_settings[theme_button_font_color]" value="<?php echo esc_attr( $options['theme_button_font_color'] ); ?>" data-default-color="#1e73be" />
<?php } ?>

<?php
function theme_settings_options_page(  ) {

	?>
<div class="wrap">
	<form action='options.php' method='post'>
		<h1>Theme Settings</h1>
		<?php
		settings_fields( 'theme-settings-page' );
		do_settings_sections( 'theme-settings-page' );
    ?>
		<?php submit_button(); ?>
	</form>
</div>

	<?php

}

?>
