# Conception et base de données relationelles

Préambule :

Étant donnée la durée du cours et l'ensemble des concepts que nous avons à aborder, ce document n'est pas suffisant pour garantir une bonne compréhension de l'ensemble des intéractions, modélisations, et outils autour des bases de données.

Ce document constitue une base des notions à maitriser, que nous allons utiliser dans le cadre du cours de web. 

Il est nécessaire d'approfondir ces notions au travers d'un cours un peu plus théoriques. 

Voici quelques liens qui pourront vous être utile  :

* https://sql.sh/
* https://sqlbolt.com/
* http://cartman34.fr/informatique/sgbd/differences-entre-inner-left-right-et-outer-join-en-sql.html

## Définitions

Une base de données correspond à un ensemble de données : 

* Volumineux et __minimalement redondant__ 
* Reliées entre elles de façon __structurée__
* Stockées de façon __centralisées__ ou __distribués__
* Interrogeables et modifiables par une ou plusieurs personnes en parallèle
* Servant à une ou plusieurs applications

Ces données sont stockées est gérées au travers d'un SGBD (système de gestion de base de donnée).
C'est un logiciel qui prend en charge la structuration, le stockage, la mise à jour et la maintenance d’une BDD.

On y retrouve plusieurs système connu :

* MySQL
* PostgreSQL (celui que l'on va utiliser dans ce cours)
* Oracle
* MariaDb
* Access
* Sqlite et bien d'autres

Le SGBD est donc le système que nous allons utiliser afin de pouvoir concevoir, mettre en place et intéragir avec la base de données.

## Étape de conception d'une base de données

* Analyse du besoin et de l'existant
* Transformation du besoin en un ensemble de modèle conceptuels.
```
Le modèle conceptuels restitue le besoin attendu sans aucune contrainte technique. Il est généralement représenté au travers d'un diagrame UML
``` 
* Transformation du modèle conceptuel en un modèle logique
```
Le modèle logique n'est que l'adaptation du modèle conceptuel au SGBD choisi. On commence à rajouter les contraintes techniques liés à ce système
```
* Création de la structure de la base de données via le SGBD.
```
On transforme à nouveau le modèle logique, cette fois directement en SQL selon le SGBD.
```

## Modélisation de la données

Il y a différent niveau / méthode de conceptualisation de la données.

#### Le modèle E-A (Entité - Association)
* Niveau conceptuel de la méthodologie MERISE https://fr.wikipedia.org/wiki/Merise_(informatique)
* Ne fonctionne que pour les bases de données relationelle
* Un peu dépassé

#### Le modèle UML (Unified Modeling Langage)
* Modélisation orientée application
* Représentation de la structure BDD et / ou du diagrame de classe

## Modélisation UML

La modélisation UML ne concerne pas que la modélisation de la structure de la base de données. Elle est souvent rattaché directemen à une représentation de la structure du code à produire.

Je ne vais pas m'étendre dans ce document sur le formalisme de la modélisation uml étant donnée que le cours se concentre sur la partie base de donnée / SQL.

Il existe un cours qui est extrêmement bien fait sur openclassrooms : https://openclassrooms.com/fr/courses/2035826-debutez-lanalyse-logicielle-avec-uml

Attention toutefois. Si l'uml sert de représentation tantôt pour le SQL tantôt pour le code, il faut faire extrêmement attention à ne pas mélanger les deux.

Il n'y a à priori aucune raison pour que la représentation de votre donnée dans votre application colle à la façon dont vous la stockées. La nature des notions applicatives doit être réfléchi dans un contexte applicatif.

Par exemple : 
La notion de "tweet" est généralement rattaché à la dénormalisation du nombre de like / partage.
Vous auriez donc dans votre application le nmbre de like / partage au sein de votre notion applicative.
En revanche, dans votre base de données, chacune de ces notions est distincte. Tweet - like - user

## Structure d'une base de données

#### Les tables

Les tables correspondent aux notions représentées dans notre BDD. Ces tables contiennent :
* Des attributs
* Des enregistrements
* Des clés primaires
* Des clés étrangères
* Des relations
* Des contraintes d'intégrités

#### Les attributs

Un attributs correspond a une colonne. Il est caractérisé par un nom et un type dans lequel il prend ses valeurs. Il est généralement appelé `champ` ou `propriété`.

#### Les enregistrements

Un enregistrement correspond à une ligne de la table et prend une valeur pour chacun de ses attributs.

Certaines de ces valeurs peuvent être nulles

#### Les clés 

Une clé correspond à l'ensemble minimale d'attribut d'un enregistrement permettant d'en garantir l'unicité.
Toute table doit contenir au moins une clé. 

##### Clé primaires

Lorsque plusieurs clés existent dans une table, la plus simple est appelée "clé primaire"

##### Clé candidate

Lorsque plusieurs clés existent dans une table, toutes celle qui n'ont pas été choisie comme clé primaire sont nomnés "clé candidate".

##### Clé étrangère

Une clé étrangère correspond à un attribut (ou ensemble d'attribut) d'une table faisant référence à la clé primaire d'une autre table.
Elles servent à matérialiser une relation entre plusieurs tables.
Elles peuvent aussi servir de contrainte d'intégrité afin de prévenir l'incohérence des données de la base.

##### Les relations

Il existe plusieurs façon de caractériser les relations entre les différentes tables.

**Les liens 1-n**

Les liens 1-n permette de représenter une notion d'appartenance. La dénomination 1-n fait référence à la cardinalités des différents enregistrements présent dans une table de la base de données.

Par exemple nous avons :
* 1 table représentant une notion d'utilisateurs
* 1 table représentant des billets d'avion

Chaque utilisateur peut avoir n billets d'avion
Chaque billets d'avion a exactement 1 utilisateurs.

Afin de représenter cette notion, il est nécessaire et suffisant de référencer l'utilisateur au sein de la table représentant les billets d'avion. On utilise dans ce cas une clé étrangère.

**Les liens n-n**
Les liens n-n permettent de représenter une notion d'organisation. La dénomination n-n fait référence à la cardinalités des différents enregistrements présent dans les tables de la base de données concernées.

Par exemple nous avons :
* 1 table représentant un ensemble d'élève
* 1 table représentant un ensemble de professeur

Chaque élève possède au minimum 1 professeur et peut en avoir plusieurs.
Chaque professeur possède au moins 1 élèves et peut en avoir plusieurs.

Il n'y a pas de solution triviale pour représenter cette notion. Il faut impérativement créer une nouvelle table (généralement appellée table de passage) permettant de référencer à la fois les élèves et les professeurs.

Ainsi les enregistrements des élèves sont en relation avec les enregistrements des professeurs au travers de la table `eleve_professeur` contenant 2 clé étrangères :
* Celle des professeurs.
* Celle des élèves.

On peut ainsi retrouver pour chaque professeur l'ensemble de ces élèves.
On peut ainsi retrouver pour chaque élève l'ensemble des professeurs.

/!\ ATTENTION /!\
Il est courant, de choisir une solution de facilité quant au nommage de ces tables de passage (dans mon exemple `eleve_professeur`).
Néanmoins, je vous recommande fortement de prendre le temps de réfléchir à la nature du lien qui lie les notions. Il existe bien souvent des termes précis permettant de donner un nom **pourvu de sens** à cette relation.

## Le SQL

Le sql est un langage interprété par les différents SGBD. La syntaxe SQL varie d'un SGBD à l'autre, mais l'ensemble des concepts s'appliquent à tous les SGBD.
Il est donc **important** de bien connaître ces concepts afin de pouvoir retrouver facilement la syntaxe associée. 



