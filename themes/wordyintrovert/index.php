<?php

/**
 * The main template file
 *
 * @package Wordy
 * @subpackage Introvert
 * @since Wordy Introvert 1.0
 */

get_header(); ?>

    <div id="intro-strip">
        <div id="intro">
            <div id="intro-text">
                <span class="intro-the">THE</span> <span class="intro-wordy">WORDY</span><br/>
                <span class="intro-introvert">INTROVERT</span>
            </div>
            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/callout@2x.png" alt="Wordy Introvert Logo"><!-- Add some javascript to set this to the non-2x image... -->
        </div>
    </div>

    <div id="post-content">
        <div id="post-list">

<?php
    $post_count = 0;
    while (have_posts() && $post_count < 10) {
        the_post(); // Get the next post

        $post_thumbnail = get_the_post_thumbnail();
        $post_permalink = get_permalink();

        if (strlen($post_thumbnail) == 0) {
            $video_thumbnail_url = get_post_meta(get_the_ID(), 'video_thumbnail_url', true);
            if (strlen($video_thumbnail_url) > 0) {
                $post_thumbnail = '<iframe class="video-thumbnail" width="270" height="212" src="'.$video_thumbnail_url.'" frameborder="0"></iframe>';
            }
        } else {
            $post_thumbnail = '<a href="'.$post_permalink.'" title="'.get_the_title().'">'.$post_thumbnail.'</a>';
        }

        $post_month   = get_the_date('M');
        $post_date    = get_the_date('j');
        $post_year    = get_the_date('Y');
        $post_title   = get_the_title();
        $post_author  = get_the_author();
        $num_comments = get_comments_number() == 1 ? get_comments_number() . " Comment" : get_comments_number() . " Comments";
        $comments_url = get_comments_link();

        $post_tags    = get_the_tags();
        $tag_names    = "";

        foreach ($post_tags as $tag) {
            $tag_id   = $tag->term_id;
            $tag_link = get_tag_link($tag_id);
            if (strlen($tag_names) > 0) {
                $tag_names .= ", ";
            }
            $tag_names .= '<a href="'.$tag_link.'">'.$tag->name.'</a>';
        }

        if (strlen($tag_names) > 0) {
            $tag_names = '<i class="icon-hashtag"></i> ' . $tag_names;
        }

        $post_content = get_the_content();

echo <<<POST
            <div class="post-snippet">
                <div class="post-thumbnail">
                    $post_thumbnail
                </div>
                <div class="post-metadata">
                    <div class="post-date-box">
                        <div class="post-date-box-top">
                            $post_month $post_date
                        </div>
                        <div class="post-date-box-bottom">
                            $post_year
                        </div>
                    </div>
                    <div class="post-info">
                        <div class="post-title">
                            <a href="$post_permalink">$post_title</a>
                        </div>
                        <div class="post-stats">
                            <i class="icon-user"></i> $post_author &nbsp;&nbsp;&nbsp;
                            <i class="icon-discussion"></i> <a href="$comments_url">$num_comments</a> &nbsp;&nbsp;&nbsp;
                            $tag_names
                        </div>
                    </div>
                </div>
                <div class="post-teaser">
                    $post_content
                </div>
            </div>
POST;

        $post_count++;
    }
?>

        </div> <!-- #post-list -->
        <div id="post-sidebar">
            <div id="blog-design-ad">

            </div>
        </div>
    </div> <!-- #post-content -->


<?php
get_footer();