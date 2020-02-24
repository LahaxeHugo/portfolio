<?php

include '../include.php';
( $dbObj = getconnectionObj() ) or die( $stopScript );


switch ($_REQUEST['page']) {
	case 'career':
		$element = new career($dbObj, PORTFOLIO_CAREER);
		break;
}
$element->delete($_REQUEST['id']);

?>