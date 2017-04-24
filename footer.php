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


		<div class="footer-flex">
			<section class="footer-left">
				<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
			</section>

			<section class="footer-mid">
				<h3>Subscribe to our Newsletter</h3>
				<?php get_template_part('inc/newsletter'); ?>
			</section>

			<section class="footer-right">
				<h3>Join a Local Chapter</h3>
				<h3>Next Event</h3>
				<?php
					/*

							Current / Upcoming Events


					*/
					$i=0;
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
					<section class="events">
				    <?php while ($wp_query->have_posts()) : ?>
				        
				    <?php $wp_query->the_post(); 
				    $date = get_field('date', false, false);
					// make date object
					$date = new DateTime($date);

					$compareDate = $date->format('Ymd');
					// echo '<pre>';
					// print_r($compareDate);
					// echo '</pre>';

					$end_date = get_field('end_date', false, false);
					// make date object
					$end_date = new DateTime($end_date);

					$today = date('Ymd');
					//echo $today . ' | ' . $end_date;

					// Only upcoming Dates
					if ( $compareDate >= $today ) :
				    ?>
					<h2>National Conference <?php 
								if( $end_date != '' ) {
									echo $date->format('M j') . ' - ' . $end_date->format('j, Y') ; 
								} else {
									echo $date->format('j M Y');
								}
								?></h2>
					<?php endif; ?>
					<?php endwhile; ?>
					<?php endif; ?>
			</section>
		</div>
		


			<div class="site-info">
				<?php echo get_bloginfo('description'); ?> | New York, NY 
			</div><!-- .site-info -->
			<div class="site-info">
				&copy; <?php echo date('Y') . ' ' . get_bloginfo('description'); ?>
			</div><!-- .site-info -->

	</div><!-- wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
