# TSA SDI 95 - Plateforme Web Associative

## 📖 Présentation du projet
Ce projet est la réalisation de "A à Z",  du site web de l'association **TSA SDI 95 INFO**. 
L'association a pour but d'orienter et d'accompagner les familles d'enfants porteurs de Troubles 
du Spectre de l'Autisme Sans Déficience Intellectuelle (TSA SDI) ou des adultes se questionnant, 
afin de lutter contre l'errance diagnostique.

## 🛠️ Technologies & Architecture
Ce projet est développé en PHP natif, sans framework externe
* **Langages :** PHP 8, SQL, HTML5, CSS3, JavaScript (Vanilla).
* **Architecture :** Modèle-Vue-Contrôleur (MVC) personnalisé avec un routeur central (`index.php`).
* **Base de données :** MySQL 

## ♿ Accessibilité (RGAA)
Une attention toute particulière est portée à l'accessibilité numérique, un enjeu crucial pour le public neuroatypique visé par l'association.
* Utilisation de balises sémantiques HTML5.
* Clarté de l'interface, des boutons et de la navigation
* Navigation au clavier (focus, tab etc)
* Intégration d'attributs `aria` pour la lisibilité par les lecteurs d'écran.
* Formulaires sécurisés et lisibles (gestion de la charge cognitive).
* Lien d'evitement, bouton retour haut de page
* Contrastes élevès
* Interligne par défaut de 1.6rem
* Police accessible Verdana
* Menu de personnalisation de l'afficchage : Pour augmenter l'interline, la taille du texte et passer en mode sombre, en gardant affichage cohérent

## 🚀 Fonctionnalités actuelles (v1.0)
* Routeur centralisé gérant les URL (`?page=...`).
* Séparation stricte de la logique (Contrôleurs) et de l'affichage (Vues).
* Page d'acceuil, menu d'accessibilité et menu de navigation; Page de contact, responsives
* Formulaire de contact sécurisé (protection XSS, validation des emails).
