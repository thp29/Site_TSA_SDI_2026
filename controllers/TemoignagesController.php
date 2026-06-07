<?php

require_once 'models/TemoignagesModel.php';

class TemoignagesController

{
    public function afficherPageTemoignages()
    {
        $message_erreur_nom = "";
        $message_erreur_contenu = "";
        $message_erreur_champ = "";
        $message_erreur_envoi = "";
        $nom_saisi = "";
        $contenu_saisi = "";

        $modele = new TemoignagesModel();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nom_saisi = htmlspecialchars(trim($_POST['nom']));
            $contenu_saisi = htmlspecialchars(trim($_POST['contenu']));

            // si  champ vide
            if (empty($nom_saisi) && empty($contenu_saisi)) {
                $message_erreur_champ = "Veuillez remplir tous les champs";
            } else if (empty($nom_saisi) && !empty($contenu_saisi)) {
                $message_erreur_nom = "Erreur : Champs Nom/prénom vide, veuillez remplir ce champ";
            } else if (empty($contenu_saisi) && !empty($nom_saisi)) {

                $message_erreur_contenu = "Erreur : Champ du contenu de votre témoignage vide, veuillez remplir ce champ";
            } else {
                $envoi_reussi = $modele->enregistrerTemoignage($nom_saisi, $contenu_saisi);
                if ($envoi_reussi) {
                    // REDIRECTION (PRG) pour éviter le renvoi du formulaire si on rafraîchit la page (F5)
                    // On passe un paramètre dans l'URL pour dire à la page suivante d'afficher le message de succès
                    header("Location: index.php?page=temoignages&statut=succes");
                    // message envoye, donc on vide nos variables pour nettoyer le formulaire 
                    $nom_saisi = $contenu_saisi = "";
                } else {
                    $message_erreur_envoi = "Une erreur serveur est survenue lors de l'envoi. Veuillez réessayer plus tard.";
                }
            }
        }
        // 2. ENSUITE : ON RÉCUPÈRE LA LISTE DES TÉMOIGNAGES (Qui contient maintenant le nouveau )
        $liste_temoignages = $modele->getTousTemoignages();

        // 3. GESTION DU MESSAGE DE SUCCÈS APRÈS REDIRECTION
        // Si l'URL contient "?page=temoignages&statut=succes", on affiche le message
        if (isset($_GET['statut']) && $_GET['statut'] === 'succes') {
            $message_succes = "Merci, votre témoignage a bien été enregistré et publié.";
        }


        require 'views/temoignages_View.php';
    }
}
