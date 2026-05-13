<?php

class LiensModel
{
    private $connexion_bdd;

    public function __construct()
    {
        try 
        {
            $dsn = 'mysql:host=localhost;dbname=TSA_SDI_95_INFO_BDD;charset=utf8';
            $utilisateur = 'root';
            $mot_de_passe = '';

            $this->connexion_bdd = new PDO($dsn, $utilisateur, $mot_de_passe);
            $this->connexion_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } 
        catch (PDOException $e)
        {
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
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