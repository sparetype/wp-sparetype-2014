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

<?php wp_enqueue_script( 'jpanelmenu', get_template_directory_uri().'/script/jquery.jpanelmenu.min.js', array('jquery'), '1.3.0', true ); ?>
<?php wp_enqueue_script( 'skrollr', get_template_directory_uri().'/script/skrollr.min.js', array(''), '0.6.17', true ); ?>


<?php wp_head(); ?>


</head>


<body <?php body_class('wrap wider'); ?>>


<?php wp_nav_menu( array('theme_location' => 'primary-navigation', 'container' => false, 'menu_id' => 'menu', 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>' )); ?>

<div data-0="transform:translate(0%,0%);" data-200="transform:translate(5%,5%);"><img src="<?php bloginfo('template_directory'); ?>/images/st_sparetype_logo.svg" /></div>
    
<div id="navigation" role="navigation">

<h1 id="title"><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/st_sparetype_logo.svg" /></a></h1>

<a href="#" class="menu-trigger">&#9776; menu</a>

<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">

<input class="textbox" value="Search" name="s" id="s" onfocus="if (this.value == 'Search') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search';}" type="text">

        <input type="submit" id="searchsubmit" value="&#128269;" />

</form>


<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-1') ) : ?>

<?php endif; ?>


</div> <!-- end #navigation -->