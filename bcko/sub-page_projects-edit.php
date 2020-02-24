<?php

include '../include.php';
( $dbObj = getconnectionObj() ) or die( $stopScript );

$data[0] = array(
	'name' => '',
	'description' => '',
	'link' => ''
);
$id_input = '';
$order_input = '';
				
if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {	
	$projects_el = new projects($dbObj, PORTFOLIO_PROJECTS);
	$data = $projects_el->load($_REQUEST['id']);
	
	$title = 'Modifier un élémént';
	$id_input = '<input type="hidden" name="id" value="' .$_REQUEST['id'] .'">';
} else {
	$title = 'Ajouter un élément';
	$order_input = '<input type="hidden" name="order" value="' .$_REQUEST['length'] .'">';
}
$img_dsp = (isset($data[0]['image']) ? $data[0]['image'] : '');
?>

<h2><?php echo $title; ?></h2>
<hr>
<form action="form-projects.php" method="post" enctype="multipart/form-data">
	<?php echo $id_input; ?>
	<?php echo $order_input; ?>
	<div>
		<label for="name">Nom : </label>
		<input name="name" value="<?php echo $data[0]['name']; ?>">
	</div>
	<div class="description">
		<label for="description">Description : </label>
		<textarea name="description"><?php echo $data[0]['description']; ?></textarea>
	</div>
	<div>
		<label for="link">Lien : </label>
		<input name="link" value="<?php echo $data[0]['link']; ?>">
	</div>
	<div class="image">
			<p>Image du projet :</p>
			<div>
				<img id="preview" src="../assets/img/<?php echo $img_dsp;?>">
			</div>
			<input type="file" onchange="readURL(this);" name="image">
		</div>
	<div>
		<input type="submit" value="Enregistrer">
	</div>
</form>