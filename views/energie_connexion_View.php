<?php
$titre_page = "Connexion & Inscription - Mon suivi d'énergie";
$page_actuelle = "energie";
include 'views/templates/header.php';
?>

<section class="hero_bienvenue">
    <h1>Vous voulez apprendre à mieux gérer votre énergie ? </h1>
    <div class="presentation_asso">
        <p> Cet outil interactif vous permet d'évaluer et de gérer votre jauge d'énergie quotidienne.<br>
            Connectez-vous pour accéder au suivi du jour et à votre historique.<br>
            Si vous n’êtes pas encore inscrit, créez votre compte grâce au formulaire d’inscription ci-dessous,<br>
            Vous pourrez ensuite vous connectez pour accéder à votre outil personnel</p>
    </div>
</section>

<main id="contenu_principal" role="main" tabindex="-1">
    <section class="missions_asso">

        <div class="main-container">

            <article class="formulaire-container">
                <h2>Me connecter</h2>

                <p> Entrez vos identifiants, dans le formulaire de connexion ci-dessous, pour accéder à votre espace personnel et commencer votre suivi.</p>


                <form action="#" method="POST" class="form_standard" novalidate>
                    <input type="hidden" name="action" value="connexion">

                    <div class="champ_formulaire">
                        <label for="pseudo_conn">Mon pseudo :</label>
                        <input type="text" id="pseudo_conn" name="pseudo_conn" value="<?= isset($pseudo_connexion) ? $pseudo_connexion : '' ?>" required aria-required="true">
                    </div>

                    <div class="champ_formulaire">
                        <label for="password_conn">Mon mot de passe :</label>
                        <input type="password" id="password_conn" name="password_conn" required aria-required="true">
                    </div>

                    <button type="submit" class="bouton_action btn_large">Je me connecte</button>
                </form>

                <?php if (!empty($erreur_connexion)): ?>
                    <p class="message_erreur" role="alert"><?= $erreur_connexion ?></p>
                <?php endif; ?>
            </article>


            <article class="formulaire-container">
                <h2>Créer un compte</h2>

                <form action="#" method="POST" class="form_standard" novalidate>
                    <input type="hidden" name="action" value="inscription">

                    <p class="mention_requis"><span class="requis" aria-hidden="true">*</span> Tous les champs sont obligatoires</p>

                    <div class="champ_formulaire">
                        <label for="pseudo_ins">Choisir un pseudo <span class="requis">*</span> :</label>
                        <input type="text" id="pseudo_ins" name="pseudo_ins" value="<?= isset($pseudo_inscription) ? $pseudo_inscription : '' ?>" placeholder="Ex: Alex95" required aria-required="true">
                    </div>

                    <div class="champ_formulaire">
                        <label for="password_ins">Choisir un mot de passe <span class="requis">*</span> :</label>
                        <input type="password" id="password_ins" name="password_ins" required aria-required="true">
                    </div>

                    <div class="champ_formulaire">
                        <label for="password_confirm">Confirmer le mot de passe <span class="requis">*</span> :</label>
                        <input type="password" id="password_confirm" name="password_confirm" required aria-required="true">
                    </div>

                    <button type="submit" class="bouton_action btn_large">Je crée mon compte</button>
                </form>

                <?php if (!empty($erreur_inscription)): ?>
                    <p class="message_erreur" role="alert"><?= $erreur_inscription ?></p>
                <?php endif; ?>

                <?php if (!empty($succes_inscription)): ?>
                    <p class="message_succes" role="alert"><?= $succes_inscription ?></p>
                <?php endif; ?>
            </article>

        </div>
    </section>
</main>

<?php include 'views/templates/footer.php'; ?>