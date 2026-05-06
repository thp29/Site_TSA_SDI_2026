# TSA SDI 95 INFO - Site Web Associatif
(Work In Progress) 


## Présentation du projet :
Ce projet est la réalisation de "A à Z" en quasi autonomie,  du site web de l'association **TSA SDI 95 INFO**. 
L'association a pour but d'orienter et d'accompagner les familles d'enfants/adultes porteurs de Troubles 
du Spectre de l'Autisme Sans Déficience Intellectuelle (TSA SDI) ou des adultes se questionnant, 
afin de lutter contre l'errance diagnostique.


## Technologies & Architecture :
Ce projet est développé en HTML, CSS JS, PHP natifs, sans framework externe et structuré en MVC. 
* **Langages :** PHP 8, SQL, HTML5, CSS3, JavaScript (Vanilla).
* **Architecture :** Modèle-Vue-Contrôleur (MVC) personnalisé avec un routeur central (`index.php`).
* **Base de données :** MySQL 

## Accessibilité (normes WCAG/RGAA):
Une attention particulière est portée à l'accessibilité numérique, un enjeu crucial pour le public visé par l'association et également pour l'ensemble des personnes à besoin particuliers.

* Utilisation de balises sémantiques HTML5.
* Clarté de l'interface, des boutons et de la navigation
* Navigation au clavier (focus, tab etc)
* Intégration d'attributs `aria` ry balise "alt" (pour les images) pour la lisibilité par les lecteurs d'écran.
* Formulaires sécurisés et lisibles (prevention de la charge cognitive).
* Lien d'evitement, bouton retour haut de page
* Contrastes élevès
* Interligne par défaut de 1.6rem
* Police "accessible" : Verdana
* Menu de personnalisation de l'afficchage : Pour augmenter l'interligne, la taille du texte et passer en mode sombre, en gardant un  affichage cohérent

## Fonctionnalités actuelles (v1 /mai 2026)
* Routeur centralisé gérant les URL (`?page=...`).
* Séparation stricte de la logique (Contrôleurs), de l'accès/gestion des données (modèle) et de l'affichage (Vues).
* Page d'acceuil, menu d'accessibilité et menu de navigation; Page de contact, responsives
* Formulaire de contact sécurisé (protection XSS, validation des emails).
* Page de ressources/articles :boutons/liens de tri par catégorie, affichage aperçu et pages d'accès aux articles "entiers" pour lecture
* 
