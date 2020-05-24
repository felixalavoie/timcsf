<?php

function tim_responsable_custom_post() {
    $labels = array(
        'name'          => _x( 'Responsables de la TIM', 'Post Type General Name'),
        'singular_name' => _x( 'Responsables', 'Post Type Singular Name'),
        'menu_name'     => __( 'Responsables 2020'),
        'all_items'     => __( 'Tous nos responsables'),
        'view_item'     => __( 'Voir nos responsables'),
        'add_new_item'  => __( 'Ajouter un nouveau responsable'),
        'add_new'       => __( 'Ajouter'),
        'edit_item'     => __( 'Editer un responsable'),
        'update_item'   => __( 'Modifier un responsable'),
        'search_item'   => __( 'Rechercher un responsable'),
        'not_found'     => __( 'Non trouvé'),
        'not_found_in_trash' => __( 'Non trouvé dans la corbeille')
    );

    $args = array(
        'label'         => __( 'Nos responsables'),
        'description'   => __( 'Tout sur nos responsables'),
        'labels'        => $labels,
        'supports'      => array( 'title', 'custom-fields'),
        'hierarchical'  => false,
        'public'        => true,
        'has_archive'   => true,
        'rewrite'       => array( 'slug' => 'responsables')
    );

    register_post_type('responsables', $args);
}

function tim_projet_custom_post() {
    $labels = array(
        'name'          => _x( 'Projets des étudiants de la TIM', 'Post Type General Name'),
        'singular_name' => _x( 'Projets', 'Post Type Singular Name'),
        'menu_name'     => __( 'Projets 2017-2020'),
        'all_items'     => __( 'Tous les projets'),
        'view_item'     => __( 'Voir nos projets'),
        'add_new_item'  => __( 'Ajouter un nouveau projet'),
        'add_new'       => __( 'Ajouter'),
        'edit_item'     => __( 'Editer un projet'),
        'update_item'   => __( 'Modifier un projet'),
        'search_item'   => __( 'Rechercher un projet'),
        'not_found'     => __( 'Non trouvé'),
        'not_found_in_trash' => __( 'Non trouvé dans la corbeille')
    );

    $args = array(
        'label'         => __( 'Nos projets'),
        'description'   => __( 'Tout sur nos projets'),
        'labels'        => $labels,
        'supports'      => array( 'title', 'custom-fields'),
        'hierarchical'  => false,
        'public'        => true,
        'has_archive'   => true,
        'rewrite'       => array( 'slug' => 'projets')
    );

    register_post_type('projets', $args);
}

function tim_diplome_custom_post() {
    $labels = array(
        'name'          => _x( 'Diplômés de la TIM', 'Post Type General Name'),
        'singular_name' => _x( 'Diplômés', 'Post Type Singular Name'),
        'menu_name'     => __( 'Diplômés 2020'),
        'all_items'     => __( 'Tous nos diplômés'),
        'view_item'     => __( 'Voir nos diplômés'),
        'add_new_item'  => __( 'Ajouter un nouveau diplômé'),
        'add_new'       => __( 'Ajouter'),
        'edit_item'     => __( 'Editer un diplômé'),
        'update_item'   => __( 'Modifier un diplômé'),
        'search_item'   => __( 'Rechercher un diplômé'),
        'not_found'     => __( 'Non trouvé'),
        'not_found_in_trash' => __( 'Non trouvé dans la corbeille')
    );

    $args = array(
        'label'         => __( 'Nos diplômés'),
        'description'   => __( 'Tout sur nos diplômés'),
        'labels'        => $labels,
        'supports'      => array( 'title', 'custom-fields'),
        'hierarchical'  => false,
        'public'        => true,
        'has_archive'   => true,
        'rewrite'       => array( 'slug' => 'diplomes')
    );

    register_post_type('diplomes', $args);
}

function tim_temoignage_custom_post() {
    $labels = array(
        'name'          => _x( 'Témoignage d\'anciens de la TIM', 'Post Type General Name'),
        'singular_name' => _x( 'Témoignages', 'Post Type Singular Name'),
        'menu_name'     => __( 'Témoignages'),
        'all_items'     => __( 'Tous nos témoignages'),
        'view_item'     => __( 'Voir nos témoignages'),
        'add_new_item'  => __( 'Ajouter un nouveau témoignages'),
        'add_new'       => __( 'Ajouter'),
        'edit_item'     => __( 'Editer un témoignages'),
        'update_item'   => __( 'Modifier un témoignages'),
        'search_item'   => __( 'Rechercher un témoignages'),
        'not_found'     => __( 'Non trouvé'),
        'not_found_in_trash' => __( 'Non trouvé dans la corbeille')
    );

    $args = array(
        'label'         => __( 'Les témoignages'),
        'description'   => __( 'Informations sur les témoignages'),
        'labels'        => $labels,
        'supports'      => array( 'title', 'custom-fields'),
        'hierarchical'  => false,
        'public'        => true,
        'has_archive'   => true,
        'rewrite'       => array( 'slug' => 'temoignages')
    );

    register_post_type('temoignages', $args);
}

add_action('init', 'tim_responsable_custom_post', 0);
add_action('init', 'tim_projet_custom_post', 0);
add_action('init', 'tim_diplome_custom_post', 0);
add_action('init', 'tim_temoignage_custom_post', 0);

remove_image_size('large');
remove_image_size('medium');
remove_image_size('thumbnail');
