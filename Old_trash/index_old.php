<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TSA SDI 95 info </title>

    <link rel="stylesheet" href="./assets/css/style.css">

    <meta name="description" content="Association TND Ensemble : Comprendre,
     échanger et gérer son énergie pour la neurodiversité.">
</head>

<body>

 <!-- lien "dévitement" pour accéder au "main"/ contenu principal -->
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
                    <li><a class="lien_classique" href="index.php" aria-current="page">Accueil</a></li>
                    <li><a class="lien_classique" href="articles.html">Articles</a></li>
                    <li><a class="lien_classique" href="liens.php">Liens</a></li>
                    <li><a class="lien_classique" href="temoignages.php">Témoignages</a></li>
                    <li><a class="lien_action" href="outil_energie.php">Gérer mon énergie</a></li>
                    <li><a class="lien_action" href="contact.php">Contact</a></li>
                </ul>
            </nav> 
        </div>

    </header>
 
        <section class ="hero_bienvenue">
            <h1>L'association TSA SDI 95 INFO </h1>

            <div class="presentation_asso">
                <p class= "hero_p1"><strong>L'association a pour objectif de partager des informations simples et éclairées
                    sur le Trouble de Spectre de l'Autisme (TSA) sans déficience intellectuelle (SDI) ni retard
                    de langage aux adultes concerné.e.s ou qui se pensent concerné.e.s, sur le département du Val
                    d'Oise afin de leur éviter une errance diagnostique.</strong></p>

                <p class=hero_p>Ici, nous sommes alignés sur les recommandations de la HAS, sur les informations du CRAIF
                et de La Maison de l'Autisme à Aubervilliers (93). 
                </p>
            </div>
        </section>
        
        <!--Le role="main" indique aux lecteurs 
         d'écran (pour malvoyants) que c'est la zone de contenu principal 
         de la page, même si <main> le fait déjà implicitement.
        et id permet de renvoyer au skip link dans "head"-->

    <main id ="contenu_principal" role="main" tabindex="-1"> <!-- tabindex="-1" permet de rendre le main focusable pour les lecteurs d'écran après le skip link --> 

      
        <section class = "missions_asso">

            <h2>Nos Missions Principales</h2>
            
            <p class="pres-missions"> L'association TSA SDI 95 INFO s'engage au quotidien à travers trois grands axes d'action 
                pour soutenir les familles et les personnes concernées. </p>
            
            <div class="main-container">

                <article class="Orientation">
                    <img class = "icones_missions" src ="./assets/imgs/boussolle.png" 
                    alt ="">
                    <h3>Orientation</h3>
                    <p id="orientation-description">Guider les familles et les personnes concernées vers les professionnels compétents, 
                    les structures adaptées et les démarches administratives appropriées. 
                    </p>
                    <p><strong>Permanence disponible 
                    par téléphone ou mail.</strong>
                    </p>
                     <a href="contact.php" class="lien_action" id="btn_acceuil_contact">Nous contacter</a>
                </article>

                <article class="Sensibilisation">
                     <img class = "icones_missions" src ="./assets/imgs/icone_sensi.svg" 
                    alt ="">
                    <h3>Sensibilisation</h3>
                    <p> Informer sur les réalités du TSA sans déficience intellectuelle, afin de favoriser 
                        la psychoéducation des personnes concernées et l'inclusion.</p>
                </article>

                <article class="Partage de ressources">
                     <img class = "icones_missions" src ="./assets/imgs/icone_ressources.svg" 
                    alt ="">
                    <h3> Partage de ressources </h3>
                    <p> Centraliser des informations fiables et des outils pratiques pour accompagner les personnes 
                        concernées et faciliter l'orientation dans leurs parcours. </p>
                </article>

             </div>

        </section>

    </main>


    <footer>

        <div class="footer-container">
             <section class="nav_footer">
                <h3><strong>Navigation</strong></h3>
                <ul>
                    <li><a class="lien_classique" href="index.php">Accueil</a></li>
                    <li><a class="lien_classique" href="articles.html">Articles</a></li>
                    <li><a class="lien_classique" href="liens.php">Liens</a></li>
                    <li><a class="lien_classique" href="temoignages.php">Témoignages</a></li>
                    <li><a class="lien_action" href="outil_energie.php">Gérer mon énergie</a></li>
                    <li><a class="lien_action" href="contact.php">Contact</a></li>
                </ul>
            </section>
            <section class="contact_footer">
                <h3><strong>Contact</strong></h3>
                <p>Val d'oise - 95</p>
                <p>Email : <u>tsasdi95@proton.me</u></p>
                <p>Téléphone: <u>06 56 69 70 68</u></p>
            </section>
        </div>

        <img class = "logo_footer" src ="./assets/imgs/logo.png" 
        alt = "Logo de l'association TSA SDI 95 info">

        <p>2026 TSA SDI 95. Tous droits réservés. Association loi 1901.
        </p>
    </footer>


    <a href="#top" id="scrollToTop" aria-label="Bouton retour en haut de page">↑</a>
    <!--<La solution du bas de page : En plaçant le <script> tout en bas, juste avant la fermeture </body>, 
    tu garantis au navigateur : "Lis tout le HTML d'abord, affiche 
    les textes, les images, affiche la page à l'utilisateur pour qu'il n'attende pas, et SEULEMENT à la fin,
     charge l'intelligence JavaScript".-->

    <script src="./assets/js/main.js"></script>
</body>

</html>