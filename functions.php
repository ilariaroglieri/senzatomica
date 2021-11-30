<?php

//kill gutenberg
add_filter( 'use_block_editor_for_post', '__return_false' );

//remove admin bar
show_admin_bar(false);

function register_my_menu() {
	register_nav_menu('header-menu',__( 'Header Menu' ));
}

add_action( 'init', 'register_my_menu' );


function jquery_select_scripts() {
	wp_enqueue_script( 'select', get_stylesheet_directory_uri() . '/assets/js/jquery.nice-select.js', array(), NULL, true );
	wp_enqueue_style( 'select', get_stylesheet_directory_uri() . '/assets/js/nice-select.css', array() );
}

add_action( 'wp_enqueue_scripts', 'jquery_select_scripts' );


function jquery_scripts() {
	wp_enqueue_script( 'custom', get_stylesheet_directory_uri() . '/assets/js/custom.js', array(), NULL, true );

	wp_localize_script('custom', 'wpAjax',
		array(
			'ajaxUrl' => admin_url('admin-ajax.php')
		)
	);
}

add_action( 'wp_enqueue_scripts', 'jquery_scripts' );


function marquee_scripts() {
	wp_enqueue_script( 'marquee', get_stylesheet_directory_uri() . '/assets/js/jquery.marquee.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'marquee_scripts' );


// function marquee_scripts() {
// 	wp_enqueue_script( 'marquee', get_stylesheet_directory_uri() . '/assets/js/marquee.js', array(), '1.0.0', true );
// }
// add_action( 'wp_enqueue_scripts', 'marquee_scripts' );

add_theme_support( 'post-thumbnails' ); 

add_post_type_support( 'page', 'excerpt' );

remove_filter('the_excerpt', 'wpautop');

// img attachment defaults

function default_attachment_display_settings() {
    update_option( 'image_default_link_type', 'none' );
    update_option( 'image_default_size', 'full' );
}

add_action( 'after_setup_theme', 'default_attachment_display_settings' );

/* add class button light to navigation link */
function posts_link_next_class($format){
  $format = str_replace('href=', 'class="next light button" href=', $format);
  return $format;
}
add_filter('next_post_link', 'posts_link_next_class');

function posts_link_prev_class($format) {
  $format = str_replace('href=', 'class="prev light button" href=', $format);
 	return $format;
}
add_filter('previous_post_link', 'posts_link_prev_class');

/* remove prefix froma archive titles */
add_filter( 'get_the_archive_title', 'my_theme_archive_title' );

function my_theme_archive_title( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	}
	return $title;
}

/* add options page for newsletter */
if( function_exists('acf_add_options_page') ) {
  
  acf_add_options_page(array(
    'page_title'  => 'Footer',
    'menu_title'  => 'Footer',
    'menu_slug'   => 'footer-general-settings',
    'capability'  => 'edit_posts',
    'redirect'    => false
  ));
}


// ajax query
// AJAX cat
function filterCatAjax() {
    
  $catTerm = $_POST['catTerm'];
  $category = $_POST['category'];

  $themeTerm = $_POST['themeTerm'];
  $theme = $_POST['theme'];

  $date = $_POST['date'];

  $args = array(
  	'post_type' => 'post',
  	'posts_per_page' => -1,
  );

  // check its a term
  if ( isset($catTerm) && $catTerm != '0' ) {
		$args['tax_query'] = array(
      array(
        'taxonomy' => $category,
        'field'    => 'slug',
        'terms'    => $catTerm,
        'operator' => 'IN',
      )
    );
  } 

  if ( isset($themeTerm) && $themeTerm != '0' ) {
		$args['tax_query'] = array(
      array(
        'taxonomy' => $theme,
        'field'    => 'slug',
        'terms'    => $themeTerm,
      ),
    );
  } 

  if ( isset($catTerm) && $catTerm != '0' && isset($themeTerm) && $themeTerm != '0' ) {
  	$args['tax_query'] = array(
      'relation' => 'AND',
      array(
        'taxonomy' => $category,
        'field'    => 'slug',
        'terms'    => $catTerm,
      ),
      array(
        'taxonomy' => $theme,
        'field'    => 'slug',
        'terms'    => $themeTerm,
      ),
    );
  };

  if ( isset($date) && $date != '0' ) {
		$args['year'] = $date;
  }

  $ajaxQuery = new WP_Query($args);

  if ($ajaxQuery->have_posts()) :
  	while ($ajaxQuery->have_posts()) : $ajaxQuery->the_post(); ?>
  		<?php include('loop-single-post.php'); ?>
  	<?php endwhile;
  else: ?>
  	<?php include('empty-query.php'); ?>
  <?php endif;
  wp_reset_postdata();

  die();
}

add_action( 'wp_ajax_nopriv_filterCat', 'filterCatAjax' );
add_action( 'wp_ajax_filterCat', 'filterCatAjax' );


// taxonomies
// Register Custom Taxonomy
function posts_height() {

	$labels = array(
		'name'                       => _x( 'Altezze news', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Altezza news', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Altezza news', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'posts_height', array( 'post' ), $args );

}
add_action( 'init', 'posts_height', 0 );


// Register Custom Taxonomy
function posts_type() {

	$labels = array(
		'name'                       => _x( 'Tipo news', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Tipo news', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Tipo news', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'posts_type', array( 'post' ), $args );

}
add_action( 'init', 'posts_type', 0 );


// Register Custom Taxonomy
function post_contents_type() {

	$labels = array(
		'name'                       => _x( 'Tipo di contenuti', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Tipo di contenuti', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Tipo di contenuti', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'post_contents_type', array( 'post' ), $args );

}
add_action( 'init', 'post_contents_type', 0 );

?>