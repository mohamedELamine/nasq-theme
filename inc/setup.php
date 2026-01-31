<?php
/**
 * Theme Setup
 *
 * @package Nasq
 */

/**
 * Nasq_Setup Class
 */
class Nasq_Setup {

    /**
     * Initialize theme setup
     */
    public static function init() {
        add_action('after_setup_theme', [__CLASS__, 'theme_setup']);
        add_action('widgets_init', [__CLASS__, 'register_sidebars']);
    }

    /**
     * Theme setup
     */
    public static function theme_setup() {
        // Load text domain
        load_theme_textdomain('nasq', get_template_directory() . '/languages');

        // Add theme support
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('custom-logo', [
            'height'      => 100,
            'width'       => 400,
            'flex-width'  => true,
            'flex-height' => true,
        ]);
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ]);
        add_theme_support('automatic-feed-links');
        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('wp-block-styles');

        // Add image sizes
        add_image_size('nasq-thumbnail', 400, 300, true);
        add_image_size('nasq-medium', 800, 600, true);
        add_image_size('nasq-large', 1200, 800, true);

        // Register navigation menus
        register_nav_menus([
            'primary' => __('Primary Menu', 'nasq'),
            'footer'  => __('Footer Menu', 'nasq'),
            'mobile'  => __('Mobile Menu', 'nasq'),
        ]);

        // Set content width
        $GLOBALS['content_width'] = 1200;

        // Add editor styles
        add_editor_style('assets/css/editor.css');

        // Add RTL support
        if (is_rtl()) {
            add_editor_style('assets/css/rtl.css');
        }
    }

    /**
     * Register sidebars
     */
    public static function register_sidebars() {
        // Primary sidebar
        register_sidebar([
            'name'          => __('Primary Sidebar', 'nasq'),
            'id'            => 'primary-sidebar',
            'description'   => __('Main sidebar area', 'nasq'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ]);

        // Footer sidebar 1
        register_sidebar([
            'name'          => __('Footer Column 1', 'nasq'),
            'id'            => 'footer-1',
            'description'   => __('Footer column 1', 'nasq'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ]);

        // Footer sidebar 2
        register_sidebar([
            'name'          => __('Footer Column 2', 'nasq'),
            'id'            => 'footer-2',
            'description'   => __('Footer column 2', 'nasq'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ]);

        // Footer sidebar 3
        register_sidebar([
            'name'          => __('Footer Column 3', 'nasq'),
            'id'            => 'footer-3',
            'description'   => __('Footer column 3', 'nasq'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ]);
    }
}
