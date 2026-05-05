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
    
    default:
        echo "Erreur 404 : Page introuvable";
        break;
}


?>