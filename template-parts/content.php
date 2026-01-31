<?php if (!defined('ABSPATH')) exit; ?>
<article class="post-card card">
    <?php if (has_post_thumbnail()): ?>
        <div class="post-image">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('nasq-medium'); ?>
            </a>
        </div>
    <?php endif; ?>
    <div class="post-content">
        <h2 class="post-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <div class="post-excerpt">
            <?php the_excerpt(); ?>
        </div>
        <div class="post-meta">
            <span class="post-date"><?php echo get_the_date(); ?></span>
            <span class="post-category"><?php the_category(', '); ?></span>
        </div>
    </div>
</article>
