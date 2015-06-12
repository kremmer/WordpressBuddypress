<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = '_jellythemes_';

global $meta_boxes;

$meta_boxes = array();

// 1st meta box
$meta_boxes[] = array(
        'id'         => 'section_attributes',
        'title'      =>  __('Section attributes', 'jellythemes'),
        'pages'      => array( 'page-sections', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields'     => array(
        	array(
                'name' => __('Parallax background image', 'jellythemes'),
                'id'   => $prefix . 'parallax_bg',
                'type' => 'image_advanced',
        	),
        	array(
        		'name' => __('Section type','jellythemes'),
        		'id' => $prefix . 'section_type',
        		'type' => 'select',
        		'options' => array(
        					'' => __('Select section type for special styling', 'jellythemes'),
        					'dates' => __('Tour dates', 'jellythemes'),
        					'quotes' => __('Twitter quotes', 'jellythemes'),
                            'discography' => __('Discography', 'jellythemes'),
        					'full-wrapper portfolio' => __('Portfolio', 'jellythemes'),
        					'full-wrapper portfolio' => __('Photo & Video Gallery', 'jellythemes'),
        					'about-us full-wrapper parallax-wrapper' => __('Text section', 'jellythemes'),
                            'contact' => __('Contact', 'jellythemes'),
        			),
        	),
            array(
                    'name' =>  __('Remove rhombus'),
                    'desc' =>  __('Remove rhombus background if exists (only Tour dates and Contact sections)'),
                    'id' => $prefix . 'remove_square',
                    'type' => 'checkbox',
                )
        ),
    );
	$meta_boxes[] = array(
		        'id'         => 'albums_attributes',
		        'title'      =>  __('Album attributes', 'jellythemes'),
		        'pages'      => array( 'albums', ), // Post type
		        'context'    => 'normal',
		        'priority'   => 'high',
		        'show_names' => true, // Show field names on the left
		        'fields'     => array(
		            array(
		                'name' => __('Album cover', 'jellythemes'),
		                'id'   => $prefix . 'album_cover',
		                'type' => 'image_advanced',
		        	),
		        	array(
                        'name' =>  __('Album title','jellythemes' ),
                        'id'   => $prefix . 'album_title',
                        'type' => 'text',
                    ),
		        	array(
		                'name' =>  __('Album artist','jellythemes' ),
		                'id'   => $prefix . 'album_artist',
		                'type' => 'text',
		            ),
                    array(
                        'name' =>  __('Release date','jellythemes' ),
                        'id'   => $prefix . 'album_date',
                        'type' => 'date',
                        'js_options' => array(
                            'appendText'      => __( '(yyyy-mm-dd)', 'rwmb' ),
                            'dateFormat'      => __( 'yy-mm-dd', 'rwmb' ),
                            'changeMonth'     => true,
                            'changeYear'      => true,
                            'showButtonPanel' => true,
                        )
                    ),
                    array(
                        'name' =>  __('Buy link','jellythemes' ),
                        'id'   => $prefix . 'album_link',
                        'type' => 'text',
                    ),
                    array(
                        'name' =>  __('iTunes','jellythemes' ),
                        'id'   => $prefix . 'album_itunes',
                        'type' => 'text',
                    ),
                    array(
                        'name' =>  __('Beatport','jellythemes' ),
                        'id'   => $prefix . 'album_beatport',
                        'type' => 'text',
                    ),
                    array(
                        'name' =>  __('Bandcamp','jellythemes' ),
                        'id'   => $prefix . 'album_bandcamp',
                        'type' => 'text',
                    ),
		            array(
		                'name' =>  __('Album description', 'jellythemes'),
		                'id'   => $prefix . 'album_description',
		                'type' => 'wysiwyg',
		            ),
		            array(
		                'name' =>  __('Bandcamp embed', 'jellythemes'),
		                'id'   => $prefix . 'album_embed',
		                'type' => 'textarea',
		                'desc' => __('Displays bandcamp embed player instead of album tracks (Note: change the width to 100%)', 'jellythemes')
		            )
		        ),
		    );
	$meta_boxes[] = array(
		        'id'         => 'slide_attributes',
		        'title'      =>  __('Slider options', 'jellythemes'),
		        'pages'      => array( 'page', ), // Post type
		        'context'    => 'normal',
		        'priority'   => 'high',
		        'show_names' => true, // Show field names on the left
		        'fields'     => array(
		            array(
		                'name' => __('Slider images', 'jellythemes'),
		                'id'   => $prefix . 'slider_images',
		                'type' => 'image_advanced',
		                'desc' => __('First image is used to video background alternative and pattern background', 'jellythemes')
		        	),
		        	array(
		                'name' => __('Slider text (multiple)', 'jellythemes'),
		                'id'   => $prefix . 'slider_text',
		                'type' => 'text',
		                'clone' => true
		        	),
		        	array(
		                'name' => __('Slider images', 'jellythemes'),
		                'id'   => $prefix . 'slider_heading_img',
		                'type' => 'image_advanced',
		                'desc' => __('Image for heading slider', 'jellythemes'),
		        		'max_file_uploads' => 1
		        	),
		        	array(
		                'name' => __('MP3 files', 'jellythemes'),
		                'id'   => $prefix . 'slider_mp3',
		                'type' => 'file_advanced',
		                'desc' => __('Slider mp3 files for player', 'jellythemes'),
		        		'max_file_uploads' => 5
		        	),
                    array(
                        'name' => __('Video background', 'jellythemes'),
                        'id'   => $prefix . 'slider_video',
                        'type' => 'oembed',
                        'desc' => __('Video background for home slider (Template: Home Page 2)', 'jellythemes')
                    )
		        ),
		    );

	$meta_boxes[] = array(
	        'id'         => 'news_info',
	        'title'      =>  __('News embed', 'jellythemes'),
	        'pages'      => array( 'news', ), // Post type
	        'context'    => 'normal',
	        'priority'   => 'high',
	        'show_names' => true, // Show field names on the left
	        'fields'     => array(
	            array(
	                'name' =>  __('News embed (youtube, vimeo, soundcloud, etc.)', 'jellythemes'),
	                'id'   => $prefix . 'news_embed',
	                'type' => 'oembed',
	            ),
                array(
                    'name' =>  __('Featured photo instead of embed', 'jellythemes'),
                    'id'   => $prefix . 'news_photo',
                    'type' => 'image_advanced',
                    'max_file_uploads' => 1
                ),
	        ),
	    );
	$meta_boxes[] = array(
        'id'         => 'events_info',
        'title'      =>  __('Events info', 'jellythemes'),
        'pages'      => array( 'events', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields'     => array(
            array(
                'name' =>  __('Date', 'jellythemes'),
                'id'   => $prefix . 'event_date',
                'type' => 'date',
                'js_options' => array(
					'appendText'      => __( '(yyyy-mm-dd)', 'rwmb' ),
					'dateFormat'      => __( 'yy-mm-dd', 'rwmb' ),
					'changeMonth'     => true,
					'changeYear'      => true,
					'showButtonPanel' => true,
				)
            ),
            array(
                'name' =>  __('Start Time', 'jellythemes'),
                'id'   => $prefix . 'event_time',
                'type' => 'time',
                'js_options' => array(
					'stepMinute' => 5,
					'showSecond' => false,
                    'timeFormat' => "hh:mm tt"
				)
            ),
            array(
                'name' =>  __('End Time', 'jellythemes'),
                'id'   => $prefix . 'event_time_end',
                'type' => 'time',
                'js_options' => array(
					'stepMinute' => 5,
					'showSecond' => false,
                    'timeFormat' => "hh:mm tt"
				)
            ),
            array(
                'name' =>  __('City', 'jellythemes'),
                'id'   => $prefix . 'event_city',
                'type' => 'text',
                'std' => ''
            ),
            array(
                'name' =>  __('Place', 'jellythemes'),
                'id'   => $prefix . 'event_place',
                'type' => 'text',
                'std' => ''
            ),
            array(
                'name' =>  __('Tickets link', 'jellythemes'),
                'id'   => $prefix . 'event_link',
                'type' => 'text',
                'std' => ''
            ),
        ),
    );
	$meta_boxes[] = array(
		        'id'         => 'gallery_attributes',
		        'title'      =>  __('Photo and video', 'jellythemes'),
		        'pages'      => array( 'media', ), // Post type
		        'context'    => 'normal',
		        'priority'   => 'high',
		        'show_names' => true, // Show field names on the left
		        'fields'     => array(
		            array(
		                'name' => __('Photo and video thumbnail', 'jellythemes'),
		                'id'   => $prefix . 'media_photo',
		                'type' => 'image_advanced',
		        	),
		            array(
		                'name' =>  __('Video URL','jellythemes'),
		                'id'   => $prefix . 'media_video',
		                'type' => 'oembed',
		            )
		        ),
		    );
	$meta_boxes[] = array(
        'id'         => 'tracks_attributes',
        'title'      =>  __('Tracks attributes', 'jellythemes'),
        'pages'      => array( 'track', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        'fields'     => array(
            array(
                'name' => __( 'Select Album', 'jellythemes' ),
                'id' => $prefix . 'album',
                'type' => 'post',
                'post_type' => 'albums',
                'field_type' => 'select',
                'std' =>  __('Select Album', 'jellythemes'),
                'query_args' => array(
                    'post_status' => 'publish',
                    'posts_per_page' => '-1',
                    )
                ),
            array(
                'name' =>  __('Track title', 'jellythemes'),
                'id'   => $prefix . 'track_number',
                'type' => 'text',
                'std' => '',
                'desc' => 'Track number in the album. Order by this field'
                ),
            array(
                'name' =>  __('Track title', 'jellythemes'),
                'id'   => $prefix . 'track_title',
                'type' => 'text',
                'std' => ''
            ),
            array(
                'name' =>  __('Track artist', 'jellythemes'),
                'id'   => $prefix . 'track_artist',
                'type' => 'text',
                'std' => ''
            ),
            array(
                'name' => __('MP3 File', 'jellythemes'),
                'id'   => $prefix . 'track_file',
                'type' => 'file_advanced',
                ),
            array(
                'name' => __('Buy link', 'jellythemes'),
                'id'   => $prefix . 'buy_link',
                'type' => 'text',
                ),
            array(
                'name' => __('File Size', 'jellythemes'),
                'id'   => $prefix . 'file_size',
                'type' => 'text',
                'desc' => "i.e. 9MB"
                ),
        ),
    );

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function dynamo_register_meta_boxes()
{
	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	global $meta_boxes;
	foreach ( $meta_boxes as $meta_box )
	{
		new RW_Meta_Box( $meta_box );
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'dynamo_register_meta_boxes' );
