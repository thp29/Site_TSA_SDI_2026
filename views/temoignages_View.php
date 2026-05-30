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
                <h2><?= htmlspecialchars($temoignage['pseudo']) ?></h2>
                <p><?= htmlspecialchars($temoignage['contenu']) ?></p><br>

                <div class="pied_card_temoignages">
                    <br>
                    <h3 class="date_temoignage">
                        Receuilli le : <?= date('d/m/Y', strtotime($temoignage['date_publication'])) ?>
                    </h3>
                </div>


            </article>
        <?php endforeach; ?>
    </section>
</main>

<?php include 'views/templates/footer.php'; ?>