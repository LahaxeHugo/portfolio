<?php

include '../include.php';
( $dbObj = getconnectionObj() ) or die( $stopScript );

$skills = new skills($dbObj, PORTFOLIO_SKILLS);
$skills->order_name = 'order_skills';
$data = $skills->load();

$length = count($data);
$element_display = '';
$sort_list = '';
foreach ($data as $element) {	
 	$element_display	.='<div class="element" data-id="' .$element['id'] .'">'
 	 									.		'<div class="element-data">'
 	 									.			'<div class="element-name">'
 	 									.				'<p>Nom : </p>'
 	 									.				'<p> ' .$element['name'] .'</p>'
 	 									.			'</div>'
 	 									.			'<div class="element-pourcent">'
 	 									.				'<p>Pourcentage : </p>'
 	 									.				'<p>' .$element['pourcent'] .' %</p>'
 	 									.			'</div>'
 	 									.		'</div>'
 	 									.		'<div class="button">'
 	 									.			'<a href="" class="edit">Modifier</a>'
 	 									.			'<a href="" class="delete">Delete</a>'
 	 									.		'</div>'
 	 									.	'</div>';

	$sort_list .=	'<li data-id="'.$element['id'].'" id="'.$element['order_skills'].'">'.$element['name'].'</li>';
}
unset($element);

?>

<h2>Compétences</h2>
<hr>
<div class="content-data" id="skills">
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
<div class="list-hidden" style="display: none;">
	<?php echo $sort_list;?>;
</div>