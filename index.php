<?php

// On force PHP à afficher toutes les erreurs à l'écran !
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

$page_demandee = "";

if (isset($_GET["page"])) {
    $page_demandee = $_GET["page"];
} else {
    $page_demandee = "accueil";
}

switch ($page_demandee) {
    case "accueil":
        require_once "controllers/AccueilController.php";
        $controller = new AccueilController();
        $controller->afficherAccueil();
        break;

    case "contact":
        require_once "controllers/ContactController.php";
        $controller = new ContactController();
        $controller->gererPageContact();
        break;

    case "articles":
        require_once "controllers/ArticlesController.php";
        $controller = new ArticlesController();
        $controller->AfficherPage_ListeArticles();
        break;

    case "article_detail":
        require_once "controllers/ArticlesController.php";
        $controller = new ArticlesController();
        $controller->AfficherPage_Article_entier();
        break;

    case 'liens':
        require_once 'controllers/LiensController.php';
        $controller = new LiensController();
        $controller->afficherPageLiens();
        break;

    case 'temoignages':
        require_once 'controllers/TemoignagesController.php';
        $controller = new TemoignagesController();
        $controller->afficherPageTemoignages();
        break;

    case "admin":
        require_once 'controllers/AdminConnexionController.php';
        $controller = new AdminConnexionController();
        $controller->gererPageAdminConnexion();
        break;
    case "interface_admin":
        require_once "controllers/InterfaceAdminController.php";
        $controller = new InterfaceAdminController();
        $controller->gererPageInterfaceAdmin();
        break;

    case 'ajouter_article':
        require_once "controllers/ArticlesController.php";
        $controller = new ArticlesController();
        $controller->gererFormAjouterArticle();
        break;

    case "modifier_article":
        require_once "controllers/ArticlesController.php";
        $controller = new ArticlesController();
        $controller->gererFormModifierArticle();
        break;

    case "supprimer_article":
        require_once "controllers/ArticlesController.php";
        $controller = new ArticlesController();
        $controller->gererDeleteArticle();
        break;

    case "energie":
        require_once 'controllers/EnergieConnexionController.php';
        $controller = new EnergieConnexionController();
        $controller->gererConnexionEnergie();
        break;

    case "energie_dashboard":
        require_once 'controllers/EnergieDashboardController.php';
        $controller = new EnergieDashboardController();
        $controller->gererDashboard();
        break;

    case "api_energie_sauvegarde":
        require_once 'controllers/EnergieDashboardController.php';
        $controller = new EnergieDashboardController();
        $controller->sauvegarderJournalAPI();
        break;

    case "journal_detail":
        require_once 'controllers/EnergieDashboardController.php';
        $controller = new EnergieDashboardController();
        $controller->afficherJournalDetail();
        break;



    default:
        echo "Erreur 404 : Page introuvable";
        break;
}
