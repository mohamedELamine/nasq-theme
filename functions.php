<?php
/**
 * Nasq Theme
 *
 * @package Nasq
 * @since 1.0.0
 */

// Security: Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Load theme components
require_once get_template_directory() . '/inc/setup.php';
require_once get_template_directory() . '/inc/enqueue.php';
require_once get_template_directory() . '/inc/hooks.php';
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/ajax.php';
require_once get_template_directory() . '/inc/template-tags.php';

// Initialize theme
Nasq_Setup::init();
Nasq_Enqueue::init();
Nasq_Hooks::init();
