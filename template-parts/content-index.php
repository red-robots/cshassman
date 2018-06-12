<?php
/**
 * Template part for displaying page content in index.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-index clear-bottom"); ?>>
	<?php $row_1_image = get_field("row_1_image");
	$row_1_overlay = get_field("row_1_overlay");
	if($row_1_image):?>
		<div class="row-1">
			<img class="full" src="<?php echo $row_1_image['url'];?>" alt="<?php echo $row_1_image['alt'];?>">		
			<?php if($row_1_overlay):?>
				<img class="overlay" src="<?php echo $row_1_overlay['sizes']['large'];?>" alt="<?php echo $row_1_overlay['alt'];?>">
			<?php endif;?>
		</div><!--.row-1-->
	<?php endif;?>
	<section class="block-1 js-blocks block">
		<?php $image = get_field("block_1_image");
		$title = get_field("block_1_title");
		$subtitle = get_field("block_1_subtitle");
		$link = get_field("block_1_link");
		$link_text = get_field("block_1_link_text");?>
		<div class="wrapper clear-bottom">
			<div class="col-1">
				<?php if($image):?>
					<img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo ['alt'];?>">
				<?php endif;?>
			</div><!--.col-1-->
			<div class="col-2">
				<?php if($title):?>
					<h2><?php echo $title;?></h2>
				<?php endif;
				if($subtitle):?>
					<div class="subtitle copy">
						<?php echo $subtitle;?>
					</div><!--.subtitle-->
				<?php endif;
				if($link&&$link_text):?>
					<a class="button" href="<?php echo $link;?>">
						<?php echo $link_text;?>
					</a>
				<?php endif;?>
			</div><!--.col-2-->
		</div><!--.wrapper-->
	</section><!--.block-1-->
	<section class="block-2 js-blocks block">
		<?php $image = get_field("block_2_image");
		$title = get_field("block_2_title");
		$subtitle = get_field("block_2_subtitle");
		$link = get_field("block_2_link");
		$link_text = get_field("block_2_link_text");?>
		<div class="wrapper">
			<?php if($title):?>
				<h2><?php echo $title;?></h2>
			<?php endif;?>
			<?php if($image):?>
				<img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo ['alt'];?>">
			<?php endif;?>
			<?php if($subtitle):?>
				<div class="subtitle copy">
					<?php echo $subtitle;?>
				</div><!--.subtitle-->
			<?php endif;?>
		</div><!--.wrapper-->
		<?php if($link&&$link_text):?>
			<a class="button" href="<?php echo $link;?>">
				<?php echo $link_text;?>
			</a>
		<?php endif;?>
	</section><!--.block-2-->
	<section class="block-3 js-blocks block">
		<?php $today = date('Ymd');
		$args = array(
			'post_type'=>'event',
			'posts_per_page'=>1,
			'orderby'=>'meta_value_num',
			'order'=>'ASC',
			'meta_key'=>'date',
			'meta_query'=>array(array(
				'key'=>'date',
				'value'=>$today,
				'compare'=>'>='
			))
		);
		$query = new WP_Query($args);
		if($query->have_posts()):$query->the_post();
			$image = get_field("image");
			$date = get_field("date");
			$read_more_text = get_field("read_more_text","option");
			$speaking_text = get_field("speaking_text","option");?>
			<div class="event">
				<?php if($image):?>
					<img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
				<?php endif;?>
				<?php if($speaking_text&&$date):?>
					<h2><?php echo $speaking_text.'&nbsp'.(new DateTime($date))->format('n/j');?></h2>
				<?php endif;?>
				<div class="copy">
					<?php the_excerpt();?>
				</div><!--.copy-->
				<a class="button" href="<?php the_permalink();?>">
					<?php if($read_more_text): 
						echo $read_more_text;
					else:
						echo "Read More";
					endif;?>
				</a>
			<?php wp_reset_postdata();
		endif;?>
	</section><!--.block-3-->
	<section class="block-4 js-blocks block">
		<?php $title = get_field("block_4_title");
		$subtitle = get_field("block_4_subtitle");?>
		<?php if($title):?>
			<h2><?php echo $title;?></h2>
		<?php endif;
		if($subtitle):?>
			<div class="subtitle copy">
				<?php echo $subtitle;?>
			</div><!--.subtitle-->
		<?php endif;
		$mailchimp_code = get_field("mailchimp_code","option");
		if($mailchimp_code):?>
			<?php echo $mailchimp_code;?>
		<?php endif;?>
	</section><!--.block-4-->
</article><!-- #post-## -->
