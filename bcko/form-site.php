<?php

include '../include.php';
( $dbObj = getconnectionObj() ) or die( $stopScript );
$site = new site($dbObj, PORTFOLIO_SITE);

$update_array = array(
	'name' => $_REQUEST['name'],
	'description' => $_REQUEST['description']
);


if(isset($_FILES['icon']['name']) && !empty($_FILES['icon']['name'])) {
	$imageExtension = strtolower(pathinfo($_FILES['icon']['name'], PATHINFO_EXTENSION));
	$update_array['icon'] = 'icon_site.'.$imageExtension;
	
	if(($currentImg = $site->getFile('icon'))) {
		if(file_exists('../assets/img/'.$currentImg)) unlink('../assets/img/'.$currentImg);
	}
	move_uploaded_file($_FILES['icon']['tmp_name'], '../assets/img/'.$update_array['icon']);
}

$site->update($update_array);
header('Location: index.php#site');

?>