<?php

// PDO PARAMETER
$SITE_identity = 'LOCAL';

if ($SITE_identity == 'LOCAL') {
	$db_param = array(
		'host'		=> 'localhost',
		'name'		=> 'projet_personnel',
		'ident'		=> 'root',
		'pass'		=> '',
		'charset'	=> 'utf8'
	);
}
elseif ($SITE_identity == 'PROD') {
	$db_param = array(
		'host'		=> '',
		'name'		=> '',
		'ident'		=> '',
		'pass'		=> '',
		'charset'	=> 'utf8'
	);
}

// INSTANCE OF PDO OBJECT

function getConnectionObj() {
	GLOBAL $db_param;

	try {
		$dbObj = new PDO('mysql:host=' .$db_param['host'] .';dbname=' .$db_param['name'], $db_param['ident'], $db_param['pass']);
		$dbObj->exec("set names utf8");
	}
	catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
		exit();
	}
	return $dbObj;
}
$stopScript = 'Le site est en cours de maintenance et devrait &ecirc;tre &agrave; nouveau disponible dans quelques minutes.<br /><br />Nous vous prions de bien vouloir nous en excuser.';

// DEFINE

define('DBERROR_fmt', '%s ON L[%s] : DB ERROR(%s) : %s ON REQ : %s');
//define('TIMELINE_IMG_PATH', 'timeline_img/');
define('PORTFOLIO_GENERAL', 'general');
define('PORTFOLIO_SITE', 'site');
define('PORTFOLIO_PRESENTATION', 'presentation');
define('PORTFOLIO_CAREER', 'career');
define('PORTFOLIO_SKILLS', 'skills');
define('PORTFOLIO_PROJECTS', 'projects');

// CLASSES

include_once 'class.php';

//

?>
