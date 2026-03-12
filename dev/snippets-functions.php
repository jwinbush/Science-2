<?php

// ADDS NEW POST TYPE
function create_posttype() {
    register_post_type( 'programs',
    array(
        'labels' => array(
            'name' => __( 'Programs' ),
            'singular_name' => __( 'Program' ),
            'add_new' => __( 'Add New', 'Program' ),
            'add_new_item' => __("Add New Program"),
            'edit_item' => __("Edit Program"),
            'new_item' => __("New Program"),
            'view_item' => __("View Program"),
            'search_items' => __("Search Programs"),
            'not_found' => __('No Program Found'),
            'not_found_in_trash' => __('No Program found in Trash'),
        ),
        'public' => true,
        'has_archive' => true,
        'taxonomies' => array(''),
        'supports' => array('title','thumbnail','excerpt', 'editor'),
		'rewrite' => array('slug' => 'academics/programs', 'with_front' => false),
		'show_in_rest' => true,
        'query_var' => true,
        'capability_type' => 'post',
        'post_type'       => 'programs',
        'post_status' => 'publish',
        'suppress_filters' => true,
        'order' => 'DESC',
        'menu_position' => 5
    )
    );
}
add_action( 'init', 'create_posttype' );

// Add Custom Taxonomy
function type_taxonomy_init() {

    // ADD POST TYPE THAT TAXONOMY SHOULD BE APPLIED TO
    register_taxonomy( 'program_levels', array( 'programs' ) ,
        array(
            'public' => true,
            'has_archive' => true,
            'hierarchical' => true,
            'labels' => array(
				'name' => _x( 'Program Level', 'taxonomy general name' ) ,
				'singular_name' => _x( 'Program Level', 'taxonomy singular name' ) ,
				'search_items' => __( 'Search Program Levels' ) ,
				'all_items' => __( 'All Program Levels' ) ,
				'parent_item' => __( 'Program Level' ) ,
				'parent_item_colon' => __( 'Program Level:' ) ,
				'edit_item' => __( 'Edit Program Level' ) ,
				'update_item' => __( 'Update Program Level' ) ,
				'add_new_item' => __( 'Add New Program Level' ) ,
				'new_item_name' => __( 'New Program Level Name' ) ,
				'menu_name' => __( 'Program Levels' ) ,
			),
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'program_levels',
                'with_front' => true,
                'hierarchical' => true ,
            ),
        )
    );
	
// ADD POST TYPE THAT TAXONOMY SHOULD BE APPLIED TO
    register_taxonomy( 'program_college', array( 'programs' ) ,
        array(
            'public' => true,
            'has_archive' => true,
            'hierarchical' => true,
            'labels' => array(
				'name' => _x( 'Program College', 'taxonomy general name' ) ,
				'singular_name' => _x( 'Program College', 'taxonomy singular name' ) ,
				'search_items' => __( 'Search Program Colleges' ) ,
				'all_items' => __( 'All Program Colleges' ) ,
				'parent_item' => __( 'Program College' ) ,
				'parent_item_colon' => __( 'Program College:' ) ,
				'edit_item' => __( 'Edit Program College' ) ,
				'update_item' => __( 'Update Program College' ) ,
				'add_new_item' => __( 'Add New Program College' ) ,
				'new_item_name' => __( 'New Program College Name' ) ,
				'menu_name' => __( 'Program Colleges' ) ,
			),
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'college',
                'with_front' => true,
                'hierarchical' => true ,
            ),
        )
    );
}
add_action( 'init', 'type_taxonomy_init' );  

// ADDS CUSTOM POST TYPES TO QUERIES SUCH AS SEARCH, ARCHIVES ETC -->
function add_my_post_types_to_query( $query ) {
    if ( ( is_home() && $query->is_main_query() ) || is_feed() )
        $query->set( 'post_type', array( 'post', 'page', 'programs' ) );
    return $query;
}
add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

?>