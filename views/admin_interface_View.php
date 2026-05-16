<?php
// Définition des variables pour le header
$titre_page = "Interface Admin - TSA SDI 95 info";
$page_actuelle = "interface_admin";

// Inclusion de l'en-tête
include 'views/templates/header.php';
?>

<section class="hero_bienvenue" id="presentation_admin">
    <h1>Interface Admin
    </h1>
    <div class="presentation_asso">
        <p><strong>Cet espace est réservé à l'interface d'administration de TSA SDI 95 INFO. <br>Vous pouvez consulter les données admin
                (articles, liens, témoignages etc) et les modifier/supprimer, ou en créer de nouvelles, via les tableaux dédiés ci-dessous.
            </strong>
            <br>
            <br>
        </p>
    </div>

    <main id="contenu_principal" role="main" tabindex="-1">
        <section class="missions_asso">
            <div class="main-container">

                <article class="tableau_admin">
                    <h2>Gestion des Articles</h2>
                    <br>
                    <br>

                    <a href="index.php?action=ajouter_article" class="lien_action">Créer un nouvel article</a>
                    <br>

                    <table class="table-admin">
                        <thead>
                            <tr>
                                <th>Titre de l'article</th>
                                <th>catégorie </th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($articles as $article): ?>
                                <tr>
                                    <td><?= htmlspecialchars($article["titre"]) ?></td>
                                    <td><?= htmlspecialchars($article["categorie"])   ?></td>
                                    <td><?= date('d/m/Y', strtotime($article['date_ajout'])) ?></td>

                                    <td>
                                        <a href="index.php?action=modifier_article&id=<?= $article["id_article"] ?>" class=" lien_action">Modifier</a>

                                        <a href="index.php?action=supprimer_article&id=<?= $article["id_article"] ?>" class="lien_action" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">Supprimer</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </article>
            </div>
        </section>
    </main>

    <?php
    // Inclusion du pied de page
    include 'views/templates/footer.php';
    ?>