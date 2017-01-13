<?php
/**
 * Template Name: Education
 */

get_header(); 



?>
<div class="wrapper">


	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post(); 

			$description = get_field('description');

			?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


					<div class="entry-content">
						<?php echo $description; ?>
					</div><!-- .entry-content -->

				</article><!-- #post-## -->

				<?php if( have_rows('links') ):  ?>
					<section class="education">
					<?php while( have_rows('links') ):  the_row();
							$link_image = get_sub_field('link_image');
							$size = 'full';
							$link = get_sub_field('link');
					?>
						
							<div class="edu-link">
								<a href="<?php echo $link; ?>">
									<?php echo wp_get_attachment_image( $link_image, $size ); ?>
								</a>
							</div>
						
						<?php endwhile; ?>
						</section>
					<?php endif; ?>

			<?php endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->


</div>
<?php 
get_footer();
