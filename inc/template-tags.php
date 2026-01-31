<?php
/**
 * Template Tags
 *
 * @package Nasq
 */

/**
 * Display site logo
 */
function nasq_logo() {
    $custom_logo_id = get_theme_mod('custom_logo');

    if ($custom_logo_id) {
        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
        if ($logo && isset($logo[0]) && !empty($logo[0])) {
            echo '<a href="' . esc_url(home_url('/')) . '" class="site-logo" rel="home">';
            echo '<img src="' . esc_url($logo[0]) . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
            echo '</a>';
            return;
        }
    }

    // Text logo fallback
    echo '<a href="' . esc_url(home_url('/')) . '" class="site-logo-text" rel="home">';
    echo '<span class="logo-ar">' . esc_html(__('نسق', 'nasq')) . '</span>';
    echo '<span class="logo-en">NASQ</span>';
    echo '</a>';
}

/**
 * Display navigation menu
 *
 * @param string $theme_location Theme location
 * @param string $container_class Container class
 * @return void
 */
function nasq_menu($theme_location = 'primary', $container_class = '') {
    wp_nav_menu([
        'theme_location' => $theme_location,
        'container'      => false,
        'menu_class'    => 'nav-menu ' . $container_class,
        'fallback_cb'   => false,
        'depth'         => 2,
    ]);
}

/**
 * Display pagination
 *
 * @return void
 */
function nasq_pagination() {
    the_posts_pagination([
        'mid_size'  => 2,
        'prev_text' => __('&larr; Previous', 'nasq'),
        'next_text' => __('Next &rarr;', 'nasq'),
        'screen_reader_text' => __('Posts navigation', 'nasq'),
    ]);
}

/**
 * Display entry meta
 *
 * @return void
 */
function nasq_entry_meta() {
    ?>
    <div class="entry-meta">
        <span class="posted-on">
            <?php echo get_the_date(); ?>
        </span>
        <?php if (has_category()): ?>
            <span class="cat-links">
                <?php the_category(', '); ?>
            </span>
        <?php endif; ?>
    </div>
    <?php
}

/**
 * Display read more button
 *
 * @param string $text Button text
 * @return void
 */
function nasq_read_more($text = '') {
    if (empty($text)) {
        $text = __('Read more', 'nasq');
    }
    ?>
    <a href="<?php the_permalink(); ?>" class="button button-secondary">
        <?php echo esc_html($text); ?>
    </a>
    <?php
}

/**
 * Check if has featured image
 *
 * @return bool
 */
function nasq_has_featured_image() {
    return has_post_thumbnail();
}

/**
 * Display featured image
 *
 * @param string $size Image size
 * @return void
 */
function nasq_featured_image($size = 'large') {
    if (nasq_has_featured_image()) {
        the_post_thumbnail($size);
    }
}
