<!doctype html>
<html <?php language_attributes()?>>
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <meta name="author" content="Félix-Antoine Lavoie">
    <meta name="description" content="Le programme de Techniques d'intégration multimédia est une formation vivante et actuelle! Vous aimez relever des défis et les nouvelles technologies? Ce programme est fait pour vous!">
    <meta name="keywords" content="Techniques d'intégration multimédia, TIM, intégration multimédia, multimédia, Cégep Sainte-Foy, Cégep Ste-Foy, Web, CSS, Sass, HTML, Javascript, jQuery, WordPress, Technologies, Design, Conception, Programmation, Intégration, Traitement des médias, médias">
    <title><?php bloginfo('name')?> | <?= get_the_title() ?></title>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/styles.css" type="text/css" media="screen" />
    <link href="https://fonts.googleapis.com/css?family=Stint+Ultra+Expanded&display=swap" rel="stylesheet">
    <?php wp_head();?>
</head>
<body>
<div id="body">
    <a href="#main" class="screen-reader-only">Aller au contenu</a>
    <header>
        <a href="<?= get_page_link(158)?>">
                <h1 class="screen-reader-only">
                        Techniques d'intégration multimédia
                </h1>
            <img src="<?php bloginfo('template_url'); ?>/images/icons/logo_TIM_white.svg" alt="logo de la TIM">
        </a>
        <span class="menu-control-open" id="menuControlOpen">
            Menu
        </span>
        <div class="menu">
            <div class="menu-inner">
                <span class="menu-control-close" id="menuControlClose">
                    <span class="screen-reader-only">
                        Fermer
                    </span>
                    <img src="<?php bloginfo('template_url'); ?>/images/icons/menu_close.svg" style="max-width: 3.5rem; max-height: 3.5rem" alt="icon pour fermer le menu">
                </span>
                <nav>
                    <a href="<?= get_page_link(161)?>">Formation</a>
                    <a href="<?= get_page_link(164)?>">Diplômés</a>
                    <a href="<?= get_page_link(166)?>">Stages</a>
                    <a href="<?= get_page_link(168)?>">Contact</a>
                </nav>
                <span class="menu__facebook">
                    <a href="<?= get_field("lien_facebook") ?>" target="_blank">
                        <span class="screen-reader-only">
                                Facebook de la TIM
                        </span>
                        <img src="<?php bloginfo('template_url'); ?>/images/icons/logo_facebook_white.svg" alt="Logo de Facebook">
                    </a>
                </span>
                <span class="menu__twitter">
                    <a href="<?= get_field("lien_twitter") ?>" target="_blank">
                        <span class="screen-reader-only">
                                Twitter de la TIM
                        </span>
                        <img src="<?php bloginfo('template_url'); ?>/images/icons/logo_twitter_white.svg" alt="Logo de Twitter">
                    </a>
                </span>
            </div>
        </div>
    </header>
    <div id="contenu">

