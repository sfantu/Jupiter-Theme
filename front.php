	<?php query_posts('showposts=1'); ?>
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	<div id="middle_container">
		<article>
			<h2><a href="<?php the_permalink() ?>"> <?php the_title(); ?> </a></h2>
			<div id="latest_content">
				 <?php the_content(); ?>	
			</div>
			<?php the_post_thumbnail('latest-thumb'); ?>
		</article>
	</div>
	<?php endwhile; ?>
	<?php endif; ?>
	<div id="main_wrap">
		<?php query_posts('posts_per_page=4&offset=1'); ?>
		<?php if (have_posts()) : ?>
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
 		<?php query_posts('offset=5'); ?>
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
			<div class="post_navigation">
				<ul>
					<li class="prev_link"><?php previous_posts_link('Previous'); ?></li>			
					<li class="next_link"><?php next_posts_link('Next'); ?></li>
				</ul>
			</div>
		</div>
		<?php endif; ?>
		 
		<?php get_sidebar(); ?>
	</div>