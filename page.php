<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 




// $children = get_pages( array( 'child_of' => $post->ID ) );

// if ( is_page() && $post->post_parent ) : 
// 	// this is a child page
// 	get_template_part('template-parts/subnav-resources');

//  elseif ( is_page() && count( $children ) > 0 ) : 
// 	// This is a parent-page (with one or more children)
//  	get_template_part('template-parts/subnav-resources');
//  else : 

 	?>
<!-- This is a parent page without children. -->

<?php //endif; ?>



<div class="wrapper">

	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" class="content-block article white-wrapper-full">


					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->

				</article><!-- #post-## -->

			<?php endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar(); ?>
</div>
<?php 
get_footer();
