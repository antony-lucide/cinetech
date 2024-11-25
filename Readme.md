# CINETECH
Cinetech est un site web utilisant une API pour afficher des films et des séries fournis par [The Movie Database](https://www.themoviedb.org/signup).

## Installation
Pour configurer et utiliser le site, installez les dépendances et configurez la base de données comme suit:

* **Etape 1** - installer un serveur local de votre choix  ( [WAMP](https://www.wampserver.com/), [XAMP](https://www.apachefriends.org/fr/index.html) , [LAMP](https://doc.ubuntu-fr.org/lamp) ou bien [LARAGON](https://laragon.org/download/) ) et ainsi [GIT](https://git-scm.com/downloads).

* **Etape 2** - Une fois votre serveur et Git installés, vous pouvez récupérer le projet en cliquant sur Code puis Download ZIP ou en exécutant la commande suivante :

```
git clone https://github.com/YoussefGhollamallah/cinetech.git
```

* **Etape 3** -  Une fois le serveur local lancé et le projet téléchargé, importez la base de données fournie à la racine du projet (cinetech.sql) :
    * Via phpMyAdmin en utilisant l'onglet Import.
    * Ou via la ligne de commande :

```
mysql -u root -p cinetech < cinetech.sql
```

*Note : Si vous avez définu yb lit de oasse oiyr MySQL, la commande devient:*
```
mysql -u root -p votre_mot_passe cinetech < cinetech.sql
```

* **Etape 4** - Enfin, comme le projet utilise des dépendances via Composer, exécutez la commande suivante pour rendre le site fonctionnel :
```
composer install
```

## Outils
Ce projet utilise l'API [The Movie Database](https://www.themoviedb.org/signup). Une fois inscrit, vous obtiendrez une API_KEY, qui vous permettra d'interagir avec les données.

Voici un exemple de configuration avec PHP :
```
<?php

define("API_KEY", "votre_api");
define("API_FILM_TENDANCE_URL", "https://api.themoviedb.org/3/trending/movie/week?language=fr-FR&api_key=" . API_KEY);
define("API_SERIE_TENDANCE_URL", "https://api.themoviedb.org/3/trending/tv/week?language=fr-FR&api_key=" . API_KEY);

?>
```

## Fonctionnalités
Le site propose actuellement les fonctionnalités suivantes : 
* Les utilisateurs peuvent parcourir les films et séries disponibles, consulter les détails d'un film ou d'une série.
* Possibilité de s'inscrire et de se connecter pour accéder à des fonctionnalités supplémentaires.
* Une fois connecté, un utilisateur peut :
    * Ajouter et supprimer des commentaires dans la page détails d'un film ou séries.
    * Ajouter des film ou séries à ses favoris pour un accès rapide.
    * La possibilité de rechercher un film et des séries grâce à une barre de recherche.

Le site va proposé prochainement les fonctionnalités suivante :
* La possibilité de répondre à des commentaires d'autre utilisateurs.
* De pouvoir noté un film ou une série et de voir la moyenne des notes.

## Contribuer au projet

Vous souhaitez participer au développement de Cinetech ou proposer des améliorations ? Toutes les contributions sont les bienvenues!

### Comment contribuer ?
* Signalez un bug ou proposer une nouvelle fonctionnalité en ouvrant une [issues](https://github.com/YoussefGhollamallah/cinetech/issues).
* Forkez le projet et soumettez un pull request avec vos modifications.
* Rejoinez la discussion sur les améliorations ou des idées pour enrichir le projet.

### Contact
Pour toute question ou pour discuter directement, n'hésitez pas à me contacter:
* Email : ghollamallahyoussef@gmail.com
* GitHub : [YoussefGhollamallah](https://github.com/YoussefGhollamallah)

Je serai ravi d'échanger avec vous et d'accueillir vos idées! 😊