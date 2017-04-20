<?php
/**
 * Template Name: Clinical Trials
 */

get_header();


?>
    <div class="wrapper">


        <div id="primary" class="content-area-full">
            <main id="main" class="site-main template-clinical-trials" role="main">

				<?php
				while ( have_posts() ) : the_post();

					$chair_name  = get_field( 'chair_name' );
					$size        = 'full';
					$photo       = get_field( 'chair_photo' );
					$description = get_field( 'description' );
					$form        = get_field( 'form' );

					?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <section class="intro">
                            <div class="single-board">
                                <div class="left">
                                    <div class="left">

                                        <div class="member-photo">
                                            <?php echo wp_get_attachment_image( $photo, $size ); ?>
                                        </div><!--.member-photo-->
                                    </div><!--.left-->
                                    <div class="right">
                                        <h2><?php echo $chair_name; ?></h2>
                                        <h3>AWIR - Chair of Clinical Trials</h3>

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

					<?php if ( have_rows( 'trails' ) ): ?>
                        <section class="trials">
							<?php while ( have_rows( 'trails' ) ): the_row();
								$trial_name  = get_sub_field( 'trial_name' );
								$link        = get_sub_field( 'link' );
								$description = get_sub_field( 'description' );
								?>

                                <div class="trial">
                                    <h2><?php echo $trial_name; ?></h2>
                                    <div class="desc"><?php echo $description; ?></div>
                                    <div class="learnmore"><a href="<?php echo $link; ?>">Learn More</a></div>
                                </div>

							<?php endwhile; ?>
                        </section>
					<?php endif; ?>


                    </article><!-- #post-## -->
				<?php endwhile; // End of the loop.
				?>

            </main><!-- #main -->
        </div><!-- #primary -->

    </div>
<?php
get_footer();
