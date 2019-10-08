 # Introduction au HTML

Le html n'est pas un *_Langage_*. Il s'agit d'une convention qui utilise le format xml (extensible markup language).

Le Xml est composé d'élement et d'attributs (les 2 notations étant équivalentes).

```xml
<emp_info id="1">   <!-- Attributes represent-->
  ...
<emp_info>

<emp_info>          <!-- Elements represent-->
  <id>1</id>
<emp_info>
```

Les 2 modes de notations étant équivalent.

Le html se base donc sur cette structure pour décrire la représentation d'un site web. Comme dit plus haut, le html est une "convention". Ce sont vos *browser web* qui interprète le html pour le transformer en une page web.

## Basic HTML Structure 	

Voici la structure de base pour la création d'un site web.

```html
<html>
 <head>
  <title>website title</title>
 </head>
 <body>
  content of website ...
 </body>
</html>
```

En HTML, il existe 2 types de balises :
* Les balises blocs
* Les balises inline

## Bloc

Les balises blocs servent a structurer la page / le texte

```html
<div> this is a div </div>	Division or Section of Page Content
<p> this is a paragraph </p>	Paragraph of Text
<ul> ... List-bloc
  <li>Element 1</li> ... List-element
  <li>Element 2<li>
</ul>
```

<hr>
<div style="background:black"> this is a div </div>
<p> this is a paragraph </p>
<ul>
  <li>Element 1</li>
  <li>Element 2</li>
</ul>
<hr>


## Inline 

```html
<h?> ... </h?>	Heading (?= 1 for largest to 6 for smallest, eg h1)
<b> ... </b>	Bold Text
<i> ... </i>	Italic Text
<u> ... </u>	Underline Text
<strike> ... </strike>	Strikeout
<sup> ... </sup>	Superscript 
<sub> ... </sub>	Subscript 
<small> ... </small>	Small 
<tt> ... </tt>	Typewriter Text
<strong> ... </strong>	Strong 
<em> ... </em>	Emphasis 
<span> ... </span>	Section of text within other content
<a href=""> Link </a>   Link to a url precised in href
<img src=""></img> Displays img in src (file path / url)
````

<hr>
<h1> header 1 </h1>
<h2> header 2 </h2>
<h3> header 3 </h3>
<h4> header 4 </h4>
<h5> header 5 </h5>
<h6> header 6 </h6>
<b> Bold Text </b>
<i> Italic Text </i>	
<u> Underline Text </u>	
<strike> Strikeout </strike>	
<sup> Superscript </sup>	 
<sub> Subscript </sub>	 
<small> Small </small>	 
<tt> Typewriter Text </tt>	
<strong> Strong </strong>	 
<em> Emphasis </em>	 
<span> Section of text within other content </span>	
<a href=""> Link </a>   Link to a url precised in href
<img src=""></img> Displays img in src (file path / url)
<hr>

For more informations on how html works, juste follow the link (in french though) :<a href="https://openclassrooms.com/fr/courses/1603881-apprenez-a-creer-votre-site-web-avec-html5-et-css3"> here</a>



