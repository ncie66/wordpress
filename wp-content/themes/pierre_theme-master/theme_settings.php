<?php
/** Dev **/
function dd( $target ){
    echo "<pre>";
    var_dump( $target );
    echo "</pre>";
    die();
}

/** Themes  **/

// On va déclencher une action au moment ou le menu admin se charge
add_action("admin_menu", "generate_theme_menu");
add_action("admin_init", "add_option_home_category");

add_action("admin_enqueue_scripts", "load_scripts");
function load_scripts(){
    wp_enqueue_script( "jscolor", get_template_directory_uri()."/js/jscolor.min.js" );
}


function add_option_home_category(){

    // On créer une option dans la bdd pour le choix de la categorie
    add_option("home_category", "");

    add_option("custom_color",[]);

}
function generate_theme_menu(){
    add_menu_page(
        "Pierre Theme",
        "Pierre Theme",
        "administrator",
        "pierre_theme_menu", // Slug : un nom tout accroché sans charactere special en minuscule
        "generate_theme_menu_page", // Fonction appelé pour afficher la page
        "dashicons-welcome-widgets-menus",
        60
    );
}

function generate_theme_menu_page(){

    if( isset( $_POST["home_category"] ) ){
        update_option( "home_category", $_POST["home_category"] );
    }

    if( isset( $_POST["color_h"] )
    && isset( $_POST["color_c"] )
    && isset( $_POST["color_f"] )
    ){
        $colors = [
            "headers" => $_POST["color_h"],
            "body" => $_POST["color_c"],
            "background" => $_POST["color_f"]
        ];

        update_option("custom_colors", $colors );
    }

    $option_val = get_option("home_category");
    $colors_val = [
        "headers" => [],
        "body" => "",
        "background" => ""
    ];
    if( get_option("custom_colors")) {
        $colors_val = get_option("custom_colors");
    }

    $categories = get_categories();

    ?> 

    <h1> Administration de Pierre Theme </h1>

    <h2> Page d'accueil </h2> 

    <form method="post">

        <label>

            <span> Choix de la catégorie a afficher: </span>
            <select name="home_category">

                <?php foreach( $categories as $category ){ ?> 
                        
                    <option value="<?= $category->cat_ID ?>" <?php isSelected($category->cat_ID) ?> > 

                        <?= $category->name ?> 

                    </option>

                <?php } ?>

            </select>

        </label>




        <?php for( $i=0; $i< 6; $i++){ ?>
            <label> 
                <span>Couleur h<?= $i+1 ?> </span>
                <input class="jscolor" type="text" name="color_h[]" value="<?= $colors_val["headers"][$i] ?>" />
            </label><br>
            
        <?php } ?>

        <label> 
            <span>Couleur corps </span>
            <input class="jscolor" type="text" name="color_c" value="<?= $colors_val["body"] ?>" />
        </label>

        <label> 
            <span>Couleur fond</span>
            <input class="jscolor" type="text" name="color_f" value="<?= $colors_val["background"] ?>" />
        </label>
        <input type="submit" value="valider"> 
    </form>
    

    <?php 
}





function isSelected( $value ){
    if( $value == get_option("home_category") ){
        echo "selected";
    }
}