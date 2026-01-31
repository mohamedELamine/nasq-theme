<?php
/**
 * Enqueue Scripts and Styles
 *
 * @package Nasq
 */

/**
 * Nasq_Enqueue Class
 */
class Nasq_Enqueue {

    /**
     * Initialize enqueuing
     */
    public static function init() {
        add_action('wp_enqueue_scripts', [__CLASS__, 'enqueue_scripts']);
        add_action('admin_enqueue_scripts', [__CLASS__, 'admin_scripts']);
        add_action('wp_head', [__CLASS__, 'preconnect_fonts']);
    }

    /**
     * Preconnect to Google Fonts
     */
    public static function preconnect_fonts() {
        ?>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <?php
    }

    /**
     * Enqueue frontend scripts and styles
     */
    public static function enqueue_scripts() {
        $theme_version = wp_get_theme()->get('Version');

        // Google Fonts
        wp_enqueue_style(
            'nasq-fonts',
            'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Tajawal:wght@400;500;700&display=swap',
            [],
            null
        );

        // Main stylesheet
        wp_enqueue_style(
            'nasq-style',
            get_stylesheet_uri(),
            [],
            $theme_version
        );

        // Theme-specific stylesheet
        wp_enqueue_style(
            'nasq-theme',
            get_template_directory_uri() . '/assets/css/theme.css',
            ['nasq-style'],
            $theme_version
        );

        // RTL stylesheet
        if (is_rtl()) {
            wp_enqueue_style(
                'nasq-rtl',
                get_template_directory_uri() . '/assets/css/rtl.css',
                ['nasq-theme'],
                $theme_version
            );
        }

        // Main JavaScript
        wp_enqueue_script(
            'nasq-main',
            get_template_directory_uri() . '/assets/js/main.js',
            [],
            $theme_version,
            true
        );

        // Navigation script
        if (has_nav_menu('mobile')) {
            wp_enqueue_script(
                'nasq-navigation',
                get_template_directory_uri() . '/assets/js/navigation.js',
                [],
                $theme_version,
                true
            );
        }

        // Localize script
        wp_localize_script('nasq-main', 'nasqData', [
            'ajaxUrl'        => admin_url('admin-ajax.php'),
            'nonce'          => wp_create_nonce('nasq_nonce'),
            'isRTL'          => is_rtl(),
            'siteUrl'        => home_url(),
            'ajaxLoading'    => __('Loading...', 'nasq'),
        ]);

        // Comments script
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }

    /**
     * Enqueue admin scripts and styles
     */
    public static function admin_scripts($hook) {
        // Only load on specific admin pages
        if ('post.php' === $hook || 'post-new.php' === $hook) {
            wp_enqueue_style(
                'nasq-admin',
                get_template_directory_uri() . '/assets/css/admin.css'
            );
        }
    }
}
