<?php
/*
    Template Name: Left Sidebar
*/

get_header();
get_custom_styles();
?>

<div id="template-left-container">

    <div id="sidebar">
        <?php dynamic_sidebar( "left_sidebar" ); ?> 
    </div>

    <div id="content">
        <?php

            while( have_posts()) {

                the_post();
                the_title("<h1>", "</h1>");
                the_content();

            }
        ?> 
    </div>
</div> 