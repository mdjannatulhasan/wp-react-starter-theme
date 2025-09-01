    <footer id="colophon" class="site-footer">
        <div class="footer-content">
            <div class="footer-widgets">
                <?php if (is_active_sidebar('footer-1')) : ?>
                    <div class="footer-widget-area">
                        <?php dynamic_sidebar('footer-1'); ?>
                    </div>
                <?php endif; ?>
                
                <?php if (is_active_sidebar('footer-2')) : ?>
                    <div class="footer-widget-area">
                        <?php dynamic_sidebar('footer-2'); ?>
                    </div>
                <?php endif; ?>
                
                <?php if (is_active_sidebar('footer-3')) : ?>
                    <div class="footer-widget-area">
                        <?php dynamic_sidebar('footer-3'); ?>
                    </div>
                <?php endif; ?>
                
                <?php if (is_active_sidebar('footer-4')) : ?>
                    <div class="footer-widget-area">
                        <?php dynamic_sidebar('footer-4'); ?>
                    </div>
                <?php endif; ?>
            </div><!-- .footer-widgets -->
            
            <div class="footer-bottom">
                <div class="footer-navigation">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer',
                            'menu_id'        => 'footer-menu',
                            'menu_class'     => 'footer-menu',
                            'container'      => false,
                            'depth'          => 1,
                        )
                    );
                    ?>
                </div>
                
                <div class="site-info">
                    <?php
                    printf(
                        esc_html__('© %1$s %2$s. All rights reserved.', 'wp-react-starter-theme'),
                        date('Y'),
                        get_bloginfo('name')
                    );
                    ?>
                    <span class="sep"> | </span>
                    <?php
                    printf(
                        esc_html__('Powered by %1$s', 'wp-react-starter-theme'),
                        '<a href="https://wordpress.org/">WordPress</a>'
                    );
                    ?>
                </div><!-- .site-info -->
            </div><!-- .footer-bottom -->
        </div><!-- .footer-content -->
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
