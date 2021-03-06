<?php

/** The blog page loop template file. */

get_header(); ?>

<div class="loop-content" role="main">

    
<?php if ( have_posts() ) : ?>

<?php /* Start the Loop */ ?>

<?php while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grid'); ?>>
    
	<header class="entry-meta">
<p class="date-posted"><?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?></p>
</header><!-- #entry-meta -->
	
	<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php if ( has_post_thumbnail() ) {the_post_thumbnail('excerpt-square');} ?></a>

	<section>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
    
	
	<?php the_excerpt(); ?>
    
    <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:' ) . '</span>', 'after' => '</div>' ) ); ?>

</section>

</article><!-- #post-<?php the_ID(); ?> -->

<?php endwhile; ?>


<?php endif; ?>



<?php comments_template(); ?>



</div><!-- #content -->



<div id="pagination" role="navigation">

<?php

global $wp_query;



$big = 999999999; // need an unlikely integer



echo paginate_links( array(

	'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),

	'format' => '?paged=%#%',

	'current' => max( 1, get_query_var('paged') ),

	'total' => $wp_query->max_num_pages,

	'prev_text'    => __('&#171;&#171; Newer Posts'),

	'next_text'    => __('Older Posts &#187;&#187;'),

) );

?>

</div> <!-- end #pagination -->


<?php get_footer(); ?>