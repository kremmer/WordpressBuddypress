<?php
/* POSTS TYPES DEFINITION */


add_action('init', 'jellythemes_section');
add_action('init', 'jellythemes_news');
add_action('init', 'jellythemes_events');
add_action('init', 'jellythemes_albums');
add_action('init', 'jellythemes_tracks');
add_action('init', 'jellythemes_media_gallery');

function jellythemes_section()  {
  $labels = array(
    'name' => __('Sections', 'framework'),
    'singular_name' => __('Sections', 'framework'),
    'add_new' => __('Add New Section', 'framework'),
    'add_new_item' => __('Add New Section', 'framework'),
    'edit_item' => __('Edit section', 'framework'),
    'new_item' => __('New section', 'framework'),
    'view_item' => __('View section', 'framework'),
    'search_items' => __('Search sections', 'framework'),
    'not_found' =>  __('No sections found', 'framework'),
    'not_found_in_trash' => __('No sections found in Trash', 'framework'),
    'parent_item_colon' => ''
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => false,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'show_in_nav_menus' => true,
    'hierarchical' => true,
	'exclude_from_search' => true,
    'menu_position' => 5,
    'supports' => array('title','editor', 'page-attributes')
  );
  register_post_type('page-sections',$args);
}

function jellythemes_events()  {
  $labels = array(
    'name' => __('Events', 'framework'),
    'singular_name' => __('Event', 'framework'),
    'add_new' => __('Add event', 'framework'),
    'add_new_item' => __('Add event', 'framework'),
    'edit_item' => __('Edit event', 'framework'),
    'new_item' => __('New events', 'framework'),
    'view_item' => __('View event', 'framework'),
    'search_items' => __('Search events', 'framework'),
    'not_found' =>  __('No events found', 'framework'),
    'not_found_in_trash' => __('No events found in Trash', 'framework'),
    'parent_item_colon' => ''
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'show_in_nav_menus' => false,
    'hierarchical' => false,
    'exclude_from_search' => true,
    'menu_position' => 5,
    'supports' => array('title')
  );
  register_post_type('events',$args);
}

function jellythemes_media_gallery()  {
  $labels = array(
    'name' => __('Gallery', 'framework'),
    'singular_name' => __('Gallery', 'framework'),
    'add_new' => __('Add media', 'framework'),
    'add_new_item' => __('Add media', 'framework'),
    'edit_item' => __('Edit media', 'framework'),
    'new_item' => __('New media', 'framework'),
    'view_item' => __('View media', 'framework'),
    'search_items' => __('Search media', 'framework'),
    'not_found' =>  __('No media found', 'framework'),
    'not_found_in_trash' => __('No media found in Trash', 'framework'),
    'parent_item_colon' => ''
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'show_in_nav_menus' => false,
    'capability_type' => 'post',
    'hierarchical' => false,
    'exclude_from_search' => true,
    'menu_position' => 5,
    'supports' => array('title')
  );
  register_post_type('media',$args);
}

function jellythemes_news()  {
  $labels = array(
    'name' => __('News', 'framework'),
    'singular_name' => __('News', 'framework'),
    'add_new' => __('Add news', 'framework'),
    'add_new_item' => __('Add news', 'framework'),
    'edit_item' => __('Edit news', 'framework'),
    'new_item' => __('New news', 'framework'),
    'view_item' => __('View news', 'framework'),
    'search_items' => __('Search news', 'framework'),
    'not_found' =>  __('No news found', 'framework'),
    'not_found_in_trash' => __('No news found in Trash', 'framework'),
    'parent_item_colon' => ''
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'show_in_nav_menus' => false,
    'capability_type' => 'post',
    'hierarchical' => false,
    'exclude_from_search' => true,
    'menu_position' => 5,
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
  );
  register_post_type('news',$args);
}

function jellythemes_albums()  {
  $labels = array(
    'name' => __('Albums', 'framework'),
    'singular_name' => __('Album', 'framework'),
    'add_new' => __('Add Album', 'framework'),
    'add_new_item' => __('Add Album', 'framework'),
    'edit_item' => __('Edit Album', 'framework'),
    'new_item' => __('New Album', 'framework'),
    'view_item' => __('View Albums', 'framework'),
    'search_items' => __('Search Albums', 'framework'),
    'not_found' =>  __('No Albums found', 'framework'),
    'not_found_in_trash' => __('No Albums found in Trash', 'framework'),
    'parent_item_colon' => ''
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'show_in_nav_menus' => false,
    'hierarchical' => false,
    'exclude_from_search' => true,
    'menu_position' => 5,
    'rewrite' => array( 'slug' => 'album' ),
    'supports' => array('title')
  );
  register_post_type('albums',$args);
}

function jellythemes_tracks()  {
  $labels = array(
    'name' => __('Tracks', 'framework'),
    'singular_name' => __('Track', 'framework'),
    'add_new' => __('Add Track', 'framework'),
    'add_new_item' => __('Add Track', 'framework'),
    'edit_item' => __('Edit Track', 'framework'),
    'new_item' => __('New Track', 'framework'),
    'view_item' => __('View Tracks', 'framework'),
    'search_items' => __('Search Tracks', 'framework'),
    'not_found' =>  __('No Tracks found', 'framework'),
    'not_found_in_trash' => __('No Tracks found in Trash', 'framework'),
    'parent_item_colon' => ''
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'show_in_nav_menus' => false,
    'hierarchical' => false,
    'exclude_from_search' => true,
    'menu_position' => 5,
    'rewrite' => array( 'slug' => 'track' ),
    'taxonomies' => array(''),
    'supports' => array('title')
  );
  register_post_type('track',$args);
}



?>
