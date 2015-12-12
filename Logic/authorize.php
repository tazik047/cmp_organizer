<?php
use Model\User;

session_start();

function isAuthorized(){
	if(!isset($_SESSION['userId'])){
		header("Location: ".generateGlobalUrl('login'));
	}
}

function get_current_organizer_user(){
	$user = new User();
	$user->getById($_SESSION['userId']);
	return $user;
}

function login($login, $password){
	$error = array();
	$user = new User();
	$user->getByEmail($login);
	print '<pre>';
	print_r($user);
	die();
	if (!$user->isEmpty()) {
		if ($user->getPassword()==$password)	{
			$_SESSION['userId'] = $user->id;
			return $error;
		}
		else {
			$error[] = "Неверный или пароль";
			return $error;
		}
	}
	else {
		$error[] = "Неверный логин или пароль";
		return $error;
	}
}

function logout(){
	unset($_SESSION['userId']);
	header("Refresh:0");	
}