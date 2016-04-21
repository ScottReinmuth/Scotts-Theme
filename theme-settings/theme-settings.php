<?php
//Enqueue Nessesary Scripts
function scotts_admin_scripts(){
    wp_enqueue_script('scotts-theme-settings-js', get_template_directory_uri() . '/theme-settings/theme-settings-page-js.js', '','', true );
    wp_enqueue_script('wp-color-picker');
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_style('theme-settings-styles', get_template_directory_uri() . '/theme-settings/theme-settings-styling.css');
    wp_enqueue_style('jquery');
    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('jquery-ui-tabs');
}
add_action('admin_enqueue_scripts', 'scotts_admin_scripts');

// create custom plugin settings menu
add_action('admin_menu', 'scotts_theme_options_create_menu');

function scotts_theme_options_create_menu() {

    //create new top-level menu
    add_menu_page('Scotts Theme Settings', 'Theme Settings', 'administrator', 'theme-settings-page', 'scotts_theme_options' );

    //call register settings function
    add_action( 'admin_init', 'register_scotts_theme_options_settings' );
}

function register_scotts_theme_options_settings() {
    //register our settings
    register_setting('scotts-theme-options-group', 'sts_theme_colors');
    register_setting('scotts-theme-options-group', 'sts_layout_options');
}

function scotts_theme_options() {

$colors = get_option('sts_theme_colors');
$layout_options = get_option('sts_layout_options');
?>
    <div class="wrap">
        <h2>Scott's Theme Settings</h2>

        <form method="post" action="options.php">
            <?php settings_fields( 'scotts-theme-options-group' ); ?>
                <?php do_settings_sections( 'scotts-theme-options-group' ); ?>
                <div id="tabs" class="clearfix">
                  <ul>
                    <li><a href="#theme-color-settings">Theme Color Settings</a></li>
                    <li><a href="#header-settings">Header Settings</a></li>
                    <li><a href="#link-settings">Link Settings</a></li>
                    <li><a href="#button-settings">Button Settings</a></li>
                    <li><a href="#layout-settings">Layout Settings</a></li>
                  </ul>
                  <div id="theme-color-settings">
                    <h2>Theme Color Settings</h2>
                    <div class="settings-option">
                      <h4 class="option-title">Primary Theme Color</h4>
                      <input type="text" name="sts_theme_colors[primary_theme_color]" class="color-picker" value="<?php echo esc_attr__( $colors['primary_theme_color'] ); ?>" />
                    </div>
                  </div>
                    <div id="header-settings">
                    <h2>Header Settings</h2>
                    <table>
                        <tr class="settings-option">
                            <th>Header Background</th>
                            <td>
                                <input type="text" name="sts_theme_colors[header_background_color]" class="color-picker" data-default-color="#202121" value="<?php echo esc_attr( $colors['header_background_color'] ); ?>" />
                            </td>
                        </tr>
                        <tr class="settings-option">
                            <th>Header Font Color</th>
                            <td>
                                <input type="text" name="sts_theme_colors[header_font_color]" class="color-picker" data-default-color="#ffffff" value="<?php echo esc_attr( $colors['header_font_color'] ); ?>" />
                            </td>
                        </tr>
                    </table>
                  </div>
                  <div id="link-settings">
                    <h2>Link Settings</h2>
                    <table>
                        <tr>
                            <th>Link Color</th>
                            <td>
                                <input type="text" name="sts_theme_colors[link_color]" class="color-picker" value="<?php echo esc_attr( $colors['link_color'] ); ?>" />
                            </td>
                        </tr>

                        <tr>
                            <th>Link Hover Color</th>
                            <td>
                                <input type="text" name="sts_theme_colors[link_hover_color]" class="color-picker" value="<?php echo esc_attr( $colors['link_hover_color'] ); ?>" />
                            </td>
                        </tr>
                    </table>
                  </div>
                  <div id="button-settings">
                    <h2>Button Settings</h2>
                    <table>
                        <tr>
                            <th>Button Color</th>
                            <td>
                                <input type="text" name="sts_theme_colors[button_color]" class="color-picker" value="<?php echo esc_attr( $colors['button_color'] ); ?>" />
                            </td>
                        </tr>

                        <tr>
                            <th>Button Hover Color</th>
                            <td>
                                <input type="text" name="sts_theme_colors[button_hover_color]" class="color-picker" value="<?php echo esc_attr( $colors['button_hover_color'] ); ?>" />
                            </td>
                        </tr>

                        <tr>
                            <th>Button Text Color</th>
                            <td>
                                <input type="text" name="sts_theme_colors[button_text_color]" class="color-picker" value="<?php echo esc_attr( $colors['button_text_color'] ); ?>" />
                            </td>
                        </tr>
</table>
</div>
<div id="layout-settings">
  <h2>Layout Settings</h2>
<table>
                        <tr>
                            <th>Blog Layout</th>
                            <td>
                              <select name='sts_layout_options[sts_select_blog_template]'>
                            		<option value='1' <?php selected( $layout_options['sts_select_blog_template'], 1 ); ?>>Default</option>
                            		<option value='2' <?php selected( $layout_options['sts_select_blog_template'], 2 ); ?>>No Sidebar</option>
                            	</select>
                            </td>
                        </tr>
                    </table>
                  </div>
                  </div>

                    <?php submit_button(); ?>

        </form>
    </div>


    <?php } ?>
