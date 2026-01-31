<?php
if (!defined('ABSPATH')) exit;
get_header();
$download_id = get_the_ID();
?>
<div class="container download-single-wrapper">
    <main class="download-single-content">
        <?php while (have_posts()) : the_post(); ?>
            <article class="download-single">
                <?php if (has_post_thumbnail($download_id)): ?>
                    <div class="download-screenshot">
                        <?php the_post_thumbnail('nasq-large'); ?>
                    </div>
                <?php endif; ?>

                <h1 class="download-title"><?php the_title(); ?></h1>

                <div class="download-meta">
                    <span class="download-price"><?php echo edd_price($download_id, false); ?></span>
                    <span class="download-sales"><?php printf(__('%s sales', 'nasq'), edd_get_download_sales_stats($download_id)); ?></span>
                </div>

                <div class="download-description">
                    <?php the_content(); ?>
                </div>

                <div class="download-purchase">
                    <?php echo do_shortcode('[purchase_link id="' . $download_id . '" text="' . __('Buy Now', 'nasq') . '" style="button"]'); ?>
                </div>

                <div class="download-features">
                    <?php
                    $features = get_post_meta($download_id, '_edd_download_features', true);
                    if ($features && is_array($features)): ?>
                        <h3><?php _e('Features', 'nasq'); ?></h3>
                        <ul>
                            <?php foreach ($features as $feature): ?>
                                <li><?php echo esc_html($feature); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </article>
        <?php endwhile; ?>
    </main>
    <?php if (is_active_sidebar('primary-sidebar')): ?>
        <aside class="sidebar">
            <?php dynamic_sidebar('primary-sidebar'); ?>
        </aside>
    <?php endif; ?>
</div>
<?php get_footer(); ?>
