<?php

function generateUrl($action, $params='')
{
	return "http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."/index.php?action=".$action.($params==''?'':("&".$params));
}

function generateGlobalUrl($page)
{
	return "http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."/".$page.".php";
}

Include 'Model/User.php';
Include 'Model/EventType.php';

Include 'Logic/authorize.php';
 
Include 'Logic/DataBase/Database.php';
Include 'Logic/DataBase/UserRepository.php';
Include 'Logic/DataBase/EventTypeRepository.php';

$GLOBALS['UserRepository'] = new UserRepository();
$GLOBALS['EventTypeRepository'] = new EventTypeRepository();

?>