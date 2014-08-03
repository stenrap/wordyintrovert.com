<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package Wordy
 * @subpackage Introvert
 * @since Wordy Introvert 1.0
 */
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

        <ol class="comment-list">
            <?php
                wp_list_comments( array(
                    'style'      => 'div',
                    'short_ping' => true,
                    'avatar_size'=> 34,
                ) );
            ?>
        </ol><!-- .comment-list -->

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
            <h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'twentyfourteen' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentyfourteen' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentyfourteen' ) ); ?></div>
        </nav><!-- #comment-nav-below -->
        <?php endif; // Check for comment navigation. ?>

        <?php if ( ! comments_open() ) : ?>
        <p class="no-comments"><?php _e( 'Comments are closed.', 'twentyfourteen' ); ?></p>
        <?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php comment_form(
              array(
                  "cancel_reply_link" => 'Cancel <i class="icon-cancel_circle"></i>',
                  "comment_field" => '<textarea id="comment" name="comment" placeholder="*Comment" required="true"></textarea>',
                  "comment_notes_after" => "",
                  "comment_notes_before" => "",
                  "fields" => array(
                      'author' => '<input type="text" id="author" name="author" placeholder="*Name" value="'.esc_attr($commenter['comment_author']).'" required />',
                      'email'  => '<input type="email" id="email" name="email" placeholder="*Email address (never made public)" value="'.esc_attr($commenter['comment_author_email']).'" required />'
                  ),
                  "id_submit" => "submit-comment",
                  "label_submit" => "Submit Comment",
                  "logged_in_as" => "",
                  "title_reply" => "Leave a Comment",
                  "title_reply_to" => "Reply to %s"
              )
    ); ?>

</div><!-- #comments -->
