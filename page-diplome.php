<?php
/*
* Template name: Diplomes
*
*/
?>
<?php get_header(); ?>

<?php
// Triage de la liste des étudiants
// Vient chercher la valeur envoyée par le formulaire pour changer des variables utilisées dans la requête
// Par défault = ordre alphabéthique
    $triage = "";
    $ordre = "";
//    $filtre = 'medias';
    $filtre = $_POST["filtre"];

    switch ($filtre) {
        case 'integration':
            $triage = 'interet_integration';
            $ordre = 'DESC';
            break;
        case 'programmation':
            $triage = 'interet_programmation';
            $ordre = 'DESC';
            break;
        case 'design':
            $triage = 'interet_design_interface';
            $ordre = 'DESC';
            break;
        case 'gestion':
            $triage = 'interet_gestion_projet';
            $ordre = 'DESC';
            break;
        case 'medias':
            $triage = 'interet_traitement_medias';
            $ordre = 'DESC';
            break;
        default :
            $triage = 'prenom';
            $ordre = 'ASC';
    }
?>

<main id="main">
    <div class="conteneur diplomes">
        <span class="decoration blurred__title">Diplômés</span>
        <div class="intro">
            <img src="<?php bloginfo('template_url'); ?>/images/svg/etudiant.svg" alt="" class="diplomes__images">
            <h2 class="diplomes__titre h2"><?php the_field("titre")?></h2>
            <div class="diplomes__texte">
                <?php the_field("texte")?>
            </div>
        </div>

        <div class="liste">
            <span class="h3"><?php the_field("titre_triage")?></span>
            <form class="liste__triage" method="post" action="" id="formFiltre">
                <div class="unTri">
                    <input type="radio" id="az" name="filtre" value="az" class="unFiltre">
                    <label for="az">A-Z</label>
                </div>

                <div class="unTri">
                    <input type="radio" id="integration" name="filtre" value="integration" class="unFiltre">
                    <label for="integration">Intégration</label>
                </div>

                <div class="unTri">
                    <input type="radio" id="programmation" name="filtre" value="programmation" class="unFiltre">
                    <label for="programmation">Programmation</label>
                </div>

                <div class="unTri">
                    <input type="radio" id="design" name="filtre" value="design" class="unFiltre">
                    <label for="design">Design</label>
                </div>

                <div class="unTri">
                    <input type="radio" id="gestion" name="filtre" value="gestion" class="unFiltre">
                    <label for="gestion">Gestion</label>
                </div>

                <div class="unTri">
                    <input type="radio" id="medias" name="filtre" value="medias" class="unFiltre">
                    <label for="medias">Traitement des médias</label>
                </div>

                <input type="submit" value="Trier" class=".js__nodisplays">
            </form>

            <?php
                $posts = get_posts(array(
                        'numberposts' => -1,
                        'post_type' => 'diplomes',
                        'post_status' => 'publish',
                        'meta_key' => $triage,
                        'orderby' => 'meta_value',
                        'order' => $ordre
                ));
            ?>

            <div class="liste__conteneur">
            <?php for($i=0; $i<count($posts); $i++) {?>
                <figure class="liste__item">
<!--                    <img src="https://via.placeholder.com/300x400" alt="Photo de profil de l'étudiant" class="liste__item--image">-->
                    <picture>
                        <source srcset="<?= get_field("image_rect_2x", $posts[$i]->ID) ?> 2x">
                        <img src="<?= get_field("image_rect", $posts[$i]->ID) ?>" alt="image de profil" class="liste__item--image">
                    </picture>
                    <a href="<?= $posts[$i]->guid ?>" class="liste__item__caption--lien onHover">
                    <figcaption class="liste__item__caption">
                            <span class="liste__item__caption--prenom"><?= get_field("prenom", $posts[$i]->ID) ?></span>
                            <span class="liste__item__caption--nom onHover"><?= get_field("nom", $posts[$i]->ID)?></span>
                            <span class="liste__item__caption--fiche onHover">
                                Voir la fiche
                            </span>
                    </figcaption>
                    </a>
                </figure>
            <?php } ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
