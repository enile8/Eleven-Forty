<?php

function elevenforty_wp_link() {
    return '<a class="wp-link" href="http://WordPress.org/" title="WordPress" rel="generator">WordPress</a>';
}
add_shortcode('wp-link', 'elevenforty_wp_link');		  
		  
function elevenforty_theme_link() {
    $themelink = '<a class="theme-link" href="http://enile8.github.com/elevenforty" title="Eleven Forty Theme Framework" rel="designer">Eleven Forty Theme Framework</a>';
    return apply_filters('elevenforty_theme_link',$themelink);
}
add_shortcode('theme-link', 'elevenforty_theme_link');	

function elevenforty_login_link() {
    if ( ! is_user_logged_in() )
        $link = '<a href="' . site_url('/wp-login.php') . '">' . __('Login','elevenforty') . '</a>';
    else
    $link = '<a href="' . wp_logout_url($redirect) . '">' . __('Logout','elevenforty') . '</a>';
    return apply_filters('loginout', $link);
}
add_shortcode('loginout-link', 'elevenforty_login_link');		  	  

function elevenforty_blog_title() {
	return '<span class="blog-title">' . get_bloginfo('name') . '</span>';
}
add_shortcode('blog-title', 'elevenforty_blog_title');

function elevenforty_blog_link() {
	return '<a href="' . site_url('/') . '" title="' . get_option('blogname') . '" >' . get_option('blogname') . "</a>";
}
add_shortcode('blog-link', 'elevenforty_blog_link');

function elevenforty_year() {   
    return '<span class="the-year">' . date('Y') . '</span>';
}
add_shortcode('the-year', 'elevenforty_year');

function elevenforty_copyright() {
    return '&copy;';
}
add_shortcode('copyright', 'elevenforty_copyright');


?>
