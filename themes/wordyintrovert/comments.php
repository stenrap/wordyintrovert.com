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
            $first = true;
            foreach (get_comments(array("order" => "ASC")) as $comment) {
                $emailHash = md5(strtolower(trim($comment->comment_author_email)));
                $comment_class = strcmp("1", $comment->comment_parent) == 0 ? "child-comment" : "parent-comment";
                $comment_date = date("M j, Y \\a\\t g:i a", strtotime($comment->comment_date));
                $container_class = $first ? "first-comment-container" : "comment-container";

echo <<<COMMENT
    <div class="$container_class">
        <div class="$comment_class">
            <img class="comment-avatar" src="http://www.gravatar.com/avatar/$emailHash?s=128&d=mm" />
            <span class="comment-author">$comment->comment_author</span><br/>
            <span class="comment-date">$comment_date</span>
            <div class="comment-text">
                $comment->comment_content
            </div>
        </div>
    </div>
COMMENT;
                // WYLO ... This is what the reply link looks like: http://www.wordyintrovert.com/hello-world/?replytocom=1#respond
                $first = false;
            }
        }

	    comment_form(
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
        );
    ?>

</div><!-- #comments -->
