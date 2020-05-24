<?php
/*
* Template name: Stages
*
*/
?>
<?php get_header(); ?>

<main id="main" class="stages">
    <span class="decoration blurred__title">Stages</span>

    <div class="conteneur">
        <div class="intro">
            <div class="intro__text">
                <h2 class="h2 stages__titre"><?php the_field("titre_page")?></h2>
                <p class="stages__intro">
                    <?php the_field("texte_intro")?>
                </p>
            </div>
            <img src="<?php bloginfo('template_url'); ?>/images/svg/computer.svg" alt="image svg d'un ordinateur" class="stages__images intro__image">
        </div>

        <div class="stages__div stages__div--gauche">
            <h3 class="h3 stages__soustitre"><?php the_field("titre_1&2annee")?></h3>
            <p class="stages__texte">
                <?php the_field("texte_1&2année")?>
            </p>
        </div>

        <div class="stages__div stages__div--droite">
            <h3 class="h3 stages__soustitre"><?php the_field("titre_3annee")?></h3>
            <p class="stages__texte">
                <?php the_field("texte_3annee")?>
            </p>
        </div>

        <div class="employeur">
            <h2 class="h2 employeur__titre"><?php the_field("titre_employeur")?></h2>
            <p class="employeur__texte">
                <?php the_field("texte_employeur")?>
            </p>
            <a href="<?php the_field("lien_competences")?>" class="employeur__lien--competences" target="_blank" download>
                Télécharger le profil des compétences
            </a>
            <p class="employeur__contact">
                <?php the_field("texte_contact")?>
            </p>
            <a href="<?= add_query_arg('destinataire', '3', get_page_link(168))?>" class="employeur__lien--contact lien__bouton bouton__full">
                Contacter
            </a>
        </div>
    </div>
</main>

<?php get_footer(); ?>
