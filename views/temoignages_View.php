<?php
// Définition des variables pour le header
$titre_page = "Temoignages - TSA SDI 95 info";
$page_actuelle = "temoignages";

include 'views/templates/header.php';
?>

<section class="hero_bienvenue" id="hero_temoignages">
    <h1>Témoignages </h1>
    <div class="presentation_asso" id="pres_liens">
        <p>Découvrez ci-dessous les expériences et les parcours de personnes ayant
            bénéficiés des services de l'association.
        </p>
    </div>
</section>

<main id="contenu_principal" role="main" tabindex="-1">
    <section class="grille_temoignages">

        <?php foreach ($liste_temoignages as $temoignage) : ?>
            <article class="carte_temoignage">
                <h2><?= htmlspecialchars($temoignage['nom_auteur']) ?></h2>
                <p><?= htmlspecialchars($temoignage['contenu']) ?></p><br>

                <div class="pied_card_temoignages">
                    <br>
                    <h3 class="date_temoignage">
                        Témoignage receuilli le : <?= date('d/m/Y', strtotime($temoignage['date_publication'])) ?>
                    </h3>
                </div>
            </article>
        <?php endforeach; ?>
    </section>

    <div class="main-container">
        <article class="formulaire-container" id="form-temoignage">
            <h2>Partager mon expérience</h2>
            <p id="texte-temoignage">Vous avez bénéficié de nos services ? <br> Racontez-nous votre expérience, en remplissant le formulaire dédié ci-dessous. <br>
                Votre témoignage apparaîtra ensuite ci-dessus, sur cette page.</p>


            <!-- attribut "novalidate" du formulaire, pour bloquer les affichage derreur de saisie automatique du navigateur -->
            <form action="#" method="POST" class="form_standard" novalidate>

                <p class="mention_requis"><span class="requis" aria-hidden="true">*</span> Champs obligatoires</p>

                <div class="champ_formulaire">
                    <label for="nom">Qui êtes-vous ? (Nom et prénom ou pseudo) <span class="requis" aria-label="requis">*</span> :</label>
                    <input type="text" id="nom" name="nom" value="<?= $nom_saisi ?>" autocomplete="name" placeholder="Ex: Jean Dupont" required aria-required="true">
                </div>

                <?php
                if (isset($message_erreur_nom) && !empty($message_erreur_nom)) {
                    echo '<p class="message_erreur" role="alert">' . htmlspecialchars($message_erreur_nom) . '</p>';
                }
                ?>
                <div class="champ_formulaire">
                    <label for="contenu">Votre témoignage <span class="requis" aria-label="requis">*</span> :</label>
                    <textarea id="contenu" name="contenu" rows="6" placeholder="Décrivez ici votre expérience d'accompagnement avec l'association..." required aria-required="true"><?= $contenu_saisi ?></textarea>
                </div>

                <?php
                if (isset($message_erreur_contenu) && !empty($message_erreur_contenu)) {
                    echo '<p class="message_erreur" role="alert">' . htmlspecialchars($message_erreur_contenu) . '</p>';
                }
                ?>

                <?php
                if (isset($message_erreur_champ) && !empty($message_erreur_champ)) {
                    echo '<p class="message_erreur" role="alert">' . htmlspecialchars($message_erreur_champ) . '</p>';
                }
                ?>
                <button type="submit" class="bouton_action btn_large" id="envoyer-temoignage">
                    Je partage mon témoignage. &#9993;
                </button>

            </form>

            <?php
            // Affichage du message de succès ou d'erreur après la soumission du formulaire
            if (isset($message_succes) && !empty($message_succes)) {
                echo '<p class="message_succes" aria-live="polite">' . htmlspecialchars($message_succes) . '</p>';
            }
            if (isset($message_erreur_envoi) && !empty($message_erreur_envoi)) {
                echo '<p class="message_erreur" role="alert">' . htmlspecialchars($message_erreur_envoi) . '</p>';
            }
            ?>
        </article>
    </div>
</main>

<?php include 'views/templates/footer.php'; ?>