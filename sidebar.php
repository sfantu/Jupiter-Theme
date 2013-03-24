<div id="sidebar">
	<?php if (is_single()): ?>
		<div id="downloads">		
			<h2>Direct Downloads</h2>
				<ul>
				<?php if ( get_post_meta($post->ID, 'video_url_1', true)): ?>
					<li>				
						<a href="<?php echo video_1(get_the_ID()); ?>" >HD</a>				
					</li>
				<?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'video_url_2', true)): ?>
					<li>				
						<a href="<?php echo video_2(get_the_ID()); ?>" >Mobile Video</a>				
					</li>
				<?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'video_url_3', true)): ?>
					<li>				
						<a href="<?php echo video_3(get_the_ID()); ?>" >Ogg Video</a>				
					</li>
				<?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'video_url_4', true)): ?>
					<li>				
						<a href="<?php echo video_4(get_the_ID()); ?>" >Mp3 Audio</a>				
					</li>
				<?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'video_url_5', true)): ?>
					<li>				
						<a href="<?php echo video_5(get_the_ID()); ?>" >Ogg Audio</a>				
					</li>
				<?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'video_url_6', true)): ?>
					<li>				
						<a href="<?php echo video_6(get_the_ID()); ?>" >Torrent</a>				
					</li>
				<?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'video_url_7', true)): ?>
					<li>				
						<a href="<?php echo video_7(get_the_ID()); ?>" >YouTube</a>				
					</li>
				<?php endif; ?>
				</ul>
		</div>
	<?php endif; ?>	
	<?php if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>

			<?php dynamic_sidebar( 'primary-widget-area' ); ?>

	<?php else : ?>

		<!-- This content shows up if there are no widgets defined in the backend. -->
		<div class="alert help">
			<p><?php _e('Please activate some Widgets.','jupiter');  ?></p>
		</div>
	<?php endif; ?>

</div>