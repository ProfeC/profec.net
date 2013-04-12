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
<div class="large-12 columns site-content">
<?php
// Get the most recent featured post so that we can show a few attachments (images) from it.
global $post;
$page_post = $post; // make sure we keep the original post data here!

$args = array(
	'posts_per_page' => 1
	, 'post__in'  => get_option( 'sticky_posts' )
	, 'ignore_sticky_posts' => 1
);
		
$stickyPost = get_posts( $args );

foreach ( $stickyPost as $post ) : setup_postdata( $post );
	
	// Get the attachments for the current sticky post
	$args = array(
		'post_type' => 'attachment'
		, 'post_mime_type' => 'image'
		, 'numberposts' => 5
		, 'post_status' =>'any'
		, 'post_parent' => $post->ID
		, 'exclude'		=> get_post_thumbnail_id($post->ID)
	); 
	
	$attachments = get_posts($args);
	
	if ($attachments) { ?>
		<ul id="featured" data-orbit>
			<?php foreach ( $attachments as $attachment ) { ?>
			<li id="post-<?php $attachment->ID; ?>">
				<a href="<?php the_permalink(); ?>"><?php echo wp_get_attachment_image( $attachment->ID, array(970,650) ); ?></a>
				<div class="orbit-caption"><h2><small><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to "<?php the_title(); ?>><?php the_title() ?></a></small></h2><?php the_excerpt() ?></div>
			</li>
			
			<?php
			//echo apply_filters( 'the_title' , $attachment->post_title );
			//the_attachment_link( $attachment->ID , false );
		}
	}
	
endforeach;
wp_reset_postdata();

?>
<!-- End Desktop Slider -->
</div>
</div>

<?php include get_stylesheet_directory() . '/inc/latest-posts.php'; ?>

<?php while ( have_posts() ) : the_post(); ?>
<div class="row">
	<div class="large-12 columns site-content">    
		<div class="panel">
			<div class="row">

				<?php // check if the post has a Post Thumbnail assigned to it.
				if ( has_post_thumbnail() ) { ?>
				<div class="large-9 columns">
					<h3><?php the_title(); ?></h3>
					<?php the_content(); ?>
				</div>
				<div class="large-3 columns">
					<?php the_post_thumbnail(
						'medium'
						, array(
							'class' => "attachment-medium featured"
						)
					); ?>
				</div>
				<?php } else { ?>
					<div class="large-12 columns">
						<h3><?php the_title(); ?></h3>
						<?php the_content(); ?>
					</div>

				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php endwhile; // end of the loop. ?>

<!-- Footer -->
<?php get_footer(); ?>