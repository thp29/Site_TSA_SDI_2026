<?php 

$page_demandee;

if (isset($_GET["page"]))
{
    $page_demandee=$_GET["page"];

}

else 
{
    $page_demandee="accueil";
}

switch ($page_demandee)
{
    case "accueil":
        require_once "controllers/AccueilController.php";
        $controller =new AccueilController();
        $controller->afficherAccueil();
        break;

    case "contact":
        require_once "controllers/ContactController.php";
        $controller =new ContactController();
        $controller->gererPageContact();
        break;

    case "articles":
        require_once "controllers/ArticlesController.php";
        $controller=new ArticlesController();
        $controller->AfficherPage_ListeArticles();
        break;
    
    case "article_detail":
        require_once "controllers/ArticlesController.php";
        $controller=new ArticlesController();
        $controller->AfficherPage_Article_entier();
        break;

    case 'liens':
        require_once 'controllers/LiensController.php';
        $controller = new LiensController();
        $controller->afficherPageLiens();
        break;
    
    
    default:
        echo "Erreur 404 : Page introuvable";
        break;
}


?>