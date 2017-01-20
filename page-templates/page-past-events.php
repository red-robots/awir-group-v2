<?php
/**
 * Template Name: Past Events
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
				'order'		=> 'ASC'
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
			if ( $compareDate <= $today ) :
			?>


			<div class="event <?php echo $postClass; ?>">

			<h2>National Conference <?php 
								if( $end_date != '' ) {
									echo $date->format('M j') . ' - ' . $end_date->format('j, Y') ; 
								} else {
									echo $date->format('j M Y');
								}
								?></h2>

				
				
				
				
				
				<?php 

						$images = get_field('gallery');

						if( $images ): ?>
						   <div class="flexslider">
						   		<div class="event-info">
						   			<h2><?php the_title(); ?></h2>
						   			<?php if(have_rows('resource_links')) : ?>
						   				<div class="top-right">
						   				<?php while(have_rows('resource_links')) : the_row(); 

							   			$label_name = get_sub_field('label_name');
							   			$link_or_pdf = get_sub_field('link_or_pdf');
							   			$link = get_sub_field('link');
							   			$pdf = get_sub_field('pdf');
							   			if( $link_or_pdf == 'PDF' ) {
							   				$resource = $pdf;
							   			} else {
							   				$resource = $link;
							   			}
						   			?>

						   			<div class="button">
						   				<a href="<?php echo $resource; ?>"><?php echo $label_name; ?></a>
						   			</div>

						   			<?php endwhile; ?>
						   			</div>
						   		<?php endif; ?>
						   		</div>
						        <ul class="slides">
						        <?php foreach( $images as $image ): ?>
						            
				                <li>
				                	<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
				                </li>
						        <?php endforeach; ?>
						    	</ul>
						    </div>
						<?php endif; ?>
			</div><!-- event -->


			<section class="event-sponsors">
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
			</section>

			<?php 
			else: 

				//echo '<div  class="grey center"><h2>There are no upcoming events.</h2></div>';
				//break;
			// end if upcoming
			endif;

			endwhile; // End of the loop.

			

			echo '</section>';

			endif;
			?>


			

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar(); ?>
</div>
<?php 
get_footer();
