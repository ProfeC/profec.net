<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<div class="row site-content">
	<div id="content" class="small-12 columns" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', get_post_format() ); ?>
			

			<nav class="nav-single">
				<h3 class="assistive-text"><small><?php _e( 'Post navigation', 'twentytwelve' ); ?></small></h3>
				<div class="row">
					<div class="small-5 columns">
						<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentytwelve' ) . '</span> %title' ); ?></span>
					</div>
					<div class="small-2 columns">&nbsp;</div>
					<div class="small-5 columns text-right">
						<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentytwelve' ) . '</span>' ); ?></span>
					</div>
				</div>
			</nav><!-- .nav-single -->


			<?php comments_template( '', true ); ?>

		<?php endwhile; // end of the loop. ?>
	</div><!-- #content -->

</div>	
<?php get_footer(); ?>