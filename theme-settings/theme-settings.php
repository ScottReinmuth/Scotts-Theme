<?php
//Enqueue Nessesary Scripts
function scotts_admin_scripts(){
    wp_enqueue_script('scotts-theme-settings-js', get_template_directory_uri() . '/theme-settings/js/theme-settings-page-js.js', '','', true );
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script( 'wp-color-picker-alpha', get_template_directory_uri() . '/theme-settings/js/wp-color-picker-alpha.min.js', array( 'wp-color-picker' ), '1.2.2', true );
    wp_enqueue_style('theme-settings-styles', get_template_directory_uri() . '/theme-settings/theme-settings-styling.css');
}
add_action('admin_enqueue_scripts', 'scotts_admin_scripts');

?>

<?php

    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "sts_redux";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => 'Theme Settings',
        'page_title'           => 'Theme Settings',
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '1',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '_options',
        // Page slug used to denote the panel
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
       'footer_credit'         => '',

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        //'compiler'             => true,
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'  => 'Basic Settings',
        'id'     => 'basic-settings',
        'desc'   => 'Basic field with no subsections.',
        'icon'   => 'el el-home',
        'fields' => array(
            array(
                'id'       => 'primary_theme_color',
                'type'     => 'color',
                'title'    => 'Primary Color',
                'desc'     => '',
                'subtitle' => '',
                'default' => '#1e73be',
                'transparent' => false,
            ),
            array(
                'id'       => 'info_custom',
                'type'     => 'info',
                'style'    => 'custom',
                'desc'     => 'Blog Layout',
            ),
            array(
                'id'       => 'blog_layout',
                'type'     => 'select',
                'title'    => 'Blog Layout',
                'options'  => array('1' => 'Default', '2' => 'No Sidebar'),
                'default'  => '1'
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'  => 'Header',
        'id'     => 'header-settings',
        'desc'   => '',
        'icon'   => 'el el-arrow-up',
        'fields' => array(
            array(
                'id'       => 'header_background_color',
                'type'     => 'color',
                'title'    => 'Header Background Color',
                'desc'     => '',
                'subtitle' => '',
                'default' => '#ffffff',
                'transparent' => false,
            ),
            array(
                'id'       => 'header_font_color',
                'type'     => 'color',
                'title'    => 'Header Text Color',
                'desc'     => '',
                'subtitle' => '',
                'default' => '#333333',
                'transparent' => false,
            )
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'  => 'Styling',
        'id'     => 'styling-settings',
        'desc'   => 'Basic field with no subsections.',
        'icon'   => 'el el-brush',
        'fields' => array(
            array(
                'id'       => 'links_color',
                'type'     => 'color',
                'title'    => 'Links Color',
                'desc'     => '',
                'subtitle' => '',
                'default' => '#ffffff',
                'transparent' => false,
            ),
            array(
                'id'       => 'links_hover_color',
                'type'     => 'color',
                'title'    => 'Links Hover Color',
                'desc'     => '',
                'subtitle' => '',
                'default' => '#1e73be',
                'transparent' => false,
            ),
            array(
                'id'       => 'info_custom',
                'type'     => 'info',
                'style'    => 'custom',
                'desc'     => 'Button Styles',
            ),
            array(
                'id'       => 'button_color',
                'type'     => 'color',
                'title'    => 'Button Hover Color',
                'desc'     => '',
                'subtitle' => '',
                'default' => '#1e73be',
                'transparent' => false,
            ),
            array(
                'id'       => 'button_hover_color',
                'type'     => 'color',
                'title'    => 'Button Hover Color',
                'desc'     => '',
                'subtitle' => '',
                'default' => '#1e5ebf',
                'transparent' => false,
            )
        )
    ) );

    /*
     * <--- END SECTIONS
     */
?>
