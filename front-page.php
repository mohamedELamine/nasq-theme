<?php
/**
 * Front Page Template
 *
 * @package Nasq
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<!-- Hero Section -->
<section class="hero-section section">
    <div class="container">
        <div class="hero-content text-center">
            <h1 class="hero-title">
                <?php _e('قوالب WordPress عربية احترافية', 'nasq'); ?><br>
                <span class="hero-title-en">
                    <?php _e('Professional Arabic WordPress Themes', 'nasq'); ?>
                </span>
            </h1>

            <p class="hero-subtitle">
                <?php _e('ابدأ موقعك بدقائق - قوالب عربية عالية الجودة مع دعم كامل لـ RTL', 'nasq'); ?>
            </p>

            <div class="hero-actions">
                <a href="<?php echo esc_url(edd_get_download_permalink(1)); ?>" class="button button-primary">
                    <?php _e('Browse Themes', 'nasq'); ?>
                </a>
                <a href="<?php echo esc_url(home_url('/about')); ?>" class="button button-secondary">
                    <?php _e('Learn More', 'nasq'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Featured Themes Section -->
<section class="featured-themes section">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="section-title">
                <?php _e('القوالب المميزة', 'nasq'); ?><br>
                <span class="section-title-en">
                    <?php _e('Featured Themes', 'nasq'); ?>
                </span>
            </h2>
            <p class="section-subtitle">
                <?php _e('أفضل قوالب WordPress العربية المتوفرة لدينا', 'nasq'); ?>
            </p>
        </div>

        <div class="themes-grid grid-3">
            <?php
            $downloads = get_posts([
                'post_type'      => 'download',
                'posts_per_page' => 3,
                'orderby'        => 'date',
                'order'          => 'DESC'
            ]);

            if ($downloads):
                foreach ($downloads as $download):
                    $download_id = $download->ID;
                    ?>
                    <article class="theme-card card">
                        <?php if (has_post_thumbnail($download_id)): ?>
                            <div class="theme-image">
                                <a href="<?php echo get_permalink($download_id); ?>">
                                    <?php echo get_the_post_thumbnail($download_id, 'nasq-medium'); ?>
                                </a>
                            </div>
                        <?php else: ?>
                            <div class="theme-image theme-placeholder">
                                <span class="dashicons dashicons-download"></span>
                            </div>
                        <?php endif; ?>

                        <div class="theme-info">
                            <h3 class="theme-title">
                                <a href="<?php echo get_permalink($download_id); ?>">
                                    <?php echo get_the_title($download_id); ?>
                                </a>
                            </h3>

                            <div class="theme-meta">
                                <span class="theme-price">
                                    <?php echo edd_price($download_id, false); ?>
                                </span>
                                <span class="theme-sales">
                                    <?php printf(__('%s sales', 'nasq'), edd_get_download_sales_stats($download_id)); ?>
                                </span>
                            </div>

                            <div class="theme-actions">
                                <a href="<?php echo get_permalink($download_id); ?>" class="button button-secondary button-small">
                                    <?php _e('View Details', 'nasq'); ?>
                                </a>
                                <?php echo do_shortcode('[purchase_link id="' . $download_id . '" text="' . __('Buy Now', 'nasq') . '" style="button" direct="true"]'); ?>
                            </div>
                        </div>
                    </article>
                <?php endforeach;
            else: ?>
                <p class="no-downloads">
                    <?php _e('No themes available yet. Check back soon!', 'nasq'); ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="text-center mt-5">
            <a href="<?php echo esc_url(get_post_type_archive_link('download')); ?>" class="button button-primary">
                <?php _e('View All Themes', 'nasq'); ?>
            </a>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section section">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="section-title">
                <?php _e('مميزاتنا', 'nasq'); ?><br>
                <span class="section-title-en">
                    <?php _e('Our Features', 'nasq'); ?>
                </span>
            </h2>
        </div>

        <div class="features-grid grid-3">
            <div class="feature-item text-center">
                <div class="feature-icon">
                    <span class="dashicons dashicons-text-align-right"></span>
                </div>
                <h3 class="feature-title">
                    <?php _e('دعم RTL كامل', 'nasq'); ?>
                </h3>
                <p class="feature-description">
                    <?php _e('جميع قوالبنا مصممة لدعم RTL بشكل أصلي، وليس كإضافة', 'nasq'); ?>
                </p>
            </div>

            <div class="feature-item text-center">
                <div class="feature-icon">
                    <span class="dashicons dashicons-admin-site-alt3"></span>
                </div>
                <h3 class="feature-title">
                    <?php _e('خطوط عربية محسّنة', 'nasq'); ?>
                </h3>
                <p class="feature-description">
                    <?php _e('استخدام خطوط عربية حديثة مثل Tajawal و Cairo لقراءة ممتازة', 'nasq'); ?>
                </p>
            </div>

            <div class="feature-item text-center">
                <div class="feature-icon">
                    <span class="dashicons dashicons-rocket"></span>
                </div>
                <h3 class="feature-title">
                    <?php _e('أداء فائق', 'nasq'); ?>
                </h3>
                <p class="feature-description">
                    <?php _e('كود نظيف، تحميل سريع، نتائج ممتازة في اختبارات الأداء', 'nasq'); ?>
                </p>
            </div>

            <div class="feature-item text-center">
                <div class="feature-icon">
                    <span class="dashicons dashicons-universal-access"></span>
                </div>
                <h3 class="feature-title">
                    <?php _e('إمكانية الوصول', 'nasq'); ?>
                </h3>
                <p class="feature-description">
                    <?php _e('متوافق مع معايير WCAG AA لجميع المستخدمين', 'nasq'); ?>
                </p>
            </div>

            <div class="feature-item text-center">
                <div class="feature-icon">
                    <span class="dashicons dashicons-cart"></span>
                </div>
                <h3 class="feature-title">
                    <?php _e('تراخيص سهلة', 'nasq'); ?>
                </h3>
                <p class="feature-description">
                    <?php _e('نظام تراخيص تلقائي مع دعم فني متاح', 'nasq'); ?>
                </p>
            </div>

            <div class="feature-item text-center">
                <div class="feature-icon">
                    <span class="dashicons dashicons-translation"></span>
                </div>
                <h3 class="feature-title">
                    <?php _e('دعم فني بالعربية', 'nasq'); ?>
                </h3>
                <p class="feature-description">
                    <?php _e('فريق دعم يتحدث العربية ويساعدك في أي مشكلة', 'nasq'); ?>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section section">
    <div class="container">
        <div class="cta-content text-center">
            <h2 class="cta-title">
                <?php _e('جاهز للبدء؟', 'nasq'); ?>
            </h2>
            <p class="cta-subtitle">
                <?php _e('انضم إلى آلاف العملاء الذين يثقون في نسق لبناء مواقعهم', 'nasq'); ?>
            </p>
            <a href="<?php echo esc_url(get_post_type_archive_link('download')); ?>" class="button button-primary button-large">
                <?php _e('Browse All Themes', 'nasq'); ?>
            </a>
        </div>
    </div>
</section>

<?php
get_footer();
