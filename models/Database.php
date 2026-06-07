<?php

class Database

{
    private $connexion_bdd = null;

    public function getConnexion()
    {
        // Si la connexion n'a pas encore été faite, on la crée
        if ($this->connexion_bdd === null) {
            try {
                // 1. Le DSN : On dit qu'on utilise mysql, que le serveur est local (localhost), 
                // que la base s'appelle "tsa_sdi_95" et qu'on veut lire les accents correctement (utf8)
                $dsn = 'mysql:host=localhost;dbname=TSA_SDI_95_INFO_BDD;charset=utf8';

                //$dsn = 'mysql:host=localhost;dbname=p27_theo;charset=utf8';

                // 2. Le nom d'utilisateur de ton ordinateur (par défaut sur XAMPP/WAMP, c'est 'root')
                $utilisateur = 'root';

                //$utilisateur = 'theo';

                // 3. Le mot de passe (par défaut sur XAMPP/WAMP, c'est vide. Sur MAMP/Mac, c'est 'root')
                $mot_de_passe = '';

                //$mot_de_passe = 'damhimdedhyhes3';

                // ON CRÉE LE PONT ET ON LE RANGE DANS NOTRE VARIABLE $bdd !
                $this->connexion_bdd = new PDO($dsn, $utilisateur, $mot_de_passe);

                // permet affichage erreurs SQL
                $this->connexion_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }

            // En cas d'erreur de connexion, on arrête tout et on affiche le message
            catch (PDOException $e) {
                // On attrape l'erreur si le serveur MySQL est éteint
                die('Erreur de connexion à la base de données : ' . $e->getMessage());
            }
        }
        return $this->connexion_bdd;
    }
}
