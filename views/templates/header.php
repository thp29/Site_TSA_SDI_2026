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
            <li><button type="button" id="btn_taille_texte" aria-pressed="false">A+  <strong>Augmenter la Taille du texte</strong></button></li>
            <li><button type="button" id="btn_interligne" aria-pressed="false"><strong>↕ Augmenter l'interligne</strong></button></li>
            <li><button type="button" id="btn_contraste" aria-pressed="false"><strong>◐ Passer en mode sombre</strong></button></li>
        </ul>
    </div>

    <div class="header_principal">
            <img class="logo_header" src="./assets/imgs/logo.png" alt="Logo de l'association TSA SDI 95 info">
        <nav role="navigation" aria-label="Menu de navigation principal"> 
            <button type="button" id="btn_menu_nav" class="lien-action" aria-label="Ouvrir le menu de navigation" aria-expanded="false">☰ Menu</button>
            <ul id="liste_nav">
                <li><a class="lien_classique" href="index.php?page=accueil" <?= ($page_actuelle == 'accueil') ? 'aria-current="page"' : '' ?>>
                    <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icone-nav">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                Accueil </a></li>
                <li><a class="lien_classique" href="index.php?page=articles" <?= ($page_actuelle == 'articles') ? 'aria-current="page"' : '' ?>>
                    <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icone-nav">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="16" y1="13" x2="8" y2="13"></line>
                    <line x1="16" y1="17" x2="8" y2="17"></line>
                     <polyline points="10 9 9 9 8 9"></polyline>
                    </svg>
                     Articles</a></li>
                <li><a class="lien_classique" href="index.php?page=liens" <?= ($page_actuelle == 'liens') ? 'aria-current="page"' : '' ?>>
                    <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icone-nav">
                    <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                    <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                    </svg>
                    Liens</a></li>
                <li><a class="lien_classique" href="index.php?page=temoignages" <?= ($page_actuelle == 'temoignages') ? 'aria-current="page"' : '' ?>>
                    <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icone-nav">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    Témoignages</a></li>
                <li><a class="lien_action" href="index.php?page=energie" <?= ($page_actuelle == 'energie') ? 'aria-current="page"' : '' ?>>
                    <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icone-nav">
                    <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                    </svg>
                    <strong>Gérer mon énergie</strong></a></li>
                <li><a class="lien_action" href="index.php?page=contact" <?= ($page_actuelle == 'contact') ? 'aria-current="page"' : '' ?>>
                    <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icone-nav">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                    <polyline points="22,6 12,13 2,6"></polyline>
                    </svg> 
                    <strong>Contact</strong></a></li>
            </ul>
        </nav> 
    </div>
</header>