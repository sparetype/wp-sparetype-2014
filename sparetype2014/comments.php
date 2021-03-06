<?php
/** The template for displaying comments and the comment form. */
?>

<div id="comments">
<?php if ( post_password_required() ) : ?>
<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.' ); ?></p>
</div><!-- #comments -->

<?php
/* Stop the rest of comments.php from being processed, but don't kill the script entirely -- we still have to fully load the template.*/
return;
endif;
?>

<?php comment_form(); ?>

<?php if ( have_comments() ) : ?>

<h2 id="comments-title">
<?php
printf( _n( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number() ),
number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
?>
</h2>

<ol class="commentlist">
<?php wp_list_comments(); /* Loop through and list the comments. */ ?>
</ol>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
<nav id="comment-nav-below">
<?php paginate_comments_links(); ?> 
</nav>
<?php endif; // check for comment navigation ?>

<?php
/* If there are no comments and comments are closed, let's leave a little note, shall we? But we don't want the note on pages or post types that do not support comments.
*/
elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
?>
<p class="nocomments"><?php _e( 'Comments are closed.' ); ?></p>
<?php endif; ?>


</div><!-- #comments -->