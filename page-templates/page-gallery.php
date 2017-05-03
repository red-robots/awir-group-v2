<?php
/**
 * Template Name: Gallery
 */

get_header();



 ?>
<div class="wrapper">


	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">
			<section class="white-wrapper-full">

				<?php
				while ( have_posts() ) : the_post();

					echo do_shortcode('[instagram-feed]');

				endwhile; // End of the loop.
				?>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
get_footer();
