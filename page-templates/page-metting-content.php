<?php
/**
 * Template Name: Meeting Content
 */

get_header(); 




?>

<?php //endif; ?>



<div class="wrapper">

	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

			<?php
			/*

					Past Events


			*/
			$i=0;
			$wp_query = new WP_Query();
			$wp_query->query(array(
				'post_type'=>'event',
				'posts_per_page' => -1,
				'paged' => $paged,
				'meta_key'	=> 'date',
				'orderby'	=> 'meta_value_num',
				'order'		=> 'ASC'
			));
			if ($wp_query->have_posts()) : ?>
			<section class="events">
		    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

				<article id="post-<?php the_ID(); ?>" class="content-block article">

				<h3><?php the_title(); ?></h3>
				<div class="button"><a class="" href="<?php the_permalink(); ?>">Access Meeting Content</a></div>
					
				
					<div class="entry-content">
						<?php //the_content(); ?>
					</div><!-- .entry-content -->

				</article><!-- #post-## -->

			<?php endwhile; // End of the loop. ?>
		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->


</div>
<?php 
get_footer();
