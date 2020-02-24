<?php

include '../include.php';
( $dbObj = getconnectionObj() ) or die( $stopScript );

switch ($_REQUEST['page']) {
	case 'career':
		$element = new career($dbObj, PORTFOLIO_CAREER);
		$element->order_name = 'order_career';
		break;
	case 'skills':
		$element = new skills($dbObj, PORTFOLIO_SKILLS);
		$element->order_name = 'order_skills';
		break;
	case 'projects':
		$element = new projects($dbObj, PORTFOLIO_PROJECTS);
		$element->order_name = 'order_projects';
		break;
}
$element->order($_REQUEST['newOrder']);
?>