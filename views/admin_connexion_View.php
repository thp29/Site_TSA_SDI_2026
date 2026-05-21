<?php
// Définition des variables pour le header
$titre_page = "Connexion à l'interface Admin - TSA SDI 95 info";
$page_actuelle = "admin";

// Inclusion de l'en-tête
include 'views/templates/header.php';
?>

<section class="hero_bienvenue" id="presentation_admin">
    <h1>Interface Admin

    </h1>
    <div class="presentation_asso">
        <p><strong>Cet espace est réservé à l'interface d'administration de TSA SDI 95 INFO.
                Veuillez vous connecter grâce au formulaire de connexion ci-dessous, avec votre pseudo/mot de passe, pour accéder aux
                fonctionnalités de gestion du site et du contenu.
            </strong>
        </p>
    </div>
</section>

<main id="contenu_principal" role="main" tabindex="-1">
    <section class="missions_asso">


        <div class="main-container">


            <article class="formulaire-container">
                <h2>Connexion</h2>


                <!-- attribut "novalidate" du formulaire, pour bloquer les affichage derreur de saisie automatique du navigateur -->

                <!-- action="#" (ou laisser l'attribut vide) signifie : "Renvoie les données exactement à la même adresse URL où on se trouve actuellement".-->
                <form action="#" method="POST" class="form_standard" novalidate>

                    <p class="mention_requis"><span class="requis" aria-hidden="true">*</span> Champs obligatoires</p>

                    <div class="champ_formulaire">
                        <label for="pseudo">Votre pseudo <span class="requis" aria-label="requis">*</span> :</label>
                        <input type="text" id="pseudo" name="pseudo" value="<?= isset($pseudo_admin) ? $pseudo_admin : '' ?>" autocomplete="pseudo" placeholder="Ex: Admin_1" required aria-required="true">
                    </div>

                    <div class="champ_formulaire">
                        <label for="password">Votre mot de passe<span class="requis" aria-label="requis">*</span> :</label>
                        <input type="password" id="password" name="password" required aria-required="true">
                    </div>

                    <button type="submit" class="bouton_action btn_large">
                        J'accéde à l'interface Admin
                    </button>

                </form>

                <?php
                // Affichage du message de succès ou d'erreur après la soumission du formulaire
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