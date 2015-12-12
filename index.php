<?php
/**
 * Created by PhpStorm.
 * User: Tazik
 * Date: 25.11.2015
 * Time: 23:02
 */
 
Include 'Logic/includes.php';

isAuthorized();

if(!isset($_GET['action'])){
	$_GET['action'] = 'home';
}

$view_name = '';

switch($_GET['action']){
	case 'avatar':
		get_avatar();
		return;
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
			elseif($_GET['method']=='update'){
				$view_name='events_update';
			}
		}
		break;
	case 'profile':
		if(!isset($_GET['method'])){
			$view_name = 'profile';
		}
		else{
			if($_GET['method']=='manage'){
				$view_name = 'profile_manage';
			}
			elseif($_GET['method']=='password'){
				$view_name = 'profile_changepass';
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