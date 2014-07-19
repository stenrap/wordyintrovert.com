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
            $tag_names = '<span class="post-tags"><i class="icon-hashtag"></i> '.$tag_names.'</span>';
        }

        $post_content = get_the_excerpt().' ...<span class="post-read-more"><a href="'.get_permalink().'">Continue reading &nbsp;<i class="icon-arrow_big_right"></i></a></span>';

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

        </div><div id="post-sidebar"> <!--  -->

            <!--

                WYLO - In order to accomodate ads that are 300px wide:

                    1. Change your design so the thumbnail is always on top (and decrease the height of the thumbnail).

                    2. Start showing ads at 768px:

                             430    300
                          13     12     13


                What are the purposes of the sidebar?

                    1. To attract and retain readers (e.g. social media links and email subscription)

                    2. To generate revenue (affiliate links, donations, ads)


                Ideas for Sidebar Content:

                    1 - "Powered By" (affiliate links) using beautiful graphics that don't looks like ads!

                    2 - A donation appeal (recurring donations see no ads?)

                    3 - Third-party advertisements (e.g. Google AdSense)

                    4 - Social media links

                    5 - Email subscription form (subscribe to be notified of posts)

                    6 - Recent posts

                    7 - Search form

            -->

            <div id="blog-design-ad">

            </div>
            <div id="blog-donate-ad">

            </div>
        </div>
    </div> <!-- #post-content -->


<?php
get_footer();