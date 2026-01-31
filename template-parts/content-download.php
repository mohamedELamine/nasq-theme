<?php if (!defined('ABSPATH')) exit;
$download_id = get_the_ID();
?>
<article class="download-card card">
    <div class="download-thumb">
        <?php if (has_post_thumbnail($download_id)): ?>
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('nasq-medium'); ?>
            </a>
        <?php else: ?>
            <div class="download-placeholder">
                <span class="dashicons dashicons-download"></span>
            </div>
        <?php endif; ?>
    </div>
    <div class="download-info">
        <h3 class="download-name">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
        <div class="download-meta">
            <span class="price"><?php echo edd_price($download_id, false); ?></span>
            <span class="sales"><?php printf(__('%s sales', 'nasq'), edd_get_download_sales_stats($download_id)); ?></span>
        </div>
        <div class="download-actions">
            <a href="<?php the_permalink(); ?>" class="button button-secondary button-small">
                <?php _e('View Details', 'nasq'); ?>
            </a>
            <?php echo do_shortcode('[purchase_link id="' . $download_id . '" text="' . __('Buy Now', 'nasq') . '" style="button" direct="true"]'); ?>
        </div>
    </div>
</article>
