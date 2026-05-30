document.addEventListener('DOMContentLoaded', function() {
    let activitesDuJour = [];
    
    const energieInitialeInput = document.getElementById('energie_initiale');
    const energieActuelleAffiche = document.getElementById('energie_actuelle');
    const corpsTable = document.getElementById('corps_table_activites');
    
    // Fonction qui recalcule le score et reconstruit le tableau HTML
    function mettreAJourAffichage() {
        let energie = parseInt(energieInitialeInput.value) || 0;
        corpsTable.innerHTML = "";
        
        if (activitesDuJour.length === 0) {
            corpsTable.innerHTML = `<tr id="aucun_engagement"><td colspan="4" style="text-align: center; font-style: italic;">Aucune activité ajoutée.</td></tr>`;
        } else {
            activitesDuJour.forEach((act, index) => {
                energie += act.impact; // L'impact peut être négatif (-3) ou positif (+2)
                
                // On utilise la structure de table-admin
                let tr = document.createElement('tr');
                tr.innerHTML = `
                    <td data-label="N°">#${index + 1}</td>
                    <td data-label="Activité">${act.nom}</td>
                    <td data-label="Impact"><strong>${act.impact} 🥄</strong></td>
                    <td data-label="Commentaires">${act.commentaires}</td>
                `;
                corpsTable.appendChild(tr);
            });
        }
        
        if (energie < 0) energie = 0;
        energieActuelleAffiche.textContent = energie;
    }

    // Si on change l'énergie de base, ça recalcule tout
    energieInitialeInput.addEventListener('input', mettreAJourAffichage);

    // BOUTON : Ajouter une activité
    document.getElementById('btn_ajouter_activite').addEventListener('click', function() {
        const nom = document.getElementById('nom_activite').value.trim();
        const impact = parseInt(document.getElementById('impact_energie').value);
        const commentaires = document.getElementById('commentaires_activite').value.trim();

        if (nom !== "" && !isNaN(impact)) {
            // Sauvegarde dans la mémoire JS
            activitesDuJour.push({ nom: nom, impact: impact, commentaires: commentaires });
            
            // Vidage des champs
            document.getElementById('nom_activite').value = "";
            document.getElementById('impact_energie').value = "";
            document.getElementById('commentaires_activite').value = "";
            
            mettreAJourAffichage();
        } else {
            alert("Veuillez au moins renseigner le nom et l'impact.");
        }
    });

    // BOUTON : Envoyer à l'API (Valider le journal)
    document.getElementById('btn_enregistrer_journal').addEventListener('click', function() {
        if (activitesDuJour.length === 0) {
            alert("Veuillez ajouter au moins une activité avant de valider le journal.");
            return;
        }

        const payload = {
            nb_cuilleres_debut: parseInt(energieInitialeInput.value),
            nb_cuilleres_fin: parseInt(energieActuelleAffiche.textContent),
            commentaires: "Journal complété.",
            activites: activitesDuJour // On envoie tout le tableau d'un coup !
        };

        fetch('index.php?page=api_energie_sauvegarde', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(payload)
        })
        .then(response => response.json())
        .then(data => {
            if (data.statut === 'succes') {
                document.getElementById('message_retour_api').innerHTML = `<p class="message_succes">Journal sauvegardé ! Rechargement...</p>`;
                activitesDuJour = [];
                mettreAJourAffichage();
                // Recharge la page après 1s pour afficher le nouvel historique
                setTimeout(() => window.location.reload(), 1000); 
            } else {
                document.getElementById('message_retour_api').innerHTML = `<p class="message_erreur">Erreur serveur.</p>`;
            }
        });
    });
});