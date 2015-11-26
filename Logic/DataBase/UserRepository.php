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
	
	private function mapUser($u){
		return new User($u['UserId'], $u['Email'], $u['Password']);
	}
}