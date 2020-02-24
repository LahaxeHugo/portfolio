<?php

include '../include.php';
( $dbObj = getconnectionObj() ) or die( $stopScript );

$career = new career($dbObj, PORTFOLIO_CAREER);
$career->order_name = 'order_career';
$data = $career->load();

$length = count($data);
$element_display = '';
foreach ($data as $element) {	
 	$element_display	.='<div class="element" data-id="' .$element['id'] .'">'
 	 									.		'<div class="element-data">'
 	 									.			'<div class="element-date">'
 	 									.				'<p>Date : </p>'
 	 									.				'<p>' .$element['date'] .'</p>'
 	 									.			'</div>'
 	 									.			'<div class="element-name">'
 	 									.				'<p>Nom : </p>'
 	 									.				'<p>' .$element['name'] .'</p>'
 	 									.			'</div>'
 	 									.			'<div class="element-location">'
 	 									.				'<p>Localisation : </p>'
 	 									.				'<p>' .$element['location'] .'</p>'
 	 									.			'</div>'
 	 									.			'<div class="element-description">'
 	 									.				'<p>Description : </p>'
 	 									.				'<p>' .$element['description'] .'</p>'
 	 									.			'</div>'
 	 									.			'<div class="element-type">'
 	 									.				'<p>Type : </p>'
 	 									.				'<p>' .$element['type'] .'</p>'
 	 									.			'</div>'
 	 									.		'</div>'
 	 									.		'<div class="button">'
 	 									.			'<a href="" class="edit">Modifier</a>'
 	 									.			'<a href="" class="delete">Delete</a>'
 	 									.		'</div>'
 	 									.	'</div>';
}
unset($element);

?>

<h2>Parcours / Expérience Professionnel</h2>
<hr>
<div class="content-data" id="career">
	<div class="add-element">
		<a href="">Ajouter un élément</a>
	</div>
	<div class="order-element">
		<a href="">Modifier l'ordre</a>
	</div>
	<div class="content-display" data-length="<?php echo $length;?>">
		<?php echo $element_display;?>
	</div>
</div>