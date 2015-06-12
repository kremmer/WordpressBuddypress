<?php /* Template Name: Home Page 2 (video) */ ?>
<?php get_header(); ?>


        <?php while ( have_posts() ) : the_post(); ?>
            <?php $video = get_post_meta( $post->ID, '_jellythemes_slider_video', true ); ?>
            <div id="<?php echo $post->post_name; ?>" class="slides-1 player" data-property="{videoURL:'<?php echo $video ?>',showControls:false,containment:'self',autoPlay:true, mute:false, startAt:0,opacity:1,ratio:'4/3', addRaster:true}">
                <a href="#" class="play-video">Play/Pause</a>
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
                        <div class="square-bg"></div>
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