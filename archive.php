<?php
if (!defined('ABSPATH')) exit;
get_header();
?>
<div class="container archive-wrapper">
    <main class="archive-content">
        <?php if (have_posts()) : ?>
            <header class="archive-header">
                <?php the_archive_title('<h1>', '</h1>'); ?>
                <?php the_archive_description('<p>', '</p>'); ?>
            </header>
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
