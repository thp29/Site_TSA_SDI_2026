<?php
$titre_page = "Mon Suivi de la Fatigue";
$page_actuelle = "energie";
include 'views/templates/header.php';
?>

<section class="hero_bienvenue" id="hero-energie">

    <h1><svg aria-hidden="true" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icone-nav">
            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
        </svg>Mon Suivi de la Fatigue</h1>

    <div class="presentation_asso">
        <p> Découvrez « Mon Suivi de la Fatigue », notre outil numérique conçu pour vous.<br>
            Utilisez-le pour mesurer votre niveau d'énergie, anticiper les surcharges et mieux gérer votre quotidien.
        </p>
    </div>
    <div class="deconnexion-energie">
        <a href="index.php?page=deconnexion_energie" class="lien_action bouton_quitter">Je me déconnecte de mon outil de suivi</a>
    </div>
</section>



<main id="contenu_principal" role="main" tabindex="-1">
    <div class="main-container" id="grille_energie">

        <article class="formulaire-container">
            <h2>Suivi quotidien de ma fatigue 🥄</h2>

            <p>
                Le formulaire ci-dessous vous permet de suivre votre niveau d’énergie dans votre journée selon les activités que vous avez/allez réaliser.<br><br>
                Commencez votre journée en renseignant votre niveau d'énergie initial (vos "cuillères").<br><br>Ensuite, ajoutez chaque activité de votre journée,
                indiquez son impact sur votre réserve d'énergie (de -15 à +15), et ajoutez vos commentaires pour un suivi complet.<br><br>
                Enfin, enregistrez votre journal (le récaptitulatif de vos activités de cette journéé et vos niveaux de fatigue) une fois toutes les activités ajoutées.
            </p>

            <div class="affichage_energie">
                <p class="texte_label_energie"><strong> Mon niveau de cuillères / d’énergie actuel :</strong></p>
                <strong id="energie_actuelle">12</strong>
            </div>

            <div class="champ_formulaire conteneur_table_activites">
                <h3>Activités de votre session du jour :</h3>
                <table class="table-admin table_activites_dynamique">
                    <thead>
                        <tr>
                            <th>Numéro / ordre de l'activité</th>
                            <th>Nom de l'activité</th>
                            <th>Impact sur votre niveau d'énergie 🥄</th>
                            <th>Commentaires</th>
                        </tr>
                    </thead>
                    <tbody id="corps_table_activites">
                        <tr id="aucun_engagement">
                            <td colspan="4">Aucune activité ajoutée pour le moment.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <form id="form_suivi_energie" class="form_standard" novalidate>

                <div class="champ_formulaire">
                    <label for="energie_initiale">Renseigner ici votre niveau d'énérgie au début de cette session (🥄 Cuillères) :</label>
                    <input type="number" id="energie_initiale" name="energie_initiale" value="12" required>
                </div>

                <div class="champ_formulaire">
                    <label for="nom_activite">Nom de l'activité :</label>
                    <input type="text" id="nom_activite" name="nom_activite" placeholder="Ex: Trajet en métro, Réunion...">
                </div>

                <div class="champ_formulaire">
                    <label for="impact_energie">Impact (de -15 à +15 cuillères 🥄) sur mon énergie :</label>
                    <input type="number" id="impact_energie" name="impact_energie" placeholder="Ex: -3 ou +2">
                </div>

                <div class="champ_formulaire">
                    <label for="commentaires_activite">Commentaires à propos de cette activité :</label>
                    <textarea id="commentaires_activite" name="commentaires_activite" rows="2" placeholder="Sensations, contexte..."></textarea>
                </div>

                <button type="button" id="btn_ajouter_activite" class="bouton_action btn_large">
                    J'enregistre cette activité dans ma session du jour
                </button>

                <button type="button" id="btn_enregistrer_journal" class="bouton_action btn_large btn_valider_journal">
                    J'ENREGISTRE MON JOURNAL DU JOUR
                </button>
            </form>
            <div id="message_retour_api" role="alert" aria-live="polite"></div>
        </article>

        <article class="formulaire-container">
            <h2>Historique de mon suivi</h2>

            <div id="container-article" class="conteneur_historique_journaux">
                <?php if (empty($journaux)): ?>
                    <p><em>Aucun journal enregistré pour le moment.</em></p>
                <?php else: ?>
                    <?php foreach ($journaux as $journal): ?>
                        <div class="apercu_article journal_apercu">
                            <h3>Journal du <?= date('d/m/Y', strtotime($journal['date_journal'])) ?></h3>
                            <p class="infos_energie">Énergie : <strong><?= $journal['nb_cuilleres_debut'] ?> 🥄</strong> ➔ <strong><?= $journal['nb_cuilleres_fin'] ?> 🥄</strong></p>
                            <p class="infos_activites">Activités enregistrées : <?= $journal['nb_activites'] ?></p>
                            <a href="index.php?page=journal_detail&id=<?= $journal['id_journal'] ?>" class="lien_action">Lire le journal en entier</a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </article>

        <aside class="presentation_asso" id="apropos-energie">
            <h2>À propos de la fatigabilité avec le TSA</h2>
            <p>
                La fatigabilité dans le TSA SDI se manifeste souvent par une forme d'épuisement chronique et cognitif qui va au-delà de la simple fatigue.
                Souvent invisible, cette fatigue quotidienne affecte profondément la qualité de vie.
            </p>

            <p>
                Elle s'explique par un traitement différent des informations. Le cerveau filtre moins les stimuli extérieurs (comme le bruit, la lumiére, les contacts sociaux etc).
                Cela demande un effort d'adaptation constant.
            </p>

            <p>
                À cela s'ajoute le "camouflage social". Faire des efforts pour masquer ses difficultés et s'adapter aux normes sociales demande une énergie importante.
                Gérer les imprévus ou les changements fatigue également très vite le système nerveux.
            </p>

            <p>
                Gérer son quotidien revient donc à constamment gérer une réserve d'énergie limitée. <br>
                Notre outil est conçu pour vous aider à visualiser et tenter de mieux "gérer" votre fatiguabilité au jour le jour.
                L'objectif est d'éviter les surcharges et de mieux anticiper vos besoins de repos, selon vos propres particularités.
            </p>
            <p>
                <strong>Ressources pour approfondir sur la théorie des cuillères / la fatiguabilité liée au handicap :</strong><br><br>
                <a href="https://fr.wikipedia.org/wiki/Th%C3%A9orie_des_cuill%C3%A8res" target="_blank" rel="noopener noreferrer" class="lien_action">Lire un article Wikipédia à propos de la "Théorie des Cuillères"</a><br><br>
                <a href="https://youtu.be/joucXLKXbO8" target="_blank" rel="noopener noreferrer" class="lien_action">Regarder 1 vidéo explicative (Lien externe YouTube)</a>
            </p>
        </aside>



    </div>
</main>

<script src="assets/js/energie_async.js"></script>

<?php include 'views/templates/footer.php'; ?>