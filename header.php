<?php

/** Main header for all pages */

?>

<!doctype html>

<html <?php language_attributes(); ?>>

<head>


<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">


<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>


<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_enqueue_script( 'responsive-nav', get_template_directory_uri().'/scripts/responsive-nav.min.js', array(), '', false ); ?>

<?php wp_enqueue_script( 'fastclick', get_template_directory_uri().'/scripts/fastclick.js', array(), '', true ); ?>
	
<?php wp_enqueue_script( 'scroll', get_template_directory_uri().'/scripts/scroll.js', array(), '', true ); ?>
	
<?php wp_enqueue_script( 'fixed-responsive-nav', get_template_directory_uri().'/scripts/fixed-responsive-nav.js', array(), '', true ); ?>
	
<?php wp_head(); ?>

</head>
    
<body <?php body_class(''); ?>>


	<header id="site-navigation" class="site-navigation">
	<a href="<?php echo home_url(); ?>" class="home-logo"><img src="<?php bloginfo('template_directory'); ?>/images/st_sparetype_logo_white.svg" /></a>
		
	<nav class="nav-collapse">

	<ul>
		
<?php wp_nav_menu( array('theme_location' => 'primary-navigation', 'container' => false, 'menu_id' => '', 'items_wrap' => '%3$s' )); ?>
	
	</ul>
</nav>
	</header>
	
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-1') ) : ?>

<?php endif; ?>