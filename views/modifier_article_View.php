<?php
// Définition des variables pour le header
$titre_page = "Interface Admin Modifer Article - TSA SDI 95 info";
$page_actuelle = "modifier_article";

// Inclusion de l'en-tête
include 'views/templates/header.php';
?>

<section class="hero_bienvenue" id="here_ajouter_article">
    <h1>Interface Admin
    </h1>
    <div class="presentation_asso">
        <p><strong>Cet espace est réservé à l'interface d'administration de TSA SDI 95 INFO.
                <br>Vous pouvez modifier l'article sélectionné, grâce au formulaire dédié ci-dessous.
            </strong>
            <br>
            <br>
        </p>
    </div>

    <main id="contenu_principal" role="main" tabindex="-1">
        <section class="missions_asso">
            <section class="missions_asso">


                <div class="main-container">


                    <article class="formulaire-container">
                        <h2>Modifier l'article</h2>


                        <!-- attribut "novalidate" du formulaire, pour bloquer les affichage derreur de saisie automatique du navigateur -->
                        <form action="#" method="POST" class="form_standard" novalidate>

                            <!-- input cachée pour conserver "id article" !, car une fois formulauire validé en post (get id disparaitra de lurl)
                              et on en a besoin dans le controlleur pour indiquer quel article on modifier avec requete update -->
                            <input type="hidden" name="id_article" value="<?= $id_article_amodifier ?>">

                            <p class="mention_requis"><span class="requis" aria-hidden="true">*</span> Champs obligatoires</p>

                            <div class="champ_formulaire">
                                <label for="titre">Titre de l'article <span class="requis" aria-label="requis">*</span> :</label>
                                <input type="text" id="titre" name="titre" placeholder="Ex: L'historique de notre association..." value="<?= $titre_saisi ?>" aria-required="true">
                            </div>

                            <div class="champ_formulaire">
                                <label for="categorie">Catégorie de l'article <span class="requis" aria-label="requis">*</span> :</label>
                                <select id="categorie" name="categorie" required aria-required="true">
                                    <option value="">--Veuillez choisir une catégorie dans cette liste--</option>
                                    <option value="livre" <?= ($categorie_saisi === "livre") ? 'selected' : '' ?>>Catégorie "Livres"</option>
                                    <option value="objets" <?= ($categorie_saisi === "objets") ? 'selected' : '' ?>>Catégorie "objets"</option>
                                    <option value="article" <?= ($categorie_saisi === "article") ? 'selected' : '' ?>>Catégorie "Articles (à propos de l'asso/du TSA SDI etc)"</option>
                                </select>
                            </div>

                            <div class=" champ_formulaire">
                                <label for="image_url">Lien (url) de l'image décorative de l'article <span class="requis" aria-label="requis">Optionnel</span> :</label>
                                <input type="text" id="image_url" name="image_url" placeholder="Ex: https://media.hachette.fr/fit-in/500x500/imgArticle/MARABOUT/2020/9782501159685-001-X.jpeg" value="<?= $image_url_saisi ?>">
                            </div>

                            <div class="champ_formulaire">
                                <label for="contenu_article">Contenu (texte) de l'article <span class="requis" aria-label="requis">*</span> :</label>
                                <textarea id="contenu_article" name="contenu_article" rows="6" placeholder="Ecrivez le contenu de l'article dans cette zone..." required aria-required="true"><?= $contenu_saisi ?></textarea>
                            </div>

                            <button type="submit" class="bouton_action btn_large">
                                Je valide mes modifications de cet article
                            </button>

                        </form>

                        <div class="lien_retour_all_articles">
                            <a href="index.php?page=interface_admin" class="lien_action">← Revenir à l'acceuil de l'interface Admin</a>
                        </div>

                        <?php
                        // Affichage du message de succès ou d'erreur après la soumission du formulaire
                        if (isset($message_succes) && !empty($message_succes)) {
                            echo '<p class="message_succes" role="alert">' . htmlspecialchars($message_succes) . '</p>';
                        }
                        if (isset($message_erreur) && !empty($message_erreur)) {
                            echo '<p class="message_erreur" role="alert">' . htmlspecialchars($message_erreur) . '</p>';
                        }
                        ?>
                    </article>

                </div>

            </section>

    </main>

    <?php
    // Inclusion du pied de page
    include 'views/templates/footer.php';
    ?>