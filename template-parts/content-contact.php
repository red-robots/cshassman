<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-contact"); ?>>
	<?php $banner = get_field("banner");
	if($banner):?>
		<div class="row-1">
			<img src="<?php echo $banner['url'];?>" alt="<?php echo $baner['alt'];?>">
		</div><!--.row-1-->
	<?php endif;?>
	<div class="wrapper row-2 clear-bottom">
		<div class="col-1 copy">
			<section class="row-1">
				<header>
					<h1><?php the_title();?></h1>
				</header>
				<?php $contact_text = get_field("contact_text");
				if($contact_text):?>
					<div class="copy">
						<?php echo $contact_text;?>
					</div><!--.copy-->
				<?php endif;?>
			</section><!--.row-1-->
			<section class="row-2">
				<?php $speechwriting_header = get_field("speechwriting_header");
				if($speechwriting_header):?>
					<header>
						<h2><?php echo $speechwriting_header;?></h2>
					</header>
				<?php endif;?>
				<?php $speechwriting_text = get_field("speechwriting_text");
				if($speechwriting_text):?>
					<div class="copy">
						<?php echo $speechwriting_text;?>
					</div><!--.copy-->
				<?php endif;?>
			</section><!--.row-2-->
		</div><!--.col-1-->
		<div class="col-2">
			<section class="row-1">
				<?php $buy_header = get_field("buy_header");
				if($buy_header):?>
					<header>
						<h2><?php echo $buy_header;?></h2>
					</header>
				<?php endif;?>
				<div class="links">
					<?php $amazon_link = get_field("amazon_link");
					$amazon_text = get_field("amazon_text");
					$bn_link = get_field("bn_link");
					$bn_text = get_field("bn_text");?>
					<?php if($amazon_link&&$amazon_text):?>
						<a class="blue-button" href="<?php echo $amazon_link;?>"><?php echo $amazon_text;?></a>
					<?php endif;
					if($bn_link&&$bn_text):?>
						<a class="blue-button" href="<?php echo $bn_link;?>"><?php echo $bn_text;?></a>
					<?php endif;?>
				</div><!--.links-->
			</section><!--.row-1-->
			<section class="row-2">
				<?php $newsletter_header = get_field("newsletter_header");
				if($newsletter_header):?>
					<header>
						<h2><?php echo $newsletter_header;?></h2>
					</header>
				<?php endif;?>
				<?php $newsletter_text = get_field("newsletter_text");
				if($newsletter_text):?>
					<div class="copy">
						<?php echo $newsletter_text;?>
					</div><!--.copy-->
				<?php endif;?>
			</section><!--.row-2-->
		</div><!--.col-2-->
		</div><!--.wrapper-->
	</div><!--.wrapper-->
</article><!-- #post-## -->
