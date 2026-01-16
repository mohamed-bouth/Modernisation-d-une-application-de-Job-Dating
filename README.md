# Job Dating – PHP Minimalist Framework

## Contexte du projet

Ce projet a pour objectif de développer un **framework PHP minimaliste**, inspiré des bonnes pratiques modernes, tout en restant **léger, rapide et facile à utiliser**.
Il vise à répondre aux besoins des applications web modernes avec un minimum de dépendances, tout en proposant des fonctionnalités essentielles telles que la gestion des routes, la sécurité, l’architecture MVC et l’authentification.

---

## Objectifs du projet

* Développer une **architecture MVC claire et modulaire**
* Implémenter un **routeur personnalisé** pour la gestion des URLs
* Intégrer une connexion sécurisée à la base de données
* Assurer la protection contre :

  * SQL Injection
  * XSS
  * CSRF
* Fournir des outils pratiques :

  * Validation des données
  * Gestion des sessions
  * Authentification et autorisations
* Séparer fonctionnellement le **Front Office** et le **Back Office**
* Utiliser **Composer** pour l’autoloading
* Intégrer **Eloquent ORM** *(BONUS)*
* Utiliser **Twig** comme moteur de templates *(BONUS)*

---

## Fonctionnalités principales

* Gestion avancée des routes
* Connexion à la base de données
* Séparation Front Office / Back Office
* Système d’authentification sécurisé
* Gestion des rôles et permissions (ACL)
* Protection contre SQL Injection, XSS et CSRF
* Classes utilitaires :

  * `Validator`
  * `Security`
  * `Session`
* Autoloading dynamique avec Composer

---

## Structure du projet

```text
job_dating
│   code.sql
│   composer.json
│   README.md
│
├───app
│   ├───Controllers
│   │       AuthController.php
│   │       renderController.php
│   │
│   ├───Core
│   │       BaseController.php
│   │       Database.php
│   │       Router.php
│   │       Security.php
│   │
│   ├───Models
│   │       BaseModel.php
│   │       User.php
│   │
│   └───Views
│       ├───Auth
│       │       login.php
│       │       register.php
│       │
│       └───Main
│               dashboard.php
│               users.php
│
├───config
│       config.php
│       routes.php
│
├───logs
├───public
│   │   .htaccess.test
│   │   index.php
│   │
│   └───assets
├───src
└───vendor
    │   autoload.php
    │
    └───composer
            autoload_classmap.php
            autoload_namespaces.php
            autoload_psr4.php
            autoload_real.php
            autoload_static.php
            ClassLoader.php
            LICENSE
```

---

## Sécurité

* **CSRF** : Protection via tokens sécurisés
* **XSS** : Nettoyage et échappement des entrées utilisateurs
* **SQL Injection** : Requêtes préparées et ORM
* **Validation des entrées** : `Validator.php`
* **Gestion sécurisée des sessions** : `Session.php`

---

## Bonnes pratiques

* Séparation stricte des responsabilités
* Respect des standards **PSR-1** et **PSR-12**
* Encapsulation des propriétés
* Héritage utilisé avec précaution
* Préférence pour la composition
* Utilisation d’interfaces et de traits
* Code documenté et maintenable
* Optimisation des performances

---

## Fonctionnalités BONUS

### ORM (Eloquent)

* Connexion à la base de données via Eloquent ORM
* Aucune requête SQL directe dans les contrôleurs
* Modèles héritant de la classe `Model`

### Twig

* Remplacement des vues PHP par Twig
* Héritage de layouts
* Séparation totale logique / affichage

---

## Modalités pédagogiques

* **Type** : Travail individuel
* **Durée** : 5 jours
* **Date de lancement** : 12/01/2026 à 08:30
* **Date limite de soumission** : 16/01/2026 à 12:00

---

## Livrables

* Planification sur **JIRA**
* Dépôt **GitHub** avec README
* Déploiement *(optionnel)*

---

## Évaluation

* Présentation orale de **10 minutes**
* Explication du code et de l’architecture
* Questions techniques

---

## Installation

```bash
composer install
cp .env.example .env
php -S localhost:8000 -t public
```

---

## Licence

Projet pédagogique – usage académique uniquement.
