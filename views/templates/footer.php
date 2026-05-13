<footer>
        <div class="footer-container">
             <section class="nav_footer">
                <h3><strong>Navigation</strong></h3>
                <ul aria-label="Menu de navigation du pied de page">
                    <li><a class="lien_classique" href="index.php?page=accueil" <?= ($page_actuelle == 'accueil') ? 'aria-current="page"' : '' ?>>
                    <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icone-nav">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                Accueil </a></li>
                <li><a class="lien_classique" href="index.php?page=articles" <?= ($page_actuelle == 'articles') ? 'aria-current="page"' : '' ?>>
                    <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icone-nav">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="16" y1="13" x2="8" y2="13"></line>
                    <line x1="16" y1="17" x2="8" y2="17"></line>
                     <polyline points="10 9 9 9 8 9"></polyline>
                    </svg>
                     Articles</a></li>
                <li><a class="lien_classique" href="index.php?page=liens" <?= ($page_actuelle == 'liens') ? 'aria-current="page"' : '' ?>>
                    <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icone-nav">
                    <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                    <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                    </svg>
                    Liens</a></li>
                <li><a class="lien_classique" href="index.php?page=temoignages" <?= ($page_actuelle == 'temoignages') ? 'aria-current="page"' : '' ?>>
                    <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icone-nav">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    Témoignages</a></li>
                <li><a class="lien_action" href="index.php?page=energie" <?= ($page_actuelle == 'energie') ? 'aria-current="page"' : '' ?>>
                    <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icone-nav">
                    <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                    </svg>
                    <strong>Gérer mon énergie</strong></a></li>
                <li><a class="lien_action" href="index.php?page=contact" <?= ($page_actuelle == 'contact') ? 'aria-current="page"' : '' ?>>
                    <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icone-nav">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                    <polyline points="22,6 12,13 2,6"></polyline>
                    </svg> 
                    <strong>Contact</strong></a></li>
                </ul>
            </section>
            <section class="contact_footer">
                <h3><strong>Contact</strong></h3>
                <p>Val d'oise - 95</p>
                <p>Email : tsasdi95@proton.me</p>
                <p>Téléphone: 06 56 69 70 68</p>
            </section>
        </div>

        <img class="logo_footer" src="./assets/imgs/logo.png" alt="Logo de l'association TSA SDI 95 info">

        <p><small>2026 TSA SDI 95 INFO. Tous droits réservés. Association loi 1901. </small></p>
    </footer>

    <a href="#top" id="scrollToTop" aria-label="Bouton retour en haut de page">↑</a>
    
    <script src="./assets/js/main.js"></script>
</body>
</html>