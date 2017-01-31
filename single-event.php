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
				
				<?php if(have_rows('meeting_content')) : ?>
						<div class="resources">
							<?php while(have_rows('meeting_content')) : the_row();

								$image = get_sub_field('thumbnail');
								$title = get_sub_field('title');
								$pdf = get_sub_field('pdf');

								$url = $image['url'];
								$alt = $image['alt'];
								$caption = $image['caption'];

								// thumbnail
								$size = 'thumbnail';
								$thumb = $image['sizes'][ $size ];
								$width = $image['sizes'][ $size . '-width' ];
								$height = $image['sizes'][ $size . '-height' ];

								
							?>
								
							<div class="pdf-row">
								<div class="thumb">
									<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
								</div>
								<div class="pdf-link">
									<a href="<?php echo $pdf; ?>"><?php echo $title; ?></a>
								</div>
							</div>
								


							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				
			</section>




			

		<?php endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
get_footer();
