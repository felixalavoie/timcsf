<?php
/*
* Template name: Accueil
*
*/
?>
<?php get_header(); ?>
<?php
$part1 = get_field("accueil_1_etudiant_un_jour");

$part2_etudiant = get_field("accueil_2_etudiant");
$part2_employeur = get_field("accueil_2_employeur");

$part3 = get_field("accueil_3_projets");

$part4_questions = get_field("accueil_4_questions");
$part4_inscription = get_field("accueil_4_inscription");
$part4_profil = get_field("accueil_4_profil");

$part5 = get_field("accueil_5_temoignages");

$temoignages = get_posts(array(
    'numberposts' => -1,
    'post_type' => 'temoignages',
    'post_status' => 'publish',
    'orderby' => 'rand',
));

$projets = get_posts(array(
    'numberposts' => 12,
    'post_type' => 'projets',
    'post_status' => 'publish',
    'meta_key' => 'est_expose_galerie',
    'meta_value' => '1',
    'meta_compare' => '=',
    'orderby' => 'rand'
));
?>


<main id="main" class="accueil conteneur">
    <img class="bg" src="<?php bloginfo('template_url'); ?>/images/bg_code.png" alt="image d'arrière plan montrant du code">
    <div class="partie partie__1">
        <img class="partie__1--item" src="<?php bloginfo('template_url'); ?>/images/icons/logo_cegep_white.svg" alt="logo du Cégep de Sainte-Foy">
        <div class="etuUnJour partie__1--item">
            <h2 class="h2 etuUnJour__titre"><?= $part1["titre"] ?></h2>
            <p class="etuUnJour__texte">
                <?= $part1["texte"] ?>
            </p>
            <p class="etuUnJour__contact">
                <?= $part1["contact"] ?>
            </p>
            <a href="<?= add_query_arg('destinataire', '4', get_page_link(168))?>" class="etuUnJour__lien lien__bouton bouton__full">Contacter</a>
        </div>
    </div>

    <span class="decoration blurred__title blurred__title--2">Étudiants</span>
    <div class="partie partie__2">
        <img src="<?php bloginfo('template_url'); ?>/images/svg/partie2__ligne.svg" alt="svg décoratif" class="ligne partie__2--ligne">

        <div class="etudiants">
            <h2 class="h2 etudiants__titre"><?= $part2_etudiant["titre"] ?></h2>
            <img src="<?= get_field("image_etudiants") ?>" alt="Image d'étudiants" class="imgCohorte">
            <p class="etudiants__texte">
                <?= $part2_etudiant["texte"] ?>
            </p>
            <a href="<?= get_field("lien_etu_un_jour") ?>" class="etudiants__liens--etuUnJour lien" target="_blank">Étudiant d'un jour</a>
            <a href="<?= get_field("lien_inscription") ?>" class="etudiants__liens--inscription lien__bouton bouton__full" target="_blank">Inscription</a>
        </div>

        <div class="employeurs">
            <img src="<?php bloginfo('template_url'); ?>/images/svg/icon_employeur.svg" alt="" class="employeurs__image">
            <h2 class="employeurs__titre h2"><?= $part2_employeur["titre"] ?></h2>
            <div class="employeurs__diplomes">
                <p class="employeurs__diplomes--texte">
                    <?= $part2_employeur["texte_diplomes"] ?>
                </p>
                <a href="<?= get_page_link(164)?>" class="employeurs__diplomes--lien lien_corail lien">Diplômés</a>
            </div>
            <div class="employeurs__stages">
                <p class="employeurs__stages--texte">
                    <?= $part2_employeur["texte_stages"] ?>
                </p>
                <a href="<?= get_page_link(166)?>" class="employeurs__stages--lien lien_corail lien">Stages</a>
            </div>
        </div>
    </div>

    <span class="decoration blurred__title blurred__title--3">Projets</span>
    <div class="partie partie__3">

        <h2 class="projets__titre h2"><?= $part3["titre"] ?></h2>
        <div class="projets__gallerie">
            <?php foreach ($projets as $projet) {?>
            <img src="<?= get_field("image_carre", $projet->ID) ?>" alt="image d'un projet" class="projets__gallerie--item">
            <?php } ?>
        </div>
    </div>

    <span class="decoration blurred__title blurred__title--4">Inscription</span>
    <div class="partie partie__4">
        <img src="<?php bloginfo('template_url'); ?>/images/svg/partie3__ligne.svg" alt="svg décoratif" class="ligne partie__3--ligne">

        <div class="item inscriptions">
            <h2 class="inscriptions__titre h2"><?= $part4_inscription["titre"] ?></h2>
            <p class="inscriptions__texte--quand"><?= $part4_inscription["texte_quand"] ?></p>
            <p class="inscriptions__texte--ou"><?= $part4_inscription["texte_ou"] ?></p>
            <a href="<?= get_field("lien_inscription") ?>" class="inscriptions__lien lien__bouton bouton__full" target="_blank">S'inscrire</a>
        </div>

        <div class="item questions">
            <h2 class="questions__titre h2"><?= $part4_questions["titre"] ?></h2>
            <p class="questions__texte"><?= $part4_questions["texte"] ?></p>
            <p class="questions__contact"><?= $part4_questions["contact"] ?></p>
            <a href="<?= add_query_arg('destinataire', '1', get_page_link(168))?>" class="questions__lien lien__bouton bouton__full">Contacter</a>
        </div>

        <div class="item quiz">
            <h2 class="quiz__titre h2"><?= $part4_profil["titre"] ?></h2>
            <p class="quiz__texte"><?= $part4_profil["texte"] ?></p>
            <a href="<?= get_field("lien_quiz") ?>" class="quiz__lien lien__bouton lien" target="_blank">Faire le quiz</a>
        </div>
    </div>

    <div class="partie partie__5">
        <h2 class="temoignages__titre h2"><?= $part5["titre"] ?></h2>

        <div class="temoignages">
            <?php for($i=0; $i<2; $i++) {?>
            <div class="unTemoignage">
                <div class="row">
                    <picture>
                        <source srcset="<?= get_field("image_2x", $temoignages[$i]->ID) ?> 2x">
                        <img src="<?= get_field("image", $temoignages[$i]->ID) ?>" alt="image de profil" class="unTemoignage__image">
                    </picture>
                    <div class="unTemoignage__infos">
                        <span class="unTemoignage__infos--nom"><?= get_field("temoin", $temoignages[$i]->ID) ?></span>
                        <span class="unTemoignage__infos--annee">Finissant(e) de <?= get_field("annee_diplomation", $temoignages[$i]->ID) ?></span>
                        <span class="unTemoignage__infos--emplois">
                        <?= get_field("titre_poste", $temoignages[$i]->ID).' chez '?>
                        <a href="<?= get_field("url_entreprise", $temoignages[$i]->ID)?>" target="_blank"><?= get_field("entreprise", $temoignages[$i]->ID)?></a>
                        </span>
                    </div>
                </div>
                <p class="unTemoignage__texte">
                    <?= get_field("temoignage", $temoignages[$i]->ID) ?>
                </p>
            </div>
            <?php } ?>
        </div>
    </div>
</main>

<div class="sociaux">
    <div class="sociaux__conteneur conteneur">
        <div class="facebook">
            <?php echo do_shortcode("[custom-facebook-feed]");?>
        </div>

        <div class="twitter">
            <?php echo do_shortcode("[custom-twitter-feed]");?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
