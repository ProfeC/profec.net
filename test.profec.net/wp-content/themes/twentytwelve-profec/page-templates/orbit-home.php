<?php
/**
 * Template Name: Foundation Orbit Home Page Template
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
<div class="large-12 columns">
<?php
$sticky = get_option( 'sticky_posts' );
$stickyArgs = array(
'posts_per_page' => 1,
'post__in'  => $sticky,
'ignore_sticky_posts' => 1
);
		
$stickyQuery = new WP_Query( $stickyArgs );

if ( $sticky[0] ){
if ($stickyQuery->have_posts() ) : while ( $stickyQuery->have_posts() ) : $stickyQuery->the_post();
		  
/*
TODO: set variables for the parent post info so that they could be used in the caption 
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

$attachments = get_posts( $attachmentArgs );
				
if ( $attachments ) {

echo '<ul id="featured" data-orbit>';
					
foreach ( $attachments as $attachment ) {
//echo apply_filters( 'the_title', $attachment->post_title );
//the_attachment_link( $attachment->ID, false );
						
echo '<li id="post-' . $attachment->ID .'"><a href="' . the_permalink() .'">' . wp_get_attachment_image( $attachment->ID, 'full' );
						
//echo '<li id="post-' . $attachment->ID .'"><a href="' . the_permalink() .'" rel="bookmark" title="Permanent Link to ' . the_title_attribute() . '">' . wp_get_attachment_image( $attachment->ID, 'full' ) . '</a>';
						
// '<div class="orbit-caption"><h2><a href="' . the_permalink() . '" rel="bookmark" title="Permanent Link to ' . the_title_attribute() . '"><small>' . the_title() . '</small></a></h2><p>' . the_excerpt() . '</p></div>';
echo '</a></li>';
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
</div>
</div>


<?php include get_stylesheet_directory() . '/inc/latest-posts.php'; ?>
    
<!-- Call to Action Panel -->
<div class="row">
<div class="large-12 columns">
    
<div class="panel">
<h4>Get in touch!</h4>
            
<div class="row">
<div class="large-9 columns">
<p>We'd love to hear from you, you attractive person you.</p>
</div>
<div class="large-3 columns">
<a href="#" class="radius button right">Contact Us</a>
</div>
</div>
</div>
      
</div>
</div>

<!-- Footer -->
<?php get_footer(); ?>