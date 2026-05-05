<?php 
//la page affiche le  nom de l'article 

$titre_page =htmlspecialchars($article["titre"]). " - TSA SDI 95 info"; 

$page_actuelle = "articles"; // On laisse "articles" pour que le menu reste en surbrillance
include 'views/templates/header.php'; 
?>

<main id="contenu_principal" role="main" tabindex="-1">

    <article class="article-detail">
        
        <!-- 2. LE BOUTON DE RETOUR -->
        <div class="lien_retour_all_articles">
            <a href="index.php?page=articles" class="lien_action">← Revenir à la liste des articles</a>
        </div>

        <!-- 3. LE TITRE DE L'ARTICLE -->
        <h1><?=htmlspecialchars($article["titre"])?></h1>
        
        
        <p class="cat_article">
            Ressource de catégorie : <?= htmlspecialchars(($article['categorie'])) ?>
        </p>

        <p class="auteur_article">
            Ecrit par : <?= htmlspecialchars(($article['id_auteur'])) ?>
        </p>

        <!-- La Date d'ajout (Je te l'offre, avec un formatage à la française !) -->
        <p class="date_article">
            Publié le : <?= date('d/m/Y', strtotime($article['date_ajout'])) ?>
        </p>

        <!--  L'IMAGE (Facultative) -->
         <?php if (!empty($article['image_url'])) { ?>
            <img src="<?=htmlspecialchars($article["image_url"])?>" alt="Illustration de l'article" class ="img_article">
        <?php } ?>

        <!-- LE CONTENU COMPLET -->
        <div class="contenu_article_entier">

            <!-- À TOI DE JOUER : Affiche le contenu complet. -->
            <!-- N'oublie pas le combo magique nl2br + htmlspecialchars ! -->
            <p>
                <?= nl2br(htmlspecialchars($article["contenu"])) ?>
            </p>
        </div>

    </article>

</main>

<?php include 'views/templates/footer.php'; ?>