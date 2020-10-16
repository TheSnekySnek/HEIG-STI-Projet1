# HEIG-STI-Projet1

## Install
Depuis le répertoire racine du repo, exécuter les commandes suivantes : 
```
# télécharger la container docker et le lancer
docker run -ti -v "$PWD/site":/usr/share/nginx/ -d -p 8080:80 --name sti_project --hostname sti arubinst/sti:project2018

# démarrer le service nginx
docker exec -u root sti_project service nginx start

# démarrer le service php
docker exec -u root sti_project service php5-fpm start
```

Pour finir il faut vérifier que la base de données ainsi que le répertoire `databases` soient modifiable.
`chmod o+w ./site/databases`
`chmod o+w ./site/databases/database.sqlite`

## Manuel d'utilisation
### Login

### Voir les messages reçus
Lorsqu'on se connecte, on arrive sur cette page. Il est aussi possible d'y accéder en cliquant sur le lien `Mes messages` dans la barre de navigation.  

![Voir mes messages](./images/show_messages.png)

### Voir le contenu des messages reçus
Depuis la page `Mes messages` il suffit de cliquer sur le bouton `Lire` du message souhaité 
pour voir le contenu du message

![Voir contenu du message](./images/show_message_content.png)

### Répondre a un message
Depuis la page `Mes messages` il suffit de cliquer sur le bouton `Répondre`

![Répondre au message](./images/reply_message.png)

### Supprimer un message
Pour supprimer un message il faut aller dans la page `Mes messages` et cliquer sur le bouton `Supprimer` du message souhaité

### Envoyer un message
Pour rédiger un nouveau message il faut tout d'abord aller sur la page `Mes messages` et cliquer sur le bouton `Nouveau message`  

Une fois sur la page `Nouveau message` il faut remplir les différents champs et cliquer sur `Envoyer`

![Nouveau message](./images/new_message.png)

### Modification du mot de passe

### Créer un utilisateur

### "Supprimer" un utilisateur (inactif)

### Modifier le rôle d'un utilisateur
