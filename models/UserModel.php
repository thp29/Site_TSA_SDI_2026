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

    // Créer un nouvel utilisateur (pour l'inscription à l'outil énergie)
    public function creerUtilisateur($pseudo, $mot_de_passe_hache)
    {
        // On force le rôle à "utilisateur" par défaut pour des raisons de sécurité
        $requeteInsert = "INSERT INTO Utilisateur (pseudo, mot_de_passe, role) VALUES (:pseudo, :mdp, 'utilisateur')";
        $requete_Prep = $this->connexion_bdd->prepare($requeteInsert);

        $creation_reussie = $requete_Prep->execute([
            ":pseudo" => $pseudo,
            ":mdp" => $mot_de_passe_hache
        ]);

        return $creation_reussie;
    }
}
