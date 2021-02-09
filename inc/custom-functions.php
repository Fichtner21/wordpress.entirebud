<?php

// Allow to upload SVG files
require_once 'allow-svg.php';

// Add theme changer
// require_once './theme-changer/theme-change.php';

// Svg icon display & dirname(__FILE__, 1) in main functions.php or dirname(__FILE__, 2) when file is in theme subdirectory
if(!function_exists('svg_icon')) {
    function svg_icon($name, $width) {
        $icon = file_get_contents( dirname(__FILE__, 2) . '/dist/public/images/' . $name .'.svg' );

        if($width) {
        echo "<i class='svg-icon siW-". $width ."'>". $icon ."</i>";
        }
    }
}

// Svg icon display in admin
if(!function_exists('svg_icon_admin')) {
	function svg_icon_admin($name, $width) {
		$icon = file_get_contents( dirname(__FILE__, 2) . '/dist/admin/images/' . $name .'.svg' );

		if($width) {
			echo "<i class='svg-icon siW-". $width ."'>". $icon ."</i>";
		}
	}
}

/* Zamiana page na strona w URL-u */
if(!function_exists('custom_rewrite_pages')) {
	function custom_rewrite_pages() {
		global $wp_rewrite;

		$wp_rewrite->pagination_base = 'strona';
		$wp_rewrite->author_base = 'autor';
	}
	add_action( 'init', 'custom_rewrite_pages' );
}

/* Add title attribute for a element */
if(!function_exists('all_menu_items_title')) {
	function all_menu_items_title( $atts, $item, $args ) {
		if ( ! empty( $item->title ) ) {
			$atts['title'] = esc_attr( $item->title );

			return $atts;
		}
	}
	add_filter( 'nav_menu_link_attributes', 'all_menu_items_title', 10, 3 );
}

// // Admin assets
// if(!function_exists('admin_custom_assets')) {
// 	function admin_custom_assets() {
// 		if ($GLOBALS['pagenow'] == 'wp-login.php' || is_admin()) {
// 			wp_enqueue_script( 'admin-scripts', get_stylesheet_directory_uri() .'/dist/admin/admin.bundle.js' );
// 			wp_enqueue_style( 'admin-styles', get_stylesheet_directory_uri() .'/dist/admin/styles/style.css' );
// 		}
// 	}

// 	add_action( 'init', 'admin_custom_assets' );
// }

// // Frontend assets
// if(!function_exists('public_custom_assets')) {
// 	function public_custom_assets() {
// 		if ($GLOBALS['pagenow'] != 'wp-login.php' || !is_admin()) {
// 			wp_enqueue_script( 'public-scripts', get_stylesheet_directory_uri() .'/dist/public/public.bundle.js' );
// 			wp_enqueue_style( 'public-styles', get_stylesheet_directory_uri() .'/dist/public/styles/style.css' );
// 		}
// 	}

// 	add_action( 'init', 'public_custom_assets' );
// }

// Admin assets
if(!function_exists('admin_custom_assets')) {
	function admin_custom_assets() {
		if (is_admin()) {
			wp_enqueue_script( 'admin-scripts', get_template_directory_uri() . '/dist/admin/admin.bundle.js' );
			wp_enqueue_style( 'admin-styles', get_template_directory_uri() . '/dist/admin/styles/style.css' );
		}
	}

	add_action( 'admin_enqueue_scripts', 'admin_custom_assets' );
}

// Frontend assets
if(!function_exists('public_custom_assets')) {
	function public_custom_assets() {	
		wp_enqueue_script( 'public-scripts', get_template_directory_uri() . '/dist/public/public.bundle.js' );
		wp_enqueue_style( 'public-styles', get_template_directory_uri() . '/dist/public/styles/style.css' );
	}

	add_action( 'wp_enqueue_scripts', 'public_custom_assets' );
}

function custom_post_type_realizacje() {
		$labels = array(
				'name'                => _x( 'Realizacje', 'Post Type General Name', 'entirebud' ),
				'singular_name'       => _x( 'Realizacja', 'Post Type Singular Name', 'entirebud' ),
				'menu_name'           => __( 'Realizacje', 'entirebud' ),
				'parent_item_colon'   => __( 'Nadrzędna realizacja', 'entirebud' ),
				'all_items'           => __( 'Wszystkie realizacje', 'entirebud' ),
				'view_item'           => __( 'Zobacz realizacje', 'entirebud' ),
				'add_new_item'        => __( 'Dodaj nową realizacje', 'entirebud' ),
				'add_new'             => __( 'Dodaj nową', 'entirebud' ),
				'edit_item'           => __( 'Edytuj realizacje', 'entirebud' ),
				'update_item'         => __( 'Zaaktualizuj realizacje', 'entirebud' ),
				'search_items'        => __( 'Wyszukaj realizacje', 'entirebud' ),
				'not_found'           => __( 'Nie znaleziono', 'entirebud' ),
				'not_found_in_trash'  => __( 'Nie znaleziono w koszu', 'entirebud' ),
		);

		// Set other options for Custom Post Type
		$args = array(
				'label'               => __( 'Realizacje', 'entirebud' ),
				'description'         => '',
				'labels'              => $labels,
				// Features this CPT supports in Post Editor
				'supports'            => array( 'title','editor', 'thumbnail','revisions', 'custom-fields', ),
				// You can associate this CPT with a taxonomy or custom taxonomy.
				'taxonomies'          => array( 'kategorie' ),
				/* A hierarchical CPT is like Pages and can have
				* Parent and child items. A non-hierarchical CPT
				* is like Posts.
				*/
				'hierarchical'        => false,
				'public'              => true,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'show_in_nav_menus'   => true,
				'show_in_admin_bar'   => true,
				'menu_position'       => 5,
				'can_export'          => true,
				'has_archive'         => true,
				'exclude_from_search' => false,
				'publicly_queryable'  => true,
				'capability_type'     => 'post',
				'show_in_rest' => true,
				// Set cpt icon
				'menu_icon'           => 'dashicons-format-gallery',
		);

		// Registering your Custom Post Type
		register_post_type( 'realizacje', $args );
}

add_action( 'init', 'custom_post_type_realizacje', 0 );
