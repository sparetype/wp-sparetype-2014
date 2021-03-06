<?php

/** The individual project page. */

get_header(); ?>

<div class="project-content" role="main">

    
<?php if ( have_posts() ) : ?>

<?php /* Start the Loop */ ?>

<?php while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<header class="entry-header">

<hgroup>

<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

</hgroup>

</header><!-- .entry-header -->


<div class="entry-content">

<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>' ) ); ?>

<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:' ) . '</span>', 'after' => '</div>' ) ); ?>

</div><!-- .entry-content -->


<footer class="entry-meta">
    
<p class="date-posted"><?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?></p>

<?php $categories_list = get_the_category_list( __( ', ' ) );

if ( $categories_list ): ?>

<p class="cat-links">

<?php printf( __( '<span class="%1$s">Category :</span> %2$s' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list ); ?>

</p>

<?php endif; // End if categories ?>


<?php $tags_list = get_the_tag_list( '', __( ', ' ) );

if ( $tags_list ): ?>

<p class="tag-links">

<?php printf( __( '<span class="%1$s">Tag :</span> %2$s' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>

</p>

<?php endif; // End if $tags_list ?>



</footer><!-- #entry-meta -->

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