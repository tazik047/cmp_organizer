<?php

/**
 * Created by PhpStorm.
 * User: Tazik
 * Date: 25.11.2015
 * Time: 23:17
 */
class EventTypeRepository
{
    var $db;
	var $userRepo;

    public function __construct(){
        $this->db = new Database();
		$this->userRepo = $GLOBALS['UserRepository'];
    }

    public function get()
    {
        $res = $this->db->query("SELECT * FROM eventtype");
		$eventtypes = [];
		foreach($res as $e){
			$eventtypes[] = $this->mapEventType($e);
		}
        return $eventtypes;
    }

    public function getByUserId($id){
		$res = $this->db->query("SELECT * FROM eventtype where UserId = ".$id);
		if(count($res)==0) return null;
		$eventtypes = [];
		foreach($res as $e){
			$eventtypes[] = $this->mapEventType($e);
		}
        return $eventtypes;
    }
	
	public function insert($type){
		$this->db->queryWithoutResult("INSERT INTO `eventtype`(`UserId`, `Name`, `Color`) VALUES (\"".$type->user->id."\", \"$type->name\", \"$type->color\")");
	}
	
	private function mapEventType($e){
		return new EventType($e['EventTypeId'], $this->userRepo->getById($e['UserId']), $e['Name'], $e['Color']);
	}
}