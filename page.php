<?php get_header(); ?>
	<!-- content -->
	<div id="main_wrap">	 
		<div id="main_content">
<!--			embed chat here -->
		<?php	$slug = 'next';	$category = get_category_by_slug($slug);query_posts($query_string.'cat=-'.$category->cat_ID); ?>
		<?php if (have_posts()) :while (have_posts()) : the_post(); ?>
		<?php the_content(); ?>
		<?php endwhile; ?>
		<?php endif; ?> 
		</div>
		<?php get_sidebar(); ?>	
	</div>
<?php get_footer(); ?>