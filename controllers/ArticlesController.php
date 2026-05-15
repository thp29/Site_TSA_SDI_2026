<?php

require_once 'models/ArticlesModel.php';

class ArticlesController
{

    public function AfficherPage_ListeArticles ()
    {
        $model = new ArticlesModel();

        $categorie_actuelle = "tout"; // pour aria current quel "tri actuel" affiché ?

        if (isset($_GET["categorie"]) && !empty ($_GET["categorie"]))
        {
            $categorie_clean=htmlspecialchars($_GET["categorie"]);
            $categorie_actuelle=$categorie_clean;
            $liste_articles=$model->getArticlesParCategorie ($categorie_clean);
        }
        else
        {
            $liste_articles=$model->getAllArticles();
        }

        require 'views/articles_View.php'; // affiche page article, qui aura acces a variable "$listearticles"
    }

    
    public function AfficherPage_Article_entier ()
    {
        $model = new ArticlesModel();

        if (isset($_GET["id"]) && !empty ($_GET["id"]))
        {
            $id_article=(int) $_GET["id"];

            $article=$model->getArticleParID($id_article);

            if ($article)
            {
                require "views/article_entier_View.php";
            }

            else
            {
                echo "Erreur 404 : Cet article n'existe pas ou a été supprimé.";
            }

        }

        else
        {
            // si pas id dans url, renvoie vers page liste article
            header('Location: index.php?page=articles');
            exit(); //arret code php pour valider redirection
        }
    }

}

?>