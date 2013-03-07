<?php
/**
 * Template Name: Foundation Workspace Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<div class="row">
  <div class="large-12 columns hide-for-small">
		<!-- Desktop Slider -->
	  <?php
	  	$my_query = "showposts=5"; 
	  	$my_query = new WP_Query($my_query);
		
		//print_r($my_query);
		
		//echo '<hr>';
		
		$sticky = get_option( 'sticky_posts' );
		$query = new WP_Query( 'p=' . $sticky[0] );
		//print_r($query);
		
		//echo '<hr>';
		
		$sticky2 = get_option( 'sticky_posts' );
		$args2 = array(
			'posts_per_page' => 1,
			'post__in'  => $sticky2,
			'ignore_sticky_posts' => 1
		);
		$query2 = new WP_Query( $args2 );
		if ( $sticky2[0] ) {
			// insert here your stuff...
		}
		//print_r($query2);
		
	  ?>

	  <?php if ($query->have_posts()) : ?>
		  <ul id="featured" data-orbit>
		  <?php while ($query->have_posts()) : ?>
			  <?php $query->the_post(); ?>

           <li id="post-<?php the_ID(); ?>">
				  
				  <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
					<?php
			  	 		// show the featured image
						the_post_thumbnail('full');
					?>
					</a>
					
				  <div class="caption">
					  <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><small><?php the_title(); ?></small></a></h2>
					  <p><?php the_excerpt(); ?></p>
  					
			  </li>	

		  <?php endwhile; // end of one post ?>
		  </ul>
		<?php 
			endif; //end of loop

			/* Restore original Post Data 
			 * NB: Because we are using new WP_Query we aren't stomping on the 
			 * original $wp_query and it does not need to be reset.
			 * http://codex.wordpress.org/Class_Reference/WP_Query
			*/
			wp_reset_postdata();
		?>
  <!-- End Desktop Slider -->


  <!-- Mobile Header -->
  <div class="row">
    <div class="small-12 show-for-small"><br>
      <img src="http://placehold.it/1000x600&text=For Small Screens" />
    </div>
  </div>
<!-- End Mobile Header -->

  </div>
</div><br>

<div class="row">
  <div class="large-12 columns">
    <div class="row">

	  <!-- Thumbnails -->
	  <?php // This should loop through the "x" latest non-sticky posts ?>
      <div class="large-3 small-6 columns">
        <img src="http://placehold.it/250x250&text=Thumbnail" />
        <h6 class="panel">Description</h6>
      </div>

      <div class="large-3 small-6 columns">
        <img src="http://placehold.it/250x250&text=Thumbnail" />
        <h6 class="panel">Description</h6>
      </div>

      <div class="large-3 small-6 columns">
        <img src="http://placehold.it/250x250&text=Thumbnail" />
        <h6 class="panel">Description</h6>
      </div>

      <div class="large-3 small-6 columns">
        <img src="http://placehold.it/250x250&text=Thumbnail" />
        <h6 class="panel">Description</h6>
      </div>

  <!-- End Thumbnails -->

    </div>
  </div>
</div>

<div class="row">
  <div class="large-12 columns">
    <div class="row">

		<!-- Content -->

		<div class="large-8 columns">
			<div class="panel radius">
				<div class="row">
					<div class="large-12 small-12 columns">
			
						<?php while ( have_posts() ) : the_post(); ?>
							<h2 class="subheader"><?php the_title(); ?></h2>
							<hr/>

							<div class="row">							
							<?php if ( has_post_thumbnail() ) : ?>
								<div class="entry-page-image small-6 large-4 columns">
									<?php the_post_thumbnail(); ?>
								</div><!-- .entry-page-image -->
								<div class="small-6 large-8 columns">
									<?php the_content(); ?>
								</div>
							<?php else: ?>
								<div class="small-12 columns">
									<?php the_content(); ?>
								</div>
							<?php endif; ?>
							</div>
			
						<?php endwhile; // end of the loop. ?>
			
					</div>
				</div>
			</div>
		</div>

		<div class="large-4 columns hide-for-small">
			<h4>Get In Touch!</h4><hr/>
        
			<div class="panel radius callout" align="center">
				<strong><a href="#">Call To Action!</a></strong>
			</div>

			<div class="panel radius callout" align="center">
				<strong><a href="#">Call To Action!</a></strong>
			</div>
		</div>

		<!-- End Content -->

    </div>
  </div>
</div>


<div class="row">
	<div id="primary" class="site-content small-12 columns">
		<div id="content" role="main">

			
		</div><!-- #content -->
	</div><!-- #primary -->
</div>

	<?php get_footer(); ?>
