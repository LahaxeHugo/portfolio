<?php

include '../include.php';
( $dbObj = getconnectionObj() ) or die( $stopScript );
$skills_el = new skills($dbObj, PORTFOLIO_SKILLS);

$update_array = array(
	'name' => $_REQUEST['name'],
	'pourcent' => $_REQUEST['pourcent']
);

if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
	$skills_el->update($update_array, $_REQUEST['id']);
} else {
	$update_array['order_skills'] = $_REQUEST['order'] + 1;
	$skills_el->insertInto($update_array);
}
header('Location: index.php#skills');

?>