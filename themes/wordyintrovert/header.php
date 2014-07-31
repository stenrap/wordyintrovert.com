<?php

/**
 * The header for the wordyintrovert.com theme
 *
 * Displays the <head> element and everything up to <div id="main">
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" sizes="16x16 32x32" type="image/vnd.microsoft.icon">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1" />
    <title><?php if (is_home() || is_front_page()) echo get_bloginfo('name'); else wp_title( '|', true, 'right' ); ?></title>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-ui/jquery-ui.min.css" type="text/css" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/iconset.css" type="text/css" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <div id="logo">
            <a href="/" title="The Wordy Introvert">
                <div id="logo-text">
                    <span class="logo-the">THE</span> <span class="logo-wordy">WORDY</span><br/>
                    <span class="logo-introvert">INTROVERT</span>
                </div>
                <img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-callout@2x.png" alt="Wordy Introvert Logo"> <!-- Leave this image @2x -->
            </a>
        </div>
        <nav>
            <div id="menu-button">
<!--                <span>MENU</span>-->
                <div id="bars">
                    <div id="bar1" class="menu-bar"></div>
                    <div id="bar2" class="menu-bar"></div>
                    <div id="bar3" class="menu-bar"></div>
                </div>
            </div>
            <!-- -->
            <div id="menu-items" class="displayNone">
                <ul>
                    <li><a href="/" class="selected">HOME</a></li>
                    <li><a href="/about">ABOUT</a></li>
                    <li><a href="/resources">RESOURCES</a></li>
                    <li><a href="/donate">DONATE</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <div id="content">