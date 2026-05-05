<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($titre_page) ? $titre_page : 'TSA SDI 95 info' ?></title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <meta name="description" content="Association TND Ensemble : Comprendre, échanger et gérer son énergie pour la neurodiversité.">
</head>
<body>

<a href="#contenu_principal" class="skip-link">Aller au contenu principal</a>

<header id="top">
    <div class="barre_accessibilite" aria-label="Menu d'accessibilité">
        <div class="accessibilite_entete">
            <img class="icone_accessibilite" src="./assets/imgs/Accessibility.svg" alt="Icône d'accessibilité">
            <button type="button" id="btn_menu_accessibilite" class="lien-action" aria-label="Ouvrir le menu d'accessibilité" aria-expanded="false">☰ Menu d'accessibilité</button>
        </div>
        <ul id="liste_accessibilite">
            <li><button type="button" id="btn_taille_texte" aria-pressed="false"><strong>Augmenter la Taille du texte</strong></button></li>
            <li><button type="button" id="btn_interligne" aria-pressed="false"><strong>↕ Augmenter l'interligne</strong></button></li>
            <li><button type="button" id="btn_contraste" aria-pressed="false"><strong>◐ Passer en mode sombre</strong></button></li>
        </ul>
    </div>

    <div class="header_principal">
            <img class="logo_header" src="./assets/imgs/logo.png" alt="Logo de l'association TSA SDI 95 info">
        <nav role="navigation" aria-label="Menu de navigation principal"> 
            <button type="button" id="btn_menu_nav" class="lien-action" aria-label="Ouvrir le menu de navigation" aria-expanded="false">☰ Menu</button>
            <ul id="liste_nav">
                <li><a class="lien_classique" href="index.php?page=accueil" <?= ($page_actuelle == 'accueil') ? 'aria-current="page"' : '' ?>>Accueil</a></li>
                <li><a class="lien_classique" href="index.php?page=articles" <?= ($page_actuelle == 'articles') ? 'aria-current="page"' : '' ?>>Articles</a></li>
                <li><a class="lien_classique" href="index.php?page=liens" <?= ($page_actuelle == 'liens') ? 'aria-current="page"' : '' ?>>Liens</a></li>
                <li><a class="lien_classique" href="index.php?page=temoignages" <?= ($page_actuelle == 'temoignages') ? 'aria-current="page"' : '' ?>>Témoignages</a></li>
                <li><a class="lien_action" href="index.php?page=energie" <?= ($page_actuelle == 'energie') ? 'aria-current="page"' : '' ?>><strong>Gérer mon énergie</strong></a></li>
                <li><a class="lien_action" href="index.php?page=contact" <?= ($page_actuelle == 'contact') ? 'aria-current="page"' : '' ?>> <strong>Contact</strong></a></li>
            </ul>
        </nav> 
    </div>
</header>