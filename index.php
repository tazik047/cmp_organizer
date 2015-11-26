<?php
/**
 * Created by PhpStorm.
 * User: Tazik
 * Date: 25.11.2015
 * Time: 23:02
 */
 $AllowAnonymous = false;
 
Include 'Logic/includes.php';

if(!isset($_GET['action'])){
	$_GET['action'] = 'home';
}

$view_name = '';

switch($_GET['action']){
	case 'logout':
		logout();
		return;
	case 'events':
		if(!isset($_GET['method'])){
			$view_name = 'events';
		}
		else{
			if($_GET['method']=='add'){
				$view_name = 'events_add';
			}
		}
		break;
	case 'profile':
		if(!isset($_GET['method'])){
			$view_name = 'profile';
		}
		else{
			if($_GET['method']=='manage'){
				$view_name = 'events_manage';
			}
		}
		break;
	case 'eventtypes':
		if(!isset($_GET['method'])){
			$view_name = 'types';
		}
		else{
			if($_GET['method']=='create'){
				$view_name = 'types_create';
			}
		}
		break;
}
if($view_name==''){
	$view_name = 'home';
}

Include 'Views/'.$view_name.'.php';

Include 'Views/template.php';