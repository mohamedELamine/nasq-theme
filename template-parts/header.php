<?php
/**
 * Site Header
 *
 * @package Nasq
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container">
        <div class="header-inner">
            <?php nasq_logo(); ?>

            <nav class="site-navigation">
                <?php nasq_menu('primary', 'desktop-menu'); ?>
            </nav>

            <div class="header-actions">
                <button class="mobile-menu-toggle" aria-label="<?php _e('Toggle menu', 'nasq'); ?>">
                    <span class="hamburger"></span>
                </button>

                <a href="<?php echo esc_url(function_exists('edd_get_checkout_uri') ? edd_get_checkout_uri() : home_url('/account')); ?>" class="button button-accent">
                    <?php _e('My Account', 'nasq'); ?>
                </a>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <div class="mobile-navigation">
        <?php nasq_menu('mobile', 'mobile-menu'); ?>
    </div>
</header>

<main id="primary" class="site-main">
