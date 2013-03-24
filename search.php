<?php get_header(); ?>
	<!-- content -->
	<div id="main_wrap">
	
		<?php
		$slug = 'next';	$category = get_category_by_slug($slug);
		if(!$wp_query) global $wp_query;query_posts( array_merge( array( 'category__not_in' => array($category->cat_ID) ) , $wp_query->query ) );?>
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