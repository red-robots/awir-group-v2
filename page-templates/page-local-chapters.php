<?php
/**
 * Template Name: Local Chapters
 */

get_header(); 



?>


<div id="primary" class="content-area-full">
		<main id="main" class="site-main template-clinical-trials" role="main">

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

			<article id="post-<?php the_ID(); ?>" class="content-section-page">
				<div class="wrapper">

					<section class="intro">
							<div class="single-board">
								<div class="left">
									<div class="left">
										<div class="member-photo">
								    		<?php echo wp_get_attachment_image( $photo, $size ); ?>
								    	</div><!--.member photo-->
							    	</div><!--.left-->
							    	<div class="right">
							    		<h2><?php echo $name; ?></h2>
							    		<h3>AWIR - Chair of Advocacy</h3>
											<?php echo do_shortcode('[gravityform id="' . $form['id'] . '" title="false" description="false" ajax="true"]'); ?>
									</div><!--.right-->
									<div class="clear"></div>
								</div><!--.left-->
								<div class="right">
                                    <div class="entry-content">
										<?php echo $description; ?>
                                    </div><!-- .entry-content -->
                                </div><!--.right-->
                                <div class="clear"></div>
							</div>
					</section>
					</div>
				</article><!-- #post-## -->

	<div class="wrapper">
		<section class="adv-resources">
			<h2>Local Chapter Events</h2>
			<?php if( have_rows('events') ):  ?>
					<section class="education">
					<?php while( have_rows('events') ):  the_row();
							$link_image = get_sub_field('link_image');
							$size = 'full';
							$event = get_sub_field('event');
							$event_date = get_sub_field('event_date');
							$address = get_sub_field('address');
							$phone = get_sub_field('phone');
							$email = get_sub_field('email');
							$details = get_sub_field('details');
							$antispam = antispambot( $email );
					?>
						
							<div class="local-event wow fadeUpIn ">
								<h3><?php echo $event; ?></h3>
								<div class="event-contents js-blocks">
									<?php if( $event_date != '') { echo '<div class="event-date">' . $event_date . '</div>'; } ?>
									<?php if( $address != '') { echo '<div class="event-address">' . $address . '</div>'; } ?>
									<?php if( $phone != '') { echo '<div class="event-phone">' . $phone . '</div>'; } ?>
									<?php if( $details != '') { echo '<div class="event-details">' . $details . '</div>'; } ?>
								</div>
								<?php if( $email != '') { 
									echo '<div class="event-reg"><a href="mailto:' . $antispam . '">Register</a></div>'; 
									} ?>
							
							</div>
						
					<?php endwhile; ?>
					</section>
				<?php endif; ?>
		</section>
	</div>
	<!-- wrapper -->

	<div class="wrapper">
		<section class="adv-resources">
			<h2>Local Chapter Leaders</h2>
			<?php if( have_rows('leaders') ):  ?>
					<section class="education">
					<?php while( have_rows('leaders') ):  the_row();
							$image = get_sub_field('image');
							$size = 'full';
							$chapter_name = get_sub_field('chapter_name');
							$leader_name = get_sub_field('leader_name');
							$leader_email = get_sub_field('leader_email');
							$phone = get_sub_field('phone');
							$antispam = antispambot($leader_email);
					?>
						
							<div class="local-event leader wow fadeInUp">
								<div class="event-contents js-blocks">
									<?php echo wp_get_attachment_image( $image, $size ); ?>
									<h3><?php echo $chapter_name; ?></h3>
									<h4><?php echo $leader_name; ?></h4>
								</div>
								<div class="contact">
									<a href="mailto:<?php echo $antispam; ?>">Contact</a>
								</div>
								
							</div>
						
					<?php endwhile; ?>
					</section>
				<?php endif; ?>
		</section>
	</div>
	<!-- wrapper -->			
				

			<?php endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->



<?php 
get_footer();
