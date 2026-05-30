<?php
// On définit les variables spécifiques à cette page AVANT d'appeler le header
$titre_page = "Accueil - TSA SDI 95 info";
$page_actuelle = "accueil";

// On inclut tout le haut du site
include 'views/templates/header.php';
?>

<section class="hero_bienvenue">
    <h1>L'association TSA SDI 95 INFO </h1>

    <div class="presentation_asso">
        <p class="hero_p1"> <strong>L'association </strong> a pour<strong> objectif de partager des informations </strong> simples et éclairées
            sur le <strong> de Spectre de l'Autisme (TSA), sans déficience intellectuelle (SDI), ni retard
                de langage, </strong> aux adultes concerné.e.s ou qui se pensent concerné.e.s, sur le département du <strong>Val
                d'Oise </strong> afin de leur éviter une <strong> diagnostique.</strong></p>

        <p class=hero_p>Ici, nous sommes alignés sur :
        <ul>
            <li>les <strong>recommandations de la HAS </li></strong>
            <li>les informations du <strong>CRAIF</li>
            <li>La Maison de l'Autisme à Aubervilliers </strong>(93, Seine-Saint-Denis).</li>
        </ul>
        </p>
    </div>
</section>

<!--Le role="main" indique aux lecteurs 
         d'écran (pour malvoyants) que c'est la zone de contenu principal 
         de la page, même si <main> le fait déjà implicitement.
        et id permet de renvoyer au skip link dans "head"-->

<main id="contenu_principal" role="main" tabindex="-1"> <!-- tabindex="-1" permet de rendre le main focusable pour les lecteurs d'écran après le skip link -->


    <section class="missions_asso">

        <h2>Nos Missions Principales</h2>

        <p class="pres-missions"> L'association <strong>TSA SDI 95 INFO</strong> s'engage au quotidien à travers <strong>trois grands axes d'action
                pour soutenir les familles et les personnes concernées. </strong></p>

        <div class="main-container">

            <article class="Orientation">
                <img class="icones_missions" src="./assets/imgs/boussolle.png"
                    alt="">
                <h3>Orientation</h3>
                <p id="orientation-description"><strong>Guider</strong> les familles et les personnes concernées vers les <strong>professionnels</strong> compétents,
                    les <strong>structures</strong> adaptées et les <strong>démarches</strong> administratives appropriées.
                </p>
                <p><strong>Permanence disponible
                        par téléphone ou mail.</strong>
                </p><br><br>
                <a href="index.php?page=contact" class="lien_action" id="btn_acceuil_contact">&#9993 Nous contacter</a>
            </article>

            <article class="Sensibilisation">
                <img class="icones_missions" src="./assets/imgs/icone_sensi.svg"
                    alt="">
                <h3>Sensibilisation</h3>
                <p> Informer sur les réalités du <strong>TSA sans déficience intellectuelle</strong>, afin de favoriser
                    la <strong>psychoéducation</strong> des personnes concernées et <strong>l'inclusion.</strong></p>
            </article>

            <article class="ressources">
                <img class="icones_missions" src="./assets/imgs/icone_ressources.svg"
                    alt="">
                <h3> Partage de ressources </h3>
                <p> <strong>Centraliser</strong> des <strong>informations</strong> fiables et des <strong>outils</strong> pratiques pour <strong>accompagner</strong> les personnes
                    concernées et faciliter l'orientation dans leurs parcours. </p>
            </article>

        </div>

    </section>

</main>

<?php
// On inclut tout le bas du site
include 'views/templates/footer.php';
?>