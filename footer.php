<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrapper cap">
			<div class="row-1">
				<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
			</div><!--.row-1-->
			<div class="row-2">
				<div class="social">
					<?php $facebook = get_field("facebook_link","option");
					$twitter = get_field("twitter_link","option");
					$instagram = get_field("instagram_link","option");
					if($facebook):?>
						<a href="<?php echo $facebook;?>"><i class="fab fa-facebook"></i></a>
					<?php endif;
					if($twitter):?>
						<a href="<?php echo $twitter;?>"><i class="fab fa-twitter"></i></a>
					<?php endif;
					if($instagram):?>
						<a href="<?php echo $instagram;?>"><i class="fab fa-instagram"></i></a>
					<?php endif;?>
				</div><!--.social-->
			</div><!--.row-2-->
			<?php $copyright = get_field("copyright","option");
			if($copyright):?>
				<div class="row-3 copy">
					<?php echo $copyright;?>
				</div><!--.row-3-->
			<?php endif;?>
		</div><!--.wrapper-->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
