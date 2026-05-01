<?php

class ContactModel {

    // Cette fonction recevra les données envoyées par le contrôleur
    public function envoyerEmail($nom, $email_expediteur, $sujet, $message) {
        
        // 1. Définir à qui on envoie le mail (l'adresse de ton asso)
        //$destinataire = "tsasdi95@proton.me";

        $mail_destinataire = "thp2909@gmail.com"; // Adresse e-mail de destination (l'adresse de l'association)

        // ... Ici, nous devons construire le contenu de l'e-mail ...
        $sujet_email = "Sujet du contact : $sujet";
        $message_email = "Nom : " . $nom . "\n";
        $message_email .= "Email de l'expéditeur : " . $email_expediteur . "\n\n";
        $message_email .= "Message : \n" . $message;

        // ... Ici, nous devons envoyer l'e-mail ...
        $headers = "Reply-To: " . $email_expediteur;
        $envoye = mail($mail_destinataire, $sujet_email, $message_email, $headers);

        // ... Et enfin, retourner true (si ça a marché) ou false (si ça a planté)
        return $envoye;
    }
}