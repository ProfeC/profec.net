<?php
	// Add extra post formats.
	add_action( 'after_setup_theme', 'childtheme_formats', 11 );
	function childtheme_formats(){
	     add_theme_support( 'post-formats', array( 'gallery', 'aside', 'image', 'link', 'quote', 'status' ) );
	}

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
	
	// Remove default styling for Media Gallery
	add_filter( 'use_default_gallery_style', '__return_false' );
	
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

?>