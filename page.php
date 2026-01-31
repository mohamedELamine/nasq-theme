<?php
if (!defined('ABSPATH')) exit;
get_header();
?>
<div class="container page-wrapper">
    <main class="page-content">
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/content', 'page'); ?>
        <?php endwhile; ?>
    </main>
    <?php if (is_active_sidebar('primary-sidebar')): ?>
        <aside class="sidebar">
            <?php dynamic_sidebar('primary-sidebar'); ?>
        </aside>
    <?php endif; ?>
</div>
<?php get_footer(); ?>
