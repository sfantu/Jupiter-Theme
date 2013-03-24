<?php /* Template name: live */ ?>
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
	<div id="main_wrap">	 
		<div id="main_content_full">
<!--			embed chat here -->
		<?php	$slug = 'next';	$category = get_category_by_slug($slug);query_posts($query_string.'cat=-'.$category->cat_ID); ?>
		<?php if (have_posts()) :while (have_posts()) : the_post(); ?>
		<?php the_content(); ?>
		<?php endwhile; ?>
		<?php endif; ?> 
		</div>
	</div>
<?php get_footer(); ?>