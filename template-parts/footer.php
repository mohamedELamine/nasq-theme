<?php
/**
 * Site Footer
 *
 * @package Nasq
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
    </main><!-- #main -->

<footer class="site-footer">
        <div class="footer-top">
            <div class="container">
                <div class="footer-grid grid-3">
                    <!-- Footer Column 1 -->
                    <div class="footer-column">
                        <?php if (is_active_sidebar('footer-1')): ?>
                            <?php dynamic_sidebar('footer-1'); ?>
                        <?php else: ?>
                            <div class="footer-brand">
                                <?php nasq_logo(); ?>
                                <p><?php _e('Professional Arabic WordPress themes and plugins.', 'nasq'); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Footer Column 2 -->
                    <div class="footer-column">
                        <?php dynamic_sidebar('footer-2'); ?>
                    </div>

                    <!-- Footer Column 3 -->
                    <div class="footer-column">
                        <?php dynamic_sidebar('footer-3'); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-inner">
                    <p class="copyright">
                        &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('All rights reserved.', 'nasq'); ?>
                    </p>

                    <nav class="footer-navigation">
                        <?php nasq_menu('footer', 'footer-menu'); ?>
                    </nav>
                </div>
            </div>
        </div>
    </footer>

<?php wp_footer(); ?>
</body>
</html>
