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

require_once 'models/Database.php';

class ArticlesModel

{


    private $connexion_bdd;

    public function __construct()
    {

        // on recupere la connexion etablie par "Database.php"
        $this->connexion_bdd = (new Database())->getConnexion();
    }



    public function getAllArticles()
    {
        $requete_ALL = "SELECT * FROM Articles ORDER BY date_ajout DESC";
        $requete_ALL_Prep = $this->connexion_bdd->prepare($requete_ALL);
        $requete_ALL_Prep->execute();

        $tab_All_Articles = $requete_ALL_Prep->fetchAll(PDO::FETCH_ASSOC); // fetch assoc= donnees classé par nom colonnes
        return $tab_All_Articles;
    }


    public function getArticlesParCategorie($categorie)
    {
        $requete_cat = "SELECT * FROM Articles WHERE categorie = :cat ORDER BY date_ajout DESC"; // on passe "cat" en paramètre et on la "relie "
        //  à la vrai variable, apres prepare, quand "execute", pour secu !

        $requete_cat_Prep = $this->connexion_bdd->prepare($requete_cat);
        $requete_cat_Prep->execute([":cat" => $categorie]);

        $tab_Articles_filtre = $requete_cat_Prep->fetchAll(PDO::FETCH_ASSOC); // fetch assoc= donnees classé par nom colonnes
        return $tab_Articles_filtre;
    }

    public function getArticleParID($id)
    {
        // requet sql inner joint pour recuperer pseudo auteur de larticle
        $requete_id = "SELECT Articles.*, Utilisateur.pseudo FROM Articles  
                    INNER JOIN Utilisateur ON Articles.id_auteur = Utilisateur.id_utilisateur 
                    WHERE Articles.id_article = :id";

        $requete_id_Prep = $this->connexion_bdd->prepare($requete_id);
        $requete_id_Prep->execute([":id" => $id]);

        $article_par_id = $requete_id_Prep->fetch(PDO::FETCH_ASSOC); // fetch assoc= donnees classé par nom colonnes
        return $article_par_id;
    }
}
