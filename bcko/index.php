<?php

include '../include.php';
( $dbObj = getconnectionObj() ) or die( $stopScript );
$site = new site($dbObj, PORTFOLIO_SITE);
$data = $site->load();

?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Back Office</title>
    <link rel="icon" href="../assets/img/<?php echo $data[0]['icon']?>">
    <link rel="stylesheet" href="../assets/css/back.css">
  </head>
  <body>
    <aside class="naviguation">
    	<h1>Back Office</h1>
    	<hr>
    	<nav class="back-nav">
    		<ul>
    			<li class=""><a href="#general">Général Info</a></li>
    			<li class=""><a href="#site">Site</a></li>
    			<li class=""><a href="#presentation">Présentation</a></li>
    			<li class=""><a href="#career">Parcours</a></li>
    			<li class=""><a href="#skills">Compétences</a></li>
    			<li class=""><a href="#projects">Projets</a></li>
    		</ul>
    	</nav>
    </aside>
    
    <section class="content">
    	
    </section>
    <div class="delete-popup">
    	<div class="backdrop"></div>
    	<div class="box">
    		<header>
    			<p>Supprimer un élément</p>
    		</header>
    		<p>Voulez-vous supprimer <span></span> ?</p>
    		<button class="delete">Supprimer</button>
    		<button class="cancel">Annuler</button>
    	</div>
    </div>
    <div class="sort-popup">
    	<div class="backdrop"></div>
    	<div class="box">
    		<header>
	    		<p>Modifier l'ordre</p>
	    	</header>
	    	<p>Déplacer les colonnes en les faisant glisser <br>vers le haut ou vers le bas.</p>
	    	<ul class="elements">
	    		
	    	</ul>
    		<button class="save">Enregistrer</button>
    		<button class="cancel">Annuler</button>
    	</div>
    </div>
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/jquery-ui.min.js"></script>
    <script src="../assets/js/back.js"></script>
  </body>
</html>