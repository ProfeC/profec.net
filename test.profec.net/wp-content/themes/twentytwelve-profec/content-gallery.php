<?php
/**
 * The template for displaying posts in the Gallery post format
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-meta">
				<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>
		
		<div class="entry-content">					
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
		</div><!-- .entry-content -->

		<footer class="entry-meta">
			
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
