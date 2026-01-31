<?php
if (!defined('ABSPATH')) exit;
get_header();
?>
<div class="container downloads-archive-wrapper">
    <main class="downloads-archive-content">
        <header class="archive-header text-center">
            <h1><?php _e('WordPress Themes', 'nasq'); ?></h1>
            <p><?php _e('Browse our collection of professional Arabic WordPress themes', 'nasq'); ?></p>
        </header>

        <div class="downloads-grid grid-3">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('template-parts/content', 'download'); ?>
                <?php endwhile; ?>
            <?php else : ?>
                <p class="no-downloads text-center"><?php _e('No themes available yet', 'nasq'); ?></p>
            <?php endif; ?>
        </div>

        <?php nasq_pagination(); ?>
    </main>
</div>
<?php get_footer(); ?>
