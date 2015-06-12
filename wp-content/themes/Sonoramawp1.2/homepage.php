<?php /* Template Name: Home Page 1 */ ?>
<?php get_header(); ?>


        <?php while ( have_posts() ) : the_post(); ?>
            <div id="<?php echo $post->post_name; ?>" class="slides-1">
                <div class="overlay"></div>
                <div class="slides-container">
                    <?php $images = rwmb_meta('_jellythemes_slider_images', 'type=image', $post->ID ); ?>
                    <?php foreach ($images as $image) : ?>
                        <img src="<?php echo $image['full_url'] ?>" alt="">
                    <?php endforeach; ?>
                </div>
                <nav class="slides-navigation">
                  <a href="#" class="next"></a>
                  <a href="#" class="prev"></a>
                </nav>
            </div>
            <div class="main-title">
                <div class="title-container">
                    <div class="welcome logo">
                        <div class="top-spacer one"></div>
                        <div class="top-spacer two"></div>
                        <?php $images = rwmb_meta('_jellythemes_slider_heading_img', 'type=image', $post->ID ); ?>
                        <?php foreach ($images as $image) : ?>
                            <img src="<?php echo $image['full_url'] ?>" alt="">
                        <?php endforeach; ?>
                        <div class="spacer-box"></div>
                        <?php $texts =  get_post_meta( $post->ID, '_jellythemes_slider_text', true ); ?>
                        <ul>
                            <?php foreach ($texts as $i => $text) : ?>
                                <li <?php echo $i==0 ? 'class="t-current"' : '' ?>><?php echo $text ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="full-wrapper">
                <div class="player-container"> <!-- Audio Player -->
                    <div class="audio-player">
                        <audio preload="none" src="audio/mp3/Daft_Punk_Giorgio_by_Moroder_Stellar_Dreams_Remix.mp3"></audio>
                        <ol class="home-playlist">
                            <?php $tracks = rwmb_meta('_jellythemes_slider_mp3', 'type=file', $post->ID ); ?>
                            <?php foreach ($tracks as $i => $track) : ?>
                                <li <?php echo $i==0 ? 'class="playing"' : '' ?> ><a href="#" data-track="<?php echo $track['title'] ?>" data-src="<?php echo $track['url'] ?>"><?php echo $track['title'] ?></a></li>
                            <?php endforeach; ?>
                        </ol>
                    </div>
                </div> <!-- end Audio Player -->
            </div>
        <?php endwhile; ?>


        <?php
            $sections = jellythemes_get_sections();
            $jellythemes_sections = new WP_Query( array('post_type' => 'page-sections',
                                'post__in' => $sections,
                                'posts_per_page' => count($sections),
                                'orderby' => 'post__in')); ?>
        <?php if ($jellythemes_sections->have_posts() ) : while ( $jellythemes_sections->have_posts() ) : $jellythemes_sections->the_post(); ?>
            <?php $bg_url='';  $bg = rwmb_meta( '_jellythemes_parallax_bg', 'type=image' ); foreach ($bg as $bg_image) : $bg_url = $bg_image['full_url']; endforeach; ?>
            <?php $back = $post //backup post data?>
            <section id="<?php echo $post->post_name; ?>" class="main-wrapper <?php echo (!empty($bg_url) ? 'parallax-wrapper' : '') ?> <?php echo get_post_meta( $post->ID, '_jellythemes_section_type', true ); ?>">
                <?php if (!empty($bg_url)) : ?><div class="parallax" data-velocity="-.3" data-fit="0" style="background-image:url(<?php echo $bg_url; ?>);"><?php endif; ?>
                    <?php the_content(); ?>
                    <?php if (get_post_meta( $post->ID, '_jellythemes_section_type', true )=='dates' || get_post_meta( $post->ID, '_jellythemes_section_type', true )=='contact') : ?>
                        <?php echo get_post_meta( $post->ID, '_jellythemes_remove_square', true ); ?>
                        <?php if (!get_post_meta( $post->ID, '_jellythemes_remove_square', true )) : ?>
                        <div class="square-bg"></div>
                        <?php endif; ?>
                        <div class="overlay"></div>
                    <?php endif; ?>
                <?php if (!empty($bg_url)) : ?></div><?php endif; ?>
            </section>
            <?php $post = $back //restore post data?>
            <?php $back = $post //backup post data?>
            <?php if (get_post_meta( $post->ID, '_jellythemes_section_type', true )=='discography') : ?>
                <div class="clear"></div>
                <div id="project-show"></div>
                <section class="project-window">
                    <div class="project-content"></div><!-- AJAX Dinamic Content -->
                </section>
            <?php endif; ?>
                <?php $child_sections = new WP_Query(array('post_type' => 'page-sections', 'post_parent' => $post->ID)); ?>
                <?php while ($child_sections->have_posts() ) : $child_sections->the_post(); ?>
                    <?php $bg_url='';  $bg = rwmb_meta( '_jellythemes_parallax_bg', 'type=image' ); foreach ($bg as $bg_image) : $bg_url = $bg_image['full_url']; endforeach; ?>
                    <section id="<?php echo $post->post_name; ?>" class="main-wrapper <?php echo (!empty($bg_url) ? 'parallax-wrapper' : '') ?> <?php echo get_post_meta( $post->ID, '_jellythemes_section_type', true ); ?>">
                        <?php if (!empty($bg_url)) : ?><div class="parallax" data-velocity="-.3" data-fit="0" style="background-image:url(<?php echo $bg_url; ?>);"><?php endif; ?>
                            <?php the_content(); ?>
                            <?php if (get_post_meta( $post->ID, '_jellythemes_section_type', true )=='dates') : ?>
                                <div class="square-bg"></div>
                                <div class="overlay"></div>
                            <?php endif; ?>
                        <?php if (!empty($bg_url)) : ?></div><?php endif; ?>

                    </section>
                <?php endwhile; ?>
                <?php $post = $back //restore post data?>
        <?php endwhile; ?>
        <?php else: ?>
            <h1><?php _e('No posts were found', 'jellythemes'); ?></h1>
        <?php endif; ?>
<?php get_footer(); ?>