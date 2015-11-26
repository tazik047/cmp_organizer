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

Include 'Logic/authorize.php';
 
Include 'Logic/DataBase/Database.php';
Include 'Logic/DataBase/UserRepository.php';

$repo = new UserRepository();

$GLOBALS['UserRepository'] = $repo;

?>