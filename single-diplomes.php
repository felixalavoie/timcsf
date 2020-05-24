<?php
/*
* Template name: Fiche
*
*/
?>
<?php get_header(); ?>

<?php
    $post = get_post();

    $projets = get_posts(array(
        'numberposts' => 2,
        'post_type' => 'projets',
        'post_status' => 'publish',
        'order' => 'rand',
        'meta_key' => 'id_diplome',
        'meta_value' => get_field('id'),
        'meta_compare' => '='
    ));
?>

<?php
    $courriel = get_field("courriel", $post->ID);
    $linkedin = get_field("linkedin", $post->ID);
    $portfolio = get_field("site", $post->ID);
    $twitter = get_field("pseudo_twitter", $post->ID);
?>


<main id="main fiche">

    <div class="conteneur">
        <span class="decoration blurred__title">Diplômés</span>

        <h2 class="h2 fiche__titre"><?= get_field("prenom", $post->ID).' '.get_field("nom", $post->ID) ?></h2>
        <picture>
            <source srcset="<?= get_field("image_carre_2x", $posts[$i]->ID) ?> 2x">
            <img src="<?= get_field("image_carre", $posts[$i]->ID) ?>" alt="image de profil" class="fiche__image">
        </picture>

        <div class="fiche__liens">
            <?php if ($courriel !== '') {?>
            <a href="mailto<?= $courriel ?>" class="fiche__liens--courriel lien_bouton" target="_blank">
                Courriel
            </a>
            <?php } ?>
            <?php if ($linkedin !== '') {?>
            <a href="<?= $linkedin ?>" class="fiche__liens--linkedin lien_bouton" target="_blank">
                LinkedIn
            </a>
            <?php } ?>
            <?php if ($portfolio !== '') {?>
            <a href="<?= $portfolio ?>" class="fiche__liens--portfolio lien_bouton" target="_blank">
                Portfolio
            </a>
            <?php } ?>
            <?php if ($twitter !== '') {?>
            <a href="<?= $twitter ?>" class="fiche__liens--twitter lien_bouton" target="_blank">
                Twitter
            </a>
            <?php } ?>
        </div>

        <div class="fiche__profil">
            <h3 class="h3 fiche__profil--titre">Profil du diplômé</h3>
            <p class="fiche__profil--texte">
                <?= get_field("presentation", $post->ID)?>
            </p>
        </div>

        <div class="fiche__interets">
            <h3 class="h3">Intérêts</h3>

            <div class="fiche__interets--gestion">
                <h4 class="h4 stint fiche__interets--gestion-titre">
                    Gestion de projet
                </h4>
                <svg width="450" height="12" viewBox="0 0 450 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line x1="0" y1="3" x2="<?= get_field("interet_gestion_projet", $post->ID)*40 ?>" y2="3" stroke="#06D6A0" stroke-width="12"/>
                </svg>
            </div>

            <div class="fiche__interets--medias">
                <h4 class="h4 stint fiche__interets--medias-titre">
                    Traitement des médias
                </h4>
                <svg width="450" height="12" viewBox="0 0 450 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line x1="0" y1="3" x2="<?= get_field("interet_traitement_medias", $post->ID)*40 ?>" y2="3" stroke="#06D6A0" stroke-width="12"/>
                </svg>
            </div>

            <div class="fiche__interets--design">
                <h4 class="h4 stint fiche__interets--design-titre">
                    Design d'interfaces
                </h4>
                <svg width="450" height="12" viewBox="0 0 450 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line x1="0" y1="3" x2="<?= get_field("interet_design_interface", $post->ID)*40 ?>" y2="3" stroke="#06D6A0" stroke-width="12"/>
                </svg>
            </div>

            <div class="fiche__interets--integration">
                <h4 class="h4 stint fiche__interets--integration-titre">
                    Intégration
                </h4>
                <svg width="450" height="12" viewBox="0 0 450 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line x1="0" y1="3" x2="<?= get_field("interet_integration", $post->ID)*40 ?>" y2="3" stroke="#06D6A0" stroke-width="12"/>
                </svg>
            </div>

            <div class="fiche__interets--gestion">
                <h4 class="h4 stint fiche__interets--programmation-titre">
                    Programmation
                </h4>
                <svg width="450" height="12" viewBox="0 0 450 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line x1="0" y1="3" x2="<?= get_field("interet_programmation", $post->ID)*40 ?>" y2="3" stroke="#06D6A0" stroke-width="12"/>
                </svg>
            </div>
        </div>

        <h2 class="h2 fiche__projets">Projets</h2>
        <?php for($i=0; $i<2; $i++) {?>

        <div class="unProjet">
            <h3 class="h3 unProjet__titre"><?= get_field("titre", $projets[$i]->ID) ?></h3>
            <img src="<?= get_field("image_rect", $projets[$i]->ID) ?>" alt="Image du projet" class="unProjet__image">
            <p class="unProjet__texte">
                <?= get_field("description", $projets[$i]->ID) ?>
            </p>
            <p class="unProjet__tech">
                <?= get_field("technologies", $projets[$i]->ID) ?>
            </p>
        </div>
        <?php }?>
    </div>
</main>

<?php get_footer(); ?>
