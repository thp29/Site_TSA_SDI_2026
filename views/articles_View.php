<?php 

// Variables pour le header
$titre_page = "Ressources - TSA SDI 95 info"; 
$page_actuelle = "articles"; 
include 'views/templates/header.php'; 
?>

<section class="hero_bienvenue">
    <h1><svg aria-hidden="true" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icone-svg">
    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
    <polyline points="14 2 14 8 20 8"></polyline>
    <line x1="16" y1="13" x2="8" y2="13"></line>
    <line x1="16" y1="17" x2="8" y2="17"></line>
    <polyline points="10 9 9 9 8 9"></polyline>
    </svg>
    Espace Ressources : Articles 
    </h1>
    <div class="presentation_asso">
    <p>  <strong>Bienvenue sur notre espace Ressources.</strong><br></p> 
    <p>Vous trouverez ici des articles clairs et fiables sur le TSA SDI,
incluant recommandations officielles, psychoéducation et outils pratiques. Ces
informations sont centralisées pour vous accompagner et vous orienter dans
votre parcours. Vous pouvez utiliser les boutons de “tri” ci-dessous pour
choisir les types de ressources que vous voulez consulter
</p> 
</div>
</section>

<main id="contenu_principal" role="main" tabindex="-1">
    
    <!-- 2. LES BOUTONS DE TRI -->
    <section class= "tri_articles">
        <a href="index.php?page=articles" class="lien_action"><strong>Tout Afficher</strong></a>
        <a href="index.php?page=articles&categorie=livre" class="lien_action">Recommendations de livres</a>
        <a href="index.php?page=articles&categorie=objets" class="lien_action">Recommendations d'objets</a>
        <a href="index.php?page=articles&categorie=article" class="lien_action">Articles à propos du TSA SDI</a>

    </section>

    <section class="missions_asso">
        <div class="main-container" > 
            <?php 
            // Sécurité : On vérifie s'il y a des articles avant de faire la boucle
            if (!empty($liste_articles)) {
                
                // On boucle sur notre tableau
                foreach ($liste_articles as $article) { 
            ?>
                <!-- La carte d'un article -->
                <article class ="apercu_article">
                
                    <h2><?= htmlspecialchars($article["titre"]) ?></h2>

                     <!--  L'IMAGE (Facultative) -->
                    <?php if (!empty($article['image_url'])) { ?>
                       <img src="<?= $article['image_url'] ?>" alt="Illustration de l'article" class="img_article">
                    <?php } ?>

                    
                    <!-- substr(texte, depart, longueur) coupe le texte-->
                    <!--strip_tags supprime les balises html (comme <img>) du contenu texte -->
                    <p> <strong>Extrait : </strong>
                        <?= htmlspecialchars(substr(strip_tags($article['contenu']), 0, 250)) ?>
                    </p>
                    <br>

                    <!--injecter l'ID de l'article à la fin de l'URL -->
                    <a href="index.php?page=article_detail&id=<?=$article["id_article"]?>" class="lien_action">
                        Lire en entier 
                        <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icone-svg">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                        </svg>
                    </a>
                    
                </article>

            <?php 
                } // Fin du foreach
            } 
            else { 
            ?>
                <!-- S'il n'y a pas d'articles -->
                <p class="msg_no_article">Aucune ressource disponible pour cette catégorie.</p>
            <?php } ?>

        </div>
    </section>

</main>

<?php include 'views/templates/footer.php'; ?>