<?php

/** The static single page template file. */

get_header(); ?>

<div class="search-content" role="main">

<h1 class="search-title"><?php printf( __( 'Search Results for: %s' ), '<span class="query">' . get_search_query() . '</span>'); ?></h1>

<?php if ( have_posts() ) : ?>

<?php /* Start the Loop */ ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php if ( ( function_exists( 'get_post_format' ) && 'link' == get_post_format( $post->ID ) )  ) : ?>
 
    <article id="post-<?php the_ID(); ?>" <?php post_class('grid'); ?>>
	
	<section>
	<h2 class="entry-title"><a href="<?php echo get_the_excerpt(); ?>" title="<?php printf( esc_attr__( 'Link to %s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	
	<?php the_content(); ?>
	</section>
<footer class="entry-meta">
    
<p class="date-posted"><?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?> -- POST</p>

<?php $tags_list = get_the_tag_list( '', __( ', ' ) );

if ( $tags_list ): ?>

<p class="tag-links">

<?php printf( __( '<span class="%1$s">Tag :</span> %2$s' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>

</p>

<?php endif; // End if $tags_list ?>

</footer><!-- #entry-meta -->
	</article>
	
<?php else : ?>	

<article id="post-<?php the_ID(); ?>" <?php post_class('grid'); ?>>
	
	<section>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
    
	
	<?php the_excerpt(); ?>
    
    <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:' ) . '</span>', 'after' => '</div>' ) ); ?>
	
<footer class="entry-meta">
    
<p class="date-posted"><?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?> -- POST</p>

<?php $tags_list = get_the_tag_list( '', __( ', ' ) );

if ( $tags_list ): ?>

<p class="tag-links">

<?php printf( __( '<span class="%1$s">Tag :</span> %2$s' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>

</p>

<?php endif; // End if $tags_list ?>

</footer><!-- #entry-meta -->

</section>

</article><!-- #post-<?php the_ID(); ?> -->

<?php endif; ?>


<?php endwhile; ?>


<?php endif; ?>

</div><!-- #content -->

<?php get_footer(); ?>