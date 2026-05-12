// On attend que la page soit totalement chargée
document.addEventListener("DOMContentLoaded", () => {

    
    /*** Pour cacher le bouton "Retour en haut"  sinon a pas encore scrollé !*/
    // 1. On va chercher notre bouton dans le HTML grâce à son ID
    const boutonRetourHaut = document.getElementById("scrollToTop");

    // 2. On écoute l'événement "scroll" (quand l'utilisateur fait défiler la page)
    window.addEventListener("scroll", () => {
        
        // 3. Si l'utilisateur est descendu de plus de 300 pixels
        if (window.scrollY > 200) {
            // On ajoute la classe CSS ".visible" (qui met opacity: 1 et visibility: visible)
            boutonRetourHaut.classList.add("visible");
        } else {
            // Sinon (il est tout en haut), on retire la classe
            boutonRetourHaut.classList.remove("visible");
        }
    });

    const btnMenuNav = document.getElementById("btn_menu_nav");
    const liste_nav = document.getElementById("liste_nav");
    const header= document.querySelector("header");
   

    btnMenuNav.addEventListener("click", () => {
        const menu_is_open = liste_nav.classList.toggle("menu-ouvert");
        header.classList.toggle("header-menu-ouvert"); // Ajoute ou retire la classe "menu-ouvert" au header pour changer son style
            
        btnMenuNav.setAttribute("aria-expanded", menu_is_open); // Met à jour l'attribut aria-expanded pour l'accessibilité
        // 5. On change le texte du bouton selon l'état !
        if (menu_is_open) {
            btnMenuNav.textContent = "✖ Fermer";
        } else {
            btnMenuNav.textContent = "☰ Menu";
        }
    }); 

    
    // --- GESTION DE L'ACCESSIBILITÉ ---
    
    const btnTailleTexte = document.getElementById("btn_taille_texte");
    const btnInterligne = document.getElementById("btn_interligne");
    const btnContraste = document.getElementById("btn_contraste");

    const btnMenuAccessibilite = document.getElementById("btn_menu_accessibilite");
    const listeAccessibilite = document.getElementById("liste_accessibilite");

    btnMenuAccessibilite.addEventListener("click", () => {
        const isOpen = listeAccessibilite.classList.toggle("menu-accessibilite-ouvert"); //
        btnMenuAccessibilite.setAttribute("aria-expanded", isOpen);
    });


    // 1. On vérifie la taille du texte
    if (localStorage.getItem("texte-agrandi") === "actif") {
        document.documentElement.classList.add("texte-agrandi");
        btnTailleTexte.setAttribute("aria-pressed", "true");
    }

    // 2. On vérifie l'interligne
    if (localStorage.getItem("interligne-agrandi") === "actif") {
        document.body.classList.add("interligne-agrandi");
        btnInterligne.setAttribute("aria-pressed", "true");
    }

    // 3. On vérifie le mode sombre
    if (localStorage.getItem("theme-sombre") === "actif") {
        document.body.classList.add("theme-sombre");
        btnContraste.setAttribute("aria-pressed", "true");
    }


    // 1. Taille du texte (sur la balise <html>)
    btnTailleTexte.addEventListener("click", () => {
        const isActive = document.documentElement.classList.toggle("texte-agrandi");
        btnTailleTexte.setAttribute("aria-pressed", isActive); // Pour les lecteurs d'écran

        // On sauvegarde le choix
        if (isActive) {
            localStorage.setItem("texte-agrandi", "actif");
        } else {
            localStorage.removeItem("texte-agrandi"); // On efface la note si désactivé
        }
    });

    // 2. Interligne (sur la balise <body>)
    btnInterligne.addEventListener("click", () => {
        const isActive = document.body.classList.toggle("interligne-agrandi");
        btnInterligne.setAttribute("aria-pressed", isActive);

        if (isActive) {
            localStorage.setItem("interligne-agrandi", "actif");
        } else {
            localStorage.removeItem("interligne-agrandi");
        }
    });

    // 3. Mode Sombre / Contraste (sur la balise <body>)
    btnContraste.addEventListener("click", () => {
        const isActive = document.body.classList.toggle("theme-sombre");
        btnContraste.setAttribute("aria-pressed", isActive);

        if (isActive) {
            localStorage.setItem("theme-sombre", "actif");
        } else {
            localStorage.removeItem("theme-sombre");
        }
    });
});