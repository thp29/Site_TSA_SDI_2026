<?php
require_once 'models/EnergieModel.php';

class EnergieDashboardController
{

    // 1. Affichage de la page principale (Dashboard)
    public function gererDashboard()
    {
        if (!isset($_SESSION['id_utilisateur'])) {
            header("Location: index.php?page=energie");
            exit();
        }
        $model = new EnergieModel();
        // On récupère l'historique pour l'injecter dans la vue
        $journaux = $model->getHistoriqueJournaux($_SESSION['id_utilisateur']);
        require 'views/energie_dashboard_View.php';
    }

    // 2. LA LOGIQUE API REST (Réception du Fetch JS)
    public function sauvegarderJournalAPI()
    {
        header('Content-Type: application/json'); // On précise qu'on répond en JSON

        if (!isset($_SESSION['id_utilisateur'])) {
            echo json_encode(['statut' => 'erreur', 'message' => 'Non connecté']);
            exit();
        }

        // On lit le "colis" JSON envoyé par JavaScript
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        $model = new EnergieModel();

        // On crée d'abord le journal principal
        $id_journal = $model->creerJournal(
            $_SESSION['id_utilisateur'],
            $data['nb_cuilleres_debut'],
            $data['nb_cuilleres_fin'],
            $data['commentaires']
        );

        // On boucle sur le tableau d'activités pour les insérer une par une
        foreach ($data['activites'] as $act) {
            $model->ajouterActivite($act['nom'], $act['impact'], $act['commentaires'], $id_journal);
        }

        // On renvoie un succès au JS
        echo json_encode(['statut' => 'succes']);
        exit(); // Coupe l'exécution pour ne pas renvoyer de HTML
    }

    // 3. Affichage d'un journal en détail
    public function afficherJournalDetail()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $model = new EnergieModel();
            $journal = $model->getJournalById($_GET['id']);
            $activites = $model->getActivitesByJournal($_GET['id']);
            require 'views/journal_entier_View.php';
        } else {
            header("Location: index.php?page=energie_dashboard");
            exit();
        }
    }
}
