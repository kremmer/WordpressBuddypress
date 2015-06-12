<?php get_header(); ?>
	<section class="page-wrap">
        <div class="container">
            <div class="grid-9">
    			<?php if ( have_posts() ) : while  ( have_posts() ) : the_post(); ?>
                    <article <?php post_class('post-single') ?>>
                        <div class="pdate"><span><?php the_time('d M') ?></span></div>
                        <div class="post-meta">
                            <?php _e('By:', 'jellythemes'); ?> <?php the_author_link(); ?> | <a class="pm-link" href="<?php the_permalink() ?>#conversation"><i class="fa fa-comments"></i> <?php comments_number(); ?></a>
                        </div>
                        <h3><?php the_title() ?></h3>
                        <?php the_content(); ?>
                        <div class="tags"><?php the_tags(__('Tags: ', 'jellythemes')) ?></div>
                    </article>
                    <?php comments_template(); ?>
    			<?php endwhile; ?>
    			<?php else: ?>
    			<!-- no posts found -->
    			<?php endif; ?>
			</div>
			<?php get_sidebar(); ?>
    	</div>
    </section>
<?php get_footer(); ?>