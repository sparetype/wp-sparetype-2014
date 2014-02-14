<?php

/** The home page template file */

get_header(); ?>

<div class="homepage-content post-<?php the_ID(); ?>" role="main">

<article><section><p>Hey there! My name is Griffin Shreves and you’ve just found my little corner of the Internet. I am a graphic designer and website developer with an unhealthy appetite for typography and messing around with code. You can find out more <a title="About The Tests" href="http://testing.sparetype.com/about/">about me and what makes me tick</a> or check out <a title="Blog" href="http://testing.sparetype.com/blog/">projects and thoughts on my blog.</a></p>
<h3>Finally, my ultimate goal - I want to hire you as a client. <a title="Now Hiring" href="http://testing.sparetype.com/now-hiring/">Let's team up.</a></h3></section></article>

<?php

$args = array(
		'posts_per_page' => 6,
		'tag' => 'frontpage'
	);

$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		echo '<article>' . get_the_post_thumbnail($page->ID, 'excerpt-square') . '<section><h2>' . '<a href="' . get_permalink() . '">' . get_the_title() . '</a>' . '</h2>' . get_the_excerpt() . '</section></article>';
	}
} else {
}

wp_reset_postdata(); ?>
	
</div><!-- .homepage-content -->

<footer class="entry-meta">
</footer><!-- #entry-meta -->


<?php get_footer(); ?>