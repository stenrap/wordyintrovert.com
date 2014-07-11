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

<?php
get_footer();