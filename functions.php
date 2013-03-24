<?php

// functions
    
// define theme constants    
    define( 'HOME_URI', home_url() );
    define( 'THEME_URI', get_stylesheet_directory_uri() );
    define( 'THEME_IMAGES', THEME_URI . '/images' );
    define( 'THEME_JS', THEME_URI . '/js' );
    define( 'THEME_css', THEME_URI . '/css' );

// post thumbnail support
	if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );
// thumbnail sizes
	if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'latest-thumb', 520, 314, true );
	add_image_size( 'quarter-thumb', 220, 132, true );
	add_image_size( 'next-thumb', 579, 160, true );
}

// register menus
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu', 'jupiter' ),
      'footer-menu' => __( 'Footer Menu', 'jupiter' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

// register sidebar

function jupiter_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Primary Widget Area','jupiter'),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'jupiter' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'jupiter_widgets_init' );


function custom_wp_trim_excerpt($text) {
$raw_excerpt = $text;
if ( '' == $text ) {
    //Retrieve the post content.
    $text = get_the_content('');
 
    //Delete all shortcode tags from the content.
    $text = strip_shortcodes( $text );
 
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
     
    $allowed_tags = '<p>,<strong>'; /*** MODIFY THIS. Add the allowed HTML tags separated by a comma.***/
    $text = strip_tags($text, $allowed_tags);
     
    $excerpt_word_count = 100; /*** MODIFY THIS. change the excerpt word count to any integer you like.***/
    $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count);
     
    $excerpt_end = '[...]'; /*** MODIFY THIS. change the excerpt endind to something else.***/
    $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);
     
    $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
    if ( count($words) > $excerpt_length ) {
        array_pop($words);
        $text = implode(' ', $words);
        $text = $text . $excerpt_more;
    } else {
        $text = implode(' ', $words);
    }
}
return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'custom_wp_trim_excerpt');
	
include("meta-boxes/video-meta.php");

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 1);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}

function dropdown_script()  
{  

    wp_register_script( 'dropdown-script', get_template_directory_uri() . '/js/jquery.dropdownPlain.js' );  
  
    // For either a plugin or a theme, you can then enqueue the script:  
    wp_enqueue_script( 'dropdown-script' );  
}  
add_action( 'wp_enqueue_scripts', 'dropdown_script' );

function counter_script()  
{  

    wp_register_script( 'counter-script', get_template_directory_uri() . '/js/jquery.countdown.js' );  
  
    // For either a plugin or a theme, you can then enqueue the script:  
    wp_enqueue_script( 'counter-script' );  
}  
add_action( 'wp_enqueue_scripts', 'counter_script' );


function SearchFilter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}

add_filter('pre_get_posts','SearchFilter');

?>