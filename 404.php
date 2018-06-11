<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found template-page">
				<?php $banner = get_field("banner",22611);
				if($banner):?>
					<div class="row-1">
						<img src="<?php echo $banner['url'];?>" alt="<?php echo $baner['alt'];?>">
					</div><!--.row-1-->
				<?php endif;?>
				<div class="row-2 wrapper cap">
					<header class="page-header">
						<h1><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'acstarter' ); ?></h1>
					</header><!-- .page-header -->

					<div class="copy">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below?', 'acstarter' ); ?></p>
						<?php wp_nav_menu( array( 'theme_location' => 'sitemap' ) ); ?>
					</div><!-- .copy -->
				</div><!--.wrapper-->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
