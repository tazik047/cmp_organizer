<?php

/**
 * Created by PhpStorm.
 * User: Tazik
 * Date: 26.11.2015
 * Time: 0:16
 */
namespace Model;

class EventType extends BaseEntity
{
    //public $id;
    //public $user;
    //public $name;
	//public $color;

	public function getId(){
        return isset($this->fields[$this->idColumnName])?$this->fields[$this->idColumnName]:"";
    }

    public function setId($id){
        $this->fields[$this->idColumnName] = $id;
    }
	
	public function getName(){
		return isset($this->fields['Name'])?$this->fields['Name']:"";
	}
	
	public function setName($name){
		$this->fields['Name'] = $name;
	}
	
	public function getUserId(){
        return isset($this->fields['UserId'])?$this->fields['UserId']:"";
    }

    public function setUserId($id){
        $this->fields['UserId'] = $id;
    }
	
	public function getColor(){
		return isset($this->fields['Color'])?$this->fields['Color']:"";
	}
	
	public function setColor($color){
		$this->fields['Color'] = $color;
	}
	
	public function __construct(){
        parent::__construct();
        $this->idColumnName = "EventTypeId";
        $this->tableName = "eventtype";
    }

    public function get(){
        $res = parent::get();
        $eventTypes = [];
        foreach($res as $e){
            $i = new EventType();
            $i->fields = $e;
            $eventTypes[] = $i;
        }
        return $eventTypes;
    }

    public function getByUserId($id){
        $res = $this->db->query("SELECT * FROM eventtype where UserId = ".$id);
        if(count($res)==0) return null;
        $eventTypes = [];
        foreach($res as $e){
            $i = new EventType();
            $i->fields = $e;
            $eventTypes[] = $i;
        }
        return $eventTypes;
    }
	
    /*public function __construct($id, $user, $name, $color){
        $this->user=$user;
        $this->id = $id;
        $this->name = $name;
		$this->color = $color;
    }*/
}