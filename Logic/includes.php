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
	include $class_name . '.php';
}

Include 'Logic/authorize.php';
Include 'Logic/AvatarService.php';

?>