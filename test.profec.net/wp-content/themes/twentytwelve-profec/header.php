<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width" />
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<header id="masthead" role="banner">
			<div class="fixed contain-to-grid">
				<nav class="top-bar">
					<ul class="title-area">
						<li class="name"><h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1></li>
						<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
					</ul>

					<section class="top-bar-section">
						<?php
							if (has_nav_menu('top-bar')){
								wp_nav_menu(
									array(
										'theme_location' => 'top-bar'
										, 'container' => false
										, 'echo' => true
										, 'menu_class' => 'right'
										// ,'walker' => ''
									)
								);
							}
						?>
						
					</section>
				</nav>
			</div>
		
			<div class="row">
				<div class="site-header small-12 columns">
					<h1 class="subheader"><?php bloginfo( 'description' ); ?></h1>
					
					<?php
						if (has_nav_menu('primary')){
							echo('\n<nav id="site-navigation" class="main-navigation" role="navigation">\n');
						
							// Add Primary Navigation
							wp_nav_menu(
								array(
									'theme_location' => 'primary'
									, 'menu_class' => 'nav-bar'
									, 'container' => false
								)
							);
						
							echo('\n</nav><!-- #site-navigation -->\n');
						}
					?>

					<!-- <a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a> -->
			</div>

			<?php $header_image = get_header_image();
				if ( ! empty( $header_image ) ) : ?>
				<div class="row">
					<div class="large-12 columns">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</header><!-- #masthead -->

