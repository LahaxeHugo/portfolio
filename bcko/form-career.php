<?php

include '../include.php';
( $dbObj = getconnectionObj() ) or die( $stopScript );
$career_el = new career($dbObj, PORTFOLIO_CAREER);

$update_array = array(
	'date' => $_REQUEST['date'],
	'name' => $_REQUEST['name'],
	'location' => $_REQUEST['location'],
	'description' => $_REQUEST['description'],
	'type' => $_REQUEST['type']
);

if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
	$career_el->update($update_array, $_REQUEST['id']);
} else {
	$update_array['order_career'] = $_REQUEST['order'] + 1;
	$career_el->insertInto($update_array);
}
header('Location: index.php#career');

?>