<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); 

// get_template_part('template-parts/title');

?>
<div class="wrapper">

	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			$link = get_field('link');
			$address = get_field('address');
	    	$photo = get_field('featured_image');
	    	$size = 'full';
	    	$description = 'description';

			?>


			<section class="single-event">
				<div class="left">
					<div class="member-photo">
			    		<?php echo wp_get_attachment_image( $photo, $size ); ?>
			    	</div>
			    	
				</div>
				<div class="right">
					<div class="address"><?php echo $address; ?></div>
					<div class="desc"><?php echo $description; ?></div>
					<?php if(have_rows('resource_links')) : ?>
						<div class="resources">
							<?php while(have_rows('resource_links')) : the_row();

								$label_name = get_sub_field('label_name');
								$link_or_pdf = get_sub_field('link_or_pdf');
								$link = get_sub_field('link');
								$pdf = get_sub_field('pdf');

								if( $link_or_pdf == 'PDF' ) {
									$output = $link;
								} else {
									$output = $pdf;
								}
							?>
								<div class="resource">
									<a href="<?php echo $output; ?>"><?php echo $label_name; ?></a>
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
			</section>




			<section class="sponsors">

			<header class="page-title">
				<h2>Sponsors</h2>
				<div class="thanks">Thank you for the support</div>
			</header>

				<?php if(have_rows('platinum_sponsors')) : ?>
					<div class="sponsor sponsor-event ">
					<h3 class="platinum">Platinum</h3>
					<div class="content">
					<?php while(have_rows('platinum_sponsors')) : the_row(); 
						$sponsorName = get_sub_field('sponsor_name_platinum');
					?>

					<div class="name">
						<?php echo $sponsorName; ?>
					</div>

				<?php endwhile; ?>
				</div></div>
			<?php endif; ?>

			<?php if(have_rows('gold_sponsors')) : ?>
					<div class="sponsor sponsor-event ">
					<h3 class="gold">Gold</h3>
					<div class="content">
					<?php while(have_rows('gold_sponsors')) : the_row(); 
						$sponsorName = get_sub_field('sponsor_name_gold');
					?>

					<div class="name">
						<?php echo $sponsorName; ?>
					</div>

				<?php endwhile; ?>
				</div></div>
			<?php endif; ?>

			<?php if(have_rows('silver_sponsors')) : ?>
					<div class="sponsor sponsor-event ">
					<h3 class="silver">Silver</h3>
					<div class="content">
					<?php while(have_rows('silver_sponsors')) : the_row(); 
						$sponsorName = get_sub_field('sponsor_name_silver');
					?>

					<div class="name">
						<?php echo $sponsorName; ?>
					</div>

				<?php endwhile; ?>
				</div></div>
			<?php endif; ?>

			<?php if(have_rows('bronze_sponsors')) : ?>
					<div class="sponsor sponsor-event ">
					<h3 class="bronze">Bronze</h3>
					<div class="content">
					<?php while(have_rows('bronze_sponsors')) : the_row(); 
						$sponsorName = get_sub_field('sponsor_name_bronze');
					?>

					<div class="name">
						<?php echo $sponsorName; ?>
					</div>

				<?php endwhile; ?>
				</div></div>
			<?php endif; ?>

			</section>

		<?php endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
get_footer();
