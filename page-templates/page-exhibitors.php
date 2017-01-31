<?php
/**
 * Template Name: Exhibitors
 */

get_header(); 



?>
<div class="wrapper">


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post(); 

			$name = get_field('name');
			$photo = get_field('photo');
			$description = get_field('description');

			?>

				<article id="post-<?php the_ID(); ?>" class="content-block article">
					<div class="entry-content">
						<?php echo $description; ?>
					</div><!-- .entry-content -->

					<h3>Resources</h3>
					<div class="resources">
					<?php if( have_rows('resource_links') ):  ?>
						<?php while( have_rows('resource_links') ): the_row();
							$resource_label = get_sub_field('resource_label');
							$pdf_or_link = get_sub_field('pdf_or_link');
							if( $pdf_or_link == 'PDF' ) {
								$chooseLink = get_sub_field('pdf');
							} elseif( $pdf_or_link == 'Link' ) {
								$chooseLink = get_sub_field('link');
							} else {
								$chooseLink = '';
							}
					?>

						<div class="button center">
							<a href="<?php echo $chooseLink; ?>">
							<?php echo $resource_label; ?>
							</a>
						</div>

						<?php endwhile; ?>
					<?php endif; ?>
					</div>


				</article><!-- #post-## -->

				

				


			

		</main><!-- #main -->
	</div><!-- #primary -->

<!-- <section class="sponsors"> -->
	<div class="widget-area transparent-black">
	<h3>Corporate Members</h3>
		<?php if(have_rows('platinum_members_corp')) : ?>
			<div class="sponsor">
				<h3 class="platinum">Platinum</h3>
				<div class="white-bg">
			<?php while(have_rows('platinum_members_corp')) : the_row(); 

			$name = get_sub_field('name');
			$image = get_sub_field('logo');
			$link = get_sub_field('link');
			$size = 'large'; 

			?>
				<div class="spon">
					<?php if( $link != '' ) {echo '<a href="'.$link.'">';} ?>
						<?php echo wp_get_attachment_image( $image, $size ); ?>
					<?php if( $link != '' ) {echo '</a>';} ?>
				</div>
			<?php endwhile; ?>
			</div></div>
		<?php endif; ?>

		<?php if(have_rows('gold_members_corp')) : ?>
			<div class="sponsor">
				<h3 class="gold">Gold</h3>
				<div class="white-bg">
			<?php while(have_rows('gold_members_corp')) : the_row(); 

			$name = get_sub_field('name');
			$image = get_sub_field('logo');
			$link = get_sub_field('link');
			$size = 'large'; 

			?>
				<div class="spon">
					<?php if( $link != '' ) {echo '<a href="'.$link.'">';} ?>
						<?php echo wp_get_attachment_image( $image, $size ); ?>
					<?php if( $link != '' ) {echo '</a>';} ?>
				</div>
			<?php endwhile; ?>
			</div></div>
		<?php endif; ?>


		<?php if(have_rows('silver_members_corp')) : ?>
			<div class="sponsor">
				<h3 class="silver">Silver</h3>
				<div class="white-bg">
			<?php while(have_rows('silver_members_corp')) : the_row(); 

			$name = get_sub_field('name');
			$image = get_sub_field('logo');
			$link = get_sub_field('link');
			$size = 'large'; 

			?>
				<div class="spon">
					<?php if( $link != '' ) {echo '<a href="'.$link.'">';} ?>
						<?php echo wp_get_attachment_image( $image, $size ); ?>
					<?php if( $link != '' ) {echo '</a>';} ?>
				</div>
			<?php endwhile; ?>
			</div></div>
		<?php endif; ?>


		<?php if(have_rows('bronze_members_corp')) : ?>
			<div class="sponsor">
				<h3 class="bronze">Bronze</h3>
				<div class="white-bg">
			<?php while(have_rows('bronze_members_corp')) : the_row(); 

			$name = get_sub_field('name');
			$image = get_sub_field('logo');
			$link = get_sub_field('link');
			$size = 'large'; 

			?>
				<div class="spon">
					<?php if( $link != '' ) {echo '<a href="'.$link.'">';} ?>
						<?php echo wp_get_attachment_image( $image, $size ); ?>
					<?php if( $link != '' ) {echo '</a>';} ?>
				</div>
			<?php endwhile; ?>
			</div></div>
		<?php endif; ?>
			
	</div><!-- widget area -->
<!-- </section> -->


<?php endwhile; // End of the loop. ?>
</div>
<?php 
get_footer();
