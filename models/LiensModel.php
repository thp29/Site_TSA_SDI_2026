<?php

require_once 'models/Database.php';

class LiensModel
{
    private $connexion_bdd;

    public function __construct()
    {
         // on recupere la connexion etablie par "Database.php"
        $this->connexion_bdd=(new Database())->getConnexion();
    }

    public function getTousLesLiens()
    {
        // On interroge ta table "Lien" et on trie par ordre alphabétique
        $requete = "SELECT * FROM Lien ORDER BY titre_lien ASC";
        
        $requete_Prep = $this->connexion_bdd->prepare($requete);
        $requete_Prep->execute();

        $tab_liens = $requete_Prep->fetchAll(PDO::FETCH_ASSOC); 
        return $tab_liens;
    }
}
?>