<?php
// Définition des variables pour le header
$titre_page = "Contactez-nous - TSA SDI 95 info";
$page_actuelle = "contact";

// Inclusion de l'en-tête
include 'views/templates/header.php';
?>

<section class="hero_bienvenue" id ="presentation_contact">
    <h1>Contactez-nous 
        <svg aria-hidden="true" width="42" height="42" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icone-titre">
        <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
    </svg></h1>
    <div class="presentation_asso">
        <p>
            <strong>Vous êtes concerné.e par le TSA SDI ou vous vous questionnez sur un diagnostic ?</strong><br> </p>
            <p id = "texte_info_contact">Contactez-nous pour poser vos questions, obtenir des informations sur les démarches de diagnostic, ou demander de l'aide et une orientation. <br>
                Vous pouvez utiliser ce formulaire ou nous contacter directement par téléphone. <br>
                Nous vous répondrons dans les meilleurs délais.</p>
    </div>
</section>

<main id="contenu_principal" role="main" tabindex="-1">
    
    <div class="main-container">
        
        <article class="formulaire-contact">
            <h2>Envoyer un message</h2>
            
            
           <!-- attribut "novalidate" du formulaire, pour bloquer les affichage derreur de saisie automatique du navigateur -->
           <form action="#" method="POST" class="form_standard" novalidate>
                
                <p class="mention_requis"><span class="requis" aria-hidden="true">*</span> Champs obligatoires</p>

               <div class="champ_formulaire">
                    <label for="nom">Vos coordonnées (Nom / Prénom) <span class="requis" aria-label="requis">*</span> :</label>
                    <input type="text" id="nom" name="nom" value ="<?= $nom_saisi ?>" autocomplete="name" placeholder="Ex: Jean Dupont" required aria-required="true">
                </div>

                <div class="champ_formulaire">
                    <label for="email">Votre adresse e-mail <span class="requis" aria-label="requis">*</span> :</label>
                    <small class="aide-email">(Format attendu : nom@domaine.com)</small>
                    <input type="email" id="email" name="email"  value ="<?= $email_saisi ?>" autocomplete="email" placeholder="jean.dupont@exemple.com" required aria-required="true">
                </div>

                <div class="champ_formulaire">
                    <label for="sujet">Sujet de votre demande <span class="requis" aria-label="requis">*</span> :</label>
                    <input type="text" id="sujet" name="sujet" value ="<?= $sujet_saisi ?>" placeholder="Ex: Demande de renseignement diagnostic" required aria-required="true">
                </div>

                <div class="champ_formulaire">
                    <label for="message">Vos questions / Votre message <span class="requis" aria-label="requis">*</span> :</label>
                    <textarea id="message" name="message" rows="6" placeholder="Décrivez votre situation et vos questions ici..." required aria-required="true"><?= $message_saisi ?></textarea>
                </div>

                <button type="submit" class="bouton_action btn_large">
                    &#9993 Je transmets mon message à l'association
                </button>
                
            </form>
            
            <?php
            // Affichage du message de succès ou d'erreur après la soumission du formulaire
            if (isset($message_succes)&& !empty($message_succes)) {
                echo '<p class="message_succes" role="alert">' . htmlspecialchars($message_succes) . '</p>';
            } 
            if (isset($message_erreur)&& !empty($message_erreur)) {
                echo '<p class="message_erreur" role="alert">' . htmlspecialchars($message_erreur) . '</p>';
            }
            ?>
        </article>

    </div>

</main>

<?php 
// Inclusion du pied de page
include 'views/templates/footer.php';
?>