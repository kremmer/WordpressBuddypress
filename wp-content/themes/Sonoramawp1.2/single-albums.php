<?php while ( have_posts() ) : the_post(); ?>
    <div class="close-btn"></div>
    <div class="disc-cover">
        <div><?php echo wp_get_attachment_image( get_post_meta(get_the_ID(), '_jellythemes_album_cover', true ) , 'album_med') ?></div>
        <div class="disc-title"><?php echo get_post_meta(get_the_ID(), '_jellythemes_album_artist', true ) ?> - <span><?php echo get_post_meta(get_the_ID(), '_jellythemes_album_title', true ) ?> </span></div>
    </div>
    <div class="disc-tracklist">
        <?php $embed = get_post_meta(get_the_ID(), '_jellythemes_album_embed', true ); ?>
        <?php if (empty($embed)) : ?>
            <?php $back = $post; ?>
            <?php $tracks = new WP_Query(array('post_type'=>'track',
                                    'meta_key'=>'_jellythemes_track_number',
                                    'orderby' => 'meta_value',
                                    'order' => 'ASC',
                                    'posts_per_page' => -1,
                                    'meta_query' => array(
                                        array(
                                            'key' => '_jellythemes_album',
                                            'value' => get_the_ID()
                                             )
                                        ))); ?>
            <?php  while ($tracks->have_posts()) : $tracks->the_post(); ?>
                <audio id="track-<?php the_ID(); ?>" src="<?php echo wp_get_attachment_url(get_post_meta(get_the_ID(), '_jellythemes_track_file', true )) ?>">
                    <p>Not supported for your browser</p>
                </audio>
            <?php endwhile; ?>
            <ol>
                <?php  while ($tracks->have_posts()) : $tracks->the_post(); ?>
                    <li>
                        <div class="play-count"><?php echo get_post_meta(get_the_ID(), '_jellythemes_track_number', true ) ?></div>
                        <div class="play-btns">
                            <button class="btn-play" onclick="document.getElementById('track-<?php the_ID(); ?>').play()"></button>
                            <button class="btn-pause" onclick="document.getElementById('track-<?php the_ID(); ?>').pause()"></button>
                        </div>
                        <div class="track-title">
                            <span class="track-info"><?php echo get_post_meta(get_the_ID(), '_jellythemes_track_title', true ) ?> <em><?php echo get_post_meta(get_the_ID(), '_jellythemes_track_artist', true ) ?></em></span>
                            <?php $buy = get_post_meta(get_the_ID(), '_jellythemes_buy_link', true ) ?>
                            <?php if (!empty($buy)) :?>
                                <span class="track-download-buy"><a href="<?php echo $buy; ?>">Buy</a></span>
                            <?php else : ?>
                                <?php $size = get_post_meta(get_the_ID(), '_jellythemes_file_size', true ); ?>
                                <?php if (!empty($size)): ?>
                                    <span class="track-download-buy"><a href="<?php echo wp_get_attachment_url(get_post_meta(get_the_ID(), '_jellythemes_track_file', true )) ?>"><?php _e('Download', 'jellythemes'); ?> | <?php echo $size; ?></a></span>
                                <?php endif ?>
                            <?php endif; ?>
                        </div>
                    </li>
                <?php endwhile; ?>
                <?php $post = $back; ?>
            </ol>
        <?php else : ?>
            <ol>
                <?php echo $embed; ?>
            </ol>
        <?php endif; ?>
    </div>

    <div class="clear"></div>
    <div class="disc-info-wrap">
        <div class="disc-info">

            <div class="disc-date"><?php _e('Release Date', 'jellythemes'); ?> <?php echo get_post_meta(get_the_ID(), '_jellythemes_album_date', true ) ?> </div>
            <div class="sell-platforms">
                <span><?php _e('Buy Album On', 'jellythemes'); ?></span>
                <a href="<?php echo get_post_meta(get_the_ID(), '_jellythemes_album_itunes', true ) ?>">
                    <div class="itunes"></div>
                </a>
                <a href="<?php echo get_post_meta(get_the_ID(), '_jellythemes_album_beatport', true ) ?>">
                    <div class="beatport"></div>
                </a>
                <a href="<?php echo get_post_meta(get_the_ID(), '_jellythemes_album_bandcamp', true ) ?>">
                    <div class="bandcamp"></div>
                </a>
            </div>
        </div>
    </div>
    <div class="clear"></div>
<?php endwhile; ?>