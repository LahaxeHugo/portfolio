<?php

session_start();


?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Back Office</title>
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
    		<p>Voulez-vous supprimer <span></span> ?</p>
    		<button class="delete">Supprimer</button>
    		<button class="cancel">Annuler</button>
    	</div>
    </div>
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/back.js"></script>
  </body>
</html>