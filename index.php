<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 



// pull homepage
$post = get_post(31); 
setup_postdata( $post );
 
	$image = get_field('local_chapters_image');
	$corpimage = get_field('corp_image');



	// vars
	$url = $image['url'];
	$title = $image['title'];
	$alt = $image['alt'];
	$caption = $image['caption'];

	// thumbnail
	$size = 'large';
	$thumb = $image['sizes'][ $size ];
	$width = $image['sizes'][ $size . '-width' ];
	$height = $image['sizes'][ $size . '-height' ];

	$titleText = get_field('title_text');
	$button_text = get_field('button_text');
	$video = get_field('video');
	$additional_information = get_field('additional_information');


 
wp_reset_postdata();



	?>
	<!-- <div class="skr-slide">
		<section class="home-banner" style="background-image: url(<?php bloginfo('template_url'); ?>/images/home-banner.png);">
			<section class="home-hero">
				<h2>Association of Women in Rheumatology</h2>
			</section>
		</section>
	</div> -->

	<section id="slide-2" class="skr-slide">
		<div class="bg-black"></div>
	    <div class="bcg "
	     style="background-image:url(<?php bloginfo('template_url'); ?>/images/home-banner.png);"
	        data-center="background-position: 50% 150px;"
	        data-top-bottom="background-position: 50% -500px;"
	        data-anchor-target="#slide-2">
	        <div class="hsContainer">
	            <div class="hsContent"
	                data-center="opacity: .6;"
	                data-106-top="opacity: 0;"
	                data-anchor-target="#slide-2">
	           
	            </div>
	            <section class="home-hero">
	            	<h2>Association of Women in Rheumatology</h2>
				    
				</section>
	        </div>
	    </div>


	</section>


	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

	
		



		
			
			

	<section class="video">
		<h2>Who We Are</h2>
		<div class="vid-cont">
			<video controls>
		  <!-- <source src="somevideo.webm" type="video/webm"> -->
		  <source src="<?php echo $video; ?>" type="video/mp4">
		  I'm sorry; your browser doesn't support HTML5 video in WebM with VP8/VP9 or MP4 with H.264.
		  <!-- You can embed a Flash player here, to play your mp4 video in older browsers -->
		</video>
		</div>
		
	</section>


	<?php 
		$mission = get_field('our_mission', 'option');
		$missionimage = get_field('mission_image','option');
		$missionthumb = $image['sizes'][ $size ];
		if($mission != '') : ?>
			<section class="mission">
				<div class="left js-blocks">
					<h2>Our Mission</h2>
					<?php echo $mission; ?>
				</div>
				<div class="m-image js-blocks">
					<img src="<?php echo $missionthumb; ?>" alt="<?php echo $missionimage['alt']; ?>"  />
				</div>
			</section>
		<?php endif; ?>


		<section class="values">

		<?php 
		if(have_rows('values', 'option')) : ?>
			<h2>We Value</h2>
			<div class="the-values">
		<?php while(have_rows('values', 'option')) : the_row();
		$value = get_sub_field('value','option');
		$image = get_sub_field('image','option');
		$size = 'large';
		$thumb = $image['sizes'][ $size ];
		 ?>

		 
		 	<div class="icon-cont">
				<div class="icon">
					<img src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>"  />
				</div>
				<div class="value"><?php echo $value; ?></div>
			</div>

		<?php endwhile; endif; ?>
		</div>
		</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
