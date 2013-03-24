<?php get_header(); ?>
	<!-- content -->
	<div id="main_wrap">
 		<?php	$slug = 'next';	$category = get_category_by_slug($slug);query_posts($query_string.'cat=-'.$category->cat_ID); ?>

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
			<?php wp_link_pages('before=<p>&after=</p>&next_or_number=number&pagelink=page %'); ?>
				<div id="pagination">
					<div class="prev_button"><p><?php next_posts_link('Older Shows') ?></p></div>
					<div class="next_button"><p><?php previous_posts_link('Newer Shows') ?></p></div>
				</div>		
		
		</div>
		<?php endif; ?>
		 
		<?php get_sidebar(); ?>
	</div>

<?php get_footer(); ?>