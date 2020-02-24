<?php

include 'include.php';
( $dbObj = getconnectionObj() ) or die( $stopScript );

$general = new general_info($dbObj, PORTFOLIO_GENERAL);
$general_data = $general->load();

$presentation = new presentation($dbObj, PORTFOLIO_PRESENTATION);
$presentation_data = $presentation->load();
?>

<html>
	<head>
    <meta charset="utf-8">
    <title>Back Office</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/master.css">
  </head>
  <body>
  	
  	<!-- HEADER -->
  	<header>
    	<h2 class="logo">Hugo Lahaxe</h2>
    	
			<a href="#main-menu" class="menu-toggle">
				<div class="burger-breads">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</a>
			
			<nav id="main-menu" class="main-menu">
				<a href="#main-menu-toggle" class="menu-close">
					<div class="burger-breads close">
						<span></span>
						<span></span>
						<span></span>
					</div>
				</a>
				<ul>
					<li><a href="#about">à propos</a></li>
					<li><a href="#career">parcours</a></li>
					<li><a href="#skills">compétences</a></li>
					<li><a href="#projects">projets</a></li>
					<li><a href="#contact">contact</a></li>
				</ul>
			</nav>
			<a href="#main-menu-toggle" class="backdrop" hidden></a>
		</header>
		
		<!-- HERO -->
		<section id="hero">
			<h1><?php echo $general_data[0]['name'];?></h1>
			<h2 class="job"><?php echo $general_data[0]['job'];?></h2>
			<h2 class="description"><?php echo $general_data[0]['description'];?></h2>
			<a href="" class="arrow-scrolldown"><img src="assets/img/arrow-scrolldown.svg" alt="scrolldown arrow"></a>
		</section>
		
		<!-- A PROPOS -->
		<section id="about">
			<h2>à propos</h2>
			<article class="content">
				<section class="content-left">
					<img src="assets/img/<?php echo $presentation_data[0]['picture'];?>" alt="photo de profile">
				</section>
				<section class="content-right">
					<p><?php echo $presentation_data[0]['description'];?></p>
					<div class="about-links">
						<div><a href="#contact"><img src="assets/img/contact.svg"><span>me contacter<span></a></div>
						<div><a href="assets/files/<?php echo $presentation_data[0]['cv'];?>"><img src="assets/img/contact.svg"><span>télécharger mon cv</span></a></div>
					</div>
				</section>
			</article>
		</section>
		
		<!-- CAREER -->
		<section id="career">
			<h2>Mon parcours</h2>
		</section>
  </body>
</html>