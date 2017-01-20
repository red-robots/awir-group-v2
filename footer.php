<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */
// pull homepage
$post = get_post(31); 
setup_postdata( $post );
 
	$image = get_field('corp_image', 'option');



	// vars
	$url = $image['url'];
	$title = $image['title'];
	$alt = $image['alt'];
	$caption = $image['caption'];

	// thumbnail
	$size = 'large';
	$thumb = $image['sizes'][ $size ];
	$corpthumb = $image['sizes'][ $size ];
	$width = $image['sizes'][ $size . '-width' ];
	$height = $image['sizes'][ $size . '-height' ];


 
wp_reset_postdata();
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrapper">


		<section class="home-bottom">
			<div class="thirds">
				<h2>Corporate Members</h2>
				<div class="content">
					<a href="<?php bloginfo('url'); ?>/meetings/exhibitors/">
						<img src="<?php echo $corpthumb; ?>" alt="<?php echo $alt; ?>" />
					</a>
				</div>
				<h2>Partner Organizations</h2>
				<div class="content">
				<?php $the_query = new WP_Query();
						$the_query->query(array(
						'post_type'=>'partner',
						'posts_per_page' => -1
						));
						if ( $the_query->have_posts() ) :
					?>
					<div class="flexslider">
				        <ul class="slides">
				        <?php 

				        	while ( $the_query->have_posts() ) : ?>
							<?php $the_query->the_post(); 
								
								$image = get_field('partner_logo');
								$link = get_field('link');

								if( !empty($image) ): 

									// vars
									$url = $image['url'];
									$title = $image['title'];
									$alt = $image['alt'];

									// thumbnail
									$size = 'large';
									$thumb = $image['sizes'][ $size ];
									$width = $image['sizes'][ $size . '-width' ];
									$height = $image['sizes'][ $size . '-height' ];
								endif;
		?>
				            
				            <li> 
				            <?php if( !empty($link)) {echo '<a target="_blank" href="'. $link . '">';} ?>
				              <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
				              <?php if( !empty($link)) { echo '</a>'; } ?>
				            </li>
				            
				           <?php endwhile; ?>
				      	 </ul><!-- slides -->
					</div><!-- .flexslider -->
					<?php endif; ?>
				</div>
			</div><!-- thirds -->

			<div class="thirds">
				<h2>Physicians</h2>
				<?php $the_query = new WP_Query();
						$the_query->query(array(
						'post_type'=>'board',
						'posts_per_page' => -1
						));
						if ( $the_query->have_posts() ) :
					?>
					<div class="flexslider">
				        <ul class="slides">
				        <?php 

				        	while ( $the_query->have_posts() ) : ?>
							<?php $the_query->the_post(); 
								
								$photo = get_field('photo');
								$size = 'thumbnail';
								$person = get_the_title();
								$santi = sanitize_title_with_dashes($person);

							?>
							<li> 
				            <a href="<?php echo get_bloginfo('url'); ?>/board-members/#<?php echo $santi; ?>">
				              <?php echo wp_get_attachment_image( $photo, $size ); ?>
				              </a>
				            </li>
				            
				           <?php endwhile; ?>
				      	 </ul><!-- slides -->
					</div><!-- .flexslider -->
					<?php endif; ?>
			</div><!-- thirds -->

			<div class="thirds">
				<h2>Member Benefits</h2>
				<?php wp_reset_postdata();
				// pull homepage
					$post = get_post(439); 
					setup_postdata( $post ); ?>
						<?php if(have_rows('member_benefits')) : while(have_rows('member_benefits')) : the_row(); 
						$benefit = get_sub_field('benefit');
						$santi = sanitize_title_with_dashes($benefit);

						?>
						<div class="benefit">
							<a href="<?php echo get_bloginfo('url'); ?>/member-benefits/#<?php echo $santi; ?>">
								<?php echo $benefit; ?>
							</a>
						</div>

						<?php endwhile; endif; ?>
					 
					<?php wp_reset_postdata(); ?>
			</div><!-- thirds -->

		</section>	



			<div class="site-info">
				&copy; <?php echo date('Y') . ' ' . get_bloginfo('description'); ?> | New York, NY 
			</div><!-- .site-info -->
	</div><!-- wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
