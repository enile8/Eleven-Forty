<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package elevenforty
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'elevenforty' ), max( $paged, $page ) );

	?></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="profile" href="http://gmpg.org/xfn/11" />

	<!-- 1140px Grid styles for IE -->
	<!--[if lte IE 9]><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/1140/ie.css" type="text/css" media="screen" /><![endif]-->
<?php
	$shortname =  get_option('of_shortname');
	$layout = get_option($shortname .'_layout');
	if ($layout == '' or $layout == 'layout-2r') { ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/1140/1140.css" type="text/css" media="screen" />
	<?php } elseif ($layout == 'layout-2l') { ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/1140/1140-r.css" type="text/css" media="screen" />
	<?php } ?>
	
	<!--css3-mediaqueries-js - http://code.google.com/p/css3-mediaqueries-js/ - Enables media queries in some unsupported browsers-->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/css3-mediaqueries.js"></script>

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
	<div class="container">
		<header id="header"><div class="row">
			<div id="masthead">
				<div id="branding" role="banner">
            
					<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
                
					<<?php echo $heading_tag; ?> id="site-title" class="<?php echo get_option('of_site_title_class'); ?>">
						<span>
							<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                        	<?php if ( $logo = get_option('of_logo') ) { ?>
								<img src="<?php echo $logo; ?>" alt="<?php bloginfo( 'name' ); ?>" />
							<?php } else {
								bloginfo( 'name' );
							} ?>
                       	 </a>
						</span>
					</<?php echo $heading_tag; ?>>
					<div id="site-description" class="<?php echo get_option('of_site_description_class'); ?>"><?php bloginfo( 'description' ); ?></div>
					<div id="header-image">
					<?php
					// Check if this is a post or page, if it has a thumbnail, and if it's a big one
					if ( is_singular() && current_theme_supports( 'post-thumbnails' ) &&
							has_post_thumbnail( $post->ID ) &&
							( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
							$image[1] >= HEADER_IMAGE_WIDTH ) :
						// Houston, we have a new header image!
						echo get_the_post_thumbnail( $post->ID );
					elseif ( get_header_image() ) : ?>
						<img src="<?php header_image(); ?>" alt="" />
					<?php endif; ?>
					</div><!-- #header-image -->
				</div><!-- #branding -->
	</div><!-- .container -->
		</div><!-- .row -->
	<div class="container">
		<div class="row">
				<nav id="access" role="navigation">
				  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
					<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'elevenforty' ); ?>"><?php _e( 'Skip to content', 'elevenforty' ); ?></a></div>
					<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
					<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary', 'fallback_cb' => 'false' ) ); ?>
				</nav><!-- #access -->
			</div><!-- #masthead -->
		</header><!-- #header -->
		</div><!-- .row -->
	</div><!-- .container -->
	
		<div id="above-content-widgets" class="row">
			<?php 
			//get the widget areas above the content if enabled
			get_sidebar( 'abovecontent' ); ?>
		</div><!-- #above-content-widgets -->
	<div id="main" class="row">

		<?php if ( function_exists('yoast_breadcrumb') ) {
			if( get_option('of_breadcrumb_home') == 'no'){ 
				if (is_home()) { 
					//if option is set to disallow display of breadcrumbs on homepage don't display
				}
				else {
					//else if not homepage display
					yoast_breadcrumb('<div id="breadcrumbs" class="row twelvecol">','</div>');
				}
			} 
			elseif( get_option('of_breadcrumb_home') == 'yes') {
				//if yoast breadcrumbs enabled display them everywhere!
				yoast_breadcrumb('<div id="breadcrumbs" class="row twelvecol">','</div>');
			}
		} ?>
