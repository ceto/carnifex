<?php

add_action( 'init', 'create_product_type' );

function create_product_type() {
	register_post_type( 'product',
		array(
			'labels' => array(
				'name' => __( 'Products' ),
				'singular_name' => __( 'Product' )
			),
		'public' => true,
		'has_archive' => true,
		'rewrite' => array('slug' => 'products'),
		'supports' => array( 'thumbnail', 'editor', 'title')
		)
	);
}




add_filter( 'cmb_meta_boxes', 'product_metaboxes' );
function product_metaboxes( $meta_boxes ) {
	$prefix = '_prod_'; // Prefix for all fields
	$meta_boxes[] = array(
		'id' => 'product_metabox',
		'title' => __('Product details'),
		'pages' => array('product'), // post Type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __('Rövid leírás'),
				'desc' => __('A termék rövid leírása, kivonatszerűen.'),
				'id' => $prefix . 'short_desc',
				'type' => 'textarea_small'
			),
			array(
				'name' => __('Összetevők'),
				'desc' => __('Termék összetevők'),
				'id' => $prefix . 'ingredients',
				'type' => 'wysiwyg'
			),
			array(
				'name' => __('Kiszerelés, csomagolás'),
				'desc' => __('Termék kiszerelése, csomagolás'),
				'id' => $prefix . 'pack',
				'type' => 'wysiwyg'
			),
			array(
				'name' => __('Felhasználás, tárolás'),
				'desc' => __('Minőségét megörzi, szállítás, tárolás, felhasználási javaslatok.'),
				'id' => $prefix . 'variants',
				'type' => 'wysiwyg'
			),
			array(
				'name' => __('A termék ára'),
				'desc' => __('A termék ára'),
				'id' => $prefix . 'price',
				'type' => 'wysiwyg'
			)
 		)
	);

	return $meta_boxes;
}


add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
	if ( !class_exists( 'cmb_Meta_Box' ) ) {
		require_once( 'cmb/init.php' );
	}
}


//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_product_taxonomies', 0 );

//create two taxonomies, genres and writers for the post type "book"
function create_product_taxonomies() 
{

  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name'                         => _x( 'Product Tags', 'taxonomy general name' ),
    'singular_name'                => _x( 'Product Tag', 'taxonomy singular name' ),
    'search_items'                 => __( 'Search ProductTags' ),
    'popular_items'                => __( 'Popular Product Tags' ),
    'all_items'                    => __( 'All Product Tags' ),
    'parent_item'                  => null,
    'parent_item_colon'            => null,
    'edit_item'                    => __( 'Edit Product Tag' ), 
    'update_item'                  => __( 'Update WProduct Tag' ),
    'add_new_item'                 => __( 'Add New Product Tag' ),
    'new_item_name'                => __( 'New Product Tag Name' ),
    'separate_items_with_commas'   => __( 'Separate product tags with commas' ),
    'add_or_remove_items'          => __( 'Add or remove product tags' ),
    'choose_from_most_used'        => __( 'Choose from the most used product tags' ),
    'menu_name'                    => __( 'Product Tags' )
  ); 

  $args = array(
    'hierarchical'            => false,
    'labels'                  => $labels,
    'show_ui'                 => true,
    'show_admin_column'       => true,
    'update_count_callback'   => '_update_post_term_count',
    'query_var'               => true,
    'show_tagcloud'           => true,
    'rewrite'                 => array( 'slug' => 'product-tag' )
  );

  register_taxonomy( 'product-tag', 'product', $args );
}