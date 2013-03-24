<?php get_header(); ?>
	<div id="top_wrap">
		<div id="top_container">
			<video id="my_video_1" class="video-js vjs-default-skin" controls width="100%" height="545" poster="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" data-setup="{}">
  				<source src="<?php echo video_2(get_the_ID()); ?>" type="video/mp4">
  				<source src="<?php echo video_8(get_the_ID()); ?>" type="video/webm">
 				Your browser does not support the video tag.
			</video>
			
		</div>
	</div>
	<!-- content -->
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	<div id="main_wrap">	 
		<div id="main_content">
			<h2><?php the_title(); ?></h2>
			<?php the_content(); ?>
		</div>
	<?php endwhile; ?>
	<?php endif; ?>
		<?php get_sidebar(); ?>	
	</div>
	<div class="comments-template">
		<?php comments_template(); ?>
	</div>
<?php get_footer(); ?>
