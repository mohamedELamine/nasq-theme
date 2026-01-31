<?php
/**
 * Theme Hooks and Filters
 *
 * @package Nasq
 */

/**
 * Nasq_Hooks Class
 */
class Nasq_Hooks {

    /**
     * Initialize hooks
     */
    public static function init() {
        add_action('wp_body_open', [__CLASS__, 'skip_link']);
        add_action('nasq_header', [__CLASS__, 'display_header']);
        add_action('nasq_footer', [__CLASS__, 'display_footer']);

        add_filter('excerpt_length', [__CLASS__, 'excerpt_length']);
        add_filter('excerpt_more', [__CLASS__, 'excerpt_more']);
        add_filter('body_class', [__CLASS__, 'body_classes']);

        // Remove emoji scripts
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');
    }

    /**
     * Skip link for accessibility
     */
    public static function skip_link() {
        ?>
        <a class="skip-link screen-reader-text" href="#primary">
            <?php _e('Skip to content', 'nasq'); ?>
        </a>
        <?php
    }

    /**
     * Display header
     */
    public static function display_header() {
        get_template_part('template-parts/header');
    }

    /**
     * Display footer
     */
    public static function display_footer() {
        get_template_part('template-parts/footer');
    }

    /**
     * Custom excerpt length
     *
     * @param int $length Original length
     * @return int Modified length
     */
    public static function excerpt_length($length) {
        return 30;
    }

    /**
     * Custom excerpt more
     *
     * @param string $more Original more text
     * @return string Modified more text
     */
    public static function excerpt_more($more) {
        return '...';
    }

    /**
     * Add custom body classes
     *
     * @param array $classes Original classes
     * @return array Modified classes
     */
    public static function body_classes($classes) {
        // RTL class
        if (is_rtl()) {
            $classes[] = 'rtl';
        }

        // Sidebar class
        if (is_active_sidebar('primary-sidebar')) {
            $classes[] = 'has-sidebar';
        }

        // Page specific classes
        if (is_front_page()) {
            $classes[] = 'home';
        }

        return $classes;
    }
}
