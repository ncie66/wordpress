<?php 
/*
    Le fichier de template de mes categories 
*/

get_header();
?> 

<div class="colonne">

<div class='cat-articles'> 

    <h1 class='cat-title'> <?php single_cat_title(); ?> </h1>

    <?php 
        if( have_posts() ){

            while( have_posts() ){

                the_post();

                the_title("<h2 class='cat-article-title'>", "</h2>");

                get_template_part("template-parts/article");

            }   

        }
    ?>
</div>



<?php 

    while( have_posts() ){ 
    
?>
    
<div class="article">

    <?php
        the_post();
        $permalink = get_the_permalink();

        ?> <a href="<?= $permalink ?>"> <?php the_title(); ?> </a> <?php
        the_content();
    ?>

</div>

<?php 

} 

get_sidebar();
get_footer();
?>

</div>
