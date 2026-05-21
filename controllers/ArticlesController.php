<?php

require_once 'models/ArticlesModel.php';

class ArticlesController
{

    public function AfficherPage_ListeArticles()
    {
        $model = new ArticlesModel();

        $categorie_actuelle = "tout"; // pour aria current quel "tri actuel" affiché ?

        if (isset($_GET["categorie"]) && !empty($_GET["categorie"])) {
            $categorie_clean = htmlspecialchars($_GET["categorie"]);
            $categorie_actuelle = $categorie_clean;
            $liste_articles = $model->getArticlesParCategorie($categorie_clean);
        } else {
            $liste_articles = $model->getAllArticles();
        }

        require 'views/articles_View.php'; // affiche page article, qui aura acces a variable "$listearticles"
    }


    public function AfficherPage_Article_entier()
    {
        $model = new ArticlesModel();

        if (isset($_GET["id"]) && !empty($_GET["id"])) {
            $id_article = (int) $_GET["id"];

            $article = $model->getArticleParID($id_article);

            if ($article) {
                require "views/article_entier_View.php";
            } else {
                echo "Erreur 404 : Cet article n'existe pas ou a été supprimé.";
            }
        } else {
            // si pas id dans url, renvoie vers page liste article
            header('Location: index.php?page=articles');
            exit(); //arret code php pour valider redirection
        }
    }

    // gere affichaghe view creation article interface admin, recup donnes du formulaire associé et lien avec le modele pour reuqert insert du nouvel article
    public function gererFormAjouterArticle()
    {

        // Variables pour stocker les messages à afficher dans la Vue
        $message_succes = "";
        $message_erreur = "";

        // variable pour recuper donnes post du form et les afficher  dans la vue -> en cas derreur de saisie pour eviter a user de tout retaper
        $titre_saisi = "";
        $categorie_saisi = "";
        $image_url_saisi = "";
        $contenu_saisi = "";
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $titre_saisi = htmlspecialchars(trim($_POST['titre']));
            $categorie_saisi = htmlspecialchars(trim($_POST['categorie']));
            $image_url_saisi = trim($_POST['image_url']);
            $contenu_saisi = htmlspecialchars(trim($_POST['contenu_article']));

            // si au moins 1 champ vide
            if (empty($titre_saisi) || empty($categorie_saisi) || empty($contenu_saisi)) {
                $message_erreur = "Erreur : Champs vides, veuillez remplir correctement tous les champs.";
            } else {
                $modele = new ArticlesModel();
                $ajout_reussi = $modele->creer_article($titre_saisi, $categorie_saisi, $image_url_saisi, $contenu_saisi);

                if ($ajout_reussi) {
                    $message_succes = "L'article a bien été ajouré";
                    // message envoye, donc on vide nos variables pour nettoyer le formulaire 
                    $titre_saisi = $categorie_saisi = $image_url_saisi = $contenu_saisi = "";
                } else {
                    $message_erreur = "Une erreur serveur est survenue lors de l'envoi. Veuillez réessayer plus tard.";
                }
            }
        }
        require_once 'views/ajouter_article_View.php';
    }

    // gere affichaghe view modifier article interface admin, recup donnees bdd pour pre remplir form de la vie et recup donnes du formulaire associé 
    //puis lien avec le modele pour reuqert update des modifs de article selectionne par id
    public function gererFormModifierArticle()
    {
        // Variables pour stocker les messages à afficher dans la Vue
        $message_succes = "";
        $message_erreur = "";

        // variable pour recuper donnees de larticle par id en bdd et pre remplir avec celle ci, le form de modification de larticle
        $id_article_amodifier = "";
        $titre_saisi = "";
        $categorie_saisi = "";
        $image_url_saisi = "";
        $contenu_saisi = "";

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $id_article_amodifier = htmlspecialchars(trim($_POST['id_article']));
            $titre_saisi = htmlspecialchars(trim($_POST['titre']));
            $categorie_saisi = htmlspecialchars(trim($_POST['categorie']));
            $image_url_saisi = trim($_POST['image_url']);
            $contenu_saisi = htmlspecialchars(trim($_POST['contenu_article']));

            // si au moins 1 champ vide
            if (empty($titre_saisi) || empty($categorie_saisi) || empty($contenu_saisi)) {
                $message_erreur = "Erreur : Champs vides, veuillez remplir correctement tous les champs.";
            } else {
                $modele = new ArticlesModel();
                $modif_reussi = $modele->modifier_article($id_article_amodifier, $titre_saisi, $categorie_saisi, $image_url_saisi, $contenu_saisi);

                if ($modif_reussi) {
                    $message_succes = "L'article a bien été modifié";
                    // message envoye, donc on vide nos variables pour nettoyer le formulaire 
                    $titre_saisi = $categorie_saisi = $image_url_saisi = $contenu_saisi = "";
                } else {
                    $message_erreur = "Une erreur serveur est survenue lors de la modification. Veuillez réessayer plus tard.";
                }
            }
        }


        // si form de modif article pas encore rempli , on recupere les donnes de larticle s
        //pecifie en bdd et on affiche dans la vue/le form!
        else {
            $model = new ArticlesModel();

            if (isset($_GET["id"]) && !empty($_GET["id"])) {
                $id_article = (int) $_GET["id"];

                $article_recup_ok = $model->getArticleParID($id_article);

                if ($article_recup_ok) {
                    $id_article_amodifier = $article_recup_ok["id_article"];
                    $titre_saisi = $article_recup_ok["titre"];
                    $categorie_saisi = $article_recup_ok["categorie"];
                    $image_url_saisi = $article_recup_ok["image_url"];
                    $contenu_saisi = $article_recup_ok["contenu"];
                }
            }
        }
        require_once 'views/modifier_article_View.php';
    }

    public function gererDeleteArticle()
    {
        $model = new ArticlesModel();

        $message_succes = "";
        $message_erreur = "";

        if (isset($_GET["id"]) && !empty($_GET["id"])) {
            $id_article_todelete = (int) $_GET["id"];
            $delete_ok = $model->delete_article($id_article_todelete);
            if ($delete_ok) {
                $message_succes = "L'article a bien été supprimé";
                header("Location: index.php?page=interface_admin&statut=supprime");
                exit();
            } else {
                $message_erreur = "Une erreur serveur est survenue lors de la suppression. Veuillez réessayer plus tard.";
                require_once "views/admin_interface_View.php";
            }
        }
    }
}
