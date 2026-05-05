<?php


/*
//Les identifiants de ma base de données MySQL côté serveur 
// distant handiman
define('DB_HOST', "localhost"); // on laise localhost
define('DB_NAME', "p27_theo"); // votre base de données
define('DB_USER', "theo"); // votre id utilisateur
define('DB_PASSWORD', "damhimedhyhes3"); // votre mdp
*/

/* pour connexion en local XAMPP */
/*
define('DB_HOST', "localhost"); // on laise localhost
define('DB_NAME', "mini_projet_theo"); // votre base de données
define('DB_USER', "root"); // votre id utilisateur
define('DB_PASSWORD', ""); // votre mdp
*/


class ArticlesModel

{


    private $connexion_bdd;

    public function __construct()
    {

        try 
        {
                // 1. Le DSN : On dit qu'on utilise mysql, que le serveur est local (localhost), 
            // que la base s'appelle "tsa_sdi_95" et qu'on veut lire les accents correctement (utf8)
            $dsn = 'mysql:host=localhost;dbname=TSA_SDI_95_INFO_BDD;charset=utf8';

            // 2. Le nom d'utilisateur de ton ordinateur (par défaut sur XAMPP/WAMP, c'est 'root')
            $utilisateur = 'root';

            // 3. Le mot de passe (par défaut sur XAMPP/WAMP, c'est vide. Sur MAMP/Mac, c'est 'root')
            $mot_de_passe = '';

            // ON CRÉE LE PONT ET ON LE RANGE DANS NOTRE VARIABLE $bdd !
            $this->connexion_bdd= new PDO($dsn, $utilisateur, $mot_de_passe);

            // permet affichage erreurs SQL
            $this->connexion_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } 

        // En cas d'erreur de connexion, on arrête tout et on affiche le message
        catch (PDOException $e)
        {
            // On attrape l'erreur si le serveur MySQL est éteint
            die('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }

    public function getAllArticles ()
    {
        $requete_ALL= "SELECT * FROM Articles ORDER BY date_ajout DESC";
        $requete_ALL_Prep = $this->connexion_bdd->prepare($requete_ALL);
        $requete_ALL_Prep->execute();

        $tab_All_Articles=$requete_ALL_Prep->fetchAll(PDO::FETCH_ASSOC); // fetch assoc= donnees classé par nom colonnes
        return $tab_All_Articles;
    }

    public function getArticlesParCategorie ($categorie)
    {
        $requete_cat= "SELECT * FROM Articles WHERE categorie = :cat ORDER BY date_ajout DESC"; // on passe "cat" en paramètre et on la "relie "
        //  à la vrai variable, apres prepare, quand "execute", pour secu !

        $requete_cat_Prep = $this->connexion_bdd->prepare($requete_cat);
        $requete_cat_Prep->execute([":cat"=>$categorie]);

        $tab_Articles_filtre=$requete_cat_Prep->fetchAll(PDO::FETCH_ASSOC); // fetch assoc= donnees classé par nom colonnes
        return $tab_Articles_filtre;
    }

    public function getArticleParID ($id)
    {
        $requete_id= "SELECT * FROM Articles WHERE id_article = :id"; 

        $requete_id_Prep = $this->connexion_bdd->prepare($requete_id);
        $requete_id_Prep->execute([":id"=>$id]);

        $article_par_id=$requete_id_Prep->fetch(PDO::FETCH_ASSOC); // fetch assoc= donnees classé par nom colonnes
        return $article_par_id;
    }
}

    

    

?>