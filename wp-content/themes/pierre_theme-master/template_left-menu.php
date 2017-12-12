<?php
/*
    Template Name: Left Menu
*/

get_header();
?>

<div id="template-menu-container">

    <div class="menu">
        <!-- Afficher le menu 
        <?php dynamic_sidebar( "left_sidebar" ); ?> 
    </div>

    <div class="content">
        <?php while( have_posts()) {

            the_post();
            the_title("<h1>", "</h1>");
            the_content();

        }
        ?> 
    </div>
</div> 