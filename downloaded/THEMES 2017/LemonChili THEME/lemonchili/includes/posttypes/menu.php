<?php

// Custom Taxonomy Menu Category
add_action( 'init', 'taxonomy_menucategory', 0 );

function taxonomy_menucategory() {
        $labels = array(
                'name' => __( 'Menu Categories', 'gxg_textdomain' ),
                'singular_name' => __( 'Menu Category', 'gxg_textdomain' ),
                'search_items' =>  __( 'Search Menu Category', 'gxg_textdomain' ),
                'all_items' => __( 'All Menu Categories', 'gxg_textdomain' ),
                'parent_item' => __( 'Parent Menu Category', 'gxg_textdomain' ),
                'parent_item_colon' => __( 'Parent Menu Category:', 'gxg_textdomain' ),
                'edit_item' => __( 'Edit Menu Category', 'gxg_textdomain' ), 
                'update_item' => __( 'Update Menu Category', 'gxg_textdomain' ),
                'add_new_item' => __( 'Add New Menu Category', 'gxg_textdomain' ),
                'new_item_name' => __( 'New Menu Category Name', 'gxg_textdomain' ),
                'menu_name' => __( 'Menu Category', 'gxg_textdomain' ),
        ); 	

register_taxonomy(
        'menu_category',
        'menu',
        array(
                'hierarchical' => true,
                'labels' => $labels,
                'show_ui' => true,
                'query_var' => true,
                'rewrite' => array( 'slug' => 'menucategory' ),
        )
);
} 



// REGISTER MENU POST TYPE

add_action('init', 'posttype_menu');

function posttype_menu() {
        $labels = array(
                'name' => __('Menu', 'gxg_textdomain'),
                'singular_name' => __('Menu', 'gxg_textdomain'),
                'add_new' => __('Add Menu item', 'gxg_textdomain'),
                'add_new_item' => __('Add New Menu item', 'gxg_textdomain'),
                'edit_item' => __('Edit Menu item', 'gxg_textdomain'),
                'new_item' => __('New Menu item', 'gxg_textdomain'),
                'view_item' => __('View Details', 'gxg_textdomain'),
                'search_items' => __('Search Menu item', 'gxg_textdomain'),
                'not_found' =>  __('No Menu item was found with that criteria', 'gxg_textdomain'),
                'not_found_in_trash' => __('No Menu item was found in the Trash with that criteria', 'gxg_textdomain'),
                'view' =>  __('View Menu item', 'gxg_textdomain')
        );

        $imagepath =  get_template_directory_uri() . '/images/posttypeimg/';

        global $wp_version;
	if( version_compare( $wp_version, '3.8', '>=') ) {
	    	$img =  'men.png';
	} else {
		$img =  'men_.png';
	}

        $args = array(
                'labels' => $labels,
                'description' => 'This is the holding location for all Menu items',
                'public' => true,
                'publicly_queryable' => true,
                'exclude_from_search' => false,
                'show_ui' => true,
                'rewrite' => true,
                'hierarchical' => true,
                'menu_position' => 5,
                'menu_icon' => $imagepath . $img,
                'supports' => array('thumbnail','title','revisions'),
                //'taxonomies' => array('category')
        );

register_post_type('menu',$args);
}

?>