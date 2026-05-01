<?php

// On a besoin du Modèle pour envoyer le mail
require_once 'models/ContactModel.php';

class ContactController {

    public function gererPageContact() {

        // Variables pour stocker les messages à afficher dans la Vue
        $message_succes = "";
        $message_erreur = "";

        // 1. A-t-on reçu des données via la méthode POST ?
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // 2. Récupération et nettoyage (La "Douane")
            // Utilise htmlspecialchars() et trim() pour $nom, $sujet, $message
            // Utilise filter_var(..., FILTER_SANITIZE_EMAIL) pour l'email

            // TRIM = Cette fonction retire tous les espaces invisibles 
            // (espaces, tabulations, retours à la ligne) qui se trouvent au tout début et à la toute fin de la chaîne.

            // HTMLSPECIALCHARS = Cette fonction convertit les caractères spéciaux en entités HTML. 
            // Par exemple, les caractères <, >, &, " et ' sont convertis en &lt;, &gt;, &amp;, &quot; et &#039; respectivement.
            // Cela empêche les attaques de type Cross-Site Scripting (XSS) en s'assurant que les données envoyées par l'utilisateur ne sont pas interprétées 
            // comme du code HTML ou JavaScript lorsqu'elles sont affichées sur la page.

            $nom = htmlspecialchars(trim($_POST['nom']));
            $email_expediteur = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL); // Nettoie l'email en supprimant les caractères indésirables
            $sujet = htmlspecialchars(trim($_POST['sujet']));
            $message = htmlspecialchars(trim($_POST['message']));

            // 3. Validation (Le "Contrôle Qualité")
            // Vérifie que les champs obligatoires ne sont pas vides
            // Vérifie que l'email a un format valide avec filter_var(..., FILTER_VALIDATE_EMAIL)
            if (!empty($nom) && !empty($email_expediteur) && !empty($sujet) && !empty($message)
                && filter_var($email_expediteur, FILTER_VALIDATE_EMAIL)) {
                
                // 4. Tout est bon, on appelle le Modèle !
                $modele = new ContactModel();
                $envoi_reussi = $modele->envoyerEmail($nom, $email_expediteur, $sujet, $message);

                if ($envoi_reussi) {
                    $message_succes = "Merci, votre message a bien été envoyé !";
                } else {
                    $message_erreur = "Une erreur serveur est survenue lors de l'envoi.";
                }

            } 
           
            else {
                // Erreur de validation (ex: champ vide ou email invalide)
                $message_erreur = "Veuillez remplir correctement tous les champs.";
            }
        }

        // 5. Affichage de la Vue
        // On inclut le fichier qui contient l'interface.
        // Les variables $message_succes et $message_erreur seront disponibles dans la Vue !
        require 'views/contactView.php';
    }
}

?>