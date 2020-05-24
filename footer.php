</div>
<!-- Appellation des scripts qui sont dans toutes les pages-->
<script src="<?php bloginfo('template_url'); ?>/node_modules/jquery/dist/jquery.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/menu.js"></script>
<?php $title = get_the_title(); ?>
<?php if ($title == "Contact") { ?>
    <script src="<?php bloginfo('template_url'); ?>/js/validation.js"></script>
<?php } ?>
<?php if ($title == "Diplômés") { ?>
    <script>
        var form = $('#formFiltre');
        var arrFiltre = $('.unFiltre');

        arrFiltre.on('change', function () {
            form.submit();
        })
    </script>
<?php } ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<footer>
    <nav class="footer__rangee footer__nav">
        <a class="footer__nav--lien" href="<?= get_page_link(161)?>">Formation</a>
        <a class="footer__nav--lien" href="<?= get_page_link(164)?>">Diplômés</a>
        <a class="footer__nav--lien" href="<?= get_page_link(166)?>">Stages</a>
        <a class="footer__nav--lien" href="<?= get_page_link(168)?>">Contact</a>
    </nav>

    <div class="footer__rangee footer__logo">
        <img src="<?php bloginfo('template_url'); ?>/images/icons/logo_cegep_black.svg" alt="logo du Cégep de Sainte-Foy">
        <img src="<?php bloginfo('template_url'); ?>/images/icons/logo_TIM_black.svg" alt="logo de la TIM">
    </div>

    <div class="footer__rangee footer__sociaux">
            <a href="<?= get_field("lien_facebook") ?>" target="_blank">
                <span class="screen-reader-only">
                    Facebook de la TIM
                </span>
                <img src="<?php bloginfo('template_url'); ?>/images/icons/logo_facebook_black.svg" alt="Logo de Facebook">
            </a>
            <a href="<?= get_field("lien_twitter") ?>" target="_blank">
                <span class="screen-reader-only">
                    Twitter de la TIM
                </span>
                <img src="<?php bloginfo('template_url'); ?>/images/icons/logo_twitter_black.svg" alt="Logo de Twitter">
            </a>
    </div>

    <small class="footer__rangee">
        Tous droits réservés © 2019 - Techniques d'intégration multimédia, Cégep de Sainte-Foy.
        © Félix-Antoine Lavoie
    </small>
</footer>
<?php wp_footer();?>
</body>
</html>