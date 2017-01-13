<?php
/**
 * Template Name: Newsletters
 */

get_header();



?>
<div class="wrapper">



	<div id="primary" class="content-area-full">
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

	<!-- <div class="widget-area">
		<h2>Archives</h2>
		<?php $args = array(
			'type'            => 'monthly',
			'limit'           => '',
			'format'          => 'html', 
			'before'          => '',
			'after'           => '',
			'show_post_count' => false,
			'echo'            => 1,
			'order'           => 'DESC',
		        'post_type'     => 'newsletter'
		);
		//wp_get_archives( $args ); ?>
	</div> -->
</div>
<?php
get_footer();
