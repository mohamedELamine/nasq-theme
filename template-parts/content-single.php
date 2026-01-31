<?php if (!defined('ABSPATH')) exit; ?>
<article class="single-entry">
    <h1 class="single-title"><?php the_title(); ?></h1>
    <div class="single-meta">
        <span class="single-date"><?php echo get_the_date(); ?></span>
        <span class="single-author"><?php _e('By', 'nasq'); ?> <?php the_author(); ?></span>
    </div>
    <div class="single-content">
        <?php the_content(); ?>
    </div>
    <div class="single-tags">
        <?php the_tags('', ', ', ''); ?>
    </div>
    <div class="single-navigation">
        <?php previous_post_link('%link', '&larr; %title'); ?>
        <?php next_post_link('%link', '%title &rarr;'); ?>
    </div>
</article>
