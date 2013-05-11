<?php
	// Add extra post formats.
	/*add_action( 'after_setup_theme', 'childtheme_formats', 11 );
	function childtheme_formats(){
	     add_theme_support( 'post-formats', array( 'gallery', 'aside', 'image', 'link', 'quote', 'status' ) );
	}*/

	// De-register parent styles and scripts that aren't needed, thanks to Foundation
	add_action( 'wp_print_styles', 'mytheme_deregister_styles', 100 );
	function mytheme_deregister_styles() {
	    wp_deregister_style( 'twentytwelve-style' );
		 wp_deregister_style( 'twentytwelve-ie');
	}
	
	add_action( 'wp_print_scripts', 'mytheme_deregister_scripts', 100 );
	function mytheme_deregister_scripts() {
	    wp_deregister_script( 'twentytwelve-navigation' );
	}
	
	add_action( 'wp_enqueue_scripts', 'mytheme_dequeue_fonts', 11 );
	function mytheme_dequeue_fonts() {
		wp_dequeue_style( 'twentytwelve-fonts' );
	}
	
	// Unregister primary nav so it can be renamed and used
	unregister_nav_menu('primary');
	
	// Add support for navigation areas.
	register_nav_menus(
		 array(
		 	  'top-bar' => __('Foundation Top Bar', 'foundation-twentytwelve')
			  , 'vertical-nav' => __('Foundation Vertical Menu', 'foundation-twentytwelve')
			  , 'footer-nav' => __('Footer Menu', 'foundation-twentytwelve')
			  , 'primary' => __('Foundation Nav Bar', 'foundation-twentytwelve')
		 )
	 );
	 
	// Register additional widget areas.
	register_sidebar(
		array(
			'name' => __( 'Primary Footer Area', 'foundation-twentytwelve' ),
			'id' => 'footer-1',
			'description' => __( 'Appears in the first column of the footer', 'foundation-twentytwelve' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name' => __( 'Secondary Footer Area', 'foundation-twentytwelve' ),
			'id' => 'footer-2',
			'description' => __( 'Appears in the second column of the footer', 'foundation-twentytwelve' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name' => __( 'Tertiary Footer Area', 'foundation-twentytwelve' ),
			'id' => 'footer-3',
			'description' => __( 'Appears in the third column of the footer', 'foundation-twentytwelve' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name' => __( 'Quaternary Footer Area', 'foundation-twentytwelve' ),
			'id' => 'footer-4',
			'description' => __( 'Appears in the fourth column of the footer', 'foundation-twentytwelve' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);
	
	// Add Foundation specific styles and scripts
	function foundation_twentytwelve_scripts_styles() {
		global $wp_styles;
	
		// Adds Foundation based Mondernizr script
		wp_enqueue_script('twentytwelve-modernizr', get_stylesheet_directory_uri() . '/js/foundation/modernizr.foundation.js', array(), false, false );

		/*
		 * Unloads our main stylesheet.
		 */
		wp_dequeue_style( 'twentytwelve-style' );
		wp_deregister_style('twentytwelve-style');

		/*
		 * Loads the Foundation stylesheets.
		 */
		wp_enqueue_style( 'twentytwelve-foundation-normalize', get_stylesheet_directory_uri() . '/css/normalize.css' );
		wp_enqueue_style( 'twentytwelve-foundation-app', get_stylesheet_directory_uri() . '/css/app.css' );
	
	}
	add_action( 'wp_enqueue_scripts', 'foundation_twentytwelve_scripts_styles' );
	
	// Modify the Media Gallery to use Foundation's Clearing JS
	add_filter( 'use_default_gallery_style', '__return_false' ); // remove inline styles
	add_filter('img_caption_shortcode', 'my_img_caption_shortcode_filter',10,3);

	/**
	 * Filter to replace the [caption] shortcode text with HTML5 compliant code
	 *
	 * @return text HTML content describing embedded figure
	 **/
	function my_img_caption_shortcode_filter($val, $attr, $content = null)
	{
		extract(shortcode_atts(array(
			'id'	=> '',
			'align'	=> '',
			'width'	=> '',
			'caption' => ''
		), $attr));
	
		if ( 1 > (int) $width || empty($caption) )
			return $val;

		$capid = '';
		if ( $id ) {
			$id = esc_attr($id);
			$capid = 'id="figcaption_'. $id . '" ';
			$id = 'id="' . $id . '" aria-labelledby="figcaption_' . $id . '" ';
		}

		return '<figure ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width: '
		. (10 + (int) $width) . 'px">' . do_shortcode( $content ) . '<figcaption ' . $capid 
		. 'class="wp-caption-text">' . $caption . '</figcaption></figure>';
	}

	/*
	class foundation_sideNav extends Walker {

		// Set the properties of the element which give the ID of the current item and its parent
		var $db_fields = array( 'parent' => 'parent_id', 'id' => 'object_id' );

		// Displays start of a level. E.g '<ul>'
		// @see Walker::start_lvl()
		function start_lvl(&$output, $depth=0, $args=array()) {
			$output .= "\n<ul class=\"side-nav\">\n";
		}

		// Displays end of a level. E.g '</ul>'
		// @see Walker::end_lvl()
		function end_lvl(&$output, $depth=0, $args=array()) {
			$output .= "</ul>\n";
		}

		// Displays start of an element. E.g '<li> Item Name'
		// @see Walker::start_el()
		function start_el(&$output, $item, $depth=0, $args=array()) {
			$output .= "<li>".esc_attr($item->label);
		}

		// Displays end of an element. E.g '</li>'
		// @see Walker::end_el()
		function end_el(&$output, $item, $depth=0, $args=array()) {
			$output .= "</li>\n";
		}
	}
	
	$elements = array(); // Array of elements
	echo foundation_sideNav::walk($elements);
	*/

?>