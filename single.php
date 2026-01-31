<?php
if (!defined('ABSPATH')) exit;
get_header();
?>
<div class="container single-wrapper">
    <main class="single-content">
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/content', 'single'); ?>
            <?php comments_template(); ?>
        <?php endwhile; ?>
    </main>
    <?php if (is_active_sidebar('primary-sidebar')): ?>
        <aside class="sidebar">
            <?php dynamic_sidebar('primary-sidebar'); ?>
        </aside>
    <?php endif; ?>
</div>
<?php get_footer(); ?>
