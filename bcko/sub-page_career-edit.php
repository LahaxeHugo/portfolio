<?php

include '../include.php';
( $dbObj = getconnectionObj() ) or die( $stopScript );

$data[0] = array(
	'date' => '',
	'name' => '',
	'location' => '',
	'description' => ''
);

$select =	'<option value="job">Job</option>'
				.	'<option value="school">School</option>';
$id_input = '';
$order_input = '';
				
if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {	
	$career_el = new career($dbObj, PORTFOLIO_CAREER);
	$data = $career_el->load($_REQUEST['id']);
	
	$title = 'Modifier un élémént';
	$id_input = '<input type="hidden" name="id" value="' .$_REQUEST['id'] .'">';
	$select = str_replace('value="'.$data[0]['type'].'"', 'value="'.$data[0]['type'].'" selected', $select);
} else {
	$title = 'Ajouter un élément';
	$order_input = '<input type="hidden" name="order" value="' .$_REQUEST['length'] .'">';
}

?>

<h2><?php echo $title; ?></h2>
<hr>
<form action="form-career.php" method="post" enctype="multipart/form-data">
	<?php echo $id_input; ?>
	<?php echo $order_input; ?>
	<div>
		<label for="date">Date : </label>
		<input name="date" value="<?php echo $data[0]['date']; ?>">
	</div>
	<div>
		<label for="name">Nom : </label>
		<input name="name" value="<?php echo $data[0]['name']; ?>">
	</div>
	<div>
		<label for="location">Localisation : </label>
		<input name="location" value="<?php echo $data[0]['location']; ?>">
	</div>
	<div class="description">
		<label for="description">Description : </label>
		<textarea name="description"><?php echo $data[0]['description']; ?></textarea>
	</div>
	<div>
		<label for="type">Type : </label>
		<select name="type">
			<?php echo $select; ?>
		</select>
	</div>
	<div>
		<input type="submit" value="Enregistrer">
	</div>
</form>