# M2 ILC: Projet WEB

Ce projet à été réalisé par Hurter Jonathan. Dans le cadre du projet Web du Master ILC de l'université de Strasbourg.

## Instalation

Le projet est disponible à l'url [https://john-web-m2.ares-ensiie.eu/]("https://john-web-m2.ares-ensiie.eu/).

Afin de le lancer plus simplement, une stack docker est disponible. Pour la lancer, la procédure est la suivante:

```bash
docker build -t custom_php .
./launch.sh
```

Une fois lancé le projet sera disponible à l'url: [http://localhost:8081](http://localhost:8081).
Il faut également lancer les migrations afin d'initialiser la base de données avec la commande:

```bash
docker exec -it projet-web php migrate.php
```

## Architecture

Vu que l'utilisation de framework front et back end était interdit pour ce projet, j'ai recodé deux frameworks basiques afin de gérer le frontend et la backend.

### Backend

Le framework backend est basé sur une architecture MVC. Le fichier d'entré du framework est `/index.php` qui attends une url de la forme: `http://host/index.php/<CONTROLLER>/<METHOD>`.
Une fois l'url recue, il va charger le controller présent dans `controllers/<CONTROLLER>.php` puis lancer la méthode `<METHOD>`.

#### Vues

Les vues sont gérées par les helpers disponibles dans le fichier `core/helpers.php`. Dans le cas d'un rendu HTML, le framework va initialiser les variables necessaires au rendu et charger le fichier de rendu présent dans le dossier `views/<NAME>.php`.

### Models

Le projet inclus un ORM basique afin de gérer les différentes entitèes présentes en base de données.

Un model doit étendre la classe `Model` ainsi, toutes les fonctions de création, sauvegarde et de requetage seront automatiquement générées par le framework. Il ne restera plus qu'a créer les méthodes spécifiques au modèle courant.

Pour cela, il suffit de spécifier les constantes suivantes:

* `TABLE_NAME`: Nom de la table gérée par le modèle.
* `TABLE_COLUMNS`: Nom des colonnes présentes dans la table.
* `TABLE_JOIN`: List des méthodes a appeler afin d'initialiser les modèles liés à ce modèle.

Une fois initialisées, le framework va automatiquement générer les méthodes suivantes:

* Un constructeur par défault.
* `save()` permet de sauvegarder les données dans la base de données
* `getAll()` permet de récupérer l'intégralité des instances présentes en base de données
* `getById()` permet de récupérer une instance dans la base de données en fonction de son index

En plus du model de base, le framework intègre un generateur de requêtes, permettant de simplifier le requetage à la base de données.

Ainsi la création d'un requête comme: `SELECT * FROM Product WHERE price >= 10 AND name LIKE %test% LIMIT 20, 10`

Se transforme en:
```php
$builder = Product::QueryBuilder();
$builder->andGreaterOrEqual("price", 10)
$builder->andLike("name", "%test%")
$builder->paginate(2, 10);
$builder->execute();
```

Ce système est basique et doit être utilisé avec précaution. Le query builder ne gère pas les jointures. De plus les modèles pourrait utiliser de la meta-programmation afin de générer automatiquement les getters et les setters. Enfin, ce model ne permet pas de proteger contre les failles SQL.

### Frontend

Le frontend est assez classique. Cependant mon but à été de le renre aussi réactif que possible. Il a donc fallu créer un framework basique afin de simplifier le development de features en temps réel.

#### Les observers

Le framework est entièrement basé sur un système nommé les observers. Les observers permettent de créer un système de gestion de données et de placer des listeners qui seront appelèes à chaque changement de ces données.

Ex:

```javascript
var ob = Observer();
ob.addListener(function(values, index) {
  console.log(index+" à changé: "+values[index]);
});
ob.set("a");
ob.set("b");
ob.set("a", "a");
ob.set("b", "b");
```
Ce code genere le résultat suivant:

```
value a changé: a
value à changé: b
a à changé: a
a à changé: b
```

#### Les domobservers

La première extension est les domobservers. Ils permettent de définir sans écrire la moindre ligne de javascript des parties du code html qui seront affectées par les observers, ou qui peuvent affecter des observers.

Ex:
```html
<div data-receive="channel"></div>
<a data-send="channel" data-value="Hello"> Send Hello</div>
<a data-send="channel" data-value="World"> Send World</div>
```

Avec ce code, quand nous cliquons sur "Send Hello", la div sera mise a jour pour afficher `Hello`. Et quand nous cliquons sur "Send World", la div sera mise a jour pour afficher `World`.

##### Les templaters

En plus des observers, le framework permet la gestion de templates. Ce qui simplifie les modification du DOM.

Ex:
HTML:
```html
<div class="template-hidden" id="template1">
  <div class="{color}">{text}</div>
</div>

<div id="template-container1">
</div>
```

JavaScript:
```javascript
t = Templater("#template1", "#template-container1");
t.clear();
t.add({
  color: "red",
  text: "Ce text est en rouge"
});
t.add({
  color: "green",
  text: "Ce text est en vert"
});
```

Va générer:

```html
<div id="template-container1">
  <div class="red"> Ce text est en rouge </div>
  <div class="green"> Ce text est en vert </div>
</div>
```

### Le projet

Le projet comporte 3 endpoints:

* `/index.php/main/index`: Affiche la page principale
* `/index.php/main/checkout`: Affiche la page de checkout
* `/index.php/product/search`: Fournis une API JSON afin de faire de la recherche en base de données.

L'intégralité des filtres sont fonctionnels et agissent en temps réel sur la page. Vous pouvez donc filter en utilisant les paramêtres suivants:

* Le nom
* La catégorie
* Le prix
* La couleur
* La marque
* La page
* Le nombre de résultat par page

