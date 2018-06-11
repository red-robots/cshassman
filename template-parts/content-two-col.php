<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-two-col"); ?>>
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
		<div class="wrapper clear-bottom">
			<section class="col-1 copy">
				<?php the_content();?>
			</section><!--.col-1-->
			<div class="col-2">
				<?php $image = get_field("image");
				if($image):?>
					<img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
				<?php endif;?>
			</div><!--.col-2-->
		</div><!--.wrapper-->
	</div><!--.wrapper-->
</article><!-- #post-## -->
