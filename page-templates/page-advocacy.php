<?php
/**
 * Template Name: Advocacy
 */

get_header(); 


?>


<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post(); 

			$name = get_field('name');
			$photo = get_field('photo');
			$size = 'full';
			$description = get_field('description');
			$form = get_field('form');
			$advocacy_links_text = get_field('advocacy_links_text');
			$advocacy_link = get_field('advocacy_link');

			?>
<div class="wrapper">
				<article id="post-<?php the_ID(); ?>" class="content-section-page "
					data-anchor-target="#slide-page"
				data--100-top="opacity:1;margin-top: 0px;"
				data-center-center="opacity:1; margin-top: 100px;"
				>

					<section class="small-width">
						<div class="entry-content">
							<div class="single-board">
								<div class="left">
									<div class="member-photo">
							    		<?php echo wp_get_attachment_image( $photo, $size ); ?>
							    	</div>
							    	<h2><?php echo $name; ?></h2>
							    	<h3>AWIR - Chair of Advocacy</h3>
								</div>
								<div class="right">
									<?php echo do_shortcode('[gravityform id="' . $form['id'] . '" title="false" description="false" ajax="true"]'); ?>
								</div>
							</div>
						</div><!-- .entry-content -->
					</section>
				</article><!-- #post-## -->
</div>




				<article id="post-<?php the_ID(); ?>"  class="content-section-page center ">
				<div class="wrapper">
					<div class="entry-content">
						<?php echo $description; ?>
					</div><!-- .entry-content -->

					<div class="adv-link-but">
						<a href="<?php echo $advocacy_link; ?>"><?php echo $advocacy_links_text; ?></a>
					</div>

					</div>
				</article><!-- #post-## -->

		

		<section class="adv-resources ">
			<h2><?php the_field('section_title'); ?></h2>
			<?php if( have_rows('information_resources') ):  ?>
					<section class="education">
					<?php while( have_rows('information_resources') ):  the_row();
							$link_image = get_sub_field('link_image');
							$size = 'full';
							$link = get_sub_field('link_file_pdf');
							$title = get_sub_field('title');
					?>
						
							<div class="edu-link">
								<a href="<?php echo $link; ?>">
									<?php echo wp_get_attachment_image( $link_image, $size ); ?>
									<h3><?php echo $title; ?></h3>
								</a>
							</div>
						
					<?php endwhile; ?>
					</section>
				<?php endif; ?>
		</section>
		
				
				

			<?php endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->



<?php 
get_footer();
