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
        $requeteALLandpseudo = "SELECT Temoignage.contenu, Temoignage.date_publication, Temoignage.nom_auteur FROM Temoignage 
                    ORDER BY Temoignage.date_publication DESC";
        $requete_Prep = $this->connexion_bdd->prepare($requeteALLandpseudo);
        $requete_Prep->execute();

        $tab_temoignages = $requete_Prep->fetchAll(PDO::FETCH_ASSOC);
        return $tab_temoignages;
    }


    public function enregistrerTemoignage($nom_saisi, $contenu_saisi)
    {
        $requete_insert_temoignage = "INSERT INTO Temoignage (nom_auteur,contenu) VALUES(:auteur, :contenu)";
        $requet_insert_prep = $this->connexion_bdd->prepare($requete_insert_temoignage);
        $ajout_reussi = $requet_insert_prep->execute([":auteur" => $nom_saisi, ":contenu" => $contenu_saisi]);
        return $ajout_reussi;
    }
}
