# Laravel Student Management API

Ce projet est une API Laravel permettant la gestion des étudiants et l'association des étudiants à des formations. L'API comprend les endpoints pour ajouter des étudiants et les associer à des formations.

## Prérequis

- PHP >= 7.4
- Composer
- MySQL ou tout autre base de données compatible

## Installation

1. **Cloner le dépôt** :

   ```bash
   git clone https://github.com/votre-repo/laravel-student-management.git
   cd laravel-student-management

2. **Installer les dépendances**

    ```bash
    composer install
3. **Configurer l'environnement**

    Copier le fichier .env.example en .env :


    cp .env.example .env
    Modifier le fichier .env pour configurer la base de données et d'autres paramètres nécessaires.

4. **Exécuter les migrations**
    ```bash
    php artisan migrate
5. **Lancer le serveur de développement**
    ```bash
    php artisan serve
L'API sera disponible à l'adresse http://localhost:8000.

# Endpoints

## Liste des étudiants

- **Méthode** : GET
- **URL** : `/api/student/`
- **Description** : Récupère la liste de tous les étudiants.

## Ajouter un étudiant

- **Méthode** : POST
- **URL** : `/api/student/`
- **Description** : Ajoute un nouvel étudiant.
- **Paramètres** :
  ```json
  {
    "nom": "string",
    "prenom": "string",
    "telephone": "string",
    "email": "string",
    "adresse": "string",
    "code_postal": "string",
    "ville": "string",
    "date_de_naissance": "date",
    "coordonnees_gps": {
      "latitude": "float",
      "longitude": "float"
    }
  }

Associer un étudiant à une formation

- **Méthode** : POST
- **URL** : `/api/student/add/training`
- **Description** : Associe un étudiant à une formation.
- **Paramètres** :
  ```json
  {
    "student_id": "integer",
    "training_id": "integer"
  }

Licence
Ce projet est sous licence MIT.