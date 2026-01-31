<?php
if (!defined('ABSPATH')) exit;
get_header();
?>
<div class="container error-wrapper">
    <div class="error-content text-center">
        <h1 class="error-title">404</h1>
        <h2 class="error-subtitle"><?php _e('Page not found', 'nasq'); ?></h2>
        <p class="error-message"><?php _e('The page you are looking for does not exist.', 'nasq'); ?></p>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="button button-primary"><?php _e('Go Home', 'nasq'); ?></a>
    </div>
</div>
<?php get_footer(); ?>
