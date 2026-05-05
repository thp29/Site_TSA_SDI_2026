<?php
// 1. On charge le fichier qui contient "l'intelligence" de la page
require_once 'controllers/ContactController.php';

// 2. On instancie (on crée) notre contrôleur
$controller = new ContactController();

// 3. On lui demande de faire son travail (gérer la logique et afficher la vue)
$controller->gererPageContact();

?>