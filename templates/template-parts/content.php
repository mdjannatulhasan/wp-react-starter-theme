<?php
/**
 * Template part for displaying posts
 *
 * @package WP_React_Professional_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        if (is_singular()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;

        if ('post' === get_post_type()) :
            ?>
            <div class="entry-meta">
                <span class="posted-on">
                    <?php
                    printf(
                        esc_html__('Posted on %s', 'wp-react-professional-theme'),
                        '<time class="entry-date published updated" datetime="' . esc_attr(get_the_date(DATE_W3C)) . '">' . esc_html(get_the_date()) . '</time>'
                    );
                    ?>
                </span>
                <span class="byline">
                    <?php
                    printf(
                        esc_html__('by %s', 'wp-react-professional-theme'),
                        '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
                    );
                    ?>
                </span>
            </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->

    <?php if (has_post_thumbnail() && !is_singular()) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('featured-image'); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="entry-content">
        <?php
        if (is_singular()) :
            the_content(
                sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'wp-react-professional-theme'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post(get_the_title())
                )
            );

            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'wp-react-professional-theme'),
                    'after'  => '</div>',
                )
            );
        else :
            the_excerpt();
            ?>
            <a href="<?php the_permalink(); ?>" class="read-more">
                <?php esc_html_e('Read More', 'wp-react-professional-theme'); ?>
            </a>
        <?php endif; ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php if ('post' === get_post_type()) : ?>
            <div class="entry-footer-meta">
                <?php
                $categories_list = get_the_category_list(esc_html__(', ', 'wp-react-professional-theme'));
                if ($categories_list) :
                    ?>
                    <span class="cat-links">
                        <?php
                        printf(
                            /* translators: 1: list of categories. */
                            esc_html__('Posted in %1$s', 'wp-react-professional-theme'),
                            $categories_list
                        );
                        ?>
                    </span>
                <?php endif; ?>

                <?php
                $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'wp-react-professional-theme'));
                if ($tags_list) :
                    ?>
                    <span class="tags-links">
                        <?php
                        printf(
                            /* translators: 1: list of tags. */
                            esc_html__('Tagged %1$s', 'wp-react-professional-theme'),
                            $tags_list
                        );
                        ?>
                    </span>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
