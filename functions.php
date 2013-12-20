<?php
/** SpareType functions and definitions to set up the theme and provides some helper functions. */


/** Set maximum content width for embedded videos and other media */
if ( ! isset( $content_width ) ) $content_width = 655;


/** 
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @uses add_editor_style() To style the visual editor.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links, and Post Formats.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 */

function sparetype_setup() {

// This theme styles the visual editor with editor-style.css to match the theme style.
add_editor_style();

// Add default posts and comments RSS feed links to <head>.
add_theme_support( 'automatic-feed-links' );

// This theme uses Featured Images (also known as post thumbnails) for excerpts
add_theme_support( 'post-thumbnails' );

// Add custom image sizes for main excerpts maximum
add_image_size( 'excerpt-feature', 500, 300 ); // Used for featured posts if a large-feature doesn't exist

// This theme uses wp_nav_menu() in one location.
register_nav_menu( 'primary-navigation', 'Primary Navigation' );

// Add support for a variety of post formats
add_theme_support( 'post-formats', array( 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video', 'audio'));

// Add support for custom backgrounds
add_custom_background();

}

add_action( 'after_setup_theme', 'sparetype_setup' );



/** Register sidebar areas. */

function sparetype_sidebar_init() {

	register_sidebar( array(
		'name' => __( 'Main Sidebar' ),
		'id' => 'sidebar-1',
		'description' => __( 'This sidebar appears under the main navigation' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Floating Sidebar' ),
		'id' => 'sidebar-2',
		'description' => __( 'This sidebar floats in on larger screen sizes' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area One' ),
		'id' => 'sidebar-3',
		'description' => __( 'An optional widget area for your site footer' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area Two' ),
		'id' => 'sidebar-4',
		'description' => __( 'An optional widget area for your site footer' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}

add_action( 'widgets_init', 'sparetype_sidebar_init' );



// Register Custom Post Type
function sparetype_project_post_type() {
	$labels = array(
		'name'                => 'Projects',
		'singular_name'       => 'Project',
		'menu_name'           => 'Projects',
		'parent_item_colon'   => 'Parent Project:',
		'all_items'           => 'All Projects',
		'view_item'           => 'View Project',
		'add_new_item'        => 'Add New Project',
		'add_new'             => 'New Project',
		'edit_item'           => 'Edit Project',
		'update_item'         => 'Update Project',
		'search_items'        => 'Search projects',
		'not_found'           => 'No projects found',
		'not_found_in_trash'  => 'No projects found in Trash',
	);

	$rewrite = array(
		'slug'                => 'projects',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);

	$args = array(
		'label'               => 'sparetype_project',
		'description'         => 'Project Pages',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);

	register_post_type( 'sparetype_project', $args );
}

// Hook into the 'init' action
add_action( 'init', 'sparetype_project_post_type', 0 );




// Read more link for excerpts

function sparetype_excerpt_readmore( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">Read More &gt; &gt;</a>';
}
add_filter( 'excerpt_more', 'sparetype_excerpt_readmore' );




// Recent posts for the front page

function sparetype_recent_posts_shortcode( $atts ) {
	extract( shortcode_atts( array( 'limit' => 3 ), $atts ) );

	$q = new WP_Query( 'posts_per_page=' . $limit );

	$list = '<div class="grid frontpage-recent-posts"><h2 class="unit whole">Take a glance at my latest posts.</h2>';

	while ( $q->have_posts() ) {
		$q->the_post();
		$list .= '<div class="unit half">' . get_the_post_thumbnail() . '<h3>' . '<a href="' . get_permalink() . '">' . get_the_title() . '</a>' . '</h3>' . '<p>' . get_the_excerpt() . '</p>' . '</div>';
	}

	wp_reset_query();

	return $list . '</div>';
}

add_shortcode( 'frontpage-recent-posts', 'sparetype_recent_posts_shortcode' );





// Recent projects for the front page

function sparetype_recent_projects_shortcode( $atts ) {
	extract( shortcode_atts( array( 'limit' => 3 ), $atts ) );

	$q = new WP_Query( 'post_type=sparetype_project&posts_per_page=' . $limit );

	$list = '<div class="grid frontpage-recent-projects"><h2 class="unit whole">Here\'s some of my latest projects.</h2>';

	while ( $q->have_posts() ) {
		$q->the_post();
		$list .= '<div class="unit half">' . get_the_post_thumbnail() . '<h3>' . '<a href="' . get_permalink() . '">' . get_the_title() . '</a>' . '</h3>' . '<p>' . get_the_excerpt() . '</p>' . '</div>';
	}

	wp_reset_query();

	return $list . '</div>';
}

add_shortcode( 'frontpage-recent-projects', 'sparetype_recent_projects_shortcode' );





// Custom comment template

function sparetype_comment_template( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; ?>
	
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment-body clearfix">
            
            <div class="author-avatar">
               	<?php
					$avatar_size = 96;
					if ( '0' != $comment->comment_parent )
				    	$avatar_size = 96;
				echo get_avatar( $comment, $avatar_size ); ?>
            </div>
            
            <div class="comment-block">
                
            <p class="comment-meta">
                <?php printf(__('%s commented on'), get_comment_author_link()) ?>
                <a class="comment-permalink" href="<?php echo htmlspecialchars ( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()) ?></a>
            </p>
            

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'sparetype' ); ?></em>
					<br />
				<?php endif; ?>

			<p class="comment-content"><?php comment_text(); ?></p>
            
			<div class="reply comment-meta">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'sparetype' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                <?php edit_comment_link( __( 'Edit', 'sparetype' ), '<span class="edit-link">', '</span>' ); ?>
			</div><!-- .reply -->
            </div>
		</article><!-- #comment-## -->

<?php }
            
        
        
// Custom facebook like template

function sparetype_facebook_like_template( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; ?>
	
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment-body clearfix">
            
            <div class="author-avatar">
               	<?php
					$avatar_size = 96;
					if ( '0' != $comment->comment_parent )
				    	$avatar_size = 96;
				echo get_avatar( $comment, $avatar_size ); ?>
            </div>
            
            <div class="comment-block">
                
            <p class="comment-meta">
                <a class="comment-permalink" href="<?php echo htmlspecialchars ( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()) ?></a>
            </p>
            

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'sparetype' ); ?></em>
					<br />
				<?php endif; ?>

			<p class="comment-content"><?php comment_text(); ?></p>
            
            </div>
		</article><!-- #comment-## -->

<?php }
            
?>