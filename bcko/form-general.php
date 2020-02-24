<?php

include '../include.php';
( $dbObj = getconnectionObj() ) or die( $stopScript );
$general = new general_info($dbObj, PORTFOLIO_GENERAL);

$update_array = array(
	'name' => $_REQUEST['name'],
	'job' => $_REQUEST['job'],
	'description' => $_REQUEST['description'],
	'phone' => $_REQUEST['phone'],
	'adress' => $_REQUEST['adress'],
	'mail' => $_REQUEST['mail']
);

$general->update($update_array);
header('Location: index.php#general');

?>