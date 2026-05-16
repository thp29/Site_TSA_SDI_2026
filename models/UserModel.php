<?php

require_once 'models/Database.php';

class UserModel

{


    private $connexion_bdd;

    public function __construct()
    {

        // on recupere la connexion etablie par "Database.php"
        $this->connexion_bdd = (new Database())->getConnexion();
    }

    //recuperer toutes infos user en bdd, par rapport a son pseudo
    public function getUserInfos($pseudo)
    {

        $requeteUser = "SELECT * FROM Utilisateur WHERE Utilisateur.pseudo= :pseudo";
        $requete_Prep = $this->connexion_bdd->prepare($requeteUser);
        $requete_Prep->execute([":pseudo" => $pseudo]);

        $user_infos = $requete_Prep->fetch(PDO::FETCH_ASSOC);
        return $user_infos;
    }
}
