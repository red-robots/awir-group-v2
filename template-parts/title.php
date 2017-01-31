<?php 

// Get the featured image ==== todo

if( get_post_type() == 'event') {
	$image = get_field('featured_image');
	$imageArray = wp_get_attachment_image_src($image);
	$imageUrl = $imageArray[0];
	$title = 'Meeting Content: '. get_the_title();
	// echo '<pre>';
	// print_r($imageUrl);
} elseif ( get_post_type() == 'page' ) {
	$imageUrl = get_the_post_thumbnail_url( '','large' );
	$title = get_the_title();
} else {
	$imageUrl = get_bloginfo('template_url') . '/images/image2.png';
	$title = get_the_title();
}


// Bread crumbs
echo do_shortcode('[breadcrumb]');
 ?>


<header class="page-title">
	<h1 class=" fadeIn"><?php echo $title; ?></h1>
</header>
		