<?php

include '../include.php';
( $dbObj = getconnectionObj() ) or die( $stopScript );


switch ($_REQUEST['page']) {
	case 'career':
		$element = new career($dbObj, PORTFOLIO_CAREER);
		break;
	case 'skills':
		$element = new skills($dbObj, PORTFOLIO_SKILLS);
		break;
	case 'projects':
		$element = new projects($dbObj, PORTFOLIO_PROJECTS);
		if(($currentImg = $element->getFile('image', $_REQUEST['id']))) {
			if(file_exists('../assets/img/'.$currentImg)) unlink('../assets/img/'.$currentImg);
		}
		break;
}
$element->delete($_REQUEST['id']);

?>