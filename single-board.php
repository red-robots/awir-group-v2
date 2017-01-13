<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

get_header(); ?>
<div class="wrapper">

	<header class="page-title">
		<h1><?php the_title(); ?></h1>
	</header>


	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

		

		<?php
		while ( have_posts() ) : the_post(); 


			$photo = get_field('photo');
	    	$title = get_field('title');
	    	$size = 'full';
	    	// Get current and don't query later
	    	$current = get_the_ID();

		?>

			<div class="single-board ">
				<div class="left">
					<div class="member-photo">
			    		<?php echo wp_get_attachment_image( $photo, $size ); ?>
			    	</div>
			    	<h2><?php echo $title; ?></h2>
				</div>
				<div class="right">
					<?php the_content(); ?>
				</div>
			</div>

		<?php endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<section class="other-members">
	<h3 class="sect-head">Other Board Members</h3>

	<?php
		$i=0;
		$wp_query = new WP_Query();
		$wp_query->query(array(
		'post_type'=>'board',
		'posts_per_page' => -1,
		'paged' => $paged,
		'post__not_in' => array( $current )
	));
		if ($wp_query->have_posts()) : ?>
	    <?php while ($wp_query->have_posts()) : ?>
	        
	    <?php $wp_query->the_post(); $i++;
    	$photo = get_field('photo');
    	$title = get_field('title');
    	$size = 'full';

    	if( $i == 2 ) {
    		$postClass = 'last';
    		$i=0;
    	} else {
    		$postClass = 'first';
    	}

	  
	    ?>

	    <div class="boardmember <?php echo $postClass; ?> js-blocks  wow fadeInUp">
	    	<div class="member-photo">
	    		<?php echo wp_get_attachment_image( $photo, $size ); ?>
	    	</div>
	    	<div class="content">
	    		<h2><?php the_title(); ?></h2>
		    	<h3><?php echo $title; ?></h3>
		    	<div class="readmore">
		    		Read Bio
		    	</div>
	    	</div>
	    	
	    	<a class="open" href="<?php the_permalink(); ?>">Go</a>
	    </div><!-- board member -->

	<?php endwhile; endif; ?>
		
	</section>
</div>
<?php
get_footer();
