<?php 
/* Custom Post Types */

add_action('init', 'js_custom_init');
function js_custom_init() 
{
	 // Register the Homepage Slides
  
     $labels = array(
  'name' => _x('Events', 'post type general name'),
    'singular_name' => _x('Event', 'post type singular name'),
    'add_new' => _x('Add New', 'Event'),
    'add_new_item' => __('Add New Event'),
    'edit_item' => __('Edit Events'),
    'new_item' => __('New Event'),
    'view_item' => __('View Events'),
    'search_items' => __('Search Events'),
    'not_found' =>  __('No Events found'),
    'not_found_in_trash' => __('No Events found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Events'
  );
  $args = array(
  'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
  
  ); 
  register_post_type('event',$args); // name used in query

       $labels = array(
  'name' => _x('Newsletter', 'post type general name'),
    'singular_name' => _x('Newsletter', 'post type singular name'),
    'add_new' => _x('Add New', 'Newsletter'),
    'add_new_item' => __('Add New Newsletter'),
    'edit_item' => __('Edit Newsletters'),
    'new_item' => __('New Newsletter'),
    'view_item' => __('View Newsletters'),
    'search_items' => __('Search Newsletters'),
    'not_found' =>  __('No Newsletters found'),
    'not_found_in_trash' => __('No Newsletters found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Newsletters'
  );
  $args = array(
  'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'awir-newsletter' ),
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
  
  ); 
  register_post_type('newsletter',$args); // name used in query
	// Register the Homepage Slides
  
     $labels = array(
	'name' => _x('Board Members', 'post type general name'),
    'singular_name' => _x('Board Member', 'post type singular name'),
    'add_new' => _x('Add New', 'Board Member'),
    'add_new_item' => __('Add New Board Member'),
    'edit_item' => __('Edit Board Members'),
    'new_item' => __('New Board Member'),
    'view_item' => __('View Board Members'),
    'search_items' => __('Search Board Members'),
    'not_found' =>  __('No Board Members found'),
    'not_found_in_trash' => __('No Board Members found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Board Members'
  );
  $args = array(
	'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
	
  ); 
  register_post_type('board',$args); // name used in query

      $labels = array(
  'name' => _x('Partner Organizations', 'post type general name'),
    'singular_name' => _x('Partner', 'post type singular name'),
    'add_new' => _x('Add New', 'BPartner'),
    'add_new_item' => __('Add New Partner'),
    'edit_item' => __('Edit Partner'),
    'new_item' => __('New Partner'),
    'view_item' => __('View Partner'),
    'search_items' => __('Search Partner'),
    'not_found' =>  __('No Partners found'),
    'not_found_in_trash' => __('No Partners found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Partner Organizations'
  );
  $args = array(
  'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
  
  ); 
  register_post_type('partner',$args); // name used in query
  
  // Add more between here
  
  // and here
  
  } // close custom post type