# PHP Gestion de Colis

Application web développée en PHP permettant la gestion des colis, des itinéraires et des véhicules avec génération de documents et envoi d’emails automatiques.

## Présentation

Ce projet académique de Licence 2 Informatique est une application de gestion logistique permettant de suivre et organiser l’acheminement des colis.

Il inclut un système complet de CRUD ainsi que des fonctionnalités avancées comme l’envoi d’e-mails automatiques et la génération de reçus en PDF.

## Fonctionnalités

### Gestion des véhicules

* Ajout de véhicules
* Modification
* Suppression
* Liste des véhicules

### Gestion des colis / recettes

* Création de colis
* Suivi des statuts
* Mise à jour
* Suppression

### Gestion des itinéraires

* Création d’itinéraires
* Association colis → trajet
* Mise à jour des routes

### Fonctionnalités avancées

* Envoi automatique d’e-mails aux utilisateurs (PHPMailer)
* Génération de reçus PDF (Dompdf)
* Gestion des données avec MySQLi
* Interface web simple

## Technologies utilisées

* PHP (procédural / MySQLi)
* MySQL
* HTML / CSS
* JavaScript
* PHPMailer
* Dompdf

## Base de données

Le projet utilise MySQL avec une architecture relationnelle simple.

Les principales tables incluent :

* véhicules
* colis
* itinéraires
* utilisateurs

## Installation

### 1. Cloner le projet

```bash id="inst1"
git clone https://github.com/ConstantAndriamirado/PHP_gestion_colis.git
```

### 2. Importer la base de données

* Créer une base MySQL

### 3. Configurer la connexion

Modifier le fichier de connexion :

```php id="db1"
mysqli_connect("localhost", "root", "", "nom_base");
```

### 4. Lancer le projet

* Placer le projet dans `htdocs` (XAMPP)
* Lancer Apache + MySQL
* Accéder via navigateur : `http://localhost/...`

## Objectifs du projet

* Maîtriser PHP/MySQLi
* Implémenter un CRUD complet
* Gérer une logique métier réelle (logistique)
* Générer des documents automatiquement
* Envoyer des emails depuis PHP

## Améliorations possibles

* Migration vers Laravel
* Interface moderne (Bootstrap)
* API REST
* Authentification sécurisée
* Dashboard admin
* Suivi GPS des colis

## Contexte académique

Projet réalisé en Licence 2 Informatique dans le cadre de l’apprentissage du développement web backend avec PHP natif.

## Auteur

Constant Andriamirado

GitHub : https://github.com/ConstantAndriamirado
