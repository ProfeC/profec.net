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
	      <div class="twelve columns">
	        <hr />
	        <div class="row">
	          <div class="six columns">
	            <p>&copy; Copyright no one at all. Go to town.</p>
					<p><?php do_action( 'twentytwelve_credits' ); ?>
					<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'twentytwelve' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'twentytwelve' ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentytwelve' ), 'WordPress' ); ?></a></p>
	          </div>
			 
	          <div class="six columns">
	            <ul class="inline-list right">
	              <li><a href="#">Link 1</a></li>
	              <li><a href="#">Link 2</a></li>
	              <li><a href="#">Link 3</a></li>
	              <li><a href="#">Link 4</a></li>
	            </ul>
	          </div>
	        </div>
	      </div>
		</div>
	</footer><!-- #colophon -->


<!-- Included JS Files (Uncompressed) -->
<script src="<?php echo get_stylesheet_directory_uri() ?>/javascripts/foundation/jquery.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/javascripts/foundation/jquery.cookie.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/javascripts/foundation/jquery.event.move.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/javascripts/foundation/jquery.event.swipe.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/javascripts/foundation/jquery.foundation.accordion.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/javascripts/foundation/jquery.foundation.alerts.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/javascripts/foundation/jquery.foundation.buttons.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/javascripts/foundation/jquery.foundation.clearing.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/javascripts/foundation/jquery.foundation.forms.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/javascripts/foundation/jquery.foundation.joyride.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/javascripts/foundation/jquery.foundation.magellan.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/javascripts/foundation/jquery.foundation.mediaQueryToggle.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/javascripts/foundation/jquery.foundation.navigation.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/javascripts/foundation/jquery.foundation.orbit.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/javascripts/foundation/jquery.foundation.reveal.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/javascripts/foundation/jquery.foundation.tabs.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/javascripts/foundation/jquery.foundation.tooltips.js"></script>	
<script src="<?php echo get_stylesheet_directory_uri() ?>/javascripts/foundation/jquery.foundation.topbar.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/javascripts/foundation/jquery.placeholder.js"></script>	

<!-- Application Javascript, safe to override -->
<script src="<?php echo get_stylesheet_directory_uri() ?>/javascripts/foundation/app.js"></script>


<?php wp_footer(); ?>

</body>
</html>
