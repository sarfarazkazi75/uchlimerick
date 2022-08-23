<?php
/**
 * Register a custom post type
 */
function custome_post_type_init() {
    /*Careers post type register*/
    $careers_labels = array(
        'name'               => _x('Careers', 'Post type general name', 'uchlimerick'),
        'singular_name'      => _x('Careers', 'Post type singular name', 'uchlimerick'),
        'menu_name'          => _x('Careers', 'Admin Menu text', 'uchlimerick'),
        'name_admin_bar'     => _x('Careers', 'Add New on Toolbar', 'uchlimerick'),
        'add_new'            => __('Add New', 'uchlimerick'),
        'add_new_item'       => __('Add New Careers', 'uchlimerick'),
        'new_item'           => __('New Careers', 'uchlimerick'),
        'edit_item'          => __('Edit Careers', 'uchlimerick'),
        'view_item'          => __('View Careers', 'uchlimerick'),
        'all_items'          => __('All Careers', 'uchlimerick'),
        'search_items'       => __('Search Careers', 'uchlimerick'),
        'parent_item_colon'  => __('Parent Careers:', 'uchlimerick'),
        'not_found'          => __('No Careers found.', 'uchlimerick'),
        'not_found_in_trash' => __('No Careers found in Trash.', 'uchlimerick'),
    );
    $careers_args   = array(
        'labels'             => $careers_labels,
        'public'             => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'careers'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array('title', 'editor', 'author', 'thumbnail','excerpt'),
    );
    register_post_type('careers', $careers_args);
    /*individule show */
    $show_labels = array(
        'name'               => _x('Show', 'Post type general name', 'uchlimerick'),
        'singular_name'      => _x('Show', 'Post type singular name', 'uchlimerick'),
        'menu_name'          => _x('Show', 'Admin Menu text', 'uchlimerick'),
        'name_admin_bar'     => _x('Show', 'Add New on Toolbar', 'uchlimerick'),
        'add_new'            => __('Add New', 'uchlimerick'),
        'add_new_item'       => __('Add New Show', 'uchlimerick'),
        'new_item'           => __('New Show', 'uchlimerick'),
        'edit_item'          => __('Edit Show', 'uchlimerick'),
        'view_item'          => __('View Show', 'uchlimerick'),
        'all_items'          => __('All Show', 'uchlimerick'),
        'search_items'       => __('Search Show', 'uchlimerick'),
        'parent_item_colon'  => __('Parent Show:', 'uchlimerick'),
        'not_found'          => __('No Show found.', 'uchlimerick'),
        'not_found_in_trash' => __('No Show found in Trash.', 'uchlimerick'),
    );
    $show_args   = array(
        'labels'             => $show_labels,
        'public'             => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'show'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-tickets',
        'supports'           => array('title', 'editor', 'author', 'thumbnail','excerpt'),
        'taxonomies'         => array('show_cat'),
    );
    register_post_type('show', $show_args);
    
    // show_cat taxonomy for shows starts here
    $labels = array(
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
          );
    $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'show_cat' ),
        );
    register_taxonomy( 'show_cat', array( 'show' ), $args );

    // genre taxonomy for shows start here
    $labels_genre = array(
            'name'              => _x( 'Geners', 'taxonomy general name' ),
            'singular_name'     => _x( 'Gener', 'taxonomy singular name' ),
            'search_items'      => __( 'Search Geners' ),
            'all_items'         => __( 'All Geners' ),
            'parent_item'       => __( 'Parent Geners' ),
            'parent_item_colon' => __( 'Parent Geners:' ),
            'edit_item'         => __( 'Edit Geners' ),
            'update_item'       => __( 'Update Geners' ),
            'add_new_item'      => __( 'Add Gener' ),
            'new_item_name'     => __( 'New Gener Name' ),
            'menu_name'         => __( 'Gener' ),
          );          


    $args_genre = array(
            'hierarchical'      => true,
            'labels'            => $labels_genre,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'genre' ),
        );        

    register_taxonomy( 'genre', array( 'show' ), $args_genre );

    // gift_idea taxonomy for shows start here
    $labels_gift_idea = array(
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
          );          


    $args_gift_idea = array(
            'hierarchical'      => true,
            'labels'            => $labels_gift_idea,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'gift_idea' ),
        );        

    register_taxonomy( 'gift_idea', array( 'show' ), $args_gift_idea );
    

    // month taxonomy for shows start here
    $labels_month = array(
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
          );          


    $args_month = array(
            'hierarchical'      => true,
            'labels'            => $labels_month,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'month' ),
        );        

    register_taxonomy( 'month', array( 'show' ), $args_month );    
    
    // register_taxonomy("month", array("show"), array("hierarchical" => true, "label" => "Months", "singular_label" => "Months", "rewrite" => array( 'slug' => 'months', 'with_front'=> false )));
    // register_taxonomy("genre", array("show"), array("hierarchical" => true, "label" => "Genres", "singular_label" => "Genres", "rewrite" => array( 'slug' => 'genres', 'with_front'=> false )));
    // register_taxonomy("gift_idea", array("show"), array("hierarchical" => true, "label" => "Gift Ideas", "singular_label" => "Gift Ideas", "rewrite" => array( 'slug' => 'gift_idea', 'with_front'=> false )));

    $faq_post = array(
        "label" => __( "Faq", "" ),
        "labels" => array(
            "name" => __( "Faq", "" ),
            "singular_name" => __( "Faq", "" ),
            "featured_image" => __( "Faq", "" ),
            "set_featured_image" => __( "Set Faq Poster", "" ),
            "remove_featured_image" => __( "Remove Faq Poster", "" ),
            "use_featured_image" => __( "Use Faq Poster", "" ),
        ),
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "has_archive" => true,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "menu_icon" => "dashicons-media-document",
        "rewrite" => array( "slug" => "faq", "with_front" => true ),
        "query_var" => true,
        "supports" => array( "title", "editor", "thumbnail", "excerpt" ),
        'taxonomies'         => array('faq_cat'),
    );
    register_post_type( "faq", $faq_post );

    $labels = array(
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
          );

           $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'faq_cat' ),
        );
        register_taxonomy( 'faq_cat', array( 'faq' ), $args );


        $projects_post = array(
        "label" => __( "Project", "" ),
        "labels" => array(
            "name" => __( "Project", "" ),
            "singular_name" => __( "Project", "" ),
            "featured_image" => __( "Project", "" ),
            "set_featured_image" => __( "Set Project Poster", "" ),
            "remove_featured_image" => __( "Remove Project Poster", "" ),
            "use_featured_image" => __( "Use Project Poster", "" ),
        ),
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "has_archive" => true,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "menu_icon" => "dashicons-media-document",
        "rewrite" => array( "slug" => "Project", "with_front" => true ),
        "query_var" => true,
        "supports" => array( "title", "editor", "thumbnail", "excerpt" ),
        'taxonomies'         => array('Project_cat'),
    );
    register_post_type( "Project", $projects_post );

    $labels = array(
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
          );

           $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'project_cat' ),
        );
        register_taxonomy( 'project_cat', array( 'project' ), $args );

}
add_action('init', 'custome_post_type_init');


