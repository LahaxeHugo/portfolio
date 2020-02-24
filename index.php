<?php

include 'include.php';
( $dbObj = getconnectionObj() ) or die( $stopScript );

$site = new site($dbObj, PORTFOLIO_SITE);
$site_data = $site->load();

$general = new general_info($dbObj, PORTFOLIO_GENERAL);
$general_data = $general->load();

$presentation = new presentation($dbObj, PORTFOLIO_PRESENTATION);
$presentation_data = $presentation->load();

$career = new career($dbObj, PORTFOLIO_CAREER);
$career->order_name = 'order_career';
$career_data = $career->load();
$career_str = '';

foreach($career_data as $career_el) {
	$career_str .='<section class="'.$career_el['type'].'">'
							.		'<p class="date">'.$career_el['date'].'</p>'
							.		'<h3 class="name">'.$career_el['name'].'</h3>'
							.		'<p class="location">'.$career_el['location'].'</p>'
							.		'<p class="description">'.$career_el['description'].'</p>'
							.		'<div class="dot"></div>'
							.	'</section>';
}

$skills = new skills($dbObj, PORTFOLIO_SKILLS);
$skills->order_name = 'order_skills';
$skills_data = $skills->load();
$skills_str = '';
foreach($skills_data as $skills_el) {
	$skills_str .='<section>'
							.		'<div class="text">'
							.			'<p>'.$skills_el['name'].'</p>'
							.			'<p>'.$skills_el['pourcent'].'%</p>'
							.		'</div>'
							.		'<div class="indicator">'
							.			'<div style="width:'.$skills_el['pourcent'].'%"></div>'
							.		'</div>'
							.	'</section>';
}

$projects = new projects($dbObj, PORTFOLIO_PROJECTS);
$projects->order_name = 'order_projects';
$projects_data = $projects->load();
$projects_str = '';
foreach($projects_data as $projects_el) {
	$projects_str .='<section link="'.$projects_el['link'].'">'
								.		'<header><h3>'.$projects_el['name'].'</h3></header>'
								.		'<div class="img"><img src="assets/img/'.$projects_el['image'].'"></div>'
								.		'<footer><p>'.$projects_el['description'].'</p></footer>'
								.	'</section>';
}
?>

<html>
	<head>
    <meta charset="utf-8">
    <title><?php echo $site_data[0]['name']?></title>
    <link rel="icon" href="assets/img/<?php echo $site_data[0]['icon']?>">
    <meta name="description" content="<?php echo $site_data[0]['description']?>">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/master.css">
  </head>
  <body>
  	
  	<!-- HEADER -->
  	<header>
    	<h2 class="logo"><?php echo $general_data[0]['name']?></h2>
    	
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
			<article class="content">
				<?php echo $career_str;?>
				<div class="arrow"><img src="assets/img/arrow-career.svg"></div>
			</article>
		</section>
		
		<!-- SKILLS -->
		<section id="skills">
			<h2>Mes compétences</h2>
			<article class="content">
				<?php echo $skills_str;?>
			</article>
		</section>
		
		<!-- PROJECTS -->
		<section id="projects">
			<h2>Mes projets</h2>
			<article class="content">
				<?php echo $projects_str;?>
			</article>
		</section>
		
		<!-- CONTACT -->
		<section id="contact">
			<h2>Contact</h2>
			<article class="content">
				<section class="send-msg">
					<form action="send-mail.php" method="post">
						<div>
							<label for="name">Nom</label>
							<input class="contact-field" name="name" type="text" placeholder="Votre nom*" required>
						</div>
						<div>
							<label for="mail">E-mail</label>
							<input class="contact-field" name="mail" type="text" placeholder="Votre email*" required>
						</div>
						<div>
							<label for="msg">Message</label>
							<textarea class="contact-field" name="msg" type="text" placeholder="Votre message*" required></textarea>
						</div>
						<button class="contact-submit" type="submit" class="submit">Envoyer</button>
					</form>
				</section>
				<section class="contact-info">
					<article>
						<img src="assets/img/phone.svg">
						<p><?php echo $general_data[0]['phone'];?></p>
					</article>
					<article>
						<img src="assets/img/mail.svg">
						<p><?php echo $general_data[0]['mail'];?></p>
					</article>
					<article>
						<img src="assets/img/location.svg">
						<p><?php echo $general_data[0]['adress'];?></p>
					</article>
				</section>
			</article>
		</section>
		
		<!-- FOOTER-->
		<footer>
			<p>© Hugo Lahaxe 2020. Tous droits réservés.</p>
		</footer>
  </body>
</html>