<?php

include '../include.php';
( $dbObj = getconnectionObj() ) or die( $stopScript );

$presentation = new presentation($dbObj, PORTFOLIO_PRESENTATION);
$data = $presentation->load();
//echo '<pre>'.print_r($data, TRUE).'</pre>';

?>

<h2>Présentation / A propos</h2>
<hr>
<div class="content-data">
	<form action="form-presentation.php" method="post" enctype="multipart/form-data">
		<div class="profile-pic">
			<p>Photo de profile :</p>
			<div>
				<img src="../assets/img/<?php echo $data[0]['picture']; ?>">
			</div>
			<input type="file" name="picture">
		</div>
		<div>
			<p>Description :</p>
			<textarea name="description"><?php echo $data[0]['description']; ?></textarea>
		</div>
		<div>
			<p>Mail :</p>
			<input type="text" name="mail" value="<?php echo $data[0]['mail']; ?>">
		</div>
		<div>
			<p>CV :</p>
			<p>Current File : <?php echo $data[0]['cv']; ?></p>
			<input type="file" name="cv">
		</div>
		<div>
			<input type="submit" value="Enregistrer">
		</div>
		
	</form>
	
</div>