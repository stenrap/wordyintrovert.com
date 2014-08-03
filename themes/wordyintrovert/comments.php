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

	<?php
        if (have_comments()) {
            foreach (get_comments() as $comment) {
                echo "Avatar:".get_avatar($comment, 32)."<br/>";
                echo "Author:".$comment->comment_author."<br/>";
                echo "Time:".$comment->comment_date."<br/>";
                echo "Comment:".$comment->comment_content."<br/>";
                echo "Depth:".$comment->comment_parent."<br/>";
                echo "Reply:".get_comment_link($comment)."<br/>";
            }
        }
	?>

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
