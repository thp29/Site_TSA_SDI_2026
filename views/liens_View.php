<?php 
// Définition des variables pour le header
$titre_page = "Liens externes - TSA SDI 95 info";
$page_actuelle = "liens";

include 'views/templates/header.php'; 
?>

<section class="hero_bienvenue">
    <h1>Liens utiles vers des ressources externes</h1>
    <div class="presentation_asso" id="pres_liens">
    <p>Besoin d’aide dans votre parcours de diagnostic et votre quotidien ? Consultez cet 
        annuaire pour accéder directement à une sélection de structures officielles, reconnues 
        et de professionnels qualifiés, recommandés par l'association. Nous sommes là pour vous 
        guider vers les démarches appropriées (par exemple pour les démarches auprès de la MDPH 
        pour la RQTH et la PCH).
    </p> 
    </div>
</section>

<main id="contenu_principal" role="main" tabindex="-1">
    <h2>&#128279 Liens ci dessous : </h2>
    <section class="grille_liens">
        <?php foreach ($liste_liens as $lien) : ?>
            <article class="carte_lien">
                <h2><?= htmlspecialchars($lien['titre_lien']) ?></h2>
                <p><?= htmlspecialchars($lien['description_courte']) ?></p>
                
                <a href="<?= htmlspecialchars($lien['url']) ?>" target="_blank" class="lien_action">
                    Visiter le site  &#8599
                </a>
            </article>
        <?php endforeach; ?>
    </section>
</main>

<?php include 'views/templates/footer.php'; ?>