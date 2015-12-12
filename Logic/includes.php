<?php

function generateUrl($action, $params='')
{
	return "http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."/index.php?action=".$action.($params==''?'':("&".$params));
}

function generateGlobalUrl($page)
{
	return "http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."/".$page.".php";
}

function __autoload($class_name) {
	print "<div>$class_name</div>";
	include $class_name . '.php';
}

/*Include 'Model/User.php';
Include 'Model/EventType.php';
Include 'Model/Event.php';
Include 'Model/EventViewModel.php';


 
Include 'Logic/DataBase/Database.php';
Include 'Logic/DataBase/UserRepository.php';
Include 'Logic/DataBase/EventTypeRepository.php';
Include 'Logic/DataBase/EventRepository.php';

$GLOBALS['UserRepository'] = new UserRepository();
$GLOBALS['EventTypeRepository'] = new EventTypeRepository();
$GLOBALS['EventRepository'] = new EventRepository();*/

Include 'Logic/authorize.php';
Include 'Logic/AvatarService.php';

?>