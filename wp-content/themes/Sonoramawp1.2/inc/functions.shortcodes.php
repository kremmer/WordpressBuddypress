<?php
	//[jellythemes_albums] display latest works width filter menu
		add_shortcode( 'jellythemes_albums', 'jellythemes_albums_list' );
		function jellythemes_albums_list($atts, $content=null) {
		    extract( shortcode_atts( array(
		        'limit' => 3,
		        ), $atts ) );


		    $return .= '<div class="disc-container">
                    <ul>
	';
		                $albums = new WP_Query(array('post_type'=>'albums', 'posts_per_page' => esc_attr($limit)));
		                while ($albums->have_posts()) : $albums->the_post();
                            $image = get_post_meta(get_the_ID(), '_jellythemes_album_cover', true );
                            $return .= '<li>
                                            <div class="disc-img open-disc" id="' . get_permalink() . '">
                                                ' .  wp_get_attachment_image( $image , 'album_thumb') . '
                                                <div class="overlay"></div>
                                            </div>
                                            <div class="disc-info">
                                                <h2>' . get_post_meta( get_the_ID(), '_jellythemes_album_title', true ) . '</h2>
                                                <p>' . get_post_meta( get_the_ID(), '_jellythemes_album_description', true ) . '</p>
                                                <p><a href="' . get_post_meta( get_the_ID(), '_jellythemes_album_link', true ) . '">' . __('Buy Album', 'jellythemes')  . '</a></p>
                                            </div>
                                        </li>';
		                endwhile;
		    $return .=   '</ul></div>';


		    return $return;

		}

	// Titles shortcode
	function jellythemes_title( $atts, $content = null ) {
	   return '<h1>' . $content . '</h1>';
	}
	add_shortcode( 'jellythemes_title', 'jellythemes_title' );

	function jellythemes_content( $atts, $content = null ) {
	   return '<div class="sec-content">' . $content . '</div>';
	}
	add_shortcode( 'jellythemes_content', 'jellythemes_content' );

	function jellythemes_separator() {
	   return '<div class="spacer"></div>';
	}
	add_shortcode( 'jellythemes_separator', 'jellythemes_separator' );

	//[jellythemes_last_news] displays featureds works carousel
	function jellythemes_last_news($atts, $content=null) {
	    extract( shortcode_atts( array(
	        'limit' => -1,), $atts ) );
	    global $post;
	    $back=$post; //Backup post data
	    $return = '<div class="last-news-wrapper">
                    <div class="last-news-container">
                        <div class="news-nav">
                            <div class="last-news-next"></div>
                            <div class="last-news-prev"></div>
                        </div>
                        <div class="news-box">
                            <ul>
                            <li class="start"></li>';
		$news = new WP_Query(array('post_type'=>'news', 'posts_per_page' => esc_attr($limit)));
        while ($news->have_posts()) : $news->the_post();
            $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'news_thumb');
            $embed = get_post_meta( $post->ID, '_jellythemes_news_embed', true );
            if ($news->current_post%2==0) {
	            $return .= '<li id="' . get_permalink() . '" class="last-news"> <!-- Type One Thumb on Top -->
	                                    <div class="news-thumb">
	                                        <img src="' .  $image[0] .'" />
	                                    </div>
	                                    <div class="news-info">
	                                        <h1>' . get_the_title() . '</h1>
	                                        <p>' . get_the_excerpt() . '</p>
	                                        <div class="news-date">' . get_the_time(get_option('date_format')). '</div>
	                                    </div>
	                                </li>';
            } else {
            	$return .= '<li id="' . get_permalink() . '" class="last-news"> <!-- Type One Thumb on Top -->
	                                    <div class="news-info">
	                                        <h1>' . get_the_title() . '</h1>
	                                        <p>' . get_the_excerpt() . '</p>
	                                        <div class="news-date">' . get_the_time(get_option('date_format')). '</div>
	                                    </div>
	                                    <div class="news-thumb">
	                                        <img src="' .  $image[0] .'" />
	                                    </div>
	                                </li>';
            }
        endwhile;
        $post=$back; //restore post object
        $return .= '<li class="end"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
	            <div id="news-show"></div>
	            <section class="news-window">
	                <div class="news-content"></div><!-- AJAX Dinamic Content -->
	            </section>';
	    return $return;
	}
	add_shortcode( 'jellythemes_last_news', 'jellythemes_last_news' );



	//[jellythemes_gallery] displays photos and videos
	function jellythemes_gallery($atts, $content=null) {
	    extract( shortcode_atts( array(
	        'limit' => -1
	        ), $atts ) );
	    global $post;
	    $back=$post; //Backup post data
	    $return = '<div id="portfolio">
	                <div class="section portfoliocontent">
	                    <section id="i-portfolio" class="clear">';
		$media = new WP_Query(array('post_type'=>'media', 'posts_per_page' => esc_attr($limit)));
        while ($media->have_posts()) : $media->the_post();
            $image = get_post_meta( $post->ID, '_jellythemes_media_photo', true );
            $video = get_post_meta( $post->ID, '_jellythemes_media_video', true );
            $img = wp_get_attachment_image_src($image, 'media_thumb');
            $return .= '<div class="ch-grid element">
            				<img class="ch-item" src="' . $img[0] .'" alt="' . get_the_title() . '" />';
            if (empty($video)) {
            	$return .= '<a class="fancybox img-lightbox" rel="" href="' . $img[0] .'">';
            } else {
            	$return .= '<a class="fancybox-media" rel="" href="' . $video.'">';
            }
            $return .= '    <div>
                                    <span class="p-category ' . (empty($video) ? 'photo' : 'video') . '"></span>
                                </div>
                            </a>
                        </div>';

        endwhile;
        $post=$back; //restore post object
        $return .= '</section>
                </div>
            </div>';
	    return $return;
	}
	add_shortcode( 'jellythemes_gallery', 'jellythemes_gallery' );

	//[jellythemes_events_list] displays events
	function jellythemes_events_list($atts, $content=null) {
	    extract( shortcode_atts( array(
	        'limit' => 5
	        ), $atts ) );
	    global $post;
	    $back=$post; //Backup post data
	    $return = '<div class="dates-wrapper">
                    	<ul>';
		$events = new WP_Query(array('post_type'=>'events',
									'meta_key'=>'_jellythemes_event_date',
									'orderby' => 'meta_value',
									'order' => 'ASC',
									/*'meta_query' => array(
									array(
									    'key' => '_jellythemes_event_date',
									    'value' => current_time('mysql'),
									    'compare' => '>=',
									    'type' => 'date'
									     )
									),*/
									'posts_per_page' => esc_attr($limit)));
        while ($events->have_posts()) : $events->the_post();
            $image = get_post_meta( $post->ID, '_jellythemes_author_avatar', true );
            $img = wp_get_attachment_image_src($image, 'service_icon');
            $current = $events->current_post+1;
            if (($events->current_post%5==0 && $events->current_post>0) || $current==1) {
            	$return .= '<li>';
            }

            $return .= '<div class="date-box">
                                	<div class="info date">
                                        <div class="day">' . date('d', strtotime(get_post_meta( $post->ID, '_jellythemes_event_date', true ))). '</div>
                                        <div class="month">' . date('M', strtotime(get_post_meta( $post->ID, '_jellythemes_event_date', true ))). '</div>
                                        <div class="year">' . date('Y', strtotime(get_post_meta( $post->ID, '_jellythemes_event_date', true ))). '</div>
                                    </div>
                                    <div class="info">
                                    	<div class="city">' . get_post_meta( $post->ID, '_jellythemes_event_city', true ) . '</div>
                                        <div class="place"><div class="ico"></div>' . get_post_meta( $post->ID, '_jellythemes_event_place', true ) . '</div>
                                    </div>
                                    <div class="info">
                                    	<div class="time"><div class="ico"></div>' . get_post_meta( $post->ID, '_jellythemes_event_time', true ) . ' - ' . get_post_meta( $post->ID, '_jellythemes_event_time_end', true ) . '</div>
                                        <div class="buy"><div class="ico"></div><a href="' . get_post_meta( $post->ID, '_jellythemes_event_link', true ) . '">' . __('Buy Tickets', 'jellythemes') . '</a></div>
                                    </div>
                                    <div class="clear"></div>
                                </div> ';
            if (($current%5==0) || $current==$events->post_count) {
            	$return .= '</li>';
            }
        endwhile;
        $post=$back; //restore post object
        $return .=          	'</ul>
                    </div>
                    <div class="controller">
                    	<ul class="dots">
                        </ul>
                    </div>
                    <div class="dates-nav">
                        <div class="next"></div>
                        <div class="prev"></div>
                    </div>';
	    return $return;
	}

	add_shortcode( 'jellythemes_events', 'jellythemes_events_list' );


	//[jellythemes_tweets] last tweet from user
	function jellythemes_tweets( $atts, $content = null ) {
		extract( shortcode_atts( array(
	        'widgetid' => '345170787868762112'
		), $atts ) );
		$return = 	'<div class="twitter-quotes" data-widgetid="' . esc_attr($widgetid) . '"></div>
	                <div id="myTweet"></div>
	                <div class="overlay"></div>';

        return $return;
	}
	add_shortcode( 'jellythemes_tweets', 'jellythemes_tweets' );

	//contact info shortcode
	function jellythemes_contact_form( $atts, $content = null ) {
	   global $jellythemes;
	   return '<form method="post" id="contact-form" class="peThemeContactForm form" action="' . get_template_directory_uri() . '/inc/mail.php">
                        <input name="emailto" type="hidden" value="' . $jellythemes['contact_email'] . '">
                        <div id="personal" class="bay form-horizontal">
                            <div class="control-group">
                                <div class="controls name">
                                	<h2>'. __('Name', 'jellythemes') .'</h2>
                                    <input class="required span9" type="text" name="author" data-fieldid="0" id="name">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls email">
                                	<h2>'. __('Email', 'jellythemes') .'</h2>
                                    <input class="required span9" type="email" name="email" data-fieldid="1" id="email">
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="control-group">
                                <div class="controls message">
                                	<h2>'. __('Message', 'jellythemes') .'</h2>
                                    <textarea name="message" rows="12" class="required span9" data-fieldid="2" id="comments"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls send-btn">
                                    <button type="submit" class="contour-btn red buttoncontact">'. __('Send Message', 'jellythemes') .'</button>
                                </div>
                            </div>
                        </div>
                        <div class="notifications">
                            <div id="contactFormSent" class="formSent alert alert-success">
                                ' .  __('<strong>Your Message Has Been Sent! </strong> Thank you for contacting us.', 'jellythemes') . '</div>
                            <div id="contactFormError" class="formError alert alert-error">
                                <strong>' . __('Oops, An error has ocurred!</strong> See the marked fields above to fix the errors.', 'jellythemes') . '</div>
                        </div>
                    </form>';
	}
	add_shortcode( 'jellythemes_contact_form', 'jellythemes_contact_form' );

	if (function_exists('vc_remove_element')) {
		//Remove visual composer elements
		vc_remove_element('vc_accordion_tab');
		vc_remove_element('vc_accordion');
		vc_remove_element('vc_button');
		vc_remove_element('vc_carousel');
		vc_remove_element('vc_column_text');
		vc_remove_element('vc_cta_button');
		vc_remove_element('vc_facebook');
        vc_remove_element('vc_button2');
        vc_remove_element('vc_cta_button2');
		vc_remove_element('vc_flickr');
		vc_remove_element('vc_gallery');
		vc_remove_element('vc_gmaps');
		vc_remove_element('vc_googleplus');
		vc_remove_element('vc_images_carousel');
		vc_remove_element('vc_item');
		vc_remove_element('vc_items');
		vc_remove_element('vc_message');
		vc_remove_element('vc_pie');
		vc_remove_element('vc_pinterest');
		vc_remove_element('vc_posts_grid');
		vc_remove_element('vc_posts_slider');
		vc_remove_element('vc_progress_bar');
		vc_remove_element('vc_raw_html');
		vc_remove_element('vc_separator');
		vc_remove_element('vc_single_image');
		vc_remove_element('vc_tab');
		vc_remove_element('vc_tabs');
		vc_remove_element('vc_teaser_grid');
		vc_remove_element('vc_text_separator');
		vc_remove_element('vc_toggle');
		vc_remove_element('vc_tweetmeme');
		vc_remove_element('vc_twitter');
		vc_remove_element('vc_video');
		vc_remove_element('vc_raw_js');
		vc_remove_element('vc_tour');
		vc_remove_element("vc_widget_sidebar");
		vc_remove_element("vc_wp_search");
		vc_remove_element("vc_wp_meta");
		vc_remove_element("vc_wp_recentcomments");
		vc_remove_element("vc_wp_calendar");
		vc_remove_element("vc_wp_pages");
		vc_remove_element("vc_wp_tagcloud");
		vc_remove_element("vc_wp_custommenu");
		vc_remove_element("vc_wp_text");
		vc_remove_element("vc_wp_posts");
		vc_remove_element("vc_wp_links");
		vc_remove_element("vc_wp_categories");
		vc_remove_element("vc_wp_archives");
		vc_remove_element("vc_wp_rss");
		vc_remove_element("vc_gallery");
		vc_remove_element("vc_teaser_grid");
		vc_remove_element("vc_button");
		vc_remove_element("vc_cta_button");

		vc_map( array(
		   "name" => __("Section title", 'jellythemes'),
		   "base" => "jellythemes_title",
		   "class" => "",
		   "icon" => "jelly-icon",
		   "category" => __('Content', 'jellythemes'),
		   "params" => array(
		      array(
		         "type" => "textfield",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Content",'jellythemes'),
		         "param_name" => "content",
		         "value" => __("Your title", 'jellythemes'),
		         "description" => __("Enter your title.", 'jellythemes')
		      )
		   )
		));

		vc_map( array(
		   "name" => __("Content separator", 'jellythemes'),
		   "base" => "jellythemes_separator",
		   "class" => "",
		   'show_settings_on_create' => false,
		   "icon" => "jelly-icon",
		   "category" => __('Content', 'jellythemes'),
		   "params" => array()
		));

		vc_map( array(
		   "name" => __("Section content", 'jellythemes'),
		   "base" => "jellythemes_content",
		   "class" => "",
		   "icon" => "jelly-icon",
		   "category" => __('Content', 'jellythemes'),
		   "params" => array(
		      array(
		         "type" => "textarea_html",
		         "holder" => "div",
		         "class" => "",
		         "heading" => __("Content",'jellythemes'),
		         "param_name" => "content",
		         "value" => __("Your content", 'jellythemes'),
		         "description" => __("<p>Enter text.</p>", 'jellythemes')
		      )
		   )
		));


		vc_map( array(
		   "name" => __("Last news", 'jellythemes'),
		   "base" => "jellythemes_last_news",
		   "class" => "",
		   "icon" => "jelly-icon",
		   "category" => __('Content', 'jellythemes'),
		   "params" => array(
		      array(
			      "type" => "dropdown",
			      "heading" => __('Number of news to show', 'jellythemes'),
			      "param_name" => "limit",
			      "value" => array(
			                        __("Unlimited", 'jellythemes') => '-1',
			                        __("1", 'jellythemes') => '1',
			                        __('2', 'jellythemes') => '2',
			                        __('3', 'jellythemes') => '3',
									__('3', 'jellythemes') => '3',
									__('4', 'jellythemes') => '4',
									__('5', 'jellythemes') => '5',
			                      ),
			      "description" => __("Select the number of news you want to show in the carousel", "jellythemes"),
			    )
		   )
		));

		vc_map( array(
		   "name" => __("Gallery", 'jellythemes'),
		   "base" => "jellythemes_gallery",
		   "class" => "",
		   "icon" => "jelly-icon",
		   "description" => __('Photos and video items', 'jellythemes'),
		   "category" => __('Content', 'jellythemes'),
		   "params" => array(
		      array(
			      "type" => "dropdown",
			      "heading" => __('Number of items to show', 'jellythemes'),
			      "param_name" => "limit",
			      "value" => array(
			                        __("Unlimited", 'jellythemes') => '-1',
			                        __("1", 'jellythemes') => '1',
			                        __('2', 'jellythemes') => '2',
			                        __('3', 'jellythemes') => '3',
									__('3', 'jellythemes') => '3',
									__('4', 'jellythemes') => '4',
									__('5', 'jellythemes') => '5',
									__('6', 'jellythemes') => '6',
			                      ),
			      "description" => __("Select the number of media items you want to show", "jellythemes"),
			    )
		   )
		));

		vc_map( array(
		   "name" => __("Events", 'jellythemes'),
		   "description" => __("Events list", 'jellythemes'),
		   "base" => "jellythemes_events",
		   "class" => "",
		   "icon" => "jelly-icon",
		   "category" => __('Content', 'jellythemes'),
		   "params" => array(
		      array(
			      "type" => "dropdown",
			      "heading" => __('Number of events to show', 'jellythemes'),
			      "param_name" => "limit",
			      "value" => array(
			                        __("Unlimited", 'jellythemes') => '-1',
			                        __("1", 'jellythemes') => '1',
			                        __('2', 'jellythemes') => '2',
			                        __('3', 'jellythemes') => '3',
									__('3', 'jellythemes') => '3',
									__('4', 'jellythemes') => '4',
									__('5', 'jellythemes') => '5',
									__('6', 'jellythemes') => '6',
			                      ),
			      "description" => __("Select the number of events you want to show", "jellythemes"),
			    )
		   )
		));

		vc_map( array(
		   "name" => __("Albums", 'jellythemes'),
		   "description" => __("Albums list", 'jellythemes'),
		   "base" => "jellythemes_albums",
		   "class" => "",
		   "icon" => "jelly-icon",
		   "category" => __('Content', 'jellythemes'),
		   "params" => array(
		      array(
			      "type" => "dropdown",
			      "heading" => __('Number of albums to show', 'jellythemes'),
			      "param_name" => "limit",
			      "value" => array(
			                        __("Unlimited", 'jellythemes') => '-1',
			                        __("1", 'jellythemes') => '1',
			                        __('2', 'jellythemes') => '2',
			                        __('3', 'jellythemes') => '3',
									__('3', 'jellythemes') => '3',
									__('4', 'jellythemes') => '4',
									__('5', 'jellythemes') => '5',
									__('6', 'jellythemes') => '6',
			                      ),
			      "description" => __("Select the number of albums you want to show", "jellythemes"),
			    )
		   )
		));

		vc_map( array(
		    "name" => __("Last Tweet", "jellythemes"),
		    "base" => "jellythemes_tweets",
		    "icon" => "jelly-icon",
		    "category" => __('Content', 'jellythemes'),
		    "description" => __('Show last tweet', 'jellythemes'),
		    "params" => array(
			        array(
			            "type" => "textfield",
			            "heading" => __("Twitter widget ID", "jellythemes"),
			            "param_name" => "widgetid",
			            "value" => "345170787868762112",
			        )
			    )
		) );
		vc_map( array(
		   "name" => __("Contact form", 'jellythemes'),
		   "base" => "jellythemes_contact_form",
		   "class" => "",
		   "icon" => "jelly-icon",
		   "category" => __('Content', 'jellythemes'),
		   'show_settings_on_create' => false,
		   "description" => __('Contact form for parallax section', 'jellythemes'),
		));

		function custom_css_classes_for_vc_row_and_vc_column($class_string, $tag) {
		  if ($tag=='vc_row' || $tag=='vc_row_inner') {
		    $class_string = str_replace('vc_row-fluid', 'sonorama_row-fluid', $class_string);
		  }
		  if ($tag=='vc_column' || $tag=='vc_column_inner') {
		    $class_string = preg_replace('/vc_span(\d{1,2})/', 'sonorama_col$1', $class_string);
		  }
		  $class_string = str_replace('wpb_row', 'sonorama_row', $class_string);
		  return $class_string;
		}
		// Filter to Replace default css class for vc_row shortcode and vc_column
		add_filter('vc_shortcodes_css_class', 'custom_css_classes_for_vc_row_and_vc_column', 10, 2);
	}
?>