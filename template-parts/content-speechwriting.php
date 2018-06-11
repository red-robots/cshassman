<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-speechwriting"); ?>>
	<?php $banner = get_field("banner");
	if($banner):?>
		<div class="row-1">
			<img src="<?php echo $banner['url'];?>" alt="<?php echo $baner['alt'];?>">
		</div><!--.row-1-->
	<?php endif;?>
	<div class="wrapper row-2 clear-bottom">
		<div class="col-1 js-blocks">
			<section class="row-1">
				<header>
					<h1><?php the_title();?></h1>
				</header>
				<div class="copy">
					<?php the_content();?>
				</div><!--.copy-->
				<?php $button_text = get_field("button_text");
				$button_link = get_field("button_link");
				if($button_link&&$button_text):?>
					<a class="blue-button" href="<?php echo $button_link;?>"><?php echo $button_text;?>&nbsp;<i class="fa fa-chevron-circle-right"></i></a>
				<?php endif;?>
			</section><!--.row-1-->
			<?php $testimonials = get_field("testimonials");
			if($testimonials):?>
				<section class="testimonials">
					<?php $testimonials_header = get_field("testimonials_header");
					if($testimonials_header):?>
						<header>
							<h2><?php echo $testimonials_header;?></h2>
						</header>
					<?php endif;
					foreach($testimonials as $row):
						$copy = $row['testimonial'];
						if($copy):?>
							<div class="testimonial copy">
								<?php echo $copy;?>				
							</div><!--.testimonial-->
						<?php endif;
					endforeach;?>
				</section><!--.testimonials-->
			<?php endif;?>
		</div><!--.col-1-->
		<section class="col-2 js-blocks">
			<?php $logo = get_field("logo");
			$contact_header = get_field("contact_header");
			$contact_form = get_field("contact_form");
			if($logo):?>
				<img src="<?php echo $logo['sizes']['large'];?>" alt="<?php echo $logo['alt'];?>">
			<?php endif;
			if($contact_header):?>
				<header>
					<h2><?php echo $contact_header;?></h2>
				</header>
			<?php endif;
			if($contact_form):?>
				<?php echo $contact_form;?>
			<?php endif;?>
		</section><!--.col-2-->
	</div><!--.wrapper-->
</article><!-- #post-## -->
