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

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


					<div class="entry-content">
						<?php echo $description; ?>
					</div><!-- .entry-content -->

				</article><!-- #post-## -->

				


			<?php endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<div class="widget-area">
	<h3>Resources</h3>
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

				<div class="button">
					<a href="<?php echo $chooseLink; ?>">
					<?php echo $resource_label; ?>
					</a>
				</div>

				<?php endwhile; ?>
			<?php endif; ?>
			<h3>Events</h3>
			<?php
			/*

					Current / Upcoming Events


			*/
			$i=0;
			$wp_query = new WP_Query();
			$wp_query->query(array(
				'post_type'=>'event',
				'posts_per_page' => 10,
				'paged' => $paged,
				'meta_key'	=> 'date',
				'orderby'	=> 'meta_value_num',
				'order'		=> 'DESC'
			));
			if ($wp_query->have_posts()) : ?>
			<section class="events">
		    <?php while ($wp_query->have_posts()) : ?>
		        
		    <?php $wp_query->the_post();  $i++;

			$link = get_field('link');
	    	$photo = get_field('featured_image');
	    	$size = 'full';

			if( $i == 2 ) {
    		$postClass = 'last';
	    		$i=0;
	    	} else {
	    		$postClass = 'first';
	    	}
			
			$date = get_field('date', false, false);
			// make date object
			$date = new DateTime($date);

			$compareDate = $date->format('Ymd');

			$end_date = get_field('end_date', false, false);
			// make date object
			$end_date = new DateTime($end_date);

			$today = date('Ymd');
			//echo $today;

			// Only upcoming Dates
			if ( $compareDate >= $today ) :
			?>


			<div class="event <?php echo $postClass; ?>">
				<div class="event-photo"><?php echo wp_get_attachment_image( $photo, $size ); ?></div>
				
				<div class="content">
					<h2 class="smaller"><?php the_title(); ?></h2>
					<div class="dates">
						<?php 
						if( $end_date != '' ) {
							echo $date->format('M j') . ' - ' . $end_date->format('j, Y') ; 
						} else {
							echo $date->format('j M Y');
						}
						

						?>
					</div>
				</div>
				<div class="learnmore"><a href="<?php the_permalink(); ?>">Learn More</a></div>
				
			</div>

			<?php 
			else: 

				echo '<div  class="grey"><h4>There are no upcoming events.</h4></div>';
				break;
			// end if upcoming
			endif;

			endwhile; // End of the loop.

			pagi_posts_nav();

			echo '</section>';

			endif;
			?>
	</div>


</div>
<?php 
get_footer();
