<?php

session_start();

if(!$AllowAnonymous){
	if(!isset($_SESSION['userId'])){
		header("Location: ".generateGlobalUrl('login'));
	}
}

function get_current_organizer_user(){
	$repo = $GLOBALS['UserRepository'];
	return $repo->getById($_SESSION['userId']);
}

function login(){
	$error = array();
	if ($_POST['login'] != "" && $_POST['password'] != "") { 		
		$login = $_POST['login']; 
		$password = $_POST['password'];
		$repo = $GLOBALS['UserRepository'];
		$user = $repo->getByEmail($login);
		if ($user!=null) {			
			if ($user->password==$password)	{ 			
				$_SESSION['userId'] = $user->id;
				return $error; 			
			} 			
			else { 				
				$error[] = "Неверный пароль"; 										
				return $error; 			
			} 
		}			
		else { 			
			$error[] = "Неверный логин и пароль"; 			
			return $error; 		
		} 
	}		
	else { 		
		$error[] = "Поля не должны быть пустыми!"; 				
		return $error; 	
	}
}

function logout(){
	unset($_SESSION['userId']);
	header("Refresh:0");	
}