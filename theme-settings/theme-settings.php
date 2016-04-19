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
                    <table class="form-table">
                        <tr>
                            <th>Primary Theme Color</th>
                            <td>
                                <input type="text" name="sts_theme_colors[primary_theme_color]" class="color-picker" value="<?php echo esc_attr__( $colors['primary_theme_color'] ); ?>" />
                            </td>
                        </tr>
                    </table>
                    <h2>Header Settings</h2>
                    <table class="form-table">
                        <tr valign="top">
                            <th scope="row">Header Background</th>
                            <td>
                                <input type="text" name="sts_theme_colors[header_background_color]" class="color-picker" data-default-color="#202121" value="<?php echo esc_attr( $colors['header_background_color'] ); ?>" />
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row">Header Font Color</th>
                            <td>
                                <input type="text" name="sts_theme_colors[header_font_color]" class="color-picker" data-default-color="#ffffff" value="<?php echo esc_attr( $colors['header_font_color'] ); ?>" />
                            </td>
                        </tr>

                    </table>
                    <h2>Link Settings</h2>
                    <table class="form-table">
                        <tr valign="top">
                            <th scope="row">Link Color</th>
                            <td>
                                <input type="text" name="sts_theme_colors[link_color]" class="color-picker" value="<?php echo esc_attr( $colors['link_color'] ); ?>" />
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row">Link Hover Color</th>
                            <td>
                                <input type="text" name="sts_theme_colors[link_hover_color]" class="color-picker" value="<?php echo esc_attr( $colors['link_hover_color'] ); ?>" />
                            </td>
                        </tr>
                    </table>
                    <h2>Button Settings</h2>
                    <table class="form-table">
                        <tr valign="top">
                            <th scope="row">Button Color</th>
                            <td>
                                <input type="text" name="sts_theme_colors[button_color]" class="color-picker" value="<?php echo esc_attr( $colors['button_color'] ); ?>" />
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row">Button Hover Color</th>
                            <td>
                                <input type="text" name="sts_theme_colors[button_hover_color]" class="color-picker" value="<?php echo esc_attr( $colors['button_hover_color'] ); ?>" />
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row">Button Text Color</th>
                            <td>
                                <input type="text" name="sts_theme_colors[button_text_color]" class="color-picker" value="<?php echo esc_attr( $colors['button_text_color'] ); ?>" />
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row">Blog Layout</th>
                            <td>
                              <select name='sts_layout_options[sts_select_blog_template]'>
                            		<option value='1' <?php selected( $layout_options['sts_select_blog_template'], 1 ); ?>>Default</option>
                            		<option value='2' <?php selected( $layout_options['sts_select_blog_template'], 2 ); ?>>No Sidebar</option>
                            	</select>
                            </td>
                        </tr>
                    </table>

                    <?php submit_button(); ?>

        </form>
    </div>
    <?php } ?>
