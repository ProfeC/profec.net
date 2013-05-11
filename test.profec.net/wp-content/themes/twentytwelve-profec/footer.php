<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<footer id="colophon" role="contentinfo">
	<div class="row">
		<div class="small-3 columns">
			<?php dynamic_sidebar( 'footer-1' ); ?>
		</div>
		<div class="small-3 columns">
			<?php dynamic_sidebar( 'footer-2' ); ?>
		</div>
		<div class="small-3 columns">
			<?php dynamic_sidebar( 'footer-3' ); ?>
		</div>
		<div class="small-3 columns">
			<?php dynamic_sidebar( 'footer-4' ); ?>
		</div>
	</div>
	
	<br /><br />
	<div class="row">
		<div class="small-6 columns">
			<p>Site Content &copy; 2000 - <?php echo date("Y"); ?> Gary L. Clark, II <small>(aka: ProfeC)</small></p>
		</div>
		
		<div class="small-6 columns text-right">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'twentytwelve' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'twentytwelve' ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentytwelve' ), 'WordPress' ); ?></a> and <a href="<?php echo esc_url( __( 'http://foundation.zurb.com', 'twentytwelve' ) ); ?>" title="<?php esc_attr_e( 'The most advanced responsive
front-end framework in the world.', 'twentytwelve' ); ?>">Zurb Foundation</a></p>
		</div>
	</div>
</footer><!-- #colophon -->

<!-- Included Foundation JS Files (Uncompressed) -->
<script>
	document.write('<script src=' +
	('__proto__' in {} ? '<?php echo get_stylesheet_directory_uri() ?>/js/vendor/zepto' : '<?php echo get_stylesheet_directory_uri() ?>/js/vendor/jquery') +
	'.js><\/script>')
</script>

<script src="<?php echo get_stylesheet_directory_uri() ?>/js/foundation/foundation.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/js/foundation/foundation.alerts.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/js/foundation/foundation.clearing.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/js/foundation/foundation.cookie.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/js/foundation/foundation.dropdown.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/js/foundation/foundation.forms.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/js/foundation/foundation.joyride.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/js/foundation/foundation.magellan.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/js/foundation/foundation.orbit.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/js/foundation/foundation.placeholder.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/js/foundation/foundation.reveal.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/js/foundation/foundation.section.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/js/foundation/foundation.tooltips.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/js/foundation/foundation.topbar.js"></script>
  
<script>
  $(document).foundation();
</script>

<?php wp_footer(); ?>

</body>
</html>
