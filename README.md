# Projet Dashboard - _Gestion d'achat de matériel_
#### _PHP Orienté Objet et MySQL_

Ce dashboard devra être sécurisé par un système de login. Il doit permettre de  :

  - Lister les produits
  - Modifier un produit
  - Supprimer un produit
  - Ajouter un produit

Pour chaque produit on doit rentrer les informations suivantes :

  - Nom du produit
  - Référence du produit
  - Catégorie (Electroménager, TV-HIFI, Bricolage, Voiture....) Le produit n'appartiendra qu'à une seule catégorie
  - Prix
  - Date d'achat
  - Date de fin de garantie
  - Lieux d'achat (En vente directe ou e-commerce) :
    - Si vente directe - Possibilité de saisir l'adresse
    - Si e-commerce - Possibilité de saisir l'url du e-commerce
  - Zone de saisie pour rentrer touts les conseils d'entretien du produit
  - Photo du ticket d'achat
  - Manuel d'utilisation (Pas obligatoire s'il n'existe pas)

**Il faudra faire attention a respecter le pattern PRG** https://fr.wikipedia.org/wiki/Post-redirect-get, bien vérifier que l'administration soit sécurisée, et que les formulaires soient validées aussi bien en Front (coté html, js) qu'en Back (coté php).

**Il faudra réaliser un Modèle Conceptuel de Données.**

**Il faudra structurer le projet en MVC.**

Bonus:

1. Tâche cron qui envoie un email lorsque le produit arrive à terme de sa garantie
2. Une page ou l'on peut voir un graphique comparant les sommes dépensées par catégorie entre deux dates.

**Temps de dévelopemment : 2 semaines.**

___

# Work organization

### I. Getting started with
#### Time: 2 days

1.1 **PRG Pattern**:

  Post/Redirect/Get is a web development pattern that attempts to avoid an HTTP POST request to be sent twice by returning a redirect page before validating the data and returning the destination page.

  | Action     | POST Processing  | Redirection           | GET Validation |
  | :--------- | :--------------- | :-------------------- | :------------- |
  | Browser    | PHP App          | Browser               | PHP App        |
  | HTML Form  | receives $_POST  | receives header       | receives $_GET |
  | method POST| sends 303 header | redirects to new page | does whatever  |

1.2 **CDM**:

  A *conceptual data model* is a map of concepts and their relationships used for databases.
  It describes the things of significance to an organization (entity classes), about which it is inclined to collect information, and its characteristics (attributes) and the associations between pairs of those things of significance (relationships).

1.2.1 **DSD**:

  A *data structure diagram* is a data model or diagram used to describe conceptual data models by providing graphical notations which document entities and their relationships, and the constraints that bind them.

1.3 **MVC**:

  The *model-view-control* pattern, originally formulated in the late 70s, is a software architecture pattern built on the basis of keeping the presentation of data (views) separate from the methods that interact with the data (controllers and/or models).

  ![logo](https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/MVC-Process.svg/1200px-MVC-Process.svg.png)

1.4 **OOP**:

  https://openclassrooms.com/fr/courses/1665806-programmez-en-oriente-objet-en-php

  https://www.youtube.com/watch?v=r_NiFqLvfsc&list=PLjwdMgw5TTLVDKy8ikf5Df5fnMqY-ec16&index=1

___

### II. Work distribution:
#### Initial git workflow
- Creation of 3 different branches:
  - ```dev/philippe```
  - ```dev/sergio```
  - ```dev/yacine```

### Back-end functionalities
#### Time: 4 days

- Sign in and sign up to dashboard / _s'inscrire et accéder au dashboard_: **Philippe PERECHODOV**
- List client's products / _lister les produits du client_: **Yacine SBAI**
- Products modification (create, edit and delete) / _modification des produits (insérer, modifier et supprimer)_: **Sergio NUNEZ MENESES**

### Front-end design
#### Time: 3 days
- Main page / _page principale_: **Philippe PERECHODOV**
- All products page / _page de tous les produits_: **Yacine SBAI**
- Create product page, and edit-delete product page / _page de création d'un produit, et page de modification/suppression d'un produit_: **Sergio NUNEZ MENESES**

___

### III. Merge:
#### Git workflow

- Creation of 1 new branch: ```dev/integration```
- All merging will be done in ```dev/integration```, first from ```dev/philippe```, then from ```dev/yacine```, and finally from ```dev/sergio```
