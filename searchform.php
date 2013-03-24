<form method="get" id="search-box" action="<?php echo home_url(); ?>/">
<input type="text" size="18" value="<?php the_search_query(); ?>" name="s" id="term" />
<img id="icon" src="<?php echo THEME_IMAGES ?>/search.svg?>" alt="search">
</form>