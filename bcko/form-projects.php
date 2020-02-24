<?php

include '../include.php';
( $dbObj = getconnectionObj() ) or die( $stopScript );
$projects_el = new projects($dbObj, PORTFOLIO_PROJECTS);

$update_array = array(
	'name' => $_REQUEST['name'],
	'description' => $_REQUEST['description'],
	'link' => $_REQUEST['link']
);

if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
	if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
		$imageExtension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
		$update_array['image'] = 'project_'.$_REQUEST['id'].'.'.$imageExtension;
		
		if(($currentImg = $projects_el->getFile('image', $_REQUEST['id']))) {
			if(file_exists('../assets/img/'.$currentImg)) unlink('../assets/img/'.$currentImg);
		}
		move_uploaded_file($_FILES['image']['tmp_name'], '../assets/img/'.$update_array['image']);
	}
	$projects_el->update($update_array, $_REQUEST['id']);
} else {
	$update_array['order_projects'] = $_REQUEST['order'] + 1;
	$projects_el->insertInto($update_array);
	
	if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
		$img_id = $projects_el->getMaxId();
		$imageExtension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
		$update_img['image'] = 'project_'.$img_id.'.'.$imageExtension;
		
		move_uploaded_file($_FILES['image']['tmp_name'], '../assets/img/'.$update_img['image']);
		
		$projects_el->update($update_img, $img_id);
	}
}
header('Location: index.php#projects');

?>