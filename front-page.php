<?php

/** The home page template file */

get_header(); ?>

<div class="homepage-content post-<?php the_ID(); ?>" role="main">

<?php if ( have_posts() ) : ?>

<?php /* Start the Loop */ ?>

<?php while ( have_posts() ) : the_post(); ?>
    
<?php the_content(); ?>
    
<?php endwhile; ?>

<?php endif; ?>

</div><!-- .homepage-content -->

<footer class="entry-meta">
</footer><!-- #entry-meta -->


<?php get_footer(); ?>