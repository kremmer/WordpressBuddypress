<?php
    // Define content width
    if ( ! isset( $content_width ) ) $content_width = 1180;
	// Load scripts and styles files
    function jellythemes_scripts_and_styles() {
        global $jellythemes;
        if (!is_admin()) {
            wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
            wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css' );
            wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css' );
            wp_enqueue_style( 'sonorama', get_template_directory_uri() . '/css/sonorama.css' );
            if ( !is_page_template( 'homepage.php' ) ) {
                wp_enqueue_style( 'blog', get_template_directory_uri() . '/css/blog.css' );
            }
            wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css' );
            wp_enqueue_style( 'isotope', get_template_directory_uri() . '/css/isotope.css' );
            wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.css' );
            wp_enqueue_style( 'light', get_template_directory_uri() . '/css/color/light.css' );
            if (empty($jellythemes['color'])) {wp_enqueue_style('red', get_template_directory_uri() . '/css/color/red.css' );}
            else {wp_enqueue_style( $jellythemes['color'], get_template_directory_uri() . '/css/color/' . $jellythemes['color'] . '.css' );}

            wp_enqueue_script('jquery');
            wp_enqueue_script(
                'modernizr',
                get_template_directory_uri() . '/js/vendor/modernizr-2.6.2.min.js',
                false,false,true );
            wp_enqueue_script(
                'superslidesjs',
                get_template_directory_uri() . '/js/superslides-0.6.2/dist/jquery.superslides.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'isotope',
                get_template_directory_uri() . '/js/jquery.isotope.min.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'player-audio',
                get_template_directory_uri() . '/js/player/audio.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'hoverdir',
                get_template_directory_uri() . '/js/jquery.hoverdir.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'nav',
                get_template_directory_uri() . '/js/jquery.nav.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'news',
                get_template_directory_uri() . '/js/news.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'discography',
                get_template_directory_uri() . '/js/discography.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'tweets',
                get_template_directory_uri() . '/js/tweets.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'jquery.scrolly',
                get_template_directory_uri() . '/js/jquery.scrolly.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'fancybox',
                get_template_directory_uri() . '/js/fancybox/jquery.fancybox.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'fancybox-media',
                get_template_directory_uri() . '/js/fancybox/helpers/jquery.fancybox-media.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'picker',
                get_template_directory_uri() . '/js/color-picker.js',
                array('jquery'),false,true );
            wp_enqueue_script(
                'validate',
                get_template_directory_uri() . '/js/jquery.validate.js',
                array('jquery'),false,true);
            wp_enqueue_script(
                'form',
                get_template_directory_uri() . '/js/jquery.form.js',
                array('jquery'),false,true);
            wp_enqueue_script(
                'ytplayer',
                get_template_directory_uri() . '/js/jquery.mb.YTPlayer.js',
                array('jquery'),false,true);
            wp_enqueue_script(
                'plugins',
                get_template_directory_uri() . '/js/plugins.js',
                array('jquery'),false,true);
            wp_enqueue_script(
                'sonorama',
                get_template_directory_uri() . '/js/sonorama.js',
                array('jquery'),false,true);
        }
    }
    add_action('wp_enqueue_scripts', 'jellythemes_scripts_and_styles');

    // Define walker nav menu to display custom html output
    class jellythemes_walker_nav_menu extends Walker_Nav_Menu {

        function start_el( &$output, $item, $depth = 0, $args = array(), $curr = 0 ) {
            global $wp_query;
            $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

            $depth_classes = array(
                ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
                ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
                ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
                'menu-item-depth-' . $depth
            );
            $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

            $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
            $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
            if ($item->object == 'page' || $item->object == 'page-sections' ) {
                $varpost = get_post($item->object_id);
                $attributes .= ' href="' . get_site_url() . '/#' . $varpost->post_name . '"';
            } else {
                $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
            }
            $item_output = '';
            if (is_object($args)) :
            $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
                $args->before,
                $attributes,
                $args->link_before,
                apply_filters( 'the_title', $item->title, $item->ID ),
                $args->link_after,
                $args->after
            );
            endif;
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, 0 );
        }
    }

    //Return array of section's IDs in Main menu
    function jellythemes_get_sections(){
        if(!has_nav_menu( 'main' )) {
            return;
        }
        if ( ( $locations = get_nav_menu_locations() ) && $locations['main']  ) {
            $menu = wp_get_nav_menu_object( $locations['main'] );
            $items  = wp_get_nav_menu_items($menu->term_id);
            $sections = array();
            foreach((array) $items as $menu_items){
                if ($menu_items->object == 'page-sections') {
                    $sections[] = $menu_items->object_id;
                }
            }
        }
        return $sections;
    }

    //Comment format and Walker
    function jellythemes_comments_format($comment, $args, $depth) {
            $id = $comment->comment_ID;
    ?>
            <li <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php echo $id ?>">

            <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, 115); ?>
            <div class="comment-author"><?php echo get_comment_author_link(); ?>  <small><?php edit_comment_link(__('Edit','jellythemes')); ?></small></div>
            <div class="comment-text"><?php comment_text(); ?></div>
            <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    <?php
    }
    add_filter('comment_reply_link', 'replace_reply_link_class');
    function replace_reply_link_class($class){
        $class = str_replace("class='comment-reply-link", "class='reply", $class);
        return $class;
    }


?>
