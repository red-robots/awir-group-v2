<?php
/**
 * Template Name: Corporate Members
 */

get_header(); 


?>
<div class="wrapper">


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->

				</article><!-- #post-## -->


<h2>Corporate Sponsors</h2>
				<!--
				*
				*
				*	Platinum Corporate Sponsors
				*
				*
				-->
				<section class="sponsors">
					<?php 

						$images = get_field('platinum_members');

						if( $images ): ?>
						   <div class="sponsor sponsor-corp  js-blocks">
						           <h3 class="platinum">Platinum Member</h3>
						           <div class="spon-cont">
						        <?php foreach( $images as $image ): ?>

						           <?php if( get_field('link', $image['id']) != '' ) { ?>
						                <a href="<?php the_field('link', $image['id']); ?>" >
						                <?php } ?>
						                     <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
						                <?php if( get_field('link', $image['id']) != '' ) { ?></a><?php } ?>
						              
						            
						        <?php endforeach; ?>
						   </div></div>
						<?php endif; ?>
				</section>

				<!--
				*
				*
				*	Gold Corporate Sponsors
				*
				*
				-->
				<section class="sponsors ">
					<?php 

						$images = get_field('gold_members');

						if( $images ): ?>
						   <div class="sponsor sponsor-corp js-blocks">
						           <h3 class="gold">Gold Member</h3>
						           <div class="spon-cont">
						        <?php foreach( $images as $image ): ?>
						          
						           <?php if( get_field('link', $image['id']) != '' ) { ?>
						                <a href="<?php the_field('link', $image['id']); ?>" >
						                <?php } ?>
						                     <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
						                <?php if( get_field('link', $image['id']) != '' ) { ?></a><?php } ?>
						              
						          
						        <?php endforeach; ?>
						   </div></div>
						<?php endif; ?>
				</section>

				<!--
				*
				*
				*	Silver Corporate Sponsors
				*
				*
				-->
				<section class="sponsors">
					<?php 

						$images = get_field('silver_level');

						if( $images ): ?>
						   <div class="sponsor sponsor-corp js-blocks">
						           <h3 class="silver">Silver Level</h3>
						           <div class="spon-cont">
						        <?php foreach( $images as $image ): ?>
						           <?php if( get_field('link', $image['id']) != '' ) { ?>
						                <a href="<?php the_field('link', $image['id']); ?>" >
						                <?php } ?>
						                     <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
						                <?php if( get_field('link', $image['id']) != '' ) { ?></a><?php } ?>
						             
						        
						        <?php endforeach; ?>
						   </div></div>
						<?php endif; ?>
				</section>

				<div class="clear"></div>

				<!--
				*
				*
				*	Bronze Corporate Sponsors
				*
				*
				-->
				<section class="sponsors ">
					<?php 

						$images = get_field('bronze_level');

						if( $images ): ?>
						   <div class="sponsor sponsor-corp js-blocks">
						   <h3 class="special">Bronze Level</h3>
						   <div class="spon-cont">
						        <?php foreach( $images as $image ): ?>
						           
						           <?php if( get_field('link', $image['id']) != '' ) { ?>
						                <a href="<?php the_field('link', $image['id']); ?>" >
						                <?php } ?>
						                     <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
						                <?php if( get_field('link', $image['id']) != '' ) { ?></a><?php } ?>
						               
						            
						        <?php endforeach; ?>
						   </div></div>
						<?php endif; ?>
				</section>

				<!--
				*
				*
				*	Special Event Corporate Sponsors
				*
				*
				-->
				<section class="sponsors ">
					<?php 

						$images = get_field('special_events');

						if( $images ): ?>
						   <div class="sponsor sponsor-corp js-blocks">
						           <h3 class="platinum">SPECIAL EVENTS</h3>
						           <div class="spon-cont">
						        <?php foreach( $images as $image ): ?>

						           <?php if( get_field('link', $image['id']) != '' ) { ?>
						                <a href="<?php the_field('link', $image['id']); ?>" >
						                <?php } ?>
						                     <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
						                <?php if( get_field('link', $image['id']) != '' ) { ?></a><?php } ?>
						                <p class="desc"><?php echo $image['description']; ?></p>
						            
						        <?php endforeach; ?>
						   </div></div>
						<?php endif; ?>
				</section>

			<?php endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->


	<div class="widget-area">
		<h3>Other Resources</h3>
		<div class="button">
			<a href="<?php bloginfo('url'); ?>/exhibitors">
			Become a Sponsor
			</a>
		</div>
	</div>
</div>
<?php 
get_footer();
