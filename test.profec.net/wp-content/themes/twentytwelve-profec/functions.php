<?php
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
	
	// Add Foundation specific styles and scripts
	function foundation_twentytwelve_scripts_styles() {
		global $wp_styles;
	
		// Adds Foundation based Mondernizr script
		wp_enqueue_script('twentytwelve-modernizr', get_stylesheet_directory_uri() . '/javascripts/foundation/modernizr.foundation.js', array(), false, false );

		/*
		 * Unloads our main stylesheet.
		 */
		wp_dequeue_style( 'twentytwelve-style' );
		wp_deregister_style('twentytwelve-style');

		/*
		 * Loads the Foundation stylesheet.
		 */
		wp_enqueue_style( 'twentytwelve-foundation', get_stylesheet_directory_uri() . '/stylesheets/app.css' );
	
	}
	add_action( 'wp_enqueue_scripts', 'foundation_twentytwelve_scripts_styles' );

?>