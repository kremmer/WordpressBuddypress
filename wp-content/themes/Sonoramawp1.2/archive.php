<?php get_header(); ?>
    <div class="page-wrap container">
        <section class="blog"><h1><?php _e('Archives', 'jellythemes') ?></h1><div class="spacer"></div></section>
        <div class="grid-9">
            <?php while ( have_posts() ) : the_post(); ?>
                <article <?php post_class() ?>>
                    <div class="pdate"><span><?php the_time('d M') ?></span></div>
                    <div class="post-meta">
                        <?php _e('By:', 'jellythemes'); ?> <?php the_author_link(); ?>  | <a class="pm-link" href="<?php the_permalink() ?>#conversation"><i class="fa fa-comments"></i> <?php comments_number(); ?></a>
                    </div>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php the_excerpt(); ?>
                    <?php the_post_thumbnail('large') ?>
                    <div class="tags"><?php the_tags(__('Tags: ', 'jellythemes')) ?></div>
                </article>
            <?php endwhile; ?>
            <nav class="page-navigation">
            <?php
                global $wp_query;

                $big = 999999999; // need an unlikely integer

                echo paginate_links( array(
                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format' => '?paged=%#%',
                    'current' => max( 1, get_query_var('paged') ),
                    'total' => $wp_query->max_num_pages,
                    'prev_text'    => __('&larr;'),
                    'next_text'    => __('&rarr;'),
            ) );
            ?>
            </nav>
        </div>
        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>