<?php

include '../include.php';
( $dbObj = getconnectionObj() ) or die( $stopScript );

$projects = new projects($dbObj, PORTFOLIO_PROJECTS);
$projects->order_name = 'order_projects';
$data = $projects->load();

$length = count($data);
$element_display = '';
$sort_list = '';
foreach ($data as $element) {	
 	$element_display	.='<div class="element" data-id="' .$element['id'] .'">'
 	 									.		'<div class="element-data">'
 	 									.			'<div class="element-name">'
 	 									.				'<p>Nom : </p>'
 	 									.				'<p>' .$element['name'] .'</p>'
 	 									.			'</div>'
 	 									.			'<div class="element-description">'
 	 									.				'<p>Description : </p>'
 	 									.				'<p>' .$element['description'] .'</p>'
 	 									.			'</div>'
 	 									.			'<div class="element-link">'
 	 									.				'<p>Lien : </p>'
 	 									.				'<p>' .$element['link'] .'</p>'
 	 									.			'</div>'
 	 									.			'<div class="element-image">'
 	 									.				'<p>Image : </p>'
 	 									.				'<div>'
 	 									.					'<img src="../assets/img/' .$element['image'] .'">'
 	 									.				'</div>'
 	 									.			'</div>'
 	 									.		'</div>'
 	 									.		'<div class="button">'
 	 									.			'<a href="" class="edit">Modifier</a>'
 	 									.			'<a href="" class="delete">Delete</a>'
 	 									.		'</div>'
 	 									.	'</div>';
	
	$sort_list .=	'<li data-id="'.$element['id'].'" id="'.$element['order_projects'].'">'.$element['name'].'</li>';
}
unset($element);

?>

<h2>Projets</h2>
<hr>
<div class="content-data" id="projects">
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