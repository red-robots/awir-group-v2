<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 



// pull homepage
$post = get_post(31); 
setup_postdata( $post );
 
	$image = get_field('local_chapters_image');
	$corpimage = get_field('corp_image');



	// vars
	$url = $image['url'];
	$title = $image['title'];
	$alt = $image['alt'];
	$caption = $image['caption'];

	// thumbnail
	$size = 'large';
	$thumb = $image['sizes'][ $size ];
	$width = $image['sizes'][ $size . '-width' ];
	$height = $image['sizes'][ $size . '-height' ];

	$titleText = get_field('title_text');
	$button_text = get_field('button_text');
	$video = get_field('video');
	$additional_information = get_field('additional_information');


 
wp_reset_postdata();



	?>

	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

	

		<section class="page-hero">
			
			<section class="home-hero">
				<h2>Association of Women in Rheumatology</h2>
			</section>

			<section class="video">
				<video controls>
				  <!-- <source src="somevideo.webm" type="video/webm"> -->
				  <source src="<?php echo $video; ?>" type="video/mp4">
				  I'm sorry; your browser doesn't support HTML5 video in WebM with VP8/VP9 or MP4 with H.264.
				  <!-- You can embed a Flash player here, to play your mp4 video in older browsers -->
				</video>
			</section>

			<div class="clear"></div>

			<section class="local-chapters ">
				<div class="title">
					<?php echo $titleText; ?>
				</div>
				<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
				<div class="button">
					<a href="<?php bloginfo('url'); ?>/local-chapters">
						<?php echo $button_text; ?>
					</a>
				</div>

				<div class="button">
					<a href="<?php bloginfo('url'); ?>/newsletter">
						Subscribe to Our Newsletter Here
					</a>
				</div>
			</section>

			
				<?php
				$wp_query = new WP_Query();
				$wp_query->query(array(
				'post_type'=>'event',
				'posts_per_page' => 1,
				'paged' => $paged,
				'meta_key'	=> 'date',
				'orderby'	=> 'meta_value_num',
				'order'		=> 'DESC'
			));
				if ($wp_query->have_posts()) : ?>
			    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); 
			    $date = get_field('date', false, false);
				// make date object
				$date = new DateTime($date);
				$end_date = get_field('end_date', false, false);
				// make date object
				$end_date = new DateTime($end_date);
				$registration_link = get_field('registration_link');
			?>	
					<div class="home-event">
					<h3>
						National Conference <?php 
								if( $end_date != '' ) {
									echo $date->format('M j') . ' - ' . $end_date->format('j, Y') ; 
								} else {
									echo $date->format('j M Y');
								}
								?>
					</h3>
						<h2><?php the_title(); ?></h2>
						<div class="date">
							<?php 
								if( $end_date != '' ) {
									echo $date->format('M j') . ' - ' . $end_date->format('j, Y') ; 
								} else {
									echo $date->format('j M Y');
								}
							?>
						</div>

						<div class="add-info">
							<?php echo $additional_information; ?>
						</div>

						<?php if( $registration_link ) { ?>
							<div class="button home-button">
								<a href="<?php echo $registration_link; ?>">Registration is Now Open</a>
							</div>
						<?php } ?>

					</div>
				<?php endwhile; ?>
				<?php endif; ?>
			

		</section>


		

			
		



		<section class="skr-slide section mission">
			<div class="small-wrap">
			    <h2>Our Mission</h2>
			    <p>To promote the science and practice of rheumatology, foster the advancement and education of women in rheumatology, and advocate access to the highest quality health care and management of patients with rheumatic diseases.</p>
			    
			    
		    </div>
		</section>

		

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
