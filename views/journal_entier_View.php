<?php
$titre_page = "Détail du journal - Suivi d'énergie";
$page_actuelle = "energie";
include 'views/templates/header.php';
?>

<main id="contenu_principal" role="main" tabindex="-1">

    <article class="article-detail article_journal_detail">

        <div class="lien_retour_all_articles entete_journal_detail">
            <a href="index.php?page=energie_dashboard" class="lien_action">← Retour à mon tableau de bord de suivi d'énergie</a>
        </div>

        <h1 class="titre_journal_detail">Journal du <?= date('d/m/Y', strtotime($journal['date_journal'])) ?></h1>

        <div class="resume_energie_journal">
            <p>Énergie au réveil : <strong><?= $journal['nb_cuilleres_debut'] ?> 🥄</strong></p>
            <p>Énergie restante à la fin de la session : <strong><?= $journal['nb_cuilleres_fin'] ?> 🥄</strong></p>
        </div>

        <h2 class="sous_titre_journal">Activités de la journée</h2>

        <table class="table-admin table_activites_journal">
            <thead>
                <tr>
                    <th>Nom de l'activité</th>
                    <th>Impact sur mon énergie</th>
                    <th>Commentaires et ressentis</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($activites)): ?>
                    <tr>
                        <td colspan="3" style="text-align: center;">Aucune activité détaillée pour ce jour.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($activites as $act): ?>
                        <tr>
                            <td data-label="Activité"><strong><?= htmlspecialchars($act['nom_activite']) ?></strong></td>
                            <td data-label="Impact" class="cellule_impact_energie">
                                <?= ($act['impact_energie'] > 0 ? '+' : '') . $act['impact_energie'] ?> 🥄
                            </td>
                            <td data-label="Commentaires"><?= nl2br(htmlspecialchars($act['commentaires'])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

    </article>
</main>

<?php include 'views/templates/footer.php'; ?>