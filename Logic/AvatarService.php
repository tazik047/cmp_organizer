<?php

function get_file_name_for_avatar($email){
	$uploadDir = $_SERVER['DOCUMENT_ROOT'].'/avatars/';
	return $uploadDir . $email;
}

function upload_avatar(){
	if($_FILES['avatar']['size']!=0){
		$user = get_current_organizer_user();
		$uploadFile = get_file_name_for_avatar($user->getEmail());
		move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile);
		$user->setAvatarType($_FILES['avatar']['type']);
	}
}

function get_avatar(){
	$user = get_current_organizer_user();
	$type = $user->getAvatarType();
	if($type==""){
		$type ="image/jpeg";
	}
	header("Content-type: $type");
	$path = get_file_name_for_avatar($user->getEmail());
	if(!file_exists($path)){
		$path = get_file_name_for_avatar("default.jpg");
	}
	readfile($path);
}
	
?>