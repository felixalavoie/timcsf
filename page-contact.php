<?php
/*
* Template name: Contact
*
*/
?>
<?php get_header(); ?>

<?php
$est_envoye = true;

$responsables = get_posts(array(
    'numberposts' => -1,
    'post_type' => 'responsables',
    'post_status' => 'publish',
    'meta_key' => 'id',
    'orderby' => 'meta_value_number',
    'order' => 'value'
));
?>

<?php

if (isset($_GET["destinataire"])) {
    $destinataire = array("destinataire", $_GET["destinataire"]);
}
// -------------------------- Validation --------------------------
if(isset($_POST["submit"])) {
    $arrErreurs = array();
    $form_post = $_POST;

    $json = json_decode(file_get_contents("wp-content/themes/tim/json/objMessages.json"), true);

    $nom = array("nom", $form_post["nom"]);
    $courriel = array("courriel", $form_post["courriel"]);
    $destinataire = array("destinataire", $form_post["destinataire"]);
    $sujet = array("sujet", $form_post["sujet"]);
    $message = array("message", $form_post["message"]);

//    $le_destinataire = get_field('courriel', $responsables[$destinataire[1]-1]);
    $le_destinataire = 'felixalavoie@gmail.com';
    var_dump($le_destinataire);

    $arrChamps = array($nom, $courriel, $destinataire, $sujet, $message);
    foreach ($arrChamps as $champ) {
        $label = $champ[0];
        $value = $champ[1];
        $regexp = "#" . $json[$label]["regexp"] . "#";

        if ($value == "") {
            $arrErreurs[$label] = "vide";
        } elseif (!preg_match($regexp, $value)) {
            $arrErreurs[$label] = "erreur";
        }
    }

    $bool_error = false;
    if(count($arrErreurs)>0) {
        $bool_error = true;
    }

    if(isset($_POST["g-recaptcha-response"])) {
        $captcha = $_POST["g-recaptcha-response"];
    }

    echo("AVANT CAPTCHA");
    if($captcha) {
//      Si pas d'erreurs ayeur
        var_dump('DANS CAPTCHA');
        var_dump($arrErreurs);
        if(count($arrErreurs) == 0) {
            $secretKey = "6Ld2xZAUAAAAAKTP2SAEIyikTTN2uzxmgcNRaiLv";
            $ip = $_SERVER["REMOTE_ADDR"];
            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
            $responseKeys = json_decode($response, true);

            if(intval($responseKeys["success"]) === 1) {
//                Envoi du email
                var_dump("DANS SUCCESS");
                $to = get_option("admin_email");
                $subject = $sujet[1];
                $headers = "De: ". $nom[1]. "\r\n". "Répondre à: ". $courriel[1]. "\r\n";

                $envoi = wp_mail($to, $subject, $message[1], $headers);

                if($envoi) {
                    var_dump('message envoyé');
                    $est_envoye = true;
                }
                else {
                    var_dump('ECHEC');
                    $est_envoye = false;
                }
            }

            else {
//                Mauvaise réponse au captcha
                array_push($arrErreurs, "reCaptcha");
            }

        }
    }
}

// -------------------------- reCAPTCHA --------------------------

?>

<main id="main">
    <div class="conteneur contact">
        <span class="decoration blurred__title">Contact</span>
        <div class="intro wp-clearfix">
            <div class="intro__text">
                <h2 class="h2 contact__titre"><?php echo get_field('titre_page'); echo $est_envoye?></h2>
                <p class="contact__intro">
                    <?php echo get_field("text")?>
                </p>
                <?php if($est_envoye == true) {?>
                    <div class="message__envoye">
                        <span class="">Votre message à bien été envoyé, le responsable vous répondra dans les plus brefs délais.</span>
                    </div>
                <?php } ?>
            </div>

            <img src="<?php bloginfo('template_url'); ?>/images/svg/questionmark.svg" alt="" class="contact__image intro__image">
        </div>

        <div class="responsables">
            <?php for($i=0; $i<count($responsables); $i++) { ?>
                <div class="unResponsable">
                    <!--                    <img src="https://via.placeholder.com/100x100" alt="Image du responsable" class="unResponsable__image">-->
                    <picture>
                        <source srcset="<?= get_field("image_2x", $responsables[$i]->ID) ?> 2x">
                        <img src="<?= get_field("image", $responsables[$i]->ID) ?>" alt="image de profil" class="unResponsable__image">
                    </picture>
                    <div class="unResponsable__infos">
                        <span class="unResponsable__infos--nom"><?= get_field('prenom', $responsables[$i]->ID).' '.get_field('nom', $responsables[$i]->ID) ?></span>
                        <span class="unResponsable__infos--contact"><?= get_field('telephone', $responsables[$i]->ID) ?></span>
                        <span class="unResponsable__infos--titre"><?= get_field('responsabilite', $responsables[$i]->ID) ?></span>
                    </div>
                </div>
            <?php } ?>
        </div>

        <form action="" class="formContact" method="post">

            <div class="formContact__div formContact__div--nom <?php if(array_key_exists("nom", $arrErreurs)) { ?>champErreur<?php } ?>">
                <label for="nom" class="formContact__label formContact__label--nom">Nom complet</label>
                <input type="text" class="formContact__input formContact__input--nom" id="nom" name="nom"
                       value="<?php if ($bool_error == true) { echo $_POST["nom"]; } ?>">
                <p class="messageErreur">
                    <?php
                    $type = $arrErreurs["nom"];
                    echo($json["nom"][$type]);
                    ?>
                </p>
            </div>

            <div class="formContact__div formContact__div--courriel <?php if(array_key_exists("courriel", $arrErreurs)) { ?>champErreur<?php } ?>">
                <label for="courriel" class="formContact__label formContact__label--courriel">Courriel</label>
                <input type="text" class="formContact__input formContact__input--courriel" id="courriel" name="courriel"
                       value="<?php if ($bool_error == true) { echo $_POST["courriel"]; } ?>">
                <p class="messageErreur">
                    <?php
                    $type = $arrErreurs["courriel"];
                    echo($json["courriel"][$type]);
                    ?>
                </p>
            </div>

            <div class="formContact__div formContact__div--responsable <?php if(array_key_exists("destinataire", $arrErreurs)) { ?>champErreur<?php } ?>">
                <label for="responsable" class="formContact__label formContact__label--responsabble">Destinataire</label>
                <select id="destinataire" name="destinataire">
                    <option value="" selected>Choissez un destinataire</option>
                    <?php for($i=0; $i<count($responsables); $i++) { ?>
                        <option value="<?= get_field('id', $responsables[$i]->ID) ?>" <?php if ($destinataire[1] == get_field('courriel', $responsables[$i]->ID)) { ?>selected<?php } ?>>
                            <?= get_field('prenom', $responsables[$i]->ID).' '.get_field('nom', $responsables[$i]->ID) ?>
                        </option>
                    <?php };?>
                </select>

                <p class="messageErreur">
                    <?php
                    $type = $arrErreurs["destinataire"];
                    echo($json["destinataire"][$type]);
                    ?>
                </p>
            </div>

            <div class="formContact__div formContact__div--sujet <?php if(array_key_exists("sujet", $arrErreurs)) { ?>champErreur<?php } ?>">
                <label for="sujet" class="formContact__label formContact__label--sujet">Sujet</label>
                <input type="text" class="formContact__input formContact__input--sujet" id="sujet" name="sujet"
                       value="<?php if ($bool_error == true) { echo $_POST["sujet"]; } ?>">
                <p class="messageErreur">
                    <?php
                    $type = $arrErreurs["sujet"];
                    echo($json["sujet"][$type]);
                    ?>
                </p>
            </div>

            <div class="formContact__div formContact__div--message <?php if(array_key_exists("message", $arrErreurs)) { ?>champErreur<?php } ?>">
                <label for="message" class="formContact__label formContact__label--message">Message</label>
                <textarea class="formContact__input formContact__input--message" id="message" name="message"
                          value="<?php if ($bool_error == true) { echo $_POST["message"]; } ?>"></textarea>
                <p class="messageErreur">
                    <?php
                    $type = $arrErreurs["message"];
                    echo($json["message"][$type]);
                    ?>
                </p>
            </div>

            <!--        Manque le Captcha       -->
            <div class="g-recaptcha" data-sitekey="6Ld2xZAUAAAAAJ2AKX2HBkO1X3vSb6vuQ4ireXAK">

            </div>

            <input type="submit" value="Envoyer" class="bouton__submit bouton__full lien__bouton" name="submit">
        </form>
    </div>
</main>

<?php get_footer(); ?>
