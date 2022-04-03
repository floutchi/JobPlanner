Processus d'installation du projet

# Pré-requis

Un serveur web configuré permettant d'interpréter le PHP en version 5.6,  
Une base de donnée MySQL permettant d'importer un script SQL pour instancier les tables nécessaires au projet.

# Etapes de déploiement

1. Importer le projet et ses fichiers sur le serveur web.
2. Importer le script SQL présent dans le fichier 'bdd.sql' pour la base de donnée.
3. Changer le nom, l'hébergeur, l'identifiant et le mot de passe de la base de donnée dans le fichier config.inc.php présent dans le dossier php du projet

# Fonctionnalités et bugs connus

### Fonctionnalités implémentées :
1. Connexion d'un utilisateur
2. Déconnexion d'un utilisateur
3. Consultation d'une offre
4. Création d'une offre en tant que RH
5. Postuler pour une offre (avec envoi de mail)
6. Consulter les candidatures d'une offre en tant que RH
7. Approuver une candidature (avec envoi de mail au candidat)

### Problèmes rencontrés :
1. Confirmation de rendez-vous non implémenté
2. Agenda non implémenté
3. Base de donnée ne respecte pas les règles de formes normales
4. Au moment de la validation d'une candidature, l'utilisateur est renvoyé à la page précédente.