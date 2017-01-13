<?php
/**
 * The header for theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">

<?php wp_head(); 

$facebook = get_field('facebook_link', 'option');
$twitter = get_field('twitter_link', 'option');
$instagram = get_field('instagram_link', 'option'); 

?>
</head>

<body <?php body_class(); ?>>
<div id="skrollr-body"></div>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'acstarter' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
	
		
		<div class="wrapper">
			
			<?php if(is_home()) { ?>
	            <h1 class="logo">
	            	<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
	            </h1>
	        <?php } else { ?>
	            <div class="logo">
	            	<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
	            </div>
	        <?php } ?>


	       <div class="header-right">
		       <div class="social social-header">
					<i class="fa fa-2x fa-facebook" aria-hidden="true">
						<a target="_blank" href="<?php echo $facebook; ?>">facebook</a>
					</i>
					<i class="fa fa-2x fa-instagram" aria-hidden="true">
						<a target="_blank" href="<?php echo $instagram; ?>">instagram</a>
					</i>
					<i class="fa fa-2x fa-twitter" aria-hidden="true">
						<a target="_blank" href="<?php echo $twitter; ?>">twitter</a>
					</i>
				</div><!-- social -->

				<div class="clear"></div>

				<div class="button-purple">
					<a href="<?php bloginfo('url'); ?>/sign_up">Join!</a>
				</div>

				<div class="button-purple">
					<a target="_blank" href="hhttps://www.regonline.com/register/login.aspx?eventID=1798991&MethodId=0&EventsessionId=&Email_Address=&membershipID=">Log In</a>
				</div>

			</div><!-- header right -->


	</div><!-- wrapper -->

	 <div id="mynav">
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'MENU', 'acstarter' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</div>
	
	
	</header><!-- #masthead -->

	<div id="content" class="site-content ">

	<?php 
	if(!is_front_page()) {
		get_template_part('template-parts/title');
	}
	?>
