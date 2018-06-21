<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-blog"); ?>>
	<div class="wrapper cap row-2">
		<header>
			<div class="blog-title">Blog</div><!--.blog-title-->
		</header>
		<div class="wrapper clear-bottom">
			<section class="col-1">
				<?php $post__not_in = array();
				if(have_posts()):?>
					<div class="posts">
						<?php while(have_posts()):the_post();
							$post__not_in[] = get_the_ID();?>
							<section class="post">
								<header>
									<h1><?php the_title();?></h1>
								</header>
								<?php if(has_post_thumbnail()):?>
									<?php the_post_thumbnail('large');?>
								<?php endif;?>
								<div class="copy">
									<?php the_content();?>
								</div><!--.copy-->
							</section><!--.post-->
						<?php endwhile;?>
					</div><!--.posts-->
				<?php endif;?>
			</section><!--.col-1-->
			<div class="col-2">
				<?php $archives_title = get_field("archives_title","option");
				if($archives_title):?>
					<h2><?php echo $archives_title;?></h2>
								<ul>
					<?php wp_get_archives(array('limit'=>12));?>
				</ul>
				<?php $limit = 0;
				$current_year = date('Y');
				$rows = $wpdb->get_results("SELECT DISTINCT YEAR( post_date ) AS year FROM $wpdb->posts WHERE post_status = 'publish' and post_date <= now( ) and post_type = 'post' ORDER BY post_date DESC");
				if($rows){?>
					<ul>
						<?php foreach($rows as $row) :
							if(strcmp($row->year,$current_year)===0) continue;?>
							<li class="archive-year"><a href="<?php bloginfo('url') ?>/<?php echo $row->year; ?>/"><?php echo $row->year;?></a></li>
						<?php endforeach;?>
					</ul> 
				<?php } ?>
				<?php endif;?>

				<?php $categories_title = get_field("categories_title","option");
				if($categories_title):?>
					<h2><?php echo $categories_title;?></h2>
				<?php endif;?>
				<ul>
					<?php wp_list_categories(array('title_li'=>''));?>
				</ul>
				<?php $latest_posts_title = get_field("latest_posts_title","option");
				if($latest_posts_title):?>
					<h2><?php echo $latest_posts_title;?></h2>
				<?php endif;?>
				<?php $args = array(
					'post_type'=>'post',
					'posts_per_page'=>5,
					'orderby'=>'date',
					'order'=>'ASC',
					'post__not_in'=>$post__not_in
				);
				$query = new WP_Query($args);
				if($query->have_posts()):?>
					<ul>
						<?php while($query->have_posts()):$query->the_post();?>
							<li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
						<?php endwhile;?>
					</ul>
					<?php wp_reset_postdata();
				endif;?>
			</div><!--.col-2-->
		</div><!--.wrapper-->
	</div><!--.wrapper-->
</article><!-- #post-## -->
