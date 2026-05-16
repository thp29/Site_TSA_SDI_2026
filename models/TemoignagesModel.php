<?php

require_once 'models/Database.php';

class TemoignagesModel
{
    private $connexion_bdd;

    public function __construct()
    {
        // on recupere la connexion etablie par "Database.php"
        $this->connexion_bdd = (new Database())->getConnexion();
    }

    public function getTousTemoignages()
    {
        $requeteALLandpseudo = "SELECT Temoignage.contenu, Temoignage.date_publication, Utilisateur.pseudo FROM Temoignage 
                    INNER JOIN Utilisateur ON Temoignage.id_auteur = Utilisateur.id_utilisateur 
                    ORDER BY Temoignage.date_publication DESC";
        $requete_Prep = $this->connexion_bdd->prepare($requeteALLandpseudo);
        $requete_Prep->execute();

        $tab_temoignages = $requete_Prep->fetchAll(PDO::FETCH_ASSOC);
        return $tab_temoignages;
    }
}
