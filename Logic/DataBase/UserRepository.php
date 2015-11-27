<?php

/**
 * Created by PhpStorm.
 * User: Tazik
 * Date: 25.11.2015
 * Time: 23:17
 */
class UserRepository
{
    var $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function get()
    {
        $res = $this->db->query("SELECT * FROM user");
		$users = [];
		foreach($res as $u){
			$users[] = $this->mapUser($u);
		}
        return $users;
    }

    public function getById($id){
		$res = $this->db->query("SELECT * FROM user where UserId = ".$id);
		if(count($res)==0) return null;
		$user = $this->mapUser($res[0]);
        return $user;
    }
	
	public function getByEmail($email){
		$res = $this->db->query("SELECT * FROM user where Email = '$email'");
		if(count($res)==0) return null;
		$user = $this->mapUser($res[0]);
        return $user;
    }
	
	public function insert($user){
		$this->db->queryWithoutResult('insert into user(`Password`, `Email`) values("'.$user->password.'", "'.$user->email.'")');
	}
	
	public function setAvatarType($id, $type){
		$this->db->queryWithoutResult('UPDATE `user` SET `Content_type`="'.$type.'" WHERE UserId='.$id);
	}
	
	public function getAvatarType($id){
		$res = $this->db->query('SELECT `Content_type` FROM user where UserId = '.$id);
		if(count($res)==0) return null;
		return $res[0]['Content_type'];
	}
	
	public function update($u)
	{
		$this->db->queryWithoutResult('UPDATE `user` SET `Password`="'.$u->password.'" WHERE UserId='.$u->id);
	}
	
	private function mapUser($u){
		return new User($u['UserId'], $u['Email'], $u['Password']);
	}
}