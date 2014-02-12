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

<?php wp_enqueue_script( 'jpanelmenu', get_template_directory_uri().'/scripts/jquery.jpanelmenu.min.js', array('jquery'), '1.30', true ); ?>
    

<?php wp_head(); ?>


</head>
    
<body <?php body_class(''); ?>>

	<ul id="menu" class="menu">
		
<?php wp_nav_menu( array('theme_location' => 'primary-navigation', 'container' => false, 'menu_id' => '', 'items_wrap' => '%3$s' )); ?>
	
<li><form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">

<input class="textbox" value="Search" name="s" id="s" onfocus="if (this.value == 'Search') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search';}" type="text">

        <input type="submit" id="searchsubmit" value="&#128269;" />

</form></li>
	</ul>

<ul id="navigation" role="navigation">

<li><a href="#" class="menu-trigger">&#9776;</a></li>

<li><a href="<?php echo home_url(); ?>" class="home-logo"><img src="<?php bloginfo('template_directory'); ?>/images/st_sparetype_logo.svg" /></a></li>
	
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-1') ) : ?>

<?php endif; ?>


</ul> <!-- end #navigation -->