<?php
/**
 * Theme Customizer
 *
 * @package Nasq
 */

class Nasq_Customizer {

    public static function init() {
        add_action('customize_register', [__CLASS__, 'register']);
        add_action('wp_head', [__CLASS__, 'output']);
    }

    public static function register($wp_customize) {
        // Featured Download ID
        $wp_customize->add_setting('nasq_featured_download', [
            'default' => '',
            'sanitize_callback' => 'absint',
            'transport' => 'refresh'
        ]);

        $wp_customize->add_control('nasq_featured_download', [
            'type' => 'number',
            'section' => 'static_front_page',
            'label' => __('Featured Download ID', 'nasq'),
            'description' => __('Enter the download post ID to feature on homepage', 'nasq'),
            'active_callback' => function() {
                return is_front_page();
            }
        ]);

        // Add section if it doesn't exist
        if (!$wp_customize->get_section('static_front_page')) {
            $wp_customize->add_section('static_front_page', [
                'title' => __('Static Front Page', 'nasq'),
                'priority' => 30
            ]);
        }
    }

    public static function output() {
        $featured_download = get_theme_mod('nasq_featured_download', 0);
        echo '<script>var nasqFeaturedDownload = ' . intval($featured_download) . ';</script>';
    }
}

Nasq_Customizer::init();
