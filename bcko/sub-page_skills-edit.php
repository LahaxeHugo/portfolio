<?php

include '../include.php';
( $dbObj = getconnectionObj() ) or die( $stopScript );

$data[0] = array(
	'name' => '',
	'pourcent' => ''
);

$id_input = '';
$order_input = '';
				
if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {	
	$skills_el = new skills($dbObj, PORTFOLIO_SKILLS);
	$data = $skills_el->load($_REQUEST['id']);
	
	$title = 'Modifier un élémént';
	$id_input = '<input type="hidden" name="id" value="' .$_REQUEST['id'] .'">';
} else {
	$title = 'Ajouter un élément';
	$order_input = '<input type="hidden" name="order" value="' .$_REQUEST['length'] .'">';
}

?>

<h2><?php echo $title; ?></h2>
<hr>
<form action="form-skills.php" method="post" enctype="multipart/form-data">
	<?php echo $id_input; ?>
	<?php echo $order_input; ?>
	<div>
		<label for="name">Nom : </label>
		<input name="name" value="<?php echo $data[0]['name']; ?>">
	</div>
	<div>
		<label for="pourcent">Pourcentage : </label>
		<input name="pourcent" value="<?php echo $data[0]['pourcent']; ?>">
	</div>
	<div>
		<input type="submit" value="Enregistrer">
	</div>
</form>