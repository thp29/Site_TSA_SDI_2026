<?php

require_once "models/UserModel.php";

class EnergieConnexionController
{
    public function gererConnexionEnergie()
    {

        /*** si on est deja connecté et qu on veut acceder à l'outil via menu nav, redirigé vers dashboard directement sans passer par page de connexion! */
        if (isset($_SESSION["id_utilisateur"])) {
            header("Location: index.php?page=energie_dashboard");
            exit(); // On coupe le code ici pour ne pas charger le formulaire HTML
        }

        // Variables pour gérer les messages et pré-remplir les champs
        $erreur_connexion = "";
        $erreur_inscription = "";
        $succes_inscription = "";

        $pseudo_connexion = "";
        $pseudo_inscription = "";

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $model = new UserModel();

            // ==========================================
            // 1. GESTION DE L'INSCRIPTION
            // ==========================================
            if (isset($_POST["action"]) && $_POST["action"] === "inscription") {

                $pseudo_inscription = htmlspecialchars(trim($_POST["pseudo_ins"]));
                $mdp_ins = htmlspecialchars(trim($_POST["password_ins"]));
                $mdp_confirm = htmlspecialchars(trim($_POST["password_confirm"]));

                if (empty($pseudo_inscription) || empty($mdp_ins) || empty($mdp_confirm)) {
                    $erreur_inscription = "Veuillez remplir tous les champs d'inscription.";
                } elseif ($mdp_ins !== $mdp_confirm) {
                    $erreur_inscription = "Les mots de passe ne correspondent pas.";
                } else {
                    // Vérifier si le pseudo existe déjà
                    $user_existant = $model->getUserInfos($pseudo_inscription);

                    if ($user_existant) {
                        $erreur_inscription = "Ce pseudo est déjà pris, veuillez en choisir un autre.";
                    } else {
                        // Hachage du mot de passe pour la sécurité
                        $mdp_hache = password_hash($mdp_ins, PASSWORD_DEFAULT);

                        // Création en base de données
                        $creation_ok = $model->creerUtilisateur($pseudo_inscription, $mdp_hache);

                        if ($creation_ok) {
                            // On connecte directement l'utilisateur après son inscription
                            $succes_inscription = "Votre inscription a bien été effectuée. Vous pouvez maintenant vous connecter grâce au formulaire de connexion.";
                            // 2. On vide la variable du pseudo pour que le formulaire redevienne vierge
                            $pseudo_inscription = "";
                        } else {
                            $erreur_inscription = "Erreur lors de la création du compte.";
                        }
                    }
                }
            }

            // ==========================================
            // 2. GESTION DE LA CONNEXION
            // ==========================================
            elseif (isset($_POST["action"]) && $_POST["action"] === "connexion") {

                $pseudo_connexion = htmlspecialchars(trim($_POST["pseudo_conn"]));
                $mdp_conn = htmlspecialchars(trim($_POST["password_conn"]));

                if (empty($pseudo_connexion) || empty($mdp_conn)) {
                    $erreur_connexion = "Veuillez renseigner votre pseudo et mot de passe.";
                } else {
                    $user_infos = $model->getUserInfos($pseudo_connexion);

                    if ($user_infos && password_verify($mdp_conn, $user_infos["mot_de_passe"])) {
                        // SUCCÈS
                        $_SESSION["id_utilisateur"] = $user_infos["id_utilisateur"];
                        $_SESSION["pseudo"] = $user_infos["pseudo"];

                        header("Location: index.php?page=energie_dashboard");
                        exit();
                    } else {
                        $erreur_connexion = "Identifiant ou mot de passe incorrect.";
                    }
                }
            }
        }

        // On affiche la vue en lui transmettant toutes nos variables
        require 'views/energie_connexion_View.php';
    }
}
