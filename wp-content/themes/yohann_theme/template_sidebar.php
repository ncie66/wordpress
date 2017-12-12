<?php
/*
    Template Name: Sidebar
*/

get_header();

?>

<div id="template-left-container">

    <div id="sidebar">
        <?php dynamic_sidebar( "left" ); ?> 
    </div>

    <div id="sidebar2">
        <?php dynamic_sidebar( "right" ); ?> 
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