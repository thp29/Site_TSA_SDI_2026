<?php 

// Variables pour le header
$titre_page = "Ressources - TSA SDI 95 info"; 
$page_actuelle = "articles"; 
include 'views/templates/header.php'; 
?>

<section class="hero_bienvenue">
    <h1>Espace Ressources : Articles </h1>
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
                    
                    <!-- substr(texte, depart, longueur) coupe le texte ! -->
                    <p> <strong>Extrait : </strong>
                        <!-- "nl2br" = Insert line breaks where newlines (\n) occur in the string: !-->
                        <?=nl2br(substr($article["contenu"], 0, 150)) ?>
                    </p>
                    <br>

                    <!--injecter l'ID de l'article à la fin de l'URL -->
                    <a href="index.php?page=article_detail&id=<?=$article["id_article"]?>" class="lien_action">
                        Lire en entier
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