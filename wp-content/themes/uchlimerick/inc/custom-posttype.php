<?php
/**
 * Register a custom post type
 */
function custome_post_type_init() {
	/*Careers post type register*/
	$careers_labels = [
		'name'               => _x( 'Careers', 'Post type general name', 'uchlimerick' ),
		'singular_name'      => _x( 'Careers', 'Post type singular name', 'uchlimerick' ),
		'menu_name'          => _x( 'Careers', 'Admin Menu text', 'uchlimerick' ),
		'name_admin_bar'     => _x( 'Careers', 'Add New on Toolbar', 'uchlimerick' ),
		'add_new'            => __( 'Add New', 'uchlimerick' ),
		'add_new_item'       => __( 'Add New Careers', 'uchlimerick' ),
		'new_item'           => __( 'New Careers', 'uchlimerick' ),
		'edit_item'          => __( 'Edit Careers', 'uchlimerick' ),
		'view_item'          => __( 'View Careers', 'uchlimerick' ),
		'all_items'          => __( 'All Careers', 'uchlimerick' ),
		'search_items'       => __( 'Search Careers', 'uchlimerick' ),
		'parent_item_colon'  => __( 'Parent Careers:', 'uchlimerick' ),
		'not_found'          => __( 'No Careers found.', 'uchlimerick' ),
		'not_found_in_trash' => __( 'No Careers found in Trash.', 'uchlimerick' ),
	];
	$careers_args   = [
		'labels'             => $careers_labels,
		'public'             => FALSE,
		'publicly_queryable' => TRUE,
		'show_ui'            => TRUE,
		'show_in_menu'       => TRUE,
		'query_var'          => TRUE,
		'rewrite'            => [ 'slug' => 'careers' ],
		'capability_type'    => 'post',
		'has_archive'        => TRUE,
		'hierarchical'       => FALSE,
		'menu_position'      => NULL,
		'menu_icon'          => 'dashicons-groups',
		'supports'           => [ 'title', 'editor', 'author', 'thumbnail', 'excerpt' ],
	];
	register_post_type( 'careers', $careers_args );
	/*individule show */
	$show_labels = [
		'name'               => _x( 'Show', 'Post type general name', 'uchlimerick' ),
		'singular_name'      => _x( 'Show', 'Post type singular name', 'uchlimerick' ),
		'menu_name'          => _x( 'Show', 'Admin Menu text', 'uchlimerick' ),
		'name_admin_bar'     => _x( 'Show', 'Add New on Toolbar', 'uchlimerick' ),
		'add_new'            => __( 'Add New', 'uchlimerick' ),
		'add_new_item'       => __( 'Add New Show', 'uchlimerick' ),
		'new_item'           => __( 'New Show', 'uchlimerick' ),
		'edit_item'          => __( 'Edit Show', 'uchlimerick' ),
		'view_item'          => __( 'View Show', 'uchlimerick' ),
		'all_items'          => __( 'All Show', 'uchlimerick' ),
		'search_items'       => __( 'Search Show', 'uchlimerick' ),
		'parent_item_colon'  => __( 'Parent Show:', 'uchlimerick' ),
		'not_found'          => __( 'No Show found.', 'uchlimerick' ),
		'not_found_in_trash' => __( 'No Show found in Trash.', 'uchlimerick' ),
	];
	$show_args   = [
		'labels'             => $show_labels,
		'public'             => FALSE,
		'publicly_queryable' => TRUE,
		'show_ui'            => TRUE,
		'show_in_menu'       => TRUE,
		'query_var'          => TRUE,
		'rewrite'            => [ 'slug' => 'show' ],
		'capability_type'    => 'post',
		'has_archive'        => TRUE,
		'hierarchical'       => FALSE,
		'menu_position'      => NULL,
		'menu_icon'          => 'dashicons-tickets',
		'supports'           => [ 'title', 'editor', 'author', 'thumbnail', 'excerpt' ],
		'taxonomies'         => [ 'show_cat' ],
	];
	register_post_type( 'show', $show_args );
	
	// show_cat taxonomy for shows starts here
	$labels = [
		'name'              => _x( 'Show Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Show Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Show Categories' ),
		'all_items'         => __( 'All Show Categories' ),
		'parent_item'       => __( 'Parent Show Categories' ),
		'parent_item_colon' => __( 'Parent Show Categories:' ),
		'edit_item'         => __( 'Edit Show Categories' ),
		'update_item'       => __( 'Update Show Categories' ),
		'add_new_item'      => __( 'Add Show Category' ),
		'new_item_name'     => __( 'New Category Name' ),
		'menu_name'         => __( 'Show Category' ),
	];
	$args   = [
		"public"             => TRUE,
		"publicly_queryable" => FALSE,
		'hierarchical'       => TRUE,
		'labels'             => $labels,
		'show_ui'            => TRUE,
		'show_admin_column'  => TRUE,
		'query_var'          => TRUE,
		'rewrite'            => [ 'slug' => 'show_cat' ],
	];
	register_taxonomy( 'show_cat', [ 'show' ], $args );
	
	// genre taxonomy for shows start here
	$labels_genre = [
		'name'              => _x( 'Genres', 'taxonomy general name' ),
		'singular_name'     => _x( 'Genre', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Genres' ),
		'all_items'         => __( 'All Genres' ),
		'parent_item'       => __( 'Parent Genres' ),
		'parent_item_colon' => __( 'Parent Genres:' ),
		'edit_item'         => __( 'Edit Genres' ),
		'update_item'       => __( 'Update Genres' ),
		'add_new_item'      => __( 'Add Genre' ),
		'new_item_name'     => __( 'New Genre Name' ),
		'menu_name'         => __( 'Genre' ),
	];
	
	
	$args_genre = [
		"public"             => TRUE,
		"publicly_queryable" => FALSE,
		'hierarchical'       => TRUE,
		'labels'             => $labels_genre,
		'show_ui'            => TRUE,
		'show_admin_column'  => TRUE,
		'query_var'          => TRUE,
		'rewrite'            => [ 'slug' => 'genre' ],
	];
	
	register_taxonomy( 'genre', [ 'show' ], $args_genre );
	
	// gift_idea taxonomy for shows start here
	$labels_gift_idea = [
		'name'              => _x( 'Gift Ideas', 'taxonomy general name' ),
		'singular_name'     => _x( 'Gift Idea', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Gift Ideas' ),
		'all_items'         => __( 'All Gift Ideas' ),
		'parent_item'       => __( 'Parent Gift Ideas' ),
		'parent_item_colon' => __( 'Parent Gift Ideas:' ),
		'edit_item'         => __( 'Edit Gift Ideas' ),
		'update_item'       => __( 'Update Gift Ideas' ),
		'add_new_item'      => __( 'Add Gift Idea' ),
		'new_item_name'     => __( 'New Gift Idea Name' ),
		'menu_name'         => __( 'Gift Idea' ),
	];
	
	
	$args_gift_idea = [
		"public"             => TRUE,
		"publicly_queryable" => FALSE,
		'hierarchical'       => TRUE,
		'labels'             => $labels_gift_idea,
		'show_ui'            => TRUE,
		'show_admin_column'  => TRUE,
		'query_var'          => TRUE,
		'rewrite'            => [ 'slug' => 'gift_idea' ],
	];
	
	register_taxonomy( 'gift_idea', [ 'show' ], $args_gift_idea );
	
	
	// month taxonomy for shows start here
	$labels_month = [
		'name'              => _x( 'Months', 'taxonomy general name' ),
		'singular_name'     => _x( 'Month', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Months' ),
		'all_items'         => __( 'All Months' ),
		'parent_item'       => __( 'Parent Months' ),
		'parent_item_colon' => __( 'Parent Months:' ),
		'edit_item'         => __( 'Edit Months' ),
		'update_item'       => __( 'Update Months' ),
		'add_new_item'      => __( 'Add Month' ),
		'new_item_name'     => __( 'New Month Name' ),
		'menu_name'         => __( 'Months' ),
	];
	
	
	$args_month = [
		"public"             => TRUE,
		"publicly_queryable" => FALSE,
		'hierarchical'       => TRUE,
		'labels'             => $labels_month,
		'show_ui'            => TRUE,
		'show_admin_column'  => TRUE,
		'query_var'          => TRUE,
		'rewrite'            => [ 'slug' => 'month' ],
	];
	
	register_taxonomy( 'month', [ 'show' ], $args_month );
	
	// register_taxonomy("month", array("show"), array("hierarchical" => true, "label" => "Months", "singular_label" => "Months", "rewrite" => array( 'slug' => 'months', 'with_front'=> false )));
	// register_taxonomy("genre", array("show"), array("hierarchical" => true, "label" => "Genres", "singular_label" => "Genres", "rewrite" => array( 'slug' => 'genres', 'with_front'=> false )));
	// register_taxonomy("gift_idea", array("show"), array("hierarchical" => true, "label" => "Gift Ideas", "singular_label" => "Gift Ideas", "rewrite" => array( 'slug' => 'gift_idea', 'with_front'=> false )));
	
	$faq_post = [
		"label"               => __( "Faq", "" ),
		"labels"              => [
			"name"                  => __( "Faq", "" ),
			"singular_name"         => __( "Faq", "" ),
			"featured_image"        => __( "Faq", "" ),
			"set_featured_image"    => __( "Set Faq Poster", "" ),
			"remove_featured_image" => __( "Remove Faq Poster", "" ),
			"use_featured_image"    => __( "Use Faq Poster", "" ),
		],
		"public"              => TRUE,
		"publicly_queryable"  => TRUE,
		"show_ui"             => TRUE,
		"show_in_rest"        => FALSE,
		"has_archive"         => TRUE,
		"show_in_menu"        => TRUE,
		"exclude_from_search" => FALSE,
		"capability_type"     => "post",
		"map_meta_cap"        => TRUE,
		"hierarchical"        => FALSE,
		"menu_icon"           => "dashicons-media-document",
		"rewrite"             => [ "slug" => "faq", "with_front" => TRUE ],
		"query_var"           => TRUE,
		"supports"            => [ "title", "editor", "thumbnail", "excerpt" ],
		'taxonomies'          => [ 'faq_cat' ],
	];
	register_post_type( "faq", $faq_post );
	
	$labels = [
		'name'              => _x( 'Faq Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Faq Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Faq Categories' ),
		'all_items'         => __( 'All Faq Categories' ),
		'parent_item'       => __( 'Parent Faq Categories' ),
		'parent_item_colon' => __( 'Parent Faq Categories:' ),
		'edit_item'         => __( 'Edit Faq Categories' ),
		'update_item'       => __( 'Update Faq Categories' ),
		'add_new_item'      => __( 'Add Faq Category' ),
		'new_item_name'     => __( 'New Category Name' ),
		'menu_name'         => __( 'Faq Category' ),
	];
	
	$args = [
		"public"             => TRUE,
		"publicly_queryable" => FALSE,
		'hierarchical'       => TRUE,
		'labels'             => $labels,
		'show_ui'            => TRUE,
		'show_admin_column'  => TRUE,
		'query_var'          => TRUE,
		'rewrite'            => [ 'slug' => 'faq_cat' ],
	];
	register_taxonomy( 'faq_cat', [ 'faq' ], $args );
	
	
	$projects_post = [
		"label"               => __( "Project", "" ),
		"labels"              => [
			"name"                  => __( "Project", "" ),
			"singular_name"         => __( "Project", "" ),
			"featured_image"        => __( "Project", "" ),
			"set_featured_image"    => __( "Set Project Poster", "" ),
			"remove_featured_image" => __( "Remove Project Poster", "" ),
			"use_featured_image"    => __( "Use Project Poster", "" ),
		],
		"public"              => TRUE,
		"publicly_queryable"  => TRUE,
		"show_ui"             => TRUE,
		"show_in_rest"        => FALSE,
		"has_archive"         => TRUE,
		"show_in_menu"        => TRUE,
		"exclude_from_search" => FALSE,
		"capability_type"     => "post",
		"map_meta_cap"        => TRUE,
		"hierarchical"        => FALSE,
		"menu_icon"           => "dashicons-media-document",
		"rewrite"             => [ "slug" => "Project", "with_front" => TRUE ],
		"query_var"           => TRUE,
		"supports"            => [ "title", "editor", "thumbnail", "excerpt" ],
		'taxonomies'          => [ 'Project_cat' ],
	];
	register_post_type( "Project", $projects_post );
	
	$labels = [
		'name'              => _x( 'Project Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Project Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Project Categories' ),
		'all_items'         => __( 'All Project Categories' ),
		'parent_item'       => __( 'Parent Project Categories' ),
		'parent_item_colon' => __( 'Parent Project Categories:' ),
		'edit_item'         => __( 'Edit Project Categories' ),
		'update_item'       => __( 'Update Project Categories' ),
		'add_new_item'      => __( 'Add Project Category' ),
		'new_item_name'     => __( 'New Category Name' ),
		'menu_name'         => __( 'Project Category' ),
	];
	
	$args = [
		"public"             => TRUE,
		"publicly_queryable" => FALSE,
		'hierarchical'       => TRUE,
		'labels'             => $labels,
		'show_ui'            => TRUE,
		'show_admin_column'  => TRUE,
		'query_var'          => TRUE,
		'rewrite'            => [ 'slug' => 'project_cat' ],
	];
	register_taxonomy( 'project_cat', [ 'project' ], $args );
	
}

add_action( 'init', 'custome_post_type_init' );


