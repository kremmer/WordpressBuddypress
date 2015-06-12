<?php while ( have_posts() ) : the_post(); ?>
<div class="news-container">
    <div class="nav-news">
        <div class="news-prev"></div>
        <div class="news-next"></div>
    </div>

    <div class="news-wrapper">
    	<div class="close2-btn"></div>
    	<div class="news-link">
    		<?php $embed = get_post_meta( $post->ID, '_jellythemes_news_embed', true ); ?>
            <?php if (!empty($embed)) : ?>
                <?php echo wp_oembed_get($embed, array('width' => 780)) ?>
            <?php else : ?>
                <?php echo wp_get_attachment_image( get_post_meta(get_the_ID(), '_jellythemes_news_photo', true ) , 'news_med') ?>
            <?php endif; ?>
        </div>
        <div class="news-main-content">
        	<h1><?php the_title(); ?> - <span><?php the_time(get_option('date_format')) ?></span></h1>
        	<div class="news-description">
            	<?php the_content(); ?>
            </div>
        </div>
    </div>
</div>
<?php endwhile; ?>