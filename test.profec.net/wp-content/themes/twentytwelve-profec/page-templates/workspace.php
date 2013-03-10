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
		/*	TODO: Loop over the sticky posts and display the first few image attachments in an Orbit slider. 
		*	If there are no stickies don't show anything.
		*/
		$sticky = get_option( 'sticky_posts' );
		$stickyArgs = array(
			'posts_per_page' => 1,
			'post__in'  => $sticky,
			'ignore_sticky_posts' => 1
		);
		
		$stickyQuery = new WP_Query( $stickyArgs );
		echo '<!-- ';
		print_r($stickyQuery);
		echo ' -->';

	  if ( $sticky[0] ){
		  if ($stickyQuery->have_posts() ) : while ( $stickyQuery->have_posts() ) : $stickyQuery->the_post();
			  
			  // TODO: set variables for the parent post info so that they could be used in the caption
			  /* 
			  myPostID => $stickyQuery->the_post()->ID;
			  myPostPermaLink => '';
			  myPostTitle => '';
			  myPostExcerpt => '';
			  */
			  
				// Get the attachments
				$attachmentArgs = array(
					'post_type'   => 'attachment'
					, 'numberposts' => 5
					, 'post_status' => null
					, 'post_parent' => $post->ID
					, 'exclude'		=> get_post_thumbnail_id($post->ID)
					//, 'orderby' => 'rand'
				);
				
				echo '<!-- ';
				print_r($attachmentArgs);
				echo '-->';
				
				$attachments = get_posts( $attachmentArgs );
				echo '<!-- ';
				print_r($attachments);
				echo ' -->';
				
				if ( $attachments ) {

					echo '<ul id="featured" data-orbit>';
					
					foreach ( $attachments as $attachment ) {
						//echo apply_filters( 'the_title', $attachment->post_title );
						//the_attachment_link( $attachment->ID, false );
						
						echo '<li id="post-' . $attachment->ID .'">' . wp_get_attachment_image( $attachment->ID, 'full' );
						
						//echo '<li id="post-' . $attachment->ID .'"><a href="' . the_permalink() .'" rel="bookmark" title="Permanent Link to ' . the_title_attribute() . '">' . wp_get_attachment_image( $attachment->ID, 'full' ) . '</a>';
						
						// '<div class="orbit-caption"><h2><a href="' . the_permalink() . '" rel="bookmark" title="Permanent Link to ' . the_title_attribute() . '"><small>' . the_title() . '</small></a></h2><p>' . the_excerpt() . '</p></div>';
						echo '</li>';
					}
				}
				
				echo '</ul>';
				
			endwhile; endif; //end of loop
		}

			/* Restore original Post Data 
			 * NB: Because we are using new WP_Query we aren't stomping on the 
			 * original $wp_query and it does not need to be reset.
			 * http://codex.wordpress.org/Class_Reference/WP_Query
			*/
			//wp_reset_postdata();
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
		<?php
			$latestPostslist = query_posts(
				array(
					'post__not_in' => get_option( 'sticky_posts' )
				)
			);
			echo '<!-- Latest Post List Data ';
			print_r($latestPostslist);
			echo ' -->';
		
			foreach ($latestPostslist as $latestPost) :  setup_postdata($latestPost);
		
				echo '<!-- Latest Post Data ' . $latestPost -> ID;
				print_r($latestPost);
				echo ' -->';
				
				echo '<div class="large-3 small-6 columns">';
					echo '<img src="http://placehold.it/250x250&text=Thumbnail" />';
		       	echo '<h6 class="panel">' . $latestPost->post_title . '</h6>';
		      echo '</div>';
				
				//echo '<div>' . the_date() . '<br />' . the_title() . the_excerpt() . '</div>';
		
			endforeach;
		?>

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
						<h2 class="subheader"><?php page_title(); ?></h2>
						<hr/>

						
						<!-- TODO: Get page content back here -->

						<?php while ( have_posts() ) : the_post(); ?>
							<?php 
								the_content();
								
								get_template_part( 'content', 'page' );
							?>
							<?php comments_template( '', true ); ?>
						<?php endwhile; // end of the loop. ?>
						
						
						<?php /*while ( have_posts() ) : the_post(); ?>
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
			
						<?php endwhile;*/ // end of the loop. ?>
			
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
