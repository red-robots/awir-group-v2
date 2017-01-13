<?php
/**
 * Template Name: Events
 */

get_header(); 



?>
<div class="wrapper">


	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

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


			<div class="event <?php echo $postClass; ?>">

			<h2>National Conference <?php 
								if( $end_date != '' ) {
									echo $date->format('M j') . ' - ' . $end_date->format('j, Y') ; 
								} else {
									echo $date->format('j M Y');
								}
								?></h2>

				<div class="event-left">
					<div class="event-photo"><?php echo wp_get_attachment_image( $photo, $size ); ?></div>
				
						<div class="content">
							<h2><?php the_title(); ?></h2>
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
				</div><!-- event left -->
				
				<div class="event-right">
					<?php 

						$images = get_field('gallery');

						if( $images ): ?>
						   
						        <?php foreach( $images as $image ): ?>
						            <div class="gal-image">
						                <a class="gallery" href="<?php echo $image['url']; ?>">
						                     <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
						                </a>
						            </div>
						          
						        <?php endforeach; ?>
						    
						<?php endif; ?>
				</div><!-- event right -->
				
			</div>

			<?php 
			else: 

				//echo '<div  class="grey center"><h2>There are no upcoming events.</h2></div>';
				//break;
			// end if upcoming
			endif;

			endwhile; // End of the loop.

			pagi_posts_nav();

			echo '</section>';

			endif;
			?>


			<?php
			/*

					Past Events


			*/
			$i=0;
			$wp_query = new WP_Query();
			$wp_query->query(array(
				'post_type'=>'event',
				'posts_per_page' => 10,
				'paged' => $paged,
				'meta_key'	=> 'date',
				'orderby'	=> 'meta_value_num',
				'order'		=> 'ASC'
			));
			if ($wp_query->have_posts()) : ?>
			<header class="page-title">
				<h2>Past Events</h2>
			</header>
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
			if ( $compareDate < $today ) :
			?>


			<div class="event <?php echo $postClass; ?>">

			<h2>National Conference <?php 
								if( $end_date != '' ) {
									echo $date->format('M j') . ' - ' . $end_date->format('j, Y') ; 
								} else {
									echo $date->format('j M Y');
								}
								?></h2>

				<div class="event-left">
					<div class="event-photo"><?php echo wp_get_attachment_image( $photo, $size ); ?></div>
				
						<div class="content">
							<h2><?php the_title(); ?></h2>
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
				</div><!-- event left -->
				
				<div class="event-right">
					<?php 

						$images = get_field('gallery');

						if( $images ): ?>
						   
						        <?php foreach( $images as $image ): ?>
						            <div class="gal-image">
						                <a class="gallery" href="<?php echo $image['url']; ?>">
						                     <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
						                </a>
						            </div>
						          
						        <?php endforeach; ?>
						    
						<?php endif; ?>
				</div><!-- event right -->
				
			</div>

			<?php 
			// end if upcoming
			endif;

			endwhile; // End of the loop.

			pagi_posts_nav();

			echo '</section>';

			endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar(); ?>
</div>
<?php 
get_footer();
