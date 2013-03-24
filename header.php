
<!doctype html>  
<html <?php language_attributes(); ?>>
<head>

	<!-- titles -->	
	<title>
	<?php if ( is_home() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php bloginfo('description'); ?><?php } ?>
	<?php if ( is_single() ) { ?><?php wp_title(''); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
	<?php if ( is_category() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Archive&nbsp;|&nbsp;<?php single_cat_title(); ?><?php } ?>
	<?php if ( is_search() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Search Results<?php } ?>
	<?php if ( is_page() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php wp_title(''); ?><?php } ?>	
	</title>
	
	<!-- meta tags -->
	
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<?php if (is_single() || is_page() ) : if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<meta name="description" content="<?php the_excerpt_rss(); ?>" />
	<?php endwhile; endif; elseif(is_home()) : ?>
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	<?php endif; ?>
	<!-- the stylesheet -->
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo THEME_URI; ?>/style.css" />
	
	<!-- pingback -->
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<!-- rss -->
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	
	<!-- favicon -->
	<link rel="shortcut icon" href="<?php echo THEME_IMAGES ?>/favicon.ico" type="image/x-icon" />
	
	<!-- video scripts -->
	
	<?php if ( is_single() && !is_page() ) {?>
	
	 		<link href="http://vjs.zencdn.net/c/video-js.css" rel="stylesheet">
		
			<script src="http://vjs.zencdn.net/c/video.js"></script>
	
	<?php }?>	
	

	
	<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	wp_head();
	?>
</head>


<body <?php body_class(); ?>>

	<div id="header_wrapper">
		<header id="header">
			<a href="<?php echo home_url();?>"><img id="logo" src="<?php echo THEME_IMAGES ?>/logo.svg?>"  alt="jupiter broadcasting , independent entertainment on demand"></a>
			<div id="blog_info">				
				<h1><?php bloginfo('name'); ?></h1>
				<h3><?php bloginfo('description'); ?></h3>
			</div>	
			<div id="action">
				<a href="<?php echo(get_page_link(get_page_by_title('support')->ID)) ?>" class="a-btn">
    				<span class="a-btn-text">Support</span>
    				<span class="a-btn-slide-text">The Network</span>
				</a>
			</div>
			<ul class="social_links">
				<li>
					<a class="ytub" href="https://www.youtube.com/user/jupiterbroadcasting"></a>				
				</li>
				<li>
					<a class="itunes" href="http://ax.search.itunes.apple.com/WebObjects/MZSearch.woa/wa/search?entity=podcast&media=all&page=1&restrict=true&startIndex=0&term=Jupiter+Broadcasting"></a>				
				</li>
				<li>
					<a class="fbook" href="https://www.facebook.com/jupiterbroadcasting"></a>				
				</li>
				<li>
					<a class="gplus" href="https://plus.google.com/+JupiterBroadcasting/posts"></a>				
				</li>			
			</ul>			
		</header>
			<nav class="header_menu" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
					<ul class="dropdown">

						<?php
						$slug = 'next';
						$category = get_category_by_slug($slug);
						wp_list_categories('exclude='.$category->cat_ID.'&title_li='.'<a>'. ('Shows'). '</a>'); ?>
						
	        		</ul>
					
						<?php include get_template_directory()  . '/searchform.php'; ?>

					<script type="text/javascript" >
						init();
							
							function init() {
							  document.getElementById('search-box').addEventListener('mouseover', handleMouseOver);
							  document.getElementById('term').addEventListener('keyup', handleTermKeyUp);
							}
							
							function handleMouseOver() {
							  this.children[0].focus();
							}
							
							function handleTermKeyUp() {
							  if (this.value !== '')
							    this.className = 'stay';
							  else
							    this.className = '';
							}
					</script>
			</nav>
	</div>


<?php
	if ( !is_single() && !is_page('live') && !is_search() )
		get_template_part('next');
	?>