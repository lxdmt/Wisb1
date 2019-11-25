<!DOCTYPE html>
<html>
<head>
	<title>Page films WIS B1</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<section class="jumbotron text-center">
    <?php
      function card($titre,$image,$description,$lien){
      echo"<div class=\"col-lg-3 col-sm-12 col-md-6\">
       <div class=\"card\">
        <img class=\"card-img-top\" src=\"$image\" alt=\"Card image\">
            <div class=\"card-body\">
            <h4 class=\"card-title\">$titre</h4>
            <p class=\"card-text\">$description</p>
            <a href=\"$lien\" class=\"btn btn-primary\">Voir le film</a>
         </div> </div> </div>";
      }
    ?>
	<div class="container">
	<h1 class="jumbotron-heading">
     <?php
         $site = "Netflix";
         echo $site;
         ?>
     </h1>
       <h2>Bienvenue toto</h2>
 </div>
 <p class= "lead text-muted">Netflix propose des films et des séries ! </p>
</section>
<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="la.jpg" alt="Los Angeles">
    </div>
    <div class="carousel-item">
      <img src="chicago.jpg" alt="Chicago">
    </div>
    <div class="carousel-item">
      <img src="ny.jpg" alt="New York">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>
<div class="container">
<div class="row">
                
                  <?php

require("parametres.php");
$dbh = new PDO ("mysql:host=$host;dbname=$dbname",$login,$password);

if (array_key_exists("annee",$_GET)){
  $annee=$_GET["annee"];
  $req=$dbh -> prepare("SELECT * FROM film WHERE annee = :annee");$req -> bindParam(":annee",$annee);
  $req -> execute();
  $films = $req;
}
else{

$req = $dbh -> query("SELECT * FROM film");

$films = $req;}

foreach ($films as $element){
  card($element["titre"],$element["image"],$element["description"],$element["lien"]);
}
                 ?>
   
            </div>
</div>
<script type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>