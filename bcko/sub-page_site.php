<?php

include '../include.php';
( $dbObj = getconnectionObj() ) or die( $stopScript );

$site = new site($dbObj, PORTFOLIO_SITE);
$data = $site->load();
//echo '<pre>'.print_r($data, TRUE).'</pre>';

?>

<h2>Site</h2>
<hr>
<div class="content-data">
	<form action="form-site.php" method="post" enctype="multipart/form-data">
		<div class="icon-pic">
			<p>Icône du site : </p>
			<div>
				<img id="preview" src="../assets/img/<?php echo $data[0]['icon']; ?>">
			</div>
			<input type="file" onchange="readURL(this);" name="icon">
		</div>
		<div>
			<p>Titre du site :</p>
			<input type="text" name="name" value="<?php echo $data[0]['name']; ?>">
		</div>
		<div>
			<p>Description du site :</p>
			<textarea name="description"><?php echo $data[0]['description']; ?></textarea>
		</div>
		
		<div>
			<input type="submit" value="Enregistrer">
		</div>
		
	</form>
	
</div>