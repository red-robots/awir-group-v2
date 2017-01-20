<?php
/**
 * Template Name: Member Benefits
 */

get_header(); 




 	?>


<div class="wrapper">

	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" class="content-block article">


					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->

					<?php if(have_rows('member_benefits')) : while(have_rows('member_benefits')) : the_row(); 
						$benefit = get_sub_field('benefit');
						$benefitDesc = get_sub_field('description');
						$santi = sanitize_title_with_dashes($benefit);

						?>
						<div class="benefit-page" id="<?php echo $santi; ?>">
								<h3><?php echo $benefit; ?></h3>
								<?php echo $benefitDesc; ?>
						</div>

						<?php endwhile; endif; ?>

				</article><!-- #post-## -->

			<?php endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar(); ?>
</div>
<?php 
get_footer();
