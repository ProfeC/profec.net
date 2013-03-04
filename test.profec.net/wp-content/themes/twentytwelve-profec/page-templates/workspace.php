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
  <div class="twelve columns">

  <!-- Desktop Slider -->

    <div class="hide-for-small">
      <div id="featured">
            <img src="http://placehold.it/1000x400&text=Slide Image" alt="slide image">
            <img src="http://placehold.it/1000x400&text=Slide Image" alt="slide image">
            <img src="http://placehold.it/1000x400&text=Slide Image" alt="slide image">
        </div>
      </div>

  <!-- End Desktop Slider -->


  <!-- Mobile Header -->


  <div class="row">
    <div class="mobile-four show-for-small"><br>
      <img src="http://placehold.it/1000x600&text=For Small Screens" />
    </div>
  </div>


<!-- End Mobile Header -->

  </div>
</div><br>

<div class="row">
  <div class="twelve columns">
    <div class="row">

  <!-- Thumbnails -->

      <div class="three mobile-two columns">
        <img src="http://placehold.it/250x250&text=Thumbnail" />
        <h6 class="panel">Description</h6>
      </div>

      <div class="three mobile-two columns">
        <img src="http://placehold.it/250x250&text=Thumbnail" />
        <h6 class="panel">Description</h6>
      </div>

      <div class="three mobile-two columns">
        <img src="http://placehold.it/250x250&text=Thumbnail" />
        <h6 class="panel">Description</h6>
      </div>

      <div class="three mobile-two columns">
        <img src="http://placehold.it/250x250&text=Thumbnail" />
        <h6 class="panel">Description</h6>
      </div>

  <!-- End Thumbnails -->

    </div>
  </div>
</div>



<div class="row">
  <div class="twelve columns">
    <div class="row">

  <!-- Content -->

      <div class="eight columns">
        <div class="panel radius">

        <div class="row">
        <div class="six mobile-two columns">

          <h4>Header</h4><hr/>
          <h5 class="subheader">Risus ligula, aliquam nec fermentum vitae, sollicitudin eget urna. Donec dignissim nibh fermentum odio ornare sagittis.
          </h5>

        <div class="show-for-small" align="center">
          <a href="#" class="small radius button">Call To Action!</a><br>

          <a href="#" class="small radius button">Call To Action!</a>
        </div>

        </div>
        <div class="six mobile-two columns">

          <p>Suspendisse ultrices ornare tempor. Aenean eget ultricies libero. Phasellus non ipsum eros. Vivamus at dignissim massa. Aenean dolor libero, blandit quis interdum et, malesuada nec ligula. Nullam erat erat, eleifend sed pulvinar ac. Suspendisse ultrices ornare tempor. Aenean eget ultricies libero.
        </p>
      </div>

      </div>
      </div>
      </div>

      <div class="four columns hide-for-small">

        <h4>Get In Touch!</h4><hr/>

        <a href="#">
        <div class="panel radius callout" align="center">
          <strong>Call To Action!</strong>
        </div>
        </a>

        <a href="#">
        <div class="panel radius callout" align="center">
          <strong>Call To Action!</strong>
        </div>
        </a>

      </div>

  <!-- End Content -->

    </div>
  </div>
</div>



	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="entry-page-image">
						<?php the_post_thumbnail(); ?>
					</div><!-- .entry-page-image -->
				<?php endif; ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

	<?php get_footer(); ?>

   <!-- Included JS Files -->
   <script type="text/javascript">
     $(window).load(function() {
       $('#featured').orbit({ fluid: '2x1' });
     });
   </script>
