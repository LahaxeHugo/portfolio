<?php

include '../include.php';
( $dbObj = getconnectionObj() ) or die( $stopScript );
$presentation = new presentation($dbObj, PORTFOLIO_PRESENTATION);

$update_array = array(
	'description' => $_REQUEST['description'],
	'mail' => $_REQUEST['mail']
);


if(isset($_FILES['picture']['name']) && !empty($_FILES['picture']['name'])) {
	$imageExtension = strtolower(pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION));
	$update_array['picture'] = 'profile_picture.'.$imageExtension;
	
	if(($currentImg = $general->getFile())) {
		if(file_exists('../assets/img/'.$currentImg)) unlink('../assets/img/'.$currentImg);
	}
	move_uploaded_file($_FILES['picture']['tmp_name'], '../assets/img/'.$update_array['picture']);
}

if(isset($_FILES['cv']['name']) && !empty($_FILES['cv']['name'])) {
	$update_array['cv'] = $_FILES['cv']['name'];
	
	if(($currentCV = $presentation->getFile())) {
		if(file_exists('../assets/files/'.$currentCV)) unlink('../assets/files/'.$currentCV);
	}
	move_uploaded_file($_FILES['cv']['tmp_name'], '../assets/files/'.$update_array['cv']);
}

$presentation->update($update_array);
header('Location: index.php#presentation');

?>