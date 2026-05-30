<?php
require_once 'models/Database.php';

class EnergieModel
{
    private $connexion_bdd;

    public function __construct()
    {
        $this->connexion_bdd = (new Database())->getConnexion();
    }

    // 1. Créer le journal et récupérer son ID
    public function creerJournal($id_user, $debut, $fin, $commentaires)
    {
        $sql = "INSERT INTO Journal_Suivi_Cuilleres (date_journal, nb_cuilleres_debut, nb_cuilleres_fin, commentaires, id_journal_user) 
                VALUES (CURDATE(), :debut, :fin, :comm, :id_user)";
        $stmt = $this->connexion_bdd->prepare($sql);
        $stmt->execute([
            ':debut' => $debut,
            ':fin' => $fin,
            ':comm' => $commentaires,
            ':id_user' => $id_user
        ]);
        return $this->connexion_bdd->lastInsertId(); // Retourne l'ID généré !
    }

    // 2. Ajouter une activité liée à un journal
    public function ajouterActivite($nom, $impact, $commentaires, $id_journal)
    {
        $sql = "INSERT INTO Activite (nom_activite, impact_energie, commentaires, id_journal_ref) 
                VALUES (:nom, :impact, :comm, :id_j)";
        $stmt = $this->connexion_bdd->prepare($sql);
        return $stmt->execute([
            ':nom' => $nom,
            ':impact' => $impact,
            ':comm' => $commentaires,
            ':id_j' => $id_journal
        ]);
    }

    // 3. Récupérer l'historique (avec le décompte des activités)
    public function getHistoriqueJournaux($id_user)
    {
        $sql = "SELECT J.*, COUNT(A.id_activite) as nb_activites 
                FROM Journal_Suivi_Cuilleres J
                LEFT JOIN Activite A ON J.id_journal = A.id_journal_ref
                WHERE J.id_journal_user = :id_user
                GROUP BY J.id_journal
                ORDER BY J.date_journal DESC";
        $stmt = $this->connexion_bdd->prepare($sql);
        $stmt->execute([':id_user' => $id_user]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 4. Récupérer un journal spécifique et ses activités
    public function getJournalById($id_journal)
    {
        $sql = "SELECT * FROM Journal_Suivi_Cuilleres WHERE id_journal = :id";
        $stmt = $this->connexion_bdd->prepare($sql);
        $stmt->execute([':id' => $id_journal]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getActivitesByJournal($id_journal)
    {
        $sql = "SELECT * FROM Activite WHERE id_journal_ref = :id";
        $stmt = $this->connexion_bdd->prepare($sql);
        $stmt->execute([':id' => $id_journal]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
