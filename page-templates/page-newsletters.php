<?php
/**
 * Template Name: Newsletters
 */

get_header();



?>
<div class="wrapper">

<div class="content-area-full content-block">
	<div class="widget-wrap center">
		<h2>NEWS FROM THE ASSOCIATION</h2>
		<h3>YOUR NEWSLETTER IS ACCESSIBLE HERE</h3>
	 
	You missed your mailing? ....Find your newsletter here
	</div>
</div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			$i=0;
			$wp_query = new WP_Query();
			$wp_query->query(array(
				'post_type'=>'newsletter',
				'posts_per_page' => 5,
				'paged' => $paged,
			));
			if ($wp_query->have_posts()) : ?>
		    <?php while ($wp_query->have_posts()) : ?>
		        
		    <?php $wp_query->the_post();  $i++;

			$link = get_field('link');
			//$photo = get_field('photo');

			if( $i == 2 ) {
    		$postClass = 'last';
	    		$i=0;
	    	} else {
	    		$postClass = 'first';
	    	}

			?>

			<div class="newsletter-link <?php echo $postClass; ?>">
				<a href="<?php echo $link; ?>" target="_blank">
					<?php the_title(); ?>
				</a>
			</div>

			<?php endwhile; // End of the loop.

			pagi_posts_nav();

			endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<div class="widget-area content-block article">
		<div class="widget-wrap">
			<h2>Subscribe to Our Newsletter Here</h2>
			-- Form to go here --
		</div>
	</div>
</div>
<?php
get_footer();
