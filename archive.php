<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */
global $wp_query;

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article <?php post_class("template-blog"); ?>>
				<div class="wrapper cap row-2">
					<header>
						<h1><?php if(is_category()):
							single_cat_title(); 
						else:
							the_archive_title();
						endif;?></h1>
					</header>
					<div class="wrapper clear-bottom">
						<section class="col-1">
							<?php $read_more_text = get_field("read_more_text","option");
							$post__not_in = array();
							if(have_posts()):?>
								<div class="posts">
									<?php while(have_posts()):the_post();
										$post__not_in[] = get_the_ID();?>
										<section class="post">
											<header>
												<h2><?php the_title();?></h2>
											</header>
											<?php if(has_post_thumbnail()):?>
												<?php the_post_thumbnail('large');?>
											<?php endif;?>
											<div class="copy">
												<?php the_excerpt();?>
											</div><!--.copy-->
											<?php if($read_more_text):?>
												<a class="blue-button clear-bottom" href="<?php the_permalink();?>"><?php echo $read_more_text;?>&nbsp;&nbsp;<i class="fa fa-chevron-circle-right"></i></a>
											<?php endif;?>
										</section><!--.post-->
									<?php endwhile;?>
								</div><!--.posts-->
								<?php pagi_posts_nav($wp_query);?>
							<?php endif;?>
						</section><!--.col-1-->
						<div class="col-2">
							<?php $archives_title = get_field("archives_title","option");
							if($archives_title):?>
								<h2><?php echo $archives_title;?></h2>
							<?php endif;?>
							<ul>
								<?php wp_get_archives(array('limit'=>12));?>
							</ul>
							<?php $limit = 0;
							$current_year = date('Y');
							$rows = $wpdb->get_results("SELECT DISTINCT YEAR( post_date ) AS year FROM $wpdb->posts WHERE post_status = 'publish' and post_date <= now( ) and post_type = 'post' ORDER BY post_date DESC");
							if($rows):?>
								<ul>
									<?php foreach($rows as $row) :
										if(strcmp($row->year,$current_year)===0) continue;?>
										<li class="archive-year"><a href="<?php bloginfo('url') ?>/<?php echo $row->year; ?>/"><?php echo $row->year;?></a></li>
									<?php endforeach;?>
								</ul> 
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
			</article>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
