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

        $post_thumbnail = "";
        $post_permalink = get_permalink();
        $video_thumbnail_url = get_post_meta(get_the_ID(), 'video_thumbnail_url', true);

        if (strlen($video_thumbnail_url) > 0) {
            $post_thumbnail = '<iframe class="video-thumbnail" width="270" height="212" src="'.$video_thumbnail_url.'" frameborder="0"></iframe>';
        } else {
            $post_thumbnail = get_the_post_thumbnail();
            if (!is_single()) {
                $post_thumbnail = '<a href="'.$post_permalink.'" title="'.get_the_title().'">'.$post_thumbnail.'</a>';
            }
        }

        $post_month   = get_the_date('M');
        $post_date    = get_the_date('j');
        $post_year    = get_the_date('Y');
        $post_title   = is_single() ? get_the_title() : "<a href='$post_permalink'>".get_the_title()."</a>";
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

        $snippet = get_the_excerpt().' ...<span class="post-read-more"><a href="'.get_permalink().'">Continue reading &nbsp;<i class="icon-arrow_big_right"></i></a></span>';
        $post_content = is_single() ? get_the_content() : $snippet;
        $post_snippet_margin_class = is_single() ? "post-snippet-single" : "post-snippet-home";

echo <<<POST
            <div class="post-snippet $post_snippet_margin_class">
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
                            $post_title<!--<a href="$post_permalink">$post_title</a>-->
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

        if (is_single()) {
            echo '<div id="facebook-share" data-url="'.$post_permalink.'"><span>Share on<br/>Facebook</span></div>';
            comments_template();
        }
    }
?>

        </div><div id="post-sidebar"> <!-- Make sure there's no space between #post-list and #post-sidebar -->

            <!--

                What are the purposes of the sidebar?

                    1. To attract and retain readers (e.g. social media links and email subscription)

                    2. To generate revenue (affiliate links, donations, ads)


                Ideas for Sidebar Content:

                    1 - Bluehost affiliate link

                    2 - MacBook affiliate link (Amazon)

                    3 - Email subscription form

                    4 - Social media links

                    5 - Third-party advertisements (e.g. Google AdSense)

                    6 - Recent posts

                    7 - Search form

            -->

            <div id="bluehost-affiliate">
                    <a href="http://www.bluehost.com/track/wordyintrovert/home-sidebar" target="_blank">
                        <span id="host-on">I proudly host this blog on:</span>
                        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/bluehost.png" />
                        <span id="bluehost-price">Professional web hosting for a mere $3.95/month</span>
                    </a>
            </div>
            <div id="amazon-macbook-affiliate">
                <a href="http://www.amazon.com/s/?_encoding=UTF8&camp=1789&creative=390957&field-keywords=macbook%20pro&linkCode=ur2&rh=n%3A541966%2Ck%3Amacbook%20pro&tag=wordyintrover-20&url=search-alias%3Dcomputers&linkId=MGIUOPQV3X5ZKV5S" target="_blank">
                    <span id="create-on">I built this blog on a Mac:</span>
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/images/macbook-pro@2x.jpg" />
                </a><img src="https://ir-na.amazon-adsystem.com/e/ir?t=wordyintrover-20&l=ur2&o=1" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />
            </div>
            <div id="donate-box">
                <p>
                    I absolutely love to write, and I work tirelessly to produce what I hope is engaging and thought-provoking content for this blog.
                    <br/><br/>
                    If you have been enriched by my efforts, please support my quest to make the Internet a better place.
                </p>
                <div id="donate-button">DONATE NOW <i class="icon-check_circle"></i></div>
            </div>
            <div id="subscribe-box">
                <span id="subscribe-span">SUBSCRIBE</span>
                <p>Would you like to be notified when this introvert has been wordy? You might consider subscribing to the loquacious newsletter:</p>
                <input type="email" id="newsletter-email-input" placeholder="Email address" />
                <div id="newsletter-submit"></div>
            </div>
            <div id="social-box">
                <div id="facebook-box">
                    <a href="https://www.facebook.com/WordyIntrovert" target="_blank">Like The<br/>Wordy Introvert</a>
                </div>
                <div id="twitter-box">
                    <a href="https://twitter.com/wordyintrovert" target="_blank">Follow The<br/>Wordy Introvert</a>
                </div>
            </div>

            <!-- TODO: Add the Google AdSense box... -->

        </div>
    </div> <!-- #post-content -->
    <script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-min.js"></script>
    <script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?php bloginfo('stylesheet_directory'); ?>/js/underscore-min.js"></script>
    <script src="<?php bloginfo('stylesheet_directory'); ?>/js/backbone-min.js"></script>
    <script src="<?php bloginfo('stylesheet_directory'); ?>/js/wordyintrovert.js"></script>
    <div id="subscribed-dialog">
        You have chosen...wisely.
    </div>
    <div id="donate-dialog">
        <script src='https://www.dntly.com/assets/js/v1/form.js' data-donately-id="1950" data-donately-amount="15" ></script>
        <input type="text" size="1" class="displayNone" autofocus />
    </div>

<?php

get_footer();