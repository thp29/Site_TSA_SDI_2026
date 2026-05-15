<?php

// On a besoin du Modèle pour envoyer le mail
require_once 'models/ContactModel.php';

class ContactController {

    public function gererPageContact() {

        // Variables pour stocker les messages à afficher dans la Vue
        $message_succes = "";
        $message_erreur = "";

        $nom_saisi="";
        $email_saisi="";
        $sujet_saisi="";
        $message_saisi="";
        

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

            
            // On stocke les saisies nettoyées dans nos variables pour pouvoir les réafficher
            $nom_saisi = htmlspecialchars(trim($_POST['nom']));
            $email_saisi = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
            $sujet_saisi = htmlspecialchars(trim($_POST['sujet']));
            $message_saisi = htmlspecialchars(trim($_POST['message']));

            // si au moins 1 champ vide
            if (empty($nom_saisi)|| empty($email_saisi)||empty($sujet_saisi)||empty($message_saisi))
            {
                 $message_erreur = "Erreur : Champs vides, veuillez remplir correctement tous les champs.";
            }

            elseif (!filter_var($email_saisi, FILTER_VALIDATE_EMAIL)) 
            {
                $message_erreur = "Erreur de saisie : L'adresse e-mail saisie n'est pas valide (Rappel du format attendu : nom@domaine.com).";
            }

            // si les champs obligatoires ne sont pas vides et email valide
           
            else {
                
                // 4. Tout est bon, on appelle le Modèle !
                $modele = new ContactModel();
                $envoi_reussi = $modele->envoyerEmail($nom_saisi, $email_saisi, $sujet_saisi, $message_saisi);

                if ($envoi_reussi) {
                    $message_succes = "Merci, votre message a bien été envoyé !, Nous vous répondrons dans les meilleurs délais.";
                    // message envoye, donc on vide nos variables pour nettoyer le formulaire 
                    $nom_saisi = $email_saisi = $sujet_saisi = $message_saisi = "";
                } else {
                    $message_erreur = "Une erreur serveur est survenue lors de l'envoi. Veuillez réessayer plus tard.";
                }

            } 
            
           /* else if (!filter_var($email_expediteur, FILTER_VALIDATE_EMAIL)) {
                // Erreur de validation : email invalide
                $message_erreur = "Veuillez entrer une adresse e-mail valide au format \"mail@domaine.com\"";

            }*/
            
            
        }

        // 5. Affichage de la Vue
        // On inclut le fichier qui contient l'interface.
        // Les variables $message_succes et $message_erreur seront disponibles dans la Vue !
        require 'views/contact_View.php';
    }
}

?>