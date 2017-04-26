<?php
/**
 * Template Name: Advocacy
 */

get_header();


?>


    <div id="primary" class="content-area-full">
        <main id="main" class="site-main template-advocacy" role="main">
			<?php while ( have_posts() ) : the_post();

				$name                = get_field( 'name' );
				$photo               = get_field( 'photo' );
				$size                = 'full';
				$description         = get_field( 'description' );
				$form                = get_field( 'form' );
				$advocacy_links_text = get_field( 'advocacy_links_text' );
				$advocacy_link       = get_field( 'advocacy_link' ); ?>
                <article id="post-<?php the_ID(); ?>" class="">

                    <div class="wrapper">
                        <section class="intro">
                            <div class="single-board">
                                <div class="left">
                                    <div class="left">
                                        <div class="member-photo">
											<?php echo wp_get_attachment_image( $photo, $size ); ?>
                                        </div><!--.member-photo-->
                                    </div><!--.left-->
                                    <div class="right">
                                        <h3>AWIR - Chair of Advocacy</h3>
                                        <h2><?php echo $name; ?></h2>
										<?php echo do_shortcode( '[gravityform id="' . $form['id'] . '" title="false" description="false" ajax="true"]' ); ?>
                                    </div><!--.right-->
                                    <div class="clear"></div>
                                </div><!--.left-->
                                <div class="right">
                                    <div class="entry-content">
										<?php echo $description; ?>
                                    </div><!-- .entry-content -->
                                </div><!--.right-->
                                <div class="clear"></div>
                            </div><!--.single-board-->
                        </section>
                    </div><!--.wrapper-->
					<?php if ( have_rows( 'information_resources' ) ): ?>
                        <div class="wrapper-adv-resources">
                            <section id="container" class="adv-resources ">
								<?php while ( have_rows( 'information_resources' ) ): the_row();
									$link_image = get_sub_field( 'link_image' );
									$size       = 'full';
									$link       = get_sub_field( 'link_file_pdf' );
									$title      = get_sub_field( 'title' );
									?>
                                    <div class="edu-link item">
                                        <?php echo wp_get_attachment_image( $link_image, $size ); ?>
                                        <div class="inner-wrapper">
                                            <h3><?php echo $title;?></h3>
                                            <div class="learnmore">
                                                <a href="<?php echo $link; ?>">Learn More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                            </div><!--.row-2-->
                                        </div><!--.inner-wrapper-->
                                    </div><!--.edu-link-->
								<?php endwhile; ?>
                                <div class="clear"></div>
                            </section><!--.adv-resources-->
                        </div><!--.wrapper-adv-resources-->
					<?php endif; ?>
                </article><!-- #post-## -->
			<?php endwhile; // End of the loop.?>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_footer();
