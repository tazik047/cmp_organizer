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
switch($_GET['action']){
	case 'logout':
		logout();
		return;
	default:
		if(isset($_GET['userId'])){
			$t = $repo->getById($_GET['userId']);
		}
		else if(isset($_GET['email']) && isset($_GET['password'])){
			$u = new User(0, $_GET['email'], $_GET['password']);
			$repo->insert($u);
		}
		else{
			$t = $repo->get();
		}
		break;
}
Include 'Views/template.php';