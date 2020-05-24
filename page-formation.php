<?php
/*
* Template name: Formation
*
*/
?>
<?php get_header(); ?>

<main id="main">
    <div class="conteneur formation">
        <span class="decoration blurred__title">Formation</span>
        <h2 class="h2 formation__title"><?php the_field("titre_page")?></h2>

        <img src="<?php bloginfo('template_url'); ?>/images/svg/ligneFormation.svg" alt="svg décoratif" class="ligne ligneFormation">

        <div class="formation__partie formation__droite" id="Integration">
            <img src="<?php bloginfo('template_url'); ?>/images/formation/cours_integration.jpg" alt="Image décorative liée à l'intégration" class="formation__partie--images">
            <div class="formation__texte">
                <h3 class="formation__partie--titre h3"><?php the_field("integration_titre")?></h3>
                <p class="formation__partie--texte">
                    <?php the_field("integration_texte")?>
                </p>
                <p class="formation__partie--tech">
                    <?php the_field("integration_technologies")?>
                </p>
            </div>
        </div>

        <div class="formation__partie formation__droite" id="Programmation">
            <img src="<?php bloginfo('template_url'); ?>/images/formation/cours_programmation.jpg" alt="Image décorative liée à la programmation" class="formation__partie--images">
            <div class="formation__texte">
                <h3 class="formation__partie--titre h3"><?php the_field("programmation_titre")?></h3>
                <p class="formation__partie--texte">
                    <?php the_field("programmation_texte")?>
                </p>
                <p class="formation__partie--tech">
                    <?php the_field("programmation_technologies")?>
                </p>
            </div>
        </div>

        <div class="formation__partie formation__gauche" id="Conception">
            <img src="<?php bloginfo('template_url'); ?>/images/formation/cours_conception.jpg" alt="Image décorative liée à la conception de produits web" class="formation__partie--images">
            <div class="formation__texte">
                <h3 class="formation__partie--titre h3"><?php the_field("conception_titre")?></h3>
                <p class="formation__partie--texte">
                    <?php the_field("conception_texte")?>
                </p>
                <p class="formation__partie--tech">
                    <?php the_field("conception_technologies")?>
                </p>
            </div>
        </div>

        <div class="formation__partie formation__gauche" id="Medias">
            <img src="<?php bloginfo('template_url'); ?>/images/formation/cours_media.jpg" alt="Image décorative liée à la manipulation de médias" class="formation__partie--images">
            <div class="formation__texte">
                <h3 class="formation__partie--titre h3"><?php the_field("medias_titre")?></h3>
                <p class="formation__partie--texte">
                    <?php the_field("medias_texte")?>
                </p>
                <p class="formation__partie--tech">
                    <?php the_field("medias_technologies")?>
                </p>
            </div>
        </div>

        <div class="formation__partie formation__centre" id="Autre">
            <img src="<?php bloginfo('template_url'); ?>/images/formation/cours_autre.jpg" alt="Image décorative" class="formation__partie--images">
            <div class="formation__texte">
                <h3 class="formation__partie--titre h3"><?php the_field("autres_titre")?></h3>
                <p class="formation__partie--texte">
                    <?php the_field("autres_texte")?>
                </p>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
