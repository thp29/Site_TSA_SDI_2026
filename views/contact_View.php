<?php
// Définition des variables pour le header
$titre_page = "Contactez-nous - TSA SDI 95 info";
$page_actuelle = "contact";

// Inclusion de l'en-tête
include 'views/templates/header.php';
?>

<section class="hero_bienvenue" id ="presentation_contact">
    <h1>Contactez-nous</h1>
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
            
            

           <form action="#" method="POST" class="form_standard">
                
                <p class="mention_requis"><span class="requis" aria-hidden="true">*</span> Champs obligatoires</p>

               <div class="champ_formulaire">
                    <label for="nom">Vos coordonnées (Nom / Prénom) <span class="requis" aria-label="requis">*</span> :</label>
                    <input type="text" id="nom" name="nom" autocomplete="name" placeholder="Ex: Jean Dupont" required aria-required="true">
                </div>

                <div class="champ_formulaire">
                    <label for="email">Votre adresse e-mail <span class="requis" aria-label="requis">*</span> :</label>
                    <small class="aide-email">(Format attendu : nom@domaine.com)</small>
                    <input type="email" id="email" name="email" autocomplete="email" placeholder="jean.dupont@exemple.com" required aria-required="true">
                </div>

                <div class="champ_formulaire">
                    <label for="sujet">Sujet de votre demande <span class="requis" aria-label="requis">*</span> :</label>
                    <input type="text" id="sujet" name="sujet" placeholder="Ex: Demande de renseignement diagnostic" required aria-required="true">
                </div>

                <div class="champ_formulaire">
                    <label for="message">Vos questions / Votre message <span class="requis" aria-label="requis">*</span> :</label>
                    <textarea id="message" name="message" rows="6" placeholder="Décrivez votre situation et vos questions ici..." required aria-required="true"></textarea>
                </div>

                <button type="submit" class="bouton_action btn_large">
                    Je transmets mon message à l'association
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