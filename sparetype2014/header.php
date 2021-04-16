<?php

/** Main header for all pages */

?>

<!doctype html>

<html <?php language_attributes(); ?>>

<head>


<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/apple-touch-icon-152x152.png">
<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/favicon-196x196.png" sizes="196x196">
<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/favicon-160x160.png" sizes="160x160">
<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/favicon-16x16.png" sizes="16x16">
<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon/favicon-32x32.png" sizes="32x32">
<meta name="msapplication-TileColor" content="#fec34d">
<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri(); ?>/favicon/mstile-144x144.png">


<title><?php wp_title('&laquo;', true, 'right'); ?></title>


<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_enqueue_script( 'production', get_template_directory_uri().'/scripts/production.min.js', array(), '', true ); ?>
	
<?php wp_head(); ?>

</head>
    
<body <?php body_class(''); ?>>


	<header id="site-navigation" class="site-navigation">
	<a href="<?php echo home_url(); ?>" class="home-logo">SpareType</a>
		
	<nav class="nav-collapse">

	<ul>
		
<?php wp_nav_menu( array('theme_location' => 'primary-navigation', 'container' => false, 'menu_id' => '', 'items_wrap' => '%3$s' )); ?>
	
	</ul>
</nav>
	</header>