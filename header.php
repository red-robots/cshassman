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
<script defer src="<?php bloginfo( 'template_url' ); ?>/assets/svg-with-js/js/fontawesome-all.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-136611224-4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-136611224-4');
</script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'acstarter' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="wrapper cap">
			<?php if(is_home()) { ?>
	            <h1 class="logo">
	            	<a href="<?php bloginfo('url'); ?>"><img src="<?php $logo = get_field("logo","option"); if($logo) echo $logo['sizes']['large'];?>" alt="<?php bloginfo('name');?>"></a>
	            </h1>
	        <?php } else { ?>
	            <div class="logo">
	            	<a href="<?php bloginfo('url'); ?>"><img src="<?php $logo = get_field("logo","option"); if($logo) echo $logo['sizes']['large'];?>" alt="<?php bloginfo('name');?>"></a>
	            </div>
	        <?php } ?>

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'MENU', 'acstarter' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
		</div><!-- wrapper -->
	</header><!-- #masthead -->

	<div id="content" class="site-content wrapper">
