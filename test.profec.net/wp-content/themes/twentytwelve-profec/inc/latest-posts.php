<?php
// Get the latest "non-sticky" posts
// TODO: determine the number of posts to show from the admin and change the number of columns accordingly. (i.e.: if there are 5 post to be displayed, then the row should be divided into x # of columns.
// The block-grid can be used for this.
	
global $post;

echo '<code class="language-php"><pre>';
print_r($_GET['orbit']);
echo '</pre></code>';

/*
if(){
    
} else {
    
}
*/

$args = array(
    'post__not_in' => get_option( 'sticky_posts' )
    ,'numberposts' => 5
);
		
$latestPostslist = get_posts( $args );

echo '<code class="language-php"><pre>';
print_r($latestPostslist);
echo '</pre></code>';
?>

<!-- Three-up Content Blocks -->
<div class="row">
	<div class="small-12 columns site-content">
		<h2>Latest Posts</h2>
		<ul class="large-block-grid-<?php echo count($latestPostslist); ?>">

	<?php
	foreach ($latestPostslist as $post) : setup_postdata($post);
	?>
	
	<li><a class="th" href="<?php the_permalink(); ?>"><?php
			// check if the post has a Post Thumbnail assigned to it.
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'medium' );
			} else {
				echo '<img src="http://placehold.it/400x300&text=Image+Missing" />';
			}
		?></a>
		<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		<?php the_excerpt(); ?>
		<?php /*
			echo '<code class="language-php"><pre>';
			var_dump($post);
			echo '</pre></code>';
		*/ ?>
	</li>
		   
	<?php
		endforeach;
		wp_reset_postdata();
	?>
		</ul>
	</div>
</div>