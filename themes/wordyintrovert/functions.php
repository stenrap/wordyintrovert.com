<?php
/**
 * Wordy Introvert Functions and Definitions
 */

add_theme_support('post-thumbnails');

add_action('wp_head', 'add_facebook_meta_tags');

function add_facebook_meta_tags() {
    if (is_single()) {
        global $post;
        $excerpt = $post->post_content;
        $excerpt = strip_shortcodes($excerpt);
        $excerpt = apply_filters('the_content', $excerpt);
        $excerpt = str_replace(']]>', ']]&gt;', $excerpt);
        $excerpt = strip_tags($excerpt);
        $excerpt_length = apply_filters('excerpt_length', 55);
        $words = preg_split("/[\n]+/", $excerpt, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
        if (count($words) > $excerpt_length) {
            array_pop($words);
            $excerpt = implode(' ', $words);
            $excerpt = $excerpt."...";
        }

        // WYLO:
        // See this ... http://wordpress.org/support/topic/getting-post-thumbnail-url
        // and this ... http://codex.wordpress.org/Function_Reference/wp_get_attachment_image_src
        // for more info about getting the thumbnail...then update index.php to check for video_thumbnail_url first
        // remember that you'll always need to set a thumbnail for the FB share dialog (even when you're setting a video as the post thumbnail)

        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post-thumbnail');
        $imageUrl = $thumb['0'];

        echo '<meta property="og:url" content="'.get_permalink().'" />';
        echo '<meta property="og:title" content="'.get_the_title().'" />';
        echo '<meta property="og:description" content="'.$excerpt.'" />';
        echo '<meta property="og:image" content="'.$imageUrl.'" />';
    }
}