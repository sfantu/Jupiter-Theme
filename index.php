<?php get_header(); ?>

	<!-- content -->
	<?php	$slug = 'next';	$category = get_category_by_slug($slug);query_posts($query_string.'cat=-'.$category->cat_ID.'&showposts=1'); ?>
	<?php if(have_posts() && !is_paged()) : while(have_posts()) : the_post(); ?>
	<div id="middle_container">
		<article>
			<h2><a href="<?php the_permalink() ?>"> <?php the_title(); ?> </a></h2>
			<div id="latest_content">
				 <?php the_excerpt(); ?>	
			</div>
			<a href="<?php the_permalink() ?>" ><?php the_post_thumbnail('latest-thumb'); ?> </a>
		</article>
	</div>
	<?php endwhile; ?>
	<?php endif; ?>
	<div id="main_wrap">
		<?php query_posts($query_string.'cat=-'.$category->cat_ID.'&showposts=4&offset=1');?>
<!--		query_posts('posts_per_page=4&offset=1'); ?>-->
		<?php if (have_posts()&& !is_paged()) : ?>
		<div id="main_top">
			<?php while (have_posts()) : the_post(); ?>		
			<article class="one_quarter">
				<div class="bordered">
				<a href="<?php the_permalink() ?>">				
				<?php the_post_thumbnail('quarter-thumb'); ?>
				<h2><?php the_title(); ?></h2>
				</a>
				</div>
			</article>
			<?php endwhile; ?>	
		</div>
		<?php endif; ?>
		

		
 		<?php query_posts($query_string.'cat=-'.$category->cat_ID.'&offset=5'.'&showposts=9');?>


 		
		<?php if (have_posts()) : ?>
		<div id="main_bottom">
			<?php while (have_posts()) : the_post(); ?>	
			<article class="one_quarter">
				<div class="bordered">				
				<a href="<?php the_permalink() ?>">
				<?php the_post_thumbnail('quarter-thumb'); ?>			
				<h2><?php the_title(); ?></h2>
				</a>
				</div>
			</article>
			<?php endwhile; ?>
		</div>
		<?php endif; ?>
		 
		<?php get_sidebar(); ?>
	</div>

<?php get_footer(); ?>
