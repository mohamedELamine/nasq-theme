<?php
if (!defined('ABSPATH')) exit;
get_header();
?>
<div class="container">
    <main class="content">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content'); ?>
            <?php endwhile; ?>
            <?php nasq_pagination(); ?>
        <?php else : ?>
            <p><?php _e('Nothing found', 'nasq'); ?></p>
        <?php endif; ?>
    </main>
    <?php if (is_active_sidebar('primary-sidebar')): ?>
        <aside class="sidebar">
            <?php dynamic_sidebar('primary-sidebar'); ?>
        </aside>
    <?php endif; ?>
</div>
<?php get_footer(); ?>
