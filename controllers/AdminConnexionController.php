<?php
//session_start();

require_once "models/UserModel.php";

class AdminConnexionController
{

    public function gererPageAdminConnexion()
    {

        $message_erreur = "";

        $pseudo_admin = "";
        $mdp_admin = "";

        // si formulaire de connexion admin soumis
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $pseudo_admin = htmlspecialchars(trim($_POST["pseudo"]));
            $mdp_admin = htmlspecialchars(trim($_POST["password"]));

            if (empty($pseudo_admin) || empty($mdp_admin)) {
                $message_erreur = "Erreur : Champs vides, veuillez renseinger correctement vos identifiants Admin.";
            } else {
                $model = new UserModel();
                $user_infos = $model->getUserInfos($pseudo_admin); // on stocke infos user venant du modele (bdd)

                if ($user_infos) // si user existe bien en BBD
                {
                    //on verifie que le mdp du formulaire correpsond au mot de passe en bdd
                    if (password_verify($mdp_admin, $user_infos["mot_de_passe"])) {
                        if ($user_infos["role"] === 'admin') {
                            $_SESSION["pseudo"] = $pseudo_admin;
                            $_SESSION["role"] = $user_infos["role"];
                            header("Location:index.php?page=interface_admin"); //page admin dashbaord si connexion ok
                            exit();
                        } else {
                            $message_erreur = "Vous n'êtes pas autorisés à accéder à cette interface Admin";
                        }
                    } else {
                        $message_erreur = "Mot de passe incorrect.";
                    }
                } else {
                    $message_erreur = "Identifiant inconnu.";
                }
            }
        }
        require 'views/admin_connexion_View.php';
    }
}

/* 

        if (isset($_SESSION) && !=empty($_SESSION))
        {
            if(($_SESSION["role"])=== "admin")
            {

                // header view admin dahsboard
            }

            else {

                exit();
                //header adminco view
            }
        }


        // require view admin co
    }
}
**/