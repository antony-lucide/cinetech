# CINETECH

Cinetech est une plateforme web qui exploite une API pour afficher des films et des séries fournis par [The Movie Database](https://www.themoviedb.org/signup).

## Installation

Pour configurer et utiliser le projet, suivez les étapes ci-dessous :

### Étape 1 : Préparez votre environnement
Installez un serveur local adapté à votre système, comme :
- [WAMP](https://www.wampserver.com/),
- [XAMP](https://www.apachefriends.org/fr/index.html),
- [LAMP](https://doc.ubuntu-fr.org/lamp),
- ou [LARAGON](https://laragon.org/download/).

Assurez-vous également d'avoir installé [Git](https://git-scm.com/downloads).

### Étape 2 : Récupérez le projet
Clonez le dépôt Git en exécutant la commande suivante :

```bash
git clone https://github.com/cinetech

```

Sinon, téléchargez directement le projet en cliquant sur Code > Download ZIP.
Étape 3 : Configurez la base de données

    Lancez votre serveur local.
    Importez le fichier cinetech.sql (situé à la racine du projet) dans votre base de données :
        Via phpMyAdmin : utilisez l'onglet Importer.
        Via la ligne de commande :

```bash
    mysql -u root -p cinetech < cinetech.sql
```
Remarque : Si un mot de passe MySQL est défini, utilisez cette variante :

```bash
    mysql -u root -p votre_mot_de_passe cinetech < cinetech.sql
```

Étape 4 : Installez les dépendances

Ce projet utilise Composer pour gérer ses dépendances. Exécutez la commande suivante :

```bash
    composer install
```
Outils

Ce projet utilise l'API de The Movie Database. Une clé d'API (API_KEY) est nécessaire pour interagir avec les données.

Exemple de configuration en PHP :

```php
    <?php

    define("API_KEY","b1ea66a0baf7bc288a9c02ca4ee33d41");
    define("API_FILM_TENDANCE_URL", "https://api.themoviedb.org/3/trending/movie/week?language=fr-FR&api_key=" . API_KEY);
    define("API_SERIE_TENDANCE_URL", "https://api.themoviedb.org/3/trending/tv/week?language=fr-FR&api_key=" . API_KEY);

    ?>
```

Fonctionnalités
Actuelles

    Explorer les films et séries disponibles.
    Voir les détails d'un film ou d'une série.
    S'inscrire et se connecter pour des fonctionnalités supplémentaires.
    Fonctionnalités pour les utilisateurs connectés :
        Ajouter ou supprimer des commentaires sur les pages de détail.
        Ajouter des films ou séries aux favoris.
        Effectuer des recherches via une barre dédiée.

À venir

    Répondre aux commentaires d'autres utilisateurs.
    Noter les films et séries avec une moyenne visible.

    Contact

Pour toute question ou suggestion, contactez-moi :

    Email : antony.lucide@laplateforme.com
    GitHub : antony-lucide