<?php

include '../include.php';
( $dbObj = getconnectionObj() ) or die( $stopScript );

$general = new general_info($dbObj, PORTFOLIO_GENERAL);
$data = $general->load();
//echo '<pre>'.print_r($data, TRUE).'</pre>';

?>

<h2>Général Info</h2>
<hr>
<div class="content-data">
	<form action="form-general.php" method="post" enctype="multipart/form-data">
		<div>
			<p>Nom :</p>
			<input type="text" name="name" value="<?php echo $data[0]['name']; ?>">
		</div>
		<div>
			<p>Métier :</p>
			<input type="text" name="job" value="<?php echo $data[0]['job']; ?>">
		</div>
		<div>
			<p>Description :</p>
			<textarea name="description"><?php echo $data[0]['description']; ?></textarea>
		</div>
		<div>
			<p>N° téléphone :</p>
			<input type="text" name="phone" value="<?php echo $data[0]['phone']; ?>">
		</div>
		<div>
			<p>Adresse :</p>
			<input type="text" name="adress" value="<?php echo $data[0]['adress']; ?>">
		</div>
		<div>
			<p>Mail :</p>
			<input type="text" name="mail" value="<?php echo $data[0]['mail']; ?>">
		</div>
		
		<div>
			<input type="submit" value="Enregistrer">
		</div>
		
	</form>
	
</div>