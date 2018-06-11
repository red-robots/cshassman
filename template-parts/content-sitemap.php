<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-page"); ?>>
	<?php $banner = get_field("banner");
	if($banner):?>
		<div class="row-1">
			<img src="<?php echo $banner['url'];?>" alt="<?php echo $baner['alt'];?>">
		</div><!--.row-1-->
	<?php endif;?>
	<div class="wrapper cap row-2">
		<header>
			<h1><?php the_title();?></h1>
		</header>
		<div class="copy">
			<?php the_content();?>
			<?php wp_nav_menu( array( 'theme_location' => 'sitemap' ) ); ?>
		</div><!--.copy-->
	</div><!--.wrapper-->
</article><!-- #post-## -->
