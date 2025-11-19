FOAD 18/11/25 



Envoyez-moi le lien de votre dépôt GitHub complet une fois le travail terminé (URL du repository public ou privé partagé sur discord).



Vous travaillez pour une petite agence web qui doit livrer rapidement un prototype de mini application de gestion de tâches interne.



L’objectif :



Une interface simple pour ajouter des tâches avec un titre et une description.



Une liste de tâches avec un bouton pour les marquer comme terminées.



Les données doivent être stockées dans une base MySQL.



Deux contraintes importantes imposées par l’équipe DevOps :



L’application doit être dockerisée pour tourner de façon identique sur toutes les machines.



Le code doit être versionné avec Git et hébergé sur GitHub pour faciliter le travail en équipe.



Vous travaillez sur une machine Ubuntu sous WSL.



projet-gestion-taches/

├── index.php

├── db.php

├── style.css

├── sql/

│   └── schema.sql

└── todo.md





Créez la base de données MySQL : mysql -u root -p < sql/schema.sql

Testez le projet en local avec le serveur PHP : php -S localhost:8000



Mise en place de Git



Initialisez un dépôt Git



Vérifiez l’état



Ajoutez les fichiers



Créez un premier commit



Créez un dépôt  sur GitHub ( README et .gitignore).



Créez  un branche dockerisation et basculez sur cette branche.



À la racine du projet, créez un fichier Dockerfile.



Utiliser une image de base PHP avec Apache php:8.2-apache



Activer l’extension PDO MySQL



Copier le contenu de votre projet dans le dossier /var/www/html



Construisez l’image pour tester



Lancez un conteneur de test



vérifiez que l’application fonctionne (sans base pour l’instant, les erreurs de connexion MySQL sont possibles : c’est normal tant que le conteneur MySQL n’est pas en place).



créer docker-compose.yml



lancer 2 services :



app : le conteneur PHP/Apache



db : un conteneur MySQL avec volume de données



Vous devez définir



&nbsp;un service db basé sur l’image mysql:8.0

&nbsp;	Les variables d’environnement :

&nbsp;		MYSQL\_ROOT\_PASSWORD

&nbsp;		MYSQL\_DATABASE

&nbsp;		MYSQL\_USER

&nbsp;		MYSQL\_PASSWORD

&nbsp;		Un volume pour persister les données, par ex. db\_data:/var/lib/MySQL



et un service app qui build l’image à partir du Dockerfile 

&nbsp;		Qui dépend de db (clé depends\_on)

&nbsp;		Qui expose le port 8080:80

&nbsp;		Qui reçoit via variables d’environnement :

&nbsp;		DB\_HOST=db

&nbsp;		DB\_NAME=taskmanager

&nbsp;		DB\_USER=app

&nbsp;		DB\_PASSWORD= (à adapter selon ce que vous mettez dans le service db)



lancer l’ensemble et testez l’application sur http://localhost:8080



valider le travail de Dockerisation



Vérifiez l’état et ajoutez les nouveaux fichiers 



Créez un commit  "Dockerisation de l'application"



Poussez la branche vers GitHub mergez vers main.



