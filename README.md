Projet Dashboard - Gestion d'achat de matériel
PHP Orienté Objet et MySQL

Ce dashboard devra être sécurisé par un système de login

1. Il doit permettre de  :

  1. Lister les produits
  2. Modifier un produit
  3. Supprimer un produit
  4. Ajouter un produit

2. Pour chaque produit on doit rentrer les informations suivantes :

  1. Nom du produit
  2. Référence du produit
  3. Catégorie (Electroménager, TV-HIFI, Bricolage, Voiture....) Le produit n'appartiendra qu'à une seule catégorie
  4. Prix
  5. Date d'achat
  6. Date de fin de garantie
  7. Lieux d'achat (En vente directe ou e-commerce) :

    7.1 Si vente directe - Possibilité de saisir l'adresse

    7.2 Si e-commerce - Possibilité de saisir l'url du e-commerce
  8. Zone de saisie pour rentrer touts les conseils d'entretien du produit
  9. Photo du ticket d'achat
  10. Manuel d'utilisation (Pas obligatoire s'il n'existe pas)

Il faudra faire attention a respecter le pattern PRG https://fr.wikipedia.org/wiki/Post-redirect-get, bien vérifier que l'administration soit sécurisée, et que les formulaires soient validées aussi bien en Front (coté html, js) qu'en Back (coté php).

**Il faudra réaliser un Modèle Conceptuel de Données.**

**Il faudra structurer le projet en MVC.**

Bonus:

- Tâche cron qui envoie un email lorsque le produit arrive à terme de sa garantie
- Une page ou l'on peut voir un graphique comparant les sommes dépensées par catégorie entre deux dates.

**Temps de dev: 2 semaines.**

# Work organization
### Getting started with: 1 day

1. **PRG Pattern**:

  Post/Redirect/Get is a web development pattern that attempts to avoid an HTTP POST request to be sent twice by returning a redirect page before validating the data and returning the destination page.

  | Action     | POST Processing  | Redirection           | GET Validation |
  | :--------- | :--------------- | :-------------------- | :------------- |
  | Browser    | PHP App          | Browser               | PHP App        |
  | HTML Form  | receives $_POST  | receives header       | receives $_GET |
  | method POST| sends 303 header | redirects to new page | does whatever  |

2. **CDM**:

  A *conceptual data model* is a map of concepts and their relationships used for databases.
  It describes the things of significance to an organization (entity classes), about which it is inclined to collect information, and its characteristics (attributes) and the associations between pairs of those things of significance (relationships).

  2.1 **DSD**:

  A *data structure diagram* is a data model or diagram used to describe conceptual data models by providing graphical notations which document entities and their relationships, and the constraints that bind them.

3. **MVC**:

  The *model-view-control* pattern, originally formulated in the late 70s, is a software architecture pattern built on the basis of keeping the presentation of data (views) separate from the methods that interact with the data (controllers and/or models).

  ![logo](https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/MVC-Process.svg/1200px-MVC-Process.svg.png)

  3.1 **OOP**:

    https://openclassrooms.com/fr/courses/1665806-programmez-en-oriente-objet-en-php
