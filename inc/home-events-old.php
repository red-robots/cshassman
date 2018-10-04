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
</div>