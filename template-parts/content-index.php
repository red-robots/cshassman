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
				<div class="overlay">
					<img class="overlaypic" src="<?php echo $row_1_overlay['sizes']['large'];?>" alt="<?php echo $row_1_overlay['alt'];?>">
				</div>
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
	<div class="frontevent">
		<h2>UPCOMING EVENTS</h2>
		<?php $today = date('Ymd');
		$args = array(
			'post_type'=>'event',
			'posts_per_page'=> 3,
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
		if($query->have_posts()):while($query->have_posts()):$query->the_post();
			$image = get_field("image");
			$date = get_field("date", false, false);
			$enddate = get_field("end_date", false, false);
			// make date object
			$date = new DateTime($date);
			$nenddate = new DateTime($enddate);
			$read_more_text = get_field("read_more_text","option");
			$speaking_text = get_field("speaking_text","option");?>
				
					

					<div class="faqrows">
						<div class="question">
							
							<a href="<?php the_permalink(); ?>"><span class="date"><?php echo $date->format('M j'); if($enddate) {echo ' - '.$nenddate->format('j');}?></span>  <?php the_title(); ?> <i class="fas fa-chevron-right"></i></a>
						</div>
						
					</div><!-- faqrow -->

				
			<?php wp_reset_postdata();
		endwhile;endif;?>
	</div>
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
